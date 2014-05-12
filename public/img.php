<?php
if(!file_exists('_config/config.php')) 
{
   die('[index.php] _config/config.php not found');
}

require_once '_config/config.php';

define('BASE_URL', APP_URL);

switch ($_GET['q'])
{
	case 'site_logo':
	{
		$data = SITE_LOGO;
		break;
	}
}

//header('Content-type: image/jpg');
echo $data;
exit;
