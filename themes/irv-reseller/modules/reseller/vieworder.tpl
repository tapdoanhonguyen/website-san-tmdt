<!-- BEGIN: main -->
<div class="content_detail_order">

	<div class="info_order bg_white p-3">
		<p class="fs_18 mb-0"><span class="text_gray_color">Chi tiết đơn hàng {info_order.order_code}</span> - {info_order.status}  - <span class="secondary_text">{info_order.status_payment} <span></p>
		</br> 
		<div class="row">
			<div class="col-6">
				<div class="status_vnpost">
					<ul class="timeline">
						<!-- BEGIN: vnpost -->
						<li>
							<span class="secondary_text">{LOOP_TRACUU.addtime}:</span>
							<span class="pt-2">{LOOP_TRACUU.status_vnpost}</span>
						</li>
						<!-- END: vnpost -->
						<!-- BEGIN: GHN -->
						<li>
							<span class="{time_line_active}">{LOOP_GHN.time_add} - {LOOP_GHN.status}</span>
							<span class="">{LOOP_GHN.warehouse} </span>

						</li>
						<!-- END: GHN -->

						<!-- BEGIN: GHTK -->
						<li>
							<span class="">{LOOP_GHTK.time_add}  </span>
							<span class="{time_line_active}">{LOOP_GHTK.status_id}</span>
							<span class="">{LOOP_GHTK.reason}</span>
						</li>
						<!-- END: GHTK -->
					</ul>
				</div>
			</div>
		</div>
		</br>
		
		<div class="row px-2">
			<div class="col-md-7 p-4 border">
				<p>Tên: {info_order.order_name}</p>
				<p>Địa chỉ: {info_order.address}</p>
				<p class="mb-0">Điện thoại: {info_order.phone}</p>
			</div>
			<div class="col-md-5 p-4 border">
				<p>Phương Thức Thanh Toán: {info_order.payment_method_name}</p>
				<p>Giao Hàng: {info_order.transporters_name} <span class="secondary_text">{info_order.shipping_code}</span> </p>
				<p class="mb-0">Phí vận chuyển: {info_order.fee_transport}đ</p>
			</div>
		</div>
	</div>
	<!-- BEGIN: view -->
	
	<div class="history bg_white px-3 my-3">
		<div class="history_header d-flex justify-content-between border-bottom  py-2 mb-3">
			<div class="history_header_shop">
				<a href="#">
					<img src="{info_order.photo_customer}" class="rounded-circle" style="width: 25px; height: 25px;object-fit: contain;" alt="">
					<span class="ml-3">  {info_order.customer_name}</span>
				</a>
			</div>
			
		</div>
		<div class="history_product border-bottom pb-2">
			<!-- BEGIN: loop -->
			<div class="row d-flex align-items-center py-2">
				<div class="col-md-1 ">
					<a href="{VIEW.alias_product}"><img src="{VIEW.image}" class="width_80" style="object-fit: contain;" alt=""></a>
				</div>
				<div class="col-md-7">
					<div class="cartName">
						<a href="{VIEW.alias_product}">
							<p class="mb-0">{VIEW.name_product}</p>
						</a>
						<p class="text_gray_color mb-0">{VIEW.name_group}</p>
					</div>
				</div>
				
				<div class="col-md-2 text-center">
					x {VIEW.quantity}
				</div>
				<div class="col-md-2 secondary_text text-center">{VIEW.price}đ</div>
			</div>
			<!-- END: loop -->
		</div>
		<div class="row">
			<div class="col-md-4 offset-md-8">
				<table class="table table-borderless mb-0">
					<tbody>
						<tr>
							<td class="text_gray_color">Tạm tính</td>
							<td class="float-right">{tamtinh}đ</td>
							
						</tr>
						<tr>
							<td class="text_gray_color">Phí vận chuyển</td>
							<td class="float-right">{info_order.fee_transport}đ</td>
						</tr>
						<!-- BEGIN: voucher_shop -->
						<tr>
							<td class="text_gray_color">Voucher</td>
							<td class="float-right">-{info_order.voucher_price_shop}đ</td>
						</tr>
						<!-- END: voucher_shop -->
						<tr>
							<td class="mb-0">Tổng thanh toán</td>
							<td class="float-right fs_20 secondary_text mb-0">{info_order.total} đ</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- END: view -->
</div>

<!-- END: main -->