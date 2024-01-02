<!-- BEGIN: main -->
<div id="ProductContent"class="productList" >	
	<div class="row mt-3">
		<!-- BEGIN: product -->
		<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
			<div class="product-hover">					
				<div class="ProductImage lazyload">
					<a href="{LOOP_PRODUCT.alias}" title="{LOOP_PRODUCT.name_product}">
						<img class="lazy" src="{LOOP_PRODUCT.image}" alt="{LOOP_PRODUCT.name_product}" style="height: 200px; object-fit: cover">
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
	<!-- BEGIN: generate_page -->
	<div class="text-center">
		{NV_GENERATE_PAGE}
	</div>
	<!-- END: generate_page -->
</div>
</div>
</div>
<!-- END: main -->
