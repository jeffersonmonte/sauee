<?php 

/*-----------------------------------------------------------------------------------*/
/*	Reading List Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

if ( ! empty( $collection_ids ) ) :

$collection_ids = explode( ',', $collection_ids );

$args = array(
	'taxonomy' 		=> 'collections', 
	'hide_empty' 	=> true,
	'include'		=> $collection_ids,
);
$term_query = new WP_Term_Query( $args );
?>
	<div class="multimarket-reading-list <?php echo esc_attr( $style ); ?>">
		<div class="grid-layout columns-3">

			<?php foreach ( $term_query->terms as $term ) : ?>
				
				<div class="grid-item collection">
					<div class="collection__inner">
						<?php if ( function_exists( 'carbon_get_term_meta' ) ) : ?>
							<?php 
								$cover_id 			= carbon_get_term_meta( $term->term_id, 'multimarket_collection_cover' ); 
								$collection_type 	= carbon_get_term_meta( $term->term_id, 'multimarket_collection_type' );
								$collection_type 	= ! empty( $collection_type ) ? $collection_type : 'Book'; 
								$img_src 			= wp_get_attachment_image_src( $cover_id, 'full' ); 
								$width 				= ! empty( $image_width ) ? $image_width : '500';
								$height 			= ! empty( $image_height ) ? $image_height : '500';
							?>
							<?php if ( ! empty( $cover_id ) ) : ?>
								<div class="collection__image">
									<a href="<?php echo esc_url( get_term_link( $term->term_id, 'collections' ) ); ?>">
										<span class="intrinsic-ratio" style="padding-bottom:<?php echo ($height/$width)*100; ?>%">
											<img class="tokoo-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="<?php echo multimarket_resize( $img_src[0], $width, $height ); ?>" alt="<?php echo ''.$term->name; ?>">
										</span>
									</a>
								</div>
							<?php endif; ?>
						<?php endif; ?>

						<div class="collection__detail">
							<div class="title">
								<h2><a href="<?php echo esc_url( get_term_link( $term->term_id, 'collections' ) ); ?>"><?php echo ''.$term->name; ?></a></h2>
							</div>
							<div class="desc">
								<span class="count">
									<?php if ( $term->count <= 1 ) : ?>
										<?php echo esc_attr( $term->count ) . ' ' . esc_attr( $collection_type ); ?>
									<?php else : ?>
										<?php echo esc_attr( $term->count ) . ' ' . esc_attr( $collection_type ). 's'; ?>
									<?php endif; ?>
								</span>
							</div>
						</div>
						
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

<?php endif; ?>
