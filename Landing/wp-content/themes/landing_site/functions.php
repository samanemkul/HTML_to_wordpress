<?php
/**
 * Landing_site functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Landing_site
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function landing_site_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Landing_site, use a find and replace
		* to change 'landing_site' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'landing_site', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'landing_site' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'landing_site_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'landing_site_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landing_site_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'landing_site_content_width', 640 );
}
add_action( 'after_setup_theme', 'landing_site_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landing_site_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'landing_site' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'landing_site' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'landing_site_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function landing_site_scripts() {
	wp_enqueue_style( 'landing_site-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'landing_site-style', 'rtl', 'replace' );

	wp_enqueue_script( 'landing_site-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'landing_site_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function footer_widget_init(){
	register_sidebar(
		array(
			'name'=>__('Footer description','landing_site'),
			'id'=>'footer-1',
			'description'=>__('Widgets added here will appear in the footer','landing_site'),
			'before_widget'=>'<div class="footer-widget description-widget">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4 class="footer-widget-title">',
			'after_title'=>'</h4>',

		)
		);
		register_sidebar(array(
			'name'=>__('categories menu','landing_site'),
			'id'=>'footer-2',
			'description'=>__('widgets for categories menu','landing_site'),
			'before_widget'=>'<div class="footer-widget category-widget">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4 class=footer-widget-title>',
			'after_title'=>'</h4>',


		));
		register_sidebar(array(
			'name'=>__('link menu','landing_site'),
			'id'=>'footer-3',
			'description'=>__('widgets for the menu is here','landing_site'),
			'before_widget'=>'<div class="footer-widget menu-widget">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4 class="footer-widget-title">',
			'after_title'=>'</h4>',


		));
}
add_action('widgets_init','footer_widget_init');
function enqueue_masonry_script() {
    wp_enqueue_script('masonry');
}
add_action('wp_enqueue_scripts', 'enqueue_masonry_script');

function save_comment_form_cf7($form_tag){
	if($form_tag->id == "91353c8"){
		$submission=WPCF7_Submission::get_instance();
		if($submission){
			$data=$submission->get_posted_data();
			$name=sanitize_text_field($data['cName']);
			$email=sanitize_email($data['cEmail']);
			$message=sanitize_textarea_field($data['cMessage']);

			$commentdata = array(
				'comment_post_ID' => get_the_ID(),
				'comment_author' => $name,
				'comment_author_email' => $email,
				'comment_message' => $message,
			);
			wp_insert_comment($commentdata);
		}

	}
}
add_action('wpcf_7_before_send_mail','save_comment_form_cf7');
function enqueue_slider_scripts() {
    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

    // Custom Slider Script
    wp_enqueue_script('custom-slider', get_template_directory_uri() . '/js/slider.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slider_scripts');
function enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');


function enqueue_custom_search_scripts() {
    // Enqueue custom search script
    wp_enqueue_script(
        'custom-search',
        get_template_directory_uri() . '/js/search.js',
        array('jquery'),
        null,
        true
    );

    // Enqueue Scroll Lock library
    wp_enqueue_script(
        'scroll-lock',
        'https://cdn.jsdelivr.net/npm/body-scroll-lock/lib/bodyScrollLock.min.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_search_scripts');
