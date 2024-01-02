<?php

/**
 * @Project WALLET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Friday, March 9, 2018 6:24:54 AM
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    "name" => "Wallet",
    "modfuncs" => "main,pay,bank,withdrawal,transfers,complete,money,exchange,historyexchange,recharge,ajax",
    "submenu" => "main,money,withdrawal,bank,transfers,exchange,historyexchange",
    "is_sysmod" => 1,
    "virtual" => 1,
    "version" => "4.3.01",
    "date" => "Tuesday, April 3, 2018 9:31:06 AM GMT+07:00",
    "author" => "VINADES (contact@vinades.vn)",
    "uploads_dir" => array($module_name),
    "note" => "Quản lý tiền thành viên"
);
