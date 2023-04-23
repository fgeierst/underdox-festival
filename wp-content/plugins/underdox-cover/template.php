<?php
/**
 * All of the parameters passed to the function where this file is being required are accessible in this scope:
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */

?>
<!--<p <?php /* echo wp_kses_data( get_block_wrapper_attributes() ); */ ?>>
	<?php
	// if ( isset( $attributes['message'] ) ) {
	// 	/**
	// 	 * The wp_kses_post function is used to ensure any HTML that is not allowed in a post will be escaped.
	// 	 *
	// 	 * @see https://developer.wordpress.org/reference/functions/wp_kses_post/
	// 	 * @see https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/#escaping-securing-output
	// 	 */
	// 	echo wp_kses_post( $attributes['message'] . ' | ' . get_bloginfo( 'name' ) );
	// }
	?>
</p> -->
<?php
	$terms = get_the_terms( get_the_ID(), 'events' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$first_term = reset( $terms );
		$term_id = $first_term->term_id;
		$event_color = get_term_meta( $term_id, 'event_color', true );
		$event_background_image_id = get_term_meta( $term_id, 'event_background_image', true );
		$event_background_image = wp_get_attachment_url( $event_background_image_id );
	}
?>

<div style="
	background-color: <?php echo $event_color; ?>;
	background-image: url(<?php echo $event_background_image; ?>);
	background-size: cover;
	display: grid;
	align-items: center;
	justify-content: center;
	height: 60vh;
">
	Title
</div>

