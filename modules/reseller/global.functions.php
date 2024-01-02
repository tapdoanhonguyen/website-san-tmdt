<?php

define('IDSITE', $global_config['idsite']);
define('TABLE', $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_shops');
define('NV_TABLE_PROVINCE', $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_location_province');
define('NV_TABLE_DISTRICT', $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_location_district');
define('NV_TABLE_WARD', $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_location_ward');

// thông tin seller
if (defined('NV_IS_USER')) {
	$global_seller = $db->query("SELECT * FROM " . TABLE . "_seller_management WHERE userid =" . $user_info['userid'])->fetch();
}

$global_status_order = $nv_Cache->db("SELECT * FROM " . TABLE . "_status_order", 'status_id', $module_name);

// Loại sản phẩm
$sql = 'SELECT catid, parentid, lev, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_title_custom AS title_custom, ' . NV_LANG_DATA . '_alias AS alias, viewcat, numsubcat, subcatid, newday, typeprice, form, group_price, viewdescriptionhtml, numlinks, ' . NV_LANG_DATA . '_description AS description, ' . NV_LANG_DATA . '_descriptionhtml AS descriptionhtml, inhome, ' . NV_LANG_DATA . '_keywords AS keywords, ' . NV_LANG_DATA . '_tag_description AS tag_description, groups_view, cat_allow_point, cat_number_point, cat_number_product, image FROM ' . TABLE . '_catalogs ORDER BY sort ASC';
$global_array_shops_cat = $nv_Cache->db($sql, 'catid', $module_name);

// Nhóm sản phẩm
$sql = 'SELECT groupid, parentid, lev, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, viewgroup, numsubgroup, subgroupid, ' . NV_LANG_DATA . '_description AS description, inhome, indetail, in_order, ' . NV_LANG_DATA . '_keywords AS keywords, numpro, image, is_require FROM ' . TABLE . '_group ORDER BY sort ASC';
$global_array_group = $nv_Cache->db($sql, 'groupid', $module_name);

// Lay ty gia ngoai te
$sql = 'SELECT code, currency, symbol, exchange, round, number_format FROM ' . TABLE . '_money_' . NV_LANG_DATA;
$cache_file = NV_LANG_DATA . '_' . md5($sql) . '_' . NV_CACHE_PREFIX . '.cache';
if (($cache = $nv_Cache->getItem($module_name, $cache_file)) != false) {
    $money_config = unserialize($cache);
} else {
    $money_config = [];
    $result = $db->query($sql);
    while ($row = $result->fetch()) {
        $money_config[$row['code']] = [
            'code' => $row['code'],
            'currency' => $row['currency'],
            'symbol' => $row['symbol'],
            'exchange' => $row['exchange'],
            'round' => $row['round'],
            'number_format' => $row['number_format'],
            'decimals' => $row['round'] > 1 ? $row['round'] : strlen($row['round']) - 2,
            'is_config' => ($row['code'] == $pro_config['money_unit']) ? 1 : 0
        ];
    }
    $result->closeCursor();

    $cache = serialize($money_config);
    $nv_Cache->setItem($module_name, $cache_file, $cache);
}

// Lay don vi khoi luong
$sql = 'SELECT code, title, exchange, round FROM ' . TABLE . '_weight_' . NV_LANG_DATA;

$cache_file = NV_LANG_DATA . '_' . md5($sql) . '_' . NV_CACHE_PREFIX . '.cache';
if (($cache = $nv_Cache->getItem($module_name, $cache_file)) != false) {
    $weight_config = unserialize($cache);
} else {
    $weight_config = array();
    $result = $db->query($sql);
    while ($row = $result->fetch()) {
        $weight_config[$row['code']] = array(
            'code' => $row['code'],
            'title' => $row['title'],
            'exchange' => $row['exchange'],
            'round' => $row['round'],
            'decimals' => $row['round'] > 1 ? $row['round'] : strlen($row['round']) - 2,
            'is_config' => ($row['code'] == $pro_config['weight_unit']) ? 1 : 0
        );
    }
    $result->closeCursor();

    $cache = serialize($weight_config);
    $nv_Cache->setItem($module_name, $cache_file, $cache);
}

// Lay dia diem
$sql = 'SELECT * FROM ' . TABLE . '_location ORDER BY sort ASC';
$array_location = $nv_Cache->db($sql, 'id', $module_name);

// Lay nha van chuyen
$sql = 'SELECT * FROM ' . TABLE . '_carrier WHERE status = 1 ORDER BY weight ASC';
$array_carrier = $nv_Cache->db($sql, 'id', $module_name);

// Lay cua hang
$sql = 'SELECT * FROM ' . TABLE . '_shops WHERE status = 1 ORDER BY weight ASC';
$array_shops = $nv_Cache->db($sql, 'id', $module_name);

// Lay Giam Gia
$sql = 'SELECT did, title, begin_time, end_time, config FROM ' . TABLE . '_discounts';
$cache_file = NV_LANG_DATA . '_' . md5($sql) . '_' . NV_CACHE_PREFIX . '.cache';
if (($cache = $nv_Cache->getItem($module_name, $cache_file)) != false) {
    $discounts_config = unserialize($cache);
} else {
    $discounts_config = array();
    $result = $db->query($sql);
    while ($row = $result->fetch()) {
        $discounts_config[$row['did']] = array(
            'title' => $row['title'],
            'begin_time' => $row['begin_time'],
            'end_time' => $row['end_time'],
            'config' => unserialize($row['config'])
        );
    }
    $result->closeCursor();

    $cache = serialize($discounts_config);
    $nv_Cache->setItem($module_name, $cache_file, $cache);
}




//gửi mail cho khách và admin  thông báo đơn hàng giao thất bại
function send_mail_order_delivery_failed($order)
{
	global $db, $db_config, $lang_module, $config_setting, $global_config,$global_payport;

	// lấy danh sách sản phẩm của đơn hàng
	$list_product = $db->query('SELECT product_id, quantity, classify_value_product_id, quantity, price FROM ' . TABLE . '_order_item WHERE order_id =' . $order['id'])->fetchAll();

	if ($order['transporters_id']) {
		$order['name_transporters'] = $db->query('SELECT name_transporters FROM ' . TABLE . '_transporters WHERE id =' . $order['transporters_id'])->fetchColumn();
	} else {
		$order['name_transporters'] = $lang_module['tranposter_tugiao'];
	}

	// Gui mail thong bao den khach hang
	$data_order['id'] = $order['id'];
	$info_order = $order;
	
	$info_order['payment_method_name'] = $global_payport[$info_order['payment_method']]['paymentname'];
	$data_order['order_code'] = $order['order_code'];

	$email_title = $lang_module['mail_order_delivered_fail'];
	$email_contents = call_user_func('email_order_delivered_fail_khach', $data_order, $list_product, $info_order);

	nv_sendmail(array(
		$global_config['site_name'],
		$global_config['site_email']
	), $order['email'], sprintf($email_title, $data_order['order_code']), $email_contents);

	// Gui mail thong bao den nhà admin
	$email_contents = call_user_func('email_order_delivered_fail_admin', $data_order, $list_product, $info_order);
	$email_title = $lang_module['mail_order_delivered_fail'];
	nv_sendmail(array(
		$global_config['site_name'],
		$global_config['site_email']
	), $config_setting['email_get_not_received'], sprintf($email_title, $data_order['order_code']), $email_contents);
	return true;
}

// lấy tất cả category đưa vào redis
function get_payment_all()
{
	global $db, $module_name, $module_upload;
	
	$list_payment = $db->query('SELECT * FROM ' . TABLE .'_payment WHERE active = 1 ORDER BY weight ASC')->fetchAll();
	
	
	$arr_temp = array();
	
	foreach($list_payment as $value)
	{
		$arr_temp[$value['payment']] = $value;
	}
	
	return $arr_temp;
}

//gửi mail thông báo giao đơn thành công cho khách khi seller bấm xác nhận giao hàng thành công
function send_mail_order_delivered($order)
{
	global $db, $db_config, $lang_module,$global_payport;

	// lấy danh sách sản phẩm của đơn hàng
	$list_product = $db->query('SELECT product_id, quantity, classify_value_product_id, quantity, price FROM ' . TABLE . '_order_item WHERE order_id =' . $order['id'])->fetchAll();

	if ($order['transporters_id']) {
		$order['name_transporters'] = $db->query('SELECT name_transporters FROM ' . TABLE . '_transporters WHERE id =' . $order['transporters_id'])->fetchColumn();
	} else {
		$order['name_transporters'] = $lang_module['tranposter_tugiao'];
	}

	// Gui mail thong bao den khach hang
	$data_order['id'] = $order['id'];
	$info_order = $order;
	$info_order['payment_method_name'] = $global_payport[$info_order['payment_method']]['paymentname'];
	$data_order['order_code'] = $order['order_code'];
	$info_shop = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE id = ' . $order['store_id'])->fetch();

	$email_title = 'Thông báo đơn hàng giao thành công';
	$email_contents = call_user_func('mail_order_delivered_khach', $data_order, $list_product, $info_order);

	nv_sendmail(array(
		$global_config['site_name'],
		$global_config['site_email']
	), $order['email'], sprintf($email_title, $data_order['order_code']), $email_contents);
	return true;
}


//kiểm tra user đã đăng nhập chưa và đơn hàng này có phải của user đó k
function check_order($order_id)
{

	global $db, $user_info, $store_id;

	if (!defined('NV_IS_USER')) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	$check_order = $db->query("SELECT id FROM " . TABLE . "_order WHERE store_id = " . $store_id . " AND id = " . $order_id)->fetchColumn();
	if (!$check_order) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	return true;
}

// lấy tất cả sp theo id trong mảng excel
function get_product_from_excel_edit($id, $sheetData){
	$list_product = array();
	for($i = 1; $i < count($sheetData); $i++){
		if($sheetData[$i][3] == $id){
			// số thứ tự
			$product['serial'] = $sheetData[$i][0];
			
			// trạng thái sản phẩm
			$product['inhome'] = $sheetData[$i][1];
			
			// tên sản phẩm
			$product['name'] = $sheetData[$i][2];
			
			// mã sản phẩm
			$product['barcode'] = $sheetData[$i][3];
			
			// chuyên mục
			$product['category'] = $sheetData[$i][4];
			
			// thương hiệu
			$product['brand'] = $sheetData[$i][5];
			
			// xuất xứ
			$product['origin'] = $sheetData[$i][6];
			
			// khối lượng
			$product['weight'] = $sheetData[$i][7];
			
			// dài
			$product['length'] = $sheetData[$i][8];
			
			// rộng
			$product['width'] = $sheetData[$i][9];
			
			// cao
			$product['height'] = $sheetData[$i][10];
			
			// id thuộc tính
			$product['classify_id'] = $sheetData[$i][11];
			
			// tên phân loại 1
			$product['classify_1'] = $sheetData[$i][12];
			
			// tên tùy chọn 1
			$product['option_1_name'] = $sheetData[$i][13];
			
			// hình ảnh phân loại 1
			$product['option_1_image'] = $sheetData[$i][14];
			
			// tên phân loại 2
			$product['classify_2'] = $sheetData[$i][15];
			
			// tên tùy chọn 2
			$product['option_2_name'] = $sheetData[$i][16];
			
			// giá niêm yết
			$product['price_special'] = $sheetData[$i][17];
			
			// giá bán
			$product['price'] = $sheetData[$i][18];
			
			// số lượng tồn kho
			$product['sl_tonkho'] = $sheetData[$i][19];
			
			// // mã sku
			// $product['sku'] = $sheetData[$i][20];
			
			// hình ảnh 1
			$product['image_1'] = $sheetData[$i][20];
			
			// hình ảnh 2
			$product['image_2'] = $sheetData[$i][21];
			
			// hình ảnh 3
			$product['image_3'] = $sheetData[$i][22];
			
			// hình ảnh 4
			$product['image_4'] = $sheetData[$i][23];
			
			// hình ảnh 5
			$product['image_5'] = $sheetData[$i][24];
			
			// hình ảnh 6
			$product['image_6'] = $sheetData[$i][25];
			
			// hình ảnh 7
			$product['image_7'] = $sheetData[$i][26];
			
			// hình ảnh 8
			$product['image_8'] = $sheetData[$i][27];
			
			// mô tả sản phẩm
			//$product['description'] = $sheetData[$i][28];
			
			// thông số kỹ thuật
			//$product['detail'] = $sheetData[$i][29];

			//xóa khoảng trắng
			delete_space($product);
			
			$list_product[] = $product;
		}
	}
	return $list_product;
}

function delete_space($product){
	$arr_key[] = 'serial';
	$arr_key[] = 'inhome';
	$arr_key[] = 'name';
	$arr_key[] = 'barcode';
	$arr_key[] = 'category';
	$arr_key[] = 'brand';
	$arr_key[] = 'origin';
	$arr_key[] = 'weight';
	$arr_key[] = 'length';
	$arr_key[] = 'width';
	$arr_key[] = 'length';
	$arr_key[] = 'height';
	$arr_key[] = 'classify_id';
	$arr_key[] = 'classify_1';
	$arr_key[] = 'option_1_name';
	$arr_key[] = 'option_1_image';
	$arr_key[] = 'classify_2';
	$arr_key[] = 'option_2_name';
	$arr_key[] = 'price_special';
	$arr_key[] = 'price';
	$arr_key[] = 'sl_tonkho';
	$arr_key[] = 'image_1';
	$arr_key[] = 'image_2';
	$arr_key[] = 'image_3';
	$arr_key[] = 'image_4';
	$arr_key[] = 'image_5';
	$arr_key[] = 'image_6';
	$arr_key[] = 'image_7';
	$arr_key[] = 'image_8';
	$arr_key[] = 'description';
	$arr_key[] = 'detail';

	foreach($arr_key as $key){
		$product[$key] = trim($product[$key]);
	}
}

// xử lý dữ liệu xuất edit ra product
function get_product_edit_formated($id, $sheetData, $store_id){
	global $db;
	$product_temp = get_product_from_excel_edit($id, $sheetData);
	//print('<pre>' . print_r($product_temp, true) . '</pre>');
	
	$list_inhome['Đã ẩn'] = 0;
	$list_inhome['Hiển thị'] = 1;
	$list_inhome['Bị khóa'] = -1;
	
	// số thứ tự
	$product['serial'] = get_value_by_key('serial', $product_temp);
	
	// trạng thái sản phẩm
	// if($id){
	// 	$product['status'] = $db->query('SELECT inhome FROM '. TABLE . '_product where barcode = "'. $id . '"')->fetchColumn();
	// };
	$product['inhome'] = $list_inhome[get_value_by_key('inhome', $product_temp)];
	
	// mã sản phẩm
	$product['barcode'] = get_value_by_key('barcode', $product_temp);
	
	// id sản phẩm
	if($store_id AND $product['barcode']){
		$product['id'] = $db->query('SELECT id FROM '. TABLE . '_product WHERE store_id = '. $store_id .' AND barcode = "'. $product['barcode'] .'" AND status = 1')->fetchColumn();
	}
	if(!$product['id']) return $product;
	
	// tên sản phẩm
	$product['name_product'] = get_value_by_key('name', $product_temp);
	
	// alias
	$product['alias'] = change_alias($product['name_product']);
	// chuyên mục
	$product['category'] = get_value_by_key('category', $product_temp);
	
	// thương hiệu
	$product['brand'] = get_value_by_key('brand', $product_temp);
	
	// xuất xứ
	$product['origin'] = get_value_by_key('origin', $product_temp);
	
	// khối lượng
	$product['weight_product'] = get_value_by_key('weight', $product_temp);
	
	// dài
	$product['length_product'] = get_value_by_key('length', $product_temp);
	$product['length_product'] = is_numeric($product['length_product']) ? $product['length_product'] : 0;
	
	// rộng
	$product['width_product'] = get_value_by_key('width', $product_temp);
	$product['width_product'] = is_numeric($product['width_product']) ? $product['width_product'] : 0;
	
	// cao
	$product['height_product'] = get_value_by_key('height', $product_temp);
	$product['height_product'] = is_numeric($product['height_product']) ? $product['height_product'] : 0;
	
	//lấy danh sách các tùy chọn thuộc tính
	foreach($product_temp as $item){
		if($item['classify_1']){
			$classify_value_1_temp[] = $item['option_1_name'];
		}
		if($item['classify_2'])
		$classify_value_2_temp[] = $item['option_2_name'];
	}
	
	//print('<pre>' . print_r($product_temp, true) . '</pre>');die;
	// tên phân loại 1
	if($classify_value_1_temp){
		$classify_1['name'] = get_value_by_key('classify_1', $product_temp);
		$classify_1['value'] = array_unique($classify_value_1_temp);
		$product['classify_1'] = $classify_1;
	}
	// tên phân loại 2
	if($classify_value_2_temp){
		$classify_2['name'] = get_value_by_key('classify_2', $product_temp);
		$classify_2['value'] = array_unique($classify_value_2_temp);
		$product['classify_2'] = $classify_2;
	}
	
	// Giá theo thuộc tính
	if(!$product['classify_2']){ // neu khong co thuoc tinh 2
		if(!$product['classify_1']){ // neu khong co thuoc tinh 1 -> sp khong co thuoc tinh
			$product['price'] = get_value_by_key('price', $product_temp);
			$product['price'] = str_replace(',', '', $product['price']);
			$product['price'] = is_numeric($product['price']) ? $product['price'] : 0;
			
			$product['price_special'] = get_value_by_key('price_special', $product_temp);
			$product['price_special'] = str_replace(',', '', $product['price_special']);
			$product['price_special'] = is_numeric($product['price_special']) ? $product['price_special'] : 0;
			
			$product['sl_tonkho'] = get_value_by_key('sl_tonkho', $product_temp);
			$product['sl_tonkho'] = str_replace(',', '', $product['sl_tonkho']);
			$product['sl_tonkho'] = is_numeric($product['sl_tonkho']) ? $product['sl_tonkho'] : 0;
			
			} else { // co thuoc tinh 1
			foreach($product_temp as $item){
				$item['classify_1'] = $item['classify_1'] ? $item['classify_1'] : 'null';
				$item['option_1_name'] = $item['option_1_name'] ? $item['option_1_name'] : 'null';
				if($product['id']){
					$classify_value_product['option_1_id'] = $db->query('SELECT t1.id FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t2.product_id = '. $product['id'] . ' AND t2.name_classify = "'. $item['classify_1']. '" AND t1.name = "' . $item['option_1_name'] . '"')->fetchColumn();
				}
				$classify_value_product['code'] =  $item['classify_id'];
				$classify_value_product['option_2_id'] =  0;
				$classify_value_product['option_1_name'] =  $item['option_1_name'];
				$classify_value_product['option_1_image'] =  $item['option_1_image'];
				
				$classify_value_product['price'] =  trim($item['price']);
				$classify_value_product['price'] = str_replace(',', '', $classify_value_product['price']);
				$classify_value_product['price'] = is_numeric($classify_value_product['price']) ? $classify_value_product['price'] : 0;
				
				$classify_value_product['price_special'] =  trim($item['price_special']);
				$classify_value_product['price_special'] = str_replace(',', '', $classify_value_product['price_special']);
				$classify_value_product['price_special'] = is_numeric($classify_value_product['price_special']) ? $classify_value_product['price_special'] : 0;
				
				$classify_value_product['sl_tonkho'] = trim( $item['sl_tonkho']);
				$classify_value_product['sl_tonkho'] = str_replace(',', '', $classify_value_product['sl_tonkho']);
				$classify_value_product['sl_tonkho'] =  is_numeric($classify_value_product['sl_tonkho']) ? $classify_value_product['sl_tonkho'] : 0;
				
				
				if($product['price'] < $item['price']){
					$product['price'] = $item['price'];
					$product['price_special'] = $item['price_special'];
				}
				$product['classify_value_product'][] = $classify_value_product;
			}
		}
		} else{ // co 2 thuoc tinh
		$product['price'] = 0;
		foreach($product_temp as $item){
			$classify_value_product['option_1_name'] =  $item['option_1_name'];
			$classify_value_product['code'] =  $item['classify_id'];
			if($product['id']){
				$item['classify_1'] = $item['classify_1'] ? $item['classify_1'] : 'null';
				$item['option_1_name'] = $item['option_1_name'] ? $item['option_1_name'] : 'null';
				$classify_value_product['option_1_id'] = $db->query('SELECT t1.id FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t2.product_id = '. $product['id'] . ' AND t2.name_classify = "'. $item['classify_1']. '" AND t1.name = "' . $item['option_1_name'] . '"')->fetchColumn();
				$item['classify_2'] = $item['classify_2'] ? $item['classify_2'] : 'null';
				$item['option_2_name'] = $item['option_2_name'] ? $item['option_2_name'] : 'null';
				$classify_value_product['option_2_id'] = $db->query('SELECT t1.id FROM '. TABLE .'_product_classify_value t1 INNER JOIN '. TABLE .'_product_classify t2 ON t1.classify_id = t2.id WHERE t2.product_id = '. $product['id'] . ' AND t2.name_classify = "'. $item['classify_2']. '" AND t1.name = "' . $item['option_2_name'] . '"')->fetchColumn();
			}
			$classify_value_product['option_1_image'] =  $item['option_1_image'];
			$classify_value_product['option_2_name'] =  $item['option_2_name'];
			
			$classify_value_product['price'] =  trim($item['price']);
			$classify_value_product['price'] = str_replace(',', '', $classify_value_product['price']);
			$classify_value_product['price'] = is_numeric($classify_value_product['price']) ? $classify_value_product['price'] : 0;
			
			$classify_value_product['price_special'] =  trim($item['price_special']);
			$classify_value_product['price_special'] = str_replace(',', '', $classify_value_product['price_special']);
			$classify_value_product['price_special'] = is_numeric($classify_value_product['price_special']) ? $classify_value_product['price_special'] : 0;
			
			$classify_value_product['sl_tonkho'] =  trim($item['sl_tonkho']);
			$classify_value_product['sl_tonkho'] = str_replace(',', '', $classify_value_product['sl_tonkho']);
			$classify_value_product['sl_tonkho'] =  is_numeric($classify_value_product['sl_tonkho']) ? $classify_value_product['sl_tonkho'] : 0;
			
			
			if($product['price'] < $item['price']){
				$product['price'] = $item['price'];
				$product['price_special'] = $item['price_special'];
			}
			$product['classify_value_product'][] = $classify_value_product;
		}
	}
	
	// mã sku
	$product['sku'] = get_value_by_key('sku', $product_temp);
	
	// hình ảnh chính
	$product['image'] = get_value_by_key('image_1', $product_temp);
	
	// hình ảnh khác
	$arr = array();
	for($i = 2; $i<=8; $i++){
		$img = get_value_by_key('image_'. $i, $product_temp);
		if($img){
			$arr[] = $img;
		}
	}
	$product['other_image'] = implode(',', $arr);
	
	// mô tả sản phẩm
	$product['bodytext'] = get_value_by_key('description', $product_temp);
	
	// thông số kỹ thuật
	$product['description'] = get_value_by_key('detail', $product_temp);
	
	return $product;
}


// lấy tất cả sp theo id trong mảng excel
function get_product_from_excel($id, $sheetData){
	$list_product = array();
	for($i = 1; $i < count($sheetData); $i++){
		if($sheetData[$i][2] == $id){
			// số thứ tự
			$product['serial'] = $sheetData[$i][0];
			
			// tên sản phẩm
			$product['name'] = $sheetData[$i][1];
			
			// mã sản phẩm
			$product['barcode'] = $sheetData[$i][2];
			
			// chuyên mục
			$product['category'] = $sheetData[$i][3];
			
			// thương hiệu
			$product['brand'] = $sheetData[$i][4];
			
			// xuất xứ
			$product['origin'] = $sheetData[$i][5];
			
			// khối lượng
			$product['weight'] = $sheetData[$i][6];
			
			// dài
			$product['length'] = $sheetData[$i][7];
			
			// rộng
			$product['width'] = $sheetData[$i][8];
			
			// cao
			$product['height'] = $sheetData[$i][9];
			
			// Mã thuộc tính
			$product['classify_id'] = $sheetData[$i][10];
			
			// tên phân loại 1
			$product['classify_name_1'] = $sheetData[$i][11];
			
			// tên tùy chọn 1
			$product['classify_value_1'] = $sheetData[$i][12];
			
			// hình ảnh phân loại 1
			$product['classify_image_1'] = $sheetData[$i][13];
			
			// tên phân loại 2
			$product['classify_name_2'] = $sheetData[$i][14];
			
			// tên tùy chọn 2
			$product['classify_value_2'] = $sheetData[$i][15];
			
			// giá niêm yết
			$product['price_special'] = $sheetData[$i][16];
			
			// giá bán
			$product['price'] = $sheetData[$i][17];
			
			// số lượng tồn kho
			$product['sl_tonkho'] = $sheetData[$i][18];
			
			// hình ảnh 1
			$product['image_1'] = $sheetData[$i][19];
			
			// hình ảnh 2
			$product['image_2'] = $sheetData[$i][20];
			
			// hình ảnh 3
			$product['image_3'] = $sheetData[$i][21];
			
			// hình ảnh 4
			$product['image_4'] = $sheetData[$i][22];
			
			// hình ảnh 5
			$product['image_5'] = $sheetData[$i][23];
			
			// hình ảnh 6
			$product['image_6'] = $sheetData[$i][24];
			
			// hình ảnh 7
			$product['image_7'] = $sheetData[$i][25];
			
			// hình ảnh 8
			$product['image_8'] = $sheetData[$i][26];
			
			// mô tả sản phẩm
			$product['description'] = $sheetData[$i][27];
			
			// thông số kỹ thuật
			$product['detail'] = $sheetData[$i][28];

			//xóa khoảng trắng
			delete_space($product);
			
			$list_product[] = $product;
		}
	}
	return $list_product;
}

// lấy value từ key của mảng product
function get_value_by_key($key, $arr)
{
	//print('<pre>' . print_r($arr, true) . '</pre>');die;
	foreach ($arr as $item) {
		if ($item[$key]) {
			return trim($item[$key]);
		}
	}
	return;
}

// xử lý dữ liệu xuất ra product
function get_product_formated($id, $sheetData){
	$product_temp = get_product_from_excel($id, $sheetData);
	//print('<pre>' . print_r($product_temp, true) . '</pre>');die;
	
	// số thứ tự
	$product['serial'] = get_value_by_key('serial', $product_temp);
	
	// tên sản phẩm
	$product['name_product'] = trim(preg_replace("/\s+/"," ", get_value_by_key('name', $product_temp)));
	
	// mã sản phẩm
	$product['barcode'] = get_value_by_key('barcode', $product_temp);
	
	// alias
	$product['alias'] = change_alias($product['name_product']);
	// chuyên mục
	$product['category'] = get_value_by_key('category', $product_temp);
	
	// thương hiệu
	$product['brand'] = get_value_by_key('brand', $product_temp);
	
	// xuất xứ
	$product['origin'] = get_value_by_key('origin', $product_temp);
	
	// khối lượng
	$product['weight_product'] = get_value_by_key('weight', $product_temp);
	
	// dài
	$product['length_product'] = get_value_by_key('length', $product_temp);
	
	// rộng
	$product['width_product'] = get_value_by_key('width', $product_temp);
	
	// cao
	$product['height_product'] = get_value_by_key('height', $product_temp);
	
	//lấy danh sách các tùy chọn thuộc tính
	foreach($product_temp as $item){
		if($item['classify_value_1'])
		$classify_value_1_temp[] = $item['classify_value_1'];
		if($item['classify_value_2'])
		$classify_value_2_temp[] = $item['classify_value_2'];
	}
	
	//print('<pre>' . print_r($product_temp, true) . '</pre>');die;
	// tên phân loại 1
	if($classify_value_1_temp){
		$classify_1['name'] = get_value_by_key('classify_name_1', $product_temp);
		$classify_1['value'] = array_unique($classify_value_1_temp);
		$product['classify_1'] = $classify_1;
	}
	// tên phân loại 2
	if($classify_value_2_temp){
		$classify_2['name'] = get_value_by_key('classify_name_2', $product_temp);
		$classify_2['value'] = array_unique($classify_value_2_temp);
		$product['classify_2'] = $classify_2;
	}
	
	// Giá theo thuộc tính
	if(!$product['classify_2']){ // neu khong co thuoc tinh 2
		if(!$product['classify_1']){ // neu khong co thuoc tinh 1 -> sp khong co thuoc tinh
			$product['classify_id'] = get_value_by_key('classify_id', $product_temp);
			
			$product['price'] = get_value_by_key('price', $product_temp);
			$product['price'] = str_replace(',', '', $product['price']);
			$product['price'] = is_numeric($product['price']) ? $product['price'] : 0;
			
			$product['price_special'] = get_value_by_key('price_special', $product_temp);
			$product['price_special'] = str_replace(',', '', $product['price_special']);
			$product['price_special'] = is_numeric($product['price_special']) ? $product['price_special'] : 0;
			
			$product['sl_tonkho'] = get_value_by_key('sl_tonkho', $product_temp);
			$product['sl_tonkho'] = str_replace(',', '', $product['sl_tonkho']);
			$product['sl_tonkho'] = is_numeric($product['sl_tonkho']) ? $product['sl_tonkho'] : 0;
			
			} else { // co thuoc tinh 1
			foreach($product_temp as $item){
				$classify_value_product['classify_id'] =  $item['classify_id'];
				$classify_value_product['classify_value_1'] =  $item['classify_value_1'];
				$classify_value_product['classify_image_1'] =  $item['classify_image_1'];
				
				$classify_value_product['price'] =  trim($item['price']);
				$classify_value_product['price'] = str_replace(',', '', $classify_value_product['price']);
				$classify_value_product['price'] = is_numeric($classify_value_product['price']) ? $classify_value_product['price'] : 0;
				
				$classify_value_product['price_special'] =  trim($item['price_special']);
				$classify_value_product['price_special'] = str_replace(',', '', $classify_value_product['price_special']);
				$classify_value_product['price_special'] = is_numeric($classify_value_product['price_special']) ? $classify_value_product['price_special'] : 0;
				
				$classify_value_product['sl_tonkho'] =  trim($item['sl_tonkho']);
				$classify_value_product['sl_tonkho'] = str_replace(',', '', $classify_value_product['sl_tonkho']);
				$classify_value_product['sl_tonkho'] = is_numeric($classify_value_product['sl_tonkho']) ? $classify_value_product['sl_tonkho'] : 0;
				
				$product['price_special'] = $item['price_special'];
				if($product['price_special'] < $item['price_special']){
					$product['price'] = $item['price'];
					$product['price_special'] = $item['price_special'];
				}
				$product['classify_value_product'][] = $classify_value_product;
			}
		}
		} else{ // co 2 thuoc tinh
		$product['price'] = 0;
		foreach($product_temp as $item){
			$classify_value_product['classify_id'] =  $item['classify_id'];
			$classify_value_product['classify_value_1'] =  $item['classify_value_1'];
			$classify_value_product['classify_image_1'] =  $item['classify_image_1'];
			$classify_value_product['classify_value_2'] =  $item['classify_value_2'];
			
			$classify_value_product['price'] =  trim($item['price']);
			$classify_value_product['price'] = str_replace(',', '', $classify_value_product['price']);
			$classify_value_product['price'] = is_numeric($classify_value_product['price']) ? $classify_value_product['price'] : 0;
			
			$classify_value_product['price_special'] =  trim($item['price_special']);
			$classify_value_product['price_special'] = str_replace(',', '', $classify_value_product['price_special']);
			$classify_value_product['price_special'] = is_numeric($classify_value_product['price_special']) ? $classify_value_product['price_special'] : 0;
			
			$classify_value_product['sl_tonkho'] =  trim($item['sl_tonkho']);
			$classify_value_product['sl_tonkho'] = str_replace(',', '', $classify_value_product['sl_tonkho']);
			$classify_value_product['sl_tonkho'] = is_numeric($classify_value_product['sl_tonkho']) ? $classify_value_product['sl_tonkho'] : 0;
			
			
			$product['price_special'] = $item['price_special'];
			if($product['price_special'] < $item['price_special']){
				$product['price'] = $item['price'];
				$product['price_special'] = $item['price_special'];
			}
			$product['classify_value_product'][] = $classify_value_product;
		}
	}
	
	// hình ảnh chính
	$product['image'] = get_value_by_key('image_1', $product_temp);
	
	// hình ảnh khác
	$arr_img = array();
	for($i = 2; $i<=8; $i++){
		$img = get_value_by_key('image_'. $i, $product_temp);
		if($img){
			$arr_img[] = $img;
		}
	}
	$product['other_image'] = implode(',', $arr_img);
	
	// mô tả sản phẩm
	// $product['bodytext'] = get_value_by_key('description', $product_temp);
	$product['bodytext'] = explode("\n", get_value_by_key('description', $product_temp));
	$product['bodytext'] = implode("</br>", $product['bodytext']);
	
	// thông số kỹ thuật
	// $product['description'] = get_value_by_key('detail', $product_temp);
	$product['description'] = explode("\n", get_value_by_key('detail', $product_temp));
	$product['description'] = implode("</br>", $product['description']);
	// print('<pre>' . print_r($product, true) . '</pre>');die;
	return $product;
}

function vn_to_str($str)
{

	$unicode = array(

		'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

		'd' => 'đ',

		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

		'i' => 'í|ì|ỉ|ĩ|ị',

		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		'D' => 'Đ',

		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

	);

	foreach ($unicode as $nonUnicode => $uni) {

		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}

	return $str;
}

// lấy tất cả thương hiệu của danh mục hiện tại và cha của nó
function get_all_parent_brand_id($cate_id){
	global $db, $global_catalogys, $list_brand_id;
	
	// lấy tất cả thương hiệu của danh mục
	foreach($global_catalogys[$cate_id]['brand'] as $item){
		$list_brand_id[] = $item['id'];
	}
	
	// lấy tất cả thương hiệu của danh mục cha
	foreach($global_catalogys as $cate){
		$subcatid = explode(',', $cate['subcatid']);
		if(in_array($cate_id, $subcatid)){
			foreach($cate['brand'] as $brand){
				$list_brand_id[] = $brand['id'];
			}
			get_all_parent_brand_id($cate['id']);
			break;
		}
	}
	return $list_brand_id;
}

function conver_data_img_to_png_excel_1($img, $file_source, $file_thumb, $check_min = true, $create_thump = true)
	{
		
		$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
		$file = $file_source . '/' . $file_name_img;
		$thumb = $file_thumb . '/' . $file_name_img;
		
		$arr = explode('/', $img);
		$image = $arr[count($arr) - 2];
		$new_src = 'https://drive.google.com/u/0/uc?id=' . $image . '&export=download';
		$success = file_put_contents($file, file_get_contents($new_src));
		if($success){
			$kq = $file_name_img;
			} else{
			$success = file_put_contents($file, file_get_contents($img));
			$kq = $success ? $file_name_img : false;
		}
		
		if($kq){
			$Image = new NukeViet\Files\Image($file, NV_MAX_WIDTH, NV_MAX_HEIGHT);
			
			if (($Image->fileinfo['width'] >= 1200) OR ($Image->fileinfo['height'] >= 1200)) 
			{
				$width = $Image->fileinfo['width'];
				$height = $Image->fileinfo['height'];
				nv_delete_other_images_tmp($file, $thumb);
				$Image->resizeXY($width, $height);
				$Image->save($file_source, $file_name_img, 100);
				$Image->close();
			}
			
			if(($Image->fileinfo['width'] < 800) AND ($Image->fileinfo['height'] < 800) AND $check_min){
				nv_delete_other_images_tmp($file, $thumb);
				return;
			}
		}
		
		// tạo hình ảnh thumb upload
		if($kq AND $create_thump)
		{
			$width = 300;
			$height = 300;
			$thumb_quality = 100;
			
			$createImage = new NukeViet\Files\Image($file, NV_MAX_WIDTH, NV_MAX_HEIGHT);
			
			if (($createImage->fileinfo['width'] < $width) OR ($createImage->fileinfo['height'] < $height)) 
			{
				$width = $createImage->fileinfo['width'];
				$height = $createImage->fileinfo['height'];
			}
			
			$createImage->resizeXY($width, $height);
			$createImage->save($file_thumb, $file_name_img, $thumb_quality);
			$createImage->close();
		}
		
		
		// trả về tên hình ảnh
		return $kq;
	}

	function conver_data_img_to_png_excel($img, $file_source, $file_thumb, $is_bodytext_img, $is_create_thump)
	{
		global $global_config;
		$allow_files_type = [
		'images', 'flash'
        ];
		
		$file_name_img = uniqid() . NV_CURRENTTIME . '.png';

		$upload = new NukeViet\Files\Upload($allow_files_type, $global_config['forbid_extensions'], $global_config['forbid_mimes'], [$sys_max_size, $sys_max_size_local], NV_MAX_WIDTH, NV_MAX_HEIGHT);
		$upload->setLanguage($lang_global);
		
		$arr = explode('/', $img);
		
		// nếu ảnh đã tồn tại thì return 0
		if(file_exists($file_source . '/' . $arr[2])){
			return 0;
		}
		
		// check link google drive
		$image = $arr[count($arr) - 2];
		$new_src = 'https://lh3.googleusercontent.com/d/' . $image;
		$urlfile = rawurldecode(trim($new_src));
		$upload_info = $upload->save_urlfile($urlfile, $file_source, false, $global_config['nv_auto_resize']);
		
		if($upload_info['error']){
			$urlfile = rawurldecode(trim($img));
			$upload_info = $upload->save_urlfile($urlfile, $file_source, false, $global_config['nv_auto_resize'], true);	
			
			if($upload_info['error']){
				return;
			}
		}
		
		if(!$upload_info['error']){
			
			// nếu nhỏ hơn 800 thì bỏ
			if($upload_info['img_info'][0] < 800 AND $upload_info['img_info'][1] < 800 AND $is_bodytext_img){
				return;
			}
			
			// nếu kích thước lớn hơn 1200 thì resize về 1200
			if($upload_info['img_info'][0] >= 1200 OR $upload_info['img_info'][1] >= 1200){
				$Image = new NukeViet\Files\Image($upload_info['name'], NV_MAX_WIDTH, NV_MAX_HEIGHT);
				@nv_deletefile($upload_info['name']);
				$width = $Image->fileinfo['width'];
				$height = $Image->fileinfo['height'];
				$Image->resizeXY($width, $height);
				$Image->save($file_source, $upload_info['basename'], 100);
				$Image->close();
			}
			
			// tạo hình ảnh thumb upload
			if($is_create_thump){
				$width = 300;
				$height = 300;
				$thumb_quality = 100;
				
				$createImage = new NukeViet\Files\Image($upload_info['name'], NV_MAX_WIDTH, NV_MAX_HEIGHT);
				
				if (($createImage->fileinfo['width'] < $width) OR ($createImage->fileinfo['height'] < $height)) 
				{
					$width = $createImage->fileinfo['width'];
					$height = $createImage->fileinfo['height'];
				}
				
				$createImage->resizeXY($width, $height);
				$createImage->save($file_thumb, $upload_info['basename'], $thumb_quality);
				$createImage->close();
			}
			
		}
		
		// trả về tên hình ảnh
		return $upload_info['basename'];
	}

function conver_data_img_classify_to_png($img, $file_source, $file_thumb)
{

	$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
	$file = $file_source . '/' . $file_name_img;
	$thumb = $file_thumb . '/' . $file_name_img;

	$arr = explode('/', $img);
	$image = $arr[count($arr) - 2];
	$new_src = 'https://drive.google.com/u/0/uc?id=' . $image . '&export=download';
	$success = file_put_contents($file, file_get_contents($new_src));
	if ($success) {
		$kq = $file_name_img;
	} else {
		$success = file_put_contents($file, file_get_contents($img));
		$kq = $success ? $file_name_img : false;
	}

	if ($kq) {
		$Image = new NukeViet\Files\Image($file, NV_MAX_WIDTH, NV_MAX_HEIGHT);

		if (($Image->fileinfo['width'] >= 1200) or ($Image->fileinfo['height'] >= 1200)) {
			$width = $Image->fileinfo['width'];
			$height = $Image->fileinfo['height'];
			$check = nv_delete_other_images_tmp($file, $thumb);
			$Image->resizeXY($width, $height);
			$Image->save($file_source, $file_name_img, 100);
			$Image->close();
		}

		if (($Image->fileinfo['width'] < 800) and ($Image->fileinfo['height'] < 800)) {
			nv_delete_other_images_tmp($file, $thumb);
			return;
		}
	}


	//nv_delete_other_images_tmp
	// tạo hình ảnh thumb upload
	if ($kq) {
		$width = 300;
		$height = 300;
		$thumb_quality = 100;

		$createImage = new NukeViet\Files\Image($file, NV_MAX_WIDTH, NV_MAX_HEIGHT);

		if (($createImage->fileinfo['width'] < $width) or ($createImage->fileinfo['height'] < $height)) {
			$width = $createImage->fileinfo['width'];
			$height = $createImage->fileinfo['height'];
		}

		$createImage->resizeXY($width, $height);
		$createImage->save($file_thumb, $file_name_img, $thumb_quality);
		$createImage->close();
	}


	// trả về tên hình ảnh
	return $kq;
}

function get_all_cat_name($id)
	{
		global $get_all_catname, $global_catalogys;
		// print_r($global_catalogys);die;
		
		if(!$id)
		return false;
		
		
		$get_all_catname[] = $global_catalogys[$id]['name'];
		
		
		if($global_catalogys[$id]['numsubcat'] > 0)
		{	
			$arr_temp = explode(',', $global_catalogys[$id]['subcatid']);
			
			foreach($arr_temp as $value)
			{	
				get_all_cat_name($value);
			}
		}
		
		return $get_all_catname;
	}



function get_all_origin_name()
{
	// global $get_all_origin, $global_catalogys;
	global $db;

	$origin = $db->query('SELECT title FROM ' . TABLE . '_origin')->fetchAll();

	return $origin;
}

function get_all_brand_name($id)
	{
		global $get_all_brand, $global_catalogys;
		
		if(!$id)
		return false;
		
		foreach($global_catalogys[$id]['brand'] as $item){
			$get_all_brand[] = $item['title'];
		}
		if($global_catalogys[$id]['subcatid']){
			$list_subid = explode(',', $global_catalogys[$id]['subcatid']);
			foreach($list_subid as $subid){
				get_all_brand_name($subid);
			}
		}
		return $get_all_brand;
	}


function update_time_edit_order($order_id)
{
	global $db;
	if (!$order_id) {
		return false;
	}
	$db->query('UPDATE ' . TABLE . '_order SET time_edit = ' . NV_CURRENTTIME . ' WHERE id = ' . $order_id);
	return true;
}

function update_time_add_order($order_id)
{
	global $db;
	if (!$order_id) {
		return false;
	}

	$db->query('UPDATE ' . TABLE . '_order SET time_add = ' . NV_CURRENTTIME . ' WHERE id = ' . $order_id);
	return true;
}

// phí bảo hiểm hàng hóa 1 vận đơn
function baohiemhanghoa($order)
{
	global $db;



	if (!$order['transporters_id'] or !$order['shipping_code'])
		return 0;



	if ($order['shipping_code'] and ($order['transporters_id'] == 4 or $order['transporters_id'] == 5)) {
		$cuocphi_thuctinh = $db->query('SELECT cuocphi_thuctinh FROM ' . TABLE . '_history_vnpos WHERE vnpost_status = 100 AND item_code ="' . $order['shipping_code'] . '"')->fetchColumn();

		$tongtien = $cuocphi_thuctinh - $order['fee_transport'];
	}

	// ghn
	if ($order['shipping_code'] and $order['transporters_id'] == 3) {
		$total_fee = $db->query('SELECT total_fee FROM ' . TABLE . '_history_ghn WHERE status = "delivered" AND order_code ="' . $order['shipping_code'] . '"')->fetchColumn();

		$tongtien = $total_fee - $order['fee_transport'];
	}

	return $tongtien <= 0 ? 0 : $tongtien;
}

// phí phat cua order 
function phi_phat_order($order, $status)
{
	global $db;
	$where = '';
	if ($status == 0) {
		$where .= ' AND t2.status = 7';
	} else if ($status == 1) {
		$where .= ' AND (t2.status = 3 OR t2.status = 2)';
	} else if ($status == 2) {
		$where .= ' AND (t2.status = 6)';
	}

	$phiphat = $db->query('SELECT price_penalize FROM ' . TABLE . '_order_punish t1, ' . TABLE . '_order t2, ' . TABLE . '_penalize t3 WHERE t2.id = ' . $order['id'] . ' AND t1.order_id = t2.id AND t1.penalize_id = t3.id AND t2.store_id = ' . $order['store_id'] . ' AND t2.status_payment_vnpay = 1 ' . $where)->fetchColumn();

	return $phiphat;
}


// phi vnpay order
function phi_vnpay_order($order, $status)
{
	global $db;
	$where = '';
	if ($status == 0) {
		$where .= ' AND t1.status = 7';
	} else if ($status == 1) {
		$where .= ' AND (t1.status = 3 OR t1.status = 2)';
	} else if ($status == 2) {
		$where .= ' AND (t1.status = 6)';
	}
	if($order['payment_method'] == 'vnpay'){
		$vnpay = $db->query('SELECT t2.price, t2.vnp_bankcode FROM ' . TABLE . '_order t1, ' . TABLE . '_history_vnpay t2 WHERE t1.id = ' . $order['id'] . ' AND t1.vnpay_code = t2.vnp_transactionno AND t2.vnp_responsedode ="00" AND t1.store_id = ' . $order['store_id'] . ' AND t1.status_payment_vnpay = 1 ' . $where)->fetch();

		// VISA,MASTERCARD,JCB là quốc tế
		$array_quocte = array(
			'1' => 'VISA',
			'2' => 'MASTERCARD',
			'3' => 'JCB'
		);
		// thẻ nội địa 1.1% + 1.650đ
		$cuocphi = 0;
		if ($vnpay['price']) {
			if (in_array($vnpay['vnp_bankcode'], $array_quocte)) {
				// thẻ quốc tế 2.4% + 2.200
				$cuocphi = (($vnpay['price'] * 2.4) / 100) + 2200;
			} else {
				// thẻ nội địa
				$cuocphi = (($vnpay['price'] * 1.1) / 100) + 1650;
			}
		}
	}elseif($order['payment_method'] == 'momo'){
		$payment = $db->query('SELECT t2.price, t2.bankcode,t1.payment FROM ' . TABLE .'_order t1, ' . TABLE .'_history_payment t2 WHERE t1.id = '. $order['id'] .' AND t1.vnpay_code = t2.transactionno AND t2.responsedode ="0" AND t1.store_id = '. $order['store_id'] .' AND t1.status_payment_vnpay = 1 '. $where)->fetch();
		$cuocphi = (($payment['payment'] * 2)/100) + (($payment['payment'] * 2)/100)*10/100;
	}
	return $cuocphi;
}


// phí sàn của đơn hàng
function phi_ecng($order, $status)
{
	global $db;
	$where = '';
	if ($status == 0) {
		$where .= ' AND t1.status = 7';
	} else if ($status == 1) {
		$where .= ' AND (t1.status = 3 OR t1.status = 2)';
	} else if ($status == 2) {
		$where .= ' AND (t1.status = 6)';
	}
	// giao hàng thành công, lấy tất cả sản phẩm
	$product = $db->query('SELECT t2.product_id, t2.total FROM ' . TABLE . '_order t1, ' . TABLE . '_order_item t2 WHERE t1.id = ' . $order['id'] . ' AND t1.store_id = ' . $order['store_id'] . ' AND t1.id = t2.order_id AND t1.status_payment_vnpay = 1 ' . $where)->fetch();


	// lấy thông tin chuyên mục sản phẩm
	if ($product) {
		$catalogy_id = $db->query('SELECT categories_id FROM ' . TABLE . '_product WHERE id =' . $product['product_id'])->fetchColumn();

		// lấy phí sàn danh mục sản phẩm
		$phisan = phisan_danhmuc($catalogy_id);

		$chiec_khau = ($product['total'] * $phisan) / 100;
	} else {
		$chiec_khau = 0;
	}

	return $chiec_khau;
}

function mess_error($mess)
{
	$array = array();

	$array['status'] = 'ERROR';
	$array['mess'] = $mess;

	print_r(json_encode($array));
	die;
}


function time_line_ghtk($shipping_code)
{
	global $db;
	$list_status = $db->query('SELECT status_id, reason_code, reason, time_add FROM ' . TABLE . '_history_ghtk_detail WHERE label ="' . $shipping_code . '" ORDER BY time_add DESC')->fetchAll();
	return $list_status;
}

function time_line_ghn($shipping_code)
{
	global $db;
	$list_status = $db->query('SELECT * FROM ' . TABLE . '_history_ghn_detail WHERE order_code ="' . $shipping_code . '" ORDER BY time_add DESC')->fetchAll();
	return $list_status;
}

// phí bảo hiểm đơn vị vận chuyển
function phi_baohiem($store_id, $from, $to)
{
	global $db;

	$list_order = $db->query('SELECT transporters_id, shipping_code FROM ' . TABLE . '_order WHERE store_id = ' . $store_id . ' AND status_payment_vnpay = 1 AND status = 3 AND time_add >=' . $from . ' AND time_add <=' . $to)->fetchAll();

	$tongtien = 0;

	foreach ($list_order as $order) {
		if ($order['shipping_code'] and $order['transporters_id'] and ($order['transporters_id'] == 4 or $order['transporters_id'] == 5)) {
			$tongcuocdichvucongthem = $db->query('SELECT tongcuocdichvucongthem FROM ' . TABLE . '_history_vnpos WHERE vnpost_status = 100 AND item_code ="' . $order['shipping_code'] . '"')->fetchColumn();
			$tongtien = $tongtien + $tongcuocdichvucongthem;
		}
	}

	return $tongtien;
}

// phí ship các đơn của shop
function phi_ship($store_id, $from, $to)
{
	global $db;
	$tongtien = $db->query('SELECT sum(fee_transport) as sum_ship FROM ' . TABLE . '_order WHERE store_id =' . $store_id . ' AND status = 3 AND time_add >=' . $from . ' AND time_add <=' . $to)->fetchColumn();

	return $tongtien;
}

// Tổng voucher các đơn của shop
function voucher($store_id, $from, $to)
{
	global $db;

	$tongtien = $db->query('SELECT sum(voucher_price) as sum_voucher FROM ' . TABLE . '_order WHERE store_id =' . $store_id . ' AND status = 3 AND time_add >=' . $from . ' AND time_add <=' . $to)->fetchColumn();

	return $tongtien;
}

// phí vnpay phi_vnpay
function phi_vnpay($store_id, $from, $to)
{
	global $db;

	$list_vnpay = $db->query('SELECT t2.price, t2.vnp_cardtype FROM ' . TABLE . '_order t1, ' . TABLE . '_history_vnpay t2 WHERE t1.vnpay_code = t2.vnp_transactionno AND t2.vnp_responsedode ="00" AND t1.store_id = ' . $store_id . ' AND t1.status_payment_vnpay = 1 AND t1.status = 3 AND t1.time_add >=' . $from . ' AND t1.time_add <=' . $to)->fetchAll();

	$tongtien = 0;

	foreach ($list_vnpay as $vnpay) {
		// thẻ nội địa 1.1% + 1.650đ

		if ($vnpay['vnp_cardtype'] == 'ATM') {
			$cuocphi = (($vnpay['price'] * 1.1) / 100) + 1650;
		} else {
			// thẻ quốc tế 2.4% + 2.200
			$cuocphi = (($vnpay['price'] * 2.4) / 100) + 2200;
		}


		$tongtien = $tongtien + $cuocphi;
	}

	return $tongtien;
}


// phí vnpay phi_phat
function phi_phat($store_id, $from, $to)
{
	global $db;

	$tongtien = $db->query('SELECT sum(price_penalize) FROM ' . TABLE . '_order_punish t1, ' . TABLE . '_order t2, ' . TABLE . '_penalize t3 WHERE t1.order_id = t2.id AND t1.penalize_id = t3.id AND t2.store_id = ' . $store_id . ' AND t2.status_payment_vnpay = 1 AND t2.status = 3 AND t2.time_add >=' . $from . ' AND t2.time_add <=' . $to)->fetchColumn();

	return $tongtien;
}


// thu phí sàn
function phisan_ecng($store_id, $from, $to)
{
	global $db;

	// giao hàng thành công, lấy tất cả sản phẩm
	$list_product = $db->query('SELECT t2.product_id, t2.total FROM ' . TABLE . '_order t1, ' . TABLE . '_order_item t2 WHERE t1.store_id = ' . $store_id . ' AND t1.id = t2.order_id AND t1.status_payment_vnpay = 1 AND t1.status = 3 AND t1.time_add >=' . $from . ' AND t1.time_add <=' . $to)->fetchAll();

	$tongtien = 0;

	foreach ($list_product as $product) {
		// lấy thông tin chuyên mục sản phẩm
		$catalogy_id = $db->query('SELECT categories_id FROM ' . TABLE . '_product WHERE id =' . $product['product_id'])->fetchColumn();

		// lấy phí sàn danh mục sản phẩm
		$phisan = phisan_danhmuc($catalogy_id);

		$chiec_khau = ($product['total'] * $phisan) / 100;

		$tongtien = $tongtien + $chiec_khau;
	}

	return $tongtien;
}


// phí sàn chuyên mục sản phẩm
function phisan_danhmuc($catalogy_id)
{
	global $db;

	if (!$catalogy_id)
		return 0;

	// lấy phí sàn danh mục

	$row = $db->query('SELECT percent_discount, parrent_id FROM ' . TABLE . '_catalogs WHERE id =' . $catalogy_id)->fetch();



	if ($row['percent_discount']) {
		return $row['percent_discount'];
	} else {
		return phisan_danhmuc($row['parrent_id']);
	}
}

function to_png($img, $path_upload, $path_thumb, $username)
{
	global $module_upload;

	if (!empty($img)) {
		if (!is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload  . '/' . $img)) {
			$kq = conver_data_img_to_png($img, $path_upload, $path_thumb);

			// cập nhật lại
			if ($kq) {
				$file_image = str_replace($module_upload . '/', '', $username . '/' . $kq);
			}
		} else {
			$file_image = $img;
		}
	} else {
		$file_image = '';
	}

	return $file_image;
}


function conver_data_img_to_png($img, $file_source, $file_thumb)
{
	$arr = ['data:image/gif;base64', 'data:image/png;base64', 'data:image/jpg;base64', 'data:image/jpeg;base64'];

	$img = str_replace($arr, '', $img);

	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file_name_img = uniqid() . NV_CURRENTTIME . '.png';
	$file = $file_source . '/' . $file_name_img;
	$success = file_put_contents($file, $data);
	$kq = $success ? $file_name_img : false;

	// tạo hình ảnh thumb upload
	if ($kq) {
		$width = 300;
		$height = 300;
		$thumb_quality = 100;

		$createImage = new NukeViet\Files\Image($file, NV_MAX_WIDTH, NV_MAX_HEIGHT);

		if (($createImage->fileinfo['width'] < $width) or ($createImage->fileinfo['height'] < $height)) {
			$width = $createImage->fileinfo['width'];
			$height = $createImage->fileinfo['height'];
		}

		$createImage->resizeXY($width, $height);
		$createImage->save($file_thumb, $file_name_img, $thumb_quality);
		$createImage->close();
	}


	// trả về tên hình ảnh
	return $kq;
}


function nv_insert_notification_shop($userid, $store_id, $content_ip, $order_id, $type)
{
	global $db, $db_config, $module_name;

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification_shop(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $userid . ',' . $store_id . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"' . $type . '")');

	return true;
}

function nv_insert_notification_user($userid, $userid_order, $content_ip, $order_id, $type)
{
	global $db, $db_config, $module_name;

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification_user(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $userid . ',' . $userid_order . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"order")');

	return true;
}

function nv_insert_notification_ecng($userid, $store_id, $content_ip, $order_id, $type)
{
	global $db, $db_config, $module_name, $user_info;

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $userid . ',' . $store_id . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"' . $type . '")');

	return true;
}

// lay danh sach san pham trong order_id
function get_list_products_order($order_id)
{
	global $db, $db_config, $module_data, $module_upload, $module_name;

	if (!$order_id) return false;

	$list_products = $db->query("SELECT t1.id as itemid, t1.price, t1.classify_value_product_id, t1.quantity, t2.id, t2.name_product, t2.alias, t2.image FROM " . TABLE . "_order_item t1, " . TABLE . "_product t2  WHERE t1.product_id = t2.id AND t1.order_id =" . $order_id)->fetchAll();

	$array_product = array();

	foreach ($list_products as $view) {
		if ($view['classify_value_product_id'] > 0) {
			$classify_value_product_id = get_info_classify_value_product($view['classify_value_product_id']);
			$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
			if ($classify_value_product_id['classify_id_value2'] > 0) {
				$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
				$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
			} else {
				$name_group = $name_classify_id_value1;
			}

			$view['name_product'] = $view['name_product'] . ' (' . $name_group . ')';
		}

		if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
			$view['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
		} else {
			$server = $_SERVER["SERVER_NAME"];
			$view['image'] = 'https://' . $server . NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
		}

		$view['alias'] = $_SERVER["chonhagiau"] . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $view['alias'] . '-' . $view['id'], true);

		$view['price'] = number_format($view['price']);
		$view['quantity'] = number_format($view['quantity']);

		$array_product[] = $view;
	}

	return $array_product;
}

function get_info_warehouse_store($store_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_warehouse where sell_id=" . $store_id)->fetch();
	return $list;
}
function get_list_full_category()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs")
		->fetchAll();
	return $list;
}


function get_list_full_category_lev1()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs WHERE parrent_id = 0 AND status = 1")
		->fetchAll();
	return $list;
}




function get_full_customer()
{
	global $db;
	$list = $db->query("SELECT t1.*, t2.last_name FROM " . TABLE . "_customer t1 INNER JOIN " . NV_TABLE_USER . " t2 on t1.userid=t2.userid where t1.status=1 ")
		->fetchAll();
	return $list;
}
function get_full_customer_of_shop()
{
	global $db, $user_info;
	$shop_id = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE userid = ' . $user_info['userid'])->fetch();
	$list = $db->query("SELECT t1.*, t2.last_name,t2.username FROM " . TABLE . "_customer t1 INNER JOIN " . NV_TABLE_USER . " t2 on t1.userid=t2.userid INNER JOIN " . TABLE . "_order t3 ON t2.userid = t3.userid where t1.status=1 AND t3.store_id = " . $shop_id['id'] . " GROUP BY t3.userid")->fetchAll();
	return $list;
}

//Tự tạo thêm thư mục theo ngày tháng
if (!is_dir(NV_ROOTDIR . '/uploads/' . $module_upload . '/' . date('Y_m'))) {
	nv_mkdir(NV_ROOTDIR . '/uploads/' . $module_upload, date('Y_m'));
	$upload_dir = 'uploads/' . $module_upload . '/' . date('Y_m');


	try {
		$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_upload_dir(dirname,time) VALUES(' . $db->quote($upload_dir) . ',' . NV_CURRENTTIME . ')');
	} catch (Exception $e) {
	}
}
function get_product_select2($q, $category_id)
{
	global $db, $db_config, $module_data, $user_info;

	$list = $db->query('SELECT t1.product_id FROM ' . TABLE . '_category_shop_item t1 INNER JOIN ' . TABLE . '_product t2 ON t1.product_id = t2.id INNER JOIN ' . TABLE . '_seller_management t3 ON t3.id = t2.store_id WHERE t3.userid = ' . $user_info['userid'] . ' AND t1.id_category_shop IN (' . $category_id . ')')->fetchAll();
	$list_id = '';
	$i = 1;
	foreach ($list as $key => $value) {
		if ($i < count($list)) {
			$list_id .= $value['product_id'] . ',';
		} else {
			$list_id .= $value['product_id'];
		}
		$i++;
	}
	if ($list_id) {
		$list_product = $db->query('SELECT t1.* FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_seller_management t2 ON t1.store_id = t2.id WHERE name_product LIKE "%' . $q . '%" AND t2.userid = ' . $user_info['userid'] . ' AND t1.id NOT IN (' . $list_id . ') ORDER BY t1.time_add ')->fetchAll();
	} else {
		$list_product = $db->query('SELECT t1.* FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_seller_management t2 ON t1.store_id = t2.id WHERE name_product LIKE "%' . $q . '%" AND t2.userid = ' . $user_info['userid'] . ' ORDER BY t1.time_add ')->fetchAll();
	}

	return $list_product;
}
function nv_delete_other_images_tmp($path, $thumb)
{

	if (file_exists($thumb)) {
		@nv_deletefile($thumb);
	}

	if (file_exists($path)) {
		$deleted = @nv_deletefile($path);
	}

	return true;
}

function nv_delete_images_tmp_ckeditor($path)
{

	if (file_exists($path)) {
		@nv_deletefile($path);
	}

	return true;
}

function validUserLog($array_user, $remember, $opid, $current_mode = 0)
{
	global $db, $global_config, $nv_Request, $lang_module, $global_users_config, $module_name, $client_info;

	$remember = intval($remember);
	$checknum = md5(nv_genpass(10));
	$user = array(
		'userid' => $array_user['userid'],
		'current_mode' => $current_mode,
		'checknum' => $checknum,
		'checkhash' => md5($array_user['userid'] . $checknum . $global_config['sitekey'] . $client_info['browser']['key']),
		'current_agent' => NV_USER_AGENT,
		'last_agent' => $array_user['last_agent'],
		'current_ip' => NV_CLIENT_IP,
		'last_ip' => $array_user['last_ip'],
		'current_login' => NV_CURRENTTIME,
		'last_login' => intval($array_user['last_login']),
		'last_openid' => $array_user['last_openid'],
		'current_openid' => $opid
	);

	$stmt = $db->prepare("UPDATE " . NV_TABLE_USER . " SET
		checknum = :checknum,
		last_login = " . NV_CURRENTTIME . ",
		last_ip = :last_ip,
		last_agent = :last_agent,
		last_openid = :opid,
		remember = " . $remember . "
		WHERE userid=" . $array_user['userid']);

	$stmt->bindValue(':checknum', $checknum, PDO::PARAM_STR);
	$stmt->bindValue(':last_ip', NV_CLIENT_IP, PDO::PARAM_STR);
	$stmt->bindValue(':last_agent', NV_USER_AGENT, PDO::PARAM_STR);
	$stmt->bindValue(':opid', $opid, PDO::PARAM_STR);
	$stmt->execute();
	$live_cookie_time = ($remember) ? NV_LIVE_COOKIE_TIME : 0;

	$nv_Request->set_Cookie('nvloginhash', json_encode($user), $live_cookie_time);

	if (!empty($global_users_config['active_user_logs'])) {
		$log_message = $opid ? ($lang_module['userloginviaopt'] . ' ' . $opid) : $lang_module['st_login'];
		nv_insert_logs(NV_LANG_DATA, $module_name, '[' . $array_user['username'] . '] ' . $log_message, ' Client IP:' . NV_CLIENT_IP, 0);
	}
}
//phantrangajax//
function nv_generate_page_viewcat($base_url, $num_items, $per_page, $on_page, $add_prevnext_text = true, $onclick = false, $js_func_name = 'nv_urldecode_ajax', $containerid = 'generate_page', $full_theme = true)
{
	global $lang_global;
	// Round up total page
	$total_pages = ceil($num_items / $per_page);
	if ($total_pages < 2) {

		return '';
	}

	if (!is_array($base_url)) {
		$amp = preg_match('/\?/', $base_url) ? '&amp;' : '?';
		$amp .= 'page=';
	} else {
		$amp = $base_url['amp'];
		$base_url = $base_url['link'];
	}

	$page_string = '';

	if ($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;

		for ($i = 1; $i <= $init_page_max; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}

		if ($total_pages > 3) {
			if ($on_page > 1 and $on_page < $total_pages) {
				if ($on_page > 5) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}

				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;

				for ($i = $init_page_min - 1; $i < $init_page_max + 2; ++$i) {
					$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
					$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
					$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
				}

				if ($on_page < $total_pages - 4) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}
			} else {
				$page_string .= '<li class="disabled"><span>...</span></li>';
			}

			for ($i = $total_pages - 2; $i < $total_pages + 1; ++$i) {
				$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
				$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
				$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
			}
		}
	} else {
		for ($i = 1; $i < $total_pages + 1; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}
	}

	if ($add_prevnext_text) {
		if ($on_page > 1) {
			$href = ($on_page > 2) ? $base_url . $amp . ($on_page - 1) : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string = "<li><a " . $href . " title=\"" . $lang_global['pageprev'] . "\">&laquo;</a></li>" . $page_string;
		} else {
			$page_string = '<li class="disabled"><a href="#">&laquo;</a></li>' . $page_string;
		}

		if ($on_page < $total_pages) {
			$href = ($on_page) ? $base_url . $amp . ($on_page + 1) : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li><a ' . $href . ' title="' . $lang_global['pagenext'] . '">&raquo;</a></li>';
		} else {
			$page_string .= '<li class="disabled"><a href="#">&raquo;</a></li>';
		}
	}

	if ($full_theme !== true) {
		return $page_string;
	}

	return '<ul class="pagination">' . $page_string . '</ul>';
}

function nv_generate_page_wishlist($base_url, $num_items, $per_page, $on_page, $add_prevnext_text = true, $onclick = false, $js_func_name = 'nv_urldecode_ajax', $containerid = 'generate_page', $full_theme = true)
{
	global $lang_global;
	// Round up total page
	$total_pages = ceil($num_items / $per_page);
	if ($total_pages < 2) {

		return '';
	}

	if (!is_array($base_url)) {
		$amp = preg_match('/\?/', $base_url) ? '&amp;' : '?';
		$amp .= 'page=';
	} else {
		$amp = $base_url['amp'];
		$base_url = $base_url['link'];
	}

	$page_string = '';

	if ($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;

		for ($i = 1; $i <= $init_page_max; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}

		if ($total_pages > 3) {
			if ($on_page > 1 and $on_page < $total_pages) {
				if ($on_page > 5) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}

				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;

				for ($i = $init_page_min - 1; $i < $init_page_max + 2; ++$i) {
					$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
					$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
					$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
				}

				if ($on_page < $total_pages - 4) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}
			} else {
				$page_string .= '<li class="disabled"><span>...</span></li>';
			}

			for ($i = $total_pages - 2; $i < $total_pages + 1; ++$i) {
				$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
				$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
				$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
			}
		}
	} else {
		for ($i = 1; $i < $total_pages + 1; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}
	}

	if ($add_prevnext_text) {
		if ($on_page > 1) {
			$href = ($on_page > 2) ? $base_url . $amp . ($on_page - 1) : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string = "<li><a " . $href . " title=\"" . $lang_global['pageprev'] . "\">&laquo;</a></li>" . $page_string;
		} else {
			$page_string = '<li class="disabled"><a href="#">&laquo;</a></li>' . $page_string;
		}

		if ($on_page < $total_pages) {
			$href = ($on_page) ? $base_url . $amp . ($on_page + 1) : $base_url . '&page=1';
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li><a ' . $href . ' title="' . $lang_global['pagenext'] . '">&raquo;</a></li>';
		} else {
			$page_string .= '<li class="disabled"><a href="#">&raquo;</a></li>';
		}
	}

	if ($full_theme !== true) {
		return $page_string;
	}

	return '<ul class="pagination">' . $page_string . '</ul>';
}
//phantrangajax//
/* $list_brand = $db->query('SELECT * FROM ' . TABLE . '_brand WHERE status = 1')
	->fetchAll();
$list_origin = $db->query('SELECT * FROM ' . TABLE . '_origin WHERE status = 1')
	->fetchAll();

 */
function get_brand_select2_cat($q, $cat_id)
{
	global $db, $db_config, $module_data;

	$array_total = get_all_category_parent_childrent($cat_id);
	$where = '';
	if ($array_total) {
		$where = ' AND id IN(' . implode(',', $array_total) . ')';
	}

	$list_brand = $db->query('SELECT brand FROM ' . TABLE . '_catalogs WHERE status = 1' . $where)->fetchAll();

	$list = array();

	foreach ($list_brand as $brand) {
		if ($brand['brand']) {

			$list_brand_item = explode('|', $brand['brand']);

			foreach ($list_brand_item as $value) {
				$list[] = $value;
			}
		}
	}
	//print_r($list);die;
	// danh sách thương hiệu
	$where = '';
	if (!empty($q)) {
		$where .= ' AND title like "%' . $q . '%"';
	}

	if ($list) {
		$where .= ' AND id IN(' . implode(',', $list) . ')';
	} else {
		return array();
	}

	$data = $db->query('SELECT id, title FROM ' . TABLE . '_brand WHERE status = 1' . $where . ' ORDER BY title ASC')->fetchAll();

	return $data;
}


// lấy tất cả parent_id và childrent
function get_all_category_parent_childrent($catid)
{
	$list_parent_catid = list_parent_catid_all($catid);
	$list_childrent_catid = list_childrent_catid($catid);

	$array_total = array_merge($list_parent_catid, $list_childrent_catid);
	$array_total = array_unique($array_total);

	return $array_total;
}


// lấy danh sách parent nhánh catid
function list_parent_catid_all($id)
{
	global $db, $module_data, $db_config, $list_parent_catid;

	if ($id) {
		$list_parent_catid[] = $id;

		$parrent_id = $db->query('SELECT parrent_id FROM ' . TABLE . '_catalogs WHERE id =' . $id)->fetchColumn();

		if ($parrent_id) {
			list_parent_catid_all($parrent_id);
		}
	}

	return $list_parent_catid;
}


// lấy danh sách childrent nhánh catid
function list_childrent_catid($id)
{
	global $db, $module_data, $db_config, $list_childrent_catid;

	if ($id) {
		$list_childrent_catid[] = $id;

		$array_parrent = $db->query('SELECT id FROM ' . TABLE . '_catalogs WHERE parrent_id =' . $id)->fetchAll();

		foreach ($array_parrent as $parrent_id) {
			if ($parrent_id['id']) {
				list_childrent_catid($parrent_id['id']);
			}
		}
	}

	return $list_childrent_catid;
}



function get_origin_select2_cat($q, $cat_id)
{
	global $db, $db_config, $module_data;

	$array_total = get_all_category_parent_childrent($cat_id);
	$where = '';
	if ($array_total) {
		$where = ' AND id IN(' . implode(',', $array_total) . ')';
	}

	$list_origin = $db->query('SELECT origin FROM ' . TABLE . '_catalogs WHERE status = 1' . $where)->fetchAll();

	foreach ($list_origin as $origin) {
		if ($origin['origin']) {

			$list_origin_item = explode('|', $origin['origin']);

			foreach ($list_origin_item as $value) {
				$list[] = $value;
			}
		}
	}

	// danh sách thương hiệu
	$where = '';
	if (!empty($q)) {
		$where .= ' AND title like "%' . $q . '%"';
	}

	if ($list) {
		$where .= ' AND id IN(' . implode(',', $list) . ')';
	} else {
		return array();
	}

	$data = $db->query('SELECT id, title FROM ' . TABLE . '_origin WHERE status = 1' . $where . ' ORDER BY title ASC')->fetchAll();

	return $data;
}


function get_store_id_ghn($warehouse_id){
	global $db;
	$store = $db->query('SELECT storeid_transport FROM ' . TABLE . '_warehouse_transport WHERE FIND_IN_SET(3, transportid_ecng) AND warehouse_id = ' . $warehouse_id)->fetchColumn();
	return $store;
}

function get_brand_select2($q)
{
	global $db, $db_config, $module_data;

	$list_brand = $db->query('SELECT * FROM ' . TABLE . '_brand WHERE title LIKE "%' . $q . '%" ORDER BY title')->fetchAll();
	return $list_brand;
}
function get_origin_select2($q)
{
	global $db, $db_config, $module_data;

	$list_origin = $db->query('SELECT * FROM ' . TABLE . '_origin WHERE title LIKE "%' . $q . '%" ORDER BY title')->fetchAll();
	return $list_origin;
}

function get_province_select2($q)
{
	global $db;
	$list = $db->query("SELECT * FROM " . NV_TABLE_PROVINCE . " where title like '%" . str_replace(' ', '%', $q) . "%' and countryid=1")->fetchAll();

	return $list;
}
function get_district_select2($q, $provinceid)
{
	global $db;

	$list = $db->query("SELECT * FROM " . NV_TABLE_DISTRICT . " where title like '%" . str_replace(' ', '%', $q) . "%' and provinceid=" . $provinceid)->fetchAll();

	return $list;
}
function get_warehouse_select2($q, $sell_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_warehouse where name_warehouse like '%" . str_replace(' ', '%', $q) . "%' and sell_id=" . $sell_id . " and status=1")->fetchAll();

	return $list;
}
function get_list_warehouse($sell_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_warehouse where sell_id=" . $sell_id . " and status=1")->fetchAll();

	return $list;
}
function get_full_classify($product_id)
{
	global $db;
	$list = $db->query("SELECT t1.* FROM " . TABLE . "_product_classify t1 INNER JOIN  " . TABLE . "_product_classify_value t2 ON t1.id=t2.classify_id INNER JOIN " . TABLE . "_product_classify_value_product t3 ON (t2.id=t3.classify_id_value1 OR t2.id=t3.classify_id_value2) where t1.product_id=" . $product_id . " and t3.status=1 group by t1.id")->fetchAll();

	return $list;
}
function get_full_classify_value($classify_id)
{
	global $db;
	$list = $db->query("SELECT t1.* FROM " . TABLE . "_product_classify_value t1 INNER JOIN " . TABLE . "_product_classify_value_product t2 ON (t1.id=t2.classify_id_value1 OR t1.id=t2.classify_id_value2) where t1.classify_id=" . $classify_id . " and t2.status=1 group by t1.id")->fetchAll();

	return $list;
}
function get_full_classify_value_product($classify_id_value1, $classify_id_value2)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_product_classify_value_product where classify_id_value1=" . $classify_id_value1 . " and classify_id_value2=" . $classify_id_value2 . " and status=1")->fetchAll();

	return $list;
}
function get_info_classify_value_product($id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_product_classify_value_product where id=" . $id)->fetch();

	return $list;
}
function get_info_classify_value_product_classify_id_value1_classify_id_value2($classify_id_value1, $classify_id_value2)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_product_classify_value_product where classify_id_value1=" . $classify_id_value1 . " and classify_id_value2=" . $classify_id_value2)->fetch();

	return $list;
}
function get_info_classify_value_product_classify_id_value1($classify_id_value1)
{
	global $db;
	$list = $db->query("SELECT count(*) FROM " . TABLE . "_product_classify_value_product where classify_id_value1=" . $classify_id_value1 . " and status=1")->fetchColumn();

	return $list;
}
function get_info_classify_value_product_classify_id_value2($classify_id_value2)
{
	global $db;
	$list = $db->query("SELECT count(*) FROM " . TABLE . "_product_classify_value_product where classify_id_value2=" . $classify_id_value2 . " and status=1")->fetchColumn();

	return $list;
}

function get_info_classify($id)
{
	global $db;
	if (!$id)
		return array();

	$list = $db->query("SELECT * FROM " . TABLE . "_product_classify where id=" . $id)->fetch();

	return $list;
}
function get_info_classify_value($id)
{
	global $db;

	if (!$id)
		return array();

	$list = $db->query("SELECT * FROM " . TABLE . "_product_classify_value where id=" . $id)->fetch();

	return $list;
}
function get_info_ward($wardid)
{
	global $db;
	if ($wardid) {
		$list = $db->query("SELECT * FROM " . NV_TABLE_WARD . " where wardid = " . $wardid)->fetch();
		return $list;
	}
}
function get_info_order($id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_order where id=" . $id)->fetch();
	return $list;
}

function check_store_order_id($order_id, $store_id)
{
	global $db, $module_name;

	$flag = false;

	if ($order_id or $store_id) {
		$flag = $db->query("SELECT id FROM " . TABLE . "_order where store_id = " . $store_id . " AND id=" . $order_id)->fetchColumn();
	}

	if (!$flag) {
		nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=listorder');
	}

	return $flag;
}

// cập nhật mã vận đơn vnpost vào database
function update_vnpost($info_order, $order_vnpost)
{
	global $db, $user_info;

	// ghi lại lịch sử tạo vận đơn
	$row['order_id'] = $info_order['id'];
	$row['order_code'] = $info_order['order_code'];

	// xử lý danh sách sản phẩm trong đơn hàng
	$array_products = get_list_products_order($info_order['id']);

	$array_tam = array();
	foreach ($array_products as $product) {
		$array_tam[] = $product['name_product'];
	}

	$row['name_products'] = implode(', ', $array_tam);

	$row['id_vnpost'] = $order_vnpost['Id'];
	$row['total_weight_convert'] = $order_vnpost['WeightConvert'];
	$row['total_weight'] = $order_vnpost['WeightEvaluation'];
	$row['total_length'] = $order_vnpost['LengthEvaluation'];
	$row['total_width'] = $order_vnpost['WidthEvaluation'];
	$row['total_height'] = $order_vnpost['HeightEvaluation'];
	$row['total_moeny'] = $order_vnpost['OrderAmountEvaluation'];
	$row['tinhthanh_gui'] = $order_vnpost['SenderProvinceId'];
	$row['quanhuyen_gui'] = $order_vnpost['SenderDistrictId'];
	$row['address_gui'] = $order_vnpost['SenderAddress'];
	$row['phone_gui'] = $order_vnpost['SenderTel'];
	$row['name_gui'] = $order_vnpost['SenderFullname'];
	$row['userid_shop'] = $info_order['store_id'];
	$row['tinhthanh_nhan'] = $order_vnpost['ReceiverProvinceId'];
	$row['quanhuyen_nhan'] = $order_vnpost['ReceiverDistrictId'];
	$row['address_nhan'] = $order_vnpost['ReceiverAddress'];
	$row['phone_nhan'] = $order_vnpost['ReceiverTel'];
	$row['name_nhan'] = $order_vnpost['ReceiverFullname'];

	$row['item_code'] = $order_vnpost['ItemCode'];

	// Cước dịch vụ cộng thêm VAS tạm tính
	$row['tongcuocdichvucongthem'] = $order_vnpost['VasFreightEvaluation'];

	$row['tongcuocbaogomdvct'] = $order_vnpost['TotalFreightIncludeVatEvaluation'];

	$row['cuoc_phi'] = $row['tongcuocbaogomdvct'] - $row['tongcuocdichvucongthem'];



	$row['hinhthuc_vc'] = $order_vnpost['ServiceName'];

	/*
			Trạng thái null do đơn hàng mới tạo
			20: Đã tạo
			70: Thu gom thành công
			91: Phát chưa thành công
		*/
	$row['vnpost_status'] = $order_vnpost['OrderStatusId'];

	$row['customer_code'] = $order_vnpost['CustomerCode'];

	$row['date_add'] = NV_CURRENTTIME;

	$row['doisoat'] = 0;

	$row['cod'] = $order_vnpost['CodAmountEvaluation'];

	$stmt = $db->prepare('INSERT INTO ' . TABLE . '_history_vnpos (order_id, id_vnpost, order_code, name_products, total_weight_convert, total_weight, total_length, total_width, total_height, total_moeny, tinhthanh_gui, quanhuyen_gui, address_gui, phone_gui, name_gui, userid_add, tinhthanh_nhan, quanhuyen_nhan, address_nhan, phone_nhan, name_nhan, item_code, cuoc_phi, tongcuocdichvucongthem, tongcuocbaogomdvct, hinhthuc_vc, vnpost_status, customer_code, date_add, doisoat,cod) VALUES (:order_id, :id_vnpost, :order_code, :name_products, :total_weight_convert, :total_weight, :total_length, :total_width, :total_height, :total_moeny, :tinhthanh_gui, :quanhuyen_gui, :address_gui, :phone_gui, :name_gui, :userid_add, :tinhthanh_nhan, :quanhuyen_nhan, :address_nhan, :phone_nhan, :name_nhan, :item_code, :cuoc_phi, :tongcuocdichvucongthem, :tongcuocbaogomdvct, :hinhthuc_vc, :vnpost_status, :customer_code, :date_add, :doisoat,:cod)');

	$stmt->bindParam(':order_id', $row['order_id'], PDO::PARAM_INT);
	$stmt->bindParam(':id_vnpost', $row['id_vnpost'], PDO::PARAM_STR);
	$stmt->bindParam(':order_code', $row['order_code'], PDO::PARAM_STR);
	$stmt->bindParam(':name_products', $row['name_products'], PDO::PARAM_STR, strlen($row['name_products']));
	$stmt->bindParam(':total_weight_convert', $row['total_weight_convert'], PDO::PARAM_STR);
	$stmt->bindParam(':total_weight', $row['total_weight'], PDO::PARAM_STR);
	$stmt->bindParam(':total_length', $row['total_length'], PDO::PARAM_STR);
	$stmt->bindParam(':total_width', $row['total_width'], PDO::PARAM_STR);
	$stmt->bindParam(':total_height', $row['total_height'], PDO::PARAM_STR);
	$stmt->bindParam(':total_moeny', $row['total_moeny'], PDO::PARAM_STR);
	$stmt->bindParam(':tinhthanh_gui', $row['tinhthanh_gui'], PDO::PARAM_INT);
	$stmt->bindParam(':quanhuyen_gui', $row['quanhuyen_gui'], PDO::PARAM_INT);
	$stmt->bindParam(':address_gui', $row['address_gui'], PDO::PARAM_STR);
	$stmt->bindParam(':phone_gui', $row['phone_gui'], PDO::PARAM_STR);
	$stmt->bindParam(':name_gui', $row['name_gui'], PDO::PARAM_STR);
	$stmt->bindParam(':userid_add', $user_info['userid'], PDO::PARAM_INT);
	$stmt->bindParam(':tinhthanh_nhan', $row['tinhthanh_nhan'], PDO::PARAM_INT);
	$stmt->bindParam(':quanhuyen_nhan', $row['quanhuyen_nhan'], PDO::PARAM_INT);
	$stmt->bindParam(':address_nhan', $row['address_nhan'], PDO::PARAM_STR);
	$stmt->bindParam(':phone_nhan', $row['phone_nhan'], PDO::PARAM_STR);
	$stmt->bindParam(':name_nhan', $row['name_nhan'], PDO::PARAM_STR);
	$stmt->bindParam(':item_code', $row['item_code'], PDO::PARAM_STR);
	$stmt->bindParam(':cuoc_phi', $row['cuoc_phi'], PDO::PARAM_STR);
	$stmt->bindParam(':tongcuocdichvucongthem', $row['tongcuocdichvucongthem'], PDO::PARAM_STR);
	$stmt->bindParam(':tongcuocbaogomdvct', $row['tongcuocbaogomdvct'], PDO::PARAM_STR);
	$stmt->bindParam(':hinhthuc_vc', $row['hinhthuc_vc'], PDO::PARAM_STR);
	$stmt->bindParam(':vnpost_status', $row['vnpost_status'], PDO::PARAM_INT);
	$stmt->bindParam(':customer_code', $row['customer_code'], PDO::PARAM_STR);
	$stmt->bindParam(':date_add', $row['date_add'], PDO::PARAM_INT);
	$stmt->bindParam(':doisoat', $row['doisoat'], PDO::PARAM_INT);
	$stmt->bindParam(':cod', $row['cod'], PDO::PARAM_STR);

	$exc = $stmt->execute();

	// xử lý thông tin sau khi tạo vận đơn thành công status=2 đơn hàng đang giao
	$db->query('UPDATE ' . TABLE . '_order SET status=2, shipping_code=' . $db->quote($order_vnpost['ItemCode']) . ' where id=' . $row['order_id']);
	$content = 'Chuyển sang đơn vị vận chuyển VNPOST Thành Công';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $row['order_id'] . ',2,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');


	// lưu lịch lịch sử vận đơn
	$db->query('INSERT INTO ' . TABLE . '_history_vnpos_detail(order_id,itemcode,status_vnpost,user_add,addtime) VALUES(' . $info_order['id'] . ',"' . $order_vnpost['ItemCode'] . '", ' . $order_vnpost['OrderStatusId'] . ' ,' . $user_info['userid'] . ',' . NV_CURRENTTIME . ')');

	// gửi thông báo cho quản trị

	$content_ip = 'Gửi hàng VNPOST cho đơn hàng ' . $info_order['order_code'];
	nv_insert_notification_ecng($user_info['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');
	return true;
}

function update_ghn($info_order, $order_ghn, $info_warehouse)
{
	global $db, $global_seller;
	$sql = "INSERT INTO " . TABLE . "_history_ghn
	( order_id, user_add, order_code, fee, insurance_fee, station_send_fee, station_get_fee, return_fee, r2s_fee, total_fee, status, message, time_add, address_send, phone_send, name_send)
	VALUES
	(:order_id, :user_add, :order_code, :fee, :insurance_fee, :station_send_fee, :station_get_fee, :return_fee, :r2s_fee, :total_fee, :status, :message, :time_add, :address_send, :phone_send, :name_send)";
	$data_insert = array();
	$data_insert['order_id'] = $info_order['id'];
	$data_insert['user_add'] = $global_seller['userid'];
	$data_insert['order_code'] = $order_ghn['data']['order_code'];
	$data_insert['fee'] = $order_ghn['data']['fee']['main_service'];
	$data_insert['insurance_fee'] = $order_ghn['data']['fee']['insurance'];
	$data_insert['station_send_fee'] = $order_ghn['data']['fee']['station_do'];
	$data_insert['station_get_fee'] = $order_ghn['data']['fee']['station_pu'];
	$data_insert['return_fee'] = $order_ghn['data']['fee']['return'];
	$data_insert['r2s_fee'] = $order_ghn['data']['fee']['r2s'];
	$data_insert['total_fee'] = $order_ghn['data']['total_fee'];
	$data_insert['status'] = 'ready_to_pick';
	$data_insert['message'] = $order_ghn['message_display'];
	$data_insert['time_add'] = NV_CURRENTTIME;
	$data_insert['address_send'] = $info_warehouse['address'];
	$data_insert['phone_send'] = $info_warehouse['phone_send'];
	$data_insert['name_send'] = $global_seller['company_name'];
	$id_ghn = $db->insert_id( $sql, 'id', $data_insert );

	if($id_ghn){
		$sql = "INSERT INTO " . TABLE . "_history_ghn_api
		( order_id, order_code)
		VALUES
		(:order_id, :order_code)";
		$data_insert = array();
		$data_insert['order_id'] = $info_order['id'];
		$data_insert['order_code'] = $order_ghn['data']['order_code'];
		$db->insert_id( $sql, 'catid', $data_insert );
	}

	// xử lý thông tin sau khi tạo vận đơn thành công status=2 đơn hàng đang giao
	$db->query('UPDATE ' . TABLE . '_order SET status=2, shipping_code=' . $db->quote($order_ghn['data']['order_code']) . ' where id = ' . $info_order['id']);
	$content = 'Chuyển sang đơn vị vận chuyển GHN Thành Công';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $info_order['id'] . ',2,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $global_seller['userid'] . ')');

	// gửi thông báo cho quản trị
	$content_ip = 'Gửi hàng GHN cho đơn hàng ' . $info_order['order_code'];
	nv_insert_notification_ecng($global_seller['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');
	return true;
}

function update_ghn_error($info_order, $order_ghn)
{
	global $db, $user_info;

	$order_id = $info_order['id'];
	$ghn_code = $order_ghn['code'];
	$ghn_message = $order_ghn['message'];
	$today = NV_CURRENTTIME;

	$stmt = $db->prepare('INSERT INTO ' . TABLE . '_history_ghn (order_id, user_add ,code, message, time_add ) VALUES (:order_id, :user_add, :code, :message, :time_add )');

	$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
	$stmt->bindParam(':user_add', $user_info['userid'], PDO::PARAM_INT);
	$stmt->bindParam(':code', $ghn_code, PDO::PARAM_INT);
	$stmt->bindParam(':message', $ghn_message, PDO::PARAM_STR);
	$stmt->bindParam(':time_add', $today, PDO::PARAM_INT);
	$exc = $stmt->execute();

	return true;
}



function check_info_order_vnpost_history($shipping_code)
{
	global $db;

	$list_status = $db->query('SELECT * FROM ' . TABLE . '_history_vnpos_detail WHERE itemcode ="' . $shipping_code . '" ORDER BY addtime ASC')->fetchAll();

	return $list_status;
}

function convert_vi_to_en($str)
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
	$str = preg_replace("/(đ)/", "d", $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
	$str = preg_replace("/(Đ)/", "D", $str);

	$str = str_replace(" ", "", str_replace("&*#39;", "", $str));
	return $str;
}
function get_id_shop_from_user_id($id)
{
	global $db;
	$id = $db->query("SELECT id FROM " . TABLE . "_seller_management where userid=" . $id)->fetchColumn();
	return $id;
}
function get_info_order_status($id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_status_order where status_id=" . $id)->fetch();
	return $list;
}
function get_full_order_status()
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_status_order")
		->fetchAll();
	return $list;
}
function get_count_order_customer($status_id, $userid)
{
	global $db;
	$list = $db->query("SELECT count(*) FROM " . TABLE . "_order where status=" . $status_id . ' and userid=' . $userid)->fetchColumn();
	return $list;
}
function get_count_order_customer_time_add($status_id, $userid, $ngay_tu, $ngay_den)
{
	global $db;
	$where = '';
	$ngay_tu = strtotime($ngay_tu);

	$ngay_den = strtotime('+23 hour 59 minutes', strtotime($ngay_den));

	if ($ngay_tu > 0 and $ngay_den > 0) {
		$where .= ' AND time_add >= ' . $ngay_tu . ' AND time_add <= ' . $ngay_den;
	} else if ($ngay_tu > 0) {
		$where .= ' AND time_add >= ' . $ngay_tu;
	} else if ($ngay_den > 0) {
		$where .= ' AND time_add <= ' . $ngay_den;
	}

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_order where status=" . $status_id . ' and userid=' . $userid . $where)->fetchColumn();
	return $list;
}
function get_count_order($status_id, $store_id, $warehouse_id, $ngay_tu, $ngay_den, $customer_id = 0, $categories_id = 0, $q = '')
{
	global $db;
	$where = '';

	if ($ngay_tu > 0 and $ngay_den > 0) {
		$where .= ' AND t1.time_add >= ' . $ngay_tu . ' AND t1.time_add <= ' . $ngay_den;
	}
	if ($customer_id > 0) {
		$where .= ' AND t1.userid =' . $customer_id;
	}
	if ($categories_id > 0) {
		$where .= ' AND t2.product_id IN (SELECT id FROM ' . TABLE . '_product where categories_id=' . $categories_id . ')';
	}
	if (!empty($q)) {
		$where .= ' AND (t1.order_code LIKE "%" "' . $q . '" "%")';
	}
	if ($store_id == 0) {
		$list = $db->query("SELECT count(DISTINCT t1.id) FROM " . TABLE . "_order t1 INNER JOIN " . TABLE . "_order_item t2 ON t1.id=t2.order_id where t1.status=" . $status_id . $where . " AND t1.payment != 0")->fetchColumn();
	} else {
		if ($warehouse_id == 0) {

			$list = $db->query("SELECT count(DISTINCT t1.id) FROM " . TABLE . "_order t1 INNER JOIN " . TABLE . "_order_item t2 ON t1.id=t2.order_id where t1.status=" . $status_id . " and t1.store_id=" . $store_id . $where . " AND t1.payment != 0")->fetchColumn();
		} else {
			$list = $db->query("SELECT count(DISTINCT t1.id) FROM " . TABLE . "_order t1 INNER JOIN " . TABLE . "_order_item t2 ON t1.id=t2.order_id where t1.status=" . $status_id . " and t1.store_id=" . $store_id . " and t1.warehouse_id=" . $warehouse_id . $where . " AND t1.payment != 0")->fetchColumn();
		}
	}
	return $list;
}
function check_status_transporters_shop($sell_id, $transporters_id)
{
	global $db;
	$list = $db->query("SELECT status FROM " . TABLE . "_transporters_shop where sell_id=" . $sell_id . ' and transporters_id=' . $transporters_id)->fetchColumn();
	return $list;
}
function count_transporters_shop($sell_id, $transporters_id)
{
	global $db;
	$list = $db->query("SELECT count(*) FROM " . TABLE . "_transporters_shop where sell_id=" . $sell_id . ' and transporters_id=' . $transporters_id)->fetchColumn();
	return $list;
}
function get_info_district($districtid)
{
	global $db;
	if ($districtid) {
		$list = $db->query("SELECT * FROM " . NV_TABLE_DISTRICT . " where districtid=" . $districtid)->fetch();
		return $list;
	}
}
function get_info_province($provinceid)
{
	global $db;
	if ($provinceid) {
		$list = $db->query("SELECT * FROM " . NV_TABLE_PROVINCE . " where provinceid=" . $provinceid)->fetch();
		return $list;
	}
}
function get_info_warehouse($store_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_warehouse where id=" . $store_id)->fetch();
	return $list;
}

function get_ward_select2($q, $districtid)
{
	global $db;

	$list = $db->query("SELECT * FROM " . NV_TABLE_WARD . " where title like '%" . str_replace(' ', '%', $q) . "%' and districtid=" . $districtid)->fetchAll();

	return $list;
}

function get_bank_select2($q)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_bank where name_bank like '%" . str_replace(' ', '%', $q) . "%' OR bank_code like '%" . str_replace(' ', '%', $q) . "%'")->fetchAll();

	return $list;
}
function get_info_group($group_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_group where id=" . $group_id)->fetch();
	return $list;
}
function get_info_transporters($transporters_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_transporters where id=" . $transporters_id)->fetch();
	return $list;
}
function get_info_user($userid)
{
	global $db;

	$list = $db->query("SELECT * FROM " . NV_TABLE_USER . " where userid=" . $userid)->fetch();

	return $list;
}
function get_info_user_shops_username($username)
{
	global $db;
	$list = $db->query("SELECT t2.*, t1.userid as userid_shop FROM " . NV_TABLE_USER . " t1 INNER JOIN " . TABLE . "_seller_management t2 ON t1.userid = t2.userid where t1.username=" . $db->quote($username))->fetch();

	return $list;
}
function get_info_bank($bank_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_bank where bank_id=" . $bank_id)->fetch();

	return $list;
}
function count_category($id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_catalogs where parrent_id=" . $id)->fetchColumn();

	return $list;
}

function count_product_block($id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_block_id where bid=" . $id)->fetchColumn();
	return $list;
}
function count_product_cat($id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_product where categories_id=" . $id)->fetchColumn();
	return $list;
}
function count_product_cat_shop($id, $store_id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_product where categories_id=" . $id . " and store_id=" . $store_id)->fetchColumn();
	return $list;
}

function count_group($id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_group where parrent_id=" . $id)->fetchColumn();
	return $list;
}
function get_categories_select2($q, $idsite, $parrent_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where name like '%" . str_replace(' ', '%', $q) . "%' and status=1 and  idsite=0 and parrent_id=" . $parrent_id)->fetchAll();

	return $list;
}
function get_categories_select2_of_shop($q, $idsite, $parrent_id)
{
	global $db, $user_info;
	$shop_id = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE userid = ' . $user_info['userid'])->fetch();

	$list = $db->query("SELECT t1.* FROM " . TABLE . "_catalogs t1 INNER JOIN " . TABLE . "_rows t2 ON t1.id = t2.categories_id where t1.name like '%" . str_replace(' ', '%', $q) . "%' and t1.status=1 and  t1.idsite=0 and t1.parrent_id=" . $parrent_id . " AND t2.store_id = " . $shop_id['id'] . " GROUP BY t2.categories_id ")->fetchAll();

	return $list;
}
function get_full_product_classify_sellect2($q)
{
	global $db;

	$list = $db->query("SELECT t1.*,t1.price as price_product_classify_value_product,t1.price_special as price_special_product_classify_value_product ,t4.* FROM " . TABLE . "_product_classify_value_product t1 INNER JOIN " . TABLE . "_product_classify_value t2 ON (t1.classify_id_value1=t2.id OR t1.classify_id_value2=t2.id) INNER JOIN " . TABLE . "_product_classify t3 ON t2.classify_id=t3.id INNER JOIN " . TABLE . "_rows t4 ON t3.product_id=t4.id where t1.status=1 and (t4.name_product like '%" . str_replace(' ', '%', $q) . "%' OR t3.name_classify like '%" . str_replace(' ', '%', $q) . "%' OR t2.name like '%" . str_replace(' ', '%', $q) . "%') group by t1.id limit 30")->fetchAll();

	return $list;
}
function get_info_product_classify($id)
{
	global $db;

	$list = $db->query("SELECT t1.*,t1.price as price_product_classify_value_product,t1.price_special as price_special_product_classify_value_product ,t4.* FROM " . TABLE . "_product_classify_value_product t1 INNER JOIN " . TABLE . "_product_classify_value t2 ON (t1.classify_id_value1=t2.id OR t1.classify_id_value2=t2.id) INNER JOIN " . TABLE . "_product_classify t3 ON t2.classify_id=t3.id INNER JOIN " . TABLE . "_product t4 ON t3.product_id=t4.id where t1.id=" . $id)->fetch();

	return $list;
}
function get_categories_select2_full($q, $idsite)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where name like '%" . str_replace(' ', '%', $q) . "%' and status=1 and  idsite=0")->fetchAll();

	return $list;
}
function get_categories_select_2($q)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where name like '%" . str_replace(' ', '%', $q) . "%' and status=1")->fetchAll();

	return $list;
}
function get_full_unit_weight()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_weight_" . NV_LANG_DATA . " where status=1")
		->fetchAll();

	return $list;
}
function get_full_unit()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_units where status=1")
		->fetchAll();

	return $list;
}
function get_full_unit_currency()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_money_" . NV_LANG_DATA . " where status=1")
		->fetchAll();

	return $list;
}
function get_info_currency($currency_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_unit_currency where id=" . $currency_id)->fetch();

	return $list;
}
function get_info_unit_length($currency_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_unit_length where id=" . $currency_id)->fetch();

	return $list;
}
function get_info_unit_weight($currency_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_unit_weight where id=" . $currency_id)->fetch();

	return $list;
}
function get_full_transporters($store_id)
{
	global $db;
	$list = $db->query("SELECT t1.* FROM " . TABLE . "_transporters t1 LEFT JOIN " . TABLE . "_transporters_shop t2 ON t1.id=t2.transporters_id where t2.status=1 and t2.sell_id=" . $store_id . " and t1.status = 1 GROUP BY t1.id ORDER BY t1.weight ASC")->fetchAll();
	return $list;
}
function get_full_block()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_block where status=1")
		->fetchAll();

	return $list;
}
function get_full_unit_length()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_unit_length where status=1")
		->fetchAll();

	return $list;
}
function get_full_group($parrent_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_group where parrent_id=" . $parrent_id)->fetchAll();

	return $list;
}
function get_full_store()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_seller_management where status=1")
		->fetchAll();

	return $list;
}
function get_info_category($categories_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where id=" . $categories_id)->fetch();

	return $list;
}
function get_info_user_login($userid)
{
	global $db;
	$list = $db->query("SELECT sm.*,u.username FROM " . TABLE . "_seller_management sm LEFT JOIN " . NV_USERS_GLOBALTABLE . " u ON sm.userid = u.userid where sm.userid=" . $userid . " and sm.status=1")->fetch();
	return $list;
}
function get_info_user_login_un_active($userid)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_seller_management where userid=" . $userid . " and status=0")->fetch();
	return $list;
}

function get_list_category($parrent_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where parrent_id=" . $parrent_id)->fetchAll();

	return $list;
}
function get_info_shop($shop_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_seller_management where id=" . $shop_id)->fetch();
	return $list;
}
function get_full_category_home_not_parrent()
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where inhome=1 and parrent_id=0")
		->fetchAll();

	return $list;
}
function get_info_category_alias($alias)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_catalogs where alias=" . $db->quote($alias))->fetch();

	return $list;
}
function get_info_category_shop_alias($alias)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_category_shop where alias=" . $db->quote($alias))->fetch();
	return $list;
}
function get_info_store($store_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_seller_management where id=" . $store_id)->fetch();
	$list['avatar_image'] = $_SERVER["chonhagiau"] . $list['avatar_image'];
	return $list;
}
function get_info_status_order_ghn($status_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_status_order_ghn where status=" . $db->quote($status_id))->fetch();

	return $list;
}
function get_info_status_order_ghtk($status_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_status_order_ghtk where status=" . $db->quote($status_id))->fetch();

	return $list;
}

function check_block_id($bid, $product_id)
{
	global $db;

	$list = $db->query("SELECT count(*) FROM " . TABLE . "_block_id where bid=" . $bid . " and product_id=" . $product_id)->fetchColumn();

	return $list;
}
function get_info_product($product_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_product where id=" . $product_id)->fetch();

	return $list;
}
function get_list_product_cat($catid)
{
	global $db;

	$list = $db->query("SELECT t1.* FROM " . TABLE . "_product t1 INNER JOIN " . TABLE . "_catalogs t2 ON t1.categories_id=t2.id where t2.id=" . $catid . " OR t2.parrent_id=" . $catid)->fetchAll();

	return $list;
}
function get_info_product_alias($alias)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_product where alias=" . $db->quote($alias))->fetch();

	return $list;
}
function get_warehouse_store($sell_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_warehouse where status=1 and sell_id=" . $sell_id)->fetchAll();

	return $list;
}
function get_count_warehouse_store($sell_id)
{
	global $db;
	$list = $db->query("SELECT count(*) FROM " . TABLE . "_warehouse where status=1 and sell_id=" . $sell_id)->fetchColumn();

	return $list;
}
function get_list_item_warehouse_import($warehouse_product_import_id)
{
	global $db;
	$list = $db->query("SELECT t1.*,t2.name_product, t2.barcode FROM " . TABLE . "_warehouse_import_item t1 INNER JOIN " . TABLE . "_product t2 ON t1.product_id=t2.id where warehouse_product_import_id=" . $warehouse_product_import_id)->fetchAll();

	return $list;
}
function get_info_brand($brand)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_brand where id=" . $brand . " and status=1")->fetch();
	return $list;
}
function get_info_orgin($origin)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_origin where id=" . $origin . " and status=1")->fetch();
	return $list;
}

function get_info_invetory($product_id, $warehouse_id)
{
	global $db;

	$list = $db->query("SELECT t1.*,t2.status FROM " . TABLE . "_inventory_product t1 INNER JOIN " . TABLE . "_product_classify_value_product t2 ON t1.classify_value_product_id=t2.id where t1.product_id=" . $product_id . " and t1.warehouse_id=" . $warehouse_id)->fetchAll();

	return $list;
}
function get_info_invetory_no($product_id, $warehouse_id)
{
	global $db;

	$list = $db->query("SELECT * FROM " . TABLE . "_inventory_product where product_id=" . $product_id . " and warehouse_id=" . $warehouse_id)->fetchAll();

	return $list;
}

function get_info_invetory_group($product_id, $warehouse_id, $classify_value_product_id)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_inventory_product where product_id=" . $product_id . " and warehouse_id=" . $warehouse_id . " and classify_value_product_id=" . $classify_value_product_id)->fetch();

	return $list;
}

function get_info_product_edit_product($product_id)
{
	global $db;
	$list = $db->query("SELECT group_list FROM " . TABLE . "_product where id=" . $product_id)->fetchColumn();

	return $list;
}

function get_info_voucher($userid)
{
	global $db;
	$list = $db->query("SELECT * FROM " . TABLE . "_voucher_shop where status = 1 AND userid = " . $userid . ' ORDER BY time_add DESC')->fetchAll();

	return $list;
}
function ag_weekday($agtoday)
{
	//print_r($a); die;
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	//print_r($a);die;
	$weekday = date('l', $agtoday);

	$weekday = strtolower($weekday);
	switch ($weekday) {
		case 'monday':
			$weekday = 2;
			break;
		case 'tuesday':
			$weekday = 3;
			break;
		case 'wednesday':
			$weekday = 4;
			break;
		case 'thursday':
			$weekday = 5;

			break;
		case 'friday':
			$weekday = 6;

			break;
		case 'saturday':
			$weekday = 7;

			break;
		default:
			$weekday = 8;

			break;
	}

	return $weekday;
}

$agtoday = ag_weekday(NV_CURRENTTIME);

function nv_get_week_from_time($time)
{
	$week = 1;
	$year = date('Y', $time);
	$real_week = array(
		$week,
		$year
	);
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));

	$addYear = true;
	$num_week_loop = nv_get_max_week_of_year($year) - 1;

	for ($i = 0; $i <= $num_week_loop; $i++) {
		$week_begin = $time_first_week + $i * $time_per_week;
		$week_next = $week_begin + $time_per_week;

		if ($week_begin <= $time and $week_next > $time) {
			$real_week[0] = $i + 1;
			$addYear = false;
			break;
		}
	}
	if ($addYear) {
		$real_week[1] = $real_week[1] + 1;
	}

	return $real_week;
}

/**
 * nv_get_max_week_of_year()
 *
 * @param mixed $year
 * @return
 */
function nv_get_max_week_of_year($year)
{
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));

	if (date('Y', $time_first_week + ($time_per_week * 53) - 1) == $year) {
		return 53;
	} else {
		return 52;
	}
}

function nv_generate_page2($base_url, $num_items, $per_page, $on_page, $add_prevnext_text = true, $onclick = false, $js_func_name = 'nv_urldecode_ajax', $containerid = 'generate_page', $full_theme = true)
{
	global $lang_global;

	// Round up total page
	$total_pages = ceil($num_items / $per_page);
	if ($total_pages < 2) {
		return '';
	}

	if (!is_array($base_url)) {
		$amp = preg_match('/\?/', $base_url) ? '&amp;' : '?';
		$amp .= 'page2=';
	} else {
		$amp = $base_url['amp'];
		$base_url = $base_url['link'];
	}

	$page_string = '';

	if ($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;

		for ($i = 1; $i <= $init_page_max; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}

		if ($total_pages > 3) {
			if ($on_page > 1 and $on_page < $total_pages) {
				if ($on_page > 5) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}

				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;

				for ($i = $init_page_min - 1; $i < $init_page_max + 2; ++$i) {
					$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
					$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
					$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
				}

				if ($on_page < $total_pages - 4) {
					$page_string .= '<li class="disabled"><span>...</span></li>';
				}
			} else {
				$page_string .= '<li class="disabled"><span>...</span></li>';
			}

			for ($i = $total_pages - 2; $i < $total_pages + 1; ++$i) {
				$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
				$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
				$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
			}
		}
	} else {
		for ($i = 1; $i < $total_pages + 1; ++$i) {
			$href = ($i > 1) ? $base_url . $amp . $i : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li' . ($i == $on_page ? ' class="active"' : '') . '><a' . ($i == $on_page ? ' href="#"' : ' ' . $href) . '>' . $i . '</a></li>';
		}
	}

	if ($add_prevnext_text) {
		if ($on_page > 1) {
			$href = ($on_page > 2) ? $base_url . $amp . ($on_page - 1) : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string = "<li><a " . $href . " title=\"" . $lang_global['pageprev'] . "\">&laquo;</a></li>" . $page_string;
		} else {
			$page_string = '<li class="disabled"><a href="#">&laquo;</a></li>' . $page_string;
		}

		if ($on_page < $total_pages) {
			$href = ($on_page) ? $base_url . $amp . ($on_page + 1) : $base_url;
			$href = !$onclick ? "href=\"" . $href . "\"" : "href=\"javascript:void(0)\" onclick=\"" . $js_func_name . "('" . rawurlencode(nv_unhtmlspecialchars($href)) . "','" . $containerid . "')\"";
			$page_string .= '<li><a ' . $href . ' title="' . $lang_global['pagenext'] . '">&raquo;</a></li>';
		} else {
			$page_string .= '<li class="disabled"><a href="#">&raquo;</a></li>';
		}
	}

	if ($full_theme !== true) {
		return $page_string;
	}

	return '<ul class="pagination">' . $page_string . '</ul>';
}

$list_config_reseller1 = $nv_Cache->db('SELECT config_name, config_value FROM ' . TABLE . '_config', '', 'reseller');
$Config_reseller = array();
foreach ($list_config_reseller1 as $values) {
	$Config_reseller[$values['config_name']] = $values['config_value'];
}

$list_config_reseller = $Config_reseller;

$list_config_reseller_sys1 = $nv_Cache->db('SELECT config_name, config_value FROM ' . $db_config['prefix'] . '_config', '', '');
$Config_sys = array();
foreach ($list_config_reseller_sys1 as $values) {
	$Config_sys[$values['config_name']] = $values['config_value'];
}

$list_config_reseller_sys = $Config_sys;

function getConfig($module)
{
	global $db, $site_mods, $db_config;

	$list = $db->query('SELECT config_name, config_value FROM ' . TABLE . '_config')
		->fetchAll();
	$Config = array();
	foreach ($list as $values) {
		$Config[$values['config_name']] = $values['config_value'];
	}
	unset($list);

	return $Config;
}
function get_data($url, $token)
{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'h-token:' . $token,
		'Token:' . $token
	));
	$result = curl_exec($ch);
	curl_close($ch);

	$data = json_decode($result, true);

	return $data;
}
function get_data_print_pdf($url, $token)
{
	header("Content-Type: application/pdf");

	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'h-token:' . $token,
		'Token:' . $token
	));
	$result = curl_exec($ch);

	curl_close($ch);

	return $result;
}

function post_data_test($url, $param_array, $token)
{

	$json = json_encode($param_array);
	// URL có chứa hai thông tin name và diachi
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($json) . '',
		'h-token:' . $token,
		'Token:' . $token
	));

	//print_r($json);die;
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($curl);

	$data = json_decode($result, true);

	curl_close($curl);

	return $data;
}

function post_data($url, $param_array, $token)
{

	$json = json_encode($param_array);
	// URL có chứa hai thông tin name và diachi
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($json) . '',
		'h-token:' . $token,
		'Token:' . $token
	));

	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($curl);

	$data = json_decode($result, true);

	curl_close($curl);

	return $data;
}
function get_token_vnpost()
{
	global $config_setting;
	$domain = 'https://donhang.vnpost.vn/api/api';
	$url = $domain . "/MobileAuthentication/GetAccessToken";
	$param = array(
		'TenDangNhap' => $config_setting['username_vnpost'],
		'MatKhau' => $config_setting['password_vnpost']
	);

	$data = post_data($url, $param, '');
	$result = $data['Token'];
	return $result;
}
function barcode($itemcode)
{
	$domain = 'https://donhang.vnpost.vn/api/api';
	$url = $domain . "/Order/GetBarCode?itemCode=" . $itemcode;
	$token = get_token_vnpost();
	$data = get_data($url, $token);

	return $data;
}
function login_viettel_post()
{
	global $config_setting;
	$url = 'https://partner.viettelpost.vn/v2/user/Login';
	$param = array(
		"USERNAME" => $config_setting['username_viettelpost'],
		"PASSWORD" => $config_setting['password_viettelpost']
	);
	$data = post_data($url, $param, '');

	return $data;
}

function get_price_vnpost($MaDichVu, $MaTinhGui, $MaQuanGui, $MaTinhNhan, $MaQuanNhan, $ThuCuocNguoiNhan, $LstDichVuCongThem, $length_product, $width_product, $height_product, $weight_product)
{
	$url = 'https://donhang.vnpost.vn/api/api/TinhCuoc/TinhTatCaCuoc';
	if ($ThuCuocNguoiNhan == true) {
		$param = array(
			"MaDichVu" => $MaDichVu,
			"MaTinhGui" => $MaTinhGui,
			"MaQuanGui" => $MaQuanGui,
			"MaTinhNhan" => $MaTinhNhan,
			"MaQuanNhan" => $MaQuanNhan,
			"Dai" => $length_product,
			"Rong" => $width_product,
			"Cao" => $height_product,
			"KhoiLuong" => $weight_product,
			"ThuCuocNguoiNhan" => $ThuCuocNguoiNhan,
			"LstDichVuCongThem" => $LstDichVuCongThem
		);
	} else {
		if (count($LstDichVuCongThem) > 0) {
			$param = array(
				"MaDichVu" => $MaDichVu,
				"MaTinhGui" => $MaTinhGui,
				"MaQuanGui" => $MaQuanGui,
				"MaTinhNhan" => $MaTinhNhan,
				"MaQuanNhan" => $MaQuanNhan,
				"Dai" => $length_product,
				"Rong" => $width_product,
				"Cao" => $height_product,
				"KhoiLuong" => $weight_product,
				"ThuCuocNguoiNhan" => $ThuCuocNguoiNhan,
				"LstDichVuCongThem" => $LstDichVuCongThem
			);
		} else {
			$param = array(
				"MaDichVu" => $MaDichVu,
				"MaTinhGui" => $MaTinhGui,
				"MaQuanGui" => $MaQuanGui,
				"MaTinhNhan" => $MaTinhNhan,
				"MaQuanNhan" => $MaQuanNhan,
				"Dai" => $length_product,
				"Rong" => $width_product,
				"Cao" => $height_product,
				"ThuCuocNguoiNhan" => $ThuCuocNguoiNhan,
				"KhoiLuong" => $weight_product
			);
		}
	}
	$token = get_token_vnpost();
	$data = post_data($url, $param, $token);
	return $data;
}

function get_price_ghn_2($service_type_id, $shop_id, $to_district_id, $to_ward_code, $height, $length, $weight, $width, $insurance_value, $from_district_id)
{

	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/shipping-order/fee';
	$param = array(
		"service_type_id" => (int)$service_type_id,
		"shop_id" => $shop_id,
		"from_district_id" => (int)$from_district_id,
		"to_district_id" => (int)$to_district_id,
		"to_ward_code" => (string)($to_ward_code),
		"height" => (int)$height,
		"length" => (int)$length,
		"weight" => (int)$weight,
		"width" => (int)$width,
		"insurance_value" => (int)$insurance_value,
		"coupon" => null
	);
	$data = post_data($url, $param, $config_setting['token_ghn']);

	return $data;
}

function get_province_ghn()
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/master-data/province';
	$param = array(
		'token' => $config_setting['token_ghn']
	);
	$data = post_data($url, $param, $config_setting['token_ghn']);

	return $data;
}
function get_district_ghn($province_id)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/master-data/district';
	$param = array(
		'token' => $config_setting['token_ghn'],
		'province_id' => $province_id
	);
	$data = post_data($url, $param, $config_setting['token_ghn']);

	return $data;
}
function get_ward_ghn($district_id)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/master-data/ward';
	$param = array(
		'token' => $config_setting['token_ghn'],
		'district_id' => $district_id
	);

	$data = post_data($url, $param, $config_setting['token_ghn']);

	return $data;
}
function get_province_vt()
{
	global $config_setting;
	$url = 'https://partner.viettelpost.vn/v2/categories/listProvinceById?provinceId=-1';

	$data = get_data($url, '');

	return $data;
}
function get_district_vt($province_id)
{
	global $config_setting;
	$url = 'https://partner.viettelpost.vn/v2/categories/listDistrict?provinceId=' . $province_id;

	$data = get_data($url, '');

	return $data;
}
function get_ward_vt($district_id)
{
	global $config_setting;
	$url = 'https://partner.viettelpost.vn/v2/categories/listWards?districtId=' . $district_id;

	$data = get_data($url, '');

	return $data;
}
function create_store_ghn($district_id, $ward_code, $name, $phone, $address)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/shop/register';
	$param = array(
		"district_id" => (int)$district_id,
		"ward_code" => (string)$ward_code,
		"name" => $name,
		"phone" => str_replace('-', '', $phone),
		"address" => $address
	);

	$data = post_data($url, $param, $config_setting['token_ghn']);
	return $data;
}
function get_price_ghn($service_type_id, $shop_id, $to_district_id, $to_ward_code, $height, $length, $weight, $width, $insurance_value)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/shipping-order/fee';
	$param = array(
		"service_type_id" => (int)$service_type_id,
		"shop_id" => $shop_id,
		"to_district_id" => (int)$to_district_id,
		"to_ward_code" => (string)($to_ward_code),
		"height" => $height,
		"length" => $length,
		"weight" => $weight,
		"width" => $width,
		"insurance_value" => $insurance_value,
		"coupon" => null
	);
	$data = post_data($url, $param, $config_setting['token_ghn']);

	return $data;
}
function get_price_ghtk($pick_address, $pick_province, $pick_district, $pick_ward, $address, $province, $district, $ward, $weight, $insurance_value)
{
	global $config_setting;
	$url = $config_setting['url_ghtk'] . '/services/shipment/fee';
	$param = array(
		"pick_address" => $pick_address,
		"pick_province" => $pick_province,
		"pick_district" => $pick_district,
		"pick_ward" => $pick_ward,
		"address" => $address,
		"province" => $province,
		"district" => $district,
		"ward" => $ward,
		"weight" => $weight,
		"value" => $insurance_value,
		"deliver_option" => "none"
	);
	$data = post_data($url, $param, $config_setting['token_ghtk']);

	return $data;
}
function get_token_ahamove()
{
	global $config_setting;
	$url = $config_setting['url_ahamove'] . '/v1/partner/register_account?mobile=0833081888&name=Chợ+Nhà+Giàu&address=Hồ+Chí+Minh&api_key=' . $config_setting['token_ahamove'];
	$data = get_data($url, '');
	return $data;
}

function get_price_ahamove($token, $lat_send, $lng_send, $address_send, $short_address_send, $name_send, $lat_receive, $lng_receive, $address_receive, $name_receive, $service_id)
{
	global $db, $config_setting;
	$url = $config_setting['url_ahamove'] . '/v1/order/estimated_fee?token=' . $token . '&order_time=0&path=[{"lat":' . $lat_send . ',"lng":' . $lng_send . ',"address":"' . urlencode($address_send) . '","short_address":"' . urlencode($short_address_send) . '","name":"' . urlencode($name_send) . '","remarks":"call%20me"},{"lat":' . $lat_receive . ',"lng":' . $lng_receive . ',"address":"' . urlencode($address_receive) . '","name":"' . urlencode($name_receive) . '"}]&service_id=' . $service_id . '&requests=[]&payment_method=BALANCE';
	$data = get_data($url, '');
	return $data;
}
function get_price_viettelpost($PRODUCT_PRICE, $MONEY_COLLECTION, $ORDER_SERVICE, $SENDER_PROVINCE, $SENDER_DISTRICT, $RECEIVER_PROVINCE, $RECEIVER_DISTRICT, $PRODUCT_TYPE, $NATIONAL_TYPE, $PRODUCT_WEIGHT, $PRODUCT_WIDTH, $PRODUCT_HEIGHT, $PRODUCT_LENGTH)
{

	$url = 'https://partner.viettelpost.vn/v2/order/getPrice';
	$param = array(
		"PRODUCT_WEIGHT" => $PRODUCT_WEIGHT,
		"PRODUCT_PRICE" => $PRODUCT_PRICE,
		"MONEY_COLLECTION" => $MONEY_COLLECTION,
		"ORDER_SERVICE_ADD" => "",
		"ORDER_SERVICE" => $ORDER_SERVICE,
		"SENDER_PROVINCE" => $SENDER_PROVINCE,
		"SENDER_DISTRICT" => $SENDER_DISTRICT,
		"RECEIVER_PROVINCE" => $RECEIVER_PROVINCE,
		"RECEIVER_DISTRICT" => $RECEIVER_DISTRICT,
		"PRODUCT_TYPE" => $PRODUCT_TYPE,
		"NATIONAL_TYPE" => $NATIONAL_TYPE,
		"PRODUCT_WIDTH" => $PRODUCT_WIDTH,
		"PRODUCT_HEIGHT" => $PRODUCT_HEIGHT,
		"PRODUCT_LENGTH" => $PRODUCT_LENGTH
	);
	$token = login_viettel_post();

	$data = post_data($url, $param, $token['data']['token']);

	return $data;
}
function GetListBuuCucByXaHuyenTinh($MaTinhThanh, $MaQuanHuyen)
{
	$domain = 'https://donhang.vnpost.vn/api/api';
	$url = $domain . "/BuuCuc/GetListBuuCucByXaHuyenTinh";
	$param = array(
		"MaTinhThanh" => $MaTinhThanh,
		"MaQuanHuyen" => $MaQuanHuyen
	);

	$data = post_data($url, $param, '');

	return $data;
}

function send_vnpost($OrderCode, $PackageContent, $ServiceName, $SenderFullname, $SenderAddress, $SenderTel, $SenderProvinceId, $SenderDistrictId, $SenderWardId, $ReceiverFullname, $ReceiverAddress, $ReceiverTel, $ReceiverProvinceId, $ReceiverDistrictId, $ReceiverWardId, $CodAmountEvaluation, $PickupPoscode, $weight_product, $length_product, $width_product, $height_product, $total_money, $PickupType)
{
	$url = 'https://donhang.vnpost.vn/api/api/Order/CreateOrder';

	/*
			Hình thức thu gom *
			- 1: Pickup - Thu gom tận nơi
			- 2: Dropoff - Gửi hàng tại bưu cục
			
			IsPackageViewable boolean Có cho xem hàng hay không
			
			CodAmountEvaluation Tiền thu hộ COD
			
			IsReceiverPayFreight Cộng thêm cước vào tiền thu hộ  COD
			
			OrderAmountEvaluation tổng tiền > 0 là sử dụng dịch vụ khai báo giá
			
		*/

	$CodAmountEvaluation = 0;


	$param = array(
		"OrderCode" => $OrderCode,
		"VendorId" => 1,
		"PickupType" => $PickupType,
		"IsPackageViewable" => false,
		"PackageContent" => $PackageContent,
		"ServiceName" => $ServiceName,
		"SenderFullname" => $SenderFullname,
		"SenderAddress" => $SenderAddress,
		"SenderTel" => $SenderTel,
		"SenderProvinceId" => $SenderProvinceId,
		"SenderDistrictId" => $SenderDistrictId,
		"SenderWardId" => $SenderWardId,
		"ReceiverFullname" => $ReceiverFullname,
		"ReceiverAddress" => $ReceiverAddress,
		"ReceiverTel" => $ReceiverTel,
		"ReceiverProvinceId" => $ReceiverProvinceId,
		"ReceiverDistrictId" => $ReceiverDistrictId,
		"ReceiverWardId" => $ReceiverWardId,
		"ShipperTel" => "",
		"CodAmountEvaluation" => $CodAmountEvaluation,
		"WeightEvaluation" => $weight_product,
		"WidthEvaluation" => $width_product,
		"LengthEvaluation" => $length_product,
		"HeightEvaluation" => $height_product,
		"IsReceiverPayFreight" => false,
		"OrderAmountEvaluation" => $total_money,
		"SenderAddressType" => 1
	);



	$token = get_token_vnpost();

	$data = post_data_test($url, $param, $token);

	return $data;
}
function create_warehouse_viettelpost($phone, $name, $address, $ward_id)
{
	$url = 'https://partner.viettelpost.vn/v2/user/registerInventory';
	$param = array(
		"PHONE" => $phone,
		"NAME" => $name,
		"ADDRESS" => $address,
		"WARDS_ID" => $ward_id
	);
	$token = login_viettel_post();
	$data = post_data($url, $param, $token['data']['token']);
	return $data;
}
function send_viettelpost($PRODUCT_PRICE, $MONEY_COLLECTION, $ORDER_SERVICE_ADD, $ORDER_SERVICE, $SENDER_PROVINCE, $SENDER_DISTRICT, $SENDER_WARD, $SENDER_LATITUDE, $SENDER_LONGITUDE, $RECEIVER_PROVINCE, $RECEIVER_DISTRICT, $PRODUCT_TYPE, $ORDER_NUMBER, $GROUPADDRESS_ID, $CUS_ID, $SENDER_FULLNAME, $SENDER_ADDRESS, $SENDER_PHONE, $RECEIVER_FULLNAME, $RECEIVER_ADDRESS, $RECEIVER_PHONE, $PRODUCT_NAME, $PRODUCT_DESCRIPTION, $PRODUCT_QUANTITY, $ORDER_PAYMENT, $list_item, $PRODUCT_WEIGHT, $PRODUCT_LENGTH, $PRODUCT_WIDTH, $PRODUCT_HEIGHT, $RECEIVER_WARD, $RECEIVER_LATITUDE, $RECEIVER_LONGITUDE)
{

	$url = 'https://partner.viettelpost.vn/v2/order/createOrder';
	$param = array(
		"ORDER_NUMBER" => $ORDER_NUMBER,
		"GROUPADDRESS_ID" => $GROUPADDRESS_ID,
		"CUS_ID" => $CUS_ID,
		"DELIVERY_DATE" => '',
		"SENDER_FULLNAME" => $SENDER_FULLNAME,
		"SENDER_ADDRESS" => $SENDER_ADDRESS,
		"SENDER_PHONE" => $SENDER_PHONE,
		"SENDER_EMAIL" => '',
		"SENDER_PROVINCE" => $SENDER_PROVINCE,
		"SENDER_DISTRICT" => $SENDER_DISTRICT,
		"SENDER_WARD" => $SENDER_WARD,
		"SENDER_LATITUDE" => "",
		"SENDER_LONGITUDE" => "",
		"RECEIVER_FULLNAME" => $RECEIVER_FULLNAME,
		"RECEIVER_ADDRESS" => $RECEIVER_ADDRESS,
		"RECEIVER_MAIL" => '',
		"RECEIVER_PHONE" => $RECEIVER_PHONE,
		"RECEIVER_PROVINCE" => $RECEIVER_PROVINCE,
		"RECEIVER_DISTRICT" => $RECEIVER_DISTRICT,
		"RECEIVER_WARD" => $RECEIVER_WARD,
		"RECEIVER_LATITUDE" => "",
		"RECEIVER_LONGITUDE" => "",
		"PRODUCT_NAME" => $PRODUCT_NAME,
		"PRODUCT_DESCRIPTION" => $PRODUCT_DESCRIPTION,
		"PRODUCT_QUANTITY" => $PRODUCT_QUANTITY,
		"PRODUCT_PRICE" => $PRODUCT_PRICE,
		"PRODUCT_WEIGHT" => $PRODUCT_WEIGHT,
		"PRODUCT_LENGTH" => $PRODUCT_LENGTH,
		"PRODUCT_WIDTH" => $PRODUCT_WIDTH,
		"PRODUCT_HEIGHT" => $PRODUCT_HEIGHT,
		"PRODUCT_TYPE" => $PRODUCT_TYPE,
		"ORDER_PAYMENT" => $ORDER_PAYMENT,
		"ORDER_SERVICE" => $ORDER_SERVICE,
		"ORDER_SERVICE_ADD" => $ORDER_SERVICE_ADD,
		"ORDER_VOUCHER" => '',
		"ORDER_NOTE" => '',
		"MONEY_COLLECTION" => $MONEY_COLLECTION,
		"MONEY_TOTALFEE" => 0,
		"MONEY_FEECOD" => 0,
		"MONEY_FEEVAS" => 0,
		"MONEY_FEEINSURRANCE" => 0,
		"MONEY_FEE" => 0,
		"MONEY_FEEOTHER" => 0,
		"MONEY_TOTALVAT" => 0,
		"MONEY_TOTAL" => 0,
		"LIST_ITEM" => $list_item,
	);
	$token = login_viettel_post();

	$data = post_data($url, $param, $token['data']['token']);
	return $data;
}
function get_info_product_ghtk($q)
{
	global $config_setting;
	$url = $config_setting['url_ghtk'] . '/services/kho-hang/thong-tin-san-pham?term=' . $q;
	$data = get_data($url, $config_setting['token_ghtk']);
	return $data;
}

function send_ghtk($products, $order_code, $pick_name, $pick_address, $pick_province, $pick_district, $pick_ward, $pick_tel, $tel, $name, $address, $province, $district, $ward, $pick_money, $value, $transport, $deliver_option, $pick_option, $is_freeship)
{
	global $config_setting;
	$url = $config_setting['url_ghtk'] . '/services/shipment/order';

	$param = array(
		"products" => $products,
		"order" => array(
			"id" => $order_code,
			"pick_name" => $pick_name,
			"pick_address" => $pick_address,
			"pick_province" => $pick_province,
			"pick_district" => $pick_district,
			"pick_ward" => $pick_ward,
			"pick_tel" => $pick_tel,
			"tel" => $tel,
			"name" => $name,
			"address" => $address,
			"province" => $province,
			"district" => $district,
			"ward" => $ward,
			"hamlet" => "Khác",
			"is_freeship" => (int)$is_freeship, //Freeship cho người nhận hàng. Nếu bằng 1 COD sẽ chỉ thu người nhận hàng số tiền bằng pick_money, nếu bằng 0 COD sẽ thu tiền người nhận số tiền bằng pick_money + phí ship của đơn hàng, giá trị mặc định bằng 0
			"pick_money" => $pick_money,
			"note" => "",
			"value" => $value,
			"transport" => $transport,
			"deliver_option" => $deliver_option,
			"pick_option" => $pick_option,
		)
	);
	
	$data = post_data($url, $param, $config_setting['token_ghtk']);
	return $data;
}

function update_ghtk($info_order, $order_ghtk, $address_create_order, $phone_send)
{
	global $config_setting, $db, $user_info, $global_seller;
	
	$sql = "INSERT INTO " . TABLE . "_history_ghtk
	( order_id, user_add, label, fee, insurance_fee, status_id, time_add, address_send, phone_send, name_send)
	VALUES
	(:order_id, :user_add, :label, :fee, :insurance_fee, :status_id, :time_add, :address_send, :phone_send, :name_send)";
	$data_insert = array();
	$data_insert['order_id'] = $info_order['id'];
	$data_insert['user_add'] = $user_info['userid'];
	$data_insert['label'] = $order_ghtk['order']['label'];
	$data_insert['fee'] = $order_ghtk['order']['fee'];
	$data_insert['insurance_fee'] = $order_ghtk['order']['insurance_fee'];
	$data_insert['status_id'] = $order_ghtk['order']['status_id'];
	$data_insert['time_add'] = NV_CURRENTTIME;
	$data_insert['address_send'] = $address_create_order;
	$data_insert['phone_send'] = $phone_send;
	$data_insert['name_send'] = $global_seller['company_name'];
	$history_ghtk_id = $db->insert_id($sql, 'id', $data_insert);
	
	// xử lý thông tin sau khi tạo vận đơn thành công status=2 đơn hàng đang giao
	$db->query('UPDATE ' . TABLE . '_order SET status = 2, shipping_code=' . $db->quote($order_ghtk['order']['label']) . ' where id = ' . $info_order['id']);
	$content = 'Chuyển sang đơn vị vận chuyển GHTK Thành Công';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $info_order['id'] . ',2,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');

	// gửi thông báo cho quản trị
	$content_ip = 'Gửi hàng GHTK cho đơn hàng ' . $info_order['order_code'];
	nv_insert_notification_ecng($user_info['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');
	return true;
}

function send_ghn($shop_id, $to_name, $to_phone, $to_address, $to_ward_code, $to_district_id, $content, $weight, $length, $width, $height, $pick_station_id, $insurance_value, $service_type_id, $payment_type_id, $required_note, $items, $cod_amount)
{

	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/shipping-order/create';
	$param = array(
		'to_name' => (string)$to_name,
		'to_phone' => (string)$to_phone,
		'to_address' => (string)$to_address,
		'to_ward_code' => (string)$to_ward_code,
		'to_district_id' => (int)$to_district_id,
		'content' => (string)$content,
		'weight' => (int)$weight,
		'length' => (int)$length,
		'width' => (int)$width,
		'height' => (int)$height,
		'pick_station_id' => (int)$pick_station_id,
		'insurance_value' => (int)$insurance_value,
		'service_type_id' => (int)$service_type_id,
		'payment_type_id' => $payment_type_id,
		'note' => 'Vui lòng gọi trước khi giao hàng',
		'required_note' => (string)$required_note,
		'items' => $items,
		'cod_amount' => (int)$cod_amount
	);
	
	$data = post_data_ghn($url, $param, $shop_id);

	return $data;
}

function post_data_ghn($url, $param_array, $shop_id)
{
	global $config_setting;
	$json = json_encode($param_array);

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($json) . '',
		'h-token:' . $config_setting['token_ghn'],
		'Token:' . $config_setting['token_ghn'],
		'ShopId:' . $shop_id,
	));
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($curl);
	$data = json_decode($result, true);
	curl_close($curl);
	return $data;
	
}


function ghn_cancel($shop_id, $ship_code)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/switch-status/cancel';

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => '{
		"order_codes":["' . $ship_code . '"]
		}',
		CURLOPT_HTTPHEADER => array(
			'ShopId:' . $shop_id,
			'Token: ' . $config_setting['token_ghn'],
			'Content-Type: application/json'
		),
	));

	$result = curl_exec($curl);
	$data = json_decode($result, true);
	curl_close($curl);
	return $data;
}


function send_ahamove($path, $service_id, $items, $payment_method)
{
	global $db, $config_setting;
	$token = get_token_ahamove();
	$url = $config_setting['url_ahamove'] . '/v1/order/create?token=' . $token['token'] . '&order_time=0&path=' . json_encode($path) . '&service_id=' . $service_id . '&requests=[]&image=[]&remarks=' . urlencode("Gọi tôi khi đến") . '&idle_until=0&items=' . json_encode($items) . '&payment_method=' . $payment_method;
	$data = get_data($url, $token['token']);
	return $data;
}
function check_info_order_vnpost($LstItemCode)
{
	$domain = 'https://donhang.vnpost.vn/api/api';
	$url = $domain . "/Order/TraCuuDanhSachBuuGuiBCCP";
	$param = array(
		'LstItemCode' => $LstItemCode
	);
	$token = get_token_vnpost();
	$data = post_data($url, $param, $token);
	return $data;
}
function check_info_order_vnpost_2($LstItemCode)
{
	$domain = 'https://donhang.vnpost.vn/api/api';
	$url = $domain . "/Order/TraCuuBuuGuiBCCP";
	$param = array(
		"ItemCode" => $LstItemCode
	);
	$token = get_token_vnpost();
	$data = post_data($url, $param, $token);
	return $data;
}
function check_info_order_ghn($order_code, $shop_id)
{
	global $config_setting;
	$url = $config_setting['url_ghn'] . '/v2/shipping-order/detail';
	$param = array(
		'token' => $config_setting['token_ghn'],
		'order_code' => $order_code,
		'shop_id' => $shop_id
	);
	$data = post_data($url, $param, $config_setting['token_ghn']);
	return $data;
}
function check_info_order_ghtk($order_code)
{
	global $config_setting;
	$url = $config_setting['url_ghtk'] . '/services/shipment/v2/' . $order_code;
	$data = get_data($url, $config_setting['token_ghtk']);
	return $data;
}
function check_info_order_ahamove($order_code)
{
	global $config_setting;
	$token = get_token_ahamove();
	$url = $config_setting['url_ahamove'] . '/v1/order/shared_link?token=' . $token['token'] . '&order_id=' . $order_code;
	$data = get_data($url, '');
	return $data;
}
function print_ghtk($order_code)
{
	global $config_setting;
	$url = $config_setting['url_ghtk'] . '/services/label/' . $order_code;
	$data = get_data_print_pdf($url, $config_setting['token_ghtk']);
	return $data;
}


$config_setting = getConfig($module_name);
$array_op_nologin = array(
	'1' => 'registercontact',
	'2' => 'handle-image'
	);
if (!in_array($op,$array_op_nologin))
{
	
	if (!defined('NV_IS_USER'))
	{
		
		nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users');
		
	}
	elseif($op != 'requireactive')
	{
		
		$store_id = get_info_user_login($user_info['userid']) ['id'];
		
		if (empty($store_id))
		{
			echo '<script language="javascript">';
			echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=registercontact', true) . '"';
			echo '</script>';
		}
	}
}

// if ($op != 'registercontact' or $op != 'api_test') {

// 	if (!defined('NV_IS_USER')) {

// 		nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users');
// 	} elseif ($op != 'requireactive') {

// 		$store_id = get_info_user_login($user_info['userid'])['id'];

// 		if (empty($store_id)) {
// 			echo '<script language="javascript">';
// 			echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=registercontact', true) . '"';
// 			echo '</script>';
// 		}
// 	}
// }





function check_product($product_id)
{
	global $db, $store_id, $user_info, $module_name;

	if (!$product_id)
		return false;



	if ($product_id) {
		$checkin = $db->query('SELECT id FROM ' . TABLE . '_rows WHERE id= ' . $product_id . ' AND idsite =' . $store_id)->fetchColumn();

		if (!$checkin) {
			echo '<script language="javascript">';
			echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product', true) . '"';
			echo '</script>';
		} else {
			return true;
		}
	}

	return false;
}

/**
 * nv_list_lang()
 *
 * @return
 */
function nv_list_lang()
{
    global $db_config, $db;
    $re = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1');
    $lang_value = array();
    while (list ($lang_i) = $re->fetch(3)) {
        $lang_value[] = $lang_i;
    }
    return $lang_value;
}
/**
 * nv_file_table()
 *
 * @param mixed $table
 * @return
 */
function nv_file_table($table)
{
    global $db_config, $db;
    $lang_value = nv_list_lang();
    $arrfield = array();
    $result = $db->query('SHOW COLUMNS FROM ' . $table);
    while (list ($field) = $result->fetch(3)) {
        $tmp = explode('_', $field, 2);
        foreach ($lang_value as $lang_i) {
            if (!empty($tmp[0]) && !empty($tmp[1])) {
                if ($tmp[0] == $lang_i) {
                    $arrfield[] = array(
                        $tmp[0],
                        $tmp[1]
                    );
                    break;
                }
            }
        }
    }
    return $arrfield;
}

function check_voucher($voucher_id)
{
	global $db, $store_id, $user_info, $module_name;

	if (!$voucher_id)
		return false;
	//print_r($user_info['userid'])
	$checkin = $db->query('SELECT id FROM ' . TABLE . '_voucher_shop WHERE id = ' . $voucher_id . ' AND store_id =' . $store_id)->fetchColumn();

	if (!$checkin) {
		echo '<script language="javascript">';
		echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher', true) . '"';
		echo '</script>';
	} else {
		return true;
	}
}

function get_parent_category($id)
{

	if (!$id)
		return array();

	$all_catid = get_all_catid($id);

	return $all_catid;
}

function get_all_catid($id)
{
	global $get_all_catid, $global_catalogys;

	if (!$id)
		return false;


	$get_all_catid[] = $id;


	if ($global_catalogys[$id]['numsubcat'] > 0) {
		$arr_temp = explode(',', $global_catalogys[$id]['subcatid']);

		foreach ($arr_temp as $value) {
			get_all_catid($value);
		}
	}

	return $get_all_catid;
}

// danh mục sản phẩm đa cấp html
function category_html_select($catid)
{
	$lev = '';
	$arr_select = category_html($catid, $lev);

	return $arr_select;
}


function category_html($catid, $lev)
{
	global $db, $array_select;

	$info_cat = $db->query('SELECT ' . NV_LANG_DATA . '_title as title, parentid FROM ' . TABLE . '_catalogs WHERE catid =' . $catid)->fetch();

	if ($info_cat['parentid'] == 0) {
		$lev = '';
	} else {
		$lev .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}

	if (!empty($info_cat['title'])) {
		$arr = array();
		$arr['catid'] = $catid;
		$arr['text'] = $lev . ' ' . $info_cat['title'] . ' ' . $lev;

		$array_select[$catid] = $arr;
	}




	$list_lev0 = $db->query('SELECT catid, ' . NV_LANG_DATA . '_title as title FROM ' . TABLE . '_catalogs WHERE inhome = 1 AND parentid = ' . $catid . ' ORDER BY weight ASC')->fetchAll();

	foreach ($list_lev0 as $item) {
		category_html($item['catid'], $lev);
	}

	return $array_select;
}
