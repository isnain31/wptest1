(function($) {
  "use strict";
  $(document).ready(function(){
		  $(".cb-top-search-btn").click(function(){
				  $('.cb-top-search-form').toggle();
		  });
		   $('.cb-slider ul').bxSlider({
				  auto: cleanblogVars.slider_options.auto,
				  mode: cleanblogVars.slider_options.mode,
				  speed: cleanblogVars.slider_options.speed,
				  pause: cleanblogVars.slider_options.pause, 
				  easing:'ease-in-out',
				  autoControls: false,
				  controls: cleanblogVars.slider_options.controls,
				  pager: cleanblogVars.slider_options.controls,		
		  });
		  $('.cb-metro-slider ul').bxSlider({
				  auto: cleanblogVars.slider_options.auto,
				  mode: cleanblogVars.slider_options.mode,
				  speed: cleanblogVars.slider_options.speed,
				  pause: cleanblogVars.slider_options.pause, 
				  easing:'ease-in-out',
				  autoControls: false,
				  controls: cleanblogVars.slider_options.controls,
				  pager: cleanblogVars.slider_options.controls,		
		  });
		  if ((cleanblogVars.slider_options.type == "carousel") || (cleanblogVars.slider_options.type == "carousel2") || (cleanblogVars.slider_options.type == "modern_carousel")){
		  $('.owl-carousel.cb-carousel').owlCarousel({
				  loop:true,
				  margin:10,
				  nav:cleanblogVars.slider_options.controls,
				  autoplay: cleanblogVars.slider_options.auto,
				  autoplayTimeout: cleanblogVars.slider_options.pause,
				  smartSpeed: cleanblogVars.slider_options.speed, 
				  navText: [' ',' '],
				  responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  },
					  992:{
						  items:3
					  }
				  }
			  });
			  $('.owl-carousel.cb-modern-carousel').owlCarousel({
				  loop:true,
				  margin:10,
				  center: true,
				  items:3,
				  nav:cleanblogVars.slider_options.controls,
				  autoplay: cleanblogVars.slider_options.auto,
				  autoplayTimeout: cleanblogVars.slider_options.pause,
				  smartSpeed: cleanblogVars.slider_options.speed, 
				  navText: [' ',' '],
				  responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  },
					  992:{
						  items:2
					  }
				  }
			  });
		  $('.owl-carousel.cb-carousel2').owlCarousel({
				  loop:true,
				  margin:10,
				  nav:cleanblogVars.slider_options.controls,
				  autoplay: cleanblogVars.slider_options.auto,
				  autoplayTimeout: cleanblogVars.slider_options.pause,
				  smartSpeed: cleanblogVars.slider_options.speed, 
				  navText: [' ',' '],
				  responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  }
				  }
			  });
		  }
		  $('.widget-nav-tabs a').click(function (e) {
				  e.preventDefault();
				  $(this).tab('show');
		  });
		  $('iframe[src*="youtube.com"],iframe[src*="player.vimeo.com"] ').each(function() {
        		 $(this).wrap('<div class="video-wrapper"></div>');
    	  }); 
		  $('.cb-menu-toggle').click( function(e) {
				  e.preventDefault();
				  $(this).toggleClass('cb-open-menu');
				  $('body').toggleClass('mobile-menu-open');
				  $('.cb-nav ul.menu').toggleClass('cb-show-menu');
				  $("html, body").animate({ scrollTop: 0 }, 1000);
		  });
		  
  });
  })(jQuery);