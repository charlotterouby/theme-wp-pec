<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content content-area mdl-grid mdl-grid--no-spacing" class="tribe-events-single single-post">

    <!-- Notices / .entry-header -->
    <div class="entry-header" <?php if (has_post_thumbnail()): ?> style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat fixed;"<?php endif; ?>>
        <!-- .content-header-->
        <div class="content-header width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">
            <?php tribe_the_notices() ?>

            <?php the_title( '<h2 class="tribe-events-single-event-title h1">', '</h2>' ); ?>

            <div class="tribe-events-schedule tribe-clearfix">
                <?php echo tribe_events_event_schedule_details( $event_id, '<p><strong>', '</strong></p>' ); ?>
                <?php if ( tribe_get_cost() ) : ?>
                    <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Yoast SEO -->
        <div class="page-breadcrumbs">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">','</p>');
                }
            ?>
        </div>
    </div>

    <!-- .entry-content-->
    <?php while ( have_posts() ) :  the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("entry-content width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone"); ?>>
            <!-- Event content -->
            <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
            <div class="tribe-events-single-event-description tribe-events-content">
                <?php the_content(); ?>
            </div>
            <!-- .tribe-events-single-event-description -->
            <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

            <!-- Event meta -->
            <div class="entry-meta-event mdl-grid mdl-grid--no-spacing">
                <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
                <?php tribe_get_template_part( 'modules/meta' ); ?>
                <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
            </div>
        </div>

        <!-- Event footer / pagination -->
        <div id="tribe-events-footer" class="pagination">
            <!-- Navigation -->
            <p class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></p>
            <ul class="tribe-events-sub-nav nav-links">
                <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> <span>Précédent :</span> %title%' ) ?></li>
                <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '<span> Suivant :</span> %title% <span>&raquo;</span>' ) ?></li>
            </ul>
            <!-- .tribe-events-sub-nav -->
        </div>

        <!-- #tribe-events-footer -->

        <!-- comments -->
        <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
    <?php endwhile; ?>

</div><!-- #tribe-events-content -->
