<?php



if (!defined('NV_IS_USER')) {
	echo '<script language="javascript">';
	echo 'alert("Vui lòng đăng nhập trước để thực hiện chức năng này.");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users' . '&' . NV_OP_VARIABLE . '=login',true).'"';
	echo '</script>';
}else{  
	$store_id=get_info_user_login($user_info['userid'])['id'];
	if(empty($store_id)){
		echo '<script language="javascript">';
		echo 'alert("Bạn không có quyền truy cập chức năng này");window.location = "'.nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name,true).'"';
		echo '</script>';
	}
}


// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;
	$count=count_transporters_shop($store_id,$id);
	
    if ($count > 0){
		$status_shop = check_status_transporters_shop($store_id,$id);
        $status = ($status_shop) ? 0 : 1;
		
		
		if(!$status)
		{
			// chuẩn bị cập nhật trạng thái nhà vận chuyển này = 0 nên trước khi cập nhật phải kiểm tra xem đơn vị vận chuyển đang bật = 1 phải có số lượng > 0
			$count_status1 = $db->query('SELECT count(t1.id) as count FROM ' . TABLE . '_transporters_shop t1, ' . TABLE . '_transporters t2 WHERE t1.transporters_id = t2.id AND t2.status = 1 AND t1.status = 1 AND t1.sell_id ='. $store_id)->fetchColumn();
			
			if($count_status1 <= 1)
			{
				$content = 'NO_' . $id;
				die($content);
			}
		}
		
        $query = 'UPDATE ' . TABLE . '_transporters_shop SET status=' . intval($status) . ' WHERE transporters_id=' . $id.' and sell_id='.$store_id;
        $db->query($query);
        $content = 'OK_' . $id;
    }else{
		$db->query('INSERT INTO ' . TABLE . '_transporters_shop(sell_id,transporters_id,status) VALUES('.$store_id.','.$id.',1)');
		$content = 'OK_' . $id;
	}
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/transporters/' . $row['image'])) {
    $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/transporters/' . $row['image'];
}

$where = '';
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
$parrent_id = $nv_Request->get_int( 'parrent_id', 'post,get', 0 );

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
 {
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
    $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_tu = 0;
}

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
 {
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
    $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_den = 0;
}

if ( $sea_flast != 9 ) {
    if ( $ngay_tu > 0 and $ngay_den > 0 )
 {

        $where .= ' AND t1.time_edit >= '. $ngay_tu . ' AND t1.time_edit <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_tu > 0 )
 {
        $where .= ' AND t1.time_edit >= '. $ngay_tu;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_den > 0 )
 {
        $where .= ' AND t1.time_edit <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    }

}
if ( $status_ft>-1 ) {
    $where .= ' AND t2.status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}
if ( !empty( $q ) ) {
    $where .= ' AND (t1.name_transporters LIKE "%" "'.$q. '" "%" OR t1.symbol_transporters LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}
// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 10;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(DISTINCT t1.id)')
        ->from('' . TABLE . '_transporters t1')
		->join('LEFT JOIN ' . TABLE . '_transporters_shop t2 ON t1.id=t2.transporters_id')
		->where('1=1'.$where.'  and t1.status=1');

    
    $sth = $db->prepare($db->sql());

    $sth->execute();

    $num_items = $sth->fetchColumn();

    $db->select('DISTINCT t1.*')
        ->order('t1.weight ASC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();
}
$xtpl = new XTemplate('transporters.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
if ( $ngay_tu > 0 )
$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
$type = array();
$type[] = array( 'id'=>0, 'text'=>'+' );
$type[] = array( 'id'=>1, 'text'=>'-' );

if ($show_view) {
   
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
	$real_week = nv_get_week_from_time( NV_CURRENTTIME );
    $week = $real_week[0];
    $year = $real_week[1];
    $this_year = $real_week[1];
    $time_per_week = 86400 * 7;
    $time_start_year = mktime( 0, 0, 0, 1, 1, $year );
    $time_first_week = $time_start_year - ( 86400 * ( date( 'N', $time_start_year ) - 1 ) );

    $tuannay = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week + $time_per_week - 1 ),
    );
    $tuantruoc = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week + $time_per_week - 2 ),
    );
    $tuankia = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week + $time_per_week - 3 ),
    );

    $thangnay = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of this month' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of this month' ) ),
    );
    $thangtruoc = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of last month' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of last month' ) ),
    );
    $namnay = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of january this year' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of december this year' ) ),
    );
    $namtruoc = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of january last year' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of december last year' ) ),
    );
    $xtpl->assign( 'TUANNAY', $tuannay );

    $xtpl->assign( 'TUANTRUOC', $tuantruoc );

    $xtpl->assign( 'TUANKIA', $tuankia );

    $xtpl->assign( 'HOMNAY', date( 'd-m-Y', NV_CURRENTTIME ) );
    $xtpl->assign( 'HOMQUA', date( 'd-m-Y', strtotime( 'yesterday' ) ) );
    $xtpl->assign( 'THANGNAY', $thangnay );

    $xtpl->assign( 'THANGTRUOC', $thangtruoc );

    $xtpl->assign( 'NAMNAY', $namnay );

    $xtpl->assign( 'NAMTRUOC', $namtruoc );

    if ( $sea_flast == '1' ) {
        $xtpl->assign( 'SELECT1', 'selected="selected"' );
    }
    if ( $sea_flast == '2' ) {
        $xtpl->assign( 'SELECT2', 'selected="selected"' );
    }
    if ( $sea_flast == '3' ) {
        $xtpl->assign( 'SELECT3', 'selected="selected"' );
    }
    if ( $sea_flast == '4' ) {
        $xtpl->assign( 'SELECT4', 'selected="selected"' );
    }
    if ( $sea_flast == '5' ) {
        $xtpl->assign( 'SELECT5', 'selected="selected"' );
    }
    if ( $sea_flast == '6' ) {
        $xtpl->assign( 'SELECT6', 'selected="selected"' );
    }
    if ( $sea_flast == '7' ) {
        $xtpl->assign( 'SELECT7', 'selected="selected"' );
    }
    if ( $sea_flast == '8' ) {
        $xtpl->assign( 'SELECT8', 'selected="selected"' );
    }
    if ( $sea_flast == '9' ) {
        $xtpl->assign( 'SELECT9', 'selected="selected"' );
    }
    $status_filt = array();
    $status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
    $status_filt[] = array( 'id'=>0, 'text'=>'Ngưng Hoạt động' );
    $status_filt[] = array( 'id'=>1, 'text'=>'Hoạt động' );

    foreach ( $status_filt as $filt_stt ) {
        if ( $filt_stt['id'] == $status_ft ) {
            $filt_stt['selected'] = 'selected';
        }
        $xtpl->assign( 'status_filt', $filt_stt );
        $xtpl->parse( 'main.view.status_filt' );
    }
    while ($view = $sth->fetch()) {
        $view['stt']=$number++;
		$count=count_transporters_shop($store_id,$view['id']);
		if($count == 0){
			$xtpl->assign('CHECK', '');
		}else{
			$status_shop=check_status_transporters_shop($store_id,$view['id']);
			$xtpl->assign('CHECK', $status_shop == 1 ? 'checked' : '');
		}
		if($view['type'] == 0){
			$view['money']='+ '.number_format($view['money']);
		}else{
			$view['money']='- '.number_format($view['money']);
		}
		$view['max_weight']=number_format($view['max_weight']);
		$view['max_length']=number_format($view['max_length']);
		$view['max_height']=number_format($view['max_height']);
		$view['max_width']=number_format($view['max_width']);
		if(empty($view['user_edit'])){
			$view['user_edit']='Chưa cập nhật';
			$view['time_edit']='Chưa cập nhật';
		}else{
			$view['user_edit']=get_info_user($view['user_edit'])['username'];
			$view['time_edit']=date('d/m/Y H:i',$view['time_edit']);
		}
		//print_r();die();
		if (!empty($view['image'])) {
			$view['image'] = $_SERVER["chonhagiau"] . NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/transporters/' . $view['image'];
		}else{
			$view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/No-image-news.png';
		}
        $view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['transporters'];
$array_mod_title[] = array(
	'catid' => 0,
	'title' => $page_title,
	'link' => NV_MY_DOMAIN .'/'. $module_name .'/'.$op.'/'
);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
