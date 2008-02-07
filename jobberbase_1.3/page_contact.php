<?php
	escape($_POST);
	
	$errors = array();
	if ($contact_name == '')
	{
		$errors['contact_name'] = 'Numele tău este important.';
	}
	if ($contact_email == '' || !validate_email($contact_email))
	{
		$errors['contact_email'] = 'Adresa ta de e-mail este importantă.';
	}
	if ($contact_msg == '')
	{
		$errors['contact_msg'] = 'Mesajul este important.';
	}
	
	if (empty($errors))
	{
		$johnny = new Postman();
		if ($johnny->MailContact($contact_name, $contact_email, $contact_msg))
		{
			$_SESSION['contact_msg_sent'] = 1;
		}
		else
		{
			$_SESSION['contact_msg_sent'] = -1;
		}
	}
	else
	{
		$_SESSION['contact_msg_sent'] = -1;
		$_SESSION['contact_errors'] = $errors;
		$_SESSION['contact_fields'] = $_POST;
	}
	redirect_to($_SERVER['HTTP_REFERER']);
	exit;
?>