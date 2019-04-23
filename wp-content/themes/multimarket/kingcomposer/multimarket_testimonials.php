<?php

/*-----------------------------------------------------------------------------------*/
/*	Multimarket Testimonials Shortcodes
/*-----------------------------------------------------------------------------------*/
extract( $atts );
$master_class = apply_filters( 'kc-el-class', $atts );

$args = array(
	'post_type'				=> 'tokoo-testimonials',
	'ignore_sticky_posts' 	=> 1,
	'post_status'       	=> 'publish',
);
if ( ! empty( $testimony_ids ) ) {
	$ids 				= explode( ',', $testimony_ids ); 
	$args['post__in'] 	= $ids;
}

$testimonials = new WP_Query( $args );
?>

<?php if ( $testimonials->have_posts() ) : ?>
	
	<div class="testimonial-slider <?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
 	
	 	<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
			
			<?php $testimony_meta = get_post_meta( get_the_ID(), 'multimarket_testimonials_details', true ); ?>

			<div class="testimonial-slide">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'small' ); ?>
				<?php endif; ?>

				<?php if ( ! empty( $testimony_meta['testimony_content'] ) ) : ?>
					<blockquote>"<?php echo ''.$testimony_meta['testimony_content']; ?>"</blockquote>
				<?php endif ?>

				<cite>
					<span class="fn"><?php the_title(); ?></span>
					<?php if ( ! empty( $testimony_meta['position'] ) ) : ?>
						<span class="fn-title"><?php echo esc_attr( $testimony_meta['position'] ); ?></span>
					<?php endif ?>
				</cite>
			</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

	</div>

<?php endif; ?>
	
