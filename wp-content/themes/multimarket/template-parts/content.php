<?php

/**
 * The Template for displaying content of post format standard
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
 
<?php if ( is_singular( 'post' ) ) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
		
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="post__image">
				<?php 
					$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
					// $image_url = multimarket_resize( $image_src[0], 990, 640 );
					/*
					'<div class="bg" style="background-image:url(<?php echo esc_url( $image_url ); ?>)"></div>'
					*/
				?>
				<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
			</figure>
		<?php endif; ?>
		
		<div class="post__content entry-content">
			<h1 class="post__title"><?php single_post_title(); ?></h1>
			<div class="post__meta">
				<div class="post__author">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
					<?php multimarket_post_by_author(); ?>
				</div>
				<?php echo multimarket_published_date(); ?>
			</div>
			<?php the_content(); ?>
			<?php multimarket_pagination_page_break(); ?>
		</div>
		
		<footer class="post__footer">
			<?php echo multimarket_post_category( array(
				'before' => '<div class="post__categories"><i class="ti-folder"></i>',
				'after'  => '</div>',
			) ); ?>
			<?php echo multimarket_post_tags( array(
				'before' 	=> '<div class="post__tags"><i class="ti-tag"></i>',
				'after'  	=> '</div>',
				'separator' => ', '
			) ); ?>
			<?php multimarket_custom_social_share(); ?>
		</footer>

	</article>

<?php } else { ?>

	<?php
		$sticky 	= is_sticky() ? 'sticky' : '';
		$datasticky = '';

		if ( is_sticky() ) {
			$sticky_text = multimarket_get_option( 'stick_text' );

			if ( ! empty( $sticky_text ) ) {
				$datasticky = 'data-sticky="' . $sticky_text . '"';
			} else {
				$datasticky = 'data-sticky="' . esc_html__( 'Featured', 'multimarket' ) . '"';
			}
		}
	?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item ' ); ?> <?php printf( '%s', $datasticky ); ?>>
		<div class="post__inner">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>					
			<div class="post__detail">
				<div class="post__header">
					<?php echo multimarket_post_category( array(
						'before' => '<span class="categories">',
						'after'  => '</span>'
					) ); ?>
					<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post__meta">
					<div class="post__author">
						<?php echo get_avatar( get_the_author_meta('user_email'), $size = '32'); ?>
						<?php multimarket_post_by_author(); ?>
					</div>
					<?php echo multimarket_published_date(); ?>
					<?php //multimarket_pagination_page_break(); ?>
				</div>
			</div>
		</div>
	</article>

<?php }