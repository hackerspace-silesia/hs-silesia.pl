<?php
/**
 * Hackerspace Silesia functions and definitions
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
 * @subpackage Hackerspace_Silesia
 * @since Hackerspace Silesia 1.0
 */

if ( ! function_exists( 'hs_silesia' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Hackerspace Silesia 1.0
 */
function hs_silesia() {


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

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary' => 'Primary Menu',
    'social'  => 'Social Links Menu',
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
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
  ) );

}
endif; // hs_silesia
add_action( 'after_setup_theme', 'hs_silesia' );

// function setupCss() {



// }
// add_action('wp_enqueue_style', 'setupCss');

// function setupScripts() {
  // wp_enqueue_scripts('jquery');
  // wp_enqueue_scripts( 'magic-loader', );

// }
// add_action('wp_enqueue_scripts', 'setupScripts');

function scriptsLoader() {
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/bower_components/font-awesome/css/font-awesome.css');
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.css');
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.min.css');

    wp_register_script( 'jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.js');
    wp_enqueue_script( 'jquery' );
    wp_register_script('magic-loader', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'));
    wp_enqueue_script('magic-loader');
}

add_action('wp_enqueue_scripts', 'scriptsLoader');


// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
// DO WE NEED IT?!
// ME NOT KNOW
// ME WORDPRESS
// ME POTATO
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
// /**
//  * Register widget area.
//  *
//  * @since Hackerspace Silesia 1.0
//  *
//  * @link https://codex.wordpress.org/Function_Reference/register_sidebar
//  */
// function twentyfifteen_widgets_init() {
//   register_sidebar( array(
//     'name'          => __( 'Widget Area', 'twentyfifteen' ),
//     'id'            => 'sidebar-1',
//     'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
//     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//     'after_widget'  => '</aside>',
//     'before_title'  => '<h2 class="widget-title">',
//     'after_title'   => '</h2>',
//   ) );
// }
// add_action( 'widgets_init', 'twentyfifteen_widgets_init' );
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
// DO WE NEED IT?!
// ME NOT KNOW
// ME WORDPRESS
// ME POTATO
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

/**
 * Enqueue scripts and styles.
 *
 * @since Hackerspace Silesia 1.0
 */
// function twentyfifteen_scripts() {
  // Add custom fonts, used in the main stylesheet.
  // wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

  // Add Genericons, used in the main stylesheet.
  // wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

  // Load our main stylesheet.
  // wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

  // Load the Internet Explorer specific stylesheet.
  // wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
  // wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

  // Load the Internet Explorer 7 specific stylesheet.
  // wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
  // wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

  // wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

//   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//     wp_enqueue_script( 'comment-reply' );
//   }

//   if ( is_singular() && wp_attachment_is_image() ) {
//     wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
//   }

//   wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20141212', true );
//   wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
//     'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
//     'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
//   ) );
// }
// add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

// /**
//  * Add featured image as background image to post navigation elements.
//  *
//  * @since Hackerspace Silesia 1.0
//  *
//  * @see wp_add_inline_style()
//  */
// function twentyfifteen_post_nav_background() {
//   if ( ! is_single() ) {
//     return;
//   }

//   $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
//   $next     = get_adjacent_post( false, '', false );
//   $css      = '';

//   if ( is_attachment() && 'attachment' == $previous->post_type ) {
//     return;
//   }

//   if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
//     $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
//     $css .= '
//       .post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
//       .post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
//       .post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
//     ';
//   }

//   if ( $next && has_post_thumbnail( $next->ID ) ) {
//     $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
//     $css .= '
//       .post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
//       .post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
//       .post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
//     ';
//   }

//   wp_add_inline_style( 'twentyfifteen-style', $css );
// }
// add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

// /**
//  * Display descriptions in main navigation.
//  *
//  * @since Hackerspace Silesia 1.0
//  *
//  * @param string  $item_output The menu item output.
//  * @param WP_Post $item        Menu item object.
//  * @param int     $depth       Depth of the menu.
//  * @param array   $args        wp_nav_menu() arguments.
//  * @return string Menu item with possible description.
//  */
// function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
//   if ( 'primary' == $args->theme_location && $item->description ) {
//     $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
//   }

//   return $item_output;
// }
// add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

// /**
//  * Add a `screen-reader-text` class to the search form's submit button.
//  *
//  * @since Hackerspace Silesia 1.0
//  *
//  * @param string $html Search form HTML.
//  * @return string Modified search form HTML.
//  */
// function twentyfifteen_search_form_modify( $html ) {
//   return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
// }
// add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );


