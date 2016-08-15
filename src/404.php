<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area mdl-grid mdl-grid--no-spacing">
        <main id="main" class="site-main mdl-grid mdl-grid--no-spacing width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone" role="main">

            <section class="error-404 not-found">
                <header class="page-header mdl-cell mdl-cell mdl-cell--12-col">
                    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'pecWpTheme' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'pecWpTheme' ); ?></p>

                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>
