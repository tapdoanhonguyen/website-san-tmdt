<?php
	
	
	
	if (!defined('NV_IS_USER')) {
		echo '<script language="javascript">';
		echo 'alert("Vui lòng đăng nhập trước để thực hiện chức năng này.");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login',true).'"';
		echo '</script>';
		}else{  
		$store_id=get_info_user_login($user_info['userid'])['id'];
		
		if(empty($store_id)){
			echo '<script language="javascript">';
			echo 'alert("Bạn không có quyền truy cập chức năng này1");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name,true).'"';
			echo '</script>';
		}
	}
	
	// if (1) {
	// echo '<script language="javascript">';
	// echo 'window.location = "'.NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=retails' . '&' . NV_OP_VARIABLE . '=develop'.'"';
	// echo '</script>';
	// }
	
	$mod = $nv_Request->get_string('mod', 'post, get', 0);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
	if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$id = $nv_Request->get_int('delete_id', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		
		if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        	
			if(check_voucher($id))
			{
				$db->query('UPDATE ' . TABLE . '_voucher_shop SET status = 0 WHERE store_id = ' . $store_id . ' AND id = ' . intval($id));
				
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Voucher', 'ID: ' . $id, $user_info['userid']);
				
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
			
		}
	}
	
	//$data = $db->query('SELECT * FROM ' . TABLE . '_voucher_shop WHERE store_id = ' . $store_id . ' AND status = 1 ORDER BY time_add DESC');
	
	$show_view = false;
	if (!$nv_Request->isset_request('id', 'post,get')) {
		
		$show_view = true;
		$per_page = 20;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
		->select('COUNT(*)')
		->from('' . TABLE . '_voucher_shop')
		->where('store_id = ' . $store_id . ' AND status = 1')
		->order('time_add DESC');
		$sth = $db->prepare($db->sql());
		
		$sth->execute();
		
		$num_items = $sth->fetchColumn();
		
		// print_r($num_items);
		
		$db->select('*')
		->order('')
		->limit($per_page)
		->offset(($page - 1) * $per_page);
		
		$sth = $db->prepare($db->sql());
		$sth->execute();
		
	}
	
	$xtpl = new XTemplate('voucher.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('num_items', $num_items);
	$xtpl->assign('OP', $op);
	$xtpl->assign('ROW', $row);
	
	
	$xtpl->assign('ADD' ,  nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher-add', true ));
	
	
	if ($show_view) {
		$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
		if (!empty($generate_page)) {
			$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
			$xtpl->parse('main.view.generate_page');
		}
		while ($view = $sth->fetch()) {
		
			if($view['type_discount']){
				$view['discount_price'] = number_format( $view['discount_price'] ).'%';
			}else{
				$view['discount_price'] = number_format( $view['discount_price'] ).'đ';
			}
			
			if($view['maximum_discount']){
				$view['maximum_discount'] = number_format( $view['maximum_discount'] ).'đ';
			}
			else{
				$view['maximum_discount'] = 'Không giới hạn';
			}
			
			$view['usage_limit_quantity'] = number_format( $view['usage_limit_quantity'] );
			$view['minimum_price'] = number_format( $view['minimum_price'] ).'đ';
			
			//print_r($view['id']);die;
			$view['time_from'] = (empty($view['time_from'])) ? '' : date('d-m-Y H:i', $view['time_from']);
			$view['time_to'] = (empty($view['time_to'])) ? '' : date('d-m-Y H:i', $view['time_to']);
			
			$view['link_edit'] = nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=voucher-add&id=' . $view['id'], true);
			
			$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5( $view['id'] . NV_CACHE_PREFIX . $client_info['session_id'] );
			//print_r($view['link_delete']);die;
			$xtpl->assign('VIEW', $view);
			$xtpl->parse('main.view');
			
		}
	}
	
	
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	
	
	$page_title = 'Quản lý Voucher';
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';