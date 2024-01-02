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
	echo '<script language="javascript">';
	echo 'alert("Vui lòng đăng nhập trước để thực hiện chức năng này.");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login',true).'"';
	echo '</script>';
}else{  
	$row['id']=get_info_user_login_un_active($user_info['userid'])['id'];
	if($row['id']){
		
	}else{
     echo '<script language="javascript">';
     echo 'alert("Cửa hàng của bạn đang hoạt động bình thường");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name,true).'"';
     echo '</script>';
 }
}






$mod = $nv_Request->get_string('mod', 'post, get', 0);


if($mod=="require"){
    $reason=$nv_Request->get_string('reason', 'get','');
   
    $db->query( 'UPDATE ' . TABLE . '_seller_management SET reason = "' . $reason . '", require_active = 1, time_require = ' . NV_CURRENTTIME . ' WHERE userid = ' . $user_info['userid']);
    $content_ip= $user_info['username'] . ' đã yêu cầu kích hoạt lại tài khoản cửa hàng vào lúc ' . date('d/m/y H:i',NV_CURRENTTIME);

    $db->query('INSERT INTO '.$db_config['dbsystem']. '.'.$db_config['prefix'].'_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES ('.$db->quote(NV_LANG_DATA) .',1,'.$db->quote($module_name).',0,0,'.$user_info['userid'].','.$id.','.$db->quote($content_ip).','.NV_CURRENTTIME.','.$id.',"require")');
    $json[] = ['status'=>"OK", 'text'=>"Gửi yêu cầu kích hoạt thành công, tài khoản của bạn sẽ được kiểm duyệt trong vòng 10 ngày!"];

    print_r(json_encode($json[0]));die(); 
}



$xtpl = new XTemplate('requireactive.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
