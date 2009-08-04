<?php
/**
 * jobber job board platform
 *
 * @author     Chronos <http://chronoscripts.com> <chronos@chronoscripts.com>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 */
 
	$city_array = get_cities_cloud();
	$smarty->assign('cities_overview', $city_array);
	$smarty->assign('cities_count', count($city_array));
	$html_title = $translations['jobscity']['page_title'];
	$template = 'cities.tpl';
?>