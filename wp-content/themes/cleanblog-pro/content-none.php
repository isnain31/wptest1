<section class="cb-content">
	<div class="container-fluid">
    	<div class="row">
            <div class="cb-content-none col-xs-12">
                <h1><?php _e( 'Nothing Found',  'cleanblog-pro' ); ?></h1>
                <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.',  'cleanblog-pro' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                <?php elseif ( is_search() ) : ?>
                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',  'cleanblog-pro' ); ?></p>
                <?php get_search_form(); ?>
                <?php else : ?>
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',  'cleanblog-pro' ); ?></p>
                <?php get_search_form(); ?>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>	