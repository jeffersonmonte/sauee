<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Flip Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'author-highlight'; 
?>

<div class="mm-author-highlight">
	<div class="author-info">
		<a href="#" class="author-avatar">
			<span class="intrinsic-ratio" style="padding-bottom:100%">
				<img class="tokoo-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="<?php echo get_avatar_url( $author ); ?>" alt="<?php esc_html_e( 'Author Name', 'multimarket' ); ?>">
			</span>
		</a>
		<div class="author-detail">
			<?php 
				$author_name 		= get_the_author_meta( 'user_nicename', $author );
				$author_join_date 	= get_the_author_meta( 'user_registered', $author );
				$author_join_date 	= strtotime( $author_join_date );
				$author_join_date 	= date( 'M Y', $author_join_date );
			?>
			<h3 class="author-name"><?php echo ucfirst( $author_name ); ?></h3>
			<small class="author-desc"><?php esc_html_e( 'Member since', 'multimarket' ); echo ' '.$author_join_date; ?></small>
			<?php if ( function_exists( 'dokan_get_store_url' ) ) : ?>
				<a href="<?php echo dokan_get_store_url( $author ); ?>"><?php esc_html_e( 'View Portfolio', 'multimarket' ); ?></a>
			<?php else : ?>
				<a href="<?php echo get_author_posts_url( $author, $author_name ); ?>"><?php esc_html_e( 'View Portfolio', 'multimarket' ); ?></a>
			<?php endif; ?>
		</div>
	</div>

	<div class="author-items">
		<?php 
			$args = array(
				'post_type'				=> 'product',
				'posts_per_page'		=> 3,
				'ignore_sticky_posts'	=> true,
				'author'				=> $author,
			); 
			$products = new WP_Query( $args );
		 ?>
		<?php if ( $products->have_posts() ) : ?>
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				
				<?php if ( has_post_thumbnail() ) : ?>

					<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
					
					<a href="<?php the_permalink(); ?>"><span class="intrinsic-ratio ratio-1_1">
						<img class="tokoo-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="<?php echo multimarket_resize( $img_src[0], 70, 70 ); ?>" alt="<?php the_title(); ?>" width=70 height=70>
					</span></a>

				<?php endif; ?>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</div>

