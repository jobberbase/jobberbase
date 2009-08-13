<?php
	define('NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET', $settings['most_applied_jobs']);
	define('NUMBER_OF_LATEST_JOBS_TO_GET', $settings['latest_jobs']);
	define('NUMBER_OF_SPOTLIGHT_JOBS_TO_GET', $settings['spotlight_jobs']);

	// get jobs
	$smarty->assign('jobs_count_all', $job->CountJobs());

	if (SIDEBAR_SHOW_WHAT == 'categories')
	{
		$smarty->assign('jobs_count_all_categs', $job->GetJobsCountForAllCategs());
	}
	else
	{
		SIDEBAR_ONLY_CITIES_WITH_JOBS == 'yes' ? $only_with_jobs = true : $only_with_jobs = false;
		$smarty->assign('jobs_count_per_city', $job->GetJobsCountPerCity($only_with_jobs));
	}

	$smarty->assign('most_applied_to_jobs', $job->GetMostAppliedToJobs(NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET));

	$smarty->assign('latest_jobs', $job->GetJobs(0, 0, NUMBER_OF_LATEST_JOBS_TO_GET, 0, 0));

	$smarty->assign('spotlight_jobs', $job->GetJobs(0, 0, NUMBER_OF_SPOTLIGHT_JOBS_TO_GET, 1, 0, 0, 0, 0, 1));

	$smarty->assign('current_category', 'home');

	$smarty->assign('seo_title', $settings['html_title']);
	$smarty->assign('seo_desc', $settings['meta_description']);
	$smarty->assign('seo_keys', $settings['meta_keywords']);
	
	$template = 'index.tpl';
?>