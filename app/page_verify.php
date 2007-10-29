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
	}
	
	if ($_SESSION['referer'] != BASE_URL . 'post/')
	{
		if (!$_SESSION['later_edit'])
		{
			redirect_to(BASE_URL . 'job/' . $id . '/');
			exit;
		}
	}
	
	$jobs = $job->GetInfo();
	if (strstr($jobs['description'], '*'))
	{
		$jobs['description'] = $textile->TextileThis($jobs['description']);	
	}
	else
	{
		//$jobs['description'] = nl2br($jobs['description']);
		$jobs['description'] = str_replace(array("\r\n", "\r", "\n"), "<br />", $jobs['description']);
	}
	$smarty->assign('job', $jobs);
	$html_title = stripslashes($jobs['title']) . ' la ' . stripslashes($jobs['company']) . ' / ' . SITE_NAME;
	$template = 'publish-verify.tpl';
?>