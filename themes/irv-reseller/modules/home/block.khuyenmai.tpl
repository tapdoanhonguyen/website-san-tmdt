<!-- BEGIN: main -->

<div class="carousel">
	<div class="owl-carousel owl-theme tms1" id="R{RAND}">
		<!-- BEGIN: loop -->
		<div class="tms0" >
			<div><a href="{ROW.link}"> <img class="owl-img" src="{ROW.image}" style="width:20px; height:20px;margin:auto" alt="{ROW.title}"/></a></div>
            <div class="text0"><h3>{ROW.title}</h3>
            <p>{ROW.title_extra}</p></div>
		</div>
		<!-- END: loop -->
	</div>
</div>


<script type="text/javascript">

$(document).ready(function() {
  $('#R{RAND}').owlCarousel({
	loop: true,
	margin: 10,
	responsiveClass: true,
	autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
	dots:false,
	responsive: {
	  0: {
		items: 1,
		//loop: true,
		//nav: true
	  },
	}
  })
  
})

</script>



<!-- END: main -->
