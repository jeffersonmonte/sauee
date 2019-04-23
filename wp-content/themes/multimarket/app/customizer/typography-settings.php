<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_customizer_typography_settings' );
function multimarket_customizer_typography_settings( $customizer_options ) {

	/* ===========================================================================================*
	 *  Typography Settings Panel 					 				  								  *
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'multimarket_panel_typography_settings',
		'label'		=> esc_html__( 'Typography', 'multimarket' ),
		'priority'	=> 12,
		'type' 		=> 'panel'
	);

	/* ==================================================== *
	 *  Body Font Settings Section                         *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_body_font_settings',
		'label'		=> esc_html__( 'Body Font Style', 'multimarket' ),
		'priority'	=> 1,
		'panel'		=> 'multimarket_panel_typography_settings',
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Typography Color Settings Data                              *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_body_font',
			'default'	=> 'Hind Guntur',
			'label'		=> esc_html__( 'Font Family', 'multimarket' ),
			'section'	=> 'multimarket_body_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'google_font',
			'font_amount'	=> 5000,
		);

		$customizer_options[] = array(
			'slug'      => 'multimarket_body_font_size',
			'default'   => '18',
			'label'     => esc_html__( 'Font Size', 'multimarket' ),
			'section'   => 'multimarket_body_font_settings',
			'output'    => 'false',
			'min'       => 10,
			'max'       => 24,
			'transport' => 'refresh',
			'type'      => 'slider_input'
		);

		$customizer_options[] = array(
			'slug'      => 'multimarket_body_font_weight',
			'default'   => '400',
			'label'     => esc_html__( 'Font Weight', 'multimarket' ),
			'section'   => 'multimarket_body_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'select',
			'choices'	=> array(
				'300' => '300',
				'400' => '400',
				'600' => '600',
				'700' => '700',
			)
		);

		$customizer_options[] = array(
			'slug'      => 'multimarket_body_line_height',
			'default'   => '1.7',
			'label'     => esc_html__( 'Line Height', 'multimarket' ),
			'section'   => 'multimarket_body_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'text'
		);

	/* ==================================================== *
	 *  Heading Font Settings Section                         *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_heading_font_settings',
		'label'		=> esc_html__( 'Heading Font Style', 'multimarket' ),
		'priority'	=> 2,
		'panel'		=> 'multimarket_panel_typography_settings',
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Typography Heading Settings Data                              *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_heading_font',
			'default'	=> 'Hind Guntur',
			'label'		=> esc_html__( 'Font Family', 'multimarket' ),
			'section'	=> 'multimarket_heading_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'google_font',
			'font_amount'	=> 5000,
		); 

		$customizer_options[] = array(
			'slug'      => 'multimarket_heading_font_weight',
			'default'   => '700',
			'label'     => esc_html__( 'Font Weight', 'multimarket' ),
			'section'   => 'multimarket_heading_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'select',
			'choices'	=> array(
				'300' => '300',
				'400' => '400',
				'600' => '600',
				'700' => '700',
			)
		);

		$customizer_options[] = array(
			'slug'      => 'multimarket_heading_text_transform',
			'default'   => false,
			'label'     => esc_html__( 'Transform Text', 'multimarket' ),
			'section'   => 'multimarket_heading_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'checkbox'
		);

		$customizer_options[] = array(
			'slug'      => 'multimarket_heading_letter_spacing',
			'default'   => '0',
			'label'     => esc_html__( 'Letter Spacing', 'multimarket' ),
			'section'   => 'multimarket_heading_font_settings',
			'output'    => 'false',
			'min'       => -5,
			'max'       => 5,
			'transport' => 'refresh',
			'type'      => 'slider_input'
		);


	/* ==================================================== *
	 *  Quote/Decoration Font Settings Section                         *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_quote_font_settings',
		'label'		=> esc_html__( 'Quote / Decoration', 'multimarket' ),
		'priority'	=> 3,
		'panel'		=> 'multimarket_panel_typography_settings',
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Typography Quote/Decoration Settings Data                              *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_quote_font',
			'default'	=> 'Merriweather',
			'label'		=> esc_html__( 'Font Family', 'multimarket' ),
			'section'	=> 'multimarket_quote_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'google_font',
			'font_amount'	=> 5000,
		);

	
	return $customizer_options;
}

