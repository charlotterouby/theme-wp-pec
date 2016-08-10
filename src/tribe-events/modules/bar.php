<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();
?>

<?php do_action( 'tribe_events_bar_before_template' ) ?>
<div id="tribe-events-bar">

    <form id="tribe-bar-form" class="tribe-clearfix mdl-grid" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
        <!-- Mobile Filters Toggle -->
        <div id="tribe-bar-collapse-toggle" <?php if ( count( $views ) == 1 ) { ?> class="tribe-bar-collapse-toggle-full-width mdl-cell mdl-cell--12-col mdl-cell--order-1-desktop"<?php } else { ?> class="mdl-cell mdl-cell--12-col mdl-cell--order-1-desktop" <?php }?>>
            <?php printf( esc_html__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?><span class="tribe-bar-toggle-arrow"></span>
        </div>

        <!-- Views -->
        <?php if ( count( $views ) > 1 ) { ?>
            <div id="tribe-bar-views" class="mdl-cell mdl-cell--4-col mdl-cell--12-col-phone mdl-cell--order-3-desktop">
                    <div class="tribe-bar-views-inner tribe-clearfix mdl-textfield mdl-js-textfield">
                        <h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'the-events-calendar' ) ?></h3>
                        <label><?php esc_html_e( 'View As', 'the-events-calendar' ); ?></label>
                        <select class="tribe-bar-views-select tribe-no-param mdl-textfield__input" name="tribe-bar-view">
                            <?php foreach ( $views as $view ) : ?>
                                <option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
                                    <?php echo $view['anchor']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- .tribe-bar-views-inner -->
                </div><!-- .tribe-bar-views -->
        <?php } // if ( count( $views ) > 1 ) ?>

        <?php if ( ! empty( $filters ) ) { ?>
            <div class="tribe-bar-filters mdl-cell mdl-cell--8-col mdl-cell--12-col-phone mdl-cell--order-2-desktop">
                <div class="tribe-bar-filters-inner tribe-clearfix">
                    <?php foreach ( $filters as $filter ) : ?>
                        <div class="<?php echo esc_attr( $filter['name'] ) ?>-filter input-filter-container mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo $filter['caption'] ?></label>
                            <?php echo $filter['html'] ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="tribe-bar-submit">
                        <input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>" />
                    </div>
                    <!-- .tribe-bar-submit -->
                </div>
                <!-- .tribe-bar-filters-inner -->
            </div><!-- .tribe-bar-filters -->
        <?php } // if ( !empty( $filters ) ) ?>

    </form>
    <!-- #tribe-bar-form -->

</div><!-- #tribe-events-bar -->
<?php
do_action( 'tribe_events_bar_after_template' );
