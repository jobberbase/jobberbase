<?php
	if (!empty($_POST) && isset($_POST['email']) && isset($_POST['category']))
	{
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
		else
		{
			$categoryData = null;
		}

		$subscriber = new Subscriber($email);
		$postman = new Postman();
		if ($subscriber->addSubscription($category))
		{
			if ($postman->MailSubscriptionPleaseConfirm($email, $categoryData))
			{
				echo '1';
				exit;
			}
		}
	}
	echo '0';
	exit;
?>
