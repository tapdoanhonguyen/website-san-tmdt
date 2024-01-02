

$(document).ready(function() {
	
    $("#login_form").validate({
        rules: {
            nv_login: {
                required: true,
                
			},
            nv_password: {
                required: true,
                minlength: 6,
			}
		},
        messages: {
            nv_login: {
                required: "Chưa nhập tên đăng nhập",
                
			},
            nv_password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải trên 6 ký tự",
			}
		},
        submitHandler: function() {
            $.ajax({
                type: 'POST',
                url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=users&' + nv_fc_variable + '=login',
                data: $('#login_form').serialize(),
                dataType: "json",
                beforeSend: function() {
                    thongbao_xuly('Hệ thống đang xử lý... Vui lòng đợi trong giây lát!');
                    $('#login_form .btn_ecng').prop('disabled', true);
				},
                complete: function() {
					
                    $('#login_form .btn_ecng').prop('disabled', false);
					
				},
                success: function(res) {
                    console.log(res);
                    if (res.status == "error") {
                        $('#login_form').find("[name=\"" + res.input + "\"]").focus();
                        thongbao(res.mess);
					}
                    if (res.status == "ok") {
                        thongbao('Cập nhật thông tin thành công!');
                        window.location.href = nv_base_siteurl;
					}
				}
			});
		}
	});
	
	
	
    function thongbao_xuly(message) {
        $('.contact-result').html(message).removeClass("alert-danger").addClass("alert-info").show();
        setTimeout(function() {
            $('.contact-result').hide();
		}, 5000);
	}
	
    function thongbao(message) {
        $('.contact-result').html(message).removeClass("alert-danger").addClass("alert-info").show();
        setTimeout(function() {
            $('.contact-result').hide();
		}, 5000);
	}
	
    $("#register_form").validate({
        rules: {
            company_name: {
                required: true,
                minlength: 4,
			},
            address: {
                required: true,
                minlength: 4,
			},
            tax_code: {
                required: true,
                minlength: 4,
			},
            email: {
                required: true,
                email: true,
			},
            phone: {
                required: true,
                sdt: true,
			},
            representative: {
                required: true,
                minlength: 4,
			},
            category: {
                required: true,
			},
			
			
		},
        messages: {
            company_name: {
                required: "Vui lòng nhập tên công ty",
                minlength: "Vui lòng nhập ít nhất 4 ký tự ",
			},
            address: {
                required: "Vui lòng nhập địa chỉ",
                minlength: "Vui lòng nhập ít nhất 4 ký tự ",
			},
            tax_code: {
                required: "Vui lòng nhập mã số thuế",
                minlength: "Vui lòng nhập ít nhất 4 ký tự ",
			},
            email: {
                required: "Vui lòng nhập email",
                email: "Email chưa đúng định dạng",
			},
            phone: {
                required: "Chưa nhập số điện thoại",
                // sdt: true,
			},
            representative: {
                required: "Vui lòng nhập người đại diện",
                minlength: "Vui lòng nhập ít nhất 4 ký tự ",
			},
            category: {
                required: "Vui lòng nhập ngành hàng",
				
			},
			
		},
        submitHandler: function() {
            $.ajax({
                type: 'POST',
                url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=retails&' + nv_fc_variable + '=registercontact&mod=registercontact',
                data: $('#register_form').serialize(),
                dataType: "json",
                beforeSend: function() {
                    thongbao_xuly('Hệ thống đang xử lý... Vui lòng đợi trong giây lát!');
                    $('#register_form .btn_ecng').prop('disabled', true);
				},
                complete: function() {
					
                    $('#register_form .btn_ecng').prop('disabled', false);
					
				},
                success: function(res) {
                    console.log(res);
                    if (res.status == "error") {
                        $('#register_form').find("[name=\"" + res.input + "\"]").focus();
                        thongbao(res.mess);
					}
                    if (res.status == "ok") {
                        notifi_register('Cảm ơn bạn đã đăng ký trở thành nhà bán hàng của chonhagiau.com. Phòng chăm sóc nhà bán hàng sẽ liên hệ với bạn trong thời gian sớm nhất.')
						setTimeout(function() {
							  window.location.assign("https://chonhagiau.com/");
						}, 5000);
						
					}
				}
			});
		}
		
	});
    $.validator.addMethod("sdt", function(value, element) {
        return this.optional(element) || /(0+([1-9]+[0-9]{8})\b)/i.test(value);
	}, "Số điện thoại không đúng định dạng");
    $("#forgotPass_form").validate({
        rules: {
            email: {
                required: true,
                email: true,
			},
			
		},
        messages: {
            email: {
                required: "Vui lòng nhập email",
                email: "Email chưa đúng định dạng",
			},
			
		}
	});
    $('.manage_header a').click(function() {
        $('.manage_header').find('.btn_ecng').removeClass('btn_ecng').addClass('btn_gray');
        $(this).addClass('btn_ecng').removeClass('btn_gray');
	});
	
    $('.seller_menu a').click(function() {
        $(this).find('.secondary_text').removeClass('secondary_text')
		$(this).addClass('secondary_text')
	});
	
    // quan ly sp --> quan ly kho 
    $('.click_update_warehouse').click(function() {
        $('.update_warehouse').addClass('d-none');
        $('.add_warehouse').removeClass('d-none')
	});
    $('.save_warehouse').click(function() {
        $('.update_warehouse').removeClass('d-none');
        $('.add_warehouse').addClass('d-none')
	})
});

function notifi_screen(message) {
		$('#notifi_screen').show();
		$('.notifi_screen').html(message);
	};
	

function notifi_register(message) {
	$('#exampleModalCenter').show();
	$('.notifi_register').html(message);
	
};
	
/*function notifi_error(message) {
	$('#notifi_error').show();
	$('.notifi_error').html(message);
};
*/
function notifi_address(message) {
	$('#notifi_address').show();
	$('.notifi_address').html(message);
};
function notifi_error(message) {
	$('.notifi_error').html(message).addClass("text_red").show();
};
function notifi_error1(message) {
	$('.notifi_error1').html(message).addClass("text_red").show();
};