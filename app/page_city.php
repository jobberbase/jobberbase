<?php
	if ($extra == 'full-time')
	{
		$type_id = JOBTYPE_FULLTIME;
	}
	else if ($extra == 'part-time')
	{
		$type_id = JOBTYPE_PARTTIME;
	}
	else if ($extra == 'freelance')
	{
		$type_id = JOBTYPE_FREELANCE;
	}
	else
	{
		$type_id = false;
	}
	
	$city_ascii_name = urldecode($id);
	
	$city = get_city_id_by_asciiname($city_ascii_name);
	
	if ($city)
	{
		$city_id = $city['id'];
		
		$jobCount =  $job->GetJobsCountForCity($city_id, $type_id);
		$smarty->assign('jobs_count', $jobCount);
	}
	else
	{
		redirect_to(BASE_URL . 'page-unavailable/');
		exit;
	}
	
	$paginatorLink = BASE_URL . "jobs-in/$city_ascii_name";
	
	if (isset($extra))
		$paginatorLink .= "/$extra";
		
	$paginator = new Paginator($jobCount, JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink($paginatorLink);
	$paginator->paginate();
	
	$firstLimit = $paginator->getFirstLimit();
	$lastLimit = $paginator->getLastLimit();
	
	$the_jobs = array();
	$the_jobs = $job->GetJobsPaginate(0, $id, $firstLimit, JOBS_PER_PAGE, 0, 0, false, $city_id, $type_id);
	$smarty->assign("pages",$paginator->pages_link);

	$smarty->assign('jobs', $the_jobs);
	$smarty->assign('city_name', $city['name']);
	$smarty->assign('city_ascii_name', $city_ascii_name);

	$smarty->assign('seo_title', 'Jobs in ' . $city['name']);
	$smarty->assign('seo_desc', '');
	$smarty->assign('seo_keys', '');
	
	$template = 'city-jobs-header.tpl';
?>