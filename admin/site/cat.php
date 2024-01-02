<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_SETTINGS'))
    die('Stop!!!');

$page_title = $lang_module['catmanager'];

/**
 * nv_FixWeightCat()
 *
 * @param integer $parentid            
 * @return
 *
 */
function nv_FixWeightCat()
{
    global $db, $db_config;
    
    $sql = "SELECT cid FROM " . $db_config['prefix'] . "_site_cat ORDER BY weight ASC";
    $result = $db->query($sql);
    $weight = 0;
    while ($row = $result->fetch()) {
        ++ $weight;
        $db->query("UPDATE " . $db_config['prefix'] . "_site_cat SET weight=" . $weight . " WHERE cid=" . $row['cid']);
    }
}

$array = array(
    'data' => ''
);
$error = "";

// them chu de
if ($nv_Request->isset_request('add', 'get')) {
    if ($nv_Request->isset_request('submit', 'post')) {
        $array['title'] = $nv_Request->get_title('title', 'post', '', 1);
        $array['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
        $array['data'] = implode(',', $nv_Request->get_array('data', 'post'));
        if (! empty($array['title']) and ! empty($array['data'])) {
            $array_row_authors = array();
            $sql = "SELECT * FROM " . NV_AUTHORS_GLOBALTABLE . " WHERE lev=1";
            $result = $db->query($sql);
            while ($row = $result->fetch()) {
                $array_row_authors[$row['admin_id']] = $row;
            }
            if (isset($array_row_authors[$array['adminid']])) {
                $error = $lang_module['error_userid_godadmin'];
                $is_error = true;
            } else {
                $sql = "SELECT MAX(weight) AS new_weight FROM " . $db_config['prefix'] . "_site_cat";
                $result = $db->query($sql);
                list ($new_weight) = $result->fetch(3);
                $new_weight = (int) $new_weight;
                ++ $new_weight;
                
                $sql = "INSERT INTO " . $db_config['prefix'] . "_site_cat VALUES (NULL,  " . $db->quote($array['title']) . ",  " . $new_weight . ", " . $array['adminid'] . ", " . $db->quote($array['data']) . ")";
                $cid = $db->insert_id($sql);
                if (! $cid) {
                    $error = $lang_module['error_save_cat'];
                    $is_error = true;
                } else {
                    $nv_Cache->delMod($module_name);
                    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat");
                    exit();
                }
            }
        }
    } else {
        $array['title'] = "";
    }
    
    $xtpl = new XTemplate("cat_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/site");
    $xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "&amp;add=1");
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('DATA', $array);
    
    $array_sample_data = explode(',', $array['data']);
    $datasample = scandir(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data');
    foreach ($datasample as $file) {
        if (preg_match('/([a-zA-Z0-9\_\-]+)\.sql$/', $file, $m)) {
            $row = array( //
                'data' => $m[1], //
                'checked' => (in_array($m[1], $array_sample_data)) ? " checked=\"checked\"" : "", //
                'title' => $m[1]
            ) //
;
            $xtpl->assign('LISTDATA', $row);
            $xtpl->parse('main.data');
        }
    }
    
    if (! empty($error)) {
        $xtpl->assign('ERROR', $error);
        $xtpl->parse('main.error');
    }
    
    $xtpl->parse('main');
    $contents = $xtpl->text('main');
    
    $page_title = $lang_module['cat_add'];
    
    include (NV_ROOTDIR . "/includes/header.php");
    echo nv_admin_theme($contents);
    include (NV_ROOTDIR . "/includes/footer.php");
    exit();
}

// Sua chu de
if ($nv_Request->isset_request('edit', 'get')) {
    $page_title = $lang_module['cat_edit'];
    
    $cid = $nv_Request->get_int('cid', 'get', 0);
    
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_site_cat WHERE cid=" . $cid;
    $result = $db->query($sql);
    $numcat = $result->rowCount();
    
    if ($numcat != 1) {
        Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat");
        exit();
    }
    
    $row = $result->fetch();
    
    $is_error = false;
    
    if ($nv_Request->isset_request('submit', 'post')) {
        $array['title'] = $nv_Request->get_title('title', 'post', '', 1);
        $array['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
        $array['data'] = implode(',', $nv_Request->get_array('data', 'post'));
        if (! empty($array['title']) and ! empty($array['data'])) {
            $array_row_authors = array();
            $sql = "SELECT * FROM " . NV_AUTHORS_GLOBALTABLE . " WHERE lev=1";
            $result = $db->query($sql);
            while ($row = $result->fetch()) {
                $array_row_authors[$row['admin_id']] = $row;
            }
            if (isset($array_row_authors[$array['adminid']])) {
                $error = $lang_module['error_userid_godadmin'];
                $is_error = true;
            } else {
                $sql = "UPDATE " . $db_config['prefix'] . "_site_cat SET 
                    title=" . $db->quote($array['title']) . " ,
                    adminid=" . $db->quote($array['adminid']) . " ,
                    data=" . $db->quote($array['data']) . " 
                    WHERE cid=" . $cid;
                if ($db->query($sql)) {
                    $nv_Cache->delMod($module_name);
                    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat");
                    exit();
                }
                ;
            }
        }
    } else {
        $array = $row;
    }
    
    $xtpl = new XTemplate("cat_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
    $xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "&amp;edit=1&amp;cid=" . $cid);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('DATA', $array);
    if (! empty($error)) {
        $xtpl->assign('ERROR', $error);
        $xtpl->parse('main.error');
    }
    
    $array_sample_data = explode(',', $array['data']);
    
    $datasample = scandir(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data');
    foreach ($datasample as $file) {
        if (preg_match('/([a-zA-Z0-9\_\-]+)\.sql$/', $file, $m)) {
            $row = array( //
                'data' => $m[1], //
                'checked' => (in_array($m[1], $array_sample_data)) ? " checked=\"checked\"" : "", //
                'title' => $m[1]
            ) //
;
            $xtpl->assign('LISTDATA', $row);
            $xtpl->parse('main.data');
        }
    }
    
    $xtpl->parse('main');
    $contents = $xtpl->text('main');
    
    include (NV_ROOTDIR . "/includes/header.php");
    echo nv_admin_theme($contents);
    include (NV_ROOTDIR . "/includes/footer.php");
    
    exit();
}

// Xoa chu de
if ($nv_Request->isset_request('del', 'post')) {
    if (! defined('NV_IS_AJAX'))
        die('Wrong URL');
    
    $cid = $nv_Request->get_int('cid', 'post', 0);
    
    if (empty($cid)) {
        die("NO");
    }
    
    $query = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE cid=" . $cid;
    $result = $db->query($query);
    $numrows = $result->rowCount();
    if (empty($numrows)) {
        $sql = "DELETE FROM " . $db_config['prefix'] . "_site WHERE cid=" . $cid;
        $db->query($sql);
        
        $sql = "DELETE FROM " . $db_config['prefix'] . "_site_cat WHERE cid=" . $cid;
        $db->query($sql);
        nv_FixWeightCat();
        die("OK");
    } else {
        die("NO#" . $lang_module['error_del_cat']);
    }
}

// Chinh thu tu chu de
if ($nv_Request->isset_request('changeweight', 'post')) {
    if (! defined('NV_IS_AJAX'))
        die('Wrong URL');
    
    $cid = $nv_Request->get_int('cid', 'post', 0);
    $new = $nv_Request->get_int('new', 'post', 0);
    
    if (empty($cid))
        die("NO");
    
    $query = "SELECT cid FROM " . $db_config['prefix'] . "_site_cat WHERE cid=" . $cid;
    $result = $db->query($query);
    $numrows = $result->rowCount();
    if ($numrows != 1)
        die('NO');
    
    $query = "SELECT cid FROM " . $db_config['prefix'] . "_site_cat WHERE cid!=" . $cid . " ORDER BY weight ASC";
    $result = $db->query($query);
    $weight = 0;
    while ($row = $result->fetch()) {
        ++ $weight;
        if ($weight == $new)
            ++ $weight;
        $sql = "UPDATE " . $db_config['prefix'] . "_site_cat SET weight=" . $weight . " WHERE cid=" . $row['cid'];
        $db->query($sql);
    }
    $sql = "UPDATE " . $db_config['prefix'] . "_site_cat SET weight=" . $new . " WHERE cid=" . $cid;
    $db->query($sql);
    die("OK");
}

// Danh sach chu de

$sql = "SELECT * FROM " . $db_config['prefix'] . "_site_cat ORDER BY weight ASC";
$result = $db->query($sql);
$num = $result->rowCount();
if (! $num) {
    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat&add=1");
    exit();
}

$list = array();
$a = 0;

$list_adminid = array();
while ($row = $result->fetch()) {
    $weight = array();
    for ($i = 1; $i <= $num; ++ $i) {
        $weight[$i]['title'] = $i;
        $weight[$i]['pos'] = $i;
        $weight[$i]['selected'] = ($i == $row['weight']) ? " selected=\"selected\"" : "";
    }
    
    $class = ($a % 2) ? " class=\"second\"" : "";
    $list_adminid[] = $row['adminid'];
    $list[$row['cid']] = array( //
        'cid' => $row['cid'], //
        'adminid' => $row['adminid'], //
        'title' => $row['title'], //
        'data' => $row['data'], //
        'titlelink' => NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;cid=" . $row['cid'], //
        'weight' => $weight, //
        'class' => $class
    );
    ++ $a;
}
$array_users = array(
    0 => ''
);

$query = "SELECT userid, username, first_name, last_name FROM " . NV_USERS_GLOBALTABLE . " WHERE userid IN (" . implode(',', array_unique($list_adminid)) . ")";
$result_us = $db->query($query);
while ($admin_info_i = $result_us->fetch()) {
    $admin_info_i['full_name'] = nv_show_name_user($admin_info_i['first_name'], $admin_info_i['last_name'], $admin_info_i['username']);
    $array_users[$admin_info_i['userid']] = $admin_info_i['username'];
    if (! empty($admin_info_i['full_name'])) {
        $array_users[$admin_info_i['userid']] .= ' - ' . $admin_info_i['full_name'];
    }
}

$xtpl = new XTemplate("cat_list.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('ADD_NEW_CAT', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=cat&amp;add=1");
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('LANG', $lang_module);

foreach ($list as $row) {
    $row['adminid'] = (isset($array_users[$row['adminid']])) ? $array_users[$row['adminid']] : '';
    $xtpl->assign('ROW', $row);
    foreach ($row['weight'] as $weight) {
        $xtpl->assign('WEIGHT', $weight);
        $xtpl->parse('main.row.weight');
    }
    $xtpl->assign('EDIT_URL', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=cat&amp;edit=1&amp;cid=" . $row['cid']);
    $xtpl->parse('main.row');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");