<?php
//Pagination
function cleanblogg_pagination(){
?>
    <div class="cb-pagination">
        <div class="cb-next-posts"><?php next_posts_link(); ?></div>
        <div class="cb-previous-posts"><?php previous_posts_link(); ?></div>
    </div>
<?php	
	}
	
// Excerpt
function cleanblogg_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'cleanblogg_excerpt_length', 999 );

function cleanblogg_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cleanblogg_excerpt_more' );

// Search Filter
if (!is_admin()):
function cleanblogg_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','cleanblogg_search_filter');	


//Time Hook
 function cleanblogg_ago_time() {
   global $post;
   $date = $post->post_date;
   $time = get_post_time('G', true, $post);
   $cbtime = time() - $time;
   if($cbtime < 60){
     $cbtimestamp = __('Just now','cleanblogg');
   }else{
     $cbtimestamp = sprintf(__('%s ago','cleanblogg'), human_time_diff($time));
   }
   return $cbtimestamp;
 }
add_filter('the_time', 'cleanblogg_ago_time');
endif; 
//Comments
function cleanblogg_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="cb-comment">	
			<div class="author-img">
				<?php echo get_avatar($comment,$args['avatar_size']); ?>
			</div>
			<div class="comment-text">
				<span class="author"><?php echo get_comment_author_link(); ?></span>
				<span class="date"><?php printf(__('%1$s at %2$s', 'cleanblogg'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval', 'cleanblogg'); ?></em>
				<?php endif; ?>
				<p class="comment-text"><?php comment_text(); ?></p>
				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'cleanblogg'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
					<?php edit_comment_link(__('Edit', 'cleanblogg')); ?>
				</span>
			</div>	
		</div>
		<div class="clearfix"></div>
	</li>
	<?php 
	}
	
function cleanblog_social(){
$cb_social_email = get_theme_mod('cleanblog_social_email');
$cb_fb = get_theme_mod( 'cleanblog_fb');
$cb_twitter = get_theme_mod( 'cleanblog_twitter');
$cb_googleplus = get_theme_mod( 'cleanblog_googleplus');
$cb_instagram = get_theme_mod( 'cleanblog_instagram');
$cb_pinterest = get_theme_mod( 'cleanblog_pinterest');
$cb_linkedin = get_theme_mod('cleanblog_linkedin');
$cb_tumblr = get_theme_mod('cleanblog_tumblr');
$cb_flickr = get_theme_mod('cleanblog_flickr');
$cb_reddit = get_theme_mod('cleanblog_reddit');
$cb_youtube = get_theme_mod('cleanblog_youtube');
$cb_vimeo = get_theme_mod('cleanblog_vimeo');
$cb_rss = get_theme_mod( 'cleanblog_rss');
?>
<?php if ($cb_social_email != "" ){ ?>
<a href="mailto:<?php echo $cb_social_email; ?>" target="_blank"><i class="fa fa-envelope"></i>
</a> <?php } ?>
<?php if ($cb_fb != "" ){ ?>
<a href="<?php echo esc_url($cb_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a> <?php } ?>
<?php if ($cb_twitter!= "" ){ ?>
<a href="<?php echo esc_url($cb_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
<?php if ($cb_googleplus != "" ){ ?>
<a href="<?php echo esc_url($cb_googleplus); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php } ?>
<?php if ($cb_instagram != "" ){ ?>
<a href="<?php echo esc_url($cb_instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php } ?>
<?php if ($cb_pinterest != "" ){ ?>
<a href="<?php echo esc_url($cb_pinterest); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a><?php } ?>
<?php if ($cb_linkedin != "" ){ ?>
<a href="<?php echo esc_url($cb_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php } ?>
<?php if ($cb_tumblr != "" ){ ?>
<a href="<?php echo esc_url($cb_tumblr); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php } ?>
<?php if ($cb_flickr != "" ){ ?>
<a href="<?php echo esc_url($cb_flickr); ?>" target="_blank"><i class="fa fa-flickr"></i></a><?php } ?>
<?php if ($cb_reddit != "" ){ ?>
<a href="<?php echo esc_url($cb_reddit); ?>" target="_blank"><i class="fa fa-reddit"></i></a><?php } ?>
<?php if ($cb_youtube != "" ){ ?>
<a href="<?php echo esc_url($cb_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php } ?>
<?php if ($cb_vimeo != "" ){ ?>
<a href="<?php echo esc_url($cb_vimeo); ?>" target="_blank"><i class="fa fa-vimeo"></i></a><?php } ?>
<?php if ($cb_rss != "" ){ ?>
<a href="<?php echo esc_url($cb_rss); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php } ?>
<?php  
	}
	
function cleanblogg_admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/admin/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'cleanblogg_admin_style');

//Admin Page
require get_template_directory() . '/inc/admin/admin-page.php';

//Background
add_theme_support( 'custom-background');

// Custom Header
	$cleanblogg_header_args = array(
	'flex-width'    => true,
	'width'         => 1920,
	'flex-height'    => true,
	'height'        => 260,
	);
	
add_theme_support( 'custom-header', $cleanblogg_header_args );
	
// Body Class
function cleanblogg_body_classes( $classes ) {
	$cleanblog_content_layout_type = get_theme_mod( 'cleanblog_content_layout_type', 'wide-layout');
    $classes[] = $cleanblog_content_layout_type;  
    return $classes;
}
add_filter( 'body_class','cleanblogg_body_classes' );	

// Custom Profile Fields
function cleanblogg_contactmethods( $contactmethods ) {
	$contactmethods['twitter']  	= 'Twitter';
	$contactmethods['facebook'] 	= 'Facebook';
	$contactmethods['google']   	= 'Google Plus';
	$contactmethods['tumblr']   	= 'Tumblr';
	$contactmethods['instagram']	= 'Instagram';
	$contactmethods['pinterest'] 	= 'Pinterest';
	$contactmethods['delicious'] 	= 'Delicious';
	$contactmethods['digg'] 		= 'Digg';
	$contactmethods['dribbble'] 	= 'Dribbble';
	$contactmethods['flickr'] 		= 'Flickr';
	$contactmethods['linkedin'] 	= 'Linkedin';
	$contactmethods['mail'] 		= 'Mail';
	$contactmethods['reddit'] 		= 'Reddit';
	$contactmethods['rss'] 			= 'RSS';
	$contactmethods['vimeo'] 		= 'Vimeo';
	$contactmethods['yahoo'] 		= 'Yahoo';
	$contactmethods['youtube'] 		= 'Youtube';
	return $contactmethods;
}
add_filter('user_contactmethods','cleanblogg_contactmethods',10,1);

// Author Social Links
function cleanblogg_author_social_links(){ ?>
	<ul>
    <?php
if(get_the_author_meta('facebook')) : ?><li><a href="<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('twitter')) : ?><li><a href="<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('instagram')) : ?><li><a href="<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('google')) : ?><li><a href="<?php echo the_author_meta('google'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('pinterest')) : ?><li><a href="<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('tumblr')) : ?><li><a href="<?php echo the_author_meta('tumblr'); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('delicious')) : ?><li><a href="<?php echo the_author_meta('delicious'); ?>"><i class="fa fa-delicious" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('digg')) : ?><li><a href="<?php echo the_author_meta('digg'); ?>"><i class="fa fa-digg" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('dribbble')) : ?><li><a href="<?php echo the_author_meta('dribbble'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('flickr')) : ?><li><a href="<?php echo the_author_meta('flickr'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('linkedin')) : ?><li><a href="<?php echo the_author_meta('linkedin'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('mail')) : ?><li><a href="mailto:<?php echo the_author_meta('mail'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('reddit')) : ?><li><a href="<?php echo the_author_meta('reddit'); ?>"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('rss')) : ?><li><a href="<?php echo the_author_meta('rss'); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('vimeo')) : ?><li><a href="<?php echo the_author_meta('vimeo'); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('yahoo')) : ?><li><a href="<?php echo the_author_meta('yahoo'); ?>"><i class="fa fa-yahoo" aria-hidden="true"></i></a></li><?php endif; ?>
          <?php if(get_the_author_meta('youtube')) : ?><li><a href="<?php echo the_author_meta('youtube'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php endif;
		  ?>
	<ul>
    <?php
}

// Required Plugins

require_once get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'cleanblogg_register_required_plugins' );
function cleanblogg_register_required_plugins() {
	$plugins = array(
        array(
			'name'      		=> 'Page Builder by SiteOrigin',
			'slug'      		=> 'siteorigin-panels',
			'required'  		=> false,
			'version' 			=> '',
			'force_activation' 	=> false,
			'force_deactivation'=> false, 
			'external_url' 		=> '',
		),
		array(
			'name'      		=> 'SiteOrigin Widgets Bundle',
			'slug'      		=> 'so-widgets-bundle',
			'required'  		=> false,
			'version' 			=> '',
			'force_activation' 	=> false,
			'force_deactivation'=> false, 
			'external_url' 		=> '',
		),
	);
	$config = array(
		'id'           => 'cleanblogg',                  // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}

?>