<!-- BEGIN: main -->
<div class="dashboard_seller">
    <div class="row">
        <div class="col-7">
            <div class="overview">
                <div class="row">
                    <div class="col-6 px-2">
                        <div class="bg_white d-flex justify-content-between py-3 px-4 rounded">
                            <div class="">
                                <div class="secondary_text fs_24">{tongdoanhthu}đ</div>
                                <div class="text_gray_color mt-2">Tổng doanh thu</div>
                            </div>
                            <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/icon/tong_doanh_thu.png" class="width_50" alt="" />
                        </div>
                    </div>
                    <div class="col-6 px-2">
                        <div class="bg_white d-flex justify-content-between py-3 px-4 rounded">
                            <div class="">
                                <div class="secondary_text fs_24">{tongdonhang}</div>
                                <div class="text_gray_color mt-2">Đơn hàng thành công</div>
                            </div>
                            <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/icon/don_hang.png" class="width_50" alt="" />
                        </div>
                    </div>

                    <div class="col-6 px-2 mt-3">
                        <div class="bg_white d-flex justify-content-between py-3 px-4 rounded">
                            <div class="">
                                <div class="secondary_text fs_24">{tongkhachhang}</div>
                                <div class="text_gray_color mt-2">Khách hàng</div>
                            </div>
                            <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/icon/khach_hang.png" class="width_50" alt="" />
                        </div>
                    </div>
                    <div class="col-6 px-2 mt-3">
                        <div class="bg_white d-flex justify-content-between py-3 px-4 rounded">
                            <div class="">
                                <div class="secondary_text fs_24">+{tocdophattrien}%</div>
                                <div class="text_gray_color mt-2">Sự phát triển</div>
                            </div>
                            <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/icon/su_phat_trien.png" class="width_50" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- overview  -->
            <div class="list_todo bg_white p-4 mt-3 mx-0 px-0 rounded">
                <div class="fs_24">Danh sách cần làm</div>
                <div class="row text-center mt-5">
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{choxacnhan}</p>
                        <p class="mb-1">Chờ Xác Nhận</p>
                    </div>
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{cholayhang}</p>
                        <p class="mb-1">Đã xác nhận</p>
                    </div>
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{daxuly}</p>
                        <p class="mb-1">Đang giao hàng</p>
                    </div>
                    <div class="col-3">
                        <p class="fs_16 secondary_text mb-1">{huydon}</p>
                        <p class="mb-1">Đơn Hủy</p>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{trahoantien}</p>
                        <p class="mb-1">Trả/Hoàn Tiền</p>
                    </div>
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{sp_khoa}</p>
                        <p class="mb-1">Sản Phẩm Tạm Khóa</p>
                    </div>
                    <div class="col-3 border-right">
                        <p class="fs_16 secondary_text mb-1">{sp_hethang}</p>
                        <p class="mb-1">Sản Phẩm Hết Hàng</p>
                    </div>
                    <div class="col-3">
                        <p class="fs_16 secondary_text mb-1">{ma_uu_dai}</p>
                        <p class="mb-1">Mã Ưu Đãi</p>
                    </div>
                </div>
            </div>
            <!-- list to do  -->
            <div class="member bg_white p-4 mt-3 rounded">
                <div class="d-flex justify-content-between mb-3">
                    <p class="fs_24">Thành viên hàng đầu</p>
                    <a href="#" class="secondary_text">Xem Thêm</a>
                </div>

                <table class="table table-borderless table-hover">
                    <tbody>
						<!-- BEGIN: customer -->
                        <tr>
                            <td class="d-flex align-items-center">
                                <img src="{info_customer.photo}" class="width_50 rounded-circle" alt="" />
                                <div class="ml-3">
                                    <span>{info_customer.last_name}</span><br />
                                    
                                </div>
                            </td>
                            
                            <td class="text-right align-middle">{shop.total}đ</td>
                        </tr>
						<!-- END: customer -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- center  -->
        <div class="col-5 pl-2">
            <div class="notification bg_white p-4 rounded" style="height: 401px;">
                <div class="d-flex justify-content-between mb-3">
                    <p class="fs_18">Thông báo</p>
                    <!-- <a href="#" class="secondary_text">Xem Thêm</a> -->
                </div>
				 <!--
                <div class="notification_item">
                    <p class="font-weight-bold mb-1">Nói KHÔNG với Hẹn lại ngày lấy hàng!ngày lấy sdsd sdsd hàng ...</p>
                    <p>Nhằm nâng cao chất lượng dịch vụ và trải nghiệm tốt nhất cho người mua, Shop cần giao hàng đúng ngàyđã hẹn với đơn vị vận chuyển (ĐVVC)...</p>
                </div>
                <div class="notification_item">
                    <p class="font-weight-bold mb-1">Nói KHÔNG với Hẹn lại ngày lấy hàng!ngày lấy sdsd sdsd hàng ...</p>
                    <p>Nhằm nâng cao chất lượng dịch vụ và trải nghiệm tốt nhất cho người mua, Shop cần giao hàng đúng ngàyđã hẹn với đơn vị vận chuyển (ĐVVC)...</p>
                </div>
                <div class="notification_item">
                    <p class="font-weight-bold mb-1">Nói KHÔNG với Hẹn lại ngày lấy hàng!ngày lấy sdsd sdsd hàng ...</p>
                    <p>Nhằm nâng cao chất lượng dịch vụ và trải nghiệm tốt nhất cho người mua, Shop cần giao hàng đúng ngàyđã hẹn với đơn vị vận chuyển (ĐVVC)...</p>
                </div>
				 -->
            </div>
            <!-- notification  -->
            <div class="analys bg_white mt-3 p-4 rounded">
                <div class="fs_20">Phân Tích Bán Hàng</div>
                
                <div class="row mt-4 border-bottom pb-4">
                    <div class="col-6">
                        <div class="fs_16">Tổng người theo dõi</div>
                        <div class="fs_20 my-3">{tong_follow}</div>
                        
                    </div>
                    <div class="col-6">
                        <div class="fs_16">Tổng sản phẩm được yêu thích</div>
                        <div class="fs_20 my-3">{tong_like}</div>
                        
                    </div>
                </div>
                <div class="row mt-3 pb-4">
                    <div class="col-6">
                        <div class="fs_16">Lượt truy cập</div>
                        <div class="fs_20 my-3">100</div>
                        <div class="fs_16">Vs hôm qua -100.000%</div>
                    </div>
                    <div class="col-6">
                        <div class="fs_16">Lượt xem</div>
                        <div class="fs_20 my-3">10</div>
                        <div class="fs_16">Vs hôm qua -100.000%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mx-0">
        <div class="col-12 bg_white p-4">
            <div class="fs_24 mb-4">Giao Dịch Mới Nhất</div>
            <table class="table table-borderless">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th scope="col" style="border-radius:5px 0 0 5px">Mã đặt hàng</th>
                        <th scope="col">Tên người mua</th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Tình trạng thanh toán</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col" style="border-radius:0 5px 5px 0">Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
					<!-- BEGIN: order_new -->
                    <tr class="text-center">
                        <td>{order_new.order_code}</td>
                        <td>{order_new.order_name}</td>
                        <td>{order_new.time_add}</td>
                        <td>{order_new.total}đ</td>
                        <td><span class="text-success">{order_new.thanhtoan}</span></td>
                        <td>
							<!-- BEGIN: vnpay -->
							<i class="fa fa-credit-card" aria-hidden="true"></i> VNPAY
							<!-- END: vnpay -->
						</td>
                        <td><a href="{order_new.link}" class="text-white px-3 py-1" style="background:#e1a208; border-radius:20px">Xem chi tiết</a></td>
                    </tr>
					<!-- END: order_new -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- END: main -->
