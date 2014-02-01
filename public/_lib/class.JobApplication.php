<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * JobApplication class handles online job applications
 */

class JobApplication
{
	var $mJobId = false;
    var $mData = array();
	
	public function __construct($id, $data = array())
	{ 
		$this->mJobId = $id;
        $this->mData = $data;
	}
	
	public function Apply($ip)
	{
		global $db;
		global $settings;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'job_applications (job_id, name, email, cv_path, message, created_on, ip)
		                    VALUES (' . $this->mJobId . ',
                                "' . $this->mData['apply_name'] . '", "' . $this->mData['apply_email'] . '", 
                                "' . ($settings['keep_uploaded_cvs'] ? $this->mData['attachment_filename'] : '') . '",
                                "' . $this->mData['apply_msg'] . '",  NOW(), "' . $ip . '")';
		$db->query($sql);
	}
	
	public function getAllForJob($from=false, $to=false)
	{
		global $db;
		if ((int)$from >= 0 && (int)$to > 0)
		{
			$sql_limit = ' LIMIT ' . (int)$from .', ' . (int)$to;
		}
		else
		{
			$sql_limit = '';
		}
		$sql = 'SELECT * FROM '.DB_PREFIX.'job_applications WHERE job_id = ' . $this->mJobId . $sql_limit;
		$result = $db->QueryArray($sql);
		return $result;
	}
	
	public function HasApplyTimeoutPassed($ip)
	{
		global $db;
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'job_applications
		               WHERE ip = "' . $ip . '" AND DATE_SUB(NOW(), INTERVAL ' . MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP . ' MINUTE) < created_on';
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		return empty($row);
	}
	
	public function Count()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS count FROM '.DB_PREFIX.'job_applications WHERE job_id = ' . $this->mJobId;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['count'];
	}
}
?>
