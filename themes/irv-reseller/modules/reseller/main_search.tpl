<!-- BEGIN: main -->
<div class="row">
	<!-- BEGIN: shop -->
	<div class="suggest_title">
		Shop liên quan đến {KEY_WORD}
		<a href="{LINK_MORE_SHOP}">
			Xem thêm
		</a>
	</div>
	<!-- BEGIN: loop -->
	<div class="item_shop col-xs-24 col-sm-24 col-md-24 col-lg-24">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="item_shop_img">
				<a href="{SHOP.alias}" title="{SHOP.company_name}">
					<img src="{SHOP.image}" alt="{SHOP.company_name}" title="{SHOP.company_name}">
				</a>
			</div>
			<div class="item_shop_content1">
				<h2>
					<a href="{SHOP.alias}" title="{SHOP.company_name}">
						{SHOP.company_name}
					</a>
				</h2>
				<p>
					<span>
						{SHOP.follow} theo dõi,
					</span>
					<span>
						{SHOP.following} đang theo
					</span>
				</p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="item_shop_content2">
				<div class="text-center">
					{SHOP.number_product}
				</div>
				<div class="text-center">
					Sản phẩm
				</div>
			</div>
			<div class="item_shop_content2">
				<div class="text-center">
					Tham gia
				</div>
				<div class="text-center">
					{SHOP.time_add}
				</div>
			</div>
		</div>
	</div>
	<!-- END: loop -->
	<!-- END: shop -->
</div>

<!-- BEGIN: key_word_product -->
<div class="suggest_title">
	Sản phẩm liên quan đến {KEY_WORD}
</div>
<!-- END: key_word_product -->
<div class="container" style="background: #fff">
	<div class="inline_block box_active_search">
		<span>
			Sắp xếp theo:
		</span>
		<span>
			<button type="button" class="btn_small" onclick="seach_category(1,'','','',{PAGE})">
				Phổ biến
			</button>
		</span>
		<span>
			<button type="button" class="btn_small" onclick="seach_category('',1,'','',{PAGE})">
				Mới nhất
			</button>
		</span>
		<span>
			<button type="button" class="btn_small" onclick="seach_category('','',1,'',{PAGE})">
				Bán chạy
			</button>
		</span>
		<span>
			<button type="button" class="btn_small" onclick="seach_category('','','',1,{PAGE})">
				Giá tăng dần
			</button>
		</span>
		<span>
			<button type="button" class="btn_small" onclick="seach_category('','','',2,{PAGE})">
				Giá giảm dần
			</button>
		</span>
	</div>
	<div class="inline_block float_right page_ajax">
		<span style="padding: 5px;">
			{PAGE}/{NUM_PRODUCT}	
		</span>
		
		<button type="button" {DISABLE_PRE} onclick="seach_category('{SORT1}','{SORT2}','{SORT3}','{SORT4}',{PAGE2})">
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</button>
		<button type="button" {DISABLE_NEXT} onclick="seach_category('{SORT1}','{SORT2}','{SORT3}','{SORT4}',{PAGE1})">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
		</button>
	</div>
</div>
<div class="productList" style="margin-top: 0px;">
	
	<div class="row mt-3">
		<!-- BEGIN: loop -->
		<div class="col-xs-24 col-sm-12 col-md-6 col-lg-6 productList__item">
			<div class="product-hover">					
				<div class="ProductImage lazyload">
					<a href="{LOOP_PRODUCT.alias}" title="{LOOP_PRODUCT.name_product}">
						<img class="lazy" src="{LOOP_PRODUCT.image}" alt="{LOOP_PRODUCT.name_product}" style="height: 200px;">
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
		<!-- END: loop -->
	</div>
</div>

<!-- END: main -->