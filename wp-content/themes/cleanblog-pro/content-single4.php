<?php
$cleanblog_single_featured_image_show = get_theme_mod( 'cleanblog_single_featured_image_show',true);
$cleanblog_single_category_show = get_theme_mod( 'cleanblog_single_category_show',true);
$cleanblog_single_share_show = get_theme_mod( 'cleanblog_single_share_show',true);
$single_layout = get_theme_mod( 'cleanblog_single_post_layout', 'default');
if($single_layout == 'default'):
$content_layout= get_theme_mod( 'cleanblog_content_layout', 'right'); 
else:
$content_layout = $single_layout;
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-single'); ?>>
<div class="col-sm-12">
<?php if (($cleanblog_single_featured_image_show != false) && (has_post_thumbnail())):?>   
      <div class="cb-post-media">
        <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
      <div class="cb-post-header">
        <?php if ($cleanblog_single_category_show != false):?>
        <div class="cb-post-cat"><?php echo get_the_category_list(); ?></div>
        <?php endif; ?>
        <h1 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_title(); ?>
          </a></h1>
        <?php cleanblogg_single_meta(); ?>
      </div>
      </div>
      <?php else: ?>
<div class="cb-post-header">
        <?php if ($cleanblog_single_category_show != false):?>
        <div class="cb-post-cat"><?php echo get_the_category_list(); ?></div>
        <?php endif; ?>
        <h1 class="cb-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_title(); ?>
          </a></h1>
        <?php cleanblogg_single_meta(); ?>
      </div>
      <?php endif; ?>
</div>      
<div class="cb-main <?php if($content_layout == 'full'){echo 'col-sm-12';} else {echo 'col-md-8';}?>">
    <div class="cb-post-entry">   
      <div class="cb-post-content">
        <?php the_content(''); ?>
      </div>
      <?php cleanblogg_tags(); ?>
    </div>
    <div class="cb-post-footer">
      <?php if ($cleanblog_single_share_show != false): ?>
      <div class="cb-post-share"> <span><?php echo __('Share This Post', 'cleanblog-pro')?></span>
        <?php  cleanblog_posts_share($post->ID); ?>
      </div>
      <?php endif; ?>
    </div>
    <?php 
cleanblogg_link_pages();
cleanblogg_author_box();
cleanblogg_next_pre_posts();
cleanblogg_related_posts(); 
if ( comments_open() || '0' != get_comments_number() ) :
    comments_template();
endif; 
?>
</div>
<?php if($content_layout != 'full'): ?>
<div class="cb-side-bar col-sm-4">
  <?php get_sidebar(); ?>
</div>
<?php endif; ?>
</article>