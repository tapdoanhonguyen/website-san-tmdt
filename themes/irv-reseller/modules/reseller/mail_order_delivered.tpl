<!-- BEGIN: main -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
</head>

<body>


    <div style="width: 700px; background: #dcdcdc; padding: 16px; margin: 0 auto;">
        <div style="background: black; text-align: center;">
            <a href="https://chonhagiau.com" title="Chợ nhà giàu"><img src="https://chonhagiau.com/uploads/logo.png" alt="" style="height: 83px;width: 100px;"></a>
            <div style="margin-bottom: 30px; font-size: 18px;line-height: 18px;font-weight: 500;color: #e1a208 !important; padding-bottom: 10px;">Cảm ơn bạn đã đặt hàng tại sàn thương mại điện tử Chợ Nhà Giàu</div>
        </div>
        <div style="font-size: 16px;line-height: 16px;font-weight: 400; margin-bottom: 16px;">Xin chào <span style="font-weight:700">{info_order.order_name} !</span></div>
        <div>Cảm ơn bạn đã đặt hàng trên sàn thương mại điện tử Chợ Nhà Giàu. Đơn hàng đang được chuyển đến nhà bán hàng.</div>

        <div style="border-bottom: 10px solid #ddd; padding-bottom: 1rem!important; padding-top: 1rem!important;">Xin bạn vui lòng kiểm tra lại chi tiết đơn hàng nhé.</div>
        <div style="color: #e1a208 !important; font-size: 18px;line-height: 18px;font-weight: 500; padding-bottom: .5rem!important; margin-top: 1.5rem!important; margin-bottom: .5rem!important; border-bottom: 1px solid #dee2e6!important;">THÔNG TIN ĐƠN HÀNG #{DATA.order_code}</div>

        <p style="margin-bottom: .25rem!important;">Họ và tên: {info_order.order_name}</p>
        <p style="margin-bottom: .25rem!important;"><span style="color:#333333">Địa chỉ: {info_order.address}</span></p>
        <p style="margin-bottom: .25rem!important;">Số điện thoại: {info_order.phone}</p>
		
		<!-- BEGIN: data_product -->
        <table style="width: 100%;margin-bottom: 1rem;color: #212529; border: 1px solid #dee2e6!important;">
            <thead style="background: #000; vertical-align: bottom;
border-bottom: 2px solid #dee2e6;">
                <tr>
                    <th colspan="2" style="vertical-align: bottom;border-bottom: 2px solid #dee2e6; color: #e1a208 !important; padding: 10px 0;">Sản phẩm</th>
                    <th style="vertical-align: bottom;border-bottom: 2px solid #dee2e6; color: #e1a208 !important; padding: 10px 0;">Số lượng</th>
                    <th style="vertical-align: bottom;border-bottom: 2px solid #dee2e6; color: #e1a208 !important; padding: 10px 0;">Đơn giá</th>
                </tr>
            </thead>
            <tbody>
               <!-- BEGIN: loop -->
                <tr>
					<td>
                        <img src="{image}" width="50px" height="50px" alt="">
                    </td>
                    <td>
                        <div style="padding-left: 16px;">{product_name}</div>
                    </td>
                    <td style="text-align: center;">{product_number}</td>
                    <td>{product_price}đ</td>
                </tr>
				<!-- END: loop -->
            </tbody>
        </table>
        <div style="border-top: 10px solid #ddd;border-bottom: 10px solid #ddd; margin-top: 1.5rem!important; padding-top: 1.5rem!important;">
            <table style="    width: 100%;margin-bottom: 1rem;color: #212529;">

                <tbody>
                    <tr>
                        <td style="margin-bottom: 10px;">Thành tiền:</td>
                        <td style="float: right;margin-bottom: 10px;">{info_order.total_product}đ</td>
                    </tr>
                    <tr>
                        <td style="margin-bottom: 10px;">Phí vận chuyển:</td>
                        <td style="float: right;margin-bottom: 10px;">{info_order.fee_transport}đ</td>
                    </tr>
					
					<!-- BEGIN: voucher -->
					<tr>
                        <td style="margin-bottom: 10px;">Voucher:</td>
                        <td style="float: right; margin-bottom: 10px;">-{info_order.voucher_price}</td>
                    </tr> 
					<!-- END: voucher -->
					
                    <tr class="" style="border-bottom: 1px solid #e1a208; margin-bottom: 10px; padding-bottom: 10px;">
                        <td>Tổng thanh toán:</td>
                        <td style="float: right; margin-bottom: 10px; font-size: 18px;line-height: 18px;font-weight: 500; color: #e1a208 !important;">{info_order.total}đ</td>
                    </tr>
                    <tr>
                        <td style="margin-bottom: 10px;">Đơn vị vận chuyển:</td>
                        <td style="float: right; margin-bottom: 10px;">{info_order.name_transporters}</td>
                    </tr>
					
					

                    <tr>
                        <td style="margin-bottom: 10px;">Hình thức thanh toán:</td>
                        <td style="float: right; margin-bottom: 10px;">VNPAY</td>
                    </tr>
                </tbody>
            </table>
        </div>
		<!-- END: data_product -->
		
	<div style="text-align: center"><a style="font-weight: 500;font-size: 18px;text-transform: capitalize;color: #e1a208;text-decoration: auto;" href="https://chonhagiau.com" title="Chợ nhà giàu">Lên Chợ Nhà Giàu món nào cũng thật.</a></div>
        <div class="mt-3">
            <p style="font-weight: 700!important;"><span  style="color: red;">*</span>Để tránh trường hợp sản phẩm bị đánh tráo hoặc sản phẩm không đúng như mô tả khi đặt hàng. Bạn vui lòng quay video trong quá trình mở bao bì sản phẩm.
            </p>
            <p style="font-weight: 700!important; font-style: italic!important;">Lưu ý: Video chỉ có giá trị khi ghi hình đủ sáu (06) mặt của hộp đựng sản phẩm. </p>
            <p style="font-size: 18px;line-height: 18px;font-weight: 500; text-align: center!important; margin-top: 1rem!important;">Xin chân thành cảm ơn bạn</p>
        </div>



    </div>
</body>

</html>
<!-- END: main -->