/* ==========================================================================================
    DOCUMENT READY
   ========================================================================================== */

$(document).ready(function () {
    'use strict';

    /* ==============================
        Responsive Video Container
       ============================== */

    // Wraps videos in a container that makes videos responsive.
    $('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function () {
        $(this).wrap('<div class="container__video"></div>');
    });

    /* ==============================
        Header - Navigation principale
       ============================== */
    $('.primary-menu .menu').addClass('mdl-navigation');
    $('.primary-menu .menu a').addClass('mdl-navigation__link');

    /* ==============================
        Overlay Menu
       ============================== */
    $(".button-overlay-menu i").click(function(){
        $(".overlay-menu").fadeToggle(200);
        $(this).toggleClass('icon__menu').toggleClass('icon__close');
    });

    /* ==============================
        Formulaire commentaires
       ============================== */
    $('.comment-form-comment').addClass('mdl-textfield mdl-js-textfield');
    $('.comment-form-comment label').addClass('mdl-textfield__label');
    $('.comment-form-comment textarea').addClass('mdl-textfield__input');
    $('.form-submit input').addClass('mdl-button');

    /* ==============================
        Footer Copyright Year
       ============================== */

    // Fills in the current year.
    $('.copyright__year').text((new Date()).getFullYear());
});
