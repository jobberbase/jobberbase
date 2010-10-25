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
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($translator->editLanguage($id, $name, $code))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($translator->deleteLanguage($id))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($new_item_id = $translator->addTranslationItem($section_id, $item, $value))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($translator->deleteTranslationItem($id))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($translator->saveTranslationItem($id, $value))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
			if ($translator->deleteTranslationSection($id))
			{
				$cache->removeCache(CACHE_TRANSLATIONS);
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
	$smarty->assign('current_lang_id', $translator_edit->getLangId());
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