<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);

$allow_func = array('main','bank','seller_management','ajax','seller_management_add','category','category_add','block','config','group','block_add','unit','unit_weight','unit_currency','tabs','transporters','product','product_add','unit_length','product_import_warehouse','warehouse_import','warehouse_import_view','location_ghn','location_viettelpost','block_list_product','listorder','view_order', 'brand','origin','images');

require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';

