<?php 
$cleanblog_single_product_layout = get_theme_mod( 'cleanblog_single_product_layout', 'right');
$cleanblog_products_archive_layout = get_theme_mod( 'cleanblog_products_archive_layout', 'right');
get_header(); 
?>
<div class="cb-content <?php if (is_singular('product')): echo 'cb-'.$cleanblog_single_product_layout; else: echo 'cb-'.$cleanblog_products_archive_layout; endif; ?>">
  <div class="container-fluid">
    <div class="row">
      <?php if (is_singular('product')): ?>
      <div class="cb-main <?php if($cleanblog_single_product_layout == 'full'): echo "col-md-12"; else: echo "col-md-8"; endif; ?>">
        <?php woocommerce_content(); ?>
      </div>
      <?php if($cleanblog_single_product_layout != 'full'): ?>
      <div class="cb-side-bar col-sm-4">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>
      <?php else: // Archive Products?>
      <div class="cb-main <?php if($cleanblog_products_archive_layout == 'full'): echo "col-md-12"; else: echo "col-md-8"; endif; ?>">
        <?php woocommerce_content(); ?>
      </div>
      <?php if($cleanblog_products_archive_layout != 'full'): ?>
      <div class="cb-side-bar col-sm-4">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>