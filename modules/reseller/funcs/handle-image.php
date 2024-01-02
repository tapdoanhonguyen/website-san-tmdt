<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 27 Jan 2021 10:01:19 GMT
 */

set_time_limit(0);
ini_set('max_execution_time', 1200);
ini_set('memory_limit', '10G');
// die(md5('ECNG to the Moon'));
// https://banhang7v45v2aa.chonhagiau.com/index.php?nv=retails&op=handle-image&code=93363be1df2ca8107833f6c6183439b1

// if($nv_Request->get_title('code', 'post,get','') != md5('ECNG to the Moon')){
// die('ECNG to the Moon!!!!!');
// }

$list_product = $db->query('SELECT * FROM ' . TABLE . '_product_temp LIMIT 20 OFFSET 0')->fetchAll();

//giới hạn số hình đăng mỗi lượt
$limit = 10;
$count = 0;
foreach ($list_product as $product) {
	$path_upload = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/shops/' . $product['username'];
	$path_thumb = NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/shops/' . $product['username'];

	//hình ảnh chính
	//check hình đã được tải về
	$image = end(explode('/', $product['image']));
	if (file_exists($path_upload . '/' .  $image)) {
		$product['image'] = 'shops/' . $product['username'] . '/' . $image;
	} else {
		// tải hình ảnh từ bên thứ 3
		if ($image = conver_data_img_to_png_excel($product['image'], $path_upload, $path_thumb, true, true)) {
			$product['image'] = 'shops/' . $product['username'] . '/' . $image;
			$count++;
			if ($count == $limit) {
				break;
			}
		} else {
			//update sang trạng thái sp lỗi
			$db->query('UPDATE '. TABLE .'_product SET status = 3 WHERE id = '. $product['id']);
			//xóa khỏi hàng chờ
			$db->query('DELETE FROM ' . TABLE . '_product_temp WHERE id = ' . $product['id']);
			//bỏ qua sản phẩm
			continue;
		}
	}

	$a = 'shops/' . $product['username'];
	$list_other_image = array();
	// Hình ảnh khác
	if ($product['other_image']) {
		$list_other_image = explode(',', $product['other_image']);
		foreach ($list_other_image as $key => $otherimage) {
			//check hình đã được tải về
			$image = end(explode('/', $otherimage));
			if (file_exists($path_upload . '/' .  $image)) {
				$list_other_image[$key] = 'shops/' . $product['username'] . '/' . $image;
			} else {
				// tải hình ảnh từ bên thứ 3
				if ($image = conver_data_img_to_png_excel($otherimage, $path_upload, $path_thumb, true, true)) {
					$list_other_image[$key] = 'shops/' . $product['username'] . '/' . $image;
					$count++;
					if ($count == $limit) {
						break;
					}
				} else {
					unset($list_other_image[$key]);
				}
			}
		}
		$product['other_image'] = implode(',', $list_other_image);
		if ($count == $limit) {
			update_product_temp($product);
			$count = 0;
			break;
		}
	}

	// Hình ảnh thuộc tính
	if ($product['classify']) {
		$list_classify = explode(',', $product['classify']);
		foreach ($list_classify as $key => $item) {
			$classify = explode('_', $item);
			if ($classify[1]) {
				//check hình đã được tải về
				$image = end(explode('/', $classify[1]));
				if (file_exists($path_upload . '/' .  $image)) {
					update_classify($classify[0], 'shops/' . $product['username'] . '/' . $image);
					unset($list_classify[$key]);
				} else {
					// tải hình ảnh từ bên thứ 3
					if ($image = conver_data_img_to_png_excel($classify[1], $path_upload, $path_thumb, true, true)) {
						$img_name = 'shops/' . $product['username'] . '/' . $image;
						update_classify($classify[0], $img_name);
						unset($list_classify[$key]);
						$count++;
						if ($count == $limit) {
							break;
						}
					} else {
						unset($list_classify[$key]);
					}
				}
			} else {
				unset($list_classify[$key]);
			}
		}
		$product['classify'] = implode(',', $list_classify);
		if ($count == $limit) {
			update_product_temp($product);
			$count = 0;
			break;
		}
	}


	// Hình ảnh trong mô tả
	if ($product['bodytext']) {
		// kiểm tra hình ảnh trong bodytext
		preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['bodytext'], $match_img);
		$bodytext_array = array_pop($match_img); // chuyên list hình sang dạng chuỗi

		// xử lý hình ảnh vào thư mục upload user description, bodytext
		foreach ($bodytext_array as $srcimg) {
			$image = end(explode('/', $srcimg));
			if (file_exists($path_upload . '/' . $image)) {
				continue;
			} else {
				$img_temp = conver_data_img_to_png_excel($srcimg, $path_upload, $path_thumb, false, false);
				if ($img_temp) {
					$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $img_temp;
					$product['bodytext'] = str_replace($srcimg, $thaythe, $product['bodytext']);
					$count++;
					if ($count == $limit) {
						break;
					}
				}
			}
		}
		if ($count == $limit) {
			update_product_temp($product);
			$count = 0;
			break;
		}
	}

	// Hình ảnh trong chi tiết
	if ($product['description']) {
		preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $product['description'], $match_img);  //tìm src="X" or src='X'
		$description_array = array_pop($match_img);
		foreach ($description_array as $srcimg) {
			$image = end(explode('/', $srcimg));
			if (file_exists($path_upload . '/' . $image)) {
				continue;
			} else {
				if ($img_temp = conver_data_img_to_png_excel($srcimg, $path_upload, $path_thumb, false, false)) {
					$thaythe = 'https://' . $_SERVER["SERVER_NAME"] . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $a . '/' . $img_temp;
					$product['bodytext'] = str_replace($srcimg, $thaythe, $product['bodytext']);
					$count++;
					if ($count == $limit) {
						break;
					}
				}
			}
		}
		if ($count == $limit) {
			update_product_temp($product);
			$count = 0;
			break;
		}
	}

	// // // xóa ảnh cũ
	// $old_product = $db->query('SELECT id, other_image, bodytext, description FROM ' . TABLE . '_product WHERE id = ' . $product['id'])->fetch();
	// $other_image_old = explode(',', $old_product['other_image']);
	// // // print_r($other_image_old);
	// foreach ($other_image_old as $img) {
	// 	// $img = str_replace(NV_BASE_SITE . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/', '', $img);
	// 	// die($img);
	// 	if (!in_array($img, $list_other_image)) {
	// 		nv_deletefile(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $img);
	// 		nv_deletefile(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $img);
	// 	}
	// }

	print($product['id']);
	// update data
	$db->query('UPDATE ' . TABLE . '_product SET inhome = '. $product['inhome'] .', image = "' . $product['image'] . '", other_image = "' . $product['other_image'] . '", bodytext = \'' . $product['bodytext'] . '\', description = \'' . $product['description'] . '\', status = 1 WHERE id = ' . $product['id'] . ' AND status = 2');
	$db->query('DELETE FROM ' . TABLE . '_product_temp WHERE id = ' . $product['id']);
}

function update_classify($id, $img)
{
	global $db;
	$db->query('UPDATE ' . TABLE . '_product_classify_value SET image = "' . $img . '" WHERE id = ' . $id);
}

function update_product_temp($product)
{
	global $db;
	$db->query('UPDATE ' . TABLE . '_product_temp SET inhome = '. $product['inhome'] .', image = "'. $product['image'] .'" other_image = "' . $product['other_image'] . '", classify = "' . $product['classify'] . '", bodytext = \'' . $product['bodytext'] . '\', description = \'' . $product['description'] . '\' WHERE id = ' . $product['id']);
}
