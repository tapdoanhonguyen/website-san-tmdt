<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NV SYSTEMS LTĐ <hoangnt@nguyenvan.vn>
 * @Copyright (C) 2019 NV SYSTEMS LTĐ. All rights reserved
 * @License: Not free read more http://nukeviet.systems/
 * @Createdate Sun, 17 Mar 2019 11:32:42 GMT
 */

if (!defined('NV_IS_MOD_SITE'))
    die('Stop!!!');

$url = array();

$cacheFile = NV_LANG_DATA . '_sitemap_' . NV_CACHE_PREFIX . '.cache';
$cacheTTL = 7200;

if (($cache = $nv_Cache->getItem($module_name, $cacheFile, $cacheTTL)) != false) {
    $url = unserialize($cache);
} else {
    /*
    $sql = 'SELECT alias, add_time FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE status=1';
    $result = $db->query($sql);
    while (list($alias, $publtime) = $result->fetch(3)) {
        $url[] = array(
            'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $alias,
            'publtime' => $publtime
        );
    }
    */

    $cache = serialize($url);
    $nv_Cache->setItem($module_name, $cacheFile, $cache, $cacheTTL);
}

nv_xmlSitemap_generate($url);
die();
