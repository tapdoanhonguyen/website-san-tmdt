<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2021 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 17 Feb 2021 02:11:21 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_block_id";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brand";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_inventory_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_logs_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_push_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rate";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_currency";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_length";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit_weight";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse_import_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank(
  bank_id int(11) NOT NULL AUTO_INCREMENT,
  bank_code varchar(255) NOT NULL COMMENT 'Mã code ngân hàng',
  name_bank varchar(255) NOT NULL COMMENT 'Tên ngân hàng',
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
  title varchar(255) NOT NULL,
  keyword varchar(255) NOT NULL COMMENT 'Từ khóa',
  description_block varchar(255) NOT NULL COMMENT 'Miêu tả',
  bodytext text NOT NULL COMMENT 'Nội dung chi tiết',
  other text NOT NULL,
  tag_title varchar(255) NOT NULL COMMENT 'Tiêu đề seo',
  tag_description varchar(255) NOT NULL COMMENT 'Mô tả seo',
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
  title varchar(255) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  logo varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  alias varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_categories(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL COMMENT 'Tên chuyên mục',
  alias varchar(255) DEFAULT NULL,
  parrent_id int(11) NOT NULL DEFAULT 0,
  keyword varchar(255) DEFAULT NULL,
  image varchar(255) DEFAULT NULL,
  other_image text DEFAULT NULL,
  description text DEFAULT NULL,
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
  origin blob DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  id_shop int(11) NOT NULL,
  alias varchar(255) NOT NULL,
  parentid int(11) NOT NULL,
  description varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_category_shop_item(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_category_shop int(11) NOT NULL,
  product_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config(
  id int(11) NOT NULL AUTO_INCREMENT,
  config_name varchar(255) NOT NULL,
  config_value text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_follow(
  id int(11) NOT NULL AUTO_INCREMENT,
  shop_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_id int(11) NOT NULL,
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
  content text NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_order(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  order_code varchar(255) NOT NULL COMMENT 'Mã đơn hàng',
  store_id int(11) NOT NULL COMMENT 'ID Cửa hàng',
  warehouse_id int(11) NOT NULL COMMENT 'ID Kho hàng',
  order_name varchar(255) NOT NULL COMMENT 'Tên người mua',
  email varchar(255) NOT NULL COMMENT 'Email người mua',
  phone varchar(255) NOT NULL COMMENT 'Số điện thoại người mua',
  province_id int(11) NOT NULL COMMENT 'Thành phố',
  district_id int(11) NOT NULL COMMENT 'Quận huyện',
  ward_id int(11) NOT NULL COMMENT 'Phường xã',
  address varchar(255) NOT NULL COMMENT 'Địa chỉ ngắn gọn',
  lat text NOT NULL,
  lng text NOT NULL,
  transporters_id int(11) NOT NULL COMMENT 'ID Nhà vận chuyển',
  total_product double NOT NULL COMMENT 'Tổng tiền hàng',
  total_weight int(11) NOT NULL COMMENT 'Tổng khối lương',
  total_height int(11) NOT NULL COMMENT 'Tổng chiều cao',
  total_width int(11) NOT NULL COMMENT 'Tổng chiều rộng',
  total_length int(11) NOT NULL COMMENT 'Tổng chiều dài',
  payment double NOT NULL DEFAULT 0 COMMENT 'Số tiền đã thanh toán',
  payment_method int(11) NOT NULL COMMENT 'Phương thức thành toán',
  fee_transport double NOT NULL COMMENT 'Phí vận chuyển',
  shipping_code text DEFAULT NULL COMMENT 'Mã vận chuyển',
  total double NOT NULL COMMENT 'Tổng cộng',
  note varchar(255) NOT NULL COMMENT 'Ghi chú cho người bán',
  link_check_ahamove_order text DEFAULT NULL,
  time_add int(11) NOT NULL,
  status int(11) NOT NULL,
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
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_origin(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  alias varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  store_id int(11) NOT NULL,
  barcode varchar(255) NOT NULL COMMENT 'Mã vạch',
  name_product varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  alias varchar(255) NOT NULL COMMENT 'Liên kết tĩnh',
  categories_id int(11) NOT NULL COMMENT 'ID chuyên mục',
  unit_id int(11) NOT NULL COMMENT 'Đơn vị sản phẩm',
  unit_weight int(11) NOT NULL COMMENT 'Đơn vị khối lượng',
  weight_product double NOT NULL COMMENT 'Khối lượng sản phẩm',
  length_product double NOT NULL COMMENT 'Chiều dài sản phẩm (cm)',
  width_product double NOT NULL COMMENT 'Chiều rộng sản phẩm (cm)',
  height_product double NOT NULL COMMENT 'Chiều cao sản phẩm',
  unit_length int(11) NOT NULL COMMENT 'Đơn vị chiều dài',
  unit_height int(11) NOT NULL COMMENT 'Đơn vị chiều cao',
  unit_width int(11) NOT NULL COMMENT 'Đơn vị chiều rộng',
  image varchar(255) NOT NULL COMMENT 'Hình ảnh sản phẩm',
  other_image text DEFAULT NULL COMMENT 'Hình ảnh khác',
  description text NOT NULL COMMENT 'Giới thiệu ngắn gọn sản phẩm',
  bodytext text NOT NULL COMMENT 'Nội dung chi tiết',
  keyword varchar(255) DEFAULT NULL COMMENT 'Từ khóa tìm kiếm',
  tag_title varchar(255) NOT NULL COMMENT 'Tiêu đề seo',
  tag_description varchar(255) NOT NULL COMMENT 'Mô tả seo',
  inhome int(11) NOT NULL DEFAULT 0 COMMENT 'Hiển thị trên trang chủ',
  allowed_rating int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép đánh giá',
  showprice int(11) NOT NULL DEFAULT 0 COMMENT 'Cho phép hiển thị giá sản phẩm',
  number_view int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem sản phẩm',
  price_min double NOT NULL COMMENT 'Giá thấp nhất (VND)',
  price_max double NOT NULL COMMENT 'Giá cao nhất (VND)',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  number_order int(11) NOT NULL DEFAULT 0,
  brand int(11) DEFAULT NULL,
  origin int(11) DEFAULT NULL,
  price double NOT NULL,
  price_special double NOT NULL,
  star float NOT NULL DEFAULT 0,
  number_rate int(11) DEFAULT 0,
  time_push int(11) NOT NULL DEFAULT 0,
  mode_push int(11) NOT NULL DEFAULT 0,
  price_sort double NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";



$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_detail(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  json_self_transport text NOT NULL,
  json_free_ship text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";


$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_classify varchar(255) NOT NULL,
  product_id int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value(
  id int(11) NOT NULL AUTO_INCREMENT,
  classify_id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product_classify_value_product(
  id int(11) NOT NULL AUTO_INCREMENT,
  classify_id_value1 int(11) NOT NULL,
  classify_id_value2 int(11) NOT NULL,
  code varchar(100) NOT NULL,
  price double NOT NULL,
  price_special double NOT NULL,
  sl_tonkho double NOT NULL DEFAULT '0',
  status int(11) NOT NULL DEFAULT 1,
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
  content varchar(255) NOT NULL,
  image varchar(255) DEFAULT NULL,
  status int(11) NOT NULL,
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  userid int(11) NOT NULL,
  star int(11) NOT NULL,
  other_image blob DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_seller_management(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL COMMENT 'ID USER',
  company_name varchar(255) NOT NULL COMMENT 'Tên doanh nghiệp',
  address varchar(255) NOT NULL COMMENT 'Địa chỉ ngắn gọn',
  province_id int(11) NOT NULL COMMENT 'ID Thành phố',
  district_id int(11) NOT NULL COMMENT 'ID Quận Huyện',
  ward_id int(11) NOT NULL COMMENT 'ID Phường Xã',
  tax_code varchar(255) NOT NULL COMMENT 'Mã số thuế',
  name varchar(255) NOT NULL COMMENT 'Họ tên người đại diện',
  phone varchar(255) NOT NULL COMMENT 'Số điện thoại người đại diện',
  email varchar(255) NOT NULL COMMENT 'Email',
  image_before varchar(255) NOT NULL COMMENT 'Ảnh mặt trước giấy phép kinh doanh',
  image_after varchar(255) NOT NULL COMMENT 'Ảnh mặt sạu giấy phép kinh doanh',
  bank_id int(11) NOT NULL COMMENT 'Ngân hàng',
  acount_name varchar(255) NOT NULL COMMENT 'Tên chủ thẻ',
  acount_number varchar(255) NOT NULL COMMENT 'Số tài khoản',
  branch_name varchar(255) NOT NULL COMMENT 'Chi nhánh',
  store blob DEFAULT NULL COMMENT 'Thông tin kho hàng',
  user_add int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_edit int(11) DEFAULT NULL,
  time_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  cover_image text DEFAULT NULL,
  avatar_image text DEFAULT NULL,
  image_banner text DEFAULT NULL,
  description_shop text DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order(
  ìd int(11) NOT NULL AUTO_INCREMENT,
  status_id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  PRIMARY KEY (ìd)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghn(
  id int(11) NOT NULL AUTO_INCREMENT,
  status varchar(255) NOT NULL,
  name text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_status_order_ghtk(
  id int(11) NOT NULL AUTO_INCREMENT,
  status int(11) NOT NULL,
  name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_tabs(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_tabs varchar(255) NOT NULL COMMENT 'Tiêu đề Tabs',
  image varchar(255) NOT NULL,
  content_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  weight int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_transporters(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_transporters varchar(255) NOT NULL COMMENT 'Tên nhà vận chuyển',
  code_transporters varchar(255) NOT NULL COMMENT 'Mã code vận chuyển',
  symbol_transporters varchar(255) NOT NULL COMMENT 'Ký hiệu nhà vận chuyển',
  description varchar(255) DEFAULT NULL,
  max_weight float NOT NULL COMMENT 'Khối lượng tối đa (g)',
  max_length float NOT NULL COMMENT 'Chiều dài tối đa (cm)',
  max_width float NOT NULL COMMENT 'Chiều rộng tối đa (cm)',
  max_height float NOT NULL COMMENT 'Chiều cao tối đa (cm)',
  image varchar(255) DEFAULT NULL,
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
  name varchar(255) NOT NULL COMMENT 'Đơn vị sản phẩm',
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
  name_currency varchar(255) NOT NULL COMMENT 'Tên đơn vị tiền tệ',
  symbol varchar(255) NOT NULL COMMENT 'Ký hiệu',
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
  name_length varchar(255) NOT NULL COMMENT 'Tên đơn vị độ dài',
  symbol varchar(255) NOT NULL COMMENT 'Ký hiệu',
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
  name_weight varchar(255) NOT NULL COMMENT 'Tên đơn vị khối lượng',
  symbol varchar(255) NOT NULL COMMENT 'Ký hiệu',
  exchange double NOT NULL COMMENT 'Giá trị quy đổi (gram)',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_warehouse(
  id int(11) NOT NULL AUTO_INCREMENT,
  sell_id int(11) NOT NULL COMMENT 'ID Người bán',
  name_warehouse varchar(255) NOT NULL COMMENT 'Tên kho hàng',
  name_send varchar(255) NOT NULL COMMENT 'Tên người gởi',
  phone_send varchar(255) NOT NULL COMMENT 'Số điện thoại người gởi',
  address varchar(255) NOT NULL COMMENT 'Địa chỉ người gởi',
  province_id int(11) NOT NULL,
  district_id int(11) NOT NULL,
  ward_id int(11) NOT NULL,
  shops_id_ghn int(11) DEFAULT NULL COMMENT 'SHOPID GHN',
  lat text DEFAULT NULL,
  lng text DEFAULT NULL,
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
  warehouse_product_import_code varchar(255) NOT NULL COMMENT 'Mã nhập kho',
  store_id int(11) NOT NULL COMMENT 'ID Cửa hàng',
  warehouse_id int(11) NOT NULL COMMENT 'ID Kho hàng',
  title varchar(255) NOT NULL COMMENT 'Nội dung',
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_wishlist(
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  userid int(11) NOT NULL,
  shop_id int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('1', 'raw_product_prefix', 'SP')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('2', 'username_vnpost', '0904999955')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('3', 'password_vnpost', 'ngocsuong113A!')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('4', 'token_ghn', '0076bd3c-c45c-11ea-b354-e6945d70dd56')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('5', 'username_viettelpost', '0904999955')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('6', 'password_viettelpost', 'ngocsuong113A!')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('7', 'token_ahamove', '55f359a75c2ac74d8713893ecf50a9e521f41def')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('8', 'token_ghtk', 'BB917c542C01B979355408c4A275a0167c2a5b21')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('9', 'raw_import_product_prefix', 'NK')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('10', 'url_ghn', 'https://online-gateway.ghn.vn/shiip/public-api')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('11', 'url_ghtk', 'https://services.giaohangtietkiem.vn')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('12', 'inhome_viewcat', '0')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('13', 'number_product', '15')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('14', 'raw_order_prefix', 'DHT')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('15', 'time_push_product', '4')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, config_name, config_value) VALUES('17', 'number_product_push', '7')";
