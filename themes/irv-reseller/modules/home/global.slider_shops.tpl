<!-- BEGIN: main -->

<div class="carousel">
	<div  id="owl-slidershops" class="owl-carousel">
	
<!-- BEGIN: loop -->
		<div><a href="{ROW.link}"><img src="{ROW.image}" alt="{ROW.title}" title="{ROW.title}"/></a></div>
   <!-- END: loop -->  
</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
  $('#owl-slidershops').owlCarousel({
	//loop: true,
	margin: 0,
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
		items: 1,
		//loop: true,
		//nav: true
	  }
	}
  })
  
})

</script>
<!-- END: main -->