<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_SETTINGS'))
    die('Stop!!!');

// Xoa site
if (defined('NV_IS_GODADMIN') and $nv_Request->isset_request('del', 'post')) {
    if (! defined('NV_IS_AJAX'))
        die('Wrong URL');
    
    $idsite = $nv_Request->get_int('idsite', 'post', 0);
    
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE idsite=" . $idsite;
    $result = $db->query($sql);
    $row = $result->fetch();
    if (! isset($array_site_cat[$row['cid']])) {
        die("NO");
    }
    
    if (isset($row['domain'])) {
        if (file_exists(NV_ROOTDIR . "/" . NV_CONFIG_DIR . "/" . $row['domain'] . '.php')) {
            require (NV_ROOTDIR . "/" . NV_CONFIG_DIR . "/" . $row['domain'] . '.php');
            $dir_db_site = NV_ROOTDIR . "/" . NV_LOGS_DIR . "/dump_backup" . "/" . $row['domain'];
            if(file_exists($dir_db_site)){
                if ($dh = opendir($dir_db_site)) {
                    while (($file = readdir($dh)) !== false) {
                        nv_deletefile($dir_db_site . "/" . $file);
                    }
                }
                nv_deletefile(NV_ROOTDIR . "/" . NV_LOGS_DIR . "/dump_backup" . "/" . $row['domain']);                
            }

            $dir = NV_ROOTDIR . "/" . NV_DATADIR;
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (preg_match("/^(" . nv_preg_quote($global_config['site_dir']) . ")\_bpl\_[0-9]\.xml+$/", $file)) {
                        nv_deletefile(NV_ROOTDIR . "/" . NV_DATADIR . "/" . $file);
                    }
                }
            }
            nv_deletefile(NV_ROOTDIR . '/' . SYSTEM_FILES_DIR . '/' . $global_config['site_dir'], true);
            nv_deletefile(NV_ROOTDIR . '/' . SYSTEM_CACHEDIR . '/' . $global_config['site_dir'], true);
            nv_deletefile(NV_ROOTDIR . '/' . SYSTEM_UPLOADS_DIR . '/' . $global_config['site_dir'], true);
            
            $db->query("DROP DATABASE " . $db_config['dbsite'] . "");
            nv_deletefile(NV_ROOTDIR . "/" . NV_CONFIG_DIR . "/" . $row['domain'] . ".php");
        }
    }
    $db->query("DELETE FROM " . $db_config['prefix'] . "_site WHERE idsite=" . $idsite);
    $nv_Cache->delAll();
    die("OK");
}

$page_title = $lang_module['manager'];
if (empty($array_site_cat)) {
    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat&add=1");
    exit();
}
foreach ($array_site_cat as $row) {
    $select_options[NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;cid=" . $row['cid']] = $row['title'];
}

$xtpl = new XTemplate("main.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('ADD_NEW_CAT', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=cat&amp;add=1");
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);

$cid = $nv_Request->get_int('cid', 'get', 0);
if ($cid and isset($array_site_cat[$cid])) {
    $page_title .= ': ' . $array_site_cat[$cid]['title'];
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE cid=" . $cid . " ORDER BY domain ASC";
} elseif (defined('NV_IS_GODADMIN')) {
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site ORDER BY domain ASC";
} else {
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE cid IN (" . implode(',', array_keys($array_site_cat)) . ") ORDER BY domain ASC";
}

$a = 0;
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $row['class'] = ($a % 2) ? " class=\"second\"" : "";
    $row['number'] = ++ $a;
    $row['titlelink'] = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;cid=" . $row['cid'];
    $row['addtime'] = nv_date($global_config['date_pattern'] . ' ' . $global_config['time_pattern'], $row['addtime']);
    $row['editlink'] = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=edit&amp;idsite=" . $row['idsite'];
    $row['gositelink'] = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=go&amp;idsite=" . $row['idsite'];
    $row['domain'] = NV_SERVER_PROTOCOL . '://' . $row['domain'];
    $xtpl->assign('ROW', $row);
    
    $xtpl->assign('EDIT_URL', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=edit&amp;idsite=" . $row['idsite']);
    if (defined('NV_IS_GODADMIN')) {
        $xtpl->parse('main.row.delete');
    }
    $xtpl->parse('main.row');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");

?>