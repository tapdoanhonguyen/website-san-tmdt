<!-- BEGIN: main -->

<!DOCTYPE html>
<html lang="vi">
	
	<body style="background:#DADADA">
		<div style="width: 600px; padding: 16px; margin: 0 auto;">
			<div style="background: #FFFFFF;
			border-radius: 4px;padding: 24px 16px;">
				<div style="border-bottom: 1px solid #E1A208;">
					<a href="https://chonhagiau.com" title="Chợ nhà giàu"><img src="https://{LOGO_SRC}"
					alt=""></a>
				</div>
				<h1
                style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;text-align: center;text-transform: uppercase;color: #E1A208;">
				THÔNG báo đơn hàng đã hủy</h1>
				<div>
					<p>Chào <span style="font-weight: 700;">{info_order.order_name}</span> </p>
					<span style="margin: 0;line-height: 28px;">Đơn hàng <span
					style="font-weight: bold;">#{DATA.order_code}</span> đã được hủy theo yêu cầu của bạn. Thủ tục hoàn tiền sẽ được tiến hành từ 7 - 14 ngày.</span>
				</p>
                <span>Chợ nhà giàu mong bạn sớm tìm được sản phẩm phù hợp để tiếp tục đồng hành cùng Chợ nhà giàu nhé!</span>
			</div>
            <div style="border-top:1px solid #DADADA; margin-top: 20px;">
                <p style="font-size:16px">Thông tin đơn hàng <a href="{VIEW_ORDER}"
				style="font-weight: bold;color: #E1A208;text-decoration: none;">#{DATA.order_code}</a></p>
                <p>Số điện thoại: <span>{info_order.phone}</span></p>
                <span>Địa chỉ giao hàng: <span>{info_order.address}</span></span>
			</div>
			
            <!-- BEGIN: data_product -->
            <div style="width: 100%;background: #DADADA;
			border-radius: 4px 4px 0px 0px;display:flex;padding: 15px 1px;margin-top: 25px;">
                <div style="width: 50%;padding-left: 10px;">Sản phẩm</div>
                <div style="width: 20%; text-align: center;">Số lượng</div>
                <div style="width: 30%;text-align: end;padding-right: 10px;">Đơn giá</div>
			</div>
            <div id="border_bt" style="width: 100%;border-right: 1px solid #dadada;
			border-left: 1px solid #dadada;
			border-top: 1px solid #dadada;">
                <!-- BEGIN: loop -->
                <div class="border_bt" style="display: flex;border-bottom: 1px solid #dadada;">
                    <div style="width: 50%;display:flex;padding: 10px 0;">
                        <img style="width: 50px;
						height: 50px;border-radius: 4px;margin: 0px 8px;" src="{image}">
                        <span style="padding-top: 5px;">{product_name}</span>
					</div>
                    <div style="width: 20%;text-align:center;padding-top:15px">{product_number}</div>
                    <div style="width: 30%;
					text-align:end;padding-right: 10px;padding-top:15px">{product_price}đ</div>
				</div>
                <!-- END: loop -->
			</div>
            <div style="width: 100%;text-align:end">
                <div style="display: flex;width:100%;">
                    <div style="width: 60%;">
                        <p>Đơn vị vận chuyển:</p>
                        <p>Hình thức thanh toán:</p>
                        <p>Tiền hàng (tạm tính) :</p>
                        <!-- BEGIN: voucher_title -->
						<p>Voucher:</p>
						<!-- END: voucher_title -->
                        <p>Phí vân chuyển:</p>
                        <p>Tổng tiền:</p>
					</div>
                    <div style="width: 40%;text-align: end;padding-right: 10px;">
                        <p>{info_order.name_transporters}</p>
                        <p>{info_order.payment_method_name}</p>
                        <p>{info_order.total_product}đ</p>
                        <!-- BEGIN: voucher -->
						<p>-{info_order.voucher_price}đ</p>
						<!-- END: voucher -->
                        <p>{info_order.fee_transport}đ</p>
                        <p>{info_order.total}</p>
					</div>
				</div>
			</div>
            <!-- END: data_product -->
            
            <div style="text-align: center;margin-top: 15px;padding: 0 20px;">
                <span>Đây là email tự động, vui lòng không trả lời. Nếu có bất kỳ thắc mắc hay cần giúp đỡ, bạn vui lòng
                    liên hệ <a style="text-decoration: none;" href="https://chonhagiau.com/contact/">Trung tâm hỗ
					trợ</a> của Chợ Nhà Giàu.</span>
			</div>
            
		</div>
		<div style="display: flex;padding: 20px 10px;">
            <div style="display: flex;width: 70%;">
                <img src="https://{LOGO_SRC}" alt="" style="width: 22%;
                object-fit: contain;">
                <div style="padding-left: 8px;">
                    <p style="margin: 0;font-size: 10px;font-weight: 500;line-height: 16px">Công ty Cổ phần thương mại
                        điện tử CHỢ NHÀ GIÀU</p>
                    <span style="font-size: 10px;line-height: 16px;color: #444444;">Tầng 5, 99A Cộng Hòa, Phường 4, Quận
                        Tân Bình,<br> Thành phố Hồ Chí Minh. </span>
                    <div style="font-size:10px;line-height:20px;color:#444444">
                        Email:
                        <a href="mailto:{CONFIG.site_email}" style="color:#444444;text-decoration:none"
                            target="_blank">{CONFIG.site_email}</a>
                        <br>
                        Điện thoại:
                        <a href="tel:{CONFIG.site_phone}" style="color:#444444;text-decoration:none" target="_blank">{CONFIG.site_phone}</a>
                    </div>
                </div>
            </div>
            <div style="width: 30%;text-align: end;"><img
                    src="https://chonhagiau.com/themes/default/chonhagiau/images/icon/logoCCDV.png" alt=""
                    style="width:150px;height:56px"></div>
        </div>
	</div>
</div>
</body>

</html>
<!-- END: main -->