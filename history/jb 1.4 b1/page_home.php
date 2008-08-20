<?php
	// get jobs
	$smarty->assign('jobs_count_all', $job->CountJobs());
	$smarty->assign('jobs_count_all_categs', $job->GetJobsCountForAllCategs());
	
	$smarty->assign('most_applied_to_jobs', $job->GetMostAppliedToJobs(7));
	
	$smarty->assign('jobs_count', $job->CountJobs());
	
	$smarty->assign('latest_jobs', $job->GetJobs(0, 0, 7, 0, 0));

	$smarty->assign('current_category', 'home');
	
	$html_title = $translations['homepage']['title'] . SITE_NAME;
	$template = 'index.tpl';
?>