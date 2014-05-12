<?php
		$captcha_enabled = ENABLE_RECAPTCHA && ENABLE_CAPTCHA_ON_ADMIN_LOGIN_PAGE;

		if(!empty($_POST['action']) && $_POST['action'] == 'login')
		{
			escape($_POST);
			$errors = array();

			if ($captcha_enabled)
			{
				$resp = recaptcha_check_answer(
					CAPTCHA_PRIVATE_KEY,
					$_SERVER["REMOTE_ADDR"],
					$_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);
				if (!$resp->is_valid) $errors['captcha'] = 'Incorrect CAPTCHA code.';
			}

			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
			
			// validation
			if ($username == '')
			{
				$errors['username'] = 'Please enter your username.';
			}
			if ($password == '')
			{
				$errors['password'] = 'Please enter your password.';
			}
			
			// no errors, go to review page
			if (empty($errors))
			{
				require_once APP_PATH . '_lib/class.Admin.php';
				$admin = new CAdmin();
				
				if($admin->login($username, $password))
				{
					$_SESSION['AdminId'] = $admin->getId();
					redirect_to(BASE_URL.'home/');
					exit;
				}
				else
				{
					$errors['incorrect'] = 'Incorrect username or password';
					$smarty->assign('errors', $errors);
				}
			}
			// if errors exist, go back and edit the post
			else
			{
				$smarty->assign('errors', $errors);
			}
		}
		$template = 'login.tpl';
		$smarty->assign('ENABLE_RECAPTCHA', $captcha_enabled);

		if ($captcha_enabled)
		{
			$smarty->assign('the_captcha', recaptcha_get_html(CAPTCHA_PUBLIC_KEY));
		}
?>
