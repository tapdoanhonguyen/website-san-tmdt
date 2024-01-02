<header class="primary_bg">
	<div class="container">
		<div class="row">
			<div class="col-2  pb-1">
				<div class="row align-items-center">
					<div class="col-8 col-md-9">
						<div class="logo">
							<a title="{SITE_NAME}" href="{THEME_SITE_HREF}">
								<img class="img-fluid" src="{LOGO_SRC}" alt="{SITE_NAME}">
							</a>
						</div>
					</div>
					<div class="col-4 col-md-3 ">
						[CATEGORY]
					</div>
				</div>
			</div>
			
			<div class="col-10 pb-1">
				<div class="row pt-1">
					<div class="col-md-12">
						<div class="header_top pt-1">
							<ul class="nav justify-content-end header_top_menu">
								<li class="nav-item header_notifi pr-2">
									[NOTIFICATION]
								</li>
								<li class="nav-item pl-3">
									[MENU]
								</li>
								[LOGIN]
								
							</ul>
						</div>
					</div>
				</div>
				
				<!-- header top  -->
				<div class="row mt-2 d-flex align-items-center">
					[SEARCH]
					<div class="col-md-2 text-center">
						[CART]
					</div>
				</div>
			</div>
		</div>
		<!-- top header  -->
		<!-- container  -->
	</div>
</header>
<!-- header  -->
<section class=" text-center category shadow-sm">
			<div class="container">
				[CATEGORY_LV1]
			</div>
</section>
<div class="container">
	<!-- BEGIN: breadcrumbs -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item ">
				<a href="{THEME_SITE_HREF}" title="Trang chủ" class="secondary_text">Trang chủ</a> 
			</li>
			<!-- BEGIN: loop -->
			<li class="breadcrumb-item active">
				<svg width="10" height="10" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.408325 15.775L1.88333 17.25L10.1333 9L1.88333 0.75L0.408325 2.225L7.18332 9L0.408325 15.775Z" fill="#ADADAD"></path>
				</svg>
				<a href="{BREADCRUMBS.link}" title="{BREADCRUMBS.title}"><span class="txt">{BREADCRUMBS.title}</span></a>
			</li>
			<!-- END: loop -->
		</ol>
	</nav>
	<!-- END: breadcrumbs -->
<script>
	$(document).ready(function(){
		$('.breadcrumb .breadcrumb-item a').eq(3).removeAttr("href");
	});
	
</script>