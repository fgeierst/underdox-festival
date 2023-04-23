<?php
/**
 * Plugin Name: Underdox Cover
 * Description: Cover image based on the event settings.
 * Version: 0.1.0
 * Author: Florian Geierstanger
 */

defined( 'ABSPATH' ) || exit;

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

	register_block_type(
		__DIR__,
		array(
			'render_callback' => 'gutenberg_examples_dynamic_block_render_callback',
		)
	);

}
add_action( 'init', 'gutenberg_examples_01_register_block' );


/**
 * This function is called when the block is being rendered on the front end of the site
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */
function gutenberg_examples_dynamic_block_render_callback( $attributes, $content, $block_instance ) {
	ob_start();
	require plugin_dir_path( __FILE__ ) . 'template.php';
	return ob_get_clean();
}
