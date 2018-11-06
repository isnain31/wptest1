<?php 
	$sticky_topbar = get_theme_mod( 'cleanblog_sticky_topbar', 'off');
	$show_tagline = get_theme_mod( 'cleanblog_show_tagline', 'show');
	$cleanblog_header_cart_icon = get_theme_mod( 'cleanblog_header_cart_icon', 'show');
	$cleanblog_social_in_header = get_theme_mod( 'cleanblog_social_in_header', 'show');
	$cleanblog_show_search = get_theme_mod( 'cleanblog_show_search','show');
?>
<header class="cb-header<?php if($sticky_topbar=='on'){echo ' cb-header5-sticky';}?>">
  <div class="container-fluid">
    <div class="cb-logo">
      <div class="cb-logo-inner">
        <?php if ( is_home()): ?>
        <h1 class="cb-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php if (get_theme_mod( 'cleanblog_logo' )!= "" ){ ?>
          <img src="<?php echo get_theme_mod( 'cleanblog_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
          <?php } else {?>
          <?php bloginfo('name'); ?>
          <?php } ?>
          </a></h1>
        <?php if($show_tagline == 'show'):?>
        <h2 class="cb-tagline">
          <?php bloginfo('description'); ?>
        </h2>
        <?php endif;?>
        <?php else:?>
        <h2 class="cb-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php if (get_theme_mod( 'cleanblog_logo' )!= "" ){ ?>
          <img src="<?php echo get_theme_mod( 'cleanblog_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
          <?php } else {?>
          <?php bloginfo('name'); ?>
          <?php } ?>
          </a></h2>
        <?php if($show_tagline == 'show'):?>
        <h3 class="cb-tagline">
          <?php bloginfo('description'); ?>
        </h3>
        <?php endif;?>
        <?php endif;?>
      </div>
      <div class="cb-menu-toggle"> <i class="fa fa-bars"></i><i class="fa fa-times"></i> </div>
      <div class="clearfix"></div>
    </div>
   <div class="cb-table">
   <div class="cb-cell">
    <div class="cb-bottom-nav">
      <?php if ( has_nav_menu( 'primary' ) ):  
                              $menuargs = array(
                              'theme_location'  => 'primary',
                              'menu'            => 'primary',
                              'container'       => 'nav',
                              'container_class' => 'cb-nav',
                              'menu_class'      => 'menu'
                              );
                              wp_nav_menu( $menuargs );
                          endif;
                    ?>
    </div>
    <div class="cb-header-icon">
      <?php 
					if(($cleanblog_header_cart_icon != 'hide') && (function_exists('is_woocommerce'))):
					echo cleanblogg_header_cart_item(); 
					endif;
					?>
      <?php if ($cleanblog_show_search != "hide" ): ?>
      <div class="cb-inline-header-search">
      <div class="cb-top-search-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
      <div class="cb-top-search">
        <?php get_search_form(); ?>
      </div>
      </div>
      <?php  endif; ?>
      <!-- Header Social -->
      <?php if ($cleanblog_social_in_header != "hide" ): ?>
      <div class="cb-top-social">
        <?php cleanblog_social(); ?>
      </div>
      <?php endif; ?>
      <!-- Header Social --> 
    </div>
    </div>
    </div>
    <!-- top bar --> 
  </div>
</header>
<?php if($sticky_topbar=='on'): ?><div class="header-for-sticky"></div><?php endif; ?>
<!-- header -->

<?php /*?>            <div class="container-fluid cb-logo-container">
                <div class="cb-logo">
                <?php if ( is_home()): ?>
                    <h1 class="cb-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if (get_theme_mod( 'cleanblog_logo' )!= "" ){ ?><img src="<?php echo get_theme_mod( 'cleanblog_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"><?php } else {?><?php bloginfo('name'); ?><?php } ?></a></h1>
                    <?php if($show_tagline == 'show'):?><h2 class="cb-tagline"><?php bloginfo('description'); ?></h2><?php endif;?>
                <?php else:?>
                <h2 class="cb-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if (get_theme_mod( 'cleanblog_logo' )!= "" ){ ?><img src="<?php echo get_theme_mod( 'cleanblog_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"><?php } else {?><?php bloginfo('name'); ?><?php } ?></a></h2>
                <?php if($show_tagline == 'show'):?><h3 class="cb-tagline"><?php bloginfo('description'); ?></h3><?php endif;?>
                <?php endif;?>
                </div>
            </div>
            <div class="cb-header-bottom-bar cb-top-bar">
                <div class="container-fluid">
                    <div class="cb-menu-toggle">
                    <i class="fa fa-bars"></i><i class="fa fa-times"></i>
                    </div>
					<?php if ( has_nav_menu( 'primary' ) ):  
                              $menuargs = array(
                              'theme_location'  => 'primary',
                              'menu'            => 'primary',
                              'container'       => 'nav',
                              'container_class' => 'cb-nav',
                              'menu_class'      => 'menu'
                              );
                              wp_nav_menu( $menuargs );
                          endif;
                    ?>
                    <?php 
					if(($cleanblog_header_cart_icon != 'hide') && (function_exists('is_woocommerce'))):
					echo cleanblogg_header_cart_item(); 
					endif;
					?>
            		<?php if (get_theme_mod( 'cleanblog_show_search')!= "hide" ): ?>
                        <div class="cb-top-search-btn">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="cb-top-search-form">
                            <?php get_search_form(); ?>
                        </div><?php  endif; ?> <!-- Header Social -->
						<?php
						if (get_theme_mod( 'cleanblog_social_in_header')!= "hide" ): ?>
                        <div class="cb-top-social">
                        <?php cleanblog_social(); ?>
                        </div>
						<?php endif; ?> <!-- Header Social -->
            
				</div>
			</div><!-- Bottom bar --><?php */?>
