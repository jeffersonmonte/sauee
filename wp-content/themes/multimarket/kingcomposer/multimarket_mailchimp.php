<?php 

/*-----------------------------------------------------------------------------------*/
/*	Mailchimp Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'mailchimp-form'; ?>

<div class="<?php echo implode( ' ', $master_class ); ?>">
	<?php echo do_shortcode( '[mc4wp_form id="' . $mailchimp_id . '"]' ); ?>
</div>
