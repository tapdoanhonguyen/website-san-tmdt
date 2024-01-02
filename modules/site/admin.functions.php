<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */
if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );
define( 'NV_IS_FILE_ADMIN', true );
define( 'NV_IS_FILE_MODULES', true );


require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';
$allow_func = array( 'main', 'config', 'site', 'reinstall','edit', 'go', 'userguide');

if (defined('NV_IS_GODADMIN')) {
	$allow_func[] = 'cat';
}

if ($global_config['idsite']) {
	//$db->sql_select_dbname($db_config['dbsystem']);
}

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
            'custom_title' => $nv_Lang->getModule(['manager'])
        );
        define('NV_IS_SITEMANAGEMENT', true);
    }
}