<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Job class is the backbone of this site and handles (almost) everything related to a job
 */

// a user's visit on a job post is only counted once per hour
define('MAX_VISITS_PER_HOUR', 1);

class Job
{
	var $mId = false;
	var $mTypeId = false;
	var $mTypeVarName = false;
	var $mTypeName = false;
	var $mCategoryId = false;
	var $mTitle = false;
	var $mDescription = false;
	var $mCompany = false;
	var $mLocation = false;
	var $mUrl = false;
	var $mApply = false;
	var $mCreatedOn = false;
	var $mIsTemp = false;
	var $mIsActive = false;
	var $mViewsCount = false;
	var $mAuth = false;
	var $mCityId = false;
	var $mLocationOutsideRo = false;
	var $mPosterEmail = false;
	var $mUrlTitle = false;
	var $mApplyOnline = false;
	var $mCategoryName = false;
	var	$mClosedOn = false;
	var	$mDaysOld = false;
	var $mIsSpotlight = false;
	var $mMySqlDate = false;
	
	function __construct($job_id = false)
	{
		global $db;
		if (is_numeric($job_id))
		{
			$sanitizer = new Sanitizer;
			$sql = 'SELECT a.type_id AS type_id, a.category_id AS category_id, a.title AS title, a.description AS description, 
			               a.company AS company, a.url AS url, a.apply AS apply, 
			               DATE_FORMAT(a.created_on, "' . DATE_FORMAT . '") AS created_on, a.created_on AS mysql_date,
			               a.is_temp AS is_temp, a.is_active AS is_active, a.spotlight AS spotlight,
			               a.views_count AS views_count, a.auth AS auth, a.city_id AS city_id, a.outside_location AS outside_location,
			               a.poster_email AS poster_email, a.apply_online AS apply_online, b.name AS category_name,
			               c.var_name as type_var_name, c.name as type_name,
			               DATE_ADD(created_on, INTERVAL 30 DAY) AS closed_on, DATEDIFF(NOW(), created_on) AS days_old
			               FROM jobs a, categories b, types c
			               WHERE a.category_id = b.id AND c.id = a.type_id AND a.id = ' . $job_id;
			$result = $db->query($sql);
			$row = $result->fetch_assoc();
			if (!empty($row))
			{
				if ($row['city_id'] == -1 && $row['outside_location'] != '') 
				{
					$this->mLocation = $row['outside_location'];
				}	
				else
				{
					$sql = 'SELECT name FROM cities WHERE id = ' . $row['city_id'];
					$result = $db->query($sql);
					$row2 = $result->fetch_assoc();
					$this->mLocation = $row2['name'];
				}	
				$this->mId = $job_id;
				$this->mTypeId = $row['type_id'];
				$this->mCategoryId = $row['category_id'];
				$this->mCategoryName = $row['category_name'];
				$this->mTitle = str_replace('&', '&amp;', $row['title']);
				$this->mDescription = $row['description'];
				$this->mCompany = $row['company'];
				$this->mUrl = $row['url'];
				$this->mApply = $row['apply'];
				$this->mCreatedOn = $row['created_on'];
				$this->mClosedOn = $row['closed_on'];
				$this->mIsTemp = $row['is_temp'];
				$this->mIsActive = $row['is_active'];
				$this->mViewsCount = $row['views_count'];
				$this->mAuth = $row['auth'];
				$this->mCityId = $row['city_id'];
				$this->mMySqlDate = $row['mysql_date'];
				$this->mLocationOutsideRo = $row['outside_location'];
				$this->mPosterEmail = $row['poster_email'];
				$this->mUrlTitle = $sanitizer->sanitize_title_with_dashes($this->mTitle . ' at ' . $this->mCompany);
				$this->mApplyOnline = $row['apply_online'];
				$this->mDaysOld = $row['days_old'];
				$this->mIsSpotlight = $row['spotlight'];
				$this->mTypeName = $row['type_name'];
				$this->mTypeVarName = $row['type_var_name'];
			}
		}
	}
	
	// Get a job post's information
	public function GetInfo()
	{
		$job = array('id' => $this->mId,
			           'type_id' => $this->mTypeId,
			           'category_id' => $this->mCategoryId,
			           'category_name' => $this->mCategoryName,
								 'company' => stripslashes($this->mCompany),
								 'url' => stripslashes($this->mUrl),
								 'title' => stripslashes($this->mTitle),
								 'url_title' => stripslashes($this->mUrlTitle),
								 'location' => $this->mLocation,
								 'description' => stripslashes($this->mDescription),
								 'created_on' => stripslashes($this->mCreatedOn),
								 'closed_on' => stripslashes($this->mClosedOn),
								 'apply' => stripslashes($this->mApply),
								 'views_count' => $this->mViewsCount,
								 'auth' => $this->mAuth,
								 'city_id' => $this->mCityId,
								 'mysql_date' => $this->mMySqlDate,
								 'location_outside_ro' => $this->mLocationOutsideRo,
								 'poster_email' => $this->mPosterEmail,
								 'apply_online' => $this->mApplyOnline,
								 'is_active' => $this->mIsActive,
								 'days_old' => $this->mDaysOld,
								 'is_spotlight' => $this->mIsSpotlight,
								 'type_name' => $this->mTypeName,
								 'type_var_name' => $this->mTypeVarName);
		return $job;
	}
	
	// Get a job post's basic information
	public function GetBasicInfo()
	{
		$job = array('id' => $this->mId,
			           'type_id' => $this->mTypeId,
			           'category_id' => $this->mCategoryId,
 			           'category_name' => $this->mCategoryName,
								 'company' => stripslashes($this->mCompany),
								 'url' => stripslashes($this->mUrl),
								 'title' => stripslashes($this->mTitle),
								 'url_title' => stripslashes($this->mUrlTitle),
								 'location' => $this->mLocation,
								 'description' => stripslashes($this->mDescription),
								 'created_on' => stripslashes($this->mCreatedOn),
								 'closed_on' => stripslashes($this->mClosedOn),
								 'apply' => stripslashes($this->mApply),
								 'city_id' => $this->mCityId,
								 'mysql_date' => $this->mMySqlDate,
								 'location_outside_ro' => $this->mLocationOutsideRo,
								 'is_active' => $this->mIsActive,
								 'days_old' => $this->mDaysOld,
								 'is_spotlight' => $this->mIsSpotlight,
								 'type_name' => $this->mTypeName,
								 'type_var_name' => $this->mTypeVarName);
		return $job;
	}

	// Get a job post's basic information for admin
	public function GetBasicInfoAdmin()
	{
		$job = array('id' => $this->mId,
			           'type_id' => $this->mTypeId,
			           'category_id' => $this->mCategoryId,
 			           'category_name' => $this->mCategoryName,
								 'company' => stripslashes($this->mCompany),
								 'url' => stripslashes($this->mUrl),
								 'title' => stripslashes($this->mTitle),
								 'url_title' => stripslashes($this->mUrlTitle),
								 'location' => $this->mLocation,
								 'description' => stripslashes($this->mDescription),
								 'created_on' => stripslashes($this->mCreatedOn),
								 'closed_on' => stripslashes($this->mClosedOn),
								 'apply' => stripslashes($this->mApply),
								 'city_id' => $this->mCityId,
								 'mysql_date' => $this->mMySqlDate,
								 'location_outside_ro' => $this->mLocationOutsideRo,
								 'days_old' => $this->mDaysOld,
								 'is_active' => $this->mIsActive,
								 'views_count' => $this->mViewsCount,
								 'is_spotlight' => $this->mIsSpotlight,
								 'type_name' => $this->mTypeName,
								 'type_var_name' => $this->mTypeVarName);
		return $job;
	}
	
	// Get all job posts (optionally from a specific type and/or category)
	// $type_id: freelance/fulltime/parttime
	// $categ_id: programatori/designeri/etc.
	// $limit: (int) how many results
	// $random: (1/0) randomize results?
	// $days_behind: (int) only get results from last N days
	// $for_feed: (boolean) is this request from rss feed?
	public function GetJobs($type_id = false, $categ_id = false, $limit = false, $random, $days_behind, $for_feed = false, $city_id = false, $type_id = false, $spotlight = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}
		
		if ($days_behind > 0)
		{
			$conditions .=' AND DATEDIFF(NOW(), created_on) <= ' . $days_behind;
		}
		
		if ($for_feed)
		{
			$conditions .= ' AND NOW()>DATE_ADD(created_on,INTERVAL 10 MINUTE)';
		}
		
		if ($city_id && is_numeric($city_id))
		{
			$conditions .= ' AND city_id = ' . $city_id;
		}
		
		if ($type_id && is_numeric($type_id))
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		
		if ($spotlight &&  is_numeric($spotlight))
    	{
  			$conditions .= ' AND spotlight = ' . $spotlight;
		}

		if ($random == 1)
		{
			$order = ' ORDER BY RAND() ';
		}
		else
		{
			$order = ' ORDER BY created_on DESC ';
		}

		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		else
		{
		        $sql_limit = '';        
		}
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ' . $order . ' ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	// Get all job posts (optionally from a specific type and/or category)
	// $type_id: freelance/fulltime/parttime
	// $categ_id: programatori/designeri/etc.
	// $limit: (int) how many results
	// $random: (1/0) randomize results?
	// $days_behind: (int) only get results from last N days
	// $for_feed: (boolean) is this request from rss feed?
	public function GetJobsPaginate($type_id = false, $categ_id = false, $firstLimit = false, $lastLimit=false, $random, $days_behind, $for_feed = false, $city_id = false, $type_id = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}
		
		if ($days_behind > 0)
		{
			$conditions .=' AND DATEDIFF(NOW(), created_on) <= ' . $days_behind;
		}
		
		if ($for_feed)
		{
			$conditions .= ' AND NOW()>DATE_ADD(created_on,INTERVAL 10 MINUTE)';
		}
		
		if ($city_id && is_numeric($city_id))
		{
			$conditions .= ' AND city_id = ' . $city_id;
		}
		
		if ($type_id && is_numeric($type_id))
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}

		if ($random == 1)
		{
			$order = ' ORDER BY RAND() ';
		}
		else
		{
			$order = ' ORDER BY created_on DESC ';
		}

		
		if ($firstLimit >= 0 && $lastLimit >= 0)
		{
			$sql_limit = 'LIMIT ' . $firstLimit .', ' . $lastLimit;
		}
		else
		{
		        $sql_limit = '';        
		}
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ' . $order . ' ' . $sql_limit;
		
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	//Get all inactive jobs for admin 
	public function GetInactiveJobs($offset, $rowCount)
	{
		global $db;
		$jobs = array();
		
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 AND is_temp = 0 AND is_active = 0
		               ORDER BY created_on DESC LIMIT ' . $offset .' , ' . $rowCount;
		
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfoAdmin();
		}
		return $jobs;
	}
	
	public function getInactiveJobCount()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS total FROM jobs WHERE is_temp = 0 AND is_active = 0';
	
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];	
	}
	
	//Get all inactive/active jobs for a specific category for admin
	// $type_id: freelance/fulltime/parttime
	// $categ_id: programatori/designeri/etc.
	// $limit: (int) how many results
	public function GetAllForCategoryJobsAdmin($type_id, $categ_id = false, $limit = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}

		if ($type_id && is_numeric($type_id))
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}

		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		else
		{
		  $sql_limit = '';        
		}
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 
		               ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfoAdmin();
		}
		return $jobs;
	}
	
	
	// get jobs for API
	public function ApiGetJobs($type_id = false, $categ_id = false, $limit = false, $random, $days_behind, $for_feed = false, $city_id = false)
	{
		global $db;
		
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}
		
		if ($days_behind > 0)
		{
			$conditions .=' AND DATEDIFF(NOW(), created_on) <= ' . $days_behind;
		}
		
		if ($for_feed)
		{
			$conditions .= ' AND NOW()>DATE_ADD(created_on,INTERVAL 10 MINUTE)';
		}
		
		if ($city_id && is_numeric($city_id))
		{
			$conditions .= ' AND city_id = ' . $city_id;
		}

		if ($random == 1)
		{
			$order = ' ORDER BY RAND() ';
		}
		else
		{
			$order = ' ORDER BY created_on DESC ';
		}

		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1  AND DATEDIFF(NOW(), created_on) < 31
		               ' . $order . ' ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfo();
		}
		return $jobs;
	}

	// Get all jobs published by a company
	public function ApiGetJobsByCompany($company = false, $limit = false, $for_feed = false)
	{
		global $db;
		
		$jobs = array();
		$conditions = '';
		
		if ($company)
		{
			$conditions .= ' AND company LIKE "' . $company . '"';
		}
		
		if ($for_feed)
		{
			$conditions .= ' AND NOW()>DATE_ADD(created_on,INTERVAL 10 MINUTE)';
		}
		
		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		else
		{
			$sql_limit = '';
		}
		
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ORDER BY created_on DESC ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	public function GetMostViewedJobs($limit = false)
	{
		global $db;
		
		$jobs = array();
		
		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		
		$sql = 'SELECT id
		               FROM jobs
		               WHERE 1 AND is_temp = 0 AND is_active = 1 
		               ORDER BY views_count DESC ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	public function GetMostAppliedToJobs($limit = false)
	{
		global $db;
		
		$jobs = array();
		
		if ($limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		$i = 0;
		$sql = 'SELECT ja.job_id, COUNT(ja.id) as nr FROM job_applications ja, jobs jbs WHERE ja.job_id = jbs.id GROUP BY ja.job_id 
		               ORDER BY nr DESC ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['job_id']);
			$jobs[$i] = $current_job->GetInfo();
			$jobs[$i]['apps'] = $row['nr'];
			$i++;
		}
		return $jobs;
	}
		
	
	// Search for jobs
	public function Search($keywords)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		$_SESSION['keywords_array'] = array();
	  	$kw1 = $kw2 = $extra_conditions = '';
		$found_city = false;

		if (strstr($keywords, ',') || strstr($keywords, ', '))
		{
			$tmp = explode(',', $keywords);
			$kw1 = trim($tmp[0]);
			$kw2 = trim($tmp[1]);
			if ($kw1 == '')
			{
				$kw1 = $kw2;
				$kw2 = '';
			}
		}
		else if (strstr($keywords, ' ') || strstr($keywords, '  '))
		{
			// filter out empty strings (can happen if there are many whitespaces between two words in the search string)
			$tmp = array_filter(explode(' ', $keywords));
			foreach ($tmp as $word)
			{
				// try to find city based on city_id
				$sql = 'SELECT id FROM cities WHERE name LIKE "%' . $word . '%"';
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
				if ($row['id'] != '')
				{
					if ($found_city)
					{
						$conditions .= ' OR';
					}
					
					$conditions .= ' city_id = ' . $row['id'];
					$found_city = true;
					$keywords = trim(str_replace($word, '', $keywords));
				}
				
				// try to find city based on postcode or location_details
				$sql = 'SELECT id FROM jobs WHERE outside_location LIKE "%' . $word . '%"';
				$results = $db->QueryArray($sql);
				if ($db->affected_rows > 0)
				{
					if ($found_city)
					{
						$conditions .= ' OR ';
					}
					$conditions .= ' id IN (';
					foreach ($results as $j)
					{
						$conditions .= $j['id'] . ',';
						$found_city = true;
					}	
					$conditions = rtrim($conditions, ',');
					$conditions .= ') ';
					$keywords = trim(str_replace($word, '', $keywords));
				}
			}
			if ($found_city)
			{
				$conditions .= ' AND (title LIKE "%' . $keywords . '%" OR company LIKE "%' . $keywords . '%"' .  ' OR description LIKE "%' . $keywords . '%")';	
			}
		}

		if (!$found_city)
		{
			if ($kw1 != '')
			{
				$conditions .= ' (title LIKE "%' . $kw1 . '%" OR description LIKE "%' . $kw1 . '%")';
				$_SESSION['keywords_array'][] = $kw1;
			}
			if ($kw2 != '')
			{
				$sql = 'SELECT id FROM cities WHERE name LIKE "%' . $kw2 . '%"';
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
				if ($row['id'] != '')
				{
					$extra_conditions .= ' OR city_id = ' . $row['id'];
				}
				$conditions .= ' AND (outside_location LIKE "%' . $kw2 . '%" ' . $extra_conditions . ')';
				$_SESSION['keywords_array'][] = $kw2;
			}
			if ($kw1 == '' && $kw2 == '')
			{
				$sql = 'SELECT id FROM cities WHERE name LIKE "%' . $keywords . '%"';
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
				if ($row['id'] != '')
				{
					$extra_conditions .= ' OR city_id = ' . $row['id'];
				}
				$conditions = 'title LIKE "%' . $keywords . '%" OR company LIKE "%' . $keywords . '%"' .  ' OR description LIKE "%' . $keywords . '%" OR outside_location LIKE "%' . $keywords . '%"' . $extra_conditions;

				$_SESSION['keywords_array'][] = $keywords;
			}
		}

		$sql = 'SELECT id
		               FROM jobs
		               WHERE is_temp = 0 AND is_active = 1 AND (' . $conditions . ')
		               ORDER BY created_on DESC';
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfo();
		}
		$_SESSION['search_results'] = $jobs;
		return $jobs;
	}
	
	public function GetCategId($var_name)
	{
		global $db;
		$sql = 'SELECT id
		               FROM categories
		               WHERE var_name = "' . $var_name . '"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['id'];
	}
	
	public function GetCategVarname($categ_id)
	{
		global $db;
		$sql = 'SELECT var_name
		               FROM categories
		               WHERE id = ' . $categ_id;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['var_name'];
	}
	
	public function GetTypeId($var_name)
	{
		global $db;
		$sql = 'SELECT id
		               FROM types
		               WHERE var_name = "' . $var_name . '"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['id'];
	}
	
	public function GetTempStatus()
	{
		return $this->mIsTemp;
	}
	
	public function GetActiveStatus()
	{
		return $this->mIsActive;
	}
	
	public function GetAuth()
	{
		return $this->mAuth;
	}
	
	public function IncreaseViewCount()
	{
		global $db;
		// check if user has hit this page in the past hour
		$ip = $_SERVER['REMOTE_ADDR'];
    //extract number of hits on last hour
    $sql = 'SELECT count(*) AS hits_last_hour '.
           'FROM hits WHERE job_id = ' . $this->mId . ' AND ip = "' . $ip . '" AND '.
           'created_on >= DATE_ADD(NOW(),INTERVAL -1 HOUR)';
		$result = $db->QueryItem($sql);
		
		// ok to increase view count
		if ($result < MAX_VISITS_PER_HOUR)
		{
			// update hits table
			$sql = 'INSERT INTO hits (job_id, created_on, ip)
			                    VALUES (' . $this->mId . ', NOW(), "' . $ip . '")';
			$db->query($sql);
			
			// update jobs table
			$sql = 'UPDATE jobs SET views_count = views_count + 1
										 WHERE id = ' . $this->mId;
			$db->query($sql);	
		}
	}

	// Create a new job post
	public function Create($params)
	{
		global $db;
		if ($params['city_id'] == '')
		{
			$params['city_id'] = -1;
		}
		if ($params['apply_online'] == 'on')
		{
			$params['apply_online'] = 1;
		}
		else
		{
			$params['apply_online'] = 0;
		}
		$sql = 'INSERT INTO jobs (type_id, category_id, title, description, company, city_id, url, apply, created_on, is_temp, is_active, 
			                       views_count, auth, outside_location, poster_email, apply_online)
		                         VALUES (' . $params['type_id'] . ',
		                                 ' . $params['category_id'] . ',
		                                 "' . $params['title'] . '",
		                                 "' . $params['description'] . '",
		                                 "' . $params['company'] . '",
		                                 ' . $params['city_id'] . ',
		                                 "' . $params['url'] . '",
		                                 "' . $params['apply'] . '",
		                                 NOW(), ' . $params['is_temp'] . ', '. $params['is_active'] .', 0, "' . $this->GenerateAuthCode() . '", 
		                                 "' . $params['location_outside_ro_where'] . '", "' . $params['poster_email'] . '", ' . $params['apply_online'] . ')';
		$result = $db->query($sql);
		return $db->insert_id;
	}
	
	// Edit an existing job post
	public function Edit($params)
	{
		global $db;

		/*if ($params['city_id'] == '')
		{
			$params['city_id'] = -1;
		}
		else
		{
			$params['location_outside_ro_where'] = '';
		}*/

		if ($params['apply_online'] == 'on')
		{
			$params['apply_online'] = 1;
		}
		else
		{
			$params['apply_online'] = 0;
		}

		$sql = 'UPDATE jobs SET type_id = ' . $params['type_id'] . ',
        										category_id = ' . $params['category_id'] . ',
										        title = "' . $params['title'] . '",
										        description = "' . $params['description'] . '",
										        company = "' . $params['company'] . '",
										        city_id = ' . $params['city_id'] . ',
										        url = "' . $params['url'] . '",
										        apply = "' . $params['apply'] . '",
														outside_location = "' . $params['location_outside_ro_where'] . '",
														poster_email = "' . $params['poster_email'] . '",
														apply_online = "' . $params['apply_online'] . '"
										        WHERE id = ' . $this->mId;
		$result = $db->query($sql);
	}
	
	// Publishes a newly created job post (is_temp => 0)
	public function Publish()
	{
		global $db;
		if ($this->CheckPosterEmail())
		{
			$sql = 'UPDATE jobs SET is_temp = 0, is_active = 1 WHERE id = ' . $this->mId;
		}
		else
		{
			$sql = 'UPDATE jobs SET is_temp = 0, is_active = 0 WHERE id = ' . $this->mId;
		}
		$db->query($sql);
	}
	
	// Activate an inactive job post
	public function Activate()
	{
		global $db;
		$sql = 'UPDATE jobs SET is_active = 1 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Deactivate an active job post
	public function Deactivate()
	{
		global $db;
		$sql = 'UPDATE jobs SET is_active = 0 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Activate spotlight-feature for a job post
    public function SpotlightActivate()
    {
        global $db;
        $sql = 'UPDATE jobs SET spotlight = 1 WHERE id = ' . $this->mId;
        $db->query($sql);
    }
    
    // Deactivate spotlight-feature for a job post
    public function SpotlightDeactivate()
    {
        global $db;
        $sql = 'UPDATE jobs SET spotlight = 0 WHERE id = ' . $this->mId;
        $db->query($sql);
    }
	
	// Extend a post for 30 days
	public function Extend()
	{
		global $db;
		$sql = 'UPDATE jobs SET created_on = NOW(), is_active = 1 WHERE id = ' . $this->mId;
		if ($db->query($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Make a post temporary
	public function MarkTemporary()
	{
		global $db;
		$sql = 'UPDATE jobs SET is_temp = 1 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Delete a job post
	public function Delete()
	{
		global $db;
		$sql = 'DELETE FROM jobs WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Delete a job post and all aditional information
	public function DeleteJobAdmin()
	{
		global $db;
			
		$db->autocommit(FALSE);
		
		$sql = 'DELETE FROM hits WHERE job_id  = ' . $this->mId;
		$res = $db->query($sql);	
		
		$sql = 'DELETE FROM job_applications WHERE job_id  = ' . $this->mId;
		$res = $res && $db->query($sql);
		
		$sql = 'DELETE FROM spam_reports WHERE job_id  = ' . $this->mId;
		$res = $res && $db->query($sql);

		$sql = 'DELETE FROM jobs WHERE id  = ' . $this->mId;
		$res = $res && $db->query($sql);
		
		if($res != false)
		{
			$db->commit();
		}
		else
		{
			$db->rollback();
		}
		$db->autocommit(TRUE);
		return ($res==false)?$res:true;
	}
	public function MakeValidUrl($string)
	{
		$string = urlencode($string);
		return $string;
	}
	
	public function Exists()
	{
		if ($this->mCreatedOn != '')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function GenerateAuthCode()
	{
		$auth = md5($this->mId . uniqid() . time());
		return $auth;
	}
	
	// Record each outside hit
	public function RecordHit($referer, $ip)
	{
		global $db;
		$sql = 'INSERT INTO api_requests (created_on, referer, ip, job_id)
		                    VALUES (NOW(), "' . $referer . '", "' . $ip . '", ' . $this->mId . ')';
		$db->query($sql);
	}
	
	public function CountJobs($categ = false, $type = false)
	{
		global $db;
		$condition = '';
	 	
		if ($type)
		{
			if (!is_numeric($type))
			{
				$type_id = $this->GetTypeId($type);
			}
			else
			{
				$type_id = $type;
			}
			
			$condition .= ' AND type_id = ' . $type_id;
		}
		
		if ($categ)
		{
			if (!is_numeric($categ))
			{
				$categ_id = $this->GetCategId($categ);
			}
			else
			{
				$categ_id = $categ;
			}
			
			$condition .= ' AND category_id = ' . $categ_id;
		}

		$sql = 'SELECT COUNT(id) AS total FROM jobs WHERE is_temp = 0 AND is_active = 1' . $condition;
		
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];	
	}
	
	public function IsValidCategory($categ)
	{
		global $db;
		$sql = 'SELECT id FROM categories WHERE var_name = "' . $categ . '"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Check if there are any jobs in the selected city
	public function AnyJobsForCity($city_id)
	{
		global $db;
		$sql = 'SELECT id
		               FROM jobs
		               WHERE city_id = ' . $city_id;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function GetJobsCountForAllCategs()
	{
		global $db;
		$jobsCountPerCategory = array();
		
		$sql = 'SELECT category_id, COUNT(id) AS total FROM jobs WHERE is_temp = 0 AND is_active = 1 GROUP BY category_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$jobsCountPerCategory[$row['category_id']] = $row['total'];
			
		$categs = get_categories();
		$result = array();
		foreach ($categs as $categ)
		{
			$count = 0;
			
			// this check is needed because we don't have an entry if there are no jobs for a category
			if (isset($jobsCountPerCategory[$categ['id']]))
				$count = $jobsCountPerCategory[$categ['id']];
				
			$result[] = array('categ_name' => $categ['name'], 'UTF-8', 'categ_count' => $count, 'categ_varname' => $categ['var_name']);
		}
		return $result;
	}
	
	public function GetJobsCountPerCity($excludeCitiesWithNoJobs)
	{
		global $db;
		$jobsCountPerCity = array();
		
		$sql = 'SELECT city_id, COUNT(id) AS total FROM jobs WHERE is_temp = 0 AND is_active = 1 GROUP BY city_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$jobsCountPerCity[$row['city_id']] = $row['total'];
			
		$cities = get_cities();
		$result = array();
		foreach ($cities as $city)
		{
			$count = 0;
			
			// this check is needed because we don't have an entry if there are no jobs for a city
			if (isset($jobsCountPerCity[$city['id']]))
				$count = $jobsCountPerCity[$city['id']];

			if ($count > 0)
				$result[] = array('city_name' => $city['name'], 'jobs_in_city' => $count, 'city_ascii_name' => $city['ascii_name']);
			else 
			{
				if (!$excludeCitiesWithNoJobs)
					$result[] = array('city_name' => $city['name'], 'jobs_in_city' => $count, 'city_ascii_name' => $city['ascii_name']);
			}
					
		}
		return $result;
	}
	
	public function GetJobsCountForCity($city_id, $type)
	{
		global $db;
		
		$jobsCountPerCity = array();
		$condition = '';
		
		if ($type)
		{
			if (!is_numeric($type))
			{
				$type_id = $this->GetTypeId($type);
			}
			else
			{
				$type_id = $type;
			}
			
			$condition .= ' AND type_id = ' . $type_id;
		}
		
		$sql = 'SELECT COUNT(id) AS total FROM jobs WHERE is_temp = 0 AND is_active = 1 and city_id = '. $city_id . $condition;

		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		return $row['total'];
	}
	
	// Check if the poster of this post has posted before with this e-mail address
	public function CheckPosterEmail()
	{
		global $db;
		$sql = 'SELECT poster_email FROM jobs 
		                  WHERE poster_email = "' . strtolower($this->mPosterEmail) . '" AND id <> ' . $this->mId . ' AND is_temp = 0
 		                        AND (is_active = 1 OR (is_active = 0 AND DATEDIFF(NOW(), created_on) > 30))'; 
		$result = $db->query($sql);
				
		$row = $result->fetch_assoc();
		if (!empty($row['poster_email']))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	/**
	 * Returns an associative array containing the
	 * @param $jobIDs an array of job IDs
	 * @return
	 */
	public function GetApplicationsStatistics($jobIDs)
	{
		global $db;
		
		$statisticalData = array();
		
		$sql = 'SELECT job_id, count(id) numberOfApplications, DATE_FORMAT(max(created_on), "' . DATE_TIME_FORMAT . '") lastApplicationOn 
				FROM job_applications j 
				WHERE job_id in (' . $this->buildCommaSeparatedIDsString($jobIDs) . ') GROUP BY job_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$statisticalData[$row['job_id']] = $row;
			
		return $statisticalData;
	}
	
	private function buildCommaSeparatedIDsString($numbersArray)
	{
		$string = '';
		
		for ($i = 0; $i < count($numbersArray); $i++)
		{
			$string .= $numbersArray[$i];

			if ($i < count($numbersArray) - 1)
				$string .= ',';
		}
		
		return $string;
	}
}
?>