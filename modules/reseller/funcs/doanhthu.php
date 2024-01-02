<?php
	if (!defined('NV_IS_MOD_RESELLER'))
	die('Stop!!!');
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
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
	$keyword = $nv_Request->get_title( 'keyword', 'post,get' );
	$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get','' );
	$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get','' );
	$where = '';
	
	
	if ( !empty( $keyword ) ) {
		$where .= ' AND (t3.name_product LIKE "%'.$keyword. '%" OR t3.keyword LIKE "%'.$keyword. '%" OR t3.barcode LIKE "%'.$keyword. '%")';
		$base_url .= '&keyword=' . $keyword;
	}
	
	
	
	
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
		}else {
		$ngay_den = 0;
	}
	
	
	if($ngay_tu)
	{
		$where .= ' AND t1.time_add >= '. $ngay_tu;
		$base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu );
	}
	
	
	if($ngay_den)
	{
		$where .= ' AND t1.time_add <= '. $ngay_den;
		$base_url .= '&ngay_den=' . date( 'd-m-Y', $ngay_den );
	}
	
	
	
	$mod = $nv_Request->get_title('mod', 'post,get','');
	
	if($mod == 'download')
	{
		$file_name = $nv_Request->get_string( 'file_name', 'get', '' );
		
		$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
		
		if( file_exists( $file_path ) )
		{
			header( 'Content-Description: File Transfer' );
			header( 'Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
			header( 'Content-Disposition: attachment; filename=' . $file_name );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Expires: 0' );
			header( 'Cache-Control: must-revalidate' );
			header( 'Pragma: public' );
			header( 'Content-Length: ' . filesize( $file_path ) );
			readfile( $file_path );
			// ob_clean();
			flush();
			nv_deletefile( $file_path );
			
			exit();
		}else
		{
			die('File not exists !');
		}
	}
	
	
	if($mod=='is_download'){
		ini_set( 'memory_limit', '512M' );
		set_time_limit( 0 );
		
		// hiển thị thông tin chi tiết đơn hàng
		$db->sqlreset()
		->select('COUNT(*)')
		->from( TABLE . '_order t1, ' . TABLE . '_order_item t2, ' . TABLE . '_product t3')
		->where('t1.id = t2.order_id AND t2.product_id = t3.id AND (t1.status BETWEEN 1 AND 7) AND t1.store_id ='. $store_id . $where)
		->group('t2.product_id');
		//die($db->sql());
		$sth = $db->prepare($db->sql());
		
		
		
		$sth->execute();
		$num_items = $sth->fetchColumn();
		
		$db->select('t3.id, t3.alias, t3.name_product, t3.image, t3.barcode, sum(t2.total) as total, sum(t2.quantity) as quantity')
		->order('t1.id DESC');
		$sth = $db->prepare($db->sql());
		//die($db->sql());
		$sth->execute();
		
		$stt = 1;
		
		$dataContent = array();
		
		$tong_doanhthu = 0;
		
		while ($view = $sth->fetch()) {		
			
			$data_array = array();
			$data_array['stt'] = $stt;
			
			
			$data_array['image']  =NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'] ;
			
			$data_array['name_product'] = $view['name_product'];
			$data_array['total'] = $view['total'];
			$tong_doanhthu += $view['total'];
			
			$data_array['quantity'] = $view['quantity'];
			
			$dataContent[] = $data_array;
			
			$stt++;
		}
		
		
		$page_title = 'Doanh thu';
		
		$Excel_Cell_Begin = 6; // Dong bat dau viet du lieu
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/doanhthu.xlsx');
		
		$worksheet = $spreadsheet->getActiveSheet();
		
		$worksheet->setTitle( $page_title );
		
		// Set page orientation and size
		$worksheet->getPageSetup()->setOrientation( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
		$worksheet->getPageSetup()->setPaperSize( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4 );
		$worksheet->getPageSetup()->setHorizontalCentered( true );
		
		
		$spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
		
		
		
		// Thông tin seller
		$title_doanhthu = 'Cửa hàng : '. $global_seller['company_name'];
		$pRow = 2;
		$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( 1 );
		$worksheet->setCellValue( $TextColumnIndex . $pRow, $title_doanhthu );
		
		
		
		// 20/10/2021 - 28/10/2021
		
		$ngay = 'Thời gian : ';
		
		if($ngay_tu)
		{
			$ngay .= date('d/m/Y',$ngay_tu);
		}
		if($ngay_den)
		{
			$ngay .= ' - ' . date('d/m/Y',$ngay_den);
		}
		
		if(!$ngay_tu and !$ngay_den)
		$ngay .= 'Toàn thời gian';
		
		
		
		// thời gian
		$pRow = 3;
		$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( 1 );
		$worksheet->setCellValue( $TextColumnIndex . $pRow, $ngay );
		
		
		
		// tổng doanh thu $tong_doanhthu
		$title_doanhthu = 'Tổng doanh thu : '. number_format($tong_doanhthu,0,",",".");
		$pRow = 4;
		$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( 1 );
		$worksheet->setCellValue( $TextColumnIndex . $pRow, $title_doanhthu );
		
		
		// Du lieu
		$array_key_data = array();
		$array_key_data[] = 'stt';
		$array_key_data[] = 'name_product';
		$array_key_data[] = 'total';
		$array_key_data[] = 'quantity';
		
		$pRow = $Excel_Cell_Begin;
		
		foreach ($dataContent as $row) 
		{
			$columnIndex2 = 0;
			$pRow++;
			foreach( $array_key_data as $key_data )
			{
				++$columnIndex2;
				$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
				$highestColumn = $TextColumnIndex; 
				$highestRow = $pRow; 
				
				$worksheet->setCellValue( $TextColumnIndex . $pRow, $row[$key_data] );
				
				/*
					$drawing = new PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
					$drawing->setPath($row[$key_data]); // put your path and image here
					$drawing->setCoordinates('D11');
					
					$drawing->setWorksheet($worksheet);
					
					$drawing->setWidthAndHeight(158, 72);
					$drawing->setResizeProportional(true);
					
					$drawing->setOffsetX(10);    // this is how
					$drawing->setOffsetY(3);
				*/
			}
		}
		
		$file_name = 'Doanh thu '. date('d-m-Y',NV_CURRENTTIME).'.xlsx'; 
		
		$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
		
		header( 'Content-Type: application/vnd.ms-excel' );
		header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
		header( 'Cache-Control: max-age=0' );
				
				$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
				$writer->save($file_path);
				
				$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  
				
				die($link);	
				
	}
	
	$xtpl = new XTemplate( 'doanhthu.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme'] );
	
	$xtpl->assign( 'keyword', $keyword );
	
	if ( $ngay_tu > 0 )
	$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
	if ( $ngay_den > 0 )
	$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
	
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
	
	// Doanh thu
	$db->sqlreset()
	->select('sum(t2.total) as total')
	->from( TABLE . '_order t1, ' . TABLE . '_order_item t2, ' . TABLE . '_product t3')
	->where('t1.id = t2.order_id AND t2.product_id = t3.id AND (t1.status BETWEEN 1 AND 7) AND t1.store_id ='. $store_id . $where);
	//die($db->sql());
	$sth = $db->prepare($db->sql());
	
    $sth->execute();
    $total_product = $sth->fetchColumn();
	
	$total_product = number_format($total_product);
	$xtpl->assign('DOANHTHU', $total_product);
	
	// hiển thị thông tin chi tiết đơn hàng
	$per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
	->select('COUNT(*)')
	->from( TABLE . '_order t1, ' . TABLE . '_order_item t2, ' . TABLE . '_product t3')
	->where('t1.id = t2.order_id AND t2.product_id = t3.id AND (t1.status BETWEEN 1 AND 7) AND t1.store_id ='. $store_id . $where)
	->group('t2.product_id');
	//die($db->sql());
	$sth = $db->prepare($db->sql());
	
    $sth->execute();
    $data_item = $sth->fetchAll();
	$num_items = count($data_item);
	
    $db->select('t3.id, t3.alias, t3.name_product, t3.image, t3.barcode, sum(t2.total) as total, sum(t2.quantity) as quantity')
	->order('t1.id DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());
	$sth->execute();
	
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
	}
	
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
	
	while ($view = $sth->fetch()) {
		
		$view['number'] = $number++;
		$view['total'] = number_format( $view['total'] );
		$view['quantity'] = number_format( $view['quantity'] );
		
		$view['alias'] = $_SERVER["chonhagiau"] . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $view['alias'] . '-' . $view['id'], true);
		
		if (!empty($view['image'] ) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'] )) {
			$view['image']  = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'] ;
			}else{
			$server = 'banhang.'.$_SERVER["SERVER_NAME"];
			$view['image']  ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $view['image'] ;
		}
		
		$xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
	}
	
	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';