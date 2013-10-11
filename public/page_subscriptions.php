<?php
	if (!empty($_POST) && isset($_POST['email']) && isset($_POST['auth']))
	{
		$email = $db->real_escape_string($_POST['email']);
		$auth = $db->real_escape_string($_POST['auth']);
		if (Subscriber::isValid($email, $auth)) {
			$subscriber = new Subscriber($email);
			$postman = new Postman();

			if (isset($_POST['delete_subscriber']))
			{
				if ($subscriber->delete())
				{
					$postman->MailSubscriptionRemoved($email);
					$template = 'subscriptions_removed.tpl';
				}
			}
			else
			{
				$categories = array();
				if(isset($_POST['categories']) && is_array($_POST['categories']))
				{
					foreach($_POST['categories'] as $category)
					{
						$categories[] = $db->real_escape_string($category);
					}
				}
				if ($subscriber->updateSubscriptions($categories))
				{
					$postman->MailSubscriptionUpdated($email, $auth);
					$smarty->assign('subscriptions_updated', true);
				}
				$smarty->assign('subscriptions_email', $email);
				$smarty->assign('subscriptions_auth', $auth);
				$smarty->assign('subscriptions_categories_confirmed', $categories);
				$smarty->assign('subscriptions_categories_unconfirmed', array());
				$template = 'subscriptions_manage.tpl';
			}
		}
		else
		{
			redirect_to(BASE_URL);
			exit;
		}
	}
	elseif (!empty($id) && !empty($extra) && Subscriber::isValid($id, $extra))
	{
		$subscriber = new Subscriber($id);
		$smarty->assign('subscriptions_email', $id);
		$smarty->assign('subscriptions_auth', $extra);
		$smarty->assign('subscriptions_categories_confirmed', $subscriber->getConfirmedSubscriptions);
		$smarty->assign('subscriptions_categories_unconfirmed', $subscriber->getUnconfirmedSubscriptions);
		$template = 'subscriptions_manage.tpl';
	}
	else
	{
		redirect_to(BASE_URL);
		exit;
	}
?>
