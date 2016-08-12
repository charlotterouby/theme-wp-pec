<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <!-- #primary -->
    <div id="primary" class="content-area mdl-grid mdl-grid--no-spacing page-content">
        <!-- #content -->
        <div id="content" class="site-content mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--12-col" role="main">
            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    // Include the page content template.
                    get_template_part( 'content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                endwhile;
            ?>
        </div>
    </div>

<?php get_footer(); ?>
