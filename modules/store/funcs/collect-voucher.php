<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 05 Oct 2021 01:02:53 GMT
 */

if (!defined('NV_IS_MOD_RETAILSHOPS'))
    die('Stop!!!');

$userid = $user_info['userid'];
$mod = $nv_Request->get_title('mod', 'get, post', '');

if ($mod == 'collect-voucher') {
    $voucher_code = $nv_Request->get_title('voucher_code', 'get, post', '');
    $voucher_id = $nv_Request->get_int('voucher_id', 'get, post', '');
    $voucher_type = $nv_Request->get_int('voucher_type', 'get, post', '');

    if (!$voucher_id) {
        $result = array('status' => 'ERROR', 'mes' => 'Voucher không tồn tại');
        print_r(json_encode($result));
        die();
    }

    try {
        $check_collected = $db->query('SELECT voucherid FROM ' . TABLE . '_voucher_wallet_ecng WHERE voucherid = ' . $voucher_id . ' AND status = 1')->fetchColumn();

        //check voucher đã được thu thập
        if ($check_collected) {
            $result = array('status' => 'ERROR', 'mes' => 'Voucher đã được thu thập');
        } else {
            $voucher = $db->query('SELECT time_to, usage_limit_quantity FROM ' . TABLE . '_voucher_ecng WHERE id = ' . $voucher_id . ' AND status = 1')->fetch();

            //check voucher còn số lượng
            if (!$voucher['usage_limit_quantity']) {
                $result = array('status' => 'ERROR', 'mes' => 'Voucher đã hết');
            } else {
                //check voucher còn hiệu lực
                if (!$voucher['time_to']) {
                    $result = array('status' => 'ERROR', 'mes' => 'Voucher đã hết hiệu lực');
                } else {
                    // check voucher còn thời hạn
                    if ($voucher['time_to'] > NV_CURRENTTIME) {
                        $collection = $db->query('INSERT INTO ' . TABLE . '_voucher_wallet_ecng(voucherid, userid, time_add, status) VALUES (' . $voucher_id . ', ' . $userid . ', ' . NV_CURRENTTIME . ', 1)');
                        if ($collection) {
                            $result = array('status' => 'OK', 'mes' => 'Thu thập thành công');

                            //Trừ số lượng voucher
                            $db->query('UPDATE ' . TABLE . '_voucher_ecng SET usage_limit_quantity = usage_limit_quantity - 1 WHERE id =' . $voucher_id);
                        } else {
                            $result = array('status' => 'ERROR', 'mes' => 'Thu thập thất bại');
                        }
                    } else {
                        $result = array('status' => 'ERROR', 'mes' => 'Voucher đã hết hiệu lực');
                    }
                }
            }
        }
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
        $result = array('status' => 'ERROR', 'mes' => $e->getMessage());
    }

    print_r(json_encode($result));
    die();
}
