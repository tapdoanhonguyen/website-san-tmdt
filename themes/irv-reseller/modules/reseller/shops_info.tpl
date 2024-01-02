<!-- BEGIN: main -->
<!-- BEGIN: info_shop -->
<div id="shops_info">
   <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8 nopd">
      <div class="box_info_shop" style="background-image: url({VIEW.cover_image});background-position: center;background-size: cover;background-repeat: no-repeat;">
        <div class="flex">
         <div class="avata_shop">
          <img src="{VIEW.avatar_image}">
        </div>
        <div class="name_shop_box">
          <span>
            {VIEW.company_name}
          </span>
        </div>
      </div>

      <div class="extention_info_shop">
        <div class="infoShop-body ml-1">
          <a id="follow_shop" class="btn btn-success" onclick="follow({VIEW.id})">
            {FOLLOW}
          </a>
          <input type="number" name="check" value="{CHECK}" hidden="">
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 other_infomation">
    <div class="col-xs-24 col-sm-24 col-md-12 col-lg-12">
      <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
        <div class="row_other_info_shop">
          <span>
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
          </span>
          <span class="span_first">
            Sản phẩm:
          </span>
          <span class="span_second">
            {TOTAL_PRODUCT}
          </span>
        </div>
      </div>
      <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
        <div class="row_other_info_shop">
          <span>
            <i class="fa fa-user-plus" aria-hidden="true"></i>
          </span>
          <span class="span_first">
            Người theo dõi
          </span>
          <span class="span_second">
            {VIEW.follow}
          </span>
        </div>
      </div>
      <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
        <div class="row_other_info_shop">
          <span>
            <i class="fa fa-user-plus" aria-hidden="true"></i>
          </span>
          <span class="span_first">
           Đang theo dõi
         </span>
         <span class="span_second">
           {VIEW.following}
         </span>
       </div>
     </div>
   </div>
   <div class="col-xs-24 col-sm-24 col-md-12 col-lg-12">
    <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
      <div class="row_other_info_shop">
        <span>
          <i class="fa fa-clock-o" aria-hidden="true"></i>
        </span>
        <span class="span_first">
         Thời gian tham gia
       </span>
       <span class="span_second">
        {VIEW.time_add}
      </span>
    </div>
  </div>
  <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
    <div class="row_other_info_shop">
      <span>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </span>
      <span class="span_first">
        Đánh giá
      </span>
      <span class="span_second">
       {VIEW.star} ({VIEW.number_rate} đánh giá)
      </span>
    </div>
  </div>
  <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
    <div class="row_other_info_shop">
      <span class="span_first">
       Thông tin chưa bổ sung
     </span>
     <span class="span_second">

     </span>
   </div>
 </div>
</div>
</div>
</div>



<div id="shops_info_banner">
  <div class="col-xs-24 col-sm-24 col-md-12 col-lg-12">
    <div  id="shops_info_banner_intro" class="swiper-container">
    <div class="swiper-wrapper">
      <!-- BEGIN: image_banner -->
	  	<div div class="swiper-slide">
      <img src="{IMG_BANNER}" alt="{VIEW.company_name}" title="{VIEW.company_name}"/>
	   </div>
      <!-- END: image_banner -->  
    </div>
	</div>
	
	 <script>
    var swiper = new Swiper('#shops_info_banner_intro', {
	  spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
	
  </div>
  <div class="col-xs-24 col-sm-24 col-md-12 col-lg-12">
    <div class="description_shop">
      <h2 style="color: #ee4d2d;">
        {VIEW.company_name}
      </h2>
      <div>
        {VIEW.description_shop}
      </div>
    </div>
  </div>
</div>

<!-- END: info_shop -->

    <!-- BEGIN: category -->
	<div id="main_product">
		<div class="main_product_cat_title">
		<h2><a href="{LOOP_CAT.alias}" title="{LOOP_CAT.title}"> {LOOP_CAT.title}</a></h2>
		<a class="link_product_more" href="{LOOP_CAT.alias}" title="{LOOP_CAT.title}">Xem Thêm <i class="fa fa-caret-right" aria-hidden="true"></i></a>
		</div>
		
		
		
  
    <div class="productList">
      <div class="swiper-container" id="tms_shops_cat">
		<div class="swiper-wrapper">
        <!-- BEGIN: product -->
        <div div class="swiper-slide">
          <div class="product-hover">         
            <div class="ProductImage lazyload">
              <a href="{LOOP_PRODUCT.alias}" title="{LOOP_PRODUCT.name_product}">
                <img class="lazy" src="{LOOP_PRODUCT.image}" alt="{LOOP_PRODUCT.name_product}">
              </a>
            </div>
            <div class="ProductPrice">
              <div class="ProductDetails">
                <a href="{LOOP_PRODUCT.alias}" title="{LOOP_PRODUCT.name_product}">{LOOP_PRODUCT.name_product}</a>
              </div>        
              <!-- BEGIN: one_price -->
              <div class="money">
                {PRICE}
              </div>
              <!-- END: one_price -->
              <!-- BEGIN: min_max_price -->
              <div class="money">
                {PRICE_MIN}
              </div>
              <div class="money">
                -
              </div>
              <div class="money">
                {PRICE_MAX}
              </div>
              <!-- END: min_max_price -->
              <!-- BEGIN: none_price -->
              <div class="money">
                Giá Liên Hệ
              </div>
              <!-- END: none_price -->
              <p class="wish_ed_in_home_1">
                <i class="fa fa-eye"></i> 
                {LOOP_PRODUCT.number_view}  
                <button style="padding: 0px;background: none; border: none;" onclick="wishlist({LOOP_PRODUCT.id})" title="Yêu thích">
                  <i id="like_icon_{LOOP_PRODUCT.id}" class="fa fa-heart {LOOP_PRODUCT.color_wishlist}"></i>
                  <input hidden="" type="" name="check_wishlist_{LOOP_PRODUCT.id}" value="{LOOP_PRODUCT.check_wishlist}">
                  <input hidden="" type="" name="check_number_like_{LOOP_PRODUCT.id}" value="{LOOP_PRODUCT.like_number}">
                </button>
                
                <span id="quantity_like_{LOOP_PRODUCT.id}">
                  {LOOP_PRODUCT.like_number}
                </span>
                <i class="fa fa-shopping-bag"></i>
                {LOOP_PRODUCT.number_order}
              </p>
            </div>
          </div>
         
          
        </div>
        <!-- END: product -->
      </div>   
	  </div>   
	  </div>
    </div>


    <!-- END: category -->



  <script>
	var swiper = new Swiper('#tms_shops_cat', {
		slidesPerColumn: 1,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},

		breakpoints: {
			5000: {
				slidesPerView: 4,
				slidesPerGroup: 4,
			},
			2000: {
				slidesPerView: 5,
				slidesPerGroup: 1,
			},
			1024: {

				slidesPerView: 5,
				slidesPerGroup: 1,
			},
			768: {

				slidesPerView: 3,
				slidesPerGroup: 1,
			},
			640: {

				slidesPerView: 2,
				slidesPerGroup: 1,
			},
			450: {
				slidesPerView: 1,
				slidesPerGroup: 1,

			}
		},
	});
</script>


<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="load_category_shop">

  </div>
  <div class="col-xs-20 col-sm-20 col-md-20 col-lg-20 nopd">
    <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">

    </div>
    <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24" id="load_product_shop_category">

    </div>
  </div>
</div>
<script type="text/javascript">
  $.ajax({
    type : 'POST',
    url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=load_category_shop&shop_id={SHOP_ID}',
    success : function(res){
      res2=JSON.parse(res);
      if(res2.status=="OK"){
        $('#load_category_shop').html(res2.text)
      }else{
        alert("có lỗi xảy ra!, vui lòng kiểm tra lại!");
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
  });

  function follow(id){
    var check = $("input[name=check]").val();
    if(check==0){
     $.ajax({
      type : 'POST',
      url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=viewcatshops&mod=follow&id=' + id,
      success : function(res){
       res2=JSON.parse(res);
       if(res2.status=="OK"){
        $('#follow_shop').html('Bỏ theo dõi');
        $("input[name=check]").val(1);
      }else{
        alert("có lỗi xảy ra!, vui lòng kiểm tra lại!");
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
   }
 }); 
   }else if(check==1){
     $.ajax({
      type : 'POST',
      url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=viewcatshops&mod=no_follow&id=' + id,
      success : function(res){
       res2=JSON.parse(res);
       if(res2.status=="OK"){
        $('#follow_shop').html('Theo dõi shop');
        $("input[name=check]").val(0);
      }else{
        alert("có lỗi xảy ra!, vui lòng kiểm tra lại!");
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
   }
 }); 
   }else{
     alert("Bạn vui lòng đăng nhập đê thực hiện chức năng này!")
   }
 }



</script>
<script type="text/javascript">
  $(document).ready(function(){$('#slider_banner_shop').owlCarousel({loop:!0,margin:10,responsiveClass:!0,autoplay:!0,autoplayTimeout:40000,autoplayHoverPause:!0,dots:!1,nav:!0,navText:["<i class=\"fa fa-chevron-left\"></i>","<i class=\"fa fa-chevron-right\"></i>"],responsive:{0:{items:1,loop:!0,nav:!0},900: {items: 1,loop: true,nav: true}}})})
</script>
<!-- END: main -->