<?php 
if (!empty($_GET['layout'])):
$layout = $_GET['layout'];
if($layout == 'list'): $blog_style = 'list';
elseif($layout == 'standard'): $blog_style = 'standard';
else: $blog_style = 'grid';
endif;

elseif(is_archive() || is_search()):
$blog_style= get_theme_mod( 'cleanblog_archive_style');	

else:
$blog_style= get_theme_mod( 'cleanblog_content_styles');  	
endif;
?>
<?php 
// Standard Layout
$cleanblog_list_featured_image_show = get_theme_mod( 'cleanblog_list_featured_image_show',true);
$cleanblog_list_date_show = get_theme_mod( 'cleanblog_list_date_show',true);
$cleanblog_list_category_show = get_theme_mod( 'cleanblog_list_category_show',true);
$cleanblog_list_author_show = get_theme_mod( 'cleanblog_list_author_show',true);
$cleanblog_list_comments_show = get_theme_mod( 'cleanblog_list_comments_show',true);
$cleanblog_list_share_show = get_theme_mod( 'cleanblog_list_share_show',true);
$cleanblog_read_more_text = get_theme_mod( 'cleanblog_read_more_text','Read More');
$cleanblog_first_full = get_theme_mod( 'cleanblog_first_full', false);

if ($blog_style == 'standard'):?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-article-standard'); ?>>
  <?php if ($cleanblog_list_featured_image_show != false):?>
	<?php if ( has_post_thumbnail()) : ?>
    <div class="cb-post-media">
    <a href="<?php the_permalink(); ?>">
       <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
       </a>
    </div>
    <?php endif; ?>
    <?php endif; ?>
     <div class="cb-post-entry">
         <div class="cb-post-header">
              <?php if ($cleanblog_list_category_show != false):?><div class="cb-post-cat"><?php echo get_the_category_list(); ?></div><?php endif; ?>
                   <h2 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <hr />
                   <?php if ($cleanblog_list_date_show != false):?><span class="cb-post-date entry-date published updated"><?php echo get_the_date(); ?></span><?php endif; ?>     
                        </div>
                        <div class="cb-post-content">
    					<?php
							if( strpos( $post->post_content, '<!--more-->' ) ) {
								the_content('');
							}
							else {
								the_excerpt('');
							}
						?>
                        </div>
                    </div>
                    <div class="cb-post-footer">
                    <div class="cb-post-meta">
                     <?php if ($cleanblog_list_author_show != false):
					 _e( 'By ',  'cleanblog-pro' ); 
					 printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author());
					 ?> 
                      <?php if (($cleanblog_list_author_show != false) && ($cleanblog_list_comments_show != false) ): ?>|<?php endif; ?> <?php
					  endif; if ($cleanblog_list_comments_show != false):
					  ?>
					  <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a>
                      <?php 
  					  endif; ?>
                    </div>
              <div class="cb-post-more">
              <a href="<?php the_permalink(); ?><?php if( strpos( $post->post_content, '<!--more-->' ) ) { ?>#more-<?php the_ID(); }?>" rel="bookmark"><?php echo $cleanblog_read_more_text; ?> </a>
              </div> 
          <div class="cb-post-share">
          <?php if ($cleanblog_list_share_show != false):  cleanblog_posts_share($post->ID); endif; ?>
          </div>
     </div>
</article>
<?php 
// List Layout
elseif($blog_style == 'list'): ?>
<?php 
global $cleanblog_post_count; 
if(($cleanblog_post_count == 1) && ($cleanblog_first_full == true)):?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-article-standard'); ?>>
  <?php if ($cleanblog_list_featured_image_show != false):?>
	<?php if ( has_post_thumbnail()) : ?>
    <div class="cb-post-media">
    <a href="<?php the_permalink(); ?>">
       <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
       </a>
    </div>
    <?php endif; ?>
    <?php endif; ?>
     <div class="cb-post-entry">
         <div class="cb-post-header">
              <?php if ($cleanblog_list_category_show != false):?><div class="cb-post-cat"><?php echo get_the_category_list(); ?></div><?php endif; ?>
                   <h2 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <hr />
                   <?php if ($cleanblog_list_date_show != false):?><span class="cb-post-date entry-date published updated"><?php echo get_the_date(); ?></span><?php endif; ?>     
                        </div>
                        <div class="cb-post-content">
    					<?php
							if( strpos( $post->post_content, '<!--more-->' ) ) {
								the_content('');
							}
							else {
								the_excerpt('');
							}
						?>
                        </div>
                    </div>
                    <div class="cb-post-footer">
                    <div class="cb-post-meta">
                     <?php if ($cleanblog_list_author_show != false):
					 _e( 'By ',  'cleanblog-pro' ); 
					 printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()); ?> 
                      <?php if (($cleanblog_list_author_show != false) && ($cleanblog_list_comments_show != false) ): ?>|<?php endif; ?> <?php
					  endif; if ($cleanblog_list_comments_show != false):
					  ?>
					  <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a>
                      <?php 
  					  endif; ?>
                    </div>
              <div class="cb-post-more">
              <a href="<?php the_permalink(); ?><?php if( strpos( $post->post_content, '<!--more-->' ) ) { ?>#more-<?php the_ID(); }?>" rel="bookmark"><?php echo $cleanblog_read_more_text; ?> </a>
              </div> 
          <div class="cb-post-share">
          <?php if ($cleanblog_list_share_show != false):  cleanblog_posts_share($post->ID); endif; ?>
          </div>
     </div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-article-list'); ?>>
    <div class="cb-list">
    <?php if ($cleanblog_list_featured_image_show != false): ?>
    <?php if ( has_post_thumbnail()) : ?>
        <div class="cb-post-media">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
           <?php the_post_thumbnail("cleanblogg-list-thumb"); ?>
        </a>
        <?php if ($cleanblog_list_date_show != false): ?>
           <span class="cb-post-date entry-date published updated"><?php echo get_the_date(); ?></span>
        <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="cb-list-content">
        	<?php if ($cleanblog_list_category_show != false): ?>
            <div class="cb-post-cat"><?php echo get_the_category_list(); ?></div>
            <?php endif; ?>
            <h2 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <hr />
            <div class="cb-list-entry"><?php the_excerpt(); ?></div>
            <div class="cb-list-footer">
            <?php if (($cleanblog_list_author_show != false) || ($cleanblog_list_comments_show != false)): ?>
            <div class="cb-list-meta">
                     <?php if ($cleanblog_list_author_show != false):
					 _e( 'By ',  'cleanblog-pro' ); 
					 printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author());
					 ?> 
                      <?php if (($cleanblog_list_author_show != false) && ($cleanblog_list_comments_show != false) ): ?>|<?php endif; ?> <?php
					  endif; if ($cleanblog_list_comments_show != false):
					  ?>
					  <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a>
                      <?php
  					  endif; ?>
                    </div>
                    <?php endif; ?>    
            <a href="<?php the_permalink(); ?>" class="cb-more"><?php echo $cleanblog_read_more_text.' &#187'; ?></a>
            </div>
            
        </div>
    </div>
</article>    
<?php endif; ?>
<?php 
// Grid Layout
else: ?>
<?php
if(is_home()):
$home_layout= get_theme_mod( 'cleanblog_home_layout', 'default');
if($home_layout == 'default'):
$content_layout= get_theme_mod( 'cleanblog_content_layout', 'right'); 
else:
$content_layout = $home_layout;
endif;
else:
$content_layout= get_theme_mod( 'cleanblog_content_layout');
endif;
if (!empty($_GET['sidebar'])):
$sidebar = $_GET['sidebar'];
else:
$sidebar = '';
endif;

if( ($content_layout == 'full') || ($sidebar == 'no') ){
	$cb_ex_class = 'col-sm-4 cb-full-width';
	}
elseif( ($content_layout == 'left') || ($sidebar == 'left') ){ 
	$cb_ex_class = 'col-sm-6 cb-sidebar-left';
	}
elseif( $sidebar == 'right' ){ 
	$cb_ex_class = 'col-sm-6 cb-sidebar-right';
	}
else{
	$cb_ex_class = 'col-sm-6 cb-sidebar-right';
	}
?>
<?php 
global $cleanblog_post_count; 
if(($cleanblog_post_count == 1) && ($cleanblog_first_full == true)):?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-article-standard'); ?>>
  <?php if ($cleanblog_list_featured_image_show != false):?>
	<?php if ( has_post_thumbnail()) : ?>
    <div class="cb-post-media">
    <a href="<?php the_permalink(); ?>">
       <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
       </a>
    </div>
    <?php endif; ?>
    <?php endif; ?>
     <div class="cb-post-entry">
         <div class="cb-post-header">
              <?php if ($cleanblog_list_category_show != false):?><div class="cb-post-cat"><?php echo get_the_category_list(); ?></div><?php endif; ?>
                   <h2 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <hr />
                   <?php if ($cleanblog_list_date_show != false):?><span class="cb-post-date entry-date published updated"><?php echo get_the_date(); ?></span><?php endif; ?>     
                        </div>
                        <div class="cb-post-content">
    					<?php
							if( strpos( $post->post_content, '<!--more-->' ) ) {
								the_content('');
							}
							else {
								the_excerpt('');
							}
						?>
                        </div>
                    </div>
                    <div class="cb-post-footer">
                    <div class="cb-post-meta">
                     <?php if ($cleanblog_list_author_show != false):
					 _e( 'By ',  'cleanblog-pro' ); 
					 printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author());
					  ?> 
                      <?php if (($cleanblog_list_author_show != false) && ($cleanblog_list_comments_show != false) ): ?>|<?php endif; ?> <?php
					  endif; if ($cleanblog_list_comments_show != false):
					  ?>
					  <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a>
                      <?php 
  					  endif; ?>
                    </div>
              <div class="cb-post-more">
              <a href="<?php the_permalink(); ?><?php if( strpos( $post->post_content, '<!--more-->' ) ) { ?>#more-<?php the_ID(); }?>" rel="bookmark"><?php echo $cleanblog_read_more_text; ?> </a>
              </div> 
          <div class="cb-post-share">
          <?php if ($cleanblog_list_share_show != false):  cleanblog_posts_share($post->ID); endif; ?>
          </div>
     </div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-article-grid '.$cb_ex_class); ?>>
    <div class="cb-grid">
    <?php if ($cleanblog_list_featured_image_show != false): ?>
    <?php if ( has_post_thumbnail()) : ?>
        <div class="cb-post-media">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
           <?php the_post_thumbnail("cleanblogg-grid-thumb"); ?>
        </a>
        <?php if ($cleanblog_list_date_show != false): ?>
           <span class="cb-post-date entry-date published updated"><?php echo get_the_date(); ?></span>
        <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="cb-grid-content">
        	<?php if ($cleanblog_list_category_show != false): ?>
            <div class="cb-post-cat"><?php echo get_the_category_list(); ?></div>
            <?php endif; ?>
            <h2 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php if (($cleanblog_list_author_show != false) || ($cleanblog_list_comments_show != false)): ?>
            <div class="cb-grid-meta">
                     <?php if ($cleanblog_list_author_show != false):
					 _e( 'By ',  'cleanblog-pro' ); 
					 printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author());
					  ?> 
                      <?php if (($cleanblog_list_author_show != false) && ($cleanblog_list_comments_show != false) ): ?>|<?php endif; ?> <?php
					  endif; if ($cleanblog_list_comments_show != false):
					  ?>
					  <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 Comments',  'cleanblog-pro'), __('1 Comment',  'cleanblog-pro'), __('% Comments',  'cleanblog-pro') ); ?></a>
                      <?php
  					  endif; ?>
                    </div>
                    <?php endif; ?>
            <hr />
            <div class="cb-grid-entry"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="cb-more"><?php echo $cleanblog_read_more_text.' &#187'; ?></a>
            
        </div>
    </div>
</article>
<?php endif; ?>
<?php endif; ?>