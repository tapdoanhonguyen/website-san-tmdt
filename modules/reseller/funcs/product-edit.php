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
$mod = $nv_Request->get_title('mod', 'post,get', '');
$store_id = get_info_user_login($user_info['userid'])['id'];
$username = change_alias($user_info['username']);
$path_excel = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username . '/excel';
$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username;

// if ($store_id != 15 and $store_id != 2) {
// 	echo '<script language="javascript">';
// 	echo 'window.location = "' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=retails' . '&' . NV_OP_VARIABLE . '=develop' . '"';
// 	echo '</script>';
// }


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

// xuất kết quả
if ($mod == 'is_download_result') {
	ini_set('memory_limit', '1024M');
	set_time_limit(0);
	$page_title = 'Kết quả thêm sản phẩm';
	$file_name = 'Edit_products_result.xlsx';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $file_name . '"');
	header('Cache-Control: max-age=0');

	$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&mod=download_result&file_name=' . $file_name;

	$arr = array(
		'status' => 'OK',
		'link' => $link,
		'mess' => 'Xuat ket qua sua san pham'
	);

	print_r(json_encode($arr));
	die;
}

// xuất file danh sách sản phẩm
if ($mod == 'is_download_product') {
	ini_set('memory_limit', '512M');
	set_time_limit(0);

	$list_product = $db->query('SELECT * FROM ' . TABLE . '_product WHERE status = 1 AND store_id = ' . $store_id)->fetchAll();
	$stt = 0;
	foreach ($list_product as $view) {

		$data_array = array();
		// số thứ tự
		$data_array['stt'] = ++$stt;

		// status
		switch ($view['inhome']) {
			case 1:
				$data_array['status'] = 'Hiển thị';
				break;
			case -1:
				$data_array['status'] = 'Bị khóa';
				break;
			case 0:
				if ($view['status']) {
					$data_array['status'] = 'Đã ẩn';
				} else {
					$data_array['status'] = 'Đã xóa';
				}
				break;
		} 

		// tên sản phẩm
		$data_array['name_product'] = $view['name_product'];

		// mã vạch
		$data_array['barcode'] = $view['barcode'];

		// danh mục
		$data_array['category'] = $global_catalogys[$view['categories_id']]['name'];

		// thương hiệu
		foreach ($global_catalogys as $cate) {
			foreach ($cate['brand'] as $item) {
				if ($item['id'] == $view['brand']) {
					$data_array['brand'] = $item['title'];
					break;
				}
			}
		}

		// xuất xứ
		$data_array['origin'] = $db->query('SELECT title FROM ' . TABLE . '_origin WHERE id = ' . $view['origin'])->fetchColumn();

		// Khối lượng & đơn vị
		$data_array['weight_product'] = $view['weight_product'];
		$data_array['unit_weight'] = get_info_unit_weight($view['unit_weight'])['name_weight'];

		// Chiều dài & đơn vị
		$data_array['length_product'] = $view['length_product'];
		$data_array['unit_length'] = get_info_unit_length($view['unit_length'])['name_length'];

		// chiều rộng & đơn vị
		$data_array['width_product'] = $view['width_product'];
		$data_array['unit_width'] = get_info_unit_length($view['unit_width'])['name_length'];

		// chiều cao & đơn vị
		$data_array['height_product'] = $view['height_product'];
		$data_array['unit_height'] = get_info_unit_length($view['unit_height'])['name_length'];

		// hình ảnh chính
		$data_array['image_1'] = NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $view['image'];

		// hình ảnh khác
		if ($view['other_image']) {
			$other_image = explode(',', $view['other_image']);
			for ($i = 0; $i < count($other_image); $i++) {
				$temp = 2 + $i;
				$data_array['image_' . $temp] = NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $other_image[$i];
			}
		}

		// mô tả
		$data_array['bodytext'] = $view['bodytext'];

		// thông số kỹ thuật
		$data_array['description'] = $view['description'];

		// thuộc tính sản phẩm
		$classify = $db->query('SELECT * FROM ' . TABLE . '_product_classify_value_product WHERE product_id = ' . $view['id'])->fetchAll();

		if (!$classify[0]['classify_id_value1'] && !$classify[0]['classify_id_value2']) { // nếu sp không có thuộc tính

			// thuộc tính
			//$data_array['classify'] = 'none'; 

			// giá niêm yết
			$data_array['price_special'] = $view['price_special'];

			// giá bán
			$data_array['price'] = $view['price'];

			// tồn kho
			$data_array['warehouse'] =  $classify[0]['sl_tonkho'];
		} else if ($classify[0]['classify_id_value2']) { // nếu có 2 thuộc tính
			foreach ($classify as $item) {
				// lấy tên thuộc tính 1 và tên option
				$temp1 = $db->query('SELECT t1.name, t1.id, t1.image, t2.name_classify FROM ' . TABLE . '_product_classify_value t1 INNER JOIN ' . TABLE . '_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value1'])->fetch();
				// lấy tên thuộc tính 2 và tên option
				$temp2 = $db->query('SELECT t1.name, t1.id, t2.name_classify FROM ' . TABLE . '_product_classify_value t1 INNER JOIN ' . TABLE . '_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value2'])->fetch();
				$item_value['classify_1'] = $temp1['name_classify'];
				$item_value['option_1_id'] = $temp1['id'];
				$item_value['option_1_name'] = $temp1['name'];
				$item_value['option_1_image'] = $temp1['image'] ? NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $temp1['image'] : '';
				$item_value['classify_2'] = $temp2['name_classify'];
				$item_value['option_2_id'] = $temp2['id'];
				$item_value['option_2_name'] = $temp2['name'];
				$item_value['code'] = $item['code'];
				$item_value['price_special'] = $item['price_special'];
				$item_value['price'] = $item['price'];
				$item_value['warehouse'] = $item['sl_tonkho'];
				$data_array['classify'][] = $item_value;
			}
		} else { // nếu có 1 thuộc tính
			foreach ($classify as $item) {
				$temp = $db->query('SELECT t1.name, t1.id, t1.image, t2.name_classify FROM ' . TABLE . '_product_classify_value t1 INNER JOIN ' . TABLE . '_product_classify t2 ON t1.classify_id = t2.id WHERE t1.id = ' . $item['classify_id_value1'])->fetch();
				$item_value['classify_1'] = $temp['name_classify'];
				$item_value['option_1_id'] = $temp['id'];
				$item_value['option_1_name'] = $temp['name'];
				$item_value['option_1_image'] = $temp['image'] ? NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $temp['image'] : '';
				$item_value['code'] = $item['code'];
				$item_value['price_special'] = $item['price_special'];
				$item_value['price'] = $item['price'];
				$item_value['warehouse'] = $item['sl_tonkho'];
				$data_array['classify'][] = $item_value;
			}
		}
		$dataContent[] = $data_array;
	}

	// danh mục
	// $category = get_all_cat_name($cate_id);
	$category = $db->query('SELECT name FROM ' . TABLE . '_categories')->fetchAll();

	// xuất xứ
	$origin = $db->query('SELECT title FROM ' . TABLE . '_origin')->fetchAll();

	// thương hiệu
	$brand = $db->query('SELECT title FROM ' . TABLE . '_brand')->fetchAll();

	$page_title = 'Mẫu thêm sản phẩm';
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/template_product_export.xlsx');
	$spreadsheet->setActiveSheetIndex(1); // set default cho sheet Property 
	$worksheet = $spreadsheet->getActiveSheet();

	// Trạng thái
	$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(4); // Ghi dữ liệu vào cột A
	$worksheet->setCellValue($TextColumn . 1, 'Hiển thị');
	$worksheet->setCellValue($TextColumn . 2, 'Đã ẩn');

	// Danh mục
	foreach ($category as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(1); // Ghi dữ liệu vào cột A
		$worksheet->setCellValue($TextColumn . ($key + 1), $value['name']);
	}

	// thương hiệu
	foreach ($brand as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(2); // Ghi dữ liệu vào cột B
		$worksheet->setCellValue($TextColumn . ($key + 1), $value['title']);
	}

	// xuất xứ
	foreach ($origin as $key => $value) {
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(3); // Ghi dữ liệu vào cột C
		$worksheet->setCellValue($TextColumn . ($key + 1), $value['title']);
	}

	$num_cate = count($category);
	$num_brand = count($brand);
	$num_origin = count($origin);

	$spreadsheet->setActiveSheetIndex(0); // set default cho sheet sửa sp 
	$worksheet = $spreadsheet->getActiveSheet();
	$worksheet->setTitle($page_title);

	// set validation cho cot trạng thái
	$validation = $spreadsheet->getActiveSheet()->getCell('B3')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$D$1:$D$2');
	$worksheet->setDataValidation("B3:B10000", $validation);

	// set validation cho cot danh muc
	$validation = $spreadsheet->getActiveSheet()->getCell('E3')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$A$1:$A$' . $num_cate);
	$worksheet->setDataValidation("E3:E10000", $validation);

	// set validation cho cot thuong hieu
	$validation = $spreadsheet->getActiveSheet()->getCell('F3')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$B$1:$B$' . $num_brand);
	$worksheet->setDataValidation("F3:F10000", $validation);

	// set validation cho cot xuat xu
	$validation = $spreadsheet->getActiveSheet()->getCell('G3')->getDataValidation();
	$validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
	$validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
	$validation->setAllowBlank(false);
	$validation->setShowDropDown(true);
	$validation->setFormula1('\'Property\'!$C$1:$C$' . $num_origin);
	$worksheet->setDataValidation("G3:G10000", $validation);

	$page_title = 'DANH SÁCH SẢN PHẨM';

	$Excel_Cell_Begin = 2; // Dong bat dau viet du lieu

	// Set page orientation and size
	$worksheet->getPageSetup()->setOrientation(phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	$worksheet->getPageSetup()->setPaperSize(phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
	$worksheet->getPageSetup()->setHorizontalCentered(true);

	$spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $Excel_Cell_Begin);

	// Du lieu
	$array_key_data = array();
	$array_key_data[] = 'stt';
	$array_key_data[] = 'status';
	$array_key_data[] = 'name_product';
	$array_key_data[] = 'barcode';
	$array_key_data[] = 'category';
	$array_key_data[] = 'brand';
	$array_key_data[] = 'origin';
	$array_key_data[] = 'weight_product';
	$array_key_data[] = 'length_product';
	$array_key_data[] = 'width_product';
	$array_key_data[] = 'height_product';
	$array_key_data[] = 'code';
	$array_key_data[] = 'classify_1';
	$array_key_data[] = 'option_1_name';
	$array_key_data[] = 'option_1_image';
	$array_key_data[] = 'classify_2';
	$array_key_data[] = 'option_2_name';
	$array_key_data[] = 'price_special';
	$array_key_data[] = 'price';
	$array_key_data[] = 'warehouse';
	$array_key_data[] = 'image_1';
	$array_key_data[] = 'image_2';
	$array_key_data[] = 'image_3';
	$array_key_data[] = 'image_4';
	$array_key_data[] = 'image_5';
	$array_key_data[] = 'image_6';
	$array_key_data[] = 'image_7';
	$array_key_data[] = 'image_8';
	// $array_key_data[] = 'bodytext';
	// $array_key_data[] = 'description';

	$classify_key_data[] = 'code';
	$classify_key_data[] = 'classify_1';
	$classify_key_data[] = 'option_1_name';
	$classify_key_data[] = 'option_1_image';
	$classify_key_data[] = 'classify_2';
	$classify_key_data[] = 'option_2_name';
	$classify_key_data[] = 'price_special';
	$classify_key_data[] = 'price';
	$classify_key_data[] = 'warehouse';
	$pRow = $Excel_Cell_Begin;
	foreach ($dataContent as $row) {
		$columnIndex = 0;
		if (!$row['classify']) { // nếu không có thuộc tính
			$pRow++;
			foreach ($array_key_data as $key) {
				$columnIndex++;
				if ($key != 'barcode') {
					$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
					$worksheet->setCellValue($TextColumnIndex . $pRow, $row[$key]);
				} else {
					$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
					$worksheet->setCellValueExplicit($TextColumnIndex . $pRow, $row[$key], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
				}
			}
		} else { // thuộc tính
			foreach ($row['classify'] as $classify) {
				$pRow++;
				$index_classify = 11;
				$index = 0;
				foreach ($array_key_data as $key) {
					$index++;
					if ($key != 'barcode') {
						$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index);
						$worksheet->setCellValue($TextColumnIndex . $pRow, $row[$key]);
					} else {
						$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index);
						$worksheet->setCellValueExplicit($TextColumnIndex . $pRow, $row[$key], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
					}
				}
				foreach ($classify_key_data as $key) {
					$index_classify++;
					$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index_classify);
					$worksheet->setCellValue($TextColumnIndex . $pRow, $classify[$key]);
				}
			}
		}
	}


	$file_name = 'Danh_sach_san_pham.xlsx';

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
		'mess' => '!'
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

// nhận file dữ liệu và trả về mảng data json
if ($mod == 'handle-data') {

	$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	$file_name = end(explode('.', $_FILES['file']['name']));
	$excel_type[] = 'xls';
	$excel_type[] = 'xlsx';
	if (in_array($file_name, $excel_type)) {
		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);
			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);

			// kiểm tra tồn tại sheed "Mẫu thêm sản phẩm"
			$check = $spreadsheet->getSheetByName('Mẫu thêm sản phẩm');
			if (!$spreadsheet->getSheetByName('Mẫu thêm sản phẩm') || !$spreadsheet->getSheetByName('Property')) {
				$err['status'] = 'error';
				$err['result'] = 'File template không hợp lệ';
				print_r(json_encode($err));
				die();
			} else { 
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
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/template_product_export_result.xlsx');
					$spreadsheet->setActiveSheetIndex(0);
					$worksheet = $spreadsheet->getActiveSheet();
					$worksheet->setTitle($page_title);

					for ($i = 2; $i < count($sheetData); $i++) {

						// ghi dữ liệu vào file kết quả từ file upload
						$index = $i + 1;

						// giới hạn cho đăng 200 sp
						if ($count_product == 200) {
							break;
						}
						foreach ($sheetData[$i] as $key => $value) {
							if ($i != 4) {
								$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(++$key);
								$worksheet->setCellValue($TextColumn . $index, $value);
							} else {
								$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(++$key);
								$worksheet->setCellValueExplicit($TextColumn . $index, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
							}
						}

						if (!in_array($sheetData[$i][3], $list_id) && $sheetData[$i][3]) {
							$product_error = array();
							$err_content = '';
							$count_product++;

							$list_id[] = $sheetData[$i][3];
							$product = get_product_edit_formated($sheetData[$i][3], $sheetData, $store_id);
							$product['time_edit'] = NV_CURRENTTIME;
							$product['user_add'] = $user_info['userid'];
							$product['origin'] = $db->query('SELECT id FROM ' . TABLE . '_origin WHERE title LIKE "' . $product['origin'] . '"')->fetchColumn();

							foreach ($global_catalogys as $item) {
								if (strtolower($item['name']) == strtolower($product['category'])) {
									$product['categories_id'] = $item['id'];
									break;
								}
							}

							foreach ($global_catalogys as $cate) {
								foreach ($cate['brand'] as $item) {
									if (strtolower($item['title']) == strtolower($product['brand'])) {
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
							$product['price'] = str_replace(',', '', $product['price']);
							$product['sl_tonkho'] = str_replace(',', '', $product['sl_tonkho']);
							$product['price_special'] = str_replace(',', '', $product['price_special']);
							$product['width_product'] = $product['width_product'] ? $product['width_product'] : 0;
							$product['height_product'] = $product['height_product'] ? $product['height_product'] : 0;
							$product['length_product'] = $product['length_product'] ? $product['length_product'] : 0;
							$product['weight_product'] = $product['weight_product'] ? $product['weight_product'] : 0;
							$product['price_special'] = $product['price_special'] ? $product['price_special'] : 0;
							$product['price'] = $product['price'] ? $product['price'] : $product['price_special'];
							$product['sl_tonkho'] = $product['sl_tonkho'] ? $product['sl_tonkho'] : 0;

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
							$list_product[] = $product;
						}
					}

					// tạo thư mục excel
					if (!file_exists($path_excel)) {
						mkdir($path_excel, 0777);
					}

					$file_name = 'Edit_products_result.xlsx';
					$file_path = $path_excel . '/' . $file_name;
					$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
					$writer->save($file_path);
					print_r(json_encode($list_product));
					die();
				}
			}
		}
	}
}

if ($mod == 'submit') {
	$file_name = 'Edit_products_result.xlsx';
	$file_path = $path_excel . '/' . $file_name;
	set_time_limit(30);
	ini_set('max_execution_time', 30);
	$product = $_POST['product'];
	$index = $_POST['index'];
	$index += 3; // dòng ghi dữ liệu
	$product_error = array();

	$list_key = array();
	$list_key[] = 'inhome';
	$list_key[] = 'origin';
	$list_key[] = 'brand';
	$list_key[] = 'barcode';
	$list_key[] = 'name_product';
	$list_key[] = 'categories_id';
	$list_key[] = 'weight_product';
	// $list_key[] = 'bodytext';
	$list_key[] = 'price_special';
	$list_key[] = 'image';

	$list_key_vi = array();
	$list_key_vi[] = 'Trạng thái';
	$list_key_vi[] = 'Xuất xứ';
	$list_key_vi[] = 'Thương hiệu';
	$list_key_vi[] = 'Mã sản phẩm';
	$list_key_vi[] = 'Tên sản phẩm';
	$list_key_vi[] = 'Ngành hàng';
	$list_key_vi[] = 'Cân nặng';;
	// $list_key_vi[] = 'Mô tả';
	$list_key_vi[] = 'Giá niêm yết';
	$list_key_vi[] = 'Hình ảnh chính';

	// tạo thư mục excel
	if (!file_exists($path_excel)) {
		mkdir($path_excel, 0777);
	}

	$page_title = 'Kết quả sửa sản phẩm';
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path_excel . '/Edit_products_result.xlsx');
	$spreadsheet->setActiveSheetIndex(0);
	$worksheet = $spreadsheet->getActiveSheet();
	$worksheet->setTitle($page_title);
	$index_result = $product['index'] + 1;

	// check barcode không tồn tại
	$check = $db->query('SELECT COUNT(id) FROM ' . TABLE . '_product WHERE barcode = "' . $product['barcode'] . '" AND (status = 1 OR status = 2) AND store_id = ' . $store_id)->fetchColumn();
	if (!$check) {
		$err['serial'] = $product['serial'];
		$product['result'] = 'error';
		$product['detail'] = 'Mã sản phẩm không tồn tại!';

		// ghi lỗi vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(29);
		$worksheet->setCellValue($TextColumn . $index_result, 'Lỗi');
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
		$worksheet->setCellValue($TextColumn . $index_result, 'Mã sản phẩm không tồn tại!');

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		print_r(json_encode($product));
		die;
	}


	// nếu có tên tùy chọn 1 mà không có tên phân loại 1-> lỗi
	// nếu có tên phân loại 1 mà không có tên tùy chọn 1-> lỗi
	if (($product['classify_1']['name'] and !$product['classify_1']['value'][0]) or (!$product['classify_1']['name'] and $product['classify_1']['value'])) {
		$product_error[] = 'Thuộc tính không hợp lệ!';
	}

	// nếu có tên tùy chọn 2 mà không có tên phân loại 2-> lỗi
	// nếu có tên phân loại 2 mà không có tên tùy chọn 2-> lỗi
	if (($product['classify_2']['name'] && !$product['classify_2']['value']) || (!$product['classify_2']['name'] && $product['classify_2']['value'])) {
		$product_error[] = 'Thuộc tính không hợp lệ!';
	}


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

	// print('<pre>' . print_r($product, true) . '</pre>');
	//check thuộc tính tồn tại
	foreach ($product['classify_value_product'] as $item) {
		if ($product['classify_1']) { // có thuộc tính
			if ($product['classify_2']) { // có 2 thuộc tính
				if (!$item['option_1_id'] or !$item['option_2_id']) {
					$product_error[] = 'Thuộc tính không tồn tại!';
					break;
				}
			} else { // có 1 thuộc tính
				if (!$item['option_1_id']) {
					$product_error[] = 'Thuộc tính không tồn tại!';
					break;
				}
			}
		}
	}

	// xử lý xóa liên kết nếu có
	/*$product['bodytext'] =preg_replace('#<a.*?>(.*?)</a>#i', '\1', $product['bodytext']);
		$product['description'] =preg_replace('#<a.*?>(.*?)</a>#i', '\1', $product['description']);
		*/

	// check rỗng
	foreach ($list_key as $key => $value) {
		if ($product[$value]==='' or $product[$value] === 'false') {
			$product_error[] = $list_key_vi[$key] . ' không tồn tại!';
		}
	}

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

	// // giới hạn kích thướt bodytext 60000
	// if(strlen($product['bodytext']) > 60000)
	// {
	// $product_error[] = 'Mô tả sản phẩm vượt quá 60.000 ký tự!';
	// }

	// // giới hạn kích thướt description 40000
	// if(strlen($product['description']) > 40000)
	// {
	// $product_error[] = 'Thông số kỹ thuật vượt quá 40.000 ký tự!';
	// }


	// // kiểm tra hình ảnh trong bodytext
	// //tìm src="X" or src='X'
	// preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['bodytext'], $match_img);  
	// $bodytext_array = array_pop($match_img);// chuyển list hình sang dạng chuỗi
	// if(count($bodytext_array) > 10)
	// {
	// $product_error[] = 'Mô tả sản phẩm không vượt quá 10 hình';
	// }
	// preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['description'], $match_img);  //tìm src="X" or src='X'

	// $description_array = array_pop($match_img);
	// if(count($description_array) > 10)
	// {
	// $product_error[] = 'Thông số kỹ thuật không vượt quá 10 hình';
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

	//check hình ảnh khác có thay đổi
	if ($product['other_image']) {
		$arr_temp = array();
		$list_img = explode(',', $product['other_image']);
		foreach ($list_img as $img) {
			$image_name = str_replace(NV_BASE_SITE, NV_ROOTDIR, $img);
			if (!file_exists($image_name)) {
				$check_cron = true;
				break;
			} else {
				$arr_temp[] = str_replace(NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/', '', $img);
			}
		}
		if (!$check_cron) {
			$product['other_image'] = implode(',', $arr_temp);
		}
	}

	// check hình thuộc tính có thay đổi
	if ($product['classify_1']) {
		foreach ($product['classify_value_product'] as $item) {
			if ($item['option_1_image']) {
				$image_name = end(explode('/', $item['option_1_image']));
				if (!file_exists($path_upload . '/' . $image_name)) {
					$check_cron = true;
				}
			}
		}
	}

	// // check hình mô tả có thay đổi
	// foreach($bodytext_array as $item){
	// $image_name = end(explode('/', $item));
	// if(!file_exists($path_upload . '/' . $image_name)){
	// $check_cron = true;
	// }
	// }

	// // check hình chi tiết có thay đổi
	// foreach($description_array as $item){
	// $image_name = end(explode('/', $item));
	// if(!file_exists($path_upload . '/' . $image_name)){
	// $check_cron = true;
	// }
	// }

	// // nếu mô tả / chi tiết có hình thì chạy cronjob
	// if($bodytext_array OR $description_array OR $product['other_image']){
	// $check_cron = true;
	// }

	// nếu sp có lỗi thì bỏ qua sp
	if ($product_error) {
		$err_content = implode(', ', $product_error);
		$product['result'] = 'error';
		$product['detail'] = $err_content;

		// ghi lỗi vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(29);
		$worksheet->setCellValue($TextColumn . $index_result, 'Lỗi');
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(30);
		$worksheet->setCellValue($TextColumn . $index_result, $err_content);

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		print_r(json_encode($product));
		die;
	}

	$username = change_alias($user_info['username']);
	$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $username;
	$path_thumb = NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/shops/' . $username;

	// tạo thư mục upload
	if (!file_exists($path_upload)) {
		mkdir($path_upload, 0777);
	}

	// tạo thư mục ảnh thumb
	if (!file_exists($path_thumb)) {
		mkdir($path_thumb, 0777);
	}

	//check hình ảnh chính thay đổi
	$image_name = end(explode('/', $product['image']));
	if (file_exists($path_upload . '/' . $image_name)) {
		$product['image'] = 'shops/' . $username . '/' . $image_name;
	} else{
		$check_cron = true;
	}

	if ($check_cron) {
		$sql = 'UPDATE ' . TABLE . '_product SET origin = ' . $product['origin'] . ', brand = ' . $product['brand'] . ', name_product = "' . $product['name_product'] . '", alias = "' . $product['alias'] . '", categories_id = ' . $product['categories_id'] . ', weight_product = ' . $product['weight_product'] . ', length_product = ' . $product['length_product'] . ', width_product = ' . $product['width_product'] . ', height_product = ' . $product['height_product'] . ', keyword = "' . $product['keyword'] . '", time_edit = ' . $product['time_edit'] . ', user_add = ' . $product['user_add'] . ', price = ' . $product['price'] . ', price_special = ' . $product['price_special'] . ', status = 2, inhome = 0 WHERE id = ' . $product['id'] . ' AND status = 1';
	} else {
		$sql = 'UPDATE ' . TABLE . '_product SET origin = ' . $product['origin'] . ', brand = ' . $product['brand'] . ', name_product = "' . $product['name_product'] . '", alias = "' . $product['alias'] . '", categories_id = ' . $product['categories_id'] . ', weight_product = ' . $product['weight_product'] . ', length_product = ' . $product['length_product'] . ', width_product = ' . $product['width_product'] . ', height_product = ' . $product['height_product'] . ', image = "' . $product['image'] . '", other_image = "' . $product['other_image'] . '", keyword = "' . $product['keyword'] . '", time_edit = ' . $product['time_edit'] . ', user_add = ' . $product['user_add'] . ', price = ' . $product['price'] . ', price_special = ' . $product['price_special'] . ', status = 1, inhome = '. $product['inhome'] .' WHERE id = ' . $product['id'] . ' AND status = 1';
	}

	$check = $db->query($sql);

	if ($check) { // nếu update product thành công
		$product['result'] = 'ok';
		$product['detail'] = 'Chờ duyệt';

		//ghi kết quả vào file kết quả
		$TextColumn = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(29);
		$worksheet->setCellValue($TextColumn . $index_result, 'Thành công');

		// tạo thư mục excel
		if (!file_exists($path_excel)) {
			mkdir($path_excel, 0777);
		}

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);

		//kiểm tra sp có nằm trong list sp lỗi -> xóa khỏi list lỗi
		$check = $db->query('SELECT barcode FROM '. TABLE . '_product WHERE status = 3 AND store_id = '. $store_id .' AND barcode = "'. $product['barcode'] .'"')->fetchColumn();
		if($check){
			$db->query('DELETE FROM '. TABLE .'_product WHERE status = 3 AND store_id = '. $store_id .' AND barcode = "'. $product['barcode'] .'"');
		}

		// update bảng product_classify_value_product
		if (!$product['classify_1']) { // nếu không có thuộc tính
			$sql = 'UPDATE ' . TABLE . '_product_classify_value_product SET code = "' . $product['code'] . '", price = ' . $product['price'] . ', price_special = ' . $product['price_special'] . ', sl_tonkho = ' . $product['sl_tonkho'] . ' WHERE product_id = ' . $product['id'];
			$db->query($sql);
		} else {
			$data_temp = array();
			foreach ($product['classify_value_product'] as $item) {
				$item['sl_tonkho'] = $item['sl_tonkho'] ? $item['sl_tonkho'] : 0;
				$sql = 'UPDATE ' . TABLE . '_product_classify_value_product SET code = "' . $item['code'] . '", price = ' . $item['price'] . ', price_special = ' . $item['price_special'] . ', sl_tonkho = ' . $item['sl_tonkho'] . ' WHERE product_id = ' . $product['id'] . ' AND classify_id_value1 = ' . $item['option_1_id'] . ' AND classify_id_value2 = ' . $item['option_2_id'];
				$db->query($sql);

				$data_temp[] = $item['option_1_id'] . '_' . $item['option_1_image'];
			}
			$classify_temp = implode(',', $data_temp);
		}

		// insert vào bảng product_temp
		if ($check_cron) {
			$temp_insert = array();
			$temp_insert['id'] = $product['id'];
			$temp_insert['inhome'] = $product['inhome'];
			$temp_insert['image'] = $product['image'];
			$temp_insert['other_image'] = $product['other_image'];
			$temp_insert['classify'] = $classify_temp;
			// $temp_insert['bodytext'] = $product['bodytext'];
			// $temp_insert['description'] = $product['description'];
			$temp_insert['username'] = change_alias($user_info['username']);
			$sql = 'INSERT INTO ' . TABLE . '_product_temp(id, inhome, image, other_image, classify, bodytext, description, username) VALUES (' . $product['id'] . ', '. $product['inhome'] .', "' . $product['image'] . '", "' . $product['other_image'] . '", "' . $classify_temp . '", "null", "null", "' . change_alias($user_info['username']) . '")';
			$db->query($sql);
		}
	}
	print_r(json_encode($product));
	die;
}


$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['product-edit'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
