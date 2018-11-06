<?php
function cleanblog_widgets()
{
    register_sidebar(array(
        'name' => __('Main Sidebar', 'cleanblog-pro'),
        'id' => 'cb-sidebar-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1', 'cleanblog-pro'),
        'id' => 'cb-footer-widget1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
	register_sidebar(array(
        'name' => __('Footer 2', 'cleanblog-pro'),
        'id' => 'cb-footer-widget2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
	register_sidebar(array(
        'name' => __('Footer 3', 'cleanblog-pro'),
        'id' => 'cb-footer-widget3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
	register_sidebar(array(
        'name' => __('Instagram/Pinterest Footer', 'cleanblog-pro'),
        'id' => 'cb-instagram-footer',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
	register_sidebar(array(
        'name' => __('Shop Sidebar', 'cleanblog-pro'),
        'id' => 'cb-woo-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'cleanblog_widgets');

////////////////////////////////////////////////////////////////////////////
// Social Icons Widget
////////////////////////////////////////////////////////////////////////////

class cleanblogg_Social_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cleanblogg_social_widget',
            __( 'ClanBlogg: Social Icons', 'cleanblog-pro' ),
            array(
                'classname'   => 'cleanblogg_social_widget',
                'description' => __( 'A widget that displays social icons.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {    
        extract( $args );
        $cleanblogg_social_title      = apply_filters( 'widget_title', $instance['cleanblogg_social_title'] );
		$cleanblogg_socialw_rss      = $instance['cleanblogg_socialw_rss'];
        echo $before_widget;
        if ( $cleanblogg_social_title ) {
            echo $before_title . $cleanblogg_social_title . $after_title;
        } ?>
        <div class="cb-widget-social">
        <?php cleanblog_social(); ?>
            </div>
       <?php
        echo $after_widget; 
    }
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cleanblogg_social_title'] = strip_tags( $new_instance['cleanblogg_social_title'] );
		$instance['cleanblogg_socialw_rss'] = strip_tags( $new_instance['cleanblogg_socialw_rss'] );
        return $instance;
    }
	
	public function form( $instance ) {    
     $defaults = array( 'cleanblogg_social_title' => __( 'Follow Us', 'cleanblog-pro' ), 'cleanblogg_socialw_rss' => false);
		$instance = wp_parse_args( (array) $instance, $defaults );
        $cleanblogg_social_title      = esc_attr( $instance['cleanblogg_social_title'] );
        $cleanblogg_socialw_rss      = esc_attr( $instance['cleanblogg_socialw_rss'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('cleanblogg_social_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cleanblogg_social_title'); ?>" name="<?php echo $this->get_field_name('cleanblogg_social_title'); ?>" type="text" value="<?php echo $cleanblogg_social_title; ?>" />
        </p>
		<p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cleanblogg_socialw_rss' ); ?>" name="<?php echo $this->get_field_name( 'cleanblogg_socialw_rss' ); ?>" <?php checked( (bool) $instance['cleanblogg_socialw_rss'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cleanblogg_socialw_rss' ); ?>"><?php _e('Hide RSS Icon','cleanblog-pro')?></label>
		</p>
        <p><strong><?php _e('Note:','cleanblog-pro')?></strong> <?php _e('Set your social links in the','cleanblog-pro')?> <br /><?php _e('Appearance &#187; Customize &#187; Social Links.','cleanblog-pro')?></p>
    <?php 
    }   
}
add_action( 'widgets_init', function(){
     register_widget( 'cleanblogg_Social_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// Posts Widget
////////////////////////////////////////////////////////////////////////////

class cleanblogg_Posts_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cleanblogg_posts_widget',
            __( 'ClanBlogg: Posts List', 'cleanblog-pro' ),
            array(
                'classname'   => 'cleanblogg_posts_widget',
                'description' => __( 'A widget that displays recent posts, popular posts & random posts.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {    
        extract( $args );
        $cleanblogg_posts_title      = apply_filters( 'widget_title', $instance['cleanblogg_posts_title'] );
        $cleanblogg_posts_number    = $instance['cleanblogg_posts_number'];
       	$cleanblogg_posts_order 	 = esc_attr($instance['cleanblogg_posts_order']); 
		$cleanblogg_posts_thumb 	 = esc_attr($instance['cleanblogg_posts_thumb']); 
		$cleanblogg_posts_category 	 = esc_attr($instance['cleanblogg_posts_category']); 
        echo $before_widget;
        if ( $cleanblogg_posts_title ) {
            echo $before_title . $cleanblogg_posts_title . $after_title;
        }
		$args = array(
		'post_type' => 'post',
		'order' => 'DESC',
		'orderby' => $cleanblogg_posts_order,
		'cat' => $cleanblogg_posts_category,
		'posts_per_page' => $cleanblogg_posts_number
		);		
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ): ?>
			<ul class="cb-posts-list">
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<li> 
				<?php if ( has_post_thumbnail() && ($cleanblogg_posts_thumb != true )) : ?>
				<div class="widget-post-media">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("cleanblogg-mini-thumb"); ?></a>
				</div>
				<?php endif; ?>
				<div class="widget-post-content">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?> </a>
				<span><?php the_time(); ?></span>
				</div>
				</li>
				<?php } ?>
			</ul>
		
			<?php
		else: 
			_e('No Posts Found','cleanblog-pro');
		endif;
wp_reset_postdata();
        echo $after_widget;    
    }
	
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cleanblogg_posts_title'] = strip_tags( $new_instance['cleanblogg_posts_title'] );
        $instance['cleanblogg_posts_number'] = strip_tags( $new_instance['cleanblogg_posts_number'] );
        $instance['cleanblogg_posts_order'] = strip_tags( $new_instance['cleanblogg_posts_order'] );
		$instance['cleanblogg_posts_thumb'] = strip_tags( $new_instance['cleanblogg_posts_thumb'] ); 
		$instance['cleanblogg_posts_category'] = strip_tags( $new_instance['cleanblogg_posts_category'] ); 
        return $instance;
    }
	public function form( $instance ) {    
     	$defaults = array( 'cleanblogg_posts_title' => __('Recent Posts','cleanblog-pro'),'cleanblogg_posts_number' => '5','cleanblogg_posts_order' => 'date','cleanblogg_posts_thumb' => false, 'cleanblogg_posts_category' => 'all' ); 
		$instance = wp_parse_args( (array) $instance, $defaults );
        $cleanblogg_posts_title      = esc_attr( $instance['cleanblogg_posts_title'] );
        $cleanblogg_posts_number    = esc_attr( $instance['cleanblogg_posts_number'] );
		$cleanblogg_posts_order 	 = esc_attr($instance['cleanblogg_posts_order']);
		$cleanblogg_posts_thumb 	 = esc_attr($instance['cleanblogg_posts_thumb']);
		$cleanblogg_posts_category 	 = esc_attr($instance['cleanblogg_posts_category']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('cleanblogg_posts_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cleanblogg_posts_title'); ?>" name="<?php echo $this->get_field_name('cleanblogg_posts_title'); ?>" type="text" value="<?php echo $cleanblogg_posts_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cleanblogg_posts_number'); ?>"><?php _e('Number of posts to show:','cleanblog-pro'); ?></label> 
            <input id="<?php echo $this->get_field_id('cleanblogg_posts_number'); ?>" name="<?php echo $this->get_field_name('cleanblogg_posts_number'); ?>" type="text" size="3" value="<?php echo $cleanblogg_posts_number; ?>" />
        </p>
     	<p>
    		<label for="<?php echo $this->get_field_id('cleanblogg_posts_order'); ?>"><?php _e('Select Order:','cleanblog-pro'); ?></label> 
    		<select class="widefat" id="<?php echo $this->get_field_id('cleanblogg_posts_order'); ?>" name="<?php echo $this->get_field_name('cleanblogg_posts_order'); ?>" type="text">
        		<option value="date" <?php selected($instance['cleanblogg_posts_order'], 'date'); ?>><?php _e('Most Recent','cleanblog-pro');?></option>
        		<option value="comment_count" <?php selected($instance['cleanblogg_posts_order'], 'comment_count');?>><?php _e('Popular','cleanblog-pro');?></option>
        		<option value="rand" <?php selected($instance['cleanblogg_posts_order'], 'rand');?>><?php _e('Random','cleanblog-pro');?></option>
    		</select>
		</p>
    	<p>
    		<label for="<?php echo $this->get_field_id('cleanblogg_posts_category'); ?>"><?php _e('Select Category:','cleanblog-pro'); ?></label>
    			<select id="<?php echo $this->get_field_id('cleanblogg_posts_category'); ?>" name="<?php echo $this->get_field_name('cleanblogg_posts_category'); ?>" class="widefat">
    				<option value="all" <?php selected($instance['cleanblogg_posts_category'], 'all');?>><?php _e('All Categories','cleanblog-pro');?></option>
            <?php foreach(get_terms('category','hide_empty=0&depth=1&type=post') as $term) { ?>
            		<option <?php selected( $instance['cleanblogg_posts_category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
            <?php } ?>      
        		</select>
		</p>
    	<p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cleanblogg_posts_thumb' ); ?>" name="<?php echo $this->get_field_name( 'cleanblogg_posts_thumb' ); ?>" <?php checked( (bool) $instance['cleanblogg_posts_thumb'], true ); ?> />
        	<label for="<?php echo $this->get_field_id( 'cleanblogg_posts_thumb' ); ?>"><?php _e('Hide Thumbnails','cleanblog-pro');?></label>
    	</p>
    <?php 
    } 
}
add_action( 'widgets_init', function(){
     register_widget( 'cleanblogg_Posts_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// Posts Tab Widget
////////////////////////////////////////////////////////////////////////////

class cleanblogg_Posts_Tab_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cleanblogg_posts_tab_widget',
            __( 'ClanBlogg: Posts Tab', 'cleanblog-pro' ),
            array(
                'classname'   => 'cleanblogg_posts_tab_widget',
                'description' => __( 'A widget that displays recent posts & popular posts as tabs.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {    
        extract( $args );
        $cleanblogg_tab_title      = apply_filters( 'widget_title', $instance['cleanblogg_tab_title'] );
        $cleanblogg_tab_number    = $instance['cleanblogg_tab_number']; 
		$cleanblogg_tab_thumbs 	 = esc_attr($instance['cleanblogg_tab_thumbs']); 
		$cleanblogg_tab_category 	 = esc_attr($instance['cleanblogg_tab_category']); 
		$cleanblogg_tab_active 	 = esc_attr($instance['cleanblogg_tab_active']); 
        echo $before_widget;
        if ( $cleanblogg_tab_title ) {
            echo $before_title . $cleanblogg_tab_title . $after_title;
        }
?>

        <ul class="widget-nav-tabs" role="tablist">
          <li role="presentation" class="<?php if($cleanblogg_tab_active == 'recent' ){ echo 'active'; }?>"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab"><?php _e('Recent Posts','cleanblog-pro') ?></a></li>
          <li class="<?php if($cleanblogg_tab_active == 'popular' ){ echo 'active'; }?>" role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab"><?php _e('Popular Posts','cleanblog-pro') ?></a></li>
        </ul>

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade <?php if($cleanblogg_tab_active == 'in recent' ){ echo 'active'; } if($cleanblogg_tab_active == 'recent'){echo 'active in';}?>" id="recent">
              <?php $args = array(
      			'post_type' => 'post',
      			'order' => 'DESC',
      			'cat' => $cleanblogg_tab_category,
      			'orderby' => 'date',
      			'posts_per_page' => $cleanblogg_tab_number
      			);		
      			$the_query = new WP_Query( $args );
      			if ( $the_query->have_posts() ): ?>
                <ul class="cleanblogg-posts-list">
                <?php
                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                        <li> 
                        <?php if ( has_post_thumbnail() && ($cleanblogg_tab_thumbs != true )) : ?>
                        <div class="widget-post-media">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("cleanblogg-mini-thumb"); ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="widget-post-content">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?> </a>
                        <span><?php the_time(); ?></span>
                        </div>
                        </li>
                    <?php } ?>
                </ul>
          <?php else:
          _e('No Posts Found','cleanblog-pro');
          	endif;
      		wp_reset_postdata(); ?>
          </div>
          <div role="tabpanel" class="tab-pane fade <?php if($cleanblogg_tab_active == 'popular' ){ echo 'in active'; }?>" id="popular">
          <?php $args = array(
      'post_type' => 'post',
      'order' => 'DESC',
      'cat' => $cleanblogg_tab_category,
      'orderby' => 'comment_count',
      'posts_per_page' => $cleanblogg_tab_number
      );		
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ): ?>
          <ul class="cleanblogg-posts-list">
          <?php
          while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
              <li> 
              <?php if ( has_post_thumbnail() && ($cleanblogg_tab_thumbs != true )) : ?>
              <div class="widget-post-media">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("cleanblogg-mini-thumb"); ?></a>
              </div>
              <?php endif; ?>
              <div class="widget-post-content">
              <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?> </a>
              <span><?php the_time(); ?></span>
              </div>
              </li>
              <?php } ?>
          </ul>
          <?php else:
          _e('No Posts Found','cleanblog-pro');
          endif;
      		wp_reset_postdata(); ?>
          </div>
        </div>

    <?php
        echo $after_widget;
    }
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cleanblogg_tab_title'] = strip_tags( $new_instance['cleanblogg_tab_title'] );
        $instance['cleanblogg_tab_number'] = strip_tags( $new_instance['cleanblogg_tab_number'] ); 
		$instance['cleanblogg_tab_thumbs'] = strip_tags( $new_instance['cleanblogg_tab_thumbs'] );
		$instance['cleanblogg_tab_category'] = strip_tags( $new_instance['cleanblogg_tab_category'] );
		$instance['cleanblogg_tab_active'] = strip_tags( $new_instance['cleanblogg_tab_active'] );
        return $instance;
    }
	public function form( $instance ) {    
     	$defaults = array( 'cleanblogg_tab_title' => __('Posts on Tab','cleanblog-pro'), 'cleanblogg_tab_number' => '5','cleanblogg_tab_thumbs' => false,'cleanblogg_tab_category' => 'all', 'cleanblogg_tab_active' => 'recent'); 
		$instance = wp_parse_args( (array) $instance, $defaults );
        $cleanblogg_tab_title      = esc_attr( $instance['cleanblogg_tab_title'] );
        $cleanblogg_tab_number    = esc_attr( $instance['cleanblogg_tab_number'] );
		$cleanblogg_tab_thumbs 	 = esc_attr($instance['cleanblogg_tab_thumbs']);
		$cleanblogg_tab_category 	 = esc_attr($instance['cleanblogg_tab_category']);
		$cleanblogg_tab_active 	 = esc_attr($instance['cleanblogg_tab_active']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('cleanblogg_tab_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cleanblogg_tab_title'); ?>" name="<?php echo $this->get_field_name('cleanblogg_tab_title'); ?>" type="text" value="<?php echo $cleanblogg_tab_title; ?>" />
        </p>
<p>
            <label for="<?php echo $this->get_field_id('cleanblogg_tab_number'); ?>"><?php _e('Number of posts to show:','cleanblog-pro'); ?></label> 
            <input id="<?php echo $this->get_field_id('cleanblogg_tab_number'); ?>" name="<?php echo $this->get_field_name('cleanblogg_tab_number'); ?>" type="text" size="3" value="<?php echo $cleanblogg_tab_number; ?>" />
        </p>
        <p>
    		<label for="<?php echo $this->get_field_id('cleanblogg_tab_active'); ?>"><?php _e('Activate a Tab:','cleanblog-pro'); ?></label> 
    		<select class="widefat" id="<?php echo $this->get_field_id('cleanblogg_tab_active'); ?>" name="<?php echo $this->get_field_name('cleanblogg_tab_active'); ?>" type="text">
        		<option value="recent" <?php selected($instance['cleanblogg_tab_active'], 'recent'); ?>><?php _e('Recent Posts','cleanblog-pro'); ?></option>
        		<option value="popular" <?php selected($instance['cleanblogg_tab_active'], 'popular');?>><?php _e('Popular Posts','cleanblog-pro'); ?></option>
    		</select>
		</p>
         <p>
    		<label for="<?php echo $this->get_field_id('cleanblogg_tab_category'); ?>"><?php _e('Select Category:','cleanblog-pro'); ?></label>
            <select id="<?php echo $this->get_field_id('cleanblogg_tab_category'); ?>" name="<?php echo $this->get_field_name('cleanblogg_tab_category'); ?>" class="widefat">
                <option value="all" <?php selected($instance['cleanblogg_tab_category'], 'all');?>><?php _e('All Categories','cleanblog-pro'); ?></option>
                <?php foreach(get_terms('category','hide_empty=0&depth=1&type=post') as $term) { ?>
                <option <?php selected( $instance['cleanblogg_tab_category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                <?php } ?>      
            </select>
		</p>  
		<p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cleanblogg_tab_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'cleanblogg_tab_thumbs' ); ?>" <?php checked( (bool) $instance['cleanblogg_tab_thumbs'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cleanblogg_tab_thumbs' ); ?>"><?php _e('Hide Thumbnails','cleanblog-pro') ?></label>
		</p>
    <?php 
    }   
}
add_action( 'widgets_init', function(){
     register_widget( 'cleanblogg_Posts_Tab_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// About Me Widget
////////////////////////////////////////////////////////////////////////////


class cb_About_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cb_about_widget',
            __( 'ClanBlogg: About Me', 'cleanblog-pro' ),
            array(
                'classname'   => 'cb_about_widget',
                'description' => __( 'A widget that displays a user\'s bio information.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {     
        extract( $args );
		$defaults = array( 'cb_about_template' => 'default'/*,'cleanblogg_tab_category' => 'all'*/); 
        $cb_about_title      = apply_filters( 'widget_title', $instance['cb_about_title'] );
        $cb_about_message    = $instance['cb_about_message'];
        $cb_about_image 	 = esc_attr($instance['cb_about_image_uri']); 
		$cb_about_template 	 = esc_attr($instance['cb_about_template']); 
		$cb_about_signature_uri = esc_attr($instance['cb_about_signature_uri']);
		$cb_about_readmore_text = esc_attr($instance['cb_about_readmore_text']);
		$cb_about_readmore_link = esc_attr($instance['cb_about_readmore_link']);
		
        echo $before_widget;
		echo '<div class="cb-about-box cb-about-'.$cb_about_template.'">';
        if ( $cb_about_title ) {
            echo $before_title . $cb_about_title . $after_title;
        }
		if ( $cb_about_image ) {
        echo '<img class="cb-about-img" src="'.$cb_about_image.'" alt="'.$cb_about_title.'" />'; 
		}
        echo '<div class="cb-about-widget-text">'.$cb_about_message.'</div>';
		if ( $cb_about_signature_uri ) {
        echo '<img class="cb-signature-img" src="'.$cb_about_signature_uri.'" alt="Signature" />'; 
		}
		if (( $cb_about_readmore_text ) && ( $cb_about_readmore_link )) {
        echo '<a class="about-readmore" href="'.$cb_about_readmore_link.'" >'.$cb_about_readmore_text.'</a>'; 
		}
		echo "</div>";
        echo $after_widget;
    }
	
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cb_about_title'] = strip_tags( $new_instance['cb_about_title'] );
        $instance['cb_about_message'] = $new_instance['cb_about_message'];
        $instance['cb_about_image_uri'] = strip_tags( $new_instance['cb_about_image_uri'] );
		$instance['cb_about_signature_uri'] = strip_tags( $new_instance['cb_about_signature_uri'] );
		$instance['cb_about_template'] = strip_tags( $new_instance['cb_about_template'] );
		$instance['cb_about_readmore_text'] = $new_instance['cb_about_readmore_text'];
		$instance['cb_about_readmore_link'] = strip_tags( $new_instance['cb_about_readmore_link'] );
		
        return $instance;
    }
	public function form( $instance ) { 
	$defaults = array( 'cb_about_template' => 'default','cb_about_readmore_text' => __( 'Read More', 'cleanblog-pro' ));  
	$instance = wp_parse_args( (array) $instance, $defaults ); 
        $cb_about_title      = esc_attr( $instance['cb_about_title'] );
        $cb_about_message    = esc_attr( $instance['cb_about_message'] );
		$cb_about_image 	 = esc_attr($instance['cb_about_image_uri']);
		$cb_about_template   = esc_attr($instance['cb_about_template']);
		$cb_about_signature_uri = esc_attr($instance['cb_about_signature_uri']);
		$cb_about_readmore_text = esc_attr($instance['cb_about_readmore_text']);
		$cb_about_readmore_link = esc_attr($instance['cb_about_readmore_link']);
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('cb_about_title'); ?>" name="<?php echo $this->get_field_name('cb_about_title'); ?>" type="text" value="<?php echo $cb_about_title; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_template'); ?>"><?php _e('Template:','cleanblog-pro'); ?></label><br />
      	<select id="<?php echo $this->get_field_id('cb_about_template'); ?>" class="widefat" name="<?php echo $this->get_field_name('cb_about_template'); ?>" type="text">
        <option value="default" <?php selected($cb_about_template, 'default'); ?>><?php _e('Default','cleanblog-pro'); ?></option>
        <option value="circle" <?php selected($cb_about_template, 'circle');?>><?php _e('Circle','cleanblog-pro'); ?></option>
    	</select>
      	</p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_image_uri'); ?>"><?php _e('Image URL:','cleanblog-pro'); ?></label><br />
      	<input type="text" class="img widefat" name="<?php echo $this->get_field_name('cb_about_image_uri'); ?>" id="<?php echo $this->get_field_id('cb_about_image_uri'); ?>" value="<?php echo $cb_about_image; ?>" />
      	
      	</p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_message'); ?>"><?php _e('About Me:','cleanblog-pro'); ?></label> 
        <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('cb_about_message'); ?>" name="<?php echo $this->get_field_name('cb_about_message'); ?>"><?php echo $cb_about_message; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_signature_uri'); ?>"><?php _e('Signature Image URL:','cleanblog-pro'); ?></label><br />
      	<input type="text" class="img widefat" name="<?php echo $this->get_field_name('cb_about_signature_uri'); ?>" id="<?php echo $this->get_field_id('cb_about_signature_uri'); ?>" value="<?php echo $cb_about_signature_uri; ?>" />
      	
      	</p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_readmore_text'); ?>"><?php _e('Read More Text:','cleanblog-pro'); ?></label><br />
      	<input type="text" class="img widefat" name="<?php echo $this->get_field_name('cb_about_readmore_text'); ?>" id="<?php echo $this->get_field_id('cb_about_readmore_text'); ?>" value="<?php echo $cb_about_readmore_text; ?>" />
      	
      	</p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_about_readmore_link'); ?>"><?php _e('Read More Link:','cleanblog-pro'); ?></label><br />
      	<input type="text" class="img widefat" name="<?php echo $this->get_field_name('cb_about_readmore_link'); ?>" id="<?php echo $this->get_field_id('cb_about_readmore_link'); ?>" value="<?php echo $cb_about_readmore_link; ?>" />
      	</p>
    <?php 
    }  
}
add_action( 'widgets_init', function(){
     register_widget( 'cb_About_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// Facebook Likebox Widget
////////////////////////////////////////////////////////////////////////////


class cb_fblike_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cb_fblike_widget',
            __( 'ClanBlogg: Facebook Like Box', 'cleanblog-pro' ),
            array(
                'classname'   => 'cb_fblike_widget',
                'description' => __( 'A widget that displays a facebook like box.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {    
        extract( $args );
        $cb_fblike_title      = apply_filters( 'widget_title', $instance['cb_fblike_title'] );
        $cb_fblike_page    = $instance['cb_fblike_page'];
		$cb_fblike_width    = $instance['cb_fblike_width'];
		$cb_fblike_height    = $instance['cb_fblike_height'];
		$cb_fblike_faces    = $instance['cb_fblike_faces'];
		$cb_fblike_posts    = $instance['cb_fblike_posts'];
		$cb_fblike_header    = $instance['cb_fblike_header'];
		$cb_fblike_smheader    = $instance['cb_fblike_smheader'];
        echo $before_widget;
        if ( $cb_fblike_title ) {
            echo $before_title . $cb_fblike_title . $after_title;
        } ?>
        <div class="fb-page" data-href="<?php echo $cb_fblike_page; ?>" data-width="<?php echo $cb_fblike_width; ?>" data-height="800" data-small-header="<?php if($cb_fblike_smheader) { echo 'true'; } else { echo 'false'; } ?>" data-adapt-container-width="true" data-hide-cover="<?php if($cb_fblike_header) { echo 'false'; } else { echo 'true'; } ?>" data-show-facepile="<?php if($cb_fblike_faces) { echo 'true'; } else { echo 'false'; } ?>" data-show-posts="<?php if($cb_fblike_posts) { echo 'true'; } else { echo 'false'; } ?>"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $cb_fblike_page; ?>"><a href="<?php echo $cb_fblike_page; ?>"><?php _e('Our Facebook Page','cleanblog-pro');?></a></blockquote></div></div>
        <?php
        echo $after_widget;
    }
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cb_fblike_title'] = strip_tags( $new_instance['cb_fblike_title'] );
		$instance['cb_fblike_page'] = strip_tags( $new_instance['cb_fblike_page'] );
		$instance['cb_fblike_width'] = strip_tags( $new_instance['cb_fblike_width'] );
		$instance['cb_fblike_height'] = strip_tags( $new_instance['cb_fblike_height'] );
		$instance['cb_fblike_faces'] = strip_tags( $new_instance['cb_fblike_faces'] );
		$instance['cb_fblike_stream'] = strip_tags( $new_instance['cb_fblike_posts'] );
		$instance['cb_fblike_header'] = strip_tags( $new_instance['cb_fblike_header'] );
		$instance['cb_fblike_posts'] = strip_tags( $new_instance['cb_fblike_posts'] );
		$instance['cb_fblike_smheader'] = strip_tags( $new_instance['cb_fblike_smheader'] );
        return $instance;
    }
	
	public function form( $instance ) {    
	 $defaults = array( 'cb_fblike_title' => __('Find us on Facebook','cleanblog-pro'), 'cb_fblike_width' => 320, 'cb_fblike_height' => 300, 'cb_fblike_header' => 'on', 'cb_fblike_faces' => 'on', 'cb_fblike_page' => 'https://www.facebook.com/facebook', 'cb_fblike_posts' => false, 'cb_fblike_smheader' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
        $cb_fblike_title      = esc_attr( $instance['cb_fblike_title'] );
		$cb_fblike_page      = esc_attr( $instance['cb_fblike_page'] );
		$cb_fblike_width      = esc_attr( $instance['cb_fblike_width'] );
		$cb_fblike_height      = esc_attr( $instance['cb_fblike_height'] );
		$cb_fblike_faces      = esc_attr( $instance['cb_fblike_faces'] );
		$cb_fblike_stream      = esc_attr( $instance['cb_fblike_posts'] );
		$cb_fblike_header      = esc_attr( $instance['cb_fblike_header'] );
		$cb_fblike_header      = esc_attr( $instance['cb_fblike_smheader'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('cb_fblike_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cb_fblike_title'); ?>" name="<?php echo $this->get_field_name('cb_fblike_title'); ?>" type="text" value="<?php echo $cb_fblike_title; ?>" />
        </p>
       	<p>
            <label for="<?php echo $this->get_field_id('cb_fblike_page'); ?>"><?php _e('Facebook Page URL:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cb_fblike_page'); ?>" name="<?php echo $this->get_field_name('cb_fblike_page'); ?>" type="text" value="<?php echo $cb_fblike_page; ?>" />
            <small><?php _e('The URL of the Facebook Page. Eg:','cleanblog-pro');?> https://www.facebook.com/facebook</small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cb_fblike_width'); ?>"><?php _e('Width:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cb_fblike_width'); ?>" name="<?php echo $this->get_field_name('cb_fblike_width'); ?>" type="text" value="<?php echo $cb_fblike_width; ?>" />
            <small><?php _e('The pixel width of the plugin. Min. is 180 & Max. is 500','cleanblog-pro'); ?></small>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('cb_fblike_height'); ?>"><?php _e('Height:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cb_fblike_height'); ?>" name="<?php echo $this->get_field_name('cb_fblike_height'); ?>" type="text" value="<?php echo $cb_fblike_height; ?>" />
            <small><?php _e('The pixel height of the plugin. Min. is 70','cleanblog-pro'); ?></small>
        </p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cb_fblike_faces' ); ?>" name="<?php echo $this->get_field_name( 'cb_fblike_faces' ); ?>" <?php checked( (bool) $instance['cb_fblike_faces'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cb_fblike_faces' ); ?>"><?php _e('Show Friend\'s Faces','cleanblog-pro'); ?></label>
		</p>
     	<p><input type="checkbox" id="<?php echo $this->get_field_id( 'cb_fblike_posts' ); ?>" name="<?php echo $this->get_field_name( 'cb_fblike_posts' ); ?>" <?php checked( (bool) $instance['cb_fblike_posts'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cb_fblike_posts' ); ?>"><?php _e('Show Page Posts','cleanblog-pro'); ?></label>
		</p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cb_fblike_header' ); ?>" name="<?php echo $this->get_field_name( 'cb_fblike_header' ); ?>" <?php checked( (bool) $instance['cb_fblike_header'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cb_fblike_header' ); ?>"><?php _e('Show Cover Photo','cleanblog-pro'); ?></label>
			
		</p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'cb_fblike_smheader' ); ?>" name="<?php echo $this->get_field_name( 'cb_fblike_smheader' ); ?>" <?php checked( (bool) $instance['cb_fblike_smheader'], true ); ?> />
			<label for="<?php echo $this->get_field_id( 'cb_fblike_smheader' ); ?>"><?php _e('Use Small Header','cleanblog-pro'); ?></label>
		</p>
    <?php 
    }
}
add_action( 'widgets_init', function(){
     register_widget( 'cb_fblike_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// Ad Widget
////////////////////////////////////////////////////////////////////////////

class cb_Ad_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cb_ad_widget',
            __( 'ClanBlogg: Ad Unit 300 x 250', 'cleanblog-pro' ),
            array(
                'classname'   => 'cb_ad_widget',
                'description' => __( 'A widget that displays google adsence Ad or banner Ad.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {    
        extract( $args );
        $cb_ad_image      = esc_attr($instance['cb_ad_image']);
        $cb_ad_uri    = esc_attr($instance['cb_ad_uri']);
        $cb_ad_adsence 	 = $instance['cb_ad_adsence']; 
        echo $before_widget;
        echo '<div class="cb-ad-widget">';
        if ( $cb_ad_adsence ): 
           echo $cb_ad_adsence;
        else:
		if($cb_ad_image):
		if ($cb_ad_uri): echo '<a href="'.$cb_ad_uri.'">'; endif;
        echo '<img  alt="'.__('Advertistment Banner','cleanblog-pro').'" src="'.$cb_ad_image.'" width="300" height="250">';       
        if ($cb_ad_uri): echo '</a>'; endif;
		endif;
		endif;
		echo '</div>';
		echo $after_widget; 
    }
	public function update( $new_instance, $old_instance ) {        
        $instance = $old_instance;
        $instance['cb_ad_image'] = strip_tags( $new_instance['cb_ad_image'] );
        $instance['cb_ad_uri'] = strip_tags( $new_instance['cb_ad_uri'] );
        $instance['cb_ad_adsence'] = $new_instance['cb_ad_adsence'];
        return $instance;
    }
	public function form( $instance ) {    
        $cb_ad_image      = esc_attr( $instance['cb_ad_image'] );
		$cb_ad_uri 	 = esc_attr($instance['cb_ad_uri']);
		$cb_ad_adsence    = $instance['cb_ad_adsence'];
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('cb_ad_image'); ?>"><?php _e('Image URL:','cleanblog-pro'); ?></label><br />
      	<input type="text" class="img widefat" name="<?php echo $this->get_field_name('cb_ad_image'); ?>" id="<?php echo $this->get_field_id('cb_ad_image'); ?>" value="<?php echo $cb_ad_image ?>" />
      	</p>
        <p>
            <label for="<?php echo $this->get_field_id('cb_ad_uri'); ?>"><?php _e('Link:','cleanblog-pro'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('cb_ad_uri'); ?>" name="<?php echo $this->get_field_name('cb_ad_uri'); ?>" type="text" value="<?php echo $cb_ad_uri; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cb_ad_adsence'); ?>"><?php _e('Adsence Code:','cleanblog-pro'); ?></label> 
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('cb_ad_adsence'); ?>" name="<?php echo $this->get_field_name('cb_ad_adsence'); ?>"><?php echo $cb_ad_adsence; ?></textarea>
        </p>
    <?php 
    } 
}
add_action( 'widgets_init', function(){
     register_widget( 'cb_Ad_Widget' );
});

////////////////////////////////////////////////////////////////////////////
// Mailchimp Widget
////////////////////////////////////////////////////////////////////////////


class cb_MailChimp_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cb_mailchimp_widget',
            __( 'ClanBlogg: MailChimp Subscribe', 'cleanblog-pro' ),
            array(
                'classname'   => 'cb_mailchimp_widget',
                'description' => __( 'A widget that displays a MailChimp subscribe form.', 'cleanblog-pro' )
                )
        );
    }
	public function widget( $args, $instance ) {     
        extract( $args );
        $cb_mailchimp_title  	= apply_filters( 'widget_title', $instance['cb_mailchimp_title'] );
        $cb_mailchimp_message   = $instance['cb_mailchimp_message'];
		$cb_mailchimp_action 	= $instance['cb_mailchimp_action'];
		$cb_mailchimp_button 	= $instance['cb_mailchimp_button'];
        echo $before_widget;
        if ( $cb_mailchimp_title ) {
            echo $before_title . $cb_mailchimp_title .'<hr />'. $after_title;
        }
		?>
        <?php if ( $cb_mailchimp_message ): ?>
		<p class="cb-mailchimp-message"><?php echo $cb_mailchimp_message; ?></p>
        <?php endif; ?>
        <form method="post" action="<?php echo $cb_mailchimp_action; ?>" class="form" target="_blank">
			<p>
				<input type="email" name="EMAIL" placeholder="<?php esc_attr_e('Your email address..', 'cleanblog-pro'); ?>" required>
			</p>
			<p>
				<input type="submit" value="<?php echo $cb_mailchimp_button; ?>">
			</p>
		</form>
        <?php
		echo $after_widget;
    }
	
	public function update( $new_instance, $old_instance ) { 		       
        $instance = $old_instance;
        $instance['cb_mailchimp_title'] = strip_tags( $new_instance['cb_mailchimp_title'] );
        $instance['cb_mailchimp_message'] = $new_instance['cb_mailchimp_message'];
		$instance['cb_mailchimp_action'] = strip_tags( $new_instance['cb_mailchimp_action'] );
		$instance['cb_mailchimp_button'] = strip_tags( $new_instance['cb_mailchimp_button'] );
        return $instance;
    }
	public function form( $instance ) { 
	    $defaults = array( 'cb_mailchimp_title' => __( 'Newsletter', 'cleanblog-pro' ),'cb_mailchimp_message' => __( 'Sign up with your email address to be the first to know about new features, VIP offers & more. ', 'cleanblog-pro' ), 'cb_mailchimp_button' => __( 'Subscribe', 'cleanblog-pro' ) );
		$instance = wp_parse_args( (array) $instance, $defaults );
		   
        $cb_mailchimp_title      = esc_attr( $instance['cb_mailchimp_title'] );
        $cb_mailchimp_message    = esc_attr( $instance['cb_mailchimp_message'] );
		$cb_mailchimp_action     = esc_attr( $instance['cb_mailchimp_action'] );
		$cb_mailchimp_button     = esc_attr( $instance['cb_mailchimp_button'] );
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('cb_mailchimp_title'); ?>"><?php _e('Title:','cleanblog-pro'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('cb_mailchimp_title'); ?>" name="<?php echo $this->get_field_name('cb_mailchimp_title'); ?>" type="text" value="<?php echo $cb_mailchimp_title; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_mailchimp_message'); ?>"><?php _e('Message:','cleanblog-pro'); ?></label> 
        <textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('cb_mailchimp_message'); ?>" name="<?php echo $this->get_field_name('cb_mailchimp_message'); ?>"><?php echo $cb_mailchimp_message; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_mailchimp_action'); ?>"><?php _e('MailChimp Form Action URL:','cleanblog-pro'); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cb_mailchimp_action')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_mailchimp_action')); ?>" type="text" value="<?php echo $cb_mailchimp_action; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('cb_mailchimp_button'); ?>"><?php _e('Button Text:','cleanblog-pro'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('cb_mailchimp_button'); ?>" name="<?php echo $this->get_field_name('cb_mailchimp_button'); ?>" type="text" value="<?php echo $cb_mailchimp_button; ?>" />
        </p>
        
    <?php 
    }  
}
add_action( 'widgets_init', function(){
     register_widget( 'cb_MailChimp_Widget' );
});
?>