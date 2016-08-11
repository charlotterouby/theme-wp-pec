<?php
    $company = ot_get_option( 'company' );
?>

    <footer class="footer mdl-mini-footer">
        <div class="copyright mdl-mini-footer_left-section">
            <p>Copyright &copy;
                <span class="copyright__year"><?php echo date( 'Y' ); ?></span>
                <?php if ( $company ) : ?>
                    <span class="copyright__company"> <?php echo $company; ?></span>
                <?php else : ?>
                    <span class="copyright__company">Provence Energie Citoyenne</span>
                <?php endif; ?>
                . All rights reserved.
            </p>
        </div>
        <div id="secondary-menu" class="secondary-menu mdl-mini-footer_right-section" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'menu mdl-mini-footer_link-list' ) ); ?>
        </div>
    </footer>
