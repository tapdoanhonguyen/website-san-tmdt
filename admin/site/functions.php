<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 1:58
 */
if (! defined('NV_ADMIN') or ! defined('NV_MAINFILE') or ! defined('NV_IS_MODADMIN'))
    die('Stop!!!');

if (defined('NV_IS_GODADMIN')) {
    $submenu['cat'] = $nv_Lang->getModule('catmanager');
}
$submenu['site'] = $nv_Lang->getModule('site');
$submenu['userguide'] = $nv_Lang->getModule('userguide');

if ($module_name == "site") {
    $allow_func = array(
        'main',
        'site',
        'edit',
        'go',
        'userguide'
    );
    if (defined('NV_IS_GODADMIN')) {
        $allow_func[] = 'cat';
    }
    
    $menu_top = array(
        "title" => $module_name,
        "module_file" => "",
        "custom_title" => $nv_Lang->getModule('manager')
    );
    unset($page_title, $select_options);
    
    define('NV_IS_FILE_SETTINGS', true);
    if ($global_config['idsite']) {
        $db->sql_select_dbname($db_config['dbsystem']);
    }
}

function nv_sql_create_db($dbnew)
{
    global $db, $db_config;
    
    try {
        $db->query('CREATE DATABASE ' . $dbnew);
        $db->exec('USE ' . $dbnew);
        
        $db->exec('ALTER DATABASE ' . $dbnew . ' DEFAULT CHARACTER SET ' . $db_config['charset'] . ' COLLATE ' . $db_config['collation']);
        
        $row = $db->query('SELECT @@session.character_set_database AS character_set_database,  @@session.collation_database AS collation_database')->fetch();
        if ($row['character_set_database'] != $db_config['charset'] or $row['collation_database'] != $db_config['collation']) {
            return 0;
        }
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}