<!-- BEGIN: main -->
<div class="tms_slider">
		<div class="swiper-container" id="tms_slider_left">
    <div class="swiper-wrapper">

			
			<!-- BEGIN: loop -->
			<div div class="swiper-slide">
				<a href="{ROW.link}" title="{ROW.title}">
					<img src="{ROW.image}" alt="{ROW.title}" title="{ROW.title}"/>
				</a>
			</div>
			<!-- END: loop -->  
		</div>
	</div>
</div>

 <script>
    var swiper = new Swiper('#tms_slider_left', {
	  spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
<!-- END: main -->