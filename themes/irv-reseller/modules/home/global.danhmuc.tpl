<!-- BEGIN: main -->
<div class="tms_block_home">{BLOCK_TITLE}</div>
<div class="tms_block_home_text">{BLOCK_HOME_TEXT}</div>
<div class="tms_block_home_line"></div>

<div class="carousel">
	<div  id="owl-danhmuc" class="owl-carousel">
<!-- BEGIN: loop -->
<div class="tms_khoahoc_list">
	<div class="tms_khoahoc_list_img">
                <a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.image}" alt="{ROW.title}" title="{ROW.title}" ></a>
            <div id="tms_khoahoc_title"><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></div>	 
			  </div>
		
        </div>
<!-- END: loop -->
  </div> 
  </div>


	<script type="text/javascript">

$(document).ready(function() {
  $('#owl-danhmuc').owlCarousel({
	//loop: true,
	margin: 10,
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
		items: 3,
		//nav: true,
		//loop: true,
		//margin: 20
	  }
	}
  })
  
})

</script>

<!-- END: main -->