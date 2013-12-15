<?php
	if (!empty($_POST) && isset($_POST['email']) && isset($_POST['category']))
	{
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$email = $db->real_escape_string($_POST['email']);
			$category = $db->real_escape_string($_POST['category']);

			if ($category != '0')
			{
				$categoryData = get_category_by_id($category);
				if (is_null($categoryData)) // category does not exist
				{
					echo '0';
					exit;
				}
			}

			$subscriber = new Subscriber($email);
			$postman = new Postman();
			if ($subscriber->addSubscription($category))
			{
				if ($postman->MailSubscriptionPleaseConfirm($email, $subscriber->getAuthCode()))
				{
					echo '1';
					exit;
				}
			}
		}
		echo '0';
		exit;
	}
	else // present a subscribe form with introductory text, if set
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

		$smarty->assign('seo_title', htmlspecialchars($settings['html_title']));
		$smarty->assign('seo_desc', htmlspecialchars($settings['meta_description']));
		$smarty->assign('seo_keys', htmlspecialchars($settings['meta_keywords']));

		$template = 'subscribe.tpl';
	}
?>
