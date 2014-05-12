<?php
	$job = new Job($id);
	if ($extra != '' && $extra == $job->GetAuth())
	{
		$later_edit = true;
		$_SESSION['later_edit'] = $extra;
	}
	else
	{
		$later_edit = false;
		$_SESSION['later_edit'] = '';
	}
	
	if ($_SESSION['referer'] != BASE_URL . 'post/')
	{
		if (!$_SESSION['later_edit'])
		{
			redirect_to(BASE_URL . URL_JOB .'/' . $id . '/');
			exit;
		}
	}
	
	$jobInfo = $job->GetInfo();
	$smarty->assign('job', $jobInfo);
	$html_title = stripslashes($jobInfo['title']) . ' at ' . stripslashes($jobInfo['company']) . ' / ' . SITE_NAME;
	$template = 'publish-verify.tpl';
?>
