<?php
	require_once '_lib/class.Installer.php';
	require_once '_lib/smarty/libs/Smarty.class.php';
	require_once '_lib/functions.php';
	
	define('ENVIRONMENT', 'dev');
	$bMySQL = false;
	$bUsingMySQLi = true;
	$Installer = new Installer();
	
	if (!isset($_SESSION['db_host']))
	{
		if (!isset($_POST['install']))
		{
			if (!$Installer->CheckPhpVersion())
			{
				echo "PHP5 or higher is needed to run jobberbase<br />";
				exit();
			}
			
			if (!$Installer->CheckCachePermissions())
			{
				echo "The cache folder (/_tpl/_cache) does not have write permission";
				exit();
			}
			
			if (!$Installer->CheckUploadPermissions())
			{
				echo "The uploads folder (/uploads) does not have write permission";
				exit();
			}
		}
		else
		{		
			$_SESSION['db_host'] = $_POST['host'];
			$_SESSION['db_name'] = $_POST['db_name'];
			$_SESSION['db_username'] = $_POST['username'];
			$_SESSION['db_password'] = $_POST['password'];
			
			if (!$Installer->CheckMySQLiInterface($_POST['host'], $_POST['db_name'], $_POST['username'], $_POST['password']))
			{
				if (substr($Installer->GetLastError(), 0, 22) == "Access denied for user")
				{
					echo "Wrong username or password";
				}
				else
				{
					//Server does not support MySQLi, save the data in SESSION and retry with MySQL
					header('Location: installer.php');
					exit();
				}
			}
			else
				$bMySQL = true;
		}
	}
	//If this is reached, it means that MySQLi extension is not installed
	else
	{
		echo "Not good!";
		if (!$Installer->CheckMySQLiInterface($_SESSION['db_host'], $_POST['db_name'], $_POST['username'], $_POST['password']))
		{
			//Could not create database connection, nothing to do but fail and weep
			unset($_SESSION['db_host']);
			unset($_SESSION['db_name']);
			unset($_SESSION['db_username']);
			unset($_SESSION['db_password']);
			echo "Could not connect to database: " . $Installer->GetLastError();
			exit();
		}
		$bUsingMySQLi = false;
		$bMySQL = true;
	}
	
	if ($bMySQL)
	{
		if (!$Installer->WriteConfigFile($_SESSION['db_host'], $_SESSION['db_name'], $_SESSION['db_username'], $_SESSION['db_password'], $bUsingMySQLi))
		{
			echo $Installer->GetLastError();
			exit();
		}
		
		$db = new Db($_SESSION['db_host'], $_SESSION['db_username'], $_SESSION['db_password'], $_SESSION['db_name']);
		$db->Execute('SET CHARSET UTF8');
		
		/*unset($_SESSION['db_host']);
		unset($_SESSION['db_name']);
		unset($_SESSION['db_username']);
		unset($_SESSION['db_password']);*/
		
		if (!$Installer->CheckMySQLVersion())
		{
			echo "MySQL 4.1 or higher is needed to run jobberbase<br />";
			exit();
		}
		
		if (!$Installer->SetUpDb())
		{
			echo $Installer->GetLastError();
			exit();
		}
		
		echo "Congratulations! Jobberbase was installed succesfully";
		exit();
	}
			
	define('APP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
	
	// Setup Smarty
	$smarty = new Smarty();
	$smarty->template_dir = APP_PATH . '_tpl/';
	$smarty->compile_dir = APP_PATH . '_tpl/_cache/';

	$smarty->display('installer.tpl');
?>