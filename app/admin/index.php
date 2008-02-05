<?php
/**
 * jobber job board platform - admin panel
 *
 * @author     Lavinia Creivean <links_clm@yahoo.com>
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original authors ;)
 *             (see license.txt).
 */

	session_start();
	if(!file_exists('config.php')) {
	   die('[index.php] config.php not found, please rename config.default.php to config.php');
	}
	require_once 'config.php';
	
	$page = (isset($_app_info['params'][0]) ? $db->real_escape_string($_app_info['params'][0]) : '');
	$id = (isset($_app_info['params'][1]) ? $db->real_escape_string($_app_info['params'][1]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
	$flag = 0;
	if(!isset($_SERVER['HTTP_REFERER'])) {
	   $_SERVER['HTTP_REFERER'] = '';
	}
	
	$job = new Job();
	
	switch($page)
	{
		// home
		case '':
			require_once 'page_login.php';
			$flag = 1;
			break;

		case 'logout':
			$flag = 1;
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
			$flag = 1;
			break;

		case 'activate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_activate.php';
			$flag = 1;
			break;

		case 'deactivate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_deactivate.php';
			$flag = 1;
			break;

		case 'delete':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_delete.php';
			$flag = 1;
			break;

		case 'jobs':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_category.php';
			$flag = 1;
			break;

		case 'page-unavailable':
			$html_title = 'Page unavailable / ' . SITE_NAME;
			$template = 'error.tpl';
			$flag = 1;
			break;

		case 'pages':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_pages.php';
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
	
	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('cities', get_cities());
	
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
	if (isset($template) && $template != '')
		$smarty->display($template);
?>