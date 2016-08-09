<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
    return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group mdl-cell mdl-grid mdl-grid--no-spacing tribe-events-meta-group-venue">
    <h3 class="tribe-events-single-section-title mdl-cell mdl-cell--12-col"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h3>
    <dl class="mdl-cell mdl-cell--12-col mdl-grid">
        <?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
        <dt>Lieu : </dt>
        <dd class="tribe-venue"> <?php echo tribe_get_venue() ?> </dd>

        <?php if ( tribe_address_exists() ) : ?>
           <dt> Adresse : </dt>
            <dd class="tribe-venue-location">
                <address class="tribe-events-address">
                    <?php echo tribe_get_full_address(); ?>

                </address>
            </dd>
            <?php if ( tribe_show_google_map_link() ) : ?>
                <div class="button-google-map mdl-cell mdl-cell--12-col">
                    <?php echo tribe_get_map_link_html(); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ( ! empty( $phone ) ): ?>
            <dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
            <dd class="tribe-venue-tel"> <?php echo $phone ?> </dd>
        <?php endif ?>

        <?php if ( ! empty( $website ) ): ?>
            <dt> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
            <dd class="url"> <?php echo $website ?> </dd>
        <?php endif ?>

        <?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
    </dl>
</div>
