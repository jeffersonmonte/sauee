<?php 

/**
 * Demo content
 *
 * @return void
 * @author Alispx
 **/
add_filter( 'pt-ocdi/import_files', 'multimarket_config_import_files' );
function multimarket_config_import_files() {
	
	return array(
		array(
			'import_file_name'           => 'Multimarket - Marketplace',
			'categories'                 => array( 'Category 1', 'Category 2' ),
			'import_file_url'            => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/af519298b7e90ec3c12fdf7461e5f82791a30d52/multimarket/marketplace/content.xml',
			'import_widget_file_url'     => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/af519298b7e90ec3c12fdf7461e5f82791a30d52/multimarket/marketplace/widget.json',
			'import_customizer_file_url' => 'https://bitbucket.org/tokomoo/tokoo-demo-content/raw/af519298b7e90ec3c12fdf7461e5f82791a30d52/multimarket/marketplace/customizer.dat',
			'import_preview_image_url'   => 'https://bytebucket.org/tokomoo/tokoo-demo-content/raw/812d0346cda9ff66d8c1545274e9b132a8cf8908/livre/books/screenshot.png',
			'preview_url'                => 'http://www.demo.tokomoo.com/livre/books',
			'import_home_page'              => 'Homepage v1',
			'import_blog_page'              => 'Blog',
			'import_available_menus'        => array(
				'multimarket-primary'   		=> 'Menu 1', // Menu Location and Title
			)
		),
		array(
		),
	);
}
