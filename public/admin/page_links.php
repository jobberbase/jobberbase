<?php
global $cache;

function flattenOrder($links)
{
	var_dump($links);
	$ret = array();
	foreach ($links->children as $position=>$child)
	{
		$ret[] = array(
			'id'=>$child->id,
			'parent'=>$links->id,
			'position'=>$position);
		$ret = array_merge($ret, flattenOrder($child));
	}
	return $ret;
}

// remove navigation cache
$cache->removeCache(CACHE_NAVIGATION);

// Check if a valid menu name is given
if (!empty($id))
{
	$menu = get_menus($id);
	if (empty($menu))
	{
		$menu = false;
	}
	else
	{
		$menu = $menu[$id];
	}
}
else
{
	$menu = false;
}

// If _POST is set, do the requested action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && key_exists('action', $_POST)) {
	switch ($_POST['action']) {
		case 'saveOrder':
			if (array_key_exists('order', $_POST))
			{
				$links = json_decode($_POST['order']);
				$links = flattenOrder($links);
				foreach ($links as $link)
				{
					$sql = 'UPDATE '.DB_PREFIX.'links SET link_order = '.$link['position'].', parent = '.$link['parent'].' WHERE id = '.$link['id']; $db->query($sql);
				}
			}
			break;
		case 'newLink':
			$menus = get_menus();
			if (array_key_exists($id, $menus))
			{
				$parent_id = $menus[$id]['id'];
				$query = '
					SELECT MAX(link_order) as link_order
					FROM '.DB_PREFIX.'links
					WHERE parent='.$parent_id.'
					ORDER BY link_order DESC LIMIT 1';
				$order = (int)$db->QueryItem($query) + 1;
				$db->query('INSERT INTO '.DB_PREFIX.'links VALUES (NULL, "http://", "New Link", "" , "'.$parent_id.'",' . $order . ')');
				echo $db->insert_id;
			}
			else
			{
				echo 0;
			}
			break;
		case 'deleteLink':
			if (array_key_exists('link', $_POST))
			{
				$deleteIds = get_descendants(intval($_POST['link']));
				if (!empty($deleteIds))
				{
					$result = $db->query('DELETE FROM '.DB_PREFIX.'links WHERE id IN (' . implode(',',$deleteIds) . ')');
				}
			}
			break;
		case 'saveLink':
			if (array_key_exists('url', $_POST) && array_key_exists('name', $_POST) && array_key_exists('title', $_POST) && array_key_exists('link', $_POST))
			{
				$result = $db -> query('UPDATE '.DB_PREFIX.'links SET url = "' . $_POST['url'] . '", name = "' . $_POST['name'] . '", title = "' . $_POST['title'] . '" WHERE id = ' . intval($_POST['link']) );
			}
			break;
		case 'deleteMenu':
			if (array_key_exists('menuname', $_POST))
			{
				$menu = get_menus($_POST['menuname']);
				if (!empty($menu))
				{
					$deleteIds = get_descendants($menu[$_POST['menuname']]['id']);
					if (!empty($deleteIds))
					{
						$result = $db->query('DELETE FROM '.DB_PREFIX.'links WHERE id IN (' . implode(',',$deleteIds) . ')');
					}
				}
			}
			break;
	}
	exit();
}
	
// If a valid menu is given, load it's settings
if ($menu)
{
	$links = get_navigation($menu['varname']);
	$js[] = 'links';

	$cache->removeCache(CACHE_NAVIGATION);

	$smarty->assign('menu_id', $menu['id']);
	$smarty->assign('menu_varname', $menu['varname']);
	$smarty->assign('menu_name', $menu['name']);
	$smarty->assign('menu_title', $menu['title']);
	$smarty->assign('links', $links);
	$template = 'links.tpl';
}
else
{
	$template = 'menus.tpl';
}

$smarty->assign('current_category', 'links');
?>
