<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<h4 class="pb-3 fs_20">Danh sách mã giảm giá</h4>

 <!--<div class="mb-4 bg_white p-3 rounded">
       <form id="searchForm">
            <div class="row">
                <div class="col-3">
                    <div class="p-1 rounded border shadow-sm">
                        <div class="input-group">
                            <div class="input-group-prepend align-items-center pl-3">
								<i class="fa fa-search pr-1" aria-hidden="true"></i>
							</div>
                            <input name="keyword" type="search" placeholder="Tìm kiếm theo" aria-describedby="button-addon2" class="form-control border-0 " />
						</div>
					</div>
				</div>
                <div class="col-2">
                    <div class="p-1 rounded rounded-lg border shadow-sm d-flex">
						<div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-calendar pr-1" aria-hidden="true"></i>
						</div>
                        <input id="ngaytu" name="ngay_tu" type="search" placeholder="Từ ngày" aria-describedby="button-addon2" class="form-control border-0 " />
					</div>
				</div>
                <div class="col-2">
                    <div class="p-1 rounded rounded-lg border shadow-sm d-flex">
						<div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-calendar pr-1" aria-hidden="true"></i>
						</div>
                        <input id="ngayden" name="ngay_den" type="search" placeholder="Đến ngày" aria-describedby="button-addon2" class="form-control border-0 " />
					</div>
				</div>
                <div class="col-3"> 
                    <div class="p-1 rounded rounded-lg border shadow-sm d-flex">
						<div class="input-group-prepend align-items-center pl-3">
							<i class="fa fa-history pr-1" aria-hidden="true"></i>
						</div>
						<select class="form-control border-0" id="sea_flast" name="sea_flast">
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
				
                <div class="col-2 d-flex h-100">
                    <button class="btn_ecng mr-3 submit_search" style="height:40px">Tìm kiếm</button>
                    <button class="btn_ecng_outline submit_excel d-none" style="height:40px">Xuất Excel</button>
				</div>
			</div>
		</form>
		<div class="manage_header mt-4">
			<ul class="nav nav-pills d-flex" role="tablist">
				<li class="nav-item">
					<a  status_id="-2" onclick="get_order(-2, this);" class="tab_active py-3 px-4" href="#">Tất cả</a>
				</li>
				<li class="nav-item">
					<a status_id="1" onclick="get_order(1,this);" class="py-3 px-4" href="#">Đang diễn ra</a>
				</li>
				<li class="nav-item">
					<a status_id="2" onclick="get_order(2,this);" class="py-3 px-4" href="#">Sắp diễn ra</a>
				</li>
				<li class="nav-item">
					<a status_id="3" onclick="get_order(3,this);" class="py-3 px-4" href="#">Đã kết thúc</a>
				</li>
				
			</ul>
		</div>
	</div>-->
<div class="d-flex justify-content-between align-items-center mb-4">
<h5 class="m-0">Mã giảm ({num_items})</h5>
<a class="add_sales btn_ecng" href="{ADD}">+ Tạo mã</a>
</div>
<table class="table border rounded">
	<thead class="border-0">
		<tr >
			<th  class="border-0" style="width:250px;overflow: hidden;
			white-space: nowrap;text-overflow: Ellipsis;" scope="col">Tên Voucher</th>
			<th class="border-0"  scope="col">Mã voucher</th>
			<th class="border-0 text-center"  scope="col">Thời gian</th>
			<th  class="border-0" scope="col">Giảm giá</th>	
			<th  class="border-0" scope="col">Đơn tối thiểu</th>
			<th  class="border-0" scope="col">Giảm tối đa</th>
			<th  class="border-0 text-center" scope="col">Tổng số mã giảm</th>
			<th  class="border-0 text-center" scope="col">Xem chi tiết</th>
			<th  class="border-0 text-center" scope="col">Thao tác</th>
		</tr>
	</thead>
	<tbody class="bg_white" id="counts_sale">
		<!-- BEGIN: view -->
		<tr class="border-bottom counts">
			
			<td class="border-0 pr-5" style="width:250px;overflow: hidden;
			white-space: nowrap;text-overflow: Ellipsis;display: block; line-height: 35px;">{VIEW.voucher_name}</td>
			<td class="border-0" style="line-height: 35px;">{VIEW.voucher_code}</td>
			<td class="border-0 text-center" style="line-height: 35px;">{VIEW.time_from} - {VIEW.time_to}</td>
			<td class="border-0 " style="line-height: 35px;">{VIEW.discount_price}</td>
			<td class="border-0" style="line-height: 35px;">{VIEW.minimum_price}</td>
			<td class="border-0" style="line-height: 35px;">{VIEW.maximum_discount}</td>
			<td class="border-0 text-center" style="line-height: 35px;">{VIEW.usage_limit_quantity}</td>
			<td class="border-0 text-center" style="line-height: 35px;"><a href="{VIEW.link_edit}">Xem</a></td>
			<td class="border-0 text-center" style="line-height: 35px;">
			<a title="Xóa sản phẩm" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" class="ml-1" ><img src="/themes/default/banhang/images/trach.svg" alt=""/></a>  </td>
		</tr>
		
		<!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="24">
                        {NV_GENERATE_PAGE}
					</td>
				</tr>
			</tfoot>
        <!-- END: generate_page -->
			
		<!-- END: view -->
	</tbody>
	 
	
</table>
<script>
	
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

	var count = document.querySelector('#number_sale');
    var result = document.querySelectorAll('#counts_sale .counts');
    result.forEach(function (e, i) {
       count.innerHTML = i+1;
	   if(i == 99){
			$('.add_sales').prop('disabled', true);
			$('.add_sales').css({"background-color": "rgb(196, 196, 196)","border":"none" ,"cursor":"no-drop"});
			$(".add_sales").removeAttr("href");
		};
    });
	// limited 100
	
	
</script>
<!-- END: main -->