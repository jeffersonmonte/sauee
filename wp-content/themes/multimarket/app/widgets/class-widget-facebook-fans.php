<?php

if ( class_exists( 'Tokoo_Widget' ) ) {

// Create custom widget class extending WPH_Widget
class Multimarket_Facebook_Fans extends Tokoo_Widget {

	function __construct() {

		$args = array(
			'label' 		=> esc_html__( 'Tokoo - Facebook Fans', 'multimarket' ),
			'description' 	=> esc_html__( 'A custom widget to display the Facebook fans page box.', 'multimarket' ),
		 );

		// fields array
		$args['fields'] = array(

			// Title field
			array(
				'name' 		=> esc_html__( 'Title', 'multimarket' ),
				'desc' 		=> esc_html__( 'Enter the widget title.', 'multimarket' ),
				'id' 		=> 'title',
				'type' 		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> esc_html__( 'Facebook Fans', 'multimarket' ),
				'validate' 	=> 'alpha_dash',
				'filter' 	=> 'strip_tags|esc_attr'
			 ),

			// Width
			array(
				'name'		=> esc_html__( 'Facebook Page URL', 'multimarket' ),
				'id' 		=> 'fb_url',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> 'http://www.facebook.com/yourpage',
			 ),

			// Width
			array(
				'name'		=> esc_html__( 'Width', 'multimarket' ),
				'id' 		=> 'width',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> 300,
			 ),

			// Width
			array(
				'name'		=> esc_html__( 'Height', 'multimarket' ),
				'id' 		=> 'height',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> 300,
			 ),

			// Height
			array(
				'name'		=> esc_html__( 'Connection', 'multimarket' ),
				'id' 		=> 'connections',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> 10,
			 ),

		 ); // fields array

		$args['options'] 	= array(
				'width'		=> 350,
				'height'	=> 350
			);

		// create widget
		$this->create_widget( $args );
	}


	// Output function
	function widget( $args, $instance ) {

		extract( $args );

		$title 			= apply_filters( 'widget_title', $instance['title'] );
		$fb_url 		= urlencode( $instance['fb_url'] );
		$width 			= (int)( $instance['width'] );
		$height 		= (int)( $instance['height'] );
		$connections 	= (int)( $instance['connections'] );

		printf( $before_widget );

		if ( ! empty( $title ) )
			printf( '%s %s %s', $args['before_title'], $title, $args['after_title'] );
		?>

			<div class="fb-like">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php printf( '%s', $fb_url ); ?>&amp;width=<?php echo esc_attr( $width ); ?>&amp;height=<?php echo esc_attr( $height ); ?>&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;connections=<?php echo esc_attr( $connections ); ?>&amp;border_color&amp;header=true" style="border:none; overflow:hidden; width:<?php echo esc_attr( $width ); ?>px; height:<?php echo esc_attr( $height ); ?>px;"></iframe>
			</div>

		<?php

		printf( $after_widget );
	}

} // class

}
