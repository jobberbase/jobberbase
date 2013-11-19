<?php
/**
 * jobber job board platform
 *
 * @author     Rimas Kudelis <http://rimas.kudelis.lt>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 *
 * Subscriber class – represents a subscriber to job announcements and handles their subscriptions
 */

class Subscriber {
	protected $_id;
	protected $_email;
	protected $_auth;

	public function __construct($email)
	{
		global $db;

		$email = (string)$email;

		$sql = 'SELECT id, auth FROM '.DB_PREFIX.'subscribers WHERE email = "' . $email . '"';
		$result = $db->QueryRow($sql);
		if ($result)
		{
			$this->_email = $email;
			$this->_id = $result['id'];
			$this->_auth = $result['auth'];
		}
		else
		{
			$auth = self::generateAuthCode();
			$sql = 'INSERT INTO '.DB_PREFIX.'subscribers (email, auth)
						   VALUES ("' . $email . '", "' . $auth . '")';
			if($db->Execute($sql))
			{
				$this->_email = $email;
				$this->_id = $db->insert_id;
				$this->_auth = $auth;
			}
		}
	}

	public function getAuthCode()
	{
		return $this->_auth;
	}

	// Update/confirm the list of subscriptions for the user.
	public function updateSubscriptions($categories=array())
	{
		global $db;

		if (!is_array($categories))
		{
			$categories = array($categories);
		}
		// Delete existing subscriptions
		$sql = 'DELETE FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $this->_id;
		if ($db->Execute($sql))
		{
			if (empty($categories))
			{
				// Do nothing – updating to "no subscriptions"
				return true;
			}
			else
			{
				// Add the supplied subscriptions
				$addCombos = array();
				foreach ($categories as $category)
				{
					$addCombos[] = '(' . $this->_id . ',' . (int)$category . ',1)';
				}
				$addCombos = implode(',', $addCombos);
				$sql = 'INSERT INTO '.DB_PREFIX.'subscriptions (subscriber_id, category_id, confirmed) VALUES ' . $addCombos;
				return $db->Execute($sql);
			}
		}
	}

	// Subscribe an email to a given category
	public function addSubscription($category, $confirmed=false)
	{
		global $db;

		if ($this->isSubscribed($category))
		{
			return true; // do nothing if already subscribed and confirmed
		}

		$sql = 'REPLACE INTO '.DB_PREFIX.'subscriptions (subscriber_id, category_id, confirmed) VALUES (' . $this->_id . ',' . (int)$category . ',' . (int)(bool)$confirmed . ')';
		return $db->Execute($sql);
	}

	public function getConfirmedSubscriptions()
	{
		return $this->getSubscriptions(true);
	}

	public function getUnconfirmedSubscriptions()
	{
		return $this->getSubscriptions(false);
	}

	public function getSubscriptions($confirmed=null)
	{
		global $db;

		if (is_null($confirmed))
		{
			$sql = 'SELECT category_id FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $this->_id;
		}
		else
		{
			$sql = 'SELECT category_id FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $this->_id . ' AND confirmed = ' . (int)(bool)$confirmed;
		}
		if ($tmpResult = $db->QueryArray($sql))
		{
			// The following line works only with PHP 5.3 and above
			// $result = array_map(function($item){ return $item['category_id']; }, $tmpResult);
			$result = array();
			foreach ($tmpResult as $key=>$row)
			{
				$result[$key] = $row['category_id'];
			}
			return $result;
		}
		return false;
	}

	// Returns true if a given user is subscribed to a given category and the subscription is confirmed
	public function isSubscribed($category)
	{
		global $db;

		$sql = 'SELECT confirmed FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $this->_id . ' AND category_id = ' . (int)$category;
		return (bool)$db->QueryItem($sql);
	}

	public function delete()
	{
		global $db;

		$sql = 'DELETE FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $this->_id;
		if ($db->Execute($sql))
		{
			$sql = 'DELETE FROM '.DB_PREFIX.'subscribers WHERE id = ' . $this->_id;
			return $db->Execute($sql);
		}
		else
		{
			return false;
		}
	}

	public static function isValid($email, $auth)
	{
		global $db;

		$sql = 'SELECT id FROM '.DB_PREFIX.'subscribers WHERE email = "' . $email . '" AND auth = "' . $auth . '"';
		return (bool)$db->QueryItem($sql);
	}

	public static function sendJob($jobId)
	{
		global $db;
		$job = new Job($jobId);
		$subscribers = self::getCategorySubscribers($job->mCategoryId);
		$postman = new Postman();

		foreach ($subscribers as $subscriber)
		{
			$postman->MailSubscriptionJobPosted($subscriber['email'], $subscriber['auth'], $job);
			$sql = 'INSERT INTO '.DB_PREFIX.'subscriber_mail_log (email, job_id, job_title, job_summary, date)
				VALUES ("'.$subscriber['email'].'", '.$jobId.', "'.$job->mTitle.'", "'.$job->mSummary.'" NOW())';
			$db->Execute($sql);
		}
	}

	public static function getCategorySubscribers($categoryId, $includeImplicit=true)
	{
		global $db;

		if ($includeImplicit)
		{
			$categoryFilter = 'b.category_id IN (0,' . $categoryId . ')';
		}
		else
		{
			$categoryFilter = 'b.category_id = ' . $categoryId;
		}
		$sql = 'SELECT DISTINCT a.id as id, a.email as email, a.auth as auth
				FROM '.DB_PREFIX.'subscribers a, '.DB_PREFIX.'subscriptions b
				WHERE a.id = b.subscriber_id
				AND ' . $categoryFilter;

		if ($tmpResult = $db->QueryArray($sql))
		{
			$result = array();
			foreach ($tmpResult as $subscriber)
			{
				$result[$subscriber['id']] = array('email' => $subscriber['email'], 'auth' => $subscriber['auth']);
			}
			return $result;
		}
		return false;
	}

	protected static function generateAuthCode()
	{
		$auth = md5(uniqid() . time());
		return $auth;
	}
}
?>
