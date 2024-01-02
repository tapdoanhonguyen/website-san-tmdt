<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_SETTINGS'))
    die('Stop!!!');

$page_title = $lang_module['userguide'];

$xtpl = new XTemplate($op . ".tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('LANG', $lang_module);

$server_ip = (isset($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : gethostbyname(NV_SERVER_NAME);
$xtpl->assign('info_1_2', sprintf($lang_module['info_1_2'], $server_ip));

$xtpl->assign('info_3_2', sprintf($lang_module['info_3_2'], $lang_module['cat_title']));
$xtpl->assign('info_3_3', sprintf($lang_module['info_3_3'], $lang_module['title']));
$xtpl->assign('info_3_4', sprintf($lang_module['info_3_4'], $lang_module['domain']));
$xtpl->assign('info_3_5', sprintf($lang_module['info_3_5'], $lang_module['site_dir']));
$xtpl->assign('info_3_6', sprintf($lang_module['info_3_6'], $lang_module['userid'], $lang_module['adminsl']));
$xtpl->assign('info_3_7', sprintf($lang_module['info_3_7'], $lang_module['sample_data']));
$xtpl->assign('info_3_8', sprintf($lang_module['info_3_8'], $lang_module['site']));

$url_img = NV_BASE_SITEURL . "themes/" . $global_config['module_theme'] . "/images/" . $module_file;
$xtpl->assign('url_img', $url_img);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");
?>