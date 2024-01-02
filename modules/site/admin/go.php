<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$idsite = $nv_Request->get_int('idsite', 'post,get', 0);
$admin = $nv_Request->get_int('admin', 'post,get', 0);

$sql = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE idsite=" . $idsite;
$result = $db->query($sql);
$num = $result->rowCount();
if ($num) {
    $row = $result->fetch();
    
    if (isset($row['domain']) and isset($array_site_cat[$row['cid']])) {
        $sql = "SELECT * FROM " . NV_AUTHORS_GLOBALTABLE . " WHERE admin_id=" . $admin_info['admin_id'];
        $result = $db->query($sql);
        $row_info = $result->fetch();
        
        require (NV_ROOTDIR . "/" . NV_CONFIG_DIR . "/" . $row['domain'] . '.php');
        
        $count = $db->query('SELECT COUNT(*) FROM ' . $db_config['dbsite'] . '.' . NV_AUTHORS_GLOBALTABLE . ' WHERE admin_id=' . $row_info['admin_id'])->fetchColumn();
        if(!$count){
            $sth = $db->prepare("INSERT INTO " . $db_config['dbsite'] . "." . NV_AUTHORS_GLOBALTABLE . "
    		(admin_id, editor, lev, files_level, position, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES
    		( :admin_id, :editor, :lev, :files_level, :position, :addtime, :edittime, :is_suspend, :susp_reason, :check_num, :last_login, :last_ip, :last_agent)");
        }else{
            $sth = $db->prepare("UPDATE " . $db_config['dbsite'] . "." . NV_AUTHORS_GLOBALTABLE . "
    		SET admin_id=:admin_id, editor=:editor, lev=:lev, files_level=:files_level, position=:position, addtime=:addtime,
            edittime=:edittime, is_suspend=:is_suspend, susp_reason=:susp_reason, check_num=:check_num, last_login=:last_login, 
            last_ip=:last_ip, last_agent=:last_agent WHERE admin_id=" . $row_info['admin_id']);
        }
        $sth->bindParam(':admin_id', $row_info['admin_id'], PDO::PARAM_INT);
        $sth->bindParam(':editor', $row_info['editor'], PDO::PARAM_STR);
        $sth->bindParam(':lev', $row_info['lev'], PDO::PARAM_STR);
        $sth->bindParam(':files_level', $row_info['files_level'], PDO::PARAM_STR);
        $sth->bindParam(':position', $row_info['position'], PDO::PARAM_STR);
        $sth->bindParam(':addtime', $row_info['addtime'], PDO::PARAM_INT);
        $sth->bindParam(':edittime', $row_info['edittime'], PDO::PARAM_INT);
        $sth->bindParam(':is_suspend', $row_info['is_suspend'], PDO::PARAM_INT);
        $sth->bindParam(':susp_reason', $row_info['susp_reason'], PDO::PARAM_STR);
        $sth->bindParam(':check_num', $row_info['check_num'], PDO::PARAM_STR);
        $sth->bindParam(':last_login', $row_info['last_login'], PDO::PARAM_INT);
        $sth->bindParam(':last_ip', $row_info['last_ip'], PDO::PARAM_STR);
        $sth->bindParam(':last_agent', $row_info['last_agent'], PDO::PARAM_STR);
        $sth->execute();
        
        $url = NV_SERVER_PROTOCOL . '://' . $row['domain'] . NV_SERVER_PORT;
        
        if ($admin) {
            $url .= '/' . NV_ADMINDIR;
        }
		$nv_Cache->delAll();
        Header("Location: " . $url);
        exit();
    }
}

nv_info_die(\NukeViet\Core\Language::$lang_global['error_404_title'], \NukeViet\Core\Language::$lang_global['error_404_title'], \NukeViet\Core\Language::$lang_global['error_404_content']);