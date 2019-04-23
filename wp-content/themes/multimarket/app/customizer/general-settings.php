<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_customizer_general_settings' );
function multimarket_customizer_general_settings( $customizer_options ) {

	/* ===========================================================================================*
	 *  General Settings Panel 					 				  								  *
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'multimarket_panel_general_settings',
		'label'		=> esc_html__( 'General', 'multimarket' ),
		'priority'	=> 1,
		'type' 		=> 'panel'
	);

		/* ==================================================== *
		 *  Social Icons Section  								*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_social_icons_settings',
			'label'		=> esc_html__( 'Social Icons', 'multimarket' ),
			'panel'	    => 'multimarket_panel_general_settings',
			'priority'	=> 1,
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 * Account Data  												*
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_fb',
				'default'	=> '',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Facebook Username', 'multimarket' ),
				'section'	=> 'multimarket_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'multimarket_tw',
				'default'	=> '',
				'priority'	=> 2,
				'label'		=> esc_html__( 'Twitter Username', 'multimarket' ),
				'section'	=> 'multimarket_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'multimarket_gplus',
				'default'	=> '',
				'priority'	=> 5,
				'label'		=> esc_html__( 'Google Plus Username', 'multimarket' ),
				'section'	=> 'multimarket_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'multimarket_pinterest',
				'default'	=> '',
				'priority'	=> 6,
				'label'		=> esc_html__( 'Pinterest Username', 'multimarket' ),
				'section'	=> 'multimarket_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'multimarket_ig',
				'default'	=> '',
				'priority'	=> 7,
				'label'		=> esc_html__( 'Instagram Username', 'multimarket' ),
				'section'	=> 'multimarket_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);

		/* ==================================================== *
		 *  Page Loader Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_page_loader_settings',
			'label'		=> esc_html__( 'Page Loader', 'multimarket' ),
			'panel'	    => 'multimarket_panel_general_settings',
			'priority'	=> 2,
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_enable_page_loader',
				'default'	=> 0,
				'priority'	=> 1,
				'label'		=> esc_html__( 'Enable Page Loader', 'multimarket' ),
				'section'	=> 'multimarket_page_loader_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'checkbox'
			);

		/* ==================================================== *
		 *  Scroll Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_scroll_settings',
			'label'		=> esc_html__( 'Page Scroll', 'multimarket' ),
			'panel'	    => 'multimarket_panel_general_settings',
			'priority'	=> 3,
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_enable_smooth_scrolling',
				'default'	=> 0,
				'priority'	=> 1,
				'label'		=> esc_html__( 'Enable Smooth Scrolling', 'multimarket' ),
				'section'	=> 'multimarket_scroll_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'checkbox'
			);
		
		/* ==================================================== *
		 *  MAP Section  										*
		 * ==================================================== */

		/* ==================================================== *
		 *  FORM Section  										*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_form_settings',
			'label'		=> esc_html__( 'Forms', 'multimarket' ),
			'priority'	=> 4,
			'panel' 	=> 'multimarket_panel_general_settings',
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_form_style',
				'default'	=> 'form-style-rounded',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Form Style', 'multimarket' ),
				'section'	=> 'multimarket_form_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'	=> array(
					'form-style-square' 	=> esc_html__( 'Square', 'multimarket' ),
					'form-style-radius' 	=> esc_html__( 'Radius', 'multimarket' ),
					'form-style-rounded' 	=> esc_html__( 'Rounded', 'multimarket' ),
				)
			);

		/* ==================================================== *
		 *  SITE IDENTITY										*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_retina_logo',
			'default'	=> '',
			'priority'	=> 10,
			'label'		=> esc_html__( 'Retina Logo', 'multimarket' ),
			'section'	=> 'title_tagline',
			'transport'	=> 'refresh',
			'type' 		=> 'images',
		);

	/* ==================================================== *
	 *  404 Section  										*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'multimarket_page_404_settings',
		'label'		=> esc_html__( '404', 'multimarket' ),
		'priority'	=> 10,
		'panel'		=> 'multimarket_panel_general_settings',
		'type' 		=> 'section'
	);

		$customizer_options[] = array(
			'slug'		=> 'multimarket_404_bg_image',
			'default'	=> '',
			'priority'	=> 1,
			'label'		=> esc_html__( '404 Background Image', 'multimarket' ),
			'section'	=> 'multimarket_page_404_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'images'
		);

	return $customizer_options;
}

/**
 * Modify Customizer section
 *
 * @return void
 * @author tokoo
 **/
add_action( 'customize_register', 'multimarket_modify_default_customizer_section' );
function multimarket_modify_default_customizer_section( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->get_section( 'title_tagline' )->panel = 'multimarket_panel_general_settings';
	$wp_customize->get_section( 'title_tagline' )->priority = 0;
	$wp_customize->get_control( 'blogdescription' )->priority = 2;
	$wp_customize->get_control( 'display_header_text' )->priority = 5;
	$wp_customize->get_control( 'blogname' )->priority = 4;
	$wp_customize->get_control( 'site_icon' )->priority = 6;

}