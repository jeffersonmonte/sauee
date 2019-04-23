<?php 

/**
 * Dokan Search Form
 *
 * @return void
 * @author tokoo
 **/
function multimarket_dokan_search_form() {
	global $post;
	$pagination_base 	= str_replace( $post->ID, '%#%', esc_url( get_pagenum_link( $post->ID ) ) );
	$search_query 		= isset( $_GET['dokan_seller_search'] ) ? sanitize_text_field( $_GET['dokan_seller_search'] ) : '';

	if ( ! empty( $search_query ) ) {
		printf( '<h2>' . esc_html__( 'Search Results for: %s', 'multimarket' ) . '</h2>', $search_query );
	}
	?>
	<form role="search" method="get" class="dokan-seller-search-form" action="">
		<input type="search" id="search" class="search-field dokan-seller-search" placeholder="<?php esc_attr_e( 'Search Vendor &hellip;', 'multimarket' ); ?>" value="<?php echo esc_attr( $search_query ); ?>" name="dokan_seller_search" title="<?php esc_attr_e( 'Search seller &hellip;', 'multimarket' ); ?>" />
		<input type="hidden" id="pagination_base" name="pagination_base" value="<?php echo ''.$pagination_base ?>" />
		<input type="hidden" id="nonce" name="nonce" value="<?php echo wp_create_nonce( 'dokan-seller-listing-search' ); ?>" />
		<div class="dokan-overlay" style="display: none;"><span class="dokan-ajax-loader"></span></div>
	</form>
	<?php 
}