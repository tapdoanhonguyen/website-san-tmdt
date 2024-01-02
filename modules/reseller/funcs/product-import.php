<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 27 Jan 2021 10:01:19 GMT
 */


if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');
set_time_limit(0);
ini_set('max_execution_time', 1200);
ini_set('memory_limit', '10G');
// if (!defined('NV_IS_ADMIN'))
// die('Hệ thống đang nâng cấp !');

$mod = $nv_Request->get_title('mod', 'post,get', '');
$info_store = get_info_user_login($user_info['userid']);
$store_id = $info_store['id'];
$userid_store = $info_store['userid'];
$username = change_alias($user_info['username']);
$path_excel = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username . '/excel';

// if ($store_id != 15 and $store_id != 2) {
// 	echo '<script language="javascript">';
// 	echo 'window.location = "' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=retails' . '&' . NV_OP_VARIABLE . '=develop' . '"';
// 	echo '</script>';
// }

if ($userid_store != $user_info['userid']) {
	print_r('error');
	die;
}
 
if ($mod == 'download') {
	$file_name = $nv_Request->get_string('file_name', 'get', '');

	$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;

	if (file_exists($file_path)) {
		header('Content-Description: File Transfer');
		header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename=' . $file_name);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		readfile($file_path);
		// ob_clean();
		flush();
		nv_deletefile($file_path);

		exit();
	} else {
		die('File not exists !');
	}
}

if ($mod == 'download_result') {

	$file_name = $nv_Request->get_string('file_name', 'get', '');
	$path_excel = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username . '/excel';
	$file_path = $path_excel . '/' . $file_name;

	if (file_exists($file_path)) {
		header('Content-Description: File Transfer');
		header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename=' . $file_name);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		readfile($file_path);
		// ob_clean();
		flush();
		nv_deletefile($file_path);

		exit();
	} else {
		die('File not exists !');
	}
}


if ($mod == 'is_download') {
	//ini_set( 'memory_limit', '1024M' );
	//set_time_limit( 0 );

	$cate_id = $nv_Request->get_int('catalogy', 'post,get', 0);
	if (!$cate_id) {
		$arr = array(
			'status' => 'ERROR',
			'mess' => 'Vui lòng chọn ngành hàng!'
		);

		print_r(json_encode($arr));
		die;
	}
	
	// danh mục
	$category = get_all_cat_name($cate_id);

	// xuất xứ
	$origin = get_all_origin_name();

	// thương hiệu
	$brand = get_all_brand_name($cate_id);

	// print_r($category);die;

	$page_title = 'Mẫu thêm sản phẩm';
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/template_product_import.xlsx');
	$spreadsheet->setActiveSheetIndex(1); // set default cho sheet Property 
	$worksheet = $spreadsheet->getActiveSheet();
	//$worksheet->setTitle( $page_title );

	//$validation->setFormula1('\'Sheet title\'!$A$1:$A$3')

	// Danh mục
	foreach ($category as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(1); // Ghi dữ liệu vào cột A
		$worksheet->setCellValue($TextColumn . ($key + 1), $value);
	}

	// thương hiệu
	foreach ($brand as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(2); // Ghi dữ liệu vào cột B
		$worksheet->setCellValue($TextColumn . ($key + 1), $value);
	}

	// xuất xứ
	foreach ($origin as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(3); // Ghi dữ liệu vào cột C
		$worksheet->setCellValue($TextColumn . ($key + 1), $value['title']);
	}

	$num_cate = count($category);
	$num_brand = count($brand);
	$num_origin = count($origin);

	$spreadsheet->setActiveSheetIndex(0); // set default cho sheet Them sp 
	$worksheet = $spreadsheet->getActiveSheet();
	$worksheet->setTitle($page_title);




	// set validation cho cot danh muc
	$validation = $spreadsheet->getActiveSheet()->getCell('D2')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$A$1:$A$' . $num_cate);
	$worksheet->setDataValidation("D2:D10000", $validation);

	// set validation cho cot thuong hieu
	$validation = $spreadsheet->getActiveSheet()->getCell('E2')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$B$1:$B$' . $num_brand);
	$worksheet->setDataValidation("E2:E10000", $validation);

	// set validation cho cot xuat xu
	$validation = $spreadsheet->getActiveSheet()->getCell('F2')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$C$1:$C$' . $num_origin);
	$worksheet->setDataValidation("F2:F10000", $validation);

	$file_name = 'Template_products.xlsx';

	$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $file_name . '"');
	header('Cache-Control: max-age=0');

	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

	$writer->save($file_path);

	$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&mod=download&file_name=' . $file_name;

	$arr = array(
		'status' => 'OK',
		'link' => $link,
		'mess' => 'Vui lòng chọn ngành hàng!'
	);

	print_r(json_encode($arr));
	die;
}
// xuất kết quả
if ($mod == 'is_download_result') {
	//ini_set( 'memory_limit', '1024M' );
	//set_time_limit( 0 );
	$page_title = 'Kết quả thêm sản phẩm';
	$file_name = 'Import_products_result.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $file_name . '"');
	header('Cache-Control: max-age=0');

	$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&mod=download_result&file_name=' . $file_name;

	$arr = array(
		'status' => 'OK',
		'link' => $link,
		'mess' => 'Vui lòng chọn ngành hàng!'
	);

	print_r(json_encode($arr));
	die;
}


$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

$sea_flast = $nv_Request->get_int('sea_flast', 'post,get');
$ngay_den = $nv_Request->get_title('ngay_den', 'post,get');
$ngay_tu = $nv_Request->get_title('ngay_tu', 'post,get');

// print('<pre>' . print_r($global_catalogys, true) . '</pre>');
// nhận file dữ liệu và trả về mảng data json
if ($mod=='handle-data'){
	$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	$file_name = end(explode('.', $_FILES['file']['name']));
	$excel_type[] = 'xls';
	$excel_type[] = 'xlsx';
	if(in_array($file_name, $excel_type)){
		if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
			
			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			
			// kiểm tra tồn tại sheed "Mẫu thêm sản phẩm"
			$check = $spreadsheet->getSheetByName('Mẫu thêm sản phẩm');
			if(!$spreadsheet->getSheetByName('Mẫu thêm sản phẩm') || !$spreadsheet->getSheetByName('Property')){
				$err['status'] = 'error';
				$err['result'] = 'File template không hợp lệ';
				print_r(json_encode($err));die();
				} else{
				$spreadsheet->setActiveSheetIndexByName('Mẫu thêm sản phẩm');
				$sheetData = $spreadsheet->getActiveSheet()->toArray();
				$list_product = array();
				
				if (!empty($sheetData)) {
					$list_id = array();
					$count_product = 0;
					// khoi tao file ket qua
					//ini_set( 'memory_limit', '1024M' );
					//set_time_limit( 0 );
					$page_title = 'Kết quả thêm sản phẩm';
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/template_product_import_result.xlsx');
					$spreadsheet->setActiveSheetIndex(0);
					$worksheet = $spreadsheet->getActiveSheet();
					$worksheet->setTitle( $page_title );
					
					for ($i=2; $i<count($sheetData); $i++) {
						
						// ghi dữ liệu vào file kết quả từ file upload
						$index = $i +1;
						
						// giới hạn cho đăng 100 sp
						if($count_product == 200){
							break;
						}
						foreach($sheetData[$i] as $key => $value){
							if($i != 4){
								$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( ++$key );
								$worksheet->setCellValue($TextColumn . $index, $value);
							} else {
								$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( ++$key );
								$worksheet->setCellValueExplicit($TextColumn . $index, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
							}
						}
						
						if(!in_array($sheetData[$i][2], $list_id) && $sheetData[$i][2]){
							$product_error = array();
							$err_content = '';
							$count_product++;
							
							$list_id[] = $sheetData[$i][2];
							$product = get_product_formated($sheetData[$i][2], $sheetData);
							$id_max = $db->query('SELECT max(id) as max FROM '.TABLE.'_product')->fetchColumn();
							$product['ecngcode'] = vsprintf("ECNG%06s", ($id_max +1));
							$product['username'] = $username;
							$product['time_add'] = NV_CURRENTTIME;
							$product['user_add'] = $user_info['userid'];
							$product['inhome'] = 0;
							$product['origin'] = $db->query('SELECT id FROM '. TABLE .'_origin WHERE title LIKE "'. $product['origin'] . '"')->fetchColumn();
							
							foreach($global_catalogys as $item){
								if(strtolower($item['name']) == strtolower($product['category'])){
									$product['categories_id'] = $item['id'];
									break;
								}
							}
							
							foreach($global_catalogys as $cate){
								foreach($cate['brand'] as $item){
									if(strtolower($item['title']) == strtolower($product['brand'])){
										$product['brand'] = $item['id'];
										break;
										break;
									}
								}
							}
							$product['width_product'] = str_replace(',', '', $product['width_product']);
							$product['height_product'] = str_replace(',', '', $product['height_product']);
							$product['length_product'] = str_replace(',', '', $product['length_product']);
							$product['weight_product'] = str_replace(',', '', $product['weight_product']);
							$product['width_product'] = $product['width_product'] ? $product['width_product'] : 0;
							$product['height_product'] = $product['height_product'] ? $product['height_product'] : 0;
							$product['length_product'] = $product['length_product'] ? $product['length_product'] : 0;
							$product['weight_product'] = $product['weight_product'] ? $product['weight_product'] : 0;
							$product['price_special'] = $product['price_special'] ? $product['price_special'] : 0;
							$product['price'] = str_replace(',', '', $product['price']);
							$product['price_special'] = str_replace(',', '', $product['price_special']);
							$product['price'] = $product['price'] ? $product['price'] : $product['price_special'];
							
							$product['index'] = $i;
							$product['store_id'] = $store_id;
							$product['unit_id'] = 0;
							$product['unit_weight'] = 2;
							$product['unit_length'] = 1;
							$product['unit_height'] = 1;
							$product['unit_width'] = 1;
							$product['free_ship'] = 0;
							$product['self_transport'] = 0;
							$product['keyword'] = vn_to_str($product['name_product']);
							$product['tag_title'] = '';
							$product['tag_description'] = '';
							$product['weight'] = $db->query('SELECT max(weight) FROM ' . TABLE . '_product')->fetchColumn();
							$product['weight'] = intval($product['weight']) + 1;
							$product['allowed_rating'] = 1;
							$product['showprice'] = 1;
							$product['sl_tonkho'] = $product['sl_tonkho'] ? $product['sl_tonkho'] : 0;
							$product['sl_tonkho'] = str_replace(',', '', $product['sl_tonkho']);
							$list_product[] = $product;
						}
					}
					
					// tạo thư mục excel
					if  (!file_exists($path_excel)) {
						mkdir($path_excel, 0777);
					}
					$file_name = 'Import_products_result.xlsx'; 
					$file_path = $path_excel . '/'. $file_name;
					$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
					$writer->save($file_path);
					print_r(json_encode($list_product));die();
				}
			}
			
		}
	}
}

if ($mod == 'submit') {
	$product = $_POST['product'];
	$index = $_POST['index'];
	$index += 3; // dòng ghi dữ liệu

	$list_key = array();
	$list_key[] = 'origin';
	$list_key[] = 'brand';
	$list_key[] = 'barcode';
	$list_key[] = 'name_product';
	$list_key[] = 'categories_id';
	$list_key[] = 'weight_product';
	$list_key[] = 'bodytext';
	$list_key[] = 'price';
	$list_key[] = 'image';

	$list_key_vi = array();
	$list_key_vi[] = 'Xuất xứ';
	$list_key_vi[] = 'Thương hiệu';
	$list_key_vi[] = 'Mã sản phẩm';
	$list_key_vi[] = 'Tên sản phẩm';
	$list_key_vi[] = 'Ngành hàng';
	$list_key_vi[] = 'Cân nặng';;
	$list_key_vi[] = 'Mô tả';
	$list_key_vi[] = 'Giá';
	$list_key_vi[] = 'Hình ảnh';

	// tạo thư mục excel
	if (!file_exists($path_excel)) {
		mkdir($path_excel, 0777);
	}

	$page_title = 'Kết quả thêm sản phẩm';
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path_excel . '/Import_products_result.xlsx');
	$spreadsheet->setActiveSheetIndex(0);
	$worksheet = $spreadsheet->getActiveSheet();
	$worksheet->setTitle($page_title);
	$index_result = $product['index'] + 1;

	// check barcode tồn tại
	$check = $db->query('SELECT COUNT(id) FROM ' . TABLE . '_product WHERE barcode = "' . $product['barcode'] . '" AND (status = 1 OR status = 2) AND store_id = ' . $store_id)->fetchColumn();
	if ($check) {
		$err['serial'] = $product['serial'];
		$product['result'] = 'error';
		$product['detail'] = 'Mã sản phẩm đã tồn tại!';

		// ghi lỗi vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
		$worksheet->setCellValue($TextColumn . $index_result, 'Lỗi');
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(31);
		$worksheet->setCellValue($TextColumn . $index_result, 'Mã sản phẩm đã tồn tại!');

		$file_name = 'Import_products_result.xlsx';
		$file_path = $path_excel . '/' . $file_name;
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		print_r(json_encode($product));
		die;
	}

	// nếu có tên tùy chọn 1 mà không có tên phân loại 1-> lỗi
	// nếu có tên phân loại 1 mà không có tên tùy chọn 1-> lỗi
	if (($product['classify_1']['name'] && !$product['classify_1']['value']) || (!$product['classify_1']['name'] && $product['classify_1']['value'])) {
		$product_error[] = 'Thuộc tính không hợp lệ!';
	}

	// nếu có tên tùy chọn 2 mà không có tên phân loại 2-> lỗi
	// nếu có tên phân loại 2 mà không có tên tùy chọn 2-> lỗi
	if (($product['classify_2']['name'] && !$product['classify_2']['value']) || (!$product['classify_2']['name'] && $product['classify_2']['value'])) {
		$product_error[] = 'Thuộc tính không hợp lệ!';
	}

	// nếu có tùy chọn 1 mà không có hình thuộc tính
	// nếu không có tùy chọn 1 mà có hình thuộc tính
	foreach ($product['classify_value_product'] as $item) {
		if (!$item['classify_value_1'] && $item['classify_image_1']) {
			$product_error[] = 'Thuộc tính không hợp lệ!';
		}
	}

	// nếu có phân loại 2 mà không có phân loại 1
	if ($product['classify_2'] && !$product['classify_1']) {
		$product_error[] = 'Thuộc tính không hợp lệ!';
	}

	// xử lý xóa liên kết nếu có
	$product['bodytext'] = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $product['bodytext']);
	$product['description'] = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $product['description']);

	// kiểm tra hình ảnh trong bodytext
	preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['bodytext'], $match_img);  //tìm src="X" or src='X'
	$bodytext_array = array_pop($match_img); // chuyên list hình sang dạng chuỗi
	if (count($bodytext_array) > 10) {
		$product_error[] = 'Mô tả sản phẩm không vượt quá 10 hình';
	}
	preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['description'], $match_img);  //tìm src="X" or src='X'
	$description_array = array_pop($match_img);
	if (count($description_array) > 10) {
		$product_error[] = 'Thông số kỹ thuật không vượt quá 10 hình';
	}

	// check rỗng
	foreach ($list_key as $key => $value) {
		if (!$product[$value]) {
			$product_error[] = $list_key_vi[$key] . ' không tồn tại!';
		}
	}

	// // check giá niêm yết nhỏ hơn giá bán
	// if($product['price']){
	// if($product['price_special'] <= $product['price']){
	// $err['serial'] = $product['serial'];
	// $err['name_product'] = $product['name_product'];
	// $err['barcode'] = $product['barcode'];
	// $err['content'] = 'Giá bán không được lớn hơn hoặc bằng giá niêm yết!';
	// $list_error[] = $err;
	// $product_error[] = $err;
	// $check_error = true;
	// }
	// }

	// check thương hiệu có thuộc ngành hàng
	if ($product['categories_id']) {
		$list_brand = get_all_parent_brand_id($product['categories_id']);
		if (!in_array($product['brand'], $list_brand)) {
			$product_error[] = 'Thương hiệu không thuộc ngành hàng đã chọn!';
		}
	}

	//check rules
	if (mb_strlen($product['name_product']) > 150) {
		$product_error[] = 'Tên sản phẩm vượt giới hạn ký tự';
	}

	// giới hạn kích thướt bodytext 60000
	if (strlen($product['bodytext']) > 60000) {
		$product_error[] = 'Mô tả sản phẩm vượt quá 60.000 ký tự!';
	}

	// giới hạn kích thướt description 40000
	if (strlen($product['description']) > 40000) {
		$product_error[] = 'Thông số kỹ thuật vượt quá 40.000 ký tự!';
	}



	// // check hình ảnh khác
	// $list_image = array();
	// $product['other_image'] = explode(',', $product['other_image']);
	// foreach($product['other_image'] as $otherimage){
	// $image_name = end(explode('/', $otherimage));
	// if(file_exists($path_media . $image_name)){
	// $list_image[] = 'shops/' . $username . '/' . $image_name;
	// }
	// }
	// $product['other_image'] = implode(',', $list_image);


	//check sản phẩm quá 10 thuộc tính
	if (count($product['classify_1']['value']) > 10 or count($product['classify_2']['value']) > 10) {
		$product_error[] = 'Thuộc tính vượt quá 10 tùy chọn!';
	}

	// check hình thuộc tính
	// foreach ($product['classify_value_product'] as $item) {
	// 	if ($item['classify_image_1']) {
	// 		$check_cron = true;
	// 	}
	// }

	// nếu mô tả / chi tiết có hình, hình ảnh khác thì chạy cronjob
	// if ($bodytext_array or $description_array or $product['other_image']) {
	// 	$check_cron = true;
	// }

	//check giá niêm yết sản phẩm có thuộc tính
	foreach ($product['classify_value_product'] as $key => $classify) {
		// giá niêm yết
		if (!$classify['price_special']) {
			$product['classify_value_product'][$key]['price_special'] = 0;
			$product_error[] = 'Giá niêm yết thuộc tính không hợp lệ!';
		}

		// giá bán
		$product['classify_value_product'][$key]['price'] = $classify['price'] ? $classify['price'] : $product['classify_value_product'][$key]['price_special'];
	}

	// nếu sp có lỗi thì bỏ qua sp
	if ($product_error) {
		$err_content = implode(', ', $product_error);
		$product['result'] = 'error';
		$product['detail'] = $err_content;

		// ghi lỗi vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
		$worksheet->setCellValue($TextColumn . $index_result, 'Lỗi');
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(31);
		$worksheet->setCellValue($TextColumn . $index_result, $err_content);

		$file_name = 'Import_products_result.xlsx';
		$file_path = $path_excel . '/' . $file_name;
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		print_r(json_encode($product));
		die;
	}

	// tạo thư mục upload
	if (!file_exists($path_upload)) {
		mkdir($path_upload, 0777);
	}

	// tạo thư mục ảnh thumb
	if (!file_exists($path_thumb)) {
		mkdir($path_thumb, 0777);
	}

	//path media user
	// $path_media = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' .$module_upload . '/' . 'shops/' . $username . '/';  
	$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $product['username'];
	$path_thumb = NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/shops/' . $product['username'];
	$a = 'shops/' . $product['username'];

	//check hình ảnh chính tồn tại
	// print(substr($product['image'], strlen(NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' .$module_upload . '/')));die;
	//$image_name = end(explode('/', $product['image']));
	//if (file_exists($path_upload . '/' . $image_name)) {
	//	$product['image'] = 'shops/' . $username . '/' . $image_name;
	//} else
	// if ($image = conver_data_img_to_png_excel($product['image'], $path_upload, $path_thumb, true, true)) {
	// 	$product['image'] = $a . '/' . $image;
	// } else {
	// 	$err['serial'] = $product['serial'];
	// 	$product['result'] = 'error';
	// 	$product['detail'] = 'Hình ảnh chính không hợp lệ!';

	// 	// ghi lỗi vào file kết quả
	// 	$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
	// 	$worksheet->setCellValue($TextColumn . $index_result, 'Lỗi');
	// 	$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(31);
	// 	$worksheet->setCellValue($TextColumn . $index_result, 'Hình ảnh chính không hợp lệ!');

	// 	$file_name = 'Import_products_result.xlsx';
	// 	$file_path = $path_excel . '/' . $file_name;
	// 	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save($file_path);
	// 	print_r(json_encode($product));
	// 	die;
	// }

	$sql = 'INSERT INTO ' . TABLE . '_product(ecngcode, origin, brand, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, free_ship, self_transport, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, time_add, user_add, weight, allowed_rating, showprice, price, price_special, inhome, status) VALUES (:ecngcode, :origin, :brand,:store_id,:barcode, :name_product, :alias, :categories_id, :unit_id, :unit_weight,:weight_product, :length_product, :width_product, :height_product,:free_ship,:self_transport,:unit_length,:unit_height,:unit_width, :image, :other_image, :description, :bodytext, :keyword, :tag_title, :tag_description, :time_add, :user_add, :weight,:allowed_rating,:showprice,:price,:price_special,:inhome, :status)';

	$data_insert = array();
	$data_insert['ecngcode'] = $product['ecngcode'];
	$data_insert['origin'] = $product['origin'];
	$data_insert['brand'] = $product['brand'];
	$data_insert['store_id'] = $store_id;
	$data_insert['barcode'] = $product['barcode'];
	$data_insert['name_product'] = $product['name_product'];
	$data_insert['alias'] = $product['alias'];
	$data_insert['categories_id'] = $product['categories_id'];
	$data_insert['unit_id'] = $product['unit_id'];
	$data_insert['unit_weight'] = $product['unit_weight'];
	$data_insert['weight_product'] = $product['weight_product'];
	$data_insert['length_product'] = $product['length_product'];
	$data_insert['width_product'] = $product['width_product'];
	$data_insert['height_product'] = $product['height_product'];
	$data_insert['free_ship'] = $product['free_ship'];
	$data_insert['self_transport'] = $product['self_transport'];
	$data_insert['unit_length'] = $product['unit_length'];
	$data_insert['unit_height'] = $product['unit_height'];
	$data_insert['unit_width'] = $product['unit_width'];
	$data_insert['image'] = '';
	$data_insert['other_image'] = '';
	$data_insert['description'] = $product['description'];
	$data_insert['bodytext'] = $product['bodytext'];
	$data_insert['keyword'] = $product['keyword'];
	$data_insert['tag_title'] = $product['tag_title'];
	$data_insert['tag_description'] = $product['tag_description'];
	$data_insert['time_add'] = $product['time_add'];
	$data_insert['user_add'] = $product['user_add'];
	$data_insert['weight'] = $product['weight'];
	$data_insert['allowed_rating'] = $product['allowed_rating'];
	$data_insert['showprice'] = $product['showprice'];
	$data_insert['price'] = $product['price'];
	$data_insert['price_special'] = $product['price_special'];
	$data_insert['inhome'] = $product['inhome'];
	// $data_insert['status'] = $check_cron ? 2 : 1;
	$data_insert['status'] = 2;

	$product_id = $db->insert_id($sql, 'id', $data_insert);
	$list_classify_value_1 = array();
	$list_classify_value_2 = array();

	if ($product_id) { // nếu insert vào bảng product thành công
		//ghi kết quả vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
		$worksheet->setCellValue($TextColumn . $index_result, 'Thành công');
		$product['result'] = 'ok';
		$product['detail'] = 'Chờ duyệt';
		$path_excel = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username . '/excel';

		// tạo thư mục excel
		if (!file_exists($path_excel)) {
			mkdir($path_excel, 0777);
		}

		$file_name = 'Import_products_result.xlsx';
		$file_path = $path_excel . '/' . $file_name;
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		// print_r(json_encode($product));die;
		
		//kiểm tra sp có nằm trong list sp lỗi -> xóa khỏi list lỗi
		$check = $db->query('SELECT id FROM '. TABLE . '_product WHERE status = 3 AND store_id = '. $store_id .' AND barcode = "'. $product['barcode'] .'"')->fetchColumn();
		if($check){
			$db->query('DELETE FROM '. TABLE .'_product WHERE status = 3 AND store_id = '. $store_id .' AND barcode = "'. $product['barcode'] .'"');
		}

		// insert thuộc tính 1 vào bảng product_classify
		if ($product['classify_1']) {
			$sql = 'INSERT INTO ' . TABLE . '_product_classify(name_classify, product_id, status) VALUES (:name_classify, :product_id,:status)';
			$classify_insert = array();
			$classify_insert['name_classify'] = $product['classify_1']['name'];
			$classify_insert['product_id'] = $product_id;
			$classify_insert['status'] = 1;
			$classify_id_1 = $db->insert_id($sql, 'id', $classify_insert);

			// insert vào bảng product_classify_value
			if ($classify_id_1) {
				$data_temp = array();
				foreach ($product['classify_1']['value'] as $item) {
					$sql = 'INSERT INTO ' . TABLE . '_product_classify_value(classify_id, name, image, status) VALUES (:classify_id, :name, :image, :status)';
					$classify_insert = array();
					$classify_insert['classify_id'] = $classify_id_1;
					$classify_insert['name'] = $item;
					$classify_insert['image'] = '';
					foreach ($product['classify_value_product'] as $item_) {
						if ($item == $item_['classify_value_1']) {
							$temp_image = $item_['classify_image_1'];
						}
					}
					$classify_insert['status'] = 1;
					$classify_value_id_1 = $db->insert_id($sql, 'id', $classify_insert);
					$data_temp[] = $classify_value_id_1 . '_' . $temp_image;
					$temp['title'] = $item;
					$temp['id'] = $classify_value_id_1;
					$list_classify_value_1[] = $temp;
				}
				$classify_temp = implode(',', $data_temp);
			}
		}

		// insert thuộc tính 2 vào bảng product_classify
		if ($product['classify_2']) {
			$sql = 'INSERT INTO ' . TABLE . '_product_classify(name_classify, product_id, status) VALUES (:name_classify, :product_id,:status)';
			$classify_insert = array();
			$classify_insert['name_classify'] = $product['classify_2']['name'];
			$classify_insert['product_id'] = $product_id;
			$classify_insert['status'] = 1;
			$classify_id_2 = $db->insert_id($sql, 'id', $classify_insert);

			// insert vào bảng product_classify_value
			if ($classify_id_2) {
				foreach ($product['classify_2']['value'] as $item) {
					$sql = 'INSERT INTO ' . TABLE . '_product_classify_value(classify_id, name, image, status) VALUES (:classify_id, :name, :image, :status)';
					$classify_insert = array();
					$classify_insert['classify_id'] = $classify_id_2;
					$classify_insert['name'] = $item;
					$classify_insert['image'] = '';
					$classify_insert['status'] = 1;
					$classify_value_id_2 = $db->insert_id($sql, 'id', $classify_insert);
					$temp['title'] = $item;
					$temp['id'] = $classify_value_id_2;
					$list_classify_value_2[] = $temp;
				}
			}
		}

		// insert vào bảng product_classify_value_product
		if (!$product['classify_1']) { // nếu không có thuộc tính
			$sql = 'INSERT INTO ' . TABLE . '_product_classify_value_product(product_id, classify_id_value1, classify_id_value2, code, price, price_special, sl_tonkho, status) VALUES (:product_id, :classify_id_value1,:classify_id_value2, :code, :price, :price_special, :sl_tonkho, :status)';
			$classify_insert = array();
			$classify_insert['product_id'] = $product_id;
			$classify_insert['classify_id_value1'] = 0;
			$classify_insert['classify_id_value2'] = 0;
			$classify_insert['code'] = '';
			$classify_insert['price'] = $product['price'];
			$classify_insert['price_special'] = $product['price_special'];
			$classify_insert['sl_tonkho'] = $product['sl_tonkho'];
			$classify_insert['status'] = 1;
			$classify_value_product_id = $db->insert_id($sql, 'id', $classify_insert);
		} else {
			$sql = 'INSERT INTO ' . TABLE . '_product_classify_value_product (product_id, classify_id_value1, classify_id_value2, code, price, price_special, sl_tonkho, status) VALUES (:product_id, :classify_id_value1,:classify_id_value2, :code, :price, :price_special, :sl_tonkho, :status)';
			foreach ($product['classify_value_product'] as $item) {
				$classify_insert = array();
				$classify_insert['product_id'] = $product_id;
				foreach ($list_classify_value_1 as $item_) {
					if ($item['classify_value_1'] == $item_['title']) {
						$classify_insert['classify_id_value1'] = $item_['id'];
						break;
					}
				}
				if ($item['classify_value_2']) {
					foreach ($list_classify_value_2 as $item_) {
						if ($item['classify_value_2'] == $item_['title']) {
							$classify_insert['classify_id_value2'] = $item_['id'];
							break;
						}
					}
				} else {
					$classify_insert['classify_id_value2'] = 0;
				}
				$classify_insert['code'] = $item['classify_id'] ? $item['classify_id'] : '';
				$classify_insert['price'] = $item['price'];
				$classify_insert['price_special'] = $item['price_special'];
				$classify_insert['sl_tonkho'] = $item['sl_tonkho'];
				$classify_insert['status'] = 1;
				$classify_value_product_id = $db->insert_id($sql, 'id', $classify_insert);
			}
		}

		// insert vào bảng product_temp
		// if ($check_cron) {
			// print('<pre>' . print_r($product_temp, true) . '</pre>');
		$sql = 'INSERT INTO ' . TABLE . '_product_temp(id, image, other_image, classify, bodytext, description, username) VALUES (:id, :image, :other_image, :classify, :bodytext, :description, :username)';
		$temp_insert = array();
		$temp_insert['id'] = $product_id;
		$temp_insert['image'] = $product['image'];
		$temp_insert['other_image'] = $product['other_image'];
		$temp_insert['classify'] = $classify_temp;
		$temp_insert['bodytext'] = $product['bodytext'];
		$temp_insert['description'] = $product['description'];
		$temp_insert['username'] = change_alias($user_info['username']);
		$product_temp_id = $db->insert_id($sql, 'id', $temp_insert);
		// }
	}

	print_r(json_encode($product));
	die;
}


// hiển thị ngành hàng lớn
//$global_catalogys = json_decode($redis->get('catalogy_main'),true);	

$list_category = $db->query('SELECT id, name FROM ' . TABLE . '_categories WHERE parrent_id = 0')->fetchAll();
foreach ($list_category as $category) {
	$xtpl->assign('catalogy', $category);
	$xtpl->parse('main.catalogy');
}



$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['product-import'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
