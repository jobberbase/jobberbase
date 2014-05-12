<?php

// ajax
if ($_SERVER['REQUEST_METHOD'] == 'POST' && key_exists('action', $_POST)) 
{
	global $cache;
	
	escape($_POST);
	
	switch ($_POST['action']) 
	{
		case 'add_language':
		{
			if ($translator->addLanguage($name, $code))
			{
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'edit_language':
		{
			$oldCode = $translator->getLanguageCodeById($id);
			$cache->removeCache(CACHE_TRANSLATIONS.'_'.$oldCode);
			if ($translator->editLanguage($id, $name, $code))
			{
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'delete_language':
		{
			$code = $translator->getLanguageCodeById($id);
			if ($translator->deleteLanguage($id))
			{
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'add_translation_section':
		{
			if ($translator->addTranslationSection($item, $lang_id))
			{
				$code = $translator->getLanguageCodeById($lang_id);
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'add_translation_item':
		{
			escape($_POST, array('value'));
			if ($new_item_id = $translator->addTranslationItem($section_id, $item, $value))
			{
				$item = $translator->getItemById($new_item_id);
				$code = $translator->getLanguageCodeById($item['lang_id']);
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo $new_item_id;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'delete_translation_item':
		{
			$item = $translator->getItemById($id);
			if ($translator->deleteTranslationItem($id))
			{
				$code = $translator->getLanguageCodeById($item['lang_id']);
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'save_translation_item':
		{
			escape($_POST, array('value'));

			if ($translator->saveTranslationItem($id, $value))
			{
				$item = $translator->getItemById($id);
				$code = $translator->getLanguageCodeById($item['lang_id']);
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$cde);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}
		
		case 'delete_translation_section':
		{
			$section_item = $translator->getItemById($id);
			if ($translator->deleteTranslationSection($id))
			{
				$code = $translator->getLanguageCodeById($section_item['lang_id']);
				$cache->removeCache(CACHE_TRANSLATIONS.'_'.$code);
				echo 1;
			}
			else
			{
				echo 0;
			}
			break;
		}

	}
	exit;
}

// edit translations
if (isset($_app_info['params'][1]) && $_app_info['params'][1] == 'edit')
{
	$lang_code = (isset($_app_info['params'][2]) ? $_app_info['params'][2] : LANG_CODE);
	$translator_edit = new Translator($lang_code);

	$smarty->assign('translations_raw', $translator_edit->getRawTranslations());
	$smarty->assign('languages', $translator->getLanguages());
	$smarty->assign('current_category', 'translations_edit');
	$smarty->assign('current_lang', $lang_code);
	$smarty->assign('current_lang_id', $translator_edit->getLanguageIdByCode());
	$template = 'translations-edit.tpl';
}
// list translations options (languages and translations)
else
{
	$smarty->assign('languages', $translator->getLanguages());

	$smarty->assign('current_category', 'translations');
	$template = 'translations.tpl';
}
?>
