<?php
	
	/**
		* @Project NUKEVIET 4.x
		* @Author VINADES.,JSC <contact@vinades.vn>
		* @Copyright (C) 2021 VINADES.,JSC. All rights reserved
		* @License GNU/GPL version 2 or any later version
		* @Createdate Thu, 18 Mar 2021 03:05:40 GMT
	*/
	
	if (!defined('NV_IS_MOD_RESELLER'))
    die('Stop!!!');
	
	function signin_result($array)
	{
        global $nv_redirect;
		
        $array['redirect'] = nv_redirect_decrypt($nv_redirect);
        nv_jsonOutput($array);
	}
    
	
	$row = array();
	$error = array();
	$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
	
	$mod = $nv_Request->get_title('mod', 'get', '');
	if ($mod == 'registercontact') {
		
		$row['company_name'] = $nv_Request->get_title('company_name', 'post', '');
		$row['address'] = $nv_Request->get_title('address', 'post', '');
		$row['tax_code'] = $nv_Request->get_title('tax_code', 'post', '');
		$row['email'] = $nv_Request->get_title('email', 'post', '');
		$row['phone'] = $nv_Request->get_title('phone', 'post', '');
		$row['representative'] = $nv_Request->get_title('representative', 'post', '');
		$row['time_add'] = NV_CURRENTTIME;
		$row['check_terms_of_use'] = $nv_Request->get_int('check_terms_of_use', 'post', 0);
		$row['category'] = $nv_Request->get_title('category', 'post', 0);
	
		
		
		$check = preg_match('/^[0]{1}[0-9]{9}+$/',$row['phone']);
		if(empty($check)){
			signin_result(array(
			'status' => 'error',
			'input' => 'phone',
			'mess' => 'Số điện thoại không hợp lệ!'
			));
		}
		
		if (empty($row['company_name'])) {
			signin_result([
            'status' => 'error',
            'input' => 'company_name',
            'mess' => $lang_module['error_required_company_name']
			]);
			} elseif (empty($row['address'])) {
			signin_result([
            'status' => 'error',
            'input' => 'address',
            'mess' => $lang_module['error_required_address']
			]);
			} elseif (empty($row['tax_code'])) {
			signin_result([
            'status' => 'error',
            'input' => 'tax_code',
            'mess' => $lang_module['error_required_tax_code']
			]);
			} elseif (empty($row['email'])) {
			signin_result([
            'status' => 'error',
            'input' => 'email',
            'mess' => $lang_module['error_required_email']
			]);
			} elseif (empty($row['phone'])) {
			signin_result([
            'status' => 'error',
            'input' => 'phone',
            'mess' => $lang_module['error_required_phone']
			]);
			} elseif (empty($row['representative'])) {
			signin_result([
            'status' => 'error',
            'input' => 'representative',
            'mess' => $lang_module['error_required_representative']
			]);
		}
		elseif (empty($row['category'])) {
			signin_result([
            'status' => 'error',
            'input' => 'category',
            'mess' => $lang_module['error_required_category']
			]);
		}
		
		
		
		if (empty($error)) {
			try {
				if (empty($row['id'])) {
					$stmt = $db->prepare('INSERT INTO ' . TABLE . '_register_contact (company_name, address, tax_code, email, phone, representative, category, time_add) VALUES (:company_name, :address, :tax_code, :email, :phone, :representative, :category, :time_add)');
				} 
				$stmt->bindParam(':company_name', $row['company_name'], PDO::PARAM_STR);
				$stmt->bindParam(':address', $row['address'], PDO::PARAM_STR);
				$stmt->bindParam(':tax_code', $row['tax_code'], PDO::PARAM_STR);
				$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
				$stmt->bindParam(':phone', $row['phone'], PDO::PARAM_STR);
				$stmt->bindParam(':representative', $row['representative'], PDO::PARAM_STR);
				$stmt->bindParam(':category', $row['category'], PDO::PARAM_STR);
				$stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
				
				$exc = $stmt->execute();
				if ($exc) {
					
					
					$content_ip= $row['company_name'] . ' đăng ký bán hàng vào lúc '.date('d/m/y H:i',NV_CURRENTTIME);
					$db->query('INSERT INTO '.$db_config['dbsystem']. '.'.$db_config['prefix'].'_notification(language,area,module,admin_view_allowed,logic_mode ,send_from,send_to,content,add_time,obid,type) VALUES ('.$db->quote(NV_LANG_DATA) .',1,'.$db->quote($module_name).',0,0,0,0,'.$db->quote($content_ip).','.NV_CURRENTTIME.',1,"registercontact")');
					
					//gửi mail cho seller đăng ký
					$email_contents = call_user_func('email_thong_bao_dang_ky_ban_hang', $row);
					$email_title = 'ECNG thông báo đăng ký nhà bán hàng';
					nv_sendmail(array($global_config['site_name'], $global_config['site_email']), $row['email'], sprintf($email_title, $info_order['order_code']), $email_contents);
					
					//gửi mail cho admin
					$email_contents = call_user_func('email_thong_bao_dang_ky_ban_hang_admin', $row);
					$email_title = 'ECNG thông báo đăng ký nhà bán hàng';
					nv_sendmail(array($global_config['site_name'], $global_config['site_email']), $config_setting['email_seller_register'], sprintf($email_title, $info_order['order_code']), $email_contents);
					
					$nv_Cache->delMod($module_name);
					
					signin_result([
                    'status' => 'ok',
                    'input' => nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=login',true),
                    'mess' => ''
					]);
					
				}
				} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
		} elseif ($row['id'] > 0) {
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_register_contact WHERE id=' . $row['id'])->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
		} else {
		$row['id'] = 0;
		$row['company_name'] = '';
		$row['address'] = '';
		$row['tax_code'] = '';
		$row['email'] = '';
		$row['phone'] = '';
		$row['representative'] = '';
		$row['time_add'] = 0;
		$row['check_terms_of_use'] = 0;
	}
	$xtpl = new XTemplate('registercontact.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
	$xtpl->assign('CONFIG', $config_setting);
	
	
	
	// lấy danh mục ngành hàng
	$get_all_catalogy = get_list_full_category_lev1();
	
	foreach($get_all_catalogy as $category)
	{
		$xtpl->assign('category', $category);
		$xtpl->parse('main.category');
	}
	
	
	
	$xtpl->assign('LOGIN', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=users&amp;' . NV_OP_VARIABLE . '=login');
	
	$xtpl->assign('pattern_phone', '[0-9]{10}');
	if($row['check_terms_of_use']==1){
		$xtpl->assign('check_terms_of_use', 'checked');
		}else{
		$xtpl->assign('check_terms_of_use', '');
	}
	
	if (!empty($error)) {
		$xtpl->assign('ERROR', implode('<br />', $error));
		$xtpl->parse('main.error');
	}
	
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	
	$page_title = $lang_module['registercontact'];
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
