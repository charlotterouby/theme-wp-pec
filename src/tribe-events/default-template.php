<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

get_header();
?>

<!-- CONTENT -->
<div id="primary" class="content-area mdl-grid mdl-grid--no-spacing">
    <!-- site-main -->
    <main id="main" class="site-main mdl-grid mdl-grid--no-spacing width-75 mdl-cell mdl-cell--9-col mdl-cell--12-col-phone" role="main">
    <?php tribe_events_before_html(); ?>
    <?php tribe_get_view(); ?>
    <?php tribe_events_after_html(); ?>
    </main>
    <!-- .sidebar -->
    <aside class="sidebar mdl-grid mdl-cell mdl-cell--3-col mdl-cell--12-col-phone">
            <?php get_sidebar() ?>
    </aside>
</div>
<!-- #tribe-events-pg-template -->

<!-- FOOTER -->
<?php  get_footer(); ?>
