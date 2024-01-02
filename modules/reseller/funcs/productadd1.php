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
		$list = get_origin_select2_cat($q,$cat_id);
		
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
		//mess_error($row['barcode']);   
		$row['name_product'] = $nv_Request->get_title('name_product', 'post', '');
		$row['alias'] = change_alias($row['name_product']);	
		$row['categories_id'] = $nv_Request->get_int('categories_id', 'post', 0);
		$row['unit_weight'] = $nv_Request->get_int('unit_weight', 'post', 2);
		$row['unit_id'] = $nv_Request->get_int('unit_id', 'post', 0);
		$row['unit_currency'] = $nv_Request->get_int('unit_currency', 'post', 0);
		
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
		$row['keyword'] = $nv_Request->get_title('keyword', 'post', '');
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
		
		
		$row['classify_error']=$row['classify'];
		
		
		// xử lý lấy giá thuộc tính, giá niêm yết nhỏ nhất
		$price = 0;
		$price_special = 0;
		
		foreach($row['product_old'] as $value){
			if($row['id']==0){
				$i=1;
				$value['id1_old']=$value['id1'];
				$value['id2_old']=$value['id2'];
				foreach($row['classify'] as $key=>$value_classify){
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
				foreach($row['classify'] as $key=>$value_classify){
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
			$value['sl_tonkho']=str_replace(',','',$value['sl_tonkho']);
			$value['price_special']=str_replace(',','',$value['price_special']);
			
			if(!isset($value['status']))
			$value['status'] = 0;
			
			
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
			
			
			if($value['price']< 1000){
				mess_error('Giá bán không thể nhỏ hơn 1000');
			}
			
			if($value['price_special'] > 0 and $value['price_special'] <= $value['price']){
				mess_error('Giá niêm yết không được nhỏ hơn hoặc bằng giá bán');
			}
			
			$row['product'][]=$value;
		}
		
		
		
		
		// giá sản phẩm không có thuộc tính
		if(!$row['product_old'])
		{
			$row['price'] = $nv_Request->get_string('price', 'post', 0);
			if(empty($row['price'])){
				$row['price']=0;
				}else{
				$row['price']=str_replace(',','',$row['price']);
			}
			//mess_error($row['price']);  
			if($row['price'] < 1000){
				mess_error('Giá sản phẩm không thể nhỏ hơn 1000');
			}
			
			
			$row['price_special'] = $nv_Request->get_string('price_special', 'post', 0);
			if(empty($row['price_special'])){
				$row['price_special']=0;
				}else{
				$row['price_special']=str_replace(',','',$row['price_special']);
			}
			
			if($row['price_special'] > 0 and $row['price_special'] <= $row['price']){
				mess_error('Giá niêm yết không được nhỏ hơn hoặc bằng giá bán');
			}
			
		}
		else
		{
			$row['price']= $price;
			$row['price_special']= $price_special;
		}
		
		$row['warehouse'] = $nv_Request->get_string('warehouse', 'post', 0);
		if(empty($row['warehouse'])){
			$row['warehouse']=0;
			}else{
			$row['warehouse']=str_replace(',','',$row['warehouse']);
		}
		
		
		if(get_info_category($row['categories_id'])['parrent_id']==0){
			$row['categories_name']='<span style="font-weight:bold">'.get_info_category($row['categories_id'])['name'].'</span>';
			}else{
			$row['categories_name']='<span>&emsp;'.get_info_category($row['categories_id'])['name'].'</span>';
		}
		
		
		$row['bodytext'] = $nv_Request->get_editor('bodytext', '', NV_ALLOWED_HTML_TAGS);
		
		$row['description'] = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);
		
		
		if($row['id'] == 0){
			$check_barcode=$db->query('SELECT count(*) FROM '.TABLE.'_product where barcode='.$db->quote($row['barcode']))->fetchColumn();
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
			} elseif (empty($row['categories_id'])) {
			mess_error($lang_module['error_required_categories_id']);
			} elseif (empty($row['bodytext'])) {
			mess_error($lang_module['error_required_bodytext']);
		}
		
		//check rules
		if(mb_strlen($row['name_product']) > 100){
			mess_error('Tên sản phẩm vượt giới hạn ký tự');
		}
		
		// giới hạn kích thướt bodytext 60000
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
			
			//Xử lý lưu nhiều hình ảnh
			$list_image = array();
			
			$username = change_alias($user_info['username']);
			
			//$username = $username . '/test';
			
			
			$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username;
			
			$path_thumb = NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/shops/' . $username;
			
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
				if (!empty($otherimage) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload  . '/' . $otherimage)) {
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
			
			
			
			// xử lý hình ảnh vào thư mục upload user description, bodytext
			
			
			foreach($bodytext_array as $srcimg)
			{			
				// kiểm tra file upload đã tồn tại thì không xử lý gì hết
				$srcimg_name = str_replace( 'https://banhang.chonhagiau.com', '', $srcimg);	
				
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
					if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $srcimg)) {
						
						// thay thế src upload user
						$tim = '/data/tmp/' . $srcimg;
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $srcimg;			
						$row['bodytext'] = str_replace( $tim, $thaythe, $row['bodytext']);	
						
						// xóa file tmp
						nv_delete_images_tmp_ckeditor(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg);
					}
					
				}
				else
				{
					// hình ảnh từ server khác, tải hình ảnh từ server khác về server chonhagiau.com
					
					
					$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
					$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $file_name_img;
					
					file_put_contents($path_upload, file_get_contents($srcimg));
					
					if (file_exists($path_upload)) 
					{
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $file_name_img;	
						
						$row['bodytext'] = str_replace( $srcimg, $thaythe, $row['bodytext']);	
						
					}
					
				}
				
			}
			
			
			
			foreach($description_array as $srcimg)
			{	
				
				// kiểm tra file upload đã tồn tại thì không xử lý gì hết
				$srcimg_name = str_replace( 'https://banhang.chonhagiau.com', '', $srcimg);	
				
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
					if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $srcimg)) {
						
						// thay thế src upload user
						$tim = '/data/tmp/' . $srcimg;
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $srcimg;			
						$row['description'] = str_replace( $tim, $thaythe, $row['description']);	
						
						// xóa file tmp
						nv_delete_images_tmp_ckeditor(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $srcimg);
					}
					
				}
				else
				{
					// hình ảnh từ server khác, tải hình ảnh từ server khác về server chonhagiau.com
					
					
					$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
					$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $file_name_img;
					
					file_put_contents($path_upload, file_get_contents($srcimg));
					
					if (file_exists($path_upload)) 
					{
						$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $file_name_img;	
						
						$row['description'] = str_replace( $srcimg, $thaythe, $row['description']);	
						
					}
					
				}
				
				
			}
			
			
			try {
				if (empty($row['id'])) {
					$row['time_add'] = NV_CURRENTTIME;
					$row['user_add'] = $user_info['userid'];
					$row['inhome'] = 1;
					
					$stmt = $db->prepare('INSERT INTO ' . TABLE . '_product(origin, brand,store_id,barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product,free_ship,self_transport,unit_length,unit_height,unit_width,image, other_image, description, bodytext, keyword, tag_title, tag_description, time_add, user_add, weight,allowed_rating,showprice,price,price_special,inhome) VALUES (:origin, :brand,:store_id,:barcode, :name_product, :alias, :categories_id, :unit_id, :unit_weight,:weight_product, :length_product, :width_product, :height_product,:free_ship,:self_transport,:unit_length,:unit_height,:unit_width, :image, :other_image, :description, :bodytext, :keyword, :tag_title, :tag_description, :time_add, :user_add, :weight,:allowed_rating,:showprice,:price,:price_special,:inhome)');
					$stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
					$stmt->bindParam(':store_id', $row['store_id'], PDO::PARAM_INT);
					$stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
					$weight = $db->query('SELECT max(weight) FROM ' . TABLE . '_product')->fetchColumn();
					$weight = intval($weight) + 1;
					$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);
					$stmt->bindParam(':inhome', $row['inhome'], PDO::PARAM_INT);
					
					
					
					} else {
					
					$info_images_old = $db->query('SELECT image, other_image FROM ' . TABLE .'_product WHERE id ='. $row['id'])->fetch();
					
					$stmt = $db->prepare('UPDATE ' . TABLE . '_product SET origin = :origin,brand = :brand, barcode = :barcode, name_product = :name_product, alias = :alias, categories_id = :categories_id, weight_product = :weight_product, length_product = :length_product, width_product = :width_product, height_product = :height_product, free_ship = :free_ship, self_transport = :self_transport, image = :image, description = :description, bodytext = :bodytext,tag_title=:tag_title,tag_description=:tag_description ,keyword=:keyword,unit_id=:unit_id,unit_weight=:unit_weight,other_image=:other_image,time_edit='.NV_CURRENTTIME.',user_edit='.$user_info['userid'].',unit_length=:unit_length,unit_height=:unit_height,unit_width=:unit_width,allowed_rating=:allowed_rating,showprice=:showprice,price=:price,price_special=:price_special WHERE id=' . $row['id']);
				}
				
				$stmt->bindParam(':barcode', $row['barcode'], PDO::PARAM_STR);
				$stmt->bindParam(':name_product', $row['name_product'], PDO::PARAM_STR);
				$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
				$stmt->bindParam(':categories_id', $row['categories_id'], PDO::PARAM_INT);
				$stmt->bindParam(':weight_product', $row['weight_product'], PDO::PARAM_STR);
				$stmt->bindParam(':length_product', $row['length_product'], PDO::PARAM_STR);
				$stmt->bindParam(':width_product', $row['width_product'], PDO::PARAM_STR);
				$stmt->bindParam(':height_product', $row['height_product'], PDO::PARAM_STR);
				$stmt->bindParam(':free_ship', $row['free_ship'], PDO::PARAM_INT);
				$stmt->bindParam(':self_transport', $row['self_transport'], PDO::PARAM_INT);
				$stmt->bindParam(':image', $row['image_default'], PDO::PARAM_STR);
				$stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));
				$stmt->bindParam(':bodytext', $row['bodytext'], PDO::PARAM_STR, strlen($row['bodytext']));
				$stmt->bindParam(':unit_id', $row['unit_id'], PDO::PARAM_INT);
				$stmt->bindParam(':unit_weight', $row['unit_weight'], PDO::PARAM_INT);
				$stmt->bindParam(':unit_length', $row['unit_length'], PDO::PARAM_INT);
				$stmt->bindParam(':unit_width', $row['unit_width'], PDO::PARAM_INT);
				$stmt->bindParam(':unit_height', $row['unit_height'], PDO::PARAM_INT);
				$stmt->bindParam(':allowed_rating', $row['allowed_rating'], PDO::PARAM_INT);
				$stmt->bindParam(':showprice', $row['showprice'], PDO::PARAM_INT);
				$stmt->bindParam(':keyword', $row['keyword'], PDO::PARAM_STR);
				$stmt->bindParam(':tag_title', $row['tag_title'], PDO::PARAM_STR);
				$stmt->bindParam(':tag_description', $row['tag_description'], PDO::PARAM_STR);
				$stmt->bindParam(':other_image', $row['other_img'], PDO::PARAM_STR);
				$stmt->bindParam(':brand', $row['brand'], PDO::PARAM_INT);
				$stmt->bindParam(':origin', $row['origin'], PDO::PARAM_INT);
				$stmt->bindParam(':price', $row['price'], PDO::PARAM_INT);
				$stmt->bindParam(':price_special', $row['price_special'], PDO::PARAM_INT);
				
				$exc = $stmt->execute();
				
				
				
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['id'])) {
						
						$product_id=$db->query('SELECT max(id) FROM ' . TABLE. '_product WHERE barcode = "'. $row['barcode'] .'"')->fetchColumn();
						
						
						// xử lý nhập kho sản phẩm không có thuộc tính
						if(!$row['classify'])
						{
							$sql3 = 'INSERT INTO ' . TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
							$data_insert2 = array();
							$data_insert2['product_id'] = $product_id;
							$data_insert2['classify_id_value1'] = 0;
							$data_insert2['classify_id_value2'] = 0;
							$data_insert2['price'] = $row['price'];
							$data_insert2['price_special'] = $row['price_special'];
							$data_insert2['sl_tonkho']= $row['warehouse'];
							$data_insert2['status'] = 1;
							
							$db->insert_id($sql3, 'id', $data_insert2);
						}
						else
						{
							
							foreach($row['classify'] as $index => $value){
								$sql = 'INSERT INTO ' . TABLE .'_product_classify (name_classify,product_id,status) VALUES (:name_classify,:product_id,1)';
								$data_insert=array();
								$data_insert['name_classify'] = $value['name'];
								$data_insert['product_id']=$product_id;
								$classify_id = $db->insert_id($sql, 'id', $data_insert);
								foreach($value['value'] as $index_image => $value_list){
									$sql2 = 'INSERT INTO ' . TABLE . '_product_classify_value (classify_id,name,image,status) VALUES (:classify_id,:name,:image,1)';
									$data_insert2=array();
									$data_insert2['classify_id'] = $classify_id;
									$data_insert2['name']=$value_list;
									
									// xử lý hình ảnh thuộc tính
									$file_image = to_png($value['image'][$index_image], $path_upload, $path_thumb, $a);
									$data_insert2['image']=$file_image;
									$classify_id_value = $db->insert_id($sql2, 'id', $data_insert2);
								}
							}
							foreach($row['product'] as $value){
								$classify_id_value1=$db->query('SELECT t2.id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$product_id.' and t2.name='.$db->quote($value['id1']))->fetchColumn();
								if(!empty($value['id2'])){
									$classify_id_value2=$db->query('SELECT max(t2.id) as id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$product_id.' and t2.name='.$db->quote($value['id2']))->fetchColumn();
									}else{
									$classify_id_value2=0;
								}
								$sql3 = 'INSERT INTO ' .TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
								$data_insert2=array();
								$data_insert2['product_id'] = $product_id;
								$data_insert2['classify_id_value1'] = $classify_id_value1;
								$data_insert2['classify_id_value2']=$classify_id_value2;
								$data_insert2['price']=$value['price'];
								$data_insert2['price_special']=$value['price_special'];
								$data_insert2['sl_tonkho']=$value['sl_tonkho'];
								$data_insert2['status']=$value['status'];
								$classify_id_value_product = $db->insert_id($sql3, 'id', $data_insert2);
							}
							
						}
						
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
						
						
						// kết thúc xóa file image khi cập nhật hình ảnh nếu có
						
						
						// xử lý toàn bộ thuộc tính sản phẩm
						
						
						// lấy danh sách thuộc tính cũ
						$list_classify_old = $db->query('SELECT id FROM ' . TABLE .'_product_classify WHERE product_id ='. $row['id'])->fetchAll();
						
						
						
						// xóa thuộc tính nếu số lượng thuộc tính trước kia không giống nhau
						// số lượng thuộc tính trước sau không giống nhau nên xóa tất cả, tạo lại
						if(count($row['classify']) != count($list_classify_old))
						{
							// xóa tất cả thuộc tính giá kho cũ
							$db->query('DELETE FROM ' . TABLE .'_product_classify_value_product WHERE product_id = '. $row['id']);
						}
						
						
						if(empty($list_classify_old))
						{
							// thuộc tính cũ không có. thêm mới hoàn toàn
							foreach($row['classify'] as $value){
								$sql = 'INSERT INTO ' . TABLE .'_product_classify (name_classify,product_id,status) VALUES (:name_classify,:product_id,1)';
								$data_insert=array();
								$data_insert['name_classify'] = $value['name'];
								$data_insert['product_id']=$row['id'];
								$classify_id = $db->insert_id($sql, 'id', $data_insert);
								
								
								foreach($value['value'] as $index => $value_list){
									$sql2 = 'INSERT INTO ' . TABLE . '_product_classify_value (classify_id,name,image,status) VALUES (:classify_id,:name,:image,1)';
									$data_insert2=array();
									$data_insert2['classify_id'] = $classify_id;
									$data_insert2['name']=$value_list;
									
									// xử lý hình ảnh thuộc tính
									$file_image = to_png($value['image'][$index], $path_upload, $path_thumb, $a);
									$data_insert2['image']=$file_image;
									
									$classify_id_value = $db->insert_id($sql2, 'id', $data_insert2);
								}
							}
							
							// cập nhật giá thuộc tính
							foreach($row['product'] as $value){
								$classify_id_value1=$db->query('SELECT t2.id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$row['id'].' and t2.name='.$db->quote($value['id1']))->fetchColumn();
								if(!empty($value['id2'])){
									$classify_id_value2=$db->query('SELECT max(t2.id) as id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$product_id.' and t2.name='.$db->quote($value['id2']))->fetchColumn();
									}else{
									$classify_id_value2=0;
								}
								$sql3 = 'INSERT INTO ' .TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
								$data_insert2=array();
								$data_insert2['product_id'] = $row['id'];
								$data_insert2['classify_id_value1'] = $classify_id_value1;
								$data_insert2['classify_id_value2']=$classify_id_value2;
								$data_insert2['price']=$value['price'];
								$data_insert2['price_special']=$value['price_special'];
								$data_insert2['sl_tonkho']=$value['sl_tonkho'];
								$data_insert2['status']=$value['status'];
								$classify_id_value_product = $db->insert_id($sql3, 'id', $data_insert2);
							}
							
						}
						else
						{
							// cập nhật lại thuộc tính
							// lọc id thuộc tính
							$classify_old_array = array();
							foreach($list_classify_old as $classify_old)
							{
								$classify_old_array[] = $classify_old['id'];
							}
							
							
							
							// lọc id thuộc tính
							$classify_current = array();
							$classify_value_current = array();
							foreach($row['classify'] as $key=>$value)
							{
								$classify_current[] = $key;
								
								if($value['value'])
								{
									foreach($value['value'] as $key_v => $value_v)
									{
										$classify_value_current[] = $key_v;
									}
								}
							}			
							
							
							// xóa thuộc tính trước tầng 1
							foreach($classify_old_array as $key){		
								if(is_numeric($key)){		
									// lấy danh sách các thuộc tính con ra
									$list_con_classify = $db->query('SELECT id FROM ' . TABLE .'_product_classify_value WHERE classify_id ='. $key)->fetchAll();
									
									
									
									foreach($list_con_classify as $con_classify)
									{
										if(!in_array($con_classify['id'], $classify_value_current))
										{
											// xóa thuộc tính 1 classify_id_value1
											$db->query('DELETE FROM ' . TABLE .'_product_classify_value_product WHERE classify_id_value1 ='. $con_classify['id']);
											
											// xóa thuộc tính 2 classify_id_value2
											$db->query('DELETE FROM ' . TABLE .'_product_classify_value_product WHERE classify_id_value2 ='. $con_classify['id']);
											
											// xóa thuộc tính _product_classify_value luôn
											$db->query('DELETE FROM ' . TABLE .'_product_classify_value WHERE id ='. $con_classify['id']);
										}
									}
									
									
									
									if(!in_array($key, $classify_current ))
									{
										// xử lý xóa các thuộc tính classify
										$db->query('DELETE FROM ' . TABLE .'_product_classify WHERE product_id ='. $row['id'] .' AND id ='. $key);
										
									}
									
									
								}						
							}
							
							
							// xử lý cập nhật hay thêm thuộc tính mới tùy trường hợp
							
							foreach($row['classify'] as $key=>$value){
								if(is_numeric($key)){
									// đã tồn tại classify trên hệ thống nên cập nhật lại giá trị
									$check_classify=$db->query('SELECT count(*) FROM ' . TABLE . '_product_classify WHERE product_id ='. $row['id'] .' AND id=' .(int)$key)->fetchColumn();
									
									if($check_classify>0){
										$db->query('UPDATE ' . TABLE . '_product_classify SET name_classify='.$db->quote($value['name']).' WHERE product_id ='. $row['id'] .' AND id=' . $key);
										foreach($value['value'] as $key_list=>$value_list){
											
											$check_classify_value=$db->query('SELECT count(*) as count, t1.id FROM ' . TABLE . '_product_classify_value t1 INNER JOIN ' . TABLE . '_product_classify t2 ON t2.id=t1.classify_id WHERE t1.id=' .$key_list.' and t2.id='.$db->quote($key).' and t2.product_id='.$row['id'])->fetch();
											
											
											if($check_classify_value['count']==0){
												$sql2 = 'INSERT INTO ' . TABLE . '_product_classify_value (classify_id,name,image,status) VALUES (:classify_id,:name,:image,1)';
												$data_insert2=array();
												$data_insert2['classify_id'] = $key;
												$data_insert2['name']=$value_list;
												
												// xử lý hình ảnh thuộc tính
												$file_image = to_png($value['image'][$key_list], $path_upload, $path_thumb, $a);
												$data_insert2['image']=$file_image;
												
												$classify_id_value = $db->insert_id($sql2, 'id', $data_insert2);
												}else{
												
												// xử lý hình ảnh thuộc tính
												$file_image = to_png($value['image'][$key_list], $path_upload, $path_thumb, $a);
												
												$db->query('UPDATE ' . TABLE . '_product_classify_value SET name='.$db->quote($value_list).', image='.$db->quote($file_image).' WHERE id=' . $check_classify_value['id']);
											}
										}
									}
									else{
										
										$sql = 'INSERT INTO ' . TABLE .'_product_classify (name_classify,product_id,status) VALUES (:name_classify,:product_id,1)';
										$data_insert=array();
										$data_insert['name_classify'] = $value['name'];
										$data_insert['product_id']=$row['id'];
										$classify_id = $db->insert_id($sql, 'id', $data_insert);
										foreach($value['value'] as $key_list =>$value_list){
											$sql2 = 'INSERT INTO ' . TABLE . '_product_classify_value (classify_id,name,image,status) VALUES (:classify_id,:name,:image,1)';
											$data_insert2=array();
											$data_insert2['classify_id'] = $classify_id;
											$data_insert2['name']=$value_list;
											
											// xử lý hình ảnh thuộc tính
											$file_image = to_png($value['image'][$key_list], $path_upload, $path_thumb, $a);
											
											$data_insert2['image']=$file_image;
											$classify_id_value = $db->insert_id($sql2, 'id', $data_insert2);
										}
									}
									
								}
								else{
									
									$sql = 'INSERT INTO ' . TABLE .'_product_classify (name_classify,product_id,status) VALUES (:name_classify,:product_id,1)';
									$data_insert=array();
									$data_insert['name_classify'] = $value['name'];
									$data_insert['product_id']=$row['id'];
									$classify_id = $db->insert_id($sql, 'id', $data_insert);
									foreach($value['value'] as $key_list => $value_list){
										$sql2 = 'INSERT INTO ' . TABLE . '_product_classify_value (classify_id,name,image,status) VALUES (:classify_id,:name,:image,1)';
										$data_insert2=array();
										$data_insert2['classify_id'] = $classify_id;
										$data_insert2['name']=$value_list;
										
										// xử lý hình ảnh thuộc tính
										$file_image = to_png($value['image'][$key_list], $path_upload, $path_thumb, $a);
										$data_insert2['image']=$file_image;
										
										$classify_id_value = $db->insert_id($sql2, 'id', $data_insert2);
									}
								}
							}
							
							
							// cập nhật giá thuộc tính
							foreach($row['product'] as $value){
								
								if(!empty($value['id2_old'])){
									$check=$db->query('SELECT count(*) FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1=' . $value['id1_old'].' and classify_id_value2='.$value['id2_old'])->fetchColumn();
									
									
									if($check==0){
										$classify_id_value1=$db->query('SELECT t2.id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$row['id'].' and t2.name='.$db->quote($value['id1']))->fetchColumn();
										
										
										
										if(!empty($value['id2'])){
											$classify_id_value2=$db->query('SELECT max(t2.id) as id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$row['id'].' and t2.name='.$db->quote($value['id2']))->fetchColumn();
											}else{
											$classify_id_value2=0;
										}
										
										$sql3 = 'INSERT INTO ' .TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
										$data_insert2=array();
										$data_insert2['product_id'] = $row['id'];
										$data_insert2['classify_id_value1'] = $classify_id_value1;
										$data_insert2['classify_id_value2']=$classify_id_value2;
										$data_insert2['price']=$value['price'];
										$data_insert2['price_special']=$value['price_special'];
										$data_insert2['sl_tonkho']=$value['sl_tonkho'];
										$data_insert2['status']=$value['status'];
										$classify_id_value_product = $db->insert_id($sql3, 'id', $data_insert2);
										}else{
										
										$db->query('UPDATE ' . TABLE . '_product_classify_value_product SET price='.$value['price'].',price_special="'.$value['price_special'].'",sl_tonkho='.$value['sl_tonkho'].',status='.$value['status'].' WHERE classify_id_value1=' . $value['id1_old'].' and classify_id_value2='.$value['id2_old']);
									}
									}else{
									$check=$db->query('SELECT count(*) FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1=' . $value['id1_old'].' and classify_id_value2=0')->fetchColumn();
									
									
									
									if($check==0){
										$classify_id_value1=$db->query('SELECT t2.id FROM  ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id where t1.product_id='.$row['id'].' and t2.name='.$db->quote($value['id1']))->fetchColumn();
										
										$classify_id_value2=0;
										$sql3 = 'INSERT INTO ' .TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
										$data_insert2=array();
										$data_insert2['product_id'] = $row['id'];
										$data_insert2['classify_id_value1'] = $classify_id_value1;
										$data_insert2['classify_id_value2']=$classify_id_value2;
										$data_insert2['price']=$value['price'];
										$data_insert2['price_special']=$value['price_special'];
										$data_insert2['sl_tonkho']=$value['sl_tonkho'];
										$data_insert2['status']=$value['status'];
										
										$classify_id_value_product = $db->insert_id($sql3, 'id', $data_insert2);
										}else{
										
										//tonkho thuoc tinh
										$db->query('UPDATE ' . TABLE . '_product_classify_value_product SET price='.$value['price'].',price_special="'.$value['price_special'].'",sl_tonkho='.$value['sl_tonkho'].',status='.$value['status'].' WHERE classify_id_value1=' . $value['id1_old'].' and classify_id_value2=0');
										
									}
									
								}
							}
							
						}
						
						// xử lý nhập kho sản phẩm không có thuộc tính
						if(!$row['classify'])
						{
							// kiểm tra kho tồn tại chưa
							$check_store = $db->query('SELECT count(*) as count FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1 = 0 AND classify_id_value2 = 0 AND product_id =' . $row['id'])->fetchColumn();
							
							if(!$check_store)
							{
								$sql3 = 'INSERT INTO ' . TABLE . '_product_classify_value_product (product_id,classify_id_value1,classify_id_value2,price,price_special,sl_tonkho,status) VALUES (:product_id,:classify_id_value1,:classify_id_value2,:price,:price_special,:sl_tonkho,:status)';
								$data_insert2 = array();
								$data_insert2['product_id'] = $row['id'];
								$data_insert2['classify_id_value1'] = 0;
								$data_insert2['classify_id_value2'] = 0;
								$data_insert2['price'] = $row['price'];
								$data_insert2['price_special'] = $row['price_special'];
								$data_insert2['sl_tonkho']= $row['warehouse'];
								$data_insert2['status'] = 1;
								
								$db->insert_id($sql3, 'id', $data_insert2);
							}
							else
							{
								// cập nhật kho
								$db->query('UPDATE ' . TABLE . '_product_classify_value_product SET price='.$row['price'].',price_special="'.$row['price_special'].'",sl_tonkho='.$row['warehouse'].',status=1 WHERE classify_id_value1=0 AND classify_id_value2=0 AND product_id ='. $row['id']);
							}
						}
						
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
		$row = $db->query('SELECT * FROM ' . TABLE . '_product WHERE id=' . $row['id'])->fetch();
		if(get_info_category($row['categories_id'])['parrent_id']==0){
			$row['categories_name']='<span style="font-weight:bold">'.get_info_category($row['categories_id'])['name'].'</span>';
			}else{
			$row['categories_name']='<span>&emsp;'.get_info_category($row['categories_id'])['name'].'</span>';
		}
		$row['brand_name']=get_info_brand($row['brand'])['title'];
		$row['origin_name']=get_info_orgin($row['origin'])['title'];
		$row['price']=number_format($row['price']);
		//print_r($row);die;
		if(!$row['price_special'])
		$row['price_special'] = '';
		else
		$row['price_special']=number_format($row['price_special']);
		
		
		
		
		// lấy thông tin tồn kho không có thuộc tính
		
		$row['warehouse'] = $db->query('SELECT sl_tonkho FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1 = 0 AND classify_id_value2 = 0 AND product_id =' . $row['id'])->fetchColumn();
		
		if(!$row['warehouse'])
		$row['warehouse'] = '';
		else
		$row['warehouse']=number_format($row['warehouse']);
		
		
		
		$row['classify']=$db->query('SELECT * FROM ' . TABLE . '_product_classify WHERE product_id=' . $row['id'])->fetchAll();
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
	}
	// if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['image'])) {
	// 	$row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/'. $row['image'];
	// }
	if (defined('NV_EDITOR'))
	require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
	
	
	
	$row['bodytext'] = nv_htmlspecialchars(nv_editor_br2nl($row['bodytext']));
	if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
		$row['bodytext'] = nv_aleditor('bodytext', '100%', '300px', $row['bodytext']);
		} else {
		$row['bodytext'] = '<textarea style="width:100%;height:300px" name="bodytext">' . $row['bodytext'] . '</textarea>';
	}
	
	
	$row['description'] = nv_htmlspecialchars(nv_editor_br2nl($row['description']));
	if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
		$row['description'] = nv_aleditor('description', '100%', '300px', $row['description']);
		} else {
		$row['description'] = '<textarea style="width:100%;height:300px" name="description">' . $row['description'] . '</textarea>';
	}
	
	
	$xtpl = new XTemplate('product_add1.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	
	
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
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	
	
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
	
	
	$array_cat_list = category_html_select(0);
	
	foreach ($array_cat_list as $rows_i) {
		
		$sl = ($rows_i['id'] == $row['categories_id']) ? " selected=\"selected\"" : "";
		$xtpl->assign('pcatid_i', $rows_i['id']);
		$xtpl->assign('ptitle_i', $rows_i['text']);
		$xtpl->assign('pselect', $sl);
		$xtpl->parse('main.parent_loop');
	}
	
	if($row['other_image'] || $row['image']){
		$array_otherimage = array();
		$array_otherimage = explode(",", $row['other_image']);
		$list_image=array();
		$list_image[]['image'] = $row['image'];
		if($row['other_image']){
			foreach ($array_otherimage as $key => $value) {
				$list_image[]['image']=$value;
			}
		}
		$i = 10;
		
		foreach ($list_image as $otherimage) {
			$otherimage['number'] = $i;
			$otherimage['filepath'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $otherimage['image'];
			
			$otherimage['homeimgfile'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' .$otherimage['image'];
			$otherimage['homeimgfile'] = str_replace(NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/', '',$otherimage['image']);
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
		if (!empty($list_image[$i]['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload  . '/' . $list_image[$i]['image'])) {
			
			$src_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $list_image[$i]['image'];			
			$homeimgfile = str_replace(NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/', '',$list_image[$i]['image']);
			
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
	$xtpl->assign('UPLOAD_DIR', NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name);
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
		$list_cat = get_categories_select2_full("",IDSITE);
		
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
	}
	else
	{
		$xtpl->assign( 'free_ship_checked', '');
	}
	
	
	// self_transport
	if($row['self_transport'])
	{
		$xtpl->assign( 'self_transport_checked', 'checked=checked');
	}
	else
	{
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
				
				foreach($array_data1 as $classify1)
				{
				
					// có đầy đủ 2 thuộc tính
					
					$xtpl->assign('index1', $index1);
					
					$price = $db->query('SELECT price, price_special, sl_tonkho, status FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1=' . $classify['id'].' and classify_id_value2=' . $classify1['id'])->fetch();
					
					$classify1['price']=number_format($price['price']);
					
					if(!$price['price_special'])
					$classify1['price_special'] = '';
					else
					$classify1['price_special']=number_format($price['price_special']);
					
					$classify1['sl_tonkho']=number_format($price['sl_tonkho']);
					
					if($price['status'])
					{
						$classify1['checked'] = 'checked=checked';
					}
					else
					{
						$classify1['checked'] = '';
					}
					
					$data = array();
					$data['id1'] = $classify['id'];
					$data['id2'] = $classify1['id'];
					$data['price'] = $classify1['price'];
					$data['price_special'] = $classify1['price_special'];
					$data['sl_tonkho'] = $classify1['sl_tonkho'];
					$data['status'] = $price['status'];
					
					$data_price[] = $data;
					
					$xtpl->assign('table_classify1', $classify1);
					
					if($first)
					{
						$xtpl->parse('main.classify_table.loop_classify');
					}
					
					$first = false;
					
					$xtpl->parse('main.classify_table');
					
					$index1++;
				}
			}
			else
			{
				$price = $db->query('SELECT price, price_special, sl_tonkho, status FROM ' . TABLE . '_product_classify_value_product WHERE classify_id_value1=' . $classify['id'].' and classify_id_value2=0')->fetch();
				
				$classify1['price']=number_format($price['price']);
				
				if(!$price['price_special'])
				$classify1['price_special'] = '';
				else
				$classify1['price_special']=number_format($price['price_special']);
				
				$classify1['sl_tonkho']=number_format($price['sl_tonkho']);
				
				if($price['status'])
				{
					$classify1['checked'] = 'checked=checked';
				}
				else
				{
					$classify1['checked'] = '';
				}
				
				
				$data = array();
				$data['id1'] = $classify['id'];
				$data['id2'] = 0;
				$data['price'] = $classify1['price'];
				$data['price_special'] = $classify1['price_special'];
				$data['sl_tonkho'] = $classify1['sl_tonkho'];
				$data['status'] = $price['status'];
				
				$data_price[] = $data;
				
				$xtpl->assign('table_classify1', $classify1);
				
				$xtpl->parse('main.classify_table_one');
			}
			
			$index0++;
		}
		
		//print_r(json_encode($data_price));die;
		
		}else{
		$xtpl->assign('classify_class', 'hidden');
	}
	
	
	
	$xtpl->assign('data_price', json_encode($data_price));
	
	
	if($row['other_image']!=''){
		$row['other_image']=explode(' ,',$row['other_image']);
		
		foreach($row['other_image'] as $key => $value){
			if (!empty($value) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $value)) {
				$value = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $value;
			}
			$xtpl->assign('LOOP', $value);
			$xtpl->assign('key', $key+1);
			$xtpl->parse('main.edit_other_image.loop');
			$xtpl->parse('main.edit_other_imagejs.loop');
		}
		$xtpl->parse('main.edit_other_image');
		$xtpl->parse('main.edit_other_imagejs');
	}
	
	if($row['categories_id']>0){
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
