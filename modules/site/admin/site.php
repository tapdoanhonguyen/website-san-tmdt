<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2016 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 14 Nov 2016 07:52:12 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$contents='';
$max_idsite = $db->query('SELECT AUTO_INCREMENT max_id
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = "'. $db_config['dbsystem'] .'"
AND TABLE_NAME = "' .$db_config['prefix'] . '_' . $module_data . '"')->fetch(5)->max_id;
if ( defined( 'NV_IS_ADMIN' ) ) {
	$error = array();
        $row=array();
        $row['cid'] = $nv_Request->get_int( 'cid', 'post', 1 );
        $row['title'] = $nv_Request->get_title( 'title', 'post', '' );
        $row['domain'] = $nv_Request->get_title( 'domain', 'post', '' );
        $row['parked_domains'] = $nv_Request->get_title( 'parked_domains', 'post', '' );
        $row['site_dir'] = $nv_Request->get_title( 'site_dir', 'post', '' );
        $row['allowuserreg'] = $nv_Request->get_int( 'allowuserreg', 'post', 0 );
        $row['username'] = $nv_Request->get_title( 'username', 'post', '' );
        $row['password'] = $nv_Request->get_title( 'password', 'post', '' );
        $row['repassword'] = $nv_Request->get_title( 'repassword', 'post', '' );
        $row['StoreName'] = $nv_Request->get_title( 'domain', 'post', '' );
        $row['hovaten'] = $nv_Request->get_title( 'hovaten', 'post', '' );
        $row['email'] = $nv_Request->get_title( 'email', 'post', '' );
        $row['idsite']=$nv_Request->get_int( 'idsite', 'post,get', 0 );
        $row['userid']=$nv_Request->get_int( 'userid', 'post,get', 0 );
        $row['data']=$nv_Request->get_title( 'data', 'post,get', 0 );
        $row['businesstypeid']=$nv_Request->get_int( 'businesstypeid', 'post', 0 );
        $row['sample']=$nv_Request->get_title( 'sample', 'post', 'default' );
        $row['domaintype']=$nv_Request->get_title( 'domaintype', 'post', 'subdomain' );
        $row['subdomain']=$nv_Request->get_title( 'subdomain', 'post', '' );
        $row['extend_tmp']=$nv_Request->get_title( 'extend', 'post', '' );
        $row['catid']=$nv_Request->get_int( 'catid', 'post', 1 );
        $row['not_extend']=$nv_Request->get_int( 'not_extend', 'post', 0 );
  		if($array_config['cpaneltype'] == 'cpanel'){
            $row['dbsite'] = $array_config['prefix_user'].'_'.$max_idsite;
        }elseif($array_config['cpaneltype'] == 'directadmin'){
            $row['dbsite'] = $max_idsite;
        }else{
        	$row['dbsite']=$max_idsite ;
        }
        if(!empty($array_config['prefix_user']))
        	
        
                      
		if($row['not_extend'] > 1){
			
			$row['extend']=0;
		}else{
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $row['extend_tmp'], $m)) {
				$phour = $nv_Request->get_int('phour', 'post', 0);
				$pmin = $nv_Request->get_int('pmin', 'post', 0);
				$row['extend'] = mktime($phour, $pmin, 0, $m[2], $m[1], $m[3]);
			} else {
				$row['extend'] = 0;
			}
		}
		$action=$nv_Request->get_string( 'action', 'get', '' );
		$csid=$nv_Request->get_int( 'csid', 'post', 0 );
	if ( $nv_Request->isset_request( 'save', 'post' ) )
	{
      	$row['domainold'] = '';
		if(!empty($action)){
			if($action == 'add_site'){
				//$error=create_sub_website($row);
              
				$array_data=array();
				$array_data['result'] = "OKE";
				$create_website=create_sub_website($row);
				$array_data['status'] = $create_website['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $create_website['idsite'];
				nv_jsonOutput($array_data);
				die;
			}
			if($action == 'create_config'){
				$row['idsite']=$csid;
				//$error=create_sub_website($row);
				$array_data=array();
				$array_data['result'] = "OKE";
				$site_install = site_install($row);
				$array_data['status'] = $site_install['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $$site_install['idsite'];
				nv_jsonOutput($array_data);
				die;
			}
			if($action == 'create_database'){
				$row['idsite']=$csid;
				//$error=create_sub_website($row);
				$array_data=array();
				$array_data['result'] = "OKE";
				//$array_data['domain'] = 'http://' . $row['StoreName'] . '/admin/index.php';
				$create_database = site_install_create_databasse($row);
				$array_data['status'] = $create_database['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $create_database['idsite'];
				nv_jsonOutput($array_data);
				die;
			}
			if($action == 'insert_database'){
				//$row['idsite']=$csid;
				//$error=create_sub_website($row);
				$array_data=array();
				$array_data['result'] = "OKE";
				$insert_database = insert_database($row);
				$array_data['status'] = $insert_database['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $insert_database['idsite'];
				nv_jsonOutput($array_data);
				die;
			}
			if($action == 'add_admin'){
				$row['idsite']=$csid;
				//$error=create_sub_website($row);
				$array_data=array();
				$array_data['result'] = "OKE";
				$add_admin = add_admin($row);
				$array_data['status'] = $add_admin['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $insert_database['idsite'];
				nv_jsonOutput($array_data);
				die;
			}
			if($action == 'add_domain'){
				$row['idsite']=$csid;
				//$error=create_sub_website($row);
				$array_data=array();
				$array_data['result'] = "OKE";
				$array_data['domain'] = 'http://' . $row['StoreName'] . '/admin/index.php';
				$add_domain_site = add_domain_site($row);
				$array_data['status'] = $add_domain_site['status'];
				$array_data['domain'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=go&idsite=' .  $add_domain_site['idsite'] . '&admin=1';
				$nv_Cache->delAll();
				nv_jsonOutput($array_data);
				die;
			}
		}
           
		
	}
	elseif( $row['idsite'] > 0 )
	{
		$row = $db->query( 'SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' WHERE idsite=' . $row['idsite'] )->fetch();
		$row['domainold']=$row['domain'];
		$msite_user = $db->query( 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid=' . $row['admin_id'] )->fetch();
		$row['username']=$msite_user['username'];
		$row['email']=$msite_user['email'];
		if( empty( $row ) )
		{
			Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op );
			die();
		}
	}
	else
	{
		$row['idsite'] = 0;
		$row['cid'] = 0;
		$row['domain'] = '';
		$row['subdomain'] = '';
		$row['domaintype'] = '';
		$row['email'] = '';
		if(empty($row['domainold']))
			$row['domainold']=$array_config['my_domains'];
      	if(!empty($array_config['prefix_user']))
			$row['dbsite'] = $array_config['prefix_user'].'_'.$max_idsite;
      	else{
			$row['dbsite']='';
        }
		$row['allowuserreg']=0;
		$row['sample']='default';
		//if($row['extend']){
			$row['extend'] = date("d/m/Y",NV_CURRENTTIME+60*60*24*365);
		//}
		
	}
	$array_cid_site = array();
	$_sql = 'SELECT cid,title FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_cat';
	$_query = $db->query( $_sql );
	while( $_row = $_query->fetch() )
	{
		$array_cid_site[$_row['cid']] = $_row;
	}

	
	$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
	$xtpl->assign( 'LANG', \NukeViet\Core\Language::$lang_module );
	$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
	$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
	$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
	$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
	$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
	$xtpl->assign( 'MODULE_NAME', $module_name );
	$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
	$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
	$xtpl->assign( 'NV_SERVER_NAME', NV_SERVER_NAME );
	$xtpl->assign( 'OP', $op );
	if(!empty($array_config['alow_multi'])){
		if(!empty($array_config['prefix_user']))
			$row['username'] = $array_config['prefix_user'].'_'.$max_idsite;
		else
			$row['username'] = 'nv_'.$max_idsite;
		if( $row['idsite'] == 0 )
		{
			$xtpl->parse( 'main.add.password' );
		}
		
		if($row['domaintype']=="subdomain" )
		{
			$xtpl->parse( 'main.add.subdomain' );
		}
			$row['checked']=($row['allowuserreg']===1)?"checked":'';
		$xtpl->assign( 'ROW', $row );
		if( $row['idsite'] > 0 )
		{
			$xtpl->assign( 'DISABLE', '  disabled' );
			$xtpl->parse( 'main.add.domainold' );
		}else{
			$xtpl->assign( 'DISABLE', '' );
		}
		foreach( $array_domaintype as $key => $value )
		{
			$xtpl->assign( 'DOMAINTYPE', array(
				'key' => $key,
				'title' => $value,
				'selected' => ($key == $row['domaintype']) ? ' selected="selected"' : ''
			) );
			$xtpl->parse( 'main.add.domaintype' );
		}
		foreach( $array_cid_site as $value )
		{
			$xtpl->assign( 'OPTION', array(
				'key' => $value['cid'],
				'title' => $value['title'],
				'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
			) );
			$xtpl->parse( 'main.add.select_cid' );
		}
		if(defined('NV_CONFIG_DIR')){
			if (is_dir(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data')) {
				$datasample = scandir(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data');
				foreach ($datasample as $file) {
					if (preg_match('/([a-zA-Z0-9\_\-]+)\.php$/', $file, $m)) {
						$samples = array( //
							'key' => $m[1], //
							'selected' => ($row['data'] == $m[1]) ? " selected=\"selected\"" : "", //
							'title' => $m[1]
						); //
						
						$xtpl->assign('SAMPLE', $samples);
						$xtpl->parse('main.add.select_sample');
					}
				}
			}
		}
		/* foreach( $array_samples_data as $key => $value  )
		{
			$value = substr(substr($value, 0, -4), 5);
			$xtpl->assign( 'SAMPLE', array(
				'key' => $value,
				'title' => $value,
				'selected' => ($value == $row['sample']) ? ' selected="selected"' : ''
			) );
			$xtpl->parse( 'main.add.select_sample' );
		} */
		$xtpl->parse( 'main.add' );
	}else{
		$error[] = $nv_Lang->getModule('error_multi');
	}
	if( ! empty( $error ) )
	{
		$xtpl->assign( 'ERROR', implode( '<br />', $error ) );
		$xtpl->parse( 'main.error' );
	}

	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
	$page_title = $nv_Lang->getModule('add');
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';