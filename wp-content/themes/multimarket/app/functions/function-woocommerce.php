<?php

/**
 * bounce back if WooCommerce is not installed
 *
 * @since 1.0
 */
if ( ! class_exists( 'WooCommerce' ) )
	return;

/**
 * Woocommerce custom functions
 * 
 * @since 1.0
 */

add_action( 'after_setup_theme', 'lecrafts_woocommerce_support' );
function lecrafts_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'init', 'multimarket_woo_functions' );
function multimarket_woo_functions() {

	/* Disable WooCommerce styles */
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	/**
	 * Add theme support for woocommerce
	 *
	 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/#section-2
	 */
	//add_theme_support( 'woocommerce' );

	/* Define custom image sizes for woocommerce on theme activation. */
	add_action( 'init', 'multimarket_woocommerce_image_dimensions', 1 );

	if ( class_exists( 'YITH_WCWL' ) ) :
		update_option( 'yith_wcwl_add_to_wishlist_icon', 'fa-heart-o' );
		update_option( 'yith_wcwl_button_position', 'shortcode' );
	endif;

	/* filter Cross Sells number */
	// add_filter( 'woocommerce_cross_sells_total', create_function( '', 'return 3;' ) );


	/** Template Hooks ********************************************************/

	if ( ! is_admin() || defined('DOING_AJAX') ) {

		/**
		 * Remove Breadcrumbs
		 */
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

		remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );

		/**
		 * woocommerce_single_product_summary hook
		 */
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_related_products', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

		/**woocommerce_result_count
		 * Remove sidebar
		 */
		// remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		/**
		 * woocommerce_before_single_product_summary
		 */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
		/**
		 * woocommerce_before_shop_loop_item_title
		 */
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'woocommerce_shop_loop_item_title', 'multimarket_product_title', 10 );

		/**
		 * woocommerce_after_shop_loop_item_title
		 */
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

		/**
		 * After Product Summary
		 */ 
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

		/**
		 * remove cross-sells
		 */
		remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );
		
		add_action( 'woocommerce_after_single_product_summary', 'multimarket_display_upsells_product', 20 );
		add_action( 'woocommerce_after_single_product_summary', 'multimarket_display_related_product', 25 );


	}

}

/**
 * Define image sizes
 */
function multimarket_woocommerce_image_dimensions() {

	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {

		$catalog = array(
			'width' => '330', // px
			'height' => '452', // px
			'crop' => 1 // true
		);

		$single = array(
			'width' => '300', // px
			'height' => '458', // px
			'crop' => 1 // true
		);

		$thumbnail = array(
			'width' => '150', // px
			'height' => '150', // px
			'crop' => 1 // true
		);

		/* Product category thumbs. */
		update_option( 'shop_catalog_image_size'  , $catalog );

		/* Single product image. */
		update_option( 'shop_single_image_size'   , $single );

		/* Image gallery thumbs. */
		update_option( 'shop_thumbnail_image_size', $thumbnail );

	}

}


/**
 * My account URL on header.php
 * @since 1.0
 */
function multimarket_my_account_url() {
	printf ( '<a class="top-account" href="%s">%s</a>',
		esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
		esc_hrml__( 'My Account', 'multimarket' )
	);
}


/**
 * Returns true if on WooCommerce pages
 * Includes: Cart, Checkout, Pay, Thanks (Order Received), View Order, Order Tracking,
 *   My Account, Edit Address, Change Password, and Term
 * @return boolean
 */
function multimarket_is_woocommerce_pages() {
	if ( is_cart() || is_checkout() || is_account_page() ) {
		return true;
	} else {
		return false;
	}
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'multimarket_header_add_to_cart_fragment' );
function multimarket_header_add_to_cart_fragment( $fragments ) {

	ob_start(); ?>
	<button class="no-ui menu-cart-trigger">
		<span class="simple-icon-bag"></span>
		<span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
	</button>

	<?php
	$fragments['button.no-ui.menu-cart-trigger'] = ob_get_clean();

	return $fragments;
}

/**
 * Register sidebar shop
 *
 * @return void
 * @author tokoo
 **/
add_action( 'widgets_init', 'multimarket_register_sidebar_shop' );
function multimarket_register_sidebar_shop() {
	$shop_param = array(
		'name' 			=> esc_html__( 'Shop', 'multimarket' ),
		'id' 			=> 'shop',
		'description' 	=> esc_html__( 'Widgets in this area will be shown on the shop page.', 'multimarket' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);

	register_sidebar( $shop_param );
}

/**
 * Tokoo WooCommerce control from theme option
 *
 * @since  2.0
 * @author tokoo
 */

/* Disable product category count */
if ( true == multimarket_get_option( 'product_category_count' ) ) {
	add_filter( 'woocommerce_subcategory_count_html', 'multimarket_disable_product_category_count' );
}
function multimarket_disable_product_category_count() {
	echo '';
}

/* Set product per page */
add_filter( 'loop_shop_per_page', 'multimarket_shop_per_page' );
function multimarket_shop_per_page() {
	$tokoo_product_per_page = multimarket_get_option( 'product_per_page' );
	$default_product_per_page = get_option( 'posts_per_page' );
	if ( ! empty ( $tokoo_product_per_page ) && $tokoo_product_per_page !== 0 ) {
		$per_page = $tokoo_product_per_page;
	} else {
		$per_page = $default_product_per_page;
	}

	return $per_page;
}

/**
 * Tokoo product sale flash
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_product_sale_flash() {
	if ( false == multimarket_get_option( 'product_sale_flash' ) ) {
		woocommerce_show_product_loop_sale_flash();
	}
}

/**
 * Tokoo product category
 *
 * @since  2.0
 * @author tokoo
 */
function multimarket_product_category() {
	if ( false == multimarket_get_option( 'product_category' ) ) { ?>
		<?php
		global $product;
		printf( wc_get_product_category_list( $product->get_id(), ', ', '<div class="product__category">', '</div>' ) );
		?>
	<?php }
}

/**
 * Tokoo product title
 *
 * @since  2.0
 * @author tokoo
 */
function multimarket_product_title() {
	if ( false == multimarket_get_option( 'product_title' ) ) { ?>
		<h3 class="product__title" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php }
}

/**
 * Tokoo Star Rating
 * 
 * @since  2.0
 * @author tokoo
 */
 function multimarket_product_star_rating() {
	if ( false == multimarket_get_option( 'product_star_rating' ) ) {
		woocommerce_template_loop_rating();
	} 
}

/**
 * Tokoo product price
 * not used in LeCrafts
 * @since  2.0
 * @author tokoo
 */
function multimarket_product_price() {
	if ( false == multimarket_get_option( 'product_price' ) ) {
		woocommerce_template_loop_price();
	}
}

/**
 * Tokoo product add to cart
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_product_add_to_cart() {
	if ( false == multimarket_get_option( 'product_add_to_cart' ) ) {
		woocommerce_template_loop_add_to_cart();
	}
}

/**
 * Tokoo product result count
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_product_result_count() {
	if ( false == multimarket_get_option( 'product_result_count', false ) ) { ?>
		<div class="align center"><?php woocommerce_result_count(); ?></div>
		<?php
	}
}

/**
 * Tokoo product catalog ordering
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_product_catalog_ordering() {
	if ( false == multimarket_get_option( 'product_catalog_ordering' ) ) { ?>
		<div class="pull-right">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
		<?php
	}
}

/**
 * Tokoo single product sale flash
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_product_sale_flash() {
	if ( false == multimarket_get_option( 'product_single_sale_flash' ) ) {
		woocommerce_show_product_sale_flash();
	}
}

/**
 * Tokoo single product price
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_price() {
	if ( false == multimarket_get_option( 'product_single_price' ) ) {
		woocommerce_template_single_price();
	}
}

/**
 * Tokoo single product add to cart
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_add_to_cart() {
	if ( false == multimarket_get_option( 'product_single_add_to_cart' ) ) {
		woocommerce_template_single_add_to_cart();
	}
}

/**
 * Tokoo single product excerpt
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_excerpt() {
	if ( false == multimarket_get_option( 'product_single_excerpt' ) ) {
		woocommerce_template_single_excerpt();
	}
}

/**
 * Tokoo single product meta
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_meta() {
	if ( false == multimarket_get_option( 'product_single_meta' ) ) {
		woocommerce_template_single_meta();
	}
}

/**
 * Tokoo single product rating
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_single_rating() {
	if ( false == multimarket_get_option( 'product_single_rating' ) ) {
		woocommerce_template_single_rating();
	}
}

/**
 * Tokoo related product
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_display_related_product() {
	$related_product_per_page = multimarket_get_option( 'related_product_per_page' );
	$related_product_per_page = ( $related_product_per_page ) ? $related_product_per_page : 4;
	if ( false == multimarket_get_option( 'product_related' ) ) {
		woocommerce_related_products( $args = array( 'posts_per_page' => $related_product_per_page ), $columns = 1 );
	}
}

/**
 * Tokoo upsells product
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_display_upsells_product() {
	$upsells_product_per_page = multimarket_get_option( 'upsell_product_per_page', 6 );
	if ( false == multimarket_get_option( 'product_upsells' ) ) {
		woocommerce_upsell_display( $posts_per_page  = $upsells_product_per_page , $columns = 4 );
	}
}

/**
 * Tokoo cross sells product
 *
 * @since  2.0
 * @author tokoo
 */
 function multimarket_display_cross_sells_product() {
	$cross_sells_product_per_page = multimarket_get_option( 'cross_sells_product_per_page', 6 );
	if ( false == multimarket_get_option( 'product_cross_sells' ) ) {
		woocommerce_cross_sell_display( $cross_sells_product_per_page , 6 );
	}
}

/**
 * Display product tabs
 *
 * @return void
 * @author tokoo
 **/
function multimarket_display_single_product_tabs() {
	$single_product_tabs = multimarket_get_option( 'product_tabs' );
	if ( false == $single_product_tabs ) {
		woocommerce_output_product_data_tabs();
	}
}


/**
 *
 */
add_action( 'init', 'multimarket_ini_woo_setting_options' );
function multimarket_ini_woo_setting_options() {

	/* Disable sale flash on product page */
	if ( true == multimarket_get_option( 'product_sale_flash' ) ) {
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	}

	/* Disable star rating on product page */
	if ( true == multimarket_get_option( 'product_star_rating' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	}

	/* Disable product price */
	if ( true == multimarket_get_option( 'product_price' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}

	/* Disable add_to_cart on shop page */
	if ( true == multimarket_get_option( 'product_add_to_cart' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}

	/* Disable result count on shop page */
	if ( true == multimarket_get_option( 'product_result_count' ) ) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}

	/* Disable catalog ordering on shop page */
	if ( true == multimarket_get_option( 'product_catalog_ordering' ) ) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}

	/* Disable sale flash on single shop */
	if ( true == multimarket_get_option( 'product_single_sale_flash' ) ) {
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	}

	/* Disable price on single shop */
	if ( true == multimarket_get_option( 'product_single_price' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	}

	/* Disable add to cart on single shop */
	if ( true == multimarket_get_option( 'product_single_add_to_cart' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}

	/* Disable excerpt on single shop */
	if ( true == multimarket_get_option( 'product_single_excerpt' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	}

	/* Disable meta on single shop */
	if ( true == multimarket_get_option( 'product_single_meta' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

	/* Disable rating on single shop */
	if ( true == multimarket_get_option( 'product_single_rating' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	}

	/* Disable related product */
	if ( multimarket_get_option( 'product_related' ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

	/* Related Product Title Change */
	if ( multimarket_get_option( 'related_product_title' ) ) {
		add_filter( 'woocommerce_related_products_title', 'multimarket_related_product_title', 10 );
		function multimarket_related_product_title() {
			echo multimarket_get_option( 'related_product_title' );
		}
	}

	/* Disable upsell product */
	if ( multimarket_get_option( 'product_upsells' ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

	/* UpSells Product Title change */
	if ( multimarket_get_option( 'upsell_product_title' ) ) {
		add_filter( 'woocommerce_upsells_products_title', 'multimarket_upsell_product_title', 10 );
		function multimarket_upsell_product_title() {
			echo multimarket_get_option( 'upsell_product_title' );
		}
	}

	/* Cross Sells Product Display or Not */
	if ( true == multimarket_get_option( 'product_cross_sells' ) ) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
	}
}

/**
 * Shop Featured images
 */
function multimarket_template_loop_product_thumbnail( $size = 'full' ) {
	// default placeholder
	if ( wc_placeholder_img_src() ) {
		$featured_image = wc_placeholder_img_src( 'shop_catalog' );
	} else {
		$featured_image = MULTIMARKET_THEME_ASSETS_URI . '/img/imgo2.jpg';
	}

	if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size, false );
		if ( $image ) {
			$featured_image = $image[0];
		}
	}
	return $featured_image;
}

/**
 * Category loop thumbnail
 * cloned from original woocommerce_subcategory_thumbnail()
 */
function multimarket_woocommerce_subcategory_thumbnail( $category ) {
	$thumbnail_id  = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$image = $image[0];
	} else {
		$image = wc_placeholder_img_src();
	}

	if ( $image ) {
		// Prevent esc_url from breaking spaces in urls for image embeds
		// Ref: http://core.trac.wordpress.org/ticket/23605
		$image = str_replace( ' ', '%20', $image );
		?>
		<div class="featured-image card-image-bg" data-bg-image="<?php echo esc_url( $image ); ?>"></div>
		<?php
	}
}

add_filter( 'woocommerce_product_tabs', 'multimarket_modify_product_tabs', 98 );
function multimarket_modify_product_tabs( $tabs ) {
	global $product, $post;

	$get_product_type 	= get_post_format( get_the_ID() );
	$product_type 		= ! empty( $get_product_type ) ? $get_product_type : 'regular';
	
	switch ( $product_type ) {
		case 'video':
				$tab_title = esc_html__( 'Video Details', 'multimarket' );
			break;
		case 'audio':
				$tab_title = esc_html__( 'Audio Details', 'multimarket' );
			break;
		default:
				$tab_title = esc_html__( 'Product Details', 'multimarket' );
			break;
	}

	if (  $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) {
		$tabs['additional_information']['title'] 	= $tab_title;
	}

	return $tabs;
}

add_filter( 'woocommerce_subcategory_count_html', 'multimarket_remove_tanda_kurung_count_category', 10, 2 );
function multimarket_remove_tanda_kurung_count_category( $html, $category ) {
	return '<mark class="count">'.$category->count.'</mark>';
}

add_action( 'woocommerce_single_product_summary', 'multimarket_add_social_share_and_wishlist', 33 );
function multimarket_add_social_share_and_wishlist() {
	?>
	<div class="product-bookmark">
		<?php if ( class_exists( 'YITH_WCWL' ) ) : ?>
			<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
		<?php endif; ?>
	</div>
	<?php 
}

function multimarket_is_product_view_by_type() {
	if ( isset( $_GET['product_type'] ) ) {
		return 'yes';
	} else {
		return 'no';
	}
}


add_action( 'woocommerce_product_query', 'multimarket_modify_woocommerce_query_for_product_type' );
function multimarket_modify_woocommerce_query_for_product_type( $query ) {

	if ( ! is_admin() && is_post_type_archive( 'product' ) ) {

		$meta_query = array();
		if ( isset( $_GET['product_type'] ) && 'book' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'book',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'movie' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'movie',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'music' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'audio',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'game' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'game',
				'compare'   => '==',    
			);

		}
		$query->set( 'meta_query', $meta_query );
	}

}

/**
 * Product thumbnail override using lazyload
 *
 * @return void
 * @author tokoo
 **/
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'multimarket_wc_get_product_thumbnail', 10 );
function multimarket_wc_get_product_thumbnail( $size = 'shop_catalog' ) {
	global $post;
	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

	if ( has_post_thumbnail() ) {
		$custom_size 		= get_post_meta( get_the_ID(), 'multimarket_product_image_dimension', true );
		$img_src 			= wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_catalog' );
		$size 				= wc_get_image_size( 'shop_catalog' );
		$width 				= $size['width'];
		$height 			= $size['height'];
		$img_url 			= $img_src[0];
		$alt 				= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

		if ( $height ) {
			$padding_bottom = ($height/$width)*100;
		} else { $padding_bottom = '100'; }
		echo '<span class="intrinsic-ratio" style="padding-bottom:'. $padding_bottom .'%"><img class="tokoo-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="'.$img_url.'" width="'.$width.'" height="'.$height.'" alt="'.$alt.'"></span>';
	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $image_size );
	}
}

/**
 * Product Layout
 *
 * @return void
 * @author tokoo
 **/
function multimarket_get_product_layout() {
	$get_default_layout 	= get_theme_mod( 'multimarket_product_layout', 'modern' );
	$product_layout 		= isset( $_GET['layout'] ) ? $_GET['layout'] : $get_default_layout;
	return $product_layout;
}

/**
 * undocumented function
 *
 * @return void
 * @author tokoo
 **/
function multimarket_woocommerce_content_product_layout( $product_layout = '' ) {
	if ( empty( $product_layout ) ) {
		$product_layout 		= multimarket_get_product_layout();
	}
	switch ( $product_layout ) {
		case 'modern':
			wc_get_template_part( 'content', 'product-modern' );
			break;
		case 'list':
			wc_get_template_part( 'content', 'product-list' );
			break;
		default:
			wc_get_template_part( 'content', 'product' );
			break;
	}
}


/**
 * PRODUCT category filter dropdown
 *
 * @return void
 * @author tokoo
 **/
function multimarket_dropdown_product_category_filter( $args = array(), $action = false ) {
	global $wp_query;

	$current_product_cat = isset( $wp_query->query_vars['product_cat'] ) ? $wp_query->query_vars['product_cat'] : 'browse_category';
	$defaults            = array(
		'pad_counts'         => 1,
		'show_count'         => 0,
		'hierarchical'       => 1,
		'hide_empty'         => 1,
		'show_uncategorized' => 1,
		'orderby'            => 'name',
		'selected'           => $current_product_cat,
		'menu_order'         => false,
	);

	$args = wp_parse_args( $args, $defaults );

	if ( 'order' === $args['orderby'] ) {
		$args['menu_order'] = 'asc';
		$args['orderby']    = 'name';
	}

	$terms = get_terms( 'product_cat', $args );

	if ( empty( $terms ) ) {
		return;
	}

	$output  = "<select name='product_cat' class='dropdown_product_cat'>";
	$output .= '<option value="" ' . selected( $current_product_cat, '', false ) . '>' . esc_html__( 'Browse a category', 'multimarket' ) . '</option>';
	$output .= wc_walk_category_dropdown_tree( $terms, 0, $args );
	if ( $args['show_uncategorized'] ) {
	$output .= '<option value="0" ' . selected( $current_product_cat, '0', false ) . '>' . esc_html__( 'Uncategorized', 'multimarket' ) . '</option>';
	}
	$output .= "</select>";


	echo ''.$output;

	if ( true == $action ) {
		wc_enqueue_js( "
			jQuery( '.dropdown_product_cat' ).change( function() {
				if ( jQuery(this).val() != '' ) {
					var this_page = '';
					var home_url  = '" . esc_js( home_url( '/' ) ) . "';
					if ( home_url.indexOf( '?' ) > 0 ) {
						this_page = home_url + '&product_cat=' + jQuery(this).val();
					} else {
						this_page = home_url + '?product_cat=' + jQuery(this).val();
					}
					location.href = this_page;
				}
			});
		" );
	}
}

/**
 * undocumented function
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'woocommerce_product_tabs', 'multimarket_remove_product_tabs', 98 );
function multimarket_remove_product_tabs( $tabs ) {

	unset( $tabs['additional_information'] );  

	return $tabs;
}

/**
 * Display Product in Author archive page
 *
 * @return void
 * @author tokoo
 **/
add_action( 'pre_get_posts', 'multimarket_author_archive_add_product' );
function multimarket_author_archive_add_product( $query ) {
	if ( $query->is_author() && $query->is_main_query() ) {
		$query->set( 'post_type', array( 'product' ) );
	}
}


