<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area mdl-grid mdl-grid--no-spacing">
        <main id="main" class="site-main mdl-grid width-75 mdl-cell mdl-cell--9-col-dektop mdl-cell--12-col" role="main">
            <!-- Yoast SEO -->
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs mdl-cell mdl-cell--12-col">','</p>');
                }
            ?>
            <!-- Content -->
            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header class="mdl-cell mdl-cell--12-col">
                        <h2 class="page-title screen-reader-text h1"><?php single_post_title(); ?></h2>
                    </header>
                <?php endif; ?>
                <!--END HEADER -->
                <div class="masonry-grid mdl-grid mdl-cell mdl-cell--12-col">
                <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                        /*
                        * Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        */
                        get_template_part( 'content', get_post_format() );

                    // End the loop.
                    endwhile;
                ?>
                </div>

            <?php
                // If no content, include the "No posts found" template.
                else :
                    get_template_part( 'content', 'none' );
                endif;
            ?>

        </main>
        <!-- .site-main -->

        <aside class="sidebar mdl-cell mdl-cell--3-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
            <?php get_sidebar() ?>
        </aside>
        <!-- .sidebar -->

    </div>
    <!-- .content-area -->

    <?php get_footer(); ?>
