<!-- BEGIN: main -->


<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal form_voucher" method="post">
            <input type="hidden" name="id" value="{ROW.id}" />
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.voucher_name}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="voucher_name" value="{ROW.voucher_name}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.voucher_code}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="voucher_code" value="{ROW.voucher_code}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.time_from}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <input class="form-control" type="text" name="time_from" value="{ROW.time_from}" id="time_from"
                            pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="time_from-btn">
                                <em class="fa fa-calendar fa-fix"> </em>
                            </button> </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.time_to}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <input class="form-control" type="text" name="time_to" value="{ROW.time_to}" id="time_to"
                            pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="time_to-btn">
                                <em class="fa fa-calendar fa-fix"> </em>
                            </button> </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>Ngành hàng</strong></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control category" name="category">
                        <option value="0">-- Tất cả --</option>
                        <!-- BEGIN: parent_loop -->
                        <option value="{pcatid_i}" {pselect}>
                            {ptitle_i}
                        </option>
                        <!-- END: parent_loop -->
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>Thương hiệu</strong></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control brand" name="brand">
                        <option value="0"> -- Tất cả --</option>
                        <!-- BEGIN: brand -->
                        <option value="{OPTION.key}" {OPTION.selected}>
                            {OPTION.title}
                        </option>
                        <!-- END: brand -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>Loại giảm giá</strong></label>
                <div class="col-sm-19 col-md-20">
                    <!-- BEGIN: voucher_type -->
                    <div class="radio">
                        <label><input value="{VOUCHER_TYPE.id}" type="radio" name="voucher_type"
                                {VOUCHER_TYPE.checked}>{VOUCHER_TYPE.name}</label>
                    </div>
                    <!-- END: voucher_type -->
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-5 col-md-4 control-label"><strong>Mức giảm giá</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <div class="input-group">
                            <select class="form-control" id="type_discount" name="type_discount">
                                <option value="0" {tdselected_1}>Theo số tiền</option>
                                <option value="1" {tdselected_2}>Theo phần trăm</option>
                            </select>
                            <div id="change_type_discount">

                            </div>
                        </div>
                    </div>
                    <div class="notifi_error1 text_red mt-2 fs_12"></div>
                </div>
                <div id="maximum_discount">

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.minimum_price}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="minimum_price" value="{ROW.minimum_price}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.usage_limit_quantity}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="usage_limit_quantity"
                        value="{ROW.usage_limit_quantity}" pattern="^[0-9]*$" oninvalid="setCustomValidity(nv_digits)"
                        oninput="setCustomValidity('')" />
                </div>
            </div>
            <div class="form-group" style="text-align: center">
                <input type="button" class="btn btn-primary" id="submit" name="submit" value="{LANG.save}"/>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript"
    src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript">
    
    $('.category').on('change', function() {
        var cate_id = $('.category').val();
        var html = '';
        $.ajax({
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=get-brand',
            type: 'get',
            dataType: 'json',
            data: {cate_id: cate_id},
            success: function(res) {
                if (res.status == 'OK') {
                    html += '<option value="0"> -- Tất cả --</option>';
                    for (var key in res.data) {
                        html += '<option value=' + res.data[key].id + '>' + res.data[key].title +
                            '</option>';
                    }
                    $('.brand').html(html);
                }
            }
        });
    });

    $('#submit').on('click', function(){
        $.ajax({
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=submit',
            type: 'get',
            dataType: 'json',
            data: $('.form_voucher').serialize(),
            success: function(res) {
                if (res.status == 'OK') {
                    window.location = res.link;
                } else{
                    alert(res.mes);
                }
            }
        });
    });

    //<![CDATA[
    $("#time_from,#time_to").datepicker({
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
    });

    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=voucher&nocache=' + new Date().getTime(), 'change_status=1&id=' + id,
                function(res) {
                    var r_split = res.split('_');
                    if (r_split[0] != 'OK') {
                        alert(nv_is_change_act_confirm[2]);
                    }
                });
        } else {
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }


    var type_discount = $('#type_discount').val();
    choose_type_discount(type_discount);

    $("#type_discount").change(function() {
        var type_discount = $('#type_discount ').val();
        choose_type_discount(type_discount);
    });

    function choose_type_discount(type_discount) {
        if (type_discount == 0) {
            $('#change_type_discount').html('<input type="text" onchange="myFunction(1)" class="form-control number_add del_zero1 border-0" placeholder="Nhập vào"  name="discount_price" value="{ROW.discount_price}" >');
            $('#maximum_discount').html('');
        } else {
            $('#change_type_discount').html('<div class="input-group rounded-lg"><input type="text" onchange="myFunction(1)" class="form-control number_add del_zero1 border-0" placeholder="% giảm lớn hơn 1"  name="discount_percent" value="{ROW.discount_percent}" maxlength="2"><div class="input-group-prepend"><button type="button" class="btn bg_gray" disabled>% Giảm</button></div></div>');

            $('#maximum_discount').html('<div class="form-group row mb-0 pt-2" ><label class="col-4 col-form-label"><strong>Mức giảm tối đa</strong></label><div class="col-8"><div class="input_error_noIcon"><input type="text" onchange="myFunction(2)" class="form-control number_add del_zero2" placeholder="Nhập vào"  name="maximum_discount" value="{ROW.maximum_discount}"></div></div></div><div class="form-group row pt-2"><div class="col-4"></div><div class="col-8"><div class="fs_12 text_gray_color">Nếu bỏ trống thì mức giảm tối đa sẽ là không giới hạn!</div></div></div>');
        }
    }


    //]]>
</script>
<!-- END: main -->