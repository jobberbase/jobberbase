<?php
/**
 * jobber job board platform
 *
 * @author     Filip C.T.E. <http://www.filipcte.ro> <me@filipcte.ro>
 * @license    You are free to edit and use this work, but it would be nice if you always referenced the original author ;)
 *             (see license.txt).
 * 
 * Misc functions
 */

function add_single_quotes($arg) 
{
	/* single quote and escape single quotes and backslashes */ 
	return "'" . addcslashes($arg, "'\\") . "'"; 
}

function get_categories()
{
	global $db;
	$categories = array();
	$sql = 'SELECT id, name, var_name
	               FROM categories
	               ORDER BY id ASC';
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$categories[] = array('id' => $row['id'], 'name' => $row['name'], 'var_name' => $row['var_name']);
	}
	return $categories;
}

function get_types()
{
	global $db;
	$types = array();
	$sql = 'SELECT id, name
	               FROM types
	               ORDER BY id ASC';
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$types[] = array('id' => $row['id'], 'name' => $row['name']);
	}
	return $types;
}

function get_cities()
{
	global $db;
	$cities = array();
	$sql = 'SELECT id, name
	               FROM cities
	               ORDER BY id ASC';
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		if (count($cities) < 1)
		{
			$cities[] = array('id' => $row['id'], 'name' => '-- ' . $row['name'] . ' --');
		}
		else
		{
			$cities[] = array('id' => $row['id'], 'name' => $row['name']);
		}
	}
	return $cities;
}

function get_categ_id_by_varname($var_name)
{
	global $db;
	$sql = 'SELECT id FROM categories WHERE var_name = "' . $var_name . '"';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	return $row['id'];
}

function get_city_id_by_asciiname($ascii_name)
{
	global $db;
	$cities = array();
	$sql = 'SELECT id, name
	               FROM cities
	               WHERE ascii_name = "' . $ascii_name . '"';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	return array('id' => $row['id'], 'name' => $row['name']);
}
?>