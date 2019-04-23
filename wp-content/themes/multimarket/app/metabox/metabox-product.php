<?php

/**
 * Define metabox field for pages
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'multimarket_product_metabox' );
function multimarket_product_metabox( $metaboxes ) {

	$metaboxes[]    = array(
		'id'        => 'multimarket_product_audio_details',
		'title'     => esc_html__( 'Audio Details', 'multimarket' ),
		'post_type' => 'product',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'audio_section',
				'title' => esc_html__( 'Audio Section', 'multimarket' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'hosted_audio',
						'type'  	=> 'select',
						'title' 	=> 'Hosted Audio',
						'options'	=> array(
							'files'			=> 'Select Audio (Media Select)',
							'soundcloud'	=> 'SoundCloud Embed Code',
						)
					),
					array(
						'id'				=> 'audio_ids',
						'type'				=> 'group',
						'title'				=> esc_html__( 'Audio Items', 'multimarket' ),
						'button_title'		=> 'Add New',
						'accordion_title' 	=> 'Add New item',
						'dependency'		=> array( 'hosted_audio', '==', 'files' ),
						'fields'			=> array(
							array(
								'id'    		=> 'id',
								'type'  		=> 'upload',
								'title' 		=> esc_html__( 'Audio File', 'multimarket' ),
								'desc'  		=> esc_html__( 'Enter the audio file', 'multimarket' ),
								'settings'		=> array(
									'insert_title' => 'Use this audio',
									'upload_type'  => 'audio',
								),
							),
						),
					),
					array(
						'id'    	=> 'soundcloud_url',
						'type'  	=> 'textarea',
						'title' 	=> 'Soundcloud Embed Code',
						'dependency'	=> array( 'hosted_audio', '==', 'soundcloud' ),
					),
				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'multimarket_product_video_details',
		'title'     => esc_html__( 'Video Details', 'multimarket' ),
		'post_type' => 'product',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'video_section',
				'title' => esc_html__( 'Video Section', 'multimarket' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'hosted_video',
						'type'  	=> 'select',
						'title' 	=> 'Hosted Video',
						'options'	=> array(
							'file'			=> 'Select Video (Media Select)',
							'youtube'		=> 'Youtube Embed Code',
						)
					),
					array(
						'id'    	=> 'video_file',
						'type'  	=> 'upload',
						'title' 	=> 'Video File',
						'settings'	=> array(
							'insert_title' => 'Use this video',
							'upload_type'  => 'video',
						),
						'dependency'	=> array( 'hosted_video', '==', 'file' ),
					),
					array(
						'id'    	=> 'youtube_url',
						'type'  	=> 'textarea',
						'title' 	=> 'Youtube Embed Code',
						'dependency'	=> array( 'hosted_video', '==', 'youtube' ),
					),
				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'multimarket_product_live_preview',
		'title'     => esc_html__( 'Live Preview', 'multimarket' ),
		'post_type' => 'product',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'preview_section',
				'title' => esc_html__( 'Preview Section', 'multimarket' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'preview_url',
						'type'  	=> 'text',
						'title' 	=> 'Live Preview URL',
					),
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}