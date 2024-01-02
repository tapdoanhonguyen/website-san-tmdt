<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2023 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}
if (file_exists(NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . NV_SERVER_NAME . '.php')) {
	include (NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/' . NV_SERVER_NAME . '.php');
	$db_config['dbname'] = $db_config['dbsite'];
}

/* nv_add_hook($module_name, 'check_server', $priority, function ($vars) {
    global $nv_Server;
    
});
 */