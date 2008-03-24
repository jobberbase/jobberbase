<?php
	
	$the_jobs = $job->GetInactiveJobs(false);
	
	
	$paginator = new Paginator($the_jobs, 50, @$_REQUEST['p']);
  	$paginator->setLink(BASE_URL.'home');
  	$the_jobs = $paginator->paginate();

	$smarty->assign("pages",$paginator->pages_link);

	$smarty->assign('jobs', $the_jobs);
	
	$template = 'index.tpl';
	
?>