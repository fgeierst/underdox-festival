<?php

// Examples
// - https://github.com/andersnoren/abisko/blob/main/functions.php
// - https://github.com/bgardner/powder/blob/main/functions.php

function underdox_setup() {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( get_template_directory_uri() . '/style.css' );
}
add_action( 'after_setup_theme', 'underdox_setup' );

function underdox_styles()
{
	wp_enqueue_style(
		'underdox',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme('underdox-block-theme')->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'underdox_styles');

/* function underdox_block_theme_enqueue_block_assets() {
    wp_enqueue_script(
        'underdox-event-cover',
        get_theme_file_uri( '/blocks/underdox-event-cover/underdox-event-cover.js' ),
        array( 'wp-blocks', 'wp-editor', 'wp-components' )
    );
}
add_action( 'enqueue_block_editor_assets', 'underdox_block_theme_enqueue_block_assets' ); */

/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher() {
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
			'show_flags' => 0,
			'show_names' => 1,
			'echo'       => 0,
			'hide_if_empty' => 1,
			'hide_current' => 1,
		];
		$output = '<nav aria-label="Languages"><ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul></nav>';
	}

	return $output;
}

add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );


/**
 * Add polylang current language css class to <body>
 */
function add_polylang_current_language_class() {
	if ( function_exists( 'pll_current_language' ) ) {
		$current_language = pll_current_language();
		if ( ! empty( $current_language ) ) {
			add_filter( 'body_class', function ( $classes ) use ( $current_language ) {
				$classes[] = 'polylang--' . $current_language;
				return $classes;
			} );

		}
	}
}

add_action( 'after_setup_theme', 'add_polylang_current_language_class' );
