<?php
/**
 * jobber job board platform - admin panel
 *
 * @author     Lavinia Creivean <links_clm@yahoo.com>
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original authors ;)
 *             (see license.txt).
 */

	require_once '../_config/config.php';
	require_once '../_lib/class.Types.php';
	
	$currentDirectoryNames = explode('/', dirname($_SERVER['PHP_SELF']));
	
	define('CURRENT_DIRECTORY', end($currentDirectoryNames));
	$smarty->template_dir = APP_PATH . CURRENT_DIRECTORY. '/_tpl/';
	$smarty->compile_dir = APP_PATH . CURRENT_DIRECTORY. '/_tpl/_cache/';

	define('BASE_URL_ORIG', APP_URL);
	define('BASE_URL', APP_URL . 'admin/');
	
	$page = (isset($_app_info['params'][0]) ? $db->real_escape_string($_app_info['params'][0]) : '');
	$id = (isset($_app_info['params'][1]) ? $db->real_escape_string($_app_info['params'][1]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
	//////////////////////////////////////////////////////////
	
	$js = array();
	if(!isset($_SERVER['HTTP_REFERER'])) {
	   $_SERVER['HTTP_REFERER'] = '';
	}
	
	$job = new Job();
	
	switch($page)
	{
		// home		
		case '':
			#show login page only if the admin is not logged in
			#else show homepage
			if(!isset($_SESSION['AdminId']))
			{
				require_once 'page_login.php';			
			}
			else
			{				
				require_once 'page_home.php';
			}
			break;

		case 'logout':
			if (isset($_SESSION['AdminId']))
			{			
				unset($_SESSION['AdminId']);
				redirect_to(BASE_URL);
				exit;
			}
			break;
			
		case 'home':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_home.php';
			break;

		case 'applicants':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_applicants.php';
			break;

		case 'translations':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_translations.php';
			break;

		case 'activate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_activate.php';
			break;

		case 'deactivate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_deactivate.php';
			break;

		case 'delete':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_delete.php';
			break;

		case URL_JOB:
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}			
			require_once 'page_job.php';
			break;

		case URL_JOBS:
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_category.php';
			break;

		case 'stats':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_stats.php';
			break;

		case 'pages':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_pages.php';
			break;
		case 'categories':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_categories.php';
			break;
		case 'types':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_types.php';
			break;
		case 'password':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_password.php';
			$html_title = 'Change password / ' . SITE_NAME;
			$template = 'password.tpl';
			break;
		case 'links':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_links.php';
			break;
		case 'settings':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_settings.php';
			break;
		case 'edit-post':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_edit_post.php';
			break;
		case 'activate-spotlight':
            if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            require_once 'page_activate_spotlight.php';
            break;
   		case 'deactivate-spotlight':
            if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            require_once 'page_deactivate_spotlight.php';
            break;
   		case 'cities':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_cities.php';
   			$citiesPage = new CitiesPage();
   			$template = $citiesPage->processRequest($id, $extra, $smarty);
   			break;
		default:
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			header("HTTP/1.1 404 Not Found");
			$html_title = 'Page unavailable / ' . SITE_NAME;
			$template = 'error.tpl';
			break;
	}
	
	// list of available languages
	$smarty->assign('languages', $translator->getLanguages());

	// translations
	$smarty->assign('translations', $translations);
	// create a JSON string from the translations array, but only for the "js" section
	$smarty->assign('translationsJson', iniSectionsToJSON(array('js' => $translations['js'])));
	
	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('settings_categories', $jobber_settings->GetSettingsCategories());

	// get menus
	$smarty->assign('menus', get_menus());

	//Add the dynamic URL defitions to SMARTY
	$smarty->assign('URL_JOB', URL_JOB);
	$smarty->assign('URL_JOBS', URL_JOBS);
	$smarty->assign('URL_CITIES', URL_CITIES);
	$smarty->assign('URL_COMPANIES', URL_COMPANIES);
	$smarty->assign('URL_JOBS_IN_CITY', URL_JOBS_IN_CITY);
	$smarty->assign('URL_JOBS_AT_COMPANY', URL_JOBS_AT_COMPANY);
	
	$smarty->assign('THEME', $settings['theme']);
	$smarty->assign('CURRENT_PAGE', $page);
	$smarty->assign('CURRENT_ID', $id);
	$smarty->assign('CURRENT_DIRECTORY', CURRENT_DIRECTORY);
	$smarty->assign('BASE_URL', BASE_URL_ORIG);
	$smarty->assign('BASE_URL_ADMIN', BASE_URL);
	$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);
	if(isset($_SESSION['AdminId']))
		$smarty->assign('isAuthenticated', 1);
	else
		$smarty->assign('isAuthenticated', 0);
	$smarty->assign('js', $js);
	$smarty->error_reporting = E_ALL & ~E_NOTICE;
	if (isset($template) && $template != '')
		$smarty->display($template);
?>
