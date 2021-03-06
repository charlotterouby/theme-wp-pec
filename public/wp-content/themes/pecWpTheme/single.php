<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area mdl-grid mdl-grid--no-spacing page-content">
        <main id="main" class="site-content width-75 mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col single-article" role="main">
        <!-- Content -->
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content-default', get_post_format() );


            // TODO : Faire un bandeau avec 3 articles similaires


            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;


        // End the loop.
        endwhile;
        ?>

        </main><!-- .site-main -->

         <aside class="sidebar mdl-cell mdl-cell--3-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
            <?php get_sidebar() ?>
        </aside><!-- .sidebar -->

    </div><!-- .content-area -->

<?php get_footer(); ?>
