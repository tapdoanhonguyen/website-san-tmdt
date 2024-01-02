<?php
	
	/**
		* @Project NUKEVIET 4.x
		* @Author VINADES.,JSC <contact@vinades.vn>
		* @Copyright (C) 2021 VINADES.,JSC. All rights reserved
		* @License GNU/GPL version 2 or any later version
		* @Createdate Mon, 04 Jan 2021 09:28:10 GMT
	*/
	
	if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');
	
	$mod = $nv_Request->get_string('mod', 'post, get', 0);
	
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
	
	
	// lấy thông tin popup đơn vị vận chuyển
	if ($nv_Request->isset_request('popup_vanchuyen', 'get')) {
		$order_id = $nv_Request->get_int('order_id', 'post,get');
		
		$view = $db->query('SELECT * FROM ' . TABLE . '_order WHERE store_id=' . $store_id . ' AND id =' . $order_id)->fetch();
		
		if (!$view) {
			$xtpl = new XTemplate('listorder_ajax_popup_vc.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
			
			$xtpl->parse('error');
			$contents = $xtpl->text('error');
			
			print_r($contents);
			die;
		}
		
		$view['store_name'] = $global_seller['company_name'];
		$view['store_id'] = $global_seller['store_id'];
		$info_warehouse = get_info_warehouse($view['warehouse_id']);

		$view['warehouse_name'] = $info_warehouse['name_warehouse'];
		$view['phone_warehouse'] = $info_warehouse['phone_send'];
		
		$view['address_warehouse'] = $info_warehouse['address'] ;

		$view['address_receive'] = $view['address'] ;
		
		$view['transporters_name'] = get_info_transporters($view['transporters_id'])['name_transporters'];
		
		$view['total_product'] = number_format($view['total_product']);
		$view['fee_transport'] = number_format($view['fee_transport']);
		$view['total'] = number_format($view['total']);
		$view['time_add'] = date('d-m-Y H:i', $view['time_add']);
		
		
		$xtpl = new XTemplate('listorder_ajax_popup_vc.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
		$xtpl->assign('VIEW', $view);
		
		
		if ($view['status'] == 0) {
			$xtpl->parse('main.status0');
			} else if ($view['status'] == 1) {
			if ($view['transporters_id'] == 4 || $view['transporters_id'] == 5) {
				$xtpl->assign('send_vanchuyen', 'sendvnpost');
				$xtpl->assign('VANCHUYEN', 'VNPOST');
				$xtpl->parse('main.khaigia_vnpost');
			} elseif ($view['transporters_id'] == 3) {
				$xtpl->assign('VANCHUYEN', 'Giao hàng nhanh');
				$xtpl->parse('main.GHN');
			}elseif ($view['transporters_id'] == 2) {
				$xtpl->assign('VANCHUYEN', 'Giao hàng tiết kiệm');
				$xtpl->parse('main.GHTK');
			}
		}
		
		$xtpl->parse('main');
		$contents = $xtpl->text('main');
		
		print_r($contents);
		die;
	}
	
	
	if ($nv_Request->isset_request('search_status', 'get')) {
		$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
		
		$where = ' AND NOT status = -1';
		
		$search_status = $nv_Request->get_int('search_status', 'post,get', -1);
		
		$keyword = $nv_Request->get_title('keyword', 'post,get');
		$sea_flast = $nv_Request->get_int('sea_flast', 'post,get');
		$ngay_den = $nv_Request->get_title('ngay_den', 'post,get');
		$ngay_tu = $nv_Request->get_title('ngay_tu', 'post,get');
		$status_product = $nv_Request->get_int('status_product', 'post,get' - 1);
		
		
		if ($search_status > 0) {
			$where .= ' AND status =' . $search_status;
		}
		$base_url .= '&search_status=' . $search_status;
		
		
		if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m)) {
			$_hour = 0;
			$_min = 0;
			$ngay_tu = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			} else {
			$ngay_tu = 0;
		}
		
		if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m)) {
			$_hour = 23;
			$_min = 59;
			$ngay_den = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			} else {
			$ngay_den = 0;
		}
		
		if ($sea_flast != 9) {
			
			if ($ngay_tu > 0 and $ngay_den > 0) {
				$where .= ' AND time_add >= ' . $ngay_tu . ' AND time_add <= ' . $ngay_den;
				$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
				} else if ($ngay_tu > 0) {
				$where .= ' AND time_add >= ' . $ngay_tu;
				$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
				} else if ($ngay_den > 0) {
				$where .= ' AND time_add <= ' . $ngay_den;
				$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
			}
		}
		
		if (!empty($keyword)) {
			$where .= ' AND (order_code LIKE "%" "' . $keyword . '" "%" OR order_name LIKE "%" "' . $keyword . '" "%" OR email LIKE "%" "' . $keyword . '" "%" OR phone LIKE "%" "' . $keyword . '" "%" )';
			$base_url .= '&keyword=' . $keyword;
		}
		
		//status_payment_vnpay = 1 , store_id='. $store_id bắt buộc 1 đơn hàng của cửa hàng đã thanh toán vnpay
		$per_page = 10;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_order')
		->where('store_id=' . $store_id . $where);
		
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		$num_items = $sth->fetchColumn();
		
		$db->select('*')
		->order('id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
		$sth = $db->prepare($db->sql());
		//die($db->sql()); 
		$sth->execute();
		
		$submit_excel = $nv_Request->get_int('submit_excel', 'get', 0);
		if ($submit_excel) {
			$db->sqlreset()
			->select('COUNT(*)')
			->from('' . TABLE . '_order')
			->where('store_id=' . $store_id . $where);
			//die($db->sql()); 
			$sth = $db->prepare($db->sql());
			
			$sth->execute();
			$num_items = $sth->fetchColumn();
			
			$db->select('*')
			->order('id DESC');
			$sth = $db->prepare($db->sql());
			
			$sth->execute();
			
			if (count($num_items) > 0) {
				$page_title = 'DANH SÁCH ĐƠN HÀNG';
				
				$Excel_Cell_Begin = 1; // Dong bat dau viet du lieu
				
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/order_shop.xlsx');
				
				$worksheet = $spreadsheet->getActiveSheet();
				
				$worksheet->setTitle($page_title);
				
				// Set page orientation and size
				$worksheet->getPageSetup()->setOrientation(phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
				$worksheet->getPageSetup()->setPaperSize(phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
				$worksheet->getPageSetup()->setHorizontalCentered(true);
				$spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $Excel_Cell_Begin);
				
				// Du lieu
				$array_key_data = array();
				$array_key_data[] = 'order_code';
				$array_key_data[] = 'order_time';
				$array_key_data[] = 'status_name';
				$array_key_data[] = 'cancel_reason';
				$array_key_data[] = 'order_comment';
				$array_key_data[] = 'shipping_code';
				$array_key_data[] = 'transporter_name';
				$array_key_data[] = 'order_type';
				$array_key_data[] = 'estimated_delivery'; // dự kiến giao hàng
				$array_key_data[] = 'shipping_date';
				$array_key_data[] = 'shipping_time';
				$array_key_data[] = 'return_status'; // tình trạng trả hàng / hoàn tiền
				$array_key_data[] = 'product_sku';
				$array_key_data[] = 'product_name';
				$array_key_data[] = 'product_weight';
				$array_key_data[] = 'total_weight';
				$array_key_data[] = 'price_special'; // giá niêm yết
				$array_key_data[] = 'seller_trogia';
				$array_key_data[] = 'ecng_trogia';
				$array_key_data[] = 'total_trogia';
				$array_key_data[] = 'price';
				$array_key_data[] = 'quantity';
				$array_key_data[] = 'total_price_product';
				$array_key_data[] = 'total'; // tổng giá trị đơn hàng
				$array_key_data[] = 'voucher_price'; // mã giảm giá của shop
				$array_key_data[] = 'shop_promotion';
				$array_key_data[] = 'estimated_shipping_fee'; // phí vận chuyển dự kiến
				$array_key_data[] = 'fee_transport'; // phí vận chuyển người mua trả
				$array_key_data[] = 'return_fee'; // phí trả hàng
				$array_key_data[] = 'payment'; // tổng tiền người mua thanh toán
				$array_key_data[] = 'order_complete_time';
				$array_key_data[] = 'order_payment_time'; // thời gian đơn hàng được thanh toán
				$array_key_data[] = 'payment_method';
				$array_key_data[] = 'commission';
				$array_key_data[] = 'bhhh';
				$array_key_data[] = 'payment_fee';
				$array_key_data[] = 'default_fee'; // phí mặc định (phí sàn)
				$array_key_data[] = 'buyer_name'; // người mua
				$array_key_data[] = 'order_name'; // người nhận
				$array_key_data[] = 'phone';
				$array_key_data[] = 'province';
				$array_key_data[] = 'district';
				$array_key_data[] = 'ward';
				$array_key_data[] = 'address';
				$array_key_data[] = 'note';
				
				$key_data_product[] = 'product_sku';
				$key_data_product[] = 'product_name';
				$key_data_product[] = 'product_weight';
				$key_data_product[] = 'total_weight';
				$key_data_product[] = 'price_special';
				$key_data_product[] = 'seller_trogia';
				$key_data_product[] = 'ecng_trogia';
				$key_data_product[] = 'total_trogia';
				$key_data_product[] = 'price';
				$key_data_product[] = 'quantity';
				$key_data_product[] = 'total_price_product';
				
				
				/*$array_key_data[] = 'name_send';
					$array_key_data[] = 'phone_send';
					$array_key_data[] = 'address_send';
					$array_key_data[] = 'order_name';
					$array_key_data[] = 'phone';
					$array_key_data[] = 'email';
					$array_key_data[] = 'address_full';
					$array_key_data[] = 'shipping_code';
					$array_key_data[] = 'transporters_name';
					$array_key_data[] = 'fee_transport';
					$array_key_data[] = 'total_product';
				$array_key_data[] = 'total';*/
				
				$pRow = $Excel_Cell_Begin;
				
				while ($row = $sth->fetch()) {
					
					// ngày đặt
					$row['order_time'] = date('d-m-Y', $row['time_add']);
					
					// trạng thái
					$row['status_name'] = $db->query('SELECT name FROM ' . TABLE . '_status_order t1 INNER JOIN ' . TABLE . '_order t2 ON t1.status_id = t2.status WHERE t1.status_id = ' . $row['status'])->fetchColumn();
					
					// lý do hủy
					if ($row['status'] == 4) {
						$row['cancel_reason'] = $db->query('SELECT content FROM ' . TABLE . '_logs_order WHERE order_id = ' . $row['id']);
						$row['cancel_reason'] = $row['cancel_reason'] ? $row['cancel_reason'] : 'none';
					}
					
					// Nhận xét từ người mua
					if ($row['status'] == 3) {
						$row['order_comment'] = $db->query('SELECT content FROM ' . TABLE . '_rate WHERE id = ' . $row['id'])->fetchColumn();
						$row['order_comment'] = $row['order_comment'] ? $row['order_comment'] : 'none';
					}
					
					// Đơn vị vận chuyển
					$row['transporter_name'] = $db->query('SELECT name_transporters FROM ' . TABLE . '_transporters WHERE id = ' . $row['transporters_id'])->fetchColumn();
					$row['transporter_name'] = $row['transporter_name'] ? $row['transporter_name'] : '';
					
					// Thời gian đơn hàng được thanh toán
					$time_payment = $db->query('SELECT addtime from ' . TABLE . '_history_vnpay WHERE vnp_txnref = "' . $row['order_code'] . '"')->fetchColumn();
					$row['order_payment_time'] = $row['order_payment_time'] ? date('d-m-Y', $time_payment) : '';
					
					// phương thức thanh toán
					$row['payment_method'] = 'VNPAY';
					
					// Bảo hiểm hàng hóa
					$row['bhhh'] = baohiemhanghoa($row);
					
					// phí thanh toán
					$row['payment_fee'] = phi_vnpay_order($row);
					
					// phí mặc định (phí sàn)
					$row['default_fee'] = phi_ecng($row);
					
					// người mua
					$row['buyer_name'] = $db->query('SELECT last_name from ' . NV_TABLE_USER . ' WHERE userid = ' . $row['userid'])->fetchColumn();
					
					// tỉnh thành
					$row['province'] = $db->query('SELECT title FROM ' . $db_config['prefix'] . '_location_province WHERE provinceid = ' . $row[province_id])->fetchColumn();
					
					// quận huyện
					$row['district'] = $db->query('SELECT title FROM ' . $db_config['prefix'] . '_location_district WHERE districtid = ' . $row[district_id])->fetchColumn();
					
					// phường xã
					$row['ward'] = $db->query('SELECT title FROM ' . $db_config['prefix'] . '_location_ward WHERE wardid = ' . $row[ward_id])->fetchColumn();
					
					$product_info = $db->query('SELECT t1.barcode AS product_sku, t1.name_product AS product_name, t2.weight AS product_weight, t1.price_special AS price_special, t2.price, t2.quantity FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_order_item t2 ON t1.id = t2.product_id WHERE t2.order_id = ' . $row['id'])->fetchALL();
					$columnIndex2 = 0;
					$pRow++;
					$count = count($product_info);
					$merge_row = $pRow + $count - 1;
					foreach ($array_key_data as $key_data) {
						++$columnIndex2;
						if (in_array($key_data, $key_data_product)) {
							$rowTemp = $pRow;
							foreach ($product_info as $product) {
								$product['total_price_product'] = $product['price'] * $product['quantity'];
								$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex2);
								$worksheet->setCellValue($TextColumnIndex . $rowTemp, $product[$key_data]);
								$rowTemp++;
							}
							} else {
							$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex2);
							$worksheet->setCellValue($TextColumnIndex . $pRow, $row[$key_data]);
							$spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex . $pRow . ':' . $TextColumnIndex . $merge_row);
						}
					}
				}
				
				
				$file_name = 'Danh_sach_don_hang.xlsx';
				
				$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
				
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="' . $file_name . '"');
				header('Cache-Control: max-age=0');
				
				$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
				$writer->save($file_path);
				
				$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&mod=download&file_name=' . $file_name;
				
				die($link);
			}
		}
		
		
		$xtpl = new XTemplate('listorder_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
		
		
		$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'all');
		if (!empty($generate_page)) {
			$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
			$xtpl->parse('main.generate_page');
		}
		$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
		
		if (!$num_items) {
			$xtpl->parse('main.no_product');
		}
		
		
		while ($view = $sth->fetch()) {
			
			$view['number'] = $number++;
			
			$view['store_name'] = get_info_store($view['store_id'])['company_name'];
			$view['warehouse_name'] = get_info_warehouse($view['warehouse_id'])['name_warehouse'];
			$view['phone_warehouse'] = get_info_warehouse($view['warehouse_id'])['phone_send'];
			$info_warehouse = get_info_warehouse($view['warehouse_id']);
			$view['userid_order'] = get_info_order($view['id'])['userid'];
			$view['userid_user'] = get_info_user($view['userid'])['userid'];
			
			$view['address_warehouse'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
			$view['address_receive'] = $view['address'] . ', ' . get_info_ward($view['ward_id'])['title'] . ', ' . get_info_district($view['district_id'])['title'] . ', ' . get_info_province($view['province_id'])['title'];
			$view['transporters_name'] = get_info_transporters($view['transporters_id'])['name_transporters'];
			
			// thông tin tài khoản mua hàng
			$info_customer = get_info_user($view['userid']);
			
			$view['customer_name'] = $info_customer['last_name'];
			
			
			if ($info_customer['photo']) {
				$view['photo_customer']  = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . $info_customer['photo'];
				} else {
				$view['photo_customer'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
			}
			
			// ten trang thai don hang
			$view['order_status'] = $global_status_order[$view['status']]['name'];
			
			
			// lay thong tin san pham cua don hang
			$list_products = get_list_products_order($view['id']);
			
			foreach ($list_products as $product) {
				$xtpl->assign('product', $product);
				$xtpl->parse('main.loop.product');
			}
			
			$time_send_transport = NV_CURRENTTIME;
			$time_order = $view['time_add'] + 7200;
			
			$time_send_transport_start = date('H:i', $view['time_add']);
			$time_send_transport_end = date('H:i', $view['time_add'] + 7200);
			$view['insurance_fee'] = $view['total_product'];
			$view['total_product'] = number_format($view['total_product']);
			$view['fee_transport'] = number_format($view['fee_transport']);
			$view['total'] = number_format($view['total']);
			$view['time_add'] = date('d-m-Y H:i', $view['time_add']);
			
			$view['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $view['id'], true);
			$xtpl->assign('VIEW', $view);
			
			$xtpl->assign('time_send_transport_start', $time_send_transport_start);
			$xtpl->assign('time_send_transport_end', $time_send_transport_end);
			
			// cửa hàng xác nhận đơn hàng	
			
			if ($view['status'] == 0) {
				$xtpl->parse('main.loop.status0');
				} else if ($view['status'] == 1) {
				if ($view['transporters_id'] == 4 || $view['transporters_id'] == 5) {
					if ($time_order < $time_send_transport) {
						$xtpl->parse('main.loop.vnpost');
						} else {
						$xtpl->parse('main.loop.vnpost_disabled');
					}
					} elseif ($view['transporters_id'] == 0) {
					if ($time_order < $time_send_transport) {
						$xtpl->parse('main.loop.tu_giao_xac_nhan_dang_giao');
						} else {
						$xtpl->parse('main.loop.tu_giao_xac_nhan_dang_giao_disabled');
					}
					} elseif ($view['transporters_id'] == 3) {
					if ($time_order < $time_send_transport) {
						$xtpl->parse('main.loop.ghn');
						} else {
						$xtpl->parse('main.loop.ghn_disabled');
					}
					} elseif ($view['transporters_id'] == 2) {
					//if ($time_order < $time_send_transport) {
						$xtpl->parse('main.loop.ghtk');
						//} else {
						$xtpl->parse('main.loop.ghtk_disabled');
					//}
					}
					} elseif ($view['status'] == 2) {
					
					if ($view['transporters_id'] == 0) {
						$check_order_processing = $db->query('SELECT id FROM '  . TABLE . '_order_seller_delivery_failed WHERE userid = ' . $user_info['userid'] . ' AND status = 0 AND order_id = ' . $view['id'])->fetchColumn();
						if ($check_order_processing) {
							$xtpl->parse('main.loop.not_received_processing');
							} else {
							$xtpl->parse('main.loop.delivery_failed');
						}
						$xtpl->parse('main.loop.tu_giao_xac_nhan_da_giao');
					}
				}
				
				
				// kết thúc trạng thái cửa hàng
				
				$xtpl->parse('main.loop');
			}
			
			$xtpl->parse('main');
		$contents = $xtpl->text('main');
		
		$page_title = $lang_module['order'];
		echo $contents;
		die;
	}
	
	
	$page_title = $lang_module['list_order'];
	
	
	$xtpl = new XTemplate('listorder.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('NV_LANG_INTERFACE', NV_LANG_INTERFACE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	
	$status = $nv_Request->get_int('status', 'get', -2);
	
	$xtpl->assign('status', $status);
	
	
	// danh sách trạng thái đơn hàng
	foreach ($global_status_order as $status_order) {
		$xtpl->assign('status_order', $status_order);
		$xtpl->parse('main.status_order');
	}
	
	$real_week = nv_get_week_from_time(NV_CURRENTTIME);
	$week = $real_week[0];
	$year = $real_week[1];
	$this_year = $real_week[1];
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
	
	$tuannay = array(
	'from' => nv_date('d-m-Y', $time_first_week + ($week - 1) * $time_per_week),
	'to' => nv_date('d-m-Y', $time_first_week + ($week - 1) * $time_per_week + $time_per_week - 1),
	);
	$tuantruoc = array(
	'from' => nv_date('d-m-Y', $time_first_week + ($week - 2) * $time_per_week),
	'to' => nv_date('d-m-Y', $time_first_week + ($week - 2) * $time_per_week + $time_per_week - 2),
	);
	$tuankia = array(
	'from' => nv_date('d-m-Y', $time_first_week + ($week - 3) * $time_per_week),
	'to' => nv_date('d-m-Y', $time_first_week + ($week - 3) * $time_per_week + $time_per_week - 3),
	);
	
	$thangnay = array(
	'from' => date('d-m-Y', strtotime('first day of this month')),
	'to' => date('d-m-Y', strtotime('last day of this month')),
	);
	$thangtruoc = array(
	'from' => date('d-m-Y', strtotime('first day of last month')),
	'to' => date('d-m-Y', strtotime('last day of last month')),
	);
	$namnay = array(
	'from' => date('d-m-Y', strtotime('first day of january this year')),
	'to' => date('d-m-Y', strtotime('last day of december this year')),
	);
	$namtruoc = array(
	'from' => date('d-m-Y', strtotime('first day of january last year')),
	'to' => date('d-m-Y', strtotime('last day of december last year')),
	);
	$xtpl->assign('TUANNAY', $tuannay);
	
	$xtpl->assign('TUANTRUOC', $tuantruoc);
	
	$xtpl->assign('TUANKIA', $tuankia);
	
	$xtpl->assign('HOMNAY', date('d-m-Y', NV_CURRENTTIME));
	$xtpl->assign('HOMQUA', date('d-m-Y', strtotime('yesterday')));
	$xtpl->assign('THANGNAY', $thangnay);
	
	$xtpl->assign('THANGTRUOC', $thangtruoc);
	
	$xtpl->assign('NAMNAY', $namnay);
	
	$xtpl->assign('NAMTRUOC', $namtruoc);
	
	
	
	
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
