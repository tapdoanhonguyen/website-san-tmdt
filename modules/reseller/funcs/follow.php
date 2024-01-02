<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 09 Jan 2021 09:34:49 GMT
 */

if (!defined('NV_IS_MOD_RESELLER'))
    die('Stop!!!');
if (!defined('NV_IS_USER')) {
    echo '<script language="javascript">';
    echo 'alert("Vui lòng đăng nhập để thực hiện chức năng này");window.location = "'.NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login'.'"';
    echo '</script>';
}
if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . TABLE . '_follow  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();

$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
	$info_shop = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE userid = ' . $user_info['userid'])->fetch();

    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
    ->select('COUNT(*)')
    ->from('' . TABLE . '_follow WHERE shop_id = ' . $info_shop['id']);

    if (!empty($q)) {
        $db->where('shop_id LIKE :q_shop_id OR time_add LIKE :q_time_add OR user_id LIKE :q_user_id');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_shop_id', '%' . $q . '%');
        $sth->bindValue(':q_time_add', '%' . $q . '%');
        $sth->bindValue(':q_user_id', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
    ->order('id DESC')
    ->limit($per_page)
    ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_shop_id', '%' . $q . '%');
        $sth->bindValue(':q_time_add', '%' . $q . '%');
        $sth->bindValue(':q_user_id', '%' . $q . '%');
    }
    $sth->execute();
}

$xtpl = new XTemplate('follow.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
$xtpl->assign('ROW', $row);

$xtpl->assign('Q', $q);

if ($show_view) {
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    while ($view = $sth->fetch()) {

        $view['time_add'] = date('d-m-Y',  $view['time_add']);
        $view['info_shop'] = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE id='.$view['shop_id'])->fetch();

		$view['info_user'] = $db->query('SELECT * FROM ' . NV_TABLE_USER . ' WHERE userid='.$view['user_id'])->fetch();


		if($view['info_user']['photo']){
			$server = 'chonhagiau.vn';
			$view['info_user']['photo'] = 'https://'. $server . NV_BASE_SITEURL . $view['info_user']['photo'];
		}else{
			
			$server = 'chonhagiau.vn';
			$view['info_user']['photo'] = 'https://'. $server . NV_BASE_SITEURL . NV_UPLOADS_DIR . '/no_img.png' ;
		}
        $view['info_shop']['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.get_info_user($view['info_shop']['userid'])['username'].'/';
		
			$server = 'chonhagiau.vn';
            $view['info_shop']['avatar_image']  ='https://'. $server . $view['info_shop']['avatar_image'] ;

        $view['number'] = $number++;
        $view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);

        $xtpl->parse('main.view.loop');

    }

    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['follow'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
