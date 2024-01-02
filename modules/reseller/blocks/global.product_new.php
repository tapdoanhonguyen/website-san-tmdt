<?php

/**
 * @Project TMS Holdings
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2019 TMS Holdings. All rights reserved
 * @License: Not free read more http://tms.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 22 Aug 2019 14:58:08 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nvb_home_product_new')) {
    /**
     * @param string $module
     * @param array $data_block
     * @param array $lang_block
     * @return string
     */
    function nvb_config_home_product_new($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods, $nv_Request;
        $html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">Số sản phẩm hiển thị:</label>';
        $html .= '<div class="col-sm-9"><select name="config_number_item" class="form-control">';
        for ($i = 0; $i < 20; ++$i) {
            $html .= '<option value="' . $i . '"' . ($data_block['number_item'] == $i ? ' selected="selected"' : '') . '> ' . $i . ' </option>';
        }
        $html .= "</select></div>";
        $html .= '</div>';
        $html .='<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">Tiêu đề block:</label>';
        $html .= '<div class="col-sm-9"><input type="text" class="form-control" name="title_block" value="' . $data_block['title_block'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '  <label class="control-label col-sm-6">Mô tả</label>';
        $html .= '  <div class="col-sm-18"><input type="text" name="hometext" class="form-control" value="' . $data_block['hometext'] . '"/></div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * @param string $module
     * @param array $lang_block
     * @return number
     */
    function nvb_config_home_product_new_submit($module, $lang_block)
    {
        global $nv_Request;

        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['number_item'] = $nv_Request->get_int('config_number_item', 'post', 0);
        $return['config']['title_block'] = $nv_Request->get_title('title_block', 'post', '');
        $return['config']['hometext'] = $nv_Request->get_title('hometext', 'post');
        return $return;
    }

    /**
     * @param array $block_config
     * @return string
     */
    function nvb_home_product_new($block_config)
    {
        global $nv_Cache, $global_config, $site_mods, $module_info, $module_name, $module_file, $module_data, $lang_global, $catid, $home, $db,$user_info,$db_config;

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $block_config['module'] . '/global.product_new.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $block_config['module'] . '/global.product_new.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }


        $sql = 'SELECT * FROM ' .$db_config['dbsystem']. '.'. NV_PREFIXLANG . '_' . $block_config['module'] . '_product WHERE status=1 ORDER BY time_add DESC limit ' . $block_config['number_item'];
        $list = $nv_Cache->db($sql, '', $block_config['module']);


        $xtpl = new XTemplate('global.product_new.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $block_config['module']);
        $xtpl->assign('LANG', $lang_global);
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('BLOCK_THEME', $block_theme);
        $xtpl->assign('THEME_SITE_HREF', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA);

        foreach ($list as $key => $value_product) {
   

        $value_product['number_view'] = number_format( $value_product['number_view'] );
        $value_product['number_order']=number_format($value_product['number_order']);
        $value_product['check_wishlist'] = 2;
        if($user_info['userid']){
            $value_product['check_wishlist'] = $db->query("SELECT count(*) FROM " .NV_PREFIXLANG . '_' . $block_config['module']."_wishlist WHERE userid =".$user_info['userid']." AND product_id = " . $value_product['id']) -> fetchColumn();
        }

        $value_product['like_number'] = $db->query("SELECT count(*) FROM " .$db_config['dbsystem']. '.'.NV_PREFIXLANG . '_' . $block_config['module']."_wishlist WHERE product_id = " . $value_product['id']) -> fetchColumn();
        if($value_product['check_wishlist'] == 0){
            $value_product['color_wishlist'] = "white_wishlist";
        }else if($value_product['check_wishlist']==1){
            $value_product['color_wishlist'] = "red_wishlist";
        }else{
            $value_product['color_wishlist'] = "white_wishlist";
        }
		
		   if ( $value_product['showprice'] == 1 ) {
			if($value_product['price_min']==0&&$value_product['price_max']==0){
				if ( $value_product['price'] == $value_product['price_special'] ) {
					$xtpl->assign( 'PRICE', number_format( $value_product['price'] ).'đ' );
					$xtpl->parse( 'main.product.one_price' );
				} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_special'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price'] ).'đ' );
					$xtpl->parse( 'main.product.min_max_price' );
				}
			}else{
				if ( $value_product['price_min'] == $value_product['price_max'] ) {
					$xtpl->assign( 'PRICE', number_format( $value['price_min'] ).'đ' );
					$xtpl->parse( 'main.product.one_price' );
				} else {
					$xtpl->assign( 'PRICE_MIN', number_format( $value_product['price_min'] ).'đ' );
					$xtpl->assign( 'PRICE_MAX', number_format( $value_product['price_max'] ).'đ' );
					$xtpl->parse( 'main.product.min_max_price' );
				}
			}
		} else {
			$xtpl->parse( 'main.product.none_price' );
		}
					
		

		
        $value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $block_config['module'] . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
		$value_product['name_product'] = nv_clean60($value_product['name_product'], 50 , true);

        $value_product['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $block_config['module'] . '/' . $value_product['image'];
        $xtpl->assign( 'LOOP_PRODUCT', $value_product);
        $xtpl->parse( 'main.product' );
		
		
		
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}
}

if (defined('NV_SYSTEM')) {
    $content = nvb_home_product_new($block_config);
}
