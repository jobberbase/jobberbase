<?php
	$job = new Job($id);
	
	// send notification to admin
	$nicu = new Postman();
	$nicu->MailPublishToAdmin($job->GetInfo());
	
	// send notification to user
	if ($job->CheckPosterEmail())
	{
		// post published
		$nicu->MailPublishToUser($job->GetInfo());	
		$html_title = 'Congratulations, your job ad was published! / ' . SITE_NAME;
		$smarty->assign('first_time_post', 0);
	}
	else
	{
		// post in pending status
		$nicu->MailPublishPendingToUser($job->mPosterEmail);	
		$html_title = 'Your job ad was successfully posted! / ' . SITE_NAME;
		$smarty->assign('first_time_post', 1);
	}
	$job->Publish();
	$job_title = BASE_URL . 'job/' . $job->mId . '/' . $job->mUrlTitle . '/';
	$smarty->assign('auth', $job->GetAuth());
	$smarty->assign('job_url', $job_title);
	$template = 'publish-confirmation.tpl';
?>