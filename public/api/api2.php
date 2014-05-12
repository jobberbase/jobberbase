<?php
	require_once '../_config/config.php';
	require_once '../_lib/class.Api2.php';

	define('JOBBER_URL', str_replace('api/', '', APP_URL));

	///////////////////////////////////////////////////////

	
	if (isset($_GET) && !empty($_GET))
	{
		$params = $_GET;

		$api = new Api2($params);
		echo $api->show();
	}
	else
	{
		echo 'not enough parameters...';
	}

	exit;
