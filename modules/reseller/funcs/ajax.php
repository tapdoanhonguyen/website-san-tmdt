<?php
$mod = $nv_Request->get_string('mod', 'get,post', '');

// lấy tỉnh thành khu vực
if ($mod == 'get_province_self_transport') {

	$id_area = $nv_Request->get_int('id_area', 'post,get', 0);

	$data = array();

	$data[] = array(
		'provinceid' => 0,
		'title' => 'Tất cả'
	);

	foreach ($global_location[$id_area]['province'] as $tinhthanh) {
		$row = array(
			'provinceid' => $tinhthanh['provinceid'],
			'title' => $tinhthanh['title']
		);

		$data[] = $row;
	}

	print_r(json_encode($data));
	die;
}

if ($mod == 'change_status_cancel_tranpost_ahamove') {
	$order_id = $nv_Request->get_title('order_id', 'post,get');
	$payment_method = get_info_order($order_id)['payment_method'];
	$content = $nv_Request->get_title('content', 'post,get', '');
	$warehouse_id = $db->query('SELECT warehouse_id FROM ' . TABLE . '_order where id=' . $order_id)->fetchColumn();
	$list_product = $db->query('SELECT * FROM ' . TABLE . '_order_item where order_id=' . $order_id)->fetchAll();
	$status_new = $nv_Request->get_int('status_new', 'post,get');
	$status_old = $nv_Request->get_int('status_old', 'post,get');
	$shipping_code = get_info_order($order_id)['shipping_code'];
	$check = cancel_tranpost_ahamove($shipping_code, $content);
	$db->query('UPDATE ' . TABLE . '_order SET status=' . $status_new . ' where id=' . $order_id);
	if ($payment_method == 1) {
		require_once NV_ROOTDIR . '/modules/wallet/wallet.class.php';
		$wallet = new nukeviet_wallet();
		$checkUpdate1 = $wallet->init2($row['userid']);
		$message = 'Cộng tiền đơn hàng hủy với mã đơn hàng ' . get_info_order($order_id)['order_code'];
		$checkUpdate = $wallet->update(get_info_order($order_id)['total'], 'VND', get_info_order($order_id)['userid'], $admin_info['userid'], $message,  true);
	}
	$info_order = $db->query('SELECT * FROM ' . TABLE . '_order WHERE id = ' . $order_id)->fetch();

	foreach ($list_product as $value) {
		$amount_delivery_old = $db->query('SELECT amount_delivery FROM ' . TABLE . '_inventory_product where warehouse_id=' . $warehouse_id . ' and product_id=' . $value['product_id'] . ' and classify_value_product_id=' . $value['classify_value_product_id'])->fetchColumn();
		$amount_old = $db->query('SELECT amount FROM ' . TABLE . '_inventory_product where warehouse_id=' . $warehouse_id . ' and product_id=' . $value['product_id'] . ' and classify_value_product_id=' . $value['classify_value_product_id'])->fetchColumn();
		$amount_delivery_new = $amount_delivery_old - $value['quantity'];
		$amount_new = $amount_old + $value['quantity'];
		$db->query('UPDATE ' . TABLE . '_inventory_product SET amount_delivery=' . $amount_delivery_new . ',amount=' . $amount_new . ' where warehouse_id=' . $warehouse_id . ' and product_id=' . $value['product_id'] . ' and classify_value_product_id=' . $value['classify_value_product_id']);
	}
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',' . $status_old . ',' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $admin_info['userid'] . ')');

	$content_ip = 'Đơn hàng của bạn đã bị hủy vào lúc ' . date('d/m/y H:i', NV_CURRENTTIME) . '(' . $info_order['order_code'] . ')';

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification_user(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $admin_info['admin_id'] . ',' . $info_order['userid'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $info_order['userid'] . ',"order")');

	print_r(json_encode(array('status' => 'OK')));
	die();
}

if ($mod == 'update_number_product_full') {
	$list_product = json_decode(str_replace('&quot;', '"', $nv_Request->get_string('list_product', 'get,post', 0)), true);
	$store_id = $nv_Request->get_int('store_id', 'get,post', 0);
	foreach ($list_product as $value) {
		$value['amount'] = str_replace(",", "", $value['amount']);
		$db->query('UPDATE ' . TABLE . '_inventory_product SET amount=' . $value['amount'] . ' where id=' . $value['id']);
	}
	print_r(json_encode(array('status' => 'OK', 'mess' => 'Cập nhật thành công')));
	die();
}
if ($mod == 'load_category_shop') {
	$shop_id_user = $nv_Request->get_string('shop_id', 'get,post', '');
	$shop_id = get_id_shop_from_user_id($shop_id_user);

	$list_category = $db->query('SELECT * FROM ' . TABLE . '_catalogs where parentid = 0')->fetchAll();
	$contents = nv_theme_view_category_shop($list_category, $shop_id);
	$json[] = ['status' => "OK", 'text' => $contents];
	print_r(json_encode($json[0]));
	die();
}
if ($mod == 'load_comment_detail') {
	$per_page = 5;
	$id = $nv_Request->get_int('id', 'get,post', 0);
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=ajax&amp;id=' . $id . '&amp;mod=load_comment_detail';
	if ($page == 0) {
		$page_new = 1;
	} else {
		$page_new = $page;
	}
	$num_items =  $db->query("SELECT count(*) FROM " . TABLE . "_rate WHERE product_id = " . $id)->fetchColumn();

	$list_rate =  $db->query("SELECT * FROM " . TABLE . "_rate WHERE product_id = " . $id . ' LIMIT ' . $per_page . ' offset ' . ($page_new - 1) * $per_page)->fetchAll();
	$contents = nv_theme_retail_load_comment($list_rate, $page_new, $per_page, $base_url, $num_items, $page);
	print_r($contents);
	die();
}
if ($mod == 'get_link') {
	$title = $nv_Request->get_string('title', 'get,post', '');
	$link = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=retails&amp;' . NV_OP_VARIABLE . '=search', true);

	$json[] = ['status' => "OK", 'text' => $link];
	print_r(json_encode($json[0]));
	die();
}
if ($mod == 'load_product') {

	$sort_price = $nv_Request->get_int('sort_price', 'get,post', 0);
	$category_id = $nv_Request->get_string('category_id', 'get,post', '');
	$sort = $nv_Request->get_int('sort', 'get,post', 0);
	$sort_id = $nv_Request->get_int('sort', 'get,post', 0);
	$shop_id = $nv_Request->get_int('shop_id', 'get,post', 0);

	$page_title = $module_info['site_title'];
	$key_words = $module_info['keywords'];
	if ($sort == 1) {
		$sort = ' t1.number_view DESC ';
	} else if ($sort == 2) {
		$sort = ' t1.time_add DESC ';
	} else {
		$sort = ' t1.number_order DESC ';
	}
	if ($sort_price == 1) {
		$sort .= ', t1.price_sort ASC ';
	} else {
		$sort .= ', t1.price_sort DESC ';
	}

	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;mod=load_product_phan_trang_inshop&amp;category_id=' . $category_id . '&amp;shop_id=' . $shop_id . '&amp;sort=' . $sort_id;
	//phantrangajax//
	$per_page = $config_setting['number_product'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	if ($page == 0) {
		$page_new = 1;
	} else {
		$page_new = $page;
	}
	//phantrangajax//

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_rows t1 INNER JOIN ' . TABLE . '_catalogs t2 ON t1.listcatid = t2.id ')
		->where('t1.status=1 AND t2.status = 1 AND ( t1.listcatid = ' . $category_id . ' OR t2.parentid = ' . $category_id . ') AND t1.idsite = ' . $shop_id);

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order($sort)
		->limit($per_page)
		->offset(($page_new - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();

	$contents = shops_info_list_products($sth, $per_page, $page_new, $num_items, $base_url, $category_id, $shop_id, $sort_price);
	$json[] = ['status' => "OK", 'text' => $contents];
	print_r(json_encode($json[0]));
	die();
}

if ($mod == 'delivery_failed') {
	$order_id = $nv_Request->get_int('order_id', 'post,get');

	check_order($order_id);
	$info_order = get_info_order($order_id);

	$sql = 'INSERT INTO ' . TABLE . '_order_seller_delivery_failed (userid, order_id, reason, time_add, status) VALUES (:userid, :order_id, :reason, :time_add, :status)';
	$data_insert = array();
	$data_insert['userid'] = $user_info['userid'];
	$data_insert['order_id'] = $info_order['id'];
	$data_insert['reason'] = 'Seller tự giao hàng không thành công';
	$data_insert['time_add'] = NV_CURRENTTIME;
	$data_insert['status'] = 0;

	$id = $db->insert_id($sql, 'id', $data_insert);

	if ($id) {
		send_mail_order_delivery_failed($info_order);
	}
	print_r(json_encode(array('status' => 'OK')));
	die();
}

if ($mod == 'freeship') {
	$freeship  = $nv_Request->get_array('freeship', 'get,post', '');

	$arr_free_ship = implode(',', $freeship);


	if (!$arr_free_ship) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET free_ship = 1  WHERE id IN (' . $arr_free_ship . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
if ($mod == 'unfreeship') {
	$unfreeship  = $nv_Request->get_array('unfreeship', 'get,post', '');

	$arr_free_ship = implode(',', $unfreeship);


	if (!$arr_free_ship) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET free_ship = 0  WHERE id IN (' . $arr_free_ship . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}

//self_transport

if ($mod == 'self_transport') {
	$self_transport  = $nv_Request->get_array('self_transport', 'get,post', '');

	$arr_transport = implode(',', $self_transport);


	if (!$arr_transport) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET self_transport = 1  WHERE id IN (' . $arr_transport . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
if ($mod == 'un_transport') {
	$un_transport  = $nv_Request->get_array('un_transport', 'get,post', '');

	$arr_transport = implode(',', $un_transport);


	if (!$arr_transport) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET self_transport = 0  WHERE id IN (' . $arr_transport . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
//Xóa hàng loạt
if ($mod == 'delete_all') {
	$delete_all  = $nv_Request->get_array('delete_all', 'get,post', '');

	$arr_transport = implode(',', $delete_all);


	if (!$arr_transport) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET status = 0 , inhome = 0 WHERE id IN (' . $arr_transport . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
//Tắt trạng thái hàng loạt
if ($mod == 'off_product') {
	$off_product  = $nv_Request->get_array('off_product', 'get,post', '');

	$arr_transport = implode(',', $off_product);


	if (!$arr_transport) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET inhome = 0  WHERE id IN (' . $arr_transport . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
//Bật trạng thái hàng loạt
if ($mod == 'on_product') {
	$on_product  = $nv_Request->get_array('on_product', 'get,post', '');

	$arr_transport = implode(',', $on_product);


	if (!$arr_transport) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	} else {
		$db->query($db->query('UPDATE ' . TABLE . '_rows SET inhome = 1  WHERE id IN (' . $arr_transport . ') AND idsite = ' . $store_id));

		print_r(json_encode(array('status' => 'OK')));
		die();
	}
}
if ($mod == 'load_product_phan_trang_inshop') {

	$sort_price = $nv_Request->get_int('sort_price', 'get,post', 0);
	$category_id = $nv_Request->get_string('category_id', 'get,post', '');
	$sort = $nv_Request->get_int('sort', 'get,post', 0);
	$sort_id = $nv_Request->get_int('sort', 'get,post', 0);
	$shop_id = $nv_Request->get_int('shop_id', 'get,post', 0);

	$page_title = $module_info['site_title'];
	$key_words = $module_info['keywords'];
	if ($sort == 1) {
		$sort = ' t1.number_view DESC ';
	} else if ($sort == 2) {
		$sort = ' t1.time_add DESC ';
	} else {
		$sort = ' t1.number_order DESC ';
	}
	if ($sort_price == 1) {
		$sort .= ', t1.price_min ASC ';
	} else {
		$sort .= ', t1.price_min DESC ';
	}

	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;mod=load_product_phan_trang_inshop&amp;category_id=' . $category_id . '&amp;shop_id=' . $shop_id . '&amp;sort=' . $sort_id;
	//phantrangajax//
	$per_page = $config_setting['number_product'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	if ($page == 0) {
		$page_new = 1;
	} else {
		$page_new = $page;
	}
	//phantrangajax//

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_categories t2 ON t1.categories_id = t2.id ')
		->where('t1.status=1 AND t2.status = 1 AND ( t1.categories_id = ' . $category_id . ' OR t2.parrent_id = ' . $category_id . ') AND t1.store_id = ' . $shop_id);

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order($sort)
		->limit($per_page)
		->offset(($page_new - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();

	$contents = nv_theme_retail_product_phan_trang_in_shop($sth, $per_page, $page_new, $num_items, $base_url, $category_id, $shop_id, $sort_price);
	print_r($contents);
	die();
}

if ($mod == 'load_product_cat') {

	$category_id = $nv_Request->get_int('category_id', 'get,post', 0);
	$sort = $nv_Request->get_int('sort', 'get,post', 0);
	$alias = $nv_Request->get_string('alias', 'get,post', '');

	$page_title = $module_info['site_title'];
	$key_words = $module_info['keywords'];
	if ($sort == 1) {
		$sort = ' t1.number_view DESC ';
	} else if ($sort == 2) {
		$sort = ' t1.time_add DESC ';
	} else if ($sort == 3) {
		$sort = ' t1.number_order DESC ';
	} else if ($sort == 4) {
		$sort = ' t1.price_sort ASC ';
	} else if ($sort == 5) {
		$sort = ' t1.price_sort DESC ';
	} else {
		$sort = '';
	}

	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $alias;

	//phantrangajax//
	$per_page = $config_setting['number_product'];
	$page = $nv_Request->get_int('page', 'post,get', 0);
	if ($page == 0) {
		$page_new = 1;
	} else {
		$page_new = $page;
	}
	//phantrangajax//

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_categories t2 ON t1.categories_id = t2.id ')
		->where('t1.status=1 AND t2.status = 1 AND ( t1.categories_id = ' . $category_id . ' OR t2.parrent_id = ' . $category_id . ')');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order($sort)
		->limit($per_page)
		->offset(($page_new - 1) * $per_page);

	$sth = $db->prepare($db->sql());

	$sth->execute();

	$contents = nv_theme_retail_sort_product_in_view_cat($sth, $per_page, $page_new, $num_items, $base_url, $category_id, $shop_id, $sort_price);
	$json[] = ['status' => "OK", 'text' => $contents];
	print_r(json_encode($json[0]));
	die();
}


if ($mod == 'check_classify_id_value') {
	$classify_id_value1 = $nv_Request->get_int('classify_id_value1', 'get,post', 0);
	$classify_id_value2 = $nv_Request->get_int('classify_id_value2', 'get,post', 0);
	$product_id = $nv_Request->get_int('product_id', 'get,post', 0);
	$status = $db->query('SELECT t3.status FROM ' . TABLE . '_product_classify t1 INNER JOIN ' . TABLE . '_product_classify_value t2 ON t1.id=t2.classify_id INNER JOIN ' . TABLE . '_product_classify_value_product t3 ON t3.classify_id_value1=t2.id where t1.product_id=' . $product_id . ' and classify_id_value1=' . $classify_id_value1 . ' and classify_id_value2=' . $classify_id_value2 . ' group by t1.id')->fetchColumn();
	print_r(json_encode(array('check_status' => $status)));
	die();
}


// cap nhat kho cho tung san pham
if ($mod == 'update_number_product') {

	$amount = $nv_Request->get_string('amount', 'get,post', 0);
	$product_id = $nv_Request->get_int('product_id', 'get,post', 0);
	$store_id = get_info_user_login($user_info['userid'])['id'];
	if (!$store_id) {
		print_r(json_encode(array('status' => 'ERROR', 'mess' => 'Không phải là cửa hàng')));
		die();
	}
	$amount = str_replace(",", "", $amount);

	$db->query('UPDATE ' . TABLE . '_inventory_product SET amount=' . $amount . ' where idsite=' . $store_id . ' AND id=' . $product_id);
	print_r(json_encode(array('status' => 'OK', 'mess' => 'Cập nhật thành công')));
	die();
}
if ($mod == 'upload') {

	if (isset($_FILES['file']) and is_uploaded_file($_FILES['file']['tmp_name'])) {
		$name_image = $_FILES['file']['name'];
		if (!file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . date('Y_m', NV_CURRENTTIME))) {
			nv_mkdir(NV_UPLOADS_REAL_DIR . '/' . $module_upload, date('Y_m', NV_CURRENTTIME));
		}
		// Xoa file cu neu ton tai
		if (!empty($name_image) and file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . date('Y_m', NV_CURRENTTIME) . '/' . $name_image)) {
			nv_deletefile(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . date('Y_m', NV_CURRENTTIME) . '/' . $name_image);
		}
		$file_allowed_ext = !empty($array_config['upload_filetype']) ? $array_config['upload_filetype'] : $global_config['file_allowed_ext'];
		$upload = new NukeViet\Files\Upload($file_allowed_ext, $global_config['forbid_extensions'], $global_config['forbid_mimes'], $array_config['maxfilesize'], NV_MAX_WIDTH, NV_MAX_HEIGHT);
		$upload_info = move_uploaded_file($_FILES['file']['tmp_name'], NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . date('Y_m', NV_CURRENTTIME) . '/' . $name_image);
		$json[] = ['status' => 'OK', 'text' => '/' . date('Y_m', NV_CURRENTTIME) . '/' . $name_image];
	}
	print_r(json_encode($json[0]));
	die();
}
if ($mod == 'rate_product') {
	$content = $nv_Request->get_string('content', 'get,post', '');
	$image = $nv_Request->get_string('image', 'get,post', '');
	$star = $nv_Request->get_int('star', 'get,post', 0);
	$id = 1;
	$db->query("INSERT INTO " . TABLE . "_rate (
		star, content, time_add, status, product_id, userid, image) VALUES (" . $star . ",'" . $content . "', " . NV_CURRENTTIME . ",1," . $id . "," . $user_info['userid'] . ",'" . $image . "')");
	$json[] = ['status' => 'OK', 'text' => 'Gửi đánh giá thành công!'];
	print_r(json_encode($json[0]));
	die();
}
if ($mod == 'get_PickupType') {
	$q = $nv_Request->get_string('q', 'get,post', '');
	$list_service = array();
	$list_service[] = ['id' => 1, 'text' => 'Thu gom tận nơi'];
	$list_service[] = ['id' => 2, 'text' => 'Gửi hàng tại bưu cục'];
	foreach ($list_service as $result) {
		if ($q != '') {
			if (stripos(strtoupper($result['text']), strtoupper($q)) !== false) {
				$json[] = ['id' => $result['id'], 'text' => $result['text']];
			}
		} else {
			$json[] = ['id' => $result['id'], 'text' => $result['text']];
		}
	}

	print_r(json_encode($json));
	die();
}
if ($mod == 'send_ahamove') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order = get_info_order($order_id);
	$info_warehouse = get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address_full'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
	$info_order['address_full'] = $info_order['address'] . ', ' . get_info_ward($info_order['ward_id'])['title'] . ', ' . get_info_district($info_order['district_id'])['title'] . ', ' . get_info_province($info_order['province_id'])['title'];
	$path = array();
	if ($info_order['payment'] == 0) {
		$path[] = array(
			"lat" => (float)$info_warehouse['lat'],
			"lng" => (float)$info_warehouse['lng'],
			"address" => urlencode($info_warehouse['address_full']),
			"short_address" => urlencode(get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title']),
			"name" => urlencode($info_warehouse['name_send']),
			"mobile" => $info_warehouse['phone_send'],
			"remarks" => urlencode("call me")
		);
		$path[] = array(
			"lat" => (float)$info_order['lat'],
			"lng" => (float)$info_order['lng'],
			"address" => urlencode($info_order['address_full']),
			"short_address" => urlencode(get_info_ward($info_order['ward_id'])['title'] . ', ' . get_info_district($info_order['district_id'])['title'] . ', ' . get_info_province($info_order['province_id'])['title']),
			"name" => urlencode($info_order['order_name']),
			"mobile" => $info_order['phone'],
			"remarks" => urlencode("call me"),
			"cod" => $info_order['total']
		);
	} else {
		$path[] = array(
			"lat" => (float)$info_warehouse['lat'],
			"lng" => (float)$info_warehouse['lng'],
			"address" => urlencode($info_warehouse['address_full']),
			"short_address" => urlencode(get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title']),
			"name" => urlencode($info_warehouse['name_send']),
			"mobile" => $info_warehouse['phone_send'],
			"remarks" => urlencode("call me"),
			"cod" => $info_order['total']
		);
		$path[] = array(
			"lat" => (float)$info_order['lat'],
			"lng" => (float)$info_order['lng'],
			"address" => urlencode($info_order['address_full']),
			"short_address" => urlencode(get_info_ward($info_order['ward_id'])['title'] . ', ' . get_info_district($info_order['district_id'])['title'] . ', ' . get_info_province($info_order['province_id'])['title']),
			"name" => urlencode($info_order['order_name']),
			"mobile" => $info_order['phone'],
			"remarks" => urlencode("call me")
		);
	}
	$service_id = get_info_transporters($info_order['transporters_id'])['code_transporters'];
	if ($info_order['payment'] == 0) {
		$payment_method = 'CASH';
	} else {
		$payment_method = 'BALANCE';
	}
	$list_order = $db->query('SELECT t1.*, t2.name_product,t2.barcode FROM ' . TABLE . '_order_item t1 INNER JOIN ' . TABLE . '_rows t2 ON t1.product_id=t2.id where order_id=' . $order_id)->fetchAll();
	$list_item = array();
	foreach ($list_order as $value) {
		if ($value['classify_value_product_id'] > 0) {
			$classify_value_product_id = get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
			if ($classify_value_product_id['classify_id_value2'] > 0) {
				$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
				$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
			} else {
				$name_group = $name_classify_id_value1;
			}
			$value['name_product'] = $value['name_product'] . '(' . $name_group . ')';
		}
		$list_item[] = array(
			"_id" => $value['barcode'],
			"name" => urlencode($value['name_product']),
			"num" => $value['quantity'],
			"price" => $value['price']
		);
	}
	$order_ahamove = send_ahamove($path, $service_id, $list_item, $payment_method);
	if (!empty($order_ahamove['order_id'])) {
		$db->query('UPDATE ' . TABLE . '_order SET status=2, shipping_code=' . $db->quote($order_ahamove['order_id']) . ',link_check_ahamove_order=' . $db->quote($order_ahamove['shared_link']) . ' where id=' . $order_id);
		$content = 'Chuyển sang đơn vị vận chuyển Ahamove Thành Công';
		$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
		print_r(json_encode(array('status' => 'OK')));
		die();
	} else {
		print_r(json_encode(array('status' => 'ERROR', 'mess' => $order_ahamove['description'])));
		die();
	}
}
if ($mod == 'send_ghn') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$pick_option = $nv_Request->get_title('pick_option', 'get,post', 'cod');
	$insurance_fee = $nv_Request->get_int('insurance_fee', 'get,post', 0);

	check_order($order_id);
	$info_order = get_info_order($order_id);
	//khai bảo hiểm
	$insurance_value = $info_order['total_product'];
	if($insurance_fee){
		if($insurance_value > (int)$config_setting['max_price_ghn']){
			$insurance_value = (int)$config_setting['max_price_ghn'];
		}
		else{
			$insurance_value = $info_order['total_product'];
		}
	}
	elseif($insurance_value > (int)$config_setting['max_price_ghn']){
		$insurance_value = 3000000;
	}

	// thu hộ
	$cod_amount = 0;
	//phí ship 1 shop trả || 2 khách trả
	$payment_type_id = 1;
	if ($info_order['payment_method'] == 'recieve') {
		$cod_amount = $info_order['total_product'];
		$payment_type_id = 2;
	}

	$info_warehouse = get_info_warehouse($info_order['warehouse_id']);
	$store_id_ghn = get_store_id_ghn($info_warehouse['id']);

	$to_ward_code = $global_ward[$info_order['ward_id']]['ghnid'];
	$to_district_id = $global_district[$info_order['district_id']]['ghnid'];

	$content = 'Đơn hàng với mã đơn hàng ' . $info_order['order_code'];
	$service_type_id = 2;//Đi bộ
	// sàn không cho xem hàng
	$required_note = 'KHONGCHOXEMHANG';
	//nếu có hình thức thu gom thì sẽ gán 1 mã bưu cục khi tạo đơn
	$pick_station_id = 0;
	if ($pick_option) {
		$pick_station_id = 1444;
	}

	$list_order = $db->query('SELECT t1.*, t2.name_product,t2.barcode FROM ' . TABLE . '_order_item t1 INNER JOIN ' . TABLE . '_rows t2 ON t1.product_id=t2.id where order_id=' . $order_id)->fetchAll();

	$list_item = array();
	foreach ($list_order as $value) {
		if ($value['classify_value_product_id'] > 0) {
			$classify_value_product_id = get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
			if ($classify_value_product_id['classify_id_value2'] > 0) {
				$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
				$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
			} else {
				$name_group = $name_classify_id_value1;
			}
			$value['name_product'] = $value['name_product'] . '(' . $name_group . ')';
		}
		$list_item[] = array(
			"name" => $value['name_product'],
			"quantity" => (int)$value['quantity'],
			"code" => $value['barcode']
		);
	}
	
	$order_ghn = send_ghn($store_id_ghn, $info_order['order_name'], $info_order['phone'], $info_order['address'], $to_ward_code, $to_district_id, $content, $info_order['total_weight'], $info_order['total_length'], $info_order['total_width'], $info_order['total_height'], $pick_station_id, $insurance_value, $service_type_id, $payment_type_id, $required_note, $list_item, $cod_amount);

	if ($order_ghn['code'] == 200) {
		update_ghn($info_order, $order_ghn, $info_warehouse);
		print_r(json_encode(array('status' => 'OK', 'mess' => $store_id_ghn)));
		die();
	}else{
		print_r(json_encode(array('status' => 'ERROR', 'mess' => $order_ghn['message'])));
		die();
	}

}

if ($mod == 'ghn_cancel') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);

	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$info_order = get_info_order($order_id);

	// $info_order['status'] == 1 đơn hàng đã xác nhận 
	// $info_order['status_payment_vnpay'] == 1 đơn hàng đã thanh toán

	if (($info_order['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($info_order['status_payment_vnpay'] == 0) or ($info_order['status'] != 2)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	$shop_id = get_info_warehouse($info_order['warehouse_id'])['shops_id_ghn'];

	$ghn_cancel = ghn_cancel($shop_id, $info_order['shipping_code']);

	if ($ghn_cancel['code'] == 200) {
		$today = NV_CURRENTTIME;
		//cập nhật trạng thái hủy
		$db->query('UPDATE ' . TABLE . '_history_ghn SET status = "cancel" WHERE order_id = ' . $info_order['id'] . ' AND order_code = "' . $info_order['shipping_code'] . '"');
		// lưu lại lịch sử vận đơn
		$db->query('INSERT INTO ' . TABLE . '_history_ghn_detail (order_id, order_code_ghn, status, time_add) VALUES(' . $info_order['id'] . ', "' . $info_order['shipping_code'] . '", "cancel", ' . $today . ')');

		// cập nhật trạng thái đơn hàng
		$db->query('UPDATE ' . TABLE . '_order SET status = 1 WHERE id = ' . $info_order['id']);

		// gửi thông báo cho quản trị
		$content_ip = 'Hủy vận chuyển GHN cho đơn hàng ' . $info_order['order_code'];
		nv_insert_notification_ecng($user_info['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');

		print_r(json_encode(array('status' => 'OK')));
		die();
	} else {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
}

if ($mod == 'send_ghtk') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$pick_option = $nv_Request->get_title('pick_option', 'get,post', 'cod');
	$insurance_fee = $nv_Request->get_int('insurance_fee', 'get,post', 0);

	check_order($order_id);

	if ($pick_option != 'cod' and $pick_option != 'post') {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	
	$info_order = get_info_order($order_id);
	$info_warehouse = get_info_warehouse($info_order['warehouse_id']);
	$list_order = $db->query('SELECT t1.*, t2.name_product FROM ' . TABLE . '_order_item t1 INNER JOIN ' . TABLE . '_product t2 ON t1.product_id=t2.id where order_id=' . $order_id)->fetchAll();
	$list_item = array();
	foreach ($list_order as $value) {
		
		if ($value['classify_value_product_id'] > 0) {
			$classify_value_product_id = get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
			if ($classify_value_product_id['classify_id_value2'] > 0) {
				$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
				$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
			} else {
				$name_group = $name_classify_id_value1;
			}
			$value['name_product'] = $value['name_product'] . '(' . $name_group . ')';
		}
		$value['weight'] = $value['weight'] / 1000;
		if($value['weight'] < 0.1){
			$value['weight'] = 0.1;
		}
		
		$list_item[] = array(
			"name" => $value['name_product'],
			"price" => $value['price'],
			"weight" => $value['weight'] ,
			"quantity" => $value['quantity'],
			"product_code" => ""
		);
		
	}
	
	$pick_province = $global_province[$info_warehouse['province_id']]['type'] . ' ' . $global_province[$info_warehouse['province_id']]['title'];
	$pick_district = $global_district[$config_setting['district_ecng']]['type'] . ' ' . $global_district[$info_warehouse['district_id']]['title'];
	$pick_ward = $global_ward[$info_warehouse['ward_id']]['type'] . ' ' . $global_ward[$info_warehouse['ward_id']]['title'];
	$address_create_order = $info_warehouse['address'];
	$address_short = explode(',',$info_warehouse['address']);
	$info_warehouse['address'] = $address_short[0];

	$province = $global_province[$info_order['province_id']]['type'] . ' ' . $global_province[$info_order['province_id']]['title'];
	$district = $global_district[$info_order['district_id']]['type'] . ' ' . $global_district[$info_order['district_id']]['title'];
	$ward = $global_ward[$info_order['ward_id']]['type'] . ' ' . $global_ward[$info_order['ward_id']]['title'];
	$address_short = explode(',',$info_order['address']);
	$info_order['address'] = $address_short[0];
	//khai bảo hiểm
	$value = $info_order['total_product'];
	if($insurance_fee){
		if($value > 20000000){
			$value = 20000000;
		}
		else{
			$value = $info_order['total_product'];
		}
	}
	elseif($value > 1000000){
		$value = 999000;
	}

	// thu hộ
	$pick_money = 0;
	//phí ship 1 shop trả || 0 khách trả
	$is_freeship = 1;
	if ($info_order['payment_method'] == 'recieve') {
		$pick_money = $info_order['total_product'];
		$is_freeship = 0;
	}
	
	$info_order['order_code'] = $info_order['order_code'] . ' - ' . nv_date("H:i d/m/Y", NV_CURRENTTIME);
	$order_ghtk = send_ghtk($list_item, $info_order['order_code'], $global_seller['company_name'], $info_warehouse['address'], $pick_province, $pick_district, $pick_ward, $info_warehouse['phone_send'], $info_order['phone'], $info_order['order_name'], $info_order['address'], $province, $district, $ward, $pick_money, $value, 'road', '', $pick_option, $is_freeship);

	if ($order_ghtk['success']) {
		update_ghtk($info_order, $order_ghtk, $address_create_order, $info_warehouse['phone_send']);
		print_r(json_encode(array('status' => 'OK')));
		die();
	}else{
		print_r(json_encode(array('status' => 'ERROR', 'mess' => $order_ghtk['message'])));
		die();
	}

}
if ($mod == 'send_viettelpost') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$info_order = get_info_order($order_id);
	$ServiceName = get_info_transporters($info_order['transporters_id'])['code_transporters'];
	$info_warehouse = get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
	$SenderProvinceId = get_info_province($info_warehouse['province_id'])['vtpid'];
	$SenderDistrictId = get_info_district($info_warehouse['district_id'])['vtpid'];
	$SenderWardId = get_info_ward($info_warehouse['ward_id'])['vtpid'];
	$ReceiverProvinceId = get_info_province($info_order['province_id'])['vtpid'];
	$ReceiverDistrictId = get_info_district($info_order['district_id'])['vtpid'];
	$ReceiverWardId = get_info_ward($info_order['ward_id'])['vtpid'];
	$info_order['address'] = $info_order['address'] . ', ' . get_info_ward($info_order['ward_id'])['title'] . ', ' . get_info_district($info_order['district_id'])['title'] . ', ' . get_info_province($info_order['province_id'])['title'];
	$PackageContent = 'Đơn hàng với mã đơn hàng ' . $info_order['order_code'];
	$PRODUCT_QUANTITY = $db->query('SELECT count(*) FROM ' . TABLE . '_order_item where order_id=' . $order_id)->fetchColumn();
	$list_order = $db->query('SELECT t1.*, t2.name_product FROM ' . TABLE . '_order_item t1 INNER JOIN ' . TABLE . '_product t2 ON t1.product_id=t2.id where order_id=' . $order_id)->fetchAll();
	$list_item = array();
	foreach ($list_order as $value) {
		if ($value['classify_value_product_id'] > 0) {
			$classify_value_product_id = get_info_classify_value_product($value['classify_value_product_id']);
			$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
			$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
			if ($classify_value_product_id['classify_id_value2'] > 0) {
				$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
				$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
				$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
			} else {
				$name_group = $name_classify_id_value1;
			}
			$value['name_product'] = $value['name_product'] . '(' . $name_group . ')';
		}
		$list_item[] = array(
			"PRODUCT_NAME" => $value['name_product'],
			"PRODUCT_PRICE" => $value['price'],
			"PRODUCT_WEIGHT" => $value['weight'],
			"PRODUCT_QUANTITY" => $value['quantity']
		);
	}
	$payment_method = $info_order['payment_method'];
	if ($payment_method > 0) {
		$order_viettelpost = send_viettelpost($info_order['total'], 0, '', $ServiceName, $SenderProvinceId, $SenderDistrictId, $SenderWardId, $info_warehouse['lat'], $info_warehouse['lng'], $ReceiverProvinceId, $ReceiverDistrictId, "HH", $info_order['order_code'], $info_warehouse['groupaddressid'], $info_warehouse['cusid'], $info_warehouse['name_send'], $info_warehouse['address'], str_replace("-", "", $info_warehouse['phone_send']), $info_order['order_name'], $info_order['address'], $info_order['phone'], $PackageContent, $PackageContent, $PRODUCT_QUANTITY, 3, $list_item, $info_order['total_weight'], $info_order['total_length'], $info_order['total_width'], $info_order['total_height'], $ReceiverWardId, $info_order['lat'], $info_order['lng']);
	} else {
		$order_viettelpost = send_viettelpost($info_order['total'], $info_order['total'], '', $ServiceName, $SenderProvinceId, $SenderDistrictId, $SenderWardId, $info_warehouse['lat'], $info_warehouse['lng'], $ReceiverProvinceId, $ReceiverDistrictId, "HH", $info_order['order_code'], $info_warehouse['groupaddressid'], $info_warehouse['cusid'], $info_warehouse['name_send'], $info_warehouse['address'], str_replace("-", "", $info_warehouse['phone_send']), $info_order['order_name'], $info_order['address'], $info_order['phone'], $PackageContent, $PackageContent, $PRODUCT_QUANTITY, 3, $list_item, $info_order['total_weight'], $info_order['total_length'], $info_order['total_width'], $info_order['total_height'], $ReceiverWardId, $info_order['lat'], $info_order['lng']);
	}
	$db->query('UPDATE ' . TABLE . '_order SET status=2, shipping_code=' . $db->quote($order_viettelpost['data']['ORDER_NUMBER']) . ' where id=' . $order_id);
	$content = 'Chuyển sang đơn vị vận chuyển Viettel Post Thành Công';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
	print_r(json_encode(array('status' => 'OK')));
	die();
}
if ($mod == 'send_vnpost') {


	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	$hinhthucthugom = $nv_Request->get_int('hinhthucthugom', 'get,post', 0);
	$khaigia = $nv_Request->get_int('khaigia', 'get,post', 0);

	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$info_order = get_info_order($order_id);

	// $info_order['status'] == 1 đơn hàng đã xác nhận 
	// $info_order['status_payment_vnpay'] == 1 đơn hàng đã thanh toán

	if (($info_order['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($info_order['status_payment_vnpay'] == 0) or ($info_order['status'] != 1)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	$order_code = $info_order['order_code'] . '-' . NV_CURRENTTIME;

	$IsPackageViewable = 0;
	$PickupPoscode = 0;


	/*
			Hình thức thu gom *
			- 1: Pickup - Thu gom tận nơi
			- 2: Dropoff - Gửi hàng tại bưu cục
		*/

	// CHƯA nhận tham số
	$PickupType = $hinhthucthugom;

	// không khai giá
	if (!$khaigia) {
		$info_order['total_product'] = 0;
	}

	$ServiceName = get_info_transporters($info_order['transporters_id'])['code_transporters'];
	$info_warehouse = get_info_warehouse($info_order['warehouse_id']);
	$info_warehouse['address'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
	$SenderProvinceId = get_info_province($info_warehouse['province_id'])['vnpostid'];
	$SenderDistrictId = get_info_district($info_warehouse['district_id'])['vnpostid'];
	$SenderWardId = get_info_ward($info_warehouse['ward_id'])['vnpostid'];
	$ReceiverProvinceId = get_info_province($info_order['province_id'])['vnpostid'];
	$ReceiverDistrictId = get_info_district($info_order['district_id'])['vnpostid'];
	$ReceiverWardId = get_info_ward($info_order['ward_id'])['vnpostid'];
	$PackageContent = 'Đơn hàng với mã đơn hàng ' . $info_order['order_code'];
	$info_order['address'] = $info_order['address'] . ', ' . get_info_ward($info_order['ward_id'])['title'] . ', ' . get_info_district($info_order['district_id'])['title'] . ', ' . get_info_province($info_order['province_id'])['title'];
	$payment_method = get_info_order($order_id)['payment_method'];
	if ($payment_method > 0) {
		// đã thanh toán đơn hàng
		$order_vnpost = send_vnpost($order_code, $PackageContent, $ServiceName, $info_warehouse['name_send'], $info_warehouse['address'], $info_warehouse['phone_send'], $SenderProvinceId, $SenderDistrictId, $SenderWardId, $info_order['order_name'], $info_order['address'], $info_order['phone'], $ReceiverProvinceId, $ReceiverDistrictId, $ReceiverWardId, 0, $PickupPoscode, $info_order['total_weight'], $info_order['total_length'], $info_order['total_width'], $info_order['total_height'], $info_order['total_product'], $PickupType);
	} else {
		// chưa thanh toán đơn hàng
		$order_vnpost = send_vnpost($order_code, $PackageContent, $ServiceName, $info_warehouse['name_send'], $info_warehouse['address'], $info_warehouse['phone_send'], $SenderProvinceId, $SenderDistrictId, $SenderWardId, $info_order['order_name'], $info_order['address'], $info_order['phone'], $ReceiverProvinceId, $ReceiverDistrictId, $ReceiverWardId, $info_order['total'], $PickupPoscode, $info_order['total_weight'], $info_order['total_length'], $info_order['total_width'], $info_order['total_height'], $info_order['total_product'], $PickupType);
	}

	if (!empty($order_vnpost['ItemCode'])) {
		if (update_vnpost($info_order, $order_vnpost)) {
			print_r(json_encode(array('status' => 'OK')));
			die();
		}
	}

	print_r(json_encode(array('status' => 'ERROR')));
	die();
}



if ($mod == 'shipping') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', '');

	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$info_order = get_info_order($order_id);

	// $info_order['status'] == 1 đơn hàng đã xác nhận 
	// $info_order['status_payment_vnpay'] == 1 đơn hàng đã thanh toán
	if (($info_order['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($info_order['status_payment_vnpay'] == 0) or ($info_order['status'] != 1)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$seller_name = $db->query('SELECT company_name FROM ' . TABLE . '_seller_management WHERE userid = ' . $user_info['userid'])->fetchColumn();

	// xử lý thông tin sau khi tạo vận đơn thành công status=2 đơn hàng đang giao
	$db->query('UPDATE ' . TABLE . '_order SET status=2 where id = ' . $info_order['id']);
	$content = $seller_name . ' đã cập nhật trạng thái đang giao hàng!';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $info_order['id'] . ', 1, ' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
	// gửi thông báo cho quản trị
	$content_ip = ' đã cập nhật trạng thái đang giao hàng, mã đơn hàng ' . $info_order['order_code'];
	nv_insert_notification_ecng($user_info['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');
	update_time_edit_order($info_order['id']);

	print_r(json_encode(array('status' => 'OK')));
	die();
}

if ($mod == 'delivered') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', '');
	check_order($order_id);
	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$info_order = get_info_order($order_id);

	// $info_order['status'] == 1 đơn hàng đã xác nhận 
	// $info_order['status_payment_vnpay'] == 1 đơn hàng đã thanh toán

	if (($info_order['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($info_order['status_payment_vnpay'] == 0) or ($info_order['status'] != 2)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	//xóa khiểu nại chưa nhận hàng nếu có
	$db->query('DELETE FROM ' . TABLE . '_order_seller_delivery_failed WHERE order_id = ' . $order_id);
	$seller_name = $db->query('SELECT company_name FROM ' . TABLE . '_seller_management WHERE userid = ' . $user_info['userid'])->fetchColumn();
	// xử lý thông tin sau khi tạo vận đơn thành công status=2 đơn hàng đang giao
	$db->query('UPDATE ' . TABLE . '_order SET status = 3 where id = ' . $info_order['id']);
	$content = $seller_name . ' đã cập nhật trạng thái đã giao hàng thành công!';
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $info_order['id'] . ', 2, ' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');

	// gửi thông báo cho quản trị

	$content_ip = ' đã cập nhật trạng thái đã giao hàng thành công, mã đơn hàng ' . $info_order['order_code'];
	nv_insert_notification_ecng($user_info['userid'], $info_order['store_id'], $content_ip, $info_order['id'], 'order');
	update_time_edit_order($info_order['id']);
	send_mail_order_delivered($info_order);

	print_r(json_encode(array('status' => 'OK')));

	die();
}

if ($mod == 'get_buucuc') {
	$q = $nv_Request->get_string('q', 'get,post', '');
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'get,post', 0);
	$province_id_send = get_info_warehouse($warehouse_id)['province_id'];
	$district_id_send = get_info_warehouse($warehouse_id)['district_id'];
	$list_buucuc = GetListBuuCucByXaHuyenTinh($province_id_send, $district_id_send);
	foreach ($list_buucuc as $result) {
		$result['name'] = $result['TenBuuCuc'] . ' - Địa chỉ: ' . $result['DiaChi'];
		if ($q != '') {
			if (stripos(strtoupper($result['name']), strtoupper($q)) !== false) {
				$json[] = ['id' => $result['MaBuuCuc'], 'text' => $result['name']];
			}
		} else {
			$json[] = ['id' => $result['MaBuuCuc'], 'text' => $result['name']];
		}
	}

	print_r(json_encode($json));
	die();
}
if ($mod == 'change_status_cancel') {
	$order_id = $nv_Request->get_title('order_id', 'post,get');
	$content = $nv_Request->get_title('content', 'post,get', '');

	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	// xử lý thông tin đơn hàng hủy
	$check_order = $db->query('SELECT id FROM ' . TABLE . '_order WHERE id=' . $order_id . ' AND status = 0 AND store_id =' . $store_id)->fetchColumn();

	if (!$check_order) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	// cập nhật trạng thái đơn hàng = 4
	$db->query('UPDATE ' . TABLE . '_order SET status = 4 where id=' . $order_id);

	// trả hàng về kho, cập nhật kho
	$list_product = $db->query('SELECT * FROM ' . TABLE . '_order_item where order_id=' . $order_id)->fetchAll();

	foreach ($list_product as $product) {
		$where = '';

		if ($product['classify_value_product_id']) {
			$where .= ' AND id=' . $product['classify_value_product_id'];
		}

		$db->query('UPDATE ' . TABLE . '_product_classify_value_product SET sl_tonkho = sl_tonkho + ' . $product['quantity'] . ' WHERE product_id =' . $product['product_id'] . $where);
	}



	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',4,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');

	$info_order = get_info_order($order_id);
	$content_ip = 'Đơn hàng ' . $info_order['order_code'] . ' đã bị hủy với lý do ' . $content;

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $user_info['userid'] . ',' . $info_order['userid'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $info_order['userid'] . ',"order")');

	$db->query('INSERT INTO ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_notification_user(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $user_info['userid'] . ',' . $info_order['userid'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $info_order['userid'] . ',"order")');

	print_r(json_encode(array('status' => 'OK')));
	die();
}
if ($mod == 'change_status_success') {
	$order_id = $nv_Request->get_title('order_id', 'post,get');
	$warehouse_id = $db->query('SELECT warehouse_id FROM ' . TABLE . '_order where id=' . $order_id)->fetchColumn();
	$list_product = $db->query('SELECT * FROM ' . TABLE . '_order_item where order_id=' . $order_id)->fetchAll();
	$status_new = $nv_Request->get_int('status_new', 'post,get');
	$status_old = $nv_Request->get_int('status_old', 'post,get');
	$db->query('UPDATE ' . TABLE . '_order SET status=' . $status_new . ' where id=' . $order_id);
	$content = 'Đơn hàng chuyển sang trạng thái thành công';
	foreach ($list_product as $value) {
		$amount_delivery_old = $db->query('SELECT amount_delivery FROM ' . TABLE . '_inventory_product where warehouse_id=' . $warehouse_id . ' and product_id=' . $value['product_id'] . ' and classify_value_product_id=' . $value['classify_value_product_id'])->fetchColumn();
		$amount_delivery_new = $amount_delivery_old - $value['quantity'];
		$db->query('UPDATE ' . TABLE . '_inventory_product SET amount_delivery=' . $amount_delivery_new . ' where warehouse_id=' . $warehouse_id . ' and product_id=' . $value['product_id'] . ' and classify_value_product_id=' . $value['classify_value_product_id']);
		$number_order_old = $db->query('SELECT number_order FROM ' . TABLE . '_product where id=' . $value['product_id'])->fetchColumn();
		$number_order_new = $number_order_old + $value['quantity'];
		$db->query('UPDATE ' . TABLE . '_product SET number_order=' . $number_order_new . ' where id=' . $value['product_id']);
	}
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',' . $status_old . ',' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
	print_r(json_encode(array('status' => 'OK')));
	die();
}
if ($mod == 'change_status') {
	$order_id = $nv_Request->get_title('order_id', 'post,get');
	$status_new = $nv_Request->get_int('status_new', 'post,get');
	$status_old = $nv_Request->get_int('status_old', 'post,get');


	// check đơn hàng có phải của store_id
	$check = $db->query('SELECT id FROM ' . TABLE . '_order WHERE store_id =' . $store_id . ' AND id=' . $order_id)->fetchColumn();

	if (!$check) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	$db->query('UPDATE ' . TABLE . '_order SET status=' . $status_new . ' where store_id =' . $store_id . ' AND id=' . $order_id);
	if ($status_new == 1) {
		$content = 'Đơn hàng chuyển sang trạng thái đã xác nhận';
	}
	$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',' . $status_old . ',' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');

	// gửi thông báo cho quản trị
	$info_order = get_info_order($order_id);

	$content_ip = 'Đơn hàng ' . $info_order['order_code'] . ' chuyển sang trạng thái đã xác nhận';
	nv_insert_notification_ecng($user_info['userid'], $store_id, $content_ip, $order_id, 'order');

	print_r(json_encode(array('status' => 'OK')));
	die();
}

if ($mod == 'load_order_customer') {
	$where = '';
	$q = $nv_Request->get_title('q', 'post,get');
	$sea_flast = $nv_Request->get_int('sea_flast', 'post,get');
	$ngay_den = $nv_Request->get_title('ngay_den', 'post,get');
	$ngay_tu = $nv_Request->get_title('ngay_tu', 'post,get');
	$status_ft = $nv_Request->get_title('status_search', 'post,get', -1);
	$_SESSION[$module_data . '_status_view_order'] = $status_ft;
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&mod=load_order_customer&q=' . $q . '&sea_flast=' . $sea_flast . '&ngay_den=' . $ngay_den . '&ngay_tu=' . $ngay_tu . '&status_search=' . $status_ft;

	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 0);
		$_min = $nv_Request->get_int('add_date_min', 'post', 0);
		$ngay_tu = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
	} else {
		$ngay_tu = 0;
	}

	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 23);
		$_min = $nv_Request->get_int('add_date_min', 'post', 59);
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
	if ($status_ft > -1) {
		$where .= ' AND status =' . $status_ft;
		$base_url .= '&status_search=' . $status_ft;
	}
	if (!empty($q)) {
		$where .= ' AND (order_code LIKE "%" "' . $q . '" "%" OR order_name LIKE "%" "' . $q . '" "%" OR phone LIKE "%" "' . $q . '" "%" OR email LIKE "%" "' . $q . '" "%")';
		$base_url .= '&q=' . $q;
	}

	$per_page = 10;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_order')
		->where('userid=' . $user_info['userid'] . $where);

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('*')
		->order('id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$xtpl = new XTemplate('order_ajax_customer.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

	if ($ngay_tu > 0)
		$xtpl->assign('ngay_tu', date('d-m-Y', $ngay_tu));
	if ($ngay_den > 0)
		$xtpl->assign('ngay_den', date('d-m-Y', $ngay_den));

	$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'form');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
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

	if ($sea_flast == '1') {
		$xtpl->assign('SELECT1', 'selected="selected"');
	}
	if ($sea_flast == '2') {
		$xtpl->assign('SELECT2', 'selected="selected"');
	}
	if ($sea_flast == '3') {
		$xtpl->assign('SELECT3', 'selected="selected"');
	}
	if ($sea_flast == '4') {
		$xtpl->assign('SELECT4', 'selected="selected"');
	}
	if ($sea_flast == '5') {
		$xtpl->assign('SELECT5', 'selected="selected"');
	}
	if ($sea_flast == '6') {
		$xtpl->assign('SELECT6', 'selected="selected"');
	}
	if ($sea_flast == '7') {
		$xtpl->assign('SELECT7', 'selected="selected"');
	}
	if ($sea_flast == '8') {
		$xtpl->assign('SELECT8', 'selected="selected"');
	}
	if ($sea_flast == '9') {
		$xtpl->assign('SELECT9', 'selected="selected"');
	}

	while ($view = $sth->fetch()) {
		$view['number'] = $number++;
		$view['store_name'] = get_info_store($view['store_id'])['company_name'];
		$view['warehouse_name'] = get_info_warehouse($view['warehouse_id'])['name_warehouse'];
		$view['phone_warehouse'] = get_info_warehouse($view['warehouse_id'])['phone_send'];
		$info_warehouse = get_info_warehouse($view['warehouse_id']);
		$view['address_warehouse'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
		$view['address_receive'] = $view['address'] . ', ' . get_info_ward($view['ward_id'])['title'] . ', ' . get_info_district($view['district_id'])['title'] . ', ' . get_info_province($view['province_id'])['title'];
		$view['transporters_name'] = get_info_transporters($view['transporters_id'])['name_transporters'];
		$view['total_product'] = number_format($view['total_product']);
		$view['fee_transport'] = number_format($view['fee_transport']);
		$view['total'] = number_format($view['total']);
		$view['time_add'] = date('d-m-Y H:i', $view['time_add']);
		if ($view['payment_method'] == 0) {
			$view['payment_method'] = 'Thanh toán khi nhận hàng';
		} elseif ($view['payment_method'] == 1) {
			$view['payment_method'] = 'Thanh toán qua ví tiền';
		} elseif ($view['payment_method'] == 2) {
			$view['payment_method'] = 'Thanh toán qua VNPAY';
		}
		$view['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $view['id'] . '&store_id=' . $view['store_id'] . '&warehouse_id=' . $view['warehouse_id'], true);
		$xtpl->assign('VIEW', $view);
		if ($view['status'] == 0) {
			$xtpl->parse('main.loop.status_cancel');
		}
		$xtpl->parse('main.loop');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['order'];
	echo $contents;
	die;
}



if ($mod == 'load_order') {
	$where = '';
	$q = $nv_Request->get_title('q', 'post,get');
	$sea_flast = $nv_Request->get_int('sea_flast', 'post,get');
	$ngay_den = $nv_Request->get_title('ngay_den', 'post,get');
	$ngay_tu = $nv_Request->get_title('ngay_tu', 'post,get');
	$status_ft = $nv_Request->get_title('status_search', 'post,get', -1);
	$_SESSION[$module_data . '_status_view_order'] = $status_ft;
	$store_id = $nv_Request->get_int('store_id', 'post,get', 0);
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'post,get', 0);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&mod=load_order';

	$customer_id = $nv_Request->get_int('customer_id', 'post,get', 0);
	$categories_id = $nv_Request->get_int('categories_id', 'post,get', 0);
	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 0);
		$_min = $nv_Request->get_int('add_date_min', 'post', 0);
		$ngay_tu = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
	} else {
		$ngay_tu = 0;
	}


	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 23);
		$_min = $nv_Request->get_int('add_date_min', 'post', 59);
		$ngay_den = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
	} else {
		$ngay_den = 0;
	}
	if ($sea_flast != 9) {
		if ($ngay_tu > 0 and $ngay_den > 0) {

			$where .= ' AND t1.time_add >= ' . $ngay_tu . ' AND t1.time_add <= ' . $ngay_den;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		} else if ($ngay_tu > 0) {
			$where .= ' AND t1.time_add >= ' . $ngay_tu;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		} else if ($ngay_den > 0) {
			$where .= ' AND t1.time_add <= ' . $ngay_den;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		}
	}
	if ($status_ft > -1) {
		$where .= ' AND t1.status =' . $status_ft;
		$base_url .= '&status_search=' . $status_ft;
	}
	if (!empty($q)) {
		$where .= ' AND (t1.order_code LIKE "%" "' . $q . '" "%")';
		$base_url .= '&q=' . $q;
	}
	if ($store_id > 0) {
		$where .= ' AND t1.store_id =' . $store_id;
		$base_url .= '&store_id=' . $store_id;
	}
	if ($warehouse_id > 0) {
		$where .= ' AND t1.warehouse_id =' . $warehouse_id;
		$base_url .= '&warehouse_id=' . $warehouse_id;
	}
	if ($customer_id > 0) {
		$where .= ' AND t1.userid =' . $customer_id;
		$base_url .= '&customer_id=' . $customer_id;
	}
	if ($categories_id > 0) {
		$where .= ' AND t2.product_id IN (SELECT id FROM ' . TABLE . '_product where categories_id=' . $categories_id . ')';
		$base_url .= '&categories_id=' . $categories_id;
	}

	$per_page = 10;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
		->select('COUNT(DISTINCT t1.id)')
		->from('' . TABLE . '_order t1')
		->join('INNER JOIN ' . TABLE . '_order_item t2 ON t2.order_id=t1.id')
		->where('1=1' . $where . ' AND t1.payment != 0');
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('t1.*')
		->order('t1.id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page)
		->where('1=1' . $where . ' AND t1.payment != 0 group by t1.id ');

	$sth = $db->prepare($db->sql());


	$sth->execute();
	$xtpl = new XTemplate('order_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
	if ($store_id > 0) {
		if ($warehouse_id > 0) {
			$xtpl->assign('warehouse_name', get_info_warehouse($warehouse_id)['name_warehouse']);
		} else {
			$xtpl->assign('warehouse_name', 'Chọn tất cả');
		}
		$xtpl->parse('main.store_edit');
	}
	if ($ngay_tu > 0)
		$xtpl->assign('ngay_tu', date('d-m-Y', $ngay_tu));
	if ($ngay_den > 0)
		$xtpl->assign('ngay_den', date('d-m-Y', $ngay_den));

	$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'form');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
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

	if ($sea_flast == '1') {
		$xtpl->assign('SELECT1', 'selected="selected"');
	}
	if ($sea_flast == '2') {
		$xtpl->assign('SELECT2', 'selected="selected"');
	}
	if ($sea_flast == '3') {
		$xtpl->assign('SELECT3', 'selected="selected"');
	}
	if ($sea_flast == '4') {
		$xtpl->assign('SELECT4', 'selected="selected"');
	}
	if ($sea_flast == '5') {
		$xtpl->assign('SELECT5', 'selected="selected"');
	}
	if ($sea_flast == '6') {
		$xtpl->assign('SELECT6', 'selected="selected"');
	}
	if ($sea_flast == '7') {
		$xtpl->assign('SELECT7', 'selected="selected"');
	}
	if ($sea_flast == '8') {
		$xtpl->assign('SELECT8', 'selected="selected"');
	}
	if ($sea_flast == '9') {
		$xtpl->assign('SELECT9', 'selected="selected"');
	}

	while ($view = $sth->fetch()) {
		$view['number'] = $number++;
		$view['store_name'] = get_info_store($view['store_id'])['company_name'];

		$view['warehouse_name'] = get_info_warehouse($view['warehouse_id'])['name_warehouse'];
		$view['phone_warehouse'] = get_info_warehouse($view['warehouse_id'])['phone_send'];
		$info_warehouse = get_info_warehouse($view['warehouse_id']);
		$view['address_warehouse'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
		$view['address_receive'] = $view['address'] . ', ' . get_info_ward($view['ward_id'])['title'] . ', ' . get_info_district($view['district_id'])['title'] . ', ' . get_info_province($view['province_id'])['title'];
		$view['transporters_name'] = get_info_transporters($view['transporters_id'])['name_transporters'];
		$view['total_product'] = number_format($view['total_product']);
		$view['fee_transport'] = number_format($view['fee_transport']);
		$view['total'] = number_format($view['total']);
		$view['time_add'] = date('d-m-Y H:i', $view['time_add']);
		if ($view['payment_method'] == 0) {
			$view['payment_method'] = 'Thanh toán khi nhận hàng';
		} elseif ($view['payment_method'] == 2) {
			$view['payment_method'] = 'Thanh toán qua VNPAY';
		} else {
			$view['payment_method'] = 'Thanh toán qua ví tiền';
		}

		$view['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $view['id'] . '&store_id=' . $view['store_id'] . '&warehouse_id=' . $view['warehouse_id'], true);
		$xtpl->assign('VIEW', $view);
		if ($view['status'] == 0) {
			$xtpl->parse('main.loop.status0');
		} else if ($view['status'] == 1) {
			if ($view['transporters_id'] == 4 || $view['transporters_id'] == 5) {
				$xtpl->parse('main.loop.vnpost');
			} else if ($view['transporters_id'] == 6 || $view['transporters_id'] == 7 || $view['transporters_id'] == 8 || $view['transporters_id'] == 9) {
				$xtpl->parse('main.loop.viettelpost');
			} else if ($view['transporters_id'] == 2) {
				$xtpl->parse('main.loop.ghtk');
			} else if ($view['transporters_id'] == 3 || $view['transporters_id'] == 11) {
				$xtpl->parse('main.loop.ghn');
			} else {
				$xtpl->parse('main.loop.ahamove');
			}
		} else if ($view['status'] > 1) {
			if ($view['transporters_id'] == 1 || $view['transporters_id'] >= 15) {
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.loop.link_check_ahamove_order');
			} else {
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.loop.no_link_check_ahamove_order');
			}
		}
		if ($view['status'] == 2) {
			if ($view['transporters_id'] == 1 || $view['transporters_id'] >= 15) {
				$xtpl->parse('main.loop.status_success.cancel_ahamove');
			}
			$xtpl->parse('main.loop.status_success');
		} else if ($view['status'] < 2) {
			$xtpl->parse('main.loop.status_cancel');
		}
		$xtpl->parse('main.loop');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['order'];
	echo $contents;
	die;
}

if ($mod == 'load_order_no_payment') {
	$where = '';
	$q = $nv_Request->get_title('q', 'post,get');
	$sea_flast = $nv_Request->get_int('sea_flast', 'post,get');
	$ngay_den = $nv_Request->get_title('ngay_den', 'post,get');
	$ngay_tu = $nv_Request->get_title('ngay_tu', 'post,get');
	$status_ft = $nv_Request->get_title('status_search', 'post,get', -1);
	$_SESSION[$module_data . '_status_view_order'] = $status_ft;
	$store_id = $nv_Request->get_int('store_id', 'post,get', 0);
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'post,get', 0);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&mod=load_order_no_payment';

	$customer_id = $nv_Request->get_int('customer_id', 'post,get', 0);
	$categories_id = $nv_Request->get_int('categories_id', 'post,get', 0);
	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 0);
		$_min = $nv_Request->get_int('add_date_min', 'post', 0);
		$ngay_tu = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
	} else {
		$ngay_tu = 0;
	}


	if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m)) {
		$_hour = $nv_Request->get_int('add_date_hour', 'post', 23);
		$_min = $nv_Request->get_int('add_date_min', 'post', 59);
		$ngay_den = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
	} else {
		$ngay_den = 0;
	}
	if ($sea_flast != 9) {
		if ($ngay_tu > 0 and $ngay_den > 0) {

			$where .= ' AND t1.time_add >= ' . $ngay_tu . ' AND t1.time_add <= ' . $ngay_den;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		} else if ($ngay_tu > 0) {
			$where .= ' AND t1.time_add >= ' . $ngay_tu;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		} else if ($ngay_den > 0) {
			$where .= ' AND t1.time_add <= ' . $ngay_den;
			$base_url .= '&ngay_tu=' . date('d-m-Y', $ngay_tu) . '&ngay_den=' . date('d-m-Y', $ngay_den);
		}
	}
	if ($status_ft > -1) {
		$where .= ' AND t1.status =' . $status_ft;
		$base_url .= '&status_search=' . $status_ft;
	}
	if (!empty($q)) {
		$where .= ' AND (t1.order_code LIKE "%" "' . $q . '" "%")';
		$base_url .= '&q=' . $q;
	}
	if ($store_id > 0) {
		$where .= ' AND t1.store_id =' . $store_id;
		$base_url .= '&store_id=' . $store_id;
	}
	if ($warehouse_id > 0) {
		$where .= ' AND t1.warehouse_id =' . $warehouse_id;
		$base_url .= '&warehouse_id=' . $warehouse_id;
	}
	if ($customer_id > 0) {
		$where .= ' AND t1.userid =' . $customer_id;
		$base_url .= '&customer_id=' . $customer_id;
	}
	if ($categories_id > 0) {
		$where .= ' AND t2.product_id IN (SELECT id FROM ' . TABLE . '_product where categories_id=' . $categories_id . ')';
		$base_url .= '&categories_id=' . $categories_id;
	}

	$per_page = 10;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
		->select('COUNT(DISTINCT t1.id)')
		->from('' . TABLE . '_order t1')
		->join('INNER JOIN ' . TABLE . '_order_item t2 ON t2.order_id=t1.id')
		->where('1=1' . $where . ' AND t1.payment = 0');
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('t1.*')
		->order('t1.id DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page)
		->where('1=1' . $where . ' AND t1.payment = 0 group by t1.id ');

	$sth = $db->prepare($db->sql());


	$sth->execute();
	$xtpl = new XTemplate('order_ajax_no_payment.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
	if ($store_id > 0) {
		if ($warehouse_id > 0) {
			$xtpl->assign('warehouse_name', get_info_warehouse($warehouse_id)['name_warehouse']);
		} else {
			$xtpl->assign('warehouse_name', 'Chọn tất cả');
		}
		$xtpl->parse('main.store_edit');
	}
	if ($ngay_tu > 0)
		$xtpl->assign('ngay_tu', date('d-m-Y', $ngay_tu));
	if ($ngay_den > 0)
		$xtpl->assign('ngay_den', date('d-m-Y', $ngay_den));

	$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'form');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
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

	if ($sea_flast == '1') {
		$xtpl->assign('SELECT1', 'selected="selected"');
	}
	if ($sea_flast == '2') {
		$xtpl->assign('SELECT2', 'selected="selected"');
	}
	if ($sea_flast == '3') {
		$xtpl->assign('SELECT3', 'selected="selected"');
	}
	if ($sea_flast == '4') {
		$xtpl->assign('SELECT4', 'selected="selected"');
	}
	if ($sea_flast == '5') {
		$xtpl->assign('SELECT5', 'selected="selected"');
	}
	if ($sea_flast == '6') {
		$xtpl->assign('SELECT6', 'selected="selected"');
	}
	if ($sea_flast == '7') {
		$xtpl->assign('SELECT7', 'selected="selected"');
	}
	if ($sea_flast == '8') {
		$xtpl->assign('SELECT8', 'selected="selected"');
	}
	if ($sea_flast == '9') {
		$xtpl->assign('SELECT9', 'selected="selected"');
	}

	while ($view = $sth->fetch()) {
		$view['number'] = $number++;
		$view['store_name'] = get_info_store($view['store_id'])['company_name'];
		$view['warehouse_name'] = get_info_warehouse($view['warehouse_id'])['name_warehouse'];
		$view['phone_warehouse'] = get_info_warehouse($view['warehouse_id'])['phone_send'];
		$info_warehouse = get_info_warehouse($view['warehouse_id']);
		$view['address_warehouse'] = $info_warehouse['address'] . ', ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['title'];
		$view['address_receive'] = $view['address'] . ', ' . get_info_ward($view['ward_id'])['title'] . ', ' . get_info_district($view['district_id'])['title'] . ', ' . get_info_province($view['province_id'])['title'];
		$view['transporters_name'] = get_info_transporters($view['transporters_id'])['name_transporters'];
		$view['total_product'] = number_format($view['total_product']);
		$view['fee_transport'] = number_format($view['fee_transport']);
		$view['total'] = number_format($view['total']);
		$view['time_add'] = date('d-m-Y H:i', $view['time_add']);
		if ($view['payment_method'] == 0) {
			$view['payment_method'] = 'Thanh toán khi nhận hàng';
		} elseif ($view['payment_method'] == 2) {
			$view['payment_method'] = 'Thanh toán qua VNPAY';
		} else {
			$view['payment_method'] = 'Thanh toán qua ví tiền';
		}
		$view['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $view['id'] . '&store_id=' . $view['store_id'] . '&warehouse_id=' . $view['warehouse_id'], true);
		$xtpl->assign('VIEW', $view);
		if ($view['status'] == 0) {
			$xtpl->parse('main.loop.status0');
		} else if ($view['status'] == 1) {
			if ($view['transporters_id'] == 4 || $view['transporters_id'] == 5) {
				$xtpl->parse('main.loop.vnpost');
			} else if ($view['transporters_id'] == 6 || $view['transporters_id'] == 7 || $view['transporters_id'] == 8 || $view['transporters_id'] == 9) {
				$xtpl->parse('main.loop.viettelpost');
			} else if ($view['transporters_id'] == 2) {
				$xtpl->parse('main.loop.ghtk');
			} else if ($view['transporters_id'] == 3 || $view['transporters_id'] == 11) {
				$xtpl->parse('main.loop.ghn');
			} else {
				$xtpl->parse('main.loop.ahamove');
			}
		} else if ($view['status'] > 1) {
			if ($view['transporters_id'] == 1 || $view['transporters_id'] >= 15) {
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.loop.link_check_ahamove_order');
			} else {
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.loop.no_link_check_ahamove_order');
			}
		}
		if ($view['status'] == 2) {
			if ($view['transporters_id'] == 1 || $view['transporters_id'] >= 15) {
				$xtpl->parse('main.loop.status_success.cancel_ahamove');
			}
			$xtpl->parse('main.loop.status_success');
		} else if ($view['status'] < 2) {
			$xtpl->parse('main.loop.status_cancel');
		}
		$xtpl->parse('main.loop');
	}

	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['order'];
	echo $contents;
	die;
}



if ($mod == 'add_order') {
	$order_name = $nv_Request->get_string('order_name', 'get,post', '');
	$order_email = $nv_Request->get_string('order_email', 'get,post', '');
	$order_phone = $nv_Request->get_string('order_phone', 'get,post', '');
	$address = $nv_Request->get_string('address', 'get,post', '');
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$ward_id = $nv_Request->get_int('ward_id', 'get,post', 0);
	$payment_method = $nv_Request->get_int('payment_method', 'get,post', 0);
	$total_full = $nv_Request->get_int('total_full', 'get,post', 0);
	$lat = $nv_Request->get_string('lat', 'get,post', '');
	$lng = $nv_Request->get_string('lng', 'get,post', '');
	$list_transporters = json_decode(str_replace('&quot;', '"', $nv_Request->get_title('list_transporters', 'get,post', '')), true);
	if (!defined('NV_IS_USER')) {
		$userid = 0;
	} else {
		$userid = $user_info['userid'];
	}
	$error = array();
	foreach ($list_transporters as $value_transporters) {
		foreach ($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']] as $key_product => $value_product) {
			if ($value_product['status_check'] == 1) {
				$number_inventory_max = get_info_invetory_group($value_product['product_id'], $value_transporters['warehouse_id'], $value_product['classify_value_product_id'])['amount'];
				if ($value_product['num'] > $number_inventory_max) {
					if ($value_product['classify_value_product_id'] > 0) {
						$classify_value_product_id = get_info_classify_value_product($value_product['classify_value_product_id']);
						$classify_id_value1 = get_info_classify_value($classify_value_product_id['classify_id_value1']);
						$name_classify_id_value1 = get_info_classify($classify_id_value1['classify_id'])['name_classify'] . ' ' . $classify_id_value1['name'];
						if ($classify_value_product_id['classify_id_value2'] > 0) {
							$classify_id_value2 = get_info_classify_value($classify_value_product_id['classify_id_value2']);
							$name_classify_id_value2 = get_info_classify($classify_id_value2['classify_id'])['name_classify'] . ' ' . $classify_id_value2['name'];
							$name_group = $name_classify_id_value1 . ', ' . $name_classify_id_value2;
						} else {
							$name_group = $name_classify_id_value1;
						}
						$name_product = get_info_product($value_product['product_id'])['name_product'] . ' (' . $name_group . ')';
					} else {
						$name_product = get_info_product($value_product['product_id'])['name_product'];
					}
					$error[] = 'Sản phẩm ' . $name_product . ' ở kho hàng ' . get_info_warehouse($value_transporters['warehouse_id'])['name_warehouse'] . ' hiện chỉ còn ' . number_format($number_inventory_max) . ' sản phẩm. Vui lòng quay lại giỏ hàng để thay đổi.';
				}
			}
		}
	}
	if (count($error) == 0) {
		if ($payment_method == 0) {
			foreach ($list_transporters as $value_transporters) {
				$check = $db->query('SELECT max(id) FROM ' . TABLE . '_order')->fetchColumn();
				if ($check == 0) {
					$order_code = $config_setting['raw_order_prefix'] . '00001';
				} else {
					$order_code = $config_setting['raw_order_prefix'] . '0000' . ($check + 1);
				}
				$sql = 'INSERT INTO ' . TABLE . '_order ( userid,order_code,store_id,warehouse_id,order_name,email,phone,province_id,district_id,ward_id,address,transporters_id,total_product,fee_transport,total,note,time_add,status,payment,total_weight,total_height,total_width,total_length,payment_method,lat,lng) VALUES (:userid,:order_code,:store_id,:warehouse_id,:order_name,:email,:phone,:province_id,:district_id,:ward_id,:address,:transporters_id,:total_product,:fee_transport,:total,:note,:time_add,0,0,:total_weight,:total_height,:total_width,:total_length,:payment_method,:lat,:lng)';

				$data_insert = array();
				$data_insert['order_code'] = $order_code;
				$data_insert['userid'] = $userid;
				$data_insert['store_id'] = $value_transporters['store_id'];
				$data_insert['warehouse_id'] = $value_transporters['warehouse_id'];
				$data_insert['order_name'] = $order_name;
				$data_insert['email'] = $order_email;
				$data_insert['phone'] = $order_phone;
				$data_insert['province_id'] = $province_id;
				$data_insert['district_id'] = $district_id;
				$data_insert['ward_id'] = $ward_id;
				$data_insert['address'] = $address;
				$data_insert['transporters_id'] = $value_transporters['transporters_id'];
				$data_insert['total_product'] = $value_transporters['total_product'];
				$data_insert['fee_transport'] = $value_transporters['fee'];
				$data_insert['total'] = $value_transporters['total_product'] + $value_transporters['fee'];
				$data_insert['note'] = $value_transporters['note_product'];
				$data_insert['time_add'] = NV_CURRENTTIME;
				$data_insert['total_weight'] = $value_transporters['total_weight'];
				$data_insert['total_height'] =  $value_transporters['total_height'];
				$data_insert['total_width'] = $value_transporters['total_width'];
				$data_insert['total_length'] = $value_transporters['total_length'];
				$data_insert['payment_method'] = $payment_method;
				$data_insert['lat'] = $lat;
				$data_insert['lng'] = $lng;
				$order_id = $db->insert_id($sql, 'id', $data_insert);
				if ($order_id > 0) {
					$list_product = array();
					foreach ($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']] as $key_product => $value_product) {
						if ($value_product['status_check'] == 1) {
							$total_weight = $value_product['weight_product'] * get_info_unit_weight($value_product['weight_unit'])['exchange'] * $value_product['num'];
							$total_length = $value_product['length_product'] * get_info_unit_length($value_product['unit_length'])['exchange'] * $value_product['num'];
							$total_width = $value_product['width_product'] * get_info_unit_length($value_product['unit_width'])['exchange'] * $value_product['num'];
							$total_height = $value_product['height_product'] * get_info_unit_length($value_product['unit_height'])['exchange'] * $value_product['num'];
							$total_length = $value_product['length_product'] * get_info_unit_length($value_product['unit_length'])['exchange'] * $value_product['num'];
							$total = $value_product['price'] * $value_product['num'];
							$db->query('INSERT INTO ' . TABLE . '_order_item(order_id,product_id,weight,length,height,width,price,classify_value_product_id,quantity,total) VALUES(' . $order_id . ',' . $value_product['product_id'] . ',' . $total_weight . ',' . $total_length . ',' . $total_height . ',' . $total_width . ',' . $value_product['price'] . ',' . $value_product['classify_value_product_id'] . ',' . $value_product['num'] . ',' . $total . ')');
							$amount_delivery_old = $db->query('SELECT amount_delivery FROM ' . TABLE . '_inventory_product where  store_id=' . $value_transporters['store_id'] . ' and warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id'])->fetchColumn();
							$amount_delivery_new = $amount_delivery_old + $value_product['num'];
							$amount_old = $db->query('SELECT amount FROM ' . TABLE . '_inventory_product where  store_id=' . $value_transporters['store_id'] . ' and    warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id'])->fetchColumn();
							$amount_new = $amount_old - $value_product['num'];
							$db->query('UPDATE ' . TABLE . '_inventory_product SET amount_delivery=' . $amount_delivery_new . ', amount=' . $amount_new . ' where store_id=' . $value_transporters['store_id'] . ' and    warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id']);
							unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']][$key_product]);
							if (count($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']]) == 0) {
								unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']]);
							}
							if (count($_SESSION[$module_data . '_cart'][$value_transporters['store_id']]) == 0) {
								unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']]);
							}
							$list_product[] = $value_product;
						}
					}
				}
				$content_ip = 'Hiện có 1 đơn hàng mới vào thời gian ' . date('d/m/Y H:i', NV_CURRENTTIME);
				if (!empty($user_info)) {
					$db->query('INSERT INTO ' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $user_info['userid'] . ',' . $value_transporters['store_id'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"listorder")');
				} else {
					$db->query('INSERT INTO ' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,0,' . $value_transporters['store_id'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"listorder")');
				}
				$content = 'Đơn hàng mới được khởi tạo';
				if (!empty($user_info)) {
					$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',-1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
				} else {
					$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',-1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',0)');
				}

				// Gui mail thong bao den khach hang
				$data_order['id'] = $order_id;
				$info_order = get_info_order($order_id);
				$data_order['order_code'] = $order_code;
				$email_contents = call_user_func('email_new_order_payment', $data_order, $list_product, $info_order);
				$email_title = $lang_module['order_email_title'];
				nv_sendmail(array($global_config['site_name'], $global_config['site_email']), $order_email, sprintf($email_title, $order_code), $email_contents);

				// Gui mail thong bao den nhà bán hàng
				$data_order['id'] = $order_id;
				$info_order = get_info_order($order_id);
				$data_order['order_code'] = $order_code;
				$email_contents = call_user_func('email_new_order_payment', $data_order, $list_product, $info_order);
				$email_title = $lang_module['order_email_title'];
				nv_sendmail(array($global_config['site_name'], $global_config['site_email']), get_info_store($value_transporters['store_id'])['email'], sprintf($email_title, $order_code), $email_contents);
			}

			print_r(json_encode(array('status' => 'OK', 'mess' => 'Đặt hàng thành công', 'link' => nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main', true))));
			die();
		} else {
			if (!defined('NV_IS_USER')) {
				$contents1 = array(
					'status' => 'error',
					'mess' => 'Vui lòng đăng nhập để thực hiện chức năng thanh toán qua ví tiền'
				);
				print_r(json_encode($contents1));
				die();
			} else {
				$sql = 'SELECT money_total FROM ' . $db_config['prefix'] . '_' . 'wallet_money where userid=' . $user_info['userid'] . '';
				$sth = $db->prepare($sql);
				$sth->execute();
				$money_total_info = $sth->fetch();

				if ($total_full > $money_total_info['money_total']) {
					$contents1 = array(
						'status' => 'error',
						'mess' => 'Số tiền trong ví của bạn không đủ ( còn ' . number_format($money_total_info['money_total']) . ' VND ), không thể đặt hàng'
					);
					print_r(json_encode($contents1));
					die();
				} else {
					require_once NV_ROOTDIR . '/modules/wallet/wallet.class.php';
					$wallet = new nukeviet_wallet();
					$message = 'Thanh toán đơn hàng ngày ' . date('d/m/Y H:i');
					$checkUpdate = $wallet->update($total_full, 'VND', $user_info['userid'], $user_info['userid'], $message, false);

					$data = array(
						'modname' => 'retails',
						'id' => $checkUpdate,
						'url_back' => array(
							'op' => 'order'
						),
						'order_object' => $message,
						'order_name' => 'Thanh toán đơn hàng ngày ' . date('d/m/Y H:i'),
						'money_amount' => $total_full,
						'money_unit' => 'VND'
					);
					$wallet->getInfoPayment_site($data);
					foreach ($list_transporters as $value_transporters) {
						$check = $db->query('SELECT max(id) FROM ' . TABLE . '_order')->fetchColumn();
						if ($check == 0) {
							$order_code = $config_setting['raw_order_prefix'] . '00001';
						} else {
							$order_code = $config_setting['raw_order_prefix'] . '0000' . ($check + 1);
						}
						$sql = 'INSERT INTO ' . TABLE . '_order ( userid,order_code,store_id,warehouse_id,order_name,email,phone,province_id,district_id,ward_id,address,transporters_id,total_product,fee_transport,total,note,time_add,status,payment,total_weight,total_height,total_width,total_length,payment_method,lat,lng) VALUES (:userid,:order_code,:store_id,:warehouse_id,:order_name,:email,:phone,:province_id,:district_id,:ward_id,:address,:transporters_id,:total_product,:fee_transport,:total,:note,:time_add,0,:payment,:total_weight,:total_height,:total_width,:total_length,:payment_method,:lat,:lng)';

						$data_insert = array();
						$data_insert['order_code'] = $order_code;
						$data_insert['userid'] = $userid;
						$data_insert['store_id'] = $value_transporters['store_id'];
						$data_insert['warehouse_id'] = $value_transporters['warehouse_id'];
						$data_insert['order_name'] = $order_name;
						$data_insert['email'] = $order_email;
						$data_insert['phone'] = $order_phone;
						$data_insert['province_id'] = $province_id;
						$data_insert['district_id'] = $district_id;
						$data_insert['ward_id'] = $ward_id;
						$data_insert['address'] = $address;
						$data_insert['transporters_id'] = $value_transporters['transporters_id'];
						$data_insert['total_product'] = $value_transporters['total_product'];
						$data_insert['fee_transport'] = $value_transporters['fee'];
						$data_insert['total'] = $value_transporters['total_product'] + $value_transporters['fee'];
						$data_insert['note'] = $value_transporters['note_product'];
						$data_insert['time_add'] = NV_CURRENTTIME;
						$data_insert['total_weight'] = $value_transporters['total_weight'];
						$data_insert['total_height'] =  $value_transporters['total_height'];
						$data_insert['total_width'] = $value_transporters['total_width'];
						$data_insert['total_length'] = $value_transporters['total_length'];
						$data_insert['payment_method'] = $payment_method;
						$data_insert['lat'] = $lat;
						$data_insert['lng'] = $lng;
						$data_insert['payment'] = $total_full;

						$order_id = $db->insert_id($sql, 'id', $data_insert);
						if ($order_id > 0) {
							foreach ($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']] as $key_product => $value_product) {
								if ($value_product['status_check'] == 1) {
									$total_weight = $value_product['weight_product'] * get_info_unit_weight($value_product['weight_unit'])['exchange'] * $value_product['num'];
									$total_length = $value_product['length_product'] * get_info_unit_length($value_product['unit_length'])['exchange'] * $value_product['num'];
									$total_width = $value_product['width_product'] * get_info_unit_length($value_product['unit_width'])['exchange'] * $value_product['num'];
									$total_height = $value_product['height_product'] * get_info_unit_length($value_product['unit_height'])['exchange'] * $value_product['num'];
									$total_length = $value_product['length_product'] * get_info_unit_length($value_product['unit_length'])['exchange'] * $value_product['num'];
									$total = $value_product['price'] * $value_product['num'];
									$db->query('INSERT INTO ' . TABLE . '_order_item(order_id,product_id,weight,length,height,width,price,classify_value_product_id,quantity,total) VALUES(' . $order_id . ',' . $value_product['product_id'] . ',' . $total_weight . ',' . $total_length . ',' . $total_height . ',' . $total_width . ',' . $value_product['price'] . ',' . $value_product['classify_value_product_id'] . ',' . $value_product['num'] . ',' . $total . ')');
									$amount_delivery_old = $db->query('SELECT amount_delivery FROM ' . TABLE . '_inventory_product where  store_id=' . $value_transporters['store_id'] . ' and warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id'])->fetchColumn();
									$amount_delivery_new = $amount_delivery_old + $value_product['num'];
									$amount_old = $db->query('SELECT amount FROM ' . TABLE . '_inventory_product where  store_id=' . $value_transporters['store_id'] . ' and    warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id'])->fetchColumn();
									$amount_new = $amount_old - $value_product['num'];
									$db->query('UPDATE ' . TABLE . '_inventory_product SET amount_delivery=' . $amount_delivery_new . ', amount=' . $amount_new . ' where store_id=' . $value_transporters['store_id'] . ' and    warehouse_id=' . $value_transporters['warehouse_id'] . ' and product_id=' . $value_product['product_id'] . ' and classify_value_product_id=' . $value_product['classify_value_product_id']);
									unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']][$key_product]);
									if (count($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']]) == 0) {
										unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']][$value_transporters['warehouse_id']]);
									}
									if (count($_SESSION[$module_data . '_cart'][$value_transporters['store_id']]) == 0) {
										unset($_SESSION[$module_data . '_cart'][$value_transporters['store_id']]);
									}
									$list_product[] = $value_product;
								}
							}
						}
						$content_ip = 'Hiện có 1 đơn hàng mới vào thời gian ' . date('d/m/y H:i', NV_CURRENTTIME);
						if (!empty($user_info)) {
							$db->query('INSERT INTO ' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,' . $user_info['userid'] . ',' . $value_transporters['store_id'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"listorder")');
						} else {
							$db->query('INSERT INTO ' . $db_config['prefix'] . '_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES (' . $db->quote(NV_LANG_DATA) . ',1,' . $db->quote($module_name) . ',0,0,0,' . $value_transporters['store_id'] . ',' . $db->quote($content_ip) . ',' . NV_CURRENTTIME . ',' . $order_id . ',"listorder")');
						}
						$content = 'Đơn hàng mới được khởi tạo';
						if (!empty($user_info)) {
							$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',-1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',' . $user_info['userid'] . ')');
						} else {
							$db->query('INSERT INTO ' . TABLE . '_logs_order(order_id,status_id_old,content,time_add,user_add) VALUES(' . $order_id . ',-1,' . $db->quote($content) . ',' . NV_CURRENTTIME . ',0)');
						}

						// Gui mail thong bao den khach hang
						$data_order['id'] = $order_id;
						$info_order = get_info_order($order_id);
						$data_order['order_code'] = $order_code;
						$email_contents = call_user_func('email_new_order_payment', $data_order, $list_product, $info_order);
						$email_title = $lang_module['order_email_title'];
						nv_sendmail(array($global_config['site_name'], $global_config['site_email']), $order_email, sprintf($email_title, $order_code), $email_contents);

						// Gui mail thong bao den nhà bán hàng
						$data_order['id'] = $order_id;
						$info_order = get_info_order($order_id);
						$data_order['order_code'] = $order_code;
						$email_contents = call_user_func('email_new_order_payment', $data_order, $list_product, $info_order);
						$email_title = $lang_module['order_email_title'];
						nv_sendmail(array($global_config['site_name'], $global_config['site_email']), get_info_store($value_transporters['store_id'])['email'], sprintf($email_title, $order_code), $email_contents);
					}

					print_r(json_encode(array('status' => 'OK', 'mess' => 'Đặt hàng thành công', 'link' => nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main', true))));
					die();
				}
			}
		}
	} else {
		$contents1 = array(
			'status' => 'error_array',
			'error' => $error
		);
		print_r(json_encode($contents1));
		die;
	}
}
if ($mod == 'remove_cart') {
	$key_store = $nv_Request->get_int('key_store', 'get,post', 0);
	$key_product = $nv_Request->get_int('key_product', 'get,post', 0);
	$key_warehouse = $nv_Request->get_int('key_warehouse', 'get,post', 0);
	unset($_SESSION[$module_data . '_cart'][$key_store][$key_warehouse][$key_product]);
	if (count($_SESSION[$module_data . '_cart'][$key_store][$key_warehouse]) == 0) {
		unset($_SESSION[$module_data . '_cart'][$key_store][$key_warehouse]);
	}
	if (count($_SESSION[$module_data . '_cart'][$key_store]) == 0) {
		unset($_SESSION[$module_data . '_cart'][$key_store]);
	}
	print_r(json_encode(array('STATUS' => 'OK')));
	die();
}
if ($mod == 'update_cart') {
	$key_store = $nv_Request->get_int('key_store', 'get,post', 0);
	$key_product = $nv_Request->get_int('key_product', 'get,post', 0);
	$quantity = $nv_Request->get_int('quantity', 'get,post', 0);
	$key_warehouse = $nv_Request->get_int('key_warehouse', 'get,post', 0);
	$_SESSION[$module_data . '_cart'][$key_store][$key_warehouse][$key_product]['num'] = $quantity;
	print_r(json_encode(array('STATUS' => 'OK')));
	die();
}
if ($mod == 'update_status_check') {
	$key_store = $nv_Request->get_int('key_store', 'get,post', 0);
	$key_product = $nv_Request->get_int('key_product', 'get,post', 0);
	$key_warehouse = $nv_Request->get_int('key_warehouse', 'get,post', 0);
	$status_check = $nv_Request->get_int('status_check', 'get,post', 0);
	$_SESSION[$module_data . '_cart'][$key_store][$key_warehouse][$key_product]['status_check'] = $status_check;

	print_r(json_encode(array('STATUS' => 'OK')));
	die();
}
if ($mod == 'add_cart') {
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'get,post', 0);
	$classify_id_value1 = $nv_Request->get_int('classify_id_value1', 'get,post', 0);
	$classify_id_value2 = $nv_Request->get_int('classify_id_value2', 'get,post', 0);
	if ($classify_id_value1 == 0) {
		$classify_value_product_id = 0;
	} else {
		$classify_value_product_id = get_info_classify_value_product_classify_id_value1_classify_id_value2($classify_id_value1, $classify_id_value2)['id'];
	}
	$product_id = $nv_Request->get_int('product_id', 'get,post', 0);
	$weight = get_info_product($product_id)['weight_product'];
	$price = $nv_Request->get_int('price', 'get,post', 0);
	$quantity = $nv_Request->get_int('quantity', 'get,post', 0);
	if (empty($_SESSION[$module_data . '_cart'])) {
		$product_cart[get_info_product($product_id)['store_id']][$warehouse_id][] = array(
			'product_id' => $product_id,
			'num' => $quantity,
			'price' => $price,
			'classify_value_product_id' => $classify_value_product_id,
			'weight_product' => get_info_product($product_id)['weight_product'],
			'weight_unit' => get_info_product($product_id)['unit_weight'],
			'length_product' => get_info_product($product_id)['length_product'],
			'unit_length' => get_info_product($product_id)['unit_length'],
			'width_product' => get_info_product($product_id)['width_product'],
			'unit_width' => get_info_product($product_id)['unit_width'],
			'height_product' => get_info_product($product_id)['height_product'],
			'unit_height' => get_info_product($product_id)['unit_height'],
			'status_check' => 1
		);
		$_SESSION[$module_data . '_cart'] = $product_cart;
	} else {
		if (empty($_SESSION[$module_data . '_cart'][get_info_product($product_id)['store_id']])) {
			$_SESSION[$module_data . '_cart'][get_info_product($product_id)['store_id']][$warehouse_id][] = array(
				'product_id' => $product_id,
				'num' => $quantity,
				'price' => $price,
				'classify_value_product_id' => $classify_value_product_id,
				'weight_product' => get_info_product($product_id)['weight_product'],
				'weight_unit' => get_info_product($product_id)['unit_weight'],
				'length_product' => get_info_product($product_id)['length_product'],
				'unit_length' => get_info_product($product_id)['unit_length'],
				'width_product' => get_info_product($product_id)['width_product'],
				'unit_width' => get_info_product($product_id)['unit_width'],
				'height_product' => get_info_product($product_id)['height_product'],
				'unit_height' => get_info_product($product_id)['unit_height'],
				'status_check' => 1
			);
		} else {
			$exist = 0;
			if (empty($_SESSION[$module_data . '_cart'][get_info_product($product_id)['store_id']][$warehouse_id])) {
				$_SESSION[$module_data . '_cart'][get_info_product($product_id)['store_id']][$warehouse_id][] = array(
					'product_id' => $product_id,
					'num' => $quantity,
					'price' => $price,
					'classify_value_product_id' => $classify_value_product_id,
					'weight_product' => get_info_product($product_id)['weight_product'],
					'weight_unit' => get_info_product($product_id)['unit_weight'],
					'length_product' => get_info_product($product_id)['length_product'],
					'unit_length' => get_info_product($product_id)['unit_length'],
					'width_product' => get_info_product($product_id)['width_product'],
					'unit_width' => get_info_product($product_id)['unit_width'],
					'height_product' => get_info_product($product_id)['height_product'],
					'unit_height' => get_info_product($product_id)['unit_height'],
					'status_check' => 1
				);
			} else {
				foreach ($_SESSION[$module_data . '_cart'] as $key_store => $value_store) {
					foreach ($value_store as $key_warehouse => $value_warehouse) {
						foreach ($value_warehouse as $key_product => $value) {
							if ($value['product_id'] == $product_id && $value['classify_value_product_id'] == $classify_value_product_id) {
								$value['num'] = $value['num'] + $quantity;
								$_SESSION[$module_data . '_cart'][$key_store][$key_warehouse][$key_product] = $value;
								$exist = 1;
							}
						}
					}
				}
				if ($exist == 0) {
					$_SESSION[$module_data . '_cart'][get_info_product($product_id)['store_id']][$warehouse_id][] = array(
						'product_id' => $product_id,
						'num' => $quantity,
						'price' => $price,
						'classify_value_product_id' => $classify_value_product_id,
						'weight_product' => get_info_product($product_id)['weight_product'],
						'weight_unit' => get_info_product($product_id)['unit_weight'],
						'length_product' => get_info_product($product_id)['length_product'],
						'unit_length' => get_info_product($product_id)['unit_length'],
						'width_product' => get_info_product($product_id)['width_product'],
						'unit_width' => get_info_product($product_id)['unit_width'],
						'height_product' => get_info_product($product_id)['height_product'],
						'unit_height' => get_info_product($product_id)['unit_height'],
						'status_check' => 1
					);
				}
			}
		}
	}
	print_r(json_encode(array('STATUS' => 'OK')));
	die();
}
if ($mod == 'load_selling_product') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_selling_product&catid=' . $categories_id;
	$per_page = $cat_info['numlinks'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.inhome=1 and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.number_order DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'load_selling_product_shops') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$store_id = $nv_Request->get_string('store_id', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_selling_product_shops&catid=' . $categories_id . '&store_id=' . $store_id;
	$per_page = $cat_info['numlinks'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.inhome=1 and t1.store_id=' . $store_id . ' and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.number_order DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main_shop($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}

if ($mod == 'load_new_product') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_new_product&catid=' . $categories_id;
	$per_page = $cat_info['numlinks'];

	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.inhome=1 and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.time_add DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'load_new_product_shops') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$store_id = $nv_Request->get_string('store_id', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_new_product_shops&catid=' . $categories_id . '&store_id=' . $store_id;
	$per_page = $cat_info['numlinks'];

	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.store_id=' . $store_id . ' and t1.inhome=1 and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.time_add DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main_shop($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'load_price_product') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_price_product&catid=' . $categories_id;
	$per_page = $cat_info['numlinks'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.inhome=1 and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.price_min ASC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'load_price_product_shops') {
	$categories_id = $nv_Request->get_string('catid', 'get,post', 0);
	$store_id = $nv_Request->get_string('store_id', 'get,post', 0);
	$cat_info = get_info_category($categories_id);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_price_product_shops&catid=' . $categories_id . '&store_id=' . $store_id;
	$per_page = $cat_info['numlinks'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product t1')
		->join('INNER JOIN ' . TABLE . '_categories t2 ON t2.id=t1.categories_id')
		->where('(t2.id=' . $categories_id . ' OR t2.parrent_id=' . $categories_id . ') and t1.store_id=' . $store_id . ' and t1.inhome=1 and t1.status=1');

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('t1.*')
		->order('t1.price_min ASC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_main_shop($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'load_product_category_viewcat') {
	$catid = $nv_Request->get_string('category_id', 'get,post', '');
	$cat_info = get_info_category($catid);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_product_category_viewcat&category_id=' . $catid;
	$per_page = $cat_info['numlinks'];
	$page = $nv_Request->get_int('page', 'post,get', 1);

	$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_product')
		->where('categories_id=' . $catid . ' and status=1');
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();
	$db->select('*')
		->order('weight DESC')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_retailshops_viewcat_ajax_type_product($sth, $per_page, $page, $num_items, $cat_info, $base_url);
	echo nv_site_theme($contents, false);
	die;
}
if ($mod == 'get_province') {
	$q = $nv_Request->get_string('q', 'post', '');
	$list_location = get_province_select2($q);
	foreach ($list_location as $result) {
		$json[] = ['id' => $result['provinceid'], 'text' => $result['title']];
	}
	print_r(json_encode($json));
	die();
}
if ($mod == 'get_district') {
	$q = $nv_Request->get_string('q', 'post', '');
	$provinceid = $nv_Request->get_string('provinceid', 'post', '');
	$list_location = get_district_select2($q, $provinceid);
	foreach ($list_location as $result) {
		$json[] = ['id' => $result['districtid'], 'text' => $result['title']];
	}
	print_r(json_encode($json));
	die();
}
if ($mod == 'get_ward') {
	$q = $nv_Request->get_string('q', 'post', '');
	$districtid = $nv_Request->get_string('districtid', 'post', '');
	$list_location = get_ward_select2($q, $districtid);
	foreach ($list_location as $result) {
		$json[] = ['id' => $result['wardid'], 'text' => $result['title']];
	}
	print_r(json_encode($json));
	die();
}
if ($mod == 'get_transport_fee_viettelpost') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$province_id_viettelpost_receive = get_info_province($province_id)['vtpid'];
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$district_id_viettelpost_receive = get_info_district($district_id)['vtpid'];
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$province_id_viettelpost_send = get_info_province($info_warehouse['province_id'])['vtpid'];
	$district_id_viettelpost_send = get_info_district($info_warehouse['district_id'])['vtpid'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$fee = get_price_viettelpost($total, $total, $code_transporters, $province_id_viettelpost_send, $district_id_viettelpost_send, $province_id_viettelpost_receive, $district_id_viettelpost_receive, 'HH', 1, $weight_product, $width_product, $height_product, $length_product);
	if ($fee['error'] == 1) {
		$tranposter_fee = -1;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['data']['MONEY_TOTAL'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['data']['MONEY_TOTAL'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}

if ($mod == 'get_transport_fee_ghn') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$ward_id = $nv_Request->get_int('ward_id', 'get,post', 0);
	$ward_id_ghn_receive = get_info_ward($ward_id)['ghnid'];
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$district_id_ghn_receive = get_info_district($district_id)['ghnid'];
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$province_id_ghn_send = get_info_province($info_warehouse['province_id'])['ghnid'];
	$district_id_ghn_send = get_info_district($info_warehouse['district_id'])['ghnid'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$shop_id = $info_warehouse['shops_id_ghn'];
	$fee = get_price_ghn($code_transporters, $shop_id, $district_id_ghn_receive, $ward_id_ghn_receive, $height_product, $length_product, $weight_product, $width_product, $total);
	if (empty($fee)) {
		$tranposter_fee = 0;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['data']['total'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['data']['total'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}
if ($mod == 'get_transport_fee_ghtk') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$province_id_ghtk_receive = get_info_province($province_id)['title'];
	$ward_id = $nv_Request->get_int('ward_id', 'get,post', 0);
	if ($ward_id > 0) {
		$ward_id_ghtk_receive = get_info_ward($ward_id)['title'];
	}
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$district_id_ghtk_receive = get_info_district($district_id)['title'];
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$province_id_ghtk_send = get_info_province($info_warehouse['province_id'])['title'];
	$district_id_ghtk_send = get_info_district($info_warehouse['district_id'])['title'];
	$ward_id_ghtk_send = get_info_ward($info_warehouse['ward_id'])['title'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$shop_id = $info_warehouse['shops_id_ghn'];
	if ($ward_id > 0) {
		$fee = get_price_ghtk('', $province_id_ghtk_send, $ward_id_ghtk_send, $ward_id_ghtk_send, '', $province_id_ghtk_receive, $district_id_ghtk_receive, $ward_id_ghtk_receive, $weight_product, $total);
	} else {
		$fee = get_price_ghtk('', $province_id_ghtk_send, $ward_id_ghtk_send, $ward_id_ghtk_send, '', $province_id_ghtk_receive, $district_id_ghtk_receive, '', $weight_product, $total);
	}
	if (empty($fee)) {
		$tranposter_fee = 0;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['fee']['fee'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['fee']['fee'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}
if ($mod == 'get_transport_fee_ahamove_order') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$ward_id = $nv_Request->get_int('ward_id', 'get,post', 0);
	$address = $nv_Request->get_string('address', 'get,post', '');
	$lat = $nv_Request->get_int('lat', 'get,post', 0);
	$lng = $nv_Request->get_int('lng', 'get,post', 0);
	if ($address != '') {
		$address_receive = $address . ' ,' . get_info_ward($ward_id)['type'] . ' ' . get_info_ward($ward_id)['title'] . ', ' . get_info_district($district_id)['type'] . ' ' . get_info_district($district_id)['title'] . ', ' . get_info_province($province_id)['type'] . ' ' . get_info_province($province_id)['title'];
	} else {
		$address_receive = get_info_ward($ward_id)['type'] . ' ' . get_info_ward($ward_id)['title'] . ', ' . get_info_district($district_id)['type'] . ' ' . get_info_district($district_id)['title'] . ', ' . get_info_province($province_id)['type'] . ' ' . get_info_province($province_id)['title'];
	}
	$token = $nv_Request->get_title('token_ahamove', 'get,post', '');
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$lat_send = $info_warehouse['lat'];
	$lng_send = $info_warehouse['lng'];

	$address_send = $info_warehouse['address'] . ',' . get_info_ward($info_warehouse['ward_id'])['type'] . ' ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['type'] . ' ' . get_info_province($info_warehouse['province_id'])['title'];
	$name_send = $info_warehouse['name_send'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$fee = get_price_ahamove($token, $lat_send, $lng_send, $address_send, $address_send, $name_send, $lat, $lng, $address_receive, '', $code_transporters);

	if (empty($fee['total_pay'])) {
		$tranposter_fee = -1;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['total_pay'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['total_pay'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}
if ($mod == 'get_transport_fee_ahamove') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$ward_id = $nv_Request->get_int('ward_id', 'get,post', 0);
	$token = $nv_Request->get_title('token_ahamove', 'get,post', '');
	if ($ward_id > 0) {
		$lat_receive = get_info_ward($ward_id)['lat'];
		$lng_receive = get_info_ward($ward_id)['lng'];
		$address_receive = get_info_ward($ward_id)['type'] . ' ' . get_info_ward($ward_id)['title'] . ', ' . get_info_district($district_id)['type'] . ' ' . get_info_district($district_id)['title'] . ', ' . get_info_province($province_id)['type'] . ' ' . get_info_province($province_id)['title'];
	} else {
		$lat_receive = get_info_district($district_id)['lat'];
		$lng_receive = get_info_district($district_id)['lng'];
		$address_receive = get_info_district($district_id)['title'] . ', ' . get_info_province($province_id)['type'] . ' ' . get_info_province($province_id)['title'];
	}
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$lat_send = $info_warehouse['lat'];
	$lng_send = $info_warehouse['lng'];
	$address_send = $info_warehouse['address'] . ',' . get_info_ward($info_warehouse['ward_id'])['type'] . ' ' . get_info_ward($info_warehouse['ward_id'])['title'] . ', ' . get_info_district($info_warehouse['district_id'])['title'] . ', ' . get_info_province($info_warehouse['province_id'])['type'] . ' ' . get_info_province($info_warehouse['province_id'])['title'];
	$name_send = $info_warehouse['name_send'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$fee = get_price_ahamove($token, $lat_send, $lng_send, $address_send, $address_send, $name_send, $lat_receive, $lng_receive, $address_receive, '', $code_transporters);

	if (empty($fee['total_pay'])) {
		$tranposter_fee = -1;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['total_pay'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['total_pay'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}

if ($mod == 'check_khaigia') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', 0);
	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$row = get_info_order($order_id);

	//print_r($store_id);die;
	// $info_order['status'] == 1 đơn hàng đã xác nhận 
	// $info_order['status_payment_vnpay'] == 1 đơn hàng đã thanh toán

	if (($row['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($row['status_payment_vnpay'] == 0) or ($row['status'] != 1)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$weight_product = $row['total_weight'];
	$length_product = $row['total_length'];

	$width_product = $row['total_width'];

	$height_product = $row['total_height'];

	$total = $row['total_product'];

	$province_id = $row['province_id'];
	$province_id_vnpost_receive = get_info_province($province_id)['vnpostid'];

	$district_id = $row['district_id'];
	$district_id_vnpost_receive = get_info_district($district_id)['vnpostid'];

	$warehouse_id = $row['warehouse_id'];
	$info_warehouse = get_info_warehouse($warehouse_id);

	$province_id_vnpost_send = get_info_province($info_warehouse['province_id'])['vnpostid'];
	$district_id_vnpost_send = get_info_district($info_warehouse['district_id'])['vnpostid'];

	$transporters_id = $row['transporters_id'];

	if ($transporters_id == 5) {
		$weight_quydoi = ($length_product * $width_product * $height_product) / 5000;
	} else {
		$weight_quydoi = ($length_product * $width_product * $height_product) / 6000;
	}
	if ($weight_product <= ceil($weight_quydoi) * 1000) {
		$weight_quydoi2 = $weight_product;
	} else {
		$weight_quydoi2 = ceil($weight_quydoi) * 1000;
	}
	$Dichvucongthem[] = array(
		'DichVuCongThemId' => 1,
		'TrongLuongQuyDoi' => $weight_quydoi2,
		'SoTienTinhCuoc' => $row['total_product'],
		'MaTinhGui' => $province_id_vnpost_send,
		'MaTinhNhan' => $district_id_vnpost_send
	);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$fee = get_price_vnpost($code_transporters, $province_id_vnpost_send, $district_id_vnpost_send, $province_id_vnpost_receive, $district_id_vnpost_receive, false, $Dichvucongthem, $length_product, $width_product, $height_product, $weight_product);
	if (empty($fee)) {
		$tranposter_fee = 0;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['TongCuocDichVuCongThem'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['TongCuocDichVuCongThem'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
		$mod = $tranposter_fee % 1000;
		if ($mod > 0) {
			$thuong = ceil($tranposter_fee / 1000);
			$tranposter_fee = $thuong * 1000;
		}
	}

	print_r(json_encode($tranposter_fee));
	die;
}

if ($mod == 'check_khaigia_ghn') {
	$order_id = $nv_Request->get_int('order_id', 'get,post', '');
	if (!$order_id) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}
	$info_order = get_info_order($order_id);

	if (($info_order['store_id'] != $store_id) or (!isset($store_id)) or (!defined('NV_IS_USER')) or ($info_order['status_payment_vnpay'] == 0) or ($info_order['status'] != 1)) {
		print_r(json_encode(array('status' => 'ERROR')));
		die();
	}

	$ward_id_ghn_receive = get_info_ward($info_order['ward_id'])['ghnid'];
	$district_id_ghn_receive = get_info_district($info_order['district_id'])['ghnid'];
	$info_warehouse = get_info_warehouse_store($info_order['store_id']);

	$province_id_ghn_send = get_info_province($info_warehouse['province_id'])['ghnid'];
	$district_id_ghn_send = get_info_district($info_warehouse['district_id'])['ghnid'];
	$shop_id = $info_warehouse['shops_id_ghn'];
	$max = (int)$config_setting['max_price_ghn'];
	if ($info_order['total_product'] >= $max) {
		$info_order['total_product'] = $max;
	}
	$fee = get_price_ghn_2(2, $shop_id, $district_id_ghn_receive, $ward_id_ghn_receive, $info_order['total_height'], $info_order['total_length'], $info_order['total_weight'], $info_order['total_width'], $info_order['total_product'], $district_id_ghn_send);

	print_r(json_encode($fee['data']['insurance_fee']));
	die;
}

if ($mod == 'get_transport_fee_vnpost') {
	$weight_product = $nv_Request->get_int('weight', 'get,post', 0);
	$length_product = $nv_Request->get_int('length', 'get,post', 0);
	$width_product = $nv_Request->get_int('width', 'get,post', 0);
	$height_product = $nv_Request->get_int('height', 'get,post', 0);
	$total = $nv_Request->get_int('total', 'get,post', 0);
	$province_id = $nv_Request->get_int('province_id', 'get,post', 0);
	$province_id_vnpost_receive = get_info_province($province_id)['vnpostid'];
	$district_id = $nv_Request->get_int('district_id', 'get,post', 0);
	$district_id_vnpost_receive = get_info_district($district_id)['vnpostid'];
	$warehouse_id = $nv_Request->get_int('shops_id', 'get,post', 0);
	$info_warehouse = get_info_warehouse($warehouse_id);
	$province_id_vnpost_send = get_info_province($info_warehouse['province_id'])['vnpostid'];
	$district_id_vnpost_send = get_info_district($info_warehouse['district_id'])['vnpostid'];
	$transporters_id = $nv_Request->get_int('transporters_id', 'get,post', 0);
	if ($transporters_id == 5) {
		$weight_quydoi = ($length_product * $width_product * $height_product) / 5000;
	} else {
		$weight_quydoi = ($length_product * $width_product * $height_product) / 6000;
	}
	if ($weight_product <= ceil($weight_quydoi) * 1000) {
		$weight_quydoi2 = $weight_product;
	} else {
		$weight_quydoi2 = ceil($weight_quydoi) * 1000;
	}
	$Dichvucongthem[] = array(
		'DichVuCongThemId' => 3,
		'TrongLuongQuyDoi' => $weight_quydoi2,
		'SoTienTinhCuoc' => 2500000,
		'MaTinhGui' => $province_id_vnpost_send,
		'MaTinhNhan' => $district_id_vnpost_send
	);
	$code_transporters = get_info_transporters($transporters_id)['code_transporters'];
	$fee = get_price_vnpost($code_transporters, $province_id_vnpost_send, $district_id_vnpost_send, $province_id_vnpost_receive, $district_id_vnpost_receive, true, $Dichvucongthem, $length_product, $width_product, $height_product, $weight_product);
	if (empty($fee)) {
		$tranposter_fee = 0;
	} else {
		if (get_info_transporters($transporters_id)['type'] == 0) {
			$tranposter_fee = $fee['TongCuocBaoGomDVCT'] + get_info_transporters($transporters_id)['money'];
		} else {
			$tranposter_fee = $fee['TongCuocBaoGomDVCT'] - get_info_transporters($transporters_id)['money'];
			if ($tranposter_fee < 0) {
				$tranposter_fee = 0;
			}
		}
	}
	print_r(json_encode($tranposter_fee));
	die;
}
if ($mod == 'tonkho') {
	$product_id = $nv_Request->get_int('product_id', 'get,post', 0);
	$warehouse_id = $nv_Request->get_int('warehouse_id', 'get,post', 0);
	$classify_id_value1 = $nv_Request->get_int('classify_id_value1', 'get,post', 0);
	$classify_id_value2 = $nv_Request->get_int('classify_id_value2', 'get,post', 0);
	if ($classify_id_value1 == 0) {
		$info_product = array();
	} else {
		$info_product = get_info_classify_value_product_classify_id_value1_classify_id_value2($classify_id_value1, $classify_id_value2);
	}
	$store_id = get_info_product($product_id)['store_id'];
	if (count($info_product) > 0) {
		if (get_info_classify_value_product_classify_id_value1_classify_id_value2($classify_id_value1, $classify_id_value2)['status'] == 1) {

			$number_product = get_info_invetory_group($product_id, $warehouse_id, $info_product['id'])['amount'];
		} else {
			$number_product = -1;
		}
	} else {
		$number_product = get_info_invetory_no($product_id, $warehouse_id)[0]['amount'];
	}
	if (!empty($_SESSION[$module_name . '_cart'][$store_id][$warehouse_id])) {
		foreach ($_SESSION[$module_name . '_cart'][$store_id][$warehouse_id] as $value_session_cart) {
			if ($value_session_cart['product_id'] == $product_id && $value_session_cart['classify_value_product_id'] == $info_product['id']) {
				$number_product = $number_product - $value_session_cart['num'];
			}
		}
	}
	if (empty($number_product)) {
		$number_product = 0;
	}

	print_r(
		json_encode(
			array(
				'status' => 'OK',
				'name_warehouse' => get_info_warehouse($warehouse_id)['name_warehouse'],
				'number_product' => $number_product
			)
		)
	);
	die();
}
