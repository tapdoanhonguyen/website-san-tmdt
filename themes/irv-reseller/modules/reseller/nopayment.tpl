<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

<div class="order_management">
	<h4 class="fs_20">Danh sách đơn hàng</h4>
    <div class="mt-4 px-2">
        <form id="searchForm">
            <div class="row  bg_white p-3 rounded">
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border">
                        <div class="input-group">
                             <div class="input-group-prepend align-items-center pl-3">
								<i class="fa fa-search pr-1" aria-hidden="true"></i>
							</div>
                            <input name="keyword" type="search" placeholder="Tìm kiếm theo" aria-describedby="button-addon2" class="form-control border-0" />
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="p-1 rounded rounded-lg border d-flex">
					<div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-calendar pr-1" aria-hidden="true"></i>
						</div>
                        <input id="ngaytu" name="ngay_tu" type="search" placeholder="Từ ngày" aria-describedby="button-addon2" class="form-control border-0" />
                    </div>
                </div>
                <div class="col-2">
                    <div class="p-1  rounded rounded-lg border d-flex">
					<div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-calendar pr-1" aria-hidden="true"></i>
						</div>
                        <input id="ngayden" name="ngay_den" type="search" placeholder="Đến ngày" aria-describedby="button-addon2" class="form-control border-0" />
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                       <div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-history pr-1" aria-hidden="true"></i>
						</div>
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
              
                <div class="col-2 d-flex align-items-center">
                    <button class="btn_ecng mr-3 submit_search">Tìm kiếm</button>
                   
                </div>
            </div>
        </form>
    </div>
    <!-- search  -->
    <!-- Tab panes -->
    <div class="row">
        <div class="col-8 mr-auto mt-4">
            <div class="tab-content bg_white p-3 rounded">
                <div id="all" class="tab-pane active">
                </div>
            </div>
        </div>
    </div>
    <!-- Tab panes -->
</div>


<script>

	$('select[name=sea_flast]').change(function() {
    var time_from = "";
    var time_to = "";
    var time = $('select[name=sea_flast]').val();
    if (time == 1) {
        time_from = "{HOMNAY}"
        time_to = "{HOMNAY}"
    } else if (time == 2) {
        time_from = "{HOMQUA}"
        time_to = "{HOMQUA}"
    } else if (time == 3) {
        time_from = "{TUANNAY.from}"
        time_to = "{TUANNAY.to}"
    } else if (time == 4) {
        time_from = "{TUANTRUOC.from}"
        time_to = "{TUANTRUOC.to}"
    } else if (time == 5) {
        time_from = "{THANGNAY.from}"
        time_to = "{THANGNAY.to}"
    } else if (time == 6) {
        time_from = "{THANGTRUOC.from}"
        time_to = "{THANGTRUOC.to}"
    } else if (time == 7) {
        time_from = "{NAMNAY.from}"
        time_to = "{NAMNAY.to}"
    } else if (time == 8) {
        time_from = "{NAMTRUOC.from}"
        time_to = "{NAMTRUOC.to}"
    } else if (time == 9) {
        time_from = "Không chọn"
        time_to = "Không chọn"
    } else if (time == 0) {
        time_from = ""
        time_to = ""
    }
    $('#ngaytu').val(time_from);
    $('#ngayden').val(time_to); 
})
	
	//<![CDATA[
	$("#ngaytu,#ngayden").datepicker({
		dateFormat : "dd-mm-yy",
		changeMonth : true,
		changeYear : true,
		showOtherMonths : true,
	});
	
	$("#searchForm").on('submit', function(e) {
			e.preventDefault();  
			
			var status = $('.manage_header ul li .btn_ecng').attr('status_id');
			$.ajax({               
				type: "GET",
				url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=nopayment&search_order=1',
				data: $('#searchForm').serialize(),
				beforeSend: function() {

				},	               
				complete: function() {

				},                 
				success: function(res) {
					console.log(res);
					$('#all').html(res);        

				},                 
				error: function(xhr, ajaxOptions, thrownError) {

					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}                  
			});                    
		}); 
	
	$.ajax({               
				type: "POST", 
				url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=nopayment&search_order=1',
				data: $('.formsearch_order').serialize(),
				beforeSend: function() {

				},	               
				complete: function() {

				},                 
				success: function(res) {
					$('#all').html(res); 
				},                 
				error: function(xhr, ajaxOptions, thrownError) {

					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}                  
			});
	
	
	
	
</script>

<!-- END: main -->