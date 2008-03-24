<?php
	$j = new Job($id);
	// if auth code used, check it and allow activating
	if (($_SESSION['later_edit'] == $j->GetAuth()) || ($extra != '' && $extra == $j->GetAuth()))
	{
		$activator = $j->Activate();
		$vali = new Postman();
		$vali->MailPostActivatedToUser($j->GetInfo());
		
		
		$_SESSION['status'] = $translations['jobs']['activated_success'];	
		redirect_to(BASE_URL . 'job/' . $id . '/');
		exit;
	}
	else
	{
		redirect_to(BASE_URL);
		exit;
	}
?>