<!-- BEGIN: main -->

<div id="item_order_customer" class="border rounded border-bottom-0">
	<div class="manage_product_header bg_gray2 rounded-top">
		<div class="row d-flex align-items-center p-4 text-center">
			<div class="col-2">
				<label class="ecng_label_checkbox mt-2">
					<input name="checkall" type="checkbox" onchange="check_all_arr_checkbox(this)" >
					<span class="fs_16" style="padding-left:30px">Chọn tất cả</span>
					<span class="ecng_checkmark" style="top:1px"></span>
				</label>
				
			</div>
			<div class="col-5">
				Sản phẩm
			</div>
			
			<div class="col-3">
				Giá
			</div>
			<div class="col-2">
				SL tồn kho
			</div>
			
		</div>
	</div>
	<!-- BEGIN: no_product -->
	<div class="no_product" style="min-height: 245px"><p class="fs_16 mb-3 bg_white text-center font-weight-normal">Không tìm thấy kết quả! </p></div>
	<!-- END: no_product -->
	<!-- BEGIN: loop -->
	<div class="manage_product_item border-bottom">
		<div class="row d-flex align-items-center p-4 text-center">
			<div class="col-1 pr-0" >
				
				<label class="ecng_label_checkbox ">
					<input type="checkbox" onchange="add_arr_checkbox({VIEW.id})" id="add_arr_checkbox_{VIEW.id}" value="{VIEW.id}" name="arr_checkbox[]" >
					<span class="ecng_checkmark"></span>
				</label>
				
			</div>
			
			<div class="col-6 d-flex align-items-center justify-content-start">
				<img src="{VIEW.image}" class="width_50" name="image_product_{VIEW.id}" style="object-fit: contain" alt="{VIEW.name_product}" />
				<span>
					<div class="ml-3 text-left" name="name_product_{VIEW.id}">{VIEW.name_product} </div>
				</span>
			</div>
			
			<div class="col-3" name="price_product_{VIEW.id}">
				{price}
			</div>
			<div class="col-2" name="warehouse_product_{VIEW.id}">
				{VIEW.warehouse}
			</div>
			
		</div>
	</div>
	
	<!-- END: loop -->
</div>
<div class="clear"></div>
<!-- BEGIN: generate_page -->
<nav class="text-center">
	{NV_GENERATE_PAGE}
</nav>
<!-- END: generate_page -->
<div class="row">
	<div class="col text-right">
	<button class="btn_ecng_outline mr-2" style="height:40px;width: 95px" data-dismiss="modal" >Hủy</button>
		<button class="btn_ecng" style="height:40px;" data-dismiss="modal" onclick = "show_list_product()">Xác Nhận</button>
	</div>
</div>

<script>
	check_checked();
</script>

<!-- END: main -->
