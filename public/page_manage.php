<?php
$job = new Job($id);
if ($job->Exists() && $extra != '' && $extra == $job->GetAuth())
{
	$posterEmail = $job->getPosterEmail();
	$jobCount = $job->CountJobs(false, false, false, $posterEmail);
	$smarty->assign('jobs_count', $jobCount);
	
	$paginatorLink = BASE_URL . "manage/". $id ."/". $extra ."/";
	
	$paginator = new Paginator($jobCount, JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink($paginatorLink);
	$paginator->paginate();
	
	$firstLimit = $paginator->getFirstLimit();
	$lastLimit = $paginator->getLastLimit();
	
	$the_jobs = array();
	$the_jobs = $job->GetPaginatedJobsForPoster($posterEmail, $firstLimit, JOBS_PER_PAGE);
	$smarty->assign("pages",$paginator->pages_link);
	$smarty->assign('jobs', $the_jobs);
	$smarty->assign('poster_email', $posterEmail);
	$html_title = $translator->translate("manage.html_title"). ' / ' . SITE_NAME;

	$template = 'manage.tpl';
}
else
{
	redirect_to(BASE_URL . URL_JOB .'/' . $id . '/');
	exit;
}
?>
