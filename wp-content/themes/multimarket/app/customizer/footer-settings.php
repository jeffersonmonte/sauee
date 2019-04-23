<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// General Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_footer_settings_data' );
function multimarket_footer_settings_data( $customizer_options ) {


	/* ==================================================== *
	 *  Footer Section  										*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_footer_settings',
		'label'		=> esc_html__( 'Footer', 'multimarket' ),
		'priority'	=> 10,
		'type' 		=> 'section'
	);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_payment_logo',
			'default'	=> '',
			'priority'	=> 3,
			'label'		=> esc_html__( 'Payment Logo', 'multimarket' ),
			'section'	=> 'multimarket_footer_settings',
			'output'    => false,
			'transport'	=> 'postMessage',
			'type' 		=> 'images'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_footer_content',
			'default'	=> '',
			'priority'	=> 5,
			'label'		=> esc_html__( 'Footer Credits', 'multimarket' ),
			'section'	=> 'multimarket_footer_settings',
			'output'    => false,
			'transport'	=> 'refresh',
			'type' 		=> 'textarea'
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_sidebar_footer_columns',
			'default'	=> '3',
			'label'		=> esc_html__( 'Footer Sidebar Columns', 'multimarket' ),
			'section'	=> 'multimarket_footer_settings',
			'output'    => false,
			'transport'	=> 'refresh',
			'type' 		=> 'select',
			'choices'	=> array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
			)
		);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_footer_page',
			'default'	=> '',
			'label'		=> esc_html__( 'Select Footer Page', 'multimarket' ),
			'section'	=> 'multimarket_footer_settings',
			'output'    => false,
			'transport'	=> 'refresh',
			'type' 		=> 'select',
			'choices'	=> multimarket_get_posts( 'page', esc_html__( 'Default Footer', 'multimarket' ) )
		);

	return $customizer_options;
}

