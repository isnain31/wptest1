<?php
function cleanblogg_load_scripts()
{
    wp_enqueue_style('cleanblogg_library', get_template_directory_uri() . '/css/library.css');/* CSS Library */	
    wp_enqueue_style('cleanblogg_css', get_template_directory_uri() . '/style.css');/* CSS Main */
	if (function_exists('is_woocommerce')):
	wp_enqueue_style( 'cleanblogg_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	endif;
	require get_template_directory() . '/inc/custom-css.php';		
	wp_enqueue_style('cleanblogg_responsive', get_template_directory_uri() . '/css/responsive.css');/* Responsive CSS*/	
    wp_enqueue_script('jquery');/* jQuery script */
	wp_enqueue_script('cleanblogg_bootstrap_script', get_template_directory_uri() . '/js/library.min.js', array(), '3.3.5', true);/* Script Library*/
	wp_enqueue_style( 'Font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' ); /*Font-awesome*/
	 if ( is_singular() ): wp_enqueue_script( "comment-reply" ); endif; 
}
add_action('wp_enqueue_scripts', 'cleanblogg_load_scripts');

// Custom Js
function cleanblog_localize_scripts(){
            wp_register_script('cleanblog-custom-js',get_template_directory_uri() . '/js/custom.js',array(),'120938200', false);
     if(get_theme_mod( 'cleanblog_slider_auto' ) == 'false'){
		 $slider_auto = false;
		 }   
	else{
		$slider_auto = true;
		}
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
	load_theme_textdomain( 'cleanblog-pro', get_template_directory() . '/languages'); 
	
	// This theme uses wp_nav_menu()
	register_nav_menu( 'primary', __( 'Primary Menu',  'cleanblog-pro' ) );
	
	//Thumbnails
	add_theme_support('post-thumbnails');
	
	// Post thumbnails
	add_image_size( 'cleanblogg-full-thumb', $max_content_width, 0, true );
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

function cleanblog_pro_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'cleanblog_pro_theme_updater' );	