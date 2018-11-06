<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	</head>
    <?php 
	$sticky_topbar = get_theme_mod( 'cleanblog_sticky_topbar', 'off');
	$show_tagline = get_theme_mod( 'cleanblog_show_tagline', 'show');
	$cleanblog_content_layout_type = get_theme_mod( 'cleanblog_content_layout_type', 'wide-layout');
	$cleanblog_header_cart_icon = get_theme_mod( 'cleanblog_header_cart_icon', 'show');
	$cleanblog_header_style = get_theme_mod( 'cleanblog_header_style', 'style1');
	?>
	<body <?php body_class(); ?> >
      <div id="cb-main" class="cb-<?php echo $cleanblog_content_layout_type; ?> cb-header-<?php echo $cleanblog_header_style; ?>">
       <?php if($cleanblog_header_style == 'style1'):?>
        <header class="cb-header<?php if($sticky_topbar=='on'){echo ' cb-sticky-header';}?>">
            <div class="cb-top-bar">
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
            			<?php if (get_theme_mod( 'cleanblog_social_in_header')!= "hide" ): ?>
                            <div class="cb-top-social">
                                <?php cleanblog_social(); ?>
                            </div>
						<?php endif; ?> <!-- Header Social -->
                        
            
				</div>
			</div><!-- top bar -->
            <div class="container-fluid cb-logo-container">
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
		</header><!-- header -->
       <?php else:?> 
       <?php get_template_part('inc/header/layout-'.$cleanblog_header_style); ?>   
        <?php endif; ?>
		<?php if ( is_home()): ?>
		<?php if (get_theme_mod( 'cleanblog_slider_show')!= "hide" ): ?>
        
      	<?php
		
			$post_orderby = get_theme_mod( 'cleanblog_slider_posts', 'date');
			$posts_num = get_theme_mod( 'cleanblog_slider_posts_num', '10');
			$posts_category = get_theme_mod( 'cleanblog_slider_category', '0');
			$posts_custom_ids = get_theme_mod( 'cleanblog_slider_custom_id', '0');
			$slider_type = get_theme_mod( 'cleanblog_slider_type', 'default');
			$slider_date = get_theme_mod( 'cleanblog_slider_date', true);
			
			if($slider_date == false):
			$slider_date_class = 'no-slider-date';
			else:
			$slider_date_class = '';	
			endif;
			$posts_custom_ids_arr = explode(',', $posts_custom_ids);
			if($posts_category == '0'):
				$posts_category = '';
				endif;
			if($post_orderby == 'custom'):	
			$args = array('post_type' => 'post','order'   => 'DESC','post__in' => $posts_custom_ids_arr,'orderby' => 'post__in','posts_per_page' => $posts_num);
			else:
			$args = array('post_type' => 'post','orderby' => $post_orderby,'order'   => 'DESC','posts_per_page' => $posts_num,'cat' => $posts_category);
			endif;	   
			$the_query = new WP_Query( $args ); 
			if ( $the_query->have_posts() ) :
			if ($slider_type === 'modern_carousel'):
			?>
              <section class="cb-carousal-slider <?php echo $slider_type.' '.$slider_date_class; ?>">
                     <div class="owl-carousel cb-modern-carousel owl-theme">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $image_id = get_post_thumbnail_id();
                                    $post_image_url = wp_get_attachment_image_src($image_id,'cleanblogg-medium-thumb', true); ?>
                                  <div class="item">
                                      <div class="cb-slider-block" <?php if (has_post_thumbnail()) :?> style="background-image:url('<?php echo $post_image_url[0]; ?>');"<?php endif; ?>>
                                          <div class="cb-slider-inner">
                                              <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                              <span class="cb-slider-date"><?php echo get_the_date(); ?></span>
                                              <a href="<?php the_permalink(); ?>" class="cb-more"><?php echo __( 'Read More','cleanblogg' ); ?></a>
                                          </div>
                                      </div>
                                  </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                  </div>
          	  </section>
              <?php
            elseif ($slider_type === 'carousel'):
			?>
              <section class="cb-carousal-slider <?php echo $slider_date_class; ?>">
                  <div class="container-fluid">
                     <div class="owl-carousel cb-carousel owl-theme">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $image_id = get_post_thumbnail_id();
                                    $post_image_url = wp_get_attachment_image_src($image_id,'cleanblogg-medium-thumb', true); ?>
                                  <div class="item">
                                      <div class="cb-slider-block" <?php if (has_post_thumbnail()) :?>style="background-image:url('<?php echo $post_image_url[0]; ?>');"<?php endif; ?>>
                                          <div class="cb-slider-inner">
                                              <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                              <span class="cb-slider-date"><?php echo get_the_date(); ?></span>
                                          </div>
                                      </div>
                                  </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
        </div>
                  </div>
          	  </section>
              <?php
           elseif ($slider_type === 'carousel2'):
			?>
              <section class="cb-carousal-slider <?php echo $slider_date_class; ?>">
                  <div class="container-fluid">
                     <div class="owl-carousel cb-carousel2 owl-theme">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $image_id = get_post_thumbnail_id();
                                    $post_image_url = wp_get_attachment_image_src($image_id,'cleanblogg-medium-thumb', true); ?>
                                  <div class="item">
                                      <div class="cb-slider-block" <?php if (has_post_thumbnail()) :?>style="background-image:url('<?php echo $post_image_url[0]; ?>');"<?php endif; ?>>
                                          <div class="cb-slider-inner">
                                              <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                              <span class="cb-slider-date"><?php echo get_the_date(); ?></span>
                                          </div>
                                      </div>
                                  </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
        </div>
                  </div>
          	  </section>
            <?php
           elseif ($slider_type === 'metro'):
			?>
              <section class="cb-metro-slider <?php echo $slider_date_class; ?>">
                  <div class="container-fluid">
                     <ul>
            		<?php
					$i = 0; 
					while ( $the_query->have_posts() ) : $the_query->the_post(); 
							$image_id = get_post_thumbnail_id();
							if(($i % 5)=='0'):
							$post_image_url = wp_get_attachment_image_src($image_id,'cleanblogg-medium-thumb', true); 
							else: 
							$post_image_url = wp_get_attachment_image_src($image_id,'cleanblogg-list-thumb', true);
							endif;
							if(($i % 5)=='0'): echo "<li>"; endif;
                          ?>
                              <div class="cb-metro-block <?php if(($i % 5)=='0'): echo "cb-metro-large"; endif;?>" <?php if (has_post_thumbnail()) :?>style="background-image:url('<?php echo $post_image_url[0]; ?>');"<?php endif; ?>>
                                  <div class="cb-slider-inner">
                                      <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                      <?php if(($i % 5)=='0'):?>
                                      <span class="cb-slider-date"><?php echo get_the_date(); ?></span>
                                      <a href="<?php the_permalink(); ?>" class="cb-more"><?php echo __( 'Read More','cleanblogg' ); ?></a>
                                      <?php endif; ?>
                                  </div>
                              </div>
					<?php 
					if(($i % 5) =='5'): echo "</li>"; endif;
					$i++;
					endwhile; ?>
					<?php wp_reset_postdata(); ?>
        			</ul>
                  </div>
          	  </section>
              
            <?php else: ?>
              <section class="cb-slider <?php echo $slider_date_class; ?>">
                  <div class="container-fluid">
                    <ul>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
							$image_id = get_post_thumbnail_id();
							$post_image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
                          <li>
                              <div class="cb-slider-block" <?php if (has_post_thumbnail()) :?>style="background-image:url('<?php echo $post_image_url[0]; ?>');" <?php endif; ?>>
                                  <div class="cb-slider-inner">
                                      <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                      <span class="cb-slider-date"><?php echo get_the_date(); ?></span>
                                      <a href="<?php the_permalink(); ?>" class="cb-more"><?php echo __( 'Read More','cleanblogg' ); ?></a>
                                  </div>
                              </div>
                            </li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                    </ul>
                  </div>
              </section><!-- slider -->
            <?php endif; ?>  
			<?php endif; ?>
		<?php endif;?>
        <?php endif;?>