<?php
	require_once '../config.php';
	define('JOBBER_URL',str_replace('api/','',BASE_URL));
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

		case 'getJobs4JobJob':
			if (!isset($since))
			{
				$since = date('Y-m-d');
			}
			$params = array('since' => $since, 'response' => 'xml');
			$api = new Api('getJobs4JobJob', $params, 'xml');
			echo $api->ReturnXml4JobJob();
			exit;
			break;
	}
?>