<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Postman class is a generic class that handles all e-mail operations
 */

class Postman
{
	var $mAdminEmail = ADMIN_EMAIL;
	
	function __construct()
	{ }

	// Send a job post to a friend
	public function MailSendToFriend($friend_email, $my_email)
	{
		$subject = 'I\'m recommending you a job ad';
		$msg = $_SERVER['HTTP_REFERER'];
		$msg .= "\n\n---\nYou've received this e-mail from " . $my_email;

		if ($friend_email != '' && $my_email != '' && validate_email($friend_email) && validate_email($my_email))
		{
			if (mail($friend_email, $subject, $msg, 'From: ' . $my_email))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	// Send email to company when applying online
	public function MailApplyOnline($data)
	{
		$extra = '\n\n---\nThis e-mail is an application sent from ' . $_SERVER['HTTP_REFERER'];
	
		$mail = new PHPMailer();

		$mail->From     = stripslashes($data['apply_email']);
		$mail->FromName = stripslashes($data['apply_name']);

    $mail->Body    = str_replace(array('\r\n', '\r', '\n'), '<br />', stripslashes($data['apply_msg']) . $extra);
    $mail->AltBody = $data['apply_msg'] . $extra;
		$mail->Subject = "[" . SITE_NAME . "] I wish to apply for '" . $data['job_title'] . "'";
    $mail->AddAddress($data['company_email'], $data['company_name']);
		if ($data['attachment_path'])
		{
    	$mail->AddAttachment($data['attachment_path'], $data['attachment_filename']);
		}

		if ($mail->Send())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Send mail to admin when a job is posted
	public function MailPublishToAdmin($data)
	{
		$msg = '';
		$job_title = BASE_URL . 'job/' . $data['id'] . '/' . $data['url_title'] . '/';
		$subject = '[jobber] ' . $job_title;
		
		if ($data['check_poster_email'] == 0)
		{
			$msg .= "Activate ad: " . BASE_URL . "activate/" . $data['id'] . "/" . $data['auth'] . "/";
			$msg .= "\n\n\n";
		}
		$msg .= $job_title;
		$msg .= "\n\n" . $data['title'] . " at " . $data['company'];
		$msg .= "\n\n" . $data['description'];
		$msg .= "\n\nURL: " . $data['url'];
		$msg .= "\n\n---\Published by: " . $data['poster_email'];
		$msg .= "\n---\nEdit: " . BASE_URL . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate: " . BASE_URL . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nData: " . $data['created_on'];
		mail(NOTIFY_EMAIL, $subject, $msg, "From: " . SITE_NAME . " <" . NOTIFY_EMAIL . ">");
	}
	
	// Send mail to user when posting first time (thus the post needs to be moderated)
	public function MailPublishPendingToUser($poster_email)
	{
		$subject = 'Your ad on ' . SITE_NAME;
		$msg = "Hello! :)\n\n";
		$msg .= "We apologize for the inconvenience, but since this is the first time you post with this e-mail address, we need to manually verify it.";
		$msg .= "\nThank you for your patience, as the ad should be published ASAP. We'll send you an e-mail when that happens!";
		$msg .= "\n\nFrom now on, every ad you post with this e-mail address will instantly be published.";
		$msg .= "\n\n---\n\nThank you for using our service!\nThe Team";
		
		if ($poster_email != '' && validate_email($poster_email))
		{
			mail($poster_email, $subject, $msg, "From: " . SITE_NAME . " <" . NOTIFY_EMAIL . ">");	
		}
	}
	
	// Send mail to user when a post is published
	public function MailPublishToUser($data)
	{
		$subject = 'Your ad on ' . SITE_NAME . ' was published';
		$msg = "Hello! :)\n\n";
		$msg .= "Your ad was published and is available at: " . BASE_URL . "job/" . $data['id'] . "/" . $data['url_title'] . "/";
		$msg .= "\n\n---\nEdit it: " . BASE_URL . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate it: " . BASE_URL . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n\n---\n\nThank you for using our service!\nThe Team";
		
		if ($data['poster_email'] != '' && validate_email($data['poster_email']))
		{
			mail($data['poster_email'], $subject, $msg, "From: " . SITE_NAME . " <" . NOTIFY_EMAIL . ">");	
		}
	}
	
	// Send mail to user when a post is activated (after first-time post)
	public function MailPostActivatedToUser($data)
	{
		$this->MailPublishToUser($data);
	}
	
	// Send mail to admin when someone posts a new spam word
	public function MailReportSpam($data)
	{
		$job_title = BASE_URL . 'job/' . $data['id'] . '/' . $data['url_title'] . '/';
		$subject = '[SPAM on ' . SITE_NAME . '] ' . $job_title;
		$msg .= "Following ad was reported as false/spam:\n--\n\n";
		$msg .= $job_title;
		$msg .= "\n\n" . $data['title'] . " at " . $data['company'];
		$msg .= "\n\n" . $data['description'];
		$msg .= "\n\n---\nPublished by: " . $data['poster_email'];
		$msg .= "\n---\nEdit: " . BASE_URL . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate: " . BASE_URL . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nData: " . $data['created_on'];
		
		mail(NOTIFY_EMAIL, $subject, $msg, "From: " . SITE_NAME . " <" . NOTIFY_EMAIL . ">");
	}
	
	public function MailContact($name, $email, $msg)
	{
		$msg .= "\n\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nData: " . date('Y-m-d H:i');

		$subject = "[" . SITE_NAME . "] contact";

		if (mail(NOTIFY_EMAIL, $subject, $msg, "From: $name <$email>"))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}	
}
?>