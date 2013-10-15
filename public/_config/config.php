<?php
/**
 * Config - jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com> <filipcte@gmail.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */
  
	define('APP_PATH', dirname(dirname(__FILE__)).'/');

	// Environments setup
	require_once APP_PATH . '_config/config.envs.php';

	if(isset($_SERVER['SCRIPT_NAME'])) 
	{
		// on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
		// @modified Chis Florinel <chis.florinel@candoo.ro>
		$app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/\\');	
		define('_APP_MAIN_DIR', $app_main_dir);
  	} 
	else 
	{
		die('[config.php] Cannot determine APP_MAIN_DIR, please set manual and comment this line');
  	}
	

	// Function and classes includes
	require_once APP_PATH . '_lib/class.Translator.php';
	require_once APP_PATH . '_lib/function.validate_email.php';
	require_once APP_PATH . '_lib/function.redirect_to.php';
	require_once APP_PATH . '_lib/function.printr.php';
	require_once APP_PATH . '_lib/function.escape.php';
	require_once APP_PATH . '_lib/functions.php';
	require_once APP_PATH . '_lib/recaptchalib.php';
	require_once APP_PATH . '_lib/CacheLite/Lite.php';
	require_once APP_PATH . '_lib/class.Cache.php';
	require_once APP_PATH . '_lib/class.phpmailer.php';
	require_once APP_PATH . '_lib/class.Postman.php';
	require_once APP_PATH . '_lib/class.Sanitizer.php';
	require_once APP_PATH . '_lib/class.Subscriber.php';
	require_once APP_PATH . '_lib/class.Db.php';
	// comment the previous line and uncomment the next line if you get a Class 'mysqli' not found error
	// require_once APP_PATH . '_lib/class.Db.MySql.php';
	require_once APP_PATH . '_lib/class.Job.php';
	require_once APP_PATH . '_lib/class.Paginator.php';
	require_once APP_PATH . '_lib/class.Feed.php';
	require_once APP_PATH . '_lib/class.SpamReport.php';
	require_once APP_PATH . '_lib/class.Api.php';
	require_once APP_PATH . '_lib/class.JobApplication.php';
	require_once APP_PATH . '_lib/class.SearchKeywords.php';
	require_once APP_PATH . '_lib/class.JobberSettings.php';
	require_once APP_PATH . '_lib/class.FormValidator.php';
	require_once APP_PATH . '_lib/smarty/libs/Smarty.class.php';


	// Setup database connection
	try 
	{
		$db = new Db(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
		$db->Execute('SET NAMES UTF8');
	}
	catch(ConnectException $exception) 
	{
		if (ENVIRONMENT == 'dev')
		{
			echo "Database Connection Error:<br />";
			print_r($exception->getMessage());	
		}
	}
	
	
	// Setup cache
    define('USE_CACHE', true);
    define('CACHE_SITE_SETTINGS', 'SITE_SETTINGS');
    define('CACHE_CATEGORIES', 'CATEGORIES');
    define('CACHE_NAVIGATION', 'NAVIGATION');
    define('CACHE_TYPES', 'TYPES');
    define('CACHE_JOBS', 'JOBS');
    define('CACHE_TRANSLATIONS', 'CACHE_TRANSLATIONS');

    $cache = new Cache(APP_PATH . '_cache/', null, USE_CACHE);


	// Setup settings
    $jobber_settings = new JobberSettings();

    if ($cache->testCache(CACHE_SITE_SETTINGS)) 
    {
        $settings = $cache->loadCache(CACHE_SITE_SETTINGS);
    } 
    else 
    {
        $settings = $jobber_settings->GetSettings();
        $cache->saveCache($settings, CACHE_SITE_SETTINGS);
    }	

	require_once APP_PATH . '_config/config.settings.php';
	
	
	// Setup translations
	$translator = new Translator(LANG_CODE);
	//$translations = $translator->getTranslations();
	
    if ($cache->testCache(CACHE_TRANSLATIONS . '_' . LANG_CODE))
    {
        $translations = $cache->loadCache(CACHE_TRANSLATIONS . '_' . LANG_CODE);
    }
    else
    {
        $translations = $translator->getTranslations();
        $cache->saveCache($translations, CACHE_TRANSLATIONS . '_' . LANG_CODE);
    }
	
	
	// Setup Smarty
	$smarty = new Smarty();
	$smarty->template_dir = APP_PATH . '_tpl' . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR;
	$smarty->compile_dir = APP_PATH .'_tpl' . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR . '_cache';
	
	
	// Split URL - get parameters
	$_app_info['params'] = array();
	
	if (isset($_SERVER['HTTP_X_ORIGINAL_URL']))
	{
		$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
	}
	if (isset($_SERVER['HTTP_X_REWRITE_URL']))
	{
		$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
	}		
	// if server is Apache:	
	if(REWRITE_MODE == 'apache_mod_rewrite' || REWRITE_MODE == 'iis_isapi_rewrite')
	{
		$newUrl = str_replace('/', '\/', _APP_MAIN_DIR);
	    $pattern = '/'.$newUrl.'/';   
	    $_url = preg_replace($pattern, '', $_SERVER['REQUEST_URI'], 1);
		$_tmp = explode('?', $_url);
		$_url = $_tmp[0];	
		
		if ($_url = explode('/', $_url))
		{
			foreach ($_url as $tag)
			{
				if ($tag)
				{
					$_app_info['params'][] = $tag;
				}
			}
		}
	}
	elseif(REWRITE_MODE == 'iis_url_rewrite')
	{
		if(isset($_GET['page']))
			$_app_info['params'][]  = $_GET['page'];
		if(isset($_GET['id']))
			$_app_info['params'][]  = $_GET['id'];
		if(isset($_GET['extra']))
			$_app_info['params'][]  = $_GET['extra'];
	}
	
	$page = (isset($_app_info['params'][0]) ? $db->real_escape_string($_app_info['params'][0]) : '');
	$id = (isset($_app_info['params'][1]) ? $db->real_escape_string($_app_info['params'][1]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
	date_default_timezone_set(TIMEZONE);
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
?>
