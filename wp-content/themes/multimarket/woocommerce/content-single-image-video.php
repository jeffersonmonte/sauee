<?php 
	$get_video 	= get_post_meta( get_the_ID(), 'multimarket_product_video_details', true );
	
	if ( isset( $get_video['hosted_video'] ) && 'file' == $get_video['hosted_video'] ) {

		if ( ! empty( $get_video['video_file'] ) ) {
			echo do_shortcode( '[video src="'.$get_video['video_file'].'" width="850"]' );
		}
	} else {
		if ( ! empty( $get_video['youtube_url'] ) ) { ?>
			<span class="intrinsic-ratio" style="padding-bottom:56.25%">
				<?php echo ''.$get_video['youtube_url']; ?>
			</span>
		<?php }
	}
?>