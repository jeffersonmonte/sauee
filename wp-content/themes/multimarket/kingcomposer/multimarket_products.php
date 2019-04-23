<?php 

/*-----------------------------------------------------------------------------------*/
/*	Products Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

switch ( $product_style ) {
	case 'modern':
		echo '<div class="product-modern grid-layout columns-'.$columns.'">';
		break;
	case 'list':
		echo '<div class="product-list">';
		break;
	
	default:
		echo '<div class="product-grid grid-layout columns-'.$columns.'">';
		break;
}
?> 
	<?php 
		$product_visibility_term_ids = wc_get_product_visibility_term_ids();
		$args = array(
			'post_type'			=> 'product',
			'posts_per_page'	=> ( 'all' == $product_type ) ? $limit : -1,
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
		<?php while ( $products->have_posts() ) : $products->the_post();

			// REGULAR PRODUCTS
			$get_product_type 		= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
			$get_product_meta_type 	= ! empty( $get_product_type ) ? $get_product_type : 'regular';

			$get_default_layout = get_theme_mod( 'multimarket_product_default_layout', 'grid' );
			$product_layout 	= isset( $_GET['layout'] ) ? $_GET['layout'] : $get_default_layout;

			if ( 'all' == $product_type ) {
				multimarket_woocommerce_content_product_layout( $product_style );
			} else {

				ob_start();
					if ( 'book' == $get_product_meta_type ) {
						multimarket_woocommerce_content_product_layout( $product_style );
						$book_products[] = ob_get_contents( $product_style );
					}
					if ( 'movie' == $get_product_meta_type ) {
						multimarket_woocommerce_content_product_layout();
						$movies_products[] = ob_get_contents( $product_style );
					}
					if ( 'audio' == $get_product_meta_type ) {
						multimarket_woocommerce_content_product_layout( $product_style );
						$audio_products[] = ob_get_contents();
					}
					if ( 'game' == $get_product_meta_type ) {
						multimarket_woocommerce_content_product_layout( $product_style );
						$game_products[] = ob_get_contents();
					}
					if ( ! isset( $get_product_meta_type ) || empty( $get_product_meta_type ) || 'regular' == $get_product_meta_type ) {
						multimarket_woocommerce_content_product_layout( $product_style );
						$regular_products[] = ob_get_contents();
					}	
				ob_end_clean(); 
			} ?>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else: ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
	 <?php endif; ?>

	 <?php
		if ( 'all' !== $product_type ) {
		 	switch ( $product_type ) {
				case 'regular':
						$reg = 1; 
						if ( ! empty( $regular_products ) ) {
							foreach ( $regular_products as $regular ) : 
								if ( $limit >= $reg ) : 
									echo ''.$regular; 
								endif; 
							$reg++; endforeach;
						}
					break;
				case 'book':
						$book = 1; 
						if ( ! empty( $book_products ) ) {
							foreach ( $book_products as $buku ) : 
								if ( $limit >= $book ) : 
									echo ''.$buku; 
								endif; 
							$book++; endforeach; 
						}
					break;
				case 'movie':
						$mov = 1; 
						if ( ! empty( $movies_products ) ) {
							foreach ( $movies_products as $movies ) : 
								if ( $limit >= $mov ) : 
									echo ''.$movies; 
								endif; 
							$mov++; endforeach;  
						}
					break;
				case 'game':
						$game = 1;
						if ( ! empty( $game_products ) ) {
							foreach ( $game_products as $games ) :
								if ( $limit >= $game ):
									echo ''.$games;
								endif;
							$game++; endforeach;
						}
					break;
				case 'audio':
						$mus = 1;
						if ( ! empty( $audio_products ) ) {
							foreach ( $audio_products as $musics ) :
								if ( $limit >= $mus ) :
									echo ''.$musics;
								endif;
							$mus++; endforeach;
						}
					break;
			}
		}
	  ?>
</div>