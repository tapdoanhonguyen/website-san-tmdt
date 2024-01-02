<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 07/30/2013 10:27
 */
if (! defined('NV_ADMIN')) {
    die('Stop!!!');
}

global $db, $db_config, $nv_Cache, $admin_info;

if (defined('NV_IS_GODADMIN')) {
    $admin_mods['site'] = array(
        'custom_title' => $nv_Lang->getModule('manager')
    );
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site_cat ORDER BY weight ASC";
    $array_site_cat = $nv_Cache->db($sql, 'cid', 'site');
} else {
    $array_site_cat = array();
    if (empty($global_config['idsite'])) {
        $sql = "SELECT * FROM " . $db_config['prefix'] . "_site_cat WHERE adminid=" . $admin_info['admin_id'] . " ORDER BY weight ASC";
        $array_site_cat = $nv_Cache->db($sql, 'cid', 'site');
    } else {
        $sql = "SELECT * FROM " . $db_config['dbsystem'] . "." . $db_config['prefix'] . "_site_cat WHERE adminid=" . $admin_info['admin_id'] . " ORDER BY weight ASC";
        $result = $db->query($sql);
        while ($row = $result->fetch()) {
            $array_site_cat[$row['cid']] = $row;
        }
    }
    if (! empty($array_site_cat)) {
        $admin_mods['site'] = array(
            'custom_title' => $nv_Lang->getModule('manager')
        );
        define('NV_IS_SITEMANAGEMENT', true);
    }
}