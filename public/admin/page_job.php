<?php
	
	$job = new Job($id);
	
	if ($job->Exists() && $job->GetTempStatus() == 0)
	{
		$info = $job->GetInfo();
		
		$app = new JobApplication($id);
		$info['applicants'] = $app->getAllForJob();

		$smarty->assign('job', $info);
		$smarty->assign('applicants', $info['applicants']);
		$smarty->assign('cv_path', '/' . FILE_UPLOAD_DIR);
		
		$category = get_category_by_id($info['category_id']);
		$category_var_name = $category['var_name'];
		
		$html_title = stripslashes($info['title']) . ' la ' . stripslashes($info['company']) . ' / ' . SITE_NAME;
		
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$currentLinksPage = explode('/', rtrim($_SERVER['HTTP_REFERER'], '/')); 
			
			if(strcmp(end($currentLinksPage), 'home') == 0)
			{
				$smarty->assign('back_link', BASE_URL . 'home/');
			}
			else
			{
				$smarty->assign('back_link', (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL . URL_JOBS . '/' . $category_var_name . '/'));
			}
		}
		else
		{
			$smarty->assign('back_link', (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL . URL_JOBS . '/' . $category_var_name . '/'));
		}
		
		$smarty->assign('current_category', $category_var_name);
		
		$template = 'job.tpl';
	}
	else
	{
		redirect_to(BASE_URL . 'job-unavailable/');
		exit;
	}
?>
