<?php
/**
 * jobber job board platform
 *
 * @author     Rimas Kudelis <http://rimas.kudelis.lt>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Subscriptions class handles subscriptions to new job notifications
 */

class Subscriptions extends Postman {
	public function updateSubscriptions($email, $auth=null, $categories=array())
	{
		global $db;

		$id = $this->getSubscriberId($email, $auth, $create=true);
		if ($id)
		{
			if (!is_array($categories))
			{
				$categories = array($categories);
			}

			// Delete existing subscriptions
			$sql = 'DELETE FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = '.$id;
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
						$addCombos = '('.$email.','.$category.')';
					}
					$addCombos = implode(',', $addCombos);
					$sql = 'INSERT INTO '.DB_PREFIX.'subscriptions (subscriber_id, category_id) VALUES '.$addCombos;
					return $db->Execute($sql);
				}
			}
		}
		return false;
	}

	public function unsubscribeAll($email, $auth=null)
	{
		global $db;

		$id = $this->getSubscriberId($email, $auth);
		if ($id)
		{
			$sql = 'DELETE FROM '.DB_PREFIX.'subscriptions WHERE subscriber_id = ' . $id . ';'
			     . 'DELETE FROM '.DB_PREFIX.'subscribers WHERE id = ' . $id;
			return $db->ExecuteMultiple($sql);
		}
		return false;
	}

	public function getSubscriptions($email, $auth=null)
	{
		global $db;

		$id = $this->getSubscriberId($email, $auth);
		if ($id)
		{
			$sql = 'SELECT category_id FROM '.DB_PREFIX.'subscriptions WHERE subscribed_id = ' . $id;
			if ($tmpResult = $db->QueryArray($sql))
			{
				$result = array_map(function($item){ return $item['category_id']; }, $tmpResult);
				return $result;
			}
		}
		return false;
	}

	public function confirmSubscriber($email, $auth=null)
	{
		global $db;

		if (is_null($auth))
		{
			$sql = 'UPDATE '.DB_PREFIX.'subscribers SET confirmed = 1 WHERE email = "' . $email . '"';
		}
		else
		{
			$sql = 'UPDATE '.DB_PREFIX.'subscribers SET confirmed = 1 WHERE email = "' . $email . '" AND auth = "' . $auth .'"';
		}
		$db->Execute($sql);
		return (bool) $db->affected_rows;
	}

	protected function getSubscriberId($email, $auth=null, $create=false)
	{
		global $db;

		$sql = 'SELECT id, auth FROM '.DB_PREFIX.'subscribers WHERE email = "' . $email . '"';
		$result = $db->QueryRow($sql);
		if ($result)
		{
			if ($result['auth'] == $auth)
			{
				return $id;
			}
		}
		elseif ($create)
		{
			$auth = $this->generateAuthCode();
			$sql = 'INSERT INTO '.DB_PREFIX.'subscribers (email, auth, confirmed)
						   VALUES ("' . $email . '", "' . $auth . '", 0)';
			if($db->Execute($sql))
			{
				return $db->insert_id;
			}
		}
		return false;
	}

	protected function generateAuthCode()
	{
		$auth = md5(uniqid() . time());
		return $auth;
	}
}
?>
