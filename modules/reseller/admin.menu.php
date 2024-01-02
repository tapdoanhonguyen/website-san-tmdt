<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');


$submenu['listorder']=$lang_module['order'];

$product=array();
$product['product_add']=$lang_module['product_add'];
$product['warehouse_import']=$lang_module['warehouse_import'];
$submenu['product']= array( 'title' => $lang_module['product'], 'submenu' => $product );
$submenu['category']=$lang_module['category'];
$seller_management=array();
$seller_management['seller_management_add']=$lang_module['seller_management_add'];
$submenu['seller_management']= array( 'title' => $lang_module['seller_management'], 'submenu' => $seller_management );
$submenu['transporters']=$lang_module['transporters'];
$config=array();
$config['unit']=$lang_module['unit'];
$config['brand']=$lang_module['brand'];
$config['origin']=$lang_module['origin'];
$config['unit_weight']=$lang_module['unit_weight'];
$config['unit_length']=$lang_module['unit_length'];
$config['unit_currency']=$lang_module['unit_currency'];
$config['block']=$lang_module['block'];
$config['tabs']=$lang_module['tabs'];
$config['bank']=$lang_module['bank'];
$submenu['config']= array( 'title' => $lang_module['config'], 'submenu' => $config );