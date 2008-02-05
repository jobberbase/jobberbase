<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	escape($_POST);
	$_SESSION['contact_msg_sent'] = -1;
	
	$errors = array();
	if ($contact_name == '')
	{
		$errors['contact_name'] = 'Numele tÄ?u este important.';
	}
	if ($contact_email == '' || !validate_email($contact_email))
	{
		$errors['contact_email'] = 'Adresa ta de e-mail este importantÄ?.';
	}
	if ($contact_msg == '')
	{
		$errors['contact_msg'] = 'Mesajul este important.';
	}
	
	if (count($errors) > 0) {
		$errors['contact_error'] = 'Your message could not be sent. Try again?';
		$smarty->assign('errors', $errors);
	} else {
		$johnny = new Postman();
		if ($johnny->MailContact($contact_name, $contact_email, $contact_msg))
		{
			$_SESSION['contact_msg_sent'] = 1;
		}
	}
}

$smarty->assign('page', $pageData);