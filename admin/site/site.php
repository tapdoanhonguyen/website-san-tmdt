<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if (! defined('NV_IS_FILE_SETTINGS'))
    die('Stop!!!');

if (empty($array_site_cat)) {
    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat&add=1");
    exit();
}

$post = array(
    'cid' => 0,
    'title' => '',
    'data' => ''
);

$server_ip = (isset($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : gethostbyname(NV_SERVER_NAME);
$error = sprintf($lang_global['noteaddip'], $server_ip);

if ($nv_Request->isset_request('submit', 'post')) {
    $post['title'] = $nv_Request->get_title('title', 'post', '', 1);
    $post['data'] = $nv_Request->get_title('data', 'post', '', 0);
    $post['cid'] = $nv_Request->get_int('cid', 'post', 0);
    
    $post['userid'] = $nv_Request->get_int('userid', 'post', 0);
    
    $sd = $nv_Request->get_title('site_dir', 'post', '', 1);
    
    $dm = $nv_Request->get_title('domain', 'post', '', 0);
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
        $post['domain'] = $temp;
    }
    
    if (preg_match($global_config['check_module'], $sd)) {
        $post['site_dir'] = $sd;
    } else {
        $temp = explode('.', $post['domain']);
        $post['site_dir'] = $temp[0];
    }
    if (isset($array_site_cat[$post['cid']]) and ! empty($post['title']) and ! empty($post['domain']) and ! empty($post['site_dir']) and ! empty($post['data']) and ! empty($post['userid'])) {
        $array_row_authors = array();
        $sql = "SELECT * FROM " . NV_AUTHORS_GLOBALTABLE . " WHERE lev=1";
        $result = $db->query($sql);
        while ($row = $result->fetch()) {
            $array_row_authors[$row['admin_id']] = $row;
        }
        
        if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $post['domain'] . '.php')) {
            $error = $lang_module['error_domain'];
        } elseif (is_dir(NV_ROOTDIR . "/" . SYSTEM_UPLOADS_DIR . "/" . $post['site_dir']) or is_dir(NV_ROOTDIR . "/" . SYSTEM_FILES_DIR . "/" . $post['site_dir']) or is_dir(NV_ROOTDIR . "/" . SYSTEM_CACHEDIR . "/" . $post['domain'])) {
            $error = $lang_module['error_site_dir'];
        } elseif (! file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $post['data'] . '.sql')) {
            $error = $lang_module['error_sample_data'];
        } elseif (isset($array_row_authors[$post['userid']])) {
            $error = $lang_module['error_userid_godadmin'];
        } else {
            $_sql = "INSERT INTO " . $db_config['prefix'] . "_site (idsite, cid, title, site_dir, domain, parked_domains, addtime, userid) VALUES (NULL, '" . $post['cid'] . "', " . $db->quote($post['title']) . ", '" . $post['site_dir'] . "', '" . $post['domain'] . "', '', UNIX_TIMESTAMP(), " . $post['userid'] . ")";
            $idsite = $db->insert_id($_sql);
            if ($idsite) {
                $result = $db->query("SELECT adminid FROM " . $db_config['prefix'] . "_site_cat WHERE cid=" . $post['cid']);
                list ($adminid) = $result->fetch(3);
                $adminid = intval($adminid);
                
                $array_row_usersid = array_keys($array_row_authors);
                $array_row_usersid[] = $post['userid'];
                if ($adminid > 0 and $adminid != $post['userid']) {
                    $array_row_usersid[] = $adminid;
                }
                
                $array_row_users = array();
                $sql = "SELECT * FROM " . NV_USERS_GLOBALTABLE . " WHERE userid IN (" . implode(',', $array_row_usersid) . ")";
                $result = $db->query($sql);
                while ($row = $result->fetch()) {
                    $array_row_users[$row['userid']] = $row;
                }
                $dbnew = $db_config['dbprefix'] . '_' . preg_replace(array(
                    "/[^a-z0-9]/",
                    '/[\_]+/',
                    "/^[\_]+/",
                    "/[\_]+$/"
                ), array(
                    "_",
                    "_",
                    "",
                    ""
                ), strtolower($post['site_dir']));

                if (nv_sql_create_db($dbnew)) {
                    include (NV_ROOTDIR . "/includes/core/dump.php");
                    if (nv_dump_restore(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $post['data'] . '.sql')) {
                        $table_users_globaltable = $dbnew . '.' . str_replace($db_config['dbsystem'] . '.', '', NV_USERS_GLOBALTABLE);
                        $authors_globaltable = $dbnew . "." . NV_AUTHORS_GLOBALTABLE;
                        
                        $db->query("TRUNCATE " . $authors_globaltable);
                        $db->query("TRUNCATE " . $table_users_globaltable);                            

                        $sth = $db->prepare("INSERT INTO " . $authors_globaltable . "
                    		(admin_id, editor, lev, files_level, position, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES
                    		( :admin_id, :editor, :lev, :files_level, :position, :addtime, :edittime, :is_suspend, :susp_reason, :check_num, :last_login, :last_ip, :last_agent)");
                        
                        foreach ($array_row_authors as $row_info) {
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
                        }
                        
                        foreach ($array_row_users as $_user) {
                            $sql = "INSERT INTO " . $table_users_globaltable . " (
                                userid, group_id, username, md5username, password, email, first_name, last_name, gender, birthday, sig, regdate,
                                question, answer, passlostkey, view_mail, remember, in_groups, active, checknum, last_login, last_ip, last_agent, last_openid, idsite)
                            VALUES (
                                " . $_user['userid'] . ",
                                " . $_user['group_id'] . ",
                                :username,
                                :md5_username,
                                :password,
                                :email,
                                :first_name,
                                :last_name,
                                :gender,
                                " . $_user['birthday'] . ",
                                :sig,
                                " . $_user['regdate'] . ",
                                :question,
                                :answer,
                                '',
                                 " . $_user['view_mail'] . ",
                                 1,
                                 '" . $_user['in_groups'] . "', 1, '', 0, '', '', '', " . $_user['idsite'] . "
                            )";
                            
                            $data_insert = array();
                            $data_insert['username'] = $_user['username'];
                            $data_insert['md5_username'] = $_user['md5username'];
                            $data_insert['password'] = $_user['password'];
                            $data_insert['email'] = $_user['email'];
                            $data_insert['first_name'] = $_user['first_name'];
                            $data_insert['last_name'] = $_user['last_name'];
                            $data_insert['gender'] = $_user['gender'];
                            $data_insert['sig'] = $_user['sig'];
                            $data_insert['question'] = $_user['question'];
                            $data_insert['answer'] = $_user['answer'];
                            
                            $db->insert_id($sql, 'userid', $data_insert);
                        }
                        
                        $db->query("UPDATE " . $dbnew . "." . $db_config['prefix'] . "_config SET config_value = " . $db->quote($post['title']) . " WHERE module = 'global' AND config_name = 'site_name'");
                        
                        // Toa tai khoan dieu hanh chung
                        $db->query("INSERT INTO " . $dbnew . "." . $db_config['prefix'] . "_authors (admin_id, editor, lev, files_level, position, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES(" . $post['userid'] . ", 'ckeditor', 2, 'adobe,application,archives,audio,documents,flash,images,real,video|1|1|1', '" . $lang_module['adminsubsite'] . "', 0, 0, 0, '', '', 0, '', '')");
                        if ($adminid > 0 and $adminid != $post['userid']) {
                            $db->query("INSERT INTO " . $dbnew . "." . $db_config['prefix'] . "_authors (admin_id, editor, lev, files_level, position, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES(" . $adminid . ", 'ckeditor', 2, 'adobe,application,archives,audio,documents,flash,images,real,video|1|1|1', '" . $lang_module['adminsubsite'] . "', 0, 0, 0, '', '', 0, '', '')");
                        }
                        
                        $content_config = "<?php\n\n";
                        $content_config .= NV_FILEHEAD . "\n\n";
                        
                        $content_config .= "if ( ! defined( 'NV_MAINFILE' ) )\n";
                        
                        $content_config .= "{\n";
                        $content_config .= "    die( 'Stop!!!' );\n";
                        $content_config .= "}\n\n";
                        
                        $content_config .= "\$db_config['dbsite'] = '" . $dbnew . "';\n";
                        $content_config .= "\$db_config['dbsystem'] = '" . $dbnew . "';\n";
                        $content_config .= "\$global_config['idsite'] = " . $idsite . ";\n";
                        $content_config .= "\$global_config['site_dir'] = '" . $post['site_dir'] . "';\n";
                        $content_config .= "\$global_config['allow_sitelangs'] = array('vi');\n";
                        $content_config .= "\n";
                        
                        file_put_contents(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $post['domain'] . '.php', $content_config, LOCK_EX);
                        nv_mkdir(NV_ROOTDIR . '/' . SYSTEM_UPLOADS_DIR, $post['site_dir']);
                        nv_mkdir(NV_ROOTDIR . '/' . SYSTEM_FILES_DIR, $post['site_dir']);
                        nv_mkdir(NV_ROOTDIR . '/' . SYSTEM_CACHEDIR, $post['site_dir']);
                        
                        if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $post['data'] . '.php')) {
                            include (NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data/' . $post['data'] . '.php');
                        }
                        $nv_Cache->delAll();
                        
                        Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main");
                        exit();
                    } else {
                        trigger_error('error nv_dump_restore', 256);
                    }
                } else {
                    trigger_error('error sql_create_db', 256);
                }
            } else {
                die("INSERT INTO " . $db_config['prefix'] . "_site (idsite, cid, title, site_dir, domain, parked_domains, addtime, userid) VALUES (NULL, '" . $post['cid'] . "', " . $db->quote($post['title']) . ", '" . $post['site_dir'] . "', '" . $post['domain'] . "', '', UNIX_TIMESTAMP(), " . $post['userid'] . ")");
            }
        }
    } elseif ($post['cid'] > 0 and ! isset($array_site_cat[$post['cid']])) {
        Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name);
        exit();
    } else {
        $error = $lang_module['error_fulltext'];
    }
}

$xtpl = new XTemplate("site.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('DATA', $post);

if (! empty($error)) {
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}

$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op);

foreach ($array_site_cat as $row) {
    $listcat = array( //
        'cid' => $row['cid'], //
        'selected' => ($post['cid'] == $row['cid']) ? " selected=\"selected\"" : "", //
        'title' => $row['title']
    ); //
    
    $xtpl->assign('LISTCATS', $listcat);
    $xtpl->parse('main.cid');
}

$datasample = scandir(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/data');
foreach ($datasample as $file) {
    if (preg_match('/([a-zA-Z0-9\_\-]+)\.sql$/', $file, $m)) {
        $row = array( //
            'data' => $m[1], //
            'selected' => ($post['data'] == $m[1]) ? " selected=\"selected\"" : "", //
            'title' => $m[1]
        ); //
        
        $xtpl->assign('LISTDATA', $row);
        $xtpl->parse('main.data');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['site'];

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");

?>