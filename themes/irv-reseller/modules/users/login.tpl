<!-- BEGIN: main --> 
  <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-md-6 p-5">
                <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/banhang/images/banhang.png" class="img-fluid" alt="logo">
				
				<div class="text-center"> 
					<a target="_blank" href="http://online.gov.vn/(X(1)S(d1ii5qwwonekuimxngzmrywz))/Home/WebDetails/82924?AspxAutoDetectCookieSupport=1"><img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/banhang/images/logoCCDV.png" class="img-fluid" style="width:150px; height:56px" alt="logo"></a>
				</div>
            </div>
            <div class="col-md-6 p-5 bg_white shadow">
                <div class="fs_24 text-center mb-4">Đăng nhập Kênh Người Bán</div>
                <form id="login_form">
                    <div class="contact-result"></div>
                    <div class="input-group  border rounded-lg p-1 mb-30 input_ecng">
                        <div class="input-group-prepend border-0 width_32">
                            <button id="button-addon4" type="button" class="btn btn-link secondary_text " disabled><i class="fa fa-user-circle-o" aria-hidden="true"></i></button>
                        </div>
                        <div class="input_error">
                            <input type="text" aria-describedby="button-addon4" class="form-control bg-none border-0  " name="nv_login" placeholder="Tên đăng nhập" required>
                        </div>
                    </div>
                    <div class="input-group mb-30 border align-items-center rounded-lg p-1 mb-30 input_ecng">
                        <div class="input-group-prepend border-0">
                            <button id="button-addon4" type="button" class="btn btn-link secondary_text "disabled><i class="fa fa-lock" aria-hidden="true"></i></button>
                        </div>
                        <div class="input_error">
                            <input type="password" id="myInput_password" placeholder="Mật khẩu" name="nv_password" aria-describedby="button-addon4" class="form-control bg-none border-0  ">
                        </div>
						<div class="px-1"><i onclick="Show_password()" class="fa fa-eye fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                    <div class="d-flex justify-content-between ">
                        <a href="{USER_LOSTPASS}" class="secondary_text ml-2 mb-30 inline-block forgotpass" >Quên mật khẩu ?</a>
                        <a href="{REGISTER}" class="secondary_text ml-2 mb-30 inline-block forgotpass">Đăng ký</a>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn_ecng">Đăng nhập</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
	
	<script>
function Show_password() {
  var x = document.getElementById("myInput_password");
  var y = document.querySelector(".fa.fa-eye")
  if (x.type === "password") {
    x.type = "text";
	y.classList.remove("fa-eye-slash");
  } else {
    x.type = "password";
	y.classList.add("fa-eye-slash");
  }
}
</script>

<!-- END: main -->
