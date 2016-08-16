<?php
    $company = ot_get_option( 'company' );
?>

    <footer class="footer mdl-mini-footer">
        <div class="mdl-mini-footer_left-section">
            <p>
                <a href="https://www.facebook.com/ProvenceEnergieCitoyenne/" class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="icon__facebook material-icons"></i>
                </a>
                <a href="https://www.provence-energie-citoyenne.fr/feed" class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="icon__rss material-icons"></i>
                </a>
            </p>
            <form action="//provence-energie-citoyenne.us14.list-manage.com/subscribe/post?u=126c628f6adfa2c366b5236f6&amp;id=bca35e1995" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form-newsletter" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="email" name="EMAIL" id="mce-EMAIL" class="mdl-textfield__input" placeholder="mon-email@gmail.com">
                    <label for="mce-EMAIL" class="mdl-textfield__label">Souscrire à la newsletter</label>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_126c628f6adfa2c366b5236f6_bca35e1995" tabindex="-1" value="">
                    </div>
                </div>
                <input type="submit" value="Souscrire" name="subscribe" id="mc-embedded-subscribe"class="mdl-button mdl-js-button mdl-button--raised pec-button-jaune">
            </form>
        </div>
        <div id="secondary-menu" class="secondary-menu mdl-mini-footer_right-section" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'menu mdl-mini-footer_link-list' ) ); ?>
        </div>
    </footer>
