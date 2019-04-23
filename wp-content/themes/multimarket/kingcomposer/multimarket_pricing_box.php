<?php

/*-----------------------------------------------------------------------------------*/
/*	Multimarket Pricing Box Shortcodes
/*-----------------------------------------------------------------------------------*/
extract( $atts );
$master_class = apply_filters( 'kc-el-class', $atts );
?>

<div class="mm-pricing-box <?php echo esc_attr( implode( ' ', $master_class ) ); ?> <?php echo ( 'yes' == $highlight ) ? '--highlight' : ''; ?>">
	<div class="pricing_header">
		<div class="product_title">
			<h2 class="product_name"><?php echo ''.$product_title; ?></h2>
			<small class="product_desc"><?php echo ''.$product_description; ?></small>
		</div>
		<div class="product_price">
			<strong class="price"><?php echo ''.$product_price; ?></strong>
			<span class="unit"><?php echo ''.$product_price_unit; ?></span>
		</div>
	</div>

	<?php if ( ! empty( $product_image ) ) : ?>
		<?php $img_src = wp_get_attachment_image_src( $product_image, 'full' ); ?>
		<div class="pricing_image">
			<img src="<?php echo multimarket_resize( $img_src[0], 100, 100 ); ?>" alt="<?php esc_html_e( 'product image', 'multimarket' ); ?>">
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $features ) ) : ?>
		
		<ul class="pricing_features">

			<?php foreach ( $features as $item ) : ?>
				
				<li>
					<?php if ( ! empty( $item->icon ) ) : ?>
						<span class="feature_icon" <?php echo ( ! empty( $item->icon_color ) ) ? "style='color:{$item->icon_color}'" : ''; ?>>
							<i class="<?php echo esc_attr( $item->icon ); ?>"></i>
						</span>
					<?php endif; ?>

					<?php if ( ! empty( $item->title ) || ! empty( $item->subtitle ) ) : ?>
						<div class="feature_detail">
							<span class="subtitle"><?php echo ''.$item->subtitle; ?></span>
							<h3><?php echo ''.$item->title; ?></h3>
						</div>
					<?php endif; ?>
				</li>

			<?php endforeach; ?>
		</ul>

	<?php endif; ?>

	<div class="pricing_action">
		<a href="<?php echo ''.$button_link; ?>" class="button"><?php echo ''.$button_label; ?></a>
	</div>

</div>
	
