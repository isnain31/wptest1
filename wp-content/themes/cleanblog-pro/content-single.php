<?php
$cleanblog_single_featured_image_show = get_theme_mod( 'cleanblog_single_featured_image_show',true);
$cleanblog_single_category_show = get_theme_mod( 'cleanblog_single_category_show',true);
$cleanblog_single_share_show = get_theme_mod( 'cleanblog_single_share_show',true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cb-single'); ?>>
  <?php if ($cleanblog_single_featured_image_show != false):?>
  <?php if (has_post_thumbnail()) : ?>
  <div class="cb-post-media">
    <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
  </div>
  <?php endif; ?>
  <?php endif; ?>
  <div class="cb-post-entry">
    <div class="cb-post-header">
      <?php if ($cleanblog_single_category_show != false):?>
      <div class="cb-post-cat"><?php echo get_the_category_list(); ?></div>
      <?php endif; ?>
      <h1 class="cb-post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a></h1>
      <?php cleanblogg_single_meta(); ?>
    </div>
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
  <?php cleanblogg_link_pages(); ?>
<?php 
cleanblogg_author_box();
cleanblogg_next_pre_posts();
cleanblogg_related_posts(); 
?>
</article>