<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 24 Dec 2020 01:27:14 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$mod = $nv_Request->get_string('mod', 'post, get', 0);

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
	$q = $nv_Request->get_title( 'q', 'post,get' );
	$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
	$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
	$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
	$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
	$parrent_id = $nv_Request->get_int( 'parrent_id', 'post,get', 0 );
	$store_id = $nv_Request->get_int( 'store_id', 'post,get', 0 );

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

			$where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
		} else if ( $ngay_tu > 0 )
	 {
			$where .= ' AND time_add >= '. $ngay_tu;
		} else if ( $ngay_den > 0 )
	 {
			$where .= ' AND time_add <= '. $ngay_den;
		}

	}
	if ( $status_ft>-1 ) {
		$where .= ' AND status ='.$status_ft;
	}
	if ( !empty( $q ) ) {
		$where .= ' AND (name_product LIKE "%" "'.$q. '" "%")';
	}
	if($store_id>0){
		$where .= ' AND store_id ='.$store_id;
	}
	$db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . TABLE . '_product')
		->where('1=1'.$where);

    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('time_add DESC');
    $sth = $db->prepare($db->sql());
    $sth->execute();
	$data_array = array();
	$dataContent = array();
	$stt = 0;
	while ($view = $sth->fetch()) {
		$data_array['stt']=++$stt;
		$data_array['store_name']=get_info_store($view['store_id'])['company_name'].' (Người đại diện: '.get_info_store($view['store_id'])['name'].')';
		$data_array['barcode']=$view['barcode'];
		$data_array['name_product']=$view['name_product'];
		$data_array['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$view['alias'].'-'.$view['id'].'/';
		$data_array['categories_name'] =get_info_category($view['categories_id'])['name'];
		$data_array['weight_product']=$view['weight_product'];
		$data_array['unit_weight']=get_info_unit_weight($view['unit_weight'])['name_weight'];
		$data_array['length_product']=$view['length_product'];
		$data_array['unit_length']=get_info_unit_length($view['unit_length'])['name_length'];
		$data_array['width_product']=$view['width_product'];
		$data_array['unit_width']=get_info_unit_length($view['unit_width'])['name_length'];
		$data_array['height_product']=$view['height_product'];
		$data_array['unit_height']=get_info_unit_length($view['unit_height'])['name_length'];
		$view['group_list']=json_decode($view['group_list'],true);
		$data_array['name_group']=array();
		foreach($view['group_list'] as $key => $value){
			$name_group='';
			foreach($value['list_group'] as $key_group=>$value_group){
				if($name_group==''){
					$name_group=get_info_group($key_group)['name'].': '.get_info_group($value_group)['name'];
				}else{
					$name_group=$name_group.', '.get_info_group($key_group)['name'].': '.get_info_group($value_group)['name'];
				}
			}
			$data_array['name_group'][]=array(
				'name_group'=>$name_group,
				'price'=>$value['price']*get_info_currency($value['unit_currency'])['exchange'],
				'price_special'=>$value['price_special']*get_info_currency($value['unit_currency'])['exchange'],
				'group_list'=>json_encode($value['list_group']),
				'product_id'=>$view['id'],
				'store_id'=>$view['store_id']
			);
		}
		$dataContent[] = $data_array;	
	}
		$page_title = 'DANH SÁCH SẢN PHẨM';

		$Excel_Cell_Begin = 6; // Dong bat dau viet du lieu

		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/product_shopsfull.xlsx');
 
		$worksheet = $spreadsheet->getActiveSheet();
		
		$worksheet->setTitle( $page_title );

		// Set page orientation and size
		$worksheet->getPageSetup()->setOrientation( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
		$worksheet->getPageSetup()->setPaperSize( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4 );
		$worksheet->getPageSetup()->setHorizontalCentered( true );


		$spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
		

		
			// Du lieu
		$array_key_data = array();
		$array_key_data[] = 'stt';
		$array_key_data[] = 'store_name';
		$array_key_data[] = 'barcode';
		$array_key_data[] = 'name_product';
		$array_key_data[] = 'alias';
		$array_key_data[] = 'categories_name';
		$array_key_data[] = 'weight_product';
		$array_key_data[] = 'unit_weight';
		$array_key_data[] = 'length_product';
		$array_key_data[] = 'unit_length';
		$array_key_data[] = 'width_product';
		$array_key_data[] = 'unit_width';
		$array_key_data[] = 'height_product';
		$array_key_data[] = 'unit_height';
		$array_key_data[] = 'name_group';
		$pRow = $Excel_Cell_Begin+1;
		
		foreach( $dataContent as $row )
		{
			
			$columnIndex2 = 0;

			foreach( $array_key_data as $key_data )
			{

				if($key_data == 'name_group'){

					foreach($row[$key_data] as $key=>$value){
						if($key>0){
							$columnIndex2 = $columnIndex2-6;
						}			
						$count=get_count_warehouse_store($value['store_id']);
						$highestRow_all=$pRow-1+$count;
						
						$columnIndex2=$columnIndex2+1;
						$TextColumnIndex1 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
						$highestColumn1 = $TextColumnIndex1; 
						$highestRow = $pRow; 
						$worksheet->setCellValue( $TextColumnIndex1 . $pRow, $value['name_group'] );
						$spreadsheet->getActiveSheet()->getStyle('A' . $Excel_Cell_Begin . ':' . $highestColumn1 . $highestRow_all)->getBorders()->applyFromArray( 
							[ 
								'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							]);
						$spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex1 . $pRow . ':' . $highestColumn1 . $highestRow_all);
						$columnIndex2=$columnIndex2+1;
						$TextColumnIndex2 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );

						$highestColumn2 = $TextColumnIndex2; 
						$highestRow = $pRow; 
						$worksheet->setCellValue( $TextColumnIndex2 . $pRow, $value['price'] );
						$spreadsheet->getActiveSheet()->getStyle('A' . $Excel_Cell_Begin . ':' . $highestColumn2 . $highestRow)->getBorders()->applyFromArray( 
							[ 
								'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							]);
						$spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex2 . $pRow . ':' . $highestColumn2 . $highestRow_all);
						$columnIndex2=$columnIndex2+1;
						$TextColumnIndex2 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );

						$highestColumn2 = $TextColumnIndex2; 
						$highestRow = $pRow; 
						$worksheet->setCellValue( $TextColumnIndex2 . $pRow, $value['price_special'] );
						$spreadsheet->getActiveSheet()->getStyle('A' . $Excel_Cell_Begin . ':' . $highestColumn2 . $highestRow_all)->getBorders()->applyFromArray( 
							[ 
								'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							]);
						$spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex2 . $pRow . ':' . $highestColumn2 . $highestRow_all);

						$list_warehouse=get_warehouse_store($value['store_id']);
						foreach($list_warehouse as $key=>$value_warehouse){
							if($key>0){
								$columnIndex2=$columnIndex2-3;
							}
							$inventory=get_info_invetory_group($value['product_id'],$value_warehouse['id'],$value['group_list']);
							if(empty($inventory)){
								$inventory['amount']=0;
								$inventory['amount_delivery']=0;
							}

							$columnIndex2=$columnIndex2+1;
							$TextColumnIndex2 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
							$highestColumn2 = $TextColumnIndex2; 
							$highestRow = $pRow; 
							$worksheet->setCellValue( $TextColumnIndex2 . $pRow, $value_warehouse['name_warehouse'] );
							$spreadsheet->getActiveSheet()->getStyle('A' . $highestRow . ':' . $highestColumn2 . $highestRow)->getBorders()->applyFromArray( 
								[ 
									'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								]);
							$columnIndex2=$columnIndex2+1;
							$TextColumnIndex2 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );

							$highestColumn2 = $TextColumnIndex2; 
							$highestRow = $pRow; 
							$worksheet->setCellValue( $TextColumnIndex2 . $pRow, $inventory['amount'] );
							$spreadsheet->getActiveSheet()->getStyle('A' . $highestRow . ':' . $highestColumn2 . $highestRow)->getBorders()->applyFromArray( 
								[ 
									'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								]);
							$columnIndex2=$columnIndex2+1;
							$TextColumnIndex2 = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );

							$highestColumn2 = $TextColumnIndex2; 
							$highestRow = $pRow; 
							$worksheet->setCellValue( $TextColumnIndex2 . $pRow, $inventory['amount_delivery'] );
							$spreadsheet->getActiveSheet()->getStyle('A' . $highestRow . ':' . $highestColumn2 . $highestRow)->getBorders()->applyFromArray( 
								[ 
									'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
									'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
								]);
							$pRow++;
						}
						
					}
				}else{
					++$columnIndex2;
					$TextColumnIndex = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex( $columnIndex2 );
					$highestColumn = $TextColumnIndex; 

					$highestRow = $pRow; 
					$count=0;
					foreach($row['name_group'] as $key=>$value){
						$count=$count+get_count_warehouse_store($value['store_id']);
					}
					$highestRow_all=$pRow-1+$count;

					$worksheet->setCellValue( $TextColumnIndex . $pRow, $row[$key_data] );
					$spreadsheet->getActiveSheet()->getStyle('A' . $Excel_Cell_Begin . ':' . $highestColumn . $highestRow_all)->getBorders()->applyFromArray( 
						[ 
							'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
							'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
						]);
					 $spreadsheet->getActiveSheet()->mergeCells($TextColumnIndex . $pRow . ':' . $highestColumn . $highestRow_all);
				}
			}
		}
		$spreadsheet->getActiveSheet()->getStyle('A' . $Excel_Cell_Begin . ':' . $highestColumn2 . $highestRow)->getBorders()->applyFromArray( 
			[ 
				'bottom' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
				'top' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
				'left' => [ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
				'right' => 	[ 'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [ 'rgb' => '000000' ] ], 
			]);




		$file_name = 'danh_sach_sanpham.xlsx';
		
		$file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
		
		header( 'Content-Type: application/vnd.ms-excel' );
		header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
		header( 'Cache-Control: max-age=0' );

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save($file_path);
		$link = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  
		
		nv_jsonOutput( array('link'=> $link) );		
		
}
// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . TABLE . '_product WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . TABLE . '_product SET status=' . intval($status) . ' WHERE id=' . $id;
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('ajax_action', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_vid = $nv_Request->get_int('new_vid', 'post', 0);
    $content = 'NO_' . $id;
    if ($new_vid > 0)     {
        $sql = 'SELECT id FROM ' . TABLE . '_product WHERE id!=' . $id . ' ORDER BY weight ASC';
        $result = $db->query($sql);
        $weight = 0;
        while ($row = $result->fetch())
        {
            ++$weight;
            if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . TABLE . '_product SET weight=' . $weight . ' WHERE id=' . $row['id'];
            $db->query($sql);
        }
        $sql = 'UPDATE ' . TABLE . '_product SET weight=' . $new_vid . ' WHERE id=' . $id;
        $db->query($sql);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $weight=0;
        $sql = 'SELECT weight FROM ' . TABLE . '_product WHERE id =' . $db->quote($id);
        $result = $db->query($sql);
        list($weight) = $result->fetch(3);
        
        $db->query('DELETE FROM ' . TABLE . '_product  WHERE id = ' . $db->quote($id));
        if ($weight > 0)         {
            $sql = 'SELECT id, weight FROM ' . TABLE . '_product WHERE weight >' . $weight;
            $result = $db->query($sql);
            while (list($id, $weight) = $result->fetch(3))
            {
                $weight--;
                $db->query('UPDATE ' . TABLE . '_product SET weight=' . $weight . ' WHERE id=' . intval($id));
            }
        }
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Product', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$where = '';
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
$parrent_id = $nv_Request->get_int( 'parrent_id', 'post,get', 0 );
$store_id = $nv_Request->get_int( 'store_id', 'post,get', 0 );

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

        $where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_tu > 0 )
 {
        $where .= ' AND time_add >= '. $ngay_tu;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_den > 0 )
 {
        $where .= ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    }

}
if ( $status_ft>-1 ) {
    $where .= ' AND status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}
if ( !empty( $q ) ) {
    $where .= ' AND (name_product LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}
if($store_id>0){
	$where .= ' AND store_id ='.$store_id;
    $base_url .= '&store_id=' . $store_id;
}
// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . TABLE . '_product')
		->where('1=1'.$where);

    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('time_add DESC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();
}

$xtpl = new XTemplate('product.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('Q', $q);
$xtpl->assign('product_add', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_add');
if ( $ngay_tu > 0 )
$xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
$xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );

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

        for($i = 1; $i <= $num_items; ++$i) {
            $xtpl->assign('WEIGHT', array(
                'key' => $i,
                'title' => $i,
                'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
            $xtpl->parse('main.view.loop.weight_loop');
        }
		$view['user_add']=get_info_user($view['user_add'])['username'];
		$view['time_add']=date('d/m/Y H:i',$view['time_add']);
		if(empty($view['user_edit'])){
			$view['user_edit']='Chưa cập nhật';
			$view['time_edit']='Chưa cập nhật';
		}else{
			$view['user_edit']=get_info_user($view['user_edit'])['username'];
			$view['time_edit']=date('d/m/Y H:i',$view['time_edit']);
		}
		$list_store=get_warehouse_store($view['store_id']);
		$view['amount_total']=0;
		foreach($list_store as $value){
			$list_product=get_info_invetory($view['id'],$value['id']);
			$check_no=0;
			if(empty($list_product)){
				$list_product=get_info_invetory_no($view['id'],$value['id']);
				$check_no=1;
			}
			$xtpl->assign('LOOP_STORE', $value);
			if(empty($list_product)){
				$xtpl->parse('main.view.loop.store.noproduct');
				$xtpl->parse('main.view.loop.store2.noproduct');
			}else{
				
				foreach($list_product as $value_product){
					
					if($value_product['classify_value_product_id']>0){
						$classify_value_product_id=get_info_classify_value_product($value_product['classify_value_product_id']);
						$classify_id_value1=get_info_classify_value($classify_value_product_id['classify_id_value1']);
						$name_classify_id_value1=get_info_classify($classify_id_value1['classify_id'])['name_classify'].' '.$classify_id_value1['name'];
						if($classify_value_product_id['classify_id_value2']>0){
							$classify_id_value2=get_info_classify_value($classify_value_product_id['classify_id_value2']);
							$name_classify_id_value2=get_info_classify($classify_id_value2['classify_id'])['name_classify'].' '.$classify_id_value2['name'];
							$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
						}else{
							$name_group=$name_classify_id_value1;
						}
						$value_product['name_product_rutgon']=nv_clean60($view['name_product'].' ('.$name_group.')',60);
						$value_product['name_group']=$name_group;
					}else{
						
						$value_product['name_product_rutgon']=nv_clean60($view['name_product'],60);
						$value_product['name_group']='';
					}
					if($check_no==0){
						if($value_product['status']==1){
							$value_product['status']='Hoạt động';
						}else{
							$value_product['status']='Đang ngưng bán';
						}
					}else{
						$value_product['status']='Hoạt động';
					}
					$view['amount_total']=$view['amount_total']+$value_product['amount'];
					$value_product['amount']=number_format($value_product['amount']);
					$value_product['amount_delivery']=number_format($value_product['amount_delivery']);
					$value_product['name_product']=$view['name_product'];
	
					
					$xtpl->assign('LOOP_PRODUCT', $value_product);
					$xtpl->parse('main.view.loop.store.product');
					$xtpl->parse('main.view.loop.store2.product');
				}
			}
			
			$xtpl->parse('main.view.loop.store');
			$xtpl->parse('main.view.loop.store2');
		}
		$view['amount_total']=number_format($view['amount_total']);
		$view['store_id']=get_info_store($view['store_id'])['company_name'].' (Người đại diện: '.get_info_store($view['store_id'])['name'].')';
		$view['alias'] = NV_MY_DOMAIN .'/'. $module_name .'/'.$view['alias'].'-'.$view['id'].'/';
		$view['categories_id'] =get_info_category($view['categories_id'])['name'];
		if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $view['image'])) {
			$view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $view['image'];
		}
        $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
		$view['link_import_warehouse'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_import_warehouse&amp;id=' . $view['id'];
        $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_add&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);
		
		
        $xtpl->parse('main.view.loop');
    }
	$list_store=get_full_store();
	foreach($list_store as $value){
		$xtpl->assign('store_id', array(
		   'key' => $value['id'],
		   'title' => $value['company_name'].' (Người đại diện: '.$value['name'].')',
		   'selected' => ($value['id'] == $store_id) ? ' selected="selected"' : ''));
		$xtpl->parse('main.view.store_id');
	}
    $xtpl->parse('main.view');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['product'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
