(function($) {
  "use strict";
  $(document).ready(function(){
		  $(".cb-top-search-btn").click(function(){
				  $('.cb-top-search-form').toggle();
		  });
		  $(".cb-inline-header-search .cb-top-search-icon").click(function(){
				  $('.cb-inline-header-search .cb-top-search').fadeToggle(200);
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
		  $('iframe[src*="youtube.com"],iframe[src*="player.vimeo.com"] ').each(function() {
        		 $(this).wrap('<div class="video-wrapper"></div>');
    	  });
		  $('.widget-nav-tabs a').click(function (e) {
				  e.preventDefault();
				  $(this).tab('show');
		  });
		  $('.cb-menu-toggle').click( function(e) {
				  e.preventDefault();
				  $(this).toggleClass('cb-open-menu');
				  $('body').toggleClass('mobile-menu-open');
				  $('.cb-nav ul.menu').toggleClass('cb-show-menu');
				  $("html, body").animate({ scrollTop: 0 }, 1000);
		  });
		  $('#sidebar .widget_pinterest-pinboard-widget .pinboard .row:first, .cb-footer-widget .widget_pinterest-pinboard-widget .pinboard .row:first').each( function() {
				  var row_length = $(this).children('a').length;
				  if (row_length > 10){
					  var row_length = 10;
					  }
				  var row_class = "image-length-" + row_length;
				  $(this).parent('.pinboard').addClass(row_class);
		  });
		  $('.widget_pinterest-pinboard-widget .pinboard .row a').each(function() {
           var pin_img_width = $(this).width();
		   $(this).css('height',pin_img_width);
        });
		
		var logo_height = $('.cb-header-style5 .cb-logo').height(); 
		$('.cb-header-style5 .cb-header .cb-table').height(logo_height);
  });
  function pin_image_height(){
		$('.widget_pinterest-pinboard-widget .pinboard .row a').each(function() {
           var pin_img_width = $(this).width();
		   $(this).css('height',pin_img_width);
        }); 
		}
  $(window).resize(function(){
		pin_image_height();
		});
  $(window).load(function(){
		pin_image_height();
  });
  
  $(document).ready(function() {
	  var header_height = $('.cb-header.cb-sticky-header-mark').height();
	  var bar_height = $('.cb-header-bottom-bar').height();
	  var header5_height = $('.cb-header-style5 .cb-header5-sticky').outerHeight();
	  var header_top_padding = parseInt($('.cb-header-style5 .cb-header5-sticky').css('padding-top'));
	  $('.header-for-sticky').css('height', header5_height);
    $(window).scroll(function() {
        if ($(document).scrollTop() > header_height + bar_height) {
            $('.cb-sticky-header-mark').addClass('cb-sticky-header');
        }
        else {
            $('.cb-sticky-header-mark').removeClass('cb-sticky-header');
        }
		if ($(window).width() > 960) {
		if ($(document).scrollTop() > $.isNumeric(header_top_padding - 20)) {
            $('.cb-header5-sticky').addClass('cb-sticky-header');
			$('.header-for-sticky').show();
        }
        else {
           $('.cb-header5-sticky').removeClass('cb-sticky-header');
		   $('.header-for-sticky').hide();
        }
		}
    });
});
  })(jQuery);