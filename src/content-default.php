<?php
/**
 * used for default single post content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

    <!-- .entry-header -->
    <header class="entry-header" <?php if (has_post_thumbnail()): ?> style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat fixed; background-size: cover;" <?php endif; ?>>
        <!-- title -->
       <div class="content-header width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">
            <?php the_title( '<h2 class="entry-title h1">', '</h2>' ); ?>
       </div>
        <!-- Yoast SEO -->
        <div class="page-breadcrumbs">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">','</p>');
                }
            ?>
        </div>
    </header>

    <!-- .entry-content -->
    <div class="entry-content width-100 mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pecWpTheme' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pecWpTheme' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
        ?>
    </div>

    <!--edit post link-->
    <?php edit_post_link( __( 'Edit', 'pecWpTheme' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
