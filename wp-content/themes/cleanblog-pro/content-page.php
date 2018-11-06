<article id="post-<?php the_ID(); ?>" <?php post_class('cb-single'); ?>>
	<?php if ( has_post_thumbnail()) : ?>
    <div class="cb-post-media">
       <?php the_post_thumbnail("cleanblogg-full-thumb"); ?>
    </div>
    <?php endif; ?>
    <div class="cb-post-entry">
          <div class="cb-post-header">
         		<h2 class="cb-post-title"><?php the_title(); ?></h2>
          </div>
          <div class="cb-post-content">
                <?php the_content(''); ?>
          </div>
    </div>
    <?php if (get_theme_mod( 'cleanblog_page_share_show') != false): ?>
    <div class="cb-post-footer">
        <div class="cb-post-share">
        <span><?php echo __('Share This Post', 'cleanblog-pro')?></span>
        <?php cleanblog_posts_share($post->ID); ?>
        </div>
    </div>
    <?php endif; ?>
</article> 