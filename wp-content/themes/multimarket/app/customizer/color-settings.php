<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Color Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_general_color_settings_data' );
function multimarket_general_color_settings_data( $customizer_options ) {

	/* ===========================================================================================*
	 *  General Settings Panel 					 				  								  *
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'multimarket_panel_color_settings',
		'label'		=> esc_html__( 'Colors', 'multimarket' ),
		'priority'	=> 5,
		'type' 		=> 'panel'
	);

	/* ==================================================== *
	 *  Accent Color Settings Section | No Panel            *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_general_color_settings',
		'label'		=> esc_html__( 'General', 'multimarket' ),
		'priority'	=> 10,
		'panel'		=> 'multimarket_panel_color_settings',
		'type' 		=> 'section' 
	);

		/* ============================================================ *
		 *  Accent Color Settings Data                                  *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_accent_color',
			'default'   => '#6777E5',
			'label'     => esc_html__( 'Accent Color', 'multimarket' ),
			'section'	=> 'multimarket_general_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color', 
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_body_color',
			'default'	=> '#F5F6F9',
			'label'		=> esc_html__( 'Body Background Color', 'multimarket' ),
			'section'	=> 'multimarket_general_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color',
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_heading_color',
			'default'   => '#2B2B2B',
			'label'     => esc_html__( 'Heading Color', 'multimarket' ),
			'section'	=> 'multimarket_general_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_text_color',
			'default'   => '#707281',
			'label'     => esc_html__( 'Text Color', 'multimarket' ),
			'section'	=> 'multimarket_general_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

	/* ==================================================== *
	 *  Button Color           								*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_color_button_settings',
		'label'		=> esc_html__( 'Button', 'multimarket' ),
		'priority'	=> 11,
		'panel'		=> 'multimarket_panel_color_settings',
		'type' 		=> 'section' 
	);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_primary_button_color',
			'default'   => '#4FC974',
			'label'     => esc_html__( 'Primary Button Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_primary_button_color_hover',
			'default'   => '#4FC974',
			'label'     => esc_html__( 'Primary Button Hover Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_primary_button_text_color',
			'default'   => '#ffffff',
			'label'     => esc_html__( 'Primary Button Text Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_secondary_button_color',
			'default'   => '#6777E5',
			'label'     => esc_html__( 'Secondary Button Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_secondary_button_color_hover',
			'default'   => '#6777E5',
			'label'     => esc_html__( 'Secondary Button Hover Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_secondary_button_text_color',
			'default'   => '#ffffff',
			'label'     => esc_html__( 'Secondary Button Text Color', 'multimarket' ),
			'section'	=> 'multimarket_color_button_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

	/* ==================================================== *
	 *  Page Title           								*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_color_page_title_settings',
		'label'		=> esc_html__( 'Page Title', 'multimarket' ),
		'priority'	=> 12,
		'panel'		=> 'multimarket_panel_color_settings',
		'type' 		=> 'section' 
	);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_page_title_color',
			'default'   => '#050A2C',
			'label'     => esc_html__( 'Title Color', 'multimarket' ),
			'section'	=> 'multimarket_color_page_title_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);


	return $customizer_options;
}

