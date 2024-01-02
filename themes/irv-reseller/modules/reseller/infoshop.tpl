<!-- BEGIN: main -->
<!-- BEGIN: view -->

<div class="content_infoshop">
                <div class="info_shop bg_white p-4">
                    <h4 class="fs_20"> Thông Tin Shop</h4>
                    <div class="row mt-4 border-top ">
                        <div class="col-6 border-right  pt-4">
                            <div class="text-center">
                                <img src="{VIEW.avatar_image}" class="width_80 rounded-circle" alt="">
                                <p class="secondary_text fs_18 mt-3 pb-3 border-bottom">{VIEW.name}</p>
                            </div>

                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="">Ảnh giấy phép kinh doanh mặt trước:</div>
                                    <img src="{VIEW.image_before}" class="img-fluid" style="height: 350px;" alt="">
                                </div>
                                <div class="col-6">
                                    <div class="">
                                        Ảnh giấy phép kinh doanh mặt sau:
                                    </div>
                                    <img src="{VIEW.image_after}" class="img-fluid" style="height: 350px;" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 p-4">
                            <table class="table table-borderless">

                                <tbody>
                                    <tr>
                                        <td>Tên Shop:</td>
                                        <td>{VIEW.company_name}</td>
                                    </tr>
                                    <tr>

                                        <td>Địa Chỉ:</td>
                                        <td>{VIEW.address_full}</td>
                                    </tr>
                                    <tr>
                                        <td>Số Điện Thoại:</td>
                                        <td>{VIEW.phone} </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{VIEW.email}</td>
                                    </tr>
                                    <tr>
                                        <td>Mã doanh nghiệp:</td>
                                        <td>{VIEW.tax_code}</td>
                                    </tr>
                                    <tr>
                                        <td>Thông tin ngân hàng:</td>
                                        <td>{VIEW.bank_name}</td>
                                    </tr>
                                    <tr>
                                        <td>Chủ tài khoản:</td>
                                        <td>{VIEW.acount_name}</td>
                                    </tr>
                                    <tr>
                                        <td>Số tài khoản:</td>
                                        <td>{VIEW.acount_number}</td>
                                    </tr>
                                    <tr>
                                        <td>Sản phẩm:</td>
                                        <td>{VIEW.number_product}</td>
                                    </tr>
                                    <tr>
                                        <td>Người theo dõi:</td>
                                        <td>{VIEW.follow}</td>
                                    </tr>
                                    <tr>
                                        <td>Thời gian tham gia:</td>
                                        <td>{VIEW.time_add}</td>
                                    </tr>
                                </tbody>

                            </table>
                            <a href="mailto:asdas@gamil.com">Để thay đổi thông tin shop vui lòng liên hệ <span class="secondary_text">admin@chonhagiau.com</span></a>
                        </div>
                    </div>
                </div>


</div>
			
<!-- END: view -->
<!-- END: main -->