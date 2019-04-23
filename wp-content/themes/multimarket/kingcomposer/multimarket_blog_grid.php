<?php 

/*-----------------------------------------------------------------------------------*/
/*	LATEST Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'blog-grid'; 

$args 	= array(
	'post_type'				=> 'post',
	'posts_per_page'		=> $limit,
	'ignore_sticky_posts'	=> 1,
);
$latest_posts = new WP_Query( $args );
?>

<?php if ( $latest_posts->have_posts() ) : ?>

	<div class="mm-blog-grid">
		<div class="grid-layout style-plain columns-<?php echo esc_attr( $columns ); ?>">
	
			<?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
				
				<article <?php post_class( 'grid-item' ); ?>>
					<div class="inner-post">
						
						<?php if ( has_post_thumbnail() ) : ?>
							<figure class="post-image">
								<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
								<a href="<?php the_permalink(); ?>"><span class="intrinsic-ratio" style="padding-bottom: 75%">
									<img class="tokoo-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="<?php echo multimarket_resize( $img_src[0], 400, 300 ) ?>" alt="<?php the_title(); ?>" width=400 height=300>
								</span></a>
							</figure>
						<?php endif; ?>

						<div class="post-detail">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span class="post-date"><?php echo multimarket_published_date(); ?></span>
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</article>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		</div>
	</div>
	
<?php endif; ?>
