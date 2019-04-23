<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// WooCommerce Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

if ( class_exists( 'WooCommerce' ) ) {

	add_filter( 'tokoo_new_customizer_data', 'multimarket_woocommerce_settings_data' );
	function multimarket_woocommerce_settings_data( $customizer_options ) {

		/* ===========================================================================================*
		 *  WooCommerce Settings Panel 					 				  								  *
		 * ===========================================================================================*/
		$customizer_options[] = array(
			'slug'		=> 'multimarket_panel_woo_settings',
			'label'		=> esc_html__( 'WooCommerce', 'multimarket' ),
			'priority'	=> 11,
			'type' 		=> 'panel'
		);

			/* ==================================================== *
			 *  Shop Page Section  									*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_shop_page_section',
				'label'		=> esc_html__( 'Shop Index', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 1,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Shop Page Data  											*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_layout',
					'default'	=> 'classic',
					'label'		=> esc_html__( 'Product Style', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'modern'		=> esc_html__( 'Modern', 'multimarket' ),
						'classic'		=> esc_html__( 'Classic', 'multimarket' ),
						'list'			=> esc_html__( 'List', 'multimarket' ),
					)
				);
				
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_category_count',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Category Count', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'product_result_count',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Result Count', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_per_page',
					'default'	=> 9,
					'label'		=> esc_html__( 'Products Per Page', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_shop_loop_columns',
					'default'	=> '4',
					'label'		=> esc_html__( 'Product Columns', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'2'		=> 2,
						'3'		=> 3,
						'4'		=> 4,
						'5'		=> 5,
						'6'		=> 6,
					)
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_sale_flash',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Sale Flash', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_category',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Category', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_title',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Title', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_star_rating',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Star Rating', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_price',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Price', 'multimarket' ),
					'section'		=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_add_to_cart',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Quick Shop', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_catalog_ordering',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Products Catalog Ordering', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_browse_by_tags',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Browse by Tag', 'multimarket' ),
					'section'	=> 'multimarket_shop_page_section',
					'type' 		=> 'checkbox'
				);

			/* ==================================================== *
			 *  Single Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_single_product_section',
				'label'		=> esc_html__( 'Single Product', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 2,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Single Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_enable_single_product_image_zoom',
					'default'	=> 1,
					'label'		=> esc_html__( 'Enable Single Products Image Zoom', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_sale_flash',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Sale Flash', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_price',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Price', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_add_to_cart',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Add To Cart', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_excerpt',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Excerpt', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_meta',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Meta', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_single_rating',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Rating', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_tabs',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Single Products Tabs', 'multimarket' ),
					'section'	=> 'multimarket_single_product_section',
					'type' 		=> 'checkbox'
				);

			/* ==================================================== *
			 *  Related Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_related_product_section',
				'label'		=> esc_html__( 'Related Product', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 3,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Related Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_related',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Related Products', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_related_product_per_page',
					'default'	=> 4,
					'label'		=> esc_html__( 'Related Product Per Page', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_related_product_title',
					'default'	=> '',
					'label'		=> esc_html__( 'Related Product Title', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_related_product_subtitle',
					'default'	=> 'Below is all related products to complement this product',
					'label'		=> esc_html__( 'Related Product Sub Title', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section', 
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_related_product_layout',
					'default'	=> 'modern',
					'label'		=> esc_html__( 'Related Product Style', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'modern'		=> esc_html__( 'Modern', 'multimarket' ),
						'classic'		=> esc_html__( 'Classic', 'multimarket' ),
					)
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_related_product_columns',
					'default'	=> '4',
					'label'		=> esc_html__( 'Related Product Columns', 'multimarket' ),
					'section'	=> 'multimarket_related_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'2'		=> 2,
						'3'		=> 3,
						'4'		=> 4,
						'5'		=> 5,
						'6'		=> 6,
					)
				);


			/* ==================================================== *
			 *  Upsells Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_upsells_product_section',
				'label'		=> esc_html__( 'Upsells Product', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 4,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Upsells Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_upsells',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Up-Sells Products', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_upsell_product_per_page',
					'default'	=> 4,
					'label'		=> esc_html__( 'Upsell Product Per Page', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_upsell_product_title',
					'default'	=> '',
					'label'		=> esc_html__( 'Upsell Product Title', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_upsell_product_subtitle',
					'default'	=> 'Below is all related products to complement this product',
					'label'		=> esc_html__( 'Upsell Product Sub Title', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_upsells_product_layout',
					'default'	=> 'modern',
					'label'		=> esc_html__( 'Upsells Product Style', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'modern'		=> esc_html__( 'Modern', 'multimarket' ),
						'classic'		=> esc_html__( 'Classic', 'multimarket' ),
					)
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_upsells_product_columns',
					'default'	=> '4',
					'label'		=> esc_html__( 'Upsells Product Columns', 'multimarket' ),
					'section'	=> 'multimarket_upsells_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'2'		=> 2,
						'3'		=> 3,
						'4'		=> 4,
						'5'		=> 5,
						'6'		=> 6,
					)
				);

			/* ==================================================== *
			 *  Category on Single Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_category_single_product_section',
				'label'		=> esc_html__( 'Category on Single Product', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 5,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Category Single Product Data  								*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_category_single_product',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Category on Single Product', 'multimarket' ),
					'section'	=> 'multimarket_category_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_category_single_product_per_page',
					'default'	=> 3,
					'label'		=> esc_html__( 'Category on Single Product Number', 'multimarket' ),
					'section'	=> 'multimarket_category_single_product_section',
					'type' 		=> 'text'
				);

			/* ==================================================== *
			 *  Cross Sells Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'multimarket_cross_sells_product_section',
				'label'		=> esc_html__( 'Cross Sells Product', 'multimarket' ),
				'panel'		=> 'multimarket_panel_woo_settings',
				'priority'	=> 6,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Cross Sells Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'multimarket_product_cross_sells',
					'default'	=> 0,
					'label'		=> esc_html__( 'Hide Cross-Sells Products', 'multimarket' ),
					'section'		=> 'multimarket_cross_sells_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_cross_sells_product_title',
					'default'	=> '',
					'label'		=> esc_html__( 'Cross Sells Product Title', 'multimarket' ),
					'section'	=> 'multimarket_cross_sells_product_section',
					'transport'	=> 'refresh',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_cross_sells_product_subtitle',
					'default'	=> 'Below is all related products to complement this product',
					'label'		=> esc_html__( 'Cross Sells Product Sub Title', 'multimarket' ),
					'section'	=> 'multimarket_cross_sells_product_section',
					'transport'	=> 'refresh',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_cross_sells_product_layout',
					'default'	=> 'modern',
					'label'		=> esc_html__( 'Cross Sells Product Style', 'multimarket' ),
					'section'	=> 'multimarket_cross_sells_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'modern'		=> esc_html__( 'Modern', 'multimarket' ),
						'classic'		=> esc_html__( 'Classic', 'multimarket' ),
					)
				);

				$customizer_options[] = array(
					'slug'		=> 'multimarket_cross_sells_product_columns',
					'default'	=> '4',
					'label'		=> esc_html__( 'Cross Sells Product Columns', 'multimarket' ),
					'section'	=> 'multimarket_cross_sells_product_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'2'		=> 2,
						'3'		=> 3,
						'4'		=> 4,
						'5'		=> 5,
						'6'		=> 6,
					)
				);

		return $customizer_options;
	}
}

