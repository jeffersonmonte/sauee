<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Multimarket
 */

get_header(); ?>

	<?php
		/**
		 * multimarket_before_main_content hook
		 *
		 * @hooked themename_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'multimarket_before_main_content' );
	 ?>
	
	<div class="content-area col-md-12">
		<?php if ( class_exists( 'woocommerce' ) ) : ?>
			<div class="product-modern grid-layout columns-4">
		<?php else : ?>
			<div class="post-grid grid-layout columns-2">
		<?php endif; ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'woocommerce/content-product-modern' ); ?>

				<?php endwhile; ?>


			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			
		</div>
		
		<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
			<nav class="posts-navigation">
				<?php get_template_part( 'loop', 'nav' ); ?>
			</nav>
		<?php endif; ?>
	</div>

	<?php
		/**
		 * multimarket_after_main_content hook
		 *
		 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'multimarket_after_main_content' );
	 ?>

<?php get_footer(); ?>
