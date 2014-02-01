<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Postman class is a generic class that handles all e-mail operations
 */

class Postman extends Translator
{
	public function __construct()
	{
		parent::__construct(LANG_CODE);
	}
	
	private function getEmailData($section, $replace=array())
	{
		$e = $this->translations[$section];
		$subject = $e['subject'];
		$message = $e['message'];

		if (is_array($replace) && !empty($replace))
		{
			foreach ($replace as $search_for => $replace_with)
			{
				$subject = str_replace('{' . $search_for . '}', $replace_with, $subject);
				$message = str_replace('{' . $search_for . '}', $replace_with, $message);
			}
		}

		return array('subject' => $subject, 'message' => $message);
	}
	
	

	// Send a job post to a friend
	public function MailSendToFriend($friend_email, $my_email)
	{
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'YOUR_EMAIL' => $my_email
		);
		$email_data = $this->getEmailData('email_SendToFriend', $replace);
	
		$subject = $email_data['subject'];
		$msg = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'n/a') . "\n" . $email_data['message'];
		
		if ($friend_email != '' && $my_email != '' && validate_email($friend_email) && validate_email($my_email))
		{
			$mailer->SetFrom($my_email);
			$mailer->AddAddress($friend_email);
			$mailer->Subject = $subject;
			$mailer->Body = $msg;

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
		
		$replace = array(
			'JOB_TITLE' => $data['job_title'],
			'SITE_NAME' => SITE_NAME,
			'JOB_URL' => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''
		);
		$email_data = $this->getEmailData('email_ApplyOnline', $replace);
		
		$subject = $email_data['subject'];
		$msg = $data['apply_msg'] . "\n" . $email_data['message'];
		
		$mailer->SetFrom($data['apply_email'], $data['apply_name']);
		$mailer->AddAddress($data['company_email'], $data['company_name']);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;

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
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'JOB_TITLE' => $data['title'],
			'SITE_NAME' => SITE_NAME,
			'JOB_URL' => BASE_URL . URL_JOB .'/' . $data['id'] . '/' . $data['url_title'] . '/',
			'JOB_TITLE' => $data['title'],
			'JOB_COMPANY' => $data['company'],
			'JOB_DESCRIPTION' => $data['description'],
			'JOB_POSTER_EMAIL' => $data['poster_email'],
			'JOB_EDIT_URL' => BASE_URL . 'post/' . $data['id'] . '/' . $data['auth'] . '/',
			'JOB_ACTIVATE_URL' => BASE_URL . 'activate/' . $data['id']. '/' . $data['auth'] . '/',
			'JOB_DEACTIVATE_URL' => BASE_URL . 'deactivate/' . $data['id'] . '/' . $data['auth'] . '/',
			'JOB_APPLICANTS_URL' => BASE_URL . 'view-applicants/' . $data['id'] . '/' . $data['auth'] . '/',
			'JOB_POSTER_IP' => $_SERVER['REMOTE_ADDR'],
			'JOB_POST_DATE' => $data['created_on']
		);
		
		if ($data['postRequiresModeration'])
		{
			$email_data = $this->getEmailData('email_PublishToAdmin_firstPost', $replace);
		}
		else
		{
			$email_data = $this->getEmailData('email_PublishToAdmin', $replace);
		}
		
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
		$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = nl2br($msg);
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
	
	// Send mail to user when posting first time (thus the post needs to be moderated)
	public function MailPublishPendingToUser($poster_email)
	{
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'SITE_NAME' => SITE_NAME
		);
		$email_data = $this->getEmailData('email_PublishPendingToUser', $replace);
		
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		if ($poster_email != '' && validate_email($poster_email))
		{
			$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
			$mailer->AddAddress($poster_email);
			$mailer->Subject = $subject;
			$mailer->Body = $msg;
			
			if ($mailer->Send())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	// Send mail to user when a post is published
	public function MailPublishToUser($data, $url = BASE_URL)
	{	
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'JOB_URL' => $url . URL_JOB ."/" . $data['id'] . "/" . $data['url_title'] . "/",
			'JOB_EDIT_URL' => $url . "post/" . $data['id'] . "/" . $data['auth'] . "/",
			'JOB_DEACTIVATE_URL' => $url . "deactivate/" . $data['id'] . "/" . $data['auth'] . "/",
			'JOB_MANAGE_URL' => $url . "manage/" . $data['id'] . "/" . $data['auth'] . "/",
			'JOB_APPLICANTS_URL' => $url . "view-applicants/" . $data['id'] . "/" . $data['auth'] . "/"
		);
		$email_data = $this->getEmailData('email_PublishToUser', $replace);
		
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		if ($data['poster_email'] != '' && validate_email($data['poster_email']))
		{
			$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
			$mailer->AddAddress($data['poster_email']);
			$mailer->Subject = $subject;
			$mailer->Body = $msg;
			
			if ($mailer->Send())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	// Send mail to user when a post is activated (after first-time post)
 	public function MailPostActivatedToUser($data, $url = BASE_URL)
    {
        $this->MailPublishToUser($data, $url);
    }
	
	// Send mail to admin when someone posts a new spam word
	public function MailReportSpam($data)
	{
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'JOB_TITLE' => BASE_URL . URL_JOB .'/' . $data['id'] . '/' . $data['url_title'] . '/',
			'SITE_NAME' => SITE_NAME,
			'JOB_URL' => BASE_URL . URL_JOB .'/' . $data['id'] . '/' . $data['url_title'] . '/',
			'JOB_TITLE' => $data['title'],
			'JOB_COMPANY' => $data['company'],
			'JOB_DESCRIPTION' => $data['description'],
			'JOB_POSTER_EMAIL' => $data['poster_email'],
			'JOB_EDIT_URL' => BASE_URL . 'post/' . $data['id'] . '/' . $data['auth'] . '/',
			'JOB_DEACTIVATE_URL' => BASE_URL . 'deactivate/' . $data['id'] . '/' . $data['auth'] . '/',
			'JOB_POSTER_IP' => $_SERVER['REMOTE_ADDR'],
			'JOB_POST_DATE' => $data['created_on']
		);
		$email_data = $this->getEmailData('email_ReportSpam', $replace);
		
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		$mailer->SetFrom(NOTIFY_EMAIL, SITE_NAME);
		$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = nl2br($msg);
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
	
	public function MailContact($data)
	{
		$mailer = $this->getConfiguredMailer();
		
		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'SENDER_NAME' => $data['name'],
			'SENDER_EMAIL' => $data['email'],
			'SENDER_IP' => $_SERVER['REMOTE_ADDR'],
			'SEND_DATE' => date('Y-m-d H:i')
		);
		$email_data = $this->getEmailData('email_Contact', $replace);
		
		$subject = $email_data['subject'];
		$msg = $data['message']. "\n" . $email_data['message'];
		
		$mailer->SetFrom($data['email'], $data['name']);
		$mailer->AddAddress(NOTIFY_EMAIL);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;
		
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

	public function MailSubscriptionPleaseConfirm($email, $auth)
	{
		$mailer = $this->getConfiguredMailer();

		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'SITE_URL' => APP_URL,
			'SENDER_IP' => $_SERVER['REMOTE_ADDR'],
			'MANAGE_URL' => APP_URL . 'subscriptions/' . $email . '/' . $auth . '/'
		);
		$email_data = $this->getEmailData('email_SubscriptionPleaseConfirm', $replace);
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		$mailer->SetFrom(ADMIN_EMAIL);
		$mailer->AddAddress($email);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;
		
		if ($mailer->Send())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	public function MailSubscriptionUpdated($email, $auth)
	{
		$mailer = $this->getConfiguredMailer();

		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'SITE_URL' => APP_URL,
			'SENDER_IP' => $_SERVER['REMOTE_ADDR'],
			'MANAGE_URL' => APP_URL . 'subscriptions/' . $email . '/' . $auth . '/'
		);
		$email_data = $this->getEmailData('email_SubscriptionUpdated', $replace);
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		$mailer->SetFrom(ADMIN_EMAIL);
		$mailer->AddAddress($email);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;
		
		if ($mailer->Send())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	public function MailSubscriptionRemoved($email)
	{
		$mailer = $this->getConfiguredMailer();

		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'SITE_URL' => APP_URL,
			'SENDER_IP' => $_SERVER['REMOTE_ADDR']
		);
		$email_data = $this->getEmailData('email_SubscriptionRemoved', $replace);
		$subject = $email_data['subject'];
		$msg = $email_data['message'];
		
		$mailer->SetFrom(ADMIN_EMAIL);
		$mailer->AddAddress($email);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;
		
		if ($mailer->Send())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	public function MailSubscriptionJobPosted($email, $auth, $job)
	{
		$mailer = $this->getConfiguredMailer();
		$replace = array(
			'SITE_NAME' => SITE_NAME,
			'SITE_URL' => APP_URL,
			'MANAGE_URL' => APP_URL . 'subscriptions/' . $email . '/' . $auth . '/',
			'JOB_TITLE' => $job->mTitle,
			'JOB_SUMMARY' => $job->mSummary,
			'JOB_URL' => APP_URL . URL_JOB .  '/' . $job->mId . '/' . $job->mUrlTitle . '/'
		);
		$email_data = $this->getEmailData('email_SubscriptionJobPosted', $replace);
		$subject = $email_data['subject'];
		$msg = $email_data['message'];

		$mailer->SetFrom(ADMIN_EMAIL);
		$mailer->AddAddress($email);
		$mailer->Subject = $subject;
		$mailer->Body = $msg;

		if ($mailer->Send())
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
}
?>
