

<!-- BEGIN: theme_type -->
<div class="theme-change" style="text-align:center;padding:20px">
	<!-- BEGIN: loop -->
	<!-- BEGIN: other -->
	<a href="{STHEME_TYPE}" rel="nofollow" title="{STHEME_INFO}"><i class="fa fa-{STHEME_ICON}"></i></a>
	<!-- END: other -->
	<!-- BEGIN: current -->
	<span title="{LANG.theme_type_select}: {STHEME_TITLE}"><i class="fa fa-{STHEME_ICON}"></i></span>
	<!-- END: current -->
	<!-- END: loop -->
</div>
<!-- END: theme_type -->

<div  id="notifi_screen">
		<div class="modal-content" id="modal_content" style="border: 0;background: rgb(51 51 51 / 90%);">
			<div class="modal-body text-center text_white  p-4" style=" border-radius:2px">
				<img src="{NV_SITE_BASEURL}/themes/{TEMPLATE}/images/tick.png" alt="" class="img-fluid">
				<div class="notifi_screen mt-2 ">
				</div>
			</div>
		</div>
</div>


<div class="modal fade" id="exampleModalCenter" style="opacity: 1;background:rgb(128,128,128,0.6)" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content border-0">
			<div class="modal-body" style="display: flex;align-items: center;">
				<img src="{NV_SITE_BASEURL}/themes/{TEMPLATE}/images/tick.png" alt="" class="img-fluid" style="width: 100px;height: 100px;">
				
			<span class="notifi_register pl-3"></span></div>
		</div>
	</div>
</div>


<div id="loading_modal" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
	<div class="modal-dialog-loading" role="document">
		<div class="modal-content-loading">
			<div class="modal-body-loading text-center">
				<div class="spinner-border text-primary"></div>
			</div>
		</div>
	</div>
</div>




