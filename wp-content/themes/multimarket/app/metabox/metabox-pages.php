<?php

/**
 * Define metabox field for pages
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'multimarket_pages_metabox' );
function multimarket_pages_metabox( $metaboxes ) {

	$metaboxes[]    = array( 
		'id'        => 'multimarket_contact_maps',
		'title'     => esc_html__( 'Contact Maps', 'multimarket' ),
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'contact_form_section',
				'title' => esc_html__( 'Contact Form', 'multimarket' ),
				'icon'  => 'fa fa-envelope',
				'fields' => array(
					array(
						'id'    	=> 'contact_form',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Select Contact Form', 'multimarket' ),
						'desc'  	=> esc_html__( 'Type the contact form from ninja form plugin', 'multimarket' ),
						'options'	=> multimarket_get_cf7_list_form(),
					),

				), // end: fields
			), // end: a section

			array(
				'name'  => 'contact_map_section',
				'title' => esc_html__( 'Contact Maps', 'multimarket' ),
				'icon'  => 'fa fa-map-marker',
				'fields' => array(
					array(
						'id'    	=> 'map_iframe',
						'type'  	=> 'textarea',
						'title' 	=> esc_html__( 'Map Location:', 'multimarket' ),
						'desc'  	=> esc_html__( 'Go to Google Maps and searh your Location. Click on menu near search text => Share or embed map => Embed map. Next copy iframe to this field', 'multimarket' ),
						'sanitize' 	=> false,
					),
					array(
						'id'    => 'map_height',
						'type'  => 'text',
						'title' => esc_html__( 'Height', 'multimarket' ),
						'desc'  => esc_html__( 'Map Height (px):', 'multimarket' ),
					),
					array(
						'id'    	=> 'tagline',
						'type'  	=> 'textarea',
						'title' 	=> esc_html__( 'Company Tagline', 'multimarket' ),
						'desc'  	=> esc_html__( 'Type the company tagline', 'multimarket' ),
					),
					array(
						'id'    	=> 'phone_number',
						'type'  	=> 'text',
						'title' 	=> esc_html__( 'Phone Number', 'multimarket' ),
						'desc'  	=> esc_html__( 'Type the phone number', 'multimarket' ),
					),
					array(
						'id'    	=> 'address',
						'type'  	=> 'wysiwyg',
						'title' 	=> esc_html__( 'Company Address', 'multimarket' ),
						'desc'  	=> esc_html__( 'Type the company address', 'multimarket' ),
						'settings' => array(
							'textarea_rows'	=> 5,
							'tinymce'		=> false,
							'media_buttons'	=> false,
						)
					),

				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'multimarket_page_details',
		'title'     => esc_html__( 'Page Details', 'multimarket' ),
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'page_section',
				'title' => esc_html__( 'Page Section', 'multimarket' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'per_page',
						'type'  	=> 'number',
						'title' 	=> esc_html__( 'Post Per Page', 'multimarket' ),
						'desc'  	=> esc_html__( 'Enter how many item will be displayed', 'multimarket' ),
						'default' 	=> 12,
					),
					array(
						'id'		=> 'perpage_page_subtitle',
						'type'		=> 'text',
						'title'		=> esc_html__( 'Page Section SubTitle', 'multimarket' ),
					),
					array(
						'id'		=> 'perpage_page_title_background',
						'type'		=> 'image',
						'title'		=> esc_html__( 'Page Title Background Image', 'multimarket' ),
						'desc'		=> esc_html__( 'preferred size (1600x6000)', 'multimarket' )
					),
					array(
						'id'		=> 'disable_header',
						'type'		=> 'switcher',
						'title'		=> esc_html__( 'Disable Header', 'multimarket' ),
						'desc'		=> esc_html__( 'Only recommended for page template composer', 'multimarket' )
					),
					// array(
					// 	'id'    	=> 'header_type',
					// 	'type'  	=> 'select',
					// 	'title' 	=> esc_html__( 'Header Type', 'multimarket' ),
					// 	'desc'  	=> esc_html__( 'Choose header type', 'multimarket' ),
					// 	'options'	=> array(
					// 		'type_1' 	=> esc_html__( 'Type 1 - Default', 'multimarket' ),
					// 		'type_2' 	=> esc_html__( 'Type 2', 'multimarket' ),
					// 	),
					// ),
					array(
						'id'		=> 'disable_footer',
						'type'		=> 'switcher',
						'title'		=> esc_html__( 'Disable Footer', 'multimarket' ),
						'desc'		=> esc_html__( 'Only recommended for page template composer', 'multimarket' )
					),
					array(
						'id'    	=> 'footer_page',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Footer page', 'multimarket' ),
						'desc'  	=> esc_html__( 'Choose footer page', 'multimarket' ),
						'options'	=> multimarket_get_posts( 'page', esc_html__( 'Default Footer', 'multimarket' ) ),
					),
				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'multimarket_layouts_details',
		'title'     => esc_html__( 'The Layouts Details', 'multimarket' ),
		'post_type' => 'page',
		'context'   => 'side',
		'priority'  => 'low',
		'sections'  => array(
			array(
				'name'  => 'the_layouts_section',
				'title' => esc_html__( 'Layouts Section', 'multimarket' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'		=> 'theme_layouts',
						'type'		=> 'image_select',
						'title' 	=> 'Choose Layout',
						'options' 	=> array(
							'one-column' 		=> get_template_directory_uri() .'/assets/img/layouts/one-column.png',
							'left-sidebar'		=> get_template_directory_uri() .'/assets/img/layouts/sidebar-left.png',
							'right-sidebar' 	=> get_template_directory_uri() .'/assets/img/layouts/sidebar-right.png',
						),
						'default'   => 'one-column',
					),
					array(
						'id'    	=> 'custom_sidebar',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Custom Sidebar', 'multimarket' ),
						'desc'  	=> esc_html__( 'Choose custom sidebar for this page', 'multimarket' ),
						'options'	=> multimarket_get_all_sidebars(),
					),
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}