<?php 
	$get_audio 	= get_post_meta( get_the_ID(), 'multimarket_product_audio_details', true );
	
	if ( isset( $get_audio['hosted_audio'] ) && 'files' == $get_audio['hosted_audio'] ) {

		if ( ! empty( $get_audio['audio_ids'] ) ) {
			$ids 	= array();
			foreach ( $get_audio['audio_ids'] as $file ) :
				$ids[] = attachment_url_to_postid( $file['id'] );
			endforeach; 

			if ( ! empty( $ids ) ) {
				echo do_shortcode( '[playlist ids="'.implode( ',', $ids ).'"]' );
			}
		}
	} else {
		if ( ! empty( $get_audio['soundcloud_url'] ) ) {
			echo ''.$get_audio['soundcloud_url'];
		}
	}
?>