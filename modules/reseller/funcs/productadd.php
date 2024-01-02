<?php
	
	if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');
	if (!defined('NV_IS_USER')) {
		echo '<script language="javascript">';
		echo 'alert("Vui lòng đăng nhập trước để thực hiện chức năng này.");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login',true).'"';
		echo '</script>';
		}else{  
		$store=get_info_user_login($user_info['userid']);
		$store_id = $store['id'];
		if(empty($store_id)){
			echo '<script language="javascript">';
			echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name,true).'"';
			echo '</script>';
		}
	}
	define('NV_EDITOR','ckeditor');
	$mod = $nv_Request->get_string('mod', 'post, get', 0);
	if($mod=="brand"){
		$q=$nv_Request->get_string('q', 'get','');
		$cat_id=$nv_Request->get_string('cat_id', 'get','');
		$list = get_brand_select2_cat($q, $cat_id);
		foreach($list as $result){
			$json[] = ['id'=>$result['id'], 'text'=>$result['title']];
		}
		print_r(json_encode($json));die(); 
	}
	if($mod=="origin"){
		$cat_id=$nv_Request->get_string('cat_id', 'get','');
		$q=$nv_Request->get_string('q', 'get','');
		$list = get_origin_select2($q);
		
		foreach($list as $result){
			$json[] = ['id'=>$result['id'], 'text'=>$result['title']];
		}
		print_r(json_encode($json));die(); 
	}
	if ($nv_Request->isset_request('get_alias_title', 'post')) {
		$alias = $nv_Request->get_title('get_alias_title', 'post', '');
		$alias = change_alias($alias);
		die($alias);
	}
	$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
	if ( $mod == 'get_categories' ) {
		$q = $nv_Request->get_string( 'q', 'post', '' ); 
		$list_cat = category_html_select(0);
		if(count($list_cat)>0){
			foreach ( $list_cat as $result ) {
				$json[] = ['id'=>$result['id'], 'text'=>'<span>'.$result['text'].'</span>'];
			}
			}else{
			$list_cat = get_categories_select2( '',IDSITE,0 );
			foreach ( $list_cat as $result ) {
				$list_cat2 = get_categories_select2( $q, IDSITE, $result['id'] );
				if(count($list_cat2)>0){
					$json[] = ['id'=>$result['id'], 'text'=>'<span style="font-weight:bold">'.$result['name'].'</span>'];
					foreach ( $list_cat2 as $result2 ) {
						$json[] = ['id'=>$result2['id'], 'text'=>'<span>&emsp;'.$result2['name'].'</span>'];
					}
				}
			}
		}
		print_r( json_encode( $json ) );
		die();
		
	}
	$row = array();
	$error = array();
	$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
	
	// check product_id có phải của shop không
	check_product($row['id']);
	 
	if ($nv_Request->isset_request('add', 'get')) {		
		$row['barcode'] = $nv_Request->get_title('barcode', 'post', '');	
		$row['name_product'] = $nv_Request->get_title('name_product', 'post', '');
		$row['name_product'] = trim(preg_replace("/\s+/"," ", $row['name_product']));
		$row['title'] = trim(preg_replace("/\s+/"," ", $row['name_product']));
		$row['alias'] = change_alias($row['name_product']);	
		$row['categories_id'] = $nv_Request->get_int('categories_id', 'post', 0);
		$row['listcatid'] = $row['categories_id'];
		$row['unit_weight'] = $nv_Request->get_string('unit_weight', 'post', 2);
		$row['unit_id'] = $nv_Request->get_int('unit_id', 'post', 0);
		$row['unit_currency'] = $nv_Request->get_string('unit_currency', 'post', 0);
		$row['money_unit'] = $row['unit_currency'];
		
		$row['weight_product'] = $nv_Request->get_title('weight_product', 'post', 0);
		if(!$row['weight_product'])
		$row['weight_product'] = 0;
		
		$row['length_product'] = $nv_Request->get_title('length_product', 'post', 0);
		if(!$row['length_product'])
		$row['length_product'] = 0;
		
		$row['width_product'] = $nv_Request->get_title('width_product', 'post', 0);
		if(!$row['width_product'])
		$row['width_product'] = 0;
		
		$row['height_product'] = $nv_Request->get_title('height_product', 'post', 0);
		if(!$row['height_product'])
		$row['height_product'] = 0;
		
		
		$row['free_ship'] = $nv_Request->get_title('free_ship', 'post', 0);
		$row['self_transport'] = $nv_Request->get_title('self_transport', 'post', 0);
		$row['unit_length'] = $nv_Request->get_title('unit_length', 'post', 1);
		$row['unit_width'] = $nv_Request->get_title('unit_width', 'post', 1);
		$row['unit_height'] = $nv_Request->get_title('unit_height', 'post', 1);
		
		
		$row['group'] = $nv_Request->get_typed_array('group', 'post', 'array');
		$row['allowed_rating'] = $nv_Request->get_title('allowed_rating', 'post', 1);
		$row['showprice'] = $nv_Request->get_title('showprice', 'post', 1);
		$row['store_id'] = $store_id;
		$row['tag_title'] = $nv_Request->get_title('tag_title', 'post', '');
		$row['tag_description'] = $nv_Request->get_title('tag_description', 'post', '');
		$row['brand'] = $nv_Request->get_int('brand', 'post', 0);
		$row['origin'] = $nv_Request->get_int('origin', 'post', 0);
		$row['classify'] = $nv_Request->get_typed_array('classify', 'post', 'array');
		$row['product_old'] = $nv_Request->get_typed_array('product', 'post', 'array');
		$row['change_status'] = $nv_Request->get_typed_array('change_status', 'post', 'string');
		$row['product']=array();
		
		$keyword_array = $nv_Request->get_array('keyword', 'post', '');
		
		$row['keyword'] = implode(',',$keyword_array);
		$row['keyword'] = trim(preg_replace("/\s+/"," ", $row['keyword']));
		
		$nb = $db->query('SELECT MAX(id) FROM ' . TABLE . '_rows')->fetchColumn();
		$alias = $row['alias'];
		if ($is_copy && $alias == '') {
			$row['alias'] = change_alias($row['title']);
			$row['alias'] .= '-' . (intval($nb) + 1);
		} else {
			$row['alias'] = ($alias == '') ? change_alias($row['title']) : change_alias($alias);
		}
		if (!empty($row['alias'])) {
			$stmt = $db->prepare('SELECT COUNT(*) FROM ' . TABLE . '_rows WHERE  ' . NV_LANG_DATA . '_alias = :alias');
			$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
			$stmt->execute();
			if ($stmt->fetchColumn()) {
				$rows_id = $row['id'];
				if ($rows_id == 0) {
					$rows_id = $db->query('SELECT MAX(id) FROM ' . TABLE . '_rows')->fetchColumn();
					$rows_id = intval($rows_id) + 1;
				}
				$row['alias'] = $row['alias'] . '-' . $rows_id;
			}
		}
		
		
		$row['classify_error']=$row['classify'];
		
		// xử lý lấy giá thuộc tính, giá niêm yết nhỏ nhất
		$price = 0;
		$price_special = 0;
		
		// khởi tạo mảng chưa danh sách mã thuộc tính gửi lên
		$array_code = array();
		
		foreach($row['product_old'] as $value){
			if($row['id']==0){
				$i=1;
				$value['id1_old']=$value['id1'];
				$value['id2_old']=$value['id2'];  
				
				if(empty($value['price_special']))
				{
					mess_error('Giá niêm yết thuộc tính chưa nhập!'); 
				}
				
				if($value['quantity'] < 0)
				{
					mess_error('SL Tồn kho thuộc tính phải >= 0!'); 
				}
				
				foreach($row['classify'] as $key=>$value_classify){
					// số lượng thuộc tính con không vượt quá 10
					if(count($value_classify['value']) > 10)
					{
						mess_error('Phân loại sản phẩm không vượt quá 10!'); 
					}
					
					// kiểm tra phân loại sản phẩm có trùng nhau không
					$array_check_value = array();
					foreach($value_classify['value'] as $check_value)
					{
						if(in_array($check_value,$array_check_value))
						{
							mess_error('Phân loại sản phẩm '. $check_value .' bị trùng!'); 
						}
						
						array_push($array_check_value, $check_value);
					}
					
					if($i==1){
						$value['id1']=$value_classify['value'][$value['id1']];
						}else{
						if(count($row['classify'])>1){
							$value['id2']=$value_classify['value'][$value['id2']];
							}else{
							$value['id2']='';
						}
					}
					$i++;
				}
				}else{
					$value['id1_old']=$value['id1'];
					$i=1;
					
					if(empty($value['price_special']))
					{
						mess_error('Giá niêm yết thuộc tính chưa nhập!'); 
					}
					
					if($value['quantity'] < 0)
					{
						mess_error('SL Tồn kho thuộc tính phải >= 0!'); 
					}
					
					foreach($row['classify'] as $key=>$value_classify){
						// số lượng thuộc tính con không vượt quá 10
						if(count($value_classify['value']) > 10)
						{
							mess_error('Phân loại sản phẩm không vượt quá 10!'); 
						}
						
						// kiểm tra phân loại sản phẩm có trùng nhau không
						$array_check_value = array();
						foreach($value_classify['value'] as $check_value)
						{
							if(in_array($check_value,$array_check_value))
							{
								mess_error('Phân loại sản phẩm '. $check_value .' bị trùng!'); 
							}
							
							array_push($array_check_value, $check_value);
						}
						
						
						if($i==1){
							$value['id1']=$value_classify['value'][$value['id1']];
							}else{
							if(count($row['classify'])>1){
								$value['id2_old']=$value['id2'];
								if(!empty($value_classify['value'][$value['id2']])){
									$value['id2']=$value_classify['value'][$value['id2']];
								}
								}else{
								$value['id2']='';
							}
						}
						$i++;
						
					}				
			}
			$value['price']=str_replace(',','',$value['price']);
			$value['quantity']=str_replace(',','',$value['quantity']);
			$value['price_special']=str_replace(',','',$value['price_special']);
			
			if(!isset($value['status']))
				$value['status'] = 0;
			
			if(!$value['price'])
				$value['price'] = $value['price_special'];
			
			// giá bán, giá niêm yết nhỏ nhất
			if($price == 0)
			{
				$price = $value['price'];
				$price_special = $value['price_special'];
			}
			elseif($value['price'] < $price)
			{
				$price = $value['price'];
				$price_special = $value['price_special'];
			}
			
			
			if(!$value['price']){
				$value['price'] = $value['price_special'];
			}
			
			if($value['price_special'] < $value['price']){
				mess_error('Giá khuyến mãi không được lớn hơn giá bán');
			}
			
			$row['product'][]=$value;
		}
		
		
		//mess_error($price); 
		
		// giá sản phẩm không có thuộc tính
		if(!$row['product_old'])
		{
			
			$row['price_special'] = $nv_Request->get_string('price_special', 'post', 0);
			if(empty($row['price_special'])){
				$row['price_special']=0;
				}else{
				$row['price_special']=str_replace(',','',$row['price_special']);
			}
			
			if(!$row['price_special']){
				mess_error('Giá niêm yết chưa nhập!');
			}
			
			$row['price'] = $nv_Request->get_string('price', 'post', 0);
			if(empty($row['price'])){
				$row['price']=0;
				}else{
				$row['price']=str_replace(',','',$row['price']);
			}
			
			if(!$row['price']){
				$row['price'] = $row['price_special'];
			}
			$row['product_price'] = $row['price_special'];
			$row['saleprice'] = $row['price'];
			$row['warehouse'] = $nv_Request->get_string('warehouse', 'post', 0);
			if(empty($row['warehouse'])){
				$row['warehouse']=0;
				}else{
				$row['warehouse']=str_replace(',','',$row['warehouse']);
			}
			
			if($row['warehouse'] < 0){
				mess_error('SL tồn kho chưa nhập!');
			}
			
		}
		else
		{
			$row['price']= $price;
			$row['price_special']= $price_special;
		}
		
		

		
		$row['product_price'] = $row['price_special'];
		$row['bodytext'] = $nv_Request->get_editor('bodytext', '', NV_ALLOWED_HTML_TAGS);
		
		$row['description'] = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);
		
		
		if($row['id'] == 0){
			$check_barcode=$db->query('SELECT count(*) FROM '.TABLE.'_rows where idsite = '. $store_id .' AND status = 1 AND product_code='.$db->quote($row['barcode']))->fetchColumn();
			if($check_barcode > 0){
				mess_error($lang_module['error_exist_barcode']);
			}
		}
		if (empty($row['barcode'])) {
			mess_error($lang_module['error_required_barcode']);
			} elseif (empty($row['name_product'])) {
			mess_error($lang_module['error_required_name_product']);
			} elseif (empty($row['alias'])) {
			mess_error($lang_module['error_required_alias']);
			} /* elseif (empty($row['categories_id'])) {
			mess_error($lang_module['error_required_categories_id']);
			} */ elseif (empty($row['bodytext'])) {
			mess_error($lang_module['error_required_bodytext']);
		}
		
		//check rules
		if(mb_strlen($row['name_product']) > 170){ 
			mess_error('Tên sản phẩm vượt giới hạn ký tự!');
		}
	
		
		if(strlen($row['bodytext']) > 60000)
		{
			mess_error('Mô tả sản phẩm vượt quá 60.000 ký tự!');
		}
		
		// giới hạn kích thướt description 40000
		if(strlen($row['description']) > 40000)
		{
			mess_error('Thông số kỹ thuật vượt quá 40.000 ký tự!');
		}
		
		
		// xử lý xóa liên kết nếu có
		$row['bodytext'] =preg_replace('#<a.*?>(.*?)</a>#i', '\1', $row['bodytext']);
		$row['description'] =preg_replace('#<a.*?>(.*?)</a>#i', '\1', $row['description']);
		$row['hometext'] =preg_replace('#<a.*?>(.*?)</a>#i', '\1', $row['description']);
		
		
		// xử lý hình ảnh trong description, bodytext
		
		// kiểm tra hình ảnh trong bodytext
		preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $row['bodytext'], $match_img);  //tìm src="X" or src='X'
		$bodytext_array = array_pop($match_img);// chuyên list hình sang dạng chuỗi
		
		if(count($bodytext_array) > 10)
		{
			mess_error('Mô tả sản phẩm không vượt quá 10 hình');
		}
		
		preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $row['description'], $match_img);  //tìm src="X" or src='X'
		
		$description_array = array_pop($match_img);
		
		if(count($description_array) > 10)
		{
			mess_error('Thông số kỹ thuật không vượt quá 10 hình');
		}
		
		
		
		if (true) {
			$row['other_image'] = $nv_Request->get_array('array_image_pro', 'post', '');
			$row['discount_id'] = $nv_Request->get_int('discount_id', 'post', 0);

			$row['product_weight'] = $nv_Request->get_string('product_weight', 'post', '');
			$row['product_weight'] = floatval(preg_replace('/[^0-9\.]/', '', $row['product_weight']));
			$row['weight_unit'] = $row['unit_weight'];
			
			$row['product_unit'] = $nv_Request->get_int('product_unit', 'post', 0);
			$row['homeimgfile'] = $nv_Request->get_title('homeimg', 'post', '');
			$row['homeimgalt'] = $nv_Request->get_title('homeimgalt', 'post', '', 1);
			$row['homeimgalt'] = 
			$row['copyright'] = (int) $nv_Request->get_bool('copyright', 'post');
			$row['inhome'] = (int) $nv_Request->get_bool('inhome', 'post');

			$row['tag_title'] = $nv_Request->get_title('tag_title', 'post', '');
			$row['tag_description'] = $nv_Request->get_textarea('tag_description', '', NV_ALLOWED_HTML_TAGS);

			$_groups_post = $nv_Request->get_array('allowed_comm', 'post', []);
			$row['allowed_comm'] = !empty($_groups_post) ? implode(',', nv_groups_post(array_intersect($_groups_post, array_keys($groups_list)))) : '';

			$row['allowed_rating'] = (int) $nv_Request->get_bool('allowed_rating', 'post');
			$row['allowed_send'] = (int) $nv_Request->get_bool('allowed_send', 'post');
			$row['allowed_print'] = (int) $nv_Request->get_bool('allowed_print', 'post');
			$row['allowed_save'] = (int) $nv_Request->get_bool('allowed_save', 'post');

			$row['keywords'] = $nv_Request->get_array('keywords', 'post', '');
			$row['keywords'] = implode(', ', $row['keywords']);
			//$row['otherimage'] = $row['other_image'];
			$row['ratingdetail'] = '0';
			$row['homeimgthumb'] = 1;
			$row['gift_content'] = $nv_Request->get_textarea('gift_content', '', 'br');
			$row['gift_from'] = $nv_Request->get_title('gift_from', 'post', '');
			$row['gift_to'] = $nv_Request->get_title('gift_to', 'post', '');
			$row['address'] = $nv_Request->get_title('address', 'post', '', 1);
			if (!empty($row['gift_content']) and preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $rowcontent['gift_from'], $m)) {
				$gift_from_h = $nv_Request->get_int('gift_from_h', 'post', 0);
				$gift_from_m = $nv_Request->get_int('gift_from_m', 'post', 0);
				$row['gift_from'] = mktime($gift_from_h, $gift_from_m, 0, $m[2], $m[1], $m[3]);
			} else {
				$row['gift_from'] = 0;
			}

			if (!empty($row['gift_content']) and preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $rowcontent['gift_to'], $m)) {
				$gift_to_h = $nv_Request->get_int('gift_to_h', 'post', 23);
				$gift_to_m = $nv_Request->get_int('gift_to_m', 'post', 59);
				$row['gift_to'] = mktime($gift_to_h, $gift_to_m, 59, $m[2], $m[1], $m[3]);
			} else {
				$row['gift_to'] = 0;
			}
			
			//Xử lý lưu nhiều hình ảnh
			$list_image = array();
			
			$username = change_alias($user_info['username']);
			
			//$username = $username . '/test';
			
			
			$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $store['username'] . '/shops/shops/' . $username;
			
			$path_thumb = NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $store['username'] . '/shops/shops/' . $username;
			
			$a = 'shops/' . $username;
			
			
			
			// kiểm tra forder assets user đã tồn tại chưa
			
			// tạo thư mục upload
			if  (!file_exists($path_upload)) {
				mkdir($path_upload, 0777);
			}
			
			// tạo thư mục ảnh thumb
			if  (!file_exists($path_thumb)) {
				mkdir($path_thumb, 0777);
			}
			
			
			
			// xử lý hình ảnh data:img thành file ảnh png
			$first = true;
			$array_other_img = array();
			$list_image = array();
			
			foreach ($row['other_image'] as $otherimage) {
				// file hình ảnh đã tồn tại trên hệ thống
				
				if (!empty($otherimage) and is_file(NV_UPLOADS_REAL_DIR . '/' . $store['username'] . '/shops/' . $otherimage)) {
					$file_image = $otherimage;
				}
				else
				{
					// hình ảnh là data:img svg
					$kq = conver_data_img_to_png($otherimage, $path_upload, $path_thumb);

					// cập nhật lại
					if($kq)
					{
						$file_image = str_replace($module_upload . '/', '', $a . '/' . $kq);
					}
					else
					{
						continue;
					}
					
				}
				
				// hình ảnh chính
				if($file_image and $first)
				{
					$row['image_default'] = $file_image;
				}
				else
				{
					$array_other_img[] = $file_image;
				}
				
				$list_image[] =  $file_image;
				
				$first = false;
				
			}
			
			
			// xử lý lại hình ảnh khác
			if($array_other_img)
			{
				$row['other_img'] = implode(',',$array_other_img);
			}
			$row['homeimgfile'] = $row['image_default'];
			if (!nv_is_url($row['homeimgfile']) and is_file(NV_DOCUMENT_ROOT . $row['homeimgfile'])) {
				$lu = strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $store['username'] . '/' . $module_upload . '/');
				$row['homeimgfile'] = substr($row['homeimgfile'], $lu);
				if (file_exists(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $store['username'] . '/' . $module_upload . '/' . $row['homeimgfile'])) {
					$row['homeimgthumb'] = 1;
				} else {
					$row['homeimgthumb'] = 2;
				}
			} elseif (nv_is_url($row['homeimgfile'])) {
				$row['homeimgthumb'] = 3;
			} else {
				$row['homeimgfile'] = '';
			}
			if($row['homeimgfile'] == ''){
				$row['homeimgfile'] = $row['image_default'];
			}
			$row['otherimage'] = $row['other_img'];
			if(empty($row['otherimage'])){
				$row['otherimage'] = $row['homeimgfile'];
			}
			// xử lý hình ảnh vào thư mục upload user description, bodytext
			
			
			foreach($bodytext_array as $srcimg)
			{			
				// kiểm tra file upload đã tồn tại thì không xử lý gì hết
				$srcimg_name = str_replace( 'https://banhang.bbo.vn', '', $srcimg);	
				
				// hình ảnh đã tồn tại trên hệ thống upload/retails
				$exits_image = strpos($srcimg_name, NV_UPLOADS_DIR . '/' . $module_name);
				
				// ảnh đúng đường dẫn file upload rồi nên không xử lý gì hết
				if(file_exists(NV_ROOTDIR . $srcimg_name) and $exits_image)
				continue;
				
				
				
				// upload từ thư mục tmp sang thư mục upload
				if (file_exists(NV_ROOTDIR . $srcimg)) 
				{
					$srcimg = str_replace( '/data/tmp/', '', $srcimg);	
					
					// Copy file từ thư mục tmp sang uploads, assets
					if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' .$store['username'] . '/' . $module_name . '/' . $a . '/' . $srcimg)) {
						
						// thay thế src upload user
						$tim = '/data/tmp/' . $srcimg;
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' .$store['username'] . '/' . $module_upload . '/' . $a . '/' . $srcimg;			
						$row['bodytext'] = str_replace( $tim, $thaythe, $row['bodytext']);	
						
						// xóa file tmp
						nv_delete_images_tmp_ckeditor(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg);
					}
					
				}
				else
				{
					// hình ảnh từ server khác, tải hình ảnh từ server khác về server chonhagiau.com
					
					
					$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
					$path_upload_other = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $store['username'] . '/shops/' . $a . '/' . $file_name_img;
					
					file_put_contents($path_upload_other, file_get_contents($srcimg));
					
					if (file_exists($path_upload_other)) 
					{
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $file_name_img;	
						
						$row['bodytext'] = str_replace( $srcimg, $thaythe, $row['bodytext']);	
						
					}
					
				}
				
			}
			
			
			
			foreach($description_array as $srcimg)
			{	
				
				// kiểm tra file upload đã tồn tại thì không xử lý gì hết
				$srcimg_name = str_replace( 'https://banhang.bbo.vn', '', $srcimg);	
				
				// hình ảnh đã tồn tại trên hệ thống upload/retails
				$exits_image = strpos($srcimg_name, NV_UPLOADS_DIR . '/' .$store['username'] . '/' . $module_name);
				
				// ảnh đúng đường dẫn file upload rồi nên không xử lý gì hết
				if(file_exists(NV_ROOTDIR . $srcimg_name) and $exits_image)
				continue;
				
				// upload từ thư mục tmp sang thư mục upload
				if (file_exists(NV_ROOTDIR . $srcimg)) 
				{
					$srcimg = str_replace( '/data/tmp/', '', $srcimg);	
					
					// Copy file từ thư mục tmp sang uploads, assets
					if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' .$store['username'] . '/' . $module_name . '/' . $a . '/' . $srcimg)) {
						
						// thay thế src upload user
						$tim = '/data/tmp/' . $srcimg;
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' .$store['username'] . '/' . $module_upload . '/' . $a . '/' . $srcimg;			
						$row['description'] = str_replace( $tim, $thaythe, $row['description']);	
						
						// xóa file tmp
						nv_delete_images_tmp_ckeditor(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg);
					}
					
				}
				else
				{
					// hình ảnh từ server khác, tải hình ảnh từ server khác về server chonhagiau.com
					
					
					$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
					$path_upload_other = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $store['username'] . '/' . $module_name . '/' . $a . '/' . $file_name_img;
					
					file_put_contents($path_upload_other, file_get_contents($srcimg));
					
					if (file_exists($path_upload_other)) 
					{
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $file_name_img;	
						
						$row['description'] = str_replace( $srcimg, $thaythe, $row['description']);	
						
					}
					
				}
				
				
			}
			
			$listfield = '';
			$listvalue = '';
			$field_lang = nv_file_table(TABLE.'_rows');
			foreach ($field_lang as $field_lang_i) {
				list ($flang, $fname) = $field_lang_i;
				$listfield .= ', ' . $flang . '_' . $fname;
				$listvalue .= ', :' . $flang . '_' . $fname;
			}
			$row['homeimgalt'] = $row['name_product'];
			try {
				
				$row['user_id'] = $user_info['userid'];
				$row['status'] = 1;
				if (empty($row['id'])) {
					
					$row['addtime'] = NV_CURRENTTIME;
					$row['inhome'] = 1;
					$row['product_code'] = $row['barcode'];
					$row['allowed_comm'] = 1;
					$row['allowed_rating'] = 1;
					$id_max = $db->query('SELECT max(id) as max FROM '.TABLE.'_rows')->fetchColumn(); 
					
					
					$stmt = $db->sqlreset()->prepare("INSERT INTO " . TABLE . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt,otherimage,imgposition, copyright, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, showprice, idsite " . $listfield . ")
						 VALUES ( NULL ,
						 :listcatid,
						 " . intval($row['user_id']) . ",
						 " . intval($row['addtime']) . ",
						 " . intval($row['edittime']) . ",
						 " . intval($row['status']) . ",
						 " . intval($row['publtime']) . ",
						 " . intval($row['exptime']) . ",
						 " . intval($row['archive']) . ",
						 :product_code,
						 " . intval($row['product_number']) . ",
						 :product_price,
						 :price_special,
						 :price_config,
						 :saleprice,
						 :money_unit,
						 " . intval($row['product_unit']) . ",
						 :product_weight,
						 :weight_unit,
						 " . intval($row['discount_id']) . ",
						 :homeimgfile,
						 :homeimgthumb,
						 :homeimgalt,
						 :otherimage,
						 " . intval($row['imgposition']) . ",
						 " . intval($row['copyright']) . ",
						 " . intval($row['inhome']) . ",
						 :allowed_comm,
						 " . intval($row['allowed_rating']) . ",
						 :ratingdetail,
						 " . intval($row['allowed_send']) . ",
						 " . intval($row['allowed_print']) . ",
						 " . intval($row['allowed_save']) . ",
						 " . intval($row['hitstotal']) . ",
						 " . intval($row['hitscm']) . ",
						 " . intval($row['hitslm']) . ",
						 " . intval($row['showprice']) . ",
						 " . intval($store_id) . "
						" . $listvalue . "
					)");
					$stmt->bindParam(':ratingdetail', $row['ratingdetail'], PDO::PARAM_STR);
					$stmt->bindParam(':' . NV_LANG_DATA . '_title', $row['title'], PDO::PARAM_STR);
					$stmt->bindParam(':' . NV_LANG_DATA . '_address', $row['address'], PDO::PARAM_STR);
					$stmt->bindParam(':' . NV_LANG_DATA . '_alias', $row['alias'], PDO::PARAM_STR);
					$stmt->bindParam(':' . NV_LANG_DATA . '_hometext', $row['hometext'], PDO::PARAM_STR, strlen($rowcontent['hometext']));
					$stmt->bindParam(':' . NV_LANG_DATA . '_bodytext', $row['bodytext'], PDO::PARAM_STR, strlen($rowcontent['bodytext']));
					$stmt->bindParam(':' . NV_LANG_DATA . '_gift_content', $row['gift_content'], PDO::PARAM_STR);
					
					$stmt->bindParam(':' . NV_LANG_DATA . '_tag_title', $row['tag_title'], PDO::PARAM_STR);
					$stmt->bindParam(':' . NV_LANG_DATA . '_tag_description', $row['tag_description'], PDO::PARAM_STR, strlen($rowcontent['tag_description']));
					$stmt->bindParam(':product_code', $row['product_code'], PDO::PARAM_STR);
				}else{
					$row['inhome'] = 1;
					$row['allowed_comm'] = 1;
					$row['allowed_rating'] = 1;
					$stmt = $db->prepare("UPDATE " . TABLE . "_rows SET
					 listcatid= :listcatid,
					 user_id=" . intval($row['user_id']) . ",
					 publtime=" . intval($row['publtime']) . ",
					 exptime=" . intval($row['exptime']) . ",
					 edittime= " . NV_CURRENTTIME . " ,
					 archive=" . intval($row['archive']) . ",
					 product_number = product_number + " . intval($row['product_number']) . ",
					 product_price = :product_price,
					 price_special = :price_special,
					 price_config = :price_config,
					 saleprice = :saleprice,
					 money_unit = :money_unit,
					 product_unit = " . intval($row['product_unit']) . ",
					 product_weight = :product_weight,
					 weight_unit = :weight_unit,
					 discount_id = " . intval($row['discount_id']) . ",
					 homeimgfile= :homeimgfile,
					 homeimgalt= :homeimgalt,
					 otherimage= :otherimage,
					 homeimgthumb= :homeimgthumb,
					 imgposition=" . intval($row['imgposition']) . ",
					 copyright=" . intval($row['copyright']) . ",
					 gift_from=" . intval($row['gift_from']) . ",
					 gift_to=" . intval($row['gift_to']) . ",
					 inhome=" . intval($row['inhome']) . ",
					 allowed_comm= :allowed_comm,
					 allowed_rating=" . intval($row['allowed_rating']) . ",
					 allowed_send=" . intval($row['allowed_send']) . ",
					 allowed_print=" . intval($row['allowed_print']) . ",
					 allowed_save=" . intval($row['allowed_save']) . ",
					 showprice = " . intval($row['showprice']) . ",
					 " . NV_LANG_DATA . "_title= :title,
					  " . NV_LANG_DATA . "_address= :address,
					 " . NV_LANG_DATA . "_alias= :alias,
					 " . NV_LANG_DATA . "_hometext= :hometext,
					 " . NV_LANG_DATA . "_bodytext= :bodytext,
					 " . NV_LANG_DATA . "_gift_content= :gift_content,
					 " . NV_LANG_DATA . "_tag_title= :tag_title,
					 " . NV_LANG_DATA . "_tag_description= :tag_description
					 WHERE id =" . $row['id']);
					 $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
					$stmt->bindParam(':address', $row['address'], PDO::PARAM_STR);
					$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
					$stmt->bindParam(':hometext', $row['hometext'], PDO::PARAM_STR, strlen($rowcontent['hometext']));
					$stmt->bindParam(':bodytext', $row['bodytext'], PDO::PARAM_STR, strlen($rowcontent['bodytext']));
					$stmt->bindParam(':gift_content', $row['gift_content'], PDO::PARAM_STR);
					
					$stmt->bindParam(':tag_title', $row['tag_title'], PDO::PARAM_STR);
					$stmt->bindParam(':tag_description', $row['tag_description'], PDO::PARAM_STR, strlen($rowcontent['tag_description']));
				}
				$row['price_config'] = 0;
				$stmt->bindParam(':listcatid', $row['listcatid'], PDO::PARAM_INT);
				
				$stmt->bindParam(':money_unit', $row['money_unit'], PDO::PARAM_STR);
				$stmt->bindParam(':product_price', $row['product_price'], PDO::PARAM_STR);
				$stmt->bindParam(':price_special', $row['product_price'], PDO::PARAM_STR);
				$stmt->bindParam(':price_config', $row['price_config'], PDO::PARAM_STR);
				$stmt->bindParam(':saleprice', $row['saleprice'], PDO::PARAM_STR);
				$stmt->bindParam(':product_weight', $row['product_weight'], PDO::PARAM_STR);
				$stmt->bindParam(':weight_unit', $row['weight_unit'], PDO::PARAM_STR);
				$stmt->bindParam(':homeimgfile', $row['homeimgfile'], PDO::PARAM_STR);
				$stmt->bindParam(':homeimgalt', $row['homeimgalt'], PDO::PARAM_STR);
				$stmt->bindParam(':otherimage', $row['otherimage'], PDO::PARAM_STR);
				$stmt->bindParam(':homeimgthumb', $row['homeimgthumb'], PDO::PARAM_STR);
				$stmt->bindParam(':allowed_comm', $row['allowed_comm'], PDO::PARAM_INT);

				$exc = $stmt->execute();
				
				
				
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['id'])) {
						
						$product_id=$db->query('SELECT max(id) FROM ' . TABLE. '_rows WHERE product_code = "'. $row['barcode'] .'"')->fetchColumn();
						
					
						
						
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Product', ' ', $user_info['userid']);
						} else {
						
						// sửa sản phẩm
						
						
						
						// xử lý xóa file image nếu cập nhật lại hình ảnh
						// $info_images_old
						// $list_image
						$array_images_old = array();
						$array_images_old[] = $info_images_old['image'];
						if(!empty($info_images_old['other_image']))
						{
							$arr_tam = explode(",", $info_images_old['other_image']);
							foreach($arr_tam as $tam)
							{
								$array_images_old[] = $tam;
							}
						}
						
						
						
						
						foreach($array_images_old as $old)
						{
							if(!in_array($old, $list_image))
							{
								// xóa file trong thư mục user
								unlink(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $old);
								unlink(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $old);
							}
						}
						
						
						
						
						
						// xử lý nhập kho sản phẩm không có thuộc tính
						
						
						// kết thúc xử lý cập nhật lại thuộc tính sản phẩm
						
						
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Product', 'ID: ' . $row['id'], $user_info['userid']);
					}
					
					// thông báo thêm, cập nhật sản phẩm thành công.
					
					$array = array();
					
					$array['status'] = 'OK';
					$array['mess'] = 'Thực hiện thành công!';
					
					print_r(json_encode($array));die;
					
				}
				} catch(PDOException $e) {
				trigger_error($e->getMessage());
				
				die($e->getMessage()); //Remove this line after checks finished
			}
			}else{
			if(get_info_category($row['categories_id'])['parrent_id']==0){
				$row['categories_name']='<span style="font-weight:bold">'.get_info_category($row['categories_id'])['name'].'</span>';
				}else{
				$row['categories_name']='<span>&emsp;'.get_info_category($row['categories_id'])['name'].'</span>';
			}
			$row['brand_name']=get_info_brand($row['brand'])['title'];
			$row['origin_name']=get_info_orgin($row['origin'])['title'];
			$row['other_image'] = $db->query('SELECT other_image FROM ' . TABLE . '_product WHERE id=' . $row['id'])->fetchColumn();
			$row['image'] = $db->query('SELECT image FROM ' . TABLE . '_product WHERE id=' . $row['id'])->fetchColumn();
		}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT t1.* FROM ' . TABLE . '_rows t1 WHERE t1.id=' . $row['id'])->fetch();
			
			if($global_array_shops_cat[$row['listcatid']]['parrent_id']==0){
				$row['categories_name']='<span style="font-weight:bold">'.$global_array_shops_cat[$row['listcatid']]['title'].'</span>';
				}else{
				$row['categories_name']='<span>&emsp;'.$global_array_shops_cat[$row['listcatid']]['title'].'</span>';
			}
			//$row['brand_name']=get_info_brand($row['brand'])['title'];
			//$row['origin_name']=get_info_orgin($row['origin'])['title'];
			$row['price']=number_format($row['price']);
			$row['title']=$row[NV_LANG_DATA . '_title'];
			//print_r($row);die;
			if(!$row['price_special'])
			$row['price_special'] = '';
			else
			$row['price_special']=number_format($row['price_special']);
			
		
		
		
			$row['classify_error']=array();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['id'] = 0;
			$row['barcode'] = '';
			$row['name_product'] = '';
			$row['alias'] = '';
			$row['categories_id'] = 0;
			$row['weight_product'] = '';
			$row['length_product'] = '';
			$row['width_product'] = '';
			$row['height_product'] = '';
			$row['free_ship'] = 0;
			$row['self_transport'] = 0;
			$row['image'] = '';
			$row['description'] = '';
			$row['bodytext'] = '';
			$row['unit_weight']=0;
			$row['unit_id']=0;
			$row['unit_currency']=0;
			$row['unit_length']=0;
			$row['unit_width']=0;
			$row['unit_height']=0;
			$row['store_id']=0;
			$row['classify']=array();
			$row['other_image']='';
			$row['inhome']=0;
			$row['allowed_rating']=0;
			$row['showprice']=0;
			$row['listcatid']=0;
			
	}
	$row['brand']=0;
	if (defined('NV_EDITOR'))
	require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
	
	
	
	$row['bodytext'] = nv_htmlspecialchars(nv_editor_br2nl($row[NV_LANG_DATA . '_bodytext']));
	if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
		$row['bodytext'] = nv_aleditor('bodytext', '100%', '300px', $row['bodytext']);
		} else {
		$row['bodytext'] = '<textarea style="width:100%;height:300px" name="bodytext">' . $row['bodytext'] . '</textarea>';
	}
	
	
	$row['description'] = nv_htmlspecialchars(nv_editor_br2nl($row[NV_LANG_DATA . '_hometext']));
	if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
		$row['description'] = nv_aleditor('description', '100%', '300px', $row['description']);
		} else {
		$row['description'] = '<textarea style="width:100%;height:300px" name="description">' . $row['description'] . '</textarea>';
	}
	
	
	$xtpl = new XTemplate('product_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	
	
	//print_r($global_config['nv_max_size']);die;
	
	$xtpl->assign('UPLOAD_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=upload&token=' . md5($nv_Request->session_id . $global_config['sitekey']));
	
	$xtpl->assign('list_product', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product', true ));
	
	
	$xtpl->assign('w_h', 800);
	
	
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('TEMPLATE', $global_config['site_theme']);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	
	// thông tin khu vực
	$data_kv = array();
	foreach($global_location as $khu_vuc)
	{
		$data_kv[] = array(
		'id' => $khu_vuc['id'],
		'title_area' => $khu_vuc['title_area']
		);
	}
	
	$xtpl->assign('data_kv', json_encode($data_kv));
	
	// xuất ra thông tin keyword
	if($row['keyword'])
	{
		$array_key = explode(',',$row['keyword']);
		$flag = false;
		foreach($array_key as $keyword)
		{
			$xtpl->assign('keyword', $keyword);
			if($flag)
			{
				$xtpl->parse('main.keyword.delete');
			}
			$flag = true;
			$xtpl->parse('main.keyword');
		}
	}
	
	
	
	foreach ($global_array_shops_cat as $rows_i) {
		
		$sl = ($rows_i['catid'] == $row['listcatid']) ? " selected=\"selected\"" : "";
		$xtpl->assign('pcatid_i', $rows_i['catid']);
		$xtpl->assign('ptitle_i', $rows_i['title']);
		$xtpl->assign('pselect', $sl);
		$xtpl->parse('main.parent_loop');
	}
	
	
	if($row['otherimage'] || $row['homeimgfile']){
		$array_otherimage = array();
		$array_otherimage = explode(",", $row['otherimage']);
		$list_image=array();
		$list_image[]['image'] = $row['homeimgfile'];
		if($row['otherimage']){
			foreach ($array_otherimage as $key => $value) {
				$list_image[]['image']=$value;
			}
		}
		$i = 10;
		
		foreach ($list_image as $otherimage) {
			$otherimage['number'] = $i;
			$otherimage['filepath'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $store['username'] . '/shops/' . $otherimage['image'];
			
			$otherimage['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $store['username'] . '/shops/' .$otherimage['image'];
			$otherimage['image'] = str_replace(NV_BASE_SITEURL . NV_FILES_DIR . '/' . $store['username'] . '/' . $module_upload . '/', '',$otherimage['image']);
			$xtpl->assign('DATA', $otherimage);
			$xtpl->parse('main.data');
			$i ++;
		}
	}
	
	// xuất thông tin hình ảnh chính, hình ảnh khác của sản phẩm
	for($i = 0; $i <= 7; $i++)
	{
		$xtpl->assign('stt', $i);
		
		//print_r(NV_UPLOADS_REAL_DIR . '/' . $module_upload  . '/' . $list_image[$i]['image']);die;
		if (!empty($list_image[$i]['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $store['username'] . '/shops/' . $list_image[$i]['image'])) {
			
			$src_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $store['username'] . '/shops/' . $list_image[$i]['image'];			
			$homeimgfile = str_replace(NV_BASE_SITEURL . NV_FILES_DIR . '/' . $store['username'] . '/shops/', '',$list_image[$i]['image']);
			
			$xtpl->assign('src_image', $src_image);
			$xtpl->assign('homeimgfile', $homeimgfile);
			
			$xtpl->parse('main.data_image.loop');
			
		}
		else
		{
			$xtpl->parse('main.data_image.add');
		}
		
		$xtpl->parse('main.data_image');
	}
	
	$xtpl->assign('MAXFILESIZEULOAD', $global_config['nv_max_size']);
	$xtpl->assign('MAXIMAGESIZEULOAD', explode('x', $array_config['image_upload_size']));
	$xtpl->assign('MAXFILESIZE', nv_convertfromBytes($global_config['nv_max_size']));
	$xtpl->assign('UPLOAD_IMG_SIZE', $array_config['image_upload_size']);
	$xtpl->assign('UPLOAD_DIR', NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $store['username'] . '/' . $module_name);
	$xtpl->assign( 'MODULE_FILE', $module_name );
	$xtpl->assign('COUNT', count($list_image));
	$xtpl->assign('COUNT_UPLOAD', 7);
	
	
	
	if($row['id']){
		foreach ($list_brand as $value_list) {
			if($row['brand'] == $value_list['id']){
				$value_list["selected"] = "selected";
			}
			$xtpl->assign( 'STATUS', $value_list);
			$xtpl->parse( 'main.brand' );
		}
		
		foreach ($list_origin as $value_list) {
			if($row['origin'] == $value_list['id']){
				$value_list["selected"] = "selected";
			}
			$xtpl->assign( 'STATUS', $value_list);
			$xtpl->parse( 'main.origin' );
		}
		/* $list_cat = get_categories_select2_full("",IDSITE); */
		
		foreach ($list_cat as $value_list) {
			if($row['categories_id'] == $value_list['id']){
				$value_list["selected"] = "selected";
			}
			$xtpl->assign( 'STATUS', $value_list);
			$xtpl->parse( 'main.categories_id' );
		}
	}
	
	$xtpl->assign('ROW', $row);
	
	if($row['free_ship'])
	{
		$xtpl->assign( 'free_ship_checked', 'checked=checked');
		// cấu hình vận chuyển
		$data_free_ship = json_decode($row['json_free_ship'],true);
		$xtpl->assign( 'count_free_ship', count($data_free_ship));
		
		
		foreach($data_free_ship as $key => $free_ship)
		{
			// khu vực
			foreach($data_kv as $kv)
			{
				$option = array(
				'id' => $kv['id'],
				'title_area' => $kv['title_area'],
				'selected' => ($kv['id'] == $free_ship['area']) ? 'selected=selected' : ''
				);
				
				$xtpl->assign('area', $option);
				$xtpl->parse('main.free_ship.area');
			}
			// tỉnh thành thuộc khu vực đó
			foreach($global_location[$free_ship['area']]['province'] as $tinhthanh)
			{
				$option = array(
				'provinceid' => $tinhthanh['provinceid'],
				'title' => $tinhthanh['title'],
				'selected' => (in_array($tinhthanh['provinceid'],$free_ship['province'])) ? 'selected=selected' : ''
				);
				
				$xtpl->assign('province', $option);
				$xtpl->parse('main.free_ship.province');
			}
			
			// tất cả tỉnh thành
			if(in_array(0,$free_ship['province']))
			{
				$xtpl->assign('selected_all', 'selected=selected');
			}
			else
			{
				$xtpl->assign('selected_all', '');
			}
			
			$xtpl->assign('key', $key);
			
			$xtpl->parse('main.free_ship');
		}
	}
	else
	{
		$xtpl->assign( 'count_free_ship', 0);
		$xtpl->assign('class_free_ship', 'hidden');
		$xtpl->assign( 'free_ship_checked', '');
	}
	
	
	// self_transport
	if($row['self_transport'])
	{
		$xtpl->assign( 'self_transport_checked', 'checked=checked');
		// cấu hình vận chuyển
		$data_self_transport = json_decode($row['json_self_transport'],true);
		$xtpl->assign( 'count_self_transport', count($data_self_transport));
		
		foreach($data_self_transport as $key => $self_transport)
		{
			// khu vực
			foreach($data_kv as $kv)
			{
				$option = array(
				'id' => $kv['id'],
				'title_area' => $kv['title_area'],
				'selected' => ($kv['id'] == $self_transport['area']) ? 'selected=selected' : ''
				);
				
				$xtpl->assign('area', $option);
				$xtpl->parse('main.self_transport.area');
			}
			// tỉnh thành thuộc khu vực đó
			foreach($global_location[$self_transport['area']]['province'] as $tinhthanh)
			{
				$option = array(
				'provinceid' => $tinhthanh['provinceid'],
				'title' => $tinhthanh['title'],
				'selected' => (in_array($tinhthanh['provinceid'],$self_transport['province'])) ? 'selected=selected' : ''
				);
				
				$xtpl->assign('province', $option);
				$xtpl->parse('main.self_transport.province');
			}
			
			// tất cả tỉnh thành
			if(in_array(0,$self_transport['province']))
			{
				$xtpl->assign('selected_all', 'selected=selected');
			}
			else
			{
				$xtpl->assign('selected_all', '');
			}
			
			$price_ship = number_format($self_transport['price_ship']);
			$xtpl->assign('price_ship', $price_ship);
			$xtpl->assign('key', $key);
			
			$xtpl->parse('main.self_transport');
		}
	}
	else
	{
		$xtpl->assign( 'count_self_transport', 0);
		$xtpl->assign('class_self_transport', 'hidden');
		$xtpl->assign( 'self_transport_checked', '');
	}
	
	
	
	
	if($row['inhome']==1){
		$xtpl->assign('check_inhome', 'checked=checked');
		}else{
		$xtpl->assign('check_inhome', '');
	}
	if($row['allowed_rating']==1){
		$xtpl->assign('check_allowed_rating', 'checked=checked');
		}else{
		$xtpl->assign('check_allowed_rating', '');
	}
	if($row['showprice']==1){
		$xtpl->assign('check_showprice', 'checked=checked');
		}else{
		$xtpl->assign('check_showprice', '');
	}
	if($row['id']>0){
		$xtpl->assign('readonly', 'readonly');
		$xtpl->assign('random_num', '');
		$xtpl->assign('pointer', '');
		}else{
		$xtpl->assign('readonly', '');
		$xtpl->assign('random_num', 'random_num');
		$xtpl->assign('pointer', 'pointer');
	}
	
	$raw_product_prefix = ($global_seller['store_code']) ? $global_seller['store_code'] : $config_setting['raw_product_prefix'];
	
	
	
	$xtpl->assign('raw_product_prefix', $raw_product_prefix);
	$xtpl->assign('currentpath', NV_BASE_SITEURL. NV_UPLOADS_DIR .'/'.$module_upload. '/' . date('Y_m'));
	$list_unit_weight=get_full_unit_weight();
	foreach($list_unit_weight as $value){
		$xtpl->assign('unit_weight', array(
		'key' => $value['id'],
		'title' => $value['name_weight'].' ('.$value['symbol'].')',
		'selected' => ($value['id'] == $row['unit_weight']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.unit_weight');
	}
	$list_unit=get_full_unit();
	foreach($list_unit as $value){
		$xtpl->assign('unit_id', array(
		'key' => $value['id'],
		'title' => $value['name'],
		'selected' => ($value['id'] == $row['unit_id']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.unit_id');
	}
	$list_unit_currency=get_full_unit_currency();
	
	
	$list_unit_length=get_full_unit_length();
	foreach($list_unit_length as $value){
		$xtpl->assign('unit_length', array(
		'key' => $value['id'],
		'title' => $value['name_length'].' ('.$value['symbol'].')',
		'selected' => ($value['id'] == $row['unit_length']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.unit_length');
	}
	foreach($list_unit_length as $value){
		$xtpl->assign('unit_width', array(
		'key' => $value['id'],
		'title' => $value['name_length'].' ('.$value['symbol'].')',
		'selected' => ($value['id'] == $row['unit_width']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.unit_width');
	}
	foreach($list_unit_length as $value){
		$xtpl->assign('unit_height', array(
		'key' => $value['id'],
		'title' => $value['name_length'].' ('.$value['symbol'].')',
		'selected' => ($value['id'] == $row['unit_height']) ? ' selected="selected"' : ''));
		$xtpl->parse('main.unit_height');
	}
	if(count($row['classify'])>0)
	{
		$xtpl->assign('disabled_price', 'style="display:none"');
		
		// xử lý hiển thị danh sách thuộc tính
		
		// hiển thị tiêu đề thuộc tính
		
		$first = true;
		
		$array_data = array();
		$array_data1 = array();
		
		foreach($row['classify'] as $key=>$value){
			
			$xtpl->assign('classify', $value);
			
			$row['classify_value']=$db->query('SELECT * FROM ' . TABLE . '_product_classify_value WHERE classify_id=' . $value['id'])->fetchAll();
			
			$stt_classify_value = true;
			foreach($row['classify_value'] as $classify_value){
				
				$xtpl->assign('classify_value', $classify_value);
				
				
				// được phép xóa thuộc tính
				if(!$stt_classify_value)
				{
					$xtpl->parse('main.classify_title.classify_value.delete');
				}
				$stt_classify_value = false;
				
				// title thuộc tính
				$xtpl->parse('main.classify_title.classify_value');
				
				if($first)
				{	
					// thuộc tính hình ảnh nhóm 1
					$array_data[] = $classify_value; 
					
					if (!empty($classify_value['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload  . '/' . $classify_value['image'])) {
						
						$src_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $classify_value['image'];			
						$homeimgfile = str_replace(NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/', '',$classify_value['image']);
						
						$xtpl->assign('src_image', $src_image);
						$xtpl->assign('homeimgfile', $homeimgfile);
						
						$xtpl->parse('main.classify_title.edit_image_classify.image_classify.loop');
						
					}
					else
					{
						$xtpl->parse('main.classify_title.edit_image_classify.image_classify.add');
					}
					$xtpl->parse('main.classify_title.edit_image_classify.image_classify');
				}
				else
				{
					$array_data1[] = $classify_value; 
				}
				
			}
			
			if($first)
			{
				$xtpl->parse('main.classify_title.edit_image_classify');
			}
			
			$first = false;
			
			$xtpl->parse('main.classify_title');
			
			// tiêu đề thuộc tính sản phẩm tại bảng nhập giá
			$xtpl->parse('main.classify_title_table');
			
			
		}
		
		
		// trộn chung 2 thuộc tính sản phẩm với nhau
		
		$data_price = array();
		
		$index0 = 0;
		foreach($array_data as $classify)
		{
			$xtpl->assign('index0', $index0);
			
			$first = true;
			
			$count_children = count($array_data1);
			
			$xtpl->assign('table_classify', $classify);
			
			
			if($count_children)
			{	
				$xtpl->assign('rowspan', 'rowspan=' . $count_children);
				
				$index1 = 0;
				
				
			}
			else
			{
				
			}
			
			$index0++;
		}
		
		//print_r(json_encode($data_price));die;
		
		}else{
		$xtpl->assign('classify_class', 'hidden');
	}
	
	
	$xtpl->assign('data_price', json_encode($data_price));
	
	
	if($row['other_image']!=''){
		$row['other_image']=explode(' ,',$row['otherimage']);
		
		foreach($row['other_image'] as $key => $value){
			if (!empty($value) and is_file(NV_UPLOADS_REAL_DIR . '/' . $store['username'] . '/' . $module_upload . '/' . $value)) {
				$value = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $store['username'] . '/' . $module_upload . '/' . $value;
			}
			$xtpl->assign('LOOP', $value);
			$xtpl->assign('key', $key+1);
			$xtpl->parse('main.edit_other_image.loop');
			$xtpl->parse('main.edit_other_imagejs.loop');
		}
		$xtpl->parse('main.edit_other_image');
		$xtpl->parse('main.edit_other_imagejs');
	}
	
	if($row['listcatid']>0){
		$xtpl->parse('main.edit');
		$xtpl->parse('main.edit2');
		}else{
		$xtpl->parse('main.no_edit');
	}
	
	if (!empty($error)) {
		$xtpl->assign('ERROR', implode('<br />', $error));
		$xtpl->parse('main.error');
	}
	if (empty($row['id'])) {
		$xtpl->parse('main.auto_get_alias');
	}
	
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	if($row['id']==0){
		$page_title = $lang_module['product_add'];
		}else{
		$page_title = $lang_module['product_edit'].' có mã vạch '.$row['barcode'];
	}
	$array_mod_title[] = array(
	'catid' => 0,
	'title' => $lang_module['product'],
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/product/'
	);
	if($row['id']==0){
		$array_mod_title[] = array(
		'catid' => 0,
		'title' => $page_title,
		'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/',
		);
		}else{
		$array_mod_title[] = array(
		'catid' => 0,
		'title' => $page_title,
		'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/?id='.$row['id'],
		);
	}
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
