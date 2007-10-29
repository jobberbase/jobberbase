<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * JobApplication class handles online job applications
 */

class JobApplication
{
	var $mJobId = false;
	
	function __construct($job_id)
	{ 
		$this->mJobId = $job_id;
	}
	
	public function Apply()
	{
		global $db;
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = 'SELECT id
		               FROM job_applications
		               WHERE ip = "' . $ip . '" AND TIMESTAMPDIFF(MINUTE, created_on, NOW()) < 10';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if (empty($row))
		{
			$sql = 'INSERT INTO job_applications (job_id, created_on, ip)
			                    VALUES (' . $this->mJobId . ', NOW(), "' . $ip . '")';
			$db->query($sql);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function Count()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS count FROM job_applications WHERE job_id = ' . $this->mJobId;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['count'];
	}
}
?>