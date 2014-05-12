<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */

	/***  CONFIGURATION STARTS HERE  ***/
	$langName = 'English';
	$langCode = 'en';
	die('This script is disabled for security purposes!<br />Comment out or delete this line (it lives in the configuration section of this file and starts with word "die") to use it.');
	/***  CONFIGURATION ENDS HERE  ***/

	require_once '../../_config/config.php';

	// test if language is already created in the database
	$sql = "SELECT id FROM ".DB_PREFIX."i18n_langs WHERE code='{$langCode}'";
	$lang_id = $db->queryItem($sql);
	if ($lang_id)
	{
		echo 'Existing entry found in i18n_langs.<br />';
	}
	else
	{
		echo 'Creating an entry in i18n_langs...<br />';
		// if the language is not created yet, create it.
		$sql = "INSERT INTO ".DB_PREFIX."i18n_langs (name, code) VALUES ('{$langName}', '{$langCode}')";
		$db->Execute($sql);
		$lang_id = $db->insert_id;
	}
	
	if ($lang_id)
	{
		$sql = "SELECT COUNT(id) FROM ".DB_PREFIX."i18n_translations WHERE lang_id={$lang_id}";
		$count = $db->queryItem($sql);
		if ($count)
		{
			die('Some entries for this language id already exist in the database!<br />Please remove them manually or truncate the i18n_translations table before importing again.');
		}

		echo 'No strings have been found for this language id in the database. Continuing with import...<br />';
		$cache->removeCache(CACHE_TRANSLATIONS.'_'.$langCode);

		// strings / .ini
		$translationFilePath = APP_PATH . "_tools/translations/src/{$langCode}/translations_{$langCode}.ini";

		if (file_exists($translationFilePath)) 
		{
			echo 'UI translation file found. Importing...<br />';
			$translations = parse_ini_file($translationFilePath, true);

			foreach ($translations as $t_section => $t_data)
			{
				$sql = "INSERT INTO ".DB_PREFIX."i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, {$lang_id}, '{$t_section}')";
				$db->Execute($sql);

				$parent_id = $db->insert_id;

				foreach ($t_data as $k => $v)
				{
					$sql = "INSERT INTO ".DB_PREFIX."i18n_translations (parent_id, lang_id, item, value) VALUES ({$parent_id}, {$lang_id}, '" . addslashes($k) . "', '" . addslashes($v) . "')";
					$db->Execute($sql);
				}
			}
		}
		else
		{
			echo 'UI translation file not found! Website translations will not be available for this language!<br />';
		}

		// emails / .xml
		$translationFilePath = APP_PATH . "_tools/translations/src/{$langCode}/emails_{$langCode}.xml";

		if (file_exists($translationFilePath)) 
		{
			echo 'Email translation file found. Importing...<br />';
			$xml = simplexml_load_file($translationFilePath);

			foreach ($xml as $email => $fields)
			{
				$item = (string) $email;
				$message = str_replace('{BR}', "\n", (string) $fields->message);

				if ($item == 'PublishToAdmin')
				{
					$subject = (string) $fields->newPostSubject;

					// 1st email: first post by a user
					$msg1 = str_replace('{BR}', "\n", (string) $fields->messageFirstPost) . $message;

					// create new section for this email
					$item1 = 'email_' . $item . '_firstPost';
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item1 . '")';
					$db->Execute($sql);
					$parent_id1 = $db->insert_id;

					// add subject as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id1 . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
					$db->Execute($sql);

					// add message as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id1 . ', ' . $lang_id . ', "message", "' . addslashes(trim($msg1)) . '", "textarea")';
					$db->Execute($sql);

					// 2nd email: usual email
					$msg2 = $message;

					// create new section for this email
					$item2 = 'email_' . $item;
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item2 . '")';
					$db->Execute($sql);
					$parent_id2 = $db->insert_id;

					// add subject as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id2 . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
					$db->Execute($sql);

					// add message as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id2 . ', ' . $lang_id . ', "message", "' . addslashes(trim($msg2)) . '", "textarea")';
					$db->Execute($sql);
				}
				else
				{
					$subject = (string) $fields->subject;

					// create new section for this email
					$item = 'email_' . $item;
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item . '")';
					$db->Execute($sql);
					$parent_id = $db->insert_id;

					// add subject as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
					$db->Execute($sql);

					// add message as translation item
					$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id . ', ' . $lang_id . ', "message", "' . addslashes(trim($message)) . '", "textarea")';
					$db->Execute($sql);
				}
			}
		}
		else
		{
			echo 'Email translation file not found! Website translations will not be available for this language!<br />';
		}
		echo 'Done!';
	}
