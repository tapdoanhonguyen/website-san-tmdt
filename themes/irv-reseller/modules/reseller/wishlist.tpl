<!-- BEGIN: main -->

<div class="col-8 mr-auto" id="all">
	<h4 class="pb-3 fs_20">Sản phẩm yêu thích</h4>
	
	<!-- BEGIN: no_data -->
		Chưa có sản phẩm nào được yêu thích.
	<!-- END: no_data -->
	
	<div class="bg_white p-3 rounded">
	
	<!-- BEGIN: loop -->
	<div class="row align-items-center mb-2 border-bottom">
		<div class="col-md-9 d-flex align-items-center ">
			<a title="{product.name_product}" href="{product.alias}" class="mr-2 " target="_blank"><img src="{product.image}" class="width_50" style="object-fit: contain;" alt=""></a>
			
			<a title="{product.name_product}" href="{product.alias}" target="_blank">{product.name_product}</a>
		</div>
		<div class="col-md-3 text-right"><span class="text_gray_color">Tổng lượt thích </span> <span class="secondary_text">{product.number_like}</span></div>
	</div>
	<!-- END: loop -->
		
	</div>
	
	<div class="clear"></div>
	<!-- BEGIN: generate_page -->
	<nav class="text-center">
		{NV_GENERATE_PAGE}
	</nav>
	<!-- END: generate_page -->
</div>			
<!-- END: main -->

