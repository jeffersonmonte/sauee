<?php 

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
add_action( 'init', 'multimarket_register_post_format' );
function multimarket_register_post_format() {
	add_post_type_support( 'product', 'post-formats' );
}