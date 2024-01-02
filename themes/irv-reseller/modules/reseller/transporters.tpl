<!-- BEGIN: main -->
<!-- BEGIN: view -->

<div class="content_transporters">
                <div class="setting_shipping bg_white p-4">
                    <div class="row mb-2 fs_16">
                        <div class="col-4">Đơn vị vận chuyển</div>
                        <div class="col-7">Khối lượng, Kích thước tối đa</div>
                        <div class="col-1">Trạng thái</div>
                    </div>
					
					<!-- BEGIN: loop -->
                    <div class="row py-4 border align-items-center mb-3">
                        <div class="col-2">
                            <img src="{VIEW.image}">
                        </div>
                        <div class="col-2 text-center fs_16 font-weight-bold">{VIEW.name_transporters}</div>
						<div class="col-7 d-flex justify-content-between">
                            <span>Khối lượng: {VIEW.max_weight}gram</span>
                            <span>Chiều dài: {VIEW.max_length}cm</span>
                            <span>Chiều rộng: {VIEW.max_width}cm</span>
                            <span>Chiều cao: {VIEW.max_height}cm</span>

                        </div>
						
                        <div class="col-1 text-center">
                            <label class="ecng_label_checkbox">
                                <input type="checkbox" name="status" id="change_status_{VIEW.id}" value="{VIEW.id}" {CHECK} onclick="nv_change_status({VIEW.id});">
                                <span class="ecng_checkmark"></span>
                              </label>
                        </div>
                    </div>
                     <!-- END: loop -->
                </div>
				
				 <div class="text-center" colspan="10">{NV_GENERATE_PAGE}</div>
</div>
			
<!-- END: view -->


<script type="text/javascript">

    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=transporters&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
                var r_split = res.split('_');
                if (r_split[0] != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
					location.reload();
                }
            });
        }
        else{
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }

</script>

<!-- END: main -->