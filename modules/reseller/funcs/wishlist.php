<?php

$per_page = 20;
	$page = $nv_Request->get_int('page', 'post,get', 0);
	if($page==0){
		$page_new=1;
	}else{
		$page_new=$page;
	}
	
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . TABLE . '_product')
	->where('number_like > 0 AND status = 1 AND store_id='. $store_id);
	
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('id,alias, name_product, image, number_like')
	->order('number_like DESC')
	->limit($per_page)
	->offset(($page_new - 1) * $per_page);
	$sth = $db->prepare($db->sql());
	//die($db->sql()); 
	$sth->execute();
	
	$data = $sth->fetchAll();
	
	
	
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
	
	$generate_page = nv_generate_page_viewcat($base_url, $num_items, $per_page, $page_new, 'true', 'false', 'nv_urldecode_ajax', 'all');
	
	$contents = nv_theme_wishlist($data, $generate_page);
	
	

if($page == 0)
{
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
}
else
{
	echo $contents;
}


