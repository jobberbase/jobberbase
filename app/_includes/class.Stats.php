<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Stats class provides some useful stats about the site's usage (number of applications and searched keywords)
 */

class Stats
{
	function __construct()
	{ }
	
	public function Applications()
	{
		global $db;
		$stats = '';
		$count = 0;
		$sql = 'SELECT DATE_FORMAT(a.created_on, "%d-%m-%Y") AS date, b.title AS title, b.company AS company, a.job_id AS job_id
		                        FROM job_applications a, jobs b
		                        WHERE a.job_id = b.id
		                        ORDER BY a.created_on DESC';
		$result = $db->query($sql);
		if (!empty($result))
		{
			while ($row = $result->fetch_assoc())
			{
				$count++;
				if ($count < 50)
				{
					$stats .= '<div>' . $row['date'] . ' <a href="' . BASE_URL . 'job/' . $row['job_id'] . '/">' . $row['title'] . ' la ' . $row['company'] . '</a></div>';	
				}
			}	
		}
		
		$apps_per_day = array();
		$sql = 'SELECT count(id) AS nr FROM job_applications WHERE DATEDIFF(NOW(), created_on) < 8 GROUP BY DATE_FORMAT(created_on, "%Y-%m-%d") 
		               ORDER BY count(id) DESC';
		$result = $db->query($sql);
		if (!empty($result))
		{
			while ($row = $result->fetch_assoc())
			{
				$apps_per_day[] = $row['nr'];
			}	
		}
		
		if ($apps_per_day)
		{
			$avg = ceil(array_sum($apps_per_day) / count($apps_per_day));	
		}
		else
		{
			$avg = 0;
		}
		
		return array('stats' => $stats, 'count' => $count, 'avg' => $avg, 'max' => $apps_per_day[0]);
	}
	
	public function Keywords()
	{
		global $db;
		$stats = '';
		$count = 0;
		$sql = 'SELECT created_on, keywords
		                        FROM searches
		                        ORDER BY created_on DESC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$count++;
			if ($count < 50)
			{
				$stats .= '<div>' . $row['created_on'] . ' <strong>' . $row['keywords'] . '</strong></div>';
			}
		}
		
		$per_day = array();
		$sql = 'SELECT count(id) AS nr FROM searches WHERE DATEDIFF(NOW(), created_on) < 8 GROUP BY DATE_FORMAT(created_on, "%Y-%m-%d")
		               ORDER BY count(id) DESC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$per_day[] = $row['nr'];
		}
		if ($per_day)
		{
			$avg = ceil(array_sum($per_day) / count($per_day));	
		}
		else
		{
			$avg = 0;
		}
		
		return array('stats' => $stats, 'count' => $count, 'avg' => $avg, 'max' => $per_day[0]);
	}
}
?>