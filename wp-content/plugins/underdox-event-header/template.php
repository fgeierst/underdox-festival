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
		/* margin-block-start: -24px; */
		padding: 0;
		background-color: var(--wp--preset--color--theme);
		color: var(--wp--preset--color--white);
		display: grid;
		grid-template-columns: [fullwidth-start] var(--wp--style--root--padding-left) [content-start] 1fr [content-end] var(--wp--style--root--padding-right) [fullwidth-end];
		grid-template-rows: [image-start] auto [image-end subline-start] auto [subline-end];
		margin-block-end: var(--wp--preset--spacing--70);
	}

	@media (min-width: 768px) {
		.underdox-event-header { 
			grid-template-columns: [fullwidth-start] 1fr [content-start] var(--wp--style--global--content-size) [content-end] 1fr [fullwidth-end];
		}
	}

	.underdox-event-header__inner {
		padding-block: var(--wp--style--root--padding-left);
		display: flex;
		gap: .6rem;
		flex-direction: column;
		grid-column: content;
		grid-row: subline;
	}

	@media (min-width: 768px) {
		.underdox-event-header__inner {
			flex-direction: row;
			gap: 2rem;
		}
	}


	.underdox-event-header__name {
		margin: 0;
		font-size: 12vw;
		font-weight: 900;
		text-transform: uppercase;
		line-height: 1;
		text-decoration: none;
		color: <?php if ($event_color == '#000000')  { ?> var(--wp--preset--color--white) <?php } else { ?> var(--wp--preset--color--theme) <?php } ?>;
		grid-row: image;
		grid-column: content;
		align-self: end;
		/* margin-block-end: -0.17em; */
	}

	.underdox-event-header--no-image .underdox-event-header__name {
		color: var(--wp--preset--color--white);
		font-size: 8vw;
		margin-block-start: var(--wp--style--root--padding-left);
		margin-block-end: calc(var(--wp--style--root--padding-left) * -.5);
	}

	@media (min-width: 768px) {
		.underdox-event-header__name {
			font-size: 8vw;
		}

		.underdox-event-header--no-image .underdox-event-header__name {
			font-size: 8vw;
		}
	}

	.underdox-event-header__description {
		margin: 0;
		font-weight: 700;
	}

	.underdox-event-header__description p {
		margin: 0;
	}

	.underdox-event-header__image {
		height: 50vh;
		width: 100%;
		object-fit: cover;
		display: block;
		grid-column: fullwidth;
		grid-row: image;
	}

	@media (min-width: 768px) { 
		.underdox-event-header__image {
			height: 70vh;
		}
	}

</style>

<?php if (has_post_thumbnail()) {  ?>
	
<div class="has-global-padding underdox-event-header">
	<?php	the_post_thumbnail('large', ['class' => 'underdox-event-header__image']); ?>
	<a class="underdox-event-header__name" href="<?php echo $event_landing_page; ?>""><?php echo $event_name; ?></a>
	<div class="is-layout-flow underdox-event-header__inner">
		<div class="underdox-event-header__description"><?php echo $event_description; ?></div>
	</div>
</div>
<?php } else { ?>

<div class="has-global-padding underdox-event-header underdox-event-header--no-image">
	<a class="underdox-event-header__name" href="<?php echo $event_landing_page; ?>""><?php echo $event_name; ?></a>
	<div class="is-layout-flow underdox-event-header__inner">
		<div class="underdox-event-header__description"><?php echo $event_description; ?></div>
	</div>
</div>

<?php	} } ?>
