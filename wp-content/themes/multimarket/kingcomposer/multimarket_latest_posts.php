<?php 

/*-----------------------------------------------------------------------------------*/
/*	LATEST Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'product-search-form'; 

$args 	= array(
	'post_type'				=> 'post',
	'posts_per_page'		=> $limit,
	'ignore_sticky_posts'	=> 1,
);
$latest_posts = new WP_Query( $args );
?>

<?php if ( $latest_posts->have_posts() ) : ?>

	<div class="multimarket-latest-post">
		<div class="grid-layout columns-<?php echo esc_attr( $columns ); ?>">
	
			<?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
				
				<div class="grid-item post-item">
					<div class="inner-post-item">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<small><?php echo multimarket_published_date(); ?></small>

						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		</div>
	</div>
	
<?php endif; ?>
