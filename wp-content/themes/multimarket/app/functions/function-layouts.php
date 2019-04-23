<?php

/**
 * Get site layout
 *
 * @return void
 * @author tokoo
 **/
function multimarket_get_site_layout() {
	$global_layout 	= get_theme_mod( 'multimarket_global_layout', 'fullwidth' );
	$get_layouts 	= multimarket_get_meta( '_layouts_details' );
	$layout 		= ! empty( $get_layouts['theme_layouts'] ) ? $get_layouts['theme_layouts'] : $global_layout;
	return $layout;
}

/**
 * Wrapper Class Handles
 *
 * @return void
 * @author tokoo
 **/
function multimarket_wrapper_class_handles() {
	$get_layouts 	= multimarket_get_site_layout(); 

	if ( ! empty( $get_layouts ) ) {
		switch ( $get_layouts ) {
			case 'left-sidebar':
				echo esc_attr( 'has-sidebar layout-left-sidebar' );
				break;
			case 'right-sidebar':
				echo esc_attr( 'has-sidebar layout-right-sidebar' );
				break;
			default:
				echo '';
				break;
		}
	}
}

/**
 * Column Class Handles
 *
 * @return void
 * @author tokoo
 **/
function multimarket_columns_class_handles() {
	$get_layouts 	= multimarket_get_site_layout(); 

	if ( ! empty( $get_layouts ) ) {
		switch ( $get_layouts ) {
			case 'left-sidebar':
			case 'right-sidebar':
				echo esc_attr( 'col-md-8' );
				break;
			default:
				echo '';
				break;
		}
	}

}

/**
 * Post holder columns
 *
 * @return void
 * @author tokoo
 **/
function multimarket_post_holder_columns() {
	if ( multimarket_is_has_sidebar() ) {
		echo 'columns-2';
	} else {
		echo '';
	}

}

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function multimarket_is_has_sidebar() {
	$get_layouts 	= multimarket_get_site_layout(); 
	if ( ! empty( $get_layouts ) && ( 'left-sidebar' == $get_layouts || 'right-sidebar' == $get_layouts ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function multimarket_print_filter_class_alphabet( $string = '' ) {
	if ( ! empty( $string ) ) {
		$string = $string[0];
		echo ''.$string;
	}
}

/**
 * Get page title background Image
 *
 * @return void
 * @author tokoo
 **/
function multimarket_get_page_title_background_image_src() {
	if ( function_exists( 'carbon_get_term_meta' ) ) {
		$id 				= get_queried_object_id();
		$get_tax_bg_img_id 	= carbon_get_term_meta( $id, 'multimarket_tax_page_title_background' );
		$get_bg_image_src 	= wp_get_attachment_image_src( $get_tax_bg_img_id, 'full' );
		
		if ( ! empty( $get_tax_bg_img_id ) ) {
			return $get_bg_image_src[0];
		} else {
			return null;
		}
	}
}

/**
 * Display Custom FOoter
 *
 * @return void
 * @author tokoo
 **/
function multimarket_display_custom_footer() {
	$global_footer 		= get_theme_mod( 'multimarket_footer_page' );
	$perpage_footer 	= multimarket_get_meta( '_page_details' );
	$footer_page 		= ! empty( $perpage_footer['footer_page'] ) ? $perpage_footer['footer_page'] : $global_footer;

	if ( true == $use_global_footer ) {
		$footer_content = get_post_field( 'post_content', $global_footer );
		echo do_shortcode( $footer_content );
	}
}

add_filter( 'body_class', 'multimarket_no_page_header_body_class' );
function multimarket_no_page_header_body_class( $classes ) {
	if ( is_page_template( 'templates/composer.php' ) || is_404() || is_singular( 'product' ) || is_singular( 'post' )  || is_page_template( 'templates/temp-single-product.php' ) ) {
		$classes[] = 'no-page-header';
	}

	return $classes;
}
