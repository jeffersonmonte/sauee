<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php post_class( 'mm-product-single' ); ?>>
	<div class="mm-top-bg" style="background-color: #F5F6FA"></div>

	<div class="mm-product-title">
		<div class="container">
			<?php
				/**
				 * woocommerce_before_single_product hook.
				 *
				 * @hooked wc_print_notices - 10
				 */
				 do_action( 'woocommerce_before_single_product' );

				 if ( post_password_required() ) {
					echo get_the_password_form();
					return;
				 }
			?>
			<div class="mm-product-title-wrap">
				<div class="title-wrap">
					<h1 class="product-title"><?php single_post_title(); ?></h1>
					<?php multimarket_single_product_sale_flash(); ?>
					<?php get_template_part( 'breadcrumbs' ); ?>
				</div>
				<?php multimarket_custom_social_share(); ?>
			</div>
		</div>
	</div>

	<div class="mm-product-details">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					
					<?php switch ( get_post_format() ) {
						case 'audio':
							wc_get_template_part( 'content-single-image','audio' );
							break;
						case 'video':
							wc_get_template_part( 'content-single-image','video' );
							break;
						default:
							/**
							 * woocommerce_before_single_product_summary hook.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10 : removed
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );
							break;
					} ?>
					
					<?php if ( ! get_post_format() ) : ?>
						<?php $preview_url = get_post_meta( get_the_ID(), 'multimarket_product_live_preview', 'true' ); ?>
						<?php if ( ! empty( $preview_url['preview_url'] ) ) : ?>
							<div class="additional-action text-center">
								<a href="<?php echo ''.$preview_url['preview_url']; ?>" class="button"><i class="ti-eye"></i><?php esc_html_e( 'Live Preview', 'multimarket' ); ?></a>
							</div>
						<?php endif; ?>
					<?php endif; ?>

					<div class="product-content">
						<div class="product-short-description">
							<?php multimarket_single_excerpt(); ?>
						</div>

						<?php
							/**
							 * woocommerce_after_single_product_summary hook.
							 *
							 * @hooked woocommerce_output_product_data_tabs - 10 : removed
							 * @hooked woocommerce_upsell_display - 15 : removed
							 * @hooked woocommerce_output_related_products - 20 : removed
							 */
							//do_action( 'woocommerce_after_single_product_summary' ); 
						?>
						<?php multimarket_display_single_product_tabs(); ?>
					</div>

				</div>
				<div class="col-md-3">
					<div class="mm-product-action">
						<div class="product-price">
							<?php multimarket_single_price() ?>
						</div>
						<?php multimarket_single_rating(); ?>
					</div>

					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5 : removed
						 * @hooked woocommerce_template_single_rating - 10 :removed
						 * @hooked woocommerce_template_single_price - 10 
						 * @hooked woocommerce_template_single_excerpt - 20 : removed
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40 : removed
						 * @hooked woocommerce_template_single_sharing - 50 : removed
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>

					<div class="product_author_box mm-s-product-wdgt">
					<?php echo get_avatar( get_the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ), 100, '', esc_html__( 'Author Avatar', 'multimarket' ), array( 'class' => 'author_avatar' ) ); ?>
						<h2 class="author_name"><?php the_author(); ?></h2>
						<?php 
							$author_join_date = get_the_author_meta( 'user_registered', get_the_author_meta( 'ID' ) );
							$author_join_date = strtotime( $author_join_date );
							$author_join_date = date( 'M Y', $author_join_date );
						?>
						<small class="author_desc"><?php esc_html_e( 'Member since', 'multimarket' ); echo ' '.$author_join_date; ?></small>

						<ul class="author_minfo">
							<?php $total_sales = get_post_meta( get_the_ID(), 'total_sales', true ); ?>
							<li><i class="ti-tag"></i><?php echo sprintf( _n( '<strong>%s</strong> Purchase', '<strong>%s</strong> Purchases', $total_sales, 'multimarket' ), $total_sales ); ?></li>
							<li><i class="ti-comments"></i><?php echo sprintf( _n( '<strong>%s</strong> Comment', '<strong>%s</strong> Comments', $product->get_review_count(), 'multimarket' ), $product->get_review_count() ); ?></li>
						</ul>
					</div>
					
					<?php if ( $product->get_attributes() || $product->has_dimensions() || $product->has_weight() ) : ?>
						
					<div class="product_additional_info mm-s-product-wdgt">
						<h2 class="mm-s-product-wdgt-title"><?php esc_html_e( 'Item Details', 'multimarket' ); ?></h2>
						<?php wc_get_template( 'single-product/product-attributes.php', array(
							'product'            => $product,
							'attributes'         => array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' ),
							'display_dimensions' => apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ),
						) ); ?>
					</div>

					<?php endif; ?>

					<?php 
						$taxes 			= wp_get_object_terms( get_the_ID(), 'product_tag' ); 
						$i 				= 0;
						$cats_length 	= count( $taxes ); 
						if ( ! empty( $taxes ) ) {
							echo '<div class="product_tags mm-s-product-wdgt">';
								echo '<h2 class="mm-s-product-wdgt-title">'.esc_html__( 'Tags', 'multimarket' ).'</h2>';
								echo '<div class="tags">';
									foreach ( $taxes as $cat ) { 
										$separator = ( $i !== $cats_length - 1 ) ? ', ' : ''; ?>
										<a href="<?php echo esc_url( get_term_link( $cat->slug, 'product_tag' ) ); ?>"><?php echo esc_attr( $cat->name ); ?></a><?php echo esc_attr( $separator ); ?>
									<?php $i++;
								}
								echo '</div>'; 
							echo '</div>'; 
						}
					 ?>

					 <?php 
						$taxes 			= wp_get_object_terms( get_the_ID(), 'product_cat' ); 
						$i 				= 0;
						$cats_length 	= count( $taxes ); 
						if ( ! empty( $taxes ) ) {
							echo '<div class="product_tags mm-s-product-wdgt">';
								echo '<h2 class="mm-s-product-wdgt-title">'.esc_html__( 'Categories', 'multimarket' ).'</h2>';
								echo '<div class="tags">';
									foreach ( $taxes as $cat ) { 
										$separator = ( $i !== $cats_length - 1 ) ? ', ' : ''; ?>
										<a href="<?php echo esc_url( get_term_link( $cat->slug, 'product_cat' ) ); ?>"><?php echo esc_attr( $cat->name ); ?></a><?php echo esc_attr( $separator ); ?>
									<?php $i++;
								}
								echo '</div>'; 
							echo '</div>'; 
						}
					 ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10 : removed
		 * @hooked woocommerce_upsell_display - 15 : removed
		 * @hooked woocommerce_output_related_products - 20 : removed
		 */
		do_action( 'woocommerce_after_single_product_summary' ); 
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

	<?php do_action( 'woocommerce_after_single_product' ); ?>

</div>