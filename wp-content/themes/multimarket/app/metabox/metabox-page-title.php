<?php 

if ( ! class_exists( 'Carbon_Fields\Container' ) ) {
	return;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'term_meta', esc_html__( 'Subtitle', 'multimarket' ) )
	->show_on_taxonomy( array( 'book_author', 'product_cat' ) )
	->add_fields( array(
		Field::make( 'text', 'multimarket_tax_subtitle', esc_html__( 'Subtitle', 'multimarket' ) ),
));
 
Container::make( 'term_meta', esc_html__( 'Page Title Background', 'multimarket' ) )
	->show_on_taxonomy( array( 'category', 'post_tag', 'product_tag', 'product_cat', 'book_author', 'book_publisher', 'book_series' ) )
	->add_fields( array(
		Field::make( 'image', 'multimarket_tax_page_title_background', esc_html__( 'Page Title Background Image (Preferred size : 1600x600 )', 'multimarket' ) ),
));

