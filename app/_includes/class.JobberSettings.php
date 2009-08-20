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
		
	function __construct()
	{
		global $db;
		
		$sql = 'SELECT * FROM settings';
		$result = $db->query($sql);
		
		$settings = array();
		
		while ($row = $result->fetch_assoc())
		{
			// Setting temporary variable names for the 'value' and 'fieldtype' fields
			$setting_value = $row['setting_value']; 
			$field_type = explode('|', $row['field_type']);
			$validation = explode('|', $row['validation']); 
				
			// Apply certain actions on special fields 
			if ($field_type[0] == 'checkbox') $setting_value = explode('|', $setting_value);
			elseif ($field_type[0] == 'available_themes')
			{
				$themes = array( 0 => 'select');
				$dir = APP_PATH.'_templates/';
				if ($dh = opendir($dir)) {
				    while (($file = readdir($dh)) !== false) { if (filetype($dir . $file) != 'file' && $file != '.' && $file != '..' && $file != '.svn' && $file != '_cache') $themes[] = $file; }
					closedir($dh);
				}
				$field_type = $themes;
			}
				
			// Add the row to the setting array
			$settings[$row['setting_name']] = array(
				'setting_name' => $row['setting_name'], 
				'setting_title' => $row['setting_title'], 
				'setting_description' => $row['setting_description'], 
				'setting_value' => $setting_value, 
				'category_id' => $row['category_id'], 
				'field_type' => $field_type, 
				'validation' => $validation
				);
		}
		
		$this->mSettings = $settings;

	}
	
	public function GetSettingsCategories()
	{
	    global $db;
	    $sql = 'SELECT id, name, var_name, description  
				FROM settings_categories 
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
				FROM settings_categories 
				WHERE id = ' . $id;
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['name'];
	}
	
	public function GetSettingsCategoryIdByVarname($var_name)
	{
		global $db;
	    $sql = 'SELECT id 
				FROM settings_categories 
				WHERE var_name = "' . $var_name . '"';
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['id'];
	}

	public function GetSetting($setting_name, $advanced = false)
	{
		$settings = $this->mSettings;
		if (!empty($settings[$setting_name]))
		{
			if ($advanced == true) return $settings[$setting_name];
			else return $settings[$setting_name]['setting_value'];
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
			$i = 0; while($i < count($setting_names))
			{
				if (!empty($settings[$setting_names[$i]]) && $advanced == true) 
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]];
				elseif (!empty($settings[$setting_names[$i]]))
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]]['setting_value'];
				$i++;
			}
			return $settings_array;
		}
		elseif ($advanced == false)
		{
			foreach ($settings as $setting)
			{
				$settings_array[$setting['setting_name']] = $setting['setting_value'];
			}
			return $settings_array;
		}
		else return $settings;
	}
	
	public function GetSettingsByCategory($category_id, $advanced = false)
	{
		global $db;
		$sql = 'SELECT setting_name
				FROM settings
				WHERE category_id = ' . $category_id;
		$result = $db->query($sql);
		
		$settings_list = array();
		
		while ($row = $result->fetch_assoc()) {	$settings_list[] = $row['setting_name']; }

		$settings = $this->GetSettings($settings_list, $advanced);

		return $settings;
	}

	public function UpdateSettings($settings_array)
	{
		global $db;
		
		$settings = $this->mSettings; $i = 0;
		
		while($i < count($settings_array))
		{
			// Escape field value to avoid SQL injection
			$setting_value = $db->real_escape_string(strip_tags($settings_array[$i]['setting_value']));
			$setting_name = $settings_array[$i]['setting_name'];
			
			if ($setting_value != $settings[$setting_name]['setting_value'])
			{
				$sql = 'UPDATE settings SET setting_value = "' . $setting_value . '" WHERE setting_name = "' . $setting_name . '"';
				$db->query($sql);
			}
			$i++;
		}
	}
}
?>