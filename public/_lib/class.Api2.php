<?php /**
 * jobberBase job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Api class handles external requests for jobs
 */

class Api2
{
	private $_response = 'xml';
	private $_jobs = array();
	
	public function __construct($params = array())
	{
		if (!empty($params))
		{
			if (isset($params['method']) && !empty($params['method']))
			{
				if (isset($params['response']))
				{
					$this->_response = $params['response'];
				}
				
				call_user_func(array($this, $params['method']), $params);
			}
		}
	}
	
	public function show()
	{
		$response = '0';
		
		switch ($this->_response)
		{
			case 'xml':
			{
				header('Content-Type: text/xml; charset="utf-8"');
				$response = $this->response_xml();
				break;
			}
			
			case 'json':
			{
				header('Content-Type: text/javascript');
				$response = $this->response_json();
				break;
			}
			
			case 'widget':
			{
				header('Content-Type: text/javascript');
				$response = $this->response_widget();
				break;
			}
		}
		
		return $response;
	}
	
	private function response_widget()
	{
		$response = '<div class="jobs-list"><ul>';
		
		foreach ($this->_jobs as $job)
		{
			$job = $this->prepare_job_for_export($job);
			
			$response .= '<li><a target="_blank" href="' . $job['detail_url'] . '">' . $job['title'] . ' <span>(' . $job['city'] . ')</span></a></li>';
		}
		
		$response .= '</ul></div>';

		return 'document.write(\'' . addslashes($response) . '\')';
	}
	
	private function response_json()
	{
		$jobs = array();
		foreach ($this->_jobs as $job)
		{
			$jobs[] = $this->prepare_job_for_export($job);
		}

		return json_encode($jobs);
	}
	
	private function response_xml()
	{
		$response = '<?xml version="1.0" encoding="utf-8"?>';
		$response .= '<jobs>';
		foreach ($this->_jobs as $job)
		{
			$job = $this->prepare_job_for_export($job);
			
			$response .= '<job>';
			
			$response .= '<title><![CDATA[' . $job['title'] . ']]></title>';
			$response .= '<job-code><![CDATA[' . $job['id'] . ']]></job-code>';
			$response .= '<detail-url><![CDATA[' . $job['detail_url'] . ']]></detail-url>';
			$response .= '<job-category><![CDATA[' . $job['category'] . ']]></job-category>';
			$response .= '<posted-date><![CDATA[' . $job['posted_date'] . ']]></posted-date>';
			
			$response .= '<description>';
			$response .= '<summary><![CDATA[' . $job['description'] . ']]></summary>';
			$response .= '</description>';
			
			$response .= '<location>';
			$response .= '<city><![CDATA[' . $job['city'] . ']]></city>';
			$response .= '</location>';
			
			$response .= '<company>';
			$response .= '<name><![CDATA[' . $job['company'] . ']]></name>';
			$response .= '<url><![CDATA[' . $job['url'] . ']]></url>';
			$response .= '</company>';
			
			$response .= '</job>';
		}
		
		$response .= '</jobs>';
		
		return $response;
	}
	
	private function prepare_job_for_export($job)
	{
		$sanitizer = new Sanitizer;
		
		$url_title = $sanitizer->sanitize_title_with_dashes($job['title'] . ' at ' . $job['company']);
		$job['city'] = !empty($job['city']) ? $job['city'] : 'Any city';
		$job['detail_url'] = JOBBER_URL . URL_JOB . '/' . $job['id'] . '/' . $url_title . '/';

		return $job;
	}
	
	private function get_jobs($params)
	{
		global $db;
		$jobs = array();
		
		$conditions = '';
		$sql_limit = '';
		
		if (isset($params['since']) && $params['since'] > 0)
		{
			$conditions .= ' AND a.created_on >= "' . $params['since'] . '"';
		}

		if(isset($params['limit']) && $params['limit'] > 0)
		{
			$sql_limit = 'LIMIT ' . $params['limit'];
		}
		
		$sql = 'SELECT a.id, a.title, a.description, a.company, a.url, 
		               DATE_FORMAT(created_on, "%Y/%m/%d") AS posted_date, 
		               b.name AS category, c.name AS city
		               FROM ' . DB_PREFIX . 'jobs a
		               LEFT JOIN categories b ON a.category_id = b.id
		               LEFT JOIN cities c ON a.city_id = c.id
		               WHERE 1 ' . $conditions . ' AND a.is_temp = 0 AND a.is_active = 1
		               ORDER BY a.created_on DESC ' . $sql_limit;
		$results = $db->q($sql);

		$this->_jobs = $results;
	}

}
?>