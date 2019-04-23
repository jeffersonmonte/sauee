<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_customizer_layout_settings' );
function multimarket_customizer_layout_settings( $customizer_options ) {

	/* ==================================================== *
	 *  Site Section  										*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_layout_settings',
		'label'		=> esc_html__( 'Layout', 'multimarket' ),
		'priority'	=> 3,
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Layout Data  													*
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_global_layout',
			'default'	=> 'fullwidth',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Global Site Layout', 'multimarket' ),
			'section'	=> 'multimarket_layout_settings',
			'output'    => false,
			'transport'	=> 'refresh',
			'type' 		=> 'select',
			'choices'	=> array(
				'fullwidth'			=> esc_html__( 'Fullwidth', 'multimarket' ),
				'left-sidebar'		=> esc_html__( 'Left Sidebar', 'multimarket' ),
				'right-sidebar'		=> esc_html__( 'Right Sidebar', 'multimarket' ),
			)
		);


	return $customizer_options;
}

