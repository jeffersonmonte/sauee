<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Category Icons Grid Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'pcig-class';
?>

<div class="category-icon grid-layout columns-<?php echo esc_attr( $columns );?> <?php echo implode( ' ', $master_class ); ?>">
	
	<?php if ( ! empty( $categories ) ) : ?>
		
		<?php foreach ( $categories as $category ) : ?>
			
			<?php 
				$term 			= get_term_by( 'slug', $category->category, 'product_cat' ); 
				$icon_color 	= ! empty( $category->icon_color ) ? 'style="color:'.$category->icon_color.'"' : '';
				$get_bg_image 	= ! empty( $category->bg_image ) ? wp_get_attachment_image_src( $category->bg_image, 'full' ) : '';
				$overlay 		=  ! empty( $category->color_overlay ) ? $category->color_overlay : '';
				$bg_image 		= ! empty( $get_bg_image[0] ) ? 'style="background-color:'.$overlay.';background-image:url('.esc_url( $get_bg_image[0] ).')"' : '';
			?>

			<a class="category-icon__cat grid-item" <?php echo ''.$bg_image; ?> href="<?php echo esc_url( get_term_link( $category->category, 'product_cat' ) ); ?>">
				<div class="category-icon__wrap">
					<div class="category-icon__cat-image"> 
						<?php if ( 'icon_font' == $category->item_type ) : ?>
							<?php if ( ! empty( $category->icon ) ) : ?>
								<div class="<?php echo ''.$category->icon; ?>" <?php echo ''.$icon_color; ?>></div>
							<?php else :  ?>
								<div class="ti-truck"></div>
							<?php endif; ?>
						<?php else : ?>
							<?php $get_image_src = wp_get_attachment_image_src( $category->image, 'thumbnail' ); ?>
							<?php if ( ! empty( $get_image_src ) ) : ?>
								<img src="<?php echo esc_url( $get_image_src[0] ); ?>" alt="<?php esc_html_e( 'Category Image', 'multimarket' ); ?>">
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="category-icon__cat-detail">
						<?php if ( ! empty( $category->custom_name ) ) : ?>
							<div class="category-icon__cat-title text-gradient"><?php echo esc_attr( $category->custom_name ); ?></div>
						<?php else : ?>
							<?php if ( ! empty( $term->name ) ) : ?>
								<div class="category-icon__cat-title text-gradient"><?php echo esc_attr( $term->name ); ?></div>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ( true == $count && ! empty( $term->count ) ) : ?>
							<small class="category-icon__cat-count">
								<?php echo sprintf( _n( '%s Item', '%s Items', $term->count, 'multimarket' ), number_format_i18n( $term->count ) ); ?>
							</small>
						<?php endif; ?>
					</div>
				</div>
			</a>

		<?php endforeach; ?>

	<?php endif; ?>
</div>
