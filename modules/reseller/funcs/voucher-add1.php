<?php
	
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
	$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
	$row = array();
	$error = array();
	$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
	
	if($mod == 'get_list_product'){
		$where = '';
		$q = $nv_Request->get_title( 'q', 'post,get', '' );
		$categories = $nv_Request->get_int( 'categories', 'post,get', 0 );
		$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=get_list_product';
		
		if ($q) {
			$where .= ' AND (name_product LIKE "%" "'.$q. '" "%" OR barcode LIKE "%" "'.$q. '" "%")';
			$base_url .= '&q=' . $q;
			
		}
		// if($categories){
		// $where .= ' AND categories_id = ' . $categories ;
		// $base_url .= '&categories=' . $categories;
		// }
		
		if($categories)
		{
			$cat_all_lev = get_parent_category($categories);
			$where .= ' AND categories_id IN('. implode(',', $cat_all_lev) .')';
			$base_url .= '&catalogy_child=' . $categories;
		}
		
		
		
		$per_page = 5;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product')
		->where(' status = 1 AND store_id = ' . $store_id . $where);
		
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		$num_items = $sth->fetchColumn();
		
		$db->select('id, image, price_special, price,name_product')
		->order('time_add DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		
		$xtpl = new XTemplate('voucher_list_product_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
			$view['number'] = 1;
			
			if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
				$view['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $view['image'];
				}else{
				$domain=explode('.', $_SERVER["SERVER_NAME"]);
				$server = $domain[1].'.'.$domain[2];
				$view['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $view['image'];
			}
			// lấy số lượng tồn kho
			//print_r('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE  product_id ='. $view['id']);
			
			$view['warehouse'] = $db->query('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $view['id'])->fetchColumn();
			$view['warehouse'] =  number_format($view['warehouse']);
			$xtpl->assign( 'warehouse', $view['warehouse']);
			
			$show_price = '';
			if($view['price_special']){
				$show_price = 'price_special';
				}else{
				$show_price = 'price';
			}
			// lấy số giá max min
			
			$count_product = $db->query('SELECT COUNT(id) FROM ' . TABLE .'_product_classify_value_product WHERE  product_id ='. $view['id'])->fetchColumn();		
			
			$min_price = $db->query('SELECT MIN(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $view['id'])->fetchColumn();
			
			
			$max_price = $db->query('SELECT MAX(price) FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $view['id'])->fetchColumn();
			
			
			if($count_product > 1 && $min_price != $max_price){
				$min_price = number_format( $min_price .'đ');
				$max_price = number_format( $max_price .'đ');
				$xtpl->assign('price', $min_price . ' - ' . $max_price);
			}
			else{
				$max_price = number_format( $max_price .'đ');
				$xtpl->assign('price', $max_price);
			}
			
			$view['number'] = $number++;
			$xtpl->assign('VIEW', $view);
			$xtpl->parse('main.loop');
		}
		
		$xtpl->parse('main');
		$contents = $xtpl->text('main');
		print_r($contents);die;
	}
	
	// popup
	if( $nv_Request->isset_request( 'popup_list_product_add', 'get' ) )
	{
		$xtpl = new XTemplate('popup_voucher_list_product.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
		//$xtpl->assign('VIEW', $view);
		
		$array_catalogy = get_categories_select2('', 0, 0);
		foreach($array_catalogy as $catalogy_item)
		{		
			if ( $catalogy_item['id'] == $catalogy ) {
				$catalogy_item['selected'] = 'selected';
			}
			$xtpl->assign( 'catalogy', $catalogy_item );				
			// lấy tất cả con 
			$list_sub = get_categories_select2('', 0, $catalogy_item['id']);
			foreach($list_sub as $sub)
			{
				if ( $sub['id'] == $catalogy ) {
					$sub['selected'] = 'selected';
				}
				$xtpl->assign( 'sub', $sub );
				$xtpl->parse( 'main.catalogy.sub' );
			}		
			$xtpl->parse( 'main.catalogy' );
		}
		
		$xtpl->parse('main');
		$contents = $xtpl->text('main');
		
		print_r($contents);die;
	}
	
	
	if($row['id'])
	{
		$data = $db->query('SELECT * FROM ' . TABLE . '_voucher_shop WHERE id=' . $row['id'] . ' AND status = 1  AND store_id = ' . $store_id )->fetch();
	}
	
	if ($mod == 'add_voucher1') {
		
		$row['voucher_name'] = $nv_Request->get_title('voucher_name', 'get', '');
		$row['voucher_code'] = $nv_Request->get_title('voucher_code', 'get', '');
		$row['seller_code'] = $nv_Request->get_title('seller_code', 'get', '');
		$row['voucher_code_full'] = $row['seller_code'] . $row['voucher_code'];
		if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('time_from', 'get'), $m))     {
			$_hour = 0;
			$_min = 0;
			$row['time_from'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
		}
		else
		{
			$row['time_from'] = 0;
		}
		if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('time_to', 'get'), $m))     {
			$_hour = 23;
			$_min = 59;
			$row['time_to'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
		}
		else
		{
			$row['time_to'] = 0;
		}
		$row['discount_price'] = $nv_Request->get_title('discount_price', 'get', 0);
		$row['discount_price']=str_replace(',','',$row['discount_price']);
		$row['minimum_price'] = $nv_Request->get_title('minimum_price', 'get', 0);
		$row['minimum_price']=str_replace(',','',$row['minimum_price']);
		
		$row['maximum_discount'] = $nv_Request->get_title('maximum_discount', 'get', 0);
		$row['maximum_discount']=str_replace(',','',$row['maximum_discount']);
		
		$row['type_discount'] = $nv_Request->get_int('type_discount', 'get', 0);
		
		$row['usage_limit_quantity'] = $nv_Request->get_title('usage_limit_quantity', 'get', 0);
		$row['usage_limit_quantity']=str_replace(',','',$row['usage_limit_quantity']);
		
		$row['arr_product'] = $nv_Request->get_array( 'arr_product', 'get,post', '0' ) ;
		$row['arr_product'] = implode(',', $row['arr_product']);
		$row['list_product'] = $nv_Request->get_int('list_product', 'get', 0);
		$row['discount_percent'] = $nv_Request->get_int('discount_percent', 'get', 0);
		
		//check dữ liệu đầu vào
		if(empty($row['voucher_name'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập tên chương trình'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['voucher_code'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập mã voucher'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['seller_code'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập shop code'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['time_from'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập ngày bắt đầu'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['time_to'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập ngày kết thúc'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['minimum_price'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập đơn tối thiểu'];
			print_r(json_encode($json[0]));die();
			}elseif(empty($row['usage_limit_quantity'])){
			$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập số lần sử dụng'];
			print_r(json_encode($json[0]));die();
		}
		
		//format number
		$num1 = $row['minimum_price'];
		$num2 = $row['discount_price'];
		$num3 = $row['maximum_discount'];
		$num4 = $row['usage_limit_quantity'];
		$row['minimum_price']= (float)$num1;
		$row['discount_price']= (float)$num2;
		$row['maximum_discount']= (float)$num3;
		$row['usage_limit_quantity']= (int)$num4;
		//giảm giá
		
		//print_r($config_setting[voucher_maximum_percent]);die;
		
		if($row['type_discount']){
			if(empty($row['discount_percent']))
			{
				$json[] = ['status'=>'ERROR_percent', 'mess'=>'Chưa nhập % giảm giá'];
				print_r(json_encode($json[0]));die();
			}
			else
			{
				if($row['discount_percent'] > $config_setting[voucher_maximum_percent]) 
				{
					$json[] = ['status'=>'ERROR_percent', 'mess'=>'Giá giảm không được lớn hơn ' . $config_setting[voucher_maximum_percent] .'%'];
					print_r(json_encode($json[0]));die();
				}
				else
				{
					$row['discount_price'] = $row['discount_percent'];
				}
			}
		}
		else
		{
			if(!$row['discount_price']){
				$json[] = ['status'=>'ERROR', 'mess'=>'Chưa nhập giá giảm'];
				print_r(json_encode($json[0]));die();
			}
			elseif($row['discount_price'] < 1000)
			{
				$json[] = ['status'=>'ERROR', 'mess'=>'Giá giảm không được dưới 1000đ'];
				print_r(json_encode($json[0]));die();
			}
		}
		
		
		//check rules
		
		if(mb_strlen($row['voucher_name']) > 100){
			$json[] = ['status'=>'ERROR', 'mess'=>'Tên chương trình vượt giới hạn ký tự'];
			}elseif(mb_strlen($row['voucher_code']) > 5){
			$json[] = ['status'=>'ERROR', 'mess'=>'Mã voucher vượt giới hạn ký tự'];
		}
		
		elseif($row['minimum_price'] < 1000){
			$json[] = ['status'=>'ERROR', 'mess'=>'Đơn tối thiểu không được dưới 1000đ'];
		}
		elseif($row['usage_limit_quantity'] < 1){
			$json[] = ['status'=>'ERROR', 'mess'=>'Số lần sử dụng không được dưới 1'];
		}
		
		
		//check ngày
		if ($row['time_from'] > $row['time_to']) {
			$json[] = ['status'=>'ERROR', 'mess'=>'Ngày từ không được lớn hơn ngày đến'];
			print_r(json_encode($json[0]));die();
		}
		
		
		
		// check voucher có phải của shop không
		check_voucher($row['id']);
		// thêm && sửa
		if(!$row['id']){
			
			// check mã voucher trùng
			$check_voucher = $db->query('SELECT id FROM ' . TABLE . '_voucher_shop WHERE voucher_code = ' . $db->quote($row['voucher_code_full']))->fetchColumn();
			
			if($check_voucher){
				$json[] = ['status'=>'ERROR', 'mess'=>'Mã voucher đã tồn tại'];
				print_r(json_encode($json[0]));die();
			}
			$row['time_add'] = NV_CURRENTTIME;
			$sql = 'INSERT INTO ' . TABLE . '_voucher_shop ( store_id, voucher_name, voucher_code, time_from, time_to, type_discount, discount_price, maximum_discount, minimum_price, usage_limit_quantity,  list_product, time_add, status) VALUES (:store_id, :voucher_name, :voucher_code, :time_from, :time_to, :type_discount, :discount_price, :maximum_discount, :minimum_price, :usage_limit_quantity, :list_product, :time_add, :status)';
			
			
			$data_insert = array();
			$data_insert['store_id'] = $store_id;
			$data_insert['time_add'] = $row['time_add'];
			$data_insert['status'] = 1;
			$data_insert['voucher_name'] = $row['voucher_name'];
			$data_insert['voucher_code'] = $row['voucher_code_full'];
			$data_insert['time_from'] = $row['time_from'];
			$data_insert['time_to'] = $row['time_to'];
			$data_insert['type_discount'] = $row['type_discount'];
			$data_insert['discount_price'] = $row['discount_price'];
			$data_insert['maximum_discount'] = $row['maximum_discount'];
			$data_insert['minimum_price'] = $row['minimum_price'];
			$data_insert['usage_limit_quantity'] = $row['usage_limit_quantity'];
			$data_insert['list_product'] = $row['arr_product'];
			$id = $db->insert_id($sql, 'store_id', $data_insert);
			
			if($id){
				$json[] = ['status'=>'OK', 'mess'=>'Thêm Voucher thành công'];
				print_r(json_encode($json[0]));die();
				}else{
				$json[] = ['status'=>'ERROR', 'mess'=>'Thêm Voucher thất bại!'];
				print_r(json_encode($json[0]));die();
			}
			
			
			
			// }else{
			
			// $stmt = $db->prepare('UPDATE ' . TABLE . '_voucher SET  voucher_name = :voucher_name, voucher_code = :voucher_code, time_from = :time_from, time_to = :time_to, discount_price = :discount_price, minimum_price = :minimum_price, usage_limit_quantity = :usage_limit_quantity WHERE id=' . $row['id'] . ' AND userid = ' . $row['userid']);
			// $stmt->bindParam(':voucher_name', $row['voucher_name'], PDO::PARAM_STR);
			// $stmt->bindParam(':voucher_code', $row['voucher_code_full'], PDO::PARAM_STR);
			// $stmt->bindParam(':time_from', $row['time_from'], PDO::PARAM_INT);
			// $stmt->bindParam(':time_to', $row['time_to'], PDO::PARAM_INT);
			// $stmt->bindParam(':discount_price', $row['discount_price'], PDO::PARAM_INT);
			// $stmt->bindParam(':minimum_price', $row['minimum_price'], PDO::PARAM_INT);
			// $stmt->bindParam(':usage_limit_quantity', $row['usage_limit_quantity'], PDO::PARAM_INT);
			// $exc = $stmt->execute();
			// if ($exc) {
			// $json[] = ['status'=>'OK', 'mess'=>'Sửa chỉnh Voucher thành công'];
			// print_r(json_encode($json[0]));die();
			// }
			// }
			
		}
	}
	$contents = nv_theme_voucher_add1($data);
	
	$page_title = 'Thêm Voucher';
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';			