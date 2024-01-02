<!-- BEGIN: main -->
<div class="tms_home_info"> {TITLEBID}</div>
<div class="tms_home_info_line"></div>
<div class="clear"></div>
<div class="wraper_quytrinh_homtext">{HOMETEXT}</div>	
<div class="clear"></div>			
<div class="carousel">
	<div class="owl-carousel owl-theme " id="quytrinh">
		<!-- BEGIN: loop -->
		<div id="tms_quytrinh">
		<div class="tms_quytrinh_img"><img alt="{ROW.interview}" src="{ROW.image}"title="{ROW.interview}"/></div>
		<div class="tms_quytrinh_number">{ROW.title}</div>
		<div class="tms_quytrinh_title">{ROW.description}</div>
    	</div>
		<!-- END: loop -->
	</div>
</div>



<script type="text/javascript">

$(document).ready(function() {
  $('#quytrinh').owlCarousel({
	//loop: true,
	margin: 20,
	responsiveClass: true,
	autoplay:false,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
	responsive: {
	  0: {
		items: 1,
		//loop: true,
		//nav: true
	  },
	  430: {
		items: 2,
		//loop: true,
		//nav: false
	  },
	  600: {
		items: 2,
		//loop: true,
		//nav: false
	  },
	  800: {
		items: 3,
		//loop: true,
		//nav: false
	  },
	  1000: {
		items: 5,
		//nav: true,
		//loop: true,
		//margin: 20
	  }
	}
  })
  
})

</script>


<!-- END: main -->