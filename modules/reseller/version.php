<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    'name' => 'retails',
    'modfuncs' => 'main,ajax,product,warehouse,productadd,productadd1,transporters,listorder,vieworder,infoshop,follow,wishlist,historywarehouseimport,historywarehouseimportview,upload,upload_ckeditor,images,orderprintnoqr,requireactive,registercontact,develop,nopayment,barcode,voucher,voucher-add,complain,complain-view,auditing, doanhthu, product-import, voucher-add1, product-edit,product1, handle-image, promotional-products',
    'change_alias' => 'main,ajax,product,warehouse,productadd,transporters,listorder,vieworder,infoshop,follow,wishlist,historywarehouseimport,historywarehouseimportview,upload,images,orderprintnoqr,requireactive,registercontact,develop,nopayment,barcode, voucher, voucher-add, doanhthu, product-import, voucher-add1, product-edit, product1, handle-image',
    'submenu' => 'main,ajax,product,warehouse,productadd,transporters,listorder,vieworder,infoshop,follow,wishlist,historywarehouseimport,historywarehouseimportview,upload,images,orderprintnoqr,requireactive,registercontact,develop,nopayment,barcode, voucher, voucher-add, doanhthu, product-import, product-edit, product1, handle-image',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.03',
    'date' => 'Mon, 21 Dec 2020 09:08:19 GMT',
    'author' => 'Họ Nguyễn (honguyentapdoan@gmail.com)',
    'uploads_dir' => array(
        $module_upload,
        $module_upload . '/business_license',
        $module_upload . '/transporters',
        $module_upload . '/tab',
        $module_upload . '/' . date('Y_m')
    ),
    'note' => ''
);
