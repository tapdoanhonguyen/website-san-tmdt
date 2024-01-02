<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */


if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');

$xtpl = new XTemplate("main.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);

$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('TEMPLATE', $global_config['module_theme']);

//tổng sp được like
$info_store = $db->query('SELECT count(number_like) as count FROM ' . TABLE . '_rows WHERE status = 1 AND number_like >= 1 AND user_id ='. $store_id)->fetchColumn();


$xtpl->assign('tong_like', $info_store);
// tổng số người theo dõi cửa hàng
$info_store = $db->query('SELECT count(id) as count FROM ' . TABLE . '_follow WHERE shop_id='. $store_id)->fetchColumn();
$xtpl->assign('tong_follow', $info_store);

// tổng doanh thu đã thanh toán, đã giao thành công, payment số tiền đã thanh toán
$tongdoanhthu = $db->query('SELECT sum(order_total) as total FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3')->fetchColumn();

$tongdoanhthu = number_format($tongdoanhthu,0,",",".");
$xtpl->assign('tongdoanhthu', $tongdoanhthu);

// tổng số đơn hàng đã thanh toán, giao thành công
$tongdonhang = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3')->fetchColumn();

$tongdonhang = number_format($tongdonhang,0,",",".");
$xtpl->assign('tongdonhang', $tongdonhang);

// tổng số khách hàng
$arr_khachhang = $db->query('SELECT user_id FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3 GROUP BY user_id')->fetchAll();


$tongkhachhang = number_format(count($arr_khachhang),0,",",".");
$xtpl->assign('tongkhachhang', $tongkhachhang);


// tổng khách hàng tháng trước
$dauthang = date('d/m/Y',NV_CURRENTTIME);
if( preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $dauthang, $m ) )
{
		$phour = 0;
		$pmin = 0;
		$dauthang = mktime( $phour, $pmin, 0, $m[2], 0, $m[3] );
}
	

$arr_khachhang_thangtruoc = $db->query('SELECT user_id FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3 AND order_time <= '. $dauthang .' GROUP BY user_id')->fetchAll();

// tốc độ phát triển
$tocdophattrien = abs(count($arr_khachhang) - count($arr_khachhang_thangtruoc))/100;
$xtpl->assign('tocdophattrien', $tocdophattrien);



// chờ xác nhận status = 0;
$choxacnhan = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 0 ')->fetchColumn();

	
$xtpl->assign('choxacnhan',  number_format($choxacnhan,0,",","."));

// chờ lấy hàng status = 1;
$cholayhang = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 1')->fetchColumn();

$xtpl->assign('cholayhang',  number_format($cholayhang,0,",","."));

// đã xử lý = đang giao hàng status = 2;
$daxuly = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 2')->fetchColumn();

$xtpl->assign('daxuly',  number_format($daxuly,0,",","."));

// giao thành công status = 3;
$dagiao = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3')->fetchColumn();
$xtpl->assign('dagiao',  number_format($dagiao,0,",","."));

// hủy đơn status = 4;
$huydon = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 4')->fetchColumn();

$xtpl->assign('huydon',  number_format($huydon,0,",","."));

//Trả/Hoàn Tiền status = 5;
$trahoantien = $db->query('SELECT count(order_id) as count FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 5')->fetchColumn();
$xtpl->assign('trahoantien',  number_format($trahoantien,0,",","."));

//Sản Phẩm Tạm Khóa
$sp_khoa = $db->query('SELECT count(id) as count FROM ' . TABLE . '_rows WHERE inhome = -1 AND user_id =' . $user_info['userid'])->fetchColumn();

$xtpl->assign('sp_khoa',  number_format($sp_khoa,0,",","."));


/* //Sản Phẩm Hết Hàng
$sp_hethang = $db->query('SELECT COUNT(t1.id) FROM ' . TABLE . '_rows t1 WHERE t1.inhome = 1 AND t1.store_id = '. $store_id .' AND (SELECT SUM(sl_tonkho) FROM ' . TABLE . '_product_classify_value_product t2 WHERE t1.id = t2.product_id) = 0')->fetchColumn();
$xtpl->assign('sp_hethang',  number_format($sp_hethang,0,",","."));
 */

/* //Mã ưu đãi
$ma_uu_dai = $db->query('SELECT count(id) as count FROM ' . TABLE . '_voucher_shop WHERE store_id =' . $store_id .' AND status=1 AND time_from >' . NV_CURRENTTIME .' AND time_to <' . NV_CURRENTTIME)->fetchColumn();
$xtpl->assign('ma_uu_dai',  $ma_uu_dai);
 */

// thành viên hàng đầu
$list_tv_hangdau = $db->query('SELECT user_id, count(order_id) as count, sum(order_total) as total FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .' AND transaction_status = 3 GROUP BY user_id ORDER BY total DESC LIMIT 0,3')->fetchAll();

//thông tin shop
$shop_name = $db->query('SELECT company_name FROM ' . TABLE . '_seller_management WHERE userid =' . $user_info['userid'] )->fetchColumn();
$xtpl->assign('shop_name', $shop_name);

$avatar_image = $db->query('SELECT avatar_image FROM ' . TABLE . '_seller_management WHERE userid =' . $user_info['userid'] )->fetchColumn();

$avatar_image = $_SERVER["chonhagiau"]  . $avatar_image;
$xtpl->assign('avatar_image', $avatar_image);
// hồ sơ shop infoshop
$xtpl->assign('infoshop', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=retails&amp;' . NV_OP_VARIABLE . '=infoshop', true));

$xtpl->assign('notification', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=notification', true));

foreach($list_tv_hangdau as $shop)
{
	// thông tin cửa hàng
	$info_customer = get_info_user($shop['userid']);
	
	if($info_customer['photo']){
		
		$info_customer['photo']  = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . $info_customer['photo'];
					
	}else{
			$info_customer['photo'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/no_img.png';
	}
	
	$shop['total'] = number_format($shop['total'],0,",",".");
	
	$xtpl->assign('shop',  $shop);
	$xtpl->assign('info_customer',  $info_customer);
	
	$xtpl->parse('main.customer');
}


// giao dịch mới nhất
$list_order_new = $db->query('SELECT order_id, order_code, order_name, order_total, order_time, transaction_status FROM ' . TABLE . '_orders WHERE shop_id ='. $store_id .'  ORDER BY order_id DESC LIMIT 0,4')->fetchAll();

foreach($list_order_new as $order_new)
{
	$order_new['time_add'] = date('d',$order_new['time_add']) . ' tháng ' . date('m',$order_new['time_add']) . ', ' . date('Y',$order_new['time_add']);
	$order_new['total'] = number_format($order_new['total'],0,",",".");
	
	if($order_new['status_payment_vnpay'])
	{
		$order_new['thanhtoan'] = 'Đã thanh toán';
		$xtpl->parse('main.order_new.vnpay');
	}
	
	
	
	$order_new['link'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $order_new['id'],true);
	
	$xtpl->assign('order_new',  $order_new);
	$xtpl->parse('main.order_new');
}


//print_r($global_status_order);die;

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = 'Quản lý bán hàng';

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
	