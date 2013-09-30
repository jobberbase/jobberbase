<?php
	$smarty->assign('page', $pageData);

	if ($pageData['has_form'] == '1')
	{
		$captcha_enabled = ENABLE_RECAPTCHA && ENABLE_CAPTCHA_ON_CONTACT_PAGE;

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_SESSION['contact_msg_sent'] = -1;

			$errors = array();

			// validation
			if ($captcha_enabled)
			{
				$resp = recaptcha_check_answer(CAPTCHA_PRIVATE_KEY,
					$_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);
				if (!$resp->is_valid) $errors['captcha'] = $translations['captcha']['captcha_error'];
			}

			$contact_name = strip_tags($_POST['contact_name']);
			if ($contact_name == '')
			{
				$errors['contact_name'] = $translations['contact']['name_error'];
			}

			$contact_email = $_POST['contact_email'];
			if ($contact_email == '' || !validate_email($contact_email))
			{
				$errors['contact_email'] = $translations['contact']['email_error'];
			}

			$contact_msg = strip_tags($_POST['contact_msg']);
			if ($contact_msg == '')
			{
				$errors['contact_msg'] = $translations['contact']['msg_error'];
			}

			$attachment_path = $attachment_filename = '';
			if (($pageData['accepts_files'] == '1') && array_key_exists('contact_attach', $_FILES))
			{
				if ($_FILES['contact_attach']['size'] >= MAX_CV_SIZE)
				{
					$errors['contact_attach'] = $translations['contact']['attach_error'];
				} else {
					$attachment_path = $_FILES['contact_attach']['tmp_name'];
					$attachment_filename = $_FILES['contact_attach']['name'];
				}
			}

			if (count($errors) > 0)
			{
				$errors['contact_error'] = $translations['contact']['send_error'];
				$smarty->assign('errors', $errors);
			}
			else
			{
				$data = array('name' => $contact_name,
				              'email' => $contact_email,
				              'message' => $contact_msg,
				              'attachment_path' => $attachment_path,
				              'attachment_filename' => $attachment_filename);

				$mailer = new Postman();

				if ($mailer->MailContact($data))
				{
					$_SESSION['contact_msg_sent'] = 1;
				}

				if (!empty($attachment_path))
				{
					@unlink($attachment_path);
				}
			}
		} else {
			$smarty->assign('ENABLE_RECAPTCHA', $captcha_enabled);

			if ($captcha_enabled)
			{
				$smarty->assign('the_captcha', recaptcha_get_html(CAPTCHA_PUBLIC_KEY));
			}
		}
	}
?>
