<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2021 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 17 Feb 2021 02:11:21 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('2', 'BIDV', 'Ngân hàng Đầu tư và Phát triển Việt Nam', '2', '1608544231', '1', '1608606280', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('5', 'ACB', 'Ngân hàng Á Châu', '1', '1608711886', '1', '1608711928', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank (bank_id, bank_code, name_bank, user_add, time_add, user_edit, time_edit, status, weight) VALUES('6', 'TPBank', 'Ngân hàng Tiên Phong', '1', '1608711896', '1', '1608711921', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block (id, title, keyword, description_block, bodytext, other, tag_title, tag_description, time_add, user_add, time_edit, user_edit, weight, status) VALUES('2', 'Sản phẩm mới', '', '', '', '1;https://tmscity.com/;/uploads/retails/block/489d2ca9560522c4c5c924e82f728f25.png.jpg|2;https://tmscity.com/;/uploads/retails/block/486270019b3fbe570fcdb30b676ba342.png.jpg|3;https://tmscity.com/;/uploads/retails/block/16bb22b569531a63bc64aa3018e30a6f.png.jpg', 'Sản phẩm mới', 'Sản phẩm mới', '1608714309', '2', '1613526133', '1', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('301', '2', '32')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('302', '2', '26')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('305', '2', '19')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('303', '2', '24')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('311', '2', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('310', '2', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('306', '2', '13')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('309', '2', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('307', '2', '12')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('308', '2', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('304', '2', '23')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('312', '2', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('317', '2', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('316', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('315', '2', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id (id, bid, product_id) VALUES('314', '2', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('3', 'CHANEL', '0', '1612234606', 'images-1.jpg', 'nội dung', '1', '1', 'chanel')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('4', 'DIOR', '0', '1612234614', 'tai-xuong-5.jpg', 'Mô tả', '1', '2', 'dior')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('5', 'HERMÈS', '1611806878', '1612234696', 'tai-xuong-2.png', '', '1', '3', 'hermes')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('6', 'BURBERRY', '1611806937', '1612234704', 'tai-xuong-1.png', '', '1', '4', 'burberry')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('7', 'GUCCI', '1611806943', '1612234711', 'images.png', '', '1', '5', 'gucci')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('8', 'VERSACE', '1611806950', '1612234717', 'images-1.png', '', '1', '6', 'versace')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('9', 'ASUS', '1612320511', '', 'tai-xuong-3.png', '', '1', '7', 'asus')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('10', 'VIVO', '1612320528', '', 'vivo-new-logo-2019.jpg', '', '1', '8', 'vivo')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('11', 'OPPO', '1612320539', '', 'logo-vuong.jpg', '', '1', '9', 'oppo')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('12', 'ACER', '1612320557', '', 'tai-xuong.png', '', '1', '10', 'acer')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('13', 'APPLE', '1612320572', '', 'iphone_logo.png', '', '1', '11', 'apple')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('14', 'XIAOMI', '1612320583', '', 'kisspng-xiaomi-mi-5-xiaomi-mi-6-xiaomi-redmi-xiaomi-mi-1-mini-5ab53c5e5c3890.8061910615218269103778.jpg', '', '1', '12', 'xiaomi')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('15', 'HP', '1612320596', '', 'logo-hp.png', '', '1', '13', 'hp')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('16', 'SAMSUNG', '1612320645', '', 'samsung-logo.jpeg', '', '1', '14', 'samsung')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('17', 'REALME', '1612322368', '', 'go-77-kjmb621x414alivemint.png', '', '1', '15', 'realme')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand (id, title, time_add, time_edit, logo, description, status, weight, alias) VALUES('18', '3CE', '1612516105', '', '2021_01/son-3ce-macaron-red.jpg', '', '1', '16', '3ce')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('2', 'Thời Trang Nam', 'thoi-trang-nam', '0', 'thời trang nam', 'cat/1612407759.png', '1;https://tmscity.com/admin/;/uploads/retails/cat/banner-ngang-1200x200px-dothucongmynghe.jpg|2;https://tmscity.com/admin/;/uploads/retails/cat/category-banner-winter-10-off-1200x200px.jpg', 'mô tả<br />
&nbsp;', '0', '6', '1', '0', '10', '0', '1', '1608714043', '1', '1613527439', '1', '1', '3|4|5|6|7|8', '1|2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('3', 'Thời Trang Nữ', 'Thoi-Trang-Nu', '0', '', 'icon_nav_5.png', '', '', '0', '6', '1', '1', '10', '0', '1', '1608714053', '3', '1612165437', '2', '1', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('4', 'Điện Thoại & Phụ Kiện', 'dien-thoai-phu-kien', '14', '', '800-300-800x300.png', '', 'Nội dung chi tiết', '0', '6', '1', '0', '10', '0', '1', '1608714057', '35', '1612365382', '3', '1', '9|10|11|12|13|14|15|16|17', '1|2|3|4|5|6|7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('5', 'Thiết Bị Điện Tử', 'thiet-bi-dien-tu', '14', '', '', '', '', '0', '6', '1', '1', '10', '0', '1', '1608714068', '35', '1612361969', '4', '1', '3|4|6|8|9|12', '1|2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('6', 'Máy tính & Laptop', 'may-tinh-laptop', '14', '', '', '', '', '0', '6', '1', '1', '10', '0', '1', '1608714088', '35', '1612361904', '5', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('10', 'Phụ Kiện Thời Trang', 'phu-kien-thoi-trang', '0', '', '1612413533.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '25', '1610348923', '3', '1612413545', '9', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('11', 'Mỹ Phẩm', 'my-pham', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349001', '41', '1612516164', '10', '1', '4|18', '1|3|6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('12', 'Trang Sức', 'trang-suc', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349030', '3', '1611796760', '11', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('13', 'Đồng Hồ | Mắt Kính', 'dong-ho-mat-kinh', '0', '', '1612413392.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '25', '1610349075', '3', '1612413402', '12', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('14', 'Điện thoại và phụ kiện', 'dien-thoai-va-phu-kien', '0', '', '800-300-800x300-1_1.png', '', '<img alt=\"\" height=\"376\" src=\"/uploads/retails/2021_01/cn1.png\" width=\"368\" />', '0', '6', '1', '0', '4', '0', '25', '1610349094', '3', '1612412501', '13', '1', '3|4|8|9|12|13|14|16|17', '1|2|3|4|6|7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('15', 'Nhà Cửa Và Đời Sống', 'nha-cua-va-doi-song', '0', '', '1612412956.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '25', '1610349116', '3', '1612412969', '14', '1', '3', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('16', 'Xe', 'xe', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349134', '3', '1611796795', '15', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('17', 'Dịch Vụ', 'dich-vu', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349148', '3', '1611796801', '16', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('18', 'Thực Phẩm Cao Cấp', 'thuc-pham-cao-cap', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349171', '3', '1611796808', '17', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('19', 'Bất Động Sản', 'bat-dong-san', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349216', '3', '1611796816', '18', '1', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('20', 'Thú Cưng', 'thu-cung', '0', '', '', '', '', '0', '6', '1', '1', '4', '0', '25', '1610349226', '3', '1611796823', '19', '1', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('28', 'Mẹ Và Bé', 'me-va-be', '0', 'mẹ và bé', '1612412807.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612412829', '', '', '24', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('22', 'Áo thun', 'ao-thun-nam', '2', 'trên', 'kisspng-handset-telephone-call-mobile-phones-voip-phone-tel-eacute-fono-5b46e70a322dc6.0346030415313733222055.jpg', '', 'ádsa', '2', '6', '1', '1', '4', '0', '3', '1611297556', '1', '1612418199', '20', '1', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('24', 'Sữa dưỡng ẩm', 'Sua-duong-am', '11', '', '', '', 'Nội dung', '2', '6', '1', '1', '4', '0', '3', '1611368408', '3', '1611377827', '21', '1', '3|4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('46', 'Áo sơ mi', 'ao-so-mi-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418208', '', '', '42', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('47', 'Áo khoác & Áo vest', 'ao-khoac-ao-vest-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418217', '', '', '43', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('29', 'Thiết Bị ĐiệnGia Dụng', 'thiet-bi-diengia-dung', '0', '', '1612413579.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612412897', '3', '1612413587', '25', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('26', 'Tablet', 'tablet', '14', '', 'iphone_logo.png', '', 'ewfads', '0', '6', '1', '1', '4', '0', '35', '1612362200', '', '', '22', '1', '3|6|7|8|9|13', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('27', 'Phụ Kiện', 'phu-kien', '14', '', '', '', 'dffadsc', '0', '6', '1', '1', '4', '0', '35', '1612362237', '', '', '23', '1', '3|6|8|13|14|16', '2|3|5|7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('30', 'Máy Tính & Laptop', 'may-tinh-laptop', '0', '', '1612413082.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413094', '', '', '26', '1', '9|12|13', '1|2|3|4|5|6|7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('31', 'Sức Khỏe Và Sắc Đẹp', 'suc-khoe-va-sac-dep', '0', 'sức khỏe và sắc đẹp', '1612413178.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413188', '', '', '27', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('32', 'Máy Ảnh - Máy Quay Phim', 'may-anh-may-quay-phim', '0', 'Máy Ảnh - Máy Quay Phim', '1612413258.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413269', '', '', '28', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('33', 'Giày Dép Nữ', 'giay-dep-nu', '0', '', '1612413323.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413342', '', '', '29', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('34', 'Túi Ví', 'tui-vi', '0', '', '1612413440.png', '', 'Nội dun chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413447', '', '', '30', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('35', 'Giày Dép Nam', 'giay-dep-nam', '0', 'Giày Dép Nam', '1612413489.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413503', '', '', '31', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('36', 'Bách Hóa Online', 'bach-hoa-online', '0', 'Bách Hóa Online', '1612413650.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413659', '', '', '32', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('37', 'Thể Thao & Du Lịch', 'the-thao-du-lich', '0', 'Thể Thao & Du Lịch', '1612413709.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413717', '', '', '33', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('38', 'Voucher Và Dịch Vụ', 'voucher-va-dich-vu', '0', 'Voucher Và Dịch Vụ', '1612413766.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413779', '', '', '34', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('39', 'Ô Tô - Xe Máy - Xe Đạp', 'o-to-xe-may-xe-dap', '0', 'Ô Tô - Xe Máy - Xe Đạp', '1612413839.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413852', '', '', '35', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('40', 'Nhà Sách Online', 'nha-sach-online', '0', 'Nhà Sách Online', '1612413944.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413953', '', '', '36', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('41', 'Đồ Chơi', 'do-choi', '0', 'Đồ Chơi', '1612413987.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612413995', '', '', '37', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('42', 'Giặt Giũ & Chăm Sóc Nhà Cửa', 'giat-giu-cham-soc-nha-cua', '0', 'Giặt Giũ & Chăm Sóc Nhà Cửa', '1612414065.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612414073', '', '', '38', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('43', 'Chăm Sóc Thú Cưng', 'cham-soc-thu-cung', '0', 'Chăm Sóc Thú Cưng', '1612414110.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612414119', '', '', '39', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('44', 'Thời Trang Trẻ Em', 'thoi-trang-tre-em', '0', 'Thời Trang Trẻ Em', '1612414157.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612414165', '', '', '40', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('45', 'Sản Phẩm Khác', 'san-pham-khac', '0', 'Sản Phẩm Khác', '1612414211.png', '', 'Nội dung chi tiết', '0', '6', '1', '1', '4', '0', '3', '1612414218', '', '', '41', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('48', 'Áo nỉ/ Áo len', 'ao-ni-ao-len-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418225', '', '', '44', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('49', 'Đồ bộ/ Đồ mặc nhà', 'do-bo-do-mac-nha-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418231', '', '', '45', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('50', 'Đồ đôi', 'do-doi-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418237', '', '', '46', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('51', 'Quần', 'quan-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418244', '', '', '47', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('52', 'Balo/ Túi/ Ví', 'balo-tui-vi-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418250', '', '', '48', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('53', 'Mắt kính', 'mat-kinh-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418256', '', '', '49', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('54', 'Phụ kiện nam', 'phu-kien-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418264', '', '', '50', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('55', 'Đồ Trung Niên', 'do-nam-trung-nien', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418271', '', '', '51', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('56', 'Trang Sức Nam', 'trang-suc-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418276', '', '', '52', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('57', 'Thắt Lưng', 'that-lung-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418282', '', '', '53', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories (id, name, alias, parrent_id, keyword, image, other_image, description, viewdescriptionhtml, groups_view, inhome, viewcat, numlinks, idsite, user_add, time_add, user_edit, time_edit, weight, status, brand, origin) VALUES('58', 'Đồ lót', 'do-lot-nam', '2', '', '', '', '', '0', '6', '1', '1', '4', '0', '1', '1612418289', '', '', '54', '1', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('6', 'Quần nam', '7', '1', '1611307977', '1612250691', '34', 'quan-nam-shop', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('3', 'dv fsv ds', '1', '1', '1611289902', '', '34', 'dv-fsv-dsds', '1', 'mô tả', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('5', 'Áo nam', '6', '1', '1611298386', '1612250924', '34', 'ao-nam-shop', '0', 'mô tả', '/iphone-mini-do-new-600x600-600x600.jpg')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('4', 'Hàng mới về', '2', '1', '1611291076', '', '36', 'Hang-moi-ve', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('7', 'Quần nữ', '8', '1', '1611307983', '', '34', 'Quan-nu', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('8', 'Áo nữ', '9', '1', '1611307997', '', '34', 'Ao-nu', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('9', 'Giày nam', '10', '1', '1611308008', '', '34', 'Giay-nam', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('10', 'Thời trang nam', '3', '1', '1611308045', '', '36', 'Thoi-trang-nam_shop', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('11', 'Thời trang nữ', '4', '1', '1611308052', '', '36', 'Thoi-trang-nu', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('12', 'Thời trang mùa xuân', '5', '1', '1611308058', '', '36', 'Thoi-trang-mua-xuan', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('13', 'Thời trang mùa hè', '11', '1', '1611308065', '', '36', 'Thoi-trang-mua-he', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('14', 'Thời trang mùa đông', '12', '1', '1611308071', '', '36', 'Thoi-trang-mua-dong', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('15', 'Thời trang mùa thu', '13', '1', '1611308081', '', '36', 'Thoi-trang-mua-thu', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('17', 'tên bài viết', '14', '1', '1612163285', '', '27', 'tenbaivietshop', '0', 'sadsad', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('18', 'Điện thoại', '15', '1', '1612323787', '', '38', 'dien-thoai-shop', '0', 'mô tả', '/logo vuong.jpg')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop (id, title, weight, status, time_add, time_edit, id_shop, alias, parentid, description, image) VALUES('19', 'máy điện tử', '16', '1', '1612495279', '', '38', 'may-dien-tu-shop', '0', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('9', '1', '7', '1611287896')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('14', '2', '7', '1611289885')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('17', '4', '9', '1611291599')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('18', '4', '10', '1611291693')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('21', '5', '8', '1611298989')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('22', '5', '7', '1611298991')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('23', '5', '11', '1611298993')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('24', '10', '9', '1611367703')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('25', '10', '14', '1611367777')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('26', '10', '17', '1611367779')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('27', '10', '19', '1611367782')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('28', '10', '15', '1611367786')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('29', '10', '16', '1611367787')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('30', '13', '13', '1611367800')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('31', '13', '16', '1611367801')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('32', '13', '18', '1611367802')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('33', '13', '14', '1611367803')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('34', '13', '10', '1611367805')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('35', '13', '17', '1611367806')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('36', '15', '9', '1611367812')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('37', '15', '10', '1611367813')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('38', '15', '14', '1611367815')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('39', '15', '16', '1611367816')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('40', '15', '18', '1611367818')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('41', '15', '15', '1611367819')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('42', '15', '13', '1611367821')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('43', '15', '17', '1611367822')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('44', '15', '19', '1611367824')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('45', '13', '20', '1611368500')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('46', '14', '10', '1611369556')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('47', '14', '14', '1611369558')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('48', '14', '18', '1611369561')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('49', '14', '15', '1611369562')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('50', '14', '17', '1611369564')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('51', '16', '1', '1612162284')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('52', '16', '4', '1612162289')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('53', '16', '6', '1612162291')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('54', '16', '5', '1612162292')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('55', '16', '2', '1612162294')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('56', '16', '3', '1612162295')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('57', '16', '12', '1612162298')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('58', '17', '2', '1612163308')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('59', '17', '3', '1612163310')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('60', '17', '6', '1612163312')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('61', '17', '4', '1612163313')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('62', '17', '5', '1612163315')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('63', '17', '12', '1612163316')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('64', '18', '25', '1612323792')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('65', '18', '26', '1612323793')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('66', '18', '27', '1612323794')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('67', '18', '29', '1612323795')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('68', '18', '30', '1612323796')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('69', '18', '28', '1612323797')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('70', '18', '32', '1612323798')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('71', '18', '31', '1612323799')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('72', '19', '25', '1612495284')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('73', '19', '28', '1612495286')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('74', '19', '29', '1612495287')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item (id, id_category_shop, product_id, time_add) VALUES('75', '19', '30', '1612495288')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('34', '10', '1612323855', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('33', '8', '1612230101', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('28', '1', '1611301443', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('32', '9', '1611890520', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('35', '1', '1612423302', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('36', '10', '1612423315', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow (id, shop_id, time_add, user_id) VALUES('38', '9', '1612488746', '39')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('1', '1', '1', '4', '28', '30', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('2', '1', '1', '4', '29', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('3', '1', '1', '4', '30', '22', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('4', '1', '1', '3', '16', '97', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('5', '1', '1', '3', '19', '96', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('6', '1', '1', '3', '22', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('7', '1', '1', '3', '17', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('8', '1', '1', '3', '20', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('9', '1', '1', '3', '23', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('10', '1', '1', '3', '18', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('11', '1', '1', '3', '21', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('12', '1', '1', '3', '24', '99', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('13', '1', '1', '3', '25', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('14', '1', '1', '3', '26', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('15', '1', '1', '3', '27', '50', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('16', '1', '1', '2', '9', '15', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('17', '1', '1', '2', '10', '0', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('18', '1', '1', '2', '11', '22', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('19', '1', '1', '2', '12', '25', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('20', '1', '1', '5', '31', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('21', '1', '1', '5', '33', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('22', '1', '1', '5', '32', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('23', '1', '1', '5', '34', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('25', '1', '1', '6', '0', '95', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('26', '8', '5', '8', '38', '6', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('27', '8', '5', '8', '39', '5', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('28', '8', '5', '7', '35', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('29', '8', '5', '7', '36', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('30', '8', '5', '7', '37', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('31', '1', '2', '2', '9', '13', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('32', '1', '2', '2', '10', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('33', '1', '2', '2', '11', '12', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('34', '1', '2', '2', '12', '14', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('35', '1', '1', '1', '3', '2', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('36', '1', '1', '1', '4', '3', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('37', '1', '1', '1', '5', '14', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('38', '1', '1', '1', '6', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('39', '9', '6', '10', '0', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('40', '9', '6', '9', '0', '111', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('41', '8', '5', '11', '40', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('42', '9', '6', '19', '0', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('43', '9', '6', '18', '0', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('44', '9', '6', '17', '0', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('45', '9', '6', '16', '0', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('46', '9', '6', '15', '0', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('47', '9', '6', '14', '0', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('48', '9', '6', '13', '41', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('49', '10', '7', '27', '42', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('50', '10', '7', '27', '43', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('51', '10', '7', '27', '44', '15', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('52', '10', '7', '26', '0', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('53', '10', '7', '25', '0', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('54', '10', '7', '28', '0', '15', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('55', '10', '7', '32', '0', '100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('56', '10', '7', '31', '0', '1', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('57', '9', '6', '34', '45', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('58', '9', '6', '34', '46', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('59', '9', '6', '34', '47', '10', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('60', '14', '9', '35', '0', '99', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('61', '14', '10', '35', '0', '1100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product (id, store_id, warehouse_id, product_id, classify_value_product_id, amount, amount_delivery) VALUES('62', '14', '11', '35', '0', '1100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('1', '1', '-1', 'Đơn hàng mới được khởi tạo', '1610786452', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('2', '1', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1610786527', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('3', '2', '-1', 'Đơn hàng mới được khởi tạo', '1610786980', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('4', '3', '-1', 'Đơn hàng mới được khởi tạo', '1610953156', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('5', '3', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1610955817', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('6', '4', '-1', 'Đơn hàng mới được khởi tạo', '1610958955', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('7', '5', '-1', 'Đơn hàng mới được khởi tạo', '1610959036', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('8', '6', '-1', 'Đơn hàng mới được khởi tạo', '1610964422', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('9', '7', '-1', 'Đơn hàng mới được khởi tạo', '1610964805', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('10', '8', '-1', 'Đơn hàng mới được khởi tạo', '1611192703', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('11', '8', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1611192822', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('12', '9', '-1', 'Đơn hàng mới được khởi tạo', '1611214882', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('13', '10', '-1', 'Đơn hàng mới được khởi tạo', '1611214942', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('14', '10', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1611214958', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('15', '11', '-1', 'Đơn hàng mới được khởi tạo', '1611216272', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('16', '12', '-1', 'Đơn hàng mới được khởi tạo', '1611623898', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('17', '13', '-1', 'Đơn hàng mới được khởi tạo', '1611623955', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('18', '14', '-1', 'Đơn hàng mới được khởi tạo', '1612148696', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('19', '15', '-1', 'Đơn hàng mới được khởi tạo', '1612335389', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('20', '16', '-1', 'Đơn hàng mới được khởi tạo', '1612336504', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('21', '17', '-1', 'Đơn hàng mới được khởi tạo', '1612336504', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('22', '18', '-1', 'Đơn hàng mới được khởi tạo', '1612336500', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('23', '19', '-1', 'Đơn hàng mới được khởi tạo', '1612337305', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('24', '20', '-1', 'Đơn hàng mới được khởi tạo', '1612406193', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('25', '21', '-1', 'Đơn hàng mới được khởi tạo', '1612409236', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('26', '20', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612410015', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('27', '20', '1', 'Chuyển sang đơn vị vận chuyển VNPOST Thành Công', '1612410195', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('28', '20', '2', 'Đơn hàng chuyển sang trạng thái thành công', '1612410209', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('29', '21', '0', 'thích thì hủy à', '1612410334', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('30', '22', '-1', 'Đơn hàng mới được khởi tạo', '1612421171', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('31', '14', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612421200', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('32', '14', '1', 'Chuyển sang đơn vị vận chuyển VNPOST Thành Công', '1612421219', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('33', '14', '2', 'Đơn hàng chuyển sang trạng thái thành công', '1612421239', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('34', '22', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612421300', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('35', '22', '1', 'Chuyển sang đơn vị vận chuyển VNPOST Thành Công', '1612421310', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('36', '22', '2', 'Đơn hàng chuyển sang trạng thái thành công', '1612421319', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('37', '23', '-1', 'Đơn hàng mới được khởi tạo', '1612422805', '42')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('38', '23', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612422840', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('39', '23', '1', 'Chuyển sang đơn vị vận chuyển VNPOST Thành Công', '1612422858', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('40', '23', '2', 'Đơn hàng chuyển sang trạng thái thành công', '1612422874', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('41', '18', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612433707', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('42', '17', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612433710', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('43', '24', '-1', 'Đơn hàng mới được khởi tạo', '1612489006', '39')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('44', '24', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612489081', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('45', '25', '-1', 'Đơn hàng mới được khởi tạo', '1612496568', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('46', '26', '-1', 'Đơn hàng mới được khởi tạo', '1612513981', '47')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('47', '26', '0', 'Đơn hàng chuyển sang trạng thái đã xác nhận', '1612514004', '41')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('48', '27', '-1', 'Đơn hàng mới được khởi tạo', '1612516014', '47')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('49', '28', '-1', 'Đơn hàng mới được khởi tạo', '1612516434', '47')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order (id, order_id, status_id_old, content, time_add, user_add) VALUES('50', '29', '-1', 'Đơn hàng mới được khởi tạo', '1612517408', '47')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('1', '2', 'DHT00001', '1', '1', 'Thạch Cảnh Bình', 'bnhthach@gmail.com', '0374973039', '70', '7220', '72310', '12515', '10.7843695', '106.6844089', '5', '300000', '30', '20', '20', '20', '0', '0', '28325', '', '328325', '', '', '1610786452', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('2', '1', 'DHT00002', '1', '1', 'hfghfghfg', 'info@tms.vn', '45545654645', '10', '1424', '15345', 'fdfdgfd', '21.1267377', '105.6405425', '5', '1000000', '90', '60', '60', '60', '0', '0', '257733', '', '1257733', '', '', '1610786980', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('3', '2', 'DHT00003', '1', '1', 'Thạch Cảnh Bình', 'bnhthach@gmail.com', '0374973039', '70', '7270', '72710', '12515', '10.8265313', '106.694403', '5', '20000000', '150', '100', '100', '100', '0', '0', '552985', '', '20552985', '', '', '1610953156', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('4', '2', 'DHT00004', '1', '1', 'Thạch Cảnh Bình', 'bnhthach@gmail.com', '0374973039', '70', '7270', '72710', '12515', '10.8265313', '106.694403', '5', '500000', '150', '100', '100', '100', '0', '0', '552985', '', '1052985', '', '', '1610958955', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('5', '2', 'DHT00005', '1', '1', 'Thạch Cảnh Bình', 'thanhdat010797@gmail.com', '0374973039', '70', '7270', '72710', '12515', '10.8265313', '106.694403', '5', '300000', '90', '60', '60', '60', '0', '0', '151897', '', '451897', '', '', '1610959036', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('6', '2', 'DHT00006', '1', '1', 'Thạch Cảnh Bình', 'bnhthach@gmail.com', '0374973039', '10', '1424', '15346', '12515', '21.1262106', '105.6676471', '5', '400000', '30', '20', '20', '20', '0', '0', '29772', '', '429772', '', '', '1610964422', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('7', '0', 'DHT00007', '1', '1', 'phan nanh', 'info@tms.vn', '0904999955', '70', '7200', '72070', 'dsfsdfsd', '10.8436489', '106.7410077', '5', '1250000', '60', '40', '40', '40', '0', '0', '28325', '', '1278325', '', '', '1610964805', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('8', '3', 'DHT00008', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '03746583746', '17', '1731', '17327', 'địa điểm xây dựng', '20.9085344', '106.5191845', '5', '210000', '90', '60', '60', '60', '0', '0', '285956', '', '495956', '', '', '1611192703', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('9', '1', 'DHT00009', '1', '1', 'dsfdsf', 'info@tms.vn', '23432423423', '10', '1424', '15345', '1111', '21.1342209', '105.6441852', '5', '70000', '30', '20', '20', '20', '0', '0', '29772', '', '99772', '', '', '1611214882', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('10', '1', 'DHT000010', '1', '1', 'dfsdf', 'info@tms.vn', '4234234', '10', '1240', '12410', 'dsfdsfsdf', '21.0894575', '105.7949008', '5', '140000', '60', '40', '40', '40', '168325', '1', '28325', '', '168325', '', '', '1611214942', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('11', '3', 'DHT000011', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '10', '1240', '12410', 'địa chỉ', '21.0838905', '105.8084823', '5', '80000', '60', '40', '40', '40', '0', '0', '28325', '', '108325', '', '', '1611216272', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('12', '3', 'DHT000012', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '17', '1731', '17327', 'địa chỉ', '20.9094037', '106.5186355', '5', '70000', '30', '20', '20', '20', '0', '0', '30496', '', '100496', '', '', '1611623898', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('13', '3', 'DHT000013', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '17', '1731', '17327', 'địa chỉ', '20.9094037', '106.5186355', '5', '410000', '60', '40', '40', '40', '0', '0', '30496', '', '440496', '', '', '1611623955', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('14', '0', 'DHT000014', '1', '1', 'aeda', 'vfsdai13@gmail.com', '0564321326', '70', '7200', '72070', '343A Lũy Bán Bích, 17 Bạch Đằng', '10.8027429', '106.7109623', '5', '140000', '60', '40', '40', '40', '0', '0', '28325', 'CA495066399VN', '168325', '', '', '1612148696', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('15', '3', 'DHT000015', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '22', '2210', '22134', 'địa chỉ', '21.1725674', '106.0316898', '4', '10000', '30', '20', '20', '20', '0', '0', '93833', '', '103833', '', '', '1612335389', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('16', '3', 'DHT000016', '10', '7', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '16', '1622', '16226', 'địa chỉ', '20.7939182', '106.0552006', '5', '4200000', '250', '3', '3', '45', '0', '0', '32667', '', '4232667', '', '', '1612336504', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('17', '3', 'DHT000017', '10', '7', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '16', '1622', '16226', 'địa chỉ', '20.7939182', '106.0552006', '5', '4200000', '250', '3', '3', '45', '0', '0', '32667', '', '4232667', '', '', '1612336504', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('18', '3', 'DHT000018', '10', '7', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '16', '1622', '16226', 'địa chỉ', '20.7939182', '106.0552006', '5', '4200000', '250', '3', '3', '45', '0', '0', '32667', '', '4232667', '', '', '1612336500', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('19', '38', 'DHT000019', '1', '1', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '16', '1632', '16323', 'địa chỉ', '20.9679626', '106.0816536', '5', '10000', '30', '20', '20', '20', '0', '0', '30496', '', '40496', '', '', '1612337305', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('20', '0', 'DHT000020', '1', '1', 'Thanh Cao', 'thanhcao.laka@gmail.com', '0355020828', '70', '7360', '73600', '99A Cộng Hòa', '10.8010004', '106.6547471', '5', '10000', '30', '20', '20', '20', '0', '0', '28325', 'CA495029056VN', '38325', 'test thôi nha', '', '1612406193', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('21', '0', 'DHT000021', '1', '1', 'rftdf', '', 'fcgcfvb', '16', '1632', '16325', 'fffffffn', '20.9190334', '106.0787142', '5', '45000000', '1500', '1000', '1000', '1000', '0', '0', '1085579970', '', '1130579970', '', '', '1612409236', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('22', '41', 'DHT000022', '1', '1', 'fdgdfg', 'dfgdfg@gmail.com', '0904999955', '16', '1622', '16242', '1111', '20.7408801', '106.0346285', '5', '70000', '30', '20', '20', '20', '0', '0', '30496', 'M', '100496', '', '', '1612421171', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('23', '42', 'DHT000023', '1', '1', 'dmc', '', 'kmc', '10', '1200', '12010', 'yhd6je', '21.0006046', '105.8158204', '5', '50000', '150', '100', '100', '100', '0', '0', '862955', 'CA495074276VN', '912955', '', '', '1612422805', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('24', '39', 'DHT000024', '1', '1', 'aeda', 'vfsdai13@gmail.com', '0564321326', '17', '1761', '17620', '343A Lũy Bán Bích, 17 Bạch Đằng', '20.7869238', '106.3081194', '5', '280000', '120', '80', '80', '80', '0', '0', '611614', '', '891614', 'giao sớm nhé', '', '1612489006', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('25', '3', 'DHT000025', '10', '7', 'thạch cảnh bình', 'thachcanhbinh@gmail.com', '0384756475', '18', '1853', '18553', 'địa chỉ', '20.7563321', '106.6202887', '2', '18000000', '200', '3', '3', '45', '0', '0', '150000', '', '18150000', '', '', '1612496568', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('26', '47', 'DHT000026', '1', '2', 'Jaisy', 'baotran112381@gmail.com', '0365789456', '10', '1424', '15345', '99', '21.1342209', '105.6441852', '4', '10000', '30', '20', '20', '20', '0', '0', '102578', '', '112578', 'hggjh', '', '1612513981', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('27', '47', 'DHT000027', '1', '1', 'Jaisy', 'baotran112381@gmail.com', '0365789456', '10', '1424', '15346', '88', '21.1251559', '105.6614372', '4', '20000', '60', '40', '40', '40', '0', '0', '391775', '', '411775', '\p==-', '', '1612516014', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('28', '47', 'DHT000028', '1', '1', 'iolpoui9p', 'poipul', 'iuolyuip', '16', '1622', '16241', ';ok;p', '20.7143649', '106.0698963', '5', '10000', '300', '20', '20', '20', '0', '0', '37009', '', '47009', '', '', '1612516434', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order (id, userid, order_code, store_id, warehouse_id, order_name, email, phone, province_id, district_id, ward_id, address, lat, lng, transporters_id, total_product, total_weight, total_height, total_width, total_length, payment, payment_method, fee_transport, shipping_code, total, note, link_check_ahamove_order, time_add, status) VALUES('29', '47', 'DHT000029', '14', '9', 'kjjh', 'uhjkiyhj', 'jhmkgh', '17', '1731', '17330', 'lkj', '20.8801054', '106.5225621', '2', '500000', '15', '5', '5', '20', '0', '0', '45000', '', '545000', '', '', '1612517408', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('1', '1', '3', '30', '20', '20', '20', '300000', '16', '1', '300000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('2', '2', '3', '60', '40', '40', '40', '300000', '16', '2', '600000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('3', '2', '3', '30', '20', '20', '20', '400000', '19', '1', '400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('4', '3', '6', '150', '100', '100', '100', '4000000', '0', '5', '20000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('5', '4', '2', '150', '100', '100', '100', '100000', '9', '5', '500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('6', '5', '2', '90', '60', '60', '60', '100000', '9', '3', '300000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('7', '6', '3', '30', '20', '20', '20', '400000', '19', '1', '400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('8', '7', '3', '30', '20', '20', '20', '400000', '19', '1', '400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('9', '7', '3', '30', '20', '20', '20', '850000', '24', '1', '850000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('10', '8', '1', '90', '60', '60', '60', '70000', '3', '3', '210000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('11', '9', '1', '30', '20', '20', '20', '70000', '4', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('12', '10', '1', '30', '20', '20', '20', '70000', '4', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('13', '10', '1', '30', '20', '20', '20', '70000', '6', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('14', '11', '1', '30', '20', '20', '20', '70000', '3', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('15', '11', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('16', '12', '1', '30', '20', '20', '20', '70000', '4', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('17', '13', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('18', '13', '3', '30', '20', '20', '20', '400000', '19', '1', '400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('19', '14', '1', '60', '40', '40', '40', '70000', '4', '2', '140000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('20', '15', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('21', '16', '27', '250', '45', '3', '3', '4200000', '42', '1', '4200000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('22', '19', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('23', '20', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('24', '21', '3', '1500', '1000', '1000', '1000', '900000', '21', '50', '45000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('25', '22', '1', '30', '20', '20', '20', '70000', '3', '1', '70000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('26', '23', '2', '150', '100', '100', '100', '10000', '10', '5', '50000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('27', '24', '1', '120', '80', '80', '80', '70000', '4', '4', '280000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('28', '25', '25', '200', '45', '3', '3', '18000000', '0', '1', '18000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('29', '26', '2', '30', '20', '20', '20', '10000', '10', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('30', '27', '2', '60', '40', '40', '40', '10000', '10', '2', '20000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('31', '28', '4', '300', '20', '20', '20', '10000', '29', '1', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item (id, order_id, product_id, weight, length, height, width, price, classify_value_product_id, quantity, total) VALUES('32', '29', '35', '15', '20', '5', '5', '500000', '0', '1', '500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('1', 'Hàn Quốc', 'sdfsdf', '1610678143', '1611743209', '1', '1', 'Han-Quoc')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('2', 'Mỹ', '', '1610678148', '1611743213', '2', '1', 'My')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('3', 'Nhật', '', '1611742903', '1611796669', '3', '1', 'nhat')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('4', 'Việt Nam', '', '1612320819', '', '4', '1', 'viet-nam')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('5', 'Ấn Độ', '', '1612320828', '', '5', '1', 'an-do')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('6', 'Anh', '', '1612320835', '', '6', '1', 'anh')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin (id, title, description, time_add, time_edit, weight, status, alias) VALUES('7', 'Trung Quốc', '', '1612321221', '', '7', '1', 'trung-quoc')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('1', '1', 'SP488094925', 'Sản phẩm test thứ nhất', 'San-pham-test-thu-nhat', '2', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2021_01/iphone-12-trang-new-600x600-600x600.jpg', '2020_12/Dong-Ho-Candycat-Sppors-Nam-Nu-1.jpg', 'sss', 'sss', '', 'Sản phẩm test thứ nhất', 'Sản phẩm test thứ nhất', '1', '1', '1', '278', '60000', '70000', '1610769709', '2', '1612406424', '3', '1', '1', '3', '3', '1', '0', '0', '2', '0', '0', '0', '60000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('2', '1', 'SP046639953', 'Sản phẩm test thứ hai', 'San-pham-test-thu-hai', '2', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2021_01/thong-minh-hoa-tiet-hoat-hinh-cho-be.svg', '', 'sssss', 'sssss', '', 'Sản phẩm test thứ nhất', 'Sản phẩm test thứ nhất', '1', '1', '1', '556', '10000', '100000', '1610770301', '2', '1612406416', '3', '2', '1', '6', '3', '1', '0', '0', '4', '55', '0', '0', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('3', '1', 'SP689240878', 'Sản phẩm test thứ nhất', 'San-pham-test-thu-nhat', '2', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2020_12/28361a2feebb14e54daa_1.jpg', '', 'sss', 'ssss', '', '', '', '1', '1', '1', '351', '200000', '900000', '1610771600', '2', '1612406408', '3', '3', '1', '0', '3', '1', '0', '0', '0', '0', '0', '0', '200000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('4', '1', 'SP954426930', 'Sản phẩm test thứ nhất', 'San-pham-test-thu-nhat', '2', '4', '2', '300', '20', '20', '20', '1', '1', '1', '2020_12/Dong-Ho-Candycat-Sppors-Nam-Nu.jpg', '2020_12/Dong-Ho-Candycat-Sppors-Nam-Nu-1.jpg ,2020_12/do-choi-vit-con-boi-duoi-nuoc-2.jpg', 'ssssssssssss', 'ssssssssssssss', '', '', '', '1', '1', '1', '144', '10000', '100000', '1610772237', '2', '1612516404', '41', '4', '1', '0', '3', '1', '0', '0', '0', '0', '0', '0', '10000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('5', '1', 'SP912159336', 'Sản phẩm mới test', 'San-pham-moi-test', '3', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2021_01/233501.jpg', '2021_01/22901.jpg ,2021_01/05326.jpg', 'ssssss', 'sssss', '', 'Sản phẩm test thứ nhất', 'Sản phẩm test thứ nhất', '1', '1', '1', '28', '50000', '500000', '1610939224', '27', '1612406384', '3', '5', '1', '0', '3', '1', '0', '0', '0', '0', '0', '0', '50000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('6', '1', 'SP128807043', 'Sản phẩm Không có phân loại', 'San-pham-Khong-co-phan-loai', '2', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2021_01/thong-minh-hoa-tiet-hoat-hinh-cho-be.svg', '', 'ssss', 'sssss', '', 'Sản phẩm test thứ nhất', 'Sản phẩm test thứ nhất', '0', '1', '1', '57', '0', '0', '1610945198', '2', '1612406376', '3', '6', '1', '0', '4', '1', '5000000', '4000000', '0', '0', '0', '0', '4000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('7', '8', 'SP798288392', 'dgfsgfdgfd', 'dgfsgfdgfd', '5', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/anh-anime-phong-canh-dep_093817122.jpg', '', 'fdgsfgsfdgfd', 'sadd', '', '', '', '1', '1', '1', '53', '300000', '300000', '1611134088', '34', '1612406368', '3', '7', '1', '0', '4', '1', '435435', '3445', '2.5', '0', '0', '0', '3445')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('8', '8', 'SP261238998', 'Gương soi toàn thân', 'Guong-soi-toan-than', '15', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/vung kinh te.jpeg', '2021_01/n6-MDJP.jpg ,2021_01/1f93c19676ef2ad80f17ee5c228d8559.png', 'hgcgh', 'fdvgf', '', '', '', '1', '1', '1', '39', '200000', '200000', '1611134273', '34', '1612406358', '3', '8', '1', '0', '3', '2', '34535435', '23442', '0', '0', '0', '0', '23442')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('9', '9', 'SP503072187', 'Điện thoại iPhone 12 mini 64GB', 'Dien-thoai-iPhone-12-mini-64GB', '2', '4', '2', '100', '11', '11', '11', '1', '1', '1', '2021_01/samsung-galaxy-s205-1.jpg', '', '<div dir=\"ltr\" id=\"docs-internal-guid-3e10861b-7fff-16ed-2752-ebfada7a01dd\">iPhone 12 Mini&nbsp;64 GB&nbsp;tuy là phiên bản thấp nhất trong bộ 4&nbsp;iPhone 12&nbsp;vừa mới được ra mắt cách đây không lâu, nhưng vẫn sở hữu những ưu điểm vượt trội về kích thước nhỏ gọn, tiện lợi, hiệu năng đỉnh cao, tính năng sạc nhanh cùng bộ camera chất lượng cao.</div>', '<h3 dir=\"ltr\">Thiết kế sang trọng, cao cấp</h3>

<p dir=\"ltr\">Điểm nhấn đầu tiên phải kể đến ở dòng máy này chính là viền máy không còn được thiết kế bo cong các cạnh, mà thay vào đó là phần cạnh máy được vát phẳng vô cùng mạnh mẽ và cá tính.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055121-085135.jpg\"><img alt=\"iPhone 12 Mini 64 GB | Thiết kế sang trọng, tỉ mỉ\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085135.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085135.jpg\" title=\"iPhone 12 Mini 64 GB | Thiết kế sang trọng, tỉ mỉ\" /></a></p>

<p dir=\"ltr\">Lần đầu tiên&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\" title=\"Tham khảo thêm các dòng sản phẩm Apple\">Apple</a>&nbsp;sử dụng khung nhôm cao cấp trong ngành hàng không vũ trụ trên iPhone 12 Mini đem đến cho người dùng thiết kế cứng cáp nhưng trọng lượng không quá nặng.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-050121-090102.jpg\"><img alt=\"iPhone 12 Mini 64GB | Khung nhôm cao cấp từ ngành hàng không\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-050121-090102.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-050121-090102.jpg\" title=\"iPhone 12 Mini 64GB | Khung nhôm cao cấp từ ngành hàng không\" /></a></p>

<p dir=\"ltr\">Máy nổi bật với hệ thống camera hình vuông độc đáo, kết hợp cùng mặt lưng bằng kính bóng bẩy cho cảm giác cầm nắm vô cùng thích.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064320-074303.jpg\"><img alt=\"iPhone 12 Mini 64GB | Mặt lưng bóng bẩy, nhiều màu sắc chọn lựa\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074303.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074303.jpg\" title=\"iPhone 12 Mini 64GB | Mặt lưng bóng bẩy, nhiều màu sắc chọn lựa\" /></a></p>

<p dir=\"ltr\">Ngoài ra, iPhone 12 Mini cũng đem tới cho người dùng nhiều màu sắc cho bạn tha hồ lựa chọn. Đặc biệt, Apple vừa bổ sung màu xanh dương vốn tươi tắn nhẹ nhàng nổi bật để lôi kéo sự chú ý, là một sự lựa chọn mới mẻ ấn tượng ngay từ cái nhìn đầu tiên.&nbsp;</p>

<h3 dir=\"ltr\">Màn hình OLED Super Retina XDR siêu sắc nét</h3>

<p dir=\"ltr\">Phía trước vẫn là màn hình kiểu dáng tai thỏ quen thuộc, với phần viền màn hình được tinh gọn hơn một cách đáng kể mang đến cảm giác màn hình lớn hơn dù iPhone 12 Mini có kích cỡ màn hình chỉ 5.4 inch.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055121-085143.jpg\"><img alt=\"iPhone 12 Mini 64GB | Màn hình tinh gọn kiểu dáng tai thỏ quen thuộc\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085143.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085143.jpg\" title=\"iPhone 12 Mini 64GB | Màn hình tinh gọn kiểu dáng tai thỏ quen thuộc\" /></a></p>

<p dir=\"ltr\">Màn hình kích cỡ 5.4 inch là điểm thuận lợi bởi máy khá nhỏ gọn, có thể dễ dàng đặt trong túi áo, quần hơn so với 6.1 inch trên điện thoại&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro chính hãng\">iPhone 12 Pro</a>&nbsp;hay 6.7 inch trên&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro Max chính hãng\">iPhone 12 Pro Max</a>.</p>

<p dir=\"ltr\">Màn hình của iPhone 12 Mini sử dụng tấm OLED Super Retina XDR tràn viền có độ phân giải Full HD+ (1080 x 2340 Pixels), từng chi tiết chuyển động trên màn hình đều hiện lên rõ nét, tươi sáng và không gặp phải tình trạng nhòe màu sắc được thể hiện trọn vẹn hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055321-085321.jpg\"><img alt=\"iPhone 12 Mini 64GB | Màn hình OLED Super Retina XDR tràn viền độ phân giải 1080 x 2340 Pixels\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085321.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085321.jpg\" title=\"iPhone 12 Mini 64GB | Màn hình OLED Super Retina XDR tràn viền độ phân giải 1080 x 2340 Pixels\" /></a></p>

<p dir=\"ltr\">Hơn nữa, Apple còn trang bị mặt kính Ceramic Shield vật liệu kết hợp giữa thủy tinh và gốm cao cấp với khả năng chịu va đập gấp 4 lần so với các đời trước, bảo vệ máy một cách tối đa, cùng với đó là khả năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-chong-nuoc-bui\" target=\"_blank\" title=\"Tham khảo điện thoại chống nước, chống bụi tại Thegioididong.com\">kháng nước</a>&nbsp;chuẩn IP68.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074255.jpg\"><img alt=\"iPhone 12 Mini 64GB | Hỗ trợ khả năng kháng nước chuẩn IP68\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074255.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074255.jpg\" title=\"iPhone 12 Mini 64GB | Hỗ trợ khả năng kháng nước chuẩn IP68\" /></a></p>

<h3 dir=\"ltr\">Camera kép thách thức mọi giới hạn ban đêm</h3>

<p dir=\"ltr\">Camera của điện thoại iPhone 12 Mini với camera kép 12 MP nhờ đó hình ảnh sẽ được ghi lại một cách chân thực, rõ nét. Camera chính 12 MP với khẩu độ lớn f/1.6 giúp tăng 27% khả năng thu sáng. Vì vậy, ngay cả trong bóng tối, hình chụp, video của bạn vẫn cho độ chi tiết và màu sắc tuyệt vời.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055221-085243.jpg\"><img alt=\"iPhone 12 Mini 64GB | Cụm camera sau\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085243.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085243.jpg\" title=\"iPhone 12 Mini 64GB | Cụm camera sau\" /></a></p>

<p dir=\"ltr\">Đồng thời, bạn còn có thể quay video chất lượng 4K HDR cùng công nghệ Dolby Vision trên iPhone 12 Mini với chất lượng, màu sắc và chi tiết được thể hiện trọn vẹn hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074230.jpg\"><img alt=\"iPhone 12 Mini 64GB | Quay video chất lượng 4K HDR cùng công nghệ Dolby Vision\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074230.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074230.jpg\" title=\"iPhone 12 Mini 64GB | Quay video chất lượng 4K HDR cùng công nghệ Dolby Vision\" /></a></p>

<p dir=\"ltr\">Ở phần notch mặt trước của điện thoại iPhone 12 còn có camera selfie độ phân giải 12 MP. Tương tự như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-11\" title=\"Tham khảo giá điện thoại iPhone 11 chính hãng\">iPhone 11</a>, camera selfie của&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone iPhone chính hãng\">iPhone</a>&nbsp;có thêm tính năng gyro-EIS và cảm biến đo chiều sâu sinh trắc học SL 3D hiện đại, mang đến chất lượng hình ảnh rõ nét và hoàn mỹ.</p>

<h3 dir=\"ltr\">Vi xử lý Apple A14 khẳng định sức mạnh dẫn đầu</h3>

<p dir=\"ltr\">iPhone 12 Mini cũng tương tự các phiên bản iPhone 12 khác khi máy được trang bị con chip Apple A14 cho khả năng xử lý nhanh chóng mượt mà.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074243.jpg\"><img alt=\"iPhone 12 Mini 64GB | Chíp xử lí A14 mượt mà\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074243.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074243.jpg\" title=\"iPhone 12 Mini 64GB | Chíp xử lí A14 mượt mà\" /></a></p>

<p dir=\"ltr\">A14 Bionic là chip xử lý được sản xuất trên quy trình 5 nm, cung cấp tốc độ tải nhanh hơn, khả năng học hỏi AI thông minh hơn sẵn sàng phục vụ người dùng trong nhiều năm tới.</p>

<p dir=\"ltr\">iPhone 12 Mini được trang bị dung lượng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-ram-4-den-6gb\" target=\"_blank\" title=\"Tham khảo điện thoại có RAM 4GB\">RAM 4 GB</a>&nbsp;và<a href=\"https://www.thegioididong.com/dtdd-rom-32-den-64gb\" target=\"_blank\" title=\"Tham khảo điện thoại có bộ nhớ trong 64 GB\">&nbsp;bộ nhớ trong 64 GB</a>&nbsp;đủ khả năng để người dùng lưu trữ thả ga và tốc độ giải quyết thao tác nhanh chóng.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055321-085311.jpg\"><img alt=\"iPhone 12 Mini 64GB | Khay sim\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085311.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085311.jpg\" title=\"iPhone 12 Mini 64GB | Khay sim\" /></a></p>

<p dir=\"ltr\">Đặc biệt, iPhone 12 Mini chính là thế hệ iPhone đầu tiên trang bị 5G. Giờ đây, những bộ phim chất lượng cao hay các ứng dụng nặng bạn yêu thích sẽ được tải xong trong chớp mắt.</p>

<p dir=\"ltr\">Việc gửi các tệp lớn, đăng tải hình ảnh, livestream hay phát trực tiếp video chất lượng cao được hoàn thành nhanh và tiện lợi hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064320-074325.jpg\"><img alt=\"iPhone 12 Mini 64GB | Thế hệ iPhone đầu tiên trang bị 5G\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074325.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074325.jpg\" title=\"iPhone 12 Mini 64GB | Thế hệ iPhone đầu tiên trang bị 5G\" /></a></p>

<p dir=\"ltr\">Ngoài ra, Apple đã phát triển chế độ Smart Data, có chức năng chuyển đổi qua lại giữa 4G và 5G khi chạy các ứng dụng nhằm tiết kiệm pin cho máy một cách tối đa, nâng cao trải nghiệm sử dụng máy cho người dùng.</p>

<h3 dir=\"ltr\">Hỗ trợ sạc nhanh 20 W</h3>

<p dir=\"ltr\">Chiếc điện thoại iPhone 12 Mini này có dung lượng pin tuy không thuộc hàng “khủng” nhưng vẫn cho thời lượng sử dụng lên đến 50 giờ nghe nhạc.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055221-085253.jpg\"><img alt=\"iPhone 12 Mini 64GB | Pin tương đối hời lượng sử dụng lên đến 17 giờ xem video, 50 giờ nghe nhạc\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085253.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085253.jpg\" title=\"iPhone 12 Mini 64GB | Pin tương đối hời lượng sử dụng lên đến 17 giờ xem video, 50 giờ nghe nhạc\" /></a></p>

<p dir=\"ltr\">Ngoài ra, iPhone 12 Mini còn được trang bị tính năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-sac-pin-nhanh\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone sạc pin nhanh\">sạc pin nhanh</a>&nbsp;20 W, người dùng có thể nhanh chóng sạc đầy chiếc điện thoại của mình, để tiếp tục công việc mà không bị gián đoạn quá lâu.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074247.jpg\"><img alt=\"iPhone 12 Mini 64GB | Trang bị tính năng sạc pin nhanh 20 W\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074247.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074247.jpg\" title=\"iPhone 12 Mini 64GB | Trang bị tính năng sạc pin nhanh 20 W\" /></a></p>

<p dir=\"ltr\">Với sạc nhanh 20 W, bạn sẽ có ngay 50% pin chỉ trong 30 phút sạc. iPhone 12 Series cũng có thêm tính năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-sac-khong-day\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone hỗ trợ sạc pin không dây\">sạc không dây</a>&nbsp;Qi và MagSafe, cho trải nghiệm sạc không dây cực kỳ hữu ích và tiện lợi.</p>

<p dir=\"ltr\">Tóm lại, iPhone 12 phiên bản mini là một trong những phiên bản điện thoại siêu phẩm của Apple với nhiều đột phá về công nghệ cũng như hiệu năng hứa hẹn sẽ là mẫu điện thoại thành công nhất của Apple trong năm 2020.</p>', '', '', '', '1', '1', '1', '26', '0', '0', '1611291532', '36', '1612406348', '3', '9', '1', '0', '3', '1', '1111111', '500000', '0', '0', '0', '0', '500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('10', '9', 'SP834947056', 'Điện thoại Samsung Galaxy S20', 'Dien-thoai-Samsung-Galaxy-S20', '2', '4', '2', '111', '11', '11', '11', '1', '1', '1', '2021_01/samsung-galaxy-s205-1.jpg', '', '<div dir=\"ltr\">Samsung Galaxy S20&nbsp;là&nbsp;chiếc&nbsp;điện thoại&nbsp;với thiết kế màn hình tràn viền không khuyết điểm, camera sau ấn tượng, hiệu năng khủng cùng nhiều những đột phá công nghệ nổi bật, dẫn đầu thế giới.</div>', '<h3 dir=\"ltr\">Thiết kế sang trọng, cao cấp</h3>

<p dir=\"ltr\">Điểm nhấn đầu tiên phải kể đến ở dòng máy này chính là viền máy không còn được thiết kế bo cong các cạnh, mà thay vào đó là phần cạnh máy được vát phẳng vô cùng mạnh mẽ và cá tính.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055121-085135.jpg\"><img alt=\"iPhone 12 Mini 64 GB | Thiết kế sang trọng, tỉ mỉ\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085135.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085135.jpg\" title=\"iPhone 12 Mini 64 GB | Thiết kế sang trọng, tỉ mỉ\" /></a></p>

<p dir=\"ltr\">Lần đầu tiên&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\" title=\"Tham khảo thêm các dòng sản phẩm Apple\">Apple</a>&nbsp;sử dụng khung nhôm cao cấp trong ngành hàng không vũ trụ trên iPhone 12 Mini đem đến cho người dùng thiết kế cứng cáp nhưng trọng lượng không quá nặng.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-050121-090102.jpg\"><img alt=\"iPhone 12 Mini 64GB | Khung nhôm cao cấp từ ngành hàng không\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-050121-090102.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-050121-090102.jpg\" title=\"iPhone 12 Mini 64GB | Khung nhôm cao cấp từ ngành hàng không\" /></a></p>

<p dir=\"ltr\">Máy nổi bật với hệ thống camera hình vuông độc đáo, kết hợp cùng mặt lưng bằng kính bóng bẩy cho cảm giác cầm nắm vô cùng thích.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064320-074303.jpg\"><img alt=\"iPhone 12 Mini 64GB | Mặt lưng bóng bẩy, nhiều màu sắc chọn lựa\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074303.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074303.jpg\" title=\"iPhone 12 Mini 64GB | Mặt lưng bóng bẩy, nhiều màu sắc chọn lựa\" /></a></p>

<p dir=\"ltr\">Ngoài ra, iPhone 12 Mini cũng đem tới cho người dùng nhiều màu sắc cho bạn tha hồ lựa chọn. Đặc biệt, Apple vừa bổ sung màu xanh dương vốn tươi tắn nhẹ nhàng nổi bật để lôi kéo sự chú ý, là một sự lựa chọn mới mẻ ấn tượng ngay từ cái nhìn đầu tiên.&nbsp;</p>

<h3 dir=\"ltr\">Màn hình OLED Super Retina XDR siêu sắc nét</h3>

<p dir=\"ltr\">Phía trước vẫn là màn hình kiểu dáng tai thỏ quen thuộc, với phần viền màn hình được tinh gọn hơn một cách đáng kể mang đến cảm giác màn hình lớn hơn dù iPhone 12 Mini có kích cỡ màn hình chỉ 5.4 inch.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055121-085143.jpg\"><img alt=\"iPhone 12 Mini 64GB | Màn hình tinh gọn kiểu dáng tai thỏ quen thuộc\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085143.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055121-085143.jpg\" title=\"iPhone 12 Mini 64GB | Màn hình tinh gọn kiểu dáng tai thỏ quen thuộc\" /></a></p>

<p dir=\"ltr\">Màn hình kích cỡ 5.4 inch là điểm thuận lợi bởi máy khá nhỏ gọn, có thể dễ dàng đặt trong túi áo, quần hơn so với 6.1 inch trên điện thoại&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro chính hãng\">iPhone 12 Pro</a>&nbsp;hay 6.7 inch trên&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro Max chính hãng\">iPhone 12 Pro Max</a>.</p>

<p dir=\"ltr\">Màn hình của iPhone 12 Mini sử dụng tấm OLED Super Retina XDR tràn viền có độ phân giải Full HD+ (1080 x 2340 Pixels), từng chi tiết chuyển động trên màn hình đều hiện lên rõ nét, tươi sáng và không gặp phải tình trạng nhòe màu sắc được thể hiện trọn vẹn hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055321-085321.jpg\"><img alt=\"iPhone 12 Mini 64GB | Màn hình OLED Super Retina XDR tràn viền độ phân giải 1080 x 2340 Pixels\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085321.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085321.jpg\" title=\"iPhone 12 Mini 64GB | Màn hình OLED Super Retina XDR tràn viền độ phân giải 1080 x 2340 Pixels\" /></a></p>

<p dir=\"ltr\">Hơn nữa, Apple còn trang bị mặt kính Ceramic Shield vật liệu kết hợp giữa thủy tinh và gốm cao cấp với khả năng chịu va đập gấp 4 lần so với các đời trước, bảo vệ máy một cách tối đa, cùng với đó là khả năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-chong-nuoc-bui\" target=\"_blank\" title=\"Tham khảo điện thoại chống nước, chống bụi tại Thegioididong.com\">kháng nước</a>&nbsp;chuẩn IP68.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074255.jpg\"><img alt=\"iPhone 12 Mini 64GB | Hỗ trợ khả năng kháng nước chuẩn IP68\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074255.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074255.jpg\" title=\"iPhone 12 Mini 64GB | Hỗ trợ khả năng kháng nước chuẩn IP68\" /></a></p>

<h3 dir=\"ltr\">Camera kép thách thức mọi giới hạn ban đêm</h3>

<p dir=\"ltr\">Camera của điện thoại iPhone 12 Mini với camera kép 12 MP nhờ đó hình ảnh sẽ được ghi lại một cách chân thực, rõ nét. Camera chính 12 MP với khẩu độ lớn f/1.6 giúp tăng 27% khả năng thu sáng. Vì vậy, ngay cả trong bóng tối, hình chụp, video của bạn vẫn cho độ chi tiết và màu sắc tuyệt vời.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055221-085243.jpg\"><img alt=\"iPhone 12 Mini 64GB | Cụm camera sau\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085243.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085243.jpg\" title=\"iPhone 12 Mini 64GB | Cụm camera sau\" /></a></p>

<p dir=\"ltr\">Đồng thời, bạn còn có thể quay video chất lượng 4K HDR cùng công nghệ Dolby Vision trên iPhone 12 Mini với chất lượng, màu sắc và chi tiết được thể hiện trọn vẹn hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074230.jpg\"><img alt=\"iPhone 12 Mini 64GB | Quay video chất lượng 4K HDR cùng công nghệ Dolby Vision\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074230.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074230.jpg\" title=\"iPhone 12 Mini 64GB | Quay video chất lượng 4K HDR cùng công nghệ Dolby Vision\" /></a></p>

<p dir=\"ltr\">Ở phần notch mặt trước của điện thoại iPhone 12 còn có camera selfie độ phân giải 12 MP. Tương tự như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-11\" title=\"Tham khảo giá điện thoại iPhone 11 chính hãng\">iPhone 11</a>, camera selfie của&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone iPhone chính hãng\">iPhone</a>&nbsp;có thêm tính năng gyro-EIS và cảm biến đo chiều sâu sinh trắc học SL 3D hiện đại, mang đến chất lượng hình ảnh rõ nét và hoàn mỹ.</p>

<h3 dir=\"ltr\">Vi xử lý Apple A14 khẳng định sức mạnh dẫn đầu</h3>

<p dir=\"ltr\">iPhone 12 Mini cũng tương tự các phiên bản iPhone 12 khác khi máy được trang bị con chip Apple A14 cho khả năng xử lý nhanh chóng mượt mà.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074243.jpg\"><img alt=\"iPhone 12 Mini 64GB | Chíp xử lí A14 mượt mà\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074243.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074243.jpg\" title=\"iPhone 12 Mini 64GB | Chíp xử lí A14 mượt mà\" /></a></p>

<p dir=\"ltr\">A14 Bionic là chip xử lý được sản xuất trên quy trình 5 nm, cung cấp tốc độ tải nhanh hơn, khả năng học hỏi AI thông minh hơn sẵn sàng phục vụ người dùng trong nhiều năm tới.</p>

<p dir=\"ltr\">iPhone 12 Mini được trang bị dung lượng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-ram-4-den-6gb\" target=\"_blank\" title=\"Tham khảo điện thoại có RAM 4GB\">RAM 4 GB</a>&nbsp;và<a href=\"https://www.thegioididong.com/dtdd-rom-32-den-64gb\" target=\"_blank\" title=\"Tham khảo điện thoại có bộ nhớ trong 64 GB\">&nbsp;bộ nhớ trong 64 GB</a>&nbsp;đủ khả năng để người dùng lưu trữ thả ga và tốc độ giải quyết thao tác nhanh chóng.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055321-085311.jpg\"><img alt=\"iPhone 12 Mini 64GB | Khay sim\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085311.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055321-085311.jpg\" title=\"iPhone 12 Mini 64GB | Khay sim\" /></a></p>

<p dir=\"ltr\">Đặc biệt, iPhone 12 Mini chính là thế hệ iPhone đầu tiên trang bị 5G. Giờ đây, những bộ phim chất lượng cao hay các ứng dụng nặng bạn yêu thích sẽ được tải xong trong chớp mắt.</p>

<p dir=\"ltr\">Việc gửi các tệp lớn, đăng tải hình ảnh, livestream hay phát trực tiếp video chất lượng cao được hoàn thành nhanh và tiện lợi hơn bao giờ hết.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064320-074325.jpg\"><img alt=\"iPhone 12 Mini 64GB | Thế hệ iPhone đầu tiên trang bị 5G\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074325.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064320-074325.jpg\" title=\"iPhone 12 Mini 64GB | Thế hệ iPhone đầu tiên trang bị 5G\" /></a></p>

<p dir=\"ltr\">Ngoài ra, Apple đã phát triển chế độ Smart Data, có chức năng chuyển đổi qua lại giữa 4G và 5G khi chạy các ứng dụng nhằm tiết kiệm pin cho máy một cách tối đa, nâng cao trải nghiệm sử dụng máy cho người dùng.</p>

<h3 dir=\"ltr\">Hỗ trợ sạc nhanh 20 W</h3>

<p dir=\"ltr\">Chiếc điện thoại iPhone 12 Mini này có dung lượng pin tuy không thuộc hàng “khủng” nhưng vẫn cho thời lượng sử dụng lên đến 50 giờ nghe nhạc.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-055221-085253.jpg\"><img alt=\"iPhone 12 Mini 64GB | Pin tương đối hời lượng sử dụng lên đến 17 giờ xem video, 50 giờ nghe nhạc\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085253.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-055221-085253.jpg\" title=\"iPhone 12 Mini 64GB | Pin tương đối hời lượng sử dụng lên đến 17 giờ xem video, 50 giờ nghe nhạc\" /></a></p>

<p dir=\"ltr\">Ngoài ra, iPhone 12 Mini còn được trang bị tính năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-sac-pin-nhanh\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone sạc pin nhanh\">sạc pin nhanh</a>&nbsp;20 W, người dùng có thể nhanh chóng sạc đầy chiếc điện thoại của mình, để tiếp tục công việc mà không bị gián đoạn quá lâu.</p>

<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/42/225380/iphone-12-mini-064220-074247.jpg\"><img alt=\"iPhone 12 Mini 64GB | Trang bị tính năng sạc pin nhanh 20 W\" data-original=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074247.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/225380/iphone-12-mini-064220-074247.jpg\" title=\"iPhone 12 Mini 64GB | Trang bị tính năng sạc pin nhanh 20 W\" /></a></p>

<p dir=\"ltr\">Với sạc nhanh 20 W, bạn sẽ có ngay 50% pin chỉ trong 30 phút sạc. iPhone 12 Series cũng có thêm tính năng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-sac-khong-day\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone hỗ trợ sạc pin không dây\">sạc không dây</a>&nbsp;Qi và MagSafe, cho trải nghiệm sạc không dây cực kỳ hữu ích và tiện lợi.</p>

<p dir=\"ltr\">Tóm lại, iPhone 12 phiên bản mini là một trong những phiên bản điện thoại siêu phẩm của Apple với nhiều đột phá về công nghệ cũng như hiệu năng hứa hẹn sẽ là mẫu điện thoại thành công nhất của Apple trong năm 2020.</p>', '', '', '', '1', '1', '1', '34', '0', '0', '1611291688', '36', '1612406337', '3', '10', '1', '0', '3', '1', '11111111', '0', '0', '0', '0', '0', '11111111')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('12', '1', 'test', 'Sản phẩm test thứ nhất', 'San-pham-test-thu-nhat', '2', '4', '2', '30', '20', '20', '20', '1', '1', '1', '2021_01/05325 (1).jpg', '', 'ssss', 'ssss', '', 'Sản phẩm test thứ nhất', 'Sản phẩm test thứ nhất', '1', '1', '1', '15', '0', '0', '1611292373', '27', '1612406320', '3', '12', '1', '0', '3', '1', '5000000', '4000000', '0', '0', '0', '0', '4000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('11', '8', 'sdvdazc', 'dvdvds', 'dvdvds', '4', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/tuyen-tap-girl-xinh-cap-3-580x580.jpg', '', 'ưefew', 'ewfew', '', '', '', '0', '0', '1', '10', '3', '3', '1611291982', '34', '1612406328', '3', '11', '1', '0', '3', '2', '324324', '3234', '0', '0', '0', '0', '3234')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('13', '9', 'SP872328757', 'Tủ bếp', 'Tu-bep', '15', '5', '2', '50000', '45', '3', '3', '1', '1', '1', '2021_01/tải xuống (3).jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '7', '500000', '500000', '1611366971', '36', '1612406313', '3', '13', '1', '0', '3', '2', '500000', '400000', '0', '', '0', '0', '400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('14', '9', 'SP401916499', 'Xiaomi Redmi 9T (6GB/128GB)', 'Xiaomi-Redmi-9T-6GB-128GB', '4', '5', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/xiaomi-redmi-9t-6gb-110621-080650-400x400.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '11', '0', '0', '1611367129', '36', '1612406307', '3', '14', '1', '0', '3', '2', '5000000', '4000000', '0', '0', '0', '0', '4000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('15', '9', 'SP206779666', 'Realme C20', 'Realme-C20', '4', '5', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/vivo-v20-(6).jpg', '', 'Nội dung chi tiết', 'nội dung chi tiết', '', '', '', '1', '1', '1', '14', '0', '0', '1611367253', '36', '1612406301', '3', '15', '1', '0', '3', '2', '5000000', '4000000', '0', '0', '0', '0', '4000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('16', '9', 'SP972079980', 'Samsung Galaxy A51 (8GB/128GB)', 'Samsung-Galaxy-A51-8GB-128GB', '4', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/samsung-galaxy-a51-8gb-xanh-600x600.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '10', '0', '0', '1611367352', '36', '1612406294', '3', '16', '1', '0', '3', '2', '7000000', '5000000', '0', '0', '0', '0', '5000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('17', '9', 'SP167328714', 'iPhone 12 mini 128GB', 'iPhone-12-mini-128GB', '4', '5', '2', '300', '45', '3', '3', '1', '1', '1', '2021_01/iphone-mini-do-new-600x600-600x600.jpg', '', 'Giới thiệu', 'Nội dung', '', '', '', '1', '1', '1', '11', '0', '0', '1611367415', '36', '1612406288', '3', '17', '1', '0', '3', '2', '9000000', '7000000', '0', '0', '0', '0', '7000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('18', '9', 'SP729640567', 'iPad 8 Wifi 128GB (2020)', 'iPad-8-Wifi-128GB-2020', '23', '5', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/ipad-gen-8-wifi-vang-new-600x600-600x600.jpg', '', 'Giới thiệu', 'Nội dung', '', '', '', '1', '1', '1', '8', '0', '0', '1611367532', '36', '1612406273', '3', '18', '1', '0', '3', '2', '12000000', '11000000', '0', '', '0', '0', '11000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('19', '9', 'SP101380634', 'Huawei MatePad (Nền tảng Huawei Mobile Service)', 'Huawei-MatePad-Nen-tang-Huawei-Mobile-Service', '23', '5', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/huawei-matepad-xanh-600x600-400x400.jpg', '', 'Giới thiệu', 'Nội dung', '', '', '', '1', '1', '1', '4', '0', '0', '1611367590', '36', '1612406265', '3', '19', '1', '0', '3', '2', '50000000', '40000000', '0', '', '0', '0', '40000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('20', '9', 'SP454477022', 'Sữa rửa mặt tạo bọt', 'Sua-rua-mat-tao-bot', '24', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/tải xuống (4).jpg', '', 'Giới thiệu', 'Nội dung', '', '', '', '1', '1', '1', '8', '0', '0', '1611368486', '36', '1612406257', '3', '20', '1', '0', '4', '1', '200000', '170000', '0', '', '0', '0', '170000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('22', '8', 'sdfsdf', 'tms nha', 'tms-nha', '2', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_01/huawei-matepad-xanh-600x600-400x400.3bd91245048c816fb2e2ab4ce7f02184.jpg', '', 'dsfdsfsd', 'sdsdfdsf', '', '', '', '1', '1', '1', '11', '0', '0', '1611542257', '34', '1612406251', '3', '21', '1', '0', '3', '1', '32432423', '23423', '0', '0', '0', '0', '23423')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('23', '8', 'SP338008566', 'Bàn nhà bếp', 'Ban-nha-bep', '15', '4', '2', '45435435', '45', '3', '3', '1', '1', '1', '2021_01/anh-anime-phong-canh-dep_093817122.bf29b59404cd0a42793926135f824c4f.jpg', '', 'dsfdsf', 'sdfdsf', '', '', '', '1', '1', '1', '8', '0', '0', '1611542340', '34', '1612406246', '3', '22', '1', '0', '3', '2', '43543543', '3434', '0', '', '0', '0', '3434')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('24', '8', 'SP487400494', 'Bếp ga', 'Bep-ga', '22', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_02/photo-1-1534920773931958225603-1594279035913430103990.ae05de1b1b17afd1cb3bf1113574827a.jpg', '2021_02/photo-1-158270587240769675748.8de85539872b959e9bfa778fb50dc7ef.jpg', 'dsfsdf', 'sdfsdf', '123,445,', '', '', '1', '1', '1', '12', '0', '0', '1611543200', '34', '1612406240', '3', '23', '1', '0', '0', '0', '23432432', '23423', '0', '', '0', '0', '23423')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('25', '10', 'SP673937906', 'iPhone 12 Pro Max 256GB', 'iPhone-12-Pro-Max-256GB', '4', '4', '2', '200', '45', '3', '3', '1', '1', '1', '2021_02/vivo-v20-6.556db6629393b54bb41f4f9667409f05.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '10', '0', '0', '1612321027', '38', '1612406234', '3', '24', '1', '0', '0', '2', '20000000', '18000000', '5', '1', '1612345645', '1', '18000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('30', '10', 'SP417266037', 'Samsung Galaxy S21+ 5G', 'Samsung-Galaxy-S21-5G', '4', '5', '2', '300', '45', '3', '3', '1', '1', '1', '2021_02/oneplus-8-pro-600x600-2-600x600.2ad2d11b55b0b39c87f638afd2c5ca0b.jpg', '', 'GIới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '8', '0', '0', '1612322830', '38', '1612406201', '3', '29', '1', '0', '0', '1', '18000000', '16000000', '0', '0', '1612345236', '1', '16000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('26', '10', 'SP305054699', 'OPPO A15', 'OPPO-A15', '4', '4', '2', '300', '45', '3', '3', '1', '1', '1', '2021_02/huawei-matepad-xanh-600x600-400x400.ddf618364447f95be29620f316868bd6.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '8', '0', '0', '1612321133', '38', '1612406227', '3', '25', '1', '0', '11', '1', '5000000', '4300000', '0', '0', '0', '0', '4300000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('27', '10', 'SP554306888', 'Xiaomi Redmi Note 9S', 'Xiaomi-Redmi-Note-9S', '4', '4', '2', '250', '45', '3', '3', '1', '1', '1', '2021_02/realme-c17-green-600x600-1-600x600.35e508cfba132249b95ecb66febe485b.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '9', '4200000', '4200000', '1612321848', '38', '1612406221', '3', '26', '1', '0', '14', '7', '7000000', '4500000', '4', '1', '1612345319', '1', '4500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('34', '9', 'SP113503036', 'Laptop Lenovo IdeaPad S340 14IIL i5 1035G1/8GB/512GB/Win10 (81VV003SVN)', 'Laptop-Lenovo-IdeaPad-S340-14IIL-i5-1035G1-8GB-512GB-Win10-81VV003SVN', '22', '4', '2', '321', '213', '3213', '432', '1', '1', '1', '2021_02/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-600x600.jpg', '', 'Balo Laptop LenovoMua kèm Microsoft 365 Personal 1 năm chỉ còn 790,000đMua Đồng hồ thời trang giảm 40% (không kèm khuyến mãi khác)', '<h2>Đặc điểm nổi bật của Lenovo IdeaPad S340 14IIL i5 1035G1/8GB/512GB/Win10 (81VV003SVN)</h2>
<img alt=\"\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/Slider/-lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1.jpg\" /><img alt=\"\" data-time=\"0\" data-vid=\"fMCbZErqhtg\" src=\"https://www.thegioididong.com/Content/desktop/images/V4/icon-yt.png\" />
<p>Bộ sản phẩm chuẩn: Sách hướng dẫn, Thùng máy, Adapter sạc</p>


<h2><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\" target=\"_blank\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) đang được kinh doanh tại Thegioididong.com\" type=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) đang được kinh doanh tại Thegioididong.com\">Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN)</a>&nbsp;là một lựa chọn phù hợp dành cho nhân viên văn phòng, học sinh sinh viên. Máy có cấu hình khá với vi xử lí mới nhất đến từ Intel, ổ cứng SSD cực nhanh, thiết kế sang trọng, mỏng nhẹ sẵn sàng đồng hành cùng bạn mọi lúc mọi nơi.</h2>

<h3>Sử dụng văn phòng, đồ họa</h3>

<p>Với chip<strong>&nbsp;Intel<a href=\"https://www.thegioididong.com/laptop?g=core-i5\" target=\"_blank\" title=\"Xem thêm các laptop Core i5 đang bán tại Thegioididong.com\" type=\"Xem thêm các laptop Core i5 đang bán tại Thegioididong.com\">&nbsp;Core i5</a></strong>&nbsp;thế hệ 10&nbsp;(ra mắt cuối năm 2019) mạnh mẽ,&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=8-gb\" target=\"_blank\" title=\"Laptop được trang bị RAM 8 GB đang kinh doanh tại Thegioididong.com\" type=\"Laptop được trang bị RAM 8 GB đang kinh doanh tại Thegioididong.com\"><strong>RAM 8 GB</strong></a>, ngoài việc sử dụng tốt các ứng dụng văn phòng, laptop còn có thể xử lý hình ảnh trên Photoshop, hay chỉnh sửa video đơn giản bằng Premiere.&nbsp;</p>

<p>Xem thêm:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-vi-xu-ly-intel-core-the-he-10-1212148\" target=\"_blank\" title=\"Tìm hiểu về CPU intel thế hệ 10\" type=\"Tìm hiểu về CPU intel thế hệ 10\">CPU Intel thế hệ 10 là gì</a>&nbsp;?</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win15.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - cấu hình\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win15.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win15.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - cấu hình\" /></a></p>

<h3>Thiết kế gọn nhẹ, cơ động&nbsp;</h3>

<p><a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Xem thêm các mẫu laptop đang kinh doanh tại thegioididong.com\" type=\"Xem thêm các mẫu laptop đang kinh doanh tại thegioididong.com\">Laptop</a>&nbsp;có thiết kế đơn giản, tinh tế với chất liệu từ nhựa, nắp lưng kim loại bền bỉ và sang trọng.&nbsp;Máy có độ dày<strong>&nbsp;17.9 mm</strong>&nbsp;và trọng lượng&nbsp;<strong>1.6 kg</strong>, mỏng nhẹ tối ưu cho những ai phải thường xuyên di chuyển.</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win13.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - thiết kế\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win13.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win13.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - thiết kế\" /></a></p>

<h3>Ổ cứng SSD khởi động cực nhanh</h3>

<p>Laptop có trang bị<strong>&nbsp;<a href=\"https://www.thegioididong.com/laptop-lenovo-o-cung-ssd\" target=\"_blank\" title=\"Laptop Lenovo chính hãng được trang bị ổ cứng SSD đang được kinh doanh tại Thegioididong.com\" type=\"Laptop chính hãng được trang bị ổ cứng SSD đang được kinh doanh tại Thegioididong.com\">ổ cứng SSD</a><a href=\"https://www.thegioididong.com/laptop?g=ssd-512-gb\" target=\"_blank\" title=\"Xem thêm các laptop có SSD 512 GB\">&nbsp;512 GB</a>&nbsp;M.2 PCIe</strong>&nbsp;vận hành mượt mà, nhanh chóng. Thời gian mở máy chỉ khoảng 10-15 giây. Với 512 GB người dùng cũng có thể lưu được một lượng lớn dữ liệu.</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win12.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - ổ cứng\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win12.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win12.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - ổ cứng\" /></a></p>

<h3>Màn hình viền mỏng, chống chói</h3>

<p>Màn hình&nbsp;<a href=\"https://www.thegioididong.com/laptop-14-inch\" target=\"_blank\" title=\"Xem thêm một số laptop màn hình 14 inch đang được kinh doanh tại Thegioididong.com\" type=\"Xem thêm một số laptop màn hình 14 inch đang được kinh doanh tại Thegioididong.com\">14 inch</a>&nbsp;độ phân giải&nbsp;<strong>Full HD</strong>&nbsp;cho bạn không gian hình ảnh đẹp, sắc nét, những gam màu chân thật. Công nghệ&nbsp;<strong>Anti Glare</strong>&nbsp;chống chói hiệu quả dù sử dụng ở dưới nắng hay ngược sáng.&nbsp;</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win16.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - màn hình\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win16.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win16.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - màn hình\" /></a></p>

<h3>Cổng kết nối đa dạng</h3>

<p><a href=\"https://www.thegioididong.com/laptop-lenovo\" target=\"_blank\" title=\"Xem thêm các sản phẩm laptop Lenovo đang bán tại Thegioididong.com\" type=\"Xem thêm các sản phẩm laptop Lenovo đang bán tại Thegioididong.com\">Laptop Lenovo</a>&nbsp;IdeaPad S340 được trang bị đầy đủ các cổng kết nối phổ biến như&nbsp;<strong>USB Type C, USB 3.1, HDMI</strong>, giúp bạn dễ dàng thực hiện các thao tác truy xuất tài liệu, hình ảnh qua các thiết bị khác để phục vụ cho công việc của mình.</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win11.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - kết nối\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win11.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win11.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - kết nối\" /></a></p>

<h3>Âm thanh phong phú</h3>

<p><a href=\"https://www.thegioididong.com/laptop-lenovo-ideapad\" target=\"_blank\" title=\"Xem thêm các sản phẩm Lenovo IdeaPad đang bán tại Thegioididong.com\" type=\"Xem thêm các sản phẩm Lenovo IdeaPad đang bán tại Thegioididong.com\">Lenovo IdeaPad</a>&nbsp;sử dụng công nghệ âm thanh&nbsp;<strong>Dolby Audio Premium</strong>&nbsp;mang đến âm thanh trong trẻo, sống động, âm thanh vòm chìm đắm cho bạn trải nghiệm như đang xem phim trong rạp hát.&nbsp;</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-5-1.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - âm thanh\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-5-1.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-5-1.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) - âm thanh\" /></a></p>

<h3>Thời lượng pin ấn tượng</h3>

<p>Pin Li-Ion 3 cell giúp máy có thời gian pin lên đến&nbsp;<strong>7 tiếng</strong>&nbsp;sử dụng trên thực tế, với laptop Lenovo IdeaPad S340 bạn có thể thoải mái làm việc, học tập cả ngày.</p>

<p><a href=\"https://www.thegioididong.com/images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-19.jpg\"><img alt=\"Laptop Lenovo IdeaPad S340 14IIL i5 thời lượng pin ấn tượng\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-19.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-19.jpg\" title=\"Laptop Lenovo IdeaPad S340 14IIL i5 thời lượng pin ấn tượng\" /></a></p>

<p>Với cấu hình mạnh và thiết kế thuận tiện xê dịch, Lenovo IdeaPad S340 14IIL là mẫu&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=hoc-tap-van-phong\" target=\"_blank\" title=\"Xem thêm các sản phẩm laptop học tập, văn phòng đang bán tại Thegioididong.com\" type=\"Xem thêm các sản phẩm laptop học tập, văn phòng đang bán tại Thegioididong.com\">laptop học tập văn phòng&nbsp;</a>dành cho giới trẻ hiện đại.&nbsp;</p>
<iframe allow=\"encrypted-media\" allowfullscreen=\"true\" allowtransparency=\"true\" data-testid=\"fb:like Facebook Social Plugin\" frameborder=\"0\" height=\"1000px\" name=\"f26039b7cc02cf8\" scrolling=\"no\" title=\"fb:like Facebook Social Plugin\" width=\"1000px\"></iframe>


<p>Bài viết này có hữu ích cho Bạn không ?</p>
<br />
<a data-name=\"Hữu ích\" data-val=\"good\">Hữu ích</a>&nbsp;<a data-name=\"Không hữu ích\" data-val=\"bad\">Không Hữu ích</a>


<p><a id=\"xem-them-bai-viet\">Đọc thêm</a></p>
<img alt=\"\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-400x400.jpg\" height=\"70\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-400x400.jpg\" width=\"70\" />&nbsp;
<h3>Laptop Lenovo IdeaPad S340 14IIL i5 1035G1/8GB/512GB/Win10 (81VV003SVN)</h3>
<strong>14.390.000₫</strong><br />
<a data-value=\"214708\" id=\"mua-ngay\"><b>MUA NGAY</b></a><a href=\"https://www.thegioididong.com/tra-gop/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\" id=\"tra-gop\"><b>MUA TRẢ GÓP 0%</b></a><a href=\"https://www.thegioididong.com/tra-gop/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1?m=credit\"><b>TRẢ GÓP QUA THẺ</b></a>

<h4>So sánh với các sản phẩm tương tự</h4>



<ul>
	<li><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\">Trả góp&nbsp;<b>0%</b></a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\"><img alt=\"\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-400x400.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/214708/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-400x400.jpg\" />Bạn đang xem:</a>

	<h3><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\">Lenovo IdeaPad S340 14IIL i5 1035G1 (81VV003SVN)</a></h3>
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\"><strong>14.390.000₫</strong>15.990.000₫&nbsp;<i>-10%</i></a>

	<p><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\">Quà&nbsp;<b>100.000₫</b></a></p>
	<br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\">&nbsp;&nbsp;&nbsp;&nbsp;</a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1\">CPU Intel Core i5 Ice Lake, 1.00 GHzRAM 8 GB</a></li>
	<li><a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\"><img alt=\"\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/203138/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10-1-2-203138-400x400.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/203138/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10-1-2-203138-400x400.jpg\" /></a>
	<h3><a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\">Dell Vostro 5581 i5 8265U (70175950)</a></h3>
	<a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\"><strong>13.990.000₫</strong>15.990.000₫&nbsp;<i>-12%</i></a>

	<p><a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\">Quà&nbsp;<b>100.000₫</b></a></p>
	<br />
	<a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\">&nbsp;&nbsp;&nbsp;&nbsp;</a><br />
	<a href=\"https://www.thegioididong.com/laptop/dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\">CPU Intel Core i5 Coffee Lake, 1.60 GHzRAM 4 GB</a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-vs-dell-vostro-5581-i5-8265u-4gb-1tb-office365-win10\">So sánh chi tiết</a></li>
	<li><a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\"><img alt=\"\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/224257/huawei-matebook-d15-r5-3500u-kg-kg-224257-400x400.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/224257/huawei-matebook-d15-r5-3500u-kg-kg-224257-400x400.jpg\" /></a>
	<h3><a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\">Huawei MateBook D 15 R5 3500U</a></h3>
	<a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\"><strong>15.790.000₫</strong>15.990.000₫</a>

	<p><a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\">Quà&nbsp;<b>250.000₫</b></a></p>
	<br />
	<a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\">&nbsp;&nbsp;&nbsp;&nbsp;</a><br />
	<a href=\"https://www.thegioididong.com/laptop/huawei-matebook-d15-r5-3500u\">CPU AMD Ryzen 5, 2.10 GHzRAM 8 GB</a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-vs-huawei-matebook-d15-r5-3500u\">So sánh chi tiết</a></li>
	<li><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\">Trả góp&nbsp;<b>0%</b></a><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\"><img alt=\"\" data-original=\"https://cdn.tgdd.vn/Products/Images/44/222649/lenovo-ideapad-3-15iil05-i5-81we003qvn-222649-2-400x400.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/222649/lenovo-ideapad-3-15iil05-i5-81we003qvn-222649-2-400x400.jpg\" /></a>
	<h3><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\">Lenovo IdeaPad Slim 3 15IIL05 i5 1035G4 (81WE003QVN)</a></h3>
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\"><strong>15.490.000₫</strong>15.790.000₫</a>

	<p><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\">Quà&nbsp;<b>100.000₫</b></a></p>
	<br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\">&nbsp;&nbsp;&nbsp;&nbsp;</a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i5-81we003qvn\">CPU Intel Core i5 Ice Lake, 1.10 GHzRAM 8 GB</a><br />
	<a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-vs-lenovo-ideapad-3-15iil05-i5-81we003qvn\">So sánh chi tiết</a></li>
</ul>

<h3 data-c=\"8\" data-gpa=\"3.6\" data-s=\"29\">9 đánh giá Lenovo IdeaPad S340 14IIL i5 1035G1 (81VV003SVN)</h3>

&nbsp;
<br />
<b>3.6&nbsp;</b><br />
5&nbsp;&nbsp;&nbsp;<strong>4</strong>&nbsp;đánh giá<br />
4&nbsp;&nbsp;&nbsp;<strong>2</strong>&nbsp;đánh giá<br />
3&nbsp;&nbsp;&nbsp;<strong>1</strong>&nbsp;đánh giá<br />
2&nbsp;&nbsp;&nbsp;<strong>1</strong>&nbsp;đánh giá<br />
1&nbsp;&nbsp;&nbsp;<strong>1</strong>&nbsp;đánh giá<br />
<a>Gửi đánh giá của bạn</a>

<ul>
	<li id=\"r-44413251\">Lê Hoài&nbsp;Đã mua tại Thegioididong.com

	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Mới mua được gần nữa ngày, lúc đầu ở nhà lên đây lựa toàn mấy con asus dell hp ram 4GB. Lúc mua thì lựa lấy con này, k biết dùng lâu bền k vì thấy con này ít người dùng, nhìn chung thì sài mượt do ram 8GB intel core i5 gen 10, pin khá là trâu dùng từ lúc mua tới giờ vẫn chưa sạc còn 30%, đc tặng balo khá là đẹp, mái anh chị nhân viên tư vấn nhiệt tình mặc dù mk rất phân vân không biết nên chọn mua con nào tốt. Mới dùng cũng chưa lâu và chưa tải nhiều nên chưa biết được về sau sẽ như thế nào, cần phải trãi nghiệm từ từ.</i></p>
	<br />
	<a>Thảo luận</a>&nbsp;•&nbsp;<a data-like=\"0\">Hữu ích</a>&nbsp;•&nbsp;<a>04/12/2020</a></li>
	<li id=\"r-44345594\">Bùi Quốc Lộc&nbsp;Đã mua tại Thegioididong.com
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Mới mua chưa sài thử nhưng vẫn cho 5sao Không biết đánh game mượt k còn lại thì ok</i></p>
	<br />
	&nbsp;Sẽ giới thiệu sản phẩm này cho bạn bè, người thân<br />
	<a>1 thảo luận</a>&nbsp;•&nbsp;<a data-like=\"0\">Hữu ích</a>&nbsp;•&nbsp;<a>29/11/2020</a></li>
	<li id=\"r-44328439\">Lý Hẹc&nbsp;Đã mua tại Thegioididong.com
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Máy không nhận máy in. Đem ra thế giới di động thì không được hỗ trợ của nhân viên. Cánh quạt ở chỗ tản nhiệt không hoạt động. Không biết do máy bị lỗi hay máy nào cũng thế ạ. Mong sự phản hồi của thế giới di động ạ!</i></p>
	<br />
	<a>Thảo luận</a>&nbsp;•&nbsp;<a data-like=\"0\">Hữu ích</a>&nbsp;•&nbsp;<a>28/11/2020</a></li>
</ul>
<br />
<a data-orglnk=\"/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1/danh-gia\" href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1/danh-gia\">Xem tất cả đánh giá›</a><br />
297 Bình Luận&nbsp;Xem Bình Luận Kỹ Thuật

&nbsp;
<br />
Sắp xếp theo&nbsp;&nbsp;Độ chính xác&nbsp;&nbsp;Mới nhất<br />
1<a title=\"trang 2\">2</a><a title=\"trang 3\">3</a><a title=\"trang 4\">4</a>...<a title=\"trang 30\">30</a><a title=\"trang 2\">»</a>

<ul>
	<li id=\"45083597\"><a>V</a><br />
	<a><strong>Vu</strong></a><br />
	Loa em còn bh không ạ xxxx711123<br />
	<a>Trả lời</a><a>11 giờ trước</a><br />
	<a><strong>Ánh Tuyết</strong><b>Quản trị viên</b></a><br />
	Chào anh<br />
	Dạ Loa Bluetooth MozardX BM01 Đen mua vào&nbsp; 04/05/2020, sản phẩm còn bảo hành ạ<br />
	Thông tin đến anh.<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>11 giờ trước</a></li>
	<li id=\"45077461\"><a>D</a><br />
	<a><strong>Dương</strong></a><br />
	Mình có thanh RAM 2GB tặng kèm hồi mua máy Hp probook, không biết có tháo ra gắn qua máy này được không<br />
	<a>Trả lời</a><a>20 giờ trước</a><br />
	<a><strong>Nam Hải</strong><b>Quản trị viên</b></a>
	<p>Chào chị.&nbsp;</p>

	<p>Dạ hiện tại máy này&nbsp;RAM 8 GB, DDR4 (On board 4GB 1 khe 4GB) chị có thể tháo thanh 4GB ra thay RAM 2GB va ò sử dụng ạ.</p>

	<p>Thông tin đến chị !&nbsp;</p>
	<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>19 giờ trước</a><br />
	<a>D</a><br />
	<a><strong>Dương</strong></a><br />
	@Nam Hải: tức là máy này đang có ram 8GB và thêm 1 khe ram 4GB, hay máy có 2 thanh RAM 4GB, muốn thay phải tháo bớt 1 thanh ra ạ?<br />
	<a>Trả lời</a><a>19 giờ trước</a><br />
	<a><strong>Lê Huỳnh</strong><b>Quản trị viên</b></a><br />
	Dạ máy&nbsp;Lenovo IdeaPad S340 14IIL i5 1035G1/8GB/512GB/Win10 (81VV003SVN) này có Ram&nbsp;(On board 4GB 1 khe 4GB) tức là máy có&nbsp;1 cây Ram Onboard&nbsp;không&nbsp;tháo được, khe 4GB còn lại có thể tháo cây 4GB ra mua cây dung lượng cao hơn gắn vào tối đa chị có thể gắn vào khe này là 8GB DDR4&nbsp;2666 MHz ạ<br />
	Thông tin đến chị !&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>19 giờ trước</a></li>
	<li id=\"45050048\"><a>H</a><br />
	<a><strong>Hiếu</strong></a><br />
	Máy em bị lỗi cam khác phục sao ạ<br />
	<a>Trả lời</a><a>3 ngày trước</a><br />
	<a><strong>Quốc Tú</strong><b>Quản trị viên</b></a><br />
	Dạ chào anh , Dạ em xin lỗi để anh đợi lâu .<br />
	Dạ không biết lỗi camera là như nào ạ , anh mở camera không lên hay như nào ạ , anh có thể chụp lại màn hình camera không dùng được xem máy có báo lỗi gì không gửi lên bên em kiểm tra và hỗ trợ anh tốt hơn anh nhé<br />
	Mong nhận phản hồi từ anh ạ&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>3 ngày trước</a></li>
	<li id=\"45047919\"><a>D</a><br />
	<a><strong>Mạnh Dũng</strong></a><br />
	Heloooo shop ạ<br />
	<a>Trả lời</a><a>3 ngày trước</a><br />
	<a><strong>Nguyễn Tấn Phong</strong><b>Quản trị viên</b></a><br />
	Chào anh,<br />
	Dạ không biết bên em có thể hỗ trợ cho mình vấn đề gì vậy ạ?<br />
	Mong nhận phản hồi từ anh.<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>3 ngày trước</a></li>
	<li id=\"45047841\"><a>N</a><br />
	<a><strong>Nguyên</strong></a><br />
	Cho mình hỏi máy này còn ở khu vưc Châu Thành và TP Mỹ Tho tỉnh Tiền Giang không ạ<br />
	<a>Trả lời</a><a>3 ngày trước</a><br />
	<a><strong>Ngọc Thiện</strong><b>Quản trị viên</b></a><br />
	Chào anh.<br />
	Dạ hiện sản phẩm này không có hàng tại siêu thị khu vực của mình ạ. Dạ rất xin lỗi và mong mình thông cảm giúp em ạ<br />
	Thông tin đến anh.&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>3 ngày trước</a></li>
	<li id=\"45046011\"><a>H</a><br />
	<a><strong>Híu</strong></a><br />
	cho mình hỏi với con laptop Laptop Lenovo IdeaPad S340 14IIL i7 mình mua tầm 3 tháng Nay nó suất hiện lỗi pin, máy sạc chỉ lên được 60% là bị sao vậy ạ xin cách khắc phục với ạ cảm ơn!<br />
	<a>Trả lời</a><a>3 ngày trước</a><br />
	<a><strong>Thanh Hoàng</strong><b>Quản trị viên</b></a><br />
	Chào anh,&nbsp;<br />
	Dạ trường hợp này anh thử kiểm tra pin laptop<a href=\"https://www.thegioididong.com/tin-tuc/bat-mi-cach-kiem-tra-do-chai-pin-cua-laptop-khong-phan-mem-783339\" target=\"_blank\">&nbsp;tại đây&nbsp;</a>xem sao ạ<br />
	Thông tin đến anh.&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>3 ngày trước</a></li>
	<li id=\"45045979\"><a>V</a><br />
	<a><strong>Híu Võ</strong></a><br />
	cho mình hỏi với con laptop Laptop Lenovo IdeaPad S340 14IIL i7 mình mua tầm 3 tháng Nay nó suất hiện lỗi pin, máy sạc chỉ lên được 60% là bị sao vậy ạ xin cách khắc phục với ạ cảm ơn!<br />
	<a>Trả lời</a><a>3 ngày trước</a><br />
	<a><strong>Lê Huỳnh</strong><b>Quản trị viên</b></a><br />
	Chào anh,&nbsp;<br />
	Dạ trường hợp này anh giúp em là mình thử tắt máy sau đó sạc đầy lại không nên sử dụng máy trong quá trình sạc anh nha.<br />
	Thông tin đến anh !&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>3 ngày trước</a></li>
	<li id=\"45034460\"><a>N</a><br />
	<a><strong>Nguyễn Phước Ngọc</strong></a><br />
	Máy này còn ở chi nhánh Hậu Giang, Vị Thanh hk ạ<br />
	<a>Trả lời</a><a>4 ngày trước</a><br />
	<a><strong>Cẩm Nhung</strong><b>Quản trị viên</b></a><br />
	Chào anh,&nbsp;<br />
	Dạ hiện sản phẩm còn hàng ở&nbsp;Số 01 đường Ngô Quốc Trị, P.5, TP.Vị Thanh, Hậu Giang&nbsp; ạ&nbsp;<br />
	Thông tin đến anh.&nbsp;<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>4 ngày trước</a></li>
	<li id=\"45016336\"><a>V</a><br />
	<a><strong>Việt</strong></a><br />
	mình có check thì sản phẩm này không có hàng tại Ninh Bình, vậy nếu mình muốn mua thì phải làm sao ạ?<br />
	<a>Trả lời</a><a>6 ngày trước</a><br />
	<a><strong>Phi Phụng</strong><b>Quản trị viên</b></a><br />
	Chào anh,<br />
	Dạ rất tiếc hiện bên em tạm ngưng hỗ trợ chuyển hàng ạ mình vui lòng tham khảo lại vào 17/2 anh nha.<br />
	Thông tin đến anh.<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>6 ngày trước</a></li>
	<li id=\"44993652\"><a>T</a><br />
	<a><strong>Tiến</strong></a><br />
	Cần tv 1lap chơi game<br />
	<a>Trả lời</a><a>8 ngày trước</a><br />
	<a><strong>Nguyễn Tấn Phong</strong><b>Quản trị viên</b></a><br />
	Chào anh,<br />
	Không biết mình cần tìm sản phẩm ở tầm giá khoảng bao nhiêu vậy ạ?<br />
	Mong nhận phản hồi từ anh.<br />
	<a>Trả lời</a><a>Hài lòng</a><a>Không hài lòng</a><a>8 ngày trước</a></li>
</ul>



<h2>Thông số kỹ thuật</h2>

<ul>
	<li>CPU:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-vi-xu-ly-intel-core-the-he-10-1212148\" target=\"_blank\">Intel Core i5 Ice Lake</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/kham-pha-bo-vi-xu-ly-laptop-intel-core-i5-1035g1-1239768\" target=\"_blank\">1035G1</a>, 1.00 GHz</li>
	<li>RAM:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/ram-lap-top-la-gi-dung-luong-bao-nhieu-la-du-1172167\" target=\"_blank\">8 GB</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/ram-ddr4-la-gi-882173#ddr4\" target=\"_blank\">DDR4 (On board 4GB +1 khe 4GB)</a>, 2666 MHz</li>
	<li>Ổ cứng:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/o-cung-ssd-la-gi-923073\" target=\"_blank\">SSD 512 GB M.2 PCIe</a>, Hỗ trợ khe cắm HDD SATA</li>
	<li>Màn hình:<br />
	14 inch,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-fhd-la-gi-956294\" target=\"_blank\">Full HD (1920 x 1080)</a></li>
	<li>Card màn hình:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/card-do-hoa-tich-hop-la-gi-950047\" target=\"_blank\">Card đồ họa tích hợp</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/card-man-hinh-intel-uhd-graphics-tren-laptop-la-gi-1199634\" target=\"_blank\">Intel UHD Graphics</a></li>
	<li>Cổng kết nối:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/cac-tieu-chuan-cong-usb-tren-laptop-va-cach-phan-biet-1180516#usb-31\" target=\"_blank\">2 x USB 3.1</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/hoi-dap-hdmi-la-gi-930605\" target=\"_blank\">HDMI</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/usb-type-c-chua-n-mu-c-co-ng-ke-t-no-i-mo-i-723760\" target=\"_blank\">USB Type-C</a></li>
	<li>Hệ điều hành:<br />
	<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-windows-10-va-cac-phien-ban-cua-no-hie-1184370\" target=\"_blank\">Windows 10 Home SL</a></li>
	<li>Thiết kế:<br />
	Vỏ nhựa - nắp lưng bằng kim loại, PIN liền</li>
	<li>Kích thước:<br />
	Dày 17.9 mm, 1.6 kg</li>
	<li>Thời điểm ra mắt:<br />
	2019</li>
</ul>', 'máy tính', '', '', '1', '1', '1', '10', '7400000', '7600000', '1612489313', '35', '', '', '33', '1', '0', '3', '1', '7000000', '0', '0', '0', '0', '0', '7400000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('28', '10', 'SP716602555', 'Samsung Galaxy M51', 'Samsung-Galaxy-M51', '4', '4', '2', '400', '45', '3', '3', '1', '1', '1', '2021_02/samsung-galaxy-a51-8gb-xanh-600x600.11be6ee13002c1b59c50e052b69ffefb.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '5', '0', '0', '1612322228', '38', '1612406215', '3', '27', '1', '0', '0', '1', '5000000', '3200000', '3', '0', '1612345242', '1', '3200000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('29', '10', 'SP427336561', 'Realme C15', 'Realme-C15', '4', '4', '2', '300', '45', '3', '3', '1', '1', '1', '2021_02/oneplus-8-pro-600x600-2-600x600.415f2a6f426883f58897ae29a3df78a6.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '7', '0', '0', '1612322458', '38', '1612406208', '3', '28', '1', '0', '0', '4', '6000000', '4500000', '5', '0', '1612345239', '1', '4500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('31', '10', 'SP929185128', 'OnePlus 8 Pro 5G', 'OnePlus-8-Pro-5G', '4', '4', '2', '500', '45', '3', '3', '1', '1', '1', '2021_02/oneplus-8-pro-600x600-2-600x600.a6e156db0571649377f814046ce31dca.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '11', '0', '0', '1612323229', '38', '1612406192', '3', '30', '1', '0', '0', '1', '5000000', '4000000', '1', '0', '1612345225', '1', '4000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('32', '10', 'SP892903232', 'Vivo V20 (2021)', 'Vivo-V20-2021', '26', '4', '2', '300', '45', '3', '3', '1', '1', '1', '2021_02/iphone-12-pro-xanh-duong-new-600x600-600x600.7c199adfc7b58d99a1855721e245fa62.jpg', '', 'Giới thiệu ngắn gọn', 'Nội dung chi tiết', '', '', '', '1', '1', '1', '17', '0', '0', '1612323316', '38', '1612406185', '3', '31', '1', '0', '7', '4', '6000000', '0', '2.3', '0', '1612342600', '1', '6000000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('33', '10', 'SP090551470', 'sdsadsadsad', 'sdsadsadsad', '10', '4', '2', '23432', '45', '3', '3', '1', '1', '1', '2021_02/iphone-12-pro-xanh-duong-new-600x600-600x600.2545523df82da256a12d336f68a8adc6.jpg', '', 'sadsad', 'ádsa', '', '', '', '1', '1', '1', '4', '0', '0', '1612405886', '38', '1612406178', '3', '32', '1', '0', '4', '0', '324324', '234324', '0', '0', '0', '0', '234324')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (id, store_id, barcode, name_product, alias, categories_id, unit_id, unit_weight, weight_product, length_product, width_product, height_product, unit_length, unit_height, unit_width, image, other_image, description, bodytext, keyword, tag_title, tag_description, inhome, allowed_rating, showprice, number_view, price_min, price_max, time_add, user_add, time_edit, user_edit, weight, status, number_order, brand, origin, price, price_special, star, number_rate, time_push, mode_push, price_sort) VALUES('35', '14', 'SP001', 'Son 001', 'Son-001', '11', '4', '2', '6000', '20', '5', '5', '1', '1', '1', '2021_02/136741439_340603126919852_1522027247806152013_n.9a2443805f03ca74da944b7cc62de877.jpg', '2021_02/136745206_672593313434341_7039791220519445539_n.757d29aeeb3c93990200ecea3c26e7d9.jpg', 'dfdfygdfg', 'heshdshdf|', 'đt | ygtu', '', '', '1', '1', '1', '21', '0', '0', '1612516844', '46', '1612519533', '46', '34', '1', '0', '18', '1', '500000', '0', '0', '0', '0', '0', '500000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('1', 'Màu sắc', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('2', 'Size', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('3', 'Màu sắc', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('4', 'Size', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('5', 'Màu sắc', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('6', 'Size', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('7', 'Màu sắc', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('8', 'Màu sắc', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('9', 'Size', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('10', 'màu', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('11', 'màu', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('12', 'ewrewrew', '11', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('13', 'màu', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('14', 'Màu', '27', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify (id, name_classify, product_id, status) VALUES('15', 'Màu sắc', '34', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('1', '1', 'Vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('2', '1', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('3', '2', '32', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('4', '2', '31', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('5', '3', 'Vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('6', '3', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('7', '4', '32', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('8', '4', '34', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('9', '5', 'Vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('10', '5', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('11', '5', 'Xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('12', '6', '32', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('13', '6', '22', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('14', '5', 'Tím', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('15', '6', '24', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('16', '7', 'Vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('17', '7', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('18', '7', 'Xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('19', '8', 'Vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('20', '8', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('21', '9', '32', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('22', '9', '22', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('23', '10', 'đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('24', '10', 'xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('25', '10', 'vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('26', '11', 'đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('27', '11', 'xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('28', '12', 'ưerwer', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('29', '13', 'đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('30', '14', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('31', '14', 'Xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('32', '14', 'Đen', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('33', '15', 'Đỏ', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('34', '15', 'vàng', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value (id, classify_id, name, status) VALUES('35', '15', 'xanh', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('3', '1', '3', '80000', '70000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('4', '1', '4', '80000', '70000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('5', '2', '3', '70000', '60000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('6', '2', '4', '80000', '70000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('7', '5', '0', '20000', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('8', '6', '0', '20000', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('9', '5', '7', '222222', '100000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('10', '5', '8', '22222', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('11', '6', '7', '22222', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('12', '6', '8', '22222', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('13', '9', '0', '20000', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('14', '10', '0', '20000', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('15', '11', '0', '300000', '150000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('16', '9', '12', '1000000', '300000', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('17', '10', '12', '600000', '500000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('18', '11', '12', '750000', '350000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('19', '9', '13', '500000', '400000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('20', '10', '13', '300000', '200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('21', '11', '13', '1500000', '900000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('22', '9', '15', '800000', '700000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('23', '10', '15', '700000', '500000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('24', '11', '15', '900000', '850000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('25', '14', '12', '950000', '350000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('26', '14', '13', '850000', '400000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('27', '14', '15', '750000', '600000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('28', '16', '0', '200000', '100000', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('29', '17', '0', '20000', '10000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('30', '18', '0', '1111111', '11111', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('31', '19', '21', '1000000', '500000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('32', '20', '21', '300000', '200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('33', '19', '22', '100000', '50000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('34', '20', '22', '70000', '60000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('35', '23', '0', '300000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('36', '24', '0', '300000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('37', '25', '0', '300000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('38', '26', '0', '300000', '200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('39', '27', '0', '300000', '200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('40', '28', '0', '25432532', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('41', '29', '0', '500000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('42', '30', '0', '4500000', '4200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('43', '31', '0', '4500000', '4200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('44', '32', '0', '4500000', '4200000', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('45', '33', '0', '7400000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('46', '34', '0', '7500000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product (id, classify_id_value1, classify_id_value2, price, price_special, status) VALUES('47', '35', '0', '7600000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_push_product (id, product_id) VALUES('1', '25')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('22', '3', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '1', '1611634803', '', '3', '4', '2021_01/realme-c20-xanh-600x600-1-200x200.10236b30ffadd4b1c1cffe8dc4aa0e8b.jpg|2021_01/samsung-galaxy-a51-8gb-xanh-600x600.3a329218f9f6ea4f9c7130c867145a42.jpg|2021_01/tai-xuong-1.055903549b9d38e4042c0cbcdcbeb040.jpg|2021_01/tai-xuong-2.8c873a0733302f88e7b97935153df963.jpg')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('24', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634988', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('25', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('26', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('27', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('28', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('29', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('30', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('31', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('32', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('33', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('34', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('35', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('36', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('37', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('38', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('39', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('40', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('41', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('42', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('43', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('44', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('45', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('46', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('47', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('48', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('49', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('50', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('51', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('52', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('53', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('54', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('55', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('56', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('57', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('58', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('59', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('60', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('61', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('62', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('63', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('64', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('65', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('66', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('67', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('68', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('69', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('70', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('71', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('72', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('73', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('74', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('75', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('76', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('77', '2', 'Kệ lên đẹp, khá chắc chắn, tuy nhiên lỗ bắt ốc còn mảnh gỗ, chưa gọn gàng,  lớp sơn mỏng', '', '2', '1611634972', '1611906741', '3', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('78', '1', 'sfdsasdas', '', '2', '1611906754', '1611906808', '3', '2', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('79', '27', 'Nhận xét về sản phẩm', '', '1', '1612337200', '', '3', '4', '2021_02/images.3469cadaa0686184b49895d4249a3480.jpg|2021_02/iphone_logo.1af0b413d1c106958834642cc8b863ea.png|2021_02/iphone-12-pro-xanh-duong-new-600x600-600x600.96552fc6e67ca5df4797fcdee7568f0f.jpg|2021_02/kisspng-xiaomi-mi-5-xiaomi-mi-6-xiaomi-redmi-xiaomi-mi-1-mini-5ab53c5e5c3890.8061910615218269103778.d0975ebd96220e7f95483fb04b1810cf.jpg|2021_02/logo-vuong.830631d1018ea368ae372e831e8781f8.jpg|2021_02/logo-hp.e70d328b68128f7975bf464991cf4c0c.png')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('80', '2', 'nhận xét', '', '1', '1612337367', '', '38', '5', '2021_02/images.6152ba4474816d567380eca1a6f6127e.jpg|2021_02/iphone_logo.68d856e83e030b7404d829d7c6304774.png|2021_02/iphone-12-pro-xanh-duong-new-600x600-600x600.40143a51b704a914f603599989af956a.jpg|2021_02/kisspng-xiaomi-mi-5-xiaomi-mi-6-xiaomi-redmi-xiaomi-mi-1-mini-5ab53c5e5c3890.8061910615218269103778.e424335dc39d540ae52351a01e70ba49.jpg|2021_02/logo-vuong.abbbc8fe42f29daf0673d3c3741db7bd.jpg|2021_02/logo-hp.1cd8b2a4cfa69622df2f80c2ca73aea2.png')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate (id, product_id, content, image, status, time_add, time_edit, userid, star, other_image) VALUES('81', '25', 'sản phẩm tốt', '', '2', '1612496655', '1612496663', '3', '5', '2021_02/ipad-gen-8-wifi-vang-new-600x600-600x600.def83e2135b331f58614ac7a1fb38c27.jpg|2021_02/iphone-mini-do-new-600x600-600x600.34704a2f88cd286d0dc853b80ef96861.jpg')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('1', '27', 'TMS', '12515', '70', '7220', '72310', '', 'Nguyen Cong Quoc', '0374-973-039', 'canhbinh23@tms.vn', 'unnamed.png', 'unnamed (1).png', '2', 'THACH CANH BINH', '216161261261261', 'CN Đông Sài Gòn', '', '2', '1610702828', '', '', '1', '1', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('2', '28', 'Shop quốc tế', 'địa điểm xây dựng', '10', '1240', '12410', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '2', 'dsfdsgrfd', '43543543543', 'sdhsagdhsa', '', '28', '1611131785', '', '', '0', '2', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('3', '29', 'TMS', '12515', '10', '1424', '15346', '', 'Nguyen Cong Quoc', '0374-797-301', 'bnhthach@gmail.com', '233404.jpg', '1106.jpg', '2', 'THACH CANH BINH', '216161261261261', 'CN Đông Sài Gòn', '3,4', '29', '1611131938', '', '', '0', '3', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('4', '30', 'fdgfdgfd', 'địa điểm xây dựng', '17', '1734', '17341', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '5', 'dsfdsgrfd', '43543543543', 'sdhsagdhsa', '', '30', '1611133003', '', '', '0', '4', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('5', '31', 'fdgfdgfd', 'địa điểm xây dựng', '17', '1731', '17330', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '5', 'dsfdsgrfd', '43543543543', 'sdhsagdhsa', '', '31', '1611133295', '', '', '0', '5', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('6', '32', 'fdgfdgfd', 'địa điểm xây dựng', '16', '1616', '16166', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '5', 'dsfdsgrfd', '43543543543', 'sdhsagdhsa', '', '32', '1611133363', '', '', '0', '6', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('7', '33', 'fdgfdgfd', 'địa điểm xây dựng', '18', '1851', '18517', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '5', 'dsfdsgrfd', '43543543543', 'sdhsagdhsa', '', '33', '1611133426', '', '', '0', '7', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('8', '34', 'Shop Diwali', 'địa điểm xây dựng1', '16', '1632', '16323', 'sadsadsa', 'Hoạt động', '0465-748-576', 'gfhgkjhnv@gmail.com', 'tải xuống (2).jpg', 'ghe-luoi-xoay-van-phong-zela-2-gowell.jpg', '5', 'bình', '43543543543', 'sdhsagdhsa', '5', '34', '1611133537', '', '', '1', '8', 'photo-1-158270587240769675748.jpg', '1-15948998699171250460902.jpg', 'iphone-mini-do-new-600x600-600x600.afaaa083a4a41c6b6d1d0e7c5a1bcb6e.jpg,n6-mdjp.6b0d3eb8cf87f6122a7b226eb5f49711.jpg,photo-1-1534920773931958225603-1594279035913430103990.4c1258110c9a9fe9d3a1d54037077921.jpg,images.00d24f5ab0cd747adc7df20c2c29c156.jpg', 'Chào bạn. Mời bạn ghé shop tham khảo và đặt hàng
Xưởng LyLy - chuyên sỉ, lẻ, nhận đặt may theo y/c. Mang đến giá thành rẻ nhất cho quý khách!!
Fb cá nhân : Xưởng Sỉ Tuệ Nhi
Zalo, sdt : 0963401226')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('9', '36', 'Shop bán hàng đa cấp', 'đào duy từ', '70', '7250', '72550', '', 'thạch cảnh bìnhsad', '0374-658-475', 'binhcanh123@gmail.com', 'tải xuống (2).jpg', 'cohoangxuan-15940942708281465977546.jpg', '5', 'thạch cảnh bình', '043875523984637', 'chi nhánh quận 12', '6', '36', '1611281590', '', '', '1', '9', 'tuyen-tap-girl-xinh-cap-3-580x580.jpg', 'n6-MDJP.jpg', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('10', '38', 'tmsholding', '950/43 nguyễn kiệm', '70', '7270', '72780', 'fdgfdgd324', 'Phan Anh', '0384-756-475', 'anhnhim123@gmail.com', '1-15948998699171250460902.jpg', 'dfd.jpg', '2', 'anhnhim', '23454768779879', 'Chi nhánh quận 12', '7', '38', '1612319945', '', '', '1', '10', 'Vivo-New-Logo-2019.jpg', 'tải xuống (1).png', '82829150-online-shop-banner-shop-building-icon-online-grocery-shopping-market-basket-with-a-products-isometri.36c3359ac955e058ca8daf0d3cef99cf.jpg,83312781-hot-summer-sale-web-banner-template-or-discount-promo-shop-poster-vector-design-of-palm-leaf-pattern.a3c495a7dfa4e24c639b17b216101d01.jpg,images.e0abb742160e3e14cd87a06621bb76a2.jpg,shop-win-website-banner-01.4a58d0b64762528c8efa70090e0ed80c.jpg,special-offer-candy-shop-yellow-banner_23-2148391367.4f10a62f9f3db815c45e0a1e9d54d016.jpg,thiet-ke-banner-shop-thoi-trang-dep-1024x435.e8f95960dcd1d09ae74a10f43c24d06b.jpg', 'Cam kết hàng chính hãng, nếu sản phẩm không giống mẫu, trả hàng hoàn tiền ví shopee trong 7 ngày. 
- Bộ sản phẩm bao gồm: 
+ 01 x Tripod TF-3110
+ 01 x Giá đỡ điện thoại
- Chất liệu: Hợp kim nhôm.
- Chân máy đa năng Tripod với khả năng điều chỉnh chiều cao một cách linh hoạt từ 35 cm đến 105 cm để bạn thoải mái chụp ảnh ở nhiều góc độ khác nhau.Sản phẩm làm bằng inox và nhựa cao cấp với kiểu dáng hiện đại và nhỏ gọn, có thể dễ dàng mang theo khi đi du lịch, dã ngoại... Trục giữa linh hoạt có thể xoay lên, xuống và xoay tròn 360 độ giúp bạn dễ dàng bắt được những góc hình ưng ý nhất.  Đặc biệt bạn được tặng kèm 1 đầu cố định điện thoại và máy ảnh giúp cho bạn có thể dễ dàng có được những bức ảnh tuyệt đẹp cùng gia đình, bạn bè...

#tripod3120 #giado3chan #tripod3110 #tripodmayanh #tripoddienthoai #gaychupanh #chandemayanh #tripodtangremote #gaychupanhyt1288 #chanmayanhyt228 #gaychupanhselfien #gayselfie #yt1288 #yt228 #tripodyunteng #tripodyunteng3110 #3110 #3120')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('11', '40', 'Công ty siêu provip', '123 Cộng Hòa', '16', '1632', '16325', '84651230', 'Nguyễn Văn A', '4516-561-123', 'vohoatoi123@gmail.com', 'samsung-galaxy-note-10-plus-bac-6-180x125.jpg', 'samsung-galaxy-note-10-plus-bac-7-180x125.jpg', '6', 'Nguyễn Văn B', '0231842160.', 'Hà Nội', '', '40', '1612367291', '', '', '1', '11', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('13', '44', 'fdghfhgf', 'sdfgfdbhgcb cf', '17', '1761', '17623', 'dfghhmhvg', 'thachj canhr binhf', '0984-465-467', 'binhthach12dfssxzcsadsf345678@gmail.com', 'gai-xinh-tha-thinh-bang-nu-hon-ngot-ngao-nhieu-nam-sinh-hi-hung-cho-doi-va-cai-ket-cuoi-ra-nuoc-mat-dspl-1.jpg', 'cohoangxuan-15940942708281465977546.jpg', '5', 'thạch cảnh bình', '043875523984637', 'chi nhánh quận 12', '8', '44', '1612498109', '', '', '1', '12', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management (id, userid, company_name, address, province_id, district_id, ward_id, tax_code, name, phone, email, image_before, image_after, bank_id, acount_name, acount_number, branch_name, store, user_add, time_add, user_edit, time_edit, status, weight, cover_image, avatar_image, image_banner, description_shop) VALUES('14', '46', 'LaKa', '99A Cộng Hòa', '70', '7290', '72970', '123654789', 'ThanhCao', '0355-020-828', 'thanhcao.laka@gmail.com', 'pexels-ylanite-koppens-776635.png', '140613762_675876289772710_7560677859292812397_n.jpg', '6', 'Chưa đăng ký', 'Sao biết được', 'không xài nên không biết nó ở đâu', '9,10,11', '46', '1612511528', '', '', '1', '13', '', '', '', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order (ìd, status_id, name) VALUES('1', '0', 'Mới tạo')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order (ìd, status_id, name) VALUES('2', '1', 'Đã xác nhận')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order (ìd, status_id, name) VALUES('3', '2', 'Đang giao hàng')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order (ìd, status_id, name) VALUES('4', '3', 'Đã thành công, tiền đã nhận')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order (ìd, status_id, name) VALUES('5', '4', 'Hủy')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('1', 'ready_to_pick', 'Đơn hàng được tạo thành công

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('2', 'picking', 'Nhân viên giao hàng đang trên đường lấy hàng

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('3', 'cancel	
', 'Đơn hàng bị hủy

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('4', 'money_collect_picking	
', 'Nhân viên giao hàng đang tương tác với chủ shop

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('5', 'picked', 'Nhân viên giao hàng đã lấy hàng thành công

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('6', 'storing', 'Đơn hàng đang được lưu tại kho GHN

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('7', 'transporting', 'Đơn hàng đang được chung chuyển

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('8', 'sorting', 'Đơn hàng đang được phân loại tại kho phân loại

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('9', 'delivering', 'Đơn hàng đang được giao tới người nhận

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('10', 'money_collect_delivering', 'Nhân viên giao hàng đang tương tác với người bán

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('11', 'delivered', 'Đơn hàng được giao thành công

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('12', 'delivery_fail', 'Đơn hàng giao thất bại

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('13', 'waiting_to_return', 'Đơn hàng đang trong hàng chờ hoàn trả (có thể giao lại trong 24/48h)

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('14', 'return', 'Đơn hàng đang đợi nhân viên giao hàng đến trả cho chủ shop sau 3 lần giao hàng lại thất bại

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('15', 'return_transporting', 'Đơn hàng đang được chung chuyển giữa các kho

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('16', 'return_sorting	
', 'Đơn hàng đang được phân loại tại kho phân loại của GHN

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('17', 'returning', 'Nhân viên giao hàng đang đi trả hàng

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('18', 'return_fail', 'Đơn hàng bị trả thất bại

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('19', 'returned', 'Đơn hàng được hoàn trả thành công

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('20', 'exception	
', 'Đơn hàng được xử lý ngoại lệ (trường hợp không đi đúng quy trình)

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('21', 'damage', 'Đơn hàng bị tác động làm hư hại

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn (id, status, name) VALUES('22', 'lost	
', 'Đơn hàng bị mất

')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('1', '-1', 'Hủy đơn hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('2', '1', 'Chưa tiếp nhận
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('3', '2', 'Đã tiếp nhận')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('4', '3', 'Đã lấy hàng/Đã nhập kho
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('5', '4', 'Đã điều phối giao hàng/Đang giao hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('6', '5', 'Đã giao hàng/Chưa đối soát
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('7', '6', 'Đã đối soát
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('8', '7', 'Không lấy được hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('9', '8', 'Hoãn lấy hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('10', '9', 'Không giao được hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('11', '10', 'Delay giao hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('12', '11', 'Đã đối soát công nợ trả hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('13', '12', 'Đã điều phối lấy hàng/Đang lấy hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('14', '13', 'Đơn hàng bồi hoàn
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('15', '20', 'Đang trả hàng (COD cầm hàng đi trả)
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('16', '21', 'Đã trả hàng (COD đã trả xong hàng)
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('17', '123', 'Shipper báo đã lấy hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('18', '127', 'Shipper (nhân viên lấy/giao hàng) báo không lấy được hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('19', '128', 'Shipper báo delay lấy hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('20', '45', 'Shipper báo đã giao hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('21', '49', 'Shipper báo không giao được giao hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk (id, status, name) VALUES('22', '410', 'Shipper báo delay giao hàng
')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs (id, name_tabs, image, content_id, time_add, user_add, time_edit, user_edit, weight, status) VALUES('1', 'Chi tiết sản phẩm', '1200x630wa.png', '1', '1608709769', '2', '1608710769', '2', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs (id, name_tabs, image, content_id, time_add, user_add, time_edit, user_edit, weight, status) VALUES('2', 'Thảo luận', '1608710824.jpg', '2', '1608710593', '1', '1608710826', '2', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs (id, name_tabs, image, content_id, time_add, user_add, time_edit, user_edit, weight, status) VALUES('3', 'Đánh giá', 'icon-sinh-trac.gif', '3', '1608710599', '1', '1608710855', '2', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('1', 'Đồng giá 25k (SGN-DG)', 'SGN-DG', 'SGN-DG', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732615', '2', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('2', 'Giao hàng tiết kiệm', '', 'GHTK', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'image_2020_10_15t12_43_10_022z-64.png', '0', '10000', '1609732500', '2', '1', '13')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('3', 'Giao hàng nhanh (Standard)', '2', 'GHN', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'giao_hang_nhanh_toan_quoc_colorb7d18fe5_1594632551.png', '0', '0', '1609808550', '1', '1', '14')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('6', 'Viettel Post TMDT Bay', 'NCOD', 'Viettel Post', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'fot_payment2_logo_3_adeaafb66a984ecf9070f8f10d934158_large.png', '1', '10000', '1609732528', '2', '1', '16')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('5', 'VNPOST Tiết Kiệm', 'BK', 'VNPOST', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '500000000', '16000000', '160000000', '160000000', 'buu-dien-vnpost-1280x720.png', '1', '10000', '1612516302', '41', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('4', 'VNPOST Nhanh', 'EMS', 'VNPOST', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '5000', '160', '160', '160', 'buu-dien-vnpost-1280x720.png', '1', '10000', '1612519511', '41', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('7', 'Viettel Post TMDT Phát nhanh 2h', 'V02', 'Viettel Post', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'fot_payment2_logo_3_adeaafb66a984ecf9070f8f10d934158_large.png', '0', '0', '1609732537', '2', '1', '17')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('8', 'Viettel Post TMDT Bộ', 'LCOD', 'Viettel Post', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'fot_payment2_logo_3_adeaafb66a984ecf9070f8f10d934158_large.png', '1', '10000', '1609732545', '2', '1', '18')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('9', 'Viettel Post TMDT Phát hôm sau', 'PHS', 'Viettel Post', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'fot_payment2_logo_3_adeaafb66a984ecf9070f8f10d934158_large.png', '1', '10000', '1609732553', '2', '1', '19')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('11', 'Giao hàng nhanh (Express)', '1', 'GHN', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', 'giao_hang_nhanh_toan_quoc_colorb7d18fe5_1594632551.png', '1', '10000', '1609732519', '2', '1', '15')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('13', 'Giao gần (SGN-EXPRESS)', 'SGN-EXPRESS', 'SGN-EXPRESS', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732482', '2', '1', '11')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('14', 'Siêu tốc (SGN-BIKE)', 'SGN-BIKE', 'SGN-BIKE', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732474', '2', '1', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('15', 'Siêu rẻ (SGN-POOL)', 'SGN-POOL', 'SGN-POOL', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732647', '2', '1', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('16', '4h (SGN-SAMEDAY)', 'SGN-SAMEDAY', 'SGN-SAMEDAY', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732643', '2', '1', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('17', 'Giao gần (HAN-EXPRESS)', 'HAN-EXPRESS', 'HAN-EXPRESS', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732623', '2', '1', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('18', 'Siêu tốc (HAN-BIKE)', 'HAN-BIKE', 'HAN-BIKE', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732628', '2', '1', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('19', 'Siêu rẻ (HAN-POOL)', 'HAN-POOL', 'HAN-POOL', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732637', '2', '1', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('20', '4h (HAN-SAMEDAY)', 'HAN-SAMEDAY', 'HAN-SAMEDAY', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732492', '2', '1', '12')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters (id, name_transporters, code_transporters, symbol_transporters, description, max_weight, max_length, max_width, max_height, image, type, money, time_edit, user_edit, status, weight) VALUES('21', 'Đồng giá 25k (HAN-DG)', 'HAN-DG', 'HAN-DG', 'Thời gian giao hàng khoảng 2 ngày HCM và  5 - 7 ngày toàn quốc', '50000', '160', '160', '160', '1550114191385-qa53mg.png', '1', '10000', '1609732619', '2', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('1', '16', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('4', '16', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('5', '16', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('6', '11', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('7', '11', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('8', '11', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('9', '11', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('10', '11', '17', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('11', '11', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('12', '11', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('13', '11', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('14', '11', '11', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('15', '11', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('16', '11', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('17', '11', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('18', '11', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('19', '11', '19', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('20', '11', '16', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('21', '11', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('22', '11', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('23', '11', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('24', '11', '20', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('25', '15', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('26', '16', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('27', '16', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('28', '16', '17', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('29', '16', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('30', '16', '19', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('31', '16', '16', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('32', '16', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('33', '16', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('34', '16', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('35', '16', '20', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('36', '1', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('37', '1', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('38', '10', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('39', '10', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('40', '10', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('41', '10', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('42', '10', '17', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('43', '10', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('44', '10', '19', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('45', '10', '16', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('46', '10', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('47', '10', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('48', '10', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('49', '10', '20', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('50', '10', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('51', '10', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('52', '10', '11', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('53', '10', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('54', '10', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('55', '10', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('56', '10', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('57', '14', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('58', '14', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('59', '14', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('60', '14', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('61', '14', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('62', '14', '17', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('63', '14', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('64', '14', '19', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('65', '14', '16', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('66', '14', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('67', '14', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('68', '14', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('69', '14', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('70', '14', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('71', '14', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('72', '14', '11', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('73', '14', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('74', '14', '20', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop (id, sell_id, transporters_id, status) VALUES('75', '14', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('4', 'Combo', '1608799147', '1', '1', '1608799152', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('5', 'Cái', '1611299308', '1', '', '', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('6', 'Chiếc', '1611299311', '1', '1', '1611299316', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('7', 'Đôi', '1612514908', '41', '', '', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('8', 'Chai', '1612514935', '41', '', '', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (id, name, time_add, user_add, time_edit, user_edit, weight, status) VALUES('9', 'Tuýp', '1612514960', '41', '', '', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency (id, name_currency, symbol, exchange, time_add, user_add, time_edit, user_edit, status, weight) VALUES('1', 'Vietnam Dong', 'đ', '1', '1608714257', '2', '1608952053', '2', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency (id, name_currency, symbol, exchange, time_add, user_add, time_edit, user_edit, status, weight) VALUES('2', 'US Dollar', '$', '21000', '1608714262', '2', '1608952028', '2', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency (id, name_currency, symbol, exchange, time_add, user_add, time_edit, user_edit, status, weight) VALUES('4', 'Euro (EUR)', '€', '27994.43', '1608952360', '2', '1608952398', '2', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_length (id, name_length, symbol, exchange, time_add, user_add, time_edit, user_edit, status, length) VALUES('1', 'Cm', 'cm', '1', '1608785942', '2', '1611301068', '1', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_length (id, name_length, symbol, exchange, time_add, user_add, time_edit, user_edit, status, length) VALUES('2', 'Met', 'm', '100', '1608785955', '2', '1608799364', '1', '0', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_weight (id, name_weight, symbol, exchange, time_add, user_add, time_edit, user_edit, status, weight) VALUES('2', 'Gram', 'g', '1', '1608708187', '2', '1608971919', '2', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_weight (id, name_weight, symbol, exchange, time_add, user_add, time_edit, user_edit, status, weight) VALUES('3', 'Kilogam', 'kg', '1000', '1608714236', '2', '1608971925', '2', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('1', '1', 'Kho hàng 1', 'Thạch Cảnh Bình', '0374-973-039', '2151651', '70', '7250', '72600', '1422063', '10.7991944', '106.6802639', '8701008', '358755', '2', '1610702828', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('2', '1', 'Kho hàng 2', 'Thạch Cảnh Bình', '0374-973-039', '161261', '70', '7220', '72240', '1422064', '10.7834495', '106.6936593', '8701008', '358755', '2', '1610702828', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('3', '3', 'Kho hàng 1', 'Thạch Cảnh Bình', '0374-797-301', '2151651', '70', '7270', '72710', '1427649', '10.8273911', '106.6838929', '8716286', '358755', '29', '1611131938', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('4', '3', 'Kho hàng 2', 'Thạch Cảnh Bình', '0374-797-301', '2151651', '70', '7220', '72310', '1427650', '10.7843695', '106.6844089', '8716480', '358755', '29', '1611131938', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('5', '8', 'dsgdsfdsf', 'dfsdfsdf', '0374-973-039', 'địa điểm xây dựng', '70', '7270', '72810', '1427701', '10.8480383', '106.6790006', '8716538', '358755', '34', '1611133537', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('6', '9', 'kho quận 1', 'thạch cảnh bình', '0374-973-038', 'địa chỉ tuyển dụng', '70', '7220', '72310', '1429524', '10.7821239', '106.6848999', '8721294', '358755', '36', '1611281590', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('7', '10', 'kho hồ chí minh', 'Phan Anh', '0384-756-475', '950/43 nguyễn kiệm', '70', '7270', '72780', '1444394', '10.8243596', '106.6793723', '8756748', '358755', '38', '1612319945', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('8', '13', 'kho quận 1', 'thạch cảnh bình', '0984-465-467', 'sdfgfdbhgcb cf', '70', '7200', '72070', '1447716', '10.8470863', '106.7512794', '8762206', '358755', '44', '1612498109', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('9', '14', 'nhà nv1', 'NV01', '0355-020-828', '99A Cộng Hòa', '16', '1632', '16327', '1448102', '20.9121135', '106.0904721', '8763048', '358755', '46', '1612511528', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('10', '14', 'nhà nv2', 'NV02', '0355-020-828', '2222', '10', '1250', '12630', '1448103', '21.0267986', '105.9006428', '8763048', '358755', '46', '1612511528', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse (id, sell_id, name_warehouse, name_send, phone_send, address, province_id, district_id, ward_id, shops_id_ghn, lat, lng, groupaddressId, cusId, user_add, time_add, user_edit, time_edit, status) VALUES('11', '14', 'nhà nv3', 'NV03', '0355-020-828', 'sc', '20', '2063', '20635', '1448104', '21.4591746', '107.5505152', '8763049', '358755', '46', '1612511528', '', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('1', 'NK000001', '1', '1', 'test', '1600', '800', '1610705320', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('3', 'NK000002', '1', '1', 'test', '3', '200', '1610707000', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('4', 'NK000004', '1', '1', 'Theo dõi báo cáo', '5000000', '100', '1610760965', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('5', 'NK000005', '1', '1', 'Theo dõi báo cáo', '304', '200', '1610763963', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('6', 'NK000006', '1', '1', 'nhap kho', '333', '30', '1610772853', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('7', 'NK000007', '1', '1', 'Nhập kho ngày: 16-01-2021', '2400', '1200', '1610783775', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('8', 'NK000008', '1', '1', 'Nhập kho ngày: 18-01-2021', '440', '30', '1610935147', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('9', 'NK000009', '1', '1', 'Nhập kho ngày: 18-01-2021', '400', '40', '1610940211', '27')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('10', 'NK0000010', '1', '1', 'Nhập kho ngày: 18-01-2021', '5000000', '1', '1610945615', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('11', 'NK0000011', '1', '1', 'Nhập kho ngày: 18-01-2021', '5000000', '100', '1610945643', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('12', 'NK0000012', '8', '5', 'Nhập kho ngày: 20-01-2021', '100', '11', '1611134302', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('13', 'NK0000013', '8', '5', 'Nhập kho ngày: 20-01-2021', '150', '3', '1611134316', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('14', 'NK0000014', '1', '1', 'Nhập kho ngày: 21-01-2021', '20', '52', '1611192421', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('15', 'NK0000015', '1', '2', 'Nhập kho ngày: 21-01-2021', '20', '52', '1611192473', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('16', 'NK0000016', '1', '1', 'Nhập kho ngày: 21-01-2021', '200', '47', '1611192558', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('17', 'NK0000017', '9', '6', 'Nhập kho ngày: 22-01-2021', '111111', '1', '1611291863', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('18', 'NK0000018', '9', '6', 'Nhập kho ngày: 22-01-2021', '11111', '111', '1611291873', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('19', 'NK0000019', '8', '5', 'Nhập kho ngày: 22-01-2021', '324', '10', '1611303570', '34')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('20', 'NK0000020', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '100', '1611367634', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('21', 'NK0000021', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '10', '1611367641', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('22', 'NK0000022', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '100', '1611367649', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('23', 'NK0000023', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '10', '1611367656', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('24', 'NK0000024', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '10', '1611367662', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('25', 'NK0000025', '9', '6', 'Nhập kho ngày: 23-01-2021', '40000', '10', '1611367669', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('26', 'NK0000026', '9', '6', 'Nhập kho ngày: 23-01-2021', '40', '10', '1611367678', '36')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('28', 'NK0000027', '1', '1', 'Nhập kho ngày: 28-01-2021', '110', '2', '1611799893', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('29', 'NK0000029', '1', '1', 'Nhập kho ngày: 28-01-2021', '110000', '20', '1611799951', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('30', 'NK0000030', '10', '7', 'Nhập kho ngày: 03-02-2021', '12000000', '35', '1612321962', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('31', 'NK0000031', '10', '7', 'Nhập kho ngày: 03-02-2021', '2000000', '10', '1612321985', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('32', 'NK0000032', '10', '7', 'Nhập kho ngày: 03-02-2021', '10000000', '10', '1612321999', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('33', 'NK0000033', '10', '7', 'Nhập kho ngày: 03-02-2021', '3000000', '15', '1612322272', '38')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('34', 'NK0000034', '10', '7', 'Nhập kho ngày: 03-02-2021', '5000000', '100', '1612363019', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('35', 'NK0000035', '10', '7', 'Nhập kho ngày: 03-02-2021', '5000000', '1', '1612364036', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('36', 'NK0000036', '9', '6', 'Nhập kho ngày: 05-02-2021', '21000', '30', '1612489330', '35')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('37', 'NK0000037', '14', '9', 'Nhập kho ngày: 05-02-2021', '400000', '100', '1612516878', '46')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('38', 'NK0000038', '14', '10', 'Nhập kho ngày: 05-02-2021', '40000', '1100', '1612516889', '46')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import (warehouse_product_import_id, warehouse_product_import_code, store_id, warehouse_id, title, total_price, total_amount, time_add, user_add) VALUES('39', 'NK0000039', '14', '11', 'Nhập kho ngày: 05-02-2021', '400000', '1100', '1612516898', '46')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('1', '1', '1', '1', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('2', '1', '1', '16', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('3', '1', '1', '17', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('4', '1', '1', '18', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('5', '1', '1', '19', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('6', '1', '1', '20', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('7', '1', '1', '21', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('8', '1', '1', '22', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('12', '3', '3', '26', '2000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('11', '3', '3', '25', '1000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('13', '4', '2', '0', '5000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('14', '5', '4', '27', '4000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('15', '5', '4', '28', '300000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('16', '6', '4', '28', '111111', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('17', '6', '4', '29', '111111', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('18', '6', '4', '30', '111111', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('19', '7', '3', '16', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('20', '7', '3', '19', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('21', '7', '3', '22', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('22', '7', '3', '17', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('23', '7', '3', '20', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('24', '7', '3', '23', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('25', '7', '3', '18', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('26', '7', '3', '21', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('27', '7', '3', '24', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('28', '7', '3', '25', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('29', '7', '3', '26', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('30', '7', '3', '27', '200000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('31', '8', '2', '9', '110000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('32', '8', '2', '10', '110000', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('33', '8', '2', '11', '110000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('34', '8', '2', '12', '110000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('35', '9', '5', '31', '100000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('36', '9', '5', '33', '100000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('37', '9', '5', '32', '100000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('38', '9', '5', '34', '100000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('39', '10', '6', '0', '5000000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('40', '11', '6', '0', '5000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('41', '12', '8', '38', '50000', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('42', '12', '8', '39', '50000', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('43', '13', '7', '35', '50000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('44', '13', '7', '36', '50000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('45', '13', '7', '37', '50000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('46', '14', '2', '9', '5', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('47', '14', '2', '10', '5', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('48', '14', '2', '11', '5', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('49', '14', '2', '12', '5', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('50', '15', '2', '9', '5000', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('51', '15', '2', '10', '5000', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('52', '15', '2', '11', '5000', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('53', '15', '2', '12', '5000', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('54', '16', '1', '3', '50000', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('55', '16', '1', '4', '50000', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('56', '16', '1', '5', '50000', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('57', '16', '1', '6', '50000', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('58', '17', '10', '0', '111111', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('59', '18', '9', '0', '11111', '111', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('60', '19', '11', '40', '324234', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('61', '20', '19', '0', '40000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('62', '21', '18', '0', '40000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('63', '22', '17', '0', '40000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('64', '23', '16', '0', '40000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('65', '24', '15', '0', '40000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('66', '25', '14', '0', '40000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('67', '26', '13', '41', '40000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('68', '27', '4', '29', '100000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('69', '27', '4', '30', '10000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('70', '28', '4', '29', '100000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('71', '28', '4', '30', '10000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('72', '29', '4', '29', '100000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('73', '29', '4', '30', '10000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('74', '30', '27', '42', '4000000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('75', '30', '27', '43', '4000000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('76', '30', '27', '44', '4000000', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('77', '31', '26', '0', '2000000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('78', '32', '25', '0', '10000000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('79', '33', '28', '0', '3000000', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('80', '34', '32', '0', '5000000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('81', '35', '31', '0', '5000000', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('82', '36', '34', '45', '7000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('83', '36', '34', '46', '7000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('84', '36', '34', '47', '7000', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('85', '37', '35', '0', '400000', '100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('86', '38', '35', '0', '40000', '1100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item (id, warehouse_product_import_id, product_id, classify_value_product_id, price_import, amount, unit_currency) VALUES('87', '39', '35', '0', '400000', '1100', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('32', '2', '1611225858', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('37', '7', '1611225865', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('15', '8', '1611134685', '34', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('16', '7', '1611134688', '34', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('36', '5', '1611225863', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('35', '1', '1611225862', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('34', '4', '1611225860', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('33', '3', '1611225859', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('54', '11', '1611298094', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('53', '5', '1611292576', '36', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('52', '9', '1611292567', '36', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('51', '10', '1611292566', '36', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('75', '4', '1612149221', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('73', '7', '1612146582', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('71', '12', '1611741920', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('84', '2', '1612240746', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('57', '10', '1611309788', '34', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('59', '16', '1611373022', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('61', '1', '1611385535', '36', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('62', '9', '1611391344', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('63', '10', '1611391345', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('64', '12', '1611391347', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('65', '6', '1611391348', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('92', '34', '1612489615', '39', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('89', '9', '1612410525', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('93', '3', '1612498352', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('78', '22', '1612161176', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('80', '5', '1612164688', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('81', '19', '1612165374', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('82', '13', '1612165379', '3', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('95', '4', '1612512210', '47', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('86', '27', '1612327332', '38', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('87', '26', '1612363294', '35', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist (id, product_id, time_add, userid, shop_id) VALUES('88', '32', '1612363524', '35', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
