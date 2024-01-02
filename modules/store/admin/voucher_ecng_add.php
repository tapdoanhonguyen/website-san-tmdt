<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 05 Oct 2021 01:02:53 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$row = array();
$error = array();
$row['userid'] = $admin_info['admin_id'];
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
$mod = $nv_Request->get_title('mod', 'post, get', '');
$arr_key = array();
$arr_key[] = 'voucher_name';
$arr_key[] = 'voucher_code';
$arr_key[] = 'time_from';
$arr_key[] = 'time_to';
$arr_key[] = 'type';
$arr_key[] = 'type_discount';
if ($mod == 'submit') {
    $row['voucher_name'] = $nv_Request->get_title('voucher_name', 'post, get', '');
    $row['voucher_code'] = $nv_Request->get_title('voucher_code', 'post, get', '');

    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('time_from', 'post, get'), $m)) {
        $_hour = 0;
        $_min = 0;
        $row['time_from'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    } else {
        $row['time_from'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('time_to', 'post, get'), $m)) {
        $_hour = 0;
        $_min = 0;
        $row['time_to'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    } else {
        $row['time_to'] = 0;
    }
    $row['image'] = $nv_Request->get_title('image', 'post, get', '');
    $row['category'] = $nv_Request->get_int('category', 'post, get', '');
    $row['brand'] = $nv_Request->get_int('brand', 'post, get', '');
    $row['type'] = $nv_Request->get_int('voucher_type', 'post, get', '');
    $row['type_discount'] = $nv_Request->get_int('type_discount', 'post, get', '');
    $row['discount_rate'] = $nv_Request->get_int('discount_rate', 'post, get', '');
    $row['discount_price'] = str_replace(',', '', $nv_Request->get_int('discount_price', 'post, get', ''));
    $row['discount_percent'] = $nv_Request->get_int('discount_percent', 'post, get', '');
    $row['maximum_discount'] = str_replace(',', '', $nv_Request->get_int('maximum_discount', 'post, get', ''));
    $row['minimum_price'] = str_replace(',', '', $nv_Request->get_int('minimum_price', 'post, get', ''));
    $row['usage_limit_quantity'] = str_replace(',', '', $nv_Request->get_int('usage_limit_quantity', 'post, get', 0));
    $row['product'] = $nv_Request->get_array('product', 'get, post', '0');
    $row['product'] = implode(',', $row['product']);

    foreach ($arr_key as $key) {
        if ($row[$key] === '') {
            $err[] = $key . ' null!';
        }
    }

    if ($err) {
        $arr = array('status' => 'ERROR', 'mes' => implode(', ', $err));
        print_r(json_encode($arr));
        die();
    }

    $check = $db->query('SELECT id FROM ' . TABLE . '_voucher_ecng WHERE voucher_code = "' . $row['voucher_code'] . '" AND id != '. $row['id'])->fetchColumn();
    if ($check) {
        $arr = array('status' => 'ERROR', 'mes' => 'Mã voucher đã tồn tại!');
        print_r(json_encode($arr));
        die();
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_voucher_ecng (userid, voucher_name, voucher_code, image, time_from, time_to, type_discount, discount_percent, discount_price, minimum_price, maximum_discount, usage_limit_quantity, time_add, status, type, category, brand, product) VALUES (:userid, :voucher_name, :voucher_code, :image, :time_from, :time_to, :type_discount, :discount_percent, :discount_price, :minimum_price, :maximum_discount, :usage_limit_quantity, :time_add, :status, :type, :category, :brand, :product)');

                $row['time_add'] = NV_CURRENTTIME;
                $stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);
                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);
            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_voucher_ecng SET voucher_name = :voucher_name, voucher_code = :voucher_code, image = :image, time_from = :time_from, time_to = :time_to, type_discount = :type_discount, discount_percent = :discount_percent, discount_price = :discount_price, minimum_price = :minimum_price, maximum_discount = :maximum_discount, usage_limit_quantity = :usage_limit_quantity, type = :type, category = :category, brand = :brand, product = :product, time_edit = :time_edit, user_edit = :user_edit  WHERE id=' . $row['id']);

                $row['time_edit'] = NV_CURRENTTIME;
                $stmt->bindParam(':time_edit', $row['time_edit'], PDO::PARAM_INT);
                $stmt->bindParam(':user_edit', $row['userid'], PDO::PARAM_INT);
            }

            $stmt->bindParam(':voucher_name', $row['voucher_name'], PDO::PARAM_STR);
            $stmt->bindParam(':voucher_code', $row['voucher_code'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
            $stmt->bindParam(':time_from', $row['time_from'], PDO::PARAM_INT);
            $stmt->bindParam(':time_to', $row['time_to'], PDO::PARAM_INT);
            $stmt->bindParam(':type_discount', $row['type_discount'], PDO::PARAM_INT);
            $stmt->bindParam(':discount_percent', $row['discount_percent'], PDO::PARAM_INT);
            $stmt->bindParam(':discount_price', $row['discount_price'], PDO::PARAM_STR);
            $stmt->bindParam(':minimum_price', $row['minimum_price'], PDO::PARAM_STR);
            $stmt->bindParam(':maximum_discount', $row['maximum_discount'], PDO::PARAM_STR);
            $stmt->bindParam(':usage_limit_quantity', $row['usage_limit_quantity'], PDO::PARAM_INT);
            $stmt->bindParam(':type', $row['type'], PDO::PARAM_INT);
            $stmt->bindParam(':category', $row['category'], PDO::PARAM_INT);
            $stmt->bindParam(':brand', $row['brand'], PDO::PARAM_INT);
            $stmt->bindParam(':product', $row['product'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Voucher ECNG', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Voucher ECNG', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                $arr = array(
                    'status' => 'OK',
                    'mes' => 'Thêm voucher thành công!',
                    'link' => NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher'
                );
                print_r(json_encode($arr));
                die();
            }
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
            $arr = array('status' => 'ERROR', 'mes' => $e->getMessage());
            print_r(json_encode($arr));
            die();
        }
    }
}

if ($mod == 'get-brand') {
    $cate_id = $nv_Request->get_int('cate_id', 'post, get', '');
    $res = array(
        'status' => 'OK',
        'data' => get_all_brand($cate_id)
    );
    print_r(json_encode($res));
    die();
}

if ($mod == 'popup') {
    $xtpl = new XTemplate('popup_voucher_ecng_product.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

    $list_store = get_full_store();
    foreach ($list_store as $value) {
        $xtpl->assign('SHOP', array(
            'id' => $value['id'],
            'title' => $value['company_name']
        ));
        $xtpl->parse('main.SHOP');
    }

    $xtpl->parse('main');
    $contents = $xtpl->text('main');
    print_r($contents);
    die;
}

if ($mod == 'get_list_product') {
    $where = '';
    $q = $nv_Request->get_title('q', 'post,get', '');
    $shopid = $nv_Request->get_int('shopid', 'post,get', 0);
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&mod=get_list_product';

    if ($q) {
        $where .= ' AND (name_product LIKE "%" "' . $q . '" "%" OR barcode LIKE "%" "' . $q . '" "%")';
        $base_url .= '&q=' . $q;
    }
    // if($categories){
    // $where .= ' AND categories_id = ' . $categories ;
    // $base_url .= '&categories=' . $categories;
    // }

    if ($shopid) {
        $where .= ' AND store_id = ' . $shopid;
        $base_url .= '&shopid=' . $shopid;
    }



    $per_page = 10;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . TABLE . '_product')
        ->where(' status = 1 AND inhome = 1 ' . $where);

    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('id, image, price_special, price,name_product')
        ->order('time_add DESC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();

    $xtpl = new XTemplate('voucher_ecng_list_product_ajax.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

    if (!$num_items) {
        $xtpl->parse('main.no_product');
    }

    while ($view = $sth->fetch()) {
        $view['number'] = 1;

        if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
            $view['image'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
        } else {
            $domain = explode('.', $_SERVER["SERVER_NAME"]);
            $server = $domain[1] . '.' . $domain[2];
            $view['image'] = 'https://' . $server . NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'];
        }
        // lấy số lượng tồn kho
        //print_r('SELECT sum(sl_tonkho) as sum FROM ' . TABLE .'_product_classify_value_product WHERE  product_id ='. $view['id']);

        $view['warehouse'] = $db->query('SELECT sum(sl_tonkho) as sum FROM ' . TABLE . '_product_classify_value_product WHERE product_id =' . $view['id'])->fetchColumn();
        $view['warehouse'] =  number_format($view['warehouse']);
        $xtpl->assign('warehouse', $view['warehouse']);

        $show_price = '';
        if ($view['price_special']) {
            $show_price = 'price_special';
        } else {
            $show_price = 'price';
        }
        // lấy số giá max min

        $count_product = $db->query('SELECT COUNT(id) FROM ' . TABLE . '_product_classify_value_product WHERE  product_id =' . $view['id'])->fetchColumn();

        $min_price = $db->query('SELECT MIN(price) FROM ' . TABLE . '_product_classify_value_product WHERE product_id =' . $view['id'])->fetchColumn();


        $max_price = $db->query('SELECT MAX(price) FROM ' . TABLE . '_product_classify_value_product WHERE product_id =' . $view['id'])->fetchColumn();


        if ($count_product > 1 && $min_price != $max_price) {
            $min_price = number_format($min_price);
            $max_price = number_format($max_price);
            $xtpl->assign('price', $min_price . 'đ' . ' - ' . $max_price . 'đ');
        } else {
            $max_price = number_format($max_price);
            $xtpl->assign('price', $max_price . 'đ');
        }

        $view['number'] = $number++;
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }

    $xtpl->parse('main');
    $contents = $xtpl->text('main');
    print_r($contents);
    die;
}

if ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_voucher_ecng WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['userid'] = 0;
    $row['voucher_name'] = '';
    $row['voucher_code'] = '';
    $row['time_from'] = '';
    $row['time_to'] = 0;
    $row['discount_price'] = '';
    $row['minimum_price'] = '';
    $row['usage_limit_quantity'] = 0;
    $row['category'] = 0;
    $row['brand'] = 0;
    $row['type'] = 0;
    $row['type_discount'] = 0;
}



if (empty($row['time_from'])) {
    $row['time_from'] = date('d/m/Y', NV_CURRENTTIME);
} else {
    $row['time_from'] = date('d/m/Y', $row['time_from']);
}

if (empty($row['time_to'])) {
    $row['time_to'] = date('d/m/Y', NV_CURRENTTIME);
} else {
    $row['time_to'] = date('d/m/Y', $row['time_to']);
}
$array_userid_retails = array();
$_sql = 'SELECT userid,company_name FROM tms_vi_retails_seller_management';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_userid_retails[$_row['userid']] = $_row;
}

$q = $nv_Request->get_title('q', 'post,get');


// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '_voucher_shop');

    if (!empty($q)) {
        $db->where('userid LIKE :q_userid OR voucher_name LIKE :q_voucher_name OR voucher_code LIKE :q_voucher_code OR time_from LIKE :q_time_from OR time_to LIKE :q_time_to OR discount_price LIKE :q_discount_price');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_userid', '%' . $q . '%');
        $sth->bindValue(':q_voucher_name', '%' . $q . '%');
        $sth->bindValue(':q_voucher_code', '%' . $q . '%');
        $sth->bindValue(':q_time_from', '%' . $q . '%');
        $sth->bindValue(':q_time_to', '%' . $q . '%');
        $sth->bindValue(':q_discount_price', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('id DESC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_userid', '%' . $q . '%');
        $sth->bindValue(':q_voucher_name', '%' . $q . '%');
        $sth->bindValue(':q_voucher_code', '%' . $q . '%');
        $sth->bindValue(':q_time_from', '%' . $q . '%');
        $sth->bindValue(':q_time_to', '%' . $q . '%');
        $sth->bindValue(':q_discount_price', '%' . $q . '%');
    }
    $sth->execute();
}

$xtpl = new XTemplate('voucher_ecng_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

// foreach ($array_userid_retails as $value) {
//     $xtpl->assign('OPTION', array(
//         'key' => $value['userid'],
//         'title' => $value['company_name'],
//         //'selected' => ($value['userid'] == $row['userid']) ? ' selected="selected"' : ''
//     ));
//     $xtpl->parse('main.select_userid');
// }
// print('<pre>'. print_r($row, true) . '</pre>');die;

// danh sách ngành hàng 
$array_cat_list = category_html_select(0);

foreach ($array_cat_list as $rows_i) {
    $xtpl->assign('pcatid_i', $rows_i['id']);
    $xtpl->assign('ptitle_i', $rows_i['text']);
    $xtpl->assign('pselect', $rows_i['id'] == $row['category'] ? 'selected' : '');
    $xtpl->parse('main.parent_loop');
}

// danh sách thương hiệu
$list_brand = $db->query('SELECT id, title FROM ' . TABLE . '_brand WHERE status = 1 ORDER BY title ASC')->fetchAll();
foreach ($list_brand as $brand) {
    $xtpl->assign('OPTION', array(
        'key' => $brand['id'],
        'title' => $brand['title'],
        'selected' => $brand['id'] == $row['brand'] ? 'selected' : ''
    ));
    $xtpl->parse('main.brand');
}

//Loại voucher
$list_voucher_type = array();
$list_voucher_type[] = array('id' => 0, 'name' => 'None');
$list_voucher_type[] = array('id' => 1, 'name' => 'Thanh toán Momo');
$list_voucher_type[] = array('id' => 2, 'name' => 'Thanh toán VNPAY');
$list_voucher_type[] = array('id' => 3, 'name' => 'Giao hàng nhanh');
$list_voucher_type[] = array('id' => 4, 'name' => 'Giao hàng tiết kiệm');

foreach ($list_voucher_type as $item) {
    $item['checked'] = $item['id'] == $row['type'] ? 'checked' : '';
    $xtpl->assign('VOUCHER_TYPE', $item);
    $xtpl->parse('main.voucher_type');
}

// Mức giảm giá
if ($row['type_discount']) {
    $xtpl->assign('tdselected_2', 'selected');
} else {
    $xtpl->assign('tdselected_1', 'selected');
}


if ($show_view) {
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    // while ($view = $sth->fetch()) {
    //     $view['number'] = $number++;
    //     $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
    //     $view['time_from'] = (empty($view['time_from'])) ? '' : nv_date('d/m/Y', $view['time_from']);
    //     $view['time_to'] = (empty($view['time_to'])) ? '' : nv_date('d/m/Y', $view['time_to']);
    //     $view['userid'] = $array_userid_retails[$view['userid']]['company_name'];

    //     $xtpl->assign('VIEW', $view);
    //     $xtpl->parse('main.view.loop');
    // }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['voucher'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
