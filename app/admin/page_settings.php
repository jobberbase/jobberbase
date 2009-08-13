<?php

	// Check if a valid category id is given
	$settings_category_id = $jobber_settings->GetSettingsCategoryIdByVarname($id);
	
	// Get setting names from a category OR show available categories
	if (isset($settings_category_id) && is_numeric($settings_category_id))
	{
		$settings_form = $jobber_settings->GetSettingsByCategory($settings_category_id, true);
		$smarty->assign('category_name', $jobber_settings->GetSettingsCategoryNameById($settings_category_id));
		$smarty->assign('settings_form', $settings_form);
	}
	else $smarty->assign('settings_categories', $jobber_settings->GetSettingsCategories());
	
	// Process a form (if given) to save the settings
	if (!empty($_POST))
	{
		$fv = new FormValidator();
		$setting_array = array();
		
		// Looping all given fields and values
		foreach ($settings_form as $setting)
		{
			// If a field didn't appear in $_POST, it must've been set to global
			if (!isset($_POST[$setting['setting_name']])) $_POST[$setting['setting_name']] = "_global";
			
			// If field value is an array, convert it to a string for DB storage
			if (is_array($_POST[$setting['setting_name']]))
			{
				$a = 0; $new_value = '';
				while($a < count($_POST[$setting['setting_name']]))
				{
					if ($_POST[$setting['setting_name']][$a] != '_hidden' && $new_value == '') $new_value .= $_POST[$setting['setting_name']][$a];
					elseif ($_POST[$setting['setting_name']][$a] != '_hidden' ) $new_value .= '|' . $_POST[$setting['setting_name']][$a];
					$a++;
				}
				$_POST[$setting['setting_name']] = $new_value;
			}
			
			// Validate the fields if needed
			if (!empty($setting['validation']))
			{
				$a = 0; while($a < count($setting['validation']))
				{
					if ($_POST[$setting['setting_name']] != '_global')
					{
						if ($setting['validation'][$a] == 'not_empty')
							$fv->isEmpty($setting['setting_name']);
						if ($setting['validation'][$a] == 'is_number')
							$fv->isNumber($setting['setting_name']);
						if ($setting['validation'][$a] == 'is_url_string')
							$fv->isUrlString($setting['setting_name']);
						if ($setting['validation'][$a] == 'is_email')
							$fv->isEmailAddress($setting['setting_name']);
					}
					$a++;
				}
			}
			$setting_array[] = array('setting_name'=> $setting['setting_name'], 'setting_value' => $_POST[$setting['setting_name']]);
		}
		
		if ($fv->isError())
		{
			// Give the fields their changed input, so the user doesn't need to type it in again
			foreach ($settings_form as $setting)
			{
				if ($setting['field_type'][0] == 'checkbox')
				{
					$new_value = explode('|', $_POST[$setting['setting_name']]);
					$settings_form[$setting['setting_name']]['setting_value'] = $new_value;
				}
				else
				{
					$settings_form[$setting['setting_name']]['setting_value'] = $_POST[$setting['setting_name']];
				}
			}
			
			// Assign error list to SMARTY and load template
			$errors = $fv->getErrorList();
			$smarty->assign('errors', $errors);
			$smarty->assign('settings_form', $settings_form);
			$template = 'settings.tpl';
		}
		else
		{
			$jobber_settings->UpdateSettings($setting_array);
			redirect_to(BASE_URL.'settings/'.$id);
		}
	} 
	
	$smarty->assign('current_category', 'settings');
	$template = 'settings.tpl';
	
?>