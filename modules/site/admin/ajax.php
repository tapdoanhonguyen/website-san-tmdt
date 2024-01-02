<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NV SYSTEMS LTĐ <hoangnt@nguyenvan.vn>
 * @Copyright (C) 2019 NV SYSTEMS LTĐ. All rights reserved
 * @License: Not free read more http://nukeviet.systems/
 * @Createdate Sun, 17 Mar 2019 11:32:42 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$page_title = $lang_module['ajax'];

//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
