<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */
  
	header('Content-Type: text/html; charset=UTF-8');
  	ini_set('display_errors', 'Off');
	error_reporting(E_ALL ^ E_STRICT);
	
	date_default_timezone_set('Europe/Bucharest');

	// MySQL + misc settings for local environment
	if ($_SERVER['SERVER_NAME'] == 'localhost')
	{
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_NAME', 'jobberbase');
		define('LOCATION', 'local');
		define('ENVIRONMENT', 'dev');
	}
	// MySQL + misc settings for production environment
	else
	{
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_NAME', 'jobberbase');
		define('LOCATION', 'online');
		define('ENVIRONMENT', 'prod');
	}

	// Global settings definitions
	define('NOTIFY_EMAIL','YOUR_EMAIL_HERE@gmail.com');
	define('ADMIN_EMAIL','YOUR_EMAIL_HERE@gmail.com');
	define('SITE_NAME', 'jobberBase');

	define('MAX_CV_SIZE', 3000000); // approx. 3 mb
	define('FILE_UPLOAD_DIR', 'uploads/');
	define('JOBS_PER_PAGE', 50);
	
	/**
	 * The number of minutes that must pass between applications from the same IP address.
	 * If a user tries to apply again to a job before the specified number of minutes has
	 * passed, his application will be denied and he will get an error message.
	 * 
	 * This is needed to avoid spamming via the apply form if there is no CAPTCHA implemented.
	 *
	 * Note: it is highly recommended to implement CAPTCHA in the apply form - search the forum
	 * for instructions on how to do this.
	 * 
	 * If you implement some sort of CAPTCHA in the apply form, you can safely set this value to 0.
	 * This will allow the same user to apply to as many jobs as he wishes without his application 
	 * being denied.
	 */
	define('MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP', 10);
	
	define('SIDEBAR_CATEGORIES', 'categories');
	define('SIDEBAR_CITIES', 'cities');
	
	/**
	 * Controls what will be displayed in the sidebar - categories or cities.
	 * By default, categories are shown.
	 * 
	 * Possible values:
	 * 
	 * - SIDEBAR_CATEGORIES - show categories in sidebar
	 * - SIDEBAR_CITIES - show cities in sidebar
	 *
	 */
	define('SIDEBAR_SHOW_WHAT', SIDEBAR_CATEGORIES);
	
	/**
	 * Controls which cities to show in the sidebar - applies only
	 * if SIDEBAR_SHOW_WHAT is SIDEBAR_CITIES. 
	 * 
	 * By default, also cities where there are currently no active jobs are shown.
	 * 
	 * Possible values:
	 * 
	 * true - show only cities where there are currently active jobs
	 * false - show also cities where the are currently no active jobs
	 * 
	 */ 
	define('SIDEBAR_ONLY_CITIES_WITH_JOBS', false);
	
	/**
	 * The format in which dates are displayed. By default, they are shown
	 * in the %d-%m-%Y format (ie: 29-05-2009), where %d means day, %m means month
	 * and %Y means 4 digit year.
	 * 
	 * This is used to display the date when a job was posted, for example.
	 *
	 * Please see the following link for more formatting options:
	 * 
	 * http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format
	 * 
	 */
	define('DATE_FORMAT', '%d-%m-%Y');
	
	/**
	 * The format in which times (date + time) are displayed. By default, they are shown in 
	 * the %d-%m-%Y %H:%i format (ie: 29-05-2009 21:07), where %d means day, %m means month,
	 * %Y means 4 digit year, %H means hour in 24 hours format and %i means minute.
	 * 
	 * This is used mostly in the administration section.
	 *
	 * Please see the following link for more formatting options:
	 * 
	 * http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format
	 * 
	 */
	define('DATE_TIME_FORMAT','%d-%m-%Y %H:%i');
	
	define('APP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

  if(isset($_SERVER['SCRIPT_NAME'])) 
	{
		# on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
		# @modified Chis Florinel <chis.florinel@candoo.ro>
		
		$app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/\\');	
		define('_APP_MAIN_DIR', $app_main_dir);
  } 
	else 
	{
		die('[config.php] Cannot determine APP_MAIN_DIR, please set manual and comment this line');
  }

  if(isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT'])) 
	{
  	if($_SERVER['SERVER_PORT'] == 80) 
    {
      define ('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . _APP_MAIN_DIR . '/');
    } 
    else 
    {
      define ('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'] . _APP_MAIN_DIR . '/');
    }
  } 
  else 
  {
    die('[config.php] Cannot determine BASE_URL, please set manual and comment this line');
  }
	
	// Function and classes includes
	require_once '_includes/function.validate_email.php';
	require_once '_includes/function.redirect_to.php';
	require_once '_includes/function.printr.php';
	require_once '_includes/function.escape.php';
	require_once '_includes/functions.php';
	require_once '_includes/class.phpmailer.php';
	require_once '_includes/class.Postman.php';
	require_once '_includes/class.Textile.php';
	require_once '_includes/class.Sanitizer.php';
	require_once '_includes/class.Db.php';
	// comment the previous line and uncomment the next line if you get a Class 'mysqli' not found error
	// require_once '_includes/class.Db.MySql.php';
	require_once '_includes/class.Job.php';
	require_once '_includes/class.JobRequest.php';
	require_once '_includes/class.Paginator.php';
	require_once '_includes/class.Feed.php';
	require_once '_includes/class.SpamReport.php';
	require_once '_includes/class.Api.php';
	require_once '_includes/class.JobApplication.php';
	require_once '_includes/class.SearchKeywords.php';
	require_once '_includes/smarty/libs/Smarty.class.php';

	// Setup database connection
	try 
	{
		$db = new Db(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$db->Execute('SET NAMES UTF8');
	}
	catch(ConnectException $exception) 
	{
		if (ENVIRONMENT == 'dev')
		{
			echo "Database Connection Error:<br />";
			printr($exception->getMessage());	
		}
	}
	
	// Setup Smarty
	$smarty = new Smarty();
	$smarty->template_dir = APP_PATH . '_templates/';
	$smarty->compile_dir = APP_PATH . '_templates/_cache/';
	
	// Create Textile object
	$textile = new Textile;
	
	// Split URL - get parameters
	$_app_info['params'] = array();
	
	// if your server is IIS, use these lines and comment lines 135-137:
	//$_url = $_SERVER["QUERY_STRING"];

	// if server is Apache:	
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
?>