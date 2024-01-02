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
$mod = $nv_Request->get_title('mod', 'get', '');


$id = $nv_Request->get_title('id', 'post,get');
if ($id == 0) {
	echo '<script language="javascript">';
	echo 'alert("Chưa tìm thấy đơn hàng nào");window.location = "' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=listorder', true) . '"';
	echo '</script>';
}

check_store_order_id($id, $store_id);

$info_order = get_info_order($id);
// thông tin tài khoản mua hàng
$info_customer = get_info_user($info_order['userid']);
$info_order['customer_name'] = $info_customer['last_name'];

if ($info_customer['photo']) {
	$info_order['photo_customer']  = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . $info_customer['photo'];
} else {
	$info_order['photo_customer'] = NV_BASE_SITEURL . NV_FILES_DIR . '/no_img.png';
}


$info_order['shop_id'] = get_info_store($info_order['store_id'])['userid'];


$info_order['status1'] = $info_order['status'];
$info_order['transporters_name'] = get_info_transporters($info_order['transporters_id'])['name_transporters'];

if($info_order['transporters_id'] == 0){
	$info_order['transporters_name'] = $lang_module['tranposter_tugiao'];
}


$info_order['status']=get_info_order_status($info_order['status'])['name'];
$info_order['total_product']=number_format($info_order['total_product']);
$info_order['total']=number_format($info_order['total']);
$info_order['fee_transport']=number_format($info_order['fee_transport']);
$info_order['voucher_price_shop']=number_format($info_order['voucher_price_shop']);

$info_order['address'] = $info_order['address'];
$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
	->select('COUNT(*)')
	->from('' . TABLE . '_order_item t1')
	->join('INNER JOIN ' . TABLE . '_product t2 ON t1.product_id = t2.id')
	->where('t1.order_id=' . $id);

$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('t1.*,t2.name_product, t2.alias, t2.id as id_product,t2.barcode, t2.image')
	->order('t1.id DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();
$list_logs_order = $db->query('SELECT * FROM ' . TABLE . '_logs_order where order_id=' . $id)->fetchAll();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

$xtpl->assign('UPLOAD_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=upload&token=' . md5($nv_Request->session_id . $global_config['sitekey']));
$array_config['maxfilesize'] = 10485760;
$array_config['image_upload_size'] = 10485760;
$xtpl->assign('MAXFILESIZEULOAD', $array_config['maxfilesize']);
$xtpl->assign('MAXIMAGESIZEULOAD', explode('x', $array_config['image_upload_size']));
$xtpl->assign('MAXFILESIZE', nv_convertfromBytes($array_config['maxfilesize']));
$xtpl->assign('UPLOAD_IMG_SIZE', $array_config['image_upload_size']);
$xtpl->assign('UPLOAD_DIR', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_name);
$xtpl->assign('MODULE_FILE', $module_name);
$xtpl->assign('COUNT', 0);
$xtpl->assign('COUNT_UPLOAD', 9);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);

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
$xtpl->assign('back_link', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ordercustomer', true));

if ($info_order['payment']) {
	$info_order['status_payment'] = 'Đã thanh toán';
} else {
	$info_order['status_payment'] = 'Chưa thanh toán';
}

$info_order['payment_method_name'] = $global_payport[$info_order['payment_method']]['paymentname'];

$xtpl->assign('info_order', $info_order);
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
if (!empty($q)) {
	$base_url .= '&q=' . $q;
}

$tamtinh = 0;

while ($view = $sth->fetch()) {

	$view['number'] = $number++;
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
		$view['name_group'] = '( ' . $name_group . ' )';
	}
	$tamtinh = $tamtinh + $view['total'];
	$view['total'] = number_format($view['total']);
	$view['price'] = number_format($view['price']);
	$view['quantity'] = number_format($view['quantity']);

	if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
		$view['image']  = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
	} else {
		$server = 'banhang.' . $_SERVER["SERVER_NAME"];
		$view['image']  = 'https://' . $server . NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
	}

	$view['alias_product'] = $_SERVER["chonhagiau"] . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $view['alias'] . '-' . $view['id_product'], true);


	$xtpl->assign('VIEW', $view);
	$xtpl->parse('main.view.loop');
	$list_product[] = $view;
}
if($info_order['voucher_id_shop']){
	$xtpl->parse( 'main.view.voucher_shop' );
}
$tamtinh=number_format($tamtinh);

$xtpl->assign('tamtinh', $tamtinh);

if (!empty($info_order['shipping_code'])) {
	if ($info_order['transporters_id'] == 4 || $info_order['transporters_id'] == 5) {

		$list_tracuu = check_info_order_vnpost_history($info_order['shipping_code']);

		foreach ($list_tracuu as $value) {

			$value['status_vnpost'] = $global_status_vnpost[$value['status_vnpost']]['name_status_vnpost'];
			$value['addtime'] = date('d/m/Y - H:i', $value['addtime']);
			$xtpl->assign('LOOP_TRACUU', $value);

			$xtpl->parse('main.vnpost');
		}
	} elseif ($info_order['transporters_id'] == 3) {
		$time_line = time_line_ghn($info_order['shipping_code']);
		foreach ($time_line as $index => $value) {
			if ($index == 0) {
				$xtpl->assign('time_line_active', 'secondary_text');
			} else {
				$xtpl->assign('time_line_active', '');
			}
			$value['status'] = $global_status_order_ghn[$value['status']]['name'];

			$value['time_add'] = date('H:i - d/m/Y', $value['time_add']);
			if ($value['warehouse']) {
				$value['warehouse'] = ' - ' . $value['warehouse'];
			}
			$xtpl->assign('LOOP_GHN', $value);

			$xtpl->parse('main.GHN');
		}
	} elseif ($info_order['transporters_id'] == 2) {
		$time_line = time_line_ghtk($info_order['shipping_code']);

		foreach ($time_line as $index => $value) {

			if ($index == 0) {
				$xtpl->assign('time_line_active', 'secondary_text');
			} else {
				$xtpl->assign('time_line_active', '');
			}
			$value['status_id'] = $global_status_order_ghtk[$value['status_id']]['name'];
			$value['time_add'] = date('H:i - d/m/Y', $value['time_add']);
			if ($value['reason_code']) {
				$value['reason'] = ' - ' . $global_status_order_error_ghtk[$value['reason_code']]['title'];
			}

			$xtpl->assign('LOOP_GHTK', $value);
			$xtpl->parse('main.GHTK');
		}
	}
}

$xtpl->parse('main.view');
$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['vieworder'] . ' ' . $info_order['order_code'];
$array_mod_title[] = array(
	'catid' => 0,
	'title' => $lang_module['list_order'],
	'link' => NV_MY_DOMAIN . '/' . $module_name . '/listorder/'
);
$array_mod_title[] = array(
	'catid' => 0,
	'title' => $page_title,
	'link' => nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=vieworder&amp;id=' . $id . '&store_id=' . $store_id . '&warehouse_id=' . $warehouse_id, true)
);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
