<?php

/**
 * Register the required plugins for this theme.
 *
 * @since 1.0
 */
add_action( 'tgmpa_register', 'multimarket_register_required_plugins' );
function multimarket_register_required_plugins() {

	/* Plugins lists. */
	$plugins = array(

		array(
			'name'     				=> 'Tokoo Vitamins',
			'slug'     				=> 'tokoo-vitamins',
			'source'   				=> 'https://bitbucket.org/tokokoo/tokoo-vitamins/get/master.zip',
			'required' 				=> true,
			'version' 				=> '6.2.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false
		),

		array(
			'name' 		=> 'King Composer Page Builder',
			'slug' 		=> 'kingcomposer',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Envato Market',
			'slug' 		=> 'envato-market',
			'required' 	=> false,
			'source' 	=> 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
		),

		array(
			'name' 		=> 'SMK Sidebar Generator',
			'slug' 		=> 'smk-sidebar-generator',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Regenerate Thumbnails',
			'slug' 		=> 'regenerate-thumbnails',
			'required' 	=> false,
		),

		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),

		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false
		),

		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false
		),

		array(
			'name'     => 'YITH WooCommerce Wishlist',
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false
		),

		array(
			'name'     	=> 'YITH WooCommerce Quick View',
			'slug'     	=> 'yith-woocommerce-quick-view',
			'required' 	=> false
		),

		array(
			'name' 		=> 'One Click Demo Importer',
			'slug' 		=> 'one-click-demo-import',
			'required' 	=> false,
		),

	);

	$theme_text_domain 	= 'multimarket';
	$config 			= array(
		'domain'            => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
		'default_path'      => '',                      // Default absolute path to pre-packaged plugins.
		'menu'              => 'multimarket-install-plugins', // Menu slug.
		'has_notices'       => true,                    // Show admin notices or not.
		'dismissable'       => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'       => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'      => false,                   // Automatically activate plugins after installation or not.
		'message'           => '',                          // Message to output right before the plugins table
	);

	tgmpa( $plugins, $config );

}