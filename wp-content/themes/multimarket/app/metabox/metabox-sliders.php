<?php

/**
 * Define metabox field for sliders
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'multimarket_sliders_metabox' );
function multimarket_sliders_metabox( $metaboxes ) {

	$metaboxes[]    = array(
		'id'        => 'multimarket_sliders_details',
		'title'     => esc_html__( 'Sliders Details', 'multimarket' ),
		'post_type' => 'tokoo-slider',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'slider_section',
				'title' => 'Slider Section',
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'				=> 'slides',
						'type'				=> 'group',
						'title'				=> 'Slides Item',
						'button_title'		=> 'Add New',
						'accordion_title' 	=> 'Add New item',
						'fields'			=> array(
							array(
								'id'    	=> 'text_align',
								'type'  	=> 'select',
								'title' 	=> esc_html__( 'Text Align', 'multimarket' ),
								'desc'  	=> esc_html__( 'Select the text align', 'multimarket' ),
								'options'	=> array(
									'right'			=> esc_html__( 'Right', 'multimarket' ),
									'center'		=> esc_html__( 'Center', 'multimarket' ),
									'left'			=> esc_html__( 'Left', 'multimarket' ),
								)
							),
							array(
								'id'    		=> 'slider_image',
								'type'  		=> 'image',
								'title' 		=> esc_html__( 'Slider Image', 'multimarket' ),
								'desc'  		=> esc_html__( 'Select the slider image', 'multimarket' ),
							),
							array(
								'id'    	=> 'slider_title',
								'type'  	=> 'text',
								'title' 	=> esc_html__( 'Slider Title', 'multimarket' ),
								'desc'  	=> esc_html__( 'Enter the title', 'multimarket' ),
							),
							array(
								'id'       => 'slider_content',
								'type'     => 'wysiwyg',
								'title'    => 'Enter the slider content',
								'settings' => array(
									'textarea_rows' => 5,
									'tinymce'       => true,
									'media_buttons' => false,
								)
							),
							array(
								'id'    	=> 'slider_link',
								'type'  	=> 'text',
								'title' 	=> esc_html__( 'Slider Link', 'multimarket' ),
								'desc'  	=> esc_html__( 'Enter the link', 'multimarket' ),
							),
						),
					),
					
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}