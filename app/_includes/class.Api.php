<?php /**
 * jobberBase job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Api class handles external requests for jobs
 */

class Api
{
	var $mJobs = false;
	var $mReferer = false;
	var $mResponse = false;
	var $mAction = false;
	var $mParams = false;
	
	function __construct($action, $params = false, $response)
	{
		if ($params)
		{
			$job = new Job();
			if ($action == 'getJobs')
			{
				$this->mJobs = $job->ApiGetJobs($params['type'], $params['category'], $params['count'], $params['random'], $params['days_behind']);	
			}
			else if ($action == 'getJobsByCompany')
			{
				$this->mJobs = $job->ApiGetJobsByCompany($params['company'], $params['count']);
			}
			else if ($action == 'getJobs4JobJob')
			{
				$this->mParams = $params;
			}
			
			$this->mResponse = $response;
			$url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
			$this->mReferer = base64_encode($url);
			$this->mAction = $action;
		}
	}
	
	// Display the results
	public function Display()
	{
		if ($this->mResponse == 'js')
		{
			header('Content-type: text/javascript'); 
			echo $this->ReturnJs();
		}
		else if ($this->mResponse == 'json')
		{
			header('Content-Type: text/javascript');
			echo $this->ReturnJson();
		}
		else if ($this->mResponse == 'xml')
		{
			header('Content-Type: text/xml; charset="utf-8"');
			echo $this->ReturnXml();	
		}
	}
	
	// Return result as JavaScript
	public function ReturnJs()
	{
		$response = 'var jobs = ';
		$response .= json_encode($this->mJobs);
		$response .= ';';
		$response .= '
		function showJobs(html_container, css_class)
		{
			var html = "<ul class=\"" + css_class + "\">";
			for (j = 0; j < jobs.length; j++)
			{
				//html += "<li><a target=\"_blank\" href=\"' . JOBBER_URL . 'job/" + jobs[j].id + "/" + jobs[j].url_title + "/' . $this->mReferer . '/\">" + jobs[j].title + " la " + jobs[j].company + "</a></li>";
				html += "<li><a target=\"_blank\" href=\"' . JOBBER_URL . 'job/" + jobs[j].id + "/" + jobs[j].url_title + "/' . $this->mReferer . '/\">" + jobs[j].title + " (" + jobs[j].location + ")</a></li>";
			}
			html += "</ul>";
			
			if (document.getElementById(html_container))
			{
				document.getElementById(html_container).innerHTML = html;	
			}
			else
			{
				document.write("<div id=\"" + html_container + "\">" + html + "</div>");
			}
		}';
		return $response;
	}

	// Return result as JSON
	public function ReturnJson()
	{
		$response = 'var jobs = ';
		$response .= json_encode($this->mJobs);
		$response .= ';';
		return $response;
	}
	
	// Return result as XML
	public function ReturnXml()
	{
		$response = '<?xml version="1.0" encoding="utf-8"?>';
		$response .= '<jobs>';
		foreach ($this->mJobs as $job)
		{
			$response .= '<job>';
			$response .= '<title><![CDATA[' . $job['title'] . ' la ' . $job['company'] . ']]></title>';
			$response .= '<url>' . JOBBER_URL . 'job/' . $job['id'] . '/' . $job['url_title'] . '/</url>';
			$response .= '<date>' . $job['created_on'] . '</date>';
			$response .= '</job>';
		}
		$response .= '</jobs>';
		return $response;
	}
	
	// custom API for jobjob.ro
	private function ApiGetJobs4JobJob()
	{
		global $db;

		$jobs = array();
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE is_temp = 0 AND is_active = 1 AND 
												 created_on > DATE_SUB("' . $this->mParams['since'] . '", INTERVAL 1 DAY)
		               ORDER BY created_on DESC';
		$result = $db->query($sql);

		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfo();
		}
		return $jobs;
	}
	
	// Return result as XML specially formatted for jobjob.ro
	public function ReturnXml4JobJob()
	{
		$jobs = $this->ApiGetJobs4JobJob($this->mParams['since']);

		header('Content-Type: text/xml; charset=UTF-8');
		$response = '<?xml version="1.0" encoding="utf-8"?>';
		$response .= '<jobs>';
		foreach ($jobs as $job)
		{
			if ($job['type_id'] == JOBTYPE_FULLTIME)
			{
				$type = 'Full-time';
			}
			else if ($job['type_id'] == JOBTYPE_PARTTIME)
			{
				$type = 'Part-time';
			}
			else if ($job['type_id'] == JOBTYPE_FREELANCE)
			{
				$type = 'Freelance';
			}
			$response .= '<job>';
			$response .= '<title>' . base64_encode(htmlspecialchars($job['title'], ENT_QUOTES)) . '</title>';
			$response .= '<job_url>' . JOBBER_URL . 'job/' . $job['id'] . '/' . $job['url_title'] . '/</job_url>';
			$response .= '<job_city>' . $job['location'] . '</job_city>';
			$response .= '<job_type>' . $type . '</job_type>';
			$response .= '<job_category>' . $job['category_name'] . '</job_category>';
			
			$response .= '<description>';
			$response .= '<summary>' . base64_encode($job['description']) . '</summary>';
			$response .= '</description>';
			
			$response .= '<posted_date>' . $job['mysql_date'] . '</posted_date>';
			
			$response .= '<company>';
			$response .= '<name>' . htmlspecialchars($job['company'], ENT_QUOTES) . '</name>';
			$response .= '<url>' . htmlspecialchars($job['url'], ENT_QUOTES) . '</url>';
		  $response .= '</company>';
		
			$response .= '</job>';
		}
		$response .= '</jobs>';
		return $response;
	}
	
	public function utf8_uri_encode($utf8_string, $length = 0) 
	{
		$unicode = '';
		$values = array();
		$num_octets = 1;

		for ($i = 0; $i < strlen( $utf8_string ); $i++ ) {

			$value = ord( $utf8_string[ $i ] );

			if ( $value < 128 ) {
				if ( $length && ( strlen($unicode) + 1 > $length ) )
					break; 
				$unicode .= chr($value);
			} else {
				if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;

				$values[] = $value;

				if ( $length && ( (strlen($unicode) + ($num_octets * 3)) > $length ) )
					break;
				if ( count( $values ) == $num_octets ) {
					if ($num_octets == 3) {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
					} else {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
					}

					$values = array();
					$num_octets = 1;
				}
			}
		}

		return $unicode;
	}
	
}
?>