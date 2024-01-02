<?php
/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */
// Categories
//require realpath(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME);
$array_domaintype=array('domain'=>'domain');
$array_cpaneltype=array('directadmin'=>'Directadmin','cpanel'=>'Cpanel','vestacp'=>'vestacp');
$array_samples_disable=array();
$array_samples_disable_tmp=array();
$array_samples_disable[]='default';
$array_config=array();
$global_array_site =array();
$sql = 'SELECT config_name, config_value FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_config';
$result = $db->query($sql);
while (list($c_config_name, $c_config_value) = $result->fetch(3)) {
    $array_config[$c_config_name] = $c_config_value;
}
$sql = 'SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '';
$result = $db->query($sql);
while ($row = $result->fetch(5)) {
    $global_array_site[$row->idsite] = $row;
}
$array_samples_data = nv_scandir(NV_ROOTDIR . '/'.NV_ASSETS_DIR.'/site/data', '/^data\_([a-z0-9]+)\.php$/');

foreach($array_samples_disable as $samples_disable){
	$array_samples_disable_tmp[] = 'data_' . $samples_disable . '.php';
} 
$array_samples_data = array_diff($array_samples_data,$array_samples_disable_tmp);
function hqc_trim($str){
        $str=mb_ereg_replace('(^\s+)|(\s+$)',"", mb_ereg_replace('\s\s+'," ", $str));
        return $str;
}
function splitHoten($hoten){
    $hoten=" ".hqc_trim($hoten);

    $index=mb_strripos ($hoten," ",0,"utf-8");

    $ten=mb_substr($hoten,$index+1,mb_strlen($hoten)-$index-1,"utf-8");

    $ho=hqc_trim(mb_substr($hoten,1,$index));

    return array("ho"=>$ho,"ten"=>$ten);

}
function nv_del_folder($dir){
    global $global_config,$array_config;
    preg_match('/public_html.*/', NV_ROOTDIR, $matches);
    $root_dir=$matches[0].'/';
    $ftp_server = nv_unhtmlspecialchars($global_config['ftp_server']);
    $ftp_port = intval($global_config['ftp_port']);
    $ftp_user_name = nv_unhtmlspecialchars($array_config['cpanel_ftp_user_name']);
    $ftp_user_pass = nv_unhtmlspecialchars($array_config['cpanel_ftp_user_pass']);
    $ftp_path = nv_unhtmlspecialchars($global_config['ftp_path']);
    // Ket noi, dang nhap
    $ftp = new NukeViet\Ftp\Ftp($ftp_server, $ftp_user_name, $ftp_user_pass, array( 'timeout' => 10 ), $ftp_port);
    $check = nv_ftp_del_dir($ftp, $root_dir.$dir, true);
    return $check;
}
/*
   nv_copy_folder(NV_ROOTDIR . '/themes/default/',NV_ROOTDIR . '/themes/abc/');
 */
function nv_copy_folder($source,$destination){
    $files=nv_scandir($source,'//');
    foreach($files as $name){
        if(is_file($source.$name)){
            nv_copyfile($source.$name,$destination.$name);
        }
        else if(is_dir($source.$name)){
            nv_mkdir($destination,$name);
            nv_copy_folder($source.$name.'/',$destination.$name.'/');
            
        }
    }
    return true;
}
function nv_check_exist_domain($domain){
    global $db,$db_config,$lang_module,$module_data, $nv_Lang;
    $num=$db->query("SELECT COUNT(*) FROM " .$db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data." WHERE domain='".$domain."'")->fetchColumn();
    return (intval($num)===0)?'':$nv_Lang->getModule('exist_domain');
}
function nv_check_exist_dbsite($dbsite){
    global $db,$db_config,$lang_module,$module_data, $nv_Lang;
    $num=$db->query("SELECT COUNT(*) FROM " .$db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data." WHERE dbsite='".$dbsite."'")->fetchColumn();
    return (intval($num)===0)?'':$nv_Lang->getModule('exist_csdl');
}
function nv_check_exist_email($email){
    global $db,$db_config,$lang_module,$module_data, $nv_Lang;
    $num=$db->query("SELECT COUNT(*) FROM " . NV_USERS_GLOBALTABLE ." WHERE email='".$email."'")->fetchColumn();
    return (intval($num)===0)?'': sprintf($nv_Lang->getModule('account_registered_name'), $email);
}
function nv_check_username_reg($login)
{
    global $db, $nv_Lang, $lang_module, $global_users_config, $global_config;

    $error = nv_check_valid_login($login, $global_config['nv_unickmax'], $global_config['nv_unickmin']);
    if ($error != '') {
        return preg_replace('/\&(l|r)dquo\;/', '', strip_tags($error));
    }
    if ("'" . $login . "'" != $db->quote($login)) {
        return sprintf($nv_Lang->getModule('account_deny_name'), $login);
    }

    if (! empty($global_users_config['deny_name']) and preg_match('/' . $global_users_config['deny_name'] . '/i', $login)) {
        return sprintf($nv_Lang->getModule('account_deny_name'), $login);
    }
    $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username');
    $stmt->bindValue(':md5username', nv_md5safe($login), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        return sprintf($nv_Lang->getModule('account_registered_name'), $login);
    }
    $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE md5username= :md5username');
    $stmt->bindValue(':md5username', nv_md5safe($login), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        return sprintf($nv_Lang->getModule('account_registered_name'), $login);
    }

    return '';
}

function create_sub_website($row){
    global $nv_Request,$nv_Lang,$lang_module,$db,$nv_Cache,$global_config,$db_config,$module_data,$array_config,$admin_info;
    $error = array();
	
	
	
	
    if (! empty($row['domain'])) {
		$dm = $row['domain'];
		$dm2 = ($dm != "" and ! preg_match("/^(http|https|ftp|gopher)\:\/\//", $dm)) ? "http://" . $dm : $dm;
		if (nv_is_url($dm2) or $dm == "localhost") {
			$temp = str_replace('http://www.', '', $dm);
			$temp = str_replace('https://www.', '', $temp);
			$temp = str_replace('ftp://www.', '', $temp);
			$temp = str_replace('ftp://', '', $temp);
			$temp = str_replace('gopher://www.', '', $temp);
			$temp = str_replace('gopher://', '', $temp);
			$temp = str_replace('http://', '', $temp);
			$temp = str_replace('https://', '', $temp);
			$row['domain'] = $temp;
		}
		
		
		
		
            /* $row['domain'] = preg_replace('/^(http|https)\:\/\//', '', $row['domain']);
            $row['domain'] = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $row['domain']);
            $_p  = '';
            if (preg_match('/(.*)\:([0-9]+)$/', $row['domain'], $m)) {
                    $row['domain'] = $m[1];
                    $_p  = ':' . $m[2];
            } */
			//$row['domain'] = implode('.',$host);
            $row['domain'] = nv_check_domain(nv_strtolower($row['domain']));
    }
	if (preg_match($global_config['check_module'], $row['site_dir'])) {
        $row['site_dir'] = $row['site_dir'];
    } else {
        $temp = explode('.', $row['domain']);
        $row['site_dir'] = $temp[0];
    }
	if($array_config['cpaneltype'] == 'cpanel'){
		$dbsystems = explode('_',$db_config['dbsystem']);
	}elseif($array_config['cpaneltype'] == 'directadmin'){
    	$dbsystems = explode('_',$db_config['dbsystem']);
    }
    if( empty( $row['cid'] ) )
    {
            $error[] = $nv_Lang->getModule('error_required_cid');
    }
    elseif( empty( $row['domain'] ) && $row['idsite']==0)
    {
            $error[] = $nv_Lang->getModule('error_required_domain');
    }elseif( $row['domaintype'] == "subdomain" and $row['subdomain'] != "")
    {
		$row['subdomain'] = nv_check_domain(nv_strtolower($row['subdomain']));
		if(empty( $row['subdomain']))
		{
            $error[] = $nv_Lang->getModule('error_required_subdomain');
		}
    }elseif( empty( $row['sample'] ) ){
			$error[] = $nv_Lang->getModule('error_required_sample');
	}elseif( $row['password']!==$row['repassword'])
    {
        $error[] = $nv_Lang->getModule('error_pass');
    }else if ((($check_login = nv_check_username_reg($row['username']))) != '' && $row['idsite']==0) {
        $error[] = $check_login;
    }else if (($check_pass = nv_check_valid_pass($row['password'], $global_config['nv_upassmax'], $global_config['nv_upassmin'])) != '' && $row['idsite']==0 ) {
        $error[] = $check_pass;
    }else if((($check_domain = nv_check_exist_domain($row['domain']))) != '' && $row['idsite']==0){
        $error[] = $check_domain.'domain';
    }else if((($check_dbsite = nv_check_exist_dbsite($row['dbsite']))) != '' && $row['idsite']==0){
        $error[] = $check_dbsite.'dbsite';
    }else if((($email = nv_check_valid_email($row['email']))) != '' && $row['idsite']==0){
        $error[] = $email;
    }else if((($check_email = nv_check_exist_email($row['email']))) != '' && $row['idsite']==0){
        $error[] = $check_email;
    }else if($row['dbsite'] == $dbsystems[1]){
        $error[] = 'Tên Shop không đươc phếp sử dụng (' . $row['dbsite'] .'/'.$dbsystems[1] .')';
    }
	
    if( empty( $error ) )
    {
		
          if( empty( $row['idsite'] ) )
                {
					
						$row['domainold']=$row['domain'];
						$array_info_site=$row;
						$array_info_site['prefix']=$db_config['prefix'];
						$array_info_site['lang']=NV_LANG_DATA;
						//$array_info_site['userid']=(!empty($admin_info['userid']))?$admin_info['userid']:1;
						$array_info_site['username']=$row['username'];
						$array_info_site['password']=$row['password'];
						$array_info_site['StoreName']=$row['StoreName'];
						$array_info_site['catid']=$row['catid'];
						$array_info_site['businesstypeid']=$row['businesstypeid'];
						$array_info_site['hovaten']=$row['hovaten'];
						$array_info_site['email']=$row['email'];
						$array_info_site['sample']=$row['sample'];
						$array_info_site['userid']= $row['userid'];
						$array_info_site['data']= $row['sample'];
						$array_info_site['title']= $row['StoreName'];
						$array_info_site['site_dir']= $row['site_dir'];
						
						
                        $sql =  'INSERT INTO ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' (cid, title, site_dir, domain, subdomain, parked_domains, domaintype, subsitename, dbsite, sample, businesstypeid, userid, data, allowuserreg, admin_id, extend,siteus, addtime) VALUES (:cid, :title, :site_dir, :domain, :subdomain, :parked_domains, :domaintype, :subsitename,  :dbsite, :sample, :businesstypeid, :userid, :data, :allowuserreg,' . $admin_info['userid'] . ' , :extend, :siteus, ' . NV_CURRENTTIME . ')' ;
                        $data_insert['cid']= $row['cid'];
                        $data_insert['title']= $row['StoreName'];
                        $data_insert['domain']= $row['domain'];
                        $data_insert['subdomain']= $row['subdomain'];
                        $data_insert['site_dir']= $row['site_dir'];
                        $data_insert['parked_domains']= $row['parked_domains'];
                        $data_insert['domaintype']= $row['domaintype'];
                        $data_insert['subsitename']= $row['title'];
                        $data_insert['sample']= $row['sample'];
                        $data_insert['businesstypeid']= $row['businesstypeid'];
                        $data_insert['userid']= $row['userid'];
                        $data_insert['data']= $row['sample'];
						
            			if($array_config['cpaneltype'] == 'cpanel'){
                        	$data_insert['dbsite']= $array_config['cpanel_pre_host'].'_site_'.$row['dbsite']; 
                        }elseif($array_config['cpaneltype'] == 'directadmin'){
							$row['dbsite']++;
                         	$data_insert['dbsite']= $array_config['da_pre_host'].'_'.$row['dbsite'];
                        }
                        $data_insert['allowuserreg']= $row['allowuserreg'];
                        $data_insert['extend']= $row['extend'];
                        $data_insert['siteus']= $global_config['idsite'];
                        $idsite= $db->insert_id($sql, 'idsite', $data_insert);
						//print_r($data_insert);die;
						//$idsite =1;
                        if( $idsite )
                        {	
                          /* $sql_create_table = array();
							if (file_exists(NV_ROOTDIR . '/assets/site/data/default/ext_' . $array_info_site['sample'] . '.php')) {
								require NV_ROOTDIR . '/assets/site/data/default/ext_' . $array_info_site['sample'] . '.php';
							}	
							foreach ($sql_create_table as $_sql) {
								//print_r($_sql);
								$db->query($_sql.';');
								//echo $_sql.';<br>';
							} */
								
                               return array('status'=>$idsite, 'idsite' => $idsite);
							   
                        }
                }
                else
                {
						
                        $stmt = $db->prepare('UPDATE ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' SET cid = :cid, subdomain = :subdomain, allowuserreg = :allowuserreg WHERE idsite=' . $row['idsite']);
                        $stmt->bindParam( ':cid', $row['cid'], PDO::PARAM_INT );
                        $stmt->bindParam( ':subdomain', $row['subdomain'], PDO::PARAM_STR );
                        $data_insert['subsitename']= $row['StoreName'];
                        $stmt->bindParam(':allowuserreg', $row['allowuserreg'], PDO::PARAM_INT);
                        $stmt->execute();
                        if( $stmt->rowCount() )
                        {
                                if(defined('NV_CONFIG_DIR')){
										$row = $db->query('SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' where idsite=' . $row['idsite'])->fetch();
                                        $array_info_site=$row;
                                        $array_info_site['prefix']=$db_config['prefix'];
                                        $array_info_site['lang']=NV_LANG_DATA;
                                        $array_info_site['userid']=$admin_info['userid'];
										
                                        $array_info_site['dbsite']=$row['dbsite'];
                                        $nv_Cache->delMod( $module_name );
                                        die();
                                }
                        }
                }
    }
    return array('status'=>$error, 'idsite' => $idsite);
}


function first_site_install($array_info_site){
    //copy asset
    nv_mkdir( NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/','site_default');
    $scandir = nv_scandir(NV_ROOTDIR.'/'.NV_ASSETS_DIR,'//');
    foreach ($scandir as $dir) {
        if(!in_array($dir,array('css','editors','fonts','images','js','tpl','domain','site'))){
            nv_mkdir( NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/site_default/',$dir);
            nv_copy_folder(NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/'.$dir.'/',NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/site_default/'.$dir.'/');
        }
    }
    //copy upload
    nv_mkdir( NV_ROOTDIR . '/uploads', 'site_default' );
    $scandir = nv_scandir(NV_ROOTDIR.'/uploads','//');
    foreach ($scandir as $dir) {
        if(!in_array($dir,array('site_default'))){
            nv_mkdir( NV_ROOTDIR.'/uploads/site_default/',$dir);
            nv_copy_folder(NV_ROOTDIR.'/uploads/'.$dir.'/',NV_ROOTDIR.'/uploads/site_default/'.$dir.'/');
        }
    }
    site_install($array_info_site);
}
function site_install($array_info_site)
{
    global $array_config,$global_config,$db_config;
	
    nv_deletefile ( NV_ROOTDIR . '/' .  NV_CONFIG_DIR . '/'.preg_replace('/[^a-zA-Z0-9\.\_]/', '', $array_info_site['domainold']).'.php', $delsub = false );
    nv_deletefile ( NV_ROOTDIR . '/' .  NV_CONFIG_DIR . '/'.preg_replace('/[^a-zA-Z0-9\.\_]/', '', $array_info_site['domain']).'.php', $delsub = false ); 
    if($array_config['cpaneltype'] == 'cpanel'){
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['cpanel_pre_host']."_site_":'').$array_info_site['idsite'];
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['da_pre_host']."_":'').$array_info_site['dbsite'];
	}else{
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['vesta_pre_host']."_":'').$array_info_site['dbsite'];
	}
	$system_config = "<?php\n\n";
	$system_config .= NV_FILEHEAD . "\n\n";
	$system_config .= "if ( ! defined( 'NV_MAINFILE' ) )\n";
	$system_config .= "{\n";
	$system_config .= "    die( 'Stop!!!' );\n";
	$system_config .= "}\n\n";
    $system_config .=   "\n\$db_config['dbsite'] = '". $dbsite ."';
						\n\$db_config['dbsystem'] = '". $db_config['dbsystem'] ."';
                        \n\$global_config['site_dir']= '/" . $array_info_site['site_dir'] . "';
                        \n\$global_config['site_domain'] = '" . $array_info_site['domain'] . "';
                        \n\$global_config['name_show'] = 0;
                        \n\$global_config['sitetimestamp'] = '1';
                        \n\$global_config['allowuserreg'] = '" . $array_info_site['allowuserreg'] . "';
                        \n\$global_config['idsite'] = " . $array_info_site['idsite'] . ";
                        \n\$global_config['parentid'] = " . $global_config['idsite'] . ";
						\n\$global_config['allow_sitelangs'] = array('vi');\n
                        ";
    //nv_mkdir( NV_ROOTDIR . '/'.NV_CONFIG_DIR.'/', $array_info_site['domain']);
    nv_mkdir( NV_ROOTDIR . '/' . SYSTEM_UPLOADS_DIR, $array_info_site['site_dir'] );
	nv_mkdir(NV_ROOTDIR . '/' . NV_FILES_DIR, $array_info_site['site_dir']);
    nv_mkdir( NV_ROOTDIR . '/' . SYSTEM_CACHEDIR, $array_info_site['site_dir'] );
    nv_mkdir( NV_ROOTDIR . '/data/logs/dump_backup', $array_info_site['domain'] );
	//chuyen sang check query tat ca module của site rồi mới tạo folder
    nv_copy_folder(NV_ROOTDIR . '/assets/site/site_default/',NV_ROOTDIR . '/assets/site/'.$array_info_site['site_dir'].'/');
    nv_copy_folder(NV_ROOTDIR . '/uploads/site_default/',NV_ROOTDIR . '/uploads/'.$array_info_site['site_dir'].'/');
    $filename = NV_ROOTDIR . '/'.NV_CONFIG_DIR.'/'.preg_replace('/[^a-zA-Z0-9\.\_]/', '', $array_info_site['domain']).'.php';
	
    if (! empty($filename) and ! empty($system_config)) {
            try {
                    $filesize = file_put_contents($filename, $system_config, LOCK_EX);
                    if (empty($filesize)) {
                            $return = false;
                    }
            } catch (exception $e) {
                    $return = false;
            }
    }
	return array('status'=>"Khởi tạo cấu hình site " . $array_info_site['idsite'], 'idsite' => $array_info_site['idsite']);
}
function site_install_create_databasse($array_info_site){
    global $array_config;
	if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME)) {
		require realpath(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME);
	}
	if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $array_info_site['domain'] . '.php')) {
		include (NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $array_info_site['domain'] . '.php');
	}
	$dbsite = $db_config['dbsite'];
	$dbsite = explode('_', $dbsite);
	if($array_config['cpaneltype'] == 'cpanel'){
		include NV_ROOTDIR.'/includes/xmlapi.php';
		$opts = [
			 "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
			 "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
			 "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
			 "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
		];
		//print_r($array_info_site);die;
		$xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

		$xmlapi->set_port( $array_config['cpanel_port'] );   

		$xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    
		$xmlapi->set_output("json");
		$xmlapi->set_debug(1);
		// database Name

		$TARGET_DB_NAME = 'site_' .$dbsite;

		// database creation 

		$createdb = json_decode($xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "adddb",  array($TARGET_DB_NAME)));   
		//print_r($createdb);die;
		// adds user to database
		/* if(
		$addusr = $xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "adduserdb",  array($TARGET_DB_NAME, $opts['dbusername'], 'all'));
		*/
		
		if($createdb->event->result == 1)
			return "Khởi tạo database: " . $array_config['cpanel_pre_host'] . "_site_" . $array_info_site['idsite'] . ' Thành công';
		else
			return "Khởi tạo database: " . $array_config['cpanel_pre_host'] . "_site_" . $array_info_site['idsite'] . ' Không thành công';
			
    }elseif ($array_config['cpaneltype'] == 'directadmin'){
		include NV_ROOTDIR.'/modules/site//DirectAdmin/DirectAdmin.php';
		
		
		//print_r($db_config);die;
		$server_login=$array_config['da_ftp_user_name'];
		//$server_login=$array_config['da_ftp_user_name'];
		$server_pass=$array_config['da_ftp_user_pass'];
		//$server_pass='p9zJ6P2l';
		$server_host=$array_config['da_ip']; //where the API connects to
		$server_ssl="N";
		$server_port=intval($array_config['da_port']);
		$username=explode('_', $db_config['dbuname']);
	
		$sock = new \DirectAdmin\DirectAdmin;
		if ($server_ssl == 'Y')
		{
			$sock->connect("ssl://".$server_host, $server_port);
		}
		else
		{ 
			$sock->connect($server_host, $server_port);
		}
	 
		$sock->set_login($server_login,$server_pass);
		//print_r($sock);
		//print_r($dbsite);die;
		$sock->query('/CMD_API_DATABASES',
					array(
							'action' => 'create',
							'name' => $dbsite[1],
							'userlist' => $username[1],//lay user da ton tai
							'passwd' => $db_config['dbpass'],
							'passwd2' => $db_config['dbpass'],
				));
	 
		$result = $sock->fetch_parsed_body();
		//print_r($result);die;
		array('status'=>$result, 'idsite' => $array_info_site['idsite']);
		return $result;
    }else{
		$result = site_install_create_database_hostting_vestacp($array_info_site);
		return $result;
	}	
}
function add_domain_site($array_info_site){
    global $array_config,$db_config;
	if($array_config['cpaneltype'] == 'cpanel'){
		include NV_ROOTDIR.'/includes/xmlapi.php';
		$opts = [
			 "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
			 "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
			 "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
			 "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
		];
		//print_r($array_info_site);die;
		$xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

		$xmlapi->set_port( $array_config['cpanel_port'] );   

		$xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    
		$xmlapi->set_output("json");
		$xmlapi->set_debug(1);
		// database Name

		
		if($array_info_site['domaintype']=="domain")
		{
			$createdb=$xmlapi->park($opts['cpanelUserName'],$array_info_site['domain'],'');  
			if($createdb->event->result == 1)
				return "Thêm domain " . $array_info_site['domain'] . ' Thành công';
			else 
				return "Thêm domain " . $array_info_site['domain'] . ' Thành công';
		}elseif($array_info_site['domaintype']=="subdomain" and $array_info_site['subdomain'] != ""){
			$createdb=$xmlapi->park($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
			if($createdb->event->result == 1)
				return "Thêm domain " . $array_info_site['subdomain'] . ' Thành công';
			else
				return "Thêm domain " . $array_info_site['subdomain'] . ' Thành công';
		}
		
			
    }elseif ($array_config['cpaneltype'] == 'directadmin'){
		include NV_ROOTDIR.'/modules/site//DirectAdmin/DirectAdmin.php';
		$server_login=$array_config['da_ftp_user_name'];
		$server_pass=$array_config['da_ftp_user_pass'];
		$server_host=$array_config['da_ip']; //where the API connects to
		$server_ssl="N";
		$server_port=intval($array_config['da_port']);
		$username=explode('_', $db_config['dbuname']);
	
		$sock = new \DirectAdmin\DirectAdmin;
		if ($server_ssl == 'Y')
		{
			$sock->connect("ssl://".$server_host, $server_port);
		}
		else
		{ 
			$sock->connect($server_host, $server_port);
		}
	 
		$sock->set_login($server_login,$server_pass);
	 	$sock->set_method('POST');
		$sock->query('/CMD_API_DOMAIN_POINTER',
				array(
						'action' => 'add',
						'domain' => $array_config['my_domains'],
						'from' => $array_info_site['domain'],//lay user da ton tai
                  		'alias' => 'yes'
			));
		$result = $sock->fetch_body();
		return array('status'=>$result, 'idsite' => $array_info_site['idsite']);
    }else{
		return true;
	}	
}
function insert_database($array_info_site){
    global $db,$array_config,$db_config,$lang_module,$db_slave,$module_data,$global_config, $array_samples_data;
	/* if($array_config['cpaneltype'] == 'cpanel'){
		$db_config['dbname']=$array_config['cpanel_pre_host']."_site_".$array_info_site['idsite'];
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		$db_config['dbname']=$array_config['da_pre_host']."_".$array_info_site['idsite'];
	}else{
		$db_config['dbname']=$array_config['vesta_pre_host']."_".$array_info_site['dbsite'];
	} */
  	//print_r($db_config);die;
    if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $array_info_site['domain'] . '.php')) {
		include (NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $array_info_site['domain'] . '.php');
	}
	$db_config['dbname'] = $db_config['dbsite'];
	$db_config['error']="";
	// Cai dat du lieu cho he thong
	if (empty($db_config['error'])) {
		if($array_config['cpaneltype'] == 'cpanel'){
			$db = new NukeViet\Core\Database($db_config);
			if (in_array('data_' . $array_info_site['sample'] . '.php', $array_samples_data)) {
				if (file_exists(NV_ROOTDIR . '/assets/site/data/default/install_' . $array_info_site['sample'] . '.php')) {
					
					require NV_ROOTDIR . '/assets/site/data/default/install_' . $array_info_site['sample'] . '.php';
					foreach ($sql_create_table as $_sql) {
						//print_r($_sql);
						$db->query($_sql.';');
						//echo $_sql.';<br>';
					}
					//die;
					unset($sql_create_table);
					if (file_exists(NV_ROOTDIR . '/assets/site/data/data_' . $array_info_site['sample'] . '.php')) {
						$sql_create_table = array();
						require NV_ROOTDIR . '/assets/site/data/data_' . $array_info_site['sample'] . '.php';
						foreach ($sql_create_table as $_sql) {
							//print_r($_sql);
							$db->query($_sql.';');
							//echo $_sql.';<br>';
						}
						$db->query("DROP TABLE IF EXISTS " . $db_config['prefix'] . "_users");
						//die;
						unset($sql_create_table);
					}
				}
				if (file_exists(NV_ROOTDIR . '/assets/site/data/ext/ext_' . $array_info_site['sample'] . '.php')) {
					$sql_create_table = array();
					require NV_ROOTDIR . '/assets/site/data/ext/ext_' . $array_info_site['sample'] . '.php';
					
				}	
				
		
				foreach ($sql_create_table as $_sql) {
					//print_r($_sql);
					$db->query($_sql.';');
					//echo $_sql.';<br>';
				}
				//die;
				unset($sql_create_table);
				
				
				$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '" . $array_info_site['my_domains'] . "' WHERE config_name = 'my_domains' ");
				if(!empty($array_info_site['StoreName'])){

						$db->query($sql="DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE config_name = 'site_name' ");
						$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('vi', 'global', 'site_name', '" . $array_info_site['StoreName'] . "')");
				}
				//$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '" . $global_config['site_email'] . "' WHERE lang = 'sys' AND module = 'site' AND config_name = 'site_email'");
				//$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('vi', 'global', 'preview_theme', '')");
				
				
				$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '" . $array_info_site['email'] . "' WHERE config_name = 'site_email' ");
				$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '" . $array_info_site['StoreName'] . "' WHERE config_name = 'site_description' ");
				$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '' WHERE config_name = 'preview_theme' ");
				$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_prefix', '" . $global_config['cookie_prefix'] . "')");
				$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'session_prefix', '" . $global_config['session_prefix'] . "')");
				$db->select("*")->from("" . $db_config['dbsystem'] . "." .NV_AUTHORS_GLOBALTABLE)->where('lev = 1 or lev = 2');
				/*$author=$db->query($db->sql());
				while($admin_insert = $author->fetch()){
					$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(".implode(",",array_keys($admin_insert)).") VALUES ('".implode("','",array_values($admin_insert))."')");
				}
				while($admin_insert = $author->fetch()){
					if($array_info_site['uid'] == $admin_insert['admin_id']){
						$flag_user = true;
					}
				}
				if($flag_user){
					$ok = true;
				}else{
					$author_user['admin_id']=$array_info_site['uid'];
					$author_user['lev']=2;
					$author_user['position']=$nv_Lang->getModule('dieu_hanh_chung');
					$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(".implode(",",array_keys($author_user)).") VALUES ('".implode("','",array_values($author_user))."')");
				}
				*/
			}
			 return "Khởi tạo dư liệu: " . $array_config['vesta_pre_host'] . "_site_" . $array_info_site['idsite'] . ' Thành công';
		}elseif ($array_config['cpaneltype'] == 'directadmin'){
			$sql_create_table_dbnew = array();
			$db->exec('USE ' . $db_config['dbname']);
			$db->exec('ALTER DATABASE ' . $db_config['dbname'] . ' DEFAULT CHARACTER SET ' . $db_config['charset'] . ' COLLATE ' . $db_config['collation']);
        
			if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $array_info_site['sample'] . '.php')) {
				$sql_drop_table = [];
							
				include (NV_ROOTDIR . '/' . 'install/action_mysql.php');
				//print_r($sql_drop_table);die;
				$result = $db->query("SHOW TABLE STATUS LIKE '" . $db_config['prefix'] . "\_%'");
				while ($item = $result->fetch()) {
					$sql_drop_table[] = 'DROP TABLE ' . $item['name'];
				}
				$sql_create_table_dbnew = $sql_drop_table;
				$sql_create_table_dbnew = array_merge($sql_create_table_dbnew,$sql_create_table);
				unset($sql_create_table);
				include (NV_ROOTDIR . '/' . 'install/data.php');
				$sql_create_table_dbnew = array_merge($sql_create_table_dbnew,$sql_create_table);
				unset($sql_create_table);
				include (NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $array_info_site['sample'] . '.php');
				$sql_create_table_dbnew = array_merge($sql_create_table_dbnew,$sql_create_table);
				unset($sql_create_table);
				
				
			/* 
				$sql_create_table=[];
				$sql_create_table[] = 'INSERT INTO ' . $db_config['prefix'] . "_upload_dir (did, dirname, time, thumb_type, thumb_width, thumb_height, thumb_quality) VALUES ('uploads/" . $array_info_site['site_dir'] . "', '', 0, 3, 100, 150, 90)"; */
			}
			
			
	
			foreach ($sql_create_table_dbnew as $_sql) {
				$db->query($_sql.';');
				//echo $_sql.';<br>';
			}
			//die;
			unset($sql_create_table_dbnew);
			$array_dirname = [];
			$real_dirlist = nv_listUploadDir(NV_UPLOADS_DIR . '/' . $array_info_site['site_dir']);
			$dirlist = array_keys($array_dirname);
			$result_no_exit = array_diff($dirlist, $real_dirlist);
			foreach ($result_no_exit as $dirname) {
				// Xóa CSDL thư mục không còn tồn tại
				$did = $array_dirname[$dirname];
				$db->query('DELETE FROM ' . NV_UPLOAD_GLOBALTABLE . '_file WHERE did = ' . $did);
				$db->query('DELETE FROM ' . NV_UPLOAD_GLOBALTABLE . '_dir WHERE did = ' . $did);
				unset($array_dirname[$dirname]);
			}
			$result_new = array_diff($real_dirlist, $dirlist);
			foreach ($result_new as $dirname) {
				try {
					$array_dirname[$dirname] = $db->insert_id('INSERT INTO ' . NV_UPLOAD_GLOBALTABLE . "_dir (dirname, time, thumb_type, thumb_width, thumb_height, thumb_quality) VALUES ('" . $dirname . "', '0', '0', '0', '0', '0')", 'did');
				} catch (PDOException $e) {
					trigger_error($e->getMessage());
				}
			}
			nv_dirListRefreshSize();
			if(!empty($array_info_site['StoreName'])){
				$db->query($sql="DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE config_name = 'site_name' ");
				$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('vi', 'global', 'site_name', '" . $array_info_site['StoreName'] . "')");
			}
			if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME)) {
				require realpath(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME);
			}
			$db->exec('USE ' . $db_config['dbname']);
			return array('status'=>"Khởi tạo dư liệu: " . $db_config['dbname'] . ' Thành công', 'idsite' => $array_info_site['idsite']);
		}
	}
    
   
}
function site_install_create_sql($array_info_site)
{
    global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$password = $crypt->hash_password($array_info_site['password'], $global_config['hashprefix']);
	$array_info_site['userid']=(!empty($array_info_site['userid']))?$array_info_site['userid']:1;
	$your_question = '1+1';
	$hovaten=(!empty($array_info_site['hovaten']))? splitHoten($array_info_site['hovaten']):array();
	$sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . "
		(group_id, username, md5username, password, email, first_name, last_name, gender, photo, birthday, sig, regdate,
		question, answer, passlostkey, view_mail, remember, in_groups,
		active, checknum, last_login, last_ip, last_agent, last_openid, idsite) VALUES (
		4,
		:username,
		:md5username,
		:password,
		:email,
		:first_name,
		:last_name,
		:gender
		, '',
		:birthday,
		:sig,
		 " . NV_CURRENTTIME . ",
		:question,
		:answer,
		'', 0, 1,
		'4',
		1, '', 0, '', '', '', " . $array_info_site['idsite'] . ")";
	$data_insert = array();
	$data_insert['username'] = $array_info_site['username'];
	$data_insert['md5username'] = nv_md5safe($array_info_site['username']);
	$data_insert['password'] = $password;
	$data_insert['email'] = $array_info_site['email'];

	$data_insert['first_name'] = (!empty($hovaten['ho']))?$hovaten['ho']:$nv_Lang->getModule('authors');
	$data_insert['last_name'] = (!empty($hovaten['ten']))?$hovaten['ten']:'Chung';


	$data_insert['question'] = $your_question;
	$data_insert['answer'] = 2;
	$data_insert['gender'] = 2;
	$data_insert['birthday'] = intval(NV_CURRENTTIME);
	$data_insert['sig'] = '';
	$userid = $db->insert_id($sql, 'userid', $data_insert);
    $db->query($sql="UPDATE " . $db_config['dbsystem'] . "." .$db_config['prefix'] . "_" . $module_data . " SET admin_id = '" . $userid . "' WHERE idsite = " . $array_info_site['idsite'] . "");
    $db->select("*")->from(NV_AUTHORS_GLOBALTABLE)->where('admin_id = '.$array_info_site['userid'] . '');
    $author=$db->query($db->sql())->fetch();
	//$db->query($sql="UPDATE " . $db_config['dbsystem'] . "." . NV_CONFIG_GLOBALTABLE . " SET config_value = concat(config_value,'," . $array_info_site['domain'] . "') WHERE config_name = 'my_domains'");
	$author_admin_subsite['admin_id']=$userid;
	$author_admin_subsite['lev']=3;
	$author_admin_subsite['position']='Admin site : ' . $array_info_site['domain'];
	$author_admin_subsite['files_level']='adobe,archives,audio,documents,flash,images,real,video|1|1|1';
	$author_admin_subsite['main_module']='siteinfo';
	$author_admin_subsite['editor']='ckeditor';
	$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(".implode(",",array_keys($author_admin_subsite)).") VALUES ('".implode("','",array_values($author_admin_subsite))."')");
	//$api=create_api_stores($array_info_site, $userid);
	//create_stores($array_info_site, $userid);
	//update_product_settings($array_info_site,$api);
    insert_database($array_info_site,$userid,$author);
//
	nv_save_file_config_global();
	

}
function add_admin($array_info_site)
{
    global $nv_Lang,$db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$password = $crypt->hash_password($array_info_site['password'], $global_config['hashprefix']);
	$array_info_site['userid']=(!empty($array_info_site['userid']))?$array_info_site['userid']:1;
	$your_question = '1+1';
	$hovaten=(!empty($array_info_site['hovaten']))? splitHoten($array_info_site['hovaten']):array();
	$sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . "
		(group_id, username, md5username, password, email, first_name, last_name, gender, photo, birthday, sig, regdate,
		question, answer, passlostkey, view_mail, remember, in_groups,
		active, checknum, last_login, last_ip, last_agent, last_openid, idsite) VALUES (
		4,
		:username,
		:md5username,
		:password,
		:email,
		:first_name,
		:last_name,
		:gender
		, '',
		:birthday,
		:sig,
		 " . NV_CURRENTTIME . ",
		:question,
		:answer,
		'', 0, 1,
		'4',
		1, '', 0, '', '', '', " . $array_info_site['idsite'] . ")";
	$data_insert = array();
	$data_insert['username'] = $array_info_site['username'];
	$data_insert['md5username'] = nv_md5safe($array_info_site['username']);
	$data_insert['password'] = $password;
	$data_insert['email'] = $array_info_site['email'];

	$data_insert['first_name'] = (!empty($hovaten['ho']))?$hovaten['ho']:$nv_Lang->getModule('authors');
	$data_insert['last_name'] = (!empty($hovaten['ten']))?$hovaten['ten']:'Chung';


	$data_insert['question'] = $your_question;
	$data_insert['answer'] = 2;
	$data_insert['gender'] = 2;
	$data_insert['birthday'] = intval(NV_CURRENTTIME);
	$data_insert['sig'] = '';
	$userid = $db->insert_id($sql, 'userid', $data_insert);
    $db->query($sql="UPDATE " . $db_config['dbsystem'] . "." .$db_config['prefix'] . "_" . $module_data . " SET admin_id = '" . intval($userid) . "' WHERE idsite = " . $array_info_site['idsite'] . "");
    $db->select("*")->from(NV_AUTHORS_GLOBALTABLE)->where('admin_id = '.$array_info_site['userid'] . '');
    $author=$db->query($db->sql())->fetch();
	$db->query($sql="UPDATE " . $db_config['dbsystem'] . "." . NV_CONFIG_GLOBALTABLE . " SET config_value = concat(config_value,'," . $array_info_site['domain'] . "') WHERE config_name = 'my_domains'");
	$author_admin_subsite['admin_id']=intval($userid);
	$author_admin_subsite['lev']=3;
	$author_admin_subsite['position']='Admin site : ' . $array_info_site['domain'];
	$author_admin_subsite['files_level']='adobe,archives,audio,documents,flash,images,real,video|1|1|1';
	$author_admin_subsite['main_module']='siteinfo';
	$author_admin_subsite['editor']='ckeditor';
	$ok=$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(".implode(",",array_keys($author_admin_subsite)).") VALUES ('".implode("','",array_values($author_admin_subsite))."')");
	if($ok){
		nv_save_file_config_global();
		$nv_Cache->delAll();
		return array('status'=>"Tạo tài khoản cho site thành công", 'idsite' => $array_info_site['idsite']);;

	}else{
		return array('status'=>"Tạo tài khoản cho site không thành công", 'idsite' => $array_info_site['idsite']);;

	}
	

}
function create_api_stores($array_info_site, $userid){
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data,$admin_info,$module_name;
	$username=$array_info_site['username'];
	$title = "API for Username: " .  $username . " On site :" . $array_info_site['domain'];
	$array_post['credential_title'] = nv_substr($title, 0, 255);
    $array_post['admin_id'] = $userid;
	$array_post['api_roles'] = array();
	$array_post['api_roles'][]= 1;
    //$array_post['api_roles'] = array_intersect($array_post['api_roles'], array_keys($global_array_roles));
	$new_credential_ident = '';
    $new_credential_secret = '';
    while (empty($new_credential_ident) or $db->query('SELECT admin_id FROM ' . $db_config['prefix'] . '_storehouse_api_credential WHERE credential_ident=' . $db->quote($new_credential_ident))->fetchColumn()) {
        $new_credential_ident = nv_genpass(32, 3);
    }
    while (empty($new_credential_secret) or $db->query('SELECT admin_id FROM ' . $db_config['prefix'] . '_storehouse_api_credential WHERE credential_ident=' . $db->quote($new_credential_secret))->fetchColumn()) {
        $new_credential_secret = nv_genpass(32, 3);
    }

    $sql = 'INSERT INTO ' . $db_config['prefix'] . '_storehouse_api_credential (
        admin_id, credential_title, credential_ident, credential_secret, api_roles, addtime
    ) VALUES (
        ' . $array_post['admin_id'] . ', :credential_title, :credential_ident, :credential_secret, :api_roles, ' . NV_CURRENTTIME . '
    )';
    $sth = $db->prepare($sql);

    $new_credential_secret_db = $crypt->encrypt($new_credential_secret);
    $api_roles = implode(',', $array_post['api_roles']);

    $sth->bindParam(':credential_title', $array_post['credential_title'], PDO::PARAM_STR);
    $sth->bindParam(':credential_ident', $new_credential_ident, PDO::PARAM_STR);
    $sth->bindParam(':credential_secret', $new_credential_secret_db, PDO::PARAM_STR);
    $sth->bindParam(':api_roles', $api_roles, PDO::PARAM_STR);

    if ($sth->execute()) {
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Add API Credential', $new_credential_ident, $admin_info['userid']);
    } else {
        $error = 'Unknow Error!!!';
    }
	$api = array("new_credential_ident" => $new_credential_ident, "new_credential_secret" => $new_credential_secret);
	return $api;
}
function update_product_settings($array_info_site,$api){
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	
	$db->query('SELECT admin_id FROM ' . $db_config['prefix'] . '_storehouse_api_credential WHERE credential_ident=' . $db->quote($new_credential_ident))->fetchColumn();
	$db->query("INSERT IGNORE INTO "  . $db_config['prefix'] . "_product_store VALUES (" . $array_info_site['idsite'] . ", ". $db->quote( $array_info_site['StoreName'] ) .", ". $db->quote( $array_info_site['domain'] ) .", '1')");
	$sql = "INSERT IGNORE INTO " . $db_config['prefix'] . "_product_setting VALUES
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_name', ". $db->quote( $array_info_site['StoreName'] ) .", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_address', 'Địa chỉ cửa hàng', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_geocode', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_owner', 'Tên của bạn', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_telephone', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_fax', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_email', ". $db->quote($array_info_site['email']) .", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_url', ". $db->quote( $array_info_site['domain'] ) .", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_open', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_comment', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_image', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_language_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_home_view', 'view_home_category', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_per_page', '20', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_per_row', '4', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_currency', 'VND', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_format_order_id', " . $db->quote( strtoupper( substr( 'Product', 0, 1 ) ) . '%06s' ) . ", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_format_code_id', " . $db->quote( strtoupper( substr( 'Product', 0, 1 ) ) . '%06s' ) . ", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_order', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_guest_order', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_price', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_order_number', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_payment', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_timecheckstatus', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_show_model', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_show_compare', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_active_wishlist', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_tags_alias', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_auto_tags', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_tags_remind', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_customer_group_display', 'a:1:{i:0;i:1;}', 1),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_stock_display', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_stock_warning', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_stock_checkout', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_voucher_min', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_voucher_max', '1000', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_tax', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_tax_default', 'shipping', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_tax_customer', 'shipping', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_customer_group_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_country_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_zone_id', '2', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_customer_price', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_order_status_id', '12', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_order_mail', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_complete_status', 'a:1:{i:0;i:6;}', 1),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_processing_status', 'a:1:{i:0;i:1;}', 1),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_credit_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_cart_weight', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_length_class_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_currency_auto', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_checkout_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_checkout_id', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_cart_weight', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_show_displays', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_show_displays', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_setcomm', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_weight_class_id', '2', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_account_id', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_review_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_faq_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_fraud_status_id', '7', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_storehouse_api_extent', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_storehouse_api_link', 'https://nguyenvan.vn/storehouse.php', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_storehouse_api_key', " . $db->quote( $api['new_credential_ident'] ) . ", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_storehouse_api_secret', " . $db->quote( $api['new_credential_secret'] ) . ", 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_template', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_mobile_template', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'config', 'config_checkout_guest', '', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'flat', 'flat_sort_order', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'flat', 'flat_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'flat', 'flat_geo_zone_id', '4', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'flat', 'flat_tax_class_id', '6', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'flat', 'flat_cost', '2', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'reward', 'reward_sort_order', '3', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'reward', 'reward_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'coupon', 'coupon_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'coupon', 'coupon_sort_order', '7', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'sub_total', 'sub_total_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'sub_total', 'sub_total_sort_order', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'voucher', 'voucher_sort_order', '8', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'voucher', 'voucher_status', '4', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'free', 'free_sort_order', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'free', 'free_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'free', 'free_geo_zone_id', '0', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'free', 'free_total', '5', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'shipping', 'shipping_sort_order', '2', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'shipping', 'shipping_estimator', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'shipping', 'shipping_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'total', 'total_status', '1', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'total', 'total_sort_order', '9', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'tax', 'tax_sort_order', '4', 0),
		(NULL, " . $array_info_site['idsite'] . ", 'tax', 'tax_status', '1', 0);";
		$db->query($sql);

}
function create_stores($array_info_site, $userid){
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$weight = $db->query('SELECT max(sort_order) FROM ' . $db_config['prefix'] . '_storehouse_stores')->fetchColumn();
    $weight = intval($weight) + 1;
    $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_storehouse_stores (store_id, name, category_id, url, userid, sort_order) VALUES (' . $array_info_site['idsite'] . ', :name, :category_id, :url, :uid, :sort_order)');
    $stmt->bindParam(':sort_order', $weight, PDO::PARAM_INT);
    $stmt->bindParam(':name', $array_info_site['StoreName'], PDO::PARAM_STR);
    $stmt->bindParam(':url', $array_info_site['domain'], PDO::PARAM_STR);
    $stmt->bindParam(':uid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':category_id', $array_info_site['catid'], PDO::PARAM_STR);
    $exc = $stmt->execute();
    if ($exc) {
    	$storeid=$array_info_site['idsite'];
    	nv_fix_store_order();
		$db->query('DELETE FROM ' . $db_config['prefix'] . '_storehouse_store_of_category WHERE category_id NOT IN (' . $array_info_site['catid'] . ') and store_id = ' .  $storeid );
		foreach($array_info_site['category'] as $cate){
			$store_of_cat = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_store_of_category WHERE category_id = ' . $cate . ' AND store_id=' . $storeid)->fetch();
			if (empty($store_of_cat)) {
				$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_store_of_category(store_id, category_id) VALUES ( ' . $storeid . ', ' . $cate . ')');
			}
		}
		$id=$db->query('SELECT setting_id FROM ' . $db_config['prefix'] . '_storehouse_settings WHERE setting_id = ' . $storeid)->fetch(5)->setting_id;
    	if ($id == 0 && $storeid > 0) {
    		$row['logo'] = '';
		    $row['logo2'] = '';
		    $row['site_name'] = '';
		    $row['language'] = '';
		    $row['default_warehouse'] = 0;
		    $row['accounting_method'] = 0;
		    $row['default_currency'] = '';
		    $row['default_tax_rate'] = 0;
		    $row['rows_per_page'] = 0;
		    $row['version'] = '1.0';
		    $row['default_tax_rate2'] = 0;
		    $row['dateformat'] = 0;
		    $row['sales_prefix'] = '';
		    $row['quote_prefix'] = '';
		    $row['purchase_prefix'] = '';
		    $row['transfer_prefix'] = '';
		    $row['delivery_prefix'] = '';
		    $row['payment_prefix'] = '';
		    $row['return_prefix'] = '';
		    $row['returnp_prefix'] = '';
		    $row['expense_prefix'] = '';
		    $row['item_addition'] = 0;
		    $row['theme'] = '';
		    $row['product_serial'] = 0;
		    $row['default_discount'] = 0;
		    $row['product_discount'] = 0;
		    $row['discount_method'] = 0;
		    $row['tax1'] = 0;
		    $row['tax2'] = 0;
		    $row['overselling'] = 0;
		    $row['restrict_user'] = 0;
		    $row['restrict_calendar'] = 0;
		    $row['timezone'] = '';
		    $row['iwidth'] = 0;
		    $row['iheight'] = 0;
		    $row['twidth'] = 0;
		    $row['theight'] = 0;
		    $row['watermark'] = 0;
		    $row['reg_ver'] = 0;
		    $row['allow_reg'] = 0;
		    $row['reg_notification'] = 0;
		    $row['auto_reg'] = 0;
		    $row['protocol'] = 'mail';
		    $row['mailpath'] = '/usr/sbin/sendmail';
		    $row['smtp_host'] = '';
		    $row['smtp_user'] = '';
		    $row['smtp_pass'] = '';
		    $row['smtp_port'] = '25';
		    $row['smtp_crypto'] = '';
		    $row['corn'] = '';
		    $row['customer_group'] = 0;
		    $row['default_email'] = '';
		    $row['mmode'] = 0;
		    $row['bc_fix'] = 0;
		    $row['auto_detect_barcode'] = 0;
		    $row['captcha'] = 1;
		    $row['reference_format'] = 1;
		    $row['racks'] = 0;
		    $row['attributes'] = 0;
		    $row['product_expiry'] = 0;
		    $row['decimals'] = 2;
		    $row['qty_decimals'] = 2;
		    $row['decimals_sep'] = '.';
		    $row['thousands_sep'] = ',';
		    $row['invoice_view'] = 0;
		    $row['default_biller'] = 0;
		    $row['envato_username'] = '';
		    $row['purchase_code'] = '';
		    $row['rtl'] = 0;
		    $row['each_spent'] = '';
		    $row['ca_point'] = 0;
		    $row['each_sale'] = '';
		    $row['sa_point'] = 0;
		    $row['update'] = 0;
		    $row['sac'] = 0;
		    $row['display_all_products'] = 0;
		    $row['display_symbol'] = 0;
		    $row['symbol'] = '';
		    $row['remove_expired'] = 0;
		    $row['barcode_separator'] = '-';
		    $row['set_focus'] = 0;
		    $row['price_group'] = 0;
		    $row['barcode_img'] = 1;
		    $row['ppayment_prefix'] = 'POP';
		    $row['disable_editing'] = 90;
		    $row['qa_prefix'] = '';
		    $row['update_cost'] = 0;
		    $row['apis'] = 0;
		    $row['state'] = '';
		    $row['pdf_lib'] = 'dompdf';
            $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_storehouse_settings (setting_id, logo, logo2, site_name, language, default_warehouse, accounting_method, default_currency, default_tax_rate, rows_per_page, version, default_tax_rate2, dateformat, sales_prefix, quote_prefix, purchase_prefix, transfer_prefix, delivery_prefix, payment_prefix, return_prefix, returnp_prefix, expense_prefix, item_addition, theme, product_serial, default_discount, product_discount, discount_method, tax1, tax2, overselling, restrict_user, restrict_calendar, timezone, iwidth, iheight, twidth, theight, watermark, reg_ver, allow_reg, reg_notification, auto_reg, protocol, mailpath, smtp_host, smtp_user, smtp_pass, smtp_port, smtp_crypto, corn, customer_group, default_email, mmode, bc_fix, auto_detect_barcode, captcha, reference_format, racks, attributes, product_expiry, decimals, qty_decimals, decimals_sep, thousands_sep, invoice_view, default_biller, envato_username, purchase_code, rtl, each_spent, ca_point, each_sale, sa_point, supdate, sac, display_all_products, display_symbol, symbol, remove_expired, barcode_separator, set_focus, price_group, barcode_img, ppayment_prefix, disable_editing, qa_prefix, update_cost, apis, state, pdf_lib) VALUES (' . $storeid . ', :logo, :logo2, :site_name, :language, :default_warehouse, :accounting_method, :default_currency, :default_tax_rate, :rows_per_page, :version, :default_tax_rate2, :dateformat, :sales_prefix, :quote_prefix, :purchase_prefix, :transfer_prefix, :delivery_prefix, :payment_prefix, :return_prefix, :returnp_prefix, :expense_prefix, :item_addition, :theme, :product_serial, :default_discount, :product_discount, :discount_method, :tax1, :tax2, :overselling, :restrict_user, :restrict_calendar, :timezone, :iwidth, :iheight, :twidth, :theight, :watermark, :reg_ver, :allow_reg, :reg_notification, :auto_reg, :protocol, :mailpath, :smtp_host, :smtp_user, :smtp_pass, :smtp_port, :smtp_crypto, :corn, :customer_group, :default_email, :mmode, :bc_fix, :auto_detect_barcode, :captcha, :reference_format, :racks, :attributes, :product_expiry, :decimals, :qty_decimals, :decimals_sep, :thousands_sep, :invoice_view, :default_biller, :envato_username, :purchase_code, :rtl, :each_spent, :ca_point, :each_sale, :sa_point, :update, :sac, :display_all_products, :display_symbol, :symbol, :remove_expired, :barcode_separator, :set_focus, :price_group, :barcode_img, :ppayment_prefix, :disable_editing, :qa_prefix, :update_cost, :apis, :state, :pdf_lib)');
			$stmt->bindParam(':logo', $row['logo'], PDO::PARAM_STR);
            $stmt->bindParam(':logo2', $row['logo2'], PDO::PARAM_STR);
            $stmt->bindParam(':site_name', $row['site_name'], PDO::PARAM_STR);
            $stmt->bindParam(':language', $row['language'], PDO::PARAM_STR);
            $stmt->bindParam(':default_warehouse', $row['default_warehouse'], PDO::PARAM_INT);
            $stmt->bindParam(':accounting_method', $row['accounting_method'], PDO::PARAM_INT);
            $stmt->bindParam(':default_currency', $row['default_currency'], PDO::PARAM_STR);
            $stmt->bindParam(':default_tax_rate', $row['default_tax_rate'], PDO::PARAM_INT);
            $stmt->bindParam(':rows_per_page', $row['rows_per_page'], PDO::PARAM_INT);
            $stmt->bindParam(':version', $row['version'], PDO::PARAM_STR);
            $stmt->bindParam(':default_tax_rate2', $row['default_tax_rate2'], PDO::PARAM_INT);
            $stmt->bindParam(':dateformat', $row['dateformat'], PDO::PARAM_INT);
            $stmt->bindParam(':sales_prefix', $row['sales_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':quote_prefix', $row['quote_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':purchase_prefix', $row['purchase_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':transfer_prefix', $row['transfer_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':delivery_prefix', $row['delivery_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':payment_prefix', $row['payment_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':return_prefix', $row['return_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':returnp_prefix', $row['returnp_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':expense_prefix', $row['expense_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':item_addition', $row['item_addition'], PDO::PARAM_INT);
            $stmt->bindParam(':theme', $row['theme'], PDO::PARAM_STR);
            $stmt->bindParam(':product_serial', $row['product_serial'], PDO::PARAM_INT);
            $stmt->bindParam(':default_discount', $row['default_discount'], PDO::PARAM_INT);
            $stmt->bindParam(':product_discount', $row['product_discount'], PDO::PARAM_INT);
            $stmt->bindParam(':discount_method', $row['discount_method'], PDO::PARAM_INT);
            $stmt->bindParam(':tax1', $row['tax1'], PDO::PARAM_INT);
            $stmt->bindParam(':tax2', $row['tax2'], PDO::PARAM_INT);
            $stmt->bindParam(':overselling', $row['overselling'], PDO::PARAM_INT);
            $stmt->bindParam(':restrict_user', $row['restrict_user'], PDO::PARAM_INT);
            $stmt->bindParam(':restrict_calendar', $row['restrict_calendar'], PDO::PARAM_INT);
            $stmt->bindParam(':timezone', $row['timezone'], PDO::PARAM_STR);
            $stmt->bindParam(':iwidth', $row['iwidth'], PDO::PARAM_INT);
            $stmt->bindParam(':iheight', $row['iheight'], PDO::PARAM_INT);
            $stmt->bindParam(':twidth', $row['twidth'], PDO::PARAM_INT);
            $stmt->bindParam(':theight', $row['theight'], PDO::PARAM_INT);
            $stmt->bindParam(':watermark', $row['watermark'], PDO::PARAM_INT);
            $stmt->bindParam(':reg_ver', $row['reg_ver'], PDO::PARAM_INT);
            $stmt->bindParam(':allow_reg', $row['allow_reg'], PDO::PARAM_INT);
            $stmt->bindParam(':reg_notification', $row['reg_notification'], PDO::PARAM_INT);
            $stmt->bindParam(':auto_reg', $row['auto_reg'], PDO::PARAM_INT);
            $stmt->bindParam(':protocol', $row['protocol'], PDO::PARAM_STR);
            $stmt->bindParam(':mailpath', $row['mailpath'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_host', $row['smtp_host'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_user', $row['smtp_user'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_pass', $row['smtp_pass'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_port', $row['smtp_port'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_crypto', $row['smtp_crypto'], PDO::PARAM_STR);
            $stmt->bindParam(':corn', $row['corn'], PDO::PARAM_STR);
            $stmt->bindParam(':customer_group', $row['customer_group'], PDO::PARAM_INT);
            $stmt->bindParam(':default_email', $row['default_email'], PDO::PARAM_STR);
            $stmt->bindParam(':mmode', $row['mmode'], PDO::PARAM_INT);
            $stmt->bindParam(':bc_fix', $row['bc_fix'], PDO::PARAM_INT);
            $stmt->bindParam(':auto_detect_barcode', $row['auto_detect_barcode'], PDO::PARAM_INT);
            $stmt->bindParam(':captcha', $row['captcha'], PDO::PARAM_INT);
            $stmt->bindParam(':reference_format', $row['reference_format'], PDO::PARAM_INT);
            $stmt->bindParam(':racks', $row['racks'], PDO::PARAM_INT);
            $stmt->bindParam(':attributes', $row['attributes'], PDO::PARAM_INT);
            $stmt->bindParam(':product_expiry', $row['product_expiry'], PDO::PARAM_INT);
            $stmt->bindParam(':decimals', $row['decimals'], PDO::PARAM_INT);
            $stmt->bindParam(':qty_decimals', $row['qty_decimals'], PDO::PARAM_INT);
            $stmt->bindParam(':decimals_sep', $row['decimals_sep'], PDO::PARAM_STR);
            $stmt->bindParam(':thousands_sep', $row['thousands_sep'], PDO::PARAM_STR);
            $stmt->bindParam(':invoice_view', $row['invoice_view'], PDO::PARAM_INT);
            $stmt->bindParam(':default_biller', $row['default_biller'], PDO::PARAM_INT);
            $stmt->bindParam(':envato_username', $row['envato_username'], PDO::PARAM_STR);
            $stmt->bindParam(':purchase_code', $row['purchase_code'], PDO::PARAM_STR);
            $stmt->bindParam(':rtl', $row['rtl'], PDO::PARAM_INT);
            $stmt->bindParam(':each_spent', $row['each_spent'], PDO::PARAM_STR);
            $stmt->bindParam(':ca_point', $row['ca_point'], PDO::PARAM_INT);
            $stmt->bindParam(':each_sale', $row['each_sale'], PDO::PARAM_STR);
            $stmt->bindParam(':sa_point', $row['sa_point'], PDO::PARAM_INT);
            $stmt->bindParam(':update', $row['update'], PDO::PARAM_INT);
            $stmt->bindParam(':sac', $row['sac'], PDO::PARAM_INT);
            $stmt->bindParam(':display_all_products', $row['display_all_products'], PDO::PARAM_INT);
            $stmt->bindParam(':display_symbol', $row['display_symbol'], PDO::PARAM_INT);
            $stmt->bindParam(':symbol', $row['symbol'], PDO::PARAM_STR);
            $stmt->bindParam(':remove_expired', $row['remove_expired'], PDO::PARAM_INT);
            $stmt->bindParam(':barcode_separator', $row['barcode_separator'], PDO::PARAM_STR);
            $stmt->bindParam(':set_focus', $row['set_focus'], PDO::PARAM_INT);
            $stmt->bindParam(':price_group', $row['price_group'], PDO::PARAM_INT);
            $stmt->bindParam(':barcode_img', $row['barcode_img'], PDO::PARAM_INT);
            $stmt->bindParam(':ppayment_prefix', $row['ppayment_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':disable_editing', $row['disable_editing'], PDO::PARAM_INT);
            $stmt->bindParam(':qa_prefix', $row['qa_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':update_cost', $row['update_cost'], PDO::PARAM_INT);
            $stmt->bindParam(':apis', $row['apis'], PDO::PARAM_INT);
            $stmt->bindParam(':state', $row['state'], PDO::PARAM_STR);
            $stmt->bindParam(':pdf_lib', $row['pdf_lib'], PDO::PARAM_STR);
			$exc = $stmt->execute();
        }
		$stores_info = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_storehouse_stores WHERE store_id = ' . $storeid)->fetch(5);
		$user=$db->query('SELECT userid FROM ' . $db_config['prefix'] . '_storehouse_users WHERE userid = ' . $stores_info->userid . '');
		if($user->rowCount() == 0 && $storeid > 0){ 
        	$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_users (userid,storeid,is_staff)  VALUE (' . $stores_info->userid . ',' . $storeid . ' ,1) ');	  
        }else{
        	$db->query('UPDATE ' . $db_config['prefix'] . '_storehouse_users SET storeid = ' . $storeid . ' WHERE userid =' . $stores_info->userid ); 
        } 
		$user_store=$db->query('SELECT userid FROM ' . $db_config['prefix'] . '_storehouse_users_stores WHERE storeid = ' . $storeid . ' AND chain=1'); 
        if($user_store->rowCount() == 0 && $storeid > 0){	 
        	$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_users_stores (userid,storeid,chain)  VALUE (' . $userid . ',' . $storeid . ',1) '); 
        }else{ 
        	$db->query('UPDATE ' . $db_config['prefix'] . '_storehouse_users_stores SET userid = ' . $userid . ' WHERE storeid=' . $storeid); 
        }
	}
	create_sub_store_default( $array_info_site, $userid);
}
function create_sub_store_default($array_info_site, $userid){
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$weight = $db->query('SELECT max(sort_order) FROM ' . $db_config['prefix'] . '_storehouse_stores')->fetchColumn();
    $weight = intval($weight) + 1;
	$title = $array_info_site['StoreName'] . ' (Default)';
    $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_storehouse_stores ( parentid, name, category_id, url, userid, sort_order) VALUES (' . $array_info_site['idsite'] . ', :name, :category_id, :url, :uid, :sort_order)');
    $stmt->bindParam(':sort_order', $weight, PDO::PARAM_INT);
    $stmt->bindParam(':name', $title, PDO::PARAM_STR);
    $stmt->bindParam(':url', $array_info_site['domain'], PDO::PARAM_STR);
    $stmt->bindParam(':uid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':category_id', $array_info_site['catid'], PDO::PARAM_STR);
    $exc = $stmt->execute();
    if ($exc) {
    	$storeid=$db->lastInsertId();
    	nv_fix_store_order();
		$db->query('DELETE FROM ' . $db_config['prefix'] . '_storehouse_store_of_category WHERE category_id NOT IN (' . $array_info_site['catid'] . ') and store_id = ' .  $storeid );
		foreach($array_info_site['category'] as $cate){
			$store_of_cat = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_store_of_category WHERE category_id = ' . $cate . ' AND store_id=' . $storeid)->fetch();
			if (empty($store_of_cat)) {
				$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_store_of_category(store_id, category_id) VALUES ( ' . $storeid . ', ' . $cate . ')');
			}
		}
		$id=$db->query('SELECT setting_id FROM ' . $db_config['prefix'] . '_storehouse_settings WHERE setting_id = ' . $storeid)->fetch(5)->setting_id;
    	if ($id == 0 && $storeid > 0) {
    		$row['logo'] = '';
		    $row['logo2'] = '';
		    $row['site_name'] = '';
		    $row['language'] = '';
		    $row['default_warehouse'] = 0;
		    $row['accounting_method'] = 0;
		    $row['default_currency'] = '';
		    $row['default_tax_rate'] = 0;
		    $row['rows_per_page'] = 0;
		    $row['version'] = '1.0';
		    $row['default_tax_rate2'] = 0;
		    $row['dateformat'] = 0;
		    $row['sales_prefix'] = '';
		    $row['quote_prefix'] = '';
		    $row['purchase_prefix'] = '';
		    $row['transfer_prefix'] = '';
		    $row['delivery_prefix'] = '';
		    $row['payment_prefix'] = '';
		    $row['return_prefix'] = '';
		    $row['returnp_prefix'] = '';
		    $row['expense_prefix'] = '';
		    $row['item_addition'] = 0;
		    $row['theme'] = '';
		    $row['product_serial'] = 0;
		    $row['default_discount'] = 0;
		    $row['product_discount'] = 0;
		    $row['discount_method'] = 0;
		    $row['tax1'] = 0;
		    $row['tax2'] = 0;
		    $row['overselling'] = 0;
		    $row['restrict_user'] = 0;
		    $row['restrict_calendar'] = 0;
		    $row['timezone'] = '';
		    $row['iwidth'] = 0;
		    $row['iheight'] = 0;
		    $row['twidth'] = 0;
		    $row['theight'] = 0;
		    $row['watermark'] = 0;
		    $row['reg_ver'] = 0;
		    $row['allow_reg'] = 0;
		    $row['reg_notification'] = 0;
		    $row['auto_reg'] = 0;
		    $row['protocol'] = 'mail';
		    $row['mailpath'] = '/usr/sbin/sendmail';
		    $row['smtp_host'] = '';
		    $row['smtp_user'] = '';
		    $row['smtp_pass'] = '';
		    $row['smtp_port'] = '25';
		    $row['smtp_crypto'] = '';
		    $row['corn'] = '';
		    $row['customer_group'] = 0;
		    $row['default_email'] = '';
		    $row['mmode'] = 0;
		    $row['bc_fix'] = 0;
		    $row['auto_detect_barcode'] = 0;
		    $row['captcha'] = 1;
		    $row['reference_format'] = 1;
		    $row['racks'] = 0;
		    $row['attributes'] = 0;
		    $row['product_expiry'] = 0;
		    $row['decimals'] = 2;
		    $row['qty_decimals'] = 2;
		    $row['decimals_sep'] = '.';
		    $row['thousands_sep'] = ',';
		    $row['invoice_view'] = 0;
		    $row['default_biller'] = 0;
		    $row['envato_username'] = '';
		    $row['purchase_code'] = '';
		    $row['rtl'] = 0;
		    $row['each_spent'] = '';
		    $row['ca_point'] = 0;
		    $row['each_sale'] = '';
		    $row['sa_point'] = 0;
		    $row['update'] = 0;
		    $row['sac'] = 0;
		    $row['display_all_products'] = 0;
		    $row['display_symbol'] = 0;
		    $row['symbol'] = '';
		    $row['remove_expired'] = 0;
		    $row['barcode_separator'] = '-';
		    $row['set_focus'] = 0;
		    $row['price_group'] = 0;
		    $row['barcode_img'] = 1;
		    $row['ppayment_prefix'] = 'POP';
		    $row['disable_editing'] = 90;
		    $row['qa_prefix'] = '';
		    $row['update_cost'] = 0;
		    $row['apis'] = 0;
		    $row['state'] = '';
		    $row['pdf_lib'] = 'dompdf';
            $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_storehouse_settings (setting_id, logo, logo2, site_name, language, default_warehouse, accounting_method, default_currency, default_tax_rate, rows_per_page, version, default_tax_rate2, dateformat, sales_prefix, quote_prefix, purchase_prefix, transfer_prefix, delivery_prefix, payment_prefix, return_prefix, returnp_prefix, expense_prefix, item_addition, theme, product_serial, default_discount, product_discount, discount_method, tax1, tax2, overselling, restrict_user, restrict_calendar, timezone, iwidth, iheight, twidth, theight, watermark, reg_ver, allow_reg, reg_notification, auto_reg, protocol, mailpath, smtp_host, smtp_user, smtp_pass, smtp_port, smtp_crypto, corn, customer_group, default_email, mmode, bc_fix, auto_detect_barcode, captcha, reference_format, racks, attributes, product_expiry, decimals, qty_decimals, decimals_sep, thousands_sep, invoice_view, default_biller, envato_username, purchase_code, rtl, each_spent, ca_point, each_sale, sa_point, supdate, sac, display_all_products, display_symbol, symbol, remove_expired, barcode_separator, set_focus, price_group, barcode_img, ppayment_prefix, disable_editing, qa_prefix, update_cost, apis, state, pdf_lib) VALUES (' . $storeid . ', :logo, :logo2, :site_name, :language, :default_warehouse, :accounting_method, :default_currency, :default_tax_rate, :rows_per_page, :version, :default_tax_rate2, :dateformat, :sales_prefix, :quote_prefix, :purchase_prefix, :transfer_prefix, :delivery_prefix, :payment_prefix, :return_prefix, :returnp_prefix, :expense_prefix, :item_addition, :theme, :product_serial, :default_discount, :product_discount, :discount_method, :tax1, :tax2, :overselling, :restrict_user, :restrict_calendar, :timezone, :iwidth, :iheight, :twidth, :theight, :watermark, :reg_ver, :allow_reg, :reg_notification, :auto_reg, :protocol, :mailpath, :smtp_host, :smtp_user, :smtp_pass, :smtp_port, :smtp_crypto, :corn, :customer_group, :default_email, :mmode, :bc_fix, :auto_detect_barcode, :captcha, :reference_format, :racks, :attributes, :product_expiry, :decimals, :qty_decimals, :decimals_sep, :thousands_sep, :invoice_view, :default_biller, :envato_username, :purchase_code, :rtl, :each_spent, :ca_point, :each_sale, :sa_point, :update, :sac, :display_all_products, :display_symbol, :symbol, :remove_expired, :barcode_separator, :set_focus, :price_group, :barcode_img, :ppayment_prefix, :disable_editing, :qa_prefix, :update_cost, :apis, :state, :pdf_lib)');
			$stmt->bindParam(':logo', $row['logo'], PDO::PARAM_STR);
            $stmt->bindParam(':logo2', $row['logo2'], PDO::PARAM_STR);
            $stmt->bindParam(':site_name', $row['site_name'], PDO::PARAM_STR);
            $stmt->bindParam(':language', $row['language'], PDO::PARAM_STR);
            $stmt->bindParam(':default_warehouse', $row['default_warehouse'], PDO::PARAM_INT);
            $stmt->bindParam(':accounting_method', $row['accounting_method'], PDO::PARAM_INT);
            $stmt->bindParam(':default_currency', $row['default_currency'], PDO::PARAM_STR);
            $stmt->bindParam(':default_tax_rate', $row['default_tax_rate'], PDO::PARAM_INT);
            $stmt->bindParam(':rows_per_page', $row['rows_per_page'], PDO::PARAM_INT);
            $stmt->bindParam(':version', $row['version'], PDO::PARAM_STR);
            $stmt->bindParam(':default_tax_rate2', $row['default_tax_rate2'], PDO::PARAM_INT);
            $stmt->bindParam(':dateformat', $row['dateformat'], PDO::PARAM_INT);
            $stmt->bindParam(':sales_prefix', $row['sales_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':quote_prefix', $row['quote_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':purchase_prefix', $row['purchase_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':transfer_prefix', $row['transfer_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':delivery_prefix', $row['delivery_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':payment_prefix', $row['payment_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':return_prefix', $row['return_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':returnp_prefix', $row['returnp_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':expense_prefix', $row['expense_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':item_addition', $row['item_addition'], PDO::PARAM_INT);
            $stmt->bindParam(':theme', $row['theme'], PDO::PARAM_STR);
            $stmt->bindParam(':product_serial', $row['product_serial'], PDO::PARAM_INT);
            $stmt->bindParam(':default_discount', $row['default_discount'], PDO::PARAM_INT);
            $stmt->bindParam(':product_discount', $row['product_discount'], PDO::PARAM_INT);
            $stmt->bindParam(':discount_method', $row['discount_method'], PDO::PARAM_INT);
            $stmt->bindParam(':tax1', $row['tax1'], PDO::PARAM_INT);
            $stmt->bindParam(':tax2', $row['tax2'], PDO::PARAM_INT);
            $stmt->bindParam(':overselling', $row['overselling'], PDO::PARAM_INT);
            $stmt->bindParam(':restrict_user', $row['restrict_user'], PDO::PARAM_INT);
            $stmt->bindParam(':restrict_calendar', $row['restrict_calendar'], PDO::PARAM_INT);
            $stmt->bindParam(':timezone', $row['timezone'], PDO::PARAM_STR);
            $stmt->bindParam(':iwidth', $row['iwidth'], PDO::PARAM_INT);
            $stmt->bindParam(':iheight', $row['iheight'], PDO::PARAM_INT);
            $stmt->bindParam(':twidth', $row['twidth'], PDO::PARAM_INT);
            $stmt->bindParam(':theight', $row['theight'], PDO::PARAM_INT);
            $stmt->bindParam(':watermark', $row['watermark'], PDO::PARAM_INT);
            $stmt->bindParam(':reg_ver', $row['reg_ver'], PDO::PARAM_INT);
            $stmt->bindParam(':allow_reg', $row['allow_reg'], PDO::PARAM_INT);
            $stmt->bindParam(':reg_notification', $row['reg_notification'], PDO::PARAM_INT);
            $stmt->bindParam(':auto_reg', $row['auto_reg'], PDO::PARAM_INT);
            $stmt->bindParam(':protocol', $row['protocol'], PDO::PARAM_STR);
            $stmt->bindParam(':mailpath', $row['mailpath'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_host', $row['smtp_host'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_user', $row['smtp_user'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_pass', $row['smtp_pass'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_port', $row['smtp_port'], PDO::PARAM_STR);
            $stmt->bindParam(':smtp_crypto', $row['smtp_crypto'], PDO::PARAM_STR);
            $stmt->bindParam(':corn', $row['corn'], PDO::PARAM_STR);
            $stmt->bindParam(':customer_group', $row['customer_group'], PDO::PARAM_INT);
            $stmt->bindParam(':default_email', $row['default_email'], PDO::PARAM_STR);
            $stmt->bindParam(':mmode', $row['mmode'], PDO::PARAM_INT);
            $stmt->bindParam(':bc_fix', $row['bc_fix'], PDO::PARAM_INT);
            $stmt->bindParam(':auto_detect_barcode', $row['auto_detect_barcode'], PDO::PARAM_INT);
            $stmt->bindParam(':captcha', $row['captcha'], PDO::PARAM_INT);
            $stmt->bindParam(':reference_format', $row['reference_format'], PDO::PARAM_INT);
            $stmt->bindParam(':racks', $row['racks'], PDO::PARAM_INT);
            $stmt->bindParam(':attributes', $row['attributes'], PDO::PARAM_INT);
            $stmt->bindParam(':product_expiry', $row['product_expiry'], PDO::PARAM_INT);
            $stmt->bindParam(':decimals', $row['decimals'], PDO::PARAM_INT);
            $stmt->bindParam(':qty_decimals', $row['qty_decimals'], PDO::PARAM_INT);
            $stmt->bindParam(':decimals_sep', $row['decimals_sep'], PDO::PARAM_STR);
            $stmt->bindParam(':thousands_sep', $row['thousands_sep'], PDO::PARAM_STR);
            $stmt->bindParam(':invoice_view', $row['invoice_view'], PDO::PARAM_INT);
            $stmt->bindParam(':default_biller', $row['default_biller'], PDO::PARAM_INT);
            $stmt->bindParam(':envato_username', $row['envato_username'], PDO::PARAM_STR);
            $stmt->bindParam(':purchase_code', $row['purchase_code'], PDO::PARAM_STR);
            $stmt->bindParam(':rtl', $row['rtl'], PDO::PARAM_INT);
            $stmt->bindParam(':each_spent', $row['each_spent'], PDO::PARAM_STR);
            $stmt->bindParam(':ca_point', $row['ca_point'], PDO::PARAM_INT);
            $stmt->bindParam(':each_sale', $row['each_sale'], PDO::PARAM_STR);
            $stmt->bindParam(':sa_point', $row['sa_point'], PDO::PARAM_INT);
            $stmt->bindParam(':update', $row['update'], PDO::PARAM_INT);
            $stmt->bindParam(':sac', $row['sac'], PDO::PARAM_INT);
            $stmt->bindParam(':display_all_products', $row['display_all_products'], PDO::PARAM_INT);
            $stmt->bindParam(':display_symbol', $row['display_symbol'], PDO::PARAM_INT);
            $stmt->bindParam(':symbol', $row['symbol'], PDO::PARAM_STR);
            $stmt->bindParam(':remove_expired', $row['remove_expired'], PDO::PARAM_INT);
            $stmt->bindParam(':barcode_separator', $row['barcode_separator'], PDO::PARAM_STR);
            $stmt->bindParam(':set_focus', $row['set_focus'], PDO::PARAM_INT);
            $stmt->bindParam(':price_group', $row['price_group'], PDO::PARAM_INT);
            $stmt->bindParam(':barcode_img', $row['barcode_img'], PDO::PARAM_INT);
            $stmt->bindParam(':ppayment_prefix', $row['ppayment_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':disable_editing', $row['disable_editing'], PDO::PARAM_INT);
            $stmt->bindParam(':qa_prefix', $row['qa_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(':update_cost', $row['update_cost'], PDO::PARAM_INT);
            $stmt->bindParam(':apis', $row['apis'], PDO::PARAM_INT);
            $stmt->bindParam(':state', $row['state'], PDO::PARAM_STR);
            $stmt->bindParam(':pdf_lib', $row['pdf_lib'], PDO::PARAM_STR);
			$exc = $stmt->execute();
        }
		$stores_info = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_storehouse_stores WHERE store_id = ' . $storeid)->fetch(5);
		$user=$db->query('SELECT userid FROM ' . $db_config['prefix'] . '_storehouse_users WHERE userid = ' . $stores_info->userid . '');
		if($user->rowCount() == 0 && $storeid > 0){ 
        	$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_users (userid,storeid,is_staff)  VALUE (' . $stores_info->userid . ',' . $storeid . ' ,1) ');	  
        }else{
        	$db->query('UPDATE ' . $db_config['prefix'] . '_storehouse_users SET storeid = ' . $storeid . ' WHERE userid =' . $stores_info->userid ); 
        } 
		$user_store=$db->query('SELECT userid FROM ' . $db_config['prefix'] . '_storehouse_users_stores WHERE storeid = ' . $storeid . ' AND chain=1'); 
        if($user_store->rowCount() == 0 && $storeid > 0){	 
        	$db->query('INSERT INTO ' . $db_config['prefix'] . '_storehouse_users_stores (userid,storeid,chain)  VALUE (' . $userid . ',' . $storeid . ',1) '); 
        }else{ 
        	$db->query('UPDATE ' . $db_config['prefix'] . '_storehouse_users_stores SET userid = ' . $userid . ' WHERE storeid=' . $storeid); 
        }
	}
}
function nv_fix_store_order($parentid = 0, $order = 0, $lev = 0)
{
    global $db, $db_config, $module_data;

    $sql = 'SELECT store_id, parentid FROM ' . $db_config['prefix'] . '_storehouse_stores WHERE parentid=' . $parentid . ' ORDER BY weight ASC';
    $result = $db->query($sql);
    $array_store_order = array();
    while ($row = $result->fetch()) {
        $array_store_order[] = $row['store_id'];
    }
    $result->closeCursor();
    $weight = 0;

    if ($parentid > 0) {
        ++$lev;
    } else {
        $lev = 0;
    }

    foreach ($array_store_order as $storeid_i) {
        ++$order;
        ++$weight;
        $sql = 'UPDATE ' . $db_config['prefix'] . '_storehouse_stores SET weight=' . $weight . ', sort_order=' . $order . ', lev=' . $lev . ' WHERE store_id=' . $storeid_i;
        $db->query($sql);
        $order = nv_fix_store_order($storeid_i, $order, $lev);
    }

    $numsubstore = $weight;
    if ($parentid > 0) {
        
        $sql = 'UPDATE ' . $db_config['prefix'] . '_storehouse_stores SET numstore=' . $numsubstore;
        if ($numsubstore == 0 ) {
            $sql .= ", substoreid=''";
        } else {
            $sql .= ", substoreid='" . implode(",", $array_store_order) . "'";
        }
        $sql .= ' WHERE store_id=' . $parentid;
        $db->query($sql);
    }
    return $order;
}
function delete_sub_website($array_info_site)
{
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	
	delete_database($array_info_site);
}

function delete_database($array_info_site){
    global $array_config,$db_config;
	$dbsite = $array_info_site['dbsite'];
	if($array_config['cpaneltype'] == 'cpanel'){
		include NV_ROOTDIR.'/includes/xmlapi.php';
		$opts = [
			 "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
			 "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
			 "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
			 "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
		];

		$xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

		$xmlapi->set_port( $array_config['cpanel_port'] );   

		$xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    

		// database Name

		$TARGET_DB_NAME = $dbsite;

		// database delete 
		$createdb = $xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "deldb",  array($TARGET_DB_NAME));   

		// adds user to database

		if($array_info_site['domaintype']=="domain")
		{
			$xmlapi->unpark($opts['cpanelUserName'],$array_info_site['domain'],'');  
		}elseif($array_info_site['domaintype']=="subdomain" and $array_info_site['subdomain'] != ""){
			$xmlapi->unpark($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
		}
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		include NV_ROOTDIR.'/modules/site//DirectAdmin/DirectAdmin.php';
		$server_login=$array_config['da_ftp_user_name'];
		$server_pass=$array_config['da_ftp_user_pass'];
		$server_host=$array_config['da_ip']; //where the API connects to
		$server_ssl="N";
		$server_port=intval($array_config['da_port']);
		$username=explode('_', $db_config['dbuname']);
	
		$sock = new \DirectAdmin\DirectAdmin;
		if ($server_ssl == 'Y')
		{
			$sock->connect("ssl://".$server_host, $server_port);
		}
		else
		{ 
			$sock->connect($server_host, $server_port);
		}
	 
		$sock->set_login($server_login,$server_pass);
		$sock->set_method('POST');
		$sock->query('/CMD_API_DATABASES',
				array(
						'action' => 'create',
						'name' => $dbsite,
						'userlist' => "admin",//lay user da ton tai
						'passwd' => $array_config['da_ftp_user_name'],
						'passwd2' => $array_config['da_ftp_user_name'],
			));
		$result = $sock->fetch_body();
    }else{
		site_install_delete_database_hostting_vestacp($array_info_site);
	}	
}
function update_sub_website($array_info_site)
{
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$array_info_site['dbsite']=$array_info_site['domain'];
	$array_info_site['domain']=$array_info_site['subdomain'];
	site_install($array_info_site);
	include NV_ROOTDIR.'/includes/xmlapi.php';
    $opts = [
         "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
         "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
         "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
         "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
    ];

    $xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

    $xmlapi->set_port( $array_config['cpanel_port'] );   

    $xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    

	$xmlapi->park($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
}

function vesta_curl_query( $url, $postdata, $authstr )
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // Return contents of transfer on curl_exec
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // Allow self-signed certs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // Set the URL
        curl_setopt($curl, CURLOPT_URL, $url);
        // Increase buffer size to avoid "funny output" exception
        curl_setopt($curl, CURLOPT_BUFFERSIZE, 131072);

        // Pass authentication header
        $header[0] =$authstr .
            "Content-Type: application/x-www-form-urlencoded\r\n" .
            "Content-Length: " . strlen($postdata) . "\r\n" . "\r\n" . $postdata;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        curl_setopt($curl, CURLOPT_POST, 1);

        $result = curl_exec($curl);
        if ($result == false) {
            throw new Exception("curl_exec threw error \"" . curl_error($curl) . "\" for " . $url . "?" . $postdata );
        }
        curl_close($curl);

        return $result;
    }
//vesta hosting
function site_install_create_hostting_vestacp($array_info_site)
{
	global $array_config;
	// Server credentials
	
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_port = $array_config['vesta_port'];
	$vst_returncode = 'yes';
	$vst_command = 'v-add-web-domain-alias';

	// New Domain
	$username = $array_config['vesta_user'];
	$domain = $array_config['my_domains'];
	$alias = $array_info_site['domain'];
	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $domain,
		'arg3' => $alias,
		'arg4' => 'yes'
	);
	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	/* $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'. $vst_port .'/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	return curl_exec($curl); */
	$url = 'https://' . $vst_hostname . ':'. $vst_port .'/api/';
	return vesta_curl_query($url, $postdata,'');
}

function site_delete_hostting_vestacp($array_info_site)
{
	global $array_config;
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_returncode = 'yes';
	$vst_command = 'v-delete-web-domain-alias';

	// New Domain
	$username = $array_config['vesta_user'];
	$domain = $array_config['my_domains'];
	$alias = $array_info_site['domain'];
	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $domain,
		'arg3' => $alias
	);

	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);
	curl_close($curl);
	return $answer;
}
// vesta database
function site_install_create_database_hostting_vestacp($array_info_site)
{
	global $array_config;
	include NV_ROOTDIR . '/'. 'config.php';
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_port = $array_config['vesta_port'];
	$vst_returncode = 'yes';
	$vst_command = 'v-add-database';

	// New Database
	
	$username = $array_config['vesta_user'];
	$db_name = $array_info_site['dbsite'];
	$db_user = str_replace($username."_",'', $db_config['dbuname']);
	$db_pass = $db_config['dbpass'];

	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $db_name,
		'arg3' => $db_user,
		'arg4' => $db_pass
	);
	$postdata = http_build_query($postvars);

	// Send POST query via cURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'. $vst_port .'/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	return curl_exec($curl);
	
}
function site_install_delete_database_hostting_vestacp($array_info_site)
{
	global $array_config;
	include NV_ROOTDIR . '/'. 'config.php';
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_returncode = 'no';
	$vst_command = 'v-delete-database';

	// New Database
	$username = $array_config['vesta_user'];
	$db_name = $array_config['vesta_user'] . '_' . $array_info_site['dbsite'];

	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $db_name
	);
	$postdata = http_build_query($postvars);

	// Send POST query via cURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);
	return $answer;
}
function site_delete_sql($array_info_site)
{
    global $global_config,$db,$admin_info;
	include NV_ROOTDIR . '/'. 'config.php';
    $dbname_tam=$db_config['dbname'];
	$dbsystem_tam=$db_config['dbsystem'];
    $db_config['dbname']=$array_config['vesta_user'] . '_' . $array_info_site['dbsite'];
    $db_config['dbsystem']=$array_config['vesta_user'] . '_' . $array_info_site['dbsite'];
    $db = new NukeViet\Core\Database($db_config);
    $db_config['error']="";
    if(!empty($db_config['dbname'])){
        $tables = array();
        // xoa du lieu cho he thong
        $sql_create_table = array();
        $sql_drop_table = array();
        require_once NV_ROOTDIR . '/install/action_' . $db_config['dbtype'] . '.php';
        $num_table = sizeof($sql_drop_table);
        if ($num_table > 0) {
			foreach ($sql_drop_table as $_sql) {
				try {
					$db->query($_sql);
				} catch (PDOException $e) {
					break;
				}
			}
        }
    }
    $db_config['dbname']=$dbname_tam;
	$db_config['dbsystem']=$dbsystem_tam;
    $db = new NukeViet\Core\Database($db_config);
}

if (!function_exists('nv_save_file_config_global')) {
	function nv_save_file_config_global()
	{
		global $nv_Cache, $db, $sys_info, $global_config, $db_config;

		if ($global_config['idsite']) {
			return false;
		}

		$content_config = "<?php" . "\n\n";
		$content_config .= NV_FILEHEAD . "\n\n";
		$content_config .= "if (!defined('NV_MAINFILE'))\n    die('Stop!!!');\n\n";

		$config_variable = array();
		$allowed_html_tags = '';
		$sql = "SELECT module, config_name, config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='sys' AND (module='global' OR module='define') ORDER BY config_name ASC";
		$result = $db->query($sql);

		while (list($c_module, $c_config_name, $c_config_value) = $result->fetch(3)) {
			if ($c_module == 'define') {
				if (preg_match('/^\d+$/', $c_config_value)) {
					$content_config .= "define('" . strtoupper($c_config_name) . "', " . $c_config_value . ");\n";
				} else {
					$content_config .= "define('" . strtoupper($c_config_name) . "', '" . $c_config_value . "');\n";
				}
				if ($c_config_name == 'nv_allowed_html_tags') {
					$allowed_html_tags = $c_config_value;
				}
			} else {
				$config_variable[$c_config_name] = $c_config_value;
			}
		}

		$nv_eol = strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ? '"\r\n"' : (strtoupper(substr(PHP_OS, 0, 3) == 'MAC') ? '"\r"' : '"\n"');
		$upload_max_filesize = min(nv_converttoBytes(ini_get('upload_max_filesize')), nv_converttoBytes(ini_get('post_max_size')), $config_variable['nv_max_size']);

		$content_config .= "define('NV_EOL', " . $nv_eol . ");\n";
		$content_config .= "define('NV_UPLOAD_MAX_FILESIZE', " . floatval($upload_max_filesize) . ");\n";

		$my_domains = array_map('trim', explode(',', $config_variable['my_domains']));
		$my_domains[] = NV_SERVER_NAME;
		$config_variable['my_domains'] = implode(',', array_unique($my_domains));

		$config_variable['check_rewrite_file'] = nv_check_rewrite_file();
		$config_variable['allow_request_mods'] = NV_ALLOW_REQUEST_MODS != '' ? NV_ALLOW_REQUEST_MODS : "request";
		$config_variable['request_default_mode'] = NV_REQUEST_DEFAULT_MODE != '' ? trim(NV_REQUEST_DEFAULT_MODE) : 'request';

		$config_variable['log_errors_list'] = NV_LOG_ERRORS_LIST;
		$config_variable['display_errors_list'] = NV_DISPLAY_ERRORS_LIST;
		$config_variable['send_errors_list'] = NV_SEND_ERRORS_LIST;
		$config_variable['error_log_path'] = NV_LOGS_DIR . '/error_logs';
		$config_variable['error_log_filename'] = NV_ERRORLOGS_FILENAME;
		$config_variable['error_log_fileext'] = NV_LOGS_EXT;
		$config_variable['error_send_email'] = $config_variable['error_send_email'];

		$config_name_array = array( 'file_allowed_ext', 'forbid_extensions', 'forbid_mimes', 'allow_sitelangs', 'openid_servers', 'allow_request_mods', 'config_sso' );

		foreach ($config_variable as $c_config_name => $c_config_value) {
			if (in_array($c_config_name, $config_name_array)) {
				if (!empty($c_config_value)) {
					$c_config_value = "'" . implode("','", array_map('trim', explode(',', $c_config_value))) . "'";
				} else {
					$c_config_value = '';
				}
				$content_config .= "\$global_config['" . $c_config_name . "']=array(" . $c_config_value . ");\n";
			} else {
				if (preg_match('/^(0|[1-9][0-9]*)$/', $c_config_value) and $c_config_name != 'facebook_client_id') {
					$content_config .= "\$global_config['" . $c_config_name . "']=" . $c_config_value . ";\n";
				} else {
					$c_config_value = nv_unhtmlspecialchars($c_config_value);
					if (!preg_match("/^[a-z0-9\-\_\.\,\;\:\@\/\\s]+$/i", $c_config_value) and $c_config_name != 'my_domains') {
						$c_config_value = nv_htmlspecialchars($c_config_value);
					}
					$content_config .= "\$global_config['" . $c_config_name . "']='" . $c_config_value . "';\n";
				}
			}
		}

		// Các ngôn ngữ data đã thiết lập
		$sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
		$result = $db->query($sql);

		$c_config_value = array();
		while ($row = $result->fetch()) {
			$c_config_value[] = $row['lang'];
		}
		$content_config .= "\$global_config['setup_langs']=array('" . implode("','", $c_config_value) . "');\n";

		//allowed_html_tags
		if (!empty($allowed_html_tags)) {
			$allowed_html_tags = "'" . implode("','", array_map('trim', explode(',', $allowed_html_tags))) . "'";
		} else {
			$allowed_html_tags = '';
		}
		$content_config .= "\$global_config['allowed_html_tags']=array(" . $allowed_html_tags . ");\n";

		//Xac dinh cac search_engine
		$engine_allowed = (file_exists(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) ? nv_object2array(simplexml_load_file(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) : array();
		$content_config .= "\$global_config['engine_allowed']=" . nv_var_export($engine_allowed) . ";\n";
		$content_config .= "\n";

		$language_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/langs.ini', true);
		$tmp_array = array();
		$lang_array_exit = nv_scandir(NV_ROOTDIR . '/includes/language', "/^[a-z]{2}+$/");
		foreach ($lang_array_exit as $lang) {
			$tmp_array[$lang] = $language_array[$lang];
		}
		unset($language_array);
		$content_config .= "\$language_array=" . nv_var_export($tmp_array) . ";\n";

		$tmp_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/timezone.ini', true);
		$content_config .= "\$nv_parse_ini_timezone=" . nv_var_export($tmp_array) . ";\n";

		$global_config['rewrite_optional'] = $config_variable['rewrite_optional'];
		$global_config['rewrite_op_mod'] = $config_variable['rewrite_op_mod'];

		$global_config['rewrite_endurl'] = $config_variable['rewrite_endurl'];
		$global_config['rewrite_exturl'] = $config_variable['rewrite_exturl'];

		$content_config .= "\n";

		$nv_plugin_area = array();
		$_sql = 'SELECT * FROM ' . $db_config['prefix'] . '_plugin ORDER BY plugin_area ASC, weight ASC';
		$_query = $db->query($_sql);
		while ($row = $_query->fetch()) {
			$nv_plugin_area[$row['plugin_area']][] = $row['plugin_file'];
		}
		$content_config .= "\$nv_plugin_area=" . nv_var_export($nv_plugin_area) . ";\n\n";

		$return = file_put_contents(NV_ROOTDIR . "/" . NV_DATADIR . "/config_global.php", trim($content_config), LOCK_EX);
		$nv_Cache->delAll();

		//Resets the contents of the opcode cache
		if (function_exists('opcache_reset')) {
			opcache_reset();
		}
		return $return;
	}
}
if (!function_exists('nv_check_rewrite_file')) {
	function nv_check_rewrite_file()
	{
		global $sys_info;
		if ($sys_info['supports_rewrite'] == 'nginx') {
			return true;
		}
		elseif ($sys_info['supports_rewrite'] == 'rewrite_mode_apache') {
			if (!file_exists(NV_ROOTDIR . '/.htaccess')) {
				return false;
			}

			$htaccess = @file_get_contents(NV_ROOTDIR . '/.htaccess');

			return (preg_match('/\#nukeviet\_rewrite\_start(.*)\#nukeviet\_rewrite\_end/s', $htaccess));
		}
		elseif ($sys_info['supports_rewrite'] == 'rewrite_mode_iis') {
			if (!file_exists(NV_ROOTDIR . '/web.config')) {
				return false;
			}

			$web_config = @file_get_contents(NV_ROOTDIR . '/web.config');

			return (preg_match('/<rule name="nv_rule_rewrite">(.*)<\/rule>/s', $web_config));
		}

		return false;
	}
}
/**
 * nv_var_export()
 *
 * @param mixed $var_array
 * @return
 */
 if (!function_exists('nv_var_export')) {
	function nv_var_export($var_array)
	{
		$ct = preg_replace('/[\s\t\r\n]+/', ' ', var_export($var_array, true));
		$ct = str_replace("', ), '", "'), '", $ct);
		$ct = str_replace('array ( ', 'array(', $ct);
		$ct = str_replace(' => ', '=>', $ct);
		$ct = str_replace('\', ), ), )', '\')))', $ct);
		$ct = str_replace('\', ), )', '\'))', $ct);
		$ct = preg_replace("/\'\, \)+$/", "')", $ct);
		return $ct;
	}
 }
 
function nv_sql_create_db($dbnew)
{
    global $db, $db_config;
    
    try {
        $db->query('CREATE DATABASE ' . $dbnew);
        $db->exec('USE ' . $dbnew);
        
        $db->exec('ALTER DATABASE ' . $dbnew . ' DEFAULT CHARACTER SET ' . $db_config['charset'] . ' COLLATE ' . $db_config['collation']);
        
        $row = $db->query('SELECT @@session.character_set_database AS character_set_database,  @@session.collation_database AS collation_database')->fetch();
        if ($row['character_set_database'] != $db_config['charset'] or $row['collation_database'] != $db_config['collation']) {
            return 0;
        }
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}


/**
 * nv_listUploadDir()
 *
 * @param mixed $dir
 * @param mixed $real_dirlist
 */
function nv_listUploadDir($dir, $real_dirlist = [])
{
    $real_dirlist[] = $dir;

    if (($dh = @opendir(NV_ROOTDIR . '/' . $dir)) !== false) {
        while (false !== ($subdir = readdir($dh))) {
            if (preg_match('/^[a-zA-Z0-9\-\_]+$/', $subdir)) {
                if (is_dir(NV_ROOTDIR . '/' . $dir . '/' . $subdir)) {
                    $real_dirlist = nv_listUploadDir($dir . '/' . $subdir, $real_dirlist);
                }
            }
        }

        closedir($dh);
    }

    return $real_dirlist;
}


/**
 * Hàm tính lại toàn bộ dung lượng thư mục
 */
function nv_dirListRefreshSize()
{
    global $global_config, $array_dirname, $db;

    if (empty($global_config['show_folder_size'])) {
        return true;
    }

    foreach ($array_dirname as $dirname => $did) {
        // Tính toán lại dung lượng thư mục
        $sql = 'SELECT SUM(filesize) FROM ' . NV_UPLOAD_GLOBALTABLE . '_file WHERE did IN(
            SELECT did FROM ' . NV_UPLOAD_GLOBALTABLE . '_dir WHERE
            dirname=' . $db->quote($dirname) . " OR dirname LIKE '" . $db->dblikeescape($dirname . '/') . "%'
        )";
        $total_size = (float) ($db->query($sql)->fetchColumn());

        $db->query('UPDATE ' . NV_UPLOAD_GLOBALTABLE . '_dir SET total_size=' . $total_size . ' WHERE did=' . (int) $did);
    }
}