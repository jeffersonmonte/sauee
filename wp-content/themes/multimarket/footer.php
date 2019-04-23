<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Livre
 */
?>
		<?php 
			if ( is_home() ) {
				$page_id = get_option( 'page_for_posts' );
			} else if ( is_front_page() ) {
				$page_id = get_option( 'page_on_front' );
			} else {
				$page_id 		= get_queried_object_id();
			}
			$page_details 	= get_post_meta( $page_id, 'multimarket_page_details', true );
			$disable_footer = ! empty( $page_details['disable_footer'] ) && ( 1 == $page_details['disable_footer'] ) ? 1 : 0;  

			if ( 0 == $disable_footer ) :
				
				$global_footer 		= get_theme_mod( 'multimarket_footer_page' );
				$footer_page 		= ! empty( $page_details['footer_page'] ) ? $page_details['footer_page'] : $global_footer;

				if ( ! empty( $footer_page ) ) : 
					$footer_content = get_post_field( 'post_content', $footer_page );
					echo do_shortcode( $footer_content );
				else :
				?>
					<footer class="site-footer">

						<?php get_sidebar( 'footer' ); ?>
					
						<div class="site-footer__colophon">
							<div class="container">
								<div class="grid-layout columns-2 v-align">
									<div class="grid-item"><span><?php multimarket_footer_text(); ?></span></div>
									<div class="grid-item text-right">
										<?php 
											$footer_payment_logo = get_theme_mod( 'payment_logo' );
											if ( ! empty( $footer_payment_logo ) ) :
												echo '<img src="' . esc_url( $footer_payment_logo ) . '" alt="'.esc_html__( 'Custom Logo', 'multimarket' ).'">';
											endif;
										?>
									</div>
								</div>
							</div>
						</div>
					</footer>

				<?php endif; ?>
			<?php endif; ?>
	</div>
	
	<?php if ( class_exists('WooCommerce') AND ! is_checkout() AND ! is_account_page() ): ?>
		<!-- HEADER FORM LOGIN -->
		<?php get_template_part( 'woocommerce/myaccount/header-form-login' ); ?>
	<?php endif ?>

	<?php wp_footer(); ?>
</body>
</html>
