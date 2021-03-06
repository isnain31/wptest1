<?php  
$cb_widgets= get_theme_mod( 'cleanblog_footer_widgets_show','none'); 
$cb_copyright_show= get_theme_mod( 'cleanblog_footer_copyright_show');
$cb_copyright= get_theme_mod( 'cleanblog_footer_copyright',sprintf( __( 'Copyright 2015 CleanBlog | Theme by %s', 'cleanblog-pro' ), '<a href="http://airthemes.net/cleanblog" target="_blank">AirThemes</a>' ));
$cb_footer_social = get_theme_mod( 'cleanblog_social_in_footer', 'show'); 
$cb_footer_socket = get_theme_mod( 'cleanblog_footer_socket', 'show');

$cb_fb = get_theme_mod( 'cleanblog_fb');
$cb_twitter = get_theme_mod( 'cleanblog_twitter');
$cb_googleplus = get_theme_mod( 'cleanblog_googleplus');
$cb_instagram = get_theme_mod( 'cleanblog_instagram');
$cb_pinterest = get_theme_mod( 'cleanblog_pinterest');
$cb_rss = get_theme_mod( 'cleanblog_rss');
?>
<footer id="cb-footer">
	<?php if ( is_active_sidebar( 'cb-instagram-footer' ) ) : ?>
    <div class="cb-footer-instagram">
    <?php dynamic_sidebar( 'cb-instagram-footer' ); ?>
    </div> 
    <?php endif; ?>
    <?php if(!empty($cb_widgets) && $cb_widgets != 'none'): ?>
    <div class="cb-footer-widgets">
        <div class="container-fluid">
            <div class="row"> 
                <?php if($cb_widgets == 'three'): ?>
                <div class="col-sm-4 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget1' ); ?>
                </div>
                <div class="col-sm-4 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget2' ); ?>
                </div>
                <div class="col-sm-4 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget3' ); ?>
                </div>
                <?php elseif($cb_widgets == 'two'): ?>
                <div class="col-sm-6 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget1' ); ?>
                </div>
                <div class="col-sm-6 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget2' ); ?>
                </div>
                <?php else: ?>
                <div class="col-sm-12 cb-footer-widget">
                <?php dynamic_sidebar( 'cb-footer-widget1' ); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>     
    </div>
<?php endif; ?>
    <?php if($cb_footer_socket !="hide"):?>
    <div class="cb-socket">
        <div class="container-fluid cb-footer-bottom">
            <div class="row">
                <div class="col-sm-6 cb-copyright">
                    <?php if ($cb_copyright_show!= "hide" ): ?>
                    <p><?php echo $cb_copyright; ?></p>
                    <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if ($cb_footer_social != "hide" ): ?>
                        <div class="cb-footer-social">
                        <?php cleanblog_social(); ?>    
                        </div>
                        <?php endif; ?> <!-- Footer Social -->
                    </div>
                </div>
            </div>
    </div>
    <?php endif;?>
    </footer>
<div id="fb-root"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>