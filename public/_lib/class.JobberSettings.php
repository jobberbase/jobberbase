<?php
/**
 * jobberbase site configuration class
 *
 * @author     Erik Goverde  <http://chronoscripts.com> <chronos@chronoscripts.com>
 * @license    You are free to edit and use this work, but please keep the credits.
 * 
 */

class JobberSettings
{
	var $mSettings = false;
		
	public function __construct()
	{
		global $db;
		
		$sql = 'SELECT * FROM '.DB_PREFIX.'settings ORDER BY id ASC';
		$result = $db->query($sql);
		
		$settings = array();
		
		while ($row = $result->fetch_assoc())
		{
			// Setting temporary variable names for the 'value' and 'fieldtype' fields
			$value = $row['value']; 
			$data_type = $row['data_type'];
			$input_type = $row['input_type'];
			$input_options = $row['input_options'];
			$validation = explode('|', $row['validation']); 
				
			// Apply certain actions on special fields 
			if ($input_type == 'checkbox' || $input_type == 'select' || $input_type == 'radiobutton')
			{
				$input_options = explode('|', $input_options);
			}
			else if ($input_type == 'available_themes')
			{
				$input_type = 'select';	
				$themes = array();
				$dir = APP_PATH.'_tpl/';
				if ($dh = opendir($dir)) {
				    while (($file = readdir($dh)) !== false) { if (filetype($dir . $file) != 'file' && $file != '.' && $file != '..' && $file != '.svn' && $file != '_cache') $themes[] = $file; }
					closedir($dh);
				}
				$input_options = $themes;
			}
			else if ($input_type == 'timezones')
			{
				$input_type = 'select';	
				$timezones = array();
				
				$timezones = timezone_identifiers_list();
				
				$input_options = $timezones;
			}
			
			
			if ($data_type == 'boolean' && $value != 1) 
			{
				$value = false;
			}
				
			// Add the row to the setting array
			$settings[$row['name']] = array(
				'name' => $row['name'], 
				'title' => $row['title'], 
				'description' => $row['description'],
				'data_type' => $data_type,
				'input_type' => $input_type,
				'input_options' => $input_options,
				'validation' => $validation,
				'value' => stripslashes($value), 
				'category_id' => $row['category_id'],
				'extradata' => $row['extradata']
			);
		}
		
		$this->mSettings = $settings;

	}
	
	public function GetSettingsCategories()
	{
	    global $db;
	    $sql = 'SELECT id, name, var_name, description  
				FROM '.DB_PREFIX.'settings_categories 
				ORDER BY id ASC';
	    $result = $db->query($sql);
	    
	    $settings_category = array();
		
		while ($row = $result->fetch_assoc())
		{
			$settings_category[] = array('name' => $row['name'], 'var_name' => $row['var_name'], 'description' => $row['description']);
		}
		return $settings_category;
	}

	public function GetSettingsCategoryNameById($id)
	{
		global $db;
	    $sql = 'SELECT name 
				FROM '.DB_PREFIX.'settings_categories 
				WHERE id = ' . $id;
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['name'];
	}
	
	public function GetSettingsCategoryIdByVarname($var_name)
	{
		global $db;
	    $sql = 'SELECT id 
				FROM '.DB_PREFIX.'settings_categories 
				WHERE var_name = "' . $var_name . '"';
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['id'];
	}

	public function GetSetting($name, $advanced = false)
	{
		$settings = $this->mSettings;
		if (!empty($settings[$name]))
		{
			if ($advanced == true) return $settings[$name];
			else return $settings[$name]['value'];
		}
		else
			return false;
	}
	
	public function GetSettings($setting_names = false, $advanced = false)
	{
		$settings = $this->mSettings;
		$settings_array = array();
		
		if (!empty($setting_names))
		{
			$count = count($setting_names);
			$i = 0; 
			while($i < $count)
			{
				if (!empty($settings[$setting_names[$i]]) && $advanced == true)
				{
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]];
				}
				elseif (!empty($settings[$setting_names[$i]]))
				{
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]]['value'];
				}
					
				$i++;
			}
			return $settings_array;
		}
		elseif ($advanced === false)
		{
			foreach ($settings as $setting)
			{
				$settings_array[$setting['name']] = (!empty($setting['extradata']) && $setting['name'] == 'site_logo') ? $setting['extradata'] : $setting['value'];
			}

			return $settings_array;
		}
		else 
		{
			return $settings;
		}
	}
	
	public function GetSettingsByCategory($category_id, $advanced = false)
	{
		global $db;
		$sql = 'SELECT name
				FROM '.DB_PREFIX.'settings
				WHERE category_id = ' . $category_id . ' ORDER BY ordering ASC';
		$result = $db->query($sql);
		
		$settings_list = array();
		
		while ($row = $result->fetch_assoc()) {	$settings_list[] = $row['name']; }

		$settings = $this->GetSettings($settings_list, $advanced);

		return $settings;
	}

	public function UpdateSettings($settings_array)
	{
		global $db, $cache;
		
		// remove cache
        $cache->removeCache(CACHE_SITE_SETTINGS);
		
		$settings = $this->mSettings; $i = 0;
		$count = count($settings_array);
		
		while($i < $count)
		{
			$value = $settings_array[$i]['value'];
			$name = $settings_array[$i]['name'];
			$extradata = $settings_array[$i]['extradata'];
			$extradata_q = '';
			
			if (!empty($extradata))
			{
				$extradata_q = ', extradata = "' . $extradata . '"';
			}
			
			
			if ($value != $settings[$name]['value'] || !empty($extradata_q))
			{
				$sql = 'UPDATE '.DB_PREFIX.'settings SET value = "' . $value . '"' . $extradata_q . ' WHERE name = "' . $name . '"';
				$extradata = '';
				$extradata_q = null;
				$db->query($sql);
			}
			
			$i++;
		}
	}
}
?>