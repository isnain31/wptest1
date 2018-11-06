jQuery(document).ready(function ($) {
    
    /** Variables from Customizer for Slider settings */
    var slider_auto, slider_loop, slider_control, slider_thumb;
    
    if( the_minimal_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( the_minimal_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( the_minimal_data.control == '1' ){
        slider_control = true;
    }else{
        slider_control = false;
    }
    
    if( the_minimal_data.thumbnail == '1' ){
        slider_thumb = "thumbnails";
    }else{
        slider_thumb = false;
    }
    
    if( the_minimal_data.mode == 'slide' ){
        var animation = '';
    }else{
        var animation = 'fadeOut';
    }
    console.log( animation );
    /** Home Page Slider */
    $('.flexslider .slides').owlCarousel({
        items           : 1,
        autoplay        : slider_auto,
        loop            : slider_loop,
        nav             : slider_control,
        animateOut      : animation,
        dots            : false,
        thumbs          : true,
        thumbImage      : true,
        thumbContainerClass     : 'owl-thumbs',
        thumbItemClass  : 'owl-thumb-item',
        smartSpeed      : the_minimal_data.speed,
    });

    $('#responsive-menu-button2').sidr({
        name: 'sidr-main2',
        source: '#site-navigation',
        side: 'right'
    });

    $('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#secondary-navigation',
        side: 'right'
    });
        
});