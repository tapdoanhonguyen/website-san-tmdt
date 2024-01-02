<?php
	
	/**
		* @Project NUKEVIET 4.x
		* @Author DANGDINHTU (dlinhvan@gmail.com)
		* @Copyright (C) 2013 Webdep24.com. All rights reserved
		* @Blog http://dangdinhtu.com
		* @Developers http://developers.dangdinhtu.com/
		* @License GNU/GPL version 2 or any later version
		* @Createdate  Mon, 20 Oct 2014 14:00:59 GMT
	*/
	 
	if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');
	
	$page_title = 'IN PHIẾU ĐƠN HÀNG';
	
	$order_id = $nv_Request->get_int( 'order_id', 'post,get', 0 );
	$order_status_id = $nv_Request->get_int( 'order_status_id', 'post,get', 0 );
	$action = $nv_Request->get_string('action', 'post,get', 0 );
	$order_info = $db->query('SELECT * FROM '. TABLE .'_order WHERE store_id = '. $store_id .' AND id = ' . (int)$order_id )->fetch();
	if( empty( $order_info ) ) nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=listorder');
	
	$order_info['reward'] = 0;
	
	
	$link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=';
	
	$dataContent = array();
	$dataContent['order_id'] = $order_id;
	
	
	
	
	if($order_info['shipping_code'])
	{
		$order_info['order_code'] = $order_info['shipping_code'];
	}
	
	$dataContent['invoice_prefix'] = $order_info['order_code'];
	$dataContent['shipping_code'] = $order_info['shipping_code'];
	$dataContent['order_name'] = $order_info['order_name'];
	$dataContent['address'] = $order_info['address'].', '.get_info_ward( $order_info['ward_id'] )['title'].', '.get_info_district( $order_info['district_id'] )['title'].', '.get_info_province( $order_info['province_id'] )['title'];
	$dataContent['phone'] = $order_info['phone'];
	$dataContent['fee_transport'] = number_format($order_info['fee_transport']);
	$dataContent['total'] = number_format($order_info['total']);
	$dataContent['total_product'] = number_format($order_info['total_product']);
	
	if($order_info['transporters_id'])
	{
		$dataContent['transporters_name']=get_info_transporters($order_info['transporters_id'])['name_transporters'];
	}
	else
	{
		$dataContent['transporters_name'] = $lang_module['tranposter_tugiao'];
	}
	
	
	
	$info_warehouse = get_info_warehouse( $order_info['warehouse_id'] );
	$company_name = get_info_store($order_info['store_id'])['company_name'];
	//print_r($info_warehouse);die;
	$info_warehouse['address'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
	$dataContent['time_add'] =date('d-m-Y H:i',$order_info['time_add']);
	$xtpl = new XTemplate( 'order_print_noqr.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'DATA', $dataContent );
	$xtpl->assign( 'company_name', $company_name );
	$xtpl->assign( 'INFO_SHOP', $info_warehouse );
	$xtpl->assign( 'site_phone', $global_config['site_phone'] );
	
	$xtpl->assign( 'DIA_CHI_HOAN_TRA', '99 Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh' );
	
	if($order_info['payment_method'] != 'recieve'){
		$xtpl->parse( 'main.payment_method' );
	}

	if($order_info['voucher_price'])
	{
		$order_info['voucher_price']=number_format($order_info['voucher_price']);
		$xtpl->assign( 'voucher_price', '- '.$order_info['voucher_price'] );
		$xtpl->parse( 'main.voucher_price' );
	}
	
	if($order_info['shipping_code'])
	{
		$xtpl->assign( 'TITLE_DON', 'Mã vận đơn');
	}
	else
	{
		$xtpl->assign( 'TITLE_DON', 'Mã đơn hàng');
	}
	
	
	if($order_info['status_payment_vnpay'])
	{
		$xtpl->assign( 'title_thanhtoan', 'Đã thanh toán');
	}
	else
	{
		$xtpl->assign( 'title_thanhtoan', 'Tổng tiền thanh toán');
	}
	
	
	
	if($order_info['order_code'])
	{
		
		$barcodeType= 'code128';
		$barcodeDisplay= 'horizontal';
		$barcodeSize= 60;
		$printText= 'true';
		$barcode = '<img class="barcode w-100" alt="'.$order_info['order_code'].'" src="'.NV_BASE_SITEURL .'barcode/?text='.$order_info['order_code'].'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'&sizefactor=2" />';
		
		$xtpl->assign( 'barcode', $barcode );
		$xtpl->parse( 'main.order_code' );
	}
	
	// logo
	$xtpl->assign('LOGO_SRC', NV_BASE_SITEURL . $global_config['site_logo']);
	
	$order_product_query = $db->query('SELECT t1.*,t2.name_product FROM ' . TABLE . '_order_item t1 INNER JOIN '.TABLE.'_product t2 ON t1.product_id=t2.id WHERE order_id = ' . (int)$order_id )->fetchAll();
	$stt=1;
	foreach($order_product_query as $view){
		$view['stt']=$stt++;
		if($view['classify_value_product_id']>0){
			$classify_value_product_id=get_info_classify_value_product($view['classify_value_product_id']);
			$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
			if($classify_value_product_id['classify_id_value2']>0){
				$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
				$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
				}else{
				$name_group=$name_classify_id_value1;
			}
			$view['name_product']=$view['name_product'].'( '.$name_group.' )';
		}
		$view['price']=number_format($view['price']);
		$view['total']=number_format($view['total']);
		$xtpl->assign( 'PRODUCT', $view );
		
		$xtpl->parse( 'main.product' );
	}
	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
	
	
	if($action =='createinvoiceno'){
		include NV_ROOTDIR . '/includes/header.php';
		echo nv_site_theme( $contents,false );
		include NV_ROOTDIR . '/includes/footer.php';
		// echo json_encode( $json );
		exit();
		}else{
		include NV_ROOTDIR . '/includes/header.php';
		echo nv_site_theme( $contents );
		include NV_ROOTDIR . '/includes/footer.php';
	}
