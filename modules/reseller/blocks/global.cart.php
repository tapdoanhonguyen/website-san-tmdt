<?php

/**
 * @Project TMS HOLDINGS
 * @Author  <>
 * @Copyright (C) 2021 . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 02 Jan 2021 02:00:54 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nvb_retails_global_cart')) {
    /**
     * @param array $block_config
     * @return string
     */
	function get_info_classify_value_product_block($id,$block_config){
		global $db_config,$db,$site_mods;
		$mod_name = $block_config['module'];
		$list=$db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_product_classify_value_product where id=".$id)->fetch();

		return $list;
	}
	function get_info_classify_value_block($id,$block_config){
		global  $db_config,$db,$site_mods;
		$mod_name = $block_config['module'];
		$list=$db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_product_classify_value where id=".$id)->fetch();

		return $list;
	}
	function get_info_classify_block($id,$block_config){
		global  $db_config,$db,$site_mods;
		$mod_name = $block_config['module'];
		$list=$db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_product_classify where id=".$id)->fetch();
		return $list;
	}
    function nvb_retails_global_cart($block_config)
    {
        global $db_config,$global_config, $db, $site_mods, $nv_Cache;

        $mod_name = $block_config['module'];
        if (isset($site_mods[$mod_name])) {
            $mod_file = $site_mods[$mod_name]['module_file'];
            $mod_upload = $site_mods[$mod_name]['module_upload'];
            $mod_data = $site_mods[$mod_name]['module_data'];
			if(!empty($_SESSION[$mod_data . '_cart'])){
				$list = $_SESSION[$mod_data . '_cart'];
			}else{
				$list = array();
			}
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $mod_file . '/global.cart.tpl')) {
                $block_theme = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $mod_file . '/global.cart.tpl')) {
                $block_theme = $global_config['site_theme'];
            } else {
                $block_theme = 'default';
            }

            $xtpl = new XTemplate('global.cart.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
            $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
            $xtpl->assign('TEMPLATE', $block_theme);
			$xtpl->assign('LINK_CART',NV_BASE_SITEURL.$mod_data.'/cart/');
			$count_cart=0;
			$total=0;
			if(count($list)>0){
				foreach ($list as $key => $row) {
					 $xtpl->assign('key_store', $key);
					foreach ($row as $key_warehouse => $warehouse) {
						$count_cart = $count_cart + count($warehouse);
						$xtpl->assign('key_warehouse', $key_warehouse);
						$info_warehouse = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_warehouse where id=".$key_warehouse)->fetch();
						$xtpl->assign('info_warehouse', $info_warehouse);
						foreach($warehouse as $key_product => $value){
							
							$xtpl->assign('key_product', $key_product);
							$list_product = $db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_product where id=".$value['product_id'])->fetch();
							
							$list_product['alias'] = NV_MY_DOMAIN .'/'. $mod_data .'/'.$list_product['alias'].'-'.$value['product_id'].'/';
							$list_product['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $mod_upload . '/' . $list_product['image'];
							if($value['classify_value_product_id']>0){
								$classify_value_product_id=get_info_classify_value_product_block($value['classify_value_product_id'],$block_config);
								$classify_id_value1=get_info_classify_value_block($classify_value_product_id['classify_id_value1'],$block_config);
								$name_classify_id_value1=get_info_classify_block($classify_id_value1['classify_id'],$block_config)['name_classify'].' '.$classify_id_value1['name'];
								if($classify_value_product_id['classify_id_value2']>0){
									$classify_id_value2=get_info_classify_value_block($classify_value_product_id['classify_id_value2'],$block_config);
									$name_classify_id_value2=get_info_classify_block($classify_id_value2['classify_id'],$block_config)['name_classify'].' '.$classify_id_value2['name'];
									$name_group=$name_classify_id_value1.', '.$name_classify_id_value2;
								}else{
									$name_group=$name_classify_id_value1;
								}
								$list_product['name_product'] = $list_product['name_product'].' ('.$name_group.')';
							}
							
							$list_product['quantity'] = $value['num'];
							$total=$total+$value['price']*$value['num'];
							$list_product['total'] = number_format($value['price']*$value['num']);
							$xtpl->assign('LOOP_INFO_PRODUCT', $list_product);
							$xtpl->parse('main.cart.warehouse.loop');
						}
						$info_store=$db->query("SELECT * FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG. '_' . $site_mods[$mod_name]['module_data'] . "_seller_management where id=".$key)->fetch();
						$xtpl->assign('info_store', $info_store);
						$xtpl->parse('main.cart.warehouse');
					}
					$xtpl->parse('main.cart');
				}
				
				$xtpl->assign('count_cart', $count_cart);
				$xtpl->assign('total', number_format($total));
				$xtpl->parse('main.cart2');
			}else{
				$xtpl->assign('count_cart', $count_cart);
				$xtpl->parse('main.no_cart');
			}
            $xtpl->parse('main');
            return $xtpl->text('main');
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nvb_retails_global_cart($block_config);
}
