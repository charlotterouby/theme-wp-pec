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
            <form action="souscrire à la newsletter" class="form-newsletter">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="email" id="email subscribed" class="mdl-textfield__input" placeholder="mon-email@gmail.com">
                    <label for="email subscribed" class="mdl-textfield__label">Souscrire à la newsletter</label>
                </div>
                <input type="submit" value="Souscrire" class="mdl-button mdl-js-button mdl-button--raised pec-button-jaune" disabled>
            </form>
        </div>
        <div id="secondary-menu" class="secondary-menu mdl-mini-footer_right-section" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'menu mdl-mini-footer_link-list' ) ); ?>
        </div>
    </footer>
