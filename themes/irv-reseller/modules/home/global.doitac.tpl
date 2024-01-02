<!-- BEGIN: main -->
<div class="clearfix"></div>

<div class="carousel">
	<div  id="owl-doitac" class="owl-carousel">
		<!-- BEGIN: loop -->
		<div class="tms_doitac_body">
<img src="{ROW.image}" style="text-align:center" alt="{ROW.title}"/>
		</div>
		<!-- END: loop-->
		
	</div>
</div>
<script type="text/javascript">

$(document).ready(function() {
  $('#owl-doitac').owlCarousel({
	//loop: true,
	margin: 20,
	responsiveClass: true,
	autoplay:true,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
	dots : false,
	nav : false,
	navText: [ "<i class=\"fa fa-chevron-left\"></i>",
             "<i class=\"fa fa-chevron-right\"></i>" ],
	 
	responsive: {
	  0: {
		items: 2,
		//loop: true,
		//nav: true
	  },
	  430: {
		items: 3,
		//loop: true,
		//nav: false
	  },
	  600: {
		items: 4,
		//loop: true,
		//nav: false
	  },
	  800: {
		items: 5,
		//loop: true,
		//nav: false
	  },
	  1000: {
		items: 6,
		//nav: true,
		//loop: true,
		//margin: 20
	  }
	}
  })
  
})

</script>

		
<!-- END: main -->