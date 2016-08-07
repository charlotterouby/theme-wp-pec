
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
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery.min.js"><\/script>')</script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.min.js"></script>

        <?php wp_footer(); ?>

<!-- SCRIPTS end -->
<!--    </div>-->
    </body>
</html>
