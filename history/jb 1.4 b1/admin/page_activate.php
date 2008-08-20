<?php
	$j = new Job($_POST['job_id']);
	$activator = $j->Activate();
	$vali = new Postman();
	$vali->MailPostActivatedToUser($j->GetInfo());
	echo 1;
	exit;
?>