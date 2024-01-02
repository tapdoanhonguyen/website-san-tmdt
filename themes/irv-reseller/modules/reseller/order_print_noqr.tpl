<!-- BEGIN: main --> 
<style>
.img_barcode img {
  min-width: 300px;
}
</style>
<div class="container w-50 p-4 bg_white font-weight-bold">
        <div class="phieu_mua_hang bg_white" style="border: 1px solid #000;">
            <div class="row p-4 align-items-center">
                <div class="col-6"><img src="https://chonhagiau.com/uploads/logo_ecng_sprint.svg" class="w-50" alt="">
                </div>
                <div class="col-6 text-center">
					
					<!-- BEGIN: order_code -->
					<div class="img_barcode w-100">{barcode}</div>
					<!-- END: order_code -->
					
                </div>
            </div>
            <div class="text-center">
            <div class="row justify-content-center mb-5" style="font-size: 22px;">
                    Bạn đã ủng hộ 5,000đ vào “ QUỸ BẢO TRỢ TRẺ EM VIỆT NAM ” từ đơn hàng này.
                </div>
                <div class="fs_28 mb-3">Thông tin đơn hàng</div>
            </div>
            <div class="row p-4 m-0" style="border-top: 1px solid #000;border-bottom: 1px solid #000;">
                <div class="col-6">
                    <div class="fs_24 lh_32 mb-2">Thông tin người bán</div>
                    <div class="fs_18 lh_32">{company_name}</div>
                    <div class="fs_18 lh_32">HotLine: {site_phone}</div>
                    <div class="fs_18 lh_32">Địa chỉ hoàn: {DIA_CHI_HOAN_TRA}</div>
                </div>
                <div class="col-6">
                    <div class="fs_24 lh_32 mb-2">Thông tin người mua</div>
                    <div class="fs_18 lh_32">{DATA.order_name}</div>
                    <div class="fs_18 lh_32">{DATA.address}</div>
                    <div class="fs_18 lh_32">SĐT: {DATA.phone}</div>
                </div>
            </div>
            <div class="p-4" style="border-bottom: 1px solid #000;">
                <div class=" fs_24 mb-2">Nội dung hàng:</div>
				<!-- BEGIN: product -->
                <div class="row mb-3">
                    <div class="col-8 fs_18">{PRODUCT.stt}. {PRODUCT.name_product}</div>
                    <div class="col-1 fs_18">SL: {PRODUCT.quantity} </div>
                    <div class="col-3 fs_18 text-right">{PRODUCT.price}đ</div>
                </div>
                <!-- END: product -->
            </div>

            <div class="p-4 total">
                <div class="row">
					
					<div class="col-5 fs_18" style="line-height: 25px;">
					KHÔNG MỞ HÀNG VÀ KHÔNG ĐỒNG KIỂM (Gọi hotline: 1900.966.961 Nếu KH yêu cầu đồng kiểm)
					</div>
					
                    <div class="col-6 ml-auto">
                        <div class="fs_24 mb-2">Tổng tiền đơn hàng:</div>
                        <table class="table table-borderless mb-0">
                            <tbody class="p-0 fs_18">
                                <tr>
                                    <td>Nhà vận chuyển:</td>
                                    <td class="text-right">{DATA.transporters_name}</td>

                                </tr>
                                <tr>
                                    <td>Phí vận chuyển:</td>
                                    <td class="text-right">{DATA.fee_transport}đ</td>

                                </tr>
								<!-- BEGIN: voucher_price -->
								<tr>
                                    <td>Voucher:</td>
                                    <td class="text-right">{voucher_price}đ</td>

                                </tr>
								<!-- END: voucher_price -->
                                <tr>
                                    <td>Số tiền hàng:</td>
                                    <td class="text-right">{DATA.total_product}đ</td>

                                </tr>
                                <tr>
                                    <td>{title_thanhtoan}:</td>
                                    <td class="text-right">{DATA.total}đ</td>
                                </tr>
								<!-- BEGIN: payment_method -->
								<tr>
								<td colspan="2">Không thu tiền COD khách hàng</td>
                                </tr>
								<!-- END: payment_method -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- END: main -->