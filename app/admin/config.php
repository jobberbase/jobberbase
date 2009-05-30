<?php
/**
 * jobber job board platform - admin panel
 *
 * @author     Lavinia Creivean <links_clm@yahoo.com>
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original authors ;)
 *             (see license.txt).
 */

	require_once '../config.php';
	
	$currentDirectoryNames = explode('/', dirname($_SERVER['PHP_SELF']));
	
	define('CURRENT_DIRECTORY', end($currentDirectoryNames));
	$smarty->template_dir = APP_PATH . CURRENT_DIRECTORY. '/_templates/';
	$smarty->compile_dir = APP_PATH . CURRENT_DIRECTORY. '/_templates/_cache/';

	define('BASE_URL_ORIG', str_replace('/admin/', '/', BASE_URL) );
	require_once '_includes/class.Types.php';
?>