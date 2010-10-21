<?php
    $sql = 'SELECT a.name, a.email, a.cv_path, a.job_id, b.title, b.company, DATE_FORMAT(a.created_on, "' . DATE_TIME_FORMAT . '") AS created_on
                FROM job_applications a, jobs b
                WHERE a.job_id = b.id AND a.name != ""
                ORDER BY a.created_on DESC, a.name ASC';
    $applicants = $db->QueryArray($sql);

    $smarty->assign('applicants', $applicants);
    $smarty->assign('applicants_count', count($applicants));
	$smarty->assign('current_category', 'applicants');
    $smarty->assign('cv_path', '/' . FILE_UPLOAD_DIR);
    $template = 'applicants.tpl';
?>
