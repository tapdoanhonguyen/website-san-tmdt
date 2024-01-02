<?php

/**
 * @Project PHOTOS 4.x
 * @Author KENNY NGUYEN (nguyentiendat713@gmail.com)
 * @Copyright (C) 2015 tradacongnghe.com. All rights reserved
 * @Based on NukeViet CMS
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Fri, 18 Sep 2015 11:52:59 GMT
 */
if (! defined('NV_MAINFILE'))
    die('Stop!!!');
    
    // Khong cho phep cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Cross domain
// header("Access-Control-Allow-Origin: *");


// Tang thoi luong phien lam viec
if ($sys_info['allowed_set_time_limit']) {
    set_time_limit(5 * 3600);
}

// Get request value
$fileName = $nv_Request->get_title('fileName', 'post', '');

$fileExt = nv_getextension($fileName);
$fileName = change_alias(substr($fileName, 0, - (strlen($fileExt) + 1))) . '.' . $fileExt;



// bỏ chức năng tự động resize anh
$array_config['auto_resize'] = true;

$chunk = $nv_Request->get_int('chunk', 'post', 0);
$chunks = $nv_Request->get_int('chunks', 'post', 0);


$fileupload = '';
if (isset($_FILES['upload']['tmp_name']) and is_uploaded_file($_FILES['upload']['tmp_name'])) {
	
	
	$width = 1110;
    $height = 1110;
	
    $file_allowed_ext = $global_config['file_allowed_ext'];
    $upload = new NukeViet\Files\Upload($file_allowed_ext, $global_config['forbid_extensions'], $global_config['forbid_mimes'], $maxfilesize, $width, $height);
    $upload_info = $upload->save_file($_FILES['upload'], NV_ROOTDIR . '/' . NV_TEMP_DIR, false, $array_config['auto_resize']);
		
    @unlink($_FILES['upload']['tmp_name']);
	
    if (empty($upload_info['error'])) {

        // auto_resize
        if ($array_config['auto_resize'] and ($upload_info['img_info'][0] > $width or $upload_info['img_info'][0] > $height)) {
            $createImage = new NukeViet\Files\Image(NV_ROOTDIR . '/' . NV_TEMP_DIR. '/' . $upload_info['basename'], $upload_info['img_info'][0], $upload_info['img_info'][1]);
			
		
            $createImage->resizeXY($width, $height);
            $createImage->save(NV_ROOTDIR . '/' . NV_TEMP_DIR, $upload_info['basename'], 90);
            $createImage->close();
            $info = $createImage->create_Image_info;
            $upload_info['img_info'][0] = $info['width'];
            $upload_info['img_info'][1] = $info['height'];
        }

       
        $random_num = uniqid() . NV_CURRENTTIME;
        $nv_pathinfo_filename = nv_pathinfo_filename($upload_info['name']);
        $new_name = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $nv_pathinfo_filename . '.' . $random_num . '.' . $upload_info['ext'];
        $rename = nv_renamefile($upload_info['name'], $new_name);
        if ($rename[0] == 1) {
            $fileupload = $new_name;
        } else {
            $fileupload = $upload_info['name'];
        }
        $uploadfilename = str_replace(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/', '', $fileupload);
        @chmod($fileupload, 0644);
        
        // Đóng dấu logo
        nv_image_logo($fileupload);
    } else {
		
		nv_jsonOutput([
                'uploaded' => 0,
                'message' => $upload_info['error']
            ]);
    }
    unset($upload, $upload_info);
}


nv_jsonOutput([
                'uploaded' => 1,
                'fileName' => $uploadfilename,
                'url' => '/data/tmp/' . $uploadfilename
            ]);
