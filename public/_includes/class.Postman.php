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
	function __construct()
	{ }

	// Send a job post to a friend
	public function MailSendToFriend($friend_email, $my_email)
	{
		$msg = $_SERVER['HTTP_REFERER'];
		$msg .= "\n\n---\nYou've received this e-mail from " . $my_email;
		
		$subject = 'I\'m recommending you a job ad';

		if ($friend_email != '' && $my_email != '' && validate_email($friend_email) && validate_email($my_email))
		{
			$mailer = $this->getConfiguredMailer();
			
			$mailer->SetFrom($my_email);
    		$mailer->AddAddress($friend_email);
			$mailer->Subject = $subject;
			$mailer->Body = $this->nl2br($msg);
			$mailer->AltBody = $msg;
			
			if ($mailer->Send())
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
		$mailer = $this->getConfiguredMailer();
		
		$msg = $data['apply_msg'];
		$msg .= "\n\n---\nThis e-mail is an application sent from " . $_SERVER['HTTP_REFERER'];

		$subject = "[" . SITE_NAME . "] I wish to apply for '" . $data['job_title'] . "'";

    	$mailer->SetFrom($data['apply_email'], $data['apply_name']);
    	$mailer->AddAddress($data['company_email'], $data['company_name']);
    	$mailer->Subject = $subject;
    	$mailer->Body = $this->nl2br($msg);
    	$mailer->AltBody = $msg;
    	
		if ($data['attachment_filename'] != '')
		{
    		$mailer->AddAttachment($data['attachment_path'], $data['attachment_filename']);
		}

		if ($mailer->Send())
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
		$job_title = BASE_URL . URL_JOB .'/' . $data['id'] . '/' . $data['url_title'] . '/';
		
		if ($data['check_poster_email'] == 0)
		{
			$msg .= "Activate ad: " . BASE_URL . "activate/" . $data['id'] . "/" . $data['auth'] . "/";
			$msg .= "\n\n\n";
		}
		
		$msg .= $job_title;
		$msg .= "\n\n" . $data['title'] . " at " . $data['company'];
		$msg .= "\n\n" . $data['description'];
		$msg .= "\n\nURL: " . $data['url'];
		$msg .= "\n\n---\nPublished by: " . $data['poster_email'];
		$msg .= "\n---\nEdit: " . BASE_URL . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate: " . BASE_URL . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nDate: " . $data['created_on'];
		
		$subject = '[' . SITE_NAME . ']' . $job_title;
		
		$mailer = $this->getConfiguredMailer();
			
		$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
    	$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = $this->nl2br($msg);
		$mailer->AltBody = $msg;
		
		$mailer->Send();
	}
	
	// Send mail to user when posting first time (thus the post needs to be moderated)
	public function MailPublishPendingToUser($poster_email)
	{
		$msg = "Hello! :)\n\n";
		$msg .= "We apologize for the inconvenience, but since this is the first time you post with this e-mail address, we need to manually verify it.";
		$msg .= "\nThank you for your patience, as the ad should be published ASAP. We'll send you an e-mail when that happens!";
		$msg .= "\n\nFrom now on, every ad you post with this e-mail address will instantly be published.";
		$msg .= "\n\n---\n\nThank you for using our service!\nThe Team";
		
		$subject = "Your ad on " . SITE_NAME;
		
		if ($poster_email != '' && validate_email($poster_email))
		{
			$mailer = $this->getConfiguredMailer();
			
			$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
	    	$mailer->AddAddress($poster_email);
			$mailer->Subject = $subject;
			$mailer->Body = $this->nl2br($msg);
			$mailer->AltBody = $msg;
			
			$mailer->Send();
		}
	}
	
	// Send mail to user when a post is published
	public function MailPublishToUser($data, $url=BASE_URL)
	{
		$msg = "Hello! :)\n\n";
		$msg .= "Your ad was published and is available at: " . $url . URL_JOB ."/" . $data['id'] . "/" . $data['url_title'] . "/";
		$msg .= "\n\n---\nEdit it: " . $url . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate it: " . $url . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n\n---\n\nThank you for using our service!\nThe " . SITE_NAME . " Team";
		
		$subject = 'Your ad on ' . SITE_NAME . ' was published';
		
		if ($data['poster_email'] != '' && validate_email($data['poster_email']))
		{
			$mailer = $this->getConfiguredMailer();
			
			$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
	    	$mailer->AddAddress($data['poster_email']);
			$mailer->Subject = $subject;
			$mailer->Body = $this->nl2br($msg);
			$mailer->AltBody = $msg;
			
			$mailer->Send();
		}
	}
	
	// Send mail to user when a post is activated (after first-time post)
 	public function MailPostActivatedToUser($data, $url=BASE_URL)
    {
        $this->MailPublishToUser($data, $url);
    }
	
	// Send mail to admin when someone posts a new spam word
	public function MailReportSpam($data)
	{
		$job_title = BASE_URL . URL_JOB .'/' . $data['id'] . '/' . $data['url_title'] . '/';
		
		$msg = '';
		
		$msg .= "Following ad was reported as false/spam:\n--\n\n";
		$msg .= $job_title;
		$msg .= "\n\n" . $data['title'] . " at " . $data['company'];
		$msg .= "\n\n" . $data['description'];
		$msg .= "\n\n--- \n Published by: " . $data['poster_email'];
		$msg .= "\n---\nEdit: " . BASE_URL . "post/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\nDeactivate: " . BASE_URL . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/";
		$msg .= "\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nDate: " . $data['created_on'];
		
		$subject = '[SPAM on ' . SITE_NAME . '] ' . $job_title;
		
		$mailer = $this->getConfiguredMailer();
			
		$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
    	$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = $this->nl2br($msg);
		$mailer->AltBody = $msg;
		
		$mailer->Send();
	}
	
	public function MailContact($name, $email, $msg)
	{
		$msg .= "\n\n---\nIP: " . $_SERVER['REMOTE_ADDR'];
		$msg .= "\nDate: " . date('Y-m-d H:i');

		$subject = "[" . SITE_NAME . "] contact";
		
		$mailer = $this->getConfiguredMailer();
			
		$mailer->SetFrom($email, $name);
    	$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = $this->nl2br($msg);
		$mailer->AltBody = $msg;
		
		if($mailer->Send())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	private function getConfiguredMailer()
	{
		global $settings;
		
		$mailer = new PHPMailer();
		$mailer->Mailer = $settings['mailer_mailer'];
		$mailer->CharSet = $settings['mailer_encoding'];
		
		if($settings['mailer_mailer'] == 'smtp')
		{
			$mailer->Host = $settings['mailer_smtp_host'];
			$mailer->Port = $settings['mailer_smtp_port'];

			if ($settings['mailer_smtp_requires_authentication'])
			{
				$mailer->SMTPAuth = true;
				$mailer->SMTPSecure = $settings['mailer_smtp_secure_connection_prefix'];
				
				$mailer->Username = $settings['mailer_smtp_username'];
				$mailer->Password = $settings['mailer_smtp_password'];
			}
		}
		
		return $mailer;
	}
	
	private function nl2br($text)
	{
		return str_replace(array("\r\n", "\r", "\n"), "<br />", $text);
	}
}
?>