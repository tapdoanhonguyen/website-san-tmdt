<?php
	
	/**
		* @Project TMS HOLDINGS
		* @Author TMS Holdings <contact@tms.vn>
		* @Copyright ( C ) 2020 TMS Holdings. All rights reserved
		* @License GNU/GPL version 2 or any later version
		* @Createdate Mon, 21 Dec 2020 09:08:19 GMT
	*/
	
	if ( !defined( 'NV_IS_MOD_RESELLER' ) )
	die( 'Stop!!!' );
	
	/**
		* email_new_order_payment()
		*
		* @param mixed $content
		* @param mixed $data_content
		* @param mixed $data_pro
		* @param mixed $data_table
		* @return
	*/ 
	
	
	// đơn hàng thất bại gửi email về admin
	function email_order_delivered_fail_admin($data_order, $data_pro, $info_order)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config, $db, $user_info;
		
		$xtpl = new XTemplate("email_order_delivered_fail_admin.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $data_order);
		$info_order['time_add'] = date('d/m/Y - H:i', $info_order['time_add']);
		$info_order['total_product']=number_format($info_order['total_product']);
		$info_order['fee_transport']=number_format($info_order['fee_transport']);
		$info_order['voucher_price']=number_format($info_order['voucher_price']);
		$info_order['total']=number_format($info_order['total']);
		$xtpl->assign('info_order', $info_order);
		//xem thông tin đơn hàng
		$view_order ='https://chonhagiau.com/admin/index.php?language=vi&nv=retails&op=view_order&id=' . $info_order['id'];
		
		$xtpl->assign('VIEW_ORDER', $view_order);
		$xtpl->assign('SHOP_NAME', $user_info['last_name']);
		
		$i=0;
		
		if($info_order['voucherid'])
		{
			$xtpl->parse('main.data_product.voucher');
		}
		
		foreach ($data_pro as $data) {
			$info_product = get_info_product($data['product_id']);
			if($data['classify_value_product_id']>0){
				$classify_value_product_id=get_info_classify_value_product($data['classify_value_product_id']);
				$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
				$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
				if($classify_value_product_id['classify_id_value2']>0){
					$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
					$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
					$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
					}else{
					$name_group=$name_classify_id_value1;
				}
				$product_name = $info_product['name_product'].' ('.$name_group.')';
				}else{
				$product_name = $info_product['name_product'];
			}	
			
			$image = $info_product['image'];
			
			$xtpl->assign('image', 'https://banhang.chonhagiau.com/uploads/' . $module_file . '/' . $image);
			
			$xtpl->assign('name_group', $name_group);
			$xtpl->assign('product_name', $product_name);
			$xtpl->assign('product_number', $data['quantity']);
			$xtpl->assign('product_price', number_format($data['price']));
			$xtpl->assign('product_total', number_format($data['price']*$data['quantity']));
			$xtpl->assign('pro_no', $i + 1);
			$bg = ($i % 2 == 0) ? " style=\"background:#f3f3f3;\"" : "";
			$xtpl->assign('bg', $bg);
			$xtpl->parse('main.data_product.loop');
			++$i;
		}
		
		
		$xtpl->parse('main.data_product');
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	// đơn hàng thất bại gửi email về khach
	function email_order_delivered_fail_khach($data_order, $data_pro, $info_order)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config, $db;
		
		$xtpl = new XTemplate("email_order_delivered_fail_khach.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $data_order);
		$info_order['time_add'] = date('d/m/Y - H:i', $info_order['time_add']);
		$info_order['total_product']=number_format($info_order['total_product']);
		$info_order['fee_transport']=number_format($info_order['fee_transport']);
		$info_order['voucher_price']=number_format($info_order['voucher_price']);
		$info_order['total']=number_format($info_order['total']);
		$xtpl->assign('info_order', $info_order);
		//xem thông tin đơn hàng
		$view_order ='https://chonhagiau.com/vieworder/?id=' . $info_order['id'];
		$xtpl->assign('VIEW_ORDER', $view_order);
		
		$i=0;
		
		if($info_order['voucherid'])
		{
			$xtpl->parse('main.data_product.voucher');
		}
		
		foreach ($data_pro as $data) {
			$info_product = get_info_product($data['product_id']);
			if($data['classify_value_product_id']>0){
				$classify_value_product_id=get_info_classify_value_product($data['classify_value_product_id']);
				$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
				$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
				if($classify_value_product_id['classify_id_value2']>0){
					$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
					$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
					$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
					}else{
					$name_group=$name_classify_id_value1;
				}
				$product_name = $info_product['name_product'].' ('.$name_group.')';
				}else{
				$product_name = $info_product['name_product'];
			}	
			
			$image = $info_product['image'];
			
			$xtpl->assign('image', 'https://banhang.chonhagiau.com/uploads/' . $module_file . '/' . $image);
			
			$xtpl->assign('name_group', $name_group);
			$xtpl->assign('product_name', $product_name);
			$xtpl->assign('product_number', $data['quantity']);
			$xtpl->assign('product_price', number_format($data['price']));
			$xtpl->assign('product_total', number_format($data['price']*$data['quantity']));
			$xtpl->assign('pro_no', $i + 1);
			$bg = ($i % 2 == 0) ? " style=\"background:#f3f3f3;\"" : "";
			$xtpl->assign('bg', $bg);
			$xtpl->parse('main.data_product.loop');
			++$i;
		}
		
		
		$xtpl->parse('main.data_product');
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	//gửi mail thông báo giao đơn thành công cho khách khi seller bấm xác nhận giao hàng thành công
	function mail_order_delivered_khach($data_order, $data_pro, $info_order)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config, $db;
		
		$xtpl = new XTemplate("email_order_delivered_khach.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $data_order);
		$info_order['time_add'] = date('d/m/Y - H:i', $info_order['time_add']);
		$info_order['total_product']=number_format($info_order['total_product']);
		$info_order['fee_transport']=number_format($info_order['fee_transport']);
		$info_order['voucher_price']=number_format($info_order['voucher_price']);
		$info_order['total']=number_format($info_order['total']);
		$xtpl->assign('info_order', $info_order);
		//xem thông tin đơn hàng
		$view_order ='https://chonhagiau.com/vieworder/?id=' . $info_order['id'];
		$xtpl->assign('VIEW_ORDER', $view_order);
		
		$i=0;
		
		if($info_order['voucherid'])
		{
			$xtpl->parse('main.data_product.voucher');
		}
		
		foreach ($data_pro as $data) {
			$info_product = get_info_product($data['product_id']);
			if($data['classify_value_product_id']>0){
				$classify_value_product_id=get_info_classify_value_product($data['classify_value_product_id']);
				$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
				$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
				if($classify_value_product_id['classify_id_value2']>0){
					$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
					$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
					$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
					}else{
					$name_group=$name_classify_id_value1;
				}
				$product_name = $info_product['name_product'].' ('.$name_group.')';
				}else{
				$product_name = $info_product['name_product'];
			}	
			
			$image = $info_product['image'];
			
			$xtpl->assign('image', 'https://banhang.chonhagiau.com/uploads/' . $module_file . '/' . $image);
			
			$xtpl->assign('name_group', $name_group);
			$xtpl->assign('product_name', $product_name);
			$xtpl->assign('product_number', $data['quantity']);
			$xtpl->assign('product_price', number_format($data['price']));
			$xtpl->assign('product_total', number_format($data['price']*$data['quantity']));
			$xtpl->assign('pro_no', $i + 1);
			$bg = ($i % 2 == 0) ? " style=\"background:#f3f3f3;\"" : "";
			$xtpl->assign('bg', $bg);
			$xtpl->parse('main.data_product.loop');
			++$i;
		}
		
		
		$xtpl->parse('main.data_product');
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	
	// giao diện sản phẩm yêu thích shop
	function nv_theme_voucher_add1($data)
	{
		global $op, $global_config, $module_file,$module_name, $db, $user_info;
		
		$xtpl = new XTemplate( "voucher_add1.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		
		if($data)
		{
			$store_code = get_info_user_login($user_info['userid'])['store_code'];
			$xtpl->assign('SHOP_CODE', $store_code);
			
			$str_voucher_name = $data['voucher_name'];
			$xtpl->assign('STR_VOUCHER_NAME', mb_strlen($str_voucher_name));
			
			$xtpl->assign('SHOP_ID', $user_info['userid']);
			
			$voucher_code = (explode($store_code, $data['voucher_code']));
			
			$xtpl->assign('VOUCHER_CODE', $voucher_code[1]);
			//print_r(mb_strlen($voucher_code[1]));die;
			$xtpl->assign('STR_VOUCHER_CODE', mb_strlen($voucher_code[1]));
			
			if (empty($data['time_from'])) {
				$data['time_from'] = date('d/m/Y', NV_CURRENTTIME);
			}
			else
			{
				$data['time_from'] = date('d/m/Y', $data['time_from']);
			}
			
			if (empty($data['time_to'])) {
				$data['time_to'] = date('d/m/Y', NV_CURRENTTIME);
			}
			else
			{
				$data['time_to'] = date('d/m/Y', $data['time_to']);
			}
			if(empty($data['discount_price'])){
				$row['discount_price'] = '';
				}else{
				$data['discount_price'] = number_format( $data['discount_price'] );
			}
			
			$data['minimum_price'] = number_format( $data['minimum_price'] .'đ');
			
			if(empty($data['usage_limit_quantity'])){
				$data['usage_limit_quantity'] = '';
				}else{
				$data['usage_limit_quantity'] = number_format( $data['usage_limit_quantity'] );
			}
			
			if($data['type_discount']) {
				$data['discount_price'] =  $data['discount_price'] .'%';
			}
			else{
				$data['discount_price'] =  $data['discount_price'] .'đ';
			}
			
			if($data['maximum_discount']){
				$data['maximum_discount'] = number_format( $data['maximum_discount'] .'đ');
				
				$xtpl->assign('data', $data);
				$xtpl->parse('main.view.maximum_discount');
			}
			
			// xem chi tiết voucher
			
			if($data['list_product']){
				
				$data_product = $db->query('SELECT id,name_product,image FROM ' . TABLE . '_product WHERE id IN(' . $data[list_product] .') ' )->fetchAll();
				
				foreach ($data_product as $product){
					
					$product['sl_tonkho']= $db->query('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
						
					$count_product = $db->query('SELECT COUNT(id) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();		
				
					$min_price = $db->query('SELECT MIN(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
					
					
					$max_price = $db->query('SELECT MAX(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
					
					
					if($count_product > 1 && $min_price != $max_price){
						$min_price = number_format( $min_price .'đ');
						$max_price = number_format( $max_price .'đ');
						$xtpl->assign('price', $min_price . ' - ' . $max_price);
					}
					else{
						$max_price = number_format( $max_price .'đ');
						$xtpl->assign('price', $max_price);
					}
					
					
					$xtpl->assign('min_price', $min_price);
					$xtpl->assign('max_price', $max_price);
					$xtpl->assign('product', $product);
					$xtpl->parse('main.view.list_product.products');
				}
				
				
				$xtpl->parse('main.view.list_product');
			}
			else{
				
				$xtpl->assign('no_list_product', 'Mã giảm giá được áp dụng cho tất cả sản phẩm');
			}
			
			
			$xtpl->assign('list_voucher', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher', true ));
			
			$xtpl->assign('data', $data);
			$xtpl->parse('main.view');
			
		}
		
		else{
			
			$store_code = get_info_user_login($user_info['userid'])['store_code'];
			$xtpl->assign('SHOP_CODE', $store_code);
			
			$str_voucher_name = $data['voucher_name'];
			$xtpl->assign('STR_VOUCHER_NAME', mb_strlen($str_voucher_name));
			
			$xtpl->assign('SHOP_ID', $user_info['userid']);
			
			$voucher_code = (explode($store_code, $data['voucher_code']));
			
			$xtpl->assign('VOUCHER_CODE', $voucher_code[1]);
			
			
			$xtpl->assign('STR_VOUCHER_CODE', mb_strlen($voucher_code[1]));
			
			
			$time_from = date('d/m/Y', NV_CURRENTTIME);
			$xtpl->assign('TIME_FROM', $time_from);
	
			if(empty($data['discount_price'])){
				$row['discount_price'] = '';
				}else{
				$data['discount_price'] = number_format( $data['discount_price'] );
			}
			
			$data['minimum_price'] = number_format( $data['minimum_price'] .'đ');
			
			if(empty($data['usage_limit_quantity'])){
				$data['usage_limit_quantity'] = '';
				}else{
				$data['usage_limit_quantity'] = number_format( $data['usage_limit_quantity'] );
			}
			
			$xtpl->parse('main.add');
		}
		
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	function nv_theme_voucher_add($data)
	{
		global $op, $global_config, $module_file,$module_name, $db, $user_info;
		
		$xtpl = new XTemplate( "voucher_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('list_voucher', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher', true ));
		if($data)
		{
			$store_code = get_info_user_login($user_info['userid'])['store_code'];
			$xtpl->assign('SHOP_CODE', $store_code);
			
			$str_voucher_name = $data['voucher_name'];
			$xtpl->assign('STR_VOUCHER_NAME', mb_strlen($str_voucher_name));
			
			$xtpl->assign('SHOP_ID', $user_info['userid']);
			
			$voucher_code = (explode($store_code, $data['voucher_code']));
			
			$xtpl->assign('VOUCHER_CODE', $voucher_code[1]);
			//print_r(mb_strlen($voucher_code[1]));die;
			$xtpl->assign('STR_VOUCHER_CODE', mb_strlen($voucher_code[1]));
			
			if (empty($data['time_from'])) {
				$data['time_from'] = date('d/m/Y', NV_CURRENTTIME);
			}
			else
			{
				$data['time_from'] = date('Y-m-d H:i', $data['time_from']);
			}
			
			if (empty($data['time_to'])) {
				$data['time_to'] = date('d/m/Y', NV_CURRENTTIME);
			}
			else
			{
				$data['time_to'] = date('Y-m-d H:i', $data['time_to']);
			}
			if(empty($data['discount_price'])){
				$row['discount_price'] = '';
				}else{
				$data['discount_price'] = number_format( $data['discount_price'] );
			}
			
			$data['minimum_price'] = number_format( $data['minimum_price'] .'đ');
			
			if(empty($data['usage_limit_quantity'])){
				$data['usage_limit_quantity'] = '';
				}else{
				$data['usage_limit_quantity'] = number_format( $data['usage_limit_quantity'] );
			}
			
			if($data['type_discount']) {
				$data['discount_price'] =  $data['discount_price'] .'%';
			}
			else{
				$data['discount_price'] =  $data['discount_price'] .'đ';
			}
			
			if($data['maximum_discount']){
				$data['maximum_discount'] = number_format( $data['maximum_discount'] .'đ');
				
				$xtpl->assign('data', $data);
				$xtpl->parse('main.view.maximum_discount');
			}
			
			// xem chi tiết voucher
			
			if($data['list_product']){
				
				$data_product = $db->query('SELECT id,name_product,image FROM ' . TABLE . '_product WHERE id IN(' . $data['list_product'] .') ' )->fetchAll();
				
				foreach ($data_product as $product){
					
					$product['sl_tonkho']= $db->query('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
						
					$count_product = $db->query('SELECT COUNT(id) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();		
				
					$min_price = $db->query('SELECT MIN(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
					
					
					$max_price = $db->query('SELECT MAX(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $product['id'])->fetchColumn();
					
					
					if($count_product > 1 && $min_price != $max_price){
						$min_price = number_format( $min_price);
						$max_price = number_format( $max_price);
						$xtpl->assign('price', $min_price . 'đ' . ' - ' . $max_price .'đ');
					}
					else{
						$max_price = number_format( $max_price);
						$xtpl->assign('price', $max_price .'đ');
					}
					
					
					$xtpl->assign('min_price', $min_price);
					$xtpl->assign('max_price', $max_price);
					$xtpl->assign('product', $product);
					$xtpl->parse('main.view.list_product.products');
				}
				
				
				$xtpl->parse('main.view.list_product');
			}
			else{
				
				$xtpl->assign('no_list_product', 'Mã giảm giá được áp dụng cho tất cả sản phẩm');
			}
			
			$xtpl->assign('data', $data);
			$xtpl->parse('main.view');
			
		}
		
		else{
			
			$store_code = get_info_user_login($user_info['userid'])['store_code'];
			$xtpl->assign('SHOP_CODE', $store_code);
			
			$str_voucher_name = $data['voucher_name'];
			$xtpl->assign('STR_VOUCHER_NAME', mb_strlen($str_voucher_name));
			
			$xtpl->assign('SHOP_ID', $user_info['userid']);
			
			$voucher_code = (explode($store_code, $data['voucher_code']));
			
			$xtpl->assign('VOUCHER_CODE', $voucher_code[1]);
			
			
			$xtpl->assign('STR_VOUCHER_CODE', mb_strlen($voucher_code[1]));
			
			
			$time_from = date('d/m/Y', NV_CURRENTTIME);
			$xtpl->assign('TIME_FROM', $time_from);
	
			if(empty($data['discount_price'])){
				$row['discount_price'] = '';
				}else{
				$data['discount_price'] = number_format( $data['discount_price'] );
			}
			
			$data['minimum_price'] = number_format( $data['minimum_price'] .'đ');
			
			if(empty($data['usage_limit_quantity'])){
				$data['usage_limit_quantity'] = '';
				}else{
				$data['usage_limit_quantity'] = number_format( $data['usage_limit_quantity'] );
			}
			
			$xtpl->parse('main.add');
		}
			
		
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	
	
	function nv_theme_wishlist($data, $generate_page)
	{
		global $op, $global_config, $module_file,$module_name;
		
		$xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		
		if (!empty($generate_page)) {
			$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
			$xtpl->parse('main.generate_page');
		}
		
		if(!$data){
			$xtpl->parse('main.no_data');
			}else {
			foreach ($data as $product) {
				$product['alias']  = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . $product['alias']. '-' . $product['id'];
				$product['image']  =NV_BASE_SITEURL . NV_FILES_DIR . '/' .$module_name . '/'.  $block_config['module'] . $product['image'] ;
				
				$value_product['image']  ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $block_config['module']. '/' . $value_product['image'] ;
				$xtpl->assign('product', $product);
				
				$xtpl->parse('main.loop');
			}
		}
		
		$xtpl->parse('main');
		return $xtpl->text('main');
		
	}
	
	
	function email_new_order_payment($data_order, $data_pro,$info_order)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config;
		
		$xtpl = new XTemplate("email_new_order_payment.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $data_order);
		$info_order['total_product']=number_format($info_order['total_product']);
		$info_order['fee_transport']=number_format($info_order['fee_transport']);
		$info_order['total']=number_format($info_order['total']);
		$xtpl->assign('info_order', $info_order);
		$i=0;
		foreach ($data_pro as $pdata) {
			if($pdata['classify_value_product_id']>0){
				$classify_value_product_id=get_info_classify_value_product($pdata['classify_value_product_id']);
				$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
				$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
				if($classify_value_product_id['classify_id_value2']>0){
					$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
					$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
					$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
					}else{
					$name_group=$name_classify_id_value1;
				}
				$product_name = get_info_product($pdata['product_id'])['name_product'].' ('.$name_group.')';
				}else{
				$product_name = get_info_product($pdata['product_id'])['name_product'];
			}		
			$xtpl->assign('product_name', $product_name);
			$xtpl->assign('product_number', $pdata['num']);
			$xtpl->assign('product_price', number_format($pdata['price']));
			$xtpl->assign('product_total', number_format($pdata['price']*$pdata['num']));
			$xtpl->assign('pro_no', $i + 1);
			$bg = ($i % 2 == 0) ? " style=\"background:#f3f3f3;\"" : "";
			$xtpl->assign('bg', $bg);
			$xtpl->parse('main.data_product.loop');
			++$i;
		}
		$xtpl->parse('main.data_product');
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	function email_thong_bao_dang_ky_ban_hang($info)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config;
		
		$xtpl = new XTemplate("email_thong_bao_dang_ky_ban_hang.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $info);
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	function email_thong_bao_dang_ky_ban_hang_admin($info)
	{ 
		global $module_info, $lang_module, $module_file, $pro_config, $global_config, $money_config;
		
		$xtpl = new XTemplate("email_thong_bao_dang_ky_ban_hang_admin.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('DATA', $info);
		$xtpl->parse('main');
		return $xtpl->text('main');
	}
	
	function nv_theme_shops_list_order_customer($ngay_tu,$ngay_den,$status_ft,$sea_flast,$q){
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$db_config,$module_data,$user_info ;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
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
		$xtpl->assign('Q', $q);
		
		
		$xtpl->parse('main');
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_shops_list_order($ngay_tu,$ngay_den,$status_ft,$sea_flast,$q,$store_id,$warehouse_id,$customer_id2,$categories_id){
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$db_config,$module_data ;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
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
		$xtpl->assign('Q', $q);
		$xtpl->assign('warehouse_id', $warehouse_id);
		$xtpl->assign('store_id', $store_id);
		$xtpl->assign( 'categories_id', $categories_id );
		$xtpl->assign( 'customer_id_2', $customer_id2 );
		
		if($categories_id>0){
			if(get_info_category($categories_id)['parrent_id']==0){
				$categories_name='<span style="font-weight:bold">'.get_info_category($categories_id)['name'].'</span>';
				}else{
				$categories_name='<span>&emsp;'.get_info_category($categories_id)['name'].'</span>';
			}
			}else{
			$categories_name='<span style="font-weight:bold">Chọn tất cả</span>';
		}
		$xtpl->assign( 'categories_name', $categories_name );
		$list_warehouse=get_list_warehouse($store_id);
		foreach($list_warehouse as $value){
			$xtpl->assign( 'store_id_list', array(
			'key' => $value['id'],
			'title' => $value['name_warehouse'],
			'selected' => ( $value['id'] == $warehouse_id ) ? ' selected="selected"' : '' ) );
			$xtpl->parse( 'main.warehouse_id' );
		}
		if ( $ngay_tu > 0 )
		$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
		if ( $ngay_den > 0 )
		$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
		if(!empty($_SESSION[$module_data.'_status_view_order'])){
			$xtpl->assign('status_view_order', $_SESSION[$module_data.'_status_view_order']);
			}else{
			$xtpl->assign('status_view_order', 0);
		}
		if($warehouse_id>0){
			$xtpl->assign('warehouse_name', get_info_warehouse($warehouse_id)['name_warehouse']);
			}else{
			$xtpl->assign('warehouse_name', 'Chọn tất cả');
		}
		$xtpl->assign('store_id', $store_id);
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
		$list_status=get_full_order_status();
		foreach($list_status as $key=>$value){
			if(empty($_SESSION[$module_data.'_status_view_order'])){
				if($key==0){
					$xtpl->assign('active', 'active');
					}else{
					$xtpl->assign('active', '');
				}
				}else{
				if($key==$_SESSION[$module_data.'_status_view_order']){
					$xtpl->assign('active', 'active');
					}else{
					$xtpl->assign('active', '');
				}
			}
			$value['count_order'] = get_count_order( $value['status_id'], $store_id, $warehouse_id ,$ngay_tu,$ngay_den,$customer_id2,$categories_id,$q);
			$xtpl->assign('LOOP', $value);
			$xtpl->parse('main.status');
		}
		$list_customer = get_full_customer_of_shop();
		foreach ( $list_customer as $value2 ) {
			$xtpl->assign( 'customer_id', array(
			'key' => $value2['userid'],
			'title' => $value2['username'],
			'selected' => ( $value2['userid'] == $customer_id2 ) ? ' selected="selected"' : '' ) );
			$xtpl->parse( 'main.customer_id' );
		}
		$xtpl->parse('main');
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_order($array_data,$token_ahamove){
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$db_config ;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'token_ahamove', $token_ahamove );
		$total=0;
		
		foreach($array_data as $key_store => $store){
			$list_tranposter = get_full_transporters( $key_store );
			
			$info_store=get_info_store($key_store);
			$xtpl->assign( 'info_store', $info_store );
			$xtpl->assign('key_store', $key_store);
			foreach ($store as $key_warehouse => $warehouse) {
				$total_weight=0;
				$total_length=0;
				$total_width=0;
				$total_height=0;
				$total_warehouse=0;
				$info_warehouse = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $module_name . "_warehouse where id=".$key_warehouse)->fetch();
				$xtpl->assign('info_warehouse', $info_warehouse);
				$xtpl->assign('key_warehouse', $key_warehouse);
				$count_product_warehouse=0;
				foreach($warehouse as $key_product=>$value){
					if($value['status_check']==1){
						$count_product_warehouse=1;
						$xtpl->assign('key_store', $key_store);
						$xtpl->assign('key_product', $key_product);
						$list_product = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $module_name . "_product where id=".$value['product_id'])->fetch();
						$list_product['alias'] = NV_MY_DOMAIN .'/'. $module_name.'/'.$list_product['alias'].'-'.$value['product_id'].'/';
						if (!empty($list_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $list_product['image'])) {
							$list_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $list_product['image'];
							}else{
							$domain=explode('.', $_SERVER["SERVER_NAME"]);
							$server = $domain[1].'.'.$domain[2];
							$list_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $list_product['image'];
						}
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
							$list_product['name_product'] = $list_product['name_product'].' ('.$name_group.')';
						}
						$list_product['quantity'] = $value['num'];
						if($value['status_check']==1){
							$total=$total+$value['price']*$value['num'];
							$total_warehouse=$total_warehouse+$value['price']*$value['num'];
						}
						$list_product['price_format'] =  number_format($value['price']);
						$list_product['price'] =  $value['price'];
						$total_weight=$total_weight+$value['weight_product']*get_info_unit_weight($value['weight_unit'])['exchange']*$value['num'];
						$total_length=$total_length+$value['length_product']*get_info_unit_length($value['unit_length'])['exchange']*$value['num'];
						$total_width=$total_width+$value['width_product']*get_info_unit_length($value['unit_width'])['exchange']*$value['num'];
						$total_height=$total_height+$value['height_product']*get_info_unit_length($value['unit_height'])['exchange']*$value['num'];
						$list_product['total_input'] =  $value['price']*$value['num'];
						$list_product['total'] = number_format($value['price']*$value['num']);
						$xtpl->assign('LOOP_INFO_PRODUCT', $list_product);
						$xtpl->parse('main.store.warehouse.loop');
					}
				}
				if($count_product_warehouse==1){
					$xtpl->assign('total_weight', $total_weight);
					$xtpl->assign('total_width', $total_width);
					$xtpl->assign('total_length', $total_length);
					$xtpl->assign('total_height', $total_height);
					$xtpl->assign('total_warehouse', $total_warehouse);
					$xtpl->assign('total_weight_format', number_format($total_weight));
					$first_tranposter = 0;
					$list_tranposter_new=[];
					
					foreach ( $list_tranposter as $key => $value ) {
						
						if($value['max_weight'] >= $total_weight && $value['max_length'] >= $total_length && $value['max_width'] >= $total_width && $value['max_height'] >= $total_height){
							$list_tranposter_new[] = $value;
						}
					}
					if(count($list_tranposter_new)>0){
						foreach($list_tranposter_new as $key=>$value){
							if ( !empty( $value['image'] ) and is_file( NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/transporters/' . $value['image'] ) ) {
								$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/transporters/' . $value['image'];
								} else {
								$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/No-image-news.png';
							}
							$xtpl->assign( 'CARRIER', $value );
							if($key == 0){
								$xtpl->assign( 'check_carrier', 'checked' );
								$xtpl->assign( 'carrie_id_first', $value['id'] );
								$xtpl->parse( 'main.store.warehouse.transporters_loop_first' );
								$xtpl->parse( 'main.store.warehouse.transporters_loop_js_first' );
								}else{
								$xtpl->assign( 'check_carrier', '' );
							}
							$xtpl->parse( 'main.store.warehouse.transporters_loop' );
							$xtpl->parse( 'main.store.warehouse.transporters_loop_js' );
						}
						}else{
						$xtpl->parse( 'main.store.warehouse.notransporters_loop' );
					}
					$xtpl->parse( 'main.store.warehouse' );
					$xtpl->parse( 'main.storejs.warehousejs' );
					$xtpl->parse( 'main.storejsorder.warehousejs' );
				}
				
			}
			$xtpl->parse( 'main.store' );
			$xtpl->parse( 'main.storejs' );
			$xtpl->parse( 'main.storejsorder' );
		}
		$xtpl->assign( 'total', $total );
		$xtpl->assign( 'total_format', number_format($total).' VND');
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_cart($array_data){
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$db_config ;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'LINK_ORDER', nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=order', true ) );
		
		$count_cart=0;
		$total=0;
		$check_product=0;
		foreach($array_data as $key_store => $store){
			$info_store=get_info_store($key_store);
			$xtpl->assign( 'info_store', $info_store );
			$xtpl->assign('key_store', $key_store);
			$checked=0;
			foreach ($store as $key_warehouse => $warehouse) {
				$checked_warehouse=0;
				$info_warehouse = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $module_name . "_warehouse where id=".$key_warehouse)->fetch();
				$xtpl->assign('info_warehouse', $info_warehouse);
				$xtpl->assign('key_warehouse', $key_warehouse);
				foreach($warehouse as $key_product => $value){
					if($value['status_check']==1){
						$checked_warehouse=1;
						$xtpl->assign('status_check', 'checked');
						}else{
						$xtpl->assign('status_check', '');
					}
					$xtpl->assign('key_store', $key_store);
					$xtpl->assign('key_product', $key_product);
					$xtpl->assign('key_warehouse', $key_warehouse);
					$list_product = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $module_name . "_product where id=".$value['product_id'])->fetch();
					$list_product['alias'] = NV_MY_DOMAIN .'/'. $module_name.'/'.$list_product['alias'].'-'.$value['product_id'].'/';
					if (!empty($list_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $list_product['image'])) {
						$list_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $list_product['image'];
						}else{
						$domain=explode('.', $_SERVER["SERVER_NAME"]);
						$server = $domain[1].'.'.$domain[2];
						$list_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $list_product['image'];
					}
					$list_product['number_inventory_max']=get_info_invetory_group($value['product_id'],$key_warehouse,$value['classify_value_product_id'])['amount'];
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
						$list_product['name_product'] = $list_product['name_product'].' ('.$name_group.')';
					}
					$list_product['quantity'] = $value['num'];
					if($value['status_check']==1){
						$total=$total+$value['price']*$value['num'];
					}
					$list_product['price_format'] =  number_format($value['price']);
					$list_product['price'] =  $value['price'];
					$list_product['total_input'] =  $value['price']*$value['num'];
					$list_product['total'] = number_format($value['price']*$value['num']);
					$xtpl->assign('LOOP_INFO_PRODUCT', $list_product);
					$xtpl->parse('main.store.warehouse.loop');
				}
				if($checked_warehouse==1){
					$checked=1;
					$xtpl->assign('status_check_store_warhouse', 'checked');
					}else{
					$xtpl->assign('status_check_store_warhouse', '');
				}
				$xtpl->parse( 'main.store.warehouse' );
			}
			if($checked==1){
				$check_product=1;
				$xtpl->assign('status_check_store', 'checked');
				}else{
				$xtpl->assign('status_check_store', '');
			}
			$xtpl->parse( 'main.store' );
		}
		if($check_product==1){
			$xtpl->assign('status_check_store_all', 'checked');
			}else{
			$xtpl->assign('status_check_store_all', '');
		}
		$xtpl->assign( 'total', number_format($total));
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_list_warehouse( $sth, $per_page, $page, $num_items, $base_url, $ngay_tu, $ngay_den, $status_ft, $sea_flast, $show_view, $q ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $client_info;
		
		$xtpl = new XTemplate( 'warehouse.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'Q', $q );
		$xtpl->assign( 'warehouse_add', nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=sellermanagementadd', true ) );
		if ( $ngay_tu > 0 )
		$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
		if ( $ngay_den > 0 )
		$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
		
		if ( $show_view ) {
			$generate_page = nv_generate_page( $base_url, $num_items, $per_page, $page );
			if ( !empty( $generate_page ) ) {
				$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
				$xtpl->parse( 'main.view.generate_page' );
			}
			$number = $page > 1 ? ( $per_page * ( $page - 1 ) ) + 1 : 1;
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
			$status_filt = array();
			$status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
			$status_filt[] = array( 'id'=>0, 'text'=>'Ngưng Hoạt động' );
			$status_filt[] = array( 'id'=>1, 'text'=>'Hoạt động' );
			
			foreach ( $status_filt as $filt_stt ) {
				if ( $filt_stt['id'] == $status_ft ) {
					$filt_stt['selected'] = 'selected';
				}
				$xtpl->assign( 'status_filt', $filt_stt );
				$xtpl->parse( 'main.view.status_filt' );
			}
			while ( $view = $sth->fetch() ) {
				$view['stt'] = $number++;
				$view['user_add'] = get_info_user( $view['user_add'] )['username'];
				$view['time_add'] = date( 'd/m/Y H:i', $view['time_add'] );
				if ( empty( $view['user_edit'] ) ) {
					$view['user_edit'] = 'Chưa cập nhật';
					$view['time_edit'] = 'Chưa cập nhật';
					} else {
					$view['user_edit'] = get_info_user( $view['user_edit'] )['username'];
					$view['time_edit'] = date( 'd/m/Y H:i', $view['time_edit'] );
				}
				$xtpl->assign( 'CHECK', $view['status'] == 1 ? 'checked' : '' );
				
				
				$xtpl->assign( 'VIEW', $view );
				
				$xtpl->parse( 'main.view.loop' );
			}
			
			$xtpl->parse( 'main.view' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
		
	}
	
	function nv_theme_shops_list_product($per_page, $page, $num_items, $base_url, $ngay_tu, $ngay_den, $status_ft, $sea_flast, $show_view, $q, $catalogy) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $status, $db;
		
		$xtpl = new XTemplate( 'product.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'NV_LANG_INTERFACE', NV_LANG_INTERFACE );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'Q', $q );
		$xtpl->assign( 'num_items', $num_items );
		$xtpl->assign( 'product_add', nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=productadd', true ) );
		if(isset($_SESSION['status'])){
			$xtpl->assign( 'index_active', $_SESSION['status']);
		}else{
			$xtpl->assign( 'index_active', -2);
		}
		// print_r($_SESSION['page']);
		if(!empty($_SESSION['page'])){
			$xtpl->assign('page', $_SESSION['page']);
		}
		else{
			$xtpl->assign('page', 1);
		}
		if(!empty($_SESSION['q'])){
			$xtpl->assign('q', $_SESSION['q']);
		}
		if(!empty($_SESSION['sea_flast'])){
			$xtpl->assign('sea_flast', $_SESSION['sea_flast']);
		}
		if(!empty($_SESSION['categories_id'])){
			$xtpl->assign('categories_id', $_SESSION['categories_id']);
		}
		else{
			$xtpl->assign('categories_id', 0);
		}
		if(!empty($_SESSION['ngay_den'])){
			$xtpl->assign('ngay_den', $_SESSION['ngay_den']);
		}
		if(!empty($_SESSION['ngay_tu'])){
			$xtpl->assign('ngay_tu', $_SESSION['ngay_tu']);
		}
		if(!empty($_SESSION['status_ft'])){
			$xtpl->assign('status_ft', $_SESSION['status_ft']);
		}else{
			$xtpl->assign('status_ft', -1);
		}
		
		// print_r($_SESSION['status']);
		if ( $ngay_tu > 0 )
		$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
		if ( $ngay_den > 0 )
		$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
		
		if ( $show_view ) {
			$generate_page = nv_generate_page( $base_url, $num_items, $per_page, $page );
			if ( !empty( $generate_page ) ) {
				$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
				$xtpl->parse( 'main.view.generate_page' );
			}
			$number = $page > 1 ? ( $per_page * ( $page - 1 ) ) + 1 : 1;
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
			$status_filt = array();
			$status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
			$status_filt[] = array( 'id'=>0, 'text'=>'Ngưng Hoạt động' );
			$status_filt[] = array( 'id'=>1, 'text'=>'Hoạt động' );
			
			foreach ( $status_filt as $filt_stt ) {
				if ( $filt_stt['id'] == $status_ft ) {
					$filt_stt['selected'] = 'selected';
				}
				$xtpl->assign( 'status_filt', $filt_stt );
				$xtpl->parse( 'main.view.status_filt' );
			}
			
			$array_cat_list = category_html_select(0);
			foreach ($array_cat_list as $rows_i) {
				$xtpl->assign('pcatid_i', $rows_i['id']);
				$xtpl->assign('ptitle_i', $rows_i['text']);
				$xtpl->parse('main.view.parent_loop');
			}
			
			$xtpl->parse( 'main.view' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
		
	}
	//
	function nv_theme_shops_list_product2($per_page, $page, $num_items, $base_url, $ngay_tu, $ngay_den, $status_ft, $sea_flast, $show_view, $q, $catalogy) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $client_info, $db;
		
		$xtpl = new XTemplate( 'product1.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'NV_LANG_INTERFACE', NV_LANG_INTERFACE );
		$xtpl->assign( 'TEMPLATE', $module_info['template'] );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'Q', $q );
		$xtpl->assign( 'num_items', $num_items );
		$xtpl->assign( 'product_add', nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=productadd', true ) );
		if(isset($_SESSION['status'])){
			$xtpl->assign( 'index_active', $_SESSION['status']);
		}else{
			$xtpl->assign( 'index_active', -2);
		}
		
		if ( $ngay_tu > 0 )
		$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
		if ( $ngay_den > 0 )
		$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
		
		if ( $show_view ) {
			
			$number = $page > 1 ? ( $per_page * ( $page - 1 ) ) + 1 : 1;
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
			$status_filt = array();
			$status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
			$status_filt[] = array( 'id'=>0, 'text'=>'Ngưng Hoạt động' );
			$status_filt[] = array( 'id'=>1, 'text'=>'Hoạt động' );
			
			foreach ( $status_filt as $filt_stt ) {
				if ( $filt_stt['id'] == $status_ft ) {
					$filt_stt['selected'] = 'selected';
				}
				$xtpl->assign( 'status_filt', $filt_stt );
				$xtpl->parse( 'main.view.status_filt' );
			}
			
			$array_cat_list = category_html_select(0);
			foreach ($array_cat_list as $rows_i) {
				$xtpl->assign('pcatid_i', $rows_i['id']);
				$xtpl->assign('ptitle_i', $rows_i['text']);
				$xtpl->parse('main.view.parent_loop');
			}
			
			$xtpl->parse( 'main.view' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
		
	}
	//
	
	function nv_theme_shops_view_search( $array_data, $per_page, $page, $num_items, $base_url,$list_info_shop,$keyword_ajax,$sort1,$sort2,$sort3,$sort4,$num_product ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload,$db, $user_info;
		$xtpl = new XTemplate( 'main_search.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		$xtpl->assign( 'KEY_WORD', $keyword_ajax );
		
		$xtpl->assign( 'SORT1', $sort1 );
		$xtpl->assign( 'SORT2', $sort2 );
		$xtpl->assign( 'SORT3', $sort3 );
		$xtpl->assign( 'SORT4', $sort4 );
		$xtpl->assign( 'PAGE', $page );
		$xtpl->assign( 'PAGE1', ($page+1) );
		$xtpl->assign( 'PAGE2', ($page-1) );
		$number_page = round(($num_product/$per_page), 0, PHP_ROUND_HALF_UP);
		if(round(($num_product/$per_page), 0, PHP_ROUND_HALF_UP) == 0){
			$number_page = 1;
		}
		$xtpl->assign( 'NUM_PRODUCT', $number_page);
		$xtpl->assign( 'LINK_MORE_SHOP', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=viewlistshop');
		
		
		if($page==1){
			if($number_page==1){
				$xtpl->assign( 'DISABLE_PRE', 'disabled="true"' );
				$xtpl->assign( 'DISABLE_NEXT', 'disabled="true"' );
				}else{
				$xtpl->assign( 'DISABLE_PRE', 'disabled="true"' );
				$xtpl->assign( 'DISABLE_NEXT', '' );
			}
			
			}else if($page==$number_page){
			$xtpl->assign( 'DISABLE_NEXT', 'disabled="true"' );
			$xtpl->assign( 'DISABLE_PRE', '' );
			}else{
			$xtpl->assign( 'DISABLE_NEXT', '' );
			$xtpl->assign( 'DISABLE_PRE', '' );
		}
		
		
		
		//phantrangajax//
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		if($list_info_shop){
			
			foreach ($list_info_shop as $key => $value) {
				$value['follow'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE shop_id = ' . $value['id'])->fetchColumn();
				$value['time_add'] = date('d-m-Y', $info_shop['time_add']);
				$value['number_product'] = $db->query('SELECT count(*) FROM ' . TABLE . '_product WHERE store_id = ' .  $value['id'])->fetchColumn();
				$value['following'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE user_id = ' .  $value['userid'])->fetchColumn();
				
				if($value['avatar_image']){
					if (!empty($value['avatar_image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/image_shop/' . $value['avatar_image'])) {
						$view['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' . $value['avatar_image'];
						}else{
						$domain=explode('.', $_SERVER["SERVER_NAME"]);
						$server = $domain[1].'.'.$domain[2];
						$view['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' . $value['avatar_image'];
					}
					}else{
					$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
				}
				
				$value['alias'] = NV_MY_DOMAIN . '/' .  $module_name . '/' . $value['username'] . '/';
				$xtpl->assign( 'SHOP', $value );
				$xtpl->parse( 'main.shop.loop' );
			}
			$xtpl->parse( 'main.shop' );
		}
		if($keyword_ajax){
			$xtpl->parse( 'main.key_word_product' );
		}
		
		while( $value = $array_data -> fetch() ) {
			if (!empty($value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value['image'])) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
			}
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'-'.$value['id'].'/';
			if ( $value['showprice'] == 1 ) {
				if ( $value['price_min'] == $value['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.loop.one_price' );
					} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value['price_max'] ).'đ' );
					$xtpl->parse( 'main.loop.min_max_price' );
				}
				} else {
				$xtpl->parse( 'main.loop.none_price' );
			}
			$value['check_wishlist'] = 2;
			if($user_info['userid']){
				$value['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value['id']) -> fetchColumn();
			}
			
			$value['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value['id']) -> fetchColumn();
			if($value['check_wishlist'] == 0){
				$value['color_wishlist'] = "white_wishlist";
				}else if($value['check_wishlist']==1){
				$value['color_wishlist'] = "red_wishlist";
				}else{
				$value['color_wishlist'] = "white_wishlist";
			}
			$value['number_view'] = number_format( $value['number_view'] );
			$value['number_order'] = number_format( $value['number_order'] );
			$xtpl->assign( 'LOOP_PRODUCT', $value );
			$xtpl->parse( 'main.loop' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_retail_suggest_search( $array_data, $per_page, $page, $num_items, $base_url, $list_info_shop ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload,$db, $user_info;
		$xtpl = new XTemplate( 'suggest_search.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		
		//phantrangajax//
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		foreach ($list_info_shop as $key => $value) {
			
			if($value['avatar_image']){
				if (!empty( $value['avatar_image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' .  $value['avatar_image'])) {
					$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' .  $value['avatar_image'];
					}else{
					$domain=explode('.', $_SERVER["SERVER_NAME"]);
					$server = $domain[1].'.'.$domain[2];
					$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' .  $value['avatar_image'];
				}
				}else{
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
			}
			
			$value['alias'] = NV_MY_DOMAIN . '/' .  $module_name . '/' . $value['username'] . '/';
			$xtpl->assign( 'SHOP', $value );
			$xtpl->parse( 'main.shop' );
		}
		
		while( $value = $array_data -> fetch() ) {
			if (!empty($value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value['image'])) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
			}
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'-'.$value['id'].'/';
			if ( $value['showprice'] == 1 ) {
				if ( $value['price_min'] == $value['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.loop.one_price' );
					} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value['price_max'] ).'đ' );
					$xtpl->parse( 'main.loop.min_max_price' );
				}
				} else {
				$xtpl->parse( 'main.loop.none_price' );
			}
			$value['check_wishlist'] = 2;
			if($user_info['userid']){
				$value['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value['id']) -> fetchColumn();
			}
			
			$value['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value['id']) -> fetchColumn();
			if($value['check_wishlist'] == 0){
				$value['color_wishlist'] = "white_wishlist";
				}else if($value['check_wishlist']==1){
				$value['color_wishlist'] = "red_wishlist";
				}else{
				$value['color_wishlist'] = "white_wishlist";
			}
			$value['number_view'] = number_format( $value['number_view'] );
			$value['number_order'] = number_format( $value['number_order'] );
			$xtpl->assign( 'LOOP_PRODUCT', $value );
			$xtpl->parse( 'main.loop' );
		}
		
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_retail_sort_product_in_view_cat( $array_data, $per_page, $page, $num_items, $base_url,$category_id,$shop_id,$sort_price ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'main_list_sort_product_in_view_cat.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		$xtpl->assign( 'CATEGORY_ID', $category_id );
		$xtpl->assign( 'SHOPID', $shop_id );
		
		if($sort_price==1){
			$selected1 = 'selected';
			$selected2 = '';
			}else{
			$selected2 = 'selected';
			$selected1 = '';
		}
		$xtpl->assign( 'SELECTED1', $selected1);
		$xtpl->assign( 'SELECTED2', $selected2);
		
		//phantrangajax//
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
			
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function shops_info_list_products( $array_data, $per_page, $page, $num_items, $base_url,$category_id,$shop_id,$sort_price ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'shops_info_list_products.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		$xtpl->assign( 'CATEGORY_ID', $category_id );
		$xtpl->assign( 'SHOPID', $shop_id );
		
		if($sort_price==1){
			$selected1 = 'selected';
			$selected2 = '';
			}else{
			$selected2 = 'selected';
			$selected1 = '';
		}
		$xtpl->assign( 'SELECTED1', $selected1);
		$xtpl->assign( 'SELECTED2', $selected2);
		
		//phantrangajax//
		
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'load_product_shop_category' );
		if ( !empty( $generate_page ) ) {
			
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
			
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	
	function nv_theme_retail_product_phan_trang_in_shop( $array_data, $per_page, $page, $num_items, $base_url,$category_id,$shop_id,$sort_price ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'main_list_product_inshop_phan_trang.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		$xtpl->assign( 'CATEGORY_ID', $category_id );
		$xtpl->assign( 'SHOPID', $shop_id );
		
		if($sort_price==1){
			$selected1 = 'selected';
			$selected2 = '';
			}else{
			$selected2 = 'selected';
			$selected1 = '';
		}
		$xtpl->assign( 'SELECTED1', $selected1);
		$xtpl->assign( 'SELECTED2', $selected2);
		
		//phantrangajax//
		
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'load_product_shop_category' );
		if ( !empty( $generate_page ) ) {
			
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
			
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_shops_main_list_product( $array_data, $per_page, $page, $num_items, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'main_list_product.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		
		//phantrangajax//
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
			
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	/**
		* nv_theme_shops_main()
		*
		* @param mixed $array_data
		* @return
	*/
	
	function shops_info( $list_category,$shop_id, $info_shop, $list_group_shop,$total_product)
	{
		
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$user_info;
		$xtpl = new XTemplate('shops_info.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'shop_id', $shop_id );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'TOTAL_PRODUCT', $total_product );
		
		if($info_shop){
			$shop_id = $info_shop['userid'];
			if($user_info['userid']){
				$rate_info = $db->query("SELECT count(*) FROM " .TABLE."_follow WHERE user_id =".$user_info['userid']." AND shop_id = " . $info_shop['id']) -> fetch();
			}
			
			$check_follow = 2;
			if($user_info['userid']){
				$check_follow = $db->query("SELECT count(*) FROM " .TABLE."_follow WHERE user_id =".$user_info['userid']." AND shop_id = " . $info_shop['id']) -> fetchColumn();
			}
			
			if($check_follow == 1){
				$follow = "Bỏ theo dõi";
				$value_follow = 1;
				}else if($check_follow == 0){
				$follow = "Theo dõi shop";
				$value_follow = 0;
				}else{
				$follow = "Theo dõi shop";
				$value_follow = 2;
			}
			$xtpl->assign( 'FOLLOW', $follow);
			$xtpl->assign( 'CHECK', $value_follow);
			
			$info_shop['image_banner'] = explode(',', $info_shop['image_banner']);
			foreach ($info_shop['image_banner'] as $key => $value) {
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value ='https://'. $server. $value;
				$xtpl->assign( 'IMG_BANNER', $value);
				$xtpl->parse( 'main.info_shop.image_banner' );
			}
			$xtpl->assign( 'VIEW', $info_shop);
			$xtpl->parse( 'main.info_shop' );
		}
		
		foreach ($list_group_shop as $key => $value) {
			
			if(count($value['list_product'])!=0){
				
				$value['alias'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name .'/'.$value['alias'];
				if($value['list_product']){
					foreach ($value['list_product'] as $key => $value_product) {
						
						$value_product['number_view'] = number_format( $value_product['number_view'] );
						$value_product['number_order']=number_format($value_product['number_order']);
						$value_product['check_wishlist'] = 2;
						if($user_info['userid']){
							$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
						}
						
						$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
						if($value_product['check_wishlist'] == 0){
							$value_product['color_wishlist'] = "white_wishlist";
							}else if($value_product['check_wishlist']==1){
							$value_product['color_wishlist'] = "red_wishlist";
							}else{
							$value_product['color_wishlist'] = "white_wishlist";
						}
						if ( $value_product['showprice'] == 1 ) {
							if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
								if($value_product['price_min']==0 &&$value_product['price_max']==0){
									if ( $value_product['price'] == $value_product['price_special'] ) {
										$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
										$xtpl->parse( 'main.category.product.one_price' );
										} else {
										if($value_product['price_special']>0){
											$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
											$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.min_max_price' );
											}else{
											$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.one_price' );
										}
									}
								}
								}else{
								if ( $value_product['price_min'] == $value_product['price_max'] ) {
									$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->parse( 'main.category.product.one_price' );
									} else {
									$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
									$xtpl->parse( 'main.category.product.min_max_price' );
								}
							}
							} else {
							$xtpl->parse( 'main.category.product.none_price' );
						}
						
						$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
						
						if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
							$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
							}else{
							$domain=explode('.', $_SERVER["SERVER_NAME"]);
							$server = $domain[1].'.'.$domain[2];
							$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
						}
						$xtpl->assign( 'LOOP_PRODUCT', $value_product);
						$xtpl->parse( 'main.category.product' );
					}
				}
				
				$xtpl->assign( 'LOOP_CAT', $value );
				$xtpl->parse( 'main.category' );
			}	
		}
		$xtpl->assign('SHOP_ID', $shop_id);
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	
	function nv_theme_view_category_shop( $list_category,$shop_id)
	{
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$user_info;
		$xtpl = new XTemplate('list_category_shop.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'shop_id', $shop_id );
		$xtpl->assign( 'GLANG', $lang_global );
		if($list_category){
			$i = 0;
			foreach ($list_category as $key => $value) {
				$cout_product = $db->query('SELECT count(*) FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_categories t2 ON t1.categories_id = t2.id WHERE t1.store_id = ' . $shop_id . ' AND (t1.categories_id = ' . $value['id'] . ' OR t2.parrent_id = ' . $value['id'] . ')')->fetchColumn();
				
				if($cout_product>0){
					$xtpl->assign( 'CATEGORY', $value );
					$xtpl->parse( 'main.category' );
					$i++;
				}
				if($i==1){
					$xtpl->assign( 'DATA', $value );
					$xtpl->parse( 'main.load_first' );
					$i++;
				}
				
			}
			
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	/**
		* nv_theme_shops_main()
		*
		* @param mixed $array_data
		* @return
	*/
	
	function nv_theme_shops_main( $list_category )
	{
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$user_info;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		foreach ($list_category as $key => $value) {
			
			if(count($value['list_product'])!=0){
				$value['alias'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name .'/'.$value['alias'];
				if($value['list_product']){
					foreach ($value['list_product'] as $key => $value_product) {
						$value_product['number_view'] = number_format( $value_product['number_view'] );
						$value_product['number_order']=number_format($value_product['number_order']);
						$value_product['check_wishlist'] = 2;
						if($user_info['userid']){
							$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
						}
						
						$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
						if($value_product['check_wishlist'] == 0){
							$value_product['color_wishlist'] = "white_wishlist";
							}else if($value_product['check_wishlist']==1){
							$value_product['color_wishlist'] = "red_wishlist";
							}else{
							$value_product['color_wishlist'] = "white_wishlist";
						}
						if ( $value_product['showprice'] == 1 ) {
							if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
								if($value_product['price_min']==0 &&$value_product['price_max']==0){
									if ( $value_product['price'] == $value_product['price_special'] ) {
										$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
										$xtpl->parse( 'main.category.product.one_price' );
										} else {
										if($value_product['price_special']>0){
											$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
											$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.min_max_price' );
											}else{
											$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.one_price' );
										}
									}
								}
								}else{
								if ( $value_product['price_min'] == $value_product['price_max'] ) {
									$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->parse( 'main.category.product.one_price' );
									} else {
									$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
									$xtpl->parse( 'main.category.product.min_max_price' );
								}
							}
							} else {
							$xtpl->parse( 'main.category.product.none_price' );
						}
						$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
						
						if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
							$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
							}else{
							$domain=explode('.', $_SERVER["SERVER_NAME"]);
							$server = $domain[1].'.'.$domain[2];
							$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
						}
						$xtpl->assign( 'LOOP_PRODUCT', $value_product);
						$xtpl->parse( 'main.category.product' );
					}
				}
				$xtpl->assign( 'LOOP_CAT', $value );
				$xtpl->parse( 'main.category' );
			}	
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_retail_brand( $list_category )
	{
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name,$db,$user_info;
		
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		foreach ($list_category as $key => $value) {
			$value['alias'] = 'brand-' . $value['id'];
			$value['count_product'] = count($value['list_product']);
			if(count($value['list_product'])!=0){
				$value['alias'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name .'/'.$value['alias'];
				if($value['list_product']){
					foreach ($value['list_product'] as $key => $value_product) {
						$value_product['number_view'] = number_format( $value_product['number_view'] );
						$value_product['number_order']=number_format($value_product['number_order']);
						$value_product['check_wishlist'] = 2;
						if($user_info['userid']){
							$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
						}
						
						$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
						if($value_product['check_wishlist'] == 0){
							$value_product['color_wishlist'] = "white_wishlist";
							}else if($value_product['check_wishlist']==1){
							$value_product['color_wishlist'] = "red_wishlist";
							}else{
							$value_product['color_wishlist'] = "white_wishlist";
						}
						if ( $value_product['showprice'] == 1 ) {
							if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
								if($value_product['price_min']==0 &&$value_product['price_max']==0){
									if ( $value_product['price'] == $value_product['price_special'] ) {
										$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
										$xtpl->parse( 'main.category.product.one_price' );
										} else {
										if($value_product['price_special']>0){
											$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
											$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.min_max_price' );
											}else{
											$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
											$xtpl->parse( 'main.category.product.one_price' );
										}
									}
								}
								}else{
								if ( $value_product['price_min'] == $value_product['price_max'] ) {
									$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->parse( 'main.category.product.one_price' );
									} else {
									$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
									$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
									$xtpl->parse( 'main.category.product.min_max_price' );
								}
							}
							} else {
							$xtpl->parse( 'main.category.product.none_price' );
						}
						$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
						
						if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
							$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
							}else{
							$domain=explode('.', $_SERVER["SERVER_NAME"]);
							$server = $domain[1].'.'.$domain[2];
							$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
						}
						$xtpl->assign( 'LOOP_PRODUCT', $value_product);
						$xtpl->parse( 'main.category.product' );
					}
				}
				$xtpl->assign( 'LOOP_CAT', $value );
				$xtpl->parse( 'main.category' );
			}	
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_retail_brand_list( $array_data, $per_page, $page, $num_items, $base_url, $info_brand ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'view-brand-list.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		$xtpl->assign( 'INFO_BRAND', $info_brand );
		//phantrangajax//
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		//phantrangajax//
		
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
			
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_viewcat_ajax_main_shop( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload;
		
		$xtpl = new XTemplate( 'viewcat_ajax_main_shop.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'list_product_'.$cat_info['id'] );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'generate_page', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		
		while( $value = $array_data -> fetch() ) {
			if (!empty($value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value['image'])) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
			}
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'-'.$value['id'].'/';
			
			if ( $value['showprice'] == 1 ) {
				if ( $value['price_min'] == $value['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.loop.one_price' );
					} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value['price_max'] ).'đ' );
					$xtpl->parse( 'main.loop.min_max_price' );
				}
				} else {
				$xtpl->parse( 'main.loop.none_price' );
			}
			$value['number_view'] = number_format( $value['number_view'] );
			$value['number_order']=number_format($value['number_order']);
			$xtpl->assign( 'LOOP_PRODUCT', $value );
			$xtpl->parse( 'main.loop' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_viewcat_ajax_main( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		
		$xtpl = new XTemplate( 'viewcat_ajax_main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'list_product_'.$cat_info['id'] );
		if ( !empty( $generate_page ) ) {
			$xtpl->parse( 'main.generate_page' );
		}
		
		while( $value = $array_data -> fetch() ) {
			if (!empty($value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value['image'])) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
			}
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'-'.$value['id'].'/';
			
			if ( $value['showprice'] == 1 ) {
				if ( $value['price_min'] == $value['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.loop.one_price' );
					} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value['price_max'] ).'đ' );
					$xtpl->parse( 'main.loop.min_max_price' );
				}
				} else {
				$xtpl->parse( 'main.loop.none_price' );
			}
			
			$value['number_view'] = number_format( $value['number_view'] );
			$value['number_order']=number_format($value['number_order']);
			$value['check_wishlist'] = 2;
			if($user_info['userid']){
				$value['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value['id']) -> fetchColumn();
			}
			
			if($value['check_wishlist'] == 0){
				$value['color_wishlist'] = "white_wishlist";
				}else if($value['check_wishlist']==1){
				$value['color_wishlist'] = "red_wishlist";
				}else{
				$value['color_wishlist'] = "white_wishlist";
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value );
			$xtpl->parse( 'main.loop' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_shops_viewcat_ajax_type_product( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload;
		
		$xtpl = new XTemplate( 'viewcat_ajax_type_product.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		
		while( $value = $array_data -> fetch() ) {
			if (!empty($value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value['image'])) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['image'];
			}
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'-'.$value['id'].'/';
			if ( $value['showprice'] == 1 ) {
				if ( $value['price_min'] == $value['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.loop.one_price' );
					} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value['price_max'] ).'đ' );
					$xtpl->parse( 'main.loop.min_max_price' );
				}
				} else {
				$xtpl->parse( 'main.loop.none_price' );
			}
			$value['number_view'] = number_format( $value['number_view'] );
			$value['number_order'] = number_format( $value['number_order'] );
			$xtpl->assign( 'LOOP_PRODUCT', $value );
			$xtpl->parse( 'main.loop' );
		}
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_shops_viewcat_type_product( $array_data, $per_page, $page, $num_items, $cat_info, $base_url, $list_category_parrent ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		
		$xtpl = new XTemplate( 'viewcattype_product.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		if($cat_info['other_image']){
			$cat_info['other_image'] = explode('|', $cat_info['other_image']);
			foreach ($cat_info['other_image'] as $key => $value) {
				$xtpl->assign( 'DATA_IMG', $value);
				$xtpl->parse( 'main.other_image_category' );
			}
			
		}
		$xtpl->assign( 'LOOP_CAT_LIST', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		foreach ( $list_category_parrent as $value ) {
			$count_product_cat = count_product_cat( $value['id'] );
			if ( $count_product_cat>0 ) {
				$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'/';
				$value['count_product'] = count_product_cat( $value['id'] );
				$xtpl->assign( 'LOOP_CAT', $value );
				$xtpl->parse( 'main.category_parrent' );
			}
		}
		$list_child = $db->query('SELECT * FROM ' . TABLE . '_categories WHERE parrent_id = ' . $cat_info['id'] . ' AND status =1')->fetchAll();
		
		if($cat_info['brand']){
			$cat_info['brand'] = explode('|', $cat_info['brand']);
			
			foreach ($cat_info['brand'] as $key => $value) {
				
				$info_brand = $db->query('SELECT * FROM ' . TABLE . '_brand WHERE id = ' . $value . ' AND status =1')->fetch();
				$info_brand['logo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $info_brand['logo'];
				$xtpl->assign('BRAND', $info_brand);
				$xtpl->parse('main.brand');
			}
		}
		
		
		
		foreach ($list_child as $value) {
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'/';
			$xtpl->assign( 'CHILD', $value );
			$xtpl->parse( 'main.category_child' );
		}
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_wish_list( $array_data, $per_page, $page, $num_items, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		
		$xtpl = new XTemplate( 'wishlist.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		
		$generate_page = nv_generate_page_wishlist( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		
		while( $value_product = $array_data -> fetch() ) {
			
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_retail_load_comment($list_rate,$page_new,$per_page,$base_url,$num_items,$page) {
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name, $db, $user_info, $db, $db_config,$db, $user_info;
		
		$xtpl = new XTemplate( 'load_comment.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'load_comment' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		$total_star = 0; 
		foreach ($list_rate as $key => $value) {
			$value['info_user'] = $db->query("SELECT * FROM " .$db_config['prefix']."_users WHERE userid = " . $value['userid']) -> fetch();
			$total_star = $value['star'] + $total_star;
			if($value['info_user']['photo']){
				$value['info_user']['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['info_user']['photo'];
				}else{
				$value['info_user']['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
			}
			if($value['other_image']){
				$value['other_image'] = explode('|', $value['other_image']);
				foreach ($value['other_image'] as $key => $value_image) {
					if (!empty($value_image) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_image)) {
						$value_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image;
						}else{
						$domain=explode('.', $_SERVER["SERVER_NAME"]);
						$server = $domain[1].'.'.$domain[2];
						$value_image ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image;
					}
					$xtpl->assign( 'INFO_RATE_IMAGE', $value_image);
					$xtpl->parse( 'main.info_rate_content.image' );
				}
				}else{
				$xtpl->parse( 'main.info_rate_content.no_image' );
			}
			
			$value['time_add'] = date('d/m/Y - H:i:s',$value['time_add']);
			$xtpl->assign( 'INFO_RATE_CONTENT', $value);
			$xtpl->parse( 'main.info_rate_content' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_view_list_shop( $array_data, $per_page, $page, $num_items, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		
		$xtpl = new XTemplate( 'view_list_shop.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$xtpl->assign( 'count_product', $num_items );
		
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		while( $value_product = $array_data -> fetch() ) {
			$value_product['follow'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE shop_id = ' . $value_product['id'])->fetchColumn();
			$value_product['time_add'] = date('d-m-Y', $value_product['time_add']);
			$value_product['number_product'] = $db->query('SELECT count(*) FROM ' . TABLE . '_product WHERE store_id = ' .  $value_product['id'])->fetchColumn();
			$value_product['following'] = $db->query('SELECT count(*) FROM ' . TABLE . '_follow WHERE user_id = ' .  $value_product['userid'])->fetchColumn();
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['username'], true );
			if($value_product['avatar_image']){
				if (!empty($value_product['avatar_image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/image_shop/' . $value_product['avatar_image'])) {
					$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' . $value_product['avatar_image'];
					}else{
					$domain=explode('.', $_SERVER["SERVER_NAME"]);
					$server = $domain[1].'.'.$domain[2];
					$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/image_shop/' . $value_product['avatar_image'];
				}
				}else{
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
			}
			
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function nv_theme_shops_viewcat_grid( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		$xtpl = new XTemplate( 'viewcatgrid.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias_no_link'] = $cat_info['alias'];
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		
		$other_image=explode('|',$cat_info['other_image']);
		if( !empty( $other_image ) )
		{
			$op_tmp = array();
			foreach( $other_image as $key=>$value )
			{
				$op_tmp = explode( ';', $value );
				$data_option_product = array(
				'id' => $key,
				'title' => $op_tmp[0],
				'link' => $op_tmp[1],
				'img' => $op_tmp[2]
				);
				$xtpl->assign( 'TMS', $data_option_product );
				$xtpl->parse( 'main.other_image_category.loop' );
			}
			$xtpl->parse( 'main.other_image_category' );
		}
		
		
		
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$list_child = $db->query('SELECT * FROM ' . TABLE . '_categories WHERE parrent_id = ' . $cat_info['id'] . ' AND status =1')->fetchAll();
		
		if($cat_info['brand']){
			$cat_info['brand'] = explode('|', $cat_info['brand']);
			
			foreach ($cat_info['brand'] as $key => $value) {
				
				$info_brand = $db->query('SELECT * FROM ' . TABLE . '_brand WHERE id = ' . $value . ' AND status =1')->fetch();
				$info_brand['logo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $info_brand['logo'];
				$xtpl->assign('BRAND', $info_brand);
				$xtpl->parse('main.brand');
			}
		}
		
		
		
		foreach ($list_child as $value) {
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'/';
			$xtpl->assign( 'CHILD', $value );
			$xtpl->parse( 'main.category_child' );
		}
		
		$xtpl->assign( 'count_product', $num_items );
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	function shops_info_viewcat( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db, $user_info;
		
		$xtpl = new XTemplate( 'shops_info_viewcat.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		while( $value_product = $array_data -> fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	function nv_theme_shops_viewcat_list( $array_data, $per_page, $page, $num_items, $cat_info, $base_url ) {
		global $module_info, $lang_module, $lang_global, $op, $module_name, $module_upload, $db,$user_info;
		
		$xtpl = new XTemplate( 'viewcatlist.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'GLANG', $lang_global );
		$cat_info['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$cat_info['alias'].'/';
		
		if($cat_info['other_image']){
			$cat_info['other_image'] = explode('|', $cat_info['other_image']);
			foreach ($cat_info['other_image'] as $key => $value) {
				$xtpl->assign( 'DATA_IMG', $value);
				$xtpl->parse( 'main.other_image_category' );
			}
			
		}
		$xtpl->assign( 'LOOP_CAT', $cat_info );
		$xtpl->assign( 'count_product', $num_items );
		if ( $num_items == 0 ) {
			$xtpl->parse( 'main.no_product' );
		}
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'ProductContent' );
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		$list_child = $db->query('SELECT * FROM ' . TABLE . '_categories WHERE parrent_id = ' . $cat_info['id'] . ' AND status =1')->fetchAll();
		
		if($cat_info['brand']){
			$cat_info['brand'] = explode('|', $cat_info['brand']);
			
			foreach ($cat_info['brand'] as $key => $value) {
				$info_brand = $db->query('SELECT * FROM ' . TABLE . '_brand WHERE id = ' . $value . ' AND status =1')->fetch();
				$info_brand['logo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $info_brand['logo'];
				$xtpl->assign('BRAND', $info_brand);
				$xtpl->parse('main.brand');
			}
		}
		
		
		
		foreach ($list_child as $value) {
			$value['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$value['alias'].'/';
			$xtpl->assign( 'CHILD', $value );
			$xtpl->parse( 'main.category_child' );
		}
		while( $value_product = $array_data->fetch() ) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
	
	/**
		* nv_theme_shops_detail()
		*
		* @param mixed $array_data
		* @return
	*/
	
	function nv_theme_shops_detail( $array_data, $token_ahamove, $store_id ,$list_product_category,$list_product_store, $list_product_view, $list_rate,$page_new,$per_page,$base_url,$num_items,$page)
	{
		global $module_info, $lang_module, $lang_global, $op, $module_upload, $module_name, $db, $user_info, $db, $db_config,$db, $user_info;
		$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
		
		//Lấy thông tin đánh giá
		
		$rate['number_rate'] = $db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id']) -> fetchColumn();
		if($rate['number_rate']!=0){
			$rate['percent_rate1'] = round((($db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' AND star = 1') -> fetchColumn())/$rate['number_rate'])*100,2);
			$rate['percent_rate2'] = round((($db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' AND star = 2') -> fetchColumn())/$rate['number_rate'])*100,2);
			$rate['percent_rate3'] = round((($db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' AND star = 3') -> fetchColumn())/$rate['number_rate'])*100,2);
			$rate['percent_rate4'] = round((($db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' AND star = 4') -> fetchColumn())/$rate['number_rate'])*100,2);
			$rate['percent_rate5'] = round((($db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' AND star = 5') -> fetchColumn())/$rate['number_rate'])*100,2);
			}else{
			$rate['percent_rate1'] = $rate['percent_rate2'] = $rate['percent_rate3'] = $rate['percent_rate4'] = $rate['percent_rate5'] = 0;
		}
		
		
		$generate_page = nv_generate_page_viewcat( $base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'load_comment' );
		
		if ( !empty( $generate_page ) ) {
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.generate_page' );
		}
		$total_star = 0; 
		foreach ($list_rate as $key => $value) {
			$value['info_user'] = $db->query("SELECT * FROM " .$db_config['prefix']."_users WHERE userid = " . $value['userid']) -> fetch();
			$total_star = $value['star'] + $total_star;
			if($value['info_user']['photo']){
				$value['info_user']['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value['info_user']['photo'];
				}else{
				$value['info_user']['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
			}
			if($value['other_image']){
				$value['other_image'] = explode('|', $value['other_image']);
				foreach ($value['other_image'] as $key => $value_image) {
					if (!empty($value_image) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_image)) {
						$value_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image;
						}else{
						$domain=explode('.', $_SERVER["SERVER_NAME"]);
						$server = $domain[1].'.'.$domain[2];
						$value_image ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image;
					}
					$xtpl->assign( 'INFO_RATE_IMAGE', $value_image);
					$xtpl->parse( 'main.info_rate_content.image' );
				}
				}else{
				$xtpl->parse( 'main.info_rate_content.no_image' );
			}
			
			$value['time_add'] = date('d/m/Y - H:i:s',$value['time_add']);
			$xtpl->assign( 'INFO_RATE_CONTENT', $value);
			$xtpl->parse( 'main.info_rate_content' );
		}
		
		if($list_rate){
			$rate['rate'] = round($total_star/(count($list_rate)),1);
			}else{
			$rate['rate'] = 0;
		}
		
		
		for ($i=5; $i >= 1 ; $i--) { 
			if($rate['rate']==$i){
				$checked = 'checked';
				$html = '<input type="radio" id="star' . $i . '" name="rating" value="' .$i. '"' . $checked . '/>
				<label class = "full" for="star' . $i . '" title="Awesome - ' . $i . ' stars"></label>';
				
				}else{
				$khoang_conlai=$rate['rate']-$i;
				$k=$i+0.5;
				if($khoang_conlai==0.5){
					
					$html = '<input type="radio" id="star' . $i . 'half" name="rating" value="' .$i. ' and a half" checked />
					<label class="half" for="star' . $i . 'half" title="Pretty good - ' . $k . ' stars"></label><input type="radio" id="star' . $i . '" name="rating" value="' .$i. '"/>
					<label class = "full" for="star' . $i . '" title="Awesome - ' . $i . ' stars"></label>';
					}else{
					if($khoang_conlai>0){
						if($khoang_conlai<0.5){
							$html = '<input type="radio" id="star' . $i . '" name="rating" value="' .$i. '" checked />
							<label class = "full" for="star' . $i . '" title="Awesome - ' . $i . ' stars"></label>';
							
							}else{
							$html = '<input type="radio" id="star' . $i . '" name="rating" value="' . $i. '" />
							<label class = "full" for="star' .  $i . '" title="Awesome - ' .  $i . ' stars"></label>';
						}
						}else{
						if($i==1){
							if($khoang_conlai>=-0.5){
								$html = ' <input type="radio" id="starhalf" name="rating" value="half" checked />
								<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
								}else{
								$html = '<input type="radio" id="star' . $i . '" name="rating" value="' .$i. '"/>
								<label class = "full" for="star' . $i . '" title="Awesome - ' . $i . ' stars"></label>';
							}
							}else{
							if($khoang_conlai>=-0.5){
								$html = '<input type="radio" id="star' . $i . '" name="rating" value="' . $i. '" checked/>
								<label class = "full" for="star' .  $i . '" title="Awesome - ' .  $i . ' stars"></label>';
								}else{
								$html = '<input type="radio" id="star' . $i . '" name="rating" value="' .$i. '"/>
								<label class = "full" for="star' . $i . '" title="Awesome - ' . $i . ' stars"></label>';
							}
						}
					}
				}
			}
			$xtpl->assign( 'HTML', $html);
			$xtpl->assign( 'STAR_GENERAL_ID', $i);
			$xtpl->parse( 'main.rate_general' );
		}
		
		
		$xtpl->assign('RATE', $rate);
		
		$xtpl->assign( 'PRODUCT_ID', $array_data['id'] );
		$xtpl->assign( 'token_ahamove', $token_ahamove );
		$array_data['number_order']=number_format($array_data['number_order']);
		$info_store=get_info_store($array_data['store_id']);
		$info_store['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.get_info_user($info_store['userid'])['username'].'/';
		$xtpl->assign( 'info_store', $info_store );
		$xtpl->assign( 'TEMPLATE', $module_info['template'] );
		$xtpl->assign( 'LINK_CART', NV_BASE_SITEURL.$module_name.'/cart/' );
		if (!empty($array_data['image'] ) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $array_data['image'] )) {
			$array_data['image']  = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $array_data['image'] ;
			}else{
			$domain=explode('.', $_SERVER["SERVER_NAME"]);
			$server = $domain[1].'.'.$domain[2];
			$array_data['image']  ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $array_data['image'] ;
		}
		$array_data['info_categories'] = get_info_category( $array_data['categories_id'] );
		$array_data['info_categories']['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$array_data['info_categories']['alias'];
		if ( $array_data['info_categories']['parrent_id'] == 0 ) {
			$xtpl->assign( 'ROW', $array_data );
			$xtpl->parse( 'main.none_parrent_id' );
			} else {
			$array_data['info_categories']['info_parrent'] = get_info_category( $array_data['info_categories']['parrent_id'] );
			$array_data['info_categories']['info_parrent']['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$array_data['info_categories']['info_parrent']['alias'];
			$xtpl->assign( 'ROW', $array_data );
			$xtpl->parse( 'main.parrent_id' );
		}
		$array_data['name_unit_weight'] = get_info_unit_weight( $array_data['unit_weight'] )['symbol'];
		$array_data['weight_product_gram'] = $array_data['weight_product']*get_info_unit_weight( $array_data['unit_weight'] )['exchange'];
		$array_data['length_product'] = $array_data['length_product']*get_info_unit_length( $array_data['unit_length'] )['exchange'];
		$array_data['width_product'] = $array_data['width_product']*get_info_unit_length( $array_data['unit_width'] )['exchange'];
		$array_data['height_product'] = $array_data['height_product']*get_info_unit_length( $array_data['unit_height'] )['exchange'];
		$data_array=array();
		$data_array1=array();
		$wishlist['check_wishlist'] = 2;
		if($user_info['userid']){
			$wishlist['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $array_data['id']) -> fetchColumn();
		}
		
		$wishlist['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $array_data['id']) -> fetchColumn();
		if($wishlist['check_wishlist'] == 0){
			$wishlist['color_wishlist'] = "white_wishlist";
			}else if($wishlist['check_wishlist']==1){
			$wishlist['color_wishlist'] = "red_wishlist";
			}else{
			$wishlist['color_wishlist'] = "white_wishlist";
		}
		$xtpl->assign('WISHLIST', $wishlist);
		foreach($array_data['classify'] as $key_classify=>$value){
			$xtpl->assign( 'LOOP_CLASSIFY', $value );
			$xtpl->assign( 'key', $key_classify+1 );
			foreach($value['list_classify_value'] as $key=>$classify_value){
				if($key_classify==0){
					$data_array[]=$classify_value['id'];
					$check_class1=get_info_classify_value_product_classify_id_value1($classify_value['id']);
					}else{
					$data_array1[]=$classify_value['id'];
					$check_class1=get_info_classify_value_product_classify_id_value2($classify_value['id']);
				}
				$xtpl->assign( 'LOOP_CLASSIFY_VALUE', $classify_value );
				$xtpl->parse( 'main.classify.classify_value' );
			}
			$xtpl->parse( 'main.classify' );
		}
		$data_array_full_product=array();
		foreach($data_array as $value){
			if(count($data_array1)>0){
				foreach($data_array1 as $value1){
					$data_array_full_product[]=array(
					'classify_id_value1'=>$value,
					'classify_id_value2'=>$value1
					);
				}
				}else{
				$data_array_full_product[]=array(
				'classify_id_value1'=>$value,
				'classify_id_value2'=>0
				);
			}
		}
		$list_warehouse = get_warehouse_store( $array_data['store_id'] );
		$list_tranposter = get_full_transporters( $array_data['store_id'] );
		
		foreach ( $list_warehouse as $key => $value ) {
			if($key==0){
				$warehouse_id_first=$value['id'];
			}
			$xtpl->assign( 'warehouse_id', array(
			'key' => $value['id'],
			'title' => $value['name_warehouse'] ) );
			$xtpl->parse( 'main.buy.warehouse_id' );
			$xtpl->parse( 'main.buy_no.warehouse_id' );
		}
		
		foreach ( $list_tranposter as $key => $value ) {
			if ( !empty( $value['image'] ) and is_file( NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/transporters/' . $value['image'] ) ) {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/transporters/' . $value['image'];
				} else {
				$value['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/No-image-news.png';
			}
			$xtpl->assign( 'CARRIER', $value );
			$xtpl->assign( 'ROW', $array_data );
			$xtpl->parse( 'main.buy.transporters_loop' );
			$xtpl->parse( 'main.buy_no.transporters_loop' );
			
			$xtpl->parse( 'main.transporters_loop_js' );
		}
		
		if($array_data['showprice']==1){
			foreach($data_array_full_product as $key=>$value){
				$info_product=get_info_classify_value_product_classify_id_value1_classify_id_value2($value['classify_id_value1'],$value['classify_id_value2']);
				
				$info_product['price_format']=number_format($info_product['price']);
				$info_product['price_special_format']=number_format($info_product['price_special']);
				$xtpl->assign( 'data_array_full_product', $value );
				$xtpl->assign( 'INFO_PRODUCT', $info_product );
				if($info_product['status']==1){
					if($info_product['price_special']==0){
						$value['price_product']=$info_product['price'];
						$xtpl->parse( 'main.product.next.no_discount' );
						}else{
						$value['price_product']=$info_product['price_special'];
						$xtpl->parse( 'main.product.next.discount' );
					}
					$xtpl->parse( 'main.product.next' );
					}else{
					$xtpl->parse( 'main.product.no_next' );
				}
				$xtpl->assign( 'data_array_full_product', $value );
				$xtpl->parse( 'main.product' );
				$xtpl->parse( 'main.productjs' );
			}
			}else{
			$xtpl->parse( 'main.no_product' );
		}
		
		$stt_group = 0;
		
		if ( $store_id != $array_data['store_id'] ) {
			if ( $array_data['showprice'] == 1 ) {
				if(count($array_data['classify'])>0){
					$xtpl->assign( 'check_cart_tonkho', 'hidden' );
					$xtpl->parse( 'main.buy' );
					}else{
					$amount=get_info_invetory_no($array_data['id'],$warehouse_id_first)[0]['amount'];
					if ( !empty( $_SESSION[$module_name . '_cart'][$array_data['store_id']][$warehouse_id_first] ) ) {
						
						foreach ( $_SESSION[$module_name . '_cart'][$array_data['store_id']][$warehouse_id_first] as $value_session_cart ) {
							if ( $value_session_cart['product_id'] == $array_data['id'] && $value_session_cart['classify_value_product_id'] == 0 ) {
								$amount = $amount - $value_session_cart['num'];
							}
						}
					}
					$name_warehouse_first=get_info_warehouse($warehouse_id_first)['name_warehouse'];
					$xtpl->assign( 'name_warehouse_first', $name_warehouse_first);
					if($amount==0){
						$xtpl->assign( 'check_cart_tonkho', 'hidden' );
						}else{
						$xtpl->assign( 'check_cart_tonkho', '' );
					}
					$xtpl->assign( 'amount', number_format($amount) );
					$xtpl->parse( 'main.buy_no' );
				}
			}
			} else {
			$xtpl->parse( 'main.exsit_store' );
		}
		$array_data['other_image'] = explode( ',', $array_data['other_image'] );
		foreach ( $array_data['other_image'] as $value_image ) {
			if (!empty($value_image ) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_image)) {
				$value_image  = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image ;
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_image  ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_image ;
			}
			$xtpl->assign( 'ROW_OTHER_IMAGE', $value_image );
			$xtpl->parse( 'main.other_image' );
		}
		if(count($array_data['classify'])==0){
			$array_data['price_format'] =number_format($array_data['price']);
			if($array_data['price_special']==0){
				$xtpl->assign( 'ROW', $array_data );
				$xtpl->parse( 'main.price_noclassify.no_discount' );
				}else{
				$array_data['price_special_format'] =number_format($array_data['price_special']);
				$array_data['price']=$array_data['price_special'];
				$xtpl->assign( 'ROW', $array_data );
				$xtpl->parse( 'main.price_noclassify.discount' );
			}
			$xtpl->assign( 'ROW', $array_data );
			$xtpl->parse( 'main.price_noclassify' );
			}else{
			$array_data['price_min'] =number_format($array_data['price_min']);
			$array_data['price_max'] =number_format($array_data['price_max']);
			$xtpl->assign( 'ROW', $array_data );
			$xtpl->parse( 'main.price_classify' );
			
		}
		$xtpl->assign( 'ROW', $array_data );
		
		foreach ($list_product_category as $key => $value_product) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product_catgory.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_catgory.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_catgory.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product_catgory.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product_catgory.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product_catgory.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product_catgory' );
		}
		
		foreach ($list_product_store as $key => $value_product) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product_store.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_store.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_store.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product_store.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product_store.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product_store.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product_store' );
		}
		
		foreach ($list_product_view as $key => $value_product) {
			$value_product['number_view'] = number_format( $value_product['number_view'] );
			$value_product['number_order']=number_format($value_product['number_order']);
			$value_product['check_wishlist'] = 2;
			if($user_info['userid']){
				$value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
			}
			
			$value_product['like_number'] = $db->query("SELECT count(*) FROM " .TABLE."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
			if($value_product['check_wishlist'] == 0){
				$value_product['color_wishlist'] = "white_wishlist";
				}else if($value_product['check_wishlist']==1){
				$value_product['color_wishlist'] = "red_wishlist";
				}else{
				$value_product['color_wishlist'] = "white_wishlist";
			}
			if ( $value_product['showprice'] == 1 ) {
				if( $value_product['price_min'] == 0 &&  $value_product['price_max'] ==0){
					if($value_product['price_min']==0 &&$value_product['price_max']==0){
						if ( $value_product['price'] == $value_product['price_special'] ) {
							$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
							$xtpl->parse( 'main.product_view.one_price' );
							} else {
							if($value_product['price_special']>0){
								$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
								$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_view.min_max_price' );
								}else{
								$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
								$xtpl->parse( 'main.product_view.one_price' );
							}
						}
					}
					}else{
					if ( $value_product['price_min'] == $value_product['price_max'] ) {
						$xtpl->assign( 'PRICE', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->parse( 'main.product_view.one_price' );
						} else {
						$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
						$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
						$xtpl->parse( 'main.product_view.min_max_price' );
					}
				}
				} else {
				$xtpl->parse( 'main.product_view.none_price' );
			}
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value_product['image'])) {
				$value_product['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$value_product['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $value_product['image'];
			}
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			$xtpl->parse( 'main.product_view' );
		}
		
		
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
