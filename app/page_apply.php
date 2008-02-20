<?php
	foreach ($_POST as $variable => $value)
	{
		$GLOBALS[$variable] = $value;
	}
	$errors = array();

	// validation
	if ($apply_name == '')
	{
		$errors['apply_name'] = $translations['apply']['name_error'];
	}
	if ($apply_email == '')
	{
		$errors['apply_email'] = $translations['apply']['email_error'];
	}
	if ($apply_msg == '')
	{
		$errors['apply_msg'] = $translations['apply']['msg_error'];
	}
	if ($_FILES['apply_cv'] && $_FILES['apply_cv']['size'] >= MAX_CV_SIZE)
	{
		$errors['apply_cv'] = $translations['apply']['cv_error'];
	}
	if (!validate_email($apply_email))
	{
		$errors['apply_email'] = $translations['apply']['email_invalid'];
	}

	if (empty($errors))
	{
		$j = new Job($job_id);

		$filename = time() . '_' . $_FILES['apply_cv']['name'];
		if (move_uploaded_file($_FILES['apply_cv']['tmp_name'], FILE_UPLOAD_DIR . $filename))
		{
			$attach = $filename;
		}
		else
		{
			$attach = '';
		}

		$data = array('apply_email' => $apply_email,
		              'apply_name' => $apply_name,
		              'apply_msg' => $apply_msg,
		              'company_email' => $j->mPosterEmail,
		              'company_name' => $j->mCompany,
		              'job_title' => $j->mTitle,
		              'attachment_path' => APP_PATH . FILE_UPLOAD_DIR . $attach,
		              'attachment_filename' => $attach,
		              'job_id' => $job_id);
								
		$app = new JobApplication($job_id);
		if ($app->Apply())
		{
			$alex = new Postman();
			
			// promo "ipod for 300th application"
			$sql = 'SELECT COUNT(id) AS count FROM job_applications';
			$result = $db->query($sql);
			$row = $result->fetch_assoc();
			if ($row['count'] == 300)
			{
				$alex->MailAdminAppliersPromoWinner($data);
			}
			
			if ($alex->MailApplyOnline($data))
			{
				$_SESSION['apply_mail_sent'] = 1;

			}
			else
			{
				$_SESSION['apply_mail_sent'] = -1;
			}
		}
		else
		{
			$_SESSION['apply_mail_sent'] = -1;
		}

		// delete uploaded file (cleanup)
		if ($attach != '')
		{
			unlink(APP_PATH . FILE_UPLOAD_DIR . $filename);
		}
	}
	else
	{
		$_SESSION['apply_mail_sent'] = -1;
		$_SESSION['apply_errors'] = $errors;
		$_SESSION['apply_fields'] = $_POST;
	}
	redirect_to($_SERVER['HTTP_REFERER']);
	exit;
?>