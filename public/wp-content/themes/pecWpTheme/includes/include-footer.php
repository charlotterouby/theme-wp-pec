<?php
    $company = ot_get_option( 'company' );
?>

    <footer class="footer mdl-grid mdl-grid--no-spacing">
<!--
        <div class="copyright mdl-cell">
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
-->
        <nav id="secondary-menu" class="secondary-menu mdl-cell mdl-cell--8-col mdl-cell--3-offset-tablet mdl-cell--3-offset-desktop  mdl-cell--12-col-phone" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'menu mdl-grid mdl-navigation' ) ); ?>
        </nav>
    </footer>
