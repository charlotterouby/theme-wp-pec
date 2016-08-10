<?php
/**
 * This template renders the RSVP ticket form
 *
 * @version 4.2
 *
 * @var bool $must_login
 */

$is_there_any_product         = false;
$is_there_any_product_to_sell = false;

ob_start();
$messages = Tribe__Tickets__RSVP::get_instance()->get_messages();
$messages_class = $messages ? 'tribe-rsvp-message-display' : '';
$now = current_time( 'timestamp' );
?>

    <div class="tribe-events-meta-group mdl-cell tribe-events-meta-group-details mdl-grid mdl-grid--no-spacing">
        <h3 class="tribe-events-tickets-title tribe-events-single-section-title mdl-cell mdl-cell--12-col"><?php esc_html_e( 'RSVP', 'event-tickets' ) ?></h3>

        <!--    MODELE ORIGINAL-->
        <form action="" class="cart <?php echo esc_attr( $messages_class ); ?>" method="post" enctype='multipart/form-data'>
            <div class="tribe-rsvp-messages">
                <?php
                if ( $messages ) {
                    foreach ( $messages as $message ) {
                        ?>
                        <div class="mdl-textfield__error tribe-rsvp-message tribe-rsvp-message-<?php echo esc_attr( $message->type ); ?>">
                            <?php echo esc_html( $message->message ); ?>
                        </div>
                        <?php
                    }//end foreach
                }//end if
                ?>
                <div class="tribe-rsvp-message tribe-rsvp-message-error tribe-rsvp-message-confirmation-error" style="display:none;">
                    <?php echo esc_html_e( 'Please fill in the RSVP confirmation name and email fields.', 'event-tickets' ); ?>
                </div>
            </div>
            <table width="100%" class="tribe-events-tickets tribe-events-tickets-rsvp mdl-data-table mdl-js-data-table">
                <?php
            foreach ( $tickets as $ticket ) {
                // if the ticket isn't an RSVP ticket, then let's skip it
                if ( 'Tribe__Tickets__RSVP' !== $ticket->provider_class ) {
                    continue;
                }

                if ( $ticket->date_in_range( $now ) ) {
                    $is_there_any_product = true;
                    ?>
                    <tr>
                        <td class="tribe-ticket quantity mdl-data-table__cell--non-numeric mdl-textfield mdl-js-textfield" data-product-id="<?php echo esc_attr( $ticket->ID ); ?>">
                            <input type="hidden"
                                name="product_id[]"
                                class="mdl-textfield__input"
                                value="<?php echo absint( $ticket->ID ); ?>"
                            >
                            <?php
                            if ( $ticket->is_in_stock() ) {
                                $is_there_any_product_to_sell = true;
                                ?>
                                <input type="number"
                                    id="quantity-tickets"
                                    name="quantity_<?php echo absint( $ticket->ID ); ?>"
                                    class="tribe-ticket-quantity mdl-textfield__input"
                                    min="0"
                                    max="<?php echo esc_attr( $ticket->remaining() ); ?>"
                                    placeholder="0"
                                    <?php disabled( $must_login ); ?>
                                >
                                <label class="mdl-textfield_label" for="quantity-tickets">Nombre de tickets</label>
                                <?php

                                if ( $ticket->managing_stock() ) {
                                    ?>
                                    <p class="tribe-tickets-remaining" for="product-id">
                                        <?php
                                        echo sprintf( esc_html__( '%1$s out of %2$s available', 'event-tickets' ), $ticket->remaining(), $ticket->original_stock() );
                                        ?>
                                    </p>
                                    <?php
                                }
                            }//end if "is in stock"
                            else { ?>
                                <p class="tickets_nostock"><?php esc_html_e( 'Out of stock!', 'event-tickets' ); ?></p>
                            <?php
                            }
                            ?>
                        </td>
                        <td class="tickets_name mdl-data-table__cell--non-numeric">
                            <h6><?php echo esc_html( $ticket->name ); ?></h6>
                            <p><?php echo esc_html( $ticket->description ); ?></p>
                        </td>
                    </tr>
                    <?php

                    /**
                     * Allows injection of HTML after an RSVP ticket table row
                     *
                     * @var Event ID
                     * @var Tribe__Tickets__Ticket_Object
                     */
                    do_action( 'event_tickets_rsvp_after_ticket_row', tribe_events_get_ticket_event( $ticket->id ), $ticket );

                }
            }//end foreach

            if ( $is_there_any_product_to_sell ) {
                ?>
                <tr class="tribe-tickets-meta-row">
                    <td colspan="4" class="tribe-tickets-attendees mdl-data-table__cell--non-numeric">
                        <header>
                            <?php esc_html_e( 'Send RSVP confirmation to:', 'event-tickets' ); ?>
                        </header>
                        <?php
                            /**
                             * Allows injection of HTML before RSVP ticket confirmation fields
                             *
                             * @var array of Tribe__Tickets__Ticket_Object
                             */
                            do_action( 'event_tickets_rsvp_before_confirmation_fields', $tickets );
                        ?>
                        <table class="tribe-tickets-table mdl-data-table mdl-js-data-table">
                            <tr class="tribe-tickets-full-name-row mdl-grid">
                                <td class="mdl-cell mdl-cell--12-col mdl-data-table__cell--non-numeric mdl-textfield mdl-js-textfield">
                                    <input type="text"
                                        name="attendee[full_name]"
                                        id="tribe-tickets-full-name"
                                        class="mdl-textfield__input"
                                    >
                                    <label for="tribe-tickets-full-name" class="mdl-textfield__label">
                                        <?php esc_html_e( 'Full Name', 'event-tickets' ); ?>:
                                    </label>
                                </td>
                            </tr>
                            <tr class="tribe-tickets-email-row mdl-grid">
                                <td class="mdl-cell mdl-cell--12-col mdl-data-table__cell--non-numeric mdl-textfield mdl-js-textfield">
                                    <input type="email" name="attendee[email]" id="tribe-tickets-email" class="mdl-textfield__input">
                                    <label for="tribe-tickets-email" class="mdl-textfield__label">
                                        <?php esc_html_e( 'Email', 'event-tickets' ); ?>:
                                    </label>
                                </td>
                            </tr>
                            <tr class="tribe-tickets-order_status-row mdl-grid">
                                <td class="mdl-cell mdl-cell--12-col mdl-data-table__cell--non-numeric mdl-textfield mdl-js-textfield">
                                    <?php Tribe__Tickets__Tickets_View::instance()->render_rsvp_selector( 'attendee[order_status]', '' ); ?>
                                    <label for="tribe-tickets-order_status" class="mdl-textfield__label">
                                        <?php esc_html_e( 'RSVP', 'event-tickets' ); ?>:
                                    </label>
                                </td>
                            </tr>

                            <?php if ( class_exists( 'Tribe__Tickets_Plus__Attendees_List' ) && ! Tribe__Tickets_Plus__Attendees_List::is_hidden_on( get_the_ID() ) ) : ?>
                                <tr class="tribe-tickets-attendees-list-optout">
                                    <td class="mdl-data-table__cell--non-numeric" colspan="4">
                                        <label for="tribe-tickets-attendees-list-optout" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                            <input type="checkbox" name="attendee[optout]" id="tribe-tickets-attendees-list-optout" class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label"><?php esc_html_e( 'Don\'t list me on the public attendee list', 'event-tickets' ); ?></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="add-to-cart mdl-data-table__cell--non-numeric">
                        <?php if ( $must_login ): ?>
                            <?php $login_url = Tribe__Tickets__Tickets::get_login_url() ?>
                            <a href="<?php echo $login_url; ?>">
                                        <?php esc_html_e( 'Login to RSVP', 'event-tickets' );?>
                                    </a>
                        <?php else: ?>
                            <button type="submit" name="tickets_process" value="1" class="button alt mdl-button mdl-button--raised">
                                <?php esc_html_e( 'Confirm RSVP', 'event-tickets' );?>
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            </table>
        </form>

    </div>

<?php
    $content = ob_get_clean();
    if ( $is_there_any_product ) {
        echo $content;
    }
    else {
    $unavailability_message = $this->get_tickets_unavailable_message( $tickets );

    // if there isn't an unavailability message, bail
    if ( ! $unavailability_message ) {
        return;
    }

    ?>
        <div class="tickets-unavailable">
            <?php echo esc_html( $unavailability_message ); ?>
        </div>
<?php
}
?>
