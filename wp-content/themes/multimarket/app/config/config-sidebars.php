<?php

return array(

	/*
	* Edit this file to add widget sidebars to your theme.
	* Place WordPress default settings for sidebars.
	* Add as many as you want, watch-out your commas!
	*/
 	array(

		'name'			=> esc_html__( 'Primary', 'multimarket' ),
		'id'			=> 'multimarket-primary',
		'description'	=> esc_html__( 'Area of primary sidebar', 'multimarket' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	),
	array(
		'name'			=> esc_html__( 'Footer One', 'multimarket' ),
		'id'			=> 'multimarket-footer-1',
		'description'	=> esc_html__( 'Widget Area of Footer First column', 'multimarket' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

	array(
		'name'			=> esc_html__( 'Footer Two', 'multimarket' ),
		'id'			=> 'multimarket-footer-2',
		'description'	=> esc_html__( 'Widget Area of Footer Second column', 'multimarket' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

	array(
		'name'			=> esc_html__( 'Footer Three', 'multimarket' ),
		'id'			=> 'multimarket-footer-3',
		'description'	=> esc_html__( 'Widget Area of Footer Third column', 'multimarket' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

	array(
		'name'			=> esc_html__( 'Footer Four', 'multimarket' ),
		'id'			=> 'multimarket-footer-4',
		'description'	=> esc_html__( 'Widget Area of Footer Fourth column', 'multimarket' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

);