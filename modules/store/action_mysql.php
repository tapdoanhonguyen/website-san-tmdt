<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 18 Dec 2023 09:54:39 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_address";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_complain";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_complain_status";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_feedback";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_admin";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn_api";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghtk";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghtk_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_payment";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpay";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpos";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpos_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_not_received";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_punish";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_punish_complain";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_seller_delivery_failed";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher_admin";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment_refund";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_penalize";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_old";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_temp";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_push_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_register_contact";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_promotion";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_error_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_error_ghtk";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_vnpay";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_vnpos";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_test_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_length";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_weight";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vnpay_refund";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_ecng";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet_ecng";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_transport";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_address(
  id int(11) NOT NULL AUTO_INCREMENT,
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  userid int(11) NOT NULL,
  status int(11) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  ward_id int(11) NOT NULL,
  district_id int(11) NOT NULL,
  province_id int(11) NOT NULL,
  phone text COLLATE utf8mb4_unicode_ci NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  lat double DEFAULT 0,
  lng double DEFAULT 0,
  centerlat double DEFAULT 0,
  centerlng double DEFAULT 0,
  maps_mapzoom double DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank(
  bank_id int(11) NOT NULL AUTO_INCREMENT,
  bank_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã code ngân hàng',
  name_bank varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên ngân hàng',
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (bank_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  keyword varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Từ khóa',
  description_block varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Miêu tả',
  bodytext text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung chi tiết',
  other text COLLATE utf8mb4_unicode_ci NOT NULL,
  tag_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề seo',
  tag_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả seo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id) USING BTREE
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id(
  id int(11) NOT NULL AUTO_INCREMENT,
  bid int(11) NOT NULL COMMENT 'ID BLOCK',
  product_id int(11) NOT NULL COMMENT 'ID Sản phẩm',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  logo varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  alias varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chuyên mục',
  alias varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  parrent_id int(11) NOT NULL DEFAULT 0,
  percent_discount float DEFAULT 0 COMMENT 'Phần trăm chiết khấu',
  keyword varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  other_image text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  description text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  viewdescriptionhtml int(11) NOT NULL,
  groups_view blob NOT NULL,
  inhome int(11) NOT NULL DEFAULT 1,
  viewcat int(11) NOT NULL DEFAULT 1,
  numlinks int(11) NOT NULL DEFAULT 4,
  idsite int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  brand blob DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  id_shop int(11) NOT NULL,
  alias varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  parentid int(11) NOT NULL,
  description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_category_shop int(11) NOT NULL,
  product_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_complain(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL COMMENT 'Mã đơn hàng',
  product_id varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Sản phẩm',
  images varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  images_video varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh hoặc video',
  reason text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Lý do',
  ship int(10) NOT NULL DEFAULT 1 COMMENT '1 Seller, 2 KH chịu phí ship',
  status int(11) DEFAULT 0 COMMENT 'Trạng thái xử lý',
  time_add int(11) NOT NULL,
  time_edit int(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_complain_status(
  id int(11) NOT NULL AUTO_INCREMENT,
  complain_status varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trạng thái',
  seller_or_customer int(10) DEFAULT 0 COMMENT '0 ECNG, 1 Seller, 2 KH',
  status int(11) DEFAULT 0,
  weight int(11) DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config(
  id int(11) NOT NULL AUTO_INCREMENT,
  config_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  config_value longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer(
  id int(11) NOT NULL AUTO_INCREMENT,
  phone varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  userid int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_feedback(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_complain int(11) NOT NULL,
  content varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  time_add int(11) NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow(
  id int(11) NOT NULL AUTO_INCREMENT,
  shop_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_admin(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid mediumint(8) DEFAULT NULL COMMENT 'Admin xử lý',
  content text CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Thông tin xử lý',
  time_add int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT 0,
  user_add mediumint(8) DEFAULT NULL COMMENT 'Người thêm',
  order_code varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Mã đơn hàng',
  fee double DEFAULT 0 COMMENT 'Cước chính',
  insurance_fee double DEFAULT 0 COMMENT 'Phí khai giá',
  station_send_fee double DEFAULT 0 COMMENT 'Phí gửi hàng tại bưu cục',
  station_get_fee double DEFAULT 0 COMMENT 'Phí lấy hàng tại bưu cục',
  return_fee double DEFAULT 0 COMMENT 'Phí hoàn hàng',
  r2s_fee double DEFAULT 0 COMMENT 'Phí giao lại hàng',
  total_fee double DEFAULT 0 COMMENT 'Tổng ship',
  cod double DEFAULT 0 COMMENT 'Tiền thu hộ',
  status varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Trạng thái ',
  message varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mess trả về',
  time_add int(11) DEFAULT NULL COMMENT 'Ngày tạo',
  time_edit int(11) DEFAULT 0 COMMENT 'Ngày sửa',
  for_control tinyint(2) DEFAULT 0 COMMENT 'Đối soát 0 chưa đối soát, 1 đã đối soát',
  address_send varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ lên vận đơn',
  phone_send varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Số điện thoại lên vận đơn',
  name_send varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên shop lên vận đơn',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn_api(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT 0,
  order_code varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Mã đơn hàng',
  fee_api double DEFAULT 0 COMMENT 'Cước chính',
  insurance_fee_api double DEFAULT 0 COMMENT 'Phí khai giá',
  station_send_fee_api double DEFAULT 0 COMMENT 'Phí gửi hàng tại bưu cục',
  station_get_fee_api double DEFAULT 0 COMMENT 'Phí lấy hàng tại bưu cục',
  return_fee_api double DEFAULT 0 COMMENT 'Phí hoàn hàng',
  r2s_fee_api double DEFAULT 0 COMMENT 'Phí giao lại hàng',
  total_fee_api double DEFAULT 0 COMMENT 'Tổng ship',
  converted_weight mediumint(8) DEFAULT 0 COMMENT 'Khối lượng quy đổi',
  weight mediumint(8) DEFAULT 0 COMMENT 'Khối lượng',
  length mediumint(8) DEFAULT 0 COMMENT 'Chiều dài',
  width mediumint(8) DEFAULT 0 COMMENT 'Chiều rộng',
  height mediumint(8) DEFAULT 0 COMMENT 'Chiều cao',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghn_detail(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT 0,
  order_code varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT ' Mã đơn hàng',
  status varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT ' Status khóa ngoại status bảng ghn',
  warehouse varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thông tin kho',
  reason_code varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã code lý do giao thất bại',
  reason varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'lý do',
  time_add int(11) DEFAULT NULL COMMENT 'Ngày tạo',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghtk(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT 0,
  user_add mediumint(8) DEFAULT 0 COMMENT 'Người tạo đơn',
  label varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT ' Mã đơn hàng',
  fee double NOT NULL DEFAULT 0 COMMENT 'Phí dịch vụ cuối cùng',
  insurance_fee double DEFAULT 0 COMMENT 'Phí bảo hiểm',
  status_id tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn',
  weight double DEFAULT 0 COMMENT 'khối lượng đơn hàng tính theo kilogram',
  fee_update double DEFAULT 0 COMMENT 'Phí dịch vụ được GHTK cập nhật',
  pick_money double DEFAULT 0 COMMENT 'Phí thu hộ',
  time_add int(11) DEFAULT NULL COMMENT 'Ngày tạo',
  time_edit int(11) DEFAULT 0 COMMENT 'Ngày sửa',
  for_control tinyint(2) DEFAULT 0 COMMENT '0 chưa đối soát, 1 đã đối soát	',
  for_control_return tinyint(2) DEFAULT 0 COMMENT '0 chưa đối soát, 1 đã đối soát	',
  address_send varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ lên vận đơn',
  phone_send varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Số điện thoại lên vận đơn',
  name_send varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên shop lên vận đơn',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_ghtk_detail(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT 0,
  label varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT ' Mã đơn hàng',
  status_id tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn',
  reason_code varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Mã lý do cập nhật',
  reason varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Lý do chi tiết cập nhật',
  time_add int(11) DEFAULT NULL COMMENT 'Ngày tạo',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_payment(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  price double NOT NULL DEFAULT 0 COMMENT 'Số tiền thanh toán',
  fee_shipping double NOT NULL DEFAULT 0,
  name_register varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đầy đủ',
  email_register varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Email',
  phone_register varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Số điện thoại',
  userid varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Tài khoản thanh toán',
  payment_method varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  requestid varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'requestid',
  orderid varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Mã đơn hàng',
  orderinfo varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Nội dung thanh toán',
  responsedode varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Mã phản hồi',
  transactionno varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Mã GD Tại VNPAY',
  bankcode varchar(255) CHARACTER SET latin1 DEFAULT '' COMMENT 'Mã Ngân hàng',
  cardtype varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  paydate int(10) DEFAULT 0 COMMENT 'Thời gian thanh toán',
  status varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Trạng thái thanh toán',
  addtime int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpay(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  price double NOT NULL DEFAULT 0 COMMENT 'Số tiền thanh toán',
  name_register varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đầy đủ',
  email_register varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Email',
  phone_register varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Số điện thoại',
  userid varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Tài khoản thanh toán',
  vnp_txnref varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Mã đơn hàng',
  vnp_orderinfo varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Nội dung thanh toán',
  vnp_responsedode varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Mã phản hồi',
  vnp_transactionno varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Mã GD Tại VNPAY',
  vnp_bankcode varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Mã Ngân hàng',
  vnp_cardtype varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thẻ',
  vnp_paydate varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thời gian thanh toán',
  status varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Trạng thái thanh toán',
  addtime int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpos(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(10) DEFAULT 0 COMMENT 'order_id',
  id_vnpost varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID VNPOST',
  order_code varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Mã đơn hàng',
  name_products text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Danh sách sản phẩm',
  total_weight_convert double NOT NULL DEFAULT 0 COMMENT 'Tổng cân nặng thực tế',
  total_weight double NOT NULL DEFAULT 0 COMMENT 'Tổng cân nặng',
  total_length double NOT NULL DEFAULT 0 COMMENT 'Tổng chiều dài',
  total_width double NOT NULL DEFAULT 0 COMMENT 'Tổng chiều rộng',
  total_height double NOT NULL DEFAULT 0 COMMENT 'Tổng chiều cao',
  total_moeny double NOT NULL DEFAULT 0 COMMENT 'Tổng tiền hàng',
  tinhthanh_gui int(10) DEFAULT 0 COMMENT 'Tỉnh thành gửi',
  quanhuyen_gui int(10) DEFAULT 0 COMMENT 'Quận huyện gửi',
  address_gui varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ gửi',
  phone_gui varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại gửi',
  name_gui varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên người gửi',
  userid_add int(10) DEFAULT 0 COMMENT 'Tài khoản lên đơn',
  userid_edit int(10) NOT NULL DEFAULT 0 COMMENT 'Tài khoản chỉnh sửa',
  tinhthanh_nhan int(10) DEFAULT 0 COMMENT 'Tỉnh thành nhận',
  quanhuyen_nhan int(10) DEFAULT 0 COMMENT 'Quận huyện nhận',
  address_nhan varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ nhận',
  phone_nhan varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại nhận',
  name_nhan varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên người nhận',
  item_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã vận đơn',
  cuoc_phi double NOT NULL DEFAULT 0 COMMENT 'Cước phí',
  tongcuocdichvucongthem double NOT NULL DEFAULT 0 COMMENT 'TongCuocDichVuCongThem',
  tongcuocbaogomdvct double NOT NULL DEFAULT 0 COMMENT 'TongCuocBaoGomDVCT',
  hinhthuc_vc varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình thức vận chuyển',
  vnpost_status int(10) DEFAULT 0 COMMENT 'Trạng thái vận chuyển',
  customer_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã KH lên đơn',
  weight double NOT NULL DEFAULT 0 COMMENT 'Trọng lượng thực tính',
  weightconvert double NOT NULL DEFAULT 0 COMMENT 'Trọng lượng quy đổi thực tính',
  width double NOT NULL DEFAULT 0 COMMENT 'Chiều rộng thực tính',
  length double NOT NULL DEFAULT 0 COMMENT 'Chiều dài thực tính',
  height double NOT NULL DEFAULT 0 COMMENT 'Chiều cao thực tính',
  cuocphi_thuctinh double NOT NULL DEFAULT 0,
  cod double NOT NULL DEFAULT 0 COMMENT 'Thu hộ',
  date_add int(10) DEFAULT 0 COMMENT 'Ngày tạo',
  date_edit int(10) DEFAULT NULL,
  doisoat int(10) DEFAULT 0 COMMENT 'Đối soát 0 chưa đối soát, 1 đã đối soát',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_history_vnpos_detail(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(100) NOT NULL DEFAULT 0,
  itemcode varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ItemCode',
  status_vnpost int(10) DEFAULT 0 COMMENT 'Trạng thái',
  user_add int(10) NOT NULL DEFAULT 0,
  addtime int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL,
  warehouse_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  classify_value_product_id int(11) NOT NULL COMMENT 'ID Phân loại sản phẩm',
  amount int(11) DEFAULT NULL COMMENT 'Số lượng tồn kho',
  amount_delivery int(11) DEFAULT NULL COMMENT 'Số lượng đang giao',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL,
  status_id_old int(11) NOT NULL,
  content text COLLATE utf8mb4_unicode_ci NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  order_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã đơn hàng',
  store_id int(11) NOT NULL COMMENT 'ID Cửa hàng',
  warehouse_id int(11) NOT NULL COMMENT 'ID Kho hàng',
  order_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên người mua',
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email người mua',
  phone varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại người mua',
  province_id int(11) NOT NULL COMMENT 'Thành phố',
  district_id int(11) NOT NULL COMMENT 'Quận huyện',
  ward_id int(11) NOT NULL COMMENT 'Phường xã',
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ ngắn gọn',
  lat text COLLATE utf8mb4_unicode_ci NOT NULL,
  lng text COLLATE utf8mb4_unicode_ci NOT NULL,
  transporters_id int(11) NOT NULL COMMENT 'ID Nhà vận chuyển',
  total_product double NOT NULL COMMENT 'Tổng tiền hàng',
  total_weight int(11) NOT NULL COMMENT 'Tổng khối lương',
  total_height int(11) NOT NULL COMMENT 'Tổng chiều cao',
  total_width int(11) NOT NULL COMMENT 'Tổng chiều rộng',
  total_length int(11) NOT NULL COMMENT 'Tổng chiều dài',
  payment double NOT NULL DEFAULT 0 COMMENT 'Số tiền đã thanh toán',
  payment_method varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Phương thức thành toán',
  fee_transport double NOT NULL COMMENT 'Phí vận chuyển',
  shipping_code text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã vận chuyển',
  total double NOT NULL COMMENT 'Tổng cộng',
  note varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ghi chú cho người bán',
  link_check_ahamove_order text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT 0 COMMENT 'Thời gian cập nhật trạng thái',
  status int(11) NOT NULL,
  plus_money int(11) NOT NULL DEFAULT 0 COMMENT 'Đã cộng tiền hay chưa (1 là rồi, 0 là chưa)',
  status_payment_vnpay int(11) NOT NULL DEFAULT 0,
  vnpay_code varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  voucher_id_shop int(11) NOT NULL DEFAULT 0 COMMENT 'id voucher shop',
  voucher_price_shop int(11) NOT NULL DEFAULT 0 COMMENT 'giá giảm của voucher shop',
  voucher_id_ecng int(11) NOT NULL DEFAULT 0 COMMENT 'id voucher sàn',
  voucher_price_ecng int(11) NOT NULL DEFAULT 0 COMMENT 'giá giảm của voucher sàn',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL COMMENT 'ID Đơn hàng',
  product_id int(11) NOT NULL COMMENT 'ID Product',
  weight int(11) NOT NULL,
  length int(11) NOT NULL,
  height int(11) NOT NULL,
  width int(11) NOT NULL,
  price double NOT NULL COMMENT 'Giá sản phẩm',
  classify_value_product_id int(11) NOT NULL,
  quantity int(11) NOT NULL,
  total double NOT NULL,
  discount double NOT NULL DEFAULT 0 COMMENT 'Tiền chiết khấu',
  voucher_price double DEFAULT 0 COMMENT 'giá giảm của voucher ',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_not_received(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid mediumint(8) DEFAULT NULL COMMENT 'Khách chưa nhận được hàng',
  order_id int(11) DEFAULT NULL COMMENT 'Đơn hàng khách chưa nhận được',
  reason varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Lý do khiếu nại',
  time_add int(11) DEFAULT NULL,
  status mediumint(8) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_punish(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL DEFAULT 0 COMMENT 'Mã đơn hàng',
  penalize_id int(11) NOT NULL DEFAULT 0 COMMENT 'Tiêu đề phạt',
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_punish_complain(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL DEFAULT 0 COMMENT 'id cửa hàng',
  time_from int(11) NOT NULL DEFAULT 0 COMMENT 'Ngày từ',
  time_to int(11) NOT NULL DEFAULT 0 COMMENT 'Ngày đến',
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_seller_delivery_failed(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid mediumint(8) DEFAULT NULL COMMENT 'Seller không gửi được hàng',
  order_id int(11) DEFAULT NULL COMMENT 'Đơn hàng Seller không gửi được hàng',
  reason varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Lý do khiếu nại',
  time_add int(11) DEFAULT NULL,
  status mediumint(8) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher(
  id int(11) NOT NULL AUTO_INCREMENT,
  voucherid int(11) NOT NULL,
  order_id int(11) NOT NULL,
  userid int(11) NOT NULL,
  discount_price double NOT NULL COMMENT 'Số tiền giảm',
  time_add int(11) DEFAULT NULL COMMENT 'Thời gian thêm',
  status int(11) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher_admin(
  id int(11) NOT NULL,
  voucherid int(11) NOT NULL,
  order_id int(11) NOT NULL,
  userid int(11) NOT NULL,
  discount_price double NOT NULL COMMENT 'Số tiền giảm',
  time_add int(11) DEFAULT NULL COMMENT 'Thời gian thêm',
  status int(11) DEFAULT 1
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_voucher_shop(
  id int(11) NOT NULL,
  voucherid int(11) NOT NULL,
  order_id int(11) NOT NULL,
  userid int(11) NOT NULL,
  discount_price double NOT NULL COMMENT 'Số tiền giảm',
  time_add int(11) DEFAULT NULL COMMENT 'Thời gian thêm',
  status int(11) DEFAULT 1
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  alias varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment(
  payment varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  paymentname varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  domain varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  active tinyint(4) NOT NULL DEFAULT 0,
  weight int(11) NOT NULL DEFAULT 0,
  config text COLLATE utf8mb4_unicode_ci NOT NULL,
  images_button varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  is_default smallint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (payment)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment_refund(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL DEFAULT 0 COMMENT 'Mã đơn hàng',
  payment_method varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  responsecode varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vnp_ResponseCode',
  message varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vnp_Message',
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_penalize(
  id int(11) NOT NULL AUTO_INCREMENT,
  title_penalize varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề',
  des_penalize text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả',
  price_penalize float NOT NULL DEFAULT 0,
  type_penalize int(11) NOT NULL DEFAULT 0 COMMENT 'Loại',
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL,
  ecngcode varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã sản phẩm duy nhất trên sàn	',
  barcode varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã vạch',
  name_product varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  alias varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Liên kết tĩnh',
  categories_id int(11) NOT NULL COMMENT 'ID chuyên mục',
  unit_id int(11) NOT NULL COMMENT 'Đơn vị sản phẩm',
  unit_weight int(11) NOT NULL COMMENT 'Đơn vị khối lượng',
  weight_product double NOT NULL COMMENT 'Khối lượng sản phẩm',
  length_product double NOT NULL COMMENT 'Chiều dài sản phẩm (cm)',
  width_product double NOT NULL COMMENT 'Chiều rộng sản phẩm (cm)',
  height_product double NOT NULL COMMENT 'Chiều cao sản phẩm',
  free_ship int(10) NOT NULL DEFAULT 0 COMMENT 'Miễn phí vận chuyển',
  self_transport int(11) NOT NULL DEFAULT 0 COMMENT 'Cửa hàng tự vận chuyển',
  unit_length int(11) NOT NULL COMMENT 'Đơn vị chiều dài',
  unit_height int(11) NOT NULL COMMENT 'Đơn vị chiều cao',
  unit_width int(11) NOT NULL COMMENT 'Đơn vị chiều rộng',
  image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình ảnh sản phẩm',
  other_image text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh khác',
  description text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Giới thiệu ngắn gọn sản phẩm',
  bodytext text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung chi tiết',
  keyword varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Từ khóa tìm kiếm',
  tag_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề seo',
  tag_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả seo',
  inhome int(11) NOT NULL DEFAULT -1 COMMENT 'Hiển thị trên trang chủ',
  allowed_rating int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép đánh giá',
  showprice int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép hiển thị giá sản phẩm',
  number_view int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem sản phẩm',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL DEFAULT 1,
  number_order int(11) NOT NULL DEFAULT 0,
  brand int(11) DEFAULT NULL,
  origin int(11) DEFAULT NULL,
  price double NOT NULL,
  price_special double NOT NULL COMMENT 'Giá niêm yết',
  star float NOT NULL DEFAULT 0,
  number_rate int(11) DEFAULT 0,
  time_push int(11) NOT NULL DEFAULT 0,
  mode_push int(11) NOT NULL DEFAULT 0,
  number_like int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_classify varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  product_id int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value(
  id int(11) NOT NULL AUTO_INCREMENT,
  classify_id int(11) NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  image longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh thuộc tính',
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL DEFAULT 0,
  classify_id_value1 int(11) NOT NULL,
  classify_id_value2 int(11) NOT NULL,
  code varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã thuộc tính',
  price double NOT NULL,
  price_special double NOT NULL,
  sl_tonkho int(100) NOT NULL DEFAULT 0 COMMENT 'Số lượng',
  status int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_detail(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  json_self_transport text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  json_free_ship text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_old(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL,
  barcode varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã vạch',
  name_product varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  alias varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Liên kết tĩnh',
  categories_id int(11) NOT NULL COMMENT 'ID chuyên mục',
  unit_id int(11) NOT NULL COMMENT 'Đơn vị sản phẩm',
  unit_weight int(11) NOT NULL COMMENT 'Đơn vị khối lượng',
  weight_product double NOT NULL COMMENT 'Khối lượng sản phẩm',
  length_product double NOT NULL COMMENT 'Chiều dài sản phẩm (cm)',
  width_product double NOT NULL COMMENT 'Chiều rộng sản phẩm (cm)',
  height_product double NOT NULL COMMENT 'Chiều cao sản phẩm',
  free_ship int(10) NOT NULL DEFAULT 0 COMMENT 'Miễn phí vận chuyển',
  self_transport int(11) NOT NULL DEFAULT 0 COMMENT 'Cửa hàng tự vận chuyển',
  unit_length int(11) NOT NULL COMMENT 'Đơn vị chiều dài',
  unit_height int(11) NOT NULL COMMENT 'Đơn vị chiều cao',
  unit_width int(11) NOT NULL COMMENT 'Đơn vị chiều rộng',
  image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình ảnh sản phẩm',
  other_image text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh khác',
  description text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Giới thiệu ngắn gọn sản phẩm',
  bodytext text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung chi tiết',
  keyword varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Từ khóa tìm kiếm',
  tag_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề seo',
  tag_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả seo',
  inhome int(11) NOT NULL DEFAULT -1 COMMENT 'Hiển thị trên trang chủ',
  allowed_rating int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép đánh giá',
  showprice int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép hiển thị giá sản phẩm',
  number_view int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem sản phẩm',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL DEFAULT 1,
  number_order int(11) NOT NULL DEFAULT 0,
  brand int(11) DEFAULT NULL,
  origin int(11) DEFAULT NULL,
  price double NOT NULL,
  price_special double NOT NULL COMMENT 'Giá niêm yết',
  star float NOT NULL DEFAULT 0,
  number_rate int(11) DEFAULT 0,
  time_push int(11) NOT NULL DEFAULT 0,
  mode_push int(11) NOT NULL DEFAULT 0,
  number_like int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_temp(
  id int(11) NOT NULL,
  image text CHARACTER SET utf8 DEFAULT NULL,
  other_image text CHARACTER SET utf8mb4 DEFAULT NULL,
  classify text CHARACTER SET utf8mb4 DEFAULT NULL,
  bodytext text CHARACTER SET utf8mb4 NOT NULL,
  description text CHARACTER SET utf8mb4 DEFAULT NULL,
  username varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_push_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  classify_value_product_id int(10) NOT NULL DEFAULT 0,
  content varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status int(11) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  userid int(11) NOT NULL,
  star int(11) NOT NULL,
  other_image blob DEFAULT NULL,
  order_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_register_contact(
  id int(11) NOT NULL AUTO_INCREMENT,
  company_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên công ty',
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  tax_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã số thuế',
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  phone varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  representative varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người đại diện',
  category varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL COMMENT 'ID USER',
  company_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên doanh nghiệp',
  company_code varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã doanh nghiệp',
  store_code varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã gian hàng',
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ ngắn gọn',
  province_id int(11) NOT NULL COMMENT 'ID Thành phố',
  district_id int(11) NOT NULL COMMENT 'ID Quận Huyện',
  ward_id int(11) NOT NULL COMMENT 'ID Phường Xã',
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên người đại diện',
  phone varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại người đại diện',
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  image_before varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ảnh mặt trước giấy phép kinh doanh',
  image_after varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh mặt sau giấy phép kinh doanh',
  bank_id int(11) NOT NULL COMMENT 'Ngân hàng',
  catalogy int(10) NOT NULL DEFAULT 0 COMMENT 'Ngành hàng',
  acount_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chủ thẻ',
  acount_number varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số tài khoản',
  branch_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Chi nhánh',
  store blob DEFAULT NULL COMMENT 'Thông tin kho hàng',
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  cover_image text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  avatar_image text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  image_banner text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  description_shop text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  require_active int(11) NOT NULL DEFAULT 0,
  reason text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  time_require int(11) DEFAULT NULL,
  seller_hot int(11) NOT NULL DEFAULT 0 COMMENT 'seller_hot',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_promotion(
  id int(11) NOT NULL,
  promotionid int(11) DEFAULT NULL COMMENT 'id voucher',
  idproduct text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  idpro_promotion text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  datestart int(11) NOT NULL DEFAULT 0,
  dateend int(11) NOT NULL DEFAULT 0,
  userid mediumint(8) DEFAULT NULL COMMENT 'userid khách',
  time_add int(11) NOT NULL DEFAULT current_timestamp(),
  status tinyint(2) DEFAULT 1
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_error_ghn(
  id int(11) NOT NULL AUTO_INCREMENT,
  code_status_ghn varchar(50) CHARACTER SET utf8mb4 DEFAULT '0' COMMENT 'Mã trạng thái',
  desc_status_ghn varchar(100) CHARACTER SET utf8mb4 DEFAULT '0' COMMENT 'Mô tả trạng thái',
  weight int(10) DEFAULT 0 COMMENT 'Sắp xếp',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_ghn(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_status_ghn varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Tên trạng thái',
  desc_status_ghn varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Mô tả trạng thái',
  weight int(10) DEFAULT 0 COMMENT 'Sắp xếp',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order(
  ìd int(11) NOT NULL AUTO_INCREMENT,
  status_id int(11) NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(10) NOT NULL,
  status int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (ìd)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_error_ghtk(
  id int(11) NOT NULL AUTO_INCREMENT,
  status int(11) DEFAULT 0,
  title varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'Mô tả lỗi',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn(
  id int(11) NOT NULL AUTO_INCREMENT,
  status varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  name text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk(
  id int(11) NOT NULL AUTO_INCREMENT,
  status int(11) NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_vnpay(
  id int(11) NOT NULL AUTO_INCREMENT,
  status_id int(11) NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_vnpos(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  id_status int(10) DEFAULT 0 COMMENT 'ID',
  name_status_vnpost varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'Tên trạng thái',
  note_status_vnpost text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ghi chú trạng thái',
  weight int(10) DEFAULT 0 COMMENT 'Sắp xếp',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_tabs varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề Tabs',
  image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  content_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_test_ghn(
  id mediumint(8) NOT NULL AUTO_INCREMENT,
  content text CHARACTER SET utf8mb4 DEFAULT NULL,
  time_add int(11) DEFAULT 0,
  time_add_vi varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thời gian ',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_transporters varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhà vận chuyển',
  code_transporters varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã code vận chuyển',
  symbol_transporters varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ký hiệu nhà vận chuyển',
  description varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  max_weight float NOT NULL COMMENT 'Khối lượng tối đa (g)',
  max_length float NOT NULL COMMENT 'Chiều dài tối đa (cm)',
  max_width float NOT NULL COMMENT 'Chiều rộng tối đa (cm)',
  max_height float NOT NULL COMMENT 'Chiều cao tối đa (cm)',
  image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  type int(11) NOT NULL,
  money double NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop(
  id int(11) NOT NULL AUTO_INCREMENT,
  sell_id int(11) NOT NULL COMMENT 'ID Shops',
  transporters_id int(11) NOT NULL COMMENT 'ID Nhà Vận Chuyển',
  status int(11) NOT NULL COMMENT 'Trạng Thái Kích Hoạt',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Đơn vị sản phẩm',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_currency varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đơn vị tiền tệ',
  symbol varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ký hiệu',
  exchange double NOT NULL COMMENT 'Giá trị quy đổi (VNĐ)',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_length(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_length varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đơn vị độ dài',
  symbol varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ký hiệu',
  exchange double NOT NULL COMMENT 'Giá trị quy đổi (cm)',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  length int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_weight(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_weight varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đơn vị khối lượng',
  symbol varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ký hiệu',
  exchange double NOT NULL COMMENT 'Giá trị quy đổi (gram)',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vnpay_refund(
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL DEFAULT 0 COMMENT 'Mã đơn hàng',
  responsecode varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vnp_ResponseCode',
  message varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vnp_Message',
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_ecng(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL COMMENT 'Admin tạo voucher',
  voucher_name varchar(110) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên Voucher',
  voucher_code varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Voucher code',
  image varchar(110) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Avatar voucher (của sàn hoặc đối tác)',
  time_from int(11) NOT NULL COMMENT 'Thời gian từ',
  time_to int(11) NOT NULL COMMENT 'Thời gian đến',
  type_discount tinyint(5) DEFAULT 0 COMMENT 'Loại giảm giá (0: giảm tiền, 1:giảm %)',
  discount_percent int(11) DEFAULT NULL COMMENT '% giảm',
  discount_price double NOT NULL COMMENT 'Số tiền giảm',
  minimum_price double NOT NULL COMMENT 'Giá trị đơn hàng tối thiểu',
  maximum_discount double DEFAULT 0 COMMENT 'Mức giảm tối đa',
  usage_limit_quantity int(11) NOT NULL COMMENT 'Lượt sử dụng tối đa',
  voucher_hot tinyint(2) DEFAULT 0 COMMENT 'Voucher hot',
  time_add int(11) DEFAULT NULL COMMENT 'Thời gian thêm',
  inhome int(11) NOT NULL DEFAULT 0,
  status int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL COMMENT 'Thời gian sửa',
  user_edit int(11) DEFAULT NULL COMMENT 'Admin sửa voucher',
  type varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại voucher(0:giảm giá, 1: momo, 2: vnpay, 3:ghn, 4:ghtk))',
  category int(11) DEFAULT NULL COMMENT 'Ngành hàng',
  brand int(11) DEFAULT NULL COMMENT 'Thương hiệu',
  product text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_shop(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL,
  voucher_name varchar(110) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên Voucher',
  voucher_code varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Voucher code',
  time_from int(11) NOT NULL COMMENT 'Thời gian từ',
  time_to int(11) NOT NULL COMMENT 'Thời gian đến',
  type_discount tinyint(5) DEFAULT 0 COMMENT 'Loại giảm giá (0: giảm tiền, 1:giảm %)',
  discount_price double NOT NULL COMMENT 'Số tiền giảm',
  maximum_discount double DEFAULT 0 COMMENT 'Mức giảm tối đa',
  minimum_price double NOT NULL COMMENT 'Giá trị đơn hàng tối thiểu',
  usage_limit_quantity double NOT NULL COMMENT 'Lượt sử dụng tối đa',
  list_product text CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Danh sách sản phẩm được áp dụng',
  voucher_hot tinyint(2) DEFAULT 0 COMMENT 'Voucher hot',
  time_add int(11) DEFAULT NULL COMMENT 'Thời gian thêm',
  status int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet(
  id int(11) NOT NULL AUTO_INCREMENT,
  voucherid int(11) DEFAULT NULL COMMENT 'id voucher',
  userid mediumint(8) DEFAULT NULL COMMENT 'userid khách',
  type_voucher tinyint(3) DEFAULT 0 COMMENT 'Xác định nguồn gốc voucher (0: sàn, 1: shop)',
  time_add int(11) DEFAULT NULL,
  status tinyint(2) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet_ecng(
  id int(11) NOT NULL AUTO_INCREMENT,
  voucherid int(11) DEFAULT NULL COMMENT 'id voucher',
  userid mediumint(8) DEFAULT NULL COMMENT 'userid khách',
  time_add int(11) DEFAULT NULL,
  status tinyint(2) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voucher_wallet_shop(
  id int(11) NOT NULL,
  voucherid int(11) DEFAULT NULL COMMENT 'id voucher',
  userid mediumint(8) DEFAULT NULL COMMENT 'userid khách',
  time_add int(11) DEFAULT NULL,
  status tinyint(2) DEFAULT 1
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse(
  id int(11) NOT NULL AUTO_INCREMENT,
  sell_id int(11) NOT NULL COMMENT 'ID Người bán',
  sell_userid int(11) NOT NULL DEFAULT 0 COMMENT 'userid của shop',
  name_warehouse varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên kho hàng',
  name_send varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên người gởi',
  phone_send varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại người gởi',
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người gởi',
  province_id int(11) NOT NULL,
  district_id int(11) NOT NULL,
  ward_id int(11) NOT NULL,
  shops_id_ghn int(11) DEFAULT NULL COMMENT 'SHOPID GHN',
  lat text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  lng text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  centerlat double NOT NULL,
  centerlng double NOT NULL,
  maps_mapzoom double NOT NULL,
  groupaddressId int(11) NOT NULL,
  cusId int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import(
  warehouse_product_import_id int(11) NOT NULL AUTO_INCREMENT,
  warehouse_product_import_code varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã nhập kho',
  store_id int(11) NOT NULL COMMENT 'ID Cửa hàng',
  warehouse_id int(11) NOT NULL COMMENT 'ID Kho hàng',
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung',
  total_price double NOT NULL,
  total_amount int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  PRIMARY KEY (warehouse_product_import_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item(
  id int(11) NOT NULL AUTO_INCREMENT,
  warehouse_product_import_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  classify_value_product_id int(11) NOT NULL COMMENT 'ID Phân loại sản phẩm',
  price_import double NOT NULL,
  amount int(11) NOT NULL,
  unit_currency int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_transport(
  id mediumint(8) NOT NULL AUTO_INCREMENT,
  warehouse_id int(11) DEFAULT 0 COMMENT 'id kho',
  transportid_ecng varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Id đơn vị vận chuyển trong bảng transport',
  storeid_transport int(11) DEFAULT NULL COMMENT 'id cửa hàng của các đơn vị vận chuyển',
  time_add int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  userid int(11) NOT NULL,
  shop_id int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";
