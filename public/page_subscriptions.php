<?php
	$email = $auth = null;
	if (!empty($_POST) && isset($_POST['email']) && isset($_POST['auth']))
	{
		$email = $db->real_escape_string($_POST['email']);
		$auth = $db->real_escape_string($_POST['auth']);
	}
	elseif (!empty($id) && !empty($extra))
	{
		$email = $id;
		$auth = $extra;
	}
	if (!empty($email) && !empty($auth) && Subscriber::isValid($email, $auth)) {
		$subscriber = new Subscriber($email);
		$postman = new Postman();

		if (isset($_POST['delete_subscriber']))
		{
			if ($subscriber->delete())
			{
				$postman->MailSubscriptionRemoved($email);
				$template = 'subscriptions-removed.tpl';
			}
		}
		else
		{
			if ($settings['subscribe_page_content'] != '')
			{
				$sql = '
					SELECT *
					FROM '.DB_PREFIX.'pages
					WHERE url = "' . $db->real_escape_string($settings['subscribe_page_content']) . '"';
				$result = $db->query($sql);
				$pageData = $result->fetch_assoc();
				if (is_array($pageData)) {
					$html_title = $pageData['page_title'] . ' - ' . SITE_NAME;
					$meta_keywords = $pageData['keywords'];
					$meta_description = $pageData['description'];
					$smarty->assign('page', $pageData);
				}
			}

			$all_categories = get_categories();
			$categories = array();
			foreach ($all_categories as $category)
			{
				$category['subscribed'] = false;
				$categories[$category['id']] = $category;
			}
			$keywords = $subscriber->getKeywords();

			$subscriptions_updated = false;

			if(isset($_POST['save_settings']))
			{
				$subscribe_categories = array();
				if(isset($_POST['categories']) && is_array($_POST['categories']))
				{
					foreach($_POST['categories'] as $categoryId)
					{
						if (array_key_exists($categoryId, $categories) || ($categoryId === '0'))
						{
							$subscribe_categories[] = $db->real_escape_string($categoryId);
						}
					}
					if ($subscriber->updateSubscriptions($subscribe_categories))
					{
						$subscriptions_updated = true;
					}
				}
				if(isset($_POST['keywords']) && ($_POST['keywords'] != $keywords))
				{
					if ($subscriber->setKeywords($_POST['keywords']))
					{
						$keywords = $subscriber->getKeywords();
						$subscriptions_updated = true;
					}
				}
				if ($subscriptions_updated)
				{
					$postman->MailSubscriptionUpdated($email, $auth);
				}
			}
			else
			{
				$subscribe_categories = $subscriber->getSubscriptions();
			}

			$all_jobs_subscribed = false;
			foreach($subscribe_categories as $categoryId)
			{
				if ($categoryId === '0')
				{
					$all_jobs_subscribed = true;
				}
				else
				{
					$categories[$categoryId]['subscribed'] = true;
				}
			}

			$smarty->assign('subscriptions_email', $email);
			$smarty->assign('subscriptions_auth', $auth);
			$smarty->assign('subscriptions_categories', $categories);
			$smarty->assign('subscriptions_keywords', $keywords);
			$smarty->assign('subscriptions_all_jobs_subscribed', $all_jobs_subscribed);
			$smarty->assign('subscriptions_updated', $subscriptions_updated);
			$template = 'subscriptions-manage.tpl';
		}
	}
	else
	{
		redirect_to(BASE_URL.'subscribe/');
		exit;
	}
?>
