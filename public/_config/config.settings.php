<?php
/**
 * General settings
 *
 */

// jobberBase version
define('JOBBERBASE_VERSION', '2.0');

// Global settings definitions
foreach ($settings as $k => $setting)
{
	$k = strtoupper($k);
	define("{$k}", $setting);
}
?>
