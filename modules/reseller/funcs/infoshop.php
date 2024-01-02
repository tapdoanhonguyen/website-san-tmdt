<?php

/**
* @Project NUKEVIET 4.x
* @Author VINADES.,JSC <contact@vinades.vn>
* @Copyright (C) 2021 VINADES.,JSC. All rights reserved
* @License GNU/GPL version 2 or any later version
* @Createdate Sat, 09 Jan 2021 04:38:41 GMT
*/

if (!defined('NV_IS_MOD_RESELLER'))
die('Stop!!!');
if (!defined('NV_IS_USER')) {
	$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
	echo '<script language="javascript">';
	echo 'alert("Vui lòng đăng nhập");window.location = "'.NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login'.'"';
	echo '</script>';
}else{
	$row['id']=get_info_user_login($user_info['userid'])['id'];
	if(empty($row['id'])){
		echo '<script language="javascript">';
		echo 'alert("Tài khoản của bạn đang trong giai đoạn kiểm duyệt hoặc đang bị khóa. Vui lòng liên hệ bộ phận có liên quan");window.location = "'.NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main'.'"';
		echo '</script>';
	}
}
$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);




// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
	$show_view = true;
	$per_page = 20;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . TABLE . '_seller_management WHERE userid =' . $user_info['userid']);

	
	$sth = $db->prepare($db->sql());

	
	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('*')
	->order('weight ASC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	
	$sth->execute();
}

$xtpl = new XTemplate('infoshop.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);



if ($show_view) {
	
	$view = $sth->fetch();
	
	if($view['bank_id']){
		$view['bank_name'] = get_info_bank($view['bank_id'])['name_bank']; 
	}

	$view['time_add'] = date('d-m-Y', $view['time_add']);
	$view['time_edit'] = date('d-m-Y', $view['time_edit']);
	if($view['ward_id']){
		$view['address_full'] = $view['address'] . ', ' . get_info_ward($view['ward_id'])['title'] . ', ' . get_info_district($view['district_id'])['title'] . ', ' . get_info_province($view['province_id'])['title'] . '.';
	}
	for($i = 1; $i <= $num_items; ++$i) {
		$xtpl->assign('WEIGHT', array(
		'key' => $i,
		'title' => $i,
		'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.view.weight_loop');
	}
	
	$domain=explode('.', $_SERVER["SERVER_NAME"]);
	$server = $domain[1].'.'.$domain[2];
	$view['image_before'] ='https://'. $server . $view['image_before'];

	$domain=explode('.', $_SERVER["SERVER_NAME"]);
	$server = $domain[1].'.'.$domain[2];
	$view['image_after'] ='https://'. $server . $view['image_after'];
	
	$xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
	$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=editinfoshop';

	$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
 
	$domain=explode('.', $_SERVER["SERVER_NAME"]);
	$server = $domain[1].'.'.$domain[2];
	$view['cover_image'] ='https://'. $server . $view['cover_image'];


	$domain=explode('.', $_SERVER["SERVER_NAME"]);
	$server = $domain[1].'.'.$domain[2];
	$view['avatar_image'] ='https://'. $server . $view['avatar_image'];

	$view['follow'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE shop_id = ' . $view['id'])->fetchColumn();
	$view['tax_code'] = $db->query('SELECT company_code FROM ' . TABLE . '_seller_management WHERE userid =' . $user_info['userid'])->fetchColumn();
	$view['number_product'] = $db->query('SELECT count(*) FROM ' . TABLE . '_product WHERE store_id = ' . $view['id'])->fetchColumn();
	$view['following'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE user_id = ' . $view['userid'])->fetchColumn();
	$view['number_rate'] = $db->query('SELECT SUM(number_rate) FROM ' . TABLE . '_product WHERE store_id = ' . $view['id'])->fetchColumn();
	$count_all_star = $db->query('SELECT SUM(star) FROM ' . TABLE . '_product WHERE store_id = ' . $view['id'] . ' AND star != 0')->fetchColumn();
	$count_star = $db->query('SELECT COUNT(star) FROM ' . TABLE . '_product WHERE store_id = ' . $view['id'] . ' AND star != 0')->fetchColumn();
	$view['star'] = round($count_all_star/$count_star, 1, PHP_ROUND_HALF_UP);
	$xtpl->assign('VIEW', $view);
	$xtpl->parse('main.view');
}


if (!empty($error)) {
	$xtpl->assign('ERROR', implode('<br />', $error));
	$xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['infoshop'];
$array_mod_title[] = array(
'catid' => 0,
'title' => $lang_module['infoshop'],
'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/'
);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
