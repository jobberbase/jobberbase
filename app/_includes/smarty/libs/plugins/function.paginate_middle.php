<?php

/**
 * Project:     SmartyPaginate: Pagination for the Smarty Template Engine
 * File:        function.paginate_middle.php
 * Author:      Monte Ohrt <monte at newdigitalgroup dot com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.phpinsider.com/php/code/SmartyPaginate/
 * @copyright 2001-2005 New Digital Group, Inc.
 * @author Monte Ohrt <monte at newdigitalgroup dot com>
 * @package SmartyPaginate
 * @version 1.6-dev
 */

function smarty_function_paginate_middle($params, &$smarty) {
    
    $_id = 'default';
    $_prefix = '[';
    $_suffix = ']';
    $_link_prefix = '';
    $_link_suffix = ''; 
    $_page_limit = null;
    $_attrs = array();

    if (!class_exists('SmartyPaginate')) {
        $smarty->trigger_error("paginate_middle: missing SmartyPaginate class");
        return;
    }
    if (!isset($_SESSION['SmartyPaginate'])) {
        $smarty->trigger_error("paginate_middle: SmartyPaginate is not initialized, use connect() first");
        return;        
    }
        
    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'id':
                if (!SmartyPaginate::isConnected($_val)) {
                    $smarty->trigger_error("paginate_middle: unknown id '$_val'");
                    return;        
                }
                $_id = $_val;
                break;
            case 'prefix':
                $_prefix = $_val;
                break;
            case 'suffix':
                $_suffix = $_val;
                break;
            case 'link_prefix':
                $_link_prefix = $_val;
                break;
            case 'link_suffix':
                $_link_suffix = $_val;
                break; 
            case 'page_limit';
                $_page_limit = $_val;
                break;
            case 'format':
                break;
            default:
                $_attrs[] = $_key . '="' . $_val . '"';
                break;   
        }
    }
    
    if (!isset($_SESSION['SmartyPaginate'][$_id]['item_total'])) {
        $smarty->trigger_error("paginate_middle: total was not set");
        return;        
    }
    
    if(!isset($_page_limit) && isset($_SESSION['SmartyPaginate'][$_id]['page_limit'])) {
        $_page_limit = $_SESSION['SmartyPaginate'][$_id]['page_limit'];
    }
        
    $_url = $_SESSION['SmartyPaginate'][$_id]['url'];
    
    $_total = SmartyPaginate::getTotal($_id);
    $_curr_item = SmartyPaginate::getCurrentItem($_id);
    $_limit = SmartyPaginate::getLimit($_id);
    
    $_item = 1;
    $_page = 1;
    $_display_pages = 0;
    $_ret = '';
    
    $_attrs = !empty($_attrs) ? ' ' . implode(' ', $_attrs) : '';
    
    if(isset($_page_limit)) {
        // find halfway point
        $_page_limit_half = floor($_page_limit / 2);
        // determine what item/page we start with
        $_item_start = $_curr_item - $_limit * $_page_limit_half;
        if( ($_view = ceil(($_total - $_item_start) / $_limit)) < $_page_limit) {
            $_item_start -= ($_limit * ( $_page_limit - $_view ));
        }
        $_item = ($_item_start >= 1) ? $_item_start : 1;
        $_page = ceil($_item / $_limit);
    }
            
    while($_item <= $_total) {
        if(isset($params['format']) && $params['format'] == 'page') {
            $_text = $_prefix . $_page . $_suffix;            
        } else {
            $_text = $_prefix . $_item . '-';
            $_text .= ($_item + $_limit - 1 <= $_total) ? $_item + $_limit - 1 : $_total;
            $_text .= $_suffix;
        }
        if($_item != $_curr_item) {
            $_this_url = $_url;
            $_this_url .= (strpos($_url, '?') === false) ? '?' : '&';
            $_this_url .= SmartyPaginate::getUrlVar($_id) . '=' . $_item;
            $_ret .= $_link_prefix . '<a href="' . str_replace('&', '&amp;', $_this_url) . '"' . $_attrs . '>' . $_text . '</a>' . $_link_suffix;
        } else {
            $_ret .= $_link_prefix . $_text . $_link_suffix;
        }
        $_item += $_limit;
        $_page++;
        $_display_pages++;
        if(isset($_page_limit) && $_display_pages == $_page_limit)
            break;
    }
    
    return $_ret;
    
}

?>
