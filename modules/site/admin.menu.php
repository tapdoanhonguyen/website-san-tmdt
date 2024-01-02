<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */

if ( ! defined( 'NV_ADMIN' ) ) die( 'Stop!!!' );
$submenu['site'] = $nv_Lang->getModule('add_site');
$submenu['userguide'] = $nv_Lang->getModule('userguide');
if($global_config['idsite']==0){
$submenu['cat'] = $nv_Lang->getModule('cat');
$submenu['config'] = $nv_Lang->getModule('config');
}

