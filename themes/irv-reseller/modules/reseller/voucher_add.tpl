<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>

<link href="{NV_BASE_SITEURL}themes/default/banhang/css/datetimepicker.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/default/banhang/js/moment.js_2.29.1_moment-with-locales.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/default/banhang/js/datetimepicker.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}themes/default/banhang/css/simplePagination.css">
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/default/banhang/js/jquery.simplePagination.js"></script>

<!-- BEGIN: view -->

<div class="row mt-3">
	<div class="bg_white p-3 col-7 rounded">
		<form id="add_voucher" >
			<h5>Thông tin cơ bản</h5>
			<input type="hidden" name="id" value="{data.id}" />
			<div class="form-group row mt-4 mb-4">
				<label class="col-4 col-form-label">Tên chương trình giảm giá</label>
				<div class="col-8">
					<div class="d-flex border align-items-center rounded">
						<div class="input_error_noIcon">
							<input readonly="true"  onkeyup="countChars1(this)" type="text" class="form-control border-0" maxlength="100" placeholder="Nhập vào"name="voucher_name" value="{data.voucher_name}">
						</div>
						<span class="px-3 mt-1"><span id="charNum1">{STR_VOUCHER_NAME}</span>/100</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Mã voucher</label>
				<div class="col-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<input class="input-group-text p-0" readonly name="seller_code" value="{SHOP_CODE}">
						</div>
						<div class="d-flex border align-items-center">
							<div class="input_error_noIcon">
								<input readonly="true"  onkeyup="countChars2(this)" id="uppercase_text" type="text" class="form-control border-0" maxlength="5" placeholder="Nhập vào"
								name="voucher_code" value="{VOUCHER_CODE}">
							</div>
							<span class="px-1 pl-2 mt-1"><span id="charNum2">{STR_VOUCHER_CODE}</span>/5</span>
						</div>
					</div>
					<div class="notifi_error text_red mt-2 fs_12"></div>
					
				</div>
			</div>
			<div class="form-group row pt-2">
				<div class="col-4"></div>
				<div class="col-8">
					<div>Vui lòng chỉ nhập các kí tự chữ cái (A-Z), số (0-9); tối đa 5 kí tự.</div>
					<div>Mã giảm giá đầy đủ là: {SHOP_CODE}<span class="text-uppercase" id="code_vouchername"></span></div>
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Thời gian sử dụng</label>
				<div class="col-4">
					<input id="time_from" readOnly type="text" value="{data.time_from}" maxlength="10" name="time_from" class="form-control ">

					
				</div>
				<div class="col-4">
					<input id="time_to" readOnly type="text" value="{data.time_to}" maxlength="10" name="time_to"
					class="form-control ">
				
				</div>
				<div class="notifi_error_time_from text_red mt-2 fs_12"></div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Mức giảm giá</label>
				<div class="col-8">
					<input readonly="true"  class="form-control" value="{data.discount_price}">
				</div>
			</div>
			<!-- BEGIN: maximum_discount -->
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Mức giảm tối đa</label>
				<div class="col-8">
					<input readonly="true"  class="form-control" value="{data.maximum_discount}">
				</div>
			</div>
			<!-- END: maximum_discount -->
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Đơn hàng tối thiểu</label>
				<div class="col-8">
					<div class="input_error_noIcon">
						<input type="text" readonly="true"  onchange="myFunction('2')" class="form-control number_add del_zero2" placeholder="Nhập vào"  name="minimum_price" value="{data.minimum_price}"
						onkeyup="this.value=FormatNumber(this.value);">
					</div>
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Lượt sử dụng tối đa</label>
				<div class="col-8">
					<div class="input_error_noIcon">
						<input readonly="true"  type="text" onchange="myFunction('3')" class="form-control number_add del_zero3" maxlength="3" placeholder="Nhập vào" name="usage_limit_quantity"
						value="{data.usage_limit_quantity}" onkeyup="this.value=FormatNumber(this.value);">
					</div>
				</div>
			</div>
			<div class="text-center fs_16">{no_list_product}</div>
			<!-- BEGIN: list_product -->
			<div class="form-group row mb-2 pt-2">
				<label class="col-12 col-form-label">Sản phẩm được áp dụng</label>
			</div>
			
			<div class="form-group row mb-2 pt-2">
				<div class="col-12">
					<table class="table table-hover border rounded" id="content">
						<thead>
							<tr>
								<th style="width:65%">Sản phẩm</th>
								<th style="text-align:center">Giá</th>
								<th style="text-align:center">SL tồn kho</th>
							</tr>
						</thead>
						<tbody>
							<!-- BEGIN: products -->
							<tr id="item_product">
								<td>
									<div class="d-flex align-items-center justify-content-start"><img src="/assets/retails/{product.image}" class="width_50" style="object-fit: contain"><span><div class="ml-3 text-left">{product.name_product} </div></span>
									</div></td>
									<td style="text-align:center">{price}</td>
									<td style="text-align:center">{product.sl_tonkho}</td>
							</tr>
							<!-- END: products -->
						</tbody>
					</table>
				</div>
			</div>
			<div id="pagination" class="mb-4"></div>
			<!-- END: list_product -->	
			
		</form>
		
	</div>
	
	<div class="col-5 text-center ">
		<img src="/themes/default/banhang/images/hoptacbanhang.png" alt="">
		<div class="mt-1">Lưu ý: Mỗi khách hàng chỉ dùng được 1 lần.</div>
	</div>
</div>

<script>
	paging();
	function paging() {
	
	var items = $("#content tbody tr");
	var numItems = items.length;
	var perPage = 5;
	items.slice(perPage).hide();
	$("#pagination").pagination({
	items: numItems,
	itemsOnPage: perPage,
	showGoInput: true,
	cssStyle: "light-theme",
	onPageClick: function(pageNumber) {
	var showFrom = perPage * (pageNumber - 1);
	var showTo = showFrom + perPage;
	
	items.hide().slice(showFrom, showTo).show();
	}
	});
	};
</script>
<!-- END: view -->

<!-- BEGIN: add -->
<style>
	*, *:before, *:after {
	box-sizing: border-box;
	}
</style>

<h4 class="py-2"> Tạo mã giảm giá</h4>
<div class="row mt-3">
	<div class="bg_white p-3 col-7 rounded">
		<form id="add_voucher" >
			<h5>Thông tin cơ bản</h5>
			<input type="hidden" name="id" value="{data.id}" />
			<div class="form-group row mt-4 mb-4">
				<label class="col-4 col-form-label">Tên chương trình giảm giá</label>
				<div class="col-8">
					<div class="d-flex border align-items-center rounded">
						<div class="input_error_noIcon">
							<input onkeyup="countChars1(this)" type="text" class="form-control border-0" maxlength="100" placeholder="Nhập vào"name="voucher_name" value="{data.voucher_name}">
						</div>
						<span class="px-3 mt-1"><span id="charNum1">{STR_VOUCHER_NAME}</span>/100</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Mã voucher</label>
				<div class="col-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<input class="input-group-text p-0" readonly name="seller_code" value="{SHOP_CODE}">
						</div>
						<div class="d-flex border align-items-center">
							<div class="input_error_noIcon">
								<input onkeyup="countChars2(this)" id="uppercase_text" type="text" class="form-control border-0" maxlength="5" placeholder="Nhập vào"
								name="voucher_code" value="{VOUCHER_CODE}">
							</div>
							<span class="px-1 pl-2 mt-1"><span id="charNum2">{STR_VOUCHER_CODE}</span>/5</span>
						</div>
					</div>
					<div class="notifi_error text_red mt-2 fs_12"></div>
					
				</div>
			</div>
			<div class="form-group row pt-2">
				<div class="col-4"></div>
				<div class="col-8">
					<div>Vui lòng chỉ nhập các kí tự chữ cái (A-Z), số (0-9); tối đa 5 kí tự.</div>
					<div>Mã giảm giá đầy đủ là: {SHOP_CODE}<span class="text-uppercase" id="code_vouchername"></span></div>
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Thời gian sử dụng</label>
				<div class="col-4">
				<div id="picker_time_from"></div>
				<input type="hidden" name="time_from" id="time_from" value="" />
				</div>
				<div class="col-4">
				<div id="picker_time_to"></div>
				<input type="hidden" name="time_to" id="time_to" value="" />

					
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Loại giảm giá | Mức giảm giá</label>
				<div class="col-8">
					<div class="input_error_noIcon">
						<div class="input-group">
							<div class="input-group-prepend border rounded-left">
								<select class="form-control border-0" id="type_discount">
									<option value="0" selected>Theo số tiền</option>
									<option value="1">Theo phần trăm</option>
								</select>
							</div>
							<div id="change_type_discount" class="border rounded-right">
								
							</div>
							
						</div>
					</div>
					<div class="notifi_error1 text_red mt-2 fs_12"></div>
				</div>
			</div>
			<div id="maximum_discount">
				
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Đơn hàng tối thiểu</label>
				<div class="col-8">
					<div class="input_error_noIcon">
						<input type="text" onchange="myFunction('2')" class="form-control number_add del_zero2" placeholder="Nhập vào"  name="minimum_price" value="{data.minimum_price}"
						onkeyup="this.value=FormatNumber(this.value);">
					</div>
				</div>
			</div>
			
			<div class="form-group row mb-4 pt-2">
				<label class="col-4 col-form-label">Lượt sử dụng tối đa</label>
				<div class="col-8">
					<div class="input_error_noIcon">
						<input type="text" onchange="myFunction('3')" class="form-control number_add del_zero3" maxlength="3" placeholder="Nhập vào" name="usage_limit_quantity"
						value="{data.usage_limit_quantity}" onkeyup="this.value=FormatNumber(this.value);">
					</div>
				</div>
			</div>
			<div class="form-group row mb-2 pt-2">
				<label class="col-4 col-form-label">Sản phẩm được áp dụng</label>
				<div class="col-8">
					<div class="row">
						<div class="col-4 d-flex align-items-center">
							<label class="ecng_label_radio pl-4 m-0" style="line-height: 16px;">
								<input type="radio" onclick="change_option();" checked = "checked" name="list_product" value="0">
								<span class="checkmark"></span>
								<span class="pl-1" style="font-size:14px;">Toàn Shop</span>
							</label>
							
						</div>	
						<div class="col-6 d-flex align-items-center">
							<label class="ecng_label_radio pl-4 m-0" style="line-height: 16px;">
								<input type="radio" onclick="change_option();"  name="list_product" value="1">
								<span class="checkmark"></span>
								<span class="pl-1" style="font-size:14px;">Tùy chọn sản phẩm</span>
							</label>
						</div>	
						
					</div>
				</div>
			</div>
			<div id="canvas_add" class="pb-4"></div>
			
			<div id="result_list_product">
				<div id="pagination" class="mb-4"></div>
			</div>
			
			<div class="text-center">
				<button class="btn_ecng">Tạo mã</button>
			</div>
		</form>
		
	</div>
	
	<div class="col-5 text-center ">
		<img src="/themes/default/banhang/images/hoptacbanhang.png" alt="">
		<div class="mt-1">Lưu ý: Mỗi khách hàng chỉ dùng được 1 lần.</div>
	</div>
</div>
<!-- modal -->
<div class="modal fade" id="modal_list_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 1440px !important;">
		<div class="modal-content p-3">
			
		</div>
	</div>
</div>


<script>

$(document).ready(function() {
	$('#picker_time_from').dateTimePicker({
		dateFormat:"DD-MM-YYYY HH:mm",
	});
	$('#picker_time_to').dateTimePicker({
		dateFormat:"DD-MM-YYYY HH:mm",
	});

	var time_from = '{ROW.time_from}';
	var time_to = '{ROW.time_to}';
	if(time_from != ''){
		$('#picker_time_from').text(time_from);
	}
	if(time_to != ''){
		$('#picker_time_to').text(time_to);
	}

});

	 //$(function () {
	 //$("#datetimepicker1").datetimepicker(); 
	// }); 
	var arr_checkbox = [];
	
	function popup_list_product_add(){
	$.ajax({
	type : 'POST',
	url : nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=voucher-add&popup_list_product_add=1',
	
	success : function(res){
	$("#modal_list_product .modal-content").html(res);
	$("#modal_list_product").modal({
	backdrop: "static"
	});
	},
	error: function(xhr, ajaxOptions, thrownError) {
	alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	}
	});
	
	
	}
	
	function show_list_product(){
	$('#result_list_product').html('<table class="table table-hover border rounded" id="content"><thead><tr ><th style="width:65%">Sản phẩm</th><th style="text-align:center">Giá</th><th style="text-align:center">SL tồn kho </th><th style="text-align:center">Hành động </th></tr></thead><tbody class="a"></tbody></table><div id="pagination" class="mb-4"></div>');
	
	var content = '';
	$.map( arr_checkbox, function( chiso, giatri ) {
	content += '<tr id = "item_revome_' +giatri+ '"><td><div class="d-flex align-items-center justify-content-start"><img src="' + chiso["image_product"] + '" class="width_50"  style="object-fit: contain" /><span><div class="ml-3 text-left" >' + chiso["name_product"] + '</div></span></div></td><td style="text-align:center">' + chiso["price_product"] + '</td><td style="text-align:center">' + chiso["warehouse_product"] + '</td><td style="text-align:center"><div style="cursor:pointer" onclick="remove_product(' +giatri+ ')"><img src="/themes/default/banhang/images/trach.svg" alt=""></div></td></tr>';
	});
	$('.a').append(content);
	pa();
	}
	
	//
	
	function show_list_product_edit(){
	$('#result_list_product').html('<table class="table table-hover border rounded" id="content"><thead><tr ><th style="width:65%">Sản phẩm</th><th style="text-align:center">Giá</th><th style="text-align:center">SL tồn kho </th><th style="text-align:center">Hành động </th></tr></thead><tbody class="a"></tbody></table><div id="pagination" class="mb-4"></div>');
	
	var content = '';
	$.map( arr_checkbox, function( chiso, giatri ) {
	content += '<tr id = "item_revome_' +giatri+ '"><td><div class="d-flex align-items-center justify-content-start"><img src="' + chiso["image_product"] + '" class="width_50"  style="object-fit: contain" /><span><div class="ml-3 text-left" >' + chiso["name_product"] + '</div></span></div></td><td style="text-align:center">' + chiso["price_product"] + '</td><td style="text-align:center">' + chiso["warehouse_product"] + '</td><td style="text-align:center"><div style="cursor:pointer" onclick="remove_product(' +giatri+ ')"><img src="/themes/default/banhang/images/trach.svg" alt=""></div></td></tr>';
	});
	$('.a').append(content);
	pa();
	}
	//
	
	function remove_product(item){
	arr_checkbox.splice(item, 1);
	$('#item_revome_' +item).remove();
	pa();
	}
	
	change_option();
	function change_option(){
	var value = $('input[name=list_product]:checked').val();
	if(value == 0){
	$('#canvas_add').html('');
	$('#result_list_product').addClass('d-none').removeClass('d-block');
	}else{
	$('#canvas_add').html('<div class="btn_ecng_outline w-50 m-auto text-center" onclick="popup_list_product_add()" style="cursor:pointer">Thêm sản phẩm</div>');
	$('#result_list_product').addClass('d-block').removeClass('d-none');
	}
	}
	
	var type_discount = $('#type_discount').val();
	choose_type_discount(type_discount);
	
	$( "#type_discount" ).change(function() {
	var type_discount = $('#type_discount ').val();
	choose_type_discount(type_discount);
	});
	
	function choose_type_discount(type_discount){
	if(type_discount ==0){
	$('#change_type_discount').html('<input type="text" onchange="myFunction(1)" class="form-control number_add del_zero1 border-0" placeholder="Nhập vào"  name="discount_price" value="{data.discount_price}"onkeyup="this.value=FormatNumber(this.value);">');
	$('#maximum_discount').html('');
	}else{
	$('#change_type_discount').html('<div class="input-group rounded-lg"><input type="text" onchange="myFunction(1)" class="form-control number_add del_zero1 border-0" placeholder="% giảm lớn hơn 1"  name="discount_percent" value="{data.discount_percent}" onkeyup="this.value=FormatNumber(this.value);" maxlength="2"><div class="input-group-prepend"><button type="button" class="btn bg_gray" disabled>% Giảm</button></div></div>');
	
	$('#maximum_discount').html('<div class="form-group row mb-0 pt-2" ><label class="col-4 col-form-label">Mức giảm tối đa</label><div class="col-8"><div class="input_error_noIcon"><input type="text" onchange="myFunction(2)" class="form-control number_add del_zero2" placeholder="Nhập vào"  name="maximum_discount" value="{data.maximum_discount}"onkeyup="this.value=FormatNumber(this.value);"></div></div></div><div class="form-group row pt-2"><div class="col-4"></div><div class="col-8"><div class="fs_12 text_gray_color">Nếu bỏ trống thì mức giảm tối đa sẽ là không giới hạn!</div></div></div>');
	}
	}
	
	
	function pa() {
	var items = $("#content tbody tr");
	var numItems = items.length;
	var perPage = 5;
	items.slice(perPage).hide();
	$("#pagination").pagination({
	items: numItems,
	itemsOnPage: perPage,
	showGoInput: true,
	cssStyle: "light-theme",
	onPageClick: function(pageNumber) {
	var showFrom = perPage * (pageNumber - 1);
	var showTo = showFrom + perPage;
	
	items.hide().slice(showFrom, showTo).show();
	}
	});
	};
	

	$("#add_voucher").validate({
	rules: {
	voucher_name: {
	required: true,
	minlength: 4
	},
	voucher_code: {
	required: true,
	minlength: 4,
	alphanumeric: true,
	},
	discount_price: {
	required: true,
	minlength: 4
	},
	minimum_price: {
	required: true,
	minlength: 4,
	//notequal:true,
	},
	usage_limit_quantity: {
	required: true,
	min: 1,
	max:999,
},
time_from: {
	required: true
},
time_to: {
	required: true
}


},
messages: {
	voucher_name: {
		required: "Chưa nhập tên chương trình",
		minlength: "Tên chương trình phải trên 4 ký tự"
	},
	voucher_code: {
		required: "Chưa nhập mã voucher",
		minlength: "Mã voucher phải trên 4 ký tự"
	},
	discount_price: {
		required: "Chưa nhập số tiền giảm",
		minlength: "Số tiền giảm không dưới 1000đ"
	},
	minimum_price: {
		required: "Chưa nhập giá đơn hàng tối thiểu",
		minlength: "Đơn tối thiểu không dưới 1000đ",
		
		
	},
	usage_limit_quantity: {
		required: "Chưa nhập lượt sử dụng tối đa",
		min: "Số lượt tối đa nhỏ nhất là 1",
		max: "Số lượt tối đa lớn nhất là 999"
	},
	time_from: {
		required: "Chưa nhập ngày bắt đầu"
	},
	time_to: {
		required: "Chưa nhập ngày kết thúc"
	}
},

submitHandler: function(){
	add_voucher();
}

});

function add_voucher(){
	var voucher_name = $('input[name=voucher_name]').val();
	var voucher_code = $('input[name=voucher_code]').val();
	var seller_code = $('input[name=seller_code]').val();
	var time_from = $('#time_from').val();
	var time_to = $('#time_to').val();
	if (time_from == "") {
		time_from = $('#picker_time_from').text();
	}
	if (time_to == "") {
		time_to = $('#picker_time_to').text();
	}
	var type_discount = $('#type_discount').val();
	var discount_price = $('input[name=discount_price]').val();
	var discount_percent = $('input[name=discount_percent]').val();
	var maximum_discount = $('input[name=maximum_discount]').val();
	var minimum_price = $('input[name=minimum_price]').val();
	var usage_limit_quantity = $('input[name=usage_limit_quantity]').val();
	var list_product = $('input[name=list_product]:checked').val();
	var list_product_post = [];
	$.map( arr_checkbox, function( chiso, giatri ) {
		list_product_post.push(chiso['id']);
	});
	
	$.ajax({
		type: 'GET',
		url: nv_base_siteurl + 'index.php' + '?'  + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +'=voucher-add&mod=add_voucher',
		dataType: "json",
		data: {
			voucher_name: voucher_name,
			voucher_code: voucher_code,
			seller_code: seller_code,
			time_from: time_from,
			time_to: time_to,
			type_discount: type_discount,
			discount_price: discount_price,
			discount_percent: discount_percent,
			minimum_price: minimum_price,
			maximum_discount: maximum_discount,
			usage_limit_quantity: usage_limit_quantity,
			list_product: list_product,
			arr_product: list_product_post
		},
		
		
		complete: function() {
			
		},
		success : function(res){
			
			if (res.status == "ERROR_date")
			{
				notifi_error(res.mess,res.name);
			}
			else if (res.status == "ERROR_percent")
			{
				notifi_error1(res.mess);
			}
			else if(res.status == "OK")
			{
				notifi_screen(res.mess);
				setTimeout(function(){ 
					window.location.href = '{list_voucher}';
				}, 2000);
				$('.notifi_error').hide();
				
			}
			
			
		}		
	});
	
	
}


$("#time_from, #time_to").datepicker({
	dateFormat : "dd/mm/yy",
	changeMonth : true,
	changeYear : true,
	showOtherMonths : true,
	minDate: 0,
	yearRange: "-99:+0",
	"setDate": new Date(),
	"autoclose": true,
	
	
});

function countChars1(obj) {	
	document.getElementById("charNum1").innerHTML = obj.value.length;
};
function countChars2(obj) {
	document.getElementById("charNum2").innerHTML = obj.value.length;
	document.getElementById("code_vouchername").innerHTML = obj.value;
	var x = document.getElementById("uppercase_text");
	x.value = x.value.toUpperCase();
	x.value =  x.value.normalize('NFD')
	.replace(/[\u0300-\u036f.]/g, '')
	.replace(/đ/g, 'd')
	.replace(/Đ/g, 'D')
	.replace( /\s/g, '');
};

$('.number_add').on('input', function(e){     
	}).on('keypress',function(e){
	if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
	}).on('paste', function(e){    
	var cb = e.originalEvent.clipboardData || window.clipboardData;      
	if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
});

function myFunction(number) {
	var myNumber = document.querySelector('.del_zero' + number);
	while (myNumber.value[0] == ',' || myNumber.value[0] == '0') {
		myNumber.value = myNumber.value.replace(/^,/, '');
		myNumber.value = myNumber.value.replace(/^0+/, '');
	}
};

jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Mã voucher không đúng định dạng.");


<!-- jQuery.validator.addMethod("notequal", function() { -->
<!-- var number1 = parseFloat($('input[name="discount_price"]').val().replace(/,/g, '')); -->
<!-- var number2 = parseFloat($('input[name="minimum_price"]').val().replace(/,/g, '')); -->
<!-- if( number1 <= number2){ -->
<!-- return true; -->
<!-- } -->
<!-- }, "Mức giảm giá không được vượt quá giá trị đơn hàng tối thiểu"); -->



</script>

<!-- END: add -->

<!-- END: main -->	