<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Minimal
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); 
$the_minimal_ed_social = get_theme_mod('the_minimal_ed_social');
?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">
	
    <header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        
        <div class="header-top">
            <div class="container">
            	
                <?php if( has_nav_menu( 'secondary' ) ){ ?>
                    <div class="navbar-header">
                        <div id="mobile-header">
                            <a id="responsive-menu-button" href="#sidr-main">
                                <span></span>
                                <span></span>
                                <span></span>  
                            </a>
                        </div>
                    </div>
                    
                    <nav id="secondary-navigation" class="secondary-navigation" role="navigation">
                    <?php 
                        $arg = array( 
                            'theme_location'    => 'secondary', 
                            'menu_id'           => 'top-menu', 
                            'menu_class'        => 'top-menu',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'fallback_cb'       => '' 
                        );
                        wp_nav_menu( $arg ); 
                    ?>
                    </nav><!-- #secondary-navigation -->
                <?php } ?>
                
            	<div class="right-section">
            		<?php if( $the_minimal_ed_social ) do_action( 'the_minimal_social' );?>
            		<div class="search-section">
                        <?php get_search_form(); ?>
                    </div>
            	</div>
            </div>
        </div><!-- .header-top -->
        
        <div class="header-bottom">
            <div class="container">
                
                <div class="site-branding" itemscope itemtype="http://schema.org/Organization">
                    <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        the_custom_logo();
                    }
                    ?>
                    <?php if ( is_front_page() ) : ?>
                        <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; 
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) { ?>
				        <p class="site-description" itemprop="description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    }
                    ?>
                </div><!-- .site-branding -->
                
                <div id="mobile-header2">
                    <a id="responsive-menu-button2" href="#sidr-main">
                        <span></span>
                        <span></span>
                        <span></span>  
                    </a>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
                </nav>
            </div>
        </div><!-- .header-bottom -->
    
	</header><!-- #masthead -->
    
    <?php 
        if( is_front_page() ){
            $the_minimal_ed_slider = get_theme_mod( 'the_minimal_ed_slider' );
            
            if( $the_minimal_ed_slider ) do_action( 'the_minimal_slider' );
        }    
    ?>

	<div id="content" class="site-content">
        <div class="container">
            <?php 
            if( is_page() ){
                global $post;
                if( get_post_meta( $post->ID, 'the_minimal_sidebar_layout', true ) ){
                    $sidebar_layout = get_post_meta( $post->ID, 'the_minimal_sidebar_layout', true );
                }else{
                    $sidebar_layout = 'right-sidebar';
                }
                if( is_active_sidebar( 'right-sidebar' ) && $sidebar_layout == 'right-sidebar' ){
                    echo '<div class="row"><div class="col-md-8">';
                }
            }elseif( is_active_sidebar( 'right-sidebar' ) ){ 
                echo '<div class="row"><div class="col-md-8">';            
            } 
            ?>