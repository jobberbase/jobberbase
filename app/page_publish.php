<?php
	$job = new Job($id);

	// send notification to admin
	$postMan = new Postman();
	
	$jobInfo = $job->GetInfo();
	$jobInfo['check_poster_email'] = $job->CheckPosterEmail();
	
	$postMan->MailPublishToAdmin($jobInfo);

	// send notification to user
	if ($jobInfo['check_poster_email'])
	{
		// post published
		$postMan->MailPublishToUser($jobInfo);	
		$html_title = $translations['jobs']['publish_success'] . ' / ' . SITE_NAME;
		$smarty->assign('first_time_post', 0);
	}
	else
	{
		// post in pending status
		$postMan->MailPublishPendingToUser($job->mPosterEmail);	
		$html_title = $translations['jobs']['add_success'] . ' / ' . SITE_NAME;
		$smarty->assign('first_time_post', 1);
	}
	
	$job->Publish();
	
	$job_title = BASE_URL . 'job/' . $job->mId . '/' . $job->mUrlTitle . '/';
	
	$smarty->assign('auth', $job->GetAuth());
	$smarty->assign('job_url', $job_title);
	
	$template = 'publish-confirmation.tpl';
?>