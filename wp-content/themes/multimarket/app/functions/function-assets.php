<?php

/**
 * Loads the admin styles & scripts.
 *
 * @since 1.0
 */
add_action( 'admin_enqueue_scripts', 'multimarket_admin_scripts' );
function multimarket_admin_scripts( $hook ) {

	/* Get theme version in style.css. */
	$theme = wp_get_theme( get_template(), get_theme_root( get_template_directory() ) );

	if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
		wp_enqueue_script( 'multimarket-metabox-control-page', MULTIMARKET_THEME_URI . '/bootstrap/assets/js/page-metabox.js', array( 'jquery' ), '', true );
	}
	
	do_action( 'multimarket_admin_scripts' );
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'admin_enqueue_scripts', 'multimarket_widget_scripts' );
function multimarket_widget_scripts( $hook ) {
	if ( 'widgets.php' === $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'multimarket_widgets', MULTIMARKET_THEME_URI . '/bootstrap/assets/js/tokoo-widgets.js', array( 'jquery' ), '', true );
	}
}

/**
 * Load Shortcode scripts and styles
 *
 * @return void
 * @author
 **/
add_action( 'wp_enqueue_scripts', 'multimarket_koo_shortcodes_scripts' );
function multimarket_koo_shortcodes_scripts() {
	if ( class_exists( 'Koo_Shortcodes' ) ) {
		wp_enqueue_script( 'multimarket_shortcodes_scripts', MULTIMARKET_THEME_URI . '/bootstrap/assets/js/koo-shortcodes.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'multimarket_shortcodes_style', MULTIMARKET_THEME_URI . '/bootstrap/assets/css/koo-shortcodes.css' );
	}

}


/**
 * Get Font URL
 *
 * @return void
 * @author tokoo
 **/
function multimarket_fonts_url() {

	$fonts_url 		= '';
	$open_sans 	= esc_html_x( 'on', 'Open Sans font: on or off', 'multimarket' );
	$playfair 		= esc_html_x( 'on', 'Playfair Display font: on or off', 'multimarket' );
	 
	if ( 'off' !== $open_sans || 'off' !== $playfair ) {
		$font_families = array();
	 
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open+Sans:300,400,500,600';
		}
		 
		if ( 'off' !== $playfair ) {
			$font_families[] = 'Playfair+Display:100,100italic,400,400italic,700';
		}
		 
		$query_args = array(
			'family' => implode( '|', $font_families ),
		);
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}


/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0
 */
add_action( 'wp_enqueue_scripts', 'multimarket_frontend_scripts', 99 );
function multimarket_frontend_scripts() {

	/* Get theme version in style.css. */
	$theme = wp_get_theme( get_template(), get_theme_root( get_template_directory() ) );

	/* Load google fonts. */
	wp_enqueue_style( 'multimarket-fonts', multimarket_fonts_url(), array(), $theme->Version );

	/* Load main style.css */
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme->Version );
	wp_enqueue_style( 'multimarket-style-main', MULTIMARKET_THEME_ASSETS_URI . '/css/main.css', array(), $theme->Version );
	wp_enqueue_style( 'multimarket-font-icons', MULTIMARKET_THEME_ASSETS_URI . '/css/font-icons.css', array(), $theme->Version );
	wp_add_inline_style( 'multimarket-style-main', multimarket_customizer_print_out_css() );

	/* Load comment reply. */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}

	/* Load bundled jQuery. */
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-datepicker' );

	if ( true == MULTIMARKET_OPTIMIZE_MODE ) {
		$main_script 	= 'main.min';  
	} else {
		$main_script 	= 'main';
	}
	wp_enqueue_script( 'ScrollMagic', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/ScrollMagic.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'gmaps3', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/gmaps3.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'isotope', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/isotope.pkgd.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'finalCountdown', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/jquery.finalCountdown.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'hoverIntent', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/jquery.hoverIntent.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'flexslider', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/jquery.flexslider.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'lazyload', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/jquery.lazyload.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'sticky-kit', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/jquery.sticky-kit.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'modernizr', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/modernizr.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'slick', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/slick.min.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'social-share', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/social-share.js', array( 'jquery' ), $theme->Version, true );
	wp_enqueue_script( 'venobox', MULTIMARKET_THEME_ASSETS_URI . '/js/plugins/venobox.min.js', array( 'jquery' ), $theme->Version, true );

	/* Load custom js method. */
	wp_enqueue_script( 'multimarket-main', MULTIMARKET_THEME_ASSETS_URI . '/js/'.$main_script.'.js', array( 'jquery' ), $theme->Version, true );

	wp_enqueue_script( 'wc-password-strength-meter' );
	
	if ( class_exists( 'Dokan_Scripts' ) ) { 
		//WeDevs_Dokan::init()->load_form_validate_script();
        //WeDevs_Dokan::init()->load_gmap_script();
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'dokan-tooltip' );
		wp_enqueue_script( 'dokan-chosen' );
		wp_enqueue_script( 'dokan-form-validate' );
		wp_enqueue_script( 'dokan-script' );
		wp_enqueue_script( 'dokan-select2-js' );
	}


	$smooth_scroll = get_theme_mod( 'multimarket_enable_smooth_scrolling', 0 );
	if ( true == $smooth_scroll ) {
		wp_add_inline_script( 'multimarket-main', 'SmoothScroll({ stepSize: 55 });' );
	}

	wp_localize_script( 'multimarket-main' , 'multimarket_translate', array(
		'days'		=> esc_html__( 'days', 'multimarket' ),
		'hr'		=> esc_html__( 'hr', 'multimarket' ),
		'min'		=> esc_html__( 'min', 'multimarket' ),
		'sec'		=> esc_html__( 'sec', 'multimarket' ),
	) );

	$accent_color = get_theme_mod( 'multimarket_accent_color', '#6777E5' );
	wp_localize_script( 'multimarket-main', 'multimarket_js_var',
		array( 
			'accent_color' => $accent_color,
		)
	);
}

/**
 * Customizer print css out function
 *
 * @return void
 * @author tokomoo
 **/
function multimarket_customizer_print_out_css() {
	$accent_color 			= get_theme_mod( 'multimarket_accent_color', '#6777E5' );
	$background_color 		= get_theme_mod( 'multimarket_body_color', '#F5F6F9' );
	$text_color     		= get_theme_mod( 'multimarket_text_color', '#707281' );
	$heading_color			= get_theme_mod( 'multimarket_heading_color', '#2B2B2B' );
	// $heading-color    : #222; //#2B2B2B
	
	// Fonts
	$global_font_size  		=  get_theme_mod( 'multimarket_global_font_size', '16px' );
	$body_font  			=  get_theme_mod( 'multimarket_body_font', 'Open Sans' );
	$heading_font 			=  get_theme_mod( 'multimarket_heading_font', 'Open Sans' );

	$body_font_weight    	= get_theme_mod( 'multimarket_body_font_weight', '400' ); 
	$body_letter_spacing 	= get_theme_mod( 'multimarket_body_letter_spacing', '0' );
	$body_line_height    	= get_theme_mod( 'multimarket_body_line_height', '1.8' );

	$heading_font_weight 	= get_theme_mod( 'multimarket_heading_font_weight', 700 );
	$heading_letter_spacing = get_theme_mod( 'multimarket_heading_letter_spacing', 0 ) .'px';

	// BUTTON COLORS
	$primary_button_color 			= get_theme_mod( 'multimarket_primary_button_color', '#4FC974' );
	$primary_button_hover_color 	= get_theme_mod( 'multimarket_primary_button_color_hover', '#4FC974' );
	$primary_button_text 			= get_theme_mod( 'multimarket_primary_button_text_color', '#ffffff' );

	$secondary_button_color 		= get_theme_mod( 'multimarket_secondary_button_color', '#6777E5' );
	$secondary_button_hover_color	= get_theme_mod( 'multimarket_secondary_button_color_hover', '#6777E5' );
	$secondary_button_text			= get_theme_mod( 'multimarket_secondary_button_text_color', '#ffffff' );

	// PAGE TITLE
	$page_title_color			= get_theme_mod( 'multimarket_page_title_color', '#050A2C' );

	// QUOTE 
	$quote_font = get_theme_mod( 'multimarket_quote_font', 'Playfair Display' );


	$styles = '';
	

	$styles = multimarket_minify_css( $styles );
	return $styles;
}

/**
 * HEX to RGB
 *
 * @return void
 * @author tokoo
 **/
function multimarket_hex2rgb( $hex ) {
   $hex = str_replace( "#", "", $hex );

   if ( strlen( $hex ) == 3 ) {
	  $r = hexdec( substr($hex,0,1).substr($hex,0,1));
	  $g = hexdec( substr($hex,1,1).substr($hex,1,1));
	  $b = hexdec( substr($hex,2,1).substr($hex,2,1));
   } else {
	  $r = hexdec(substr($hex,0,2));
	  $g = hexdec(substr($hex,2,2));
	  $b = hexdec(substr($hex,4,2));
   }
   $rgb = array( $r, $g, $b );
   return $rgb; // returns an array with the rgb values
}

/**
 * HEX 2 RGBA
 *
 * @return void
 * @author tokoo
 **/
function multimarket_hex2rgba( $hex, $alpha ) {
	$color = multimarket_hex2rgb( $hex );
	return "rgba($color[0],$color[1],$color[2],$alpha)";
}


/**
 * Minify css
 *
 * @return void
 * @author tokomoo
 **/
function multimarket_minify_css( $input ) {
	
	if ( trim( $input ) === "" ) return $input;
	
	// Force white-space(s) in `calc()`
	if ( strpos( $input, 'calc(' ) !== false ) {
		$input = preg_replace_callback( '#(?<=[\s:])calc\(\s*(.*?)\s*\)#', function( $matches ) {
			return 'calc(' . preg_replace('#\s+#', "\x1A", $matches[1]) . ')';
		}, $input );
	}
	return preg_replace(
		array(
			// Remove comment(s)
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
			// Remove unused white-space(s)
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
			// Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
			'#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
			// Replace `:0 0 0 0` with `:0`
			'#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
			// Replace `background-position:0` with `background-position:0 0`
			'#(background-position):0(?=[;\}])#si',
			// Replace `0.6` with `.6`, but only when preceded by a white-space or `=`, `:`, `,`, `(`, `-`
			'#(?<=[\s=:,\(\-]|&\#32;)0+\.(\d+)#s',
			// Minify string value
			'#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][-\w]*?)\2(?=[\s\{\}\];,])#si',
			'#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
			// Minify HEX color code
			'#(?<=[\s=:,\(]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
			// Replace `(border|outline):none` with `(border|outline):0`
			'#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
			// Remove empty selector(s)
			'#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s',
			'#\x1A#'
		),
		array(
			'$1',
			'$1$2$3$4$5$6$7',
			'$1',
			':0',
			'$1:0 0',
			'.$1',
			'$1$3',
			'$1$2$4$5',
			'$1$2$3',
			'$1:0',
			'$1$2',
			' '
		),
	$input);
}
