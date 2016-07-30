<?php
    $logo = ot_get_option( 'logo' );
?>

    <header class="header ">
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
                <?php
                    $navigationPath = TEMPLATEPATH . '/includes/include-navigation.php';

                    if ( file_exists( $navigationPath ) ) {
                        include( $navigationPath );
                    }
                ?>
                <!-- NAVIGATION end -->


            </div>
        </div>
    </header>

