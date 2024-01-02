<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<div class="content_doanhthu">
	<div class="mt-4 mb-4">
		<form method="post" id="searchForm">
			<div class="row">
				<div class="col-3 mb-3">
					<div class="p-1 bg-light rounded rounded-lg shadow-sm">
						<div class="input-group">
							<div class="input-group-prepend">
								
							</div>
							<input value="{keyword}" name="keyword" type="search" placeholder="Nhập tên hoặc mã sản phẩm" aria-describedby="button-addon2" class="form-control border-0 bg-light" />
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="p-1 bg-light rounded rounded-lg shadow-sm">
						<input value="{ngay_tu}" id="ngaytu" name="ngay_tu" type="search" placeholder="Từ ngày" aria-describedby="button-addon2" class="form-control border-0 bg-light" />
					</div>
				</div>
				<div class="col-2">
					<div class="p-1 bg-light rounded rounded-lg shadow-sm">
						<input value="{ngay_den}" id="ngayden" name="ngay_den" type="search" placeholder="Đến ngày" aria-describedby="button-addon2" class="form-control border-0 bg-light" />
					</div>
				</div>
				<div class="col-2">
					<div class="p-1 bg-light rounded rounded-lg shadow-sm">
						
						<select class="form-control border-0 bg-light" id="sea_flast" name="sea_flast">
							<option value="0">
								-- Chọn thời gian --
							</option>
							<option value="1" {SELECT1}>Ngày hôm nay</option>
							<option value="2" {SELECT2}>Ngày hôm qua</option>
							<option value="3" {SELECT3}>Tuần này</option>
							<option value="4" {SELECT4}>Tuần trước</option>
							<option value="5" {SELECT5}>Tháng này</option>
							<option value="6" {SELECT6}>Tháng trước</option>
							<option value="7" {SELECT7}>Năm này</option>
							<option value="8" {SELECT8}>Năm trước</option>
							<option value="9" {SELECT9}>Toàn thời gian
							</option>
						</select>
						
					</div>
				</div>
				
				<div class="col-3 d-flex align-items-center pb-3">
					<button class="btn_ecng export_file mr-2" type="button">
						Xuất file excel
					</button>
					<button class="btn_ecng mr-3 submit_search">Tìm kiếm</button>
				</div>
			</div>
		</form>
	</div>
	<div class="bg_white px-3 py-4 rounded">
		<h4 class="secondary_text m-0 d-flex">Doanh thu: {DOANHTHU} đ</p>
	</div>
	
	</br>
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="w100">STT</th>
					<th>Hình ảnh</th>
					<th>Sản phẩm</th>
					<th>Doanh thu</th>
					<th>Số lượng bán</th>
				</tr>
			</thead>
			<!-- BEGIN: generate_page -->
			<tfoot>
				<tr>
					<td class="text-center" colspan="5">{NV_GENERATE_PAGE}</td>
				</tr>
			</tfoot>
			<!-- END: generate_page -->
			<tbody>
				<!-- BEGIN: loop -->
				<tr>
					<td> {VIEW.number} </td>
					<td> <a title="{VIEW.name_product}" href="{VIEW.alias}"><img height="40" src="{VIEW.image}" /> </a></td>
					<td> 
						<div>{VIEW.name_product}</div>
						<div>{VIEW.barcode}</div>
					</td>
					<td> {VIEW.total} </td>
					<td> {VIEW.quantity} </td>
				</tr>
				<!-- END: loop -->
			</tbody>
		</table>
	</div>
	
</div>

<script type="text/javascript">
	$("select[name=sea_flast]").change(function () {
		
		var time_from = "";
		var time_to = "";
		var time = $("select[name=sea_flast]").val();
		
		if (time == 1) {
			time_from = "{HOMNAY}";
			time_to = "{HOMNAY}";
			} else if (time == 2) {
			time_from = "{HOMQUA}";
			time_to = "{HOMQUA}";
			} else if (time == 3) {
			time_from = "{TUANNAY.from}";
			time_to = "{TUANNAY.to}";
			} else if (time == 4) {
			time_from = "{TUANTRUOC.from}";
			time_to = "{TUANTRUOC.to}";
			} else if (time == 5) {
			time_from = "{THANGNAY.from}";
			time_to = "{THANGNAY.to}";
			} else if (time == 6) {
			time_from = "{THANGTRUOC.from}";
			time_to = "{THANGTRUOC.to}";
			} else if (time == 7) {
			time_from = "{NAMNAY.from}";
			time_to = "{NAMNAY.to}";
			} else if (time == 8) {
			time_from = "{NAMTRUOC.from}";
			time_to = "{NAMTRUOC.to}";
			} else if (time == 9) {
			time_from = "Không chọn";
			time_to = "Không chọn";
			} else if (time == 0) {
			time_from = "";
			time_to = "";
		}
		
		
		$("#ngaytu").val(time_from);
		$("#ngayden").val(time_to);
	});
	$("#tms_sea_id").click(function () {
		$("#tms_sea").toggle();
	});
	$("#ngaytu,#ngayden").datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		firstDay: 1,
		showOtherMonths: true,
	});
	$('[data-toggle="tooltip"]').tooltip();
	
	
	
	$(".export_file").on('click', function(e) {
		e.preventDefault();  
		
		$.ajax({               
			type: "GET",
			url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=doanhthu&mod=is_download',
			data: $('#searchForm').serialize(),
			beforeSend: function() {
				
			},	               
			complete: function() {
				
			},                 
			success: function(res) {
				
				window.location.href = res;     
				
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		});                    
	}); 
	
	
</script>
<!-- END: main -->