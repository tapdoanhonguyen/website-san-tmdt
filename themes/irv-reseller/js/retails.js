/**
 * @Project TMS HOLDINGS
 * @Author TMS Holdings <contact@tms.vn>
 * @Copyright (C) 2020 TMS Holdings. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 21 Dec 2020 09:08:19 GMT
 */
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
        return false;
    return true;
}

function loading() {
    var $elie = $(".icon_loading");
    rotate(0);

    function rotate(degree) {
        $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)' });
        $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)' });
        setTimeout(
            function() {
                rotate(++degree);
            },
            10
        );
    }
    $(".no_load").addClass("load");
    $(".no_load").removeClass("no_load");
}

function removeloading() {
    $(".load").addClass("no_load");
    $(".load").removeClass("load");

}

function change_status_cancel_tranpost_ahamove(order_id, status_new, status_old) {
    var content = prompt("Lý do hủy", '');
    if (content != null) {
        if (content == '') {
            alert('Vui lòng nhập lý do hủy');
        } else {
            $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&nocache=' + new Date().getTime(), '&order_id=' + order_id + '&status_new=' + status_new + '&mod=change_status_cancel_tranpost_ahamove' + '&status_old=' + status_old + '&content=' + content, function(res) {
                res2 = JSON.parse(res);
                if (res2.status == 'OK') {
                    alert('Hủy thành công');
                    location.reload();
                }
            });
        }
    }
}

function popup_vanchuyen(id, transporters_id, insurance_fee) {

    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=listorder&popup_vanchuyen=1',
        data: { 'order_id': id },
        success: function(res) {
            $("#idmodals .modal-content").html(res);
            $("#idmodals").modal({
                backdrop: "static"
            });
            if (transporters_id == 4 || transporters_id == 5) {
                check_khaigia(id);
            } else if (transporters_id == 3) {
                if (insurance_fee < 3000000) {
                    $('#insurance_fee_text').html('Miễn phí');
                } else {
                    if (insurance_fee > 5000000) {
                        insurance_fee = 5000000;
                    }
                    var total_insurance_fee = insurance_fee * 0.005;
                    $('#insurance_fee_text').html(format_number(total_insurance_fee) + 'đ');
                }
            } else if (transporters_id == 2) {
                if (insurance_fee < 1000000) {
                    $('#insurance_fee_text').html('Miễn phí');
                } else {
                    if (insurance_fee > 20000000) {
                        insurance_fee = 20000000;
                    }
                    var total_insurance_fee = insurance_fee * 0.005;
                    $('#insurance_fee_text').html(format_number(total_insurance_fee) + 'đ');
                }

            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


}


function send_ghtk(id, module) {
    var pick_option = $("input[name='pick_option']:checked").val();
    var insurance_fee = $("input[name='insurance_fee']").is(':checked');
    if (insurance_fee == true) {
        insurance_fee = 1;
    } else {
        insurance_fee = 0;
    }
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=send_ghtk',
        dataType: 'json',
        data: {
            order_id: id,
            pick_option: pick_option,
            insurance_fee: insurance_fee
        },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
            $('#loading_modal').modal('show');
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
            $('#loading_modal').modal('hide');

        },
        success: function(res) {
            if (res.status == 'OK') {
                alert('Gửi hàng thành công!');
                console.log('Gửi hàng thành công!');
            } else {
                alert(res.mess);
            }
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function check_khaigia(id) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=check_khaigia',

        dataType: 'json',
        data: {
            order_id: id,
        },
        beforeSend: function() {

        },
        complete: function() {


        },
        success: function(res) {

            $('#check_khaigia').html(format_number(res) + 'đ');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

}

function sendahamomve(id, module) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=send_ahamove',
        data: { 'order_id': id },
        success: function(res) {
            res2 = JSON.parse(res);
            if (res2.status == 'OK') {
                alert('Gửi hàng thành công')
                location.reload();
            } else {
                alert(res2.mess)
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}



function sendviettelpost(id, module) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=send_viettelpost',
        data: { 'order_id': id },
        success: function(res) {
            res2 = JSON.parse(res);
            alert('Gửi hàng thành công')
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function sendvnpost(id, module) {

    var hinhthucthugom = $("input[name='hinhthucthugom']:checked").val();
    var khaigia = $("input[name='khaigia']").is(':checked');
    if (khaigia == true) {
        khaigia = 1;
    } else {
        khaigia = 0;
    }

    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=send_vnpost',
        dataType: 'json',
        data: {
            order_id: id,
            hinhthucthugom: hinhthucthugom,
            khaigia: khaigia
        },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
            $('#loading_modal').modal('show');
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
            $('#loading_modal').modal('hide');

        },
        success: function(res) {

            if (res.status == 'OK') {
                alert('Gửi hàng thành công!');
                console.log('Gửi hàng thành công!');
            } else {
                alert('Gửi hàng thất bại!');
            }

            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function ghn_cancel(id, module) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=ghn_cancel',
        dataType: 'json',
        data: { order_id: id },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
        },
        success: function(res) {
            if (res.status == 'OK') {
                alert('Hủy gửi hàng thành công!');
            } else {
                alert('Hủy gửi hàng thất bại!');
            }

            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

}

function send_ghn(id, module) {

    var pick_option = $("input[name='pick_option']:checked").val();
    var insurance_fee = $("input[name='insurance_fee']").is(':checked');
    if (insurance_fee == true) {
        insurance_fee = 1;
    } else {
        insurance_fee = 0;
    }
    $.ajax({
        type: 'GET',
        url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=' + module + '&mod=send_ghn',
        dataType: 'json',
        data: {
            order_id: id,
            pick_option: pick_option,
            insurance_fee: insurance_fee
        },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
            $('#loading_modal').modal('show');
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
            $('#loading_modal').modal('hide');

        },
        success: function(res) {
            if (res.status == 'OK') {
                alert('Tạo vận đơn GHN thành công!');
                
            } else {
                alert('Tạo vận đơn GHN thất bại!');
            }
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function shipping(id) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=shipping',
        dataType: 'json',
        data: { order_id: id },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
        },
        success: function(res) {

            if (res.status == 'OK') {

                alert('Cập nhật trạng thái đơn hàng thành công!');
            } else {
                alert('Cập nhật trạng thái đơn hàng thất bại!');
            }

            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function delivered(id) {
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=delivered',
        dataType: 'json',
        data: { order_id: id },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
        },
        success: function(res) {

            if (res.status == 'OK') {

                alert('Cập nhật trạng thái đơn hàng thành công!');
            } else {
                alert('Cập nhật trạng thái đơn hàng thất bại!');
            }

            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function delivery_failed(id) {
    $.ajax({
        type: 'GET',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=delivery_failed',
        dataType: 'json',
        data: { order_id: id },
        beforeSend: function() {
            $('button.btn_ecng').prop('disabled', true);
        },
        complete: function() {
            $('button.btn_ecng').prop('disabled', false);
        },
        success: function(res) {

            if (res.status == 'OK') {

                alert('Khiếu nại của bạn đã được ghi nhận và sẽ được xử lý trong vòng 48 giờ.');
            } else {
                alert('Khiếu nại thất bại. Vui lòng thử lại sau!');
            }

            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}



function change_status_cancel(order_id) {
    var content = prompt("Lý do hủy", '');
    if (content != null) {
        if (content == '') {
            alert('Vui lòng nhập lý do hủy');
        } else {
            $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&order_id=' + order_id + '&mod=change_status_cancel' + '&content=' + content, function(res) {
                res2 = JSON.parse(res);
                if (res2.status == 'OK') {
                    alert('Hủy thành công!');
                    location.reload();
                } else {
                    alert('Hủy đơn hàng thất bại!');
                }
            });
        }
    }
}

function change_status_success(order_id, status_new, status_old) {
    var check = confirm("Bạn có chắc là sẽ chuyển trạng thái đơn hàng này sang thành công không? ");
    if (check) {
        $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&nocache=' + new Date().getTime(), '&order_id=' + order_id + '&status_new=' + status_new + '&mod=change_status_success' + '&status_old=' + status_old, function(res) {
            res2 = JSON.parse(res);
            if (res2.status == 'OK') {
                alert('Chuyển trạng thái thành công');
                location.reload();
            }
        });
    }
}

function change_status(order_id, status_new, status_old) {
    if (status_old == 0) {
        var check = confirm("Bạn có chắc là sẽ chuyển trạng thái đơn hàng này sang đã xác nhận không? ");
    }
    if (check) {
        $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&nocache=' + new Date().getTime(), '&order_id=' + order_id + '&status_new=' + status_new + '&mod=change_status' + '&status_old=' + status_old, function(res) {
            res2 = JSON.parse(res);
            if (res2.status == 'OK') {
                alert('Chuyển trạng thái thành công');
                location.reload();
            } else {
                alert('Chuyển trạng thái thất bại');
            }
        });
    }
}

function initMap() {}

function remove_cart(key_store, key_product, key_warehouse) {
    $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=remove_cart&key_store=' + key_store + '&key_product=' + key_product + '&key_warehouse=' + key_warehouse,
        function(res) {
            alert('Xóa thành công');
            location.reload();
        });
}

function checkall2(a) {
    var x = $(a).is(":checked");
    if (x == true) {
        store.forEach(element => {
            document.getElementById('store_' + element.store_id).checked = true;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = true;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = true
            change_status_check_cart(element.store_id, element.key_product, 1);
        });
        document.getElementById('check_all').checked = true;

    } else {
        store.forEach(element => {
            document.getElementById('store_' + element.store_id).checked = false;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = false;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = false
            change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 0);
        });
        document.getElementById('check_all').checked = false;
    }
    sum();
}

function check_store(a, store_id) {
    var x = $(a).is(":checked");
    if (x == true) {
        store.forEach(element => {
            if (element.store_id == store_id) {
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = true
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = true
                change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 1);
            }
        });
    } else {
        store.forEach(element => {
            if (element.store_id == store_id) {
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = false
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = false
                change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 0);
            }
        });
    }
    sum();
}

function check_warehouse(a, store_id, key_warehouse) {
    var x = $(a).is(":checked");
    if (x == true) {
        store.forEach(element => {
            if (element.store_id == store_id && element.key_warehouse == key_warehouse) {
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = true
                change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 1);
            }
        });
    } else {
        store.forEach(element => {
            if (element.store_id == store_id && element.key_warehouse == key_warehouse) {
                document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = false
                change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 0);
            }
        });
    }
    sum();
}

function check_product(store_id, key_product, key_warehouse, a) {
    var x = $(a).is(":checked");
    if (x == true) {
        change_status_check_cart(store_id, key_product, key_warehouse, 1);
    } else {
        change_status_check_cart(store_id, key_product, key_warehouse, 0);
    }
    sum();
}

function sum() {
    var total = 0;
    store.forEach(element => {
        var checked = $('#store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).is(":checked");
        if (checked == true) {
            total = total + element.total;
        }
    })
    $('#total_no').html(format_number(total))
    $('#total_tc').html(format_number(total))
}

function checkall(a) {
    var x = $(a).is(":checked");
    if (x == true) {
        store.forEach(element => {
            document.getElementById('store_' + element.store_id).checked = true;

            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = true
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = true;

            change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 1);
        });
        document.getElementById('check_all2').checked = true;

    } else {
        store.forEach(element => {
            document.getElementById('store_' + element.store_id).checked = false;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse).checked = false;
            document.getElementById('store_' + element.store_id + '_' + element.key_warehouse + '_' + element.key_product).checked = false;
            change_status_check_cart(element.store_id, element.key_product, element.key_warehouse, 0);
        });
        document.getElementById('check_all2').checked = false;
    }
    sum();
}

function change_status_check_cart(key_store, key_product, key_warehouse, status_check) {
    $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=update_status_check&key_store=' + key_store + '&key_product=' + key_product + '&key_warehouse=' + key_warehouse + '&status_check=' + status_check, function(res) {});
}

function update_cart(key_store, key_product, key_warehouse, a) {
    var quantity = $(a).val();
    $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=update_cart&key_store=' + key_store + '&key_product=' + key_product + '&quantity=' + quantity + '&key_warehouse=' + key_warehouse, function(res) {
        location.reload();
    });
}
$('#upload_fileupload_image_before').change(function() {
    var name_file = $(this).val().slice(12)
    if (name_file != '') {
        $('#file_name').val('/uploads/retails/business_license/' + name_file);
    } else {
        $('#file_name').val($(this).val());
    }

});
$('#upload_fileupload_image_after').change(function() {
    var name_file = $(this).val().slice(12)
    if (name_file != '') {
        $('#file_name_after').val('/uploads/retails/business_license/' + name_file);
    } else {
        $('#file_name_after').val($(this).val());
    }
});

$(window).scroll(function(event) {
    var $this = $(this),
        $head = $('.wrap_thanh_ben_trai');
    if ($this.scrollTop() > 600) {
        $head.addClass('len_top');
        $head.removeClass('len_top_active');
    } else {
        $head.removeClass('len_top');
        $head.addClass('len_top_active');
    }
});
$(window).scroll(function() {
    var scrollDistance1 = $(window).scrollTop();
    var height = $('.thanh_menu_ben_trai_bao_icon').height()
    var scrollDistance = scrollDistance1 - height;
    $('.boxCategory').each(function(i) {
        if ($(this).position().top < scrollDistance) {
            $('.thanh_menu_ben_trai_bao_icon').removeClass('active_list_product_left');
            $('.thanh_menu_ben_trai_bao_icon').eq(i).addClass('active_list_product_left');
        }
    });
}).scroll();
$("a[href*='#']:not([href='#])").click(function() {
    let target = $(this).attr("href");
    $('html,body').stop().animate({
        scrollTop: $(target).offset().top
    }, 1000);
    event.preventDefault();
});

function transfer_shop(catid, type, store_id) {
    if (type == 0) {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_selling_product_shops&catid=' + catid + '&store_id=' + store_id);
        $('.cat0_' + catid).addClass("active")
        $('.cat1_' + catid).removeClass("active")
        $('.cat2_' + catid).removeClass("active")
    } else if (type == 1) {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_new_product_shops&catid=' + catid + '&store_id=' + store_id);
        $('.cat0_' + catid).removeClass("active")
        $('.cat1_' + catid).addClass("active")
        $('.cat2_' + catid).removeClass("active")
    } else {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_price_product_shops&catid=' + catid + '&store_id=' + store_id);
        $('.cat0_' + catid).removeClass("active")
        $('.cat1_' + catid).removeClass("active")
        $('.cat2_' + catid).addClass("active")
    }
}

function transfer(catid, type) {
    if (type == 0) {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_selling_product&catid=' + catid);
        $('.cat0_' + catid).addClass("active")
        $('.cat1_' + catid).removeClass("active")
        $('.cat2_' + catid).removeClass("active")
    } else if (type == 1) {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_new_product&catid=' + catid);
        $('.cat0_' + catid).removeClass("active")
        $('.cat1_' + catid).addClass("active")
        $('.cat2_' + catid).removeClass("active")
    } else {
        $('#list_product_' + catid).load(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_price_product&catid=' + catid);
        $('.cat0_' + catid).removeClass("active")
        $('.cat1_' + catid).removeClass("active")
        $('.cat2_' + catid).addClass("active")
    }
}

function format_number(amount) {
    var delimiter = ","; // replace comma if desired
    var i = parseInt(amount);
    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-';
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3) {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }
    if (n.length > 0) {
        a.unshift(n);
    }
    amount = a.join(delimiter);
    amount = minus + amount;
    return amount;
}

function remove_warehouse_list(id) {
    $('#group_list_' + id).remove();
}

function FormatNumber(str) {

    var strTemp = GetNumber(str);
    if (strTemp.length <= 3) {
        return strTemp;
    }

    strResult = "";
    for (var i = 0; i < strTemp.length; i++) {
        strTemp = strTemp.replace(",", "");
    }

    var m = strTemp.lastIndexOf(".");
    if (m == -1) {
        for (var i = strTemp.length; i >= 0; i--) {
            if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0) {
                strResult = "," + strResult;
            }
            strResult = strTemp.substring(i, i + 1) + strResult;
        }
    } else {
        var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
        var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."), strTemp.length);
        var tam = 0;
        for (var i = strphannguyen.length; i >= 0; i--) {

            if (strResult.length > 0 && tam == 4) {
                strResult = "," + strResult;
                tam = 1;
            }

            strResult = strphannguyen.substring(i, i + 1) + strResult;
            tam = tam + 1;
        }
        strResult = strResult + strphanthapphan;
    }
    return strResult;
}

function GetNumber(str) {
    var count = 0;
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
            return str.substring(0, i);
        }
        if (temp == " ") {
            return str.substring(0, i);
        }

        if (temp == ".") {
            if (count > 0) {
                return str.substring(0, ipubl_date);
            }
            count++;
        }
    }
    return str;
}

function IsNumberInt(str) {
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "." || (temp >= 0 && temp <= 9))) {
            alert(inputnumber);
            return str.substring(0, i);
        }
        if (temp == ",") {
            return str.substring(0, i);
        }
    }
    return str;
}


function remove_other_image(id) {
    $('#other_image_tr_' + id).remove();
    other_image.splice(Number(id) - 1, 1);
}

function remove_group_list(id) {
    $('#group_' + id).remove();
    group_list.splice(Number(id) - 1, 1);
}

function generateCardNo(x) {
    if (!x) {
        x = 16;
    }
    chars = "1234567890";
    no = "";
    for (var i = 0; i < x; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        no += chars.substring(rnum, rnum + 1);
    }
    return no;
}

function nv_chang_cat(catid, mod) {
    var nv_timer = nv_settimeout_disable('id_' + mod + '_' + catid, 5000);
    var new_vid = $('#id_' + mod + '_' + catid).val();
    $.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&nocache=' +
        new Date().getTime(), 'id=' + catid + '&mod=' + mod + '&new_vid=' + new_vid,
        function(res) {
            res2 = JSON.parse(res)
            if (res2.status != 'OK') {
                alert(nv_is_change_act_confirm[2]);
                clearTimeout(nv_timer);
            } else {
                clearTimeout(nv_timer);
                location.reload();
            }


        });
    return;
}

function add_warehouse(validate_name_warehouse, validate_name_send, validate_phone, validate_province_id, validate_district_id, validate_ward_id, validate_address) {
    var id_next = warehouse[warehouse.length - 1]['id'] + 1
    $('.warehouse').append('<tr id="warehouse_list_' + id_next + '">' +
        '<td>' +
        '<input class="form-control hidden" type="text" name="store_list[' + id_next + '][warehouse_id]" value="0" /><input class="form-control" type="text" name="store_list[' + id_next + '][name_warehouse]" value="" required="required" placeholder="Tên kho hàng" onclick="setCustomValidity(\'' + '\')"  oninput="setCustomValidity(\'' + '\')" />' +
        '</td>' +
        '<td>' +
        '<input class="form-control" type="text" name="store_list[' + id_next + '][name_send]" placeholder="Tên người gởi" value="" required="required" pattern=".+" oninvalid="setCustomValidity(\'' + validate_name_send + '\')" oninput="setCustomValidity(\'' + '\')" />' +
        '</td>' +
        '<td>' +
        '<input class="form-control" type="tel" name="store_list[' + id_next + '][phone_send]" placeholder="Số điện thoại người gởi" value="" required="required" pattern="^\\d{4}-\\d{3}-\\d{3}$" oninput="setCustomValidity(\'' + '\')" oninvalid="setCustomValidity(\'' + validate_phone + '\')" />' +
        '</td>' +
        '<td>' +
        '<div class="col-md-6">' +
        '<select class="form-control province_id_' + id_next + '"  required oninvalid="setCustomValidity(\'' + validate_province_id + '\')" oninput="setCustomValidity(\'' + '\')" onchange="change_province(' + id_next + ')" name="store_list[' + id_next + '][province_id]" ></select>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<select class="form-control district_id_' + id_next + '" required oninvalid="setCustomValidity("' + validate_district_id + '")" oninput="setCustomValidity(\'' + '\')" onchange="change_district(' + id_next + ')" name="store_list[' + id_next + '][district_id]"></select>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<select class="form-control ward_id_' + id_next + '" required oninvalid="setCustomValidity(\'' + validate_ward_id + '\')" oninput="setCustomValidity(\'' + '\')"  onchange="change_ward(' + id_next + ')"  name="store_list[' + id_next + '][ward_id]"></select>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<input class="form-control address_' + id_next + '" type="text" name="store_list[' + id_next + '][address]" value="" placeholder="Địa chỉ ngắn gọn" onchange="change_address(' + id_next + ')"   required="required" pattern=".+" oninvalid="setCustomValidity(\'' + validate_address + '\')" oninput="setCustomValidity(\'' + '\')" />' +
        '<input hidden name="store_list[' + id_next + '][lat]" value=""  id="lat_' + id_next + '" /><input hidden value=""  name="store_list[' + id_next + '][lng]" id="lng_' + id_next + '" />' +
        '</div>' +
        '</td>' +
        '<td><button type="button" class="btn btn-primary" onclick="remove_warehouse(' + id_next + ')">Xóa</button></td></tr><script type="text/javascript">location_warehouse_add(' + id_next + '); <\/script>')
    warehouse.push({ "id": id_next })
}

function remove_warehouse(id) {
    $('#warehouse_list_' + id).remove();
    warehouse.splice(Number(id) - 1, 1);
}

function location_warehouse_add(id) {
    $('.province_id_' + id).select2({
        placeholder: "Mời bạn chọn thành phố",
        ajax: {
            url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_province',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    })

    $('.district_id_' + id).select2({
        placeholder: "Mời bạn chọn quận"
    })

    $('.ward_id_' + id).select2({
        placeholder: "Mời bạn chọn phường xã"
    })
}
var address_full = ''

function initMap() {}

function change_ward(id) {
    var province_name = $('.province_id_' + id).find('option:selected').text();
    var district_name = $('.district_id_' + id).find('option:selected').text();
    var ward_name = $('.ward_id_' + id).find('option:selected').text();
    var address = $('.address_' + id).val();
    var geocoder = new google.maps.Geocoder();

    if (address != '') {
        address_full = address + ', ' + ward_name + ',' + district_name + ',' + province_name
    } else {
        address_full = ward_name + ',' + district_name + ',' + province_name
    }
    geocoder.geocode({ 'address': address_full }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var lat = document.getElementById('lat_' + id)
            lat.setAttribute("value", results[0].geometry.location.lat());
            var lng = document.getElementById('lng_' + id)
            lng.setAttribute("value", results[0].geometry.location.lng());
        }
    });
}

function change_address(id) {
    var province_name = $('.province_id_' + id).find('option:selected').text();
    var district_name = $('.district_id_' + id).find('option:selected').text();
    var ward_name = $('.ward_id_' + id).find('option:selected').text();
    var address = $('.address_' + id).val();
    var geocoder = new google.maps.Geocoder();
    address_full = address + ', ' + ward_name + ',' + district_name + ',' + province_name
    console.log({ 'address': address_full });
    geocoder.geocode({ 'address': address_full }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var lat = document.getElementById('lat_' + id)
            lat.setAttribute("value", results[0].geometry.location.lat());
            var lng = document.getElementById('lng_' + id)
            lng.setAttribute("value", results[0].geometry.location.lng());
        }
    });
}

function change_province(id) {
    var provinceid = $('.province_id_' + id).find('option:selected').val();
    $('.district_id_' + id).empty();
    $('.district_id_' + id).select2({
        placeholder: "Mời bạn chọn quận",
        width: '100%',
        ajax: {
            url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_district',
            dataType: 'json',
            delay: 250,
            data: function(params) {

                var query = {
                    q: params.term,
                    provinceid: provinceid
                }

                return query;
            },
            method: 'post',
            processResults: function(data) {

                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function change_province_order(a) {
    var provinceid = $(a).find('option:selected').val();
    $('.district_id').empty();
    $('.district_id').select2({
        placeholder: "Mời bạn chọn quận",
        width: '100%',
        ajax: {
            url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_district',
            dataType: 'json',
            delay: 250,
            data: function(params) {

                var query = {
                    q: params.term,
                    provinceid: provinceid
                }

                return query;
            },
            method: 'post',
            processResults: function(data) {

                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function change_district_order(a) {
    var districtid = $(a).find('option:selected').val();
    $('.ward_id').empty();
    $('.ward_id').select2({
        placeholder: "Mời bạn chọn phường xã",
        width: '100%',
        ajax: {
            url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_ward',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term,
                    districtid: districtid
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function change_district(id) {
    var districtid = $('.district_id_' + id).find('option:selected').val();

    $('.ward_id_' + id).empty();
    $('.ward_id_' + id).select2({
        placeholder: "Mời bạn chọn phường xã",
        width: '100%',
        ajax: {
            url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_ward',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term,
                    districtid: districtid
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function calcRate(r) {
    const f = ~~r, //Tương tự Math.floor(r)
        id = 'star' + f + (r % f ? 'half' : '')
    id && (document.getElementById(id).checked = !0)
}