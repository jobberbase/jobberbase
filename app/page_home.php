<?php
	define('NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET', 7);
	define('NUMBER_OF_LATEST_JOBS_TO_GET', 7);
	
	// get jobs
	$smarty->assign('jobs_count_all', $job->CountJobs());
	
	if (SIDEBAR_SHOW_WHAT == SIDEBAR_CATEGORIES)
	{
		$smarty->assign('jobs_count_all_categs', $job->GetJobsCountForAllCategs());
	}
	else
	{
		$smarty->assign('jobs_count_per_city', $job->GetJobsCountPerCity(SIDEBAR_ONLY_CITIES_WITH_JOBS));
	}
	
	$smarty->assign('most_applied_to_jobs', $job->GetMostAppliedToJobs(NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET));
	
	$smarty->assign('latest_jobs', $job->GetJobs(0, 0, NUMBER_OF_LATEST_JOBS_TO_GET, 0, 0));
	
	$smarty->assign('spotlight_jobs', $job->GetJobs(0, 0, 3, 1, 0, 0, 0, 0, 1));

	$smarty->assign('current_category', 'home');
	
	$smarty->assign('seo_title', $translations['homepage']['seo_title']);
    $smarty->assign('seo_desc', $translations['homepage']['seo_description']);
    $smarty->assign('seo_keys', $translations['homepage']['seo_keywords']);
	
	$template = 'index.tpl';
?>