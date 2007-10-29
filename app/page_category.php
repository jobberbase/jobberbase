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
	
	if ($id != 'all')
	{
		if ($job->IsValidCategory($id))
		{
			$smarty->assign('jobs_count', $job->CountJobs($id));
		}
		else
		{
			redirect_to(BASE_URL . 'page-unavailable/');
			exit;
		}
	}
	else
	{
		$smarty->assign('jobs_count', $job->CountJobs());
	}
	$the_jobs = $job->GetJobs(0, $id, 0, 0, 0, false, $city_id, $type_id);

	$smarty->assign('jobs', $the_jobs);
	$smarty->assign('current_category', $id);

	$html_title = 'Are you looking for ' . $extra . ' ' . $id . ' jobs?';
	$meta_description = '';

	$template = 'category.tpl';
?>