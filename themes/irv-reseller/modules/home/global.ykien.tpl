<!-- BEGIN: main -->
<div class="tms_block_home">{BLOCK_TITLE}</div>
<div class="tms_block_home_text">{BLOCK_HOME_TEXT}</div>
<div class="tms_block_home_line"></div>

<div class="carousel">
	<div class="owl-carousel owl-theme " id="tms_review">
		<!-- BEGIN: loop -->
       	<div class="item">
			   <div class="tms_review_text">
			    <div class="tms_review_title">{ROW.title}</div>
                {ROW.description}
               </div> 
		
		</div> 
		<!-- END: loop -->
	</div>
</div>


<script type="text/javascript">

$(document).ready(function() {
  $('#tms_review').owlCarousel({
	//loop: true,
	margin: 20,
	responsiveClass: true,
	autoplay:true,
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
	  }
	}
  })
  
})

</script>
<!-- END: main -->