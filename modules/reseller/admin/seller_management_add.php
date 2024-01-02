<?php

/**
 * @Project TMS Holdings
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 22 Dec 2020 02:10:06 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');



$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['company_name'] = $nv_Request->get_title('company_name', 'post', '');
    $row['address'] = $nv_Request->get_title('address', 'post', '');
    $row['province_id'] = $nv_Request->get_int('province_id', 'post', 0);
    $row['district_id'] = $nv_Request->get_int('district_id', 'post', 0);
    $row['ward_id'] = $nv_Request->get_int('ward_id', 'post', 0);
    $row['tax_code'] = $nv_Request->get_title('tax_code', 'post', '');
    $row['name'] = $nv_Request->get_title('name', 'post', '');
    $row['phone'] = $nv_Request->get_title('phone', 'post', '');
    $row['email'] = $nv_Request->get_title('email', 'post', '');
	$row['username'] = $nv_Request->get_title('username', 'post', '');
	$row['password1'] = $nv_Request->get_title('password', 'post', '');
	$row['password2'] = $nv_Request->get_title('password2', 'post', '');
	$row['email_representative'] = $nv_Request->get_title('email_representative', 'post', '');
	$row['phone_representative'] = $nv_Request->get_title('phone_representative', 'post', '');
    $row['image_before'] = $nv_Request->get_title('image_before', 'post', '');
    if (is_file(NV_DOCUMENT_ROOT . $row['image_before']))     {
        $row['image_before'] = substr($row['image_before'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/business_license/'));
    } else {
        $row['image_before'] = '';
    }
    $row['image_after'] = $nv_Request->get_title('image_after', 'post', '');
    if (is_file(NV_DOCUMENT_ROOT . $row['image_after']))     {
        $row['image_after'] = substr($row['image_after'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/business_license/'));
    } else {
        $row['image_after'] = '';
    }
    $row['bank_id'] = $nv_Request->get_int('bank_id', 'post', 0);
    $row['acount_name'] = $nv_Request->get_title('acount_name', 'post', '');
    $row['acount_number'] = $nv_Request->get_title('acount_number', 'post', '');
    $row['branch_name'] = $nv_Request->get_title('branch_name', 'post', '');
    $row['store'] = $nv_Request->get_typed_array( 'store_list', 'post', 'array' );
	$row['userid'] = $nv_Request->get_int('userid', 'post', 0);

    if (empty($row['company_name'])) {
        $error[] = $lang_module['error_required_company_name'];
    } elseif (empty($row['address'])) {
        $error[] = $lang_module['error_required_address'];
    } elseif (empty($row['province_id'])) {
        $error[] = $lang_module['error_required_province_id'];
    } elseif (empty($row['district_id'])) {
        $error[] = $lang_module['error_required_district_id'];
    } elseif (empty($row['ward_id'])) {
        $error[] = $lang_module['error_required_ward_id'];
    } elseif (empty($row['name'])) {
        $error[] = $lang_module['error_required_name'];
    } elseif (empty($row['phone'])) {
        $error[] = $lang_module['error_required_phone'];
    } elseif (empty($row['email'])) {
        $error[] = $lang_module['error_required_email'];
    } elseif (empty($row['image_before'])) {
        $error[] = $lang_module['error_required_image_before'];
    } elseif (empty($row['image_after'])) {
        $error[] = $lang_module['error_required_image_after'];
    } elseif (empty($row['bank_id'])) {
        $error[] = $lang_module['error_required_bank_id'];
    } elseif (empty($row['acount_name'])) {
        $error[] = $lang_module['error_required_acount_name'];
    } elseif (empty($row['acount_number'])) {
        $error[] = $lang_module['error_required_acount_number'];
    } elseif (empty($row['branch_name'])) {
        $error[] = $lang_module['error_required_branch_id'];
    } elseif (empty($row['store'])) {
        $error[] = $lang_module['error_required_store'];
    }  elseif (empty($row['username'])) {
		$error[] = 'Vui lòng nhập tên đăng nhập';
	} elseif (empty($row['email_representative'])) {
		$error[] = 'Vui lòng nhập email người đại diện';
	} elseif (empty($row['phone_representative'])) {
		$error[] = 'Vui lòng nhập số điện thoại người đại diện';
	}
	foreach($row['store'] as $key => $value){
		if(empty($value['name_warehouse'])){
			$error[] = 'Vui lòng nhập tên kho hàng cho kho hàng thứ '.$key;
		}else if(empty($value['name_send'])){
			$error[] = 'Vui lòng nhập tên người gởi cho kho hàng thứ '.$key;
		}else if(empty($value['phone_send'])){
			$error[] = 'Vui lòng nhập số điện thoại người gởi cho kho hàng thứ '.$key;
		}else if(empty($value['province_id'])){
			$error[] = 'Vui lòng chọn thành phố muốn gởi cho kho hàng thứ '.$key;
		}else if(empty($value['district_id'])){
			$error[] = 'Vui lòng chọn quận huyện muốn gởi cho kho hàng thứ '.$key;
		}else if(empty($value['ward_id'])){
			$error[] = 'Vui lòng chọn phường xã muốn gởi cho kho hàng thứ '.$key;
		}else if(empty($value['address'])){
			$error[] = 'Vui lòng nhập địa chỉ ngắn gọn muốn gởi cho kho hàng thứ '.$key;
		}
	}
	if($row['id']==0){
		if (empty($row['password1'])) {
			$error[] = 'Vui lòng nhập mật khẩu';
		} elseif (empty($row['password2'])) {
			$error[] = 'Vui lòng nhập lại mật khẩu';
		}
		$md5username = nv_md5safe($row['username']);

		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username');
		$stmt->bindParam(':md5username', $md5username, PDO::PARAM_STR);
		$stmt->execute();
		$query_error_username = $stmt->fetchColumn();
		if ($query_error_username) {
			 $error[] = 'Tên đăng nhập đã tồn tại';
		}


		// Thực hiện câu truy vấn để kiểm tra email đã tồn tại chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE email= :email');
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email = $stmt->fetchColumn();
		if ($query_error_email) {
			$error[] = 'Email đã tồn tại';
		}
		
		// Thực hiện câu truy vấn để kiểm tra email đã tồn tại trong nv4_users_reg  chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE email= :email');
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email_reg = $stmt->fetchColumn();
		if ($query_error_email_reg) {
			$error[] = 'Email đã tồn tại';
		}
		
		 // Thực hiện câu truy vấn để kiểm tra email đã tồn tại trong nv3_users_openid chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_openid WHERE email= :email');
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email_openid = $stmt->fetchColumn();
		if ($query_error_email_openid) {
		   $error[] = 'Email đã tồn tại';
		}
		if ($row['password1'] != $row['password2']) {
			$error[] = 'Mật khẩu không trùng khớp';
		}
	}else{
		if(!empty($row['password1'])){
			if (empty($row['password2'])) {
				$error[] = 'Vui lòng nhập lại mật khẩu';
			}else if ($row['password1'] != $row['password2']) {
				$error[] = 'Mật khẩu không trùng khớp';
			}
		}
		$md5username = nv_md5safe($row['username']);

		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username and userid !='.$row['userid']);
		$stmt->bindParam(':md5username', $md5username, PDO::PARAM_STR);
		$stmt->execute();
		$query_error_username = $stmt->fetchColumn();
		if ($query_error_username) {
			 $error[] = 'Tên đăng nhập đã tồn tại';
		}


		// Thực hiện câu truy vấn để kiểm tra email đã tồn tại chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE email= :email and userid !='.$row['userid']);
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email = $stmt->fetchColumn();
		if ($query_error_email) {
			$error[] = 'Email đã tồn tại';
		}
		
		// Thực hiện câu truy vấn để kiểm tra email đã tồn tại trong nv4_users_reg  chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE email= :email and userid !='.$row['userid']);
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email_reg = $stmt->fetchColumn();
		if ($query_error_email_reg) {
			$error[] = 'Email đã tồn tại';
		}
		
		 // Thực hiện câu truy vấn để kiểm tra email đã tồn tại trong nv3_users_openid chưa.
		$stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_openid WHERE email= :email and userid !='.$row['userid']);
		$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
		$stmt->execute();
		$query_error_email_openid = $stmt->fetchColumn();
		if ($query_error_email_openid) {
			$error[] = 'Email đã tồn tại';
		}
	}
    if (empty($error)) {
        try {
            if (empty($row['id'])) {
				
                $_user['in_groups']=4;
				$sql = "INSERT INTO " . NV_TABLE_USER . " (
					group_id, username, md5username, password, email, first_name, last_name, gender, birthday, sig, regdate,
					question, answer, passlostkey, view_mail,
					remember, in_groups, active, checknum, last_login, last_ip, last_agent, last_openid, idsite, email_verification_time,
					active_obj,phone
				) VALUES (
					0,
					:username,
					:md5_username,
					:password,
					:email,
					:first_name,
					:last_name,
					:gender,
					0,
					:sig,
					" . NV_CURRENTTIME . ",
					:question,
					:answer,
					'',
					0,
					1,
					'" . implode(',', $_user['in_groups']) . "', 1, '', 0, '', '', '', " . $global_config['idsite'] . ",
					" . ($_user['is_email_verified'] ? '-1' : '0') . ",
					'SYSTEM',:phone
				)";

				$data_insert = [];
				$data_insert['username'] = $row['username'];
				$data_insert['md5_username'] = $md5username;
				$data_insert['password'] = $crypt->hash_password($row['password1'], $global_config['hashprefix']);
				$data_insert['email'] = $row['email'];
				$data_insert['first_name'] = $row['name'];
				$data_insert['last_name'] = "";
				$data_insert['gender'] = "M";
				$data_insert['sig'] = "";
				$data_insert['question'] = "";
				$data_insert['answer'] = "";
				$data_insert['phone'] = $row['phone'];
				$row['userid'] = $db->insert_id($sql, 'userid', $data_insert);
				
                $row['user_add'] = $admin_info['userid'];
                $row['time_add'] = NV_CURRENTTIME;

                $stmt = $db->prepare('INSERT INTO ' . TABLE . '_seller_management (userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name,user_add, time_add, user_edit, time_edit, status, weight) VALUES (:userid, :company_name, :address, :province_id, :district_id, :ward_id, :tax_code, :name, :phone, :email, :image_before, :image_after, :bank_id, :acount_name, :acount_number, :branch_name, :user_add, :time_add, :user_edit, :time_edit, :status, :weight)');

                $stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_edit', $row['user_edit'], PDO::PARAM_INT);
                $stmt->bindParam(':time_edit', $row['time_edit'], PDO::PARAM_INT);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);

                $weight = $db->query('SELECT max(weight) FROM ' . TABLE . '_seller_management')->fetchColumn();
                $weight = intval($weight) + 1;
                $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


            } else {
                $stmt = $db->prepare('UPDATE ' . TABLE . '_seller_management SET company_name = :company_name, address = :address, province_id = :province_id, district_id = :district_id, ward_id = :ward_id, tax_code = :tax_code, name = :name, phone = :phone, email = :email, image_before = :image_before, image_after = :image_after, bank_id = :bank_id, acount_name = :acount_name, acount_number = :acount_number, branch_name = :branch_name WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':company_name', $row['company_name'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $row['address'], PDO::PARAM_STR);
            $stmt->bindParam(':province_id', $row['province_id'], PDO::PARAM_INT);
            $stmt->bindParam(':district_id', $row['district_id'], PDO::PARAM_INT);
            $stmt->bindParam(':ward_id', $row['ward_id'], PDO::PARAM_INT);
            $stmt->bindParam(':tax_code', $row['tax_code'], PDO::PARAM_STR);
            $stmt->bindParam(':name', $row['name'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $row['phone_representative'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $row['email_representative'], PDO::PARAM_STR);
            $stmt->bindParam(':image_before', $row['image_before'], PDO::PARAM_STR);
            $stmt->bindParam(':image_after', $row['image_after'], PDO::PARAM_STR);
            $stmt->bindParam(':bank_id', $row['bank_id'], PDO::PARAM_INT);
            $stmt->bindParam(':acount_name', $row['acount_name'], PDO::PARAM_STR);
            $stmt->bindParam(':acount_number', $row['acount_number'], PDO::PARAM_STR);
            $stmt->bindParam(':branch_name', $row['branch_name'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
					
					$sell_id=$db->query('SELECT max(id) FROM ' . TABLE . '_seller_management')->fetchColumn();
					
					// khởi tạo tất cả đơn vị vận chuyển đang hoạt động cho cửa hàng mới tạo này
					$list_tranpost = $db->query('SELECT id FROM ' .TABLE . '_transporters WHERE status = 1 ORDER BY weight ASC')->fetchAll(); 

					foreach($list_tranpost as $tranpost)
					{
						// thêm vào
						$db->query('INSERT INTO ' . TABLE . '_transporters_shop(sell_id,transporters_id,status) VALUES('.$sell_id.','.$tranpost['id'].',1)');
					}
					
					
					$store='';
					foreach($row['store'] as $key=>$value){
						$shops_id_ghn_data=create_store_ghn(get_info_district($value['district_id'])['ghnid'],get_info_ward($value['ward_id'])['ghnid'],$value['name_send'],$value['phone_send'],$value['address']);
						$shops_id_ghn=$shops_id_ghn_data['data']['shop_id'];
						$viettelpost=create_warehouse_viettelpost($value['phone_send'],$value['name_send'],$value['address'],get_info_ward($value['ward_id'])['vtpid']);
						$groupaddressId=$viettelpost['data'][0]['groupaddressId'];
						$cusId=$viettelpost['data'][0]['cusId'];
						$db->query('INSERT INTO ' . TABLE . '_warehouse(sell_id,name_warehouse,name_send,phone_send,address,province_id,district_id,ward_id,user_add,time_add,status,shops_id_ghn,lat,lng,groupaddressId,cusId) VALUES('.$sell_id.','.$db->quote($value['name_warehouse']).','.$db->quote($value['name_send']).','.$db->quote($value['phone_send']).','.$db->quote($value['address']).','.$db->quote($value['province_id']).','.$db->quote($value['district_id']).','.$db->quote($value['ward_id']).','.$admin_info['userid'].','.NV_CURRENTTIME.',1,'.$shops_id_ghn.','.$db->quote($value['lat']).','.$db->quote($value['lng']).','.$groupaddressId.','.$cusId.')');
						$store_id=$db->query('SELECT max(id) FROM ' . TABLE . '_warehouse')->fetchColumn();
						if($key==1){
							$store=$store_id;
						}else{
							$store=$store.','.$store_id;
						}
					}
					$db->query('UPDATE ' . TABLE . '_seller_management SET store='.$db->quote($store).' where id='.$sell_id);
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Seller_management', ' ', $admin_info['userid']);
                } else {
					$sell_id = $row['id'];
					if($row['password1']!=''){
						$db->query('UPDATE '. NV_TABLE_USER .' SET first_name='.$db->quote($row['name']).', email='.$db->quote($row['email']).',phone='.$db->quote($row['phone']).',password='.$db->quote($crypt->hash_password($row['password1'], $global_config['hashprefix'])).' where userid='.$row['userid']);
					}else{
						$db->query('UPDATE '. NV_TABLE_USER .' SET first_name='.$db->quote($row['name']).', email='.$db->quote($row['email']).',phone='.$db->quote($row['phone']).' where userid='.$row['userid']);
					}
					$store='';
					$shops_id_ghn='';
					foreach($row['store'] as $key=>$value){
						$check_shops_id=$db->query('SELECT count(*) FROM ' . TABLE . '_warehouse where name_warehouse='.$db->quote($value['name_warehouse']).' and name_send='.$db->quote($value['name_send']).' and phone_send='.$db->quote($value['phone_send']).' and address='.$db->quote($value['address']))->fetchColumn();
						if($check_shops_id==0){
							$shops_id_ghn_data=create_store_ghn(get_info_district($value['district_id'])['ghnid'],get_info_ward($value['ward_id'])['ghnid'],$value['name_send'],$value['phone_send'],$value['address']);
							$shops_id_ghn=$shops_id_ghn_data['data']['shop_id'];
							$viettelpost=create_warehouse_viettelpost($value['phone_send'],$value['name_send'],$value['address'],get_info_ward($value['ward_id'])['vtpid']);
							$groupaddressId=$viettelpost['data'][0]['groupaddressId'];
							$cusId=$viettelpost['data'][0]['cusId'];
						}else{
							$shops_id_ghn=$db->query('SELECT shops_id_ghn FROM ' . TABLE . '_warehouse where name_warehouse='.$db->quote($value['name_warehouse']).' and name_send='.$db->quote($value['name_send']).' and phone_send='.$db->quote($value['phone_send']).' and address='.$db->quote($value['address']))->fetchColumn();
							$groupaddressId=$db->query('SELECT groupaddressId FROM ' . TABLE . '_warehouse where name_warehouse='.$db->quote($value['name_warehouse']).' and name_send='.$db->quote($value['name_send']).' and phone_send='.$db->quote($value['phone_send']).' and address='.$db->quote($value['address']))->fetchColumn();
							$cusId=$db->query('SELECT cusId FROM ' . TABLE . '_warehouse where name_warehouse='.$db->quote($value['name_warehouse']).' and name_send='.$db->quote($value['name_send']).' and phone_send='.$db->quote($value['phone_send']).' and address='.$db->quote($value['address']))->fetchColumn();
						}
						if($value['warehouse_id']>0){
							$db->query('UPDATE ' . TABLE . '_warehouse SET name_warehouse='.$db->quote($value['name_warehouse']).',name_send='.$db->quote($value['name_send']).',phone_send='.$db->quote($value['phone_send']).',address='.$db->quote($value['address']).',shops_id_ghn='.$shops_id_ghn.',province_id='.$db->quote($value['province_id']).',district_id='.$db->quote($value['district_id']).',ward_id='.$db->quote($value['ward_id']).',user_edit='.$admin_info['userid'].',time_edit='.NV_CURRENTTIME.',status=1, lat='.$db->quote($value['lat']).', lng='.$db->quote($value['lng']).',cusId='.$cusId.',groupaddressId='.$groupaddressId.' where id='.$value['warehouse_id']);
							if($store == ''){
								$store=$value['warehouse_id'];
							}else{ 
								
								$store=$store.','.$value['warehouse_id'];
							}
						}else{
							$db->query('INSERT INTO ' . TABLE . '_warehouse(sell_id,name_warehouse,name_send,phone_send,address,province_id,district_id,ward_id,user_add,time_add,status,shops_id_ghn,lat,lng,groupaddressId,cusId) VALUES('.$sell_id.','.$db->quote($value['name_warehouse']).','.$db->quote($value['name_send']).','.$db->quote($value['phone_send']).','.$db->quote($value['address']).','.$db->quote($value['province_id']).','.$db->quote($value['district_id']).','.$db->quote($value['ward_id']).','.$admin_info['userid'].','.NV_CURRENTTIME.',1,'.$shops_id_ghn.','.$db->quote($value['lat']).','.$db->quote($value['lng']).','.$groupaddressId.','.$cusId.')');
							$store_id=$db->query('SELECT max(id) FROM ' . TABLE . '_warehouse')->fetchColumn();
							if($store == ''){
								$store=$store_id;
							}else{
								$store=$store.','.$store_id;
							}
						}
					}
					$db->query('UPDATE ' . TABLE . '_seller_management SET store='.$db->quote($store).' where id='.$sell_id);
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Seller_management', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=seller_management');
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . TABLE . '_seller_management WHERE id=' . $row['id'])->fetch();
	$info = $db->query('SELECT * FROM ' . NV_TABLE_USER . ' WHERE userid=' . $row['userid'])->fetch();
	$row['username']=$info['username'];
	$row['phone_representative']=$row['phone'];
	$row['email_representative']=$row['email'];
	$row['email']=$info['email'];
	$row['phone']=$info['phone'];
	$row['password'] = '';
	$row['province_name']=get_info_province($row['province_id'])['title'];
	$row['district_name']=get_info_district($row['district_id'])['title'];
	$row['ward_name']=get_info_ward($row['ward_id'])['title'];
	$row['store']=explode(',',$row['store']);
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['company_name'] = '';
    $row['address'] = '';
    $row['province_id'] = 0;
    $row['district_id'] = 0;
    $row['ward_id'] = 0;
    $row['tax_code'] = '';
    $row['name'] = '';
    $row['phone'] = '';
    $row['email'] = '';
    $row['image_before'] = '';
    $row['image_after'] = '';
    $row['bank_id'] = 0;
    $row['acount_name'] = '';
    $row['acount_number'] = '';
    $row['branch_name'] = '';
    $row['store'] = '';
	$row['username'] = '';
	$row['password'] = '';
}
if (!empty($row['image_before']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/business_license/' . $row['image_before'])) {
    $row['image_before'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/business_license/' . $row['image_before'];
}

if (!empty($row['image_after']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/business_license/' . $row['image_after'])) {
    $row['image_after'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/business_license/' . $row['image_after'];
}
$array_bank_id_retailshops = array();
$_sql = 'SELECT bank_id,name_bank,bank_code FROM tms_vi_'.$module_data.'_bank';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_bank_id_retailshops[$_row['bank_id']] = $_row;
}

$xtpl = new XTemplate('seller_management_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('validate_phone', "^\d{4}-\d{3}-\d{3}$");
if($row['id']>0){
	$check='readonly';
}else{
	$check='';
}
$xtpl->assign('check', $check);

foreach ($array_bank_id_retailshops as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['bank_id'],
        'title' => $value['bank_code'].' - '.$value['name_bank'],
        'selected' => ($value['bank_id'] == $row['bank_id']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_bank_id');
}
if($row['id']>0){
	$xtpl->parse('main.edit');
	$xtpl->parse('main.editjs');
	foreach($row['store'] as $key=>$value){
		
		if(count($error)==0){
			
			$info=get_info_warehouse($value);
			$info['province_name']=get_info_province($info['province_id'])['title'];
			$info['district_name']=get_info_district($info['district_id'])['title'];
			$info['ward_name']=get_info_ward($info['ward_id'])['title'];
			$xtpl->assign('key', $key+1);
		}else{
			$info=$value;
			$info['province_name']=get_info_province($value['province_id'])['title'];
			$info['district_name']=get_info_district($value['district_id'])['title'];
			$info['ward_name']=get_info_ward($value['ward_id'])['title'];
			$xtpl->assign('key', $key);
		}
		
		$xtpl->assign('ROW1', $info);
		if($key>0){
			$xtpl->parse('main.edit2.loop.delete');
		}
		$xtpl->parse('main.edit2.loop');
	}
	$xtpl->parse('main.edit2');
	
}else{
	$xtpl->parse('main.noedit');
	$xtpl->parse('main.noedit2');
	$xtpl->parse('main.noeditjs');
}
if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['seller_management'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
