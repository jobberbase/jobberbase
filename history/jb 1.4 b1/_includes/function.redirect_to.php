<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Function acts as a wrapper over header('Location...') and performs an HTTP redirect
 *
 * @param string $url		Location for the redirect
 */

function redirect_to($url)
{
	header('Location: ' . $url);
}
?>