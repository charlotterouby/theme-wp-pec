<?php
/**
 * The template for the front-page
 *
 * This is the template that displays the front-page.
 *
 */

get_header(); ?>

<!-- content -->
<div class="content-area container-front-page mdl-grid mdl-grid--no-spacing">
    <div class="site-main content-front-page mdl-cell mdl-cell--12-col mdl-grid">

        <!-- logo/titre du site -->
        <div class="site-logo mdl-cell mdl-cell--12-col">
            <!-- logo -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-PEC-couleur.png" alt="Logo Provence Energie Citoyenne" />
            <!-- description site -->
            <q><?php bloginfo('description'); ?></q>
        </div>
        <!-- end .site-logo -->

        <!-- bouttons redirection parcours "first visit" ou "actualités" -->
        <div class="redirect-links mdl-cell mdl-cell--12-col mdl-grid">

            <!-- button découvrir pec -->
            <a href="/presentation-pec" alt="découvrir Provence Energie Citoyenne" id="button-decouvrir"
            class="mdl-button mdl-js-button mdl-button--raised mdl-cell mdl-cell--6-col">Découvrir PEC</a>

            <!-- button voir actualités -->
            <a href="/nos-actualites" alt="découvrir les dernières actualités" id="button-actualites" class="mdl-button mdl-js-button mdl-button--raised mdl-cell mdl-cell--6-col">Voir les Actualités</a>

        </div>
        <!-- end .redirect-links -->
    </div>
</div>

<?php get_footer(); ?>
