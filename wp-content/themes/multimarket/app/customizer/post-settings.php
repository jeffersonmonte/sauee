<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'multimarket_customizer_posts_settings' );
function multimarket_customizer_posts_settings( $customizer_options ) {

	/* ===========================================================================================*
	 *  Posts Settings Panel 					 				  								  *
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'multimarket_panel_posts_settings',
		'label'		=> esc_html__( 'Post', 'multimarket' ),
		'priority'	=> 8,
		'type' 		=> 'panel'
	);

		/* ==================================================== *
		 *  Post Settings Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_blog_index_settings',
			'label'		=> esc_html__( 'Blog Index', 'multimarket' ),
			'panel'	    => 'multimarket_panel_posts_settings',
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_blog_style',
				'default'	=> 'masonry',
				'label'		=> esc_html__( 'Blog Index Style', 'multimarket' ),
				'section'	=> 'multimarket_post_settings',
				'type' 		=> 'select',
				'transport'	=> 'refresh',
				'choices'	=> array(
					'masonry'	=> esc_html__( 'Masonry (default)', 'multimarket' ),
					'grid'		=> esc_html__( 'Grid', 'multimarket' ),
					'list'		=> esc_html__( 'List', 'multimarket' ),
				),
			);
			$customizer_options[] = array(
				'slug'		=> 'multimarket_blog_columns',
				'default'	=> '3',
				'label'		=> esc_html__( 'Blog Index Columns', 'multimarket' ),
				'section'	=> 'multimarket_post_settings',
				'type' 		=> 'select',
				'transport'	=> 'refresh',
				'choices'	=> array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
				),
			);

		/* ==================================================== *
		 *  Post Settings Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_post_settings',
			'label'		=> esc_html__( 'Blog Post', 'multimarket' ),
			'panel'	    => 'multimarket_panel_posts_settings',
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_stick_text',
				'default'	=> '',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Sticky Post Label', 'multimarket' ),
				'section'	=> 'multimarket_post_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);

		$pages = get_pages();

				if ( $pages ) {
					$pages_choices[] = esc_html__( '--none--', 'multimarket' );
					foreach ( $pages as $pages ) {
						$pages_choices[$pages->ID] = $pages->post_title;
				}
			}

		/* ==================================================== *
		 *  Related Post Section                               *
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'multimarket_related_settings',
			'label'		=> esc_html__( 'Related Post Settings', 'multimarket' ),
			'panel'	    => 'multimarket_panel_posts_settings',
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 *  Related Data                                          *
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_disallow_by_category',
				'default'	=> '',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Disallow by Category', 'multimarket' ),
				'section'	=> 'multimarket_related_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'category_dropdown'
			);

			$tags = get_tags();

			if ( $tags ) {
				$tags_choices[] = esc_html__( '--none--', 'multimarket' );
				foreach ( $tags as $tag ) {
					$tags_choices[$tag->term_id] = $tag->name;
				}
				$customizer_options[] = array(
					'slug'		=> 'multimarket_disallow_by_tags',
					'default'	=> '',
					'priority'	=> 2,
					'label'		=> esc_html__( 'Disallow by Tag', 'multimarket' ),
					'section'	=> 'multimarket_related_settings',
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'   => $tags_choices
				);
			}

			$customizer_options[] = array(
				'slug'		=> 'multimarket_related_title',
				'default'	=> esc_html__( 'Related', 'multimarket' ),
				'priority'	=> 3,
				'label'		=> esc_html__( 'Related Title', 'multimarket' ),
				'section'	=> 'multimarket_related_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'text'
			);

			$customizer_options[] = array(
				'slug'		=> 'multimarket_related_number',
				'default'	=> 3,
				'priority'	=> 4,
				'label'		=> esc_html__( 'Display Per Page', 'multimarket' ),
				'section'	=> 'multimarket_related_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'text'
		);


	return $customizer_options;
}