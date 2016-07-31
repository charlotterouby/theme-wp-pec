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
        <div id="widget-area" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    <?php endif; ?>

    <!-- .social-navigation -->
<!--
    <?php //if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu">
                <h5>Retrouvez-nous sur</h5>
                <nav id="social-navigation" class="social-navigation" role="navigation">
                    <?php
                    // Social links navigation menu.
//                    wp_nav_menu( array(
//                        'theme_location' => 'social',
//                        'depth'          => 1,
//                        'link_before'    => '<span class="screen-reader-text">',
//                        'link_after'     => '</span>',
//                    ) );
                    ?>
                </nav>
            </div>
    <?php //endif; ?>
-->

    <!-- .secondary -->

<?php endif; ?>
