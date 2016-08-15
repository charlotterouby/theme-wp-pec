<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <section id="primary" class="content-area mdl-grid mdl-grid--no-spacing">
        <main id="main" class="site-main width-75 mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col" role="main">
        <!-- Yoast SEO -->
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs mdl-cell mdl-cell--12-col">','</p>');
            }
        ?>
        <!-- Content -->
        <?php if ( have_posts() ) : ?>

            <!-- .page-header -->
            <header class="page-header mdl-cell mdl-cell--12-col">
                <h2 class="page-title h1"><?php printf( __( 'Search Results for: %s', 'pecWpTheme' ), get_search_query() ); ?></h2>
            </header>

            <!-- .masonry-grid -->
            <div class="masonry-grid mdl-grid mdl-cell mdl-cell--12-col">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post(); ?>

                <?php
                /*
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'content', 'search' );

            // End the loop.
            endwhile;?>
            </div>
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'pecWpTheme' ),
                'next_text'          => __( 'Next page', 'pecWpTheme' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'pecWpTheme' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

        </main><!-- .site-main -->
        <aside class="sidebar mdl-cell mdl-cell--3-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
            <?php get_sidebar() ?>
        </aside><!-- .sidebar -->
    </section><!-- .content-area -->

<?php get_footer(); ?>
