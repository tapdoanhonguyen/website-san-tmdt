<!-- BEGIN: submenu -->
<div id="collapseExample2" class="collapse text_collapse show">

        <ul class="nav flex-column pl-1">
			<!-- BEGIN: loop -->
            <li class="nav-item">
                 <!-- BEGIN: icon --> <img src="{SUBMENU.icon}" />&nbsp; <!-- END: icon --> <a class="nav-link ml-4 {product}" href="{SUBMENU.link}">{SUBMENU.title_trim}</a>
				 <!-- BEGIN: item --> {SUB} <!-- END: item -->
            </li>
			<!-- END: loop -->
        </ul>
    </div>



<!-- END: submenu -->

<!-- BEGIN: main -->

<nav class="seller_menu mt-3">
	<!-- BEGIN: top_menu -->
    <div data-toggle="collapse" href="#collapseExample1" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{TOP_MENU.icon}" /> {TOP_MENU.title_trim}
				<!-- BEGIN: has_sub --> 
                <i
                class="fa fa-angle-down"></i>
                <!-- END: has_sub -->
				</p>
    </div>
    <!-- BEGIN: sub --> 
            {SUB} 
    <!-- END: sub -->
	<!-- END: top_menu -->
    
</nav>
<!-- END: main -->
<!-- Quản lý sản phẩm  -->
    <div data-toggle="collapse" href="#collapseExample2" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_menu2.svg" /> Quản lý sản phẩm<i
                class="fa fa-angle-down"></i></p>
    </div>
    

    <!-- Quản lý media  
	<div data-toggle="collapse" class="with-chevron">
		<a  href="{MEDIA}" target="blank"> 
			<p class="d-flex align-items-center mb-0 px-3 py-2 "style="cursor:pointer">
				<img class="pr-2" src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/perm_media.svg"/>
				Thư viện ảnh
			</p>
		</a>
	</div>
	-->
    <!-- Tài chính  -->
    <div data-toggle="collapse" href="#collapseExample3" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_menu3.svg" /> Tài chính<i class="fa fa-angle-down"></i>
        </p>
    </div>
    <div id="collapseExample3" class="collapse text_collapse show">
        <ul class="nav flex-column pl-2">
            <li class="nav-item">
                <a class="nav-link ml-4 {auditing}" href="{DOISOAT}">Đối soát</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 {doanhthu}" href="{DOANHTHU}">Doanh thu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="{DEVELOP}">Thanh toán</a>
            </li>
        </ul>
    </div>
    <!-- Quản lý thành viên  -->
    <div data-toggle="collapse" href="#collapseExample4" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_menu4.svg" /> Quản lý thành viên<i
                class="fa fa-angle-down"></i></p>
    </div>
    <div id="collapseExample4" class="collapse text_collapse show">
        <ul class="nav flex-column pl-2">
            <li class="nav-item">
                <a class="nav-link ml-4" href="{DEVELOP}">Danh sách thành viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="{DEVELOP}">Cấu hình thành viên</a>
            </li>
        </ul>
    </div>
    <!-- Quản lý shop  -->
    <div data-toggle="collapse" href="#collapseExample5" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_menu6.svg" /> Quản lý shop<i class="fa fa-angle-down"></i>
        </p>
    </div>
    <div id="collapseExample5" class="collapse text_collapse show">
        <ul class="nav flex-column pl-2">
            <li class="nav-item">
                <a class="nav-link ml-4 {infoshop}" href="{INFOSHOP}">Hồ sơ shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 {wishlist}" href="{WISHLIST}">Sản phẩm được yêu thích</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 {voucher}" href="{VOUCHER}">Mã giảm giá</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 {promotion}" href="{PROMOTION}">Cấu hình sản phẩm khuyến mãi</a>
            </li>
        </ul>
    </div>
    <!-- Thiết lập shop  -->
    <div data-toggle="collapse" href="#collapseExample6" aria-expanded="true" class="with-chevron">
        <p class="d-flex align-items-center mb-0 px-3 py-2"><img class="pr-2"
                src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_menu7.svg" /> Thiết lập shop<i
                class="fa fa-angle-down"></i></p>
    </div>
    <div id="collapseExample6" class="collapse text_collapse show">
        <ul class="nav flex-column pl-2">
            <li class="nav-item">
                <a class="nav-link ml-4 {transporters}" href="{TRANSPORTERS}">Cấu hình vận chuyển</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 {warehouse}" href="{WAREHOSE}">Quản lý kho hàng</a>
            </li>

        </ul>
    </div>





<div class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-site-default">
            <span class="sr-only">&nbsp;</span> 
            <span class="icon-bar">&nbsp;</span> 
            <span class="icon-bar">&nbsp;</span> 
            <span class="icon-bar">&nbsp;</span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="menu-site-default">
        <ul class="nav navbar-nav">
         <!-- BEGIN: top_menu -->
         <li {TOP_MENU.current} role="presentation">
            <a class="dropdown-toggle" {TOP_MENU.dropdown_data_toggle} href="{TOP_MENU.link}" role="button" aria-expanded="false" title="{TOP_MENU.note}"{TOP_MENU.target}> 
                {TOP_MENU.title_trim}
                
            </a> 
            <!-- BEGIN: sub --> 
            {SUB} 
            <!-- END: sub -->
        </li>
        <!-- END: top_menu -->
    </ul>
</div>
</div>
<script type="text/javascript" data-show="after">
    $(function() {
        checkWidthMenu();
        $(window).resize(checkWidthMenu);
    });
</script>