<!-- BEGIN: main -->

<div class="container" style="margin-top: 50px;">
        <a href="{LOGIN}" class="secondary_text"><i class="fa fa-reply-all" aria-hidden="true"></i> Quay lại đăng nhập</a>
        <div class="seller_register bg_white shadow">
            <div class="row" style="border-bottom: 1px solid #e1a208;">
                <div class="col-12 text-center py-4 ">
                    <div class="secondary_text fs_24">Đăng ký nhà bán hàng</div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-8 offset-2 px-4">
                    <form class="mt-4" id="register_form" method="POST">
                        <div class="contact-result"></div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Tên công ty(<span class="text_red">*</span>) </label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input type="text" placeholder="Nhập tên công ty" name="company_name" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Địa chỉ(<span class="text_red">*</span>)</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input type="text" placeholder="Nhập địa chỉ" name="address" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Mã số thuế(<span class="text_red">*</span>):</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input type="text" placeholder="Nhập mã số thuế" name="tax_code" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Email(<span class="text_red">*</span>):</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input type="text" placeholder="Nhập email" name="email" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Số điện thoại(<span class="text_red">*</span>):</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input maxlength="10" type="text" placeholder="Nhập số điện thoại" name="phone" maxlength="104316" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Người đại diện(<span class="text_red">*</span>):</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <input type="text" placeholder="Nhập họ tên người đại diện" name="representative" aria-describedby="button-addon4" class="form-control bg-none border-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Danh mục(<span class="text_red">*</span>):</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-4 border rounded-lg  input_ecng">
                                    <div class="input_error_noIcon">
                                        <select class="form-control border-0" id="sel1" name="category">
                                            <option value="">Chọn ngành hàng</option>
											<!-- BEGIN: category -->
                                            <option value="{category.name}">{category.name}</option>
											<!-- END: category -->
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn_ecng">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- END: main -->