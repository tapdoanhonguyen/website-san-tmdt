<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 29 Dec 2023 08:30:57 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_bank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_block";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_block_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_carrier";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_carrier_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_items";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_location";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_weight";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_catalogs";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_category_shop";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_coupons";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_coupons_history";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_coupons_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_discounts";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_field";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_field_value_vi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_files";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_files_rows";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_follow";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_group_cateid";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_group_items";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_group_quantity";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_location";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_money_vi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_orders";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_orders_id";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_orders_id_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_orders_shipping";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_point";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_point_history";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_point_queue";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_review";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_rows";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_seller_management";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_shops";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_shops_carrier";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_status_order";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tabs";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tags_vi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_template";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_transaction";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_unit_length";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_units";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_warehouse";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_weight_vi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_wishlist";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_bank(
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_block(
  bid int(11) unsigned NOT NULL,
  id int(11) unsigned NOT NULL,
  weight int(11) unsigned NOT NULL,
  UNIQUE KEY bid (bid,id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_block_cat(
  bid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  adddefault tinyint(1) NOT NULL DEFAULT 0,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight smallint(4) NOT NULL DEFAULT 0,
  add_time int(11) NOT NULL DEFAULT 0,
  edit_time int(11) NOT NULL DEFAULT 0,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_description varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_bodytext text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vi_keywords text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_tag_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_tag_description mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (bid),
  UNIQUE KEY vi_alias (vi_alias)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_carrier(
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  phone varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  logo varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  description text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight tinyint(3) unsigned NOT NULL,
  status tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_carrier_config(
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  description text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight tinyint(3) unsigned NOT NULL,
  status tinyint(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_items(
  id smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  cid tinyint(3) unsigned NOT NULL DEFAULT 0,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  description text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight smallint(4) unsigned NOT NULL,
  add_time int(11) unsigned NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_location(
  cid tinyint(3) unsigned NOT NULL,
  iid smallint(4) unsigned NOT NULL,
  lid mediumint(8) unsigned NOT NULL,
  UNIQUE KEY cid (cid,lid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_carrier_config_weight(
  iid smallint(4) unsigned NOT NULL,
  weight double unsigned NOT NULL,
  weight_unit varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  carrier_price double NOT NULL,
  carrier_price_unit char(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_catalogs(
  catid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  parentid mediumint(8) unsigned NOT NULL DEFAULT 0,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) unsigned NOT NULL DEFAULT 0,
  sort mediumint(8) NOT NULL DEFAULT 0,
  lev smallint(4) NOT NULL DEFAULT 0,
  viewcat varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viewcat_page_new',
  numsubcat int(11) NOT NULL DEFAULT 0,
  subcatid varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  inhome tinyint(1) unsigned NOT NULL DEFAULT 0,
  numlinks tinyint(2) unsigned NOT NULL DEFAULT 3,
  newday tinyint(4) NOT NULL DEFAULT 3,
  typeprice tinyint(4) NOT NULL DEFAULT 2,
  form varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  group_price text COLLATE utf8mb4_unicode_ci NOT NULL,
  viewdescriptionhtml tinyint(1) unsigned NOT NULL DEFAULT 0,
  admins mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  groups_view varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  cat_allow_point tinyint(1) NOT NULL DEFAULT 0,
  cat_number_point tinyint(4) NOT NULL DEFAULT 0,
  cat_number_product tinyint(4) NOT NULL DEFAULT 0,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_title_custom varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_description varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_descriptionhtml text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_keywords text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_tag_description mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (catid),
  UNIQUE KEY vi_alias (vi_alias),
  KEY parentid (parentid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_category_shop(
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_config(
  id int(11) NOT NULL AUTO_INCREMENT,
  config_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  config_value longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_coupons(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  code varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  type varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'p',
  discount double NOT NULL DEFAULT 0,
  total_amount double NOT NULL DEFAULT 0,
  date_start int(11) unsigned NOT NULL DEFAULT 0,
  date_end int(11) unsigned NOT NULL DEFAULT 0,
  uses_per_coupon int(11) unsigned NOT NULL DEFAULT 0,
  uses_per_coupon_count int(11) NOT NULL DEFAULT 0,
  date_added int(11) unsigned NOT NULL DEFAULT 0,
  status tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_coupons_history(
  id int(11) NOT NULL AUTO_INCREMENT,
  cid int(11) NOT NULL,
  order_id int(11) NOT NULL,
  amount double NOT NULL DEFAULT 0,
  date_added int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_coupons_product(
  cid int(11) unsigned NOT NULL,
  pid int(11) unsigned NOT NULL,
  UNIQUE KEY cid (cid,pid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_discounts(
  did smallint(6) NOT NULL AUTO_INCREMENT,
  title varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(6) NOT NULL DEFAULT 0,
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  begin_time int(11) unsigned NOT NULL DEFAULT 0,
  end_time int(11) unsigned NOT NULL DEFAULT 0,
  config text COLLATE utf8mb4_unicode_ci NOT NULL,
  detail tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (did),
  KEY begin_time (begin_time,end_time)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_field(
  fid mediumint(8) NOT NULL AUTO_INCREMENT,
  field varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  listtemplate varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  tab varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight int(10) unsigned NOT NULL DEFAULT 1,
  field_type enum('number','date','textbox','textarea','editor','select','radio','checkbox','multiselect') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'textbox',
  field_choices text COLLATE utf8mb4_unicode_ci NOT NULL,
  sql_choices text COLLATE utf8mb4_unicode_ci NOT NULL,
  match_type enum('none','alphanumeric','email','url','regex','callback') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  match_regex varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  func_callback varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  min_length int(11) NOT NULL DEFAULT 0,
  max_length bigint(20) unsigned NOT NULL DEFAULT 0,
  class varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  language text COLLATE utf8mb4_unicode_ci NOT NULL,
  default_value varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (fid),
  UNIQUE KEY field (field)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_field_value_vi(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  rows_id int(11) unsigned NOT NULL,
  field_id mediumint(8) NOT NULL,
  field_value mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY rows_id (rows_id,field_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_files(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  path varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  filesize int(11) unsigned NOT NULL DEFAULT 0,
  extension varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  addtime int(11) unsigned NOT NULL DEFAULT 0,
  download_groups varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-1',
  status tinyint(1) unsigned DEFAULT 1,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_description mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_files_rows(
  id_rows int(11) unsigned NOT NULL,
  id_files mediumint(8) unsigned NOT NULL,
  download_hits mediumint(8) unsigned NOT NULL DEFAULT 0,
  UNIQUE KEY id_files (id_files,id_rows)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_follow(
  id int(11) NOT NULL AUTO_INCREMENT,
  shop_id int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_group(
  groupid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  parentid mediumint(8) unsigned NOT NULL DEFAULT 0,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) unsigned NOT NULL DEFAULT 0,
  sort mediumint(8) NOT NULL DEFAULT 0,
  lev smallint(4) NOT NULL DEFAULT 0,
  viewgroup varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viewgrid',
  numsubgroup int(11) NOT NULL DEFAULT 0,
  subgroupid varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  inhome tinyint(1) unsigned NOT NULL DEFAULT 0,
  indetail tinyint(1) unsigned NOT NULL DEFAULT 0,
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  numpro int(11) unsigned NOT NULL DEFAULT 0,
  in_order tinyint(2) NOT NULL DEFAULT 0,
  is_require tinyint(1) NOT NULL DEFAULT 0,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_description varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_keywords text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (groupid),
  UNIQUE KEY vi_alias (vi_alias),
  KEY parentid (parentid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_group_cateid(
  groupid mediumint(8) unsigned NOT NULL,
  cateid mediumint(8) unsigned NOT NULL,
  UNIQUE KEY groupid (groupid,cateid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_group_items(
  pro_id int(11) unsigned NOT NULL DEFAULT 0,
  group_id int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (pro_id,group_id),
  KEY pro_id (pro_id),
  KEY group_id (group_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_group_quantity(
  pro_id int(11) unsigned NOT NULL DEFAULT 0,
  listgroup varchar(247) COLLATE utf8mb4_unicode_ci NOT NULL,
  quantity int(11) unsigned NOT NULL,
  UNIQUE KEY pro_id (pro_id,listgroup)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_location(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  parentid mediumint(8) unsigned NOT NULL DEFAULT 0,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight smallint(4) unsigned NOT NULL DEFAULT 0,
  sort mediumint(8) NOT NULL DEFAULT 0,
  lev smallint(4) NOT NULL DEFAULT 0,
  numsub int(11) NOT NULL DEFAULT 0,
  subid varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  KEY parentid (parentid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_money_vi(
  id mediumint(11) NOT NULL,
  code char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  currency varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  symbol varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  exchange double NOT NULL DEFAULT 0,
  round varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  number_format varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',||.',
  status int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY code (code)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_orders(
  order_id int(11) unsigned NOT NULL AUTO_INCREMENT,
  order_code varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  lang char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  order_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_email varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_phone varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_note text COLLATE utf8mb4_unicode_ci NOT NULL,
  user_id int(11) unsigned NOT NULL DEFAULT 0,
  admin_id int(11) unsigned NOT NULL DEFAULT 0,
  shop_id int(11) unsigned NOT NULL DEFAULT 0,
  who_is int(2) unsigned NOT NULL DEFAULT 0,
  unit_total char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_total double unsigned NOT NULL DEFAULT 0,
  order_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  postip varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_view tinyint(2) NOT NULL DEFAULT 0,
  transaction_status tinyint(4) NOT NULL,
  transaction_id int(11) NOT NULL DEFAULT 0,
  transaction_count int(11) NOT NULL,
  plus_money int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (order_id),
  UNIQUE KEY order_code (order_code),
  KEY user_id (user_id),
  KEY order_time (order_time),
  KEY shop_id (shop_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_orders_id(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL,
  listgroupid varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  proid mediumint(9) NOT NULL,
  num mediumint(9) NOT NULL,
  price double NOT NULL DEFAULT 0,
  discount_id smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY orderid (order_id,id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_orders_id_group(
  order_i int(11) NOT NULL,
  group_id mediumint(8) NOT NULL,
  UNIQUE KEY orderid (order_i,group_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_orders_shipping(
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(11) unsigned NOT NULL,
  ship_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  ship_phone varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  ship_location_id mediumint(8) unsigned NOT NULL,
  ship_address_extend varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  ship_shops_id tinyint(3) unsigned NOT NULL,
  ship_carrier_id tinyint(3) unsigned NOT NULL,
  weight double NOT NULL DEFAULT 0,
  weight_unit char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  ship_price double NOT NULL DEFAULT 0,
  ship_price_unit char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  add_time int(11) unsigned NOT NULL,
  edit_time int(11) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY add_time (add_time)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_point(
  userid int(11) NOT NULL DEFAULT 0,
  point_total int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (userid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_point_history(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT 0,
  order_id int(11) NOT NULL,
  point int(11) NOT NULL DEFAULT 0,
  time int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_point_queue(
  order_id int(11) NOT NULL,
  point mediumint(11) NOT NULL DEFAULT 0,
  status tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_review(
  review_id int(11) unsigned NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL DEFAULT 0,
  userid int(11) NOT NULL DEFAULT 0,
  sender varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  content text COLLATE utf8mb4_unicode_ci NOT NULL,
  rating int(1) NOT NULL,
  add_time int(11) NOT NULL DEFAULT 0,
  edit_time int(11) NOT NULL DEFAULT 0,
  status tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (review_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_rows(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  listcatid int(11) NOT NULL DEFAULT 0,
  user_id mediumint(8) NOT NULL DEFAULT 0,
  addtime int(11) unsigned NOT NULL DEFAULT 0,
  edittime int(11) unsigned NOT NULL DEFAULT 0,
  status tinyint(4) NOT NULL DEFAULT 1,
  publtime int(11) unsigned NOT NULL DEFAULT 0,
  exptime int(11) unsigned NOT NULL DEFAULT 0,
  archive tinyint(1) unsigned NOT NULL DEFAULT 0,
  product_code varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  product_number int(11) NOT NULL DEFAULT 0,
  product_price double NOT NULL DEFAULT 0,
  price_special float NOT NULL DEFAULT 0,
  price_config text COLLATE utf8mb4_unicode_ci NOT NULL,
  saleprice double NOT NULL DEFAULT 0,
  money_unit char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  product_unit smallint(4) NOT NULL,
  product_weight double NOT NULL DEFAULT 0,
  weight_unit char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  discount_id smallint(6) NOT NULL DEFAULT 0,
  homeimgfile varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  homeimgthumb tinyint(4) NOT NULL DEFAULT 0,
  homeimgalt varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  otherimage text COLLATE utf8mb4_unicode_ci NOT NULL,
  imgposition tinyint(1) NOT NULL DEFAULT 1,
  copyright tinyint(1) unsigned NOT NULL DEFAULT 0,
  gift_from int(11) unsigned NOT NULL DEFAULT 0,
  gift_to int(11) unsigned NOT NULL DEFAULT 0,
  inhome tinyint(1) unsigned NOT NULL DEFAULT 0,
  allowed_comm tinyint(1) unsigned NOT NULL DEFAULT 0,
  allowed_rating tinyint(1) unsigned NOT NULL DEFAULT 0,
  ratingdetail varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  allowed_send tinyint(1) unsigned NOT NULL DEFAULT 0,
  allowed_print tinyint(1) unsigned NOT NULL DEFAULT 0,
  allowed_save tinyint(1) unsigned NOT NULL DEFAULT 0,
  hitstotal mediumint(8) unsigned NOT NULL DEFAULT 0,
  hitscm mediumint(8) unsigned NOT NULL DEFAULT 0,
  hitslm mediumint(8) unsigned NOT NULL DEFAULT 0,
  num_sell mediumint(8) NOT NULL DEFAULT 0,
  showprice tinyint(2) NOT NULL DEFAULT 0,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_hometext text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_bodytext mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vi_gift_content text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_address text COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_tag_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_tag_description mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  star int(11) NOT NULL DEFAULT 0,
  free_ship int(11) NOT NULL DEFAULT 0,
  number_like int(11) NOT NULL DEFAULT 0,
  number_view int(11) NOT NULL DEFAULT 0,
  number_order int(11) NOT NULL DEFAULT 0,
  idsite int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY vi_alias (vi_alias),
  KEY listcatid (listcatid),
  KEY user_id (user_id),
  KEY publtime (publtime),
  KEY exptime (exptime)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_seller_management(
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_shops(
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  location mediumint(8) unsigned NOT NULL DEFAULT 0,
  address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  description text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight tinyint(3) unsigned NOT NULL,
  status tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_shops_carrier(
  shops_id tinyint(3) unsigned NOT NULL,
  carrier_id tinyint(3) unsigned NOT NULL,
  config_id tinyint(3) unsigned NOT NULL,
  UNIQUE KEY shops_id (shops_id,carrier_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_status_order(
  ìd int(11) NOT NULL AUTO_INCREMENT,
  status_id int(11) NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(10) NOT NULL,
  status int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (ìd)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tabs(
  id int(3) unsigned NOT NULL AUTO_INCREMENT,
  icon varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  content varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight int(10) unsigned NOT NULL DEFAULT 1,
  active tinyint(1) NOT NULL DEFAULT 1,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tags_id_vi(
  id int(11) NOT NULL,
  tid mediumint(9) NOT NULL,
  keyword varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY sid (id,tid),
  KEY tid (tid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tags_vi(
  tid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  numpro mediumint(8) NOT NULL DEFAULT 0,
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  image varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  description text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  bodytext text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  keywords varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (tid),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_template(
  id mediumint(8) NOT NULL AUTO_INCREMENT,
  status tinyint(1) NOT NULL DEFAULT 1,
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight mediumint(8) unsigned NOT NULL DEFAULT 1,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_transaction(
  transaction_id int(11) NOT NULL AUTO_INCREMENT,
  transaction_time int(11) NOT NULL DEFAULT 0,
  transaction_status int(11) NOT NULL,
  order_id int(11) NOT NULL DEFAULT 0,
  userid int(11) NOT NULL DEFAULT 0,
  payment varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  payment_id varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  payment_time int(11) NOT NULL DEFAULT 0,
  payment_amount double NOT NULL DEFAULT 0,
  payment_data text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (transaction_id),
  KEY order_id (order_id),
  KEY payment_id (payment_id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_unit_length(
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_units(
  id int(11) NOT NULL AUTO_INCREMENT,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_note text COLLATE utf8mb4_unicode_ci NOT NULL,
  status int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_warehouse(
  wid int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  user_id mediumint(8) NOT NULL DEFAULT 0,
  addtime int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (wid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_warehouse_address(
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

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs(
  logid int(11) unsigned NOT NULL AUTO_INCREMENT,
  wid int(11) unsigned NOT NULL DEFAULT 0,
  pro_id int(11) unsigned NOT NULL DEFAULT 0,
  quantity int(11) unsigned NOT NULL DEFAULT 0,
  price double NOT NULL DEFAULT 0,
  money_unit char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (logid),
  KEY wid (wid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_warehouse_logs_group(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  logid int(11) unsigned NOT NULL DEFAULT 0,
  listgroup varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  quantity int(11) unsigned NOT NULL DEFAULT 0,
  price double NOT NULL DEFAULT 0,
  money_unit char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id),
  KEY logid (logid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_warehouse_transport(
  id mediumint(8) NOT NULL AUTO_INCREMENT,
  warehouse_id int(11) DEFAULT 0 COMMENT 'id kho',
  transportid_ecng varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Id đơn vị vận chuyển trong bảng transport',
  storeid_transport int(11) DEFAULT NULL COMMENT 'id cửa hàng của các đơn vị vận chuyển',
  time_add int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_weight_vi(
  id tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  code char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  title varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  exchange double NOT NULL DEFAULT 0,
  round varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  status int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY code (code)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_wishlist(
  wid smallint(6) NOT NULL AUTO_INCREMENT,
  user_id int(11) unsigned NOT NULL DEFAULT 0,
  listid text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (wid)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_carrier_config (id, title, description, weight, status) VALUES('1', 'Free ship', '', '1', '1')";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('1', 'raw_product_prefix', 'SKU')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('2', 'username_vnpost', '0833081888')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('3', 'password_vnpost', '0316118657@#jkm')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('4', 'token_ghn', 'e04db7d1-f70d-11ea-b31d-1e32ecc812ea')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('5', 'username_viettelpost', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('6', 'password_viettelpost', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('7', 'token_ahamove', '55f359a75c2ac74d8713893ecf50a9e521f41def')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('8', 'token_ghtk', '77319b333718c97f8C681D6Fcf8DA1e6Cff915A9')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('9', 'raw_import_product_prefix', 'NK')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('10', 'url_ghn', 'https://online-gateway.ghn.vn/shiip/public-api')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('11', 'url_ghtk', 'https://services.giaohangtietkiem.vn')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('12', 'inhome_viewcat', '0')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('13', 'number_product', '4')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('14', 'raw_order_prefix', 'ECNG')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('15', 'time_push_product', '4')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('17', 'number_product_push', '2')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('19', 'website_code_vnpay', 'CNGIAU01')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('20', 'checksum_vnpay', 'GYTKYBLNJRQEVYJHESKKIPHMXXGYEXTD')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('21', 'percent_of_order_payment_discount', '95')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('24', 'form_email_khach', 'email_new_order_payment_khach')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('25', 'form_email_nha_ban', 'email_new_order_payment2')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('26', 'terms_of_use', '<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">A. Quy định chung:</span></span></span></u></b></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">1. Các nội dung không được phép đăng bán:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Người dùng được quyền đăng các sản phẩm lên Shopee nhằm mục đích kinh doanh. Tuy nhiên, NGHIÊM CẤM người dùng đăng tải những sản phẩm có nội dung sau đây:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Phản động, chống phá, bài xích tôn giáo, khiêu dâm, bạo lực, đi ngược lại thuần phong mỹ tục, truyền thống và văn hóa Việt Nam;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Đăng thông tin rác, phá rối hay làm mất uy tín của các dịch vụ do Shopee cung cấp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Xúc phạm, khích bác đến người khác dưới bất kỳ hình thức nào;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Tuyên truyền về những thông tin mà pháp luật nghiêm cấm như: sử dụng heroin, thuốc lắc, giết người, cướp của,vv (VD: sản phẩm in hình lá cần sa, shisha);</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Khuyến khích, quảng cáo cho việc sử dụng các sản phẩm độc hại (VD: thuốc lá, rượu, cần sa);</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Các sản phẩm văn hóa đồi trụy (băng đĩa, sách báo, vật phẩm);</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Tài liệu bí mật quốc gia;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Con người và/hoặc các bộ phận của cơ thể con người;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Những sản phẩm có tính chất phân biệt chủng tộc, xúc phạm đến dân tộc hoặc quốc gia nào đó;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Hạn chế tối đa những sản phẩm mang tính cá nhân (như hình cá nhân, hình ảnh của gia đình, hình ảnh của con cái);</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Vi phạm quyền sở hữu trí tuệ và/hoặc bất kỳ nhãn hiệu hàng hóa nào của bất kỳ bên thứ ba nào;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">&nbsp;&nbsp; + Các sản phẩm nằm trong Danh sách sản phẩm bị cấm/hạn chế của Shopee.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">2. Các hành vi không được thực hiện</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Quảng cáo cho các doanh nghiệp khác. Ví dụ như sản phẩm có chứa hình ảnh, logo, địa chỉ, hotline, đường link của doanh nghiệp hoặc website mua bán khác;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Đăng bán một sản phẩm lặp đi lặp lại (spam) trên cùng một danh mục hoặc các danh mục khác nhau.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Thay đổi nội dung tin đăng để gian lận đánh giá</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<br style=\"box-sizing:border-box\" />
<br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">B. Hướng dẫn đăng bán sản phẩm trên Shopee</span></span></span></u></b></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Tiêu đề, hình ảnh, giá cả, mô tả sản phẩm và các thông tin liên quan phải thống nhất, đúng chính tả, đúng quy định về đăng tin của Shopee. Cụ thể như sau:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">1/ Hình ảnh sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>
<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Hình ảnh sản phẩm phải là ảnh chụp rõ, chi tiết tình trạng sản phẩm. Không được để những hình ảnh hoặc thông tin không liên quan đến sản phẩm này như thông tin giới thiệu shop, thông tin liên hệ hay thông tin thanh toán.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Phải có ít nhất một hình ảnh thật của sản phẩm do chính Người bán tự chụp. Trong ảnh này, diện tích sản phẩm thật phải chiếm ít nhất 40% diện tích toàn ảnh.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Tuyệt đối không được đăng các hình ảnh khỏa thân, khiêu gợi, phản cảm, không phù hợp với thuần phong mĩ tục.</span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">2/ Tên sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Tên sản phẩm phải là tiếng Việt có dấu, đủ ký tự, rõ nghĩa, không dùng các ký tự đặc biệt, không viết tắt.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu sử dụng kèm thương hiệu sản phẩm (Việt Nam hoặc nước ngoài) thì phần tên phải bao gồm tiếng Việt đi kèm mô tả ngắn gọn sản phẩm để người mua có thể hiểu rõ ràng. Ví dụ: Nước hoa Chanel Chance.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu là bộ sản phẩm thì tên sản phẩm phải ghi rõ Combo/Bộ sản phẩm</span></span></span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Tên gọi của sản phẩm phải trùng khớp với thông tin trên hình ảnh sản phẩm.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Không chứa từ khóa fake/nhái hoặc các từ khóa tương tự</span></span></span></li>
</ul>
<br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><i style=\"box-sizing:border-box\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><strong style=\"box-sizing:border-box; font-weight:bold\">Lưu ý riêng với một số ngành hàng:</strong></span></span></span></u></i></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Mỹ phẩm</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ &nbsp;Hình ảnh sản phẩm phải rõ ràng (Nhãn mác, bao bì, thương hiệu), thông tin có đầy đủ nguồn gốc, xuất xứ, tình trạng sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Không đăng bán mỹ phẩm đã qua sử dụng, dù chỉ là dùng thử một hoặc vài lần</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Không đăng bán các sản phẩm không rõ bao bì, nhãn mác, không nguồn gốc.&nbsp;</span></span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"font-family:arial, sans-serif\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"color:rgb(0, 0, 0);\">Riêng đối với các sản phẩm handmade, tên sản phẩm phải có chữ &quot;handmade&quot;, mô tả sản phẩm phải có ngày sản xuất và hạn sử dụng.</span></span></span></span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Nghiêm cấm các sản phẩm kem trộn.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;</span></span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"font-family:arial, sans-serif\"><span style=\"color:rgb(0, 0, 0);\">Đối với các sản phẩm thương hiệu trong nước: phải đăng kèm hình scan (bản gốc hoặc sao y công chứng) &nbsp;các loại Giấy Chứng Nhận sau:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; margin-left:15px\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Phiếu công bố mỹ phẩm do Bộ/ Sở Y tế cấp, trong đó thể hiện thông tin chủ thể chịu trách nhiệm đưa sản phẩm ra thị trường</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; margin-left:15px\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Chứng nhận đại lý/Hợp đồng mua bán/hóa đơn nhập hàng từ công ty sản xuất (nếu Người Bán là đại lý)</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; margin-left:15px\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Hóa đơn nhập hàng VÀ chứng nhận đại lý của bên phát hành hóa đơn (nếu Người Bán nhập hàng từ bên trung gian)&nbsp;</span></span></span></li>
</ul>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><strong style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\">Thực phẩm chức năng/thực phẩm bảo vệ sức khỏe/thực phẩm cho bé dưới 36 tháng</u></strong></span></span></span></span></li>
</ul>

<div style=\"text-align:justify\"><span style=\"box-sizing:border-box\"><span style=\"font-size:14px; text-align:start\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp; &nbsp; &nbsp;+ Người bán khi đăng bán sản phẩm Thực phẩm chức năng/thực phẩm bảo vệ sức khỏe/thực phẩm cho bé&nbsp;dưới 36 tháng cần có các giấy tờ sau:</span></span></span></span></span></span></span></span></span></span></span></span></span></div>

<blockquote style=\"box-sizing:border-box; padding:10px 20px; font-size:17.5px; border-left:5px solid rgb(238, 238, 238); color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial; margin-bottom:20px\">
<div style=\"text-align:justify\"><span style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\">.</strong><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">&nbsp;Xác Nhận Công Bố Phù Hợp Quy Định An Toàn Thực Phẩm</span></span></span></div>

<div style=\"text-align:justify\"><span style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\"><strong style=\"box-sizing:border-box; font-weight:bold\">.</strong><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"font-weight:normal\">&nbsp;Chứng nhận đại lý/ hợp đồng mua bán/ Hóa đơn mua hàng</span></span></span></strong></span></div>

<div style=\"text-align:justify\"><span style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\">.</strong><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">&nbsp;Giấy xác nhận quảng cáo của sản phẩm</span></span></span></div>
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\">.</strong>&nbsp;Giấy ủy quyền quảng cáo cho người bán hàng.&nbsp;</span></span></span></blockquote>
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px; text-align:start\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp; &nbsp; &nbsp;+ Mô tả sản phẩm cần nêu rõ &quot;Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh&quot; để tránh gây hiểu lầm sản phẩm là thuốc và đảm bảo mô tả sản phẩm đúng với thông tin về công dụng thành phần của sản phẩm đó.</span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px; text-align:start\">&nbsp; &nbsp; &nbsp;+ Không đăng bán sản phẩm thực phẩm chức năng xách tay</span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Thời trang/Đồ lót nữ - Đồ lót nam</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Ảnh đại diện sản phẩm nên là ảnh thực, chụp riêng sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Trong các ảnh do người mẫu mặc, phần ảnh sản phẩm thực phải chiếm ít nhất 40% diện tích toàn ảnh</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Người mẫu tạo hình không gây phản cảm, ảnh không mang nội dung khiêu dâm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Thời trang/ Giày dép / Phụ kiện</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;Nêu rõ chất liệu và kích thước của sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Đối với các sản phẩm thời trang hoặc phụ kiện làm bằng lụa tơ tằm, Người bán phải đăng kèm chứng nhận nhãn hiệu ở phần hình ảnh sản phẩm.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Nên có ít nhất một hình ảnh thật của sản phẩm để khách hàng dễ dàng lựa chọn và tránh những sự nhầm lẫn không đáng có.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nhà cửa &amp; Đời sống</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+ Đăng sản phẩm theo đúng định dạng</span></span>&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\"><a href=\"https://shopee.vn/events3/code/1596891349/?\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\" target=\"_blank\">tại đây</a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\">Bách hóa Online</u></b></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">+ Thực phẩm khô:&nbsp;Đăng đầy đủ thông tin nguồn gốc, xuất xứ, hạn sử dụng. Riêng đối với các mặt hàng dễ hư hỏng, cần lưu ý cách sử dụng, bảo quản thích hợp.</span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">+ Đồ uống có cồn:&nbsp;tham khảo&nbsp;<span id=\"docs-internal-guid-fa1c63a0-7fff-84b7-0987-63a3e3504866\" style=\"box-sizing:border-box\"><a href=\"https://shopee.vn/docs/3809\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\"><span style=\"font-size:11pt\"><span style=\"box-sizing:border-box\"><span style=\"font-family:Arial\"><span style=\"color:rgb(17, 85, 204);\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"vertical-align:baseline\">Quy định về đăng bán sản phẩm trên Shopee</span></span></span></span></span></span></a></span>&nbsp;trước khi đăng bán. Đăng bán phải ghi rõ đầy đủ thông tin về nồng độ cồn, hạn sử dụng và thiết lập đúng ngành hàng</span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Mẹ &amp; Bé</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">+&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đăng sản phẩm theo đúng định dạng</span></span>&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\"><a href=\"https://shopee.vn/events3/code/4274607404/?\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\" target=\"_blank\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">tại đây</span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đồng Hồ</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đăng sản phẩm theo đúng định dạng</span></span></span></span>&nbsp;<a href=\"https://shopee.vn/pc_event/?smtt=2.7496&amp;url=https%3A%2F%2Fshopee.vn%2Fevents3%2Fcode%2F3406488351%2F%3Fsmtt%3D2.7496\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">tại đây</span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Voucher &amp; Dịch vụ</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><b style=\"box-sizing:border-box; font-weight:bold\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;</span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đăng sản phẩm theo đúng định dạng</span></span>&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\"><a href=\"https://shopee.vn/events3/code/303315663/\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\" target=\"_blank\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">tại đây</span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">&nbsp; &nbsp; &nbsp;+ Chứng từ cần cung cấp xem&nbsp;<span id=\"docs-internal-guid-a15deea7-7fff-3f0e-9001-85cc6fdde2ba\" style=\"box-sizing:border-box\"><a href=\"https://help.shopee.vn/vn/s/article/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-cung-c%E1%BA%A5p-ch%E1%BB%ABng-t%E1%BB%AB-%C4%91%C4%83ng-b%C3%A1n-s%E1%BA%A3n-ph%E1%BA%A9m-tr%C3%AAn-Shopee\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\"><span style=\"font-size:11pt\"><span style=\"box-sizing:border-box\"><span style=\"font-family:Arial\"><span style=\"color:rgb(17, 85, 204);\"><span style=\"vertical-align:baseline\">tại đây</span></span></span></span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đồ chơi</span></span></span></u></b></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><b style=\"box-sizing:border-box; font-weight:bold\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;</span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đăng sản phẩm theo đúng định dạng</span></span>&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\"><a href=\"https://shopee.vn/events3/code/1818690536/\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\" target=\"_blank\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">tại đây</span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nhà sách Online</span></span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">&nbsp; &nbsp; &nbsp; +&nbsp;</span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(34, 34, 34);\"><span style=\"font-family:arial, sans-serif\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đăng sản phẩm theo đúng định dạng</span></span>&nbsp;</span></span></span></span></span><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><a href=\"https://shopee.vn/events3/code/3252987349/\" style=\"box-sizing:border-box; background:0px 0px transparent; color:rgb(66, 139, 202); text-decoration:none\" target=\"_blank\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">tại</span></span><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">&nbsp;đây</span></span></a></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(51, 127, 229);\">&nbsp; &nbsp; &nbsp;&nbsp;<span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">+&nbsp;</span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"font-family:arial, sans-serif\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"color:rgb(0, 0, 0);\">Shopee nghiêm cấm bán sách &amp; ấn phẩm đã qua sử dụng</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp; &nbsp; &nbsp;&nbsp;<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">+&nbsp;</span></span><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">Người bán khi đăng bán sách và ấn phẩm phải tham gia Shopee Mall.</span></span><br style=\"box-sizing:border-box\" />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">&nbsp; &nbsp; &nbsp;+ Các chứng từ cần cung cấp khi tham gia Shopee Mall:&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<blockquote style=\"box-sizing:border-box; padding:10px 20px; font-size:17.5px; border-left:5px solid rgb(238, 238, 238); color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial; margin-bottom:20px\"><span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">. Giấy phép đăng kí kinh doanh</span></span></span><br />
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">. 1 trong 4 loại giấy tờ sau:&nbsp;</span></span></span></blockquote>

<blockquote style=\"box-sizing:border-box; padding:10px 20px; font-size:17.5px; border-left:5px solid rgb(238, 238, 238); color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial; margin-bottom:20px\">
<blockquote style=\"box-sizing:border-box; padding:10px 20px; font-size:17.5px; border-left:5px solid rgb(238, 238, 238); margin-bottom:20px\"><span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">- Quyết định xuất bản sách (đối với nhà xuất bản)</span></span></span><br />
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">- Quyết định phát hành sách (đối với nhà phát hành)</span></span></span><br />
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">- Giấy ủy quyền phân phối sách từ Nhà Xuất Bản hoặc Nhà phát hành (đối với nhà phân phối)&nbsp;</span></span></span><br />
<span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">- Các chứng từ, hóa đơn VAT mua bán sách (đối với nhà bán lẻ) mua từ Nhà Xuất Bản, Nhà phát hành hoặc công ty được ủy quyền phân phối từ các đơn vị trên</span></span></span></blockquote>
</blockquote>

<blockquote style=\"box-sizing:border-box; padding:10px 20px; font-size:17.5px; border-left:5px solid rgb(238, 238, 238); color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial; margin-bottom:20px\"><span style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\">Lưu ý</strong>&nbsp;: Tất cả chứng từ cung cấp đều phải được scan từ chứng từ gốc.</span></span></span></blockquote>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify\"><b style=\"box-sizing:border-box; font-weight:bold\"><u style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">B</span></span><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">ăng đĩa phim, ca múa nhạc/sân khấu</span></span></u></b></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><strong style=\"box-sizing:border-box; font-weight:bold\">&nbsp; &nbsp;</strong>&nbsp; &nbsp; +&nbsp;<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Các mặt hàng là băng đĩa phim, ca múa nhạc/sân khấu khi đăng bán cần có: giấy phép phê duyệt nội dung + dán nhãn kiểm soát + giấy tờ về nguồn gốc sản phẩm (chứng từ nhập khẩu/hóa đơn thuế).</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<br style=\"box-sizing:border-box\" />
<br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">3/ Thông tin mô tả</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; color:rgb(51, 51, 51); text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Mô tả sản phẩm cần đầy đủ và chi tiết, giúp người mua có thể hiểu rõ những đặc điểm, công dụng, cách dùng, lưu ý khi sử dụng của sản phẩm,vv để làm căn cứ khi đặt mua hàng. Nếu là sản phẩm đã qua sử dụng phải ghi rõ tình trạng bên ngoài và hiệu suất sử dụng của sản phẩm. Từ ngữ mô tả trung thực, rõ ràng, không lập lờ hoặc gây hiểu lầm cho khách hàng.</span></span></span></li>
	<li style=\"box-sizing:border-box; color:rgb(51, 51, 51); text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu là bài đăng cho 1 sản phẩm duy nhất thì đây là phần mô tả cho sản phẩm đó</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu là một Combo gồm nhiều sản phẩm thì phải liệt kê đầy đủ thông tin của từng sản phẩm có trong đó.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Thông tin sản phẩm không bao gồm số điện thoại và các thông tin liên lạc với mục đích quảng cáo hoặc dẫn người dùng tới các website khác.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Điền đầy đủ nguồn gốc, xuất xứ, thuộc tính sản phẩm và chế độ bảo hành (nếu có) theo yêu cầu của mỗi ngành hàng. Sản phẩm không có giấy tờ chứng minh nguồn gốc xuất xứ, thương hiệu thì không được để tên thương hiệu trên sản phẩm.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Chú ý gắn đúng hashtag liên quan với sản phẩm đăng bán.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Không chứa từ khóa fake/nhái hoặc các từ khóa tương tự</span></span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">4/ Danh mục</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Người đăng phải chọn đúng nhóm danh mục cho sản phẩm để có thể dễ dàng tiếp cận với khách hàng</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Trường hợp sản phẩm nằm ngoài những ngành hàng sẵn có, hãy chọn danh mục: Sản phẩm khác</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu người bán lựa chọn sai danh mục thì sản phẩm sẽ bị khóa cho đến khi sửa đổi và lựa chọn danh mục phù hợp. Nếu người bán chỉ bấm &quot;cập nhật&quot; mà không thao tác chỉnh sửa gì, sản phẩm sẽ bị xóa.</span></span></span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">5/ Giá sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>

<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Giá sản phẩm đăng bán hoặc giá khuyến mãi (nếu có) phải tính bằng đơn vị VNĐ</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nếu bài đăng cho nhiều sản phẩm, phải để giá rõ ràng cho từng sản phẩm</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Giá sản phẩm phải được phân loại rõ ràng dựa trên kích cỡ, màu sắc, chất lượng.</span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">6/ Phí vận chuyển</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người bán phải xác định đúng khối lượng sản phẩm cần vận chuyển để ước lượng chi phí vận chuyển</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khối lượng sản phẩm đăng ký phải là khối lượng sau khi đóng gói của hàng hóa để chuyển đi</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Với các sản phẩm cồng kềnh, Người bán nên tham khảo thêm Chính sách vận chuyển để biết chi tiết cách thức xác định khối lượng sản phẩm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<br style=\"box-sizing:border-box\" />
<br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><u style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">C.&nbsp;</span></span></strong></u><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><u style=\"box-sizing:border-box\"><strong style=\"box-sizing:border-box; font-weight:bold\">Quy định về hạn sử dụng của sản phẩm:</strong></u></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">1/ Danh sách các sản phẩm bắt buộc phải có hạn sử dụng trên bao bì:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
&nbsp;
<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Dược phẩm</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Hóa chất tẩy rửa, vệ sinh</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Mỹ phẩm</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Nước hoa</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Tã, băng vệ sinh</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Thực phẩm</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Thực phẩm chức năng</span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"background-color:white\"><span style=\"color:rgb(0, 0, 0);\">2/ Quy định về hạn sử dụng của sản phẩm chính:</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
&nbsp;
<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Người dùng chỉ được phép bán các loại hàng hóa mà khi giao đi phải còn ít nhất 30% thời hạn sử dụng và còn ít nhất 30 ngày, tính từ ngày sản xuất đến ngày hết hạn</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Đối với mặt hàng thực phẩm, đặc biệt là thực phẩm có hạn sử dụng dưới 30 ngày, Người Bán cần ghi rõ hạn sử dụng trên mô tả sản phẩm và tự sắp xếp vận chuyển khi có đơn hàng phát sinh. Mọi trường hợp Người Mua nhận được sản phẩm thực phẩm đã hết hạn sử dụng do Người Bán không nêu rõ hạn sử dụng trong mô tả sản phẩm được xem như Người Bán đăng bán hàng hết hạn sử dụng, và sẽ bị xử lý theo quy định của Shopee</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Hạn sử dụng của sản phẩm được ghi dưới dạng &quot;sử dụng trước tháng/năm&quot; sẽ được hiểu ngày hết hạn là ngày 1 của tháng đó</span></span><br style=\"box-sizing:border-box\" />
	<span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Hạn sử dụng của sản phẩm được ghi dưới dạng &quot;hạn sử dụng: tháng/năm&quot; sẽ được hiểu ngày hết hạn là ngày cuối cùng của tháng đó</span></span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Trường hợp người dùng thực hiện giảm giá do sản phẩm sắp hết hạn, thông tin về ngày hết hạn phải được nêu rõ trong mô tả sản phẩm</span></span></span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">3/&nbsp;</span></span><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Quy định về hạn sử dụng của quà tặng kèm</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
&nbsp;
<ul style=\"box-sizing:border-box; margin-bottom:10px; color:rgb(83, 82, 88); font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial; font-size:14px; font-style:normal; font-variant-ligatures:normal; font-weight:400; text-align:start; white-space:normal; background-color:rgb(255, 255, 255); text-decoration-thickness:initial; text-decoration-style:initial; text-decoration-color:initial\">
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Khi quà tặng kèm được đăng công khai trên thông tin sản phẩm chính, quy định về hạn sử dụng sẽ được áp dụng tương tự sản phẩm chính.</span></span></span></li>
	<li style=\"box-sizing:border-box; text-align:justify; background:white; vertical-align:baseline\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Khi quà tặng kèm không được đăng công khai trên thông tin sản phẩm chính, Shopee sẽ không can thiệp xử lý khiếu nại về hạn sử dụng của quà tặng kèm. Tuy nhiên hành vi cố ý tặng kèm sản phẩm hết hạn sử dụng có thể mang đến trải nghiệm không tốt cho Người Mua và làm giảm uy tín của Người Bán thông qua việc đánh giá kém từ Người Mua trên đơn hàng.</span></span></span></li>
</ul>
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">4/ Xử lý vi phạm&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(0, 0, 0);\">Người dùng vi phạm một trong các quy định trên về hạn sử dụng của sản phẩm, tùy theo mức độ vi phạm, Shopee sẽ tiến hành một số biện pháp xử lý phù hợp như xóa sản phẩm, khóa tài khoản, yêu cầu người bán đền bù thiệt hại cho người mua,v.v...</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><br />
<br />
<span style=\"font-size:14px\"><span style=\"box-sizing:border-box\"><span style=\"color:rgb(83, 82, 88);\"><span style=\"font-family:&#039;B Koodak&#039;, &#039;X Koodak&#039;, Koodak, Arial\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-weight:400\"><span style=\"white-space:normal\"><span style=\"background-color:rgb(255, 255, 255);\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><b style=\"box-sizing:border-box; font-weight:bold\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">Khuyến cáo:</span></span><i style=\"box-sizing:border-box\">&nbsp;</i></b><i style=\"box-sizing:border-box\"><span style=\"font-size:14px\"><span style=\"box-sizing:border-box\">Người bán vui lòng tôn trọng và tuân thủ quy định đăng bán sản phẩm của Shopee. Mọi sản phẩm không tuân thủ theo các quy định, hướng dẫn trên sẽ bị khóa/xóa mà không cần thông báo trước. Người bán sẽ chịu trách nhiệm hoàn toàn trước Pháp luật nếu cố tình đăng tải các nội dung mà Pháp luật Việt Nam không cho phép./.</span></span></i></span></span></span></span></span></span></span></span></span></span></span></span><br />
&nbsp;')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('27', 'url_ahamove', 'https://api.ahamove.com')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('28', 'percent_of_ship', '0')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('29', 'province_ecng', '70')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('30', 'district_ecng', '7360')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('31', 'ward_ecng', '73600')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('32', 'address_ecng', '99 Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('33', 'insurance', '1.2')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('36', 'email_get_not_received', 'trieulai@chonhagiau.com')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('42', 'max_price_ghn', '5000000')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('39', 'email_order_seller_delivery_failed', 'trieulai@chonhagiau.com')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('41', 'email_seller_register', 'partner@chonhagiau.com')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('43', 'shop_id_ghn', '79')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('44', 'voucher_maximum_percent', '49')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('45', 'children_fund', '5,000')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('46', 'username_vtpost', '0833081888')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('47', 'password_vtpost', 'ct4084115')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('48', 'name_ecng', 'Kho Chợ Nhà Giàu')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('49', 'phone_ecng', '0833081888')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('50', 'email_ecng', 'partner@chonhagiau.com')";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'image_size', '100x100')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'home_data', 'all')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'home_view', 'viewgrid')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'per_page', '20')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'per_row', '3')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'money_unit', 'VND')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'weight_unit', 'g')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'post_auto_member', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_check_order', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'format_order_id', 'S%06s')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'format_code_id', 'S%06s')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'facebookappid', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_guest_order', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_showhomtext', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_order', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_order_popup', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_order_non_detail', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_price', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_order_number', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'order_day', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'order_nexttime', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_payment', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'groups_price', '3')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_tooltip', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timecheckstatus', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'show_product_code', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'show_compare', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'show_displays', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'use_shipping', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'use_coupons', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_wishlist', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_gift', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'active_warehouse', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'tags_alias', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_tags', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'tags_remind', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'point_active', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'point_conversion', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'point_new_order', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'money_to_point', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'review_active', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'review_check', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'review_captcha', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'group_price', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'groups_notify', '3')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'template_active', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'download_active', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'download_groups', '6')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'saleprice_active', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortdefault', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alias_lower', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_postcomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowed_comm', '-1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'view_comm', '6')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'setcomm', '4')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'activecomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'emailcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'adminscomm', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha_area_comm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha_type', 'captcha')";
