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

$idsite = $nv_Request->get_int('idsite', 'post,get', 0);

$post = array(
    'cid' => 0,
    'title' => ''
);

$server_ip = (isset($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : gethostbyname(NV_SERVER_NAME);
$error = sprintf($lang_global['noteaddip'], $server_ip);

$sql = "SELECT * FROM " . $db_config['prefix'] . "_site WHERE idsite=" . $idsite;
$result = $db->query($sql);
$row = $result->fetch();
if (! isset($array_site_cat[$row['cid']])) {
    Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name);
    exit();
}

if ($nv_Request->isset_request('submit', 'post')) {
    $post['title'] = $nv_Request->get_title('title', 'post', '', 1);
    $post['cid'] = $nv_Request->get_int('cid', 'post', 0);
    if (! isset($array_site_cat[$post['cid']])) {
        Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name);
        exit();
    }
    $parked_domains = $nv_Request->get_title('parked_domains', 'post', '', 0);
    $array_parked_domains = array();
    if (! empty($parked_domains)) {
        $array_temp = array_map("trim", explode(",", $parked_domains));
        foreach ($array_temp as $dm) {
            if (! empty($dm)) {
                $dm2 = (! preg_match("/^(http|https|ftp|gopher)\:\/\//", $dm)) ? "http://" . $dm : $dm;
                if (nv_is_url($dm2)) {
                    $array_parked_domains[] = $dm;
                }
            }
        }
    }
    
    if (! empty($post['title']) and ! empty($post['cid'])) {
        $array_parked_domains_old = array_map("trim", explode(",", $row['parked_domains']));
        
        $array_news_domains = array_diff($array_parked_domains, $array_parked_domains_old);
        if (! empty($array_news_domains)) {
            foreach ($array_news_domains as $newsdomain) {
                if (! empty($newsdomain)) {
                    if (! file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $newsdomain . '.php')) {
                        if (! nv_copyfile(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $row['domain'] . '.php', NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $newsdomain . '.php')) {
                            $array_parked_domains = array_diff($array_parked_domains, array(
                                $newsdomain
                            ));
                        }
                    } else {
                        $array_parked_domains = array_diff($array_parked_domains, array(
                            $newsdomain
                        ));
                    }
                }
            }
            ;
        }
        
        $array_old_domains = array_diff($array_parked_domains_old, $array_parked_domains);
        if (! empty($array_old_domains)) {
            foreach ($array_old_domains as $olddomain) {
                if (! empty($olddomain)) {
                    if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $olddomain . '.php')) {
                        $del = nv_deletefile(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . $olddomain . '.php');
                        if (empty($del[0])) {
                            $array_parked_domains[] = $olddomain;
                        }
                    }
                }
            }
        }
        $array_parked_domains = array_unique($array_parked_domains);
        $db->query("UPDATE " . $db_config['prefix'] . "_site SET cid=" . $post['cid'] . ", title = " . $db->quote($post['title']) . " , parked_domains = '" . implode(',', $array_parked_domains) . "'  WHERE idsite=" . $idsite);
        $nv_Cache->delAll();
        Header("Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main");
        exit();
    } else {
        $error = $lang_module['error_fulltext'];
    }
} else {
    $post = $row;
}

$page_title = $lang_module['manager'];

$xtpl = new XTemplate("edit.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('DATA', $post);

if (! empty($error)) {
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}

$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "&amp;idsite=" . $idsite);

foreach ($array_site_cat as $row) {
    $listcat = array( //
        'cid' => $row['cid'], //
        'selected' => ($post['cid'] == $row['cid']) ? " selected=\"selected\"" : "", //
        'title' => $row['title']
    ) //
;
    $xtpl->assign('LISTCATS', $listcat);
    $xtpl->parse('main.cid');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");
?>