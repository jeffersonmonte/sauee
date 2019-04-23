<?php

/**
 * Extends search form 
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'get_search_form', 'multimarket_extend_searchform' );
function multimarket_extend_searchform( $form ) {
	ob_start();
	?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'multimarket' ); ?>">
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'multimarket' ); ?>">
	</form>
	<?php 
	$form = ob_get_contents();
	ob_get_clean();

	return $form;
}
