<!-- BEGIN: main -->

<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24 box_require" id="box_require">
    <h2 class="text-center">
        Yêu cầu kích hoạt lại tài khoản
    </h2>
    <div class="div_mg">
        Nhập lý do cần kích hoạt lại tài khoản
    </div>
    <div class="div_mg">
        <textarea name="reason" class="form-control" placeholder="Nhập lý do" rows="3"></textarea>
    </div>
	</br>
    <div class="div_mg text-center">
        <button class="btn btn-success" onclick="require_active()">
            Gửi yêu cầu
        </button>
    </div>
</div>

<script type="text/javascript">
    function require_active(){
        var reason = $("textarea[name=reason]").val();
        if(reason){
            $.ajax({
                type : 'POST',
                url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=require&reason=' + reason,
                success : function(res){
                    res2=JSON.parse(res);
                    if(res2.status=="OK"){
                        alert(res2.text);
                        location.reload();
                    }else{
                        alert('Có lỗi xảy ra, vui lòng liên hệ với quản trị viên để được hỗ trợ');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            }); 
        }else{
            alert('Vui lòng nhập lý do');
        }
    }

    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#review_img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}
$(document).ready( function() {
    $('#select_file').click(function(){
        $("#homeimg").click();
    });
});

$("#homeimg").change(function() {
    $('#review_img').removeClass('hidden');
    readURL(this);
});
</script>


<!-- END: main -->