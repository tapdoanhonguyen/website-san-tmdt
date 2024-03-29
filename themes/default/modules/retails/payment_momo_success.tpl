<!-- BEGIN: main -->

<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>


<script>
	setTimeout(function() {
                    window.location.href = '{RE_PAYMENT}';
                }, 5000)
</script>

<!-- END: error -->

<!-- BEGIN: thanhcong -->
 <div class="container bg_white">
        <div class="text-center fs_24 p-4">Chi tiết giao dịch</div>
        <div class="row border m-3 p-3 rounded-lg ">
            <div class="col-3 text-center">
                <img src="{LOGO_SRC}" class="width_80" alt="">
            </div>
            <div class="col-9">
                <div class="fs_18 mb-2 mt-4 text_gray_color">Sàn TMĐT Chợ Nhà Giàu</div>
                <div class="text_gray_color">Mã giao dịch: <span class="secondary_text">{thanhtoan.vnp_TransactionNo}</span> </div>
            </div>
            <div class="p-3 my-2 d-block w-100" style="background-color: #F7E7C1;border-radius: 5px;">
                <i class="fa fa-check secondary_text" aria-hidden="true"></i> <span class="text_gray_color ml-2">Giao dịch thành công</span>
            </div>
            <table class="table table-borderless">

                <tbody>
                    <tr>
                        <td class="text_gray_color">Hình thức thanh toán</td>
                        <td class="text-right font-weight-bold">{thanhtoan.payment_method_name}</td>
                    </tr>
                    <tr>
                        <td class="text_gray_color">Tổng tiền thanh toán</td>
                        <td class="text-right font-weight-bold">{thanhtoan.format_Amount}</td>
                    </tr>
                    <tr>
                        <td class="text_gray_color">Thời gian giao dịch</td>
                        <td class="text-right font-weight-bold">{thanhtoan.date_create}</td>
                    </tr>
                </tbody>
            </table>
			<div class="text-center w-100 p-3 font-weight-bold" style="font-size: 16px;">
            Bạn đã ủng hộ <span style="color:#1358B9">{children_fund}</span> vào quỹ “ <span class="secondary_text" style="font-size: 14px;">QUỸ BẢO TRỢ TRẺ EM VIỆT NAM</span> ” từ đơn hàng này.

        </div>
        <div class="my-4 fs_18 text-center">THÔNG TIN KHÁCH HÀNG</div>
        <div class="border m-3 p-3 rounded-lg ">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text_gray_color">Mã đơn hàng</td>
                        <td class="text-right font-weight-bold" class="text-right font-weight-bold secondary_text">{thanhtoan.vnp_txnref}</td>
                    </tr>
                    <tr>
                        <td class="text_gray_color">Tên khách hàng </td>
                        <td class="text-right font-weight-bold">{info_order.order_name}</td>
                    </tr>
                    <tr>
                        <td class="text_gray_color">Số điện thoại</td>
                        <td class="text-right font-weight-bold">{info_order.phone}</td>
                    </tr>
                    <tr>
                        <td class="text_gray_color">Email</td>
                        <td class="text-right font-weight-bold">{info_order.email}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row my-4 pb-3 justify-content-center">
            <!-- BEGIN: history -->
            <div class="pr-3"><a href="{HISTORY}" class="btn_ecng_outline py-2">Lịch sử mua hàng</a></div>
            <!-- END: history -->
            <div class=""><a  href="{NV_BASE_SITEURL}" class="btn_ecng py-2">Trang chủ</a></div>
        </div>
    </div>






<script>
	setTimeout(function() {
                    window.location.href = '{HISTORY}';
                }, 20000)
</script>

<!-- END: thanhcong -->
<!-- END: main -->