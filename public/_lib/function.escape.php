<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Function escapes all POST/GET variables after form submission
 *
 * @Usage      Instead of doing extract($_POST), you can now
 *             escape fields like this: escape($_POST)
 *
 * @param array $what         $_GET, $_POST or any other array
 * @param array $dontStrip    an array of key names in $what, whose values should not be stripped of HTML
 */

function escape($what, $dontStrip=array())
{
	global $db;

	foreach ($what as $variable => $value)
	{
		if (is_string($value))
		{
			if (in_array($variable, $dontStrip))
			{
				$GLOBALS[$variable] = $db->real_escape_string($value);
			}
			else
			{
				$GLOBALS[$variable] = $db->real_escape_string(strip_tags($value));
			}
		}
		else
		{
			$GLOBALS[$variable] = $value;
		}
	}
}
?>
