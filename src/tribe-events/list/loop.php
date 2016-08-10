<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop masonry-grid mdl-grid mdl-cell mdl-cell--12-col">

    <?php while ( have_posts() ) : the_post(); ?>
        <?php do_action( 'tribe_events_inside_before_loop' ); ?>

        <!-- Month / Year Headers -->
        <?php tribe_events_list_the_date_headers(); ?>

        <!-- Event  -->
        <?php
        $post_parent = '';
        if ( $post->post_parent ) {
            $post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
        }
        ?>
        <div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes(' pec-thumbnail mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--4-col mdl-cell--12-col-phone') ?>" <?php echo $post_parent; ?>>
            <?php tribe_get_template_part( 'list/single', 'event' ) ?>
        </div>


        <?php do_action( 'tribe_events_inside_after_loop' ); ?>
    <?php endwhile; ?>

</div><!-- .tribe-events-loop -->
