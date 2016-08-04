<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- .entry-header -->
    <header class="entry-header" <?php
            if (has_post_thumbnail()): ?>
            style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat fixed;"
            <?php endif; ?>>
        <!-- title -->
       <div class="content-header width-100">
            <?php the_title( '<h2 class="entry-title h1">', '</h2>' ); ?>
       </div>
        <!-- Yoast SEO -->
        <div class="page-breadcrumbs">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="width-100">','</p>');
                }
            ?>
        </div>
    </header>

    <!-- .entry-content -->
    <div class="entry-content width-100">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
        ?>
    </div>

    <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
