<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 24 Dec 2020 01:27:14 GMT
 */
if (!defined('NV_IS_MOD_RESELLER'))
    die('Stop!!!');
if (!defined('NV_IS_USER')) {
	echo '<script language="javascript">';
	echo 'alert("Vui lòng đăng nhập trước để thực hiện chức năng này.");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login',true).'"';
	echo '</script>';
}else{  
	$store_id=get_info_user_login($user_info['userid'])['id'];
	if(empty($store_id)){
		echo '<script language="javascript">';
		echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name,true).'"';
		echo '</script>';
	}
}



// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from(TABLE . '_warehouse')
		->where('sell_id ='. $store_id);
    $sth = $db->prepare($db->sql());
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('id DESC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();
}
$contents = nv_theme_retailshops_list_warehouse($sth,$per_page,$page,$num_items,$base_url,$ngay_tu,$ngay_den,$status_ft,$sea_flast,$show_view,$q);

$page_title = $lang_module['warehouse'];
$array_mod_title[] = array(
	'catid' => 0,
	'title' => $lang_module['warehouse'],
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/'
);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';