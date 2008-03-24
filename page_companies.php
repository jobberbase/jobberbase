<?php
	$companies = array();
	$sanitizer = new Sanitizer();
	$sql = 'SELECT DISTINCT company FROM jobs WHERE is_temp = 0 AND is_active = 1 ORDER BY company ASC';
	$comps = $db->QueryArray($sql);
	foreach ($comps as $company)
	{
		$sql = 'SELECT COUNT(id) AS nr
		               FROM jobs
		               WHERE company = "' . $company['company'] . '"';
		$nr = $db->QueryItem($sql);
		if ($nr < 2)
		{
			$tag_height = 1;
		}
		else if ($nr >= 2 && $nr < 3)
		{
			$tag_height = 2;
		}
		else if ($nr >= 3 && $nr < 4)
		{
			$tag_height = 3;
		}
		else if ($nr >= 4 && $nr < 5)
		{
			$tag_height = 4;
		}
		else if ($nr >= 5 && $nr < 6)
		{
			$tag_height = 5;
		}
		else if ($nr >= 6)
		{
			$tag_height = 6;
		}
		
		$companies[] = array('name' => $company['company'], 
		                     'varname' => $sanitizer->sanitize_title_with_dashes($company['company']), 
		                     'count' => $nr, 
		                     'tag_height' => $tag_height);
	}
	$smarty->assign('companies', $companies);
	$smarty->assign('companies_count', count($comps));
	$html_title = $translations['companies']['page_title'];
	$template = 'companies.tpl';
?>