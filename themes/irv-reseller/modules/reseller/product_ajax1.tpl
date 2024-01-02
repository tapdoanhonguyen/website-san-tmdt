<!-- BEGIN: main -->
<div class="fs_20 bg_gray pb-3">Sản phẩm ({num_items})</div>
<div class="manage_product_header bg_gray2 rounded-top">
	<div class="row d-flex align-items-center p-4 text-center">
		<div class="col-auto">	
			
		</div>
		<div class="col-2">
			Mã sản phẩm
		</div>
		<div class="col-3 d-flex align-items-center justify-content-start">
			Sản phẩm
		</div>
		<div class="col-2">Danh mục</div>
		<div class="col-1 col-auto">
			FreeShip
		</div>
		<div class="col-1 col-auto">
			Trạng thái
		</div>
		<div class="col-1">
			SL tồn kho
		</div>
		<div class="col-1">
			Thao tác
		</div>
	</div>
</div>
<!-- BEGIN: loop -->
<div class="manage_product_item border-bottom">
	<div class="row d-flex align-items-center p-4 text-center">
		<div class="col-auto pr-0" style="text-align: center;">
			
			<label class="ecng_label_checkbox ">
				<input type="checkbox"  onchange="nv_change_freeship({VIEW.id})" id="change_freeship_{VIEW.id}" value="{VIEW.id}" name="free_ship[]" >
				<span class="ecng_checkmark"></span>
			</label>	
		</div>
		<div class="col-2">
			{VIEW.barcode}
		</div>
		<div class="col-3 d-flex align-items-center justify-content-start">
			<img src="{VIEW.image}" class="width_50" style="object-fit: contain" alt="{VIEW.name_product}" />
			<a href="{VIEW.alias}" target="_blank">
				<div class="ml-3 text-left">{VIEW.name_product} </div>
			</a>
		</div>
		<div class="col-2">{VIEW.categories_id}</div>
		
		<div class="col-1">
			
			<label class="ecng_label_checkbox">
				<input id="change_freeship_{VIEW.id}" value="{VIEW.id}" type="checkbox"  {CHECK_FREESHIP} onclick="change_freeship({VIEW.id});" />
				<span class="ecng_checkmark"></span>
			</label>
			
		</div>
		
		<div class="col-1 col-auto">
			<label class="ecng_label_checkbox {disabled}" >
				<input id="change_status_{VIEW.id}" value="{VIEW.id}" type="checkbox" {CHECK} {disabled_input} onclick="nv_change_status({VIEW.id});" />
				<span class="ecng_checkmark" data-toggle="tooltip" data-placement="top" title="{tooltip_db}"></span>
			</label>
		</div>
		
		<div class="col-1">
			<!-- BEGIN: no_classify -->
			{warehouse}
			<button type="button" class="btn_none secondary_text" data-toggle="modal" data-target="#view_no_classify{id}">Xem chi tiết</button>
			<!-- The Modal -->
			<div class="modal fade" id="view_no_classify{id}">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Phân loại hàng</h4>
							<button type="button" class="close" data-dismiss="modal">×</button>
						</div>
						<div class="modal-body">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th>Giá niêm yết</th>
										<th>Giá khuyến mãi</th>
										<th>SL tồn kho</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input style="width:100px" name="price_special_product1" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{price_special}"/>
										</td>
										<td >
											<input style="width:100px" name="price_product1" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{price}"/>
											<input name="classfic_id1" type="text" hidden value="{id}"/>
										</td>
										<td>
											<input style="width:100px" name="quantily_product1" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{warehouse}"/>
										</td>
									</tr>
								</tbody>
							</table>
							<div class=""><span class="btn_ecng" onclick="edit_product1({id})">Cập nhật</span></div>
						</div>
					</div>
				</div>
			</div>
			<!-- END: no_classify -->
			
			<!-- BEGIN: classify -->
			<div>{warehouse}</div>
			<button type="button" class="btn_none secondary_text" data-toggle="modal" data-target="#view_classify{VIEW.id}">Xem chi tiết</button>
			<!-- The Modal -->
			<div class="modal fade" id="view_classify{VIEW.id}">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Phân loại hàng</h4>
							<button type="button" class="close" data-dismiss="modal">×</button>
						</div>
						<div class="modal-body">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th class="text-left">Phân loại</th>
										<th>Giá niêm yết</th>
										<th>Giá khuyến mãi</th>
										<th>SL tồn kho</th>
									</tr>
								</thead>
								<tbody>
									<!-- BEGIN: classify_loop -->
									<tr>
										<td class="text-left capitalize">
											{classfic.ten_rutgon}
											<input name="classfic_id" type="text" hidden value="{classfic.id}"/>
										</td>
										<td>
											<input style="width:100px" name="price_special_product" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{classfic.price_special}"/>
										</td>
										<td >
											<input style="width:100px" name="price_product" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{classfic.price}"/>
										</td>
										<td>
											<input style="width:100px" name="quantily_product" onkeyup="this.value=FormatNumber(this.value)" type="text" value="{classfic.sl_tonkho}"/>
										</td>
									</tr>
									<!-- END: classify_loop -->
								</tbody>
							</table>
							<div class=""><span class="btn_ecng"  onclick="edit_product({VIEW.id})">Cập nhật</span></div>
						</div>
					</div>
				</div>
			</div>
			<!-- END: classify -->
		</div>
		
		<div class="col-1">
			<a title="Sửa sản phẩm" href="{VIEW.link_edit}#edit" class="pr-3"><img src="/themes/default/banhang/images/pen.svg" alt=""/></a>
			<a title="Xóa sản phẩm" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);"><img src="/themes/default/banhang/images/trach.svg" alt=""/></a>
		</div>
	</div>
</div>
<!-- END: loop -->

<h3 class="fs_16 pt-3 pl-2">{no_product}</h3>

<!-- BEGIN: generate_page -->
<div class="container text-center">
    <div >
        <tr>
            <td class="text-center" colspan="12">{NV_GENERATE_PAGE}</td>
		</tr>
	</div>
</div>
<!-- END: generate_page -->

<script>	
	function edit_product(id){
		
		var price_product_arr = []; 
		var price_special_product_arr = []; 
		var quantily_product_arr = []; 
		var classify_id = [];
		
		var price_product = $("#view_classify"+id + " input[name=price_product]");
		var price_special_product = $("#view_classify"+id + " input[name=price_special_product]");
		var quantily_product = $("#view_classify"+id + " input[name=quantily_product]");
		
		var product_id = $("#view_classify"+id + " input[name=classfic_id]");
		
		
		for (var i = 0; i < price_product.length; i++) {
			price_product_arr.push(price_product[i].value);
		}
		for (var i = 0; i < price_special_product.length; i++) {
			price_special_product_arr.push(price_special_product[i].value);
		}
		for (var i = 0; i < quantily_product.length; i++) {
			quantily_product_arr.push(quantily_product[i].value);
		}
		
		
		for (var i = 0; i < product_id.length; i++) {
			classify_id.push(product_id[i].value);
		}
		
		$.ajax({               
			type: "GET", 
			url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product1&mod=edit_product',
			data: {
				product_price: price_product_arr,
				price_special_product: price_special_product_arr,
				classify_id: classify_id,
				quantily_product: quantily_product_arr,
			},
			beforeSend: function() {
				
			},	               
			complete: function() {
				
			},                 
			success: function(res) {
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		}); 
	}
	//
	
	
	function edit_product1(id1){;
		
		var price_product1 = $("#view_no_classify"+id1 + " input[name=price_product1]").val();
		var price_special_product1 = $("#view_no_classify"+id1 + " input[name=price_special_product1]").val();
		var quantily_product1 = $("#view_no_classify"+id1 + " input[name=quantily_product1]").val();
		
		var product_id1 = $("#view_no_classify"+id1 + " input[name=classfic_id1]").val();
		
		
		$.ajax({               
			type: "GET", 
			url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product1&mod=edit_product1',
			data: {
				price_product1: price_product1,
				price_special_product1: price_special_product1,
				product_id1 : product_id1,
				quantily_product1 : quantily_product1
			},
			beforeSend: function() {
				
			},	               
			complete: function() {
				
			},                 
			success: function(res) {
				
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		}); 
	}
	
	
</script>
<!-- END: main -->