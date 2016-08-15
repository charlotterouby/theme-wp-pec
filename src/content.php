<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pec-thumbnail mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--12-col mdl-cell--4-col-desktop mdl-cell--6-col-tablet'); ?>>
   <!-- image thumbnail -->
    <?php
        if (has_post_thumbnail()):
            twentyfifteen_post_thumbnail();
        elseif (main_image()):
            echo main_image();
        endif;
    ?>

    <!-- .entry-header -->
    <header class="entry-header mdl-cell mdl-cell--12-col mdl-cell--top">
        <?php
            the_title( sprintf( '<h3 class="entry-title h6"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
        ?>
    </header>
    <!-- .entry-content -->
    <div class="entry-content mdl-cell mdl-cell--12-col">
        <?php
            /* translators: %s: Name of current post */
            the_excerpt();

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text"> | </span>',
            ) );
        ?>
    </div>

    <!-- .entry-footer -->
    <footer class="entry-footer mdl-cell mdl-cell--12-col mdl-cell--bottom">
        <?php twentyfifteen_entry_meta(); ?>
    </footer>

</article><!-- #post-## -->
