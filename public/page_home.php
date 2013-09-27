<?php
	define('NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET', $settings['most_applied_jobs']);
	define('NUMBER_OF_LATEST_JOBS_TO_GET', $settings['latest_jobs']);
	define('NUMBER_OF_SPOTLIGHT_JOBS_TO_GET', $settings['spotlight_jobs']);

	$smarty->assign('most_applied_to_jobs', $job->GetMostAppliedToJobs(NUMBER_OF_MOST_APPLIED_TO_JOBS_TO_GET));

	$smarty->assign('latest_jobs', $job->GetJobs(0, 0, NUMBER_OF_LATEST_JOBS_TO_GET, 0, 0));

	$smarty->assign('spotlight_jobs', $job->GetJobs(0, 0, NUMBER_OF_SPOTLIGHT_JOBS_TO_GET, 1, 0, 0, 0, 1));

	$smarty->assign('current_category', 'home');

	$smarty->assign('seo_title', htmlspecialchars($settings['html_title']));
	$smarty->assign('seo_desc', htmlspecialchars($settings['meta_description']));
	$smarty->assign('seo_keys', htmlspecialchars($settings['meta_keywords']));
	
	$template = 'index.tpl';
?>
