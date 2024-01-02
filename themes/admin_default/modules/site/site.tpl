<!-- BEGIN: main -->

<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<!-- BEGIN: add -->

<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" id="sitecreate" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<input type="hidden" name="idsite" value="{ROW.idsite}" />
	<input type="hidden" name="domainold" value="{ROW.domainold}" />
	<input type="hidden" name="save" value="1" />
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.cid}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="cid">
				<option value=""> --- </option>
				<!-- BEGIN: select_cid -->
				<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
				<!-- END: select_cid -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.domaintype}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="domaintype" {DISABLE}>
				<!-- BEGIN: domaintype -->
				<option value="{DOMAINTYPE.key}" {DOMAINTYPE.selected}>{DOMAINTYPE.title}</option>
				<!-- END: domaintype -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.domain}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="domain" value="{ROW.domain}"  required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" {DISABLE}/> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.site_dir}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="site_dir" value="{ROW.site_dir}"  required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" {DISABLE}/> 
		</div>
	</div>
	<!-- BEGIN: subdomain -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.subdomain}</strong></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control " type="text" name="subdomain" value="{ROW.subdomain}"  /> 
		</div>
	</div>
	<!-- END: subdomain -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.maintain}</strong> <span class="red">(*)</span></label>
                <label class="col-sm-6 col-md-6 control-label" style="text-align:left"> <input class="form-control" type="checkbox" name="not_extend" value="1" onchange="changeExtend(this)">{LANG.unlimited}</label>
		<div id="div_extend" class="col-sm-13 col-md-14">
                    <input id="extend" class="form-control w250" type="text" name="extend" value="{ROW.extend}" style="display:inline-block">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.userid}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="userid" id="adminid" value="{ROW.userid}" required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" />
			<input class="btn btn-default" type="button" onclick="open_browse_us()" value="{LANG.adminsl}">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.sample}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="sample">
				<option value=""> --- </option>
				<!-- BEGIN: select_sample -->
				<option value="{SAMPLE.key}" {SAMPLE.selected}>{SAMPLE.title}</option>
				<!-- END: select_sample -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>EMAIL</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="email" value="{ROW.email}"  required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" {DISABLE}/> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.authors}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="username_show" value="{ROW.username}" disabled="disabled"/>
			<input class="form-control" type="hidden" name="username" value="{ROW.username}" />
		</div>
	</div>
	<!-- BEGIN: password -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.password}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="password" name="password" value="{ROW.password}" {DISABLE}/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.repassword}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="password" name="repassword" value="{ROW.repassword}" {DISABLE}/>
		</div>
	</div>
	<!-- END: password -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.allowuserreg}</strong> </label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="checkbox" name="allowuserreg" value="1" {ROW.checked}/>
		</div>
	</div>
	
</form>
<div class="form-group" style="text-align: center"  ><button type="submit" name="button" value="save" id="button">Save</button></div>
</div></div><div id="status_create_site"></div>
<script>
    function open_browse_us() {
        nv_open_browse('{NV_BASE_ADMINURL}index.php?' + nv_name_variable + '=users&' + nv_fc_variable + '=getuserid&area=adminid&return=userid&filtersql={FILTERSQL}', 'NVImg', 850, 500, 'resizable=no,scrollbars=no,toolbar=no,location=no,status=no');
    }
</script>
 <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var submitButton$;
	$("#extend").datepicker({
        showOn : "both",
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
        buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
        buttonImageOnly : true,
        yearRange: "-99:+0",
        beforeShow: function() {
            setTimeout(function(){
                $('.ui-datepicker').css('z-index', 999999999);
            }, 0);
        }
    });
	$("#sitecreate").validate({
        rules: {
            cid: "required",
            domaintype: "required",
            domain: {
                required: true,
                minlength: 3
            },
            sample: "required",
            email: "required",
            password: "required"
        },
        messages: {
            cid: "Vui lòng nhập họ",
            domaintype: "Vui lòng nhập tên",
            domain: {
                required: "Vui lòng nhập địa chỉ",
                minlength: "Địa chỉ ngắn vậy, chém gió ah?"
            },
            sample: "Vui lòng chọn dữ liệu mẫu",
            email: "Vui lòng nhập địa chỉ email",
            password: "Vui lòng nhập mật khẩu"
        }
    });
    $(document).on('click', ":submit", function (e)
    {
    	 $("#status_create_site").html('');
        // you may choose to remove disabled from all buttons first here.
        submitButton$ = $(this);
        $('#button').html('loading....');
		
         $.ajax({
	        url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=add_site',
	        type: 'post',
	        dataType: 'json',
	        data: $('form#sitecreate').serialize(),
	        success: function(data) {
				if(data.result == 'OKE'){
					if(data.status > 0){
						var csid = data.status;
						$.ajax({
							url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=create_config',
							type: 'post',
							dataType: 'json',
							data: $('form#sitecreate').serialize()+'&csid=' + csid,
							success: function(data) {
								if(data.result == 'OKE'){
									$("#status_create_site").append(data.status);
									$.ajax({
										url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=create_database',
										type: 'post',
										dataType: 'json',
										data: $('form#sitecreate').serialize()+'&csid=' + csid,
										success: function(data) {
											if(data.result == 'OKE'){
												$("#status_create_site").append(data.status);
												$.ajax({
													url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=insert_database',							type: 'post',
													dataType: 'json',
													data: $('form#sitecreate').serialize()+'&csid=' + csid,
													success: function(data) {
														if(data.result == 'OKE'){
															$("#status_create_site").append(data.status);
															$.ajax({
																url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=add_admin',
																type: 'post',
																dataType: 'json',
																data: $('form#sitecreate').serialize()+'&csid=' + csid,
																success: function(data) {
																	if(data.result == 'OKE'){
																		$("#status_create_site").append(data.status);
																		$.ajax({
																			url: '{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&action=add_domain',
																			type: 'post',
																			dataType: 'json',
																			data: $('form#sitecreate').serialize()+'&csid=' + csid,
																			success: function(data) {
																				if(data.result == 'OKE'){
																					$("#status_create_site").append(data.status);
																					alert('Khởi tạo site thành công. Nhấn oke để chuyển sang trang quản trị site');
																					window.location.href=data.domain;
																				}else{
																					$("#status_create_site").append('Có lỗi xảy ra khi tạo cơ sở dữ liệu  website');
																				}
																			}
																		});
																	}else{
																		$("#status_create_site").append('Có lỗi xảy ra khi tạo cơ sở dữ liệu  website');
																	}
																}
															});
														}else{
															$("#status_create_site").append('Có lỗi xảy ra khi tạo cơ sở dữ liệu  website');
														}
													}
												});
											}else{
												$("#status_create_site").append('Có lỗi xảy ra khi tạo cơ sở dữ liệu  website');
											}
										}
									});
								}else{
									$("#status_create_site").append('Có lỗi xảy ra khi tạo cấu hình  website');
								}
							}
						});
						
					}else{
						$("#status_create_site").append(data.status);
					}
				}else{
					alert('Có lỗi xảy ra khi thêm website');
				}
			}
		});
    });
    $(document).on('submit', "form", function(e)
    {
        var form$ = $(this);
        var hiddenButton$ = $('#button', form$);
        if (IsNull(hiddenButton$))
        {
            // add the hidden to the form as needed
            hiddenButton$ = $('<input>')
                .attr({ type: 'hidden', id: 'button', name: 'button' })
                .appendTo(form$);
        }
        hiddenButton$.attr('value', submitButton$.attr('value'));
        submitButton$.attr("disabled", "disabled");
    });
   

   
});

	 function IsNull(obj)
	{
	    var is;
	    if (obj instanceof jQuery)
	        is = obj.length <= 0;
	    else
	        is = obj === null || typeof obj === 'undefined' || obj == "";
	
	    return is;
	}
</script>
<!-- END: add -->
<!-- END: main -->