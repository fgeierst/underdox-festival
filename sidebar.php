<?php

/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 */
?>

<div id="primary" class="widget-area" role="complementary">
  <ul id="nav-primary">
    <?php dynamic_sidebar('primary-widget-area'); ?>
  </ul><!-- /#nav-primary -->
</div><!-- /#primary .widget-area -->

<?php // A second sidebar for widgets, just because.
if (is_active_sidebar('secondary-widget-area')) : ?>
  <div id="secondary" class="widget-area" role="complementary">
    <ul id="nav-secondary">
      <?php dynamic_sidebar('secondary-widget-area'); ?>
    </ul><!-- /#nav-secondary -->
  </div><!-- /#secondary .widget-area -->
<?php endif; ?>