<?php
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );

// Woocommerce Support Enable
add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

// Posts pre page
function cleanblogg_woo_posts_per_page( $cols ) {
	$cols = (int)get_theme_mod( 'cleanblog_woo_products_pre_page', 12);
    return $cols;
}
add_filter( 'loop_shop_per_page', 'cleanblogg_woo_posts_per_page' );

// Number of Columns in Archive
function cleanblogg_woo_shop_columns( $columns ) {
	$columns = (int)get_theme_mod( 'cleanblog_woo_archive_column', 4);
	return $columns;
}
add_filter( 'loop_shop_columns', 'cleanblogg_woo_shop_columns' );
function cleanblogg_woo_shop_columns_body_class( $classes ) {
	$columns = (int)get_theme_mod( 'cleanblog_woo_archive_column', 4);
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		$classes[] = 'columns-'.$columns;
	}
	return $classes;
}
add_filter( 'body_class', 'cleanblogg_woo_shop_columns_body_class' );


// Number of Columns in related & upsell
function cleanblogg_woo_related_posts_per_page( $args ) {
	$args['posts_per_page'] = (int)get_theme_mod( 'cleanblog_woo_related_column', 4);
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'cleanblogg_woo_related_posts_per_page' );
function cleanblogg_woo_single_loops_columns( $columns ) {
	$columns = (int)get_theme_mod( 'cleanblog_woo_related_column', 4);
	return $columns;
}
add_filter( 'woocommerce_up_sells_columns', 'cleanblogg_woo_single_loops_columns' );
function cleanblogg_woo_related_columns( $args ) {
	$args['columns'] = (int)get_theme_mod( 'cleanblog_woo_related_column', 4);
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'cleanblogg_woo_related_columns', 10 );
function cleanblogg_woo_single_loops_columns_body_class( $classes ) {
	$columns = (int)get_theme_mod( 'cleanblog_woo_related_column', 4);
	if ( is_singular( 'product' ) ) {
		$classes[] = 'columns-'.$columns;
	}
	return $classes;
}
add_filter( 'body_class', 'cleanblogg_woo_single_loops_columns_body_class' );

// Pagination Icon
function cleanblogg_woo_pagination_args( $args ) {
	$args['prev_text'] = '<i class="fa fa-angle-left"></i>';
	$args['next_text'] = '<i class="fa fa-angle-right"></i>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'cleanblogg_woo_pagination_args' );

// Gallery Thumbnail column 
function cleanblogg_woo_product_thumbnails_columns() {
	$columns = (int)get_theme_mod( 'cleanblog_woo_gallery_thumb_column', 4);
	return $columns;
}
add_action( 'woocommerce_product_thumbnails_columns', 'cleanblogg_woo_product_thumbnails_columns' );

// Function returns the main menu cart link
function cleanblogg_header_cart_item() {

	$output = '';

	$cart_count = WC()->cart->cart_contents_count;

	$css_class = 'cb-header-cart-total cb-cart-total-'. intval( $cart_count );

	if ( $cart_count ) {
		$url  = WC()->cart->get_cart_url();
	} else {
		$url  = wc_get_page_permalink( 'shop' );
	}

	$html = $cart_extra = WC()->cart->get_cart_total();
	$html = str_replace( 'amount', '', $html );

	$output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

		$output .= '<span class="fa fa-shopping-bag"></span>';
		$output .= '<label class="count">'.$cart_count.'</label>';
		if($cart_count != 0):
		$output .= wp_kses_post( $html );
		endif;
		
	$output .= '</a>';

	return $output;
}


// Update cart link with AJAX
function wpex_main_menu_cart_link_fragments( $fragments ) {
	$fragments['.cb-header-cart-total'] = cleanblogg_header_cart_item();
	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'wpex_main_menu_cart_link_fragments' );
?>