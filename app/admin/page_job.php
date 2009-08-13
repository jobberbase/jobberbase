<?php
	$job_flag = false;
	$count = 0;
	
	$job = new Job($id);
	if ($job->Exists() && $job->GetTempStatus() == 0)
	{
		$info = $job->GetInfo();
		// if visitor comes from an outside website, record the referer
		
		$job_flag = true;
		$url = BASE_URL . URL_JOB .'/' . $id . '/' . $info['url_title'] . '/';
		
		
		$app = new JobApplication($id);
		$info['applied_count'] = $app->Count();
		
		if (strstr($info['description'], '*'))
		{
			$txt = new Textile();
			$info['description'] = $txt->TextileThis($info['description']);	
		}
		else
		{
			//$info['description'] = nl2br($info['description']);
			$info['description'] = str_replace(array("\r\n", "\r", "\n"), "<br />", $info['description']);
		}

		$smarty->assign('job', $info);
		
		$html_title = stripslashes($info['title']) . ' la ' . stripslashes($info['company']) . ' / ' . SITE_NAME;
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$currentLinksPage = explode('/', rtrim($_SERVER['HTTP_REFERER'], '/')); 
			if(strcmp(end($currentLinksPage), 'home') == 0)
				$smarty->assign('back_link', BASE_URL . 'home/');
			else
				$smarty->assign('back_link', BASE_URL . URL_JOBS . '/' . $job->GetCategVarname($info['category_id']) . '/');
		}
		else
		{
			$smarty->assign('back_link', BASE_URL . URL_JOBS . '/' . $job->GetCategVarname($info['category_id']) . '/');
		}
		$smarty->assign('current_category', $job->GetCategVarname($info['category_id']));
		
		$template = 'job.tpl';
	}
	else
	{
		redirect_to(BASE_URL . 'job-unavailable/');
		exit;
	}
?>