<?php
/**
 * Dan vs Wild functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dan_vs_Wild
 */

if ( ! function_exists( 'dvw_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dvw_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dan vs Wild, use a find and replace
	 * to change 'dvw' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dvw', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Add WP BEM menu_title
	require_once(dirname(__FILE__) . '/include/wp_bem_menu.php');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'dvw' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dvw_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dvw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dvw_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dvw_content_width', 640 );
}
add_action( 'after_setup_theme', 'dvw_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dvw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dvw' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dvw' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dvw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dvw_scripts() {
	wp_enqueue_style( 'dvw-style', get_stylesheet_uri() );

	wp_enqueue_style ('dvw-css', get_template_directory_uri() . '/css/main.min.css');

	wp_enqueue_script( 'dvw-js', get_stylesheet_directory_uri() . '/js/bundle.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'dvw_scripts' );


// Set up Options panel
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'dvw-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Featured Projects',
		'menu_title'	=> 'Featured Projects',
		'menu_slug' 	=> 'dvw-options',
		'capability'	=> 'edit_posts',
		'parent_slug' => 'edit.php?post_type=portfolio',
		'redirect'		=> false
	));

}

?>
