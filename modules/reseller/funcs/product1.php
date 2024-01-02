<?php
	
	/**
		* @Project NUKEVIET 4.x
		* @Author VINADES.,JSC <contact@vinades.vn>
		* @Copyright (C) 2020 VINADES.,JSC. All rights reserved
		* @License GNU/GPL version 2 or any later version
		* @Createdate Thu, 24 Dec 2020 01:27:14 GMT
	*/
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
	// unset($_SESSION['status']);
	$mod = $nv_Request->get_string('mod', 'post, get', 0);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
	$where = '';
	
	
	if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$id = $nv_Request->get_int('delete_id', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        	
			if(check_product($id))
			{
				$db->query('UPDATE ' . TABLE . '_product SET status = 0, inhome = 0 WHERE store_id ='. $store_id .' AND id=' . intval($id));
				
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Product', 'ID: ' . $id, $user_info['userid']);
				
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
			
		}
	}
	
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=tab_product_status';
	$where1 = '';
	$status = $nv_Request->get_int( 'status', 'post,get', -2 );
	$q = $nv_Request->get_title( 'q', 'post,get' );
	$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
	$categories_id = $nv_Request->get_int( 'categories_id', 'post,get',0);
	$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
	$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
	$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
	
	
	
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
			$where1 .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
			$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
		} else if ( $ngay_tu > 0 )
		{
			$where .= ' AND time_add >= '. $ngay_tu;
			$where1 .= ' AND time_add >= '. $ngay_tu;
			$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
		} else if ( $ngay_den > 0 )
		{
			$where .= ' AND time_add <= '. $ngay_den;
			$where1 .= ' AND time_add <= '. $ngay_den;
			$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
		}
		
	}
	if ( $status_ft>-1 ) {
		$where .= ' AND inhome ='.$status_ft;
		$where1 .= ' AND inhome ='.$status_ft;
		$base_url .= '&status_search=' . $status_ft;
	}
	
	if ( !empty( $q ) ) {
		$where .= ' AND (name_product LIKE "%'.$q.'%" OR barcode LIKE "%'.$q.'%")';
		$where1 .= ' AND (name_product LIKE "%'.$q.'%" OR barcode LIKE "%'.$q.'%")';
		$base_url .= '&q=' . $q;
	}
	if($categories_id)
	{
		$cat_all_lev = get_parent_category($categories_id);
		$where .= ' AND categories_id IN('. implode(',', $cat_all_lev) .')';
		$base_url .= '&catalogy_child=' . $categories_id;
	}
	
	$where .= ' AND store_id ='.$store_id;
	
	if( $mod == 'tab_product_status' )
	{
		$_SESSION['status'] = $status;
		
		if($status == -2){
			
			$where .= ' AND t1.status = 1 ';
			$where1 .= ' AND t2.status = 1';
			$base_url .= '&status=-2';
		}
		elseif($status == 0 ){
			
			$where .= ' AND t1.status = 1 AND inhome = 0';
			$where1 .= ' AND t2.status = 1 AND inhome = 0 ';
			$base_url .= '&status=0';
		}
		elseif($status == 1 ){
			
			$where .= ' AND t1.status = ' . $status . ' AND inhome = 1';
			$where1 .= ' AND t2.status = 1 AND inhome = 1';
			$base_url .= '&status=1';
		}
		elseif($status == 2 ){
			
			$where .= ' AND t1.status = 2' ;
			$where1 .= ' AND t2.status = 2';
			$base_url .= '&status=2';
		}
		elseif($status == 3 ){
			
			$where .= ' AND t1.status = 1 AND sl_tonkho <= 0';
			$where1 .= ' AND t2.status = 1 AND inhome = 0 AND t1.sum_tonkho = 0';
			$base_url .= '&status=2';
		}
		
		$per_page = 20;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
		->select('COUNT(t1.product_id)')
		->from('(select product_id, sum(sl_tonkho) as sum_tonkho from ' . TABLE .'_product_classify_value_product GROUP BY product_id) as t1 INNER JOIN ' . TABLE . '_product as t2 ON t1.product_id = t2.id')
		->where('t2.store_id = ' . $store_id . $where1);
		
		$sth = $db->prepare($db->sql());		
		$sth->execute();
		
		$num_items = $sth->fetchColumn();
		
		
		$sql=$db->query('SELECT * from '. TABLE .'_product order by time_add DESC limit '.$per_page. ' offset '.($page - 1) * $per_page);
		
		
		$xtpl = new XTemplate('product_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
		$xtpl->assign( 'num_items', $num_items );
		
		$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'tab_product');
		if (!empty($generate_page)) {
			$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
			$xtpl->parse('main.generate_page');
		}
		$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
		
		
		$data = $db->query('SELECT t1.*, SUM(t2.sl_tonkho) as sl_tonkho FROM '. TABLE . '_product t1 INNER JOIN '. TABLE .'_product_classify_value_product t2 ON t1.id = t2.product_id WHERE t1.store_id = '. $store_id . $where . ' GROUP BY t2.product_id order by t1.time_add DESC limit '.$per_page. ' offset '.($page - 1) * $per_page)->fetchAll();
		
		if(!empty($data))
		{
			foreach ( $data as $view ) {
				
				$view['stt'] = $number++;
				
				$xtpl->assign( 'VIEW', $view );
				
				$view['alias'] =  nv_url_rewrite($_SERVER["chonhagiau"] . NV_BASE_SITEURL .  $view['alias'] . '-' . $view['id'] . '/',true);
				$view['categories_id'] = get_info_category( $view['categories_id'] )['name'];
				if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
					$view['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $view['image'];
					}else{
					$domain=explode('.', $_SERVER["SERVER_NAME"]);
					$server = $domain[1].'.'.$domain[2];
					$view['image'] ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload. '/' . $view['image'];
				}
				$xtpl->assign( 'CHECK', $view['inhome'] == 1 ? 'checked' : '' );
				
				$xtpl->assign( 'CHECK_FREESHIP', $view['free_ship'] == 1 ? 'checked' : '' );
				
				$xtpl->assign( 'disabled_input', $view['inhome'] == -1 ? 'disabled=disabled' : '' );
				$xtpl->assign( 'tooltip_db', $view['inhome'] == -1 ? 'Sản phẩm hiện tại bị tắt hiển thị do vi phạm quy định của sàn.' : '' );
				
				$xtpl->assign( 'disabled', $view['inhome'] >= 0 ? '' : 'disabled' );
				
				
				$view['link_import_warehouse'] = nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=productimportwarehouse&amp;id=' . $view['id'], true );
				$view['link_edit'] = nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=productadd&id=' . $view['id'], true );
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5( $view['id'] . NV_CACHE_PREFIX . $client_info['session_id'] );
				$xtpl->assign( 'VIEW', $view );
				
				// lấy thông tin thuộc tính sản phẩm	
				
				// lấy số lượng tồn kho
				$view['warehouse'] = $db->query('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE product_id ='. $view['id'])->fetchColumn();
				
				$view['warehouse'] =  number_format($view['warehouse']);
				$xtpl->assign( 'warehouse', $view['warehouse']);
				$view['price'] =  number_format($view['price']);
				$xtpl->assign( 'price', $view['price']);
				$view['price_special'] =  number_format($view['price_special']);
				$xtpl->assign( 'price_special', $view['price_special']);
				$xtpl->assign( 'id', $view['id']);
				
				$list_classify = $db->query('SELECT * FROM ' . TABLE .'_product_classify WHERE product_id ='. $view['id'])->fetchAll();
				
				if($list_classify)
				{
					$array_tam = array();
					$array_classify = array();
					$array_class_value = array();
					foreach($list_classify as $classify)
					{
						$array_classify[$classify['id']] = $classify;
						// lấy danh sách thuộc tính
						$list_classify_value = $db->query('SELECT * FROM ' . TABLE .'_product_classify_value WHERE classify_id ='. $classify['id'])->fetchAll();	
						
						foreach($list_classify_value as $value)
						{
							$array_tam[$value['id']] = $value;
							$array_class_value[] = $value['id'];
						}
						
						// lấy danh sách 
					}
					
					// lấy danh sách sản phẩm có giá thuộc tính
					$where = '';
					if(!empty($array_class_value))
					{
						$where = '( classify_id_value1 IN('. implode(',',$array_class_value ).') OR classify_id_value2 IN('. implode(',',$array_class_value ).'))';
					}
					
					$list_product_price = array();
					if(!empty($where))
					{
						$list_product_price = $db->query('SELECT * FROM ' . TABLE .'_product_classify_value_product WHERE ' . $where)->fetchAll();
					}
					
					if($list_product_price)
					{
						foreach($list_product_price as $product_classic)
						{
							$product_classic['price'] =  number_format($product_classic['price']);
							
							if(!$product_classic['price_special'])
							$product_classic['price_special'] = '';
							else
							$product_classic['price_special'] =  number_format($product_classic['price_special']);
							
							$product_classic['sl_tonkho'] =  number_format($product_classic['sl_tonkho']);
							
							$product_classic['name_classify'] = $array_classify[$array_tam[$product_classic['classify_id_value1']]['classify_id']]['name_classify'];
							
							$product_classic['name'] = $array_tam[$product_classic['classify_id_value1']]['name'] ;
							
							$product_classic['ten_rutgon'] = $product_classic['name_classify'] . ' ' . $product_classic['name'];
							
							if($product_classic['classify_id_value2'])
							{
								$product_classic['name_classify2'] = $array_classify[$array_tam[$product_classic['classify_id_value2']]['classify_id']]['name_classify'];
								
								$product_classic['name2'] = $array_tam[$product_classic['classify_id_value2']]['name'] ;
								
								$product_classic['ten_rutgon'] = $product_classic['ten_rutgon'] . ' - ' .$product_classic['name_classify2'] . ' ' . $product_classic['name2'];
							}
							
							
							$xtpl->assign( 'classfic', $product_classic );
							$xtpl->parse( 'main.loop.classify.classify_loop' );
						}
						
						$xtpl->parse( 'main.loop.classify' );
					}
					
				}
				else
				{					
					$xtpl->parse( 'main.loop.no_classify' );
				}
				
				$xtpl->parse( 'main.loop' );
			}	
		}
		else
		{
			$xtpl->assign( 'no_product', ' Không tìm thấy sản phẩm! ');
		}
		
		$xtpl->parse('main');
		$contents = $xtpl->text('main');
		
		print_r($contents);die;
	}
	 // Sửa sản phẩm ngoài site
	if($mod == 'edit_product')
	{
		
		$classify_id_arr = $nv_Request->get_array( 'classify_id', 'post,get','');
		$product_price_arr = $nv_Request->get_array( 'product_price', 'post,get','');
		$price_special_product_arr = $nv_Request->get_array( 'price_special_product', 'post,get','');
		$quantily_product_arr = $nv_Request->get_array( 'quantily_product', 'post,get','');
		
		
		foreach (array_combine($classify_id_arr, $product_price_arr) as $id_product => $price_product) {
			
			$price_product = str_replace( ',', '', $price_product );
	
			$db->query($db->query('UPDATE '. TABLE . '_product t1 INNER JOIN ' . TABLE .'_product_classify_value_product t2 ON t1.id = t2.product_id SET t2.price = ' . $price_product . ' WHERE t2.id = ' . $id_product. ' AND t1.store_id = '.$store_id));
		}
		
		foreach (array_combine($classify_id_arr, $price_special_product_arr) as $id_product => $price_special_product) {
			
			$price_special_product = str_replace( ',', '', $price_special_product );
	
			$db->query($db->query('UPDATE '. TABLE . '_product t1 INNER JOIN ' . TABLE .'_product_classify_value_product t2 ON t1.id = t2.product_id SET t2.price_special = ' . $price_special_product . ' WHERE t2.id = ' . $id_product. ' AND t1.store_id = '.$store_id));
		}
		foreach (array_combine($classify_id_arr, $quantily_product_arr) as $id_product => $quantily_product) {
			
			$quantily_product = str_replace( ',', '', $quantily_product );
	
			$db->query($db->query('UPDATE '. TABLE . '_product t1 INNER JOIN ' . TABLE .'_product_classify_value_product t2 ON t1.id = t2.product_id SET t2.sl_tonkho = ' . $quantily_product . ' WHERE t2.id = ' . $id_product. ' AND t1.store_id = '.$store_id));
		}
		
	}
	
	if($mod == 'edit_product1')
	{
		
		$price_product1 = $nv_Request->get_title( 'price_product1', 'post,get','');
		$price_special_product1 = $nv_Request->get_title( 'price_special_product1', 'post,get','');
		$product_id1 = $nv_Request->get_title( 'product_id1', 'post,get','');
		$quantily_product1 = $nv_Request->get_title( 'quantily_product1', 'post,get','');
		
		$price_product1 = str_replace( ',', '', $price_product1 );
		$price_special_product1 = str_replace( ',', '', $price_special_product1 );
		$product_id1 = str_replace( ',', '', $product_id1 );
		$quantily_product1 = str_replace( ',', '', $quantily_product1 );
		
		
		
		$db->query($db->query('UPDATE '. TABLE . '_product SET price_special = ' . $price_special_product1 . ' , price = '. $price_product1 .' WHERE id = ' . $product_id1. ' AND store_id = '.$store_id));
		
		
		$db->query($db->query('UPDATE '. TABLE . '_product t1 INNER JOIN ' . TABLE .'_product_classify_value_product t2 ON t1.id = t2.product_id SET t2.sl_tonkho = ' . $quantily_product1 . ' WHERE t1.id = ' . $product_id1. ' AND t1.store_id = '.$store_id));
		
	}
	
	if($mod == 'download')
	{
		$file_name = $nv_Request->get_string( 'file_name', 'get', '' );
		
		$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
		if( file_exists( $file_path ) )
		{
			header( 'Content-Description: File Transfer' );
			header( 'Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
			header( 'Content-Disposition: attachment; filename=' . $file_name );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Expires: 0' );
			header( 'Cache-Control: must-revalidate' );
			header( 'Pragma: public' );
			header( 'Content-Length: ' . filesize( $file_path ) );
			readfile( $file_path );
			// ob_clean();
			flush();
			nv_deletefile( $file_path );
			
			exit();
		}else
		{
			die('File not exists !');
		}
	}
	if($mod=='is_download'){
		ini_set( 'memory_limit', '512M' );
		set_time_limit( 0 );
		$list_product = $db->query('SELECT * FROM ' . TABLE .'_product WHERE status != 0'. $where . ' ORDER BY store_id')->fetchAll();
		$stt = 0;
		foreach ($list_product as $view) {
			
			$data_array = array();
			// số thứ tự
			$data_array['stt'] = ++$stt;
			
			// tên seller & người đại diện
			//$store_info = $db->query("SELECT company_name, name FROM " . TABLE . "_seller_management where id=" . $view['store_id'])->fetch();
			//$data_array['company_name'] = $store_info['company_name'] . ' (Người đại diện: ' . $store_info['name'] . ')';
			
			// mã vạch
			$data_array['barcode'] = $view['barcode'];
			
			// tên sản phẩm
			$data_array['name_product'] = $view['name_product'];
			
			// link sản phẩm
			$data_array['alias'] = NV_MY_DOMAIN .'/'.$view['alias'].'-'.$view['id'].'/';
			
			// danh mục
			$current_category = $db->query('SELECT parrent_id FROM '. TABLE .'_categories WHERE id = '. $view['categories_id'])->fetchColumn();
			if($current_category > 0){
				$category = $db->query('SELECT t1.name, t2.name AS parent_name, t1.parrent_id FROM '. TABLE .'_categories t1 INNER JOIN '. TABLE .'_categories t2 ON t1.parrent_id = t2.id WHERE t1.id = '. $view['categories_id'])->fetch();
				$data_array['category'] = $category['name'];
				while($category['parrent_id']>0){
					$data_array['category'] = $category['parent_name'] . '/' . $data_array['category'];
					$category = $db->query('SELECT t1.name, t2.name AS parent_name, t1.parrent_id FROM '. TABLE .'_categories t1 INNER JOIN '. TABLE .'_categories t2 ON t1.parrent_id = t2.id WHERE t1.id = '. $category['parrent_id'])->fetch();
				}
				} else{
				$data_array['category'] = $db->query('SELECT name FROM '. TABLE .'_categories WHERE id = '. $view['categories_id'])->fetchColumn();
			}
			
			// Khối lượng & đơn vị
			$data_array['weight_product'] = $view['weight_product'];
			$data_array['unit_weight'] = get_info_unit_weight($view['unit_weight'])['name_weight'];
			//print($data_array['unit_weight']);die;
			
			// Chiều dài & đơn vị
			$data_array['length_product']=$view['length_product'];
			$data_array['unit_length']=get_info_unit_length($view['unit_length'])['name_length'];
			
			// chiều rộng & đơn vị
			$data_array['width_product']=$view['width_product'];
			$data_array['unit_width']=get_info_unit_length($view['unit_width'])['name_length'];
			
			// chiều cao & đơn vị
			$data_array['height_product']=$view['height_product'];
			$data_array['unit_height']=get_info_unit_length($view['unit_height'])['name_length'];
			
			// status
			if($view['inhome']){
				$data_array['status'] = 'Hiển thị';
				} else{
				if($view['status']){
					$data_array['status'] = 'Đã ẩn';
					} else{
					$data_array['status'] = 'Đã xóa';
				}
			}
			
			// thuộc tính sản phẩm
			$classify = $db->query('SELECT * FROM ' . TABLE . '_product_classify_value_product WHERE product_id = ' . $view['id'])->fetchAll();
			if(!$classify[0]['classify_id_value1'] && !$classify[0]['classify_id_value2']){ // nếu sp không có thuộc tính
				
				// thuộc tính
				$data_array['classify'] = 'none'; 
				
				// giá niêm yết
				$data_array['price_special'] = $view['price_special'];
				
				// giá bán
				$data_array['price'] = $view['price'];
				
				// tồn kho
				$data_array['warehouse'] =  $classify[0]['sl_tonkho'];
				} else if($classify[0]['classify_id_value2']){// nếu có 2 thuộc tính
				foreach($classify as $item){
					$temp1 = $db->query('SELECT t1.name, t2.name_classify FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value1'])->fetch();
					$temp2 = $db->query('SELECT t1.name, t2.name_classify FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value2'])->fetch();
					$item_value['name'] = $temp1['name_classify'] . '/' . $temp1['name'] . ' - ' . $temp2['name_classify'] . '/' . $temp2['name'];
					$item_value['price_special'] = $item['price_special'];
					$item_value['price'] = $item['price'];
					$item_value['warehouse'] = $item['sl_tonkho'];
					$data_array['classify'][] = $item_value;
				}
				} else{ // nếu có 1 thuộc tính
				foreach($classify as $item){
					$temp = $db->query('SELECT t1.name, t2.name_classify FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value1'])->fetch();
					$item_value['name'] = $temp['name_classify'] . '/' . $temp['name'];
					$item_value['price_special'] = $item['price_special'];
					$item_value['price'] = $item['price'];
					$item_value['warehouse'] = $item['sl_tonkho'];
					$data_array['classify'][] = $item_value;
				}
			}
			$dataContent[] = $data_array;	
		}
		
		
		$page_title = 'DANH SÁCH SẢN PHẨM';
		
		$Excel_Cell_Begin = 1; // Dong bat dau viet du lieu
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/product_shops.xlsx');
		
		
		$worksheet = $spreadsheet->getActiveSheet();
		
		$worksheet->setTitle( $page_title );
		
		// Set page orientation and size
		$worksheet->getPageSetup()->setOrientation( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
		$worksheet->getPageSetup()->setPaperSize( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4 );
		$worksheet->getPageSetup()->setHorizontalCentered( true );
		
		$spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
		
		/*// ngày xuất
			$TextColumnDate = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( 2 );
			if(!$ngay_tu && !$ngay_den){
			$worksheet->setCellValue( $TextColumnDate . 2, 'Toàn thời gian');
			} else{
			$worksheet->setCellValue( $TextColumnDate . 2, date( 'd-m-Y', $ngay_tu ) . ' - ' . date( 'd-m-Y', $ngay_den ));
		}*/
		// Du lieu
		$array_key_data = array();
		$array_key_data[] = 'stt';
		$array_key_data[] = 'status';
		//$array_key_data[] = 'company_name';
		$array_key_data[] = 'barcode';
		$array_key_data[] = 'name_product';
		$array_key_data[] = 'alias';
		$array_key_data[] = 'category';
		$array_key_data[] = 'weight_product';
		//$array_key_data[] = 'unit_weight';
		$array_key_data[] = 'length_product';
		//$array_key_data[] = 'unit_length';
		$array_key_data[] = 'width_product';
		//$array_key_data[] = 'unit_width';
		$array_key_data[] = 'height_product';
		//$array_key_data[] = 'unit_height';
		$array_key_data[] = 'classify';
		$array_key_data[] = 'price_special';
		$array_key_data[] = 'price';
		$array_key_data[] = 'warehouse';
		$key_classify[] = 'name';
		$key_classify[] = 'price_special';
		$key_classify[] = 'price';
		$key_classify[] = 'warehouse';
		
		$pRow = $Excel_Cell_Begin;
		foreach ($dataContent as $row) 
		{
			$columnIndex2 = 0;
			$pRow++;
			if($row['classify'] == 'none'){ // nếu không có thuộc tính
				foreach( $array_key_data as $key_data )
				{
					++$columnIndex2;
					$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
					$worksheet->setCellValue( $TextColumnIndex . $pRow, $row[$key_data] );
				}
				} else{// nếu có thuộc tính
				$count = count($row['classify']);
				$tempRow = $pRow;
				$merge_row = $pRow + $count - 1;
				foreach( $array_key_data as $key_data ){
					++$columnIndex2;
					if($key_data != 'classify'){
						$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
						$worksheet->setCellValue( $TextColumnIndex . $pRow, $row[$key_data] );
						$spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex . $pRow . ':' . $TextColumnIndex . $merge_row);
						} else{
						foreach($row['classify'] as $item){
							$tempCol = $columnIndex2;
							foreach($key_classify as $key){
								$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $tempCol );
								$worksheet->setCellValue( $TextColumn . $tempRow, $item[$key] );
								$tempCol++;
							}
							$tempRow++;
						}
						break;
					}
				}
				$pRow = $merge_row;
			}
		}
		
		
		$file_name = 'Danh_sach_san_pham.xlsx';
		
		$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
		
		header( 'Content-Type: application/vnd.ms-excel' );
		header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
		header( 'Cache-Control: max-age=0' );
		
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		
		$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  
		
		die($link);	
	}
	
	// Change status
	if ($nv_Request->isset_request('change_status', 'post, get')) {
		$id = $nv_Request->get_int('id', 'post, get', 0);
		$content = 'NO_' . $id;
		
		$query = 'SELECT inhome FROM ' . TABLE . '_product WHERE store_id = ' . $store_id .' AND id=' . $id;
		$row = $db->query($query)->fetch();
		
		
		if (isset($row['inhome']) and $row['inhome'] >= 0){
			$inhome = ($row['inhome']) ? 0 : 1;
			$query = 'UPDATE ' . TABLE . '_product SET inhome=' . intval($inhome) . ' WHERE id=' . $id;
			$db->query($query);
			$content = 'OK_' . $id;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}
	
	
	// change_freeship
	
	if ($nv_Request->isset_request('change_freeship', 'post, get')) {
		$id = $nv_Request->get_int('id', 'post, get', 0);
		$content = 'NO_' . $id;
		
		$query = 'SELECT free_ship FROM ' . TABLE . '_product WHERE store_id = ' . $store_id .' AND id=' . $id;
		$row = $db->query($query)->fetch();
		
		
		if (isset($row['free_ship']) and $row['free_ship'] >= 0){
			$free_ship = ($row['free_ship']) ? 0 : 1;
			$query = 'UPDATE ' . TABLE . '_product SET free_ship=' . intval($free_ship) . ' WHERE id=' . $id;
			$db->query($query);
			$content = 'OK_' . $id;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}
	
	// Fetch Limit
	$show_view = false;
	if (!$nv_Request->isset_request('id', 'post,get')) {
		$show_view = true;
		$per_page = 1;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
		->select('COUNT(*)')
		->from(''. TABLE . '_product')
		->where('status = 1 '.$where);
		
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		$num_items = $sth->fetchColumn();
		
		$db->select('*')
		->order('id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		
	}
	
	$contents = nv_theme_retailshops_list_product2($per_page,$page,$num_items,$base_url,$ngay_tu,$ngay_den,$status_ft,$sea_flast,$show_view,$q,$catalogy,$status);
	
	$page_title = $lang_module['product'];
	$array_mod_title[] = array(
	'catid' => 0,
	'title' => $page_title,
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/'
	);
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
