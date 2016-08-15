<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pec-thumbnail mdl-cell mdl-cell--4-col-desktop mdl-cell--12-col mdl-cell--6-col-tablet'); ?>>
    <!-- image thumbnail -->
    <?php
        if (has_post_thumbnail()):
            pecWpTheme_post_thumbnail();
        elseif (main_image()):
            echo main_image();
        endif;
    ?>

    <!-- .entry-header -->
    <header class="entry-header">
        <?php the_title( sprintf( '<h3 class="entry-title h6"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    </header>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

    <?php if ( 'post' == get_post_type() ) : ?>

        <!-- .entry-footer -->
        <footer class="entry-footer">
            <?php pecWpTheme_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'pecWpTheme' ), '<span class="edit-link">', '</span>' ); ?>
        </footer>

    <?php else : ?>

        <?php edit_post_link( __( 'Edit', 'pecWpTheme' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

    <?php endif; ?>

</article><!-- #post-## -->
