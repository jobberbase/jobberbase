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

// default language code, useful if you with to quickly switch between translation files later
define('LANG_CODE', 'en');


?>