<?php

$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
if($mod=='update_number_product'){
	$amount = $nv_Request->get_int('amount', 'get,post', 0);
	$amount_delivery = $nv_Request->get_int('amount_delivery', 'get,post', 0);
	$product_id = $nv_Request->get_int('product_id', 'get,post', 0);
	$store_id = $nv_Request->get_int('store_id', 'get,post', 0);
	$db->query('UPDATE '.TABLE.'_inventory_product SET amount='.$amount.', amount_delivery='.$amount_delivery.' where id='.$product_id);
	print_r( json_encode( array('status'=>'OK','mess'=>'Cập nhật thành công' ) ));
	die();
}
if($mod=='get_PickupType'){
	$q = $nv_Request->get_string('q', 'get,post', '');
	$list_service=array();
	$list_service[] = ['id'=>1, 'text'=>'Thu gom tận nơi'];
	$list_service[] = ['id'=>2, 'text'=>'Gửi hàng tại bưu cục'];
	foreach($list_service as $result){
		if($q!=''){
			if (stripos(strtoupper($result['text']), strtoupper($q)) !== false) {
				$json[] = ['id'=>$result['id'], 'text'=>$result['text']];
			}
		}else{
			$json[] = ['id'=>$result['id'], 'text'=>$result['text']];
		}
	}

	print_r(json_encode($json));die(); 
}
if($mod=='get_product_classify'){
	$q = $nv_Request->get_string('q', 'get,post', '');
	$list_product=get_full_product_classify_sellect2($q);
	$json=array();
	$json[] = ['id'=>0, 'text'=>'Chọn tất cả'];
	foreach($list_product as $result){
		$result['classify_id_value1_name']=get_info_classify_value($result['classify_id_value1'])['name'];
		if($result['classify_id_value2']>0){
			$result['classify_id_value2_name']=get_info_classify_value($result['classify_id_value2'])['name'];
			$name_group=$result['classify_id_value1_name'].', '.$result['classify_id_value2_name'];
		}else{
			$name_group=$result['classify_id_value1_name'];
		}
		$result['name_product']=$result['name_product'].' ('.$name_group.')';
		$json[] = ['id'=>$result['id'], 'text'=>$result['name_product']];
	}
	print_r(json_encode($json));die(); 
}
if($mod=='send_ahamove'){
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order=get_info_order($order_id);
	$info_warehouse=get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address_full'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
	$info_order['address_full'] = $info_order['address'].', '.get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title'];
	$path=array();
	if($info_order['payment_method']==0){
		$path[]=array(
			"lat" =>(float)$info_warehouse['lat'],
			"lng" =>(float)$info_warehouse['lng'],
			"address"=>urlencode($info_warehouse['address_full']),
			"short_address" => urlencode(get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title']),
			"name" =>urlencode($info_warehouse['name_send']),
			"mobile" =>$info_warehouse['phone_send'],
			"remarks" => urlencode("call me")
		);
		$path[]=array(
			"lat" =>(float)$info_order['lat'],
			"lng" =>(float)$info_order['lng'],
			"address"=>urlencode($info_order['address_full']),
			"short_address"=>urlencode(get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title']),
			"name"=>urlencode($info_order['order_name']),
			"mobile"=>$info_order['phone'],
			"remarks" => urlencode("call me"),
			"cod"=>$info_order['total']
		);
	}else{
		$path[]=array(
			"lat" =>(float)$info_warehouse['lat'],
			"lng" =>(float)$info_warehouse['lng'],
			"address"=>urlencode($info_warehouse['address_full']),
			"short_address" => urlencode(get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title']),
			"name" =>urlencode($info_warehouse['name_send']),
			"mobile" =>$info_warehouse['phone_send'],
			"remarks" => urlencode("call me"),
			"cod"=>0
		);
		$path[]=array(
			"lat" =>(float)$info_order['lat'],
			"lng" =>(float)$info_order['lng'],
			"address"=>urlencode($info_order['address_full']),
			"short_address"=>urlencode(get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title']),
			"name"=>urlencode($info_order['order_name']),
			"mobile"=>$info_order['phone'],
			"remarks" => urlencode("call me")
		);
	}
	$service_id=get_info_transporters($info_order['transporters_id'])['code_transporters'];
	if($info_order['payment_method']==0){
		$payment_method='CASH';
	}else{
		$payment_method='BALANCE';
	}
	$list_order=$db->query('SELECT t1.*, t2.name_product,t2.barcode FROM '.TABLE.'_order_item t1 INNER JOIN '.TABLE.'_product t2 ON t1.product_id=t2.id where order_id='.$order_id)->fetchAll(); 
	$list_item=array();
	foreach($list_order as $value){
		if($value['classify_value_product_id']>0){
			$classify_value_product_id=get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
			if($classify_value_product_id['classify_id_value2']>0){
				$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
				$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
			}else{
				$name_group=$name_classify_id_value1;
			}
			$value['name_product']=$value['name_product'].'('.$name_group.')';
		}
		$list_item[]=array(
			"_id" => $value['barcode'],
			"name" =>urlencode($value['name_product']),
			"num" => $value['quantity'],
			"price" => $value['price']
		);
	} 
	$order_ahamove=send_ahamove($path,$service_id,$list_item,$payment_method);
	if(!empty($order_ahamove['order_id'])){
		$db->query('UPDATE '.TABLE.'_order SET status=2, shipping_code='.$db->quote($order_ahamove['order_id']).',link_check_ahamove_order='.$db->quote($order_ahamove['shared_link']).' where id='.$order_id);
		$content='Chuyển sang đơn vị vận chuyển Ahamove Thành Công';
		$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.',1,'.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
		print_r( json_encode( array('status'=>'OK' ) ));
		die();
	}else{
		print_r( json_encode( array('status'=>'ERROR','mess'=>$order_ahamove['description'] ) ));
		die();
	}
}
if($mod=='send_ghn'){
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$view = $nv_Request->get_int('view', 'get,post', 0);
	if($view==0){
		$required_note='KHONGCHOXEMHANG';
	}else if($view==1){
		$required_note='CHOXEMHANGKHONGTHU';
	}else if($view==2){
		$required_note='CHOTHUHANG';
	}
	$info_order=get_info_order($order_id);
	$info_warehouse=get_info_warehouse($info_order['warehouse_id']);
	$ReceiverDistrictId=get_info_district($info_order['district_id'])['ghnid'];
	$ReceiverWardId=get_info_ward($info_order['ward_id'])['ghnid'];
	$PackageContent='Đơn hàng với mã đơn hàng '.$info_order['order_code'];
	$ServiceName=get_info_transporters($info_order['transporters_id'])['code_transporters'];
	$info_order['address'] = $info_order['address'].', '.get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title'];
	$list_order=$db->query('SELECT t1.*, t2.name_product,t2.barcode FROM '.TABLE.'_order_item t1 INNER JOIN '.TABLE.'_product t2 ON t1.product_id=t2.id where order_id='.$order_id)->fetchAll(); 
	$list_item=array();
	foreach($list_order as $value){
		if($value['classify_value_product_id']>0){
			$classify_value_product_id=get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
			if($classify_value_product_id['classify_id_value2']>0){
				$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
				$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
			}else{
				$name_group=$name_classify_id_value1;
			}
			$value['name_product']=$value['name_product'].'('.$name_group.')';
		}
		$list_item[]=array(
			"name" =>$value['name_product'],
			"quantity" => $value['quantity'],
			"code" => $value['barcode']
		);
	} 
	$order_ghn=send_ghn($info_warehouse['shops_id_ghn'],$info_order['order_name'],$info_order['phone'],$info_order['address'],$ReceiverWardId,$ReceiverDistrictId,$PackageContent,$info_order['total_weight'],$info_order['total_length'],$info_order['total_width'],$info_order['total_height'],$info_order['total'],$ServiceName,$required_note,$list_item);
	$db->query('UPDATE '.TABLE.'_order SET status=2, shipping_code='.$db->quote($order_ghn['data']['order_code']).' where id='.$order_id);
	$content='Chuyển sang đơn vị vận chuyển GHN Thành Công';
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.',1,'.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='send_ghtk'){
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order=get_info_order($order_id);
	$info_warehouse=get_info_warehouse($info_order['warehouse_id']);
	$list_order=$db->query('SELECT t1.*, t2.name_product FROM '.TABLE.'_order_item t1 INNER JOIN '.TABLE.'_product t2 ON t1.product_id=t2.id where order_id='.$order_id)->fetchAll(); 
	$list_item=array();
	foreach($list_order as $value){
		if($value['classify_value_product_id']>0){
			$classify_value_product_id=get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
			if($classify_value_product_id['classify_id_value2']>0){
				$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
				$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
			}else{
				$name_group=$name_classify_id_value1;
			}
			$value['name_product']=$value['name_product'].'('.$name_group.')';
		}
		$check=get_info_product_ghtk($value['name_product']);
		if(count($check['data'])>0){
			$list_item[]=array(
				"name" =>$value['name_product'],
				"price" => $value['price'],
				"weight" => $value['weight']/1000,
				"quantity" => $value['quantity'],
				"product_code" => $check['data'][0]['product_code']
			);
		}else{
			$list_item[]=array(
				"name" =>$value['name_product'],
				"price" => $value['price'],
				"weight" => $value['weight']/1000,
				"quantity" => $value['quantity'],
				"product_code" => ""
			);
		}
	} 
	$order_ghtk=send_ghtk($list_item,$info_order['order_code'],$info_warehouse['name_send'],$info_warehouse['address'],get_info_province( $info_warehouse['province_id'] )['title'],get_info_district( $info_warehouse['district_id'] )['title'],get_info_ward( $info_warehouse['ward_id'] )['title'],$info_warehouse['phone_send'],$info_order['phone'],$info_order['order_name'],$info_order['address'],get_info_province( $info_order['province_id'] )['title'],get_info_district( $info_order['district_id'] )['title'],get_info_ward( $info_order['ward_id'] )['title'],$info_order['total'],$info_order['total']);
	$db->query('UPDATE '.TABLE.'_order SET status=2, shipping_code='.$db->quote($order_ghtk['order']['label']).' where id='.$order_id);
	$content='Chuyển sang đơn vị vận chuyển GHTK Thành Công';
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.',1,'.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='send_viettelpost'){
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order=get_info_order($order_id); 
	$ServiceName=get_info_transporters($info_order['transporters_id'])['code_transporters'];
	$info_warehouse=get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
	$SenderProvinceId=get_info_province($info_warehouse['province_id'])['vtpid'];
	$SenderDistrictId=get_info_district($info_warehouse['district_id'])['vtpid'];
	$SenderWardId=get_info_ward($info_warehouse['ward_id'])['vtpid'];
	$ReceiverProvinceId=get_info_province($info_order['province_id'])['vtpid'];
	$ReceiverDistrictId=get_info_district($info_order['district_id'])['vtpid'];
	$ReceiverWardId=get_info_ward($info_order['ward_id'])['vtpid'];
	$info_order['address'] = $info_order['address'].', '.get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title'];
	$PackageContent='Đơn hàng với mã đơn hàng '.$info_order['order_code'];
	$PRODUCT_QUANTITY=$db->query('SELECT count(*) FROM '.TABLE.'_order_item where order_id='.$order_id)->fetchColumn(); 
	$list_order=$db->query('SELECT t1.*, t2.name_product FROM '.TABLE.'_order_item t1 INNER JOIN '.TABLE.'_product t2 ON t1.product_id=t2.id where order_id='.$order_id)->fetchAll(); 
	$list_item=array();
	foreach($list_order as $value){
		if($value['classify_value_product_id']>0){
			$classify_value_product_id=get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
			if($classify_value_product_id['classify_id_value2']>0){
				$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
				$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
			}else{
				$name_group=$name_classify_id_value1;
			}
			$value['name_product']=$value['name_product'].'('.$name_group.')';
		}
		$list_item[]=array(
			"PRODUCT_NAME" =>$value['name_product'],
			"PRODUCT_PRICE" => $value['price'],
			"PRODUCT_WEIGHT" => $value['weight'],
			"PRODUCT_QUANTITY" => $value['quantity']
		);
	}
	$order_viettelpost=send_viettelpost($info_order['total'],$info_order['total'],'',$ServiceName,$SenderProvinceId,$SenderDistrictId,$SenderWardId,$info_warehouse['lat'],$info_warehouse['lng'],$ReceiverProvinceId,$ReceiverDistrictId,"HH",$info_order['order_code'],$info_warehouse['groupaddressid'],$info_warehouse['cusid'],$info_warehouse['name_send'],$info_warehouse['address'],str_replace("-","",$info_warehouse['phone_send']),$info_order['order_name'],$info_order['address'],$info_order['phone'],$PackageContent,$PackageContent,$PRODUCT_QUANTITY,3,$list_item,$info_order['total_weight'],$info_order['total_length'],$info_order['total_width'],$info_order['total_height'],$ReceiverWardId,$info_order['lat'],$info_order['lng']);
	$db->query('UPDATE '.TABLE.'_order SET status=2, shipping_code='.$db->quote($order_viettelpost['data']['ORDER_NUMBER']).' where id='.$order_id);
	$content='Chuyển sang đơn vị vận chuyển Viettel Post Thành Công';
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.',1,'.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='send_vnpost'){
	$IsPackageViewable = $nv_Request->get_int('IsPackageViewable', 'get,post', 0);
	$PickupType = $nv_Request->get_int('PickupType', 'get,post', 0);
	$PickupPoscode = $nv_Request->get_int('PickupPoscode', 'get,post', 0);
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order=get_info_order($order_id); 
	$ServiceName=get_info_transporters($info_order['transporters_id'])['code_transporters'];
	$info_warehouse=get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
	$SenderProvinceId=get_info_province($info_warehouse['province_id'])['vnpostid'];
	$SenderDistrictId=get_info_district($info_warehouse['district_id'])['vnpostid'];
	$SenderWardId=get_info_ward($info_warehouse['ward_id'])['vnpostid'];
	$ReceiverProvinceId=get_info_province($info_order['province_id'])['vnpostid'];
	$ReceiverDistrictId=get_info_district($info_order['district_id'])['vnpostid'];
	$ReceiverWardId=get_info_ward($info_order['ward_id'])['vnpostid'];
	$PackageContent='Đơn hàng với mã đơn hàng '.$info_order['order_code'];
	$info_order['address'] = $info_order['address'].', '.get_info_ward( $info_order['ward_id'] )['title'].', '.get_info_district( $info_order['district_id'] )['title'].', '.get_info_province( $info_order['province_id'] )['title'];
	$order_vnpost=send_vnpost($info_order['order_code'],$PickupType,$IsPackageViewable,$PackageContent,$ServiceName, $info_warehouse['name_send'], $info_warehouse['address'], $info_warehouse['phone_send'],$SenderProvinceId,$SenderDistrictId, $SenderWardId, $info_order['order_name'], $info_order['address'], $info_order['phone'], $ReceiverProvinceId, $ReceiverDistrictId,$ReceiverWardId,$info_order['total'],$PickupPoscode,$info_order['total_weight'],$info_order['total_length'],$info_order['total_width'],$info_order['total_height']);
	$db->query('UPDATE '.TABLE.'_order SET status=2, shipping_code='.$db->quote($order_vnpost['ItemCode']).' where id='.$order_id);
	$content='Chuyển sang đơn vị vận chuyển VNPOST Thành Công';
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.',1,'.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='get_buucuc'){
	$q = $nv_Request->get_string('q', 'get,post', '');
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'get,post', 0);
	$province_id_send = get_info_warehouse($warehouse_id)['province_id'];
	$district_id_send = get_info_warehouse($warehouse_id)['district_id'];
	$list_buucuc=GetListBuuCucByXaHuyenTinh($province_id_send,$district_id_send);
	foreach($list_buucuc as $result){
		$result['name']=$result['TenBuuCuc']. ' - Địa chỉ: '.$result['DiaChi'];
		if($q!=''){
			if (stripos(strtoupper($result['name']), strtoupper($q)) !== false) {
				$json[] = ['id'=>$result['MaBuuCuc'], 'text'=>$result['name']];
			}
		}else{
			$json[] = ['id'=>$result['MaBuuCuc'], 'text'=>$result['name']];
		}
	}

	print_r(json_encode($json));die(); 
}

if($mod=='change_status_cancel'){
	$order_id = $nv_Request->get_title( 'order_id', 'post,get' );
	$content = $nv_Request->get_title( 'content', 'post,get','' );
	$warehouse_id=$db->query('SELECT warehouse_id FROM '.TABLE.'_order where id='.$order_id)->fetchColumn();
	$list_product=$db->query('SELECT * FROM '.TABLE.'_order_item where order_id='.$order_id)->fetchAll();
	$status_new = $nv_Request->get_int( 'status_new', 'post,get' );
	$status_old = $nv_Request->get_int( 'status_old', 'post,get' );
	$db->query('UPDATE '.TABLE.'_order SET status='.$status_new.' where id='.$order_id);

	foreach($list_product as $value){
		$amount_delivery_old=$db->query('SELECT amount_delivery FROM '.TABLE.'_inventory_product where warehouse_id='.$warehouse_id.' and product_id='.$value['product_id'].' and classify_value_product_id='.$value['classify_value_product_id'])->fetchColumn();
		$amount_old=$db->query('SELECT amount FROM '.TABLE.'_inventory_product where warehouse_id='.$warehouse_id.' and product_id='.$value['product_id'].' and classify_value_product_id='.$value['classify_value_product_id'])->fetchColumn();
		$amount_delivery_new = $amount_delivery_old - $value['quantity'];
		$amount_new = $amount_old + $value['quantity'];
		$db->query('UPDATE '.TABLE.'_inventory_product SET amount_delivery='.$amount_delivery_new.',amount='.$amount_new.' where warehouse_id='.$warehouse_id.' and product_id='.$value['product_id'].' and classify_value_product_id='.$value['classify_value_product_id']);
	}
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.','.$status_old.','.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='change_status_success'){
	$order_id = $nv_Request->get_title( 'order_id', 'post,get' );
	$warehouse_id=$db->query('SELECT warehouse_id FROM '.TABLE.'_order where id='.$order_id)->fetchColumn();
	$list_product=$db->query('SELECT * FROM '.TABLE.'_order_item where order_id='.$order_id)->fetchAll();
	$status_new = $nv_Request->get_int( 'status_new', 'post,get' );
	$status_old = $nv_Request->get_int( 'status_old', 'post,get' );
	$db->query('UPDATE '.TABLE.'_order SET status='.$status_new.' where id='.$order_id);
	$content='Đơn hàng chuyển sang trạng thái thành công';
	foreach($list_product as $value){
		$amount_delivery_old=$db->query('SELECT amount_delivery FROM '.TABLE.'_inventory_product where warehouse_id='.$warehouse_id.' and product_id='.$value['product_id'].' and classify_value_product_id='.$value['classify_value_product_id'])->fetchColumn();
		$amount_delivery_new=$amount_delivery_old-$value['quantity'];
		$db->query('UPDATE '.TABLE.'_inventory_product SET amount_delivery='.$amount_delivery_new.' where warehouse_id='.$warehouse_id.' and product_id='.$value['product_id'].' and classify_value_product_id='.$value['classify_value_product_id']);
		$number_order_old=$db->query('SELECT number_order FROM '.TABLE.'_product where id='.$value['product_id'])->fetchColumn();
		$number_order_new = $number_order_old+$value['quantity'];
		$db->query('UPDATE '.TABLE.'_product SET number_order='.$number_order_new.' where id='.$value['product_id']);
	}
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.','.$status_old.','.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='change_status'){
	$order_id = $nv_Request->get_title( 'order_id', 'post,get' );
	$status_new = $nv_Request->get_int( 'status_new', 'post,get' );
	$status_old = $nv_Request->get_int( 'status_old', 'post,get' );
	$db->query('UPDATE '.TABLE.'_order SET status='.$status_new.' where id='.$order_id);
	if($status_new==1){
		$content='Đơn hàng chuyển sang trạng thái đã xác nhận';
	}
	$db->query('INSERT INTO '.TABLE.'_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES('.$order_id.','.$status_old.','.$db->quote($content).','.NV_CURRENTTIME.','.$admin_info['userid'].')');
	print_r( json_encode( array('status'=>'OK' ) ));
    die();
}
if($mod=='load_order'){
	$where = '';
	$q = $nv_Request->get_title( 'q', 'post,get' );
	$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
	$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
	$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
	$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
	$store_id = $nv_Request->get_int( 'store_id', 'post,get', 0 );
	$_SESSION[$module_data.'_status_view_order']=$status_ft;
	$warehouse_id = $nv_Request->get_int( 'warehouse_id', 'post,get', 0 );
	$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=load_order&q='.$q.'&sea_flast='.$sea_flast.'&ngay_den='.$ngay_den.'&ngay_tu='.$ngay_tu.'&status_search='.$status_ft.'&store_id='.$store_id.'&warehouse_id='.$warehouse_id;
	if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
	 {
		$_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
		$_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
		$ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
	} else {
		$ngay_tu = 0;
	}
	

	if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
	 {
		$_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
		$_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
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
	if ( $status_ft>-1 ) {
		$where .= ' AND status ='.$status_ft;
		$base_url .= '&status_search=' . $status_ft;
	}
	if ( !empty( $q ) ) {
		$where .= ' AND (order_code LIKE "%" "'.$q. '" "%" OR order_name LIKE "%" "'.$q. '" "%" OR phone LIKE "%" "'.$q. '" "%" OR email LIKE "%" "'.$q. '" "%")';
		$base_url .= '&q=' . $q;
	}
	if($store_id>0){
		$where .= ' AND store_id ='.$store_id;
		$base_url .= '&store_id=' . $store_id;
	}
	if($warehouse_id>0){
		$where .= ' AND warehouse_id ='.$warehouse_id;
		$base_url .= '&warehouse_id=' . $warehouse_id;
	}
	
	$per_page = 10;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_order')
		->where('1=1'.$where);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('*')
		->order('id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$xtpl = new XTemplate('order_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	$xtpl->assign('Q', $q);
	$xtpl->assign('warehouse_id', $warehouse_id);
	$xtpl->assign('store_id', $store_id);
	if($store_id>0){
		if($warehouse_id>0){
			$xtpl->assign('warehouse_name', get_info_warehouse($warehouse_id)['name_warehouse']);
		}else{
			$xtpl->assign('warehouse_name', 'Chọn tất cả');
		}
		$xtpl->parse('main.store_edit');

	}
	if ( $ngay_tu > 0 )
	$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
	if ( $ngay_den > 0 )
	$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
	
    $generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'form');
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
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

    if ( $sea_flast == '1' ) {
        $xtpl->assign( 'SELECT1', 'selected="selected"' );
    }
    if ( $sea_flast == '2' ) {
        $xtpl->assign( 'SELECT2', 'selected="selected"' );
    }
    if ( $sea_flast == '3' ) {
        $xtpl->assign( 'SELECT3', 'selected="selected"' );
    }
    if ( $sea_flast == '4' ) {
        $xtpl->assign( 'SELECT4', 'selected="selected"' );
    }
    if ( $sea_flast == '5' ) {
        $xtpl->assign( 'SELECT5', 'selected="selected"' );
    }
    if ( $sea_flast == '6' ) {
        $xtpl->assign( 'SELECT6', 'selected="selected"' );
    }
    if ( $sea_flast == '7' ) {
        $xtpl->assign( 'SELECT7', 'selected="selected"' );
    }
    if ( $sea_flast == '8' ) {
        $xtpl->assign( 'SELECT8', 'selected="selected"' );
    }
    if ( $sea_flast == '9' ) {
        $xtpl->assign( 'SELECT9', 'selected="selected"' );
    }
   
    while ($view = $sth->fetch()) {
        $view['number'] = $number++;
		$view['store_name']=get_info_store($view['store_id'])['company_name'];
		$view['warehouse_name']=get_info_warehouse($view['warehouse_id'])['name_warehouse'];
		$view['phone_warehouse']=get_info_warehouse($view['warehouse_id'])['phone_send'];
		$info_warehouse = get_info_warehouse( $view['warehouse_id'] );
		$view['address_warehouse'] = $info_warehouse['address'].', '.get_info_ward( $info_warehouse['ward_id'] )['title'].', '.get_info_district( $info_warehouse['district_id'] )['title'].', '.get_info_province( $info_warehouse['province_id'] )['title'];
		$view['address_receive'] = $view['address'].', '.get_info_ward( $view['ward_id'] )['title'].', '.get_info_district( $view['district_id'] )['title'].', '.get_info_province( $view['province_id'] )['title'];
		$view['transporters_name']=get_info_transporters($view['transporters_id'])['name_transporters'];
		$view['total_product']=number_format($view['total_product']);
		$view['fee_transport']=number_format($view['fee_transport']);
		$view['total']=number_format($view['total']);
		$view['time_add']=date('d-m-Y H:i',$view['time_add']);
		if($view['payment_method']==0){
			$view['payment_method']='Thanh toán khi nhận hàng';
		}else{
			$view['payment_method']='Thanh toán qua ví tiền';
		}
		$view['link_view'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=view_order&amp;id=' . $view['id'].'&store_id='.$view['store_id'].'&warehouse_id='.$view['warehouse_id'];
        $xtpl->assign('VIEW', $view);
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
			$xtpl->parse('main.loop.status_success');
		}else if($view['status']<2){
			$xtpl->parse('main.loop.status_cancel');
		}
        $xtpl->parse('main.loop');
    }
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['order'];
	echo $contents;die;

}

if ( $mod == 'get_province' ) {
    $q = $nv_Request->get_string( 'q', 'post', '' );
    $list_location = get_province_select2( $q );
    foreach ( $list_location as $result ) {
        $json[] = ['id'=>$result['provinceid'], 'text'=>$result['title']];
    }
    print_r( json_encode( $json ) );
    die();

}
if ( $mod == 'load_warehouse' ) {
    $sell_id = $nv_Request->get_int( 'sell_id', 'get', 0 );
    $per_page = 10;
    $page = $nv_Request->get_int( 'page', 'post,get', 1 );
    $db->sqlreset()
    ->select( 'COUNT(*)' )
    ->from( '' . TABLE . '_warehouse' )
    ->where( 'sell_id='.$sell_id );
    $sth = $db->prepare( $db->sql() );

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select( '*' )
    ->order( 'id ASC' )
    ->limit( $per_page )
    ->offset( ( $page - 1 ) * $per_page );
    $sth = $db->prepare( $db->sql() );

    $sth ->execute();

    $xtpl = new XTemplate( 'warehouse_seller_management_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
    $xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
    $xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
    $xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
    $xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
    $xtpl->assign( 'MODULE_NAME', $module_name );
    $xtpl->assign( 'MODULE_UPLOAD', $module_upload );
    $xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=load_warehouse&sell_id='.$sell_id;

    $generate_page_warehouse = nv_generate_page( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'form_detail_'.$sell_id );
    if ( !empty( $generate_page ) ) {
        $xtpl->assign( 'NV_GENERATE_PAGE_WAREHOUSE', $generate_page_warehouse );
        $xtpl->parse( 'main.loop.generate_page_warehouse' );
    }
    $number = $page > 1 ? ( $per_page * ( $page - 1 ) ) + 1 : 1;
    while ( $view = $sth->fetch() ) {
	   $view['address_full']=$view['address'].', '.get_info_ward($view['ward_id'])['title'].', '.get_info_district($view['district_id'])['title'].', '.get_info_province($view['province_id'])['title'];
	   $xtpl->assign( 'LOOP', $view );
       $xtpl->parse( 'main.loop' );
    }

    $xtpl->parse( 'main' );
    $contents = $xtpl->text( 'main' );

    include NV_ROOTDIR . '/includes/header.php';
    echo nv_admin_theme( $contents, false );
    include NV_ROOTDIR . '/includes/footer.php';
}
if ( $mod == 'get_bank_search' ) {
    $q = $nv_Request->get_string( 'q', 'post', '' );
    $list_location = get_bank_select2( $q );
    $json[] = ['id'=>0, 'text'=>'Chọn tất cả'];
    foreach ( $list_location as $result ) {
        $json[] = ['id'=>$result['bank_id'], 'text'=>$result['bank_code'].' - '.$result['name_bank']];
    }
    print_r( json_encode( $json ) );
    die();

}
if ( $mod == 'get_district' ) {
    $q = $nv_Request->get_string( 'q', 'post', '' );
    $provinceid = $nv_Request->get_string( 'provinceid', 'post', '' );
    $list_location = get_district_select2( $q, $provinceid );
    foreach ( $list_location as $result ) {
        $json[] = ['id'=>$result['districtid'], 'text'=>$result['title']];
    }
    print_r( json_encode( $json ) );
    die();

}
if ( $mod == 'get_ward' ) {
    $q = $nv_Request->get_string( 'q', 'post', '' );
    $districtid = $nv_Request->get_string( 'districtid', 'post', '' );
    $list_location = get_ward_select2( $q, $districtid );
    foreach ( $list_location as $result ) {
        $json[] = ['id'=>$result['wardid'], 'text'=>$result['title']];
    }
    print_r( json_encode( $json ) );
    die();

}
if ( $mod == 'get_branch' ) {
    $q = $nv_Request->get_string( 'q', 'post', '' );
    $bank_id = $nv_Request->get_string( 'bank_id', 'post', '' );
    $list_location = get_branch_select2( $q, $bank_id );
    foreach ( $list_location as $result ) {
        $json[] = ['id'=>$result['branch_id'], 'text'=>$result['name_branch']];
    }
    print_r( json_encode( $json ) );
    die();

}

if ( $mod == 'inhome' ) {
	$id = $nv_Request->get_int( 'id', 'post', '' );
    $new_vid = $nv_Request->get_int( 'new_vid', 'post', '' );
    $db->query( 'UPDATE ' . $db_config['dbsystem']. '.'. TABLE . '_categories SET inhome='.$new_vid.'  ,time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' where id='.$id );
    print_r( json_encode( array('status'=>'OK') ) );
    die();

}
if ( $mod == 'viewcat' ) {
	$id = $nv_Request->get_int( 'id', 'post', '' );
    $new_vid = $nv_Request->get_int( 'new_vid', 'post', '' );
    $db->query( 'UPDATE ' . $db_config['dbsystem']. '.'. TABLE . '_categories SET viewcat='.$new_vid.'  ,time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' where id='.$id );
    print_r( json_encode( array('status'=>'OK') ) );
    die();

}
if ( $mod == 'numlinks' ) {
	$id = $nv_Request->get_int( 'id', 'post', '' );
    $new_vid = $nv_Request->get_int( 'new_vid', 'post', '' );
    $db->query( 'UPDATE ' . $db_config['dbsystem']. '.'. TABLE . '_categories SET numlinks='.$new_vid.'  ,time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' where id='.$id );
    print_r( json_encode( array('status'=>'OK') ) );
    die();

}