<?php 

add_action( 'media_buttons', 'multimarket_add_my_media_button', 15 );
function multimarket_add_my_media_button() {
    echo '<span class="tokoo-iconpicker-wrap"><a href="#" class="button tokoo-iconpicker-shortcode">Livre Icon</a></span>';
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'admin_enqueue_scripts', 'multimarket_fi_shortcodes_scripts' );
function multimarket_fi_shortcodes_scripts() {
	wp_enqueue_script( 'multimarket_fi_shortcodes', MULTIMARKET_THEME_URI . '/assets/js/fi-shortcodes.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'multimarket_fi_shortcodes', MULTIMARKET_THEME_URI . '/assets/fonts/multimarket-icons/style.css' );
	wp_enqueue_style( 'multimarket_fi_shortcodes_admin', MULTIMARKET_THEME_URI . '/bootstrap/assets/css/admin.css' );
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'wp_enqueue_scripts', 'multimarket_fi_shortcodes_scripts_front' );
function multimarket_fi_shortcodes_scripts_front() {
	wp_enqueue_style( 'multimarket_fi_shortcodes', MULTIMARKET_THEME_URI . '/assets/fonts/multimarket-icons/style.css' );
}