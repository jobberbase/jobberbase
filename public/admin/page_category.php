<?php
	$category_var_name = $id;
	if ($category_var_name != 'all')
	{
		$category = get_category_by_var_name($category_var_name);
		$category_id = $category['id'];
	}
	else
	{
		$category = $category_var_name;
	}
	
	$type_var_name = $extra;
	$type_id = get_type_id_by_varname($type_var_name);
	
	$jobsCount = 0;

	if ($category != 'all')
	{
		$jobsCount = $type_id ? $job->CountJobs($id, $type_id) : $job->CountJobs($id);
	}
	else
	{
		$jobsCount =  $job->CountJobs();
	}
	
	$paginatorLink = BASE_URL . URL_JOBS . "/$category_var_name";

	if (isset($type_var_name))
		$paginatorLink .= "/$type_var_name";
		
	$paginator = new Paginator($jobsCount, JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink($paginatorLink);
	$paginator->paginate();
	
	$firstLimit = $paginator->getFirstLimit();
	$lastLimit = $paginator->getLastLimit();
	
	if ($category != 'all')
	{
		$the_jobs = $job->GetPaginatedJobsForCategory($category_id, $firstLimit, JOBS_PER_PAGE, $type_id);
	}
	else
	{
		$the_jobs = $job->GetPaginatedJobs($firstLimit, JOBS_PER_PAGE, $type_id);
	}
	
	
	$statisticalData = array();
	$spamReportStatisticalData = array();
	
	if (count($the_jobs))
	{
		$jobIDs = array();
		
		foreach ($the_jobs as $index => $aJob)
			$jobIDs[] = $aJob['id'];
		
		$statisticalData = $job->GetApplicationsStatistics($jobIDs);
		$spamReportStatisticalData = $job->GetSpamReportStatistics($jobIDs);
	}

	$smarty->assign("pages", $paginator->pages_link);
	
	$smarty->assign('statisticalData', $statisticalData);
	$smarty->assign('spamReportStatisticalData', $spamReportStatisticalData);
	$smarty->assign('jobs', $the_jobs);
	$smarty->assign('jobs_count', $jobsCount);
	$smarty->assign('types', get_types());
	$smarty->assign('current_category', $category_var_name);
	$smarty->assign('current_category_name', ($category != 'all' ? $category['name'] : 'all categories'));

	$template = 'category.tpl';
?>