<?php
/**
 * Define environments
 *
 */

// local
$__instances['local'] = array(
	// The prefix should be a unique part of the url (not including protocol name or auth info; see below).
	'prefix' => 'jobberbase.local',
	// mysql credentials
	'db_host' => 'localhost',
	'db_port' => 3306,
	'db_user' => 'root',
	'db_password' => 'root',
	'db_name' => 'jobberbase',
	'db_prefix' => '',
	// your site's full url
	'app_url' => 'http://jobberbase.local/',
	// language to use
	'lang_code' => 'en',
	// error reporting
	'ini_error_reporting' => E_ALL,
	'ini_display_errors' => 'On',
	// environment setting 1 (use 'local' for localhost/testing OR 'online' for live, production environment)
	'location' => 'local',
	// environment setting 2 (use 'dev' together with 'local' in the previous setting OR 'prod' with 'online')
	'environment' => 'dev',
	//'apache_mod_rewrite', 'iis_url_rewrite' -microsoft URL Rewrite module, 'iis_isapi_rewrite'
	'rewrite_mode' => 'apache_mod_rewrite'
);

// live
$__instances['live'] = array(
	'prefix' => 'yourjobberbasedomain.com',
	'db_host' => 'localhost',
	'db_port' => 3306,
	'db_user' => 'root',
	'db_password' => '',
	'db_name' => 'jobberbase',
	'db_prefix' => '',
	'app_url' => 'http://www.yourjobberbasedomain.com/',
	// language to use
	'lang_code' => 'en',
	'ini_error_reporting' => E_ALL,
	'ini_display_errors' => 'Off',
	'location' => 'online',
	'environment' => 'prod',
	'rewrite_mode' => 'apache_mod_rewrite'
);


// http requests
if (isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI']))
{
	$_compare_to = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

// setup current instance
foreach ($__instances as $__instance)
{
	if (strstr($_compare_to, $__instance['prefix']))
	{
		define('DB_HOST', $__instance['db_host']);
		define('DB_PORT', $__instance['db_port']);
		define('DB_USER', $__instance['db_user']);
		define('DB_PASS', $__instance['db_password']);
		define('DB_NAME', $__instance['db_name']);
		define('DB_PREFIX', $__instance['db_prefix']);

		// values kind of redundant, they indicate wether this is a live/production or dev/testing environment
		define('LOCATION', $__instance['location']);
		define('ENVIRONMENT', $__instance['environment']);
		
		$app_url = $__instance['app_url'];
		
		$indexOfLastSlash = strrpos($app_url, "/");
		$expectedIndexOfLastSlash = strlen($app_url) - 1;

		// manually add an ending slash to the app_url if the user didn't specify it
		if ($indexOfLastSlash && $indexOfLastSlash != $expectedIndexOfLastSlash )
			$app_url .= '/';
			
		// base url of the app
		define('APP_URL', $app_url);
		define('REWRITE_MODE', $__instance['rewrite_mode']);
		
		// error reporting
		ini_set('error_reporting', $__instance['ini_error_reporting']);
		ini_set('display_errors', $__instance['ini_display_errors']);

		define('LANG_CODE', $__instance['lang_code']);
		
		break;
	}
}

if(!defined('DB_HOST'))
{
	die('None of the configured JobberBase instances matched your request!<br />If you are an admin of this JobberBase installation, you may want to review the \'prefix\' values of the configured JobberBase instances in config.envs.php.');
}
?>