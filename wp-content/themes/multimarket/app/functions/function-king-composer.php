<?php

/**
 * Init King Composer
 *
 * @return void
 * @author tokoo
 **/
add_action( 'init', 'multimarket_king_composer_init', 99 );
function multimarket_king_composer_init() {

	if ( function_exists( 'kc_add_map' ) ) { 
		
		if ( is_admin() ) {
			kc_add_icon( get_template_directory_uri() . '/assets/css/font-icons.css' );
		}
		
		// SECTION TITLE
		kc_add_map(
			array(
				'multimarket_section_title' => array(
					'name' 			=> esc_html__( 'Section Title', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Multimarket Section Title', 'multimarket' ),
					'icon' 			=> 'kc-icon-icarousel',
					'category' 		=> 'Multimarket',
					'tab_icons' => array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
						'animate' => 'et-lightbulb'
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'section_title',
								'label' 		=> esc_html__( 'Section Title', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> 'Section Title'
							),
							array(
								'name' 			=> 'section_sub_title',
								'label' 		=> esc_html__( 'Section Sub Title', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> 'Section Sub Title'
							),
							array(
								'name' 			=> 'position',
								'label' 		=> esc_html__( 'Position', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
										'section-header--left'		=> 'Left',
										'section-header--center'	=> 'Center',
										'section-header--right'		=> 'Right',
									),
									'value'		=> 'left'
							),
						),
						'styling' => array(
							array(
								'name'			=> 'lst_style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'screens' 		=> 'any,1024,999,767,479',
										'Title' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.section-title'),
											array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-title'),
											array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-title'),
											array( 'property' => 'font-style', 'label' => 'Font Style', 'selector' => '.section-title'),
										),
										'Subtitle' => array(
											array( 'property' => 'color', 'label' => 'Color', 'selector' => '.section-subtitle'),
											array( 'property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-subtitle'),
											array( 'property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-subtitle'),
											array( 'property' => 'font-style', 'label' => 'Font Style', 'selector' => '.section-subtitle'),
										),
										'Box' => array(
											array( 'property' => 'margin', 'label' => 'Margin' ),
											array( 'property' => 'padding', 'label' => 'Padding' ),
											array( 'property' => 'border', 'label' => 'Border' ),
											array( 'property' => 'width', 'label' => 'Width' ),
											array( 'property' => 'height', 'label' => 'Height' ),
											array( 'property' => 'border-radius', 'label' => 'Border Radius' ),
											array( 'property' => 'float', 'label' => 'Float' ),
											array( 'property' => 'display', 'label' => 'Display' ),
											array( 'property' => 'box-shadow', 'label' => 'Box Shadow' ),
											array( 'property' => 'opacity', 'label' => 'Opacity' ),
										),
									),
								)
							),
						),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket SLIDER
		kc_add_map(
			array(
				'multimarket_slider' 	=> array(
					'name' 			=> esc_html__( 'Sliders', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Multimarket Sliders', 'multimarket' ),
					'icon' 			=> 'kc-icon-icarousel',
					'category' 		=> 'Multimarket',
					'tab_icons' => array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'slider_item',
								'label' 		=> esc_html__( 'Select Slider Item', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> multimarket_get_posts( 'tokoo-slider' ),
							),
							array(
								'name' 			=> 'slider_style',
								'label' 		=> esc_html__( 'Slider Style', 'multimarket' ),
								'type' 			=> 'select',
								'options'       => array(
									'style-1'	=> "Style 1 : Carousel",
									'style-2'	=> "Style 2 : Slider",
								),
								'value'			=> 'style-1'
								
							),
							array(
								'name' 			=> 'slider_duration',
								'label' 		=> esc_html__( 'Slider Duration', 'multimarket' ),
								'type' 			=> 'text',
								'description'   => 'Duration in miliseconds. 1000ms = 1s',
								'value'			=> 5000
							),
							array(
								'name' 			=> 'slider_animation',
								'label' 		=> esc_html__( 'Slider Animation', 'multimarket' ),
								'type' 			=> 'radio',
								'options'		=> array(
									'slide'		=> 'Slide',
									'fade'		=> 'Fade' 
								),
								'value'			=> 'slide',
								'relation'		=> array(
									'parent'    => 'slider_style',
									'show_when' => 'style-2'
								)
							),
							array(
								'name' 			=> 'slider_height',
								'label' 		=> esc_html__( 'Custom Height', 'multimarket' ),
								'type' 			=> 'text',
								'description'	=> 'Slider height in pixel unit',
								'value'			=> '640',
								'relation'		=> array(
									'parent'    => 'slider_style',
									'show_when' => 'style-2'
								)
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-slider-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => 'h2.hero-item__title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'h2.hero-item__title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'h2.hero-item__title'),
										),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => 'p.hero-item__desc'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'p.hero-item__desc'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'p.hero-item__desc'),
										),
									)
								)
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCT CATEGORIES
		kc_add_map(
			array(
				'multimarket_category_icons_grid' 	=> array(
					'name' 			=> esc_html__( 'Product Category Icons Grid', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Product Categories With Icons', 'multimarket' ),
					'icon' 			=> 'sl-folder',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						'general' 	=> array(
							array(
								'name' 			=> 'columns',
								'label' 		=> esc_html__( 'Columns', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
								),
								'value'		=> '6'
							),
							array(
								'name' 			=> 'count',
								'label' 		=> esc_html__( 'Category Count', 'multimarket' ),
								'description' 	=> esc_html__( 'Display Category Count', 'multimarket' ),
								'type' 			=> 'toggle',
								'value'			=> 'yes'
							),
							array(
								'type' 			=> 'group',
								'label' 		=> esc_html__( 'Categories', 'multimarket' ),
								'name' 			=> 'categories',
								'description'   => '',
								'options'       => array( 'add_text' => esc_html__( 'Add new Category', 'multimarket' ) ),
								'params' 		=> array(
									array(
										'name' 			=> 'custom_name',
										'label' 		=> esc_html__( 'Custom Name', 'multimarket' ),
										'description' 	=> esc_html__( 'Use Custom name instead of category name', 'multimarket' ),
										'type' 			=> 'text',
									),
									array(
										'name' 			=> 'item_type',
										'label' 		=> esc_html__( 'Item Type', 'multimarket' ),
										'type' 			=> 'select',
										'options'		=> array(
											'icon_font'		=> esc_html__( 'Icon Font', 'multimarket' ),
											'icon_image'	=> esc_html__( 'Icon Image', 'multimarket' ),
										),
									),
									array(
										'name' 			=> 'icon',
										'label' 		=> esc_html__( 'Select Icon', 'multimarket' ),
										'type' 			=> 'icon_picker',
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent'    => 'categories-item_type',
											'show_when' => 'icon_font'
										)
									),
									array(
										'name' 			=> 'icon_color',
										'label' 		=> esc_html__( 'Icon Color', 'multimarket' ),
										'type' 			=> 'color_picker',
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent'    => 'categories-item_type',
											'show_when' => 'icon_font'
										)
									),
									array(
										'name' 			=> 'image',
										'label' 		=> esc_html__( 'Attach Image', 'multimarket' ),
										'type' 			=> 'attach_image',
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent'    => 'categories-item_type',
											'show_when' => 'icon_image'
										)
									),
									array(
										'name' 			=> 'bg_image',
										'label' 		=> esc_html__( 'Background Image', 'multimarket' ),
										'type' 			=> 'attach_image',
										'admin_label' 	=> true,
									),
									array(
										'name' 			=> 'category',
										'label' 		=> esc_html__( 'Category', 'multimarket' ),
										'type' 			=> 'select',
										'options'		=> multimarket_get_terms( 'product_cat' ),
									),
									array(
										'name' 			=> 'color_overlay',
										'label' 		=> esc_html__( 'Color Overlay', 'multimarket' ),
										'type' 			=> 'color_picker',
										'admin_label' 	=> true,
									),

								)
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-category-style',
								'label'			=> 'Category',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Category Title' => array(
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'category-icon__cat-title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'category-icon__cat-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'category-icon__cat-title'),
											array('property' => 'font-style', 'label' => 'Font Style', 'selector' => 'category-icon__cat-title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => 'category-icon__cat-title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => 'category-icon__cat-title'),
										),
									)
								)
							),
						),
						
						 
					), // END PARAM
				),  // End of elemnt kc_icon 
			)
		); // End add map

				// Multimarket AUTHOR HIGHLIGHT
		kc_add_map(
			array(
				'multimarket_author_highlight' 	=> array(
					'name' 			=> esc_html__( 'Author Highlight', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Author Highlight', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'author',
								'label' 		=> esc_html__( 'Product Author', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> multimarket_get_users(),
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCTS
		kc_add_map(
			array(
				'multimarket_products' 	=> array(
					'name' 			=> esc_html__( 'Products', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Products', 'multimarket' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'product_style',
							'label' 		=> esc_html__( 'Product Style', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'modern'		=> esc_html__( 'Modern', 'multimarket' ),
								'classic'		=> esc_html__( 'Classic', 'multimarket' ),
								'list'			=> esc_html__( 'List', 'multimarket' ),
							),
							'value'		=> 'modern'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'show_product',
							'label' 		=> esc_html__( 'Show Product', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'multimarket' ),
								'onsale'		=> esc_html__( 'On-Sale Products', 'multimarket' ),
								'featured'		=> esc_html__( 'Featured Products', 'multimarket' ),
								'best_selling'	=> esc_html__( 'Best Selling Products', 'multimarket' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_type',
							'label' 		=> esc_html__( 'Product Type', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'multimarket' ),
								'regular'		=> esc_html__( 'Regular', 'multimarket' ),
								'book'			=> esc_html__( 'Book', 'multimarket' ),
								'audio'			=> esc_html__( 'Audio', 'multimarket' ),
								'movie'			=> esc_html__( 'Movie', 'multimarket' ),	
								'game'			=> esc_html__( 'Game', 'multimarket' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_category',
							'label' 		=> esc_html__( 'Product Category', 'multimarket' ),
							'type' 			=> 'select',
							'options'       => multimarket_get_product_category(),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'multimarket' ),
								'random'		=> esc_html__( 'Random', 'multimarket' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'multimarket' ),
								'DESC'			=> esc_html__( 'DESC', 'multimarket' ),
							),
							'value'		=> 'DESC'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCTS CAROUSEL
		kc_add_map(
			array(
				'multimarket_products_carousel' 	=> array(
					'name' 			=> esc_html__( 'Products Carousel', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Products as Carousel', 'multimarket' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '4'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'multimarket' ),
								'random'		=> esc_html__( 'Random', 'multimarket' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'multimarket' ),
								'DESC'			=> esc_html__( 'DESC', 'multimarket' ),
							),
							'value'		=> 'DESC'
						),
						array(
							'name' 			=> 'visible_items',
							'label' 		=> esc_html__( 'Visible Items', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '3'
						),
						array(
							'name' 			=> 'autoplay',
							'label' 		=> esc_html__( 'Autoplay', 'multimarket' ),
							'type' 			=> 'toggle',
							'value'			=> 'yes'
						),
						array(
							'name' 			=> 'autoplay_delay',
							'label' 		=> esc_html__( 'Autoplay Delay', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '5000'
						),
						array(
							'name' 			=> 'offset',
							'label' 		=> esc_html__( 'Carousel Offset', 'multimarket' ),
							'type' 			=> 'toggle',
							'value'			=> 'no'
						),
						array(
							'name' 			=> 'offset_width',
							'label' 		=> esc_html__( 'Carousel Offset Width', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '100'
						),
						array(
							'name' 			=> 'show_product',
							'label' 		=> esc_html__( 'Show Product', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'multimarket' ),
								'onsale'		=> esc_html__( 'On-Sale Products', 'multimarket' ),
								'featured'		=> esc_html__( 'Featured Products', 'multimarket' ),
								'best_selling'	=> esc_html__( 'Best Selling Products', 'multimarket' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_category',
							'label' 		=> esc_html__( 'Product Category', 'multimarket' ),
							'type' 			=> 'select',
							'options'       => multimarket_get_product_category(),
							'value'			=> 'all'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCTS GRID
		kc_add_map(
			array(
				'multimarket_products_grid' 	=> array(
					'name' 			=> esc_html__( 'Products Grid', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Products as grid', 'multimarket' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'3'		=> '3',
								'4'		=> '4',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '12'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'multimarket' ),
								'random'		=> esc_html__( 'Random', 'multimarket' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'multimarket' ),
								'DESC'			=> esc_html__( 'DESC', 'multimarket' ),
							),
							'value'		=> 'DESC'
						),
						array(
							'name' 			=> 'show_product',
							'label' 		=> esc_html__( 'Show Product', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'multimarket' ),
								'onsale'		=> esc_html__( 'On-Sale Products', 'multimarket' ),
								'featured'		=> esc_html__( 'Featured Products', 'multimarket' ),
								'best_selling'	=> esc_html__( 'Best Selling Products', 'multimarket' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_category',
							'label' 		=> esc_html__( 'Product Category', 'multimarket' ),
							'type' 			=> 'select',
							'options'       => multimarket_get_product_category(),
							'value'			=> 'all'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCTS THUMBNAIL GRID
		kc_add_map(
			array(
				'multimarket_products_thumbnail_grid' 	=> array(
					'name' 			=> esc_html__( 'Products Thumbnail Grid', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Products as thumbnail grid', 'multimarket' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'multimarket' ),
							'type' 			=> 'text',
							'value'			=> '12'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'multimarket' ),
								'random'		=> esc_html__( 'Random', 'multimarket' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'multimarket' ),
								'DESC'			=> esc_html__( 'DESC', 'multimarket' ),
							),
							'value'		=> 'DESC'
						),
						array(
							'name' 			=> 'show_product',
							'label' 		=> esc_html__( 'Show Product', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'multimarket' ),
								'onsale'		=> esc_html__( 'On-Sale Products', 'multimarket' ),
								'featured'		=> esc_html__( 'Featured Products', 'multimarket' ),
								'best_selling'	=> esc_html__( 'Best Selling Products', 'multimarket' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_category',
							'label' 		=> esc_html__( 'Product Category', 'multimarket' ),
							'type' 			=> 'select',
							'options'       => multimarket_get_product_category(),
							'value'			=> 'all'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map


		// Multimarket FEATURES LIST
		kc_add_map(
			array(
				'multimarket_features_list' 	=> array(
					'name' 			=> esc_html__( 'Features List', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Features List', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						'general' 	=> array(
							array(
								'name' 			=> 'columns',
								'label' 		=> esc_html__( 'Columns', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
								),
								'value'		=> '5'
							),
							array(
								'type' 			=> 'group',
								'label' 		=> esc_html__( 'Items', 'multimarket' ),
								'name' 			=> 'items',
								'description'   => '',
								'options'       => array( 'add_text' => esc_html__( 'Add new item', 'multimarket' ) ),
								'params' 		=> array(
									array(
										'name' 			=> 'item_type',
										'label' 		=> esc_html__( 'Item Type', 'multimarket' ),
										'type' 			=> 'select',
										'options'		=> array(
											'icon_font'		=> esc_html__( 'Icon Font', 'multimarket' ),
											'icon_image'	=> esc_html__( 'Icon Image', 'multimarket' ),
										),
									),
									array(
										'name' 			=> 'icon',
										'label' 		=> esc_html__( 'Select Icon', 'multimarket' ),
										'type' 			=> 'icon_picker',
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent'    => 'items-item_type',
											'show_when' => 'icon_font'
										)
									),
									array(
										'name' 			=> 'icon_color',
										'label' 		=> esc_html__( 'Icon Color', 'multimarket' ),
										'type' 			=> 'color_picker',
										'relation' 		=> array(
											'parent'    => 'items-item_type',
											'show_when' => 'icon_font'
										)
									),
									array(
										'name' 			=> 'image',
										'label' 		=> esc_html__( 'Attach Image', 'multimarket' ),
										'type' 			=> 'attach_image',
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent'    => 'items-item_type',
											'show_when' => 'icon_image'
										)
									),
									array(
										'name' 			=> 'title',
										'label' 		=> esc_html__( 'Title', 'multimarket' ),
										'type' 			=> 'text',
									),
									array(
										'name' 			=> 'link',
										'label' 		=> esc_html__( 'Link', 'multimarket' ),
										'type' 			=> 'text',
									),

								)
							),
						),

						'styling' => array(
							array(
								'name'			=> 'section-features-list-style',
								'label'			=> 'Features List',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Features Title' => array(
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.feature__title'),
											array('property' => 'font-style', 'label' => 'Font Style', 'selector' => '.feature__title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.feature__title'),
										),
										
									)
								)
							),
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket CONCTACT FORM
		kc_add_map(
			array(
				'multimarket_contact_form' 	=> array(
					'name' 			=> esc_html__( 'Contact Form', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Contact Form', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
							'name' 			=> 'post_type_contact',
							'label' 		=> esc_html__( 'Select Contact', 'multimarket' ),
							'type' 			=> 'select',
							'options'		=> multimarket_get_posts( 'wpcf7_contact_form' )
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-contact-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
							),
						)
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket MAILCHIMP FOR WP
		kc_add_map(
			array(
				'multimarket_mailchimp' 	=> array(
					'name' 			=> esc_html__( 'MailChimp For WP', 'multimarket' ),
					'description' 	=> esc_html__( 'Display MailChimp Form', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'mailchimp_id',
								'label' 		=> esc_html__( 'MailChimp ID', 'multimarket' ),
								'type' 			=> 'text',
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-mailchimp-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-title'),
										),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-subtitle'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-subtitle'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-subtitle'),
										),
										'Form' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.mc4wp-form input'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.mc4wp-form input'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.mc4wp-form input'),
											array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '.mc4wp-form input'),
										),
									)
								)
							),
						)
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRODUCT SEARCH
		kc_add_map(
			array(
				'multimarket_product_search' 	=> array(
					'name' 			=> esc_html__( 'Product Search', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Search Form', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'section_id',
								'label' 		=> esc_html__( 'Secition ID', 'multimarket' ),
								'type' 			=> 'text',
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket LATEST POSTS
		kc_add_map(
			array(
				'multimarket_latest_posts' 	=> array(
					'name' 			=> esc_html__( 'Latest Posts', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Latest Posts', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'limit',
								'label' 		=> esc_html__( 'Limit', 'multimarket' ),
								'type' 			=> 'text',
							),
							array(
								'name' 			=> 'columns',
								'label' 		=> esc_html__( 'Columns', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
									'2'	=> '2',
									'3'	=> '3',
									'4'	=> '4',
								),
								'value'			=> '3'
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket BLOG GRID
		kc_add_map(
			array(
				'multimarket_blog_grid' 	=> array(
					'name' 			=> esc_html__( 'Blog Grid', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Latest Posts', 'multimarket' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Multimarket',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'limit',
								'label' 		=> esc_html__( 'Limit', 'multimarket' ),
								'type' 			=> 'text',
							),
							array(
								'name' 			=> 'columns',
								'label' 		=> esc_html__( 'Columns', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
									'2'	=> '2',
									'3'	=> '3',
									'4'	=> '4',
								),
								'value'			=> '3'
							),
							array(
								'name' 			=> 'style',
								'label' 		=> esc_html__( 'Style', 'multimarket' ),
								'type' 			=> 'select',
								'options'		=> array(
									'plain'	=> esc_html__( 'Plain', 'multimarket' ),
									'card'	=> esc_html__( 'Card', 'multimarket' ),
								),
								'value'			=> 'plain'
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map


		// Video Lightbox
		kc_add_map(
			array(
				'multimarket_video_lightbox' => array(
					'name' 			=> esc_html__( 'Multimarket Video Lightbox', 'multimarket' ),
					'description' 	=> esc_html__( 'Display video in lightbox', 'multimarket' ),
					'icon' 			=> 'sl-social-youtube',
					'category' 		=> 'Multimarket',
					'tab_icons' => array(
						'general' => 'et-tools',
						'animate' => 'et-lightbulb'
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'video_url',
								'label' 		=> esc_html__( 'Video URL', 'multimarket' ),
								'type' 			=> 'text',
								'description' 	=> esc_html__( 'Enter the video URL (youtube/videmo)', 'multimarket' ),
							),
							array(
								'name' 			=> 'trigger_image',
								'label' 		=> esc_html__( 'Trigger Image', 'multimarket' ),
								'type' 			=> 'attach_image',
							),
							
						),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map
	
		// TESTIMONIALS
		kc_add_map(
			array(
				'multimarket_testimonials' 	=> array(
					'name' 			=> esc_html__( 'Multimarket Testimonials', 'multimarket' ),
					'description' 	=> esc_html__( 'Display Testimonials', 'multimarket' ),
					'icon' 			=> 'kc-icon-testi',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						array(
							'name' 			=> 'testimony_ids',
							'label' 		=> esc_html__( 'Select Some Testimony', 'multimarket' ),
							'type' 			=> 'multiple',
							'options'		=> multimarket_get_posts( 'tokoo-testimonials' )
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// Multimarket PRICING BOX
		kc_add_map(
			array(
				'multimarket_pricing_box' 	=> array(
					'name' 			=> esc_html__( 'Pricing Box', 'multimarket' ),
					'description' 	=> esc_html__( 'Display pricing box', 'multimarket' ),
					'icon' 			=> 'sl-folder',
					'category' 		=> 'Multimarket',
					'params' 		=> array(
						'general' 	=> array(
							array(
								'name' 			=> 'product_title',
								'label' 		=> esc_html__( 'Product Title', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the product title', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> 'Product Title'
							),
							array(
								'name' 			=> 'product_description',
								'label' 		=> esc_html__( 'Product Description', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the product description', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> 'Lorem ipsum dolor sit amet consectetur adipiscing elit'
							),
							array(
								'name' 			=> 'product_price',
								'label' 		=> esc_html__( 'Product Price', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the product price', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> '$25'
							),
							array(
								'name' 			=> 'product_price_unit',
								'label' 		=> esc_html__( 'Product Price Unit', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the product price unit', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> '/month'
							),
							array(
								'name' 			=> 'product_image',
								'label' 		=> esc_html__( 'Product Image', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the product image', 'multimarket' ),
								'type' 			=> 'attach_image',
								'value'			=> ''
							),
							array(
								'type' 			=> 'group',
								'label' 		=> esc_html__( 'Features', 'multimarket' ),
								'name' 			=> 'features',
								'description'   => '',
								'options'       => array( 'add_item' => esc_html__( 'Add new feature', 'multimarket' ) ),
								'params' 		=> array(
									array(
										'name' 			=> 'icon',
										'label' 		=> esc_html__( 'Select Icon', 'multimarket' ),
										'type' 			=> 'icon_picker',
										'admin_label' 	=> true,
									),
									array(
										'name' 			=> 'icon_color',
										'label' 		=> esc_html__( 'Icon Color', 'multimarket' ),
										'type' 			=> 'color_picker',
										'admin_label' 	=> true,
									),
									array(
										'name' 			=> 'title',
										'label' 		=> esc_html__( 'Title', 'multimarket' ),
										'type' 			=> 'text',
									),
								 	array(
										'name' 			=> 'subtitle',
										'label' 		=> esc_html__( 'Sub Title', 'multimarket' ),
										'type' 			=> 'text',
									),

								)
							),
							array(
								'name' 			=> 'button_link',
								'label' 		=> esc_html__( 'Button Link', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the button Link', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> ''
							),
							array(
								'name' 			=> 'button_label',
								'label' 		=> esc_html__( 'Button Label', 'multimarket' ),
								'description' 	=> esc_html__( 'Display the button label', 'multimarket' ),
								'type' 			=> 'text',
								'value'			=> 'Go'
							),
							array(
								'name' 			=> 'highlight',
								'label' 		=> esc_html__( 'Highlight', 'multimarket' ),
								'type' 			=> 'toggle',
								'value'			=> 'Go'
							),
						),

						'styling' => array(
							array(
								'name'			=> 'section-pricing-box-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.feature_detail h3'),
										),
										'Button' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.section-pricing_action .button'),
										),
									)
								)
							),
						)
					), // END PARAM
				),  // End of elemnt kc_icon 
			)
		); // End add map

	} // End if

}


