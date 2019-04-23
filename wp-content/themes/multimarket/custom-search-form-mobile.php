<?php
/**
 * The template for displaying custom search form.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Livre
 */

if ( class_exists( 'WooCommerce' ) ) {
	$taxonomy  	= 'product_cat';
} else {
	$taxonomy  	= 'category';
}
?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<div class="product-search-input">
		<input id="product-search-keyword-mobile" type="text" name="s" placeholder="<?php esc_html_e( 'Type to search keywords and hit enter', 'multimarket' ); ?>">

		<div class="search-icon">
			<div class="fa fa-search"></div>
		</div>
		<div class="line"></div>
	</div>
 </form>
