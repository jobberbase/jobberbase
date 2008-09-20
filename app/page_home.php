<?php
	define('NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET', 7);
	define('NUMBER_OF_LATEST_JOBS_TO_GET', 7);
	
	// get jobs
	$smarty->assign('jobs_count_all', $job->CountJobs());
	$smarty->assign('jobs_count_all_categs', $job->GetJobsCountForAllCategs());
	
	$smarty->assign('most_applied_to_jobs', $job->GetMostAppliedToJobs(NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET));
	
	$smarty->assign('latest_jobs', $job->GetJobs(0, 0, NUMBER_OF_LATEST_JOBS_TO_GET, 0, 0));

	$smarty->assign('current_category', 'home');
	
	$html_title = $translations['homepage']['title'] . SITE_NAME;
	$template = 'index.tpl';
?>