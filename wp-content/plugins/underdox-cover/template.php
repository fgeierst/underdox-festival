<?php
/**
 * All of the parameters passed to the function where this file is being required are accessible in this scope:
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */

	$terms = get_the_terms( get_the_ID(), 'events' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$first_term = reset( $terms );
		$term_id = $first_term->term_id;
		$event_color = get_term_meta( $term_id, 'event_color', true );
		$event_background_image_id = get_term_meta( $term_id, 'event_background_image', true );
		$event_background_image = wp_get_attachment_url( $event_background_image_id );
		$event_name = $first_term->name;
		$event_description = term_description( $term_id );
		$event_landing_page_id = get_term_meta( $term_id, 'event_landing_page', true );
		$event_landing_page = get_permalink($event_landing_page_id);
	}
?>

<style>
	body {
		--wp--preset--color--theme: <?php echo $event_color; ?>;
	}

	.underdox-cover {
		background-color: var(--wp--preset--color--theme);
		background-image: url(<?php echo $event_background_image; ?>);
		background-size: cover;
		color: var(--wp--preset--color--white);
		display: grid;
		align-items: center;
		justify-content: center;
		height: 60vh;
	}

	.underdox-cover__inner {
		background-color: var(--wp--preset--color--theme);
		padding: .6rem ;
		display: flex;
		gap: 1rem;
		flex-direction: column;
		
		@media (min-width: 768px) {
			flex-direction: row;
			align-items: center;
		}
	}

	.underdox-cover__name {
		font-size: 2rem;
		font-weight: 900;
		text-transform: uppercase;
		line-height: 1;
		text-decoration: none;
		color: var(--wp--preset--color--white);
	}

	.underdox-cover__description {
		font-weight: 700;
	}

	.underdox-cover__description p {
		margin: 0;
	}

</style>

<div class="underdox-cover">
	<div class="underdox-cover__inner">
		<!-- <?php echo $content; ?> -->
		<a class="underdox-cover__name" href="<?php echo $event_landing_page; ?>""><?php echo $event_name; ?></a>
		<div class="underdox-cover__description"><?php echo $event_description; ?></div>
	</div>
</div>


