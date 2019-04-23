<?php 
	 add_action( 'wp_enqueue_scripts', 'multimarket_child_theme_enqueue_styles' );
	 function multimarket_child_theme_enqueue_styles() { 
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 
 ?>