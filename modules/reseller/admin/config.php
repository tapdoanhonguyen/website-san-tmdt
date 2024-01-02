<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TMS <TMS@thuongmaiso.vn>
 * @Copyright (C) 2020 TMS. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 31 Mar 2020 02:34:09 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$page_title = $lang_module['config'];
$saveconfig = $nv_Request->get_int( 'saveconfig', 'post', 0 );

if( ! empty( $saveconfig ) )
{
	$config_setting = array();	
	$config_setting['raw_product_prefix'] = $nv_Request->get_string( 'raw_product_prefix', 'post', '' );
	$config_setting['username_vnpost'] = $nv_Request->get_string('username_vnpost', 'post', '');
	$config_setting['password_vnpost'] = $nv_Request->get_string('password_vnpost', 'post', '');
	$config_setting['token_ghn'] = $nv_Request->get_string('token_ghn', 'post', '');
	$config_setting['username_viettelpost'] = $nv_Request->get_string('username_viettelpost', 'post', '');
	$config_setting['password_viettelpost'] = $nv_Request->get_string('password_viettelpost', 'post', '');
	$config_setting['token_ahamove'] = $nv_Request->get_string('token_ahamove', 'post', '');
	$config_setting['raw_import_product_prefix'] = $nv_Request->get_string('raw_import_product_prefix', 'post', '');
	$config_setting['inhome_viewcat']=$nv_Request->get_string('inhome_viewcat', 'post', 0);
	$config_setting['url_ghn'] = $nv_Request->get_string('url_ghn', 'post', '');
	$config_setting['url_ghtk'] = $nv_Request->get_string('url_ghtk', 'post', '');
	$config_setting['token_ghtk'] = $nv_Request->get_string('token_ghtk', 'post', '');
	$config_setting['number_product'] = $nv_Request->get_string('number_product', 'post', '');
	$config_setting['raw_order_prefix'] = $nv_Request->get_string('raw_order_prefix', 'post', '');
	$config_setting['number_product_push'] = $nv_Request->get_string('number_product_push', 'post', '');
	$config_setting['time_push_product'] = $nv_Request->get_string('time_push_product', 'post', '');
	
	$sth = $db_slave->prepare( 'UPDATE ' . TABLE . '_config SET config_value = :config_value WHERE config_name = :config_name');
	foreach( $config_setting as $config_name => $config_value )
	{
			$sth->bindParam( ':config_name', $config_name, PDO::PARAM_STR );
			$sth->bindParam( ':config_value', $config_value, PDO::PARAM_STR );
			$sth->execute();
 
	}
	$sth->closeCursor();

 
	$nv_Cache->delMod( $module_name );
	Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&rand=' . nv_genpass() );
 
	die();

}
if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}


$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('DATA', $config_setting);

$inhome_viewcat[] = array( 'id'=>0, 'text'=>'Hiển thị dạng chuyên mục' );
$inhome_viewcat[] = array( 'id'=>1, 'text'=>'Hiển thị tất cả sản phẩm' );

foreach ( $inhome_viewcat as $filt_stt ) {
   if ( $filt_stt['id'] == $config_setting['inhome_viewcat'] ) {
       $filt_stt['selected'] = 'selected';
   }
   $xtpl->assign( 'inhome_viewcat', $filt_stt );
   $xtpl->parse( 'main.inhome_viewcat' );
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
