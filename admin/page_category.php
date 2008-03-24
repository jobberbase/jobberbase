<?php
	if ($extra == 'full-time')
	{
		$type_id = JOBTYPE_FULLTIME;
		$city_id = false;
	}
	else if ($extra == 'part-time')
	{
		$type_id = JOBTYPE_PARTTIME;
		$city_id = false;
	}
	else if ($extra == 'freelance')
	{
		$type_id = JOBTYPE_FREELANCE;
		$city_id = false;
	}
	else
	{
		$type_id = false;
		$city_id = false;
	}
	
	if($type_id && $id != 'all')
	{
		if ($job->IsValidCategory($id))
		{
			$jobCount =  $job->CountJobs($id, $type_id);
			$smarty->assign('jobs_count', $job->CountJobs($id, $type_id));
		}
		else
		{
			redirect_to(BASE_URL . 'page-unavailable/');
			exit;
		}
		
	}
	if (!$type_id && $id != 'all')
	{
		if ($job->IsValidCategory($id))
		{
			
			$jobCount =  $job->CountJobs($id);
			$smarty->assign('jobs_count', $job->CountJobs($id));
		}
		else
		{
			redirect_to(BASE_URL . 'page-unavailable/');
			exit;
		}
	}
	else if($id == 'all')
	{
		$jobCount =  $job->CountJobs();
		$smarty->assign('jobs_count', $job->CountJobs());
	}
	$paginator = new Paginator($jobCount, JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink(BASE_URL . "jobs/$id");
	$paginator->paginate();
	
	$firstLimit = $paginator->getFirstLimit();
	$lastLimit = $paginator->getLastLimit();
	
	
	
	$the_jobs = array();
	$the_jobs = $job->GetJobsPaginate(0, $id, $firstLimit, JOBS_PER_PAGE, 0, 0, false, $city_id, $type_id);

	$smarty->assign("pages",$paginator->pages_link);

	$smarty->assign('jobs', $the_jobs);
	$smarty->assign('current_category', $id);

	$html_title = 'Are you looking for ' . $extra . ' ' . $id . ' jobs?';
	$meta_description = '';

	$template = 'category.tpl';
?>