<?php
	require_once '../config.php';
	escape($_GET);

	switch($action)
	{
		case 'getJobs':
			$params = array('type' => $type, 'category' => $category, 'count' => $count, 'random' => $random, 'days_behind' => $days_behind, 'response' => $response);
			$api = new Api('getJobs', $params, $response);
			$api->Display();
			exit;
			break;
			
		case 'getJobsByCompany':
			$params = array('company' => $company, 'count' => $count, 'response' => $response);
			$api = new Api('getJobsByCompany', $params, $response);
			$api->Display();
			exit;
			break;
	}
?>