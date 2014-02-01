<?php
$job = new Job($id);
if ($job->Exists() && $extra != '' && $extra == $job->GetAuth())
{
	$info = $job->GetInfo();
	
	$url = BASE_URL . URL_JOB .'/' . $id . '/' . $info['url_title'] . '/';
	
	$app = new JobApplication($id);
	$apps_count = $app->Count();
	$info['applied_count'] = $apps_count;
	
	$smarty->assign('count_applicants', $apps_count);
	$smarty->assign('job', $info);
	
	$category = get_category_by_id($info['category_id']);
	
	// set paginator link
	$paginatorLink = BASE_URL . 'view-applicants/'. $id .'/'. $extra .'/';
	
	$paginator = new Paginator($apps_count, JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink($paginatorLink);
	$paginator->paginate();
	
	$from = $paginator->getFirstLimit();
	$to = $paginator->getLastLimit();
	
	// grab all jobs applied
	$the_applicants = $app->getAllForJob($from, JOBS_PER_PAGE);
	$smarty->assign('applicants', $the_applicants);
	
	// send page links to template
	$smarty->assign('pages', $paginator->pages_link);
	$smarty->assign('seo_title', $translator->translate("jobs.html_title", stripslashes($info['title']), stripslashes($info['company']), SITE_NAME));
	$smarty->assign('cv_path', BASE_URL . FILE_UPLOAD_DIR);
	$smarty->assign('current_category', $category['var_name']);
	$smarty->assign('back_link', BASE_URL . 'manage/' . $id . '/' . $extra . '/');
	
	$template = 'job-applications.tpl';
}
else
{
	redirect_to(BASE_URL . URL_JOB .'/' . $id . '/');
	exit;
}

?>
