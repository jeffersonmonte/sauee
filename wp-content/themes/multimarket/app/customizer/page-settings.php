<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_customizer_page_settings' );
function multimarket_customizer_page_settings( $customizer_options ) {

	/* ===========================================================================================*
	 *  Page Settings Panel 					 				  								  *
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'multimarket_panel_page_settings',
		'label'		=> esc_html__( 'Page', 'multimarket' ),
		'priority'	=> 9,
		'type' 		=> 'panel'
	);

		/* ==================================================== *
		 *  Page Settings Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_page_settings',
			'label'		=> esc_html__( 'Page', 'multimarket' ),
			'panel'	    => 'multimarket_panel_page_settings',
			'priority'	=> 1,
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 *  Page Settings Data                                          *
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_post_author',
				'default'	=> 1,
				'priority'	=> 1,
				'label'		=> esc_html__( 'Post Author Box', 'multimarket' ),
				'section'	=> 'multimarket_page_settings',
				'selector'	=> '.post-author',
				'transport'	=> 'postMessage',
				'type' 		=> 'checkbox'
			);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_comment_form',
				'default'	=> 1,
				'priority'	=> 2,
				'label'		=> esc_html__( 'Post/Page Comments', 'multimarket' ),
				'section'	=> 'multimarket_page_settings',
				'selector'	=> '.comments-area',
				'transport'	=> 'postMessage',
				'type' 		=> 'checkbox'
			);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_social_share',
				'default'	=> 1,
				'priority'	=> 3,
				'label'		=> esc_html__( 'Social Share Buttons', 'multimarket' ),
				'section'	=> 'multimarket_page_settings',
				'selector'	=> '.social-share-holder',
				'transport'	=> 'postMessage',
				'type' 		=> 'checkbox'
			);

	return $customizer_options;
}