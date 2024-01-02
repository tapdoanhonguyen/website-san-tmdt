<!-- BEGIN: main -->

<!-- BEGIN: no_product -->
<div class="no_product">Không tìm thấy đơn hàng!</div>
<!-- END: no_product -->

<!-- BEGIN: loop -->
<div class="order_manage bg_white px-2 mb-4 border rounded">
    <div class="order_manage_header d-flex justify-content-between border-bottom py-2 mb-3">
        <div class="order_manage_header_shop">
            
			<img src="{VIEW.photo_customer}" class="rounded-circle" style="width: 25px; height: 25px;" alt="" />
			<span class="ml-2">{VIEW.customer_name} <span class="text_gray_color ml-3">{VIEW.time_add} </span></span>           
		</div>
        <div class="">
            <p class="mb-0 d-inline px-3 border-right mr-3">Mã đơn hàng: <span class="secondary_text">{VIEW.order_code}</span></p>
            <span class="secondary_text">{VIEW.order_status}</span>
		</div>
	</div>
	
    <div class="order_manage_product border-bottom pb-2">
		<!-- BEGIN: product -->
        <div class="row d-flex align-items-center mb-2">
            <div class="col-md-1">
                <a href="{product.alias}"><img src="{product.image}" style="object-fit: contain;" class="width_50" alt="{product.name_product}" /></a>
			</div>
            <div class="col-md-7">
                <div class="cartName px-3">
                    <a href="{product.alias}">
                        <p class="mb-0">{product.name_product}</p>
					</a>
                    <p class="text_gray_color mb-0">{product.name_group}</p>
				</div>
			</div>
			
            <div class="col-md-2 text-center">
                x {product.quantity}
			</div>
            <div class="col-md-2 secondary_text text-center">{product.price} đ</div>
		</div>
		<!-- END: product -->
	</div>
    <div class="order_manage_option text-right py-3">
        <p class="fs_18 mb-1">Tổng số tiền: <span class="secondary_text">{VIEW.total} đ</span></p>
	</div>
	
	<div class="text-right pb-3"> 
		
		<!-- BEGIN: status0 -->
		<button class="btn_ecng mr-2" type="button" onclick="change_status({VIEW.id},1,{VIEW.status})">{LANG.change_order0}</button>
		
		<button class="btn_ecng mr-2" type="button" onclick="change_status_cancel({VIEW.id})">Hủy đơn</button>
		<!-- END: status0 -->						 
		
		<!-- BEGIN: vnpost -->
		<button onclick="popup_vanchuyen({VIEW.id},{VIEW.transporters_id})" type="button" class="btn_ecng mr-2">Gửi hàng VNPOST</button>
		<!-- END: vnpost -->
		
		<!-- BEGIN: vnpost_disabled -->
		<button class="btn_ecng_disabled mr-2" data-toggle="tooltip" data-placement="top"  title="Thời gian chuẩn bị đơn hàng  {time_send_transport_start}-{time_send_transport_end}">Gửi hàng VNPOST</button>
		<!-- END: vnpost_disabled -->
		
		<!-- BEGIN: ghn -->
		<button onclick="popup_vanchuyen({VIEW.id},{VIEW.transporters_id}, {VIEW.insurance_fee})" type="button" class="btn_ecng mr-2">Gửi hàng GHN</button>
		<!-- END: ghn -->
		
		<!-- BEGIN: ghn_disabled -->
		<button  class="btn_ecng_disabled mr-2" data-toggle="tooltip" data-placement="top"  title="Thời gian chuẩn bị đơn hàng  {time_send_transport_start}-{time_send_transport_end}">Gửi hàng GHN</button>
		<!-- END: ghn_disabled -->
		
		<!-- BEGIN: ghtk -->
		<button onclick="popup_vanchuyen({VIEW.id},{VIEW.transporters_id}, {VIEW.insurance_fee})" type="button" class="btn_ecng mr-2">Gửi hàng GHTK</button>
		<!-- END: ghtk -->
		
		<!-- BEGIN: ghtk_disabled -->
		<!--<button  class="btn_ecng_disabled mr-2" data-toggle="tooltip" data-placement="top"  title="Thời gian chuẩn bị đơn hàng  {time_send_transport_start}-{time_send_transport_end}">Gửi hàng GHTK</button>-->
		<!-- END: ghtk_disabled -->
		
		<!-- BEGIN: tu_giao_xac_nhan_dang_giao -->
		<button onclick="shipping({VIEW.id})" type="button" class="btn_ecng mr-2">Xác nhận giao hàng</button>
		<!-- END: tu_giao_xac_nhan_dang_giao -->
		
		<!-- BEGIN: delivery_failed -->
		<button class="btn_ecng_outline" type="button" onclick="delivery_failed({VIEW.id})">Chưa giao được hàng</button>
		<!-- END: delivery_failed -->
		
		<!-- BEGIN: not_received_processing -->
		<button class="btn_gray" type="button" data-toggle="tooltip" data-placement="top" title="Đơn hàng của bạn đang được xử lý">Chưa giao được hàng</button>
		<!-- END: not_received_processing -->	
		
		<!-- BEGIN: tu_giao_xac_nhan_dang_giao_disabled -->
		<button class="btn_ecng_disabled mr-2" data-toggle="tooltip" data-placement="top" title="Xác nhận đơn hàng từ:  {time_send_transport_start} - {time_send_transport_end}">Xác nhận giao hàng</button>
		
		<!-- END: tu_giao_xac_nhan_dang_giao_disabled -->
		
		<!-- BEGIN: tu_giao_xac_nhan_da_giao -->
		<button onclick="delivered({VIEW.id})" type="button" class="btn_ecng mr-2">Giao hàng thành công</button>
		<!-- END: tu_giao_xac_nhan_da_giao -->
		
		<script type="text/javascript">
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
			$(document).delegate('#button-invoice_{VIEW.id}', 'click', function() {
				var printWindow = window.open( nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=orderprintnoqr&action=createinvoiceno&order_id={VIEW.id}&nocache=' + new Date().getTime(), 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
				printWindow.addEventListener('load', function(){
					printWindow.print();
				}, true);
				
			});
			
			
		</script>
		
		
		<a href="{VIEW.link_view}" class="btn_gray inline_block mr-2">Chi Tiết Đơn Hàng</a>
		
		<span class="wrap_admin_button p-2 rounded" data-content="In phiếu bán hàng"data-trigger="hover" style="cursor:pointer;background:#DADADA">
			<img src="/themes/default/banhang/images/printshop.svg" id="button-invoice_{VIEW.id}" data-loading-text="Đang nạp..." data-toggle="tooltip" title="In phiếu bán hàng" alt="" />	
		</span>
	</div>
	
</div>
<!-- END: loop -->

<div class="clear"></div>
<!-- BEGIN: generate_page -->
<nav class="text-center">
	{NV_GENERATE_PAGE}
</nav>
<!-- END: generate_page -->


<div class="modal fade" id="idmodals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			
		</div>
	</div>
</div>




<!-- END: main -->
