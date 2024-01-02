<?php
$id = $nv_Request->get_title( 'id', 'post,get' );
$store_id = $nv_Request->get_title( 'store_id', 'post,get' );
$warehouse_id = $nv_Request->get_title( 'warehouse_id', 'post,get' );
$info_store = get_info_store( $store_id );
$info_warehouse = get_info_warehouse( $warehouse_id );
$info_warehouse['address'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
$info_order = get_info_order( $id );
if($info_order['payment_method']==0){
	$info_order['payment_method']='Thanh toán khi nhận hàng';
}else{
	$info_order['payment_method']='Thanh toán qua ví tiền';
}
$info_order['transporters_name']=get_info_transporters($info_order['transporters_id'])['name_transporters'];
$info_order['status']=get_info_order_status($info_order['status'])['name'];
$info_order['total_product']=number_format($info_order['total_product']).' VND';
$info_order['total']=number_format($info_order['total']).' VND';
$info_order['fee_transport']=number_format($info_order['fee_transport']).' VND';

$info_order['address'] = $info_order['address'].', '.get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title'];
$per_page = 20;
$page = $nv_Request->get_int( 'page', 'post,get', 1 );
$db->sqlreset()
->select( 'COUNT(*)' )
->from( '' . TABLE . '_order_item t1' )
->join( 'INNER JOIN ' . TABLE . '_product t2 ON t1.product_id = t2.id' )
->where( 't1.order_id='.$id );

$sth = $db->prepare( $db->sql() );

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select( 't1.*,t2.name_product,t2.barcode' )
->order( 't1.id DESC' )
->limit( $per_page )
->offset( ( $page - 1 ) * $per_page );
$sth = $db->prepare( $db->sql() );

$sth->execute();
$list_logs_order=$db->query('SELECT * FROM '.TABLE.'_logs_order where order_id='.$id)->fetchAll();
$xtpl = new XTemplate( $op.'.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
$xtpl->assign( 'OP', $op );
$xtpl->assign( 'info_store', $info_store );
$xtpl->assign( 'info_warehouse', $info_warehouse );
$xtpl->assign( 'info_order', $info_order );
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
if ( !empty( $q ) ) {
    $base_url .= '&q=' . $q;
}
$generate_page = nv_generate_page( $base_url, $num_items, $per_page, $page );
if ( !empty( $generate_page ) ) {
    $xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
    $xtpl->parse( 'main.view.generate_page' );
}
$number = $page > 1 ? ( $per_page * ( $page - 1 ) ) + 1 : 1;
while ( $view = $sth->fetch() ) {
    $view['number'] = $number++;
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
	$view['total']=number_format($view['total']);
	$view['price']=number_format($view['price']);
	$view['quantity']=number_format($view['quantity']);
    $xtpl->assign( 'VIEW', $view );
    $xtpl->parse( 'main.view.loop' );
}
$stt_logs=1;
foreach($list_logs_order as $value_logs){
	if($value_logs['status_id_old']==-1){
		$value_logs['status_id_old']='';
	}else{
		$value_logs['status_id_old']=get_info_order_status($value_logs['status_id_old'])['name'];
	}
	if($value_logs['user_add']>0){
		$value_logs['user_add']=get_info_user($value_logs['user_add'])['username'];
	}else{
		$value_logs['user_add']='Khách đặt hàng không có tài khoản';
	}
	$value_logs['time_add']=date('d/m/Y H:i',$value_logs['time_add']);
	$value_logs['number']=$stt_logs++;
	$xtpl->assign( 'LOOP_LOGS', $value_logs );
	$xtpl->parse( 'main.logs_order' );
}
if(!empty($info_order['shipping_code'])){
	if($info_order['transporters_id']==4 || $info_order['transporters_id']==5){
		$LstItemCode=array();
		$LstItemCode[]=$info_order['shipping_code'];
		$list_tracuu=check_info_order_vnpost($LstItemCode);
		foreach($list_tracuu as $value){
			if($value['State']==0){
				$value['trangthai']='Chưa có trạng thái phát';
			}else if($value['State']==1){
				$value['trangthai']='Phát không thành công';
			}else if($value['State']==2){
				$value['trangthai']='Phát thành công';
			}else if($value['State']==4){
				$value['trangthai']='Phát hoàn thành công';
			}
			$xtpl->assign( 'LOOP_TRACUU', $value );
			$list_tracuu_2=check_info_order_vnpost_2($info_order['shipping_code']);
			foreach($list_tracuu_2['TBL_INFO'] as $value){
				$xtpl->assign( 'VIEW', $value );
				$xtpl->parse( 'main.vnpost.loop.info' );
			}
			foreach($list_tracuu_2['TBL_DINH_VI'] as $value){
				$xtpl->assign( 'VIEW', $value );
				$xtpl->parse( 'main.vnpost.loop.DINH_VI' );
			}
			foreach($list_tracuu_2['TBL_DELIVERY'] as $value){
				$xtpl->assign( 'VIEW', $value );
				$xtpl->parse( 'main.vnpost.loop.DELIVERY' );
			}
			$xtpl->parse( 'main.vnpost.loop' );	
		}
		$xtpl->parse( 'main.vnpost' );
	}else if($info_order['transporters_id']==3 || $info_order['transporters_id']==11){
		$list_tracuu=check_info_order_ghn($info_order['shipping_code'],$info_warehouse['shops_id_ghn'])['data'];
		foreach($list_tracuu['log'] as $value){
			$value['status']=get_info_status_order_ghn($value['status'])['name'];
			$value['updated_date']=date('d/m/Y H:i',strtotime($value['updated_date']));
			$xtpl->assign( 'VIEW', $value );
			$xtpl->parse('main.ghn.loop');
		}
		$xtpl->parse('main.ghn');
	}else if($info_order['transporters_id']==2){
		$list_tracuu=check_info_order_ghtk($info_order['shipping_code'])['order'];
		$list_tracuu['status']=get_info_status_order_ghtk($list_tracuu['status'])['name'];
		$list_tracuu['modified']=date('d/m/Y H:i',strtotime($list_tracuu['modified']));
		$xtpl->assign( 'VIEW', $list_tracuu );
		$xtpl->parse('main.ghtk');
	}else if($info_order['transporters_id']==6 || $info_order['transporters_id']==7 || $info_order['transporters_id']==8|| $info_order['transporters_id']==9){
	}else{
		$xtpl->parse('main.ahamove');
	}
}
$xtpl->parse( 'main.view' );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['vieworder'].' '.$info_order['order_code'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';