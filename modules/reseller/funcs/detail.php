<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */

if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');

if (defined('NV_IS_USER')) {
	$store_id = get_info_user_login($user_info['userid'])['id'];
}else{  
	$store_id = 0;
}



$mod = $nv_Request->get_title( 'mod', 'get', '' );
if ( $mod == 'rate' ) {
	$product_id = $nv_Request->get_int('product_id', 'post', 0);
	$star = $nv_Request->get_int('rating', 'post', 0);
	$text = $nv_Request->get_title('text_rate', 'post', '');

	$rowcontent['otherimage'] = $nv_Request->get_array('otherimage', 'post');

	// Xu ly hinh anh khac
	foreach ($rowcontent['otherimage'] as $otherimage) {
		$array_id_new[] = intval($otherimage['id']);
	}
	$rowcontent['list_image'] = '';
	$ii = 1;
	foreach ($rowcontent['otherimage'] as $otherimage) {

		if ($otherimage['id'] == 0) {

			if (file_exists(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'])) {
				$a = date('Y_m', NV_CURRENTTIME);
                // Copy file từ thư mục tmp sang uploads

				if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'], NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $otherimage['homeimgfile'])) {
					$otherimage['homeimgfile'] = str_replace($module_upload . '/', '', $a . '/' . $otherimage['homeimgfile']);
					if($ii<count($rowcontent['otherimage'])){
						$rowcontent['list_image'] .=  $otherimage['homeimgfile'] . '|';
					}else{
						$rowcontent['list_image'] .=  $otherimage['homeimgfile'];
					}
                    //xóa file tạm

					nv_delete_other_images_tmp(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'], NV_ROOTDIR . $otherimage['thumb']);
				}
			}
		} else {
			$sth = $db->prepare('UPDATE ' . TMS_BDS . '_images SET title = :title, description = :description, homeimgfile = :homeimgfile WHERE id=' . $otherimage['id']);
			$sth->bindParam(':title', $otherimage['name'], PDO::PARAM_STR, strlen($otherimage['name']));
			$sth->bindParam(':description', $otherimage['description'], PDO::PARAM_STR, strlen($otherimage['description']));
			$sth->bindParam(':homeimgfile', $otherimage['homeimgfile'], PDO::PARAM_STR, strlen($otherimage['homeimgfile']));
			$sth->execute();
		}
		$ii ++;
	}

	$sql = "INSERT INTO " . TABLE . "_rate (product_id, content, status, time_add, userid, star, other_image)
	VALUES ( 
	" . intval($product_id) . ",
	'" . $text . "',
	1,
	'" . NV_CURRENTTIME . "',
	'" . $user_info['userid'] . "',
	'" . $star . "',
	'" . $rowcontent['list_image'] . "'
)";
$data_insert = [];
$rowcontent['id'] = $db->insert_id($sql, 'id', $data_insert);
$json[] = ['status'=>'OK', 'text'=>'Thêm đánh giá thành công!'];
print_r( json_encode( $json[0] ) );
die();

}



if ( $mod == 'update_rate' ) {
	$product_id = $nv_Request->get_int('product_id', 'post', 0);
	$star = $nv_Request->get_int('rating', 'post', 0);
	$text = $nv_Request->get_title('text_rate', 'post', '');
	$rowcontent['otherimage'] = $nv_Request->get_array('otherimage', 'post');
	// Xu ly hinh anh khac
	foreach ($rowcontent['otherimage'] as $otherimage) {
		$array_id_new[] = intval($otherimage['id']);
	}
	$rowcontent['list_image'] = '';
	$ii = 1;
	foreach ($rowcontent['otherimage'] as $otherimage) {
		
		if ($otherimage['id'] == 0) {
			if (file_exists(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'])) {
				$a = date('Y_m', NV_CURRENTTIME);

                // Copy file từ thư mục tmp sang uploads
				if (@nv_copyfile(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'], NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $a . '/' . $otherimage['homeimgfile'])) {
					$otherimage['homeimgfile'] = str_replace($module_upload . '/', '', $a . '/' . $otherimage['homeimgfile']);
					if($ii<count($rowcontent['otherimage'])){
						$rowcontent['list_image'] .=  $otherimage['homeimgfile'] . '|';
					}else{
						$rowcontent['list_image'] .=  $otherimage['homeimgfile'];
					}
                    //xóa file tạm
					nv_delete_other_images_tmp(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $otherimage['homeimgfile'], NV_ROOTDIR . $otherimage['thumb']);
				}
			}
		} else {
			if($ii<count($rowcontent['otherimage'])){
				$rowcontent['list_image'] .=  $otherimage['homeimgfile'] . '|';
			}else{
				$rowcontent['list_image'] .=  $otherimage['homeimgfile'];
			}
		}
		$ii ++;
	}
	$sth = $db->prepare('UPDATE ' . TABLE . '_rate SET content = :content, time_edit = ' . NV_CURRENTTIME . ', status = 1,star = ' . $star. ',other_image = :other_image WHERE product_id=' . $product_id);
	$sth->bindParam(':content', $text, PDO::PARAM_STR, strlen($text));
	$sth->bindParam(':other_image', $rowcontent['list_image'], PDO::PARAM_STR, strlen($rowcontent['list_image']));
	$sth->execute();
	$json[] = ['status'=>'OK', 'text'=>'Sửa đánh giá thành công!'];
	print_r( json_encode( $json[0] ) );
	die();
}



$per_page = 5;
$key_words = $module_info['keywords'];
$array_data = array();
$array_data=get_info_product($id);
$token=get_token_ahamove();
$number_view_new=$array_data['number_view']+1;
$db->query('UPDATE '.TABLE.'_product SET number_view='.$number_view_new.' where id='.$id); 
$array_data['number_view']=number_format($array_data['number_view']);

$list_product_category = $db->query('SELECT t1.* FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_categories t2 ON t1.categories_id = t2.id WHERE t1.status = 1 AND ( t1.categories_id = ' . $array_data['categories_id'] . ' OR t2.parrent_id = ' . $array_data['categories_id'] . ' ) limit ' . $per_page)->fetchAll();


$list_classify=get_full_classify($array_data['id']);
$array_data['classify']=array();
foreach($list_classify as $value){
	$value['list_classify_value']=get_full_classify_value($value['id']);
	$array_data['classify'][]=$value;
}

$list_product_store = $db->query('SELECT * FROM ' . TABLE . '_product WHERE status = 1 AND store_id = ' . $array_data['store_id'] . ' limit ' . $per_page)->fetchAll();


//lưu session các sản phẩm vừa xem


$check = 0;
foreach ($_SESSION['product'] as $key => $value) {
	if($value['id']==$array_data['id']){
		$check = 1;
	}
}
if($check==0){
	$_SESSION['product'][] = array(
		'id' => $array_data['id'],
		'store_id' => $array_data['store_id'],
		'barcode' => $array_data['barcode'],
		'name_product' => $array_data['name_product'],
		'alias' => $array_data['alias'],
		'categories_id' => $array_data['categories_id'],
		'unit_id' => $array_data['unit_id'],
		'unit_weight' => $array_data['unit_weight'],
		'weight_product' => $array_data['weight_product'],
		'length_product' => $array_data['length_product'],
		'width_product' => $array_data['width_product'],
		'height_product' => $array_data['height_product'],
		'unit_length' => $array_data['unit_length'],
		'unit_height' => $array_data['unit_height'],
		'unit_width' => $array_data['unit_width'],
		'image' => $array_data['image'],
		'other_image' => $array_data['other_image'],
		'description' => $array_data['description'],
		'bodytext' => $array_data['bodytext'],
		'keyword' => $array_data['keyword'],
		'tag_title' => $array_data['tag_title'],
		'tag_description' => $array_data['tag_description'],
		'inhome' => $array_data['inhome'],
		'allowed_rating' => $array_data['allowed_rating'],
		'showprice' => $array_data['showprice'],
		'number_view' => $array_data['number_view'],
		'price_min' => $array_data['price_min'],
		'price_max' => $array_data['price_max'],
		'time_add' => $array_data['time_add'],
		'user_add' => $array_data['user_add'],
		'time_edit' => $array_data['time_edit'],
		'user_edit' => $array_data['user_edit'],
		'weight' => $array_data['weight'],
		'status' => $array_data['status'],
		'number_order' => $array_data['number_order'],
		'brand' => $array_data['brand'],
		'origin' => $array_data['origin'],
		'price' => $array_data['price'],
		'price_special' => $array_data['price_special']
	);
}

$list_product_view = $_SESSION['product'];
if($user_info['userid']){
	$array_data['check_rate'] = $db->query('SELECT count(*) FROM ' . TABLE . '_order t1 INNER JOIN ' . TABLE . '_order_item t2 ON t1.id = t2.order_id WHERE t2.product_id = ' . $array_data['id'] . ' AND t1.status = 3')->fetchColumn();
	$array_data['check_rate_st1'] = $db->query('SELECT count(*) FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_rate t2 ON t1.id = t2.product_id WHERE t2.product_id = ' . $array_data['id'] . ' AND t2.userid = ' .$user_info['userid'] . ' AND t2.status = 1')->fetchColumn();

	$array_data['info_rate'] = $db->query('SELECT t2.* FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_rate t2 ON t1.id = t2.product_id WHERE t2.product_id = ' . $array_data['id'] . ' AND t2.userid = ' .$user_info['userid'])->fetch();

	$array_data['check_rate_st2'] = $db->query('SELECT count(*) FROM ' . TABLE . '_product t1 INNER JOIN ' . TABLE . '_rate t2 ON t1.id = t2.product_id WHERE t2.product_id = ' . $array_data['id'] . ' AND t2.userid = ' .$user_info['userid'] . ' AND t2.status = 2')->fetchColumn();
}





$page = $nv_Request->get_int('page', 'post,get', 1);
if($page==0){
	$page_new=1;
}else{
	$page_new=$page;
}
$num_items =  $db->query("SELECT count(*) FROM " .TABLE."_rate WHERE product_id = " . $array_data['id']) -> fetchColumn();
$list_rate =  $db->query("SELECT * FROM " .TABLE."_rate WHERE product_id = " . $array_data['id'] . ' LIMIT ' . $per_page . ' offset ' . ($page_new - 1) * $per_page) -> fetchAll();

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=ajax&amp;id=' . $array_data['id'] . '&amp;mod=load_comment_detail';



$contents = nv_theme_retailshops_detail($array_data,$token['token'],$store_id,$list_product_category,$list_product_store,$list_product_view,$list_rate,$page_new,$per_page,$base_url,$num_items,$page);


$page_title = $array_data['name_product'];
$page_title = !empty($array_data['tag_title']) ? $array_data['tag_title'] : $array_data['name_product'];
$description = !empty($array_data['tag_description']) ? $array_data['tag_description'] : $array_data['description'];
if(get_info_category($array_data['categories_id'])['parrent_id']>0){
	$array_mod_title[] = array(
		'catid' => get_info_category(get_info_category($array_data['categories_id'])['parrent_id'])['id'],
		'title' => get_info_category(get_info_category($array_data['categories_id'])['parrent_id'])['name'],
		'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.get_info_category(get_info_category($array_data['categories_id'])['parrent_id'])['alias'].'/'
	);
}
$array_mod_title[] = array(
	'catid' => $array_data['categories_id'],
	'title' => get_info_category($array_data['categories_id'])['name'],
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.get_info_category($array_data['categories_id'])['alias'].'/'
);

$array_mod_title[] = array(
	'catid' => 0,
	'title' => $array_data['name_product'],
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$array_data['alias'].'/'
);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
