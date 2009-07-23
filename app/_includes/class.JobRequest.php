<?php
/**
* JobRequest class
*
*/

class JobRequest
{
	
	function __construct()
	{ }
	
	public function GetParams($categ)
	{
		global $db;
		$sql = 'SELECT id, value, categ FROM job_params WHERE categ = "' . $categ . '" ORDER BY value ASC';
		return $db->QueryArray($sql);
	}

	// create a new request
	public function Create($data)
	{
		global $db;
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$sql = 'INSERT INTO job_requests (name, email, created_on, ip)
		                    VALUES ("' . $data['name'] . '", "' . $data['email'] . '", NOW(), "' . $ip . '")';
		if ($db->Execute($sql))
		{
			$req_id = $db->insert_id;	
			foreach ($data['params'] as $param)
			{
				$sql = 'INSERT INTO job_requests_params (request_id, param_id)
				                    VALUES (' . $req_id . ', ' . $param . ')';
				$db->Execute($sql);
			}
			return true;
		}
		else
		{
			return false;
		}	
	}
	

}
?>