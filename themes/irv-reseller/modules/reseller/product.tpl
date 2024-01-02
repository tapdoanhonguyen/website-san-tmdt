<!-- BEGIN: main -->

<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript"
    src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

<!-- BEGIN: view -->
<div class="content_products_item">
    <h4 class="fs_20">{LANG.product_list}</h4>
    <div class="mt-4 mb-4 bg_white rounded">
        <form id="formsearch">
            <div class="row  p-3 rounded">
                <div class="col-6 mb-3">
                    <div class="p-1 rounded-lg border">
                        <div class="input-group">
                            <div class="input-group-prepend align-items-center pl-3">
                                <i class="fa fa-search pr-1" aria-hidden="true"></i>
                            </div>
                            <input type="text" name="q" value="{Q}" placeholder="{LANG.search_from}"
                                aria-describedby="button-addon2" class="form-control border-0" />
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                        <div class="input-group-prepend align-items-center pl-3">
                            <i class="fa fa-calendar pr-1" aria-hidden="true"></i>
                        </div>
                        <input id="ngaytu" name="ngay_tu" value="{ngay_tu}" type="search" placeholder="Từ ngày"
                            aria-describedby="button-addon2" class="form-control border-0 " />
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                        <div class="input-group-prepend align-items-center pl-3">
                            <i class="fa fa-calendar pr-1" aria-hidden="true"></i>
                        </div>
                        <input id="ngayden" name="ngay_den" value="{ngay_den}" type="search" placeholder="Đến ngày"
                            aria-describedby="button-addon2" class="form-control border-0" />
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                        <div class="input-group-prepend align-items-center pl-3">
                            <i class="fa fa-history pr-1" aria-hidden="true"></i>
                        </div>
                        <select class="form-control border-0" id="sea_flast" name="sea_flast">
                            <option value="0">
                                -- Chọn thời gian --
                            </option>
                            <option value="1" {SELECT1}>Ngày hôm nay</option>
                            <option value="2" {SELECT2}>Ngày hôm qua</option>
                            <option value="3" {SELECT3}>Tuần này</option>
                            <option value="4" {SELECT4}>Tuần trước</option>
                            <option value="5" {SELECT5}>Tháng này</option>
                            <option value="6" {SELECT6}>Tháng trước</option>
                            <option value="7" {SELECT7}>Năm này</option>
                            <option value="8" {SELECT8}>Năm trước</option>
                            <option value="9" {SELECT9}>Toàn thời gian
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                        <div class="input-group-prepend align-items-center pl-3">
                            <i class="fa fa-th-large pr-1" aria-hidden="true"></i>
                        </div>
                        <select class="form-control categories_id select2" name="categories_id">
                            <option value="0">-- Chọn danh mục --</option>
                            <!-- BEGIN: parent_loop -->
                            <option value="{pcatid_i}">
                                {ptitle_i}
                            </option>
                            <!-- END: parent_loop -->
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-1 rounded rounded-lg border d-flex">
                        <div class="input-group-prepend align-items-center pl-3">
                            <i class="fa fa-file pr-1" aria-hidden="true"></i>
                        </div>
                        <select id="status_search" name="status_search" class="form-control border-0 ">
                            <!-- BEGIN: status_filt -->
                            <option value="{status_filt.id}" {status_filt.selected}>{status_filt.text}
                            </option>
                            <!-- END: status_filt -->
                        </select>
                    </div>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <button class="btn_irv mr-3">Tìm kiếm</button>
                    <button class="btn_irv_outline export_file">Xuất Excel</button>
                </div>
            </div>
        </form>
        <div class="tab_menu px-3">
            <ul class="nav nav-pills d-flex" role="tablist">
                <li class="nav-item tab_active1 py-3">
                    <a status_id="-2" onclick="get_product(-2);" class=" py-3 px-4 " href="">Tất cả</a>
                </li>
                <li class="nav-item tab_active2  py-3">
                    <a status_id="1" onclick="get_product(1);" class=" py-3 px-4" href="">Đang hiển thị</a>
                </li>
                <li class="nav-item tab_active3 py-3">
                    <a status_id="3" onclick="get_product(3);" class=" py-3 px-4" href="">Hết hàng</a>
                </li>
                <li class="nav-item tab_active4 py-3">
                    <a status_id="0" onclick="get_product(6);" class=" py-3 px-4" href="">Đã ẩn</a>
                </li>
                <li class="nav-item tab_active5 py-3">
                    <a data-id="2" status_id="2" onclick="get_product(2);" class=" py-3 px-4" href="">Đang chờ đăng</a>
                </li>
                <li class="nav-item tab_active6 py-3">
                    <a data-id="4" status_id="4" onclick="get_product(4);" class=" py-3 px-4" href="">Sản phẩm lỗi</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- search  -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="cart-item__cell-checkbox py-3 ml-4 d-flex align-items-center">
            <label class="irv_label_checkbox mt-2">
                <input name="checkall" name="free_ship[]" type="checkbox" onclick="checkall_freeship(this)">
                <span class="fs_16" style="padding-left:30px">Chọn tất cả</span>
                <span class="irv_checkmark" style="top:1px"></span>
            </label>
            <div class="px-3">
                <select class="option_product option_block p-2 rounded">
                    <option value="0" option_product="0">Lựa chọn</option>
                    <option value="1" option_product="1">FreeShip hàng loạt</option>
                    <option value="2" option_product="2">Hủy FreeShip hàng loạt</option>
                    <option value="3" option_product="3">Tự vận chuyển</option>
                    <option value="4" option_product="4">Hủy tự vận chuyển</option>
                    <option value="6" option_product="6">Tắt trạng thái</option>
                    <option value="7" option_product="7">Bật trạng thái</option>
                    <option value="5" option_product="5">Xóa hàng loạt</option>
                </select>
                <select class="option_product option_hide p-2 rounded">
                    <option value="0" option_product="0">Lựa chọn</option>
                    <option value="5" option_product="5">Xóa hàng loạt</option>
                </select>
            </div>
            <a class="btn_irv" onclick="check_option()">Thực hiện</a>
        </div>
        <div><a href="{product_add}" class="btn_irv">+ Thêm sản phẩm </a></div>
    </div>
    <div class="manage_product bg_white rounded">
        <div id="tab_product">
        </div>
        <div class="cart-item__cell-checkbox py-3 pl-4 d-flex align-items-center">
            <label class="irv_label_checkbox mt-2">
                <input name="checkall" name="free_ship[]" type="checkbox" onclick="checkall_freeship(this)">
                <span class="fs_16" style="padding-left:30px">Chọn tất cả</span>
                <span class="irv_checkmark" style="top:1px"></span>
            </label>
            <div class="px-3">
                <select class="option_product option_block p-2 rounded">
                    <option value="0" option_product="0">Lựa chọn</option>
                    <option value="1" option_product="1">FreeShip hàng loạt</option>
                    <option value="2" option_product="2">Hủy FreeShip hàng loạt</option>
                    <option value="3" option_product="3">Tự vận chuyển</option>
                    <option value="4" option_product="4">Hủy tự vận chuyển</option>
                    <option value="6" option_product="6">Tắt trạng thái</option>
                    <option value="7" option_product="7">Bật trạng thái</option>
                    <option value="5" option_product="5">Xóa hàng loạt</option>
                </select>
                <select class="option_product option_hide p-2 rounded">
                    <option value="0" option_product="0">Lựa chọn</option>
                    <option value="5" option_product="5">Xóa hàng loạt</option>
                </select>
            </div>
            <a class="btn_irv" onclick="check_option()">Thực hiện</a>
        </div>
    </div>
</div>

<!-- END: view -->

<script type="text/javascript">
    $('.nav-item a').on('click', function() {
        $('.option_product').prop('selectedIndex', 0);

        var $el = $(this);
        if ($el.data('id') == 2 || $el.data('id') == 4) {
            $(".cart-item__cell-checkbox .option_block").hide();
            $(".cart-item__cell-checkbox .option_hide").show();
        } else if ($el.data('id') != 2 || $el.data('id') != 4) {
            $(".cart-item__cell-checkbox .option_block").show();
            $(".cart-item__cell-checkbox .option_hide").hide();
        }


    });


    (function() {
        var thanh = {index_active};
        if (thanh == 2 || thanh == 4) {
            $(".cart-item__cell-checkbox .option_block").hide();
            $(".cart-item__cell-checkbox .option_hide").show();
        } else {
            $(".cart-item__cell-checkbox .option_block").show();
            $(".cart-item__cell-checkbox .option_hide").hide();
        }
    })();

    function tab_active() {
        var active = {index_active};
        if (active == -2) {
            $('.tab_active1').addClass('active');
        } else if (active == 1) {
            $('.tab_active2').addClass('active');
        } else if (active == 3) {
            $('.tab_active3').addClass('active');
        } else if (active == 6) {
            $('.tab_active4').addClass('active');
        } else if (active == 2) {
            $('.tab_active5').addClass('active');
        } else if (active == 4) {
            $('.tab_active6').addClass('active');
        }
    }
    tab_active();

    $("form#formsearch").on('submit', function(e) {
        var q = $('input[name=q]').val();
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                nv_fc_variable + '=product&mod=tab_product_status',
            data: $('form#formsearch').serialize(),
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {
                $('#tab_product').html(res);
            },
            error: function(xhr, ajaxOptions, thrownError) {

                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    });
    //alert('{page}');
    get_product({index_active},{page},'{q}');
    function get_product(status, page, q) {
        $.ajax({
            type: "GET",
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                nv_fc_variable + '=product&mod=tab_product_status',
            data: {
                status: status,
                page: page,
                q: q,
            },
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {
                $('#tab_product').html(res);
            },
            error: function(xhr, ajaxOptions, thrownError) {

                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $('.tab_menu ul li').click(function() {
        $('.tab_menu ul li').removeClass('active');
        $(this).addClass('active');
    });
    //
    $('select[name=categories_id]').change(function() {
        var categories_id = $(this).find('option:selected').val();

        $('#box_origin').removeClass('hidden');
        $('#box_brand').removeClass('hidden');
        $('#brand').select2({
            placeholder: "Chọn thương hiệu",
            ajax: {
                url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=brand&cat_id='+categories_id,
                dataType: 'json',
                data: function(params) {
                    var query = {
                        q: params.term
                    }
                    return query;
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        $('#origin').select2({
            placeholder: "Chọn xuất xứ",
            ajax: {
                url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=origin&cat_id='+categories_id,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    var query = {
                        q: params.term
                    }
                    return query;
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

    });
    //


    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function nv_change_status(id) {
        var new_status = $("#change_status_" + id).is(":checked") ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable("change_status_" + id, 5000);
            $.post(nv_base_siteurl + "index.php" + "?" + nv_name_variable + "=" + nv_module_name + "&" +
                nv_fc_variable + "=product&nocache=" + new Date().getTime(), "change_status=1&id=" + id,
                function(res) {
                    var r_split = res.split("_");
                    if (r_split[0] != "OK") {
                        alert(nv_is_change_act_confirm[2]);
                    }
                });
        } else {
            $("#change_status_" + id).prop("checked", new_status ? false : true);
        }
        return;
    }
    //change_freeship

    $(function() {
        var select = $('select.option_product');
        select.change(function() {
            select.not(this).val(this.value);
        });
    });

    function change_freeship(id) {
        var freeship_status = $("#change_freeship_" + id).is(":checked") ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {

            $.post(nv_base_siteurl + "index.php" + "?" + nv_name_variable + "=" + nv_module_name + "&" +
                nv_fc_variable + "=product&nocache=" + new Date().getTime(), "change_freeship=1&id=" + id,
                function(res) {
                    var r_split = res.split("_");
                    if (r_split[0] != "OK") {
                        alert(nv_is_change_act_confirm[2]);
                    }
                });
        } else {
            $("#change_freeship_" + id).prop("checked", freeship_status ? false : true);
        }
        return;

    }
    const freeship_arr = [];

    function nv_change_freeship(id) {

        var new_freeship = $('#change_option_' + id);
        if (new_freeship.is(':checked')) {
            freeship_arr.push(id);
        } else {
            var index = freeship_arr.indexOf(id);
            if (index > -1) {
                freeship_arr.splice(index, 1);
            }
        }

    }

    function check_option() {
        var option_product = document.querySelector(".option_product").value;
        if (option_product == 1) {

            $.ajax({
                    type: 'GET',
                    url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                        nv_fc_variable + '=ajax&mod=freeship',

                    dataType: 'json',
                    data: {freeship: freeship_arr,
                },
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(res) {

                    if (res.status = 'OK') {
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
    } else if (option_product == 2) {

        $.ajax({
                type: 'GET',
                url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                    nv_fc_variable + '=ajax&mod=unfreeship',

                dataType: 'json',
                data: {unfreeship: freeship_arr,
            },
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {

                if (res.status = 'OK') {
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    } else if (option_product == 3) {

        $.ajax({
                type: 'GET',
                url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                    nv_fc_variable + '=ajax&mod=self_transport',

                dataType: 'json',
                data: {self_transport: freeship_arr,
            },
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {

                if (res.status = 'OK') {
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    } else if (option_product == 4) {

        $.ajax({
                type: 'GET',
                url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                    nv_fc_variable + '=ajax&mod=un_transport',

                dataType: 'json',
                data: {un_transport: freeship_arr,
            },
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {

                if (res.status = 'OK') {
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    } else if (option_product == 5) {

        if (confirm('Bạn có muốn xóa sản phẩm đã chọn?')) {
            $.ajax({
                    type: 'GET',
                    url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                        nv_fc_variable + '=ajax&mod=delete_all',

                    dataType: 'json',
                    data: {delete_all: freeship_arr,
                },
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(res) {

                    if (res.status = 'OK') {
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
    }
    } else if (option_product == 6) {

        if (confirm('Bạn có thực sự muốn tắt trạng thái đã chọn')) {
            $.ajax({
                    type: 'GET',
                    url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                        nv_fc_variable + '=ajax&mod=off_product',

                    dataType: 'json',
                    data: {off_product: freeship_arr,
                },
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(res) {

                    if (res.status = 'OK') {
                        window.location.href = 'https://banhang.bbo.vn/product/'; 
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
    }
    } else if (option_product == 7) {

        if (confirm('Bạn có thực sự muốn bật trạng thái đã chọn')) {
            $.ajax({
                    type: 'GET',
                    url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' +
                        nv_fc_variable + '=ajax&mod=on_product',

                    dataType: 'json',
                    data: {on_product: freeship_arr,
                },
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(res) {

                    if (res.status = 'OK') {
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
    }
    }


    }
    // Chọn tất cả freeship

    function checkall_freeship(source) {

        checkboxes = document.getElementsByName('free_ship[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
        var free_ship = document.getElementsByName('free_ship[]');

        if ($('input[name="checkall"]').is(':checked')) {
            while (freeship_arr.length > 0) {
                freeship_arr.pop();
            }
            for (var i = 0; i < free_ship.length; i++) {
                var a = free_ship[i];
                freeship_arr.push(Number(a.value));
            }
        } else {
            while (freeship_arr.length > 0) {
                freeship_arr.pop();
            }
        }

    }

    $("select[name=sea_flast]").change(function() {
        var time_from = "";
        var time_to = "";
        var time = $("select[name=sea_flast]").val();
        if (time == 1) {
            time_from = "{HOMNAY}";
            time_to = "{HOMNAY}";
        } else if (time == 2) {
            time_from = "{HOMQUA}";
            time_to = "{HOMQUA}";
        } else if (time == 3) {
            time_from = "{TUANNAY.from}";
            time_to = "{TUANNAY.to}";
        } else if (time == 4) {
            time_from = "{TUANTRUOC.from}";
            time_to = "{TUANTRUOC.to}";
        } else if (time == 5) {
            time_from = "{THANGNAY.from}";
            time_to = "{THANGNAY.to}";
        } else if (time == 6) {
            time_from = "{THANGTRUOC.from}";
            time_to = "{THANGTRUOC.to}";
        } else if (time == 7) {
            time_from = "{NAMNAY.from}";
            time_to = "{NAMNAY.to}";
        } else if (time == 8) {
            time_from = "{NAMTRUOC.from}";
            time_to = "{NAMTRUOC.to}";
        } else if (time == 9) {
            time_from = "Không chọn";
            time_to = "Không chọn";
        } else if (time == 0) {
            time_from = "";
            time_to = "";
        }
        $("#ngaytu").val(time_from);
        $("#ngayden").val(time_to);
    });
    $("#tms_sea_id").click(function() {
        $("#tms_sea").toggle();
    });
    $("#ngaytu,#ngayden").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        showOtherMonths: true,
    });
    $('[data-toggle="tooltip"]').tooltip();
    $(".export_file").on('click', function(e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=is_download',
            data: $('#formsearch').serialize(),
            beforeSend: function() {

            },
            complete: function() {

            },
            success: function(res) {

                window.location.href = res;

            },
            error: function(xhr, ajaxOptions, thrownError) {

                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    /*$(".export_file").on("click", function (e) {

		e.preventDefault();

        var all = $(this).attr("data-all");
        var form_data = $("#formsearch").serializeArray();
        form_data.push({ name: "all", value: all });

		$.ajax({               
		type: "GET",      
		dataType: 'json',  
url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=is_download',
    data: $('#formsearch').serialize(),
        beforeSend: function() {

        },
        complete: function() {

        },
        success: function(json) {
            console.log(json);
            if (json["error"]) alert(json["error"]);
            if (json["link"]) window.location.href = json["link"];

        },
        error: function(xhr, ajaxOptions, thrownError) {

            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    });*/

    function update_number(product_id, store_id) {
        var amount = $("#amount_" + product_id + "_" + store_id).val();
        var check = confirm("Bạn có chắc là sẽ cập nhật số lượng cho sản phẩm này không?");
        if (check == true) {
            if (amount == "") {
                alert("Vui lòng điền số lượng tồn kho");
            } else {
                $.post(
                    nv_base_siteurl +
                    "index.php" +
                    "?" +
                    nv_name_variable +
                    "=" +
                    nv_module_name +
                    "&" +
                    nv_fc_variable +
                    "=ajax&mod=update_number_product&amount=" +
                    amount +
                    "&product_id=" +
                    product_id,
                    function(res) {
                        var res2 = JSON.parse(res);
                        if (res2.status == "OK") {
                            alert(res2.mess);
                            location.reload();
                        }
                        if (res2.status == "ERROR") {
                            alert(res2.mess);
                        }
                    }
                );
            }
        }
    }

    $('.select2').select2();
    $("ul#option_content li").click(function() {
        var a = $(this).val();
        $('#option_product').attr('value', a);
        $("#option_product").text($(this).text());
        //load_ajax_product();
    });
</script>

<!-- END: main -->