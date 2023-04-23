<?php
/**
 * Plugin Name: Underdox Cover
 * Description: Cover image based on the event settings.
 * Version: 0.1.0
 * Author: Florian Geierstanger
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
 */
function gutenberg_examples_01_load_textdomain() {
	load_plugin_textdomain( 'underdox', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'init', 'gutenberg_examples_01_load_textdomain' );

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function gutenberg_examples_01_register_block() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	// __DIR__ is the current directory where block.json file is stored.
	// register_block_type( __DIR__ );

	if ( function_exists( 'wp_set_script_translations' ) ) {
		/**
		 * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
		 * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
		 * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
		 */
		wp_set_script_translations( 'gutenberg-examples-01', 'gutenberg-examples' );
	}

	register_block_type(
		__DIR__,
		array(
			'render_callback' => 'gutenberg_examples_dynamic_block_render_callback',
		)
	);

}
add_action( 'init', 'gutenberg_examples_01_register_block' );

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 */
/* function gutenberg_examples_dynamic_block_block_init() {

	register_block_type(
		__DIR__,
		array(
			'render_callback' => 'gutenberg_examples_dynamic_block_render_callback',
		)
	);
}
add_action( 'init', 'gutenberg_examples_dynamic_block_block_init' ); */

/**
 * This function is called when the block is being rendered on the front end of the site
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */
function gutenberg_examples_dynamic_block_render_callback( $attributes, $content, $block_instance ) {
	ob_start();
	/**
	 * Keeping the markup to be returned in a separate file is sometimes better, especially if there is very complicated markup.
	 * All of passed parameters are still accessible in the file.
	 */
	require plugin_dir_path( __FILE__ ) . 'template.php';
	return ob_get_clean();
}
