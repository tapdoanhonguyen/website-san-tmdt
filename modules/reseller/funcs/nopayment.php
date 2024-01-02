<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 04 Jan 2021 09:28:10 GMT
 */

if (!defined('NV_IS_MOD_RESELLER'))
    die('Stop!!!');

if( $nv_Request->isset_request( 'search_order', 'get' ) )
{
	
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;search_order=1';
	
	$where = '';
	
	
	$keyword = $nv_Request->get_title( 'keyword', 'post,get' );
	$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
	$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
	$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
	$status_product = $nv_Request->get_int( 'status_product', 'post,get' -1);
	
	if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
	{
		$_hour = 0;
		$_min = 0;
		$ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
	} else {
		$ngay_tu = 0;
	}
	
	if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
	{
		$_hour = 23;
		$_min = 59;
		$ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
	} else {
		$ngay_den = 0;
	}
	
	if ( $sea_flast != 9 ) {
	
		if ( $ngay_tu > 0 and $ngay_den > 0 )
		 {
			$where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
			$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
			
		} else if ( $ngay_tu > 0 )
		{
			$where .= ' AND time_add >= '. $ngay_tu;
			$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
		} else if ( $ngay_den > 0 )
		{
				$where .= ' AND time_add <= '. $ngay_den;
				$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
		}

	}
	
	if ( !empty( $keyword ) ) {
		$where .= ' AND (order_code LIKE "%" "'.$keyword. '" "%" OR order_name LIKE "%" "'.$keyword. '" "%" OR email LIKE "%" "'.$keyword. '" "%" OR phone LIKE "%" "'.$keyword. '" "%" )';
		$base_url .= '&keyword=' . $keyword;
	}
	
	// status_payment_vnpay = 0 , store_id='. $store_id bắt buộc 1 đơn hàng của cửa hàng đã thanh toán vnpay
	$per_page = 10;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . TABLE . '_order')
	->where('status_payment_vnpay = 0 AND store_id='. $store_id . $where);
	
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('*')
	->order('id DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());
	
	$sth->execute();
	
	
	$xtpl = new XTemplate('listorder_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', 'ajax');
	
	
	$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'all');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
	
	if(!$num_items)
	{
		$xtpl->parse('main.no_product');
	}

	while ($view = $sth->fetch()) {
		$view['number'] = $number++;
		$view['shop_id']=get_info_store($view['store_id'])['userid'];
		//check voucher
		if(!$view['status_payment_vnpay']){
	
			$check_voucher = check_voucher_shop($view['voucherid'], $view['shop_id'], $view['userid']);
			
			$arr = json_decode($check_voucher, true);

			if($arr['status'] == 'ERROR'){
				$view['total'] = $view['total'] + $view['voucher_price'];
				$view['voucher_price'] = 0;
			}
		}
		
		$view['store_name']=get_info_store($view['store_id'])['company_name'];
		$view['warehouse_name']=get_info_warehouse($view['warehouse_id'])['name_warehouse'];
		$view['phone_warehouse']=get_info_warehouse($view['warehouse_id'])['phone_send'];
		$info_warehouse = get_info_warehouse( $view['warehouse_id'] );
		$view['address_warehouse'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
		$view['address_receive'] = $view['address'].', '.get_info_ward( $view['ward_id'] )['title'].', '.get_info_district( $view['district_id'] )['title'].', '.get_info_province( $view['province_id'] )['title'];
		$view['transporters_name']=get_info_transporters($view['transporters_id'])['name_transporters'];
		
		// thôngz tin tài khoản mua hàng
		$info_customer = get_info_user($view['userid']);
		$view['customer_name'] = $info_customer['last_name'];
		
		if($info_customer['photo']){
			
			$view['photo_customer']  = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . $info_customer['photo'];
						
		}else{
				$view['photo_customer'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/no_img.png';
		}
		
		// ten trang thai don hang
		
		$view['order_status'] = $global_status_order[$view['status']]['name'];
		
		
		// lay thong tin san pham cua don hang
		$list_products = get_list_products_order($view['id']);
		foreach($list_products as $product)
		{
			$xtpl->assign('product', $product);
			$xtpl->parse('main.loop.product');
		}
	
		
		$view['total_product']=number_format($view['total_product']);
		$view['fee_transport']=number_format($view['fee_transport']);
		$view['total']=number_format($view['total']);
		$view['time_add']=date('d-m-Y H:i',$view['time_add']);
		
		$view['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $view['id'].'&store_id='.$view['store_id'].'&warehouse_id='.$view['warehouse_id'],true);
		$xtpl->assign('VIEW', $view);
		
		// cửa hàng xác nhận đơn hàng
		if($view['status_payment_vnpay'] == 1)
		{
			
			if($view['status']==0){
				$xtpl->parse('main.loop.status0');
			}else if($view['status']==1){
				if($view['transporters_id']==4 || $view['transporters_id']==5){
					$xtpl->parse('main.loop.vnpost');
				}else if($view['transporters_id']==6 || $view['transporters_id']==7 || $view['transporters_id']==8|| $view['transporters_id']==9){
					$xtpl->parse('main.loop.viettelpost');
				}else if($view['transporters_id']==2){
					$xtpl->parse('main.loop.ghtk');
				}else if($view['transporters_id']==3 || $view['transporters_id']==11){
					$xtpl->parse('main.loop.ghn');
				}else{
					$xtpl->parse('main.loop.ahamove');
				}
			}else if($view['status']>1){
				if($view['transporters_id']==1||$view['transporters_id']>=15){
					$xtpl->assign('VIEW', $view);
					$xtpl->parse('main.loop.link_check_ahamove_order');
				}else{
					$xtpl->assign('VIEW', $view);
					$xtpl->parse('main.loop.no_link_check_ahamove_order');
				}
			}
			if($view['status']==2){
				if($view['transporters_id']==1||$view['transporters_id']>=15){
					$xtpl->parse('main.loop.status_success.cancel_ahamove');
				}
				$xtpl->parse('main.loop.status_success');
			}else if($view['status']<2){
				$xtpl->parse('main.loop.status_cancel');
			}
		
		}
		
		// kết thúc trạng thái cửa hàng
		
		$xtpl->parse('main.loop');
	}
	
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['order'];
	echo $contents; die;

}


$page_title = $lang_module['list_order'];


$xtpl = new XTemplate('nopayment.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('NV_LANG_INTERFACE', NV_LANG_INTERFACE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

$real_week = nv_get_week_from_time( NV_CURRENTTIME );
$week = $real_week[0];
$year = $real_week[1];
$this_year = $real_week[1];
$time_per_week = 86400 * 7;
$time_start_year = mktime( 0, 0, 0, 1, 1, $year );
$time_first_week = $time_start_year - ( 86400 * ( date( 'N', $time_start_year ) - 1 ) );
	
$tuannay = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week + $time_per_week - 1 ),
);
$tuantruoc = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week + $time_per_week - 2 ),
);
$tuankia = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week + $time_per_week - 3 ),
);

$thangnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of this month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of this month' ) ),
);
$thangtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of last month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of last month' ) ),
);
$namnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january this year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december this year' ) ),
);
$namtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january last year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december last year' ) ),
);
$xtpl->assign( 'TUANNAY', $tuannay );

$xtpl->assign( 'TUANTRUOC', $tuantruoc );

$xtpl->assign( 'TUANKIA', $tuankia );

$xtpl->assign( 'HOMNAY', date( 'd-m-Y', NV_CURRENTTIME ) );
$xtpl->assign( 'HOMQUA', date( 'd-m-Y', strtotime( 'yesterday' ) ) );
$xtpl->assign( 'THANGNAY', $thangnay );

$xtpl->assign( 'THANGTRUOC', $thangtruoc );

$xtpl->assign( 'NAMNAY', $namnay );

$xtpl->assign( 'NAMTRUOC', $namtruoc );


	

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
