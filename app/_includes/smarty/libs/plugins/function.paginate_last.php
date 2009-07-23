<?php

/**
 * Project:     SmartyPaginate: Pagination for the Smarty Template Engine
 * File:        function.paginate_last.php
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

function smarty_function_paginate_last($params, &$smarty) {

    $_id = 'default';
    $_attrs = array();
    
    if (!class_exists('SmartyPaginate')) {
        $smarty->trigger_error("paginate_last: missing SmartyPaginate class");
        return;
    }
    if (!isset($_SESSION['SmartyPaginate'])) {
        $smarty->trigger_error("paginate_last: SmartyPaginate is not initialized, use connect() first");
        return;        
    }

    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'id':
                if (!SmartyPaginate::isConnected($_val)) {
                    $smarty->trigger_error("paginate_last: unknown id '$_val'");
                    return;        
                }
                $_id = $_val;
                break;
            default:
                $_attrs[] = $_key . '="' . $_val . '"';
                break;   
        }
    }
    
    if (SmartyPaginate::getTotal($_id) === false) {
        $smarty->trigger_error("paginate_last: total was not set");
        return;        
    }
    
    $_url = SmartyPaginate::getURL($_id);
    $_total = SmartyPaginate::getTotal($_id);
    $_limit = SmartyPaginate::getLimit($_id);
    
    $_attrs = !empty($_attrs) ? ' ' . implode(' ', $_attrs) : '';    
    
    $_text = isset($params['text']) ? $params['text'] : SmartyPaginate::getLastText($_id);
    $_url .= (strpos($_url, '?') === false) ? '?' : '&';
    $_url .= SmartyPaginate::getUrlVar($_id) . '=';
    $_url .= ($_total % $_limit > 0) ? $_total - ( $_total % $_limit ) + 1 : $_total - $_limit + 1;
    
    return '<a href="' . str_replace('&','&amp;', $_url) . '"' . $_attrs . '>' . $_text . '</a>';
    
}

?>
