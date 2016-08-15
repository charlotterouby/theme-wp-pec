<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <section id="primary" class="content-area mdl-grid mdl-grid--no-spacing">
        <main id="main" class="site-main mdl-grid width-75 mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col" role="main">
        <!-- Yoast SEO -->
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs mdl-cell mdl-cell--12-col">','</p>');
            }
        ?>

        <!--   Content     -->
        <?php if ( have_posts() ) : ?>

            <!-- .page-header -->
            <header class="page-header mdl-cell mdl-cell--12-col">
                <?php
                    the_archive_title( '<h2 class="page-title h1">', '</h2>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header>

            <!-- .masonry-grid -->
            <div class="masonry-grid mdl-grid mdl-cell mdl-cell--12-col">
            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );

            // End the loop.
            endwhile; ?>
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
