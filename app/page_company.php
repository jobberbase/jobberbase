<?php
	$sanitizer = new Sanitizer();
	
	$sql = 'SELECT DISTINCT company FROM jobs';
	$comps = $db->QueryArray($sql);
	foreach ($comps as $comp)
	{
		if ($sanitizer->sanitize_title_with_dashes($comp['company']) == $id)
		{
			$company = $comp['company'];
			break;
		}
	}
	$smarty->assign('jobs', $job->ApiGetJobsByCompany($company, false, false));
	$smarty->assign('current_company', $company);

	$html_title = 'Cauţi oferte de muncă la ' . $company . '?';
	$meta_description = 'Vino pe jobber pentru joburi la ' . $company . '! Anunţuri gratuite pentru angajatori.';
	$template = 'company.tpl';
?>