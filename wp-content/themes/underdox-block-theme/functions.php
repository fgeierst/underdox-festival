<?php

function underdox_enqueue_style_sheet()
{
	wp_enqueue_style(
		'underdox',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme('underdox-block-theme')->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'underdox_enqueue_style_sheet');

/* function underdox_block_theme_enqueue_block_assets() {
    wp_enqueue_script(
        'underdox-event-cover',
        get_theme_file_uri( '/blocks/underdox-event-cover/underdox-event-cover.js' ),
        array( 'wp-blocks', 'wp-editor', 'wp-components' )
    );
}
add_action( 'enqueue_block_editor_assets', 'underdox_block_theme_enqueue_block_assets' ); */
