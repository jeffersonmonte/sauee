<?php 

/*-----------------------------------------------------------------------------------*/
/*	Products Carousel Shortcode
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

		<div class="mm-products-carousel"
			data-visible=<?php echo esc_attr( $visible_items ); ?>
			data-auto=<?php echo ( 'yes' == $autoplay ) ? esc_attr( 'true' ) : 'false'; ?>
			<?php echo ( 'yes' == $autoplay ) ? 'data-autodelay='.esc_attr( $autoplay_delay ).'' : ''; ?>
			data-isoffset=<?php echo ( 'yes' == $offset ) ? esc_attr( 'true' ) : 'false'; ?>
			<?php echo ( 'yes' == $offset ) ? 'data-offset='.esc_attr( $offset_width ).'' : ''; ?>
			>
			<div class="product-modern grid-layout columns-<?php echo esc_attr( $columns ); ?>">

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					
					<?php get_template_part( 'woocommerce/content-product-modern' ); ?>					

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			
			</div>
		</div>
		
		<?php else: ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	 <?php endif; ?>


		

	