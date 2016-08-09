        <form action="" class="cart <?php echo esc_attr( $messages_class ); ?>" method="post" enctype='multipart/form-data'>
            <article class="tribe-rsvp-messages">
                <?php
                if ( $messages ) {
                    foreach ( $messages as $message ) {
                        ?>
                        <div class="tribe-rsvp-message tribe-rsvp-message-<?php echo esc_attr( $message->type ); ?>">
                            <?php echo esc_html( $message->message ); ?>
                        </div>
                        <?php
                    }//end foreach
                }//end if
                ?>
                <div class="tribe-rsvp-message tribe-rsvp-message-error tribe-rsvp-message-confirmation-error" style="display:none;">
                    <?php echo esc_html_e( 'Please fill in the RSVP confirmation name and email fields.', 'event-tickets' ); ?>
                </div>
            </article>

            <?php
            foreach ( $tickets as $ticket ) {
                // if the ticket isn't an RSVP ticket, then let's skip it
                if ( 'Tribe__Tickets__RSVP' !== $ticket->provider_class ) {
                    continue;
                }

                if ( $ticket->date_in_range( $now ) ) :
                    $is_there_any_product = true;
                    ?>
                    <fieldset>
                        <legend>Nombre de places</legend>
                        <input type="hidden" name="product_id[]" value="<?php echo absint( $ticket->ID ); ?>">
                        <?php
                        if ( $ticket->is_in_stock() ) {
                            $is_there_any_product_to_sell = true; ?>
                            <input type="number"
                                class="tribe-ticket-quantity"
                                name="quantity_<?php echo absint( $ticket->ID ); ?>"
                                min="0"
                                max="<?php echo esc_attr( $ticket->remaining() ); ?>"
                                value="0" <?php disabled( $must_login ); ?>
                            >
                            <?php if ( $ticket->managing_stock() ) { ?>
                                <p class="tribe-tickets-remaining">
                                    <?php echo sprintf( esc_html__( '%1$s out of %2$s available', 'event-tickets' ),
                                                       $ticket->remaining(), $ticket->original_stock() );
                                    ?>
                                </p>
                            <?php } // end if "managing stock"
                        }//end if "is in stock"
                        else { ?>
                            <p class="tickets_nostock"><?php esc_html_e( 'Out of stock!', 'event-tickets' ); ?></p>
                        <?php } ?>
                        <div class="event-ticket-description">
                            <div class="tickets_name">
                                <?php echo esc_html( $ticket->name ); ?>
                            </div>
                            <div class="tickets_description" colspan="2">
                                <?php echo esc_html( $ticket->description ); ?>
                            </div>
                        </div>
                    </fieldset>

                <?php
                    /**
                     * Allows injection of HTML after an RSVP ticket table row
                     *
                     * @var Event ID
                     * @var Tribe__Tickets__Ticket_Object
                     */
                    do_action( 'event_tickets_rsvp_after_ticket_row', tribe_events_get_ticket_event( $ticket->id ), $ticket );
                endif; ?>
            <?php } //end foreach

            if ( $is_there_any_product_to_sell ) :
            ?>
                <fieldset class="tribe-tickets-meta-row">
                    <legend><?php esc_html_e( 'Send RSVP confirmation to:', 'event-tickets' ); ?></legend>
                    <?php
                        /**
                         * Allows injection of HTML before RSVP ticket confirmation fields
                         *
                         * @var array of Tribe__Tickets__Ticket_Object
                         */
                        do_action( 'event_tickets_rsvp_before_confirmation_fields', $tickets );
                    ?>
                    <div class="tribe-tickets-full-name-row">
                        <label for="tribe-tickets-full-name">
                            <?php esc_html_e( 'Full Name', 'event-tickets' ); ?>:
                        </label>
                        <input type="text" name="attendee[full_name]" id="tribe-tickets-full-name">
                    </div>
                    <div class="tribe-tickets-email-row">
                        <label for="tribe-tickets-email">
                            <?php esc_html_e( 'Email', 'event-tickets' ); ?>:
                        </label>
                        <input type="email" name="attendee[email]" id="tribe-tickets-email">
                    </div>
                    <div class="tribe-tickets-order_status-row">
                        <label for="tribe-tickets-order_status">
                            <?php esc_html_e( 'RSVP', 'event-tickets' ); ?>:
                        </label>
                        <?php Tribe__Tickets__Tickets_View::instance()->render_rsvp_selector( 'attendee[order_status]', '' ); ?>
                    </div>
                    <?php if ( class_exists( 'Tribe__Tickets_Plus__Attendees_List' ) && ! Tribe__Tickets_Plus__Attendees_List::is_hidden_on( get_the_ID() ) ) : ?>
                        <div class="tribe-tickets-attendees-list-optout">
                            <label for="tribe-tickets-attendees-list-optout">
                                <?php esc_html_e( 'Don\'t list me on the public attendee list', 'event-tickets' ); ?>
                            </label>
                            <input type="checkbox" name="attendee[optout]" id="tribe-tickets-attendees-list-optout">
                        </div>
                    <?php endif; ?>
                </fieldset>
                <div class="add-to-cart">
                    <?php if ( $must_login ): ?>
                        <?php $login_url = Tribe__Tickets__Tickets::get_login_url() ?>
                        <a href="<?php echo $login_url; ?>">
                                    <?php esc_html_e( 'Login to RSVP', 'event-tickets' );?>
                                </a>
                    <?php else: ?>
                        <button type="submit" name="tickets_process" value="1" class="button alt">
                                    <?php esc_html_e( 'Confirm RSVP', 'event-tickets' );?>
                                </button>
                    <?php endif; ?>
                </div>
            <?php endif; //end if 'is_there_any_product_to_sell' ?>
        </form>
