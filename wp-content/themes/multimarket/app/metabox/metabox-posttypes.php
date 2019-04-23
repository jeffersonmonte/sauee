<?php 

/**
 * Register Base Metabox for portfolio, testimonials and team member
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'multimarket_register_post_types_metabpx' );
function multimarket_register_post_types_metabpx( $metaboxes ) {

	// -----------------------------------------
	// Define testimonials metabox             -
	// -----------------------------------------
	if ( current_theme_supports( 'tokoo-testimonials' ) ) :
		$metaboxes[]    = array(
			'id'        => 'multimarket_testimonials_details',
			'title'     => 'Testimony Details',
			'post_type' => 'tokoo-testimonials',
			'context'   => 'normal',
			'priority'  => 'high',
			'sections'  => array(
				array( 
					'name'  => 'testimony_section',
					'title' => 'Testimony Section',
					'icon'  => 'fa fa-cog',
					'fields' => array(
						array(
							'id'    => 'link',
							'type'  => 'text',
							'title' => 'Testimony Link',
							'desc'  => 'Enter the link',
						),
						array(
							'id'    => 'position',
							'type'  => 'text',
							'title' => 'Position',
							'desc'  => 'Enter the position',
						),
						array(
							'id'       => 'testimony_content',
							'type'     => 'wysiwyg',
							'title'    => 'Enter the testimony content',
							'settings' => array(
								'textarea_rows' => 5,
								'tinymce'       => false,
								'media_buttons' => false,
							)
						),
						array(
							'id'    	=> 'rating',
							'type'  	=> 'select',
							'title' 	=> 'Testimony Rating',
							'desc'  	=> 'Rate this post',
							'options'	=> array(
								'0'		=> 'None',
								'1'		=> '1 Star',
								'2'		=> '2 Star',
								'3'		=> '3 Star',
								'4'		=> '4 Star',
								'5'		=> '5 Star',
							)
						),
					), // end: fields
				), // end: a section
			),
		);

	endif;

	return $metaboxes;
}