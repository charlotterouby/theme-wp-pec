<?php
    $logo = ot_get_option( 'logo' );
?>

    <!-- header start -->
    <header class="header">
        <!--header horizontal start -->
        <div class="mdl-layout__header mdl-layout__header--scroll">
            <div class="mdl-layout__header-row">
                <!-- LOGO / SITE TITLE start -->
                <?php if ( $logo ) : ?>
                    <div class="mdl-layout-title">
                        <a href="/">
                            <img src="<?php echo $logo; ?>" alt="" />
                        </a>
                    </div>
                <?php else: ?>
                        <h1 class="mdl-layout-title h4"><a href="/"><?php bloginfo('name'); ?></a></h1>
                <?php endif; ?>

                <!-- LOGO / SITE TITLE end -->

                <div class="mdl-layout-spacer"></div>

                <!-- NAVIGATION start -->
                <nav id="primary-menu" class="primary-menu" role="navigation">
                    <?php wp_nav_menu( array( 'menu' => 'header' ) ); ?>
                </nav>
                <!-- NAVIGATION end -->
            </div>
        </div>
        <!-- header horizontal end-->
        <h1 class="h6 hide-desktop site-mobile-title"><a href="/"><?php bloginfo('name'); ?></a></h1>
        <!-- button overlay -->
        <div role="button" class="button-overlay-menu hide-desktop">
            <i class="icon__menu"></i>
        </div>
        <!-- Overlay menu start-->
        <div class="overlay-menu hide-desktop">
           <div class="wrap-overlay-menu">
            <nav role="navigation">
                <?php wp_nav_menu( array( 'menu' => 'header', 'menu_class' => 'wrap-nav' ) ); ?>
            </nav>
           </div>
        </div>
        <!-- Overlay menu end-->
    </header>
