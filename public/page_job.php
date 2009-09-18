<?php
	$sanitizer = new Sanitizer();
	$smarty->assign('the_captcha', recaptcha_get_html(CAPTCHA_PUBLIC_KEY));
	$smarty->assign('ENABLE_RECAPTCHA', ENABLE_RECAPTCHA);

	$job_flag = false;
	$count = 0;
	
	if(!isset($_SESSION['search_results'])) {
	       $_SESSION['search_results'] = array();
	}
	if(!isset($_SESSION['search_keywords'])) {
	       $_SESSION['search_keywords'] = array();
	}
	
	
	for ($i = 0; $i < count($_SESSION['search_results']); $i++)
	{
		if ($_SESSION['search_results'][$i]['id'] == $id)
		{
			$next = array_slice($_SESSION['search_results'], $count + 1);
			$prev = array_slice($_SESSION['search_results'], 0, $count);
			$job_flag = true;
			break;
		}
		$count++;
	}
	if ($job_flag)
	{
		$smarty->assign('previous_results', $prev);
		$smarty->assign('next_results', $next);
		$smarty->assign('previous_result', $prev?$prev[count($prev) - 1]:'');
		$smarty->assign('next_result', $next?$next[0]:'');	
	}
	else
	{
		unset($_SESSION['search_results']);
	}

	// save recorded keywords, if available
	if ($_SESSION['search_keywords'])
	{
		$search = new SearchKeywords($_SESSION['search_keywords']);
		$search->Save();
		unset($_SESSION['search_keywords']);
	}

	$job = new Job($id);
	if ($job->Exists() && $job->GetTempStatus() == 0 && $job->GetActiveStatus() == 1)
	{
		$info = $job->GetInfo();
		// if visitor comes from an outside website, record the referer
		if (!empty($outside_referer))
		{
			redirect_to(BASE_URL . URL_JOB .'/' . $id . '/' . $info['url_title'] . '/');
		}
		else
		{
			$job->IncreaseViewCount();
		}

		$job_flag = true;
		
		$url = BASE_URL . URL_JOB .'/' . $id . '/' . $info['url_title'] . '/';
		$current_url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		
		if ($current_url != $url) redirect_to($url, 301);
		
		if (!empty($_SESSION['last_viewed_jobs']))
		{
			foreach ($_SESSION['last_viewed_jobs'] as $item)
			{
				if ($item['url'] == $url)
				{
					$job_flag = false;
				}
			}	
		}
		else
		{
			$_SESSION['last_viewed_jobs'] = array();
		}
		
		if ($job_flag)
		{
			array_unshift($_SESSION['last_viewed_jobs'], array('url' => $url, 'title' => stripslashes($job->mTitle)));		
		}
		
		if (count($_SESSION['last_viewed_jobs']) > 10)
		{
			array_pop($_SESSION['last_viewed_jobs']);
		}
		
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
		
		// ######### list other jobs by the same company #########
		$compjobs = $job->ApiGetJobsByCompany($info['company'], 5, false);
		$sanitizedcomp = $sanitizer->sanitize_title_with_dashes($info['company']);
		$smarty->assign('compjobs', $compjobs);
		$smarty->assign('jobsat', $sanitizedcomp);
		// ######### list other jobs by the same company #########
		
		$smarty->assign('job', $info);
		
		$categVarName = $job->GetCategVarname($info['category_id']);
		
		$smarty->assign('seo_desc', get_seo_desc($categVarName));
		$smarty->assign('seo_keys', get_seo_keys($categVarName));
	
		$html_title = stripslashes($info['title']) . ' ' . $translations['jobs']['preposition_at'] . ' ' . stripslashes($info['company']) . ' / ' . SITE_NAME;
		$smarty->assign('current_category', $categVarName);
		$smarty->assign('back_link', BASE_URL . URL_JOBS . '/' . $job->GetCategVarname($info['category_id']) . '/');
		$template = 'job.tpl';
	}
	else
	{
		redirect_to(BASE_URL . 'job-unavailable/');
		exit;
	}
?>