<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */

	require_once '../../_config/config.php';
	
	$cache->removeCache(CACHE_TRANSLATIONS);
	
	$lang_id = 1;
	
	
	// strings / .ini
	if (0)
	{
		$translationFilePath = APP_PATH . '_tools/translations/src/en/translations_en.ini';

		if (file_exists($translationFilePath)) 
		{
			$translations = parse_ini_file($translationFilePath, true);
		}

		foreach ($translations as $t_section => $t_data)
		{
			$sql = 'INSERT INTO i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $t_section . '")';
			$db->Execute($sql);

			$parent_id = $db->insert_id;

			foreach ($t_data as $k => $v)
			{
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id . ', ' . $lang_id . ', "' . addslashes($k) . '", "' . addslashes($v) . '")';
				$db->Execute($sql);
			}
		}	
	}
	
	
	
	// emails / .xml
	if (0)
	{
		$translationFilePath = APP_PATH . '_tools/translations/src/en/emails_en.xml';

		if (file_exists($translationFilePath)) 
		{
			$xml = simplexml_load_file($translationFilePath);
		}
		
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
				$sql = 'INSERT INTO i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item1 . '")';
				$db->Execute($sql);
				$parent_id1 = $db->insert_id;

				// add subject as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id1 . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
				$db->Execute($sql);

				// add message as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id1 . ', ' . $lang_id . ', "message", "' . addslashes(trim($msg1)) . '", "textarea")';
				$db->Execute($sql);
				
				
				
				// 2nd email: usual email
				$msg2 = $message;
				
				// create new section for this email
				$item2 = 'email_' . $item;
				$sql = 'INSERT INTO i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item2 . '")';
				$db->Execute($sql);
				$parent_id2 = $db->insert_id;

				// add subject as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id2 . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
				$db->Execute($sql);

				// add message as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id2 . ', ' . $lang_id . ', "message", "' . addslashes(trim($msg2)) . '", "textarea")';
				$db->Execute($sql);
			}
			else
			{
				$subject = (string) $fields->subject;
				
				// create new section for this email
				$item = 'email_' . $item;
				$sql = 'INSERT INTO i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item . '")';
				$db->Execute($sql);
				$parent_id = $db->insert_id;

				// add subject as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value) VALUES (' . $parent_id . ', ' . $lang_id . ', "subject", "' . addslashes(trim($subject)) . '")';
				$db->Execute($sql);

				// add message as translation item
				$sql = 'INSERT INTO i18n_translations (parent_id, lang_id, item, value, field_type) VALUES (' . $parent_id . ', ' . $lang_id . ', "message", "' . addslashes(trim($message)) . '", "textarea")';
				$db->Execute($sql);
				
			}
		}
	}