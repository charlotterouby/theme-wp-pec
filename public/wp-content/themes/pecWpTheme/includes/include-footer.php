<?php
    $company = ot_get_option( 'company' );
?>

    <footer class="footer">
        <div class="copyright">
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
        <nav id="secondary-menu" class="secondary-menu" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
        </nav>
    </footer>
