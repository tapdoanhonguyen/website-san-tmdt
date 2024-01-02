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
		for ($i = 0; $i <100 ; ++$i) {
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

 
		
		$sql = 'SELECT id,image,alias,name_product,star,price,price_special,number_order,free_ship FROM ' .$db_config['dbsystem']. '.'. NV_PREFIXLANG . '_' . $block_config['module'] . '_product WHERE inhome = 1 ORDER BY rand() limit ' . $block_config['number_item'];
		
		$list = $db->query($sql)->fetchAll();
		
		
		$item_all = $db->query('SELECT count(*) as count FROM ' .$db_config['dbsystem']. '.'. NV_PREFIXLANG . '_' . $block_config['module'] . '_product WHERE status=1')->fetchColumn();


		$xtpl = new XTemplate('global.product_new.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $block_config['module']);
		$xtpl->assign('LANG', $lang_global);
		
		$xtpl->assign('number_item', $block_config['number_item']);
		
		$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
		$xtpl->assign('BLOCK_THEME', $block_theme);
		$xtpl->assign('MODULE_NAME', $block_config['module']);
		$xtpl->assign('THEME_SITE_HREF', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA);
		
		if($item_all > $block_config['number_item'])
		{
			$xtpl->assign('per_page', $block_config['number_item']);
			$xtpl->assign('page', 1);
			$xtpl->parse( 'main.readmore' );
		}

		foreach ($list as $key => $value_product) {

			$value_product['number_order']=number_format($value_product['number_order']);
			
			$value_product['alias'] =nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $block_config['module'] . '&amp;' . NV_OP_VARIABLE . '=' . $value_product['alias'].'-'.$value_product['id'], true );
			
			if (!empty($value_product['image'] ) and is_file(NV_UPLOADS_REAL_DIR . '/' . $block_config['module'] . '/' . $value_product['image'] )) {
				$value_product['image']  = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $block_config['module']. '/' . $value_product['image'] ;
			}else{
				$server = 'banhang.'.$_SERVER["SERVER_NAME"];
				$value_product['image']  ='https://'. $server .NV_BASE_SITEURL . NV_FILES_DIR . '/' . $block_config['module']. '/' . $value_product['image'] ;
			}
			$value_product['price'] = $value_product['price'] ? $value_product['price'] : $value_product['price_special'];
			$value_product['price_format'] = number_format( $value_product['price'] ).'đ';
			$xtpl->assign( 'LOOP_PRODUCT', $value_product);
			
			if($value_product['price_special'] and $value_product['price'] < $value_product['price_special'])
			{		
				$price_special = number_format( $value_product['price_special'] ).'đ';
				$xtpl->assign( 'price_special', $price_special);
				$xtpl->parse( 'main.product.price_special' );
			}
			
			if($value_product['free_ship'])
			{	
				$xtpl->parse( 'main.product.free_ship' );
			}
			
			$xtpl->parse( 'main.product' );
		}

		$xtpl->parse('main');
		return $xtpl->text('main');
	}
}

if (defined('NV_SYSTEM')) {
	$content = nvb_home_product_new($block_config);
}