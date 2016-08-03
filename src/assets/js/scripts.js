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
    $(".button-overlay-menu i").on('click', function(){
        console.log('click on button overlay');
        $('.button-overlay-menu').toggleClass('is-open');
        $(this).toggleClass('icon__menu').toggleClass('icon__close');
        // changer la propriété 'position' du boutton en fonction de l'ouverture du menu
        var overlayOpen = $(".button-overlay-menu").hasClass("is-open");
        if(overlayOpen === true){
            $('.button-overlay-menu').css('position', 'fixed');
        } else {
            $('.button-overlay-menu').css('position', 'absolute');
        }

    });

    /* ==============================
        Formulaire commentaires
       ============================== */
    $('.comment-form-comment').addClass('mdl-textfield mdl-js-textfield');
    $('.comment-form-comment label').addClass('mdl-textfield__label');
    $('.comment-form-comment textarea').addClass('mdl-textfield__input');

    $('.comment-form-author').addClass('mdl-textfield mdl-js-textfield');
    $('.comment-form-author label').addClass('mdl-textfield__label');
    $('.comment-form-author input').addClass('mdl-textfield__input');

    $('.comment-form-email').addClass('mdl-textfield mdl-js-textfield');
    $('.comment-form-email label').addClass('mdl-textfield__label');
    $('.comment-form-email input').addClass('mdl-textfield__input');

    $('.comment-form-url').addClass('mdl-textfield mdl-js-textfield');
    $('.comment-form-url label').addClass('mdl-textfield__label');
    $('.comment-form-url input').addClass('mdl-textfield__input');

    $('.form-submit input[type="submit"]').addClass('mdl-button');

    /* ==============================
        Footer Copyright Year
       ============================== */

    // Fills in the current year.
    $('.copyright__year').text((new Date()).getFullYear());
});
