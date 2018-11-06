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
// Social Share
function cleanblog_posts_share($post_id){  ?>
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php urlencode(the_permalink()); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/home?status=<?php urlencode(the_title()); ?> - <?php urlencode(the_permalink()); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
	<a href="https://plus.google.com/share?url=<?php urlencode(the_permalink()); ?>" target="_blank" title="Google +"><i class="fa fa-google-plus"></i></a>
	<a href="mailto:?subject=<?php rawurlencode(the_title()); ?>&amp;body=<?php urlencode(the_permalink()); ?>" target="_top"><i class="fa-envelope-o fa" title="Email"></i></a>
<?php }
	
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
endif;
//Time Hook
if (!is_admin()):
 function cleanblogg_ago_time() {
   global $post;
   $date = $post->post_date;
   $time = get_post_time('G', true, $post);
   $cbtime = time() - $time;
   if($cbtime < 60){
     $cbtimestamp = __('Just now','cleanblog-pro');
   }else{
     $cbtimestamp = sprintf(__('%s ago','cleanblog-pro'), human_time_diff($time));
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
				<span class="date"><?php printf(__('%1$s at %2$s', 'cleanblog-pro'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval.', 'cleanblog-pro'); ?></em>
				<?php endif; ?>
				<p class="comment-text"><?php comment_text(); ?></p>
				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'cleanblog-pro'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
					<?php edit_comment_link(__('Edit', 'cleanblog-pro')); ?>
				</span>
			</div>	
		</div>
		<div class="clearfix"></div>
	</li>
	<?php 
	}
	
//Social Scripts

function cleanblogg_social_scripts() {
    ?>
<script type="text/javascript">
//Facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//Twitter
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

//Google +
(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  
</script>
<!--Pinterest-->
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
    <?php
}
add_action('wp_footer', 'cleanblogg_social_scripts');

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
	
//Required Plugins

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> 'WP Instagram Widget',
			'slug'     				=> 'wp-instagram-widget',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Page Builder by SiteOrigin',
			'slug'     				=> 'siteorigin-panels',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		)

	);

	$config = array(
		'id'           => 'cleanblog-pro',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}

// Admin Style
function cleanblogg_admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/admin/style.css');
}
add_action('admin_enqueue_scripts', 'cleanblogg_admin_style');

//Background Image
$args = array(
	'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $args );

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

// Related Posts
function cleanblogg_related_posts(){
$cleanblog_single_relatedpost_show = get_theme_mod( 'cleanblog_single_relatedpost_show',false);
if ($cleanblog_single_relatedpost_show != false):?>
	<div class="cb-related">
	<?php 
	$orig_post = $post;
	global $post;
	$categories = get_the_category($post->ID);
	if ($categories) :
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args = array(
			'category__in'     => $category_ids,
			'post__not_in'     => array($post->ID),
			'posts_per_page'   => 3,
			'ignore_sticky_posts' => 1,
			'orderby' => 'rand'
		);
		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ): ?>
			<h4 class="cb-second-title"><?php _e('You May Also Like',  'cleanblog-pro'); ?></h4>
			<?php while( $my_query->have_posts() ):
			$my_query->the_post();?>
			<div class="cb-related-grid">
				<?php if ( has_post_thumbnail()) : ?>			
				<div class="cb-post-media">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail("cleanblogg-grid-thumb"); ?>
				</a>
				</div>
				<?php endif; ?>
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="cb-post-date"><?php echo get_the_date(); ?></span>					
			</div>
			<?php
			endwhile;
		endif;
	endif;
	$post = $orig_post;
	wp_reset_postdata();
	?>
	<div class="clearfix"></div>
</div> <!-- Related Posts -->
<?php endif;
	}
	
// Next Previous Posts
function cleanblogg_next_pre_posts(){
$cleanblog_single_next_prev_show = get_theme_mod( 'cleanblog_single_next_prev_show',false);
if ($cleanblog_single_next_prev_show != false):?>
<div class="cb-next-pre">
<?php
$cleanblog_next_post = get_next_post();
if (!empty( $cleanblog_next_post )): ?>
    <div class="cb-single-next">
    <a href="<?php echo get_permalink( $cleanblog_next_post->ID ); ?>">
    <div class="cb-next-pre-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
    <div class="cb-next-pre-title"><?php echo __('Up Next', 'cleanblog-pro')?></div>
    	<div class="cb-next-post-link"><?php echo $cleanblog_next_post->post_title; ?></div>
    </a>
    </div>
    <?php endif; ?>
    <?php
$cleanblog_previous_post = get_previous_post();
if (!empty( $cleanblog_previous_post )): ?>
    <div class="cb-single-pre">
    	<a href="<?php echo get_permalink( $cleanblog_previous_post->ID ); ?>">
    	<div class="cb-next-pre-icon"><i class="fa fa-angle-double-left" aria-hidden="true"></i></div>
    	<div class="cb-next-pre-title"><?php echo __('Previously', 'cleanblog-pro')?></div>
    	<div class="cb-next-post-link"><?php echo $cleanblog_previous_post->post_title; ?></div>
        </a>
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>
</div>
<?php endif;
	}

// Author Bio Box
function cleanblogg_author_box(){
$cleanblog_single_author_bio_show = get_theme_mod( 'cleanblog_single_author_bio_show',false);
if ($cleanblog_single_author_bio_show != false):?>
<div class="cb-about-author">
	<div class="cb-author-avatar">
	<?php echo get_avatar( $post->post_author, 100 ); ?>
	</div>
    <div class="author-info">
		<h5><?php the_author_posts_link(); ?></h5>
		<p><?php the_author_meta('description'); ?></p>
        <div class="author-social"><?php cleanblogg_author_social_links(); ?></div>
	</div>
    <div class="clearfix"></div>
</div>
<?php endif;
}

// Link Pages
function cleanblogg_link_pages(){
wp_link_pages( array( 'before' => '<div class="multi-page-links">',
 'after' => '</div>', 'next_or_number' => 'number','link_before' => '<span>',
		'link_after'       => '</span>',  ) );	
	}
	
// Single Post Tags
function cleanblogg_tags(){
	$cleanblog_single_tags_show = get_theme_mod( 'cleanblog_single_tags_show',true);
	if ($cleanblog_single_tags_show != false):?>
    <div class="cb-post-tags"><?php the_tags('','',''); ?> </div>
	<?php endif;
	}
	
// Single Post Meta
function cleanblogg_single_meta(){ 
$cleanblog_single_author_show = get_theme_mod( 'cleanblog_single_auth_show',true);
$leanblog_single_date_show = get_theme_mod( 'cleanblog_single_date_show',true);
$cleanblog_single_comments_show = get_theme_mod( 'cleanblog_single_comments_show',true);
?>
<div class="cb-post-meta">
                <ul>
                    <?php if ($cleanblog_single_author_show != false): ?><li><?php echo __( 'By ',  'cleanblog-pro' ); printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()); ?></li><?php endif; ?>
                    <?php if ($leanblog_single_date_show != false):?><li class="entry-date published updated"><?php echo get_the_date(); ?></li><?php endif; ?>
                    <?php if ($cleanblog_single_comments_show != false):?><li><a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a></li><?php endif; ?>
                </ul>
            </div>
<?php	
	}
?>