<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// General Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_header_settings_data' );
function multimarket_header_settings_data( $customizer_options ) {


	/* ==================================================== *
	 *  Header Section  									*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_header_settings',
		'label'		=> esc_html__( 'Header', 'multimarket' ),
		'priority'	=> 6,
		'type' 		=> 'section'
	);

		/* ============================================================ *
			 *  Header Color Scheme											*
			 * ============================================================ */
			// $customizer_options[] = array(
			// 	'slug'    	=> 'multimarket_header_type',
			// 	'type'  	=> 'select',
			// 	'default'	=> 'type_1',
			// 	'priority'	=> 0,
			// 	'label' 	=> esc_html__( 'Header Type', 'multimarket' ),
			// 	'section'	=> 'multimarket_header_settings',
			// 	'output'    => false,
			// 	'transport'	=> 'refresh',
			// 	'choices'	=> array(
			// 		'type_1' 	=> esc_html__( 'Type 1 - Default', 'multimarket' ),
			// 		'type_2' 	=> esc_html__( 'Type 2', 'multimarket' ),
			// 	),
			// );
			$customizer_options[] = array(
				'slug'		=> 'multimarket_menu_opening_method',
				'default'	=> 'onclick',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Menu Opening Method', 'multimarket' ),
				'section'	=> 'multimarket_header_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'	=> array(
					'onclick'		=> esc_html__( 'On Click', 'multimarket' ),
					'onhover'		=> esc_html__( 'On Hover', 'multimarket' ),
				)
			);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_page_title_background',
				'default'	=> '',
				'priority'	=> 2,
				'label'		=> esc_html__( 'Global Page Title Background (1600x600 px)', 'multimarket' ),
				'section'	=> 'multimarket_header_settings', 
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'images'
			);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_sticky_header',
				'default'	=> '',
				'priority'	=> 3,
				'label'		=> esc_html__( 'Sticky Header', 'multimarket' ),
				'section'	=> 'multimarket_header_settings', 
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'checkbox'
			);

	return $customizer_options;
}

