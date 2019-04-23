<?php 

/*-----------------------------------------------------------------------------------*/
/*	PRODUCT SEARCH Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'product-search-form'; ?>

<div class="mm-product-search <?php echo implode( ' ', $master_class ); ?>">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="product-search-input">
			<input type="text" name="s" placeholder="<?php echo esc_attr__( 'Search', 'multimarket' ); ?>">
			<button type="submit" class="search-icon">
				<i class="fa fa-search"></i>
			</button>
		</div>
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<input type="hidden" name="post_type" value="product">
		<?php endif; ?>
	</form>
</div>