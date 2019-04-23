<?php

/*-----------------------------------------------------------------------------------*/
/*	Livre Video Lightbox Shortcodes
/*-----------------------------------------------------------------------------------*/
extract( $atts );
$master_class 	= apply_filters( 'kc-el-class', $atts );
?>

<div class="tokoo-video-lightbox <?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
	<a href="<?php echo ''.$video_url; ?>" class="video-popup-trigger venobox" data-vbtype="video" data-autoplay="true">
		<?php if ( ! empty( $trigger_image ) ) : ?>
			<?php $get_img = wp_get_attachment_image_src( $trigger_image, 'full' ); ?>
			<img src="<?php echo esc_url( $get_img[0] ); ?>" alt="<?php esc_html_e( 'Video Lightbox', 'multimarket' ); ?>">
		<?php else : ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/video-lightbox.jpg" alt="<?php esc_html_e( 'Video Lightbox', 'multimarket' ); ?>">
		<?php endif; ?>
	</a>
</div>