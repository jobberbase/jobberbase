<?php
	$sanitizer = new Sanitizer();
	
	$sql = 'SELECT DISTINCT company FROM '.DB_PREFIX.'jobs';
	$comps = $db->QueryArray($sql);
	if($id === 'undisclosed')
	{
		$company = '';
	}
	else
	{
		$company = false;
		foreach ($comps as $comp)
		{
			if ($sanitizer->sanitize_title_with_dashes($comp['company']) === $id)
			{
				$company = $comp['company'];
				break;
			}
		}
	}

	if ($company !== false)
	{
		$smarty->assign('jobs', $job->ApiGetJobsByCompany($company, false, false));
		$smarty->assign('current_company', $company);

		$html_title = $translations['companies']['are_you_looking'] . ' ' . $company . '?';
		$meta_description = $translations['companies']['meta_part1'] . ' ' . $company . '! ' . $translations['companies']['meta_part2'];
		$template = 'company.tpl';
	}
	else
	{
		// Copied from index.php
		header("HTTP/1.1 404 Not Found");
		// TO-DO: add suggestion if no trailing slash supplied
		$html_title = 'Page unavailable / ' . SITE_NAME;
		$template = 'error.tpl';
	}
?>
