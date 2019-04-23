<?php 

/*-----------------------------------------------------------------------------------*/
/*	Section Title Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
$master_class 	= apply_filters( 'kc-el-class', $atts );

if ( ! empty( $section_title ) || ! empty( $section_sub_title ) ) : ?>
	<div class="section-header <?php echo esc_attr( implode( ' ', $master_class ) ); ?> <?php echo esc_attr( $position ); ?>">
		<h2 class="section-title"><?php echo ''.$section_title; ?></h2>
		<small class="section-subtitle"><?php echo ''.$section_sub_title; ?></small>
	</div>
<?php endif; ?>