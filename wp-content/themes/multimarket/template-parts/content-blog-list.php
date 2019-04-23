<?php

/**
 * The Template for displaying content of post format standard
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
 
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item post' ); ?> <?php printf( '%s', $datasticky ); ?>>
	<div class="post__inner">

		<?php if ( 'gallery' == get_post_format() ) : ?>
			
			<div class="post__image gallery-slider">
				<?php
					$args = array(
						'orderby'        => 'rand',
						'post_type'      => 'attachment',
						'post_parent'    => get_the_ID(),
						'post_mime_type' => 'image',
						'post_status'    => null,
						'numberposts'    => 7,
						);
					$attachments = get_children( $args );

					if ( $attachments ) { ?>

						<ul class="slides">
							<?php foreach ( $attachments as $key => $attachment ) { ?>
								<?php $large_image = wp_get_attachment_image_src( $attachment->ID, 'full' ); ?>
								<li>
									<a class="tokoo-lightbox" data-gall="post-gallery-<?php the_ID(); ?>" href="<?php echo esc_url( $large_image[0] ); ?>">
										<img src="<?php echo multimarket_resize( $large_image[0], 200, 200 ); ?>" alt="<?php esc_html_e( 'Post Images', 'multimarket' ); ?>">
									</a>
								</li>
							<?php } ?>
						</ul><!-- .tile-layout -->

					<?php }
				?>
			</div>

		<?php else : ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							$image_src = multimarket_get_featured_image_url(); 
							$image_url = multimarket_resize( $image_src, 200, 200 );
						?>		
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title(); ?>">
					</a>
				</div>
			<?php endif; ?>	
							
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
			</div>
			<div class="post__excerpt">
				<?php the_excerpt(); ?>
				<?php //multimarket_pagination_page_break(); ?>
				<a class="post__more button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'multimarket' ); ?></a>
			</div>
		</div>
	</div>
</article>

