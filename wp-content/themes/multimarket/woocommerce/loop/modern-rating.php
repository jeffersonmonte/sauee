<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
global $product;

if ( true == multimarket_get_option( 'product_star_rating' ) )
	return;

if ( $product->get_average_rating() > 0 ) {
	echo wc_get_rating_html( $product->get_average_rating() );
} else {
	?>
	<div class="star-rating" title="Rated 0.00 out of 5"><span style="width:0"><strong class="rating">0.00</strong> <?php esc_html_e( 'out of 5', 'multimarket' ); ?></span></div>
	<?php 
}
