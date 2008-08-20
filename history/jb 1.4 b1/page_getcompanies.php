<?php
	$companies = array();
	$sql = 'SELECT DISTINCT company FROM jobs ORDER BY company ASC';
	$comps = $db->QueryArray($sql);
	foreach ($comps as $comp)
	{
		$companies[] = $comp['company'];
	}
	echo json_encode($companies);
	exit;
?>