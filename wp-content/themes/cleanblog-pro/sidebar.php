<?php 
if (function_exists('is_woocommerce')):
if(is_woocommerce()):?>
<aside id="sidebar">
    <?php if ( is_active_sidebar( 'cb-woo-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'cb-woo-sidebar' ); ?>
	<?php endif; ?>
</aside>
<?php else: ?>
<aside id="sidebar">
    <?php if ( is_active_sidebar( 'cb-sidebar-widget' ) ) : ?>
		<?php dynamic_sidebar( 'cb-sidebar-widget' ); ?>
	<?php endif; ?>
</aside><!--sidebar-->
<?php 
endif;
else: ?>
<aside id="sidebar">
    <?php if ( is_active_sidebar( 'cb-sidebar-widget' ) ) : ?>
		<?php dynamic_sidebar( 'cb-sidebar-widget' ); ?>
	<?php endif; ?>
</aside><!--sidebar-->
<?php
endif;
 ?>