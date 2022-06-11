<?php
/**
 * Hotelflix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hotelflix
 */

if ( ! function_exists( 'hotelflix_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hotelflix_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'hotelflix' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hotelflix', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'hotelflix' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hotelflix_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 90,
				'width'       => 200,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'hotelflix_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotelflix_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hotelflix_content_width', 640 );
}
add_action( 'after_setup_theme', 'hotelflix_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotelflix_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hotelflix' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hotelflix' ),
		'before_widget' => '<div id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title side_title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget area', 'hotelflix' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Enable this area in the customizer, then add widgets here.', 'hotelflix' ),
		'before_widget' => '<div id="%1$s" class="widget col-sm-6 col-md-12 col-lg-3 col-xl-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title side_title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hotelflix_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hotelflix_scripts() {
	wp_enqueue_style( 'hotelflix-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'hotelflix-styles', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
	wp_enqueue_style( 'hotelflix-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Teko:wght@300;400;500;600;700&display=swap' );
	wp_enqueue_script( 'hotelflix-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootsrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'hotelflix-scripts-js', get_template_directory_uri() . '/js/script.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hotelflix_scripts' );

function hotelflix_register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'hotelflix_register_navwalker' );

// Custom comment walker.
require get_template_directory() . '/inc/class-walker-comment.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Breadcbrumbs
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-typography.php';

/**
 * Custom widgets.
 */
require get_template_directory() . '/inc/popular-posts-widget.php';
require get_template_directory() . '/inc/recent-comments-widget.php';
