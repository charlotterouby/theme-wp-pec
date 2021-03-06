<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    require get_template_directory() . '/includes/back-compat.php';
}

if ( ! function_exists( 'pecWpTheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function pecWpTheme_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on pecWpTheme, use a find and replace
     * to change 'pecWpTheme' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'pecWpTheme', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // This theme uses wp_nav_menu() in two locations. Social is to be used in a widget menu.
    register_nav_menus( array(
        'primary' => __( 'Entête de page', 'pecWpTheme' ),
        'secondary' => __('Pied de page')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video'
    ) );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style( array( 'assets/css/editor-style.css', 'genericons/genericons.css', pecWpTheme_fonts_url() ) );
}
endif; // pecWpTheme_setup
add_action( 'after_setup_theme', 'pecWpTheme_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pecWpTheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'pecWpTheme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pecWpTheme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s mdl-cell mdl-cell--6-col-tablet mdl-cell--12-col">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'pecWpTheme_widgets_init' );

if ( ! function_exists( 'pecWpTheme_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function pecWpTheme_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'pecWpTheme' ) ) {
        $fonts[] = 'Noto Sans:400italic,700italic,400,700';
    }

    /* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'pecWpTheme' ) ) {
        $fonts[] = 'Noto Serif:400italic,700italic,400,700';
    }

    /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'pecWpTheme' ) ) {
        $fonts[] = 'Inconsolata:400,700';
    }

    /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
    $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'pecWpTheme' );

    if ( 'cyrillic' == $subset ) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ( 'greek' == $subset ) {
        $subsets .= ',greek,greek-ext';
    } elseif ( 'devanagari' == $subset ) {
        $subsets .= ',devanagari';
    } elseif ( 'vietnamese' == $subset ) {
        $subsets .= ',vietnamese';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;


/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function pecWpTheme_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
            .post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
            .post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
            .post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
        ';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
            .post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
            .post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
            .post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
        ';
    }

    wp_add_inline_style( 'pecWpTheme-style', $css );
}
add_action( 'wp_enqueue_scripts', 'pecWpTheme_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function pecWpTheme_nav_description( $item_output, $item, $depth, $args ) {
    if ( 'primary' == $args->theme_location && $item->description ) {
        $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'pecWpTheme_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function pecWpTheme_search_form_modify( $html ) {
    return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'pecWpTheme_search_form_modify' );

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/includes/template-tags.php';


/* ========================================================================================== */
/*  OPTIONTREE
/* ========================================================================================== */
    /* ==============================
     *  Filter
     * ============================== */

    add_filter( 'ot_theme_mode', '__return_true' );


    /* ==============================
     *  Include
     * ============================== */

    require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );


    /* ============================== */
    /*  Theme Options
    /* ============================== */

    require( trailingslashit( get_template_directory() ) . 'option-tree/theme-options.php' );


/* ========================================================================================== */
/*  ENQUEUE ASSETS
/* ========================================================================================== */

    function enqueue_assets() {
    /* ============================== */
    /*  Styles
    /* ============================== */
        wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css' );

    /* ============================== */
    /*  Scripts
    /* ============================== */
        wp_deregister_script( 'jquery' );

        wp_enqueue_script( 'jquery', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', false, null, true );
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr/modernizr.js', false, false, true );
        wp_enqueue_script( 'material', get_template_directory_uri() . '/assets/js/mdl/material.min.js', false, false, true );
    }

    if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'enqueue_assets', 11 );


/* ========================================================================================== */
/*  CUSTOM PROPERTIES
/* ========================================================================================== */

    /* ============================================================ */
    /*  Function to call first uploaded image of the post
    /* ============================================================ */
    function main_image() {
        $files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image&order=desc');
          if($files) :
            $permalink= get_permalink();
            $keys = array_reverse(array_keys($files));
            $j=0;
            $num = $keys[$j];
            $image=wp_get_attachment_image($num, 'large', true);
            $imagepieces = explode('"', $image);
            $imagepath = $imagepieces[1];
            $main=wp_get_attachment_url($num);
            $template=get_template_directory();
            $the_title=get_the_title();
            print "<a class='post-thumbnail mdl-cell mdl-cell--12-col' href='$permalink' aria-hidden='true'><img src='$main' alt='$the_title' class='frame' /></a>";
          else :
            $src = get_template_directory_uri();
            $alt = get_the_title();
            $permalink= get_permalink();
            print "<a class='post-thumbnail mdl-cell mdl-cell--12-col' href='$permalink' aria-hidden='true'><img src='$src/assets/img/default-image.jpg' alt='$alt' /></a>";
          endif;
    }

    /* ============================================================ */
    /*  Function to call url of the first uploaded image of the post
    /* ============================================================ */
    function url_main_image(){
        $files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image&order=desc');
        if($files):
            $permalink= get_permalink();
            $keys = array_reverse(array_keys($files));
            $j=0;
            $num = $keys[$j];
            $image=wp_get_attachment_image($num, 'large', true);
            $imagepieces = explode('"', $image);
            $imagepath = $imagepieces[1];
            $main=wp_get_attachment_url($num);
            $template=get_template_directory();
            $the_title=get_the_title();
            print $main;
        endif;
    }

    /* ============================================================ */
    /*  Filtre widget Nuage de tags
    /* ============================================================ */
    function custom_tag_cloud($args) {
      $args['unit'] = 'em';
      $args['smallest'] = 0.8;
      $args['largest'] = 2;
      $args['order'] = 'RAND';
      $args['number'] = 20;
      return $args;
    }
    add_filter('widget_tag_cloud_args', 'custom_tag_cloud');

    /* ============================================================ */
    /*  Ajouter des styles perso dans l'éditeur TinyMCE
    /*  www.creativejuiz.fr/blog/wordpress/ajouter-styles-perso-editeur-tinymce
    /* ============================================================ */
    add_filter('mce_buttons_2', 'juiz_mce_buttons_2');

    if ( !function_exists('juiz_mce_buttons_2') ){
        function juiz_mce_buttons_2($buttons){
            array_unshift($buttons, 'styleselect');
            return $buttons;
        }
    }

    add_filter('tiny_mce_before_init', 'juiz_mce_before_init');
    if (!function_exists('juiz_mce_before_init')){
        function juiz_mce_before_init($styles){
            // on créé un tableau contenant nos styles
            $style_formats = array(
                // chaque style est un nouveau tableau
                // Style "button vert"
                array(
                    'title' => __('Bouton Vert'),
                    'selector' => 'a',
                    'classes' => 'mdl-button mdl-js-button mdl-button--raised pec-button-vert'
                ),
                // Style "button jaune"
                array(
                    'title' => __('Bouton Jaune'),
                    'selector' => 'a',
                    'classes' => 'mdl-button mdl-js-button mdl-button--raised pec-button-jaune'
                ),
                // Style "button Bleu"
                array(
                    'title' => __('Bouton Bleu'),
                    'selector' => 'a',
                    'classes' => 'mdl-button mdl-js-button mdl-button--raised pec-button-bleu'
                ),
                // Style "button Gris"
                array(
                    'title' => __('Bouton Gris'),
                    'selector' => 'a',
                    'classes' => 'mdl-button mdl-js-button mdl-button--raised pec-button-gris'
                ),
                // div wrapper tablet & desktop : 1 colonne
                array(
                    'title' => __('1 colonne'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--1-col-tablet mdl-cell--1-col-desktop'
                ),
                // div wrapper tablet & desktop : 2 colonnes
                array(
                    'title' => __('2 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--2-col-tablet mdl-cell--2-col-desktop'
                ),
                // div wrapper tablet & desktop : 3 colonnes
                array(
                    'title' => __('3 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--3-col-tablet mdl-cell--3-col-desktop'
                ),
                // div wrapper tablet & desktop : 4 colonnes
                array(
                    'title' => __('4 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop'
                ),
                // div wrapper tablet & desktop : 5 colonnes
                array(
                    'title' => __('5 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--5-col-tablet mdl-cell--5-col-desktop'
                ),
                // div wrapper tablet & desktop : 6 colonnes
                array(
                    'title' => __('6 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop'
                ),
                // div wrapper tablet & desktop : 7 colonnes
                array(
                    'title' => __('7 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--7-col-tablet mdl-cell--7-col-desktop'
                ),
                // div wrapper tablet & desktop : 8 colonnes
                array(
                    'title' => __('8 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--8-col-desktop'
                ),
                // div wrapper tablet & desktop : 9 colonnes
                array(
                    'title' => __('9 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--9-col-tablet mdl-cell--9-col-desktop'
                ),
                // div wrapper tablet & desktop : 10 colonnes
                array(
                    'title' => __('10 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--10-col-tablet mdl-cell--10-col-desktop'
                ),
                // div wrapper tablet & desktop : 11 colonnes
                array(
                    'title' => __('11 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col mdl-cell--11-col-tablet mdl-cell--11-col-desktop'
                ),
                // div wrapper tablet & desktop : 12 colonnes
                array(
                    'title' => __('12 colonnes'),
                    'block' => 'div',
                    'wrapper' => true,
                    'classes' => 'mdl-cell mdl-cell--12-col'
                )
            );

            // on remplace les styles existants par les nôtres
            $styles['style_formats'] = json_encode($style_formats);
            return $styles;
        }
    }

    /* ============================================================ */
    /*  display child pages on page parent or page brothers
    /*  www.wpbeginner.com/wp-tutorials/how-to-display-a-list-of-child-pages-for-a-parent-page-in-wordpress/
    /* ============================================================ */
    function list_page_children() {
        global $post;
        $my_wp_query = new WP_Query();
        $all_wp_pages = get_pages( array(
            'sort_order'=> 'DESC',
            'post_type'=>'page',
            'post_status'=>array('publish')
        ));
        // Si le post a un parent
        if ( is_page() && $post->post_parent ) {
            //récupérer les données du post parent
            $parent_page = get_pages( array(
                'post_type'=>'page',
                'include'=>array($post->post_parent),
                'number'=>1
            ));
            // récupérer les données des brother posts
            $children_pages = get_page_children($post->post_parent, $all_wp_pages);
        } else {
            // récupérer les données du post parent
            $parent_page = $post;
            // récupérer les données des children posts
            $children_pages = get_page_children($post->ID, $all_wp_pages);
        }

        if($children_pages){
            if(is_array($parent_page)){
                array_push($children_pages, $parent_page[0]);
            } else {
                array_push($children_pages, $parent_page);
            }
            return $children_pages;
        }
    }

/* ========================================================================================== */
/*  REGISTER PLUGINS
/* ========================================================================================== */

require_once dirname( __FILE__ ) . '/install-plugins.php';

add_action( 'tgmpa_register', 'register_plugins' );

function register_plugins() {
    $plugins = array(
/**
 *		array(
 *			'name'               => The plugin name.
 *          'slug'               => The plugin slug (typically the folder name).
 *          'source'             => The plugin source.
 *          'required'           => If false, the plugin is only 'recommended' instead of required.
 *          'force_activation'   => If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
 *          'force_deactivation' => If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
 *          'external_url'       => If set, overrides default API URL and points to an external URL.
 *      ),
 */


/* ============================== */
/*  Required Plugins
/* ============================== */

        array(
            'name'               => 'Relevanssi',
            'slug'               => 'relevanssi',
            'source'             => 'https://downloads.wordpress.org/plugin/relevanssi.3.5.3.zip',
            'required'           => true,
            'force_activation'   => true,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/relevanssi'
        ),
        array(
            'name'               => 'TinyMCE Advanced',
            'slug'               => 'tinymce-advanced',
            'source'             => 'https://downloads.wordpress.org/plugin/tinymce-advanced.4.3.10.1.zip',
            'required'           => true,
            'force_activation'   => true,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/tinymce-advanced'
        ),
        array(
            'name'               => 'Wordfence Security',
            'slug'               => 'wordfence',
            'source'             => 'https://downloads.wordpress.org/plugin/wordfence.6.1.7.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/wordfence'
        ),

/* ============================== */
/*  Needed Plugins
/* ============================== */

        array(
            'name'               => 'Disable Comments',
            'slug'               => 'disable-comments',
            'source'             => 'https://downloads.wordpress.org/plugin/disable-comments.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/disable-comments'
        ),
        array(
            'name'               => 'WP-Sweep',
            'slug'               => 'wp-sweep',
            'source'             => 'https://downloads.wordpress.org/plugin/wp-sweep.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/wp-sweep'
        ),
        array(
            'name'               => 'Yoast SEO',
            'slug'               => 'wordpress-seo',
            'source'             => 'https://downloads.wordpress.org/plugin/wordpress-seo.3.2.5.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/wordpress-seo'
        ),
        array(
            'name'               => 'The Events Calendar',
            'slug'               => 'the-events-calendar',
            'source'             => 'https://downloads.wordpress.org/plugin/the-events-calendar.4.2.3.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/the-events-calendar/'
        ),
        array(
            'name'               => 'Event Tickets',
            'slug'               => 'event-tickets',
            'source'             => 'https://downloads.wordpress.org/plugin/event-tickets.4.2.3.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/event-tickets/'
        ),


/* ============================== */
/*  Recommended Plugins
/* ============================== */

        array(
            'name'               => 'Akismet',
            'slug'               => 'akismet',
            'source'             => 'https://downloads.wordpress.org/plugin/akismet.3.1.11.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/akismet/'
        ),
        array(
            'name'               => 'BackupBuddy',
            'slug'               => 'backupbuddy',
            'source'             => 'http://ryanaltvater.com/downloads/backupbuddy.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://ithemes.com/purchase/backupbuddy'
        ),
        array(
            'name'               => 'BJ Lazy Load',
            'slug'               => 'bj-lazy-load',
            'source'             => 'https://downloads.wordpress.org/plugin/bj-lazy-load.1.0.6.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/bj-lazy-load'
        ),
        array(
            'name'               => 'Coming Soon Page & Maintenance Mode par SeedProd',
            'slug'               => 'coming-soon',
            'source'             => 'https://downloads.wordpress.org/plugin/coming-soon.5.0.4.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/coming-soon/'
        ),
        array(
            'name'               => 'Formidable',
            'slug'               => 'formidable',
            'source'             => 'https://downloads.wordpress.org/plugin/formidable.2.02.04.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/formidable/'
        ),
        array(
            'name'               => 'Social Warfare',
            'slug'               => 'social-warfare',
            'source'             => 'https://downloads.wordpress.org/plugin/social-warfare.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/social-warfare/'
        ),
        array(
            'name'               => 'W3 Total Cache',
            'slug'               => 'w3-total-cache',
            'source'             => 'https://downloads.wordpress.org/plugin/w3-total-cache.0.9.4.1.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/w3-total-cache/'
        )
    );


/* ============================== */
/*  Configuration Settings
/* ============================== */

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'The following plugin is required: %1$s.', 'The following plugins are required: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'The following plugin is recommended: %1$s.', 'The following plugins are recommended: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}
