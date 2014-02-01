<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */
	
	// config
	if(!file_exists('_config/config.php')) 
	{
	   die('[index.php] _config/config.php not found');
	}
	
	require_once '_config/config.php';
	
	define('BASE_URL', APP_URL);

	//////////////////////////////////////////////////////////////////////////
	
	$job = new Job();
	
	$meta_description = '';
	$meta_keywords = '';

	if(!isset($_SERVER['HTTP_REFERER'])) 
	{
	   $_SERVER['HTTP_REFERER'] = '';
	}
	
	switch($page)
	{
		// home
		case '':
			require_once 'page_home.php';
			break;
			
		// cities
		case URL_CITIES:
			require_once 'page_cities.php';
			break;
	
		// per category
		case URL_JOBS:
			require_once 'page_jobs.php';
			break;
			
		// per company
		case URL_JOBS_AT_COMPANY:
			require_once 'page_company.php';
			break;
			
		// per city
		case URL_JOBS_IN_CITY:
			require_once 'page_city.php';
			break;
			
		case 'jobs-in-other-cities':
			require_once 'page_other_cities.php';
			break;
			
		// search results
		case 'search':
			require_once 'page_search.php';
			break;

		// subscriptions management page
		case 'subscriptions':
			require_once 'page_subscriptions.php';
			break;

		case 'subscribe':
			require_once 'page_subscribe.php';
			break;

		// job post page, with the job's details
		case URL_JOB:
			require_once 'page_job.php';
			break;
	
		case 'send-to-friend':
			require_once 'page_sendtofriend.php';
			break;
			
		case 'apply-online':
			require_once 'page_apply.php';
			break;
		
		case 'report-spam':
			require_once 'page_reportspam.php';
			break;
			
		// create/edit a job post
		case 'post':
			if(!ENABLE_NEW_JOBS) { redirect_to(BASE_URL); exit; }
			require_once 'page_write.php';
			break;
		
		// verify the posted job
		case 'verify':
			if(!ENABLE_NEW_JOBS) { redirect_to(BASE_URL); exit; }
			require_once 'page_verify.php';
			break;
	
		// actually publish the job post
		case 'publish':
			if(!ENABLE_NEW_JOBS) { redirect_to(BASE_URL); exit; }
			require_once 'page_publish.php';
			break;
			
		case 'confirm':
			if(!ENABLE_NEW_JOBS) { redirect_to(BASE_URL); exit; }
			$job = new Job($id);
			$job_title = BASE_URL . URL_JOB .'/' . $job->mId . '/' . $job->mUrlTitle . '/';
			$smarty->assign('auth', $job->GetAuth());
			$smarty->assign('job_url', $job_title);
			$smarty->assign('postRequiresModeration', $extra);
			$smarty->assign('laterEdit', $_SESSION['later_edit']);
			unset($_SESSION['later_edit'], $_SESSION['referer']);
			$template = 'publish-confirmation.tpl';
			break;
			
		// deactivate a post
		case 'deactivate':
			require_once 'page_deactivate.php';
			break;
			
		// activate a post
		case 'activate':
			require_once 'page_activate.php';
			break;

		case 'view-applicants':
			require_once 'page_view_applicants.php';
			$flag = 1;
			break;

		// manage all posts
		case 'manage':
			require_once 'page_manage.php';
			$flag = 1;
			break;

		case 'rss':
			require_once 'page_rss.php';
			$html_title = 'RSS Feeds for ' . SITE_NAME;
			break;
			
		case 'sitemap':
			$html_title = 'Sitemap';
			$template = 'sitemap.tpl';
			break;
			
		case 'widgets':
			$html_title = 'Widgets - ' . SITE_NAME;
			$template = 'widgets.tpl';
			break;		
		
		// companies
		case URL_COMPANIES:
			require_once 'page_companies.php';
			break;
			
		case 'get-companies':
			require_once 'page_getcompanies.php';
			break;
			
		case 'job-unavailable':
			header("HTTP/1.1 404 Not Found");
			$html_title = 'Unavailable job / ' . SITE_NAME;
			$template = 'no-job.tpl';
			break;

        case 'sitemap.xml':
            generate_sitemap('xml');
            break;

        case 'sitemap.txt':
            generate_sitemap('txt');
            break;
		
		// custom pages, with fallback to the 404 error page
		default: 
			$result = $db->query('
				SELECT 
					* 
				FROM 
					'.DB_PREFIX.'pages 
				WHERE 
					url = "' . $db->real_escape_string($page) . '"
			');
			$pageData = $result->fetch_assoc();
			if (is_array($pageData)) {
				require_once 'page_page.php';
				$html_title = $pageData['page_title'] . ' - ' . SITE_NAME;
				$meta_keywords = $pageData['keywords'];
				$meta_description = $pageData['description'];
				$template = 'page.tpl';
			} else {
				header("HTTP/1.1 404 Not Found");
				// TO-DO: add suggestion if no trailing slash supplied
				$html_title = 'Page unavailable / ' . SITE_NAME;
				$template = 'error.tpl';
			}
			break;
	}

	// get jobs
	$smarty->assign('jobs_count_all', $job->CountJobs());

	if (SIDEBAR_SHOW_WHAT == 'categories')
	{
		$smarty->assign('jobs_count_all_categs', $job->GetJobsCountForAllCategs());
	}
	else
	{
		$numberOfJobsInOtherCities = $job->GetNumberOfJobsInOtherCities();

		$smarty->assign('jobs_count_in_other_cities', $numberOfJobsInOtherCities);
		$smarty->assign('hide_other_cities_in_sidebar', $numberOfJobsInOtherCities < SIDEBAR_ONLY_CITIES_WITH_AT_LEAST_NUMBER_OF_JOBS);

		$jobsCountPerCity = $job->GetJobsCountPerCity();

		// exclude the cities that don't have at least the specified number of jobs 
		foreach ($jobsCountPerCity as $index => $jobsPerCity)
		{
			if ($jobsPerCity['jobs_in_city'] < SIDEBAR_ONLY_CITIES_WITH_AT_LEAST_NUMBER_OF_JOBS)
				unset($jobsCountPerCity[$index]);
		}

		$smarty->assign('jobs_count_per_city', $jobsCountPerCity);
	}

	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('articles', get_articles());
	$smarty->assign('navigation', get_navigation());

	// list of available languages
	$smarty->assign('languages', $translator->getLanguages());

	// translations
	$smarty->assign('translator', $translator);
	$smarty->assign('translations', $translations);
	// create a JSON string from the translations array, but only for the "js" section
	$smarty->assign('translationsJson', iniSectionsToJSON(array('js' => $translations['js'])));
	
	$smarty->assign('THEME', $settings['theme']);
	$smarty->assign('CURRENT_PAGE', $page);
	$smarty->assign('CURRENT_ID', $id);
	$smarty->assign('BASE_URL', BASE_URL);
	$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);

	//Add the dynamic URL defitions to SMARTY
	$smarty->assign('URL_JOB', URL_JOB);
	$smarty->assign('URL_JOBS', URL_JOBS);
	$smarty->assign('URL_CITIES', URL_CITIES);
	$smarty->assign('URL_COMPANIES', URL_COMPANIES);
	$smarty->assign('URL_JOBS_IN_CITY', URL_JOBS_IN_CITY);
	$smarty->assign('URL_JOBS_AT_COMPANY', URL_JOBS_AT_COMPANY);
	
	if (isset($html_title) && $html_title != '')
		$smarty->assign('html_title', $html_title);
	if (isset($meta_description) && $meta_description != '')
		$smarty->assign('meta_description', $meta_description);
	if (isset($meta_keywords) && $meta_keywords != '')
		$smarty->assign('meta_keywords', $meta_keywords);

	$smarty->error_reporting = E_ALL & ~E_NOTICE;
	if (isset($template) && $template != '')
		$smarty->display($template);

	unset(
		$_SESSION['status'],
		$_SESSION['apply_mail_sent'],
		$_SESSION['apply_errors'],
		$_SESSION['apply_fields'],
		$_SESSION['apply_allowed'],
		$_SESSION['apply_successful'],
		$_SESSION['contact_msg_sent'],
		$_SESSION['contact_errors'],
		$_SESSION['contact_fields']
	);
?>
