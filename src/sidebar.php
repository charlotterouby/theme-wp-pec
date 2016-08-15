<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if ( has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <!-- .widget-area -->
        <div id="widget-area" class="widget-area mdl-cell mdl-cell--12-col mdl-grid" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    <?php endif; ?>

    <!-- .secondary -->

<?php endif; ?>
