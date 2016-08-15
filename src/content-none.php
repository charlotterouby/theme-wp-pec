<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section class="no-results not-found">
    <header class="content-header width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">
        <h2 class="entry-title h1"><?php _e( 'Nothing Found', 'pecWpTheme' ); ?></h2>
    </header><!-- .page-header -->
    <!-- Yoast SEO -->
    <div class="page-breadcrumbs">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<p id="breadcrumbs" class="width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">','</p>');
            }
        ?>
    </div>
    <div class="entry-content width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone mdl-grid">

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pecWpTheme' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pecWpTheme' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pecWpTheme' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

    </div><!-- .page-content -->
</section><!-- .no-results -->
