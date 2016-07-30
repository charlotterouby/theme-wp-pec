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
            <div id="widget-area" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- .widget-area -->
        <?php endif; ?>

        <?php if ( has_nav_menu( 'social' ) ) : ?>
           <h5>Retrouvez-nous sur</h5>
            <nav id="social-navigation" class="social-navigation" role="navigation">
                <?php
                    // Social links navigation menu.
                    wp_nav_menu( array(
                        'theme_location' => 'social',
                        'depth'          => 1,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>',
                    ) );
                ?>
            </nav><!-- .social-navigation -->
        <?php endif; ?>

<!-- .secondary -->

<?php endif; ?>
