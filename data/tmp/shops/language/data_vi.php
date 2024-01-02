<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 29 Dec 2023 08:30:57 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('1', 'ACB', 'Ngân hàng TMCP Á Châu', '188', '1617949641', '', '', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('2', 'VietcomBank', 'Ngân hàng TMCP Ngoại Thương Việt Nam', '188', '1617951279', '', '', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('3', 'VietinBank', 'Ngân hàng TMCP Công Thương Việt Nam', '188', '1617951301', '', '', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('4', 'Techcombank', 'Ngân hàng TMCP Kỹ Thương Việt Nam', '188', '1617951395', '', '', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('5', 'BIDV', 'Ngân hàng TMCP Đầu Tư Và Phát Triển Việt Nam', '188', '1617951448', '', '', '1', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('6', 'MaritimeBank', 'Ngân hàng TMCP Hàng Hải Việt Nam', '188', '1617951469', '', '', '1', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('7', 'VPBank', 'Ngân hàng Việt Nam Thịnh Vượng', '188', '1617951496', '', '', '1', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('8', 'Agribank', 'Ngân hàng Nông nghiệp và Phát triển Việt Nam', '188', '1617951513', '', '', '1', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('9', 'Eximbank', 'Ngân hàng TMCP Xuất nhập khẩu Việt Nam', '188', '1617951526', '', '', '1', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('10', 'Sacombank', 'Ngân hàng TMCP Sài Gòn Thương Tín', '188', '1617951541', '', '', '1', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('11', 'DongA Bank', 'Ngân hàng TMCP Đông Á', '188', '1617951578', '', '', '1', '11')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('12', 'NASB', 'Ngân hàng TMCP Bắc Á', '188', '1617951591', '', '', '1', '12')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('13', 'ANZ Bank', 'Ngân hàng TNHH một thành viên ANZ Việt Nam', '188', '1617951609', '', '', '1', '13')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('14', 'Phuong Nam Bank', 'Ngân hàng TMCP Phương Nam', '188', '1617951623', '', '', '1', '14')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('15', 'VIB', 'Ngân hàng TMCP Quốc tế Việt Nam', '188', '1617951652', '', '', '1', '15')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('16', 'VietABank', 'Ngân hàng TMCP Việt Á', '188', '1617951670', '', '', '1', '16')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('17', 'TP Bank', 'Ngân hàng TMCP Tiên Phong', '188', '1617952179', '', '', '1', '17')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('18', 'MB Bank', 'Ngân hàng thương mại cổ phần Quân đội', '188', '1617952193', '', '', '1', '18')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('19', 'OceanBank', 'Ngân hàng TM TNHH 1 thành viên Đại Dương', '188', '1617952211', '', '', '1', '19')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('20', 'PG Bank', 'Ngân hàng TMCP Xăng dầu Petrolimex', '188', '1617952226', '', '', '1', '20')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('21', 'LienVietPostBank', 'Ngân hàng TMCP Bưu Điện Liên Việt', '188', '1617952285', '', '', '1', '21')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('22', 'HSBC Bank (Vietnam) Ltd', 'Ngân hàng TNHH một thành viên HSBC (Việt Nam)', '188', '1617952319', '', '', '1', '22')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('23', 'MHB Bank', 'Ngân hàng Phát triển nhà đồng bằng sông Cửu Long', '188', '1617952344', '', '', '1', '23')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('24', 'SeABank', 'Ngân hàng TMCP Đông Nam Á', '188', '1617952361', '', '', '1', '24')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('25', 'ABBank', 'Ngân hàng TMCP An Bình', '188', '1617952376', '', '', '1', '25')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('26', 'CITIBANK N.A.', 'Ngân hàng Citibank Việt Nam', '188', '1617952390', '', '', '1', '26')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('27', 'HDBank', 'Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh', '188', '1617952405', '', '', '1', '27')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('28', 'GBBank', 'Ngân hàng Dầu khí toàn cầu', '188', '1617952420', '', '', '1', '28')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('29', 'OCB', 'Ngân hàng TMCP Phương Đông', '188', '1617952433', '', '', '1', '29')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('30', 'SHB', 'Ngân Hàng Thương Mại cổ phần Sài Gòn – Hà Nội', '188', '1617952448', '', '', '1', '30')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('31', 'Nam A Bank', 'Ngân hàng Thương Mại cổ phần Nam Á', '188', '1617952512', '', '', '1', '31')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('32', 'Saigon Bank', 'Ngân Hàng TMCP Sài Gòn Công Thương', '188', '1617952533', '', '', '1', '32')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('33', 'SCB', 'Ngân hàng TMCP Sài Gòn', '188', '1617952544', '', '', '1', '33')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('34', 'VNCB', 'Ngân hàng thương mại TNHH MTV Xây dựng Việt Nam', '188', '1617952559', '', '', '1', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('35', 'Kienlongbank', 'Ngân hàng Thương mại Cổ phần Kiên Long', '188', '1617952574', '', '', '1', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('36', 'SHINHAN Bank', 'Ngân hàng Shinhan', '188', '1617952587', '', '', '1', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('37', 'BaoViet Bank', 'Ngân hàng Bảo Việt', '188', '1617952617', '', '', '1', '37')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('38', 'Vietbank', 'Ngân hàng Việt Nam Thương Tín', '188', '1617952638', '', '', '1', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('39', 'PVcomBank', 'Ngân hàng TMCP Đại Chúng Việt Nam', '188', '1617952663', '', '', '1', '39')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('2', '18', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('2', '17', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('2', '16', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('2', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('1', '18', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('1', '17', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('1', '16', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES('1', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block_cat (bid, adddefault, image, weight, add_time, edit_time, vi_title, vi_alias, vi_description, vi_bodytext, vi_keywords, vi_tag_title, vi_tag_description) VALUES('1', '0', '', '1', '1433298294', '1433298294', 'Sản phẩm bán chạy', 'San-pham-ban-chay', '', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block_cat (bid, adddefault, image, weight, add_time, edit_time, vi_title, vi_alias, vi_description, vi_bodytext, vi_keywords, vi_tag_title, vi_tag_description) VALUES('2', '0', '', '2', '1433298325', '1433298325', 'Sản phẩm hot', 'San-pham-hot', '', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_carrier (id, name, phone, address, logo, description, weight, status) VALUES('1', 'Họ Nguyễn', '0988455066', '2/14 Tăng Bạt Hổ, Phường 11', '', '', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_items (id, cid, title, description, weight, add_time) VALUES('1', '1', 'Free', '', '1', '1703227159')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_location (cid, iid, lid) VALUES('1', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_weight (iid, weight, weight_unit, carrier_price, carrier_price_unit) VALUES('1', '2000', 'g', '10000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('2', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '3', '3', '0', 'viewlist', '4', '6,7,8,9', '0', '4', '7', '1', '', '', '0', '', '1432362728', '1702975106', '6', '0', '0', '0', 'Váy', 'Váy', 'Vay-nu', '', '', 'váy, vay', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('3', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '4', '8', '0', 'viewlist', '4', '13,14,15,16', '0', '4', '7', '1', '', '', '0', '', '1432362789', '1702975138', '6', '0', '0', '0', 'Giày dép', 'Giày dép', 'Giay-dep', '', '', 'giay, dep, giày, dép', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('4', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '5', '13', '0', 'viewlist', '3', '10,11,12', '0', '4', '7', '1', '', '', '0', '', '1432362835', '1702975147', '6', '0', '0', '0', 'Áo', 'Áo', 'Ao', '', '', 'áo, ao', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('5', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '6', '17', '0', 'viewlist', '5', '18,19,20,21,22', '0', '4', '7', '1', '', '', '0', '', '1432362887', '1702975157', '6', '0', '0', '0', 'Phụ kiện', 'Phụ kiện', 'Phu-kien', '', '', 'Phụ kiện, Phu kien, kiện, kien, phu kien', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('6', '2', '', '1', '4', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364675', '1432364675', '6', '0', '0', '0', 'váy dài', 'váy dài', 'vay-dai', '', '', 'váy dài, dài, vay dai', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('7', '2', '', '2', '5', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364695', '1432364695', '6', '0', '0', '0', 'váy ngắn', 'váy ngắn', 'vay-ngan', '', '', 'váy ngắn, vay ngan', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('8', '2', '', '3', '6', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364752', '1432364752', '6', '0', '0', '0', 'đầm maxi', 'đầm maxi', 'dam-maxi', '', '', 'đầm, maxi, Maxi, đầm maxi, Đầm maxi', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('9', '2', '', '4', '7', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364786', '1432364786', '6', '0', '0', '0', 'Váy chữ A', 'Váy chữ A', 'Vay-chu-A', '', '', 'Váy chữ A, váy chữ a', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('10', '4', '', '1', '14', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364825', '1432364863', '6', '0', '0', '0', 'Áo sơmi', 'Áo sơmi', 'Ao-somi', '', '', 'Áo sơmi,, sơmi. áo', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('11', '4', '', '2', '15', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364880', '1432364880', '6', '0', '0', '0', 'Áo phông', 'Áo phông', 'Ao-phong', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('12', '4', '', '3', '16', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364936', '1432364936', '6', '0', '0', '0', 'Áo dáng dài', 'Áo dáng dài', 'Ao-dang-dai', '', '', 'Áo dáng dài, áo', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('13', '3', '', '1', '9', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432364976', '1432364976', '6', '0', '0', '0', 'Giày cao gót', 'Giày cao gót', 'Giay-cao-got', '', '', 'Giày cao gót, cao gót, cao got', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('14', '3', '', '2', '10', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365033', '1432365033', '6', '0', '0', '0', 'Giày sandal', 'Giày sandal', 'Giay-sandal', '', '', 'sandal, Sandal, giày, giày sandal', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('15', '3', '', '3', '11', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365081', '1432365081', '6', '0', '0', '0', 'Giày búp bê', 'Giày búp bê', 'Giay-bup-be', '', '', 'giày búp bê, Giày búp bê, giay bup be, Giay bup be, búp bê, bup be', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('16', '3', '', '4', '12', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365108', '1432365108', '6', '0', '0', '0', 'Giày vải', 'Giày vải', 'Giay-vai', '', '', 'vải, giày vải, giay vai', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('19', '5', '', '2', '19', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365211', '1432365211', '6', '0', '0', '0', 'Lắc tay', 'Lắc tay', 'Lac-tay', '', '', 'Lắc tay. lac tay, lắc', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('18', '5', '', '1', '18', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365185', '1432365185', '6', '0', '0', '0', 'Vòng cổ', 'Vòng cổ', 'Phu-kien-Vong-co', '', '', 'vòng cổ, Vòng cổ, vong co', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('20', '5', '', '3', '20', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365242', '1432365242', '6', '0', '0', '0', 'Thắt lưng', 'Thắt lưng', 'That-lung', '', '', 'Thắt lưng, that lung, thắt lưng', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('21', '5', '', '4', '21', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365281', '1432365281', '6', '0', '0', '0', 'Đồng hồ', 'Đồng hồ', 'Dong-ho', '', '', 'Đồng hồ, hồ, dong ho', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('22', '5', '', '5', '22', '1', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1432365303', '1432365303', '6', '0', '0', '0', 'Ví nữ', 'Ví nữ', 'Vi-nu', '', '', 'ví nữ, ví', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('23', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '7', '23', '0', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1702989721', '1702989721', '6', '0', '0', '0', 'Chăm sóc sức khoẻ', '', 'cham-soc-suc-khoe', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('24', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '8', '24', '0', 'viewlist', '0', '', '1', '4', '7', '1', '', '', '0', '', '1702989769', '1702989769', '6', '0', '0', '0', 'Chăm sóc sắc đẹp', '', 'cham-soc-sac-dep', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('25', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '2', '2', '0', 'viewlist', '0', '', '1', '4', '7', '1', 'thuong_hieu', '', '0', '', '1702989791', '1703602967', '6', '0', '0', '0', 'Công nghệ', '', 'cong-nghe', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_catalogs (catid, parentid, image, weight, sort, lev, viewcat, numsubcat, subcatid, inhome, numlinks, newday, typeprice, form, group_price, viewdescriptionhtml, admins, add_time, edit_time, groups_view, cat_allow_point, cat_number_point, cat_number_product, vi_title, vi_title_custom, vi_alias, vi_description, vi_descriptionhtml, vi_keywords, vi_tag_description) VALUES('26', '0', '2023_12/pngtree-pink-dress-icon-circle-png-image_2059754.jpg', '1', '1', '0', 'viewlist', '0', '', '1', '4', '7', '1', 'thuong_hieu', '', '0', '', '1702989904', '1703602945', '6', '0', '0', '0', 'Thực phẩm cao cấp', '', 'thuc-pham-cao-cap', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_field (fid, field, listtemplate, tab, weight, field_type, field_choices, sql_choices, match_type, match_regex, func_callback, min_length, max_length, class, language, default_value) VALUES('1', 'brand', '1', 'a:1:{i:1;a:1:{i:0;s:9:\"introduce\";}}', '1', 'select', 'a:3:{i:-1;s:10:\"Tất cả\";i:1;s:13:\"Họ Nguyễn\";i:2;s:4:\"Dell\";}', '', 'none', '', '', '0', '255', '', 'a:1:{s:2:\"vi\";a:2:{i:0;s:15:\"Thương Hiệu\";i:1;s:0:\"\";}}', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_field (fid, field, listtemplate, tab, weight, field_type, field_choices, sql_choices, match_type, match_regex, func_callback, min_length, max_length, class, language, default_value) VALUES('2', 'origin', '1', 'a:1:{i:1;a:1:{i:0;s:9:\"introduce\";}}', '2', 'select', 'a:2:{i:-1;s:17:\"Chọn tất cả\";i:1;s:10:\"Việt Nam\";}', '', 'none', '', '', '0', '255', '', 'a:1:{s:2:\"vi\";a:2:{i:0;s:11:\"Xuất xứ\";i:1;s:0:\"\";}}', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('1', '0', '', '1', '1', '0', 'viewlist', '6', '6,7,8,9,10,11', '1', '0', '1432623061', '1432623061', '0', '1', '0', 'Thương hiệu', 'Thuong-hieu', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('2', '0', '', '2', '8', '0', 'viewlist', '12', '12,13,15,16,17,18,19,20,21,22,23,24', '1', '0', '1432623083', '1432623083', '0', '1', '0', 'Màu sắc', 'Mau-sac', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('3', '0', '', '3', '21', '0', 'viewlist', '15', '25,26,27,28,29,30,31,32,33,34,35,36,37,38,39', '1', '0', '1432623101', '1432623101', '0', '1', '0', 'Kích thước', 'Kich-thuoc', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('4', '0', '', '4', '37', '0', 'viewlist', '8', '40,41,42,43,44,45,46,47', '1', '0', '1432623118', '1432623118', '0', '1', '0', 'Chất liệu', 'Chat-lieu', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('5', '0', '', '5', '46', '0', 'viewlist', '10', '48,49,50,51,52,53,54,55,56,57', '1', '0', '1432623133', '1432623133', '0', '1', '0', 'Xuất xứ', 'Xuat-xu', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('6', '1', '', '1', '2', '1', 'viewlist', '0', '', '1', '0', '1432626862', '1432626862', '0', '1', '0', 'Việt Tiến', 'Viet-Tien', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('7', '1', '', '2', '3', '1', 'viewlist', '0', '', '1', '0', '1432626882', '1432626882', '3', '1', '0', 'ZARA', 'ZARA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('8', '1', '', '3', '4', '1', 'viewlist', '0', '', '1', '0', '1432626899', '1432626899', '0', '1', '0', 'MATTANA', 'MATTANA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('9', '1', '', '4', '5', '1', 'viewlist', '0', '', '1', '0', '1432627013', '1432627013', '0', '1', '0', 'KELVIN', 'KELVIN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('10', '1', '', '5', '6', '1', 'viewlist', '0', '', '1', '0', '1432627027', '1432627027', '0', '1', '0', 'THÁI TUẤN', 'THAI-TUAN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('11', '1', '', '6', '7', '1', 'viewlist', '0', '', '1', '0', '1432627053', '1432627053', '0', '1', '0', 'VICTORIA SECRECT', 'VICTORIA-SECRECT', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('12', '2', '', '1', '9', '1', 'viewlist', '0', '', '1', '0', '1432627064', '1432627064', '0', '1', '0', 'ĐỎ', 'DO', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('13', '2', '', '2', '10', '1', 'viewlist', '0', '', '1', '0', '1432627070', '1432627070', '0', '1', '0', 'VÀNG', 'VANG', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('16', '2', '', '4', '12', '1', 'viewlist', '0', '', '1', '0', '1432627102', '1432627102', '1', '1', '0', 'HỒNG PHẤN', 'HONG-PHAN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('15', '2', '', '3', '11', '1', 'viewlist', '0', '', '1', '0', '1432627095', '1432627095', '0', '1', '0', 'XANH NGỌC', 'XANH-NGOC', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('17', '2', '', '5', '13', '1', 'viewlist', '0', '', '1', '0', '1432627107', '1432627107', '0', '1', '0', 'XANH RÊU', 'XANH-REU', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('18', '2', '', '6', '14', '1', 'viewlist', '0', '', '1', '0', '1432627112', '1432627112', '0', '1', '0', 'TÍM', 'TIM', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('19', '2', '', '7', '15', '1', 'viewlist', '0', '', '1', '0', '1432627123', '1432627123', '0', '1', '0', 'XÁM', 'XAM', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('20', '2', '', '8', '16', '1', 'viewlist', '0', '', '1', '0', '1432627135', '1432627135', '0', '1', '0', 'XANH NƯỚC BIỂN', 'XANH-NUOC-BIEN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('21', '2', '', '9', '17', '1', 'viewlist', '0', '', '1', '0', '1432627148', '1432627148', '0', '1', '0', 'CAM', 'CAM', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('22', '2', '', '10', '18', '1', 'viewlist', '0', '', '1', '0', '1432627153', '1432627153', '0', '1', '0', 'BẠC', 'BAC', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('23', '2', '', '11', '19', '1', 'viewlist', '0', '', '1', '0', '1432627160', '1432627160', '0', '1', '0', 'MÀU DA', 'MAU-DA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('24', '2', '', '12', '20', '1', 'viewlist', '0', '', '1', '0', '1432627182', '1432627182', '2', '1', '0', 'ĐEN', 'DEN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('25', '3', '', '1', '22', '1', 'viewlist', '0', '', '1', '0', '1432627201', '1432627201', '0', '1', '0', 'F', 'F', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('26', '3', '', '2', '23', '1', 'viewlist', '0', '', '1', '0', '1432627210', '1432627210', '0', '1', '0', 'L', 'L', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('27', '3', '', '3', '24', '1', 'viewlist', '0', '', '1', '0', '1432627215', '1432627215', '0', '1', '0', 'M', 'M', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('28', '3', '', '4', '25', '1', 'viewlist', '0', '', '1', '0', '1432627219', '1432627219', '0', '1', '0', 'S', 'S', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('29', '3', '', '5', '26', '1', 'viewlist', '0', '', '1', '0', '1432627223', '1432627223', '0', '1', '0', 'XL', 'XL', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('30', '3', '', '6', '27', '1', 'viewlist', '0', '', '1', '0', '1432627241', '1432627241', '0', '1', '0', 'XXL', 'XXL', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('31', '3', '', '7', '28', '1', 'viewlist', '0', '', '1', '0', '1432627250', '1432627250', '0', '1', '0', 'XXXL', 'XXXL', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('32', '3', '', '8', '29', '1', 'viewlist', '0', '', '1', '0', '1432627259', '1432627259', '2', '1', '0', '35', '35', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('33', '3', '', '9', '30', '1', 'viewlist', '0', '', '1', '0', '1432627264', '1432627264', '2', '1', '0', '36', '36', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('34', '3', '', '10', '31', '1', 'viewlist', '0', '', '1', '0', '1432627269', '1432627269', '2', '1', '0', '37', '37', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('35', '3', '', '11', '32', '1', 'viewlist', '0', '', '1', '0', '1432627274', '1432627274', '3', '1', '0', '38', '38', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('36', '3', '', '12', '33', '1', 'viewlist', '0', '', '1', '0', '1432627279', '1432627279', '0', '1', '0', '39', '39', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('37', '3', '', '13', '34', '1', 'viewlist', '0', '', '1', '0', '1432627284', '1432627284', '0', '1', '0', '40', '40', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('38', '3', '', '14', '35', '1', 'viewlist', '0', '', '1', '0', '1432627291', '1432627291', '0', '1', '0', '41', '41', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('39', '3', '', '15', '36', '1', 'viewlist', '0', '', '1', '0', '1432627296', '1432627296', '0', '1', '0', '42', '42', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('40', '4', '', '1', '38', '1', 'viewlist', '0', '', '1', '0', '1432627339', '1432627339', '0', '1', '0', 'COTTON', 'COTTON', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('41', '4', '', '2', '39', '1', 'viewlist', '0', '', '1', '0', '1432627346', '1432627346', '0', '1', '0', 'DẠ', 'DA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('42', '4', '', '3', '40', '1', 'viewlist', '0', '', '1', '0', '1432627364', '1432627364', '0', '1', '0', 'JEANS', 'JEANS', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('43', '4', '', '4', '41', '1', 'viewlist', '0', '', '1', '0', '1432627369', '1432627369', '0', '1', '0', 'BÒ', 'BO', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('44', '4', '', '5', '42', '1', 'viewlist', '0', '', '1', '0', '1432627378', '1432627378', '0', '1', '0', 'LANH', 'LANH', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('45', '4', '', '6', '43', '1', 'viewlist', '0', '', '1', '0', '1432627385', '1432627385', '0', '1', '0', 'TƠ TẰM', 'TO-TAM', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('46', '4', '', '7', '44', '1', 'viewlist', '0', '', '1', '0', '1432627399', '1432627399', '0', '1', '0', 'THUN', 'THUN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('47', '4', '', '8', '45', '1', 'viewlist', '0', '', '1', '0', '1432627407', '1432627407', '0', '1', '0', 'LỤA', 'LUA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('48', '5', '', '1', '47', '1', 'viewlist', '0', '', '1', '0', '1432627418', '1432627418', '0', '1', '0', 'VIỆT NAM', 'VIET-NAM', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('49', '5', '', '2', '48', '1', 'viewlist', '0', '', '1', '0', '1432627425', '1432627425', '0', '1', '0', 'HÀN QUỐC', 'HAN-QUOC', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('50', '5', '', '3', '49', '1', 'viewlist', '0', '', '1', '0', '1432627519', '1432627519', '0', '1', '0', 'ĐỨC', 'DUC', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('51', '5', '', '4', '50', '1', 'viewlist', '0', '', '1', '0', '1432627528', '1432627528', '1', '1', '0', 'NHẬT BẢN', 'NHAT-BAN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('52', '5', '', '5', '51', '1', 'viewlist', '0', '', '1', '0', '1432627541', '1432627541', '0', '1', '0', 'THÁI LAN', 'THAI-LAN', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('53', '5', '', '6', '52', '1', 'viewlist', '0', '', '1', '0', '1432627553', '1432627553', '1', '1', '0', 'HONGKONG', 'HONGKONG', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('54', '5', '', '7', '53', '1', 'viewlist', '0', '', '1', '0', '1432627565', '1432627565', '0', '1', '0', 'TRUNG QUỐC', 'TRUNG-QUOC', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('55', '5', '', '8', '54', '1', 'viewlist', '0', '', '1', '0', '1432627573', '1432627573', '0', '1', '0', 'PHÁP', 'PHAP', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('56', '5', '', '9', '55', '1', 'viewlist', '0', '', '1', '0', '1432627579', '1432627579', '0', '1', '0', 'ANH', 'ANH', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group (groupid, parentid, image, weight, sort, lev, viewgroup, numsubgroup, subgroupid, inhome, indetail, add_time, edit_time, numpro, in_order, is_require, vi_title, vi_alias, vi_description, vi_keywords) VALUES('57', '5', '', '10', '56', '1', 'viewlist', '0', '', '1', '0', '1432627617', '1432627617', '0', '1', '0', 'AUSTRALIA', 'AUSTRALIA', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('1', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('2', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('2', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('2', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('2', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('3', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('3', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('3', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('3', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('4', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('4', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('4', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('5', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('5', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_cateid (groupid, cateid) VALUES('5', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '24')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '32')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '33')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('9', '53')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '16')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '32')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '33')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('10', '51')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('11', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('11', '24')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_items (pro_id, group_id) VALUES('11', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_quantity (pro_id, listgroup, quantity) VALUES('11', '7,24,35', '20')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_quantity (pro_id, listgroup, quantity) VALUES('10', '7,16,33,51', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_group_quantity (pro_id, listgroup, quantity) VALUES('9', '7,24,35,53', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_location (id, parentid, title, weight, sort, lev, numsub, subid) VALUES('1', '0', 'Việt nam', '1', '1', '0', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_location (id, parentid, title, weight, sort, lev, numsub, subid) VALUES('2', '1', 'Thành Phố Hồ Chí Minh', '1', '2', '1', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_location (id, parentid, title, weight, sort, lev, numsub, subid) VALUES('3', '2', 'Quận Bình Thạnh', '1', '3', '2', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_location (id, parentid, title, weight, sort, lev, numsub, subid) VALUES('4', '3', 'Phường 11', '1', '4', '3', '0', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_money_vi (id, code, currency, symbol, exchange, round, number_format, status) VALUES('840', 'USD', 'US Dollar', '$', '21000', '0.01', ',||.', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_money_vi (id, code, currency, symbol, exchange, round, number_format, status) VALUES('704', 'VND', 'Vietnam Dong', 'đ', '1', '100', ',||.', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('1', '6', '2', '1432363521', '1432365563', '0', '1432363521', '0', '2', 'V01', '19', '100000', '0', '', '0', 'VND', '1', '20', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'Váy Maxi sang trọng', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '17', '0', '0', '1', '1', 'Đầm Maxi sang trọng', 'Dam-Maxi-sang-trong', 'Đầm maxi thời trang', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('2', '6', '2', '1432365534', '1432365970', '0', '1432365534', '0', '2', 'V02', '50', '100000', '0', '', '0', 'VND', '1', '250', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', '', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '4', '0', '0', '0', '1', 'Đầm maxi họa tiết', 'Dam-maxi-hoa-tiet', 'đầm maxi sang trọng', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('3', '7', '2', '1432366714', '1432366740', '0', '1432366714', '0', '2', 'V03', '14', '50000', '0', '', '0', 'VND', '1', '250', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'Chân Váy Công Sở', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '8', '0', '0', '1', '1', 'Chân Váy Công Sở', 'Chan-Vay-Cong-So', 'chân váy công sở', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('4', '7', '2', '1432367089', '1432367089', '0', '1432367089', '0', '2', 'S000004', '17', '50000', '0', '', '0', 'VND', '1', '300', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'chân váy caro', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '7', '0', '0', '3', '1', 'Chân váy caro', 'Chan-vay-caro', 'chân váy caro', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('5', '10', '2', '1432367366', '1432367366', '0', '1432367366', '0', '2', 'S000005', '30', '0', '0', '', '0', 'VND', '1', '220', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'áo somi lụa đẹp', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '4', '0', '0', '0', '1', 'Áo sơmi lụa', 'Ao-somi-lua', 'áo somi lụa đẹp', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('6', '10', '2', '1432367846', '1432370007', '0', '1432367846', '0', '2', 'S000006', '15', '0', '0', '', '0', 'VND', '1', '300', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', '', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '15', '0', '0', '0', '1', 'Áo sơ mi voan phối tay ren', 'Ao-so-mi-voan-phoi-tay-ren', '<h1><span style=\"font-size:14px;\">Áo sơ mi voan</span></h1>', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('8', '11', '2', '1432605984', '1432605984', '0', '1432605984', '0', '2', 'S000008', '15', '120000', '0', '', '0', 'VND', '1', '200', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'áo thun nữ', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '5', '0', '0', '0', '1', 'áo thun nữ họa tiết độc đáo', 'ao-thun-nu-hoa-tiet-doc-dao', 'áo thun nữ họa tiết độc đáo', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('9', '13', '2', '1432606317', '1432629809', '0', '1432606317', '0', '2', 'S000009', '10', '100000', '0', '', '0', 'VND', '1', '500', 'g', '1', 'shops/honguyen/658be05a34f341703665753.png', '1', 'Giày da nữ gót vuông', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '9', '0', '0', '0', '1', 'Giày da nữ gót vuông', 'Giay-da-nu-got-vuong', 'Giày da nữ gót vuông', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('10', '13', '2', '1432606522', '1432629789', '0', '1432606522', '0', '2', 'S000010', '10', '100000', '0', '', '0', 'VND', '2', '350', 'g', '2', 'shops/honguyen/658be05a34f341703665753.png', '1', 'Giày cao gót mũi nhọn màu hồng', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '6', '0', '0', '0', '1', 'Giày cao gót mũi nhọn màu hồng be quý phái', 'Giay-cao-got-mui-nhon-mau-hong-be-quy-phai', 'Giày cao gót mũi nhọn màu hồng be quý phái', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('7', '11', '2', '1432369124', '1432369433', '0', '1432369124', '0', '2', 'S000007', '50', '120000', '0', '', '0', 'VND', '1', '150', 'g', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', '', '', '0', '0', '0', '0', '0', '4', '1', '0', '1', '1', '1', '8', '0', '0', '0', '1', 'áo thun nữ', 'ao-thun-nu', 'áo thun nữ', 'Sản phẩm thời trang<br  /> <div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"/uploads/shops/2015_05/giay-bup-be-ngoi-sao-nhap-khau.jpg\" width=\"800\" /></div> ', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('11', '13', '0', '1432607113', '1703665873', '0', '0', '0', '0', 'V00', '20', '100000', '0', '0', '100000', '0', '0', '0', '2', '0', 'shops/honguyen/658be05a34f341703665753.png', '1', 'GIÀY BÚP BÊ NGÔI SAO NHẬP KHẨU', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '10', '0', '0', '0', '1', 'GIÀY BÚP BÊ NGÔI SAO NHẬP KHẨU', 'GIAY-BUP-BE-NGOI-SAO-NHAP-KHAU', '', 'Sản phẩm thời trang<br />
&nbsp;
<div style=\"text-align:center\"><img alt=\"giay bup be ngoi sao nhap khau\" height=\"800\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658be0d16bc801703665873.png\" width=\"800\" /></div>', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('14', '26', '2', '1703673379', '1703727901', '1', '0', '0', '0', 'S23788', '0', '120000', '0', '0', '100000', '0', '0', '0', '2', '0', 'shops/honguyen/658cd31e347b51703727901.png', '1', 'Kem chuối', 'shops/honguyen/658cd31e347b51703727901.png', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Kem chuối', 'Kem-chuoi', 'abc', 'abc', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('15', '26', '3', '1703673743', '0', '0', '0', '0', '0', 'S28663718', '0', '10000000', '0', '0', '800000', '0', '0', '0', '2', '0', 'shops/dacsanmientay/658bff8fec7f01703673743.png', '1', 'anc', 'shops/dacsanmientay/658bff8fec7f01703673743.png', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', 'anc', 'anc', 'anc', 'abc', '', '', '', '', '0', '0', '0', '0', '0', '96')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('13', '26', '2', '1703658808', '1703730249', '1', '0', '0', '0', 'S000012', '0', '120000', '120000', '0', '120000', '0', '0', '0', '2', '0', 'shops/honguyen/658cdc49f08fd1703730249.png', '1', 'Kem chuối', 'shops/honguyen/658cdc49f08fd1703730249.png', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '2', '0', '0', '0', '1', 'Kem chuối', 'Kem-chuoi-13', 'abc', 'abc', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('16', '26', '3', '1703752099', '1703756014', '1', '0', '0', '0', 'LPTTM001', '0', '120000', '120000', '0', '120000', '0', '0', '0', '2', '0', 'shops/dacsanmientay/658d3251589011703752272.png', '1', 'Lạp Heo Trứng Muối', 'shops/dacsanmientay/658d31a4b8cf71703752099.png,shops/dacsanmientay/658d31a4c8b9f1703752099.png', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '9', '0', '0', '0', '1', 'Lạp Heo Trứng Muối', 'Lap-Heo-Trung-Muoi', 'Lạp Heo Trứng Muối bán 120k/1 bịch 500gr , 240k/1kg', 'Lạp Heo Trứng Muối bán 120k/1 bịch 500gr , 240k/1kg<br />
<br />
<img alt=\"\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/dacsanmientay/658d40ee6ad861703756014.png\" /><img alt=\"\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/dacsanmientay/658d40ee8387b1703756014.png\" />', '', '', '', '', '0', '0', '0', '0', '0', '96')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('17', '26', '2', '1703815719', '0', '1', '0', '0', '0', 'TKCC001', '0', '200000', '200000', '0', '200000', '0', '0', '0', '2', '0', 'shops/honguyen/658e2a2873b541703815719.png', '1', 'Bánh Takoyaki đông lạnh – 50 viên/gói', 'shops/honguyen/658e2a287a4391703815719.png', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Bánh Takoyaki đông lạnh – 50 viên/gói', 'Banh-Takoyaki-dong-lanh-50-vien-goi', '<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Tiết kiệm thời gian</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Chất lượng đảm bảo</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Sự lựa chọn tuyệt vời cho những chủ quán, cửa hàng kinh doanh tiện lợi nhanh gọn</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Dựa trên kết quả khảo sát và theo yêu cầu của các khách hàng đang hợp tác kinh doanh với Chochin, bánh Takoyaki đông lạnh ra đời và đã không phụ lòng của các chủ quán lẫn các thực khách của họ.</p>', '<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2a287d55c1703815719.png\" />&nbsp;Tiết kiệm thời gian</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2a287d55c1703815719.png\" />&nbsp;Chất lượng đảm bảo</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2a287d55c1703815719.png\" />&nbsp;Sự lựa chọn tuyệt vời cho những chủ quán, cửa hàng kinh doanh tiện lợi nhanh gọn</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2a287d55c1703815719.png\" />&nbsp;Dựa trên kết quả khảo sát và theo yêu cầu của các khách hàng đang hợp tác kinh doanh với Chochin, bánh Takoyaki đông lạnh ra đời và đã không phụ lòng của các chủ quán lẫn các thực khách của họ.</p>', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, user_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, price_special, price_config, saleprice, money_unit, product_unit, product_weight, weight_unit, discount_id, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, gift_from, gift_to, inhome, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, num_sell, showprice, vi_title, vi_alias, vi_hometext, vi_bodytext, vi_gift_content, vi_address, vi_tag_title, vi_tag_description, star, free_ship, number_like, number_view, number_order, idsite) VALUES('18', '26', '2', '1703816064', '0', '1', '0', '0', '0', 'TKCC002', '0', '250000', '250000', '0', '250000', '0', '0', '0', '2', '0', 'shops/honguyen/658e2b80bcb1a1703816064.png', '1', 'Cá bào Fengziya – 500g', 'shops/honguyen/658e2b80bcb1a1703816064.png', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Cá bào Fengziya – 500g', 'Ca-bao-Fengziya-500g', '<p>CÁ BÀO FENGZIYA &nbsp;–&nbsp;鰹魚乾</p>

<p>Quy cách: gói 500gr</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Xuất xứ: Đài Loan</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f3ee.svg\" />&nbsp;Với nguồn nguyên liêu quý hiếm, cá ngừ được nướng và sấy khô nhiều lẩn rồi cắt thành từng lát mỏng, được bảo quản trong bịch chân không hoặc chứa nitơ.</p>

<p>Cá bào Fengziya được làm hoàn toàn từ thiên nhiên, giàu dinh dưỡng.</p>', '<p>CÁ BÀO FENGZIYA &nbsp;–&nbsp;鰹魚乾</p>

<p>Quy cách: gói 500gr</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2b80c47d31703816064.png\" />&nbsp;Xuất xứ: Đài Loan</p>

<p><img alt=\"🏮\" draggable=\"false\" role=\"img\" src=\"https://banhang.bbo.vn/uploads/reseller/shops/honguyen/658e2b80c47d31703816064.png\" />&nbsp;Với nguồn nguyên liêu quý hiếm, cá ngừ được nướng và sấy khô nhiều lẩn rồi cắt thành từng lát mỏng, được bảo quản trong bịch chân không hoặc chứa nitơ.</p>

<p>Cá bào Fengziya được làm hoàn toàn từ thiên nhiên, giàu dinh dưỡng.</p>', '', '', '', '', '0', '0', '0', '0', '0', '97')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('1', '222', 'Cửa hàng 247', '0313188712', '0313188712', '179 Tây Sơn, phường Tân Quý, quận Tân Phú, thành phố Hồ Chí Minh', '70', '7600', '76000', 'Nguyễn Thị La Vi', '0989304331', 'order@chonhagiau.com', '', '', '4', '0', 'NGUYEN THI LA VI', '00123456789', 'Sài Gòn', '1', '217', '1621234009', '', '', '0', '2', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('2', '223', 'JellyHouse', '0366954248', 'JH', '66/5 nhiêu tứ phú nhuận', '70', '7250', '72560', 'Lư Loan', '0334198332', 'order@chonhagiau.com', '', '', '6', '0', 'Lư Thị Hải Loan', '56162051273501', 'Thành Phố Hồ Chí Minh', '50', '219', '1621234085', '', '', '1', '1', '', '', '', 'Chuyên  cung cấp sản phẩm chính hiệu cao cấp', '0', 'năn nỉ mở lại đi mà', '1624435535', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('3', '225', 'Công Ty TNHH GGĐ', '0355020828', 'd01210', '99A', '70', '7360', '73600', 'Lê Trung Nghĩa', '03014245820', 'order@chonhagiau.com', '', '', '4', '0', 'Thanh Cao', 'test', 'Tân Bình', '3', '218', '1621235352', '', '', '0', '3', '', '', '', 'Shop này bán đa chủng loại', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('4', '226', 'Shop bán hàng đa cấp siêu cấp vip pro SSS', '201424245724', '2014242457', '343A Lũy Bán Bích', '70', '7250', '72510', 'Võ Tới', '0374600091', 'order@chonhagiau.com', '', '', '2', '0', 'NGUYEN VAN A', '095878964564564', 'NGU', '4', '185', '1621242643', '', '', '0', '4', '', '', '', 'fsagvsdf', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('76', '440', 'Lugbro Official Store', '0314842945', 'LUGBR', '28/11 Huỳnh Đình Hai', '70', '7170', '71710', 'NGUYỄN BẢO CƯỜNG', '0896436336', 'order@chonhagiau.com', '', '', '1', '131', 'cập nhật sau', 'cập nhật sau', 'cập nhật sau', '86', '217', '1640245859', '', '', '1', '76', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('6', '235', 'Máy tính Quang Huy', '0108019145', '0108019145', '197 khu đất dịch vụ, Xa La,phường Phúc La, quận Hà Đông, Hà Nội', '10', '1510', '15100', 'Đoàn Thị Quỳnh', '0975020607', 'order@chonhagiau.com', '', '', '4', '0', 'DOAN THI QUYNH', '19033402271015', 'Hà Nội', '6', '219', '1621667481', '', '', '1', '6', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('7', '266', 'Giang', '0310674217', '0310674217', '95 - Duong So 6 - Le Duc Tho - F15 - Go Vap', '70', '7270', '72740', 'Giang', '0988360138', 'order@chonhagiau.com', '', '', '4', '0', 'Đỗ Hà Giang', '19033121770012', 'Hồ Chí Minh', '7', '218', '1624976781', '', '', '0', '7', '', '', '', 'Shop Gốm Nhật', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('8', '275', 'TRANG SỨC SENYDA', '1801599059', '1801599059', '124/1 đường Ba tháng Hai', '90', '9010', '90207', 'Nguyễn Thị Ái Duy', '0355455542', 'order@chonhagiau.com', '', '', '1', '7', 'Nguyễn Thị Ái Duy', '078945612334563', 'Cần Thơ', '8', '217', '1629775544', '', '', '1', '8', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('9', '276', 'DETECH BIO', '1019107512', '1019107512', '174 Nguyễn Đổng Chi', '10', '1290', '12900', 'NGUYỄN THỊ PHƯƠNG THẢO', '0967355746', 'order@chonhagiau.com', '', '', '2', '9', 'CTCP DETECH BIO', '1013120192', 'Hà Nội', '9', '218', '1629775555', '', '', '1', '9', '', '', '', 'Shop Sữa Purelac', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('10', '277', 'DINCOX_SHOES', '0315336740', '0315336740', '1025/8E Cách Mạng Tháng Tám', '70', '7360', '73750', 'Lưu Quốc Khánh', '0285545379', 'order@chonhagiau.com', '', '', '2', '0', 'Lưu Quốc Khánh', '00123456789', 'Tân Bình', '13', '217', '1629778799', '', '', '0', '10', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('11', '278', 'Trọng Hiếu', '21565685', '21565685', '155sjfj', '93', '9310', '93116', 'Đỗ Trọng Hiếu', '0985647424', 'order@chonhagiau.com', '', '', '4', '0', 'Đỗ Trọng Hiếu', '15662986522', 'HCM', '11', '218', '1629862145', '', '', '1', '11', '', '', '', 'Test', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('12', '279', 'Khanhlongcamera', '0316004071', '0316004071', '80/54  Lãnh Binh Thăng', '70', '7430', '74350', 'Xuân', '0977711133', 'order@chonhagiau.com', '', '', '1', '233', 'Nguyễn Tấn Khanh', '0071001238086', 'Thành Phố Hồ Chí Minh', '15', '219', '1629865331', '', '', '1', '12', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('13', '283', 'Đầm thêu Sala', '41N8019813G', '41N8019813', '179 Phạm Văn Hai', '70', '7360', '73770', 'Quách Ngọc Thảo', '0936038686', 'order@chonhagiau.com', '', '', '2', '131', 'Quách Ngọc Thảo', '00123456789', 'Tân Bình', '16', '217', '1629963107', '', '', '1', '13', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('14', '284', 'FOBELIFE OFFICIAL STORE', '0314152677', 'FBL', '59 Chế Lan Viên', '70', '7600', '76030', 'NGUYỄN ĐỨC ĐÔNG', '0981888665', 'order@chonhagiau.com', '', '', '1', '3', 'Công Ty CP Fobelife', '230205369', 'Kỳ Đồng - Hồ Chí Minh', '17', '218', '1630035918', '', '', '1', '14', '', '', '', 'Shop Thực Phẩm Chức Năng', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('15', '288', 'Công ty bán sản phẩm test', '078946546556', '0789465465', '99B Cộng Hòa', '70', '7360', '73600', 'Tên người đại diện', '0908756096', 'order@chonhagiau.com', '', '', '2', '0', 'NGUYEN VAN ABBB', '095878964564564', 'AAAAAAAAAAAA', '18', '185', '1630374006', '', '', '1', '15', '', '', '', 'xxx', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('16', '291', 'Unie_Store', '0108388733', '0108388733', '179 phố Khương Trung', '10', '1200', '12090', 'PHẠM VĂN LINH', '0988006190', 'order@chonhagiau.com', '', '', '2', '218', 'CONG TY CO PHAN TAP DOAN UKG', '1016774586', 'Hội Sở Chính', '19', '217', '1630465092', '', '', '1', '16', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('17', '292', 'Lealux', '41M8042747', '41M8042747', '116/14B Dương Quảng Hàm', '70', '7270', '72720', 'LÊ THANH TÙNG', '0335116336', 'order@chonhagiau.com', '', '', '3', '11', 'LÊ THANH TÙNG', '00123456789', 'Sài Gòn', '20', '217', '1630465874', '', '', '1', '17', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('18', '293', 'Sato Việt Nhật', '0900250193', '0900250193', 'Số 18 / TT5.2 KĐT Ao Sào', '10', '1270', '12800', 'ĐỒNG THANH TÙNG', '0989868687', 'order@chonhagiau.com', '', '', '1', '218', 'CONG TY TNHH DIEN TU VIET NHAT', '2402211000320050', 'Thị xã Mỹ Hào, Hưng Yên II', '21', '219', '1630479763', '', '', '1', '18', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('19', '295', 'Kalite _Store', '1-0108388733', '1-01083887', 'Toà UKG - Số 188 Lê Lai', '10', '1510', '15215', 'PHẠM VĂN LINH', '0865234468', 'order@chonhagiau.com', '', '', '2', '218', 'CONG TY CO PHAN TAP DOAN UKG', '1016774586', 'Hội Sở Chính', '22', '219', '1630887847', '', '', '1', '19', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('20', '296', 'Belkin_Store', '0315104147', '0315104147', 'Cao ốc Đinh Lễ,01 Đinh Lễ', '70', '7540', '75540', 'Đinh Quang Trọng', '0961952597', 'order@chonhagiau.com', '', '', '2', '233', 'CONG TY TNHH THUONG MAI VÀ DICH VU CUU LONG MEKO', '0421000532684', 'Chi nhánh Hùng Vương', '23', '219', '1630889448', '', '', '1', '20', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('21', '297', 'Meko_Store', '1-0315104147', '1-03151041', 'Cao ốc Đinh Lễ,01 Đinh Lễ', '70', '7540', '75540', 'Đinh Quang Trọng', '0965072036', 'order@chonhagiau.com', '', '', '2', '233', 'CONG TY TNHH THUONG MAI VÀ DICH VU CUU LONG MEKO', '0421000532684', 'Chi nhánh Hùng Vương', '24', '219', '1630889939', '', '', '1', '21', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('22', '298', 'Mocato_Store', '0106775046', '0106775046', '180D Thái Thịnh', '10', '1150', '11700', 'Trần Hữu Tùng', '0867660868', 'order@chonhagiau.com', '', '', '1', '4', 'CONG TY CO PHAN ĐAU TU SIMI', '2035988888', 'Chi Nhánh Đông Đô', '25', '219', '1630892919', '', '', '1', '22', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('23', '299', 'CLODEWASH', '2901789898', '2901789898', 'Khối Tân Hương, Phường Quỳnh Thiện, Thị xã Hoàng Mai, Tỉnh Nghệ An', '46', '4792', '47923', 'Nguyễn Thị Khuê', '0962148504', 'order@chonhagiau.com', '', '', '1', '4', 'Nguyễn Thị Khuê', '23456789', 'nghệ an', '26', '219', '1630919469', '', '', '1', '23', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('24', '300', 'Ngôi Nhà Đồ Chơi', '0302190075', '0302190075', '362C Bùi Đình Túy', '70', '7170', '71710', 'Trần Hoàng Trung', '0918793356', 'order@chonhagiau.com', '', '', '17', '9', 'Trần Hoàng Trung', '00630298001', 'Hồ Chí Minh', '27', '218', '1630993040', '', '', '1', '24', '', '', '', 'Shop đồ chơi', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('25', '301', 'Cuahangdongho.vn', '0311167139', 'CHDHO', '385 Cách Mạng Tháng Tám', '70', '7400', '74070', 'Lưu Quốc Hoàng', '0866769306', 'order@chonhagiau.com', '', '', '1', '131', 'CTY TNHH SMART MARKETING', '117685289', 'PGD Lê Lợi', '28', '217', '1631783427', '', '', '1', '25', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('26', '302', 'Hasuta_Store', '2-0108388733', '2-01083887', 'Toà UKG - Số 188 Lê Lai', '10', '1510', '15215', 'Phạm Văn Linh', '0986000623', 'order@chonhagiau.com', '', '', '2', '5', 'CONG TY CO PHAN TAP DOAN UKG', '1016774586', 'Hội Sở Chính', '29', '219', '1632697738', '', '', '1', '26', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('27', '335', 'FIT Skincare', '0315755766', '0315755766', '90/5 Yên Thế', '70', '7360', '73640', 'Hà Nhã Trân', '0356683551', 'order@chonhagiau.com', '', '', '1', '0', 'Công Ty TNHH Genstone Beauty', '77000026', 'Chi nhánh Tân Phú', '30', '218', '1633078100', '', '', '0', '27', '', '', '', 'Shop Mỹ Phẩm', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('29', '338', 'AdamStore', '01D8025391', '01D8025391', 'Số 209 Phố Huế', '10', '1120', '11220', 'NGUYỄN CẨM TÚ', '0938888835', 'order@chonhagiau.com', '', '', '1', '131', 'NGUYỄN CẨM TÚ', '19033402271015', 'Hà Nội', '32', '217', '1633503025', '', '', '1', '29', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('28', '337', 'LeKhaMart', '0313611399', '0313611399', '62 đường số 7A', '70', '7430', '74320', 'Lê Trọng Kha', '0908878882', 'order@chonhagiau.com', '', '', '1', '0', 'Lê Trọng Kha', '8878888', 'CTY TNHH LEKHA DISTRIBUTOR', '31', '218', '1633424721', '', '', '1', '28', '', '', '', 'Shop', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('30', '339', 'Đồng Ngọc Tùng', '0316403943', '0316403943', '246D Bạch Đằng', '70', '7170', '71710', 'ĐINH THỊ THỰC', '0934789269', 'order@chonhagiau.com', '', '', '3', '11', 'CTY TNHH MY NGHE DONG DAI BAI', '113002860236', 'Chi nhánh Gia Định', '33', '217', '1633513164', '', '', '1', '30', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('31', '341', 'Ánh Lửa Việt', '1601539616', '1601539616', '581 Khóm Vĩnh Tây', '88', '8830', '88319', 'Nguyễn Quốc Lãm', '0913970944', 'order@chonhagiau.com', '', '', '1', '0', 'Cập nhật sau', 'Cập nhật sau', 'Cập nhật sau', '34', '218', '1633576556', '', '', '0', '31', '', '', '', 'Ánh Lửa Việt', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('32', '342', 'Khánh Ngọc Comestic', '0106903509', '0106903509', '30 Nguyễn Văn Tố', '10', '1100', '11120', 'LÊ HOÀNG GIANG', '0904699266', 'order@chonhagiau.com', '', '', '1', '0', 'Bổ sung sau', 'Bổ sung sau', 'Bổ sung sau', '35', '217', '1633592776', '', '', '0', '32', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('33', '346', 'Pur Vietnam Official', '0312627075', '0312627075', '1 Lê Quang Định', '70', '7480', '74950', 'Nguyễn Kim Tùng', '0918545259', 'order@chonhagiau.com', '', '', '1', '0', 'CT TNHH Dinh Bach', '194395989', 'chi nhánh Chợ Lớn', '36', '218', '1634029257', '', '', '0', '33', '', '', '', 'Pur Vietnam Official', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('34', '348', 'BUTTERFLY VIỆT NAM', '0314176484', '0314176484', '118 - 120 đường Nội Khu Mỹ Kim 2, Khu Mỹ Kim 2 (H25), Phường Tân Phong, Quận 7, TP.Hồ Chí Minh T', '70', '7560', '75660', 'LI,XIAOFENG', '0707691604', 'order@chonhagiau.com', '', '', '1', '218', 'CẬP NHẬT SAU', 'CẬP NHẬT SAU', 'Thành Phố Hồ Chí Minh', '37', '219', '1634196039', '', '', '1', '34', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('35', '353', 'Caphe & Trà', '0316336246', '0316336246', 'Số 32 Đường Thạch Thị Thanh, Phường Tân Định, Quận 1, Thành phố Hồ Chí Minh', '70', '7100', '71070', 'NGUYỄN THÙY DƯƠNG', '0901596555', 'order@chonhagiau.com', '', '', '1', '0', 'Cập Nhật Sau', 'Cập Nhật Sau', 'Thành Phố Hồ Chí Minh', '38', '219', '1634867164', '', '', '0', '35', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('36', '354', 'Việt Cafe', '0106206177', '0106206177', 'Số 15, ngõ 141 Quan Nhân, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội', '10', '1200', '12060', 'LƯƠNG BÁ THÁI', '0947778912', 'order@chonhagiau.com', '', '', '1', '218', 'CONG TY CO PHAN PHAT TRIEN VIET CAFE', '162852829', 'Ngân hàng TMCP Á Châu, CN Thăng Long, Hà Nội', '39', '219', '1635145763', '', '', '1', '36', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('37', '356', 'Ngọc Thịnh 68', '3603696223', 'NT', 'Tổ 7, Ấp Trầu', '81', '8158', '81580', 'Nguyễn Quốc Hưng', '0962337024', 'order@chonhagiau.com', '', '', '2', '4', 'CTY TNHH SX & TM NGOTICO', '0401001508384', 'Nhơn Trạch, Đồng Nai', '40', '218', '1635217661', '', '', '1', '37', '', '', '', 'Shop nội thất', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('38', '357', 'Vlr Volare Store', '59B8002307', '59B8002307', 'Ấp Nam Hải', '95', '9520', '95216', 'TRẦN THỊ KIM OANH', '0907293534', 'order@chonhagiau.com', '', '', '5', '11', 'VO NGOC DUNG', '31010002023419', 'Thành phố Hồ Chí Minh', '41', '217', '1635219710', '', '', '1', '38', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('39', '359', 'shoe_houzz', '41B8012903', 'HOUZZ', 'Số 48, đường số 5', '70', '7130', '71350', 'VƯƠNG KIM NHẪN', '0898500169', 'order@chonhagiau.com', '', '', '2', '131', 'DANG THI VIET HA', '0261003473362', 'Chi nhánh Tân Định', '42', '217', '1635473819', '', '', '1', '39', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('40', '360', 'COMET OFFICIAL', '03133375254', 'comet', '100 Trần Đại Nghĩa, khu phố 6, phường Tân Tạo A, quận Bình Tân, Tp Hồ Chí Minh', '70', '7620', '76330', 'TRƯƠNG PHƯỚC NGHĨA', '0919774088', 'order@chonhagiau.com', '', '', '4', '218', 'CONG TY CO PHAN PHAN PHOI GIA HUY', '19129488636018', 'TECHCOMBANK - NHTMCP KY THUONG VN', '44', '219', '1635499889', '', '', '1', '40', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('41', '362', 'KTG ELECTRIC', '3603773238', 'KTG', 'Lô số 33, KCN Tam Phước, phường Tam Phước, thành phố Biên Hòa, tỉnh Đồng Nai', '81', '8110', '81286', 'PHAN TRỊNH ANH TUẤN', '0989698132', 'order@chonhagiau.com', '', '', '1', '218', 'Cập Nhật Sau', 'Cập Nhật Sau', 'Thành Phố Hồ Chí Minh', '51', '219', '1635736346', '', '', '1', '41', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('42', '363', 'Patech Electronics', '0102179490', 'patech', 'B26+27, Khu B Hoàng Cầu, Phường Ô Chợ Dừa, Quận Đống Đa, Thành Phố Hà Nội', '10', '1150', '11540', 'PHẠM MINH ĐỨC', '0868186060', 'order@chonhagiau.com', '', '', '18', '233', 'CONG TY CO PHAN XUAT NHAP KHAU KY NGHE A DONG', '8201116616666', 'Chi Nhánh Tây Hà Nội', '52', '219', '1635737397', '', '', '1', '42', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('43', '364', 'Ngọc Trinh Fashion', '0000000001', 'NTFAS', '9 đường 14, Khu dân cư ven sông', '70', '7560', '75660', 'TIÊU QUANG', '0906235989', 'order@chonhagiau.com', '', '', '15', '131', 'TIEU QUANG', '009315790', 'cập nhật sau', '53', '217', '1635821042', '', '', '1', '43', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('44', '374', 'Toàn Thắng Wine', '0314744063', 'TTW', '64/13 Âu Dương Lân', '70', '7510', '75140', 'Trần Quốc Minh', '0283852538', 'order@chonhagiau.com', '', '', '2', '8', 'CÔNG TY TNHH THƯƠNG MẠI – DỊCH VỤ TOÀN THẮNG WINE', '0331000482958', 'Sài Gòn', '54', '218', '1635909084', '', '', '1', '44', '', '', '', 'Shop rượu', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('45', '380', 'Hàng Nhật chính hãng', '0316963310', 'HNCH', '2977/8/1 Quốc Lộ 1A', '70', '7290', '72990', 'Nguyễn Khắc Quang Huy', '0906382121', 'order@chonhagiau.com', '', '', '1', '3', 'Công ty TNHH Soldiers', '7979 686', 'Chi nhánh Gò Mây', '55', '218', '1635996598', '', '', '1', '45', '', '', '', 'Shop Mỹ Phẩm', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('46', '381', 'Dellingrvn', '0109066305', 'DLVN', 'Số 19, ngõ 142/32 Cổ Nhuế', '10', '1430', '14326', 'Nguyễn Quỳnh Hoa', '0964984063', 'order@chonhagiau.com', '', '', '4', '3', 'Công Ty TNHH TMDV HAQUATE VIỆT NAM', '19135481542018', 'Đông Đô', '56', '218', '1636007230', '', '', '1', '46', '', '', '', 'Shop Mỹ Phẩm', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('47', '387', 'WATAPY', '0314345206', 'WTP', '299/2/11 Lý Thường Kiệt', '70', '7430', '74390', 'Nguyễn Hồng Phúc', '0935201861', 'order@chonhagiau.com', '', '', '7', '4', 'CÔNG TY CỔ PHẦN ĐẦU TƯ PHÚC NGUYỄN', '576149999', 'Lê Văn Việt', '57', '218', '1636336874', '', '', '1', '47', '', '', '', 'Shop gia dụng', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('48', '390', 'MaVangSaoMai', '0310157089', 'MAVANG', '288A7 Nam Kỳ Khởi Nghĩa', '70', '7220', '97746', 'PHẠM VĂN ĐIỆP', '0902674729', 'order@chonhagiau.com', '', '', '5', '11', 'CTY TNHH MY THUAT SX TM SAO MAI', '31310000807724', 'Chi nhánh Bắc Sài Gòn', '58', '217', '1636516866', '', '', '1', '48', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('49', '396', 'Anni Coffee', '0314890307', 'Annc', 'Số 05 Cửu Long', '70', '7400', '74090', 'Đỗ Thanh Yến Nhi', '0938309995', 'order@chonhagiau.com', '', '', '2', '0', 'CTY CP TRA CA PHE AN NHIEN', '0881000457977', 'Gia Định', '59', '218', '1636960969', '', '', '0', '49', '', '', '', 'Shop Coffee', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('50', '400', '5GS SmartHome', '0306263327', '5gs', '569 Phan Văn Trị, Phường 7, Quận Gò Vấp,Hồ Chí Minh', '70', '7270', '72710', 'VƯƠNG THANH TÂM', '0907459111', 'order@chonhagiau.com', '', '', '1', '218', 'Cập Nhật Sau', 'Cập Nhật Sau', 'Thành Phố Hồ Chí Minh', '60', '219', '1637035167', '', '', '1', '50', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('51', '401', 'Fujiwa', '0315058035', 'fjw', '57A Trung Mỹ Tây 13', '70', '7290', '72900', 'Ngô Thị Thu Thủy', '0901661789', 'order@chonhagiau.com', '', '', '2', '8', 'DINH XUAN HUNG', '0071001196408', 'Tân Bình', '61', '218', '1637119639', '', '', '1', '51', '', '', '', 'Shop Thực Phẩm Cao Cấp', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('52', '402', 'Jabra Official Store', '01-0312087158', 'JABRA', '71 Hồ Văn Huê', '70', '7250', '72600', 'NGUYỄN NHẬT SANG', '0913982877', 'order@chonhagiau.com', '', '', '1', '233', 'CÔNG TY TNHH SYNSTYLE', '151964889', 'Chi nhánh Ông Ích Khiêm', '62', '217', '1637132712', '', '', '1', '52', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('53', '403', 'Audio Technica Official Store', '03-0312087158', 'AuTec', '71 Hồ Văn Huê', '70', '7250', '72600', 'NGUYỄN NHẬT SANG', '0913982877', 'order@chonhagiau.com', '', '', '1', '233', 'CÔNG TY TNHH SYN STYLE', '151964889', 'Chi nhánh Ông Ích Khiêm', '63', '217', '1637133362', '', '', '1', '53', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('54', '404', 'Rivacase Official Store', '02-0312087158', 'RIVAC', '71 Hồ Văn Huê', '70', '7250', '72600', 'NGUYỄN NHẬT SANG', '0913982877', 'order@chonhagiau.com', '', '', '1', '233', 'CÔNG TY TNHH SYN STYLE', '151964889', 'Chi nhánh Ông Ích Khiêm', '64', '217', '1637133997', '', '', '1', '54', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('55', '405', 'Targus Official Store', '04-0312087158', 'Targu', '71 Hồ Văn Huê', '70', '7250', '72600', 'NGUYỄN NHẬT SANG', '0913982877', 'order@chonhagiau.com', '', '', '1', '233', 'CÔNG TY TNHH SYN STYLE', '151964889', 'Chi nhánh Ông Ích Khiêm', '65', '217', '1637134596', '', '', '1', '55', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('56', '407', 'Cheero Official Store', '0312087158', 'ChEER', '71 Hồ Văn Huê', '70', '7250', '72600', 'NGUYỄN NHẬT SANG', '0913982877', 'order@chonhagiau.com', '', '', '1', '233', 'CÔNG TY TNHH SYN STYLE', '151964889', 'Chi nhánh Ông Ích Khiêm', '66', '217', '1637135164', '', '', '1', '56', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('57', '410', 'VO Luxury Fashion', '41W8042972', 'VOLUX', '33 Lê Văn Quới', '70', '7620', '76280', 'TRẦN THỊ LY HƯƠNG', '0909745115', 'order@chonhagiau.com', '', '', '1', '0', 'cập nhật sau', 'cập nhật sau', 'cập nhật sau', '67', '217', '1637286643', '', '', '0', '57', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('58', '411', 'Thủy Dương Cosmetics', '0301867766', 'TDC', '184 Võ Văn Tần', '70', '7220', '72220', 'Dương Hồng Bích Thủy', '0909819481', 'order@chonhagiau.com', '', '', '5', '3', 'Công ty TNHH TM Thủy Dương', '13010001901802', 'BIDV cơ sở 2', '68', '218', '1637291583', '', '', '1', '58', '', '', '', 'Shop Mỹ Phẩm', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('73', '435', 'VIETGREENLIFE', '0309051031', 'VGL', '193 Cô Bắc', '70', '7100', '71190', 'Trần Thị Thùy Trang', '0934794002', 'order@chonhagiau.com', '', '', '2', '4', 'CT TNHH TM DICH VU DL TRANG THANH', '0071005034282', 'Vietcombank Ho Chi Minh', '82', '218', '1639559995', '', '', '1', '73', '', '', '', 'VIETGREENLIFE', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('59', '413', 'TP Trung Minh Thành', '0309100070', 'tmt', '60A Hoàng Văn Thụ', '70', '7250', '72600', 'Nguyễn Văn Sự', '02839482216', 'order@chonhagiau.com', '', '', '3', '8', 'CONG TY TNHH THUC PHAM TRUNG MINH THANH', '118000045406', 'Hồ Chí Minh', '69', '218', '1637314365', '', '', '1', '59', '', '', '', 'Shop thực phẩm nhập khẩu', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('60', '415', 'Honey Buddy', '0312867535', 'HBS', '41/16/4 Đường Gò Cát, Tổ 3, Khu phố 4', '70', '7200', '97804', 'Tạ Quốc Dũng', '0945452576', 'order@chonhagiau.com', '', '', '1', '8', 'CTY TNHH TAI NGUYEN TRAI DAT XANH', '8888290668', 'ACB Phú Thọ', '70', '218', '1637652900', '', '', '1', '60', '', '', '', 'Shop mật ông thể thao', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('61', '416', 'SK NONI', '2001339409', 'SKN', 'Ấp Công Nghiệp,', '97', '9723', '97233', 'Khưu Văn Chương', '0868927559', 'order@chonhagiau.com', '', '', '18', '0', 'SK NONI', '1681116816899', 'Cà Mau', '71', '218', '1637806964', '', '', '1', '61', '', '', '', 'Gian Hàng TPCC', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('86', '458', 'Sunrise plus Việt Nam', '0315640469', 'Sunrise', 'Tầng 1, 147/34 Đường số 15, Phường Bình Hưng Hòa, Quận Bình Tân, Thành phố Hồ Chí Minh', '70', '7620', '76200', 'TRẦN ĐỨC TIẾN', '0933171568', 'order@chonhagiau.com', '', '', '1', '3', 'CTCP SUNRISE PLUS VIET NAM', '466768', 'Thành Phố Hồ Chí Minh', '96', '219', '1641270826', '', '', '1', '86', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('62', '417', 'Healthy Air- Giải pháp khí sạch', '0109611889', 'Healthy Ai', '230a Hoàng Ngân, phường Trung Hòa,quận Cầu Giấy, Hà Nội', '10', '1220', '12300', 'BÙI THỊ KIM THOA', '0964106886', 'order@chonhagiau.com', '', '', '4', '218', 'Bùi Thị Kim Thoa', '19022056168014', 'chi nhánh Hoàng Đạo Thúy', '72', '219', '1637999405', '', '', '1', '62', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('63', '421', 'Đồ chơi AMO', '01-0311167139', 'Dcamo', '385 Cách Mạng Tháng Tám', '70', '7400', '74070', 'Lưu Quốc Hoàng', '0866769306', 'order@chonhagiau.com', '', '', '1', '9', 'CTY TNHH SMART MARKETING', '117685289', 'PGD Lê Lợi', '73', '217', '1638504583', '', '', '1', '63', '', '', '', '', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('64', '422', 'Organiclife', 'k0po635', 'test', 'VP2- P220 tòa HH03C Khu đô thị Thanh Hà', '10', '1510', '15238', 'Phạm Thị Ngoãn', '0941710000', 'order@chonhagiau.com', '', '', '18', '0', 'Cập nhật sau', 'Cập nhật sau', 'Cập nhật sau', '74', '218', '1638519936', '', '', '0', '64', '', '', '', 'Shop', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('65', '423', 'Organiclife', '0109697854', 'ORG', 'VP2- P220 tòa HH03C Khu đô thị Thanh Hà', '10', '1510', '15238', 'Phạm Thị Ngoãn', '0983074088', 'order@chonhagiau.com', '', '', '15', '4', 'NGUYEN THU HONG', '090809999', 'Hà Nội', '75', '218', '1638602956', '', '', '1', '65', '', '', '', 'shop', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('66', '424', 'thanhcao', '1424235236t', 'TC', 'dh', '70', '7220', '72350', 'Thanh Cao', '0355020828', 'order@chonhagiau.com', '', '', '1', '0', 'Thanh Cao', 'Thanh Cao', 'Thanh Cao', '76', '218', '1638603447', '', '', '0', '66', '', '', '', 'adsaf', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('67', '426', 'DOHA JSC', '0104400926', 'DHJ', '602 Cộng Hòa, Phường 13, Quận Tân Bình, TP. Hồ Chí Minh', '70', '7360', '73670', 'Trịnh Thị Phi Đoàn', '0949406226', 'order@chonhagiau.com', '', '', '2', '8', 'CT CP DT DOHA', '0071001076598', 'HCM', '77', '218', '1638762538', '', '', '1', '67', '', '', '', 'Shop bán rượu', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('68', '427', 'Cô Tám Cà Mau', '61A8018916', 'CTCM', '64 Đường 3/2 Khóm 8', '97', '9710', '97106', 'Nguyễn Thị Mỹ Diệp', '0919995369', 'order@chonhagiau.com', '', '', '4', '8', 'NGUYEN THI MY DIEP', '19035795666019', 'Cà Mau', '78', '218', '1638951108', '', '', '1', '68', '', '', '', 'Đặc sản Cà Mau', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('69', '429', 'Chợ Nhà Giàu', '0316118657', 'ECNG', '99A Cộng Hòa', '70', '7360', '73600', 'Phạm Thanh Bình', '0833081888', 'order@chonhagiau.com', '', '', '2', '0', 'CTCP THUONG MAI DIEN TU CHO NHA GIAU', '1012081888', 'Tân Định', '79', '218', '1639101285', '', '', '1', '69', '', '', '', 'ECNG', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('70', '432', 'SKINMD', '0106010600', 'SKINMD', '98 Hào Nam', '10', '1150', '11540', 'Phạm Thị Vân Anh', '0984602111', 'order@chonhagiau.com', '', '', '10', '3', 'CTY CP GP SUC KHOE & SAC DEP JANAMI', '020030488688', 'Đống Đa - PGD Hào Nam', '80', '218', '1639389062', '', '', '1', '70', '', '', '', 'Shop TPCN', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('71', '433', 'OSUNO Japan Technology', '0106618276', 'OSUNO', 'Số nhà 29+31, Ngõ 63 Phố Vũ Trọng Phụng, Phường Thanh Xuân Trung,Quận Thanh Xuân, Thành phố Hà Nội', '10', '1200', '12000', 'ĐỖ MẠNH HẢI', '02432000877', 'order@chonhagiau.com', '', '', '4', '218', 'Công ty TNHH Phát triển Công nghệ Long Tiến Hải', '19134887598018', 'CN Hoàng Đạo Thúy, Hà Nội', '81', '219', '1639473656', '', '', '1', '71', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('72', '434', 'MINAHI.VN', '0109826267', 'MINAHI', 'Tầng 2, số 35A ngõ 45 Trần Thái Tông, Phường Dịch Vọng Hậu ,Quận Cầu Giấy,Thành Phố Hà Nội', '10', '1220', '12310', 'TRẦN NGỌC ANH', '02477799179', 'order@chonhagiau.com', '', '', '1', '218', 'CTY CO PHAN TAP DOAN MIEN NAM HYDROGEN', '22112168', 'CẬP NHAT SAU', '84', '219', '1639474966', '', '', '1', '72', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('74', '436', 'Anek_Official Store', '0315711536', 'ANEOS', '412 Nguyễn Thị Minh Khai', '70', '7220', '72220', 'NGUYỄN HỮU HOÀNG BẢO', '0982496385', 'order@chonhagiau.com', '', '', '2', '131', 'CTY TNHH FRANCE INTERNATIONAL', '0371000508967', 'Chi nhánh Tân Định', '83', '217', '1639627075', '', '', '1', '74', '', '', '', 'Anek – một thương hiệu quốc tế đa ngành được phát triển từ những năm 1967 – tại Hy Lạp và Italia. Các ngành kinh doanh của Anek khá đa dạng: du thuyền, thời trang, trang sức, mỹ phẩm… Trong đó nổi tiếng nhất là đội tàu Du Thuyền tại Châu Âu.

Việt Nam – nhà máy chính với các đối tác sản xuất về mảng thời trang của Anek. Các sản phẩm cung cấp trên du thuyền chính của Anek từ đồ lót, đồ ngủ đến những bộ quà tặng cao cấp từ lụa. Đều được sản xuất tại Việt Nam, với các nguồn nguyên liệu được nhập khẩu từ 4 quốc gia chính: Thailand, Ấn Độ, Banglades, Thổ Nhĩ Kỳ.

Năm 2021, sau khi được chính phủ Việt Nam bảo hộ độc quyền thương mại các sản phẩm may mặc, Anek bắt đầu thiết lập các hệ thống kinh doanh của mình tại đây. Các sản phẩm đồ lót, đồ ngủ, đồ mặc nhà của Anek sẽ được phân phối trực tiếp và duy nhất qua đối tác chính thức là Công Ty France International.

Với những tiêu chuẩn của Châu Âu, Anek chú trọng tuyệt đối vào việc an toàn người dùng. Các sản phẩm kinh doanh tại Việt Nam, được kiểm nghiệm đạt các tiêu chuẩn dùng trên các du thuyền của Anek. Kết hợp với đối tác sản xuất lâu năm tại Việt Nam, Anek tin rằng sẽ mang lại tính phù hợp tuyệt đối cho người Việt.

Anek đã được bảo hộ bởi các quốc gia:

Italia: Registration Number – 0000635421
Khối EU (27 quốc gia Châu Âu): Registration Number – 017947610
Việt Nam: Registration Number – 4201938607.', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('75', '438', 'SAIGON HD', '0310633154', 'SAIGON', '122B Phan Đăng Lưu, Phường 3,Quận Phú Nhuận, Thành phố Hồ Chí Minh, Việt Nam', '70', '7250', '72570', 'PHẠM QUANG TIẾN', '02866609794', 'order@chonhagiau.com', '', '', '1', '233', 'Cập Nhật Sau', 'Cập Nhật Sau', 'Thành Phố Hồ Chí Minh', '85', '219', '1639987517', '', '', '1', '75', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('77', '441', 'Cơ sở THUÝ LỰC', '61A8018811', 'CSTL', '107 Phạm Văn Ký, Khóm 5', '97', '9710', '97100', 'Lâm Cẩm Thuý', '0945621721', 'order@chonhagiau.com', '', '', '18', '8', 'LAM CAM THUY', '7977889979', 'Cà Mau', '87', '218', '1640327911', '', '', '0', '77', '', '', '', 'Shop thực phẩm', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('78', '442', 'TOMOYO VN', '0316695220', 'TOMOV', '391A Nam Kỳ Khởi Nghĩa', '70', '7220', '97596', 'NGUYỄN NGỌC THỦY TIÊN', '0902527799', 'order@chonhagiau.com', '', '', '1', '131', 'cập nhật sau', 'cập nhật sau', 'cập nhật sau', '88', '217', '1640329175', '', '', '1', '78', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('79', '444', 'Phụ Kiện Hira', '02_0311036009', 'PKHIR', 'Số 11, đường số 23A, khu phố 5', '70', '7620', '76310', 'LƯU VĂN NAM', '02862903543', 'order@chonhagiau.com', '', '', '1', '233', 'CONG TY TNHH HIRA VIET NAM', '185903779', 'Chi nhánh Nguyễn Đình Chiểu', '89', '217', '1640332172', '', '', '1', '79', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('80', '445', 'Gia Dụng Hira', '01_0311036009', 'GDHIR', 'Số 11, đường số 23A, khu phố 5', '70', '7620', '76310', 'LƯU VĂN NAM', '02862903543', 'order@chonhagiau.com', '', '', '1', '218', 'CONG TY TNHH HIRA VIET NAM', '185903779', 'Chi nhánh Nguyễn Đình Chiểu', '90', '217', '1640332521', '', '', '1', '80', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('81', '447', 'Chát Nuts And Tea', '0314011147', 'Chat', '150 Trần Não', '70', '7130', '71350', 'Nguyễn Thị Diễm Khanh', '0814108478', 'order@chonhagiau.com', '', '', '2', '8', 'NGUYEN THI DIEM KHANH', '0071001328979', 'Tân Bình', '91', '218', '1640402170', '', '', '1', '81', '', '', '', 'Shop TPCC', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('82', '450', 'Photree Store', '0313470444', 'PHOTR', '838/40 Cách Mạng Tháng 8', '70', '7360', '73770', 'LÊ THU HẰNG', '0978886663', 'order@chonhagiau.com', '', '', '2', '3', 'CTY TNHH DICH VU XNK A CHAU', '0501000098654', 'Chi nhánh Bắc Sài Gòn', '92', '217', '1640662315', '', '', '1', '82', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('83', '451', 'SP ONE technology', '0401960857', 'SP ONE', '287 Ý Lan Nguyên Phi, Phường Hòa Cường Bắc, Quận Hải Châu, Thành phố Đà Nẵng, Việt Nam', '55', '5510', '55300', 'LÊ PHƯƠNG MINH DUY', '02363835566', 'order@chonhagiau.com', '', '', '2', '233', 'CTY TNHH MTV CONG NGHE SP ONE', '0041000364814', 'Cập Nhật Sau', '93', '219', '1640673791', '', '', '1', '83', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('84', '452', 'Winci Việt Nam', '0109690873', 'Winci', 'Số nhà 64, Hẻm 23, Ngách 62, Ngõ 1, Phố Bùi Xương Trạch, Phường Thượng Đình, Quận Thanh Xuân, Thành phố Hà Nội', '10', '1200', '12010', 'ĐỖ TẤT HOÀNG', '0898754321', 'order@chonhagiau.com', '', '', '1', '4', 'CTY CP GIA DUNG WINCI VIET NAM', '668844888888', 'Cập Nhật Sau', '94', '219', '1640678494', '', '', '1', '84', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('85', '457', 'Hưng Thịnh Phát', '0109451924', 'Hưng T', 'Thôn Tri Thủy, Xã Tri Thủy, Huyện Phú Xuyên, Thành phố Hà Nội', '10', '1580', '15802', 'NGUYỄN DUY HƯNG', '0333582582', 'order@chonhagiau.com', '', '', '8', '218', 'Cập Nhật Sau', 'Cập Nhật Sau', 'Cập Nhật Sau', '95', '219', '1641173733', '', '', '1', '85', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('87', '459', 'Timex VietNam', '0313923327', 'TIMEX', 'A2-00 Khu chung cư phức hợp M1, số 74 Nguyễn Cơ Thạch', '70', '7130', '71390', 'HÀNG MINH TÂN', '0906607030', 'order@chonhagiau.com', '', '', '17', '131', 'CONG TY TNHH PHAN PHOI TRISTAR', '01518705001', 'Chi nhánh Sài Gòn', '97', '217', '1641272645', '', '', '1', '87', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('88', '460', 'Kalpen Việt Nam', '0109396078', 'Kalpen', 'A24.BT1, khu đô thị Văn Quán - Yên Phúc, Phường Văn Quán, Quận Hà Đông, Thành phố Hà Nội.', '10', '1510', '15108', 'TRƯƠNG THỊ XUÂN MAI', '0942833433', 'order@chonhagiau.com', '', '', '2', '218', 'Công ty Cổ Phần Kalpen Việt Nam', '0109396078', 'Cập Nhật Sau', '98', '219', '1641276976', '', '', '1', '88', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('89', '461', 'Đồ Da Cao Cấp Cielo Celeste', '0313149350', 'CIELO', '220 Nguyễn Thị Thập', '70', '7560', '75640', 'TRẦN TRƯƠNG THANH THÚY', '0938170669', 'order@chonhagiau.com', '', '', '15', '131', 'CTY TNHH ITALVINA', '618704060046652', 'PGD Sài Gòn', '99', '217', '1641279142', '', '', '1', '89', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('90', '462', 'CUỘC SỐNG SỐ MINH PHÚC', '0316983331', 'CSSMP', '23 Đường Hưng Hoá', '70', '7360', '73760', 'Quách Ngọc Thảo Mai', '0909900406', 'order@chonhagiau.com', '', '', '1', '0', 'CONG TY TNHH CUOC SONG SO MINH PHUC', '3169833318', 'Hòa Hưng', '100', '218', '1641282790', '', '', '1', '90', '', '', '', 'Shop chăm sóc sắc đẹp', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('91', '463', 'UMO', '0309590629', 'UMOES', 'Số 115, đường Trung Mỹ Tây 01', '70', '7290', '72900', 'PHAN THỊ MINH KHANH', '0906707173', 'order@chonhagiau.com', '', '', '1', '131', 'CTY TNHH UMO.VN', '868238', 'Chi nhánh Hồ Chí Minh', '101', '217', '1641374287', '', '', '1', '91', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('92', '467', 'CNG - CHĂN GA GỐI JULIA', '41B8004232', 'JULIA', '45B Gò Cát', '70', '7150', '71620', 'Đào Xuân Nhị', '0972362775', 'order@chonhagiau.com', '', '', '4', '4', 'DAO XUAN NHI', '19033617279017', 'Nguyễn Duy Trinh _ Quận 2', '102', '218', '1641521543', '', '', '1', '92', '', '', '', 'Shop chăn ga', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('93', '471', 'Hira - Phụ Kiện Nhập Khẩu Cao Cấp', '03_0311036009', 'HIJEW', 'Số 11, đường số 23A, khu phố 5', '70', '7620', '76310', 'LƯU VĂN NAM', '02862903543', 'order@chonhagiau.com', '', '', '1', '7', 'CONG TY TNHH HIRA VIET NAM', '185903779', 'Chi nhánh Nguyễn Đình Chiểu', '103', '217', '1641953983', '', '', '1', '93', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('98', '4', 'Takoyaki ChoChin', '0313458623', 'CHOCHIN', '12/3D Đường 06, P.Linh Xuân, Q.Thủ Đức', '0', '0', '0', 'Nguyễn Ngọc Như', '0988455066', 'adminwmt@gmail.com', '/uploads/logo_9a78c7bd6fa73998af250453847e1802.png', '/uploads/logo_9a78c7bd6fa73998af250453847e1802.png', '1', '26', 'Nguyễn Thanh Hoàng', '205441019', 'Sài Gòn', '', '2', '1703822242', '', '', '1', '96', '/uploads/logo_9a78c7bd6fa73998af250453847e1802.png', '/uploads/chochin/takochochin-black.png', '', 'Bánh takoyaki', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('94', '476', 'Escanté_Official Store', '02_0315711536', 'ESCAN', '412 Nguyễn Thị Minh Khai', '70', '7220', '72220', 'NGUYỄN HỮU HOÀNG BẢO', '0982496385', 'order@chonhagiau.com', '', '', '2', '131', 'CTY TNHH FRANCE INTERNATIONAL', '0371000508967', 'Chi nhánh Tân Định', '104', '217', '1642403666', '', '', '1', '94', '', '', '', '', '0', '', '', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('97', '2', 'Họ Nguyễn', '0317242199', 'Honguyen', '12/3D Đường 06, P.Linh Xuân, Q.Thủ Đức', '0', '0', '0', 'Nguyễn Thanh Hoàng', '0988455066', 'order@bbo.vn', '/uploads/honguyen/honguyen-bbo.png', '/uploads/honguyen/honguyen-bbo.png', '2', '8', 'Nguyễn Thanh Hoàng', '205441019', 'Ngân hàng Á Châu', '', '2', '1644570882', '', '', '1', '95', '', '/uploads/honguyen/honguyen-bbo.png', '', 'Shop food', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('95', '478', 'Vua Cua Food', '312897723', 'VCF', '30 Vũ Huy Tấn', '70', '7170', '71820', 'Đoàn Thị Anh Thư', '0973277958', 'order@bbo.vn', '', '', '2', '8', 'CT CP TM DICH VU VUA CUA', '0441000748456', 'Ngân hàng thương mại cổ phần Ngoại thương Việt Nam', '105', '218', '1644570882', '', '', '1', '95', '', '', '', 'Shop food', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_seller_management (id, userid, company_name, company_code, store_code, address, province_id, district_id, ward_id, name, phone, email, image_before, image_after, bank_id, catalogy, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop, require_active, reason, time_require, seller_hot) VALUES('96', '3', 'Đặc sản miền tây', '00312897723', 'DSMT', '12/3D Đường 06, P.Linh Xuân, Q.Thủ Đức', '0', '0', '0', 'Nguyễn Thanh Hoàng', '0988455066', 'order@bbo.vn', '/uploads/dacsanmientay/dac-san-mien-tay.jpg', '/uploads/dacsanmientay/dac-san-mien-tay.jpg', '2', '8', 'Nguyễn Thanh Hoàng', '205441019', 'Ngân hàng Á Châu', '', '2', '1644570882', '', '', '1', '95', '/uploads/dacsanmientay/dac-san-mien-tay.jpg', '/uploads/dacsanmientay/dac-san-mien-tay.jpg', '', 'Shop food', '0', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('1', '0', 'Chờ xác nhận', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('2', '1', 'Đã xác nhận', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('3', '2', 'Đang giao hàng', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('4', '3', 'Giao hàng thành công', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('5', '4', 'Hủy', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('7', '6', 'Giao hàng thất bại', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('6', '5', 'Trả hàng / Hoàn tiền', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('8', '-1', 'Thanh toán thất bại', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_status_order (ìd, status_id, name, weight, status) VALUES('9', '7', 'Đã nhận hàng', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tabs (id, icon, content, weight, active, vi_title) VALUES('1', '', 'content_detail', '1', '1', 'Chi tiết sản phẩm')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tabs (id, icon, content, weight, active, vi_title) VALUES('2', '', 'content_comments', '2', '1', 'Bình luận')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tabs (id, icon, content, weight, active, vi_title) VALUES('3', '', 'content_rate', '3', '1', 'Đánh giá')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('1', '1', 'thời trang')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('1', '2', 'sang trọng')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('1', '3', 'phù hợp')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('1', '4', 'đi chơi')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('6', '5', 'áo sơ mi')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('10', '6', 'mũi nhọn')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi (id, tid, keyword) VALUES('11', '7', 'búp bê')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('1', '1', 'thời-trang', '', '', '', 'thời trang')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('2', '1', 'sang-trọng', '', '', '', 'sang trọng')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('3', '1', 'phù-hợp', '', '', '', 'phù hợp')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('4', '1', 'đi-chơi', '', '', '', 'đi chơi')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('5', '1', 'áo-sơ-mi', '', '', '', 'áo sơ mi')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('6', '1', 'mũi-nhọn', '', '', '', 'mũi nhọn')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tags_vi (tid, numpro, alias, image, description, bodytext, keywords) VALUES('7', '1', 'búp-bê', '', '', '', 'búp bê')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_template (id, status, alias, weight, vi_title) VALUES('1', '1', 'thuong-hieu', '1', 'Sản phẩm gian hàng')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_unit_length (id, name_length, symbol, exchange, time_add, user_add, time_edit, user_edit, status, length) VALUES('1', 'Cm', 'cm', '1', '1608785942', '2', '1611301068', '1', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_units (id, vi_title, vi_note, status) VALUES('1', 'cái', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_units (id, vi_title, vi_note, status) VALUES('2', 'đôi', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('1', 'Nhập kho ngày 23/05/2015', '', '1', '1432364016')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('2', 'Nhập kho ngày 23/05/2015', '', '1', '1432365552')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('3', 'Nhập kho ngày 23/05/2015', '', '1', '1432366753')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('4', 'Nhập kho ngày 23/05/2015', '', '1', '1432367106')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('5', 'Nhập kho ngày 23/05/2015', '', '1', '1432367387')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('6', 'Nhập kho ngày 23/05/2015', '', '1', '1432367857')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('7', 'Nhập kho ngày 23/05/2015', '', '1', '1432369139')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('8', 'Nhập kho ngày 26/05/2015', '', '1', '1432608794')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('9', 'Nhập kho ngày 26/05/2015', '', '1', '1432608805')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('10', 'Nhập kho ngày 26/05/2015', '', '1', '1432608819')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse (wid, title, note, user_id, addtime) VALUES('11', 'Nhập kho ngày 26/05/2015', '', '1', '1432608835')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('1', '1', '222', '247', 'Cửa hàng 247', '0989304331', '179 Tây Sơn, phường Tân Quý, quận Tân Phú, Thành phố Hồ Chí Minh', '70', '7600', '76000', '2253618', '10.7948161', '106.6242291', '10.7948161', '106.6242291', '22', '0', '0', '217', '1621234009', '217', '1638432505', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('3', '3', '225', 'Chợ Nhà Giàu', 'ECNG', '0355020828', '99A Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh', '70', '7360', '73600', '2253619', '10.8009709', '106.6547494', '10.8009709', '106.6547494', '22', '0', '0', '218', '1621235352', '218', '1638603295', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('4', '4', '226', 'siêu cấp', 'Trần Thị Yến Nhi', '0374600090', '100 D 2, Mỹ Phước, Bến Cát, Bình Dương, Việt Nam', '82', '8255', '82550', '2253620', '11.1301028', '106.607513', '11.1301028', '106.607513', '22', '0', '0', '185', '1621242643', '187', '1635500316', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('5', '5', '230', 'Kho hàng 1', 'Watapy', '0946665179', '299/2/11 Lý Thường Kiệt, phường 15, Quận 11, Thành phố Hồ Chí Minh', '70', '7430', '74390', '2253621', '10.776878', '106.6554618', '10.776878', '106.6554618', '22', '0', '0', '217', '1621409621', '218', '1636336684', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('6', '6', '235', 'Quang Huy', 'Quỳnh', '0975020607', 'Dịch vụ 7, dịch vụ 7, Phố Xa La, Khu đô thị Xa La, phường Phúc La, quận Hà Đông, Hà Nội', '10', '1510', '15100', '2253622', '20.9655491', '105.7901884', '20.9655491', '105.7901884', '22', '0', '0', '219', '1621667481', '218', '1639042495', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('7', '7', '266', 'Gốm Nhật', 'Đỗ Hà Giang', '0988360138', '95 - Duong So 6 - Le Duc Tho - F15 - Go Vap', '70', '7270', '72740', '2253624', '20.984516000000013', '105.79547500000001', '20.984516', '105.795475', '17', '0', '0', '218', '1624976781', '218', '1629777134', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('8', '8', '275', 'Senyda', 'Ái Duy', '0355455542', '124/1 Ba Tháng Hai , Phường Xuân Khánh , Quận Ninh Kiều , Thành Phố Cần Thơ', '90', '9010', '90207', '0', '', '', '0', '0', '0', '0', '0', '217', '1629775544', '217', '1645670926', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('9', '9', '276', 'Purelac', 'Purelac', '0967355746', '174 Nguyễn Đổng Chi , Phường Cầu Diễn , Quận Nam Từ Liêm , Thành Phố Hà Nội', '10', '1290', '12900', '0', '', '', '0', '0', '0', '0', '0', '218', '1629775555', '217', '1645670920', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('10', '10', '277', 'DincoxTB', 'Dincox', '0961988840', '1025/8E Cách Mạng Tháng Tám, phường 7, Tân Bình, Thành phố Hồ Chí Minh', '70', '7360', '73750', '2253627', '10.789959', '106.65608', '10.789959', '106.65608', '22', '0', '0', '217', '1629778799', '187', '1629865336', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('11', '11', '278', 'Hiếu', 'Hiếu', '0985647424', '155sjfj', '93', '9317', '93175', '2253628', '21.045562', '105.794599', '21.045562', '105.794599', '22', '0', '0', '218', '1629862145', '231', '1642662295', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('12', '12', '279', 'Quận 1', 'Xuân', '0963335522', '43 Đường Huỳnh Thúc Kháng , Phường Bến Nghé , Quận Quận 1 , Thành Phố Hồ Chí Minh', '70', '7100', '71000', '0', '', '', '0', '0', '0', '0', '0', '219', '1629865331', '217', '1645670914', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('13', '10', '277', 'DincoxTB', 'Dincox', '0961988840', '1025/8E Cách Mạng Tháng Tám, phường 7, Tân Bình, Thành phố Hồ Chí Minh', '70', '7360', '73750', '2253630', '10.789959', '106.65608', '10.789959', '106.65608', '22', '0', '0', '187', '1629865470', '187', '1629866046', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('14', '12', '279', 'Quận 1', 'Xuân', '0963335522', '43 Đường Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', '70', '7100', '71000', '2253631', '10.7725079', '106.7023125', '10.7725079', '106.7023125', '22', '0', '0', '219', '1629874357', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('15', '12', '279', 'Quận 254', 'Xuân', '0963335522', '43 Đường Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', '70', '7100', '71000', '2253632', '10.7725079', '106.7023125', '10.7725079', '106.7023125', '22', '0', '0', '219', '1629875143', '185', '1630317832', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('16', '13', '283', 'SalaTB', 'Sala', '0936038686', '179 Phạm Văn Hai , Phường Số 5 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73770', '0', '', '', '0', '0', '0', '0', '0', '217', '1629963107', '217', '1645670902', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('17', '14', '284', 'Fobelife', 'Fobelife (chị Thúy)', '0386091749', '59 Đường Chế Lan Viên , Phường Tây Thạnh , Quận Tân Phú , Thành Phố Hồ Chí Minh', '70', '7600', '76030', '0', '', '', '0', '0', '0', '0', '0', '218', '1630035918', '217', '1645670874', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('18', '15', '288', 'kho', 'Nguyễn Đức Huy', '0908756096', '99A Cộng Hòa , Phường 4 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73600', '0', '', '', '0', '0', '0', '0', '0', '185', '1630374006', '368', '1645771676', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('19', '16', '291', 'UnieHN', 'Unie', '0969014990', '179 Phố Khương Trung , Phường Khương Trung , Quận Thanh Xuân , Thành Phố Hà Nội', '10', '1200', '12090', '0', '', '', '0', '0', '0', '0', '0', '217', '1630465092', '217', '1645670736', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('20', '17', '292', 'LealuxGV', 'Lealux', '0335116336', '116/14b Dương Quảng Hàm , Phường 5 , Quận Gò Vấp , Thành Phố Hồ Chí Minh', '70', '7270', '72720', '0', '', '', '0', '0', '0', '0', '0', '217', '1630465874', '217', '1646188319', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('21', '18', '293', 'Hà Nội', 'SATO', '0989868687', 'Số 18 / TT5.2 KĐT Ao Sào , Phường Thịnh Liệt , Quận Hoàng Mai , Thành Phố Hà Nội', '10', '1270', '12800', '0', '', '', '0', '0', '0', '0', '0', '219', '1630479763', '217', '1645670721', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('22', '19', '295', 'HCM', 'Tống Tiểu An', '0989055698', '17/6A Phan Huy Ích , Phường Số 14 , Quận Gò Vấp , Thành Phố Hồ Chí Minh', '70', '7270', '72850', '0', '', '', '0', '0', '0', '0', '0', '219', '1630887847', '217', '1645670712', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('23', '20', '296', 'Belkin_Q7', 'Nguyễn Văn Me', '0836378282', '150A Đường số 47 , Phường Tân Quy , Quận 7 , Thành Phố Hồ Chí Minh', '70', '7560', '75670', '0', '', '', '0', '0', '0', '0', '0', '219', '1630889448', '217', '1645670685', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('24', '21', '297', 'microsofl_Quận 7', 'Nguyễn Văn Me', '0836378282', '150A Đường số 47 , Phường Tân Quy , Quận 7 , Thành Phố Hồ Chí Minh', '70', '7560', '75670', '0', '', '', '0', '0', '0', '0', '0', '219', '1630889939', '217', '1645670677', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('25', '22', '298', 'Mocato_quận 11', 'Tường', '0777733279', '347/51 Minh Phụng , Phường Số 2 , Quận 11 , Thành Phố Hồ Chí Minh', '70', '7430', '74470', '0', '', '', '0', '0', '0', '0', '0', '219', '1630892919', '217', '1645670666', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('26', '23', '299', 'Nghệ An', 'Nguyễn Thị Khuê', '0962148504', 'Khối Tân Hương , Xã Quỳnh Thiện , Thị xã Hoàng Mai , Tỉnh Nghệ An', '46', '4792', '47923', '0', '', '', '0', '0', '0', '0', '0', '219', '1630919469', '217', '1645670654', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('27', '24', '300', 'Ngôi Nhà Đồ Chơi', 'Trần Hoàng Trung', '0918793356', '385 Cách Mạng Tháng Tám , Phường Số 13 , Quận 10 , Thành Phố Hồ Chí Minh', '70', '7400', '74070', '0', '', '', '0', '0', '0', '0', '0', '218', '1630993040', '217', '1645670625', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('28', '25', '301', 'Tân Bình', 'Hoàng', '0866769306', '385 Cách Mạng Tháng Tám , Phường Số 1 , Quận 10 , Thành Phố Hồ Chí Minh', '70', '7400', '74240', '0', '', '', '0', '0', '0', '0', '0', '217', '1631783427', '217', '1645670614', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('29', '26', '302', 'Hà Nội 3', 'Anh Vũ', '0986000623', 'Toà UKG - Số 188 Lê Lai , Phường Hà Cầu , Quận Hà Đông , Thành Phố Hà Nội', '10', '1510', '15215', '0', '', '', '0', '0', '0', '0', '0', '219', '1632697738', '217', '1645670598', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('30', '27', '335', 'FIT Skincare', 'Trinh', '0917145620', '666/46 Đường 3/2, Quận 10, Thành phố Hồ Chí Minh', '70', '7400', '74000', '2253647', '10.7680352', '106.667134', '10.7680352', '106.667134', '22', '0', '0', '218', '1633078100', '218', '1635391988', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('31', '28', '337', 'LeKhaMart', 'LeKhaMart', '0908878882', '62 Đường số 7A, phường 8, Quận 11, Thành phố Hồ Chí Minh', '70', '7430', '74320', '2298469', '10.7623514', '106.6471733', '10.7623514', '106.6471733', '22', '0', '0', '218', '1633424721', '218', '1638428098', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('32', '29', '338', 'AdamHN', 'AdamStore', '0938888835', '209 Phố Huế , Phường Phố Huế , Quận Hai Bà Trưng , Thành Phố Hà Nội', '10', '1120', '11220', '0', '', '', '0', '0', '0', '0', '0', '217', '1633503025', '217', '1645670564', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('33', '30', '339', 'Đại Bái BT', 'Đồ Đồng Đại Bái', '0934789269', '581 Khóm Vĩnh Tây , Phường Số 24 , Quận Bình Thạnh , Thành Phố Hồ Chí Minh', '70', '7170', '71710', '0', '', '', '0', '0', '0', '0', '0', '217', '1633513164', '217', '1645670555', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('34', '31', '341', 'Ánh Lửa Việt', 'Ánh Lửa Việt', '0913970944', '581 Khóm Vĩnh Tây', '88', '8830', '88319', '2253651', '10.6746379', '105.0704346', '10.6746379', '105.0704346', '22', '0', '0', '218', '1633576556', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('35', '32', '342', 'Khánh Ngọc_HN', 'Khánh Ngọc Comestic', '0904699266', '30 Nguyễn Văn Tố, Cửa Đông, Hoàn Kiếm, Hà Nội, Việt Nam', '10', '1100', '11120', '2253652', '21.031709', '105.845887', '21.031709', '105.845887', '22', '0', '0', '217', '1633592776', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('36', '33', '0', 'Pur Vietnam Official', 'Hồng Hạnh', '0918545259', '74/5 Nguyễn Thái Sơn, Phường 3, quận Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam', '70', '7270', '72780', '2253653', '10.8158998', '106.6799675', '10.8158998', '106.6799675', '22', '0', '0', '218', '1634029257', '218', '1635933171', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('37', '34', '0', 'Quận 7', 'Nhung', '0334198332', '118 - 120 đường Nội Khu Mỹ Kim 2 , Phường Tân Phong , Quận Quận 7 , Thành Phố Hồ Chí Minh', '70', '7560', '75660', '0', '', '', '0', '0', '0', '0', '0', '219', '1634196039', '217', '1645670548', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('38', '35', '0', 'Quận 1', 'Lytreshop', '0901596555', '32 Thạch Thị Thanh, Tân Định, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', '70', '7100', '71070', '2253655', '10.7903739', '106.6929899', '10.7903739', '106.6929899', '22', '0', '0', '219', '1634867164', '217', '1634873018', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('39', '36', '0', 'Hà nội', 'Vietcafe', '0947778912', '99 Đường Âu Cơ , Phường Tứ Liên , Quận Tây Hồ , Thành Phố Hà Nội', '10', '1240', '12450', '0', '', '', '0', '0', '0', '0', '0', '219', '1635145763', '217', '1645670469', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('40', '37', '0', 'Ngọc Thịnh', 'Ngọc Thịnh 68', '0962337024', '149 Phạm Văn Đồng , Thị Trấn Long Thành , Huyện Long Thành , Tỉnh Đồng Nai', '81', '8153', '81530', '0', '', '', '0', '0', '0', '0', '0', '218', '1635217661', '217', '1645670442', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('41', '38', '0', 'Volare', 'Chị Dung', '0907293534', '23B Gò Dầu , Phường Tân Quý , Quận Tân Phú , Thành Phố Hồ Chí Minh', '70', '7600', '76000', '0', '', '', '0', '0', '0', '0', '0', '217', '1635219710', '217', '1645670433', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('42', '39', '0', 'shoe_houzz', 'ShoeHouzz', '0902722069', '383 Đường Nguyễn Duy Trinh , Phường Bình Trưng Tây , Quận 2 , Thành Phố Hồ Chí Minh', '70', '7130', '71300', '0', '', '', '0', '0', '0', '0', '0', '217', '1635473819', '217', '1645670424', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('53', '43', '364', 'Ngọc Trinh Fashion', 'Tiêu Quang', '0906235989', '9 Đường số 14 , Phường Tân Phong , Quận 7 , Thành Phố Hồ Chí Minh', '70', '7560', '75660', '0', '', '', '0', '0', '0', '0', '0', '217', '1635821042', '217', '1645670385', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('44', '40', '0', 'Bình Tân', 'Comet', '0919774088', '100 Trần Đại Nghĩa , Phường Tân Tạo A , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76330', '0', '', '', '0', '0', '0', '0', '0', '219', '1635499889', '217', '1645670415', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('52', '42', '363', 'Quận 11', 'Patech', '0868186060', '185 Âu Cơ , Phường Số 14 , Quận Quận 11 , Thành Phố Hồ Chí Minh', '70', '7430', '74400', '0', '', '', '0', '0', '0', '0', '0', '219', '1635737397', '217', '1645670392', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('50', '2', '223', 'Tân Bình', 'Loan', '0334198332', '99A Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh, Việt Nam', '70', '7360', '73600', '2253665', '10.8009709', '106.6547494', '10.8009709', '106.6547494', '22', '0', '0', '187', '1635578306', '185', '1637205098', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('51', '41', '362', 'Gò Vấp', 'KTG', '0989698132', '17/6A Phan Huy Ích , Phường Số 14 , Quận Gò Vấp , Thành Phố Hồ Chí Minh', '70', '7270', '72850', '0', '', '', '0', '0', '0', '0', '0', '219', '1635736346', '217', '1645670404', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('54', '44', '374', 'Toàn Thắng Wine', 'Toàn Thắng Wine', '0945671974', '64/13 Âu Dương Lân , Phường Số 3 , Quận 8 , Thành Phố Hồ Chí Minh', '70', '7510', '75140', '0', '', '', '0', '0', '0', '0', '0', '218', '1635909084', '217', '1645670346', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('55', '45', '380', 'Hàng Nhật chính hãng', 'Quang Huy', '0906382121', '2977/8/1 Quốc Lộ 1A , Phường Tân Thới Nhất , Quận 12 , Thành Phố Hồ Chí Minh', '70', '7290', '72990', '0', '', '', '0', '0', '0', '0', '0', '218', '1635996598', '217', '1645670340', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('56', '46', '381', 'Dellingrvn', 'Dellingrvn', '0964984063', 'Số 19 , Phường Cổ Nhuế 2 , Quận Bắc Từ Liêm , Thành Phố Hà Nội', '10', '1430', '14326', '0', '', '', '0', '0', '0', '0', '0', '218', '1636007230', '217', '1645670332', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('57', '47', '387', 'Watapy', 'Chị Oanh', '0935201861', '299/2/11 Lý Thường Kiệt , Phường 15 , Quận 11 , Thành Phố Hồ Chí Minh', '70', '7430', '74390', '0', '', '', '0', '0', '0', '0', '0', '218', '1636336874', '217', '1645670304', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('58', '48', '390', 'Sao Mai', 'Trịnh Vy', '0902674729', '288a7 Nam Kỳ Khởi Nghĩa , Phường 8 , Quận 3 , Thành Phố Hồ Chí Minh', '70', '7220', '97746', '0', '', '', '0', '0', '0', '0', '0', '217', '1636516866', '217', '1645670281', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('59', '49', '396', 'Anni Coffee', 'Anni Coffee', '0938309995', 'Số 05 Cửu Long', '70', '7400', '74090', '2253672', '20.984516000000013', '105.79547500000001', '20.984516', '105.795475', '17', '0', '0', '218', '1636960969', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('60', '50', '400', 'Gò Vấp', '5GS SmartHome', '0907459111', '1269 Đường Phan Văn Trị , Phường Số 7 , Quận Gò Vấp , Thành Phố Hồ Chí Minh', '70', '7270', '72710', '0', '', '', '0', '0', '0', '0', '0', '219', '1637035167', '217', '1645670275', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('61', '51', '401', 'Fujiwa', 'Fujiwa (Vinh)', '0901661789', '57A , Phường Trung Mỹ Tây , Quận 12 , Thành Phố Hồ Chí Minh', '70', '7290', '72900', '0', '', '', '0', '0', '0', '0', '0', '218', '1637119639', '217', '1645670217', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('62', '52', '402', 'SynStyle', 'Jabra-Synstyle', '0912751918', '71 Hồ Văn Huê , Phường Số 9 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72600', '0', '', '', '0', '0', '0', '0', '0', '217', '1637132712', '217', '1645670211', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('63', '53', '403', 'SynStyle', 'Ath-SynStyle', '0916073918', '71 Hồ Văn Huê , Phường Số 9 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72600', '0', '', '', '0', '0', '0', '0', '0', '217', '1637133362', '217', '1645670202', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('64', '54', '404', 'SynStyle', 'Rivacase-SynStyle', '0916673918', '71 Hồ Văn Huê , Phường Số 9 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72600', '0', '', '', '0', '0', '0', '0', '0', '217', '1637133997', '217', '1645670196', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('65', '55', '405', 'SynStyle', 'Targus-SynStyle', '0912761918', '71 Hồ Văn Huê , Phường Số 9 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72600', '0', '', '', '0', '0', '0', '0', '0', '217', '1637134596', '217', '1645670188', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('66', '56', '407', 'SynStyle', 'Cheero-SynStyle', '0912702149', '71 Hồ Văn Huê , Phường Số 9 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72600', '0', '', '', '0', '0', '0', '0', '0', '217', '1637135164', '217', '1645670153', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('67', '57', '410', 'VO', 'Ly Hương', '0909745115', '33 Lê Văn Quới, Phường Bình Trị Đông, Quận Bình Tân, Thành phố Hồ Chí Minh', '70', '7620', '76280', '2255168', '10.7738875', '106.6201536', '10.7738875', '106.6201536', '22', '0', '0', '217', '1637286643', '217', '1637394224', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('68', '58', '411', 'Thủy Dương Cosmetics', 'Thủy Dương Cosmetics', '0909819481', '184 Võ Văn Tần , Phường Phường 5 , Quận 3 , Thành Phố Hồ Chí Minh', '70', '7220', '72220', '0', '', '', '0', '0', '0', '0', '0', '218', '1637291583', '217', '1645670141', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('69', '59', '413', 'TP Trung Minh Thành', 'TP Trung Minh Thành', '02839482216', 'kho số 7, 142/18 Cộng Hòa , Phường 4 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73600', '0', '', '', '0', '0', '0', '0', '0', '218', '1637314365', '218', '1646279231', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('70', '60', '415', 'Honey Buddy', 'Honey Buddy (Phụng)', '0931058836', '41/16/4 Đường Gò Cát , Phường Phú Hữu , Quận Thủ Đức , Thành Phố Hồ Chí Minh', '70', '7200', '97804', '0', '', '', '0', '0', '0', '0', '0', '218', '1637652900', '217', '1645669892', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('71', '61', '416', 'SK NONI', 'SK NONI', '0937499297', 'Ấp Công Nghiệp, xã Lợi An, Huyện Trần Văn Thời, Tỉnh Cà Mau', '97', '9723', '97233', '2273565', '20.984516000000013', '105.79547500000001', '20.984516', '105.795475', '17', '0', '0', '218', '1637806964', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('72', '62', '0', 'HEALTHY AIR_Hà Nội', 'Healthy Air', '0964106886', '22 Ngõ 23 Đỗ Quang , Phường Trung Hòa , Quận Cầu Giấy , Thành Phố Hà Nội', '10', '1220', '12300', '0', '', '', '0', '0', '0', '0', '0', '219', '1638149120', '217', '1645669849', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('73', '63', '421', 'Đồ Chơi Amo', 'Ngân', '0396357672', '385 Cách Mạng Tháng Tám , Phường 13 , Quận 10 , Thành Phố Hồ Chí Minh', '70', '7400', '74070', '0', '', '', '0', '0', '0', '0', '0', '217', '1638504583', '217', '1645669832', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('74', '64', '422', 'Organiclife', 'Organiclife', '0941717669', 'VP2- P220 tòa HH03C Khu đô thị Thanh Hà', '10', '1510', '15238', '2302216', '20.984516000000013', '105.79547500000001', '20.984516', '105.795475', '17', '0', '0', '218', '1638519936', '218', '1638602953', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('75', '65', '423', 'Organiclife', 'Organiclife', '0877163915', 'VP2- P220 tòa HH03C Khu đô thị Thanh Hà , Phường Kiến Hưng , Quận Hà Đông , Thành Phố Hà Nội', '10', '1510', '15238', '0', '', '', '0', '0', '0', '0', '0', '218', '1638602956', '218', '1646188299', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('76', '66', '424', 'Thanh Cao', 'Thanh Cao', '0355020828', 'dh', '70', '7220', '72310', '2304973', '20.984516000000013', '105.79547500000001', '20.984516', '105.795475', '17', '0', '0', '218', '1638603447', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('77', '67', '426', 'DOHA JSC', 'DOHA JSC (chị Quỳnh)', '0949406226', '602 Cộng Hòa , Phường 13 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73670', '0', '', '', '0', '0', '0', '0', '0', '218', '1638762538', '217', '1645669708', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('78', '68', '427', 'Cô Tám Cà Mau', 'Cô Tám Cà Mau', '0919995369', '426 Lý Thường Kiệt , Phường 6 , Thành phố Cà Mau , Tỉnh Cà Mau', '97', '9710', '97142', '0', '', '', '0', '0', '0', '0', '0', '218', '1638951108', '218', '1646280366', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('79', '69', '429', 'Chợ Nhà Giàu', 'Chợ Nhà Giàu', '0833081888', '99A Cộng Hòa, Phường 4 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73600', '2322484', '10.8010004', '106.6547471', '10.8010004', '106.6547471', '22', '0', '0', '218', '1639101285', '217', '1639388001', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('80', '70', '432', 'SKINMD', 'SKINMD', '0984602111', '98 Hào Nam , Phường Ô Chợ Dừa , Quận Đống Đa , Thành Phố Hà Nội', '10', '1150', '11540', '0', '', '', '0', '0', '0', '0', '0', '218', '1639389062', '217', '1645669686', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('81', '71', '433', 'Osuno-tân Bình', 'Osuno', '0858522533', '406/5 Cộng Hòa , Phường Số 13 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73670', '0', '', '', '0', '0', '0', '0', '0', '219', '1639473656', '217', '1645669673', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('82', '73', '435', 'VIETGREENLIFE', 'VIETGREENLIFE (Họa My)', '0934794002', '193 Cô Bắc , Phường Cô Giang , Quận 1 , Thành Phố Hồ Chí Minh', '70', '7100', '71190', '0', '', '', '0', '0', '0', '0', '0', '218', '1639559995', '217', '1645669629', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('83', '74', '436', 'Anek_Official Store', 'Anek', '0982496385', '54a Làng Tăng Phú , Phường Tăng Nhơn Phú A , Quận 9 , Thành Phố Hồ Chí Minh', '70', '7150', '71520', '0', '', '', '0', '0', '0', '0', '0', '217', '1639627075', '217', '1645669544', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('84', '72', '0', 'Minahi Tân Bình', 'Minahi', '02899957779', '40 Nguyễn Văn Mại , Phường Số 4 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73600', '0', '', '', '0', '0', '0', '0', '0', '185', '1640051045', '217', '1645669657', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('85', '75', '0', 'SaiGonHD Phú Nhuận', 'SaiGonHD', '0933252606', '122B Phan Đăng Lưu , Phường Số 3 , Quận Phú Nhuận , Thành Phố Hồ Chí Minh', '70', '7250', '72570', '0', '', '', '0', '0', '0', '0', '0', '217', '1640051780', '219', '1645523052', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('86', '76', '440', 'Lugbro', 'Anh Cường', '0896436336', '28/11 Huỳnh Đình Hai , Phường Số 24 , Quận Bình Thạnh , Thành Phố Hồ Chí Minh', '70', '7170', '71710', '0', '', '', '0', '0', '0', '0', '0', '217', '1640245859', '217', '1645669498', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('87', '77', '441', 'Cơ sở Thúy Lực', 'Cơ sở Thúy Lực', '0945621721', '107-Phạm Văn Ký-khóm5-phường2-Tp Cà Mau , Phường Số 2 , Thành phố Cà Mau , Tỉnh Cà Mau', '97', '9710', '97100', '0', '', '', '0', '0', '0', '0', '0', '218', '1640327911', '217', '1645669475', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('88', '78', '442', 'TomoyoVN', 'Anh Tín', '0909434575', '391a Nam Kỳ Khởi Nghĩa , Phường Võ Thị Sáu , Quận 3 , Thành Phố Hồ Chí Minh', '70', '7220', '97596', '0', '', '', '0', '0', '0', '0', '0', '217', '1640329175', '217', '1645669435', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('89', '79', '444', 'Phụ kiện Hira', 'Chị Yến', '0911504343', '11 Đường Số 23A , Phường Bình Trị Đông B , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76310', '0', '', '', '0', '0', '0', '0', '0', '217', '1640332172', '217', '1645669422', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('90', '80', '445', 'Gia Dụng Hira', 'Hira', '0902379900', '11 đường 23A , Phường Bình Trị Đông B , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76310', '0', '', '', '0', '0', '0', '0', '0', '217', '1640332521', '217', '1646633374', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('91', '81', '447', 'Chát Nuts And Tea', 'Chát Nuts And Tea (Hương)', '0814108478', '150 Đường Trần Não , Phường Bình An , Quận 2 , Thành Phố Hồ Chí Minh', '70', '7130', '71350', '0', '', '', '0', '0', '0', '0', '0', '218', '1640402170', '217', '1645669361', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('92', '82', '450', 'Photree', 'Chị Hằng', '0982631001', '838/40 Cách Mạng Tháng 8 , Phường 5 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73770', '0', '', '', '0', '0', '0', '0', '0', '217', '1640662315', '217', '1645669330', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('93', '83', '0', 'SP ONE_Đà Nẵng', 'SP ONE', '02363835566', '40A Hàm Nghi , Phường Thạc Gián , Quận Thanh Khê , Thành Phố Đà Nẵng', '55', '5542', '55511', '0', '', '', '0', '0', '0', '0', '0', '219', '1640673928', '217', '1645669316', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('94', '84', '452', 'WINCI_Hải Phòng', 'Winci Việt Nam', '0898754321', '1 Phố Phú Kê , Thị Trấn Tiên Lãng , Huyện Tiên Lãng , Thành Phố Hải Phòng', '18', '1856', '18560', '0', '', '', '0', '0', '0', '0', '0', '219', '1640678494', '217', '1645669301', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('95', '85', '457', 'Hưng Thịnh Phát', 'Hưng Thịnh Phát', '0333582582', 'thôn Tri Thủy , Xã Tri Thủy , Huyện Phú Xuyên , Thành Phố Hà Nội', '10', '1580', '15802', '0', '', '', '0', '0', '0', '0', '0', '219', '1641173733', '217', '1645669256', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('96', '86', '458', 'SUNRISE', 'Sunrise plus Việt Nam', '0933171568', '147/34 Đường số 15 , Phường Bình Hưng Hòa , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76200', '0', '', '', '0', '0', '0', '0', '0', '219', '1641270826', '217', '1645669218', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('97', '87', '459', 'TimexVN', 'Chị Vy', '0906607030', '74 Nguyễn Cơ Thạch , Phường An Lợi Đông , Quận 2 , Thành Phố Hồ Chí Minh', '70', '7130', '71390', '0', '', '', '0', '0', '0', '0', '0', '217', '1641272645', '217', '1645669152', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('98', '88', '460', 'Kalpen', 'Kalpen Việt Nam', '0901754147', 'A24.BT1 , Phường La Khê , Quận Hà Đông , Thành Phố Hà Nội', '10', '1510', '15226', '0', '', '', '0', '0', '0', '0', '0', '219', '1641276976', '217', '1645669138', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('99', '89', '461', 'CieloCeleste', 'Chị Thúy', '0938170669', '452 Tên Lửa , Phường Bình Trị Đông B , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76310', '0', '', '', '0', '0', '0', '0', '0', '217', '1641279142', '217', '1645669069', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('100', '90', '462', 'Minh Phúc', 'Minh Phúc', '0909900406', '23 Đường Hưng Hoá, Phường 6, Quận Tân Bình, Thành phố Hồ Chí Minh', '70', '7360', '73760', '2402225', '10.7857658', '106.6604572', '10.7857658', '106.6604572', '22', '0', '0', '218', '1641282790', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('101', '91', '463', 'Umo', 'Chị Khanh', '0906707173', '384/22b Phạm Văn Bạch , Phường 15 , Quận Tân Bình , Thành Phố Hồ Chí Minh', '70', '7360', '73690', '0', '', '', '0', '0', '0', '0', '0', '217', '1641374287', '217', '1646662666', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('102', '92', '467', 'Julia', 'Chị Hồng', '0972362775', '45b Gò Cát , Phường Phú Hữu , Quận 9 , Thành Phố Hồ Chí Minh', '70', '7150', '71620', '0', '', '', '0', '0', '0', '0', '0', '218', '1641521543', '217', '1645668975', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('103', '93', '471', 'Hira - Phụ Kiện Nhập Khẩu Cao Cấp', 'Chị Thủy', '0902379900', '11 Đường Số 23A , Phường Bình Trị Đông B , Quận Bình Tân , Thành Phố Hồ Chí Minh', '70', '7620', '76310', '0', '', '', '0', '0', '0', '0', '0', '217', '1641953983', '217', '1645668952', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('104', '94', '476', 'Escanté_Official Store', 'Escanté', '0982496385', '54a Làng Tăng Phú , Phường Tăng Nhơn Phú A , Quận 9 , Thành Phố Hồ Chí Minh', '70', '7150', '71520', '0', '', '', '0', '0', '0', '0', '0', '217', '1642403666', '217', '1645668721', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address (id, sell_id, sell_userid, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, centerlat, centerlng, maps_mapzoom, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('105', '95', '481', 'Vua Cua Food', 'Thiên Lý', '0973277958', '30 Vũ Huy Tấn , Phường Số 3 , Quận Bình Thạnh , Thành Phố Hồ Chí Minh', '70', '7170', '71820', '0', '', '', '0', '0', '0', '0', '0', '218', '1644570882', '217', '1645668705', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('1', '1', '1', '20', '150000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('2', '2', '2', '50', '250000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('3', '3', '3', '15', '70000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('4', '4', '4', '20', '120000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('5', '5', '5', '30', '120000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('6', '6', '6', '15', '180000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('7', '7', '7', '50', '50000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('8', '8', '11', '20', '80000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('9', '9', '10', '10', '90000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('10', '10', '9', '10', '95000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs (logid, wid, pro_id, quantity, price, money_unit) VALUES('11', '11', '8', '15', '50000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs_group (id, logid, listgroup, quantity, price, money_unit) VALUES('8', '8', '7,24,35', '20', '80000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs_group (id, logid, listgroup, quantity, price, money_unit) VALUES('9', '9', '7,16,33,51', '10', '90000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs_group (id, logid, listgroup, quantity, price, money_unit) VALUES('10', '10', '7,24,35,53', '10', '95000', 'VND')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('98', '1', '3', '2534464', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('99', '3', '3', '2534465', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('100', '4', '3', '2534466', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('101', '6', '3', '2534467', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('102', '7', '3', '2534468', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('103', '8', '3', '2534469', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('104', '9', '3', '2534470', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('105', '10', '3', '2534471', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('106', '11', '3', '2534472', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('107', '12', '3', '2534473', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('108', '13', '3', '2534474', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('109', '14', '3', '2534475', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('110', '15', '3', '2534476', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('111', '16', '3', '2534477', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('112', '17', '3', '2534478', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('113', '18', '3', '2535595', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('114', '19', '3', '2534480', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('115', '20', '3', '2547320', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('116', '21', '3', '2534482', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('117', '22', '3', '2534483', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('118', '23', '3', '2534484', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('119', '24', '3', '2534485', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('120', '25', '3', '2534486', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('121', '26', '3', '2534487', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('122', '27', '3', '2534488', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('123', '28', '3', '2534489', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('124', '29', '3', '2534490', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('125', '30', '3', '2534491', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('126', '31', '3', '2534492', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('127', '32', '3', '2534493', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('128', '33', '3', '2534494', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('129', '34', '3', '2534495', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('130', '35', '3', '2534496', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('131', '36', '3', '2534497', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('132', '37', '3', '2534498', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('133', '38', '3', '2534499', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('134', '39', '3', '2534500', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('135', '40', '3', '2534501', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('136', '41', '3', '2534502', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('137', '42', '3', '2534503', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('138', '53', '3', '2534504', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('139', '44', '3', '2534505', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('140', '52', '3', '2534506', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('141', '50', '3', '2534507', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('142', '51', '3', '2534508', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('143', '54', '3', '2534509', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('144', '55', '3', '2534510', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('145', '56', '3', '2534511', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('146', '57', '3', '2534512', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('147', '58', '3', '2534513', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('148', '59', '3', '2534514', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('149', '60', '3', '2534515', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('150', '61', '3', '2534516', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('151', '62', '3', '2534517', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('152', '63', '3', '2534518', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('153', '64', '3', '2534519', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('154', '65', '3', '2534520', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('155', '66', '3', '2534521', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('156', '67', '3', '2534522', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('157', '68', '3', '2534523', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('158', '69', '3', '2550245', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('159', '70', '3', '2534525', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('160', '71', '3', '2534526', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('161', '72', '3', '2534527', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('162', '73', '3', '2534528', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('163', '74', '3', '2534529', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('164', '75', '3', '2547319', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('165', '76', '3', '2534531', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('166', '77', '3', '2534532', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('167', '78', '3', '2550326', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('168', '79', '3', '2534534', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('169', '80', '3', '2534535', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('170', '81', '3', '2534536', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('171', '82', '3', '2534537', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('172', '83', '3', '2534538', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('173', '84', '3', '2534539', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('174', '85', '3', '2534540', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('175', '86', '3', '2534541', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('176', '87', '3', '2534542', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('177', '88', '3', '2534543', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('178', '89', '3', '2534544', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('179', '90', '3', '2561483', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('180', '91', '3', '2534546', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('181', '92', '3', '2534547', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('182', '93', '3', '2534548', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('183', '94', '3', '2534549', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('184', '95', '3', '2534550', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('185', '96', '3', '2534551', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('186', '97', '3', '2534552', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('187', '98', '3', '2534553', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('188', '99', '3', '2534554', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('189', '100', '3', '2534555', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('190', '101', '3', '2563347', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('191', '102', '3', '2534557', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('192', '103', '3', '2534558', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('193', '104', '3', '2534559', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport (id, warehouse_id, transportid_ecng, storeid_transport, time_add, status) VALUES('194', '105', '3', '2534560', '1645755605', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_weight_vi (id, code, title, exchange, round, status) VALUES('1', 'g', 'Gram', '1', '0.1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_weight_vi (id, code, title, exchange, round, status) VALUES('2', 'kg', 'Kilogam', '1000', '0.1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
