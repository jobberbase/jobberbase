<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */

	session_start();
	require_once 'config.php';
	
	$page = (isset($_app_info['params'][0]) ? $db->real_escape_string($_app_info['params'][0]) : '');
	$id = (isset($_app_info['params'][1]) ? $db->real_escape_string($_app_info['params'][1]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
	$flag = 0;
	
	$job = new Job();
	
	$meta_description = '';
	$meta_keywords = '';
	
	switch($page)
	{
		// home
		case '':
			require_once 'page_home.php';
			$flag = 1;
			break;
			
		// per category
		case 'jobs':
			require_once 'page_category.php';
			$flag = 1;
			break;
			
		// per company
		case 'jobs-at':
			require_once 'page_company.php';
			$flag = 1;
			break;
			
		// search results
		case 'search':
			require_once 'page_search.php';
			$flag = 1;
			break;
						
		// job post page, with the job's details
		case 'job':
			require_once 'page_job.php';
			$flag = 1;
			break;
	
		case 'send-to-friend':
			require_once 'page_sendtofriend.php';
			$flag = 1;
			break;
			
		case 'apply-online':
			require_once 'page_apply.php';
			$flag = 1;
			break;
		
		case 'report-spam':
			require_once 'page_reportspam.php';
			$flag = 1;
			break;
			
		// create/edit a job post
		case 'post':
			require_once 'page_write.php';
			$flag = 1;
			break;
		
		// verify the posted job
		case 'verify':
			require_once 'page_verify.php';
			$flag = 1;
			break;
	
		// actually publish the job post
		case 'publish':
			require_once 'page_publish.php';
			$flag = 1;
			break;
			
		// deactivate a post
		case 'deactivate':
			require_once 'page_deactivate.php';
			$flag = 1;
			break;
			
		// activate a post
		case 'activate':
			require_once 'page_activate.php';
			$flag = 1;
			break;
			
		case 'rss':
			require_once 'page_rss.php';
			$flag = 1;
			break;

		// static 'about' page
		case 'about':
			$html_title = 'About Us / ' . SITE_NAME;
			$template = 'about.tpl';
			$flag = 1;
			break;

		// static 'contact' page
		case 'contact':
			$html_title = 'Contact Us / ' . SITE_NAME;
			$template = 'contact.tpl';
			$flag = 1;
			break;

		// send contact message (ajaxified)
		case 'contact-msg':
			require_once 'page_contact.php';
			$flag = 1;
			break;

		// static 'widget' page
		case 'widgets':
			$html_title = 'Widgets / ' . SITE_NAME;
			$template = 'widgets.tpl';
			$flag = 1;
			break;
			
		case 'stats':
			require_once '_includes/class.Stats.php';
			$stats = new Stats();
			$smarty->assign('applications', $stats->Applications());
			$smarty->assign('keywordz', $stats->Keywords());
			$template = 'stats.tpl';
			$flag = 1;
			break;
			
		// companies
		case 'companies':
			require_once 'page_companies.php';
			$flag = 1;
			break;
			
		case 'get-companies':
			require_once 'page_getcompanies.php';
			$flag = 1;
			break;

		case 'job-unavailable':
			$html_title = 'Unavailable job / ' . SITE_NAME;
			$template = 'no-job.tpl';
			$flag = 1;
			break;
		
		// 404 etc. error page
		case 'page-unavailable':
			// TO-DO: add suggestion if no trailing slash supplied
			$html_title = 'Page unavailable / ' . SITE_NAME;
			$template = 'error.tpl';
			$flag = 1;
			break;
		
		default: 
			$flag = 0;	
			break;
	}
	// if page not found
	if ($flag == 0)
	{
		redirect_to(BASE_URL . 'page-unavailable/');
	}
	
	if(!isset($_SERVER['HTTP_REFERER'])) {
	   $_SERVER['HTTP_REFERER'] = '';
	}
	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('cities', get_cities());
	
	$smarty->assign('CURRENT_PAGE', $page);
	$smarty->assign('CURRENT_ID', $id);
	$smarty->assign('BASE_URL', BASE_URL);
	$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);
	
	if (isset($html_title) && $html_title != '')
		$smarty->assign('html_title', $html_title);
	if (isset($meta_description) && $meta_description != '')
		$smarty->assign('meta_description', $meta_description);
	if (isset($meta_keywords) && $meta_keywords != '')
		$smarty->assign('meta_keywords', $meta_keywords);

	if (isset($template) && $template != '')
		$smarty->display($template);
?>