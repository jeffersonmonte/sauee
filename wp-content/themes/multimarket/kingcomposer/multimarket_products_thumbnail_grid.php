<?php 

/*-----------------------------------------------------------------------------------*/
/*	Products Thumbnail Grid Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
?> 
	<?php 
		$product_visibility_term_ids = wc_get_product_visibility_term_ids();
		$args = array(
			'post_type'			=> 'product',
			'posts_per_page'	=> $limit,
			'order'				=> $order,
			'orderby'			=> $orderby,
		); 

		if ( $product_category != 'all' ) {
			$args['product_cat']	= $product_category;
		}
 
		switch ( $show_product ) {
			case 'featured':
				$args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['featured'],
				);
				break;
			case 'onsale':
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$args['post__in'] 		= $product_ids_on_sale;
				break;
			case 'best_selling':
				$args['meta_key'] 		= 'total_sales';
				$args['orderby'] 		= 'meta_value_num';
				break;
			default:
				break;
		}

		$products = new WP_Query( $args );
	 ?>

	<?php if ( $products->have_posts() ) : ?>

		<div class="mm-products-thumbnail-grid">
			<div class="grid-layout columns-<?php echo esc_attr( $columns ); ?>">

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					
					<?php if ( has_post_thumbnail() ) : ?>
						
						<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
						<div class="grid-item">
							<a href="<?php the_permalink(); ?>">
								<span class="intrinsic-ratio" style="padding-bottom:100%">
									<img class="tokoo-lazyload" 
										 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" 
										 data-original="<?php echo multimarket_resize( $img_src[0], 150, 150 ); ?>" alt="<?php the_title(); ?>">
								</span>
							</a>
						</div>		

					<?php endif; ?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
		
		<?php else: ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	 <?php endif; ?>


		

	