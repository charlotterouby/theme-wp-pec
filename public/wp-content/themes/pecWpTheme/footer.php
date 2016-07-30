<?php
/**
 * The Footer for the theme
 */
?>

<!-- FOOTER start -->

        <?php
            $footerPath = TEMPLATEPATH . '/includes/include-footer.php';

            if ( file_exists( $footerPath ) ) {
                include( $footerPath );
            }
        ?>

<!-- FOOTER END -->

<!-- SCRIPTS start -->

        <?php wp_footer(); ?>

<!-- SCRIPTS end -->

    </body>
</html>
