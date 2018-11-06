<?php
function cleanblogg_load_scripts()
{
    wp_enqueue_style('cleanblogg_library', get_template_directory_uri() . '/css/library.css');/* CSS Library */	
    wp_enqueue_style('cleanblogg_css', get_template_directory_uri() . '/style.css');/* CSS Main */
		$content_width = (int)get_theme_mod('cleanblog_content_width',1100);
	$logo_width = (int)get_theme_mod('cleanblog_logo_width','250');
	$cleanblog_logo_top = (int)get_theme_mod('cleanblog_logo_top',50);
	$cleanblog_logo_bottom = (int)get_theme_mod('cleanblog_logo_bottom',50);
	$cleanblog_tagline_margin = (int)get_theme_mod('cleanblog_tagline_margin',5);
	$cleanblog_custom_css = get_theme_mod('cleanblog_custom_css');
	$cleanblog_slider_type = get_theme_mod( 'cleanblog_slider_type', 'default');
	if (!empty($content_width) && $content_width <= 1200 && $content_width >= 800):
	$content_width = $content_width;	
	else:
	$content_width = 1100;	
	endif;
	$cleanblogg_header_img = get_header_image();
$custom_css = "
     .cb-logo .cb-site-title a{
		display:inline-block;
		}
	.cb-header .cb-logo{
		margin-top:{$cleanblog_logo_top}px;
		margin-bottom:{$cleanblog_logo_bottom}px;
		}
	.container-fluid, #cb-main.cb-box-layout {
		max-width: {$content_width}px;
		}
	.cb-logo .cb-site-title a img{ 
	width:{$logo_width}px!important;
	display: inline-block; 
	}
	header.cb-header .cb-logo .cb-tagline{
	margin-top:{$cleanblog_tagline_margin}px;	
		}
		@media only screen and (max-width:1199px){
	.cb-header-style3 .cb-header .cb-top-ad{
		margin-bottom:{$cleanblog_logo_bottom}px;
		}
}
	";
	if ( get_header_image() ) : 
$custom_css .= "
 .cb-header{
	background-image: url({$cleanblogg_header_img});
	background-repeat: no-repeat;
background-position: center;
background-size: cover;
	}
";
else:
$custom_css .= "
.cb-header .container-fluid.cb-logo-container{
	background-color: rgba(255,255,255,1);
	}
";
endif;
/*Custom CSS*/
$cleanblog_custom_css = wp_filter_nohtml_kses ( $cleanblog_custom_css );
if ( ! empty( $custom_css ) ) {
  $custom_css .= $cleanblog_custom_css;
}
    wp_add_inline_style( 'cleanblogg_css', $custom_css );
	wp_enqueue_style('cleanblogg_responsive', get_template_directory_uri() . '/css/responsive.css');/* Responsive CSS*/
	wp_enqueue_style( 'source_sans_font', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700');/* Fonts */
	wp_enqueue_style( 'montserrat_font', '//fonts.googleapis.com/css?family=Montserrat:400,700');/* Fonts */
	wp_enqueue_style( 'Open_Sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,600italic,700,700italic,800,800italic');/* Fonts */
	wp_enqueue_style( 'Font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' ); /*Font-awesome*/
	if (function_exists('is_woocommerce')):
	wp_enqueue_style( 'cleanblogg_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	endif;	
    wp_enqueue_script('jquery');/* jQuery script */
    wp_enqueue_script('cleanblogg_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.5', true);/* Bootstrap script */
    wp_enqueue_script('cleanblogg_bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array(), '4.1.2', true);/* Bxslider script */
	if (($cleanblog_slider_type == "carousel") || ($cleanblog_slider_type == "carousel2") || ($cleanblog_slider_type == "modern_carousel")) :
	wp_enqueue_script('cleanblogg_owl', get_template_directory_uri() . '/js/owl.carousel.js', array(), '2.2.1', true);/* Owl Carousal script */
	endif;
	 if ( is_singular() ): wp_enqueue_script( "comment-reply" ); endif; 
}
add_action('wp_enqueue_scripts', 'cleanblogg_load_scripts');

// Custom Js
function cleanblog_localize_scripts(){
            wp_register_script('cleanblog-custom-js',get_template_directory_uri() . '/js/custom.js',array(),'120938200', false);
    
	$slider_type = get_theme_mod( 'cleanblog_slider_type', 'default');    
	$slider_auto =  (bool)get_theme_mod( 'cleanblog_slider_auto',true);
    $slider_mode =  esc_html( get_theme_mod( 'cleanblog_slider_mode', 'horizontal') );
    $slider_speed = (int)get_theme_mod( 'cleanblog_slider_speed', '1000');
    $slider_pause = (int)get_theme_mod( 'cleanblog_slider_pause', '5000');              
    $slider_controls = (bool)get_theme_mod( 'cleanblog_slider_controls',true);            
        $data = array (
                'slider_options' => array (
                        'auto'  => $slider_auto,
                        'mode'  => $slider_mode,
                        'speed' => $slider_speed,
                        'pause' => $slider_pause,
						'controls' => $slider_controls,
						'type' => $slider_type,
                ),              
        );
        wp_localize_script( 'cleanblog-custom-js', 'cleanblogVars', $data );
                
        wp_enqueue_script( 'cleanblog-custom-js' );
    }
add_action('wp_enqueue_scripts', 'cleanblog_localize_scripts');

function cleanblogg_setup()
{
	$max_content_width = (int)get_theme_mod('cleanblog_content_width',1100);
    global $content_width;
    if (!isset($content_width)) { $content_width = $max_content_width; }

	//Make theme available for translation.
	load_theme_textdomain( 'cleanblogg', get_template_directory() . '/languages'); 
	
	// This theme uses wp_nav_menu()
	register_nav_menu( 'primary', __( 'Primary Menu',  'cleanblogg' ) );
	
	//Post Formats
	add_theme_support( 'post-formats', array( 
        'video', 
        'gallery', 
        'audio', 
        'quote' 
    ) );
	
	//Thumbnails
	add_theme_support('post-thumbnails');
	
	// Post thumbnails
	add_image_size( 'cleanblogg-full-thumb', 1050, 0, true );
	add_image_size( 'cleanblogg-medium-thumb',820, 530, true );
	add_image_size( 'cleanblogg-grid-thumb', 400, 270, true );
	add_image_size( 'cleanblogg-list-thumb',300, 220, true );
	add_image_size( 'cleanblogg-mini-thumb',100, 80, true );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "title-tag" ); 
	
	//Theme customizer options
	require get_template_directory() . '/inc/customize.php';
	
	//Theme Widgets
	require get_template_directory() . '/inc/widgets.php';
	
	//Theme Functions
	require get_template_directory() . '/inc/theme-functions.php';	
	
	// Woocommerce Functions
	if (function_exists('is_woocommerce')):
	require get_template_directory() . '/inc/woocommerce.php';
	endif;
}
add_action('after_setup_theme', 'cleanblogg_setup');