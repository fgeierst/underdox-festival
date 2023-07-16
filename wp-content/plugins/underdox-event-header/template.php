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
		?>



<style>
	body {
		--wp--preset--color--theme: <?php echo $event_color; ?>;
	}

	.wp-block-template-part:has(.underdox-event-header) {
		margin: 0;
	}

	.underdox-event-header {
		background-color: var(--wp--preset--color--theme);
		color: var(--wp--preset--color--white);
		/* display: grid;
		align-items: center;
		justify-content: center; */
	}

	.underdox-event-header__inner {
		padding: .6rem ;
		display: flex;
		gap: .6rem;
		flex-direction: column;
	}

	@media (min-width: 768px) {
		.underdox-event-header__inner {
			flex-direction: row;
			gap: 2rem;
		}
	}


	.underdox-event-header__name {
		margin: 0;
		font-size: 1.5rem;
		font-weight: 900;
		text-transform: uppercase;
		line-height: 1;
		text-decoration: none;
		color: var(--wp--preset--color--white);
	}

	@media (min-width: 768px) {
		.underdox-event-header__name {
			font-size: 2rem;
		}
	}

	.underdox-event-header__description {
		margin: 0;
		font-weight: 700;
	}

	.underdox-event-header__description p {
		margin: 0;
	}

</style>
<!--   -->
<div class="has-global-padding is-layout-constrained underdox-event-header">
	<div class="is-layout-flow underdox-event-header__inner">
		<!-- <?php echo $content; ?> -->
		<a class="underdox-event-header__name" href="<?php echo $event_landing_page; ?>""><?php echo $event_name; ?></a>
		<div class="underdox-event-header__description"><?php echo $event_description; ?></div>
	</div>
</div>


<?php	} ?>
