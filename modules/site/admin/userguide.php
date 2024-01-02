<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$page_title = $nv_Lang->getModule('userguide');

$xtpl = new XTemplate($op . ".tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('LANG', \NukeViet\Core\Language::$lang_module);

$server_ip = (isset($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : gethostbyname(NV_SERVER_NAME);
$xtpl->assign('info_1_2', sprintf($nv_Lang->getModule('info_1_2'), $server_ip));

$xtpl->assign('info_3_2', sprintf($nv_Lang->getModule('info_3_2'), $nv_Lang->getModule('cat_title')));
$xtpl->assign('info_3_3', sprintf($nv_Lang->getModule('info_3_3'), $nv_Lang->getModule('title')));
$xtpl->assign('info_3_4', sprintf($nv_Lang->getModule('info_3_4'), $nv_Lang->getModule('domain')));
$xtpl->assign('info_3_5', sprintf($nv_Lang->getModule('info_3_5'), $nv_Lang->getModule('site_dir')));
$xtpl->assign('info_3_6', sprintf($nv_Lang->getModule('info_3_6'), $nv_Lang->getModule('userid'), $nv_Lang->getModule('adminsl')));
$xtpl->assign('info_3_7', sprintf($nv_Lang->getModule('info_3_7'), $nv_Lang->getModule('sample_data')));
$xtpl->assign('info_3_8', sprintf($nv_Lang->getModule('info_3_8'), $nv_Lang->getModule('site')));

$url_img = NV_BASE_SITEURL . "themes/" . $global_config['module_theme'] . "/images/" . $module_file;
$xtpl->assign('url_img', $url_img);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");
