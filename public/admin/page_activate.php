<?php
	$j = new Job($_POST['job_id']);
	$activator = $j->Activate();
	$vali = new Postman();
	$vali->MailPostActivatedToUser($j->GetInfo(), BASE_URL_ORIG);
	Subscriber::sendJob($_POST['job_id']);
	echo 1;
	exit;
?>
