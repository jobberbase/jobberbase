<?php
/**
 * 
 * Utility class that encapsulates the translation logic. 
 * 
 * @author Filip C.T.E. <filipcte@gmail.com>
 * @author putypuruty
 *
 */

class Translator
{
	protected $translations_raw = array();
	protected $translations = array();
	protected $lang_code = 'en';
	
	public function __construct($languageCode)
	{
		global $db;
		
		$this->lang_code = $languageCode;
		
		$sql = 'SELECT a.*
		               FROM '.DB_PREFIX.'i18n_translations a, '.DB_PREFIX.'i18n_langs b 
		               WHERE b.code = "' . $languageCode . '" AND b.id = a.lang_id 
		               ORDER BY a.parent_id ASC, a.item ASC';
		$trans = $db->QueryArray($sql);

		// get raw, structured translations
		foreach ($trans as $t)
		{
			if ($t['parent_id'] == 0 && !isset($translations[$t['id']]))
			{
				$this->translations_raw[$t['id']] = array('section' => $t['item'], 'id' => $t['id'], 'items' => array());
			}
			else
			{
				$this->translations_raw[$t['parent_id']]['items'][] = array('id' => $t['id'], 'item' => $t['item'], 'value' => $t['value'], 'field_type' => $t['field_type']);
			}
		}
		
		// get translations suited for the site & themes
		foreach ($this->translations_raw as $t)
		{
			foreach ($t['items'] as $i)
			{
				$this->translations[$t['section']][$i['item']] = $i['value'];
			}
		}
	}
	
	public function getTranslations()
	{
		return $this->translations;
	}
	
	public function getRawTranslations()
	{
		return $this->translations_raw;
	}
	
	public function getLanguageIdByCode()
	{
		global $db;
		
		$sql = 'SELECT id FROM '.DB_PREFIX.'i18n_langs WHERE code = "' . $this->lang_code . '"';
		return $db->QueryItem($sql);
	}

	public function getLanguageCodeById($id)
	{
		global $db;

		$sql = 'SELECT code FROM '.DB_PREFIX.'i18n_langs WHERE id = ' . $id;
		return $db->QueryItem($sql);
	}

	public function getItemById($id)
	{
		global $db;
		
		$sql = 'SELECT * FROM '.DB_PREFIX.'i18n_translations WHERE id = ' . $id;
		return $db->QueryRow($sql);
	}
	
	/**
	 * Returns the specified message from the translation file and replaces any placeholders.
	 * 
	 * It can receive a variable number of parameters, but at least one variable is mandatory:
	 * the label code. The extra variables are considered to be the values used to replace the
	 * placeholders. If only the label is given as parameter, then this method will return the 
	 * specified message as it is written in the translation file.
	 * 
	 * Usage: $translator->translate("jobs.viewed", 5) where jobs.viewed corresponds to the 
	 * following section in the translation file:
	 * 
	 * [jobs]
	 * viewed = "Viewed: {0} times"
	 */
	public function translate()
	{
		$numargs = func_num_args();

		if ($numargs < 1)
		{
			trigger_error('Translator.translate requires at least the label as parameter');
		}
		 else
		 {
		 	$arguments = func_get_args();
		 	
		 	$label = $this->getLabel($arguments);
		 	
		 	if ($this->existsLabel($label))
		 	{
		 		$message = $this->getMessage($label);
		 		
		 		$placeholders = $this->getMessagePlaceholders($arguments);
		 		
		 		if (count($placeholders) == 0)
		 			return $message;
		 			
			 	return $this->replacePlaceholders($message, $placeholders);
		 	}
			else
			{
				return $label;
			}
		 }
	}
	
	public function getLanguages()
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'i18n_langs ORDER BY name ASC';
		return $db->QueryArray($sql);
	}
	
	public function addLanguage($name, $code)
	{
		global $db;
		
		if ($this->languageExists($name, $code))
		{
			return false;
		}
		
		$sql = 'INSERT INTO '.DB_PREFIX.'i18n_langs (name, code) VALUES ("' . $name . '", "' . $code . '")';
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function editLanguage($id, $name, $code)
	{
		global $db;
		
		if ($this->languageExists($name, $code))
		{
			return false;
		}
		
		$sql = 'UPDATE '.DB_PREFIX.'i18n_langs SET name = "' . $name . '", code = "' . $code . '" WHERE id = ' . $id;
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function deleteLanguage($id)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'i18n_langs WHERE id = ' . $id;
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	
	public function addTranslationSection($item, $lang_id)
	{
		global $db;
		
		if ($this->translationSectionExists($item, $lang_id))
		{
			return false;
		}
		
		$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (id, parent_id, lang_id, item) VALUES (NULL, 0, ' . $lang_id . ', "' . $item . '")';
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function addTranslationItem($section_id, $item, $value)
	{
		global $db;
		
		$section = $this->getItemById($section_id);
		
		$sql = 'INSERT INTO '.DB_PREFIX.'i18n_translations (id, parent_id, lang_id, item, value) VALUES (NULL, ' . $section_id . ', ' . $section['lang_id'] . ', "' . $item . '", "' . $value . '")';
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return $db->insert_id;
		}
		
		return false;
	}
	
	public function saveTranslationItem($id, $value)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'i18n_translations SET value = "' . $value . '" WHERE id = ' . $id;
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function deleteTranslationItem($id)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'i18n_translations WHERE id = ' . $id;
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function deleteTranslationSection($id)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'i18n_translations WHERE id = ' . $id . ' OR parent_id = ' . $id;
		$db->Execute($sql);
		
		if ($db->affected_rows > 0)
		{
			return true;
		}
		
		return false;
	}
	
	
	
	private function languageExists($name, $code)
	{
		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'i18n_langs WHERE name = "' . $name . '" OR code = "' . $code . '"';
		$res = $db->QueryRow($sql);
		
		if (!empty($res))
		{
			return true;
		}
		
		return false;
	}
	
	private function translationSectionExists($item, $lang_id)
	{
		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'i18n_translations WHERE parent_id = 0 AND item = "' . $item . '" AND lang_id = ' . $lang_id;
		$res = $db->QueryRow($sql);
		
		if (!empty($res))
		{
			return true;
		}
		
		return false;
	}
	
	private function translationItemExists($item, $lang_id)
	{
		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'i18n_translations WHERE parent_id != 0 AND item = "' . $item . '" AND lang_id = ' . $lang_id;
		$res = $db->QueryRow($sql);
		
		if (!empty($res))
		{
			return true;
		}
		
		return false;
	}
	
	private function getLabel($arguments)
	{
		return $arguments[0];
	}
	
	private function existsLabel($label)
	{
		list($section, $sectionMessage) = explode(".", $label);
		
		return array_key_exists($section, $this->translations) && array_key_exists($sectionMessage, $this->translations[$section]);
	}
	
	private function getMessage($label)
	{
		list($section, $sectionMessage) = explode(".", $label);
		
		return $this->translations[$section][$sectionMessage];
	}
	
	private function getMessagePlaceholders($arguments)
	{
		$messagePlaceholders = $arguments;
		
		array_shift($messagePlaceholders);
		
		return $messagePlaceholders;
	}
	
	private function replacePlaceholders($message, $placeholders)
	{
		$messageWithReplacePlaceholders = $message;
		
		for ($index = 0; $index < count($placeholders); $index++) 
		{
			$messageWithReplacePlaceholders = str_replace('{' . $index . '}', $placeholders[$index], $messageWithReplacePlaceholders);
		}
		
		return $messageWithReplacePlaceholders;
	}
}
?>
