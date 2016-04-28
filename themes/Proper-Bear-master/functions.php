<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */


// Theme Setup

function properbear_setup() {
	load_theme_textdomain( 'properbear', get_template_directory() . '/languages' );

	// Register a menu location
	register_nav_menu( 'primary', __( 'Navigation Menu', 'properbear' ) );

	// Enable support fot featured-images
	//add_theme_support( 'post-thumbnails' );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array('comment-list','search-form','comment-form','gallery',) );
}
add_action( 'after_setup_theme', 'properbear_setup' );

// Scripts & Styles
// By default ONLY the theme CSS is loaded
// Uncomment as required
function properbear_scripts_styles() {

	// Third party scripts:
	// a single minified scripts file based on bower_components (bower.json)
	wp_enqueue_script( 'proper-bear-thirdparty', get_template_directory_uri() . '/_/js/thirdparty.min.js' );

	// Third party styles:
	// a single minified CSS stylesheet compiled from included bower_components (bower.json)
	// wp_enqueue_style( 'proper-bear-thirdparty-styles', get_template_directory_uri() . '/_/css/thirdparty.min.css' );	

	// Theme scripts
	// This is the compiled JS file compiled and minified from the contents of _/js/src
	wp_enqueue_script('theme-functions', get_stylesheet_directory_uri() . '/_/js/themefunctions.min.js');

	// Load Stylesheet
	wp_enqueue_style( 'proper-bear-styles', get_stylesheet_uri() );

	// Load Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

}
add_action( 'wp_enqueue_scripts', 'properbear_scripts_styles' );

// Include all PHP files in the inc folder

foreach (glob( get_template_directory() . '/_/inc/php/*.php') as $filename)
{
    require_once $filename;
}

//Clean up the <head>
function removeHeadLinks() {
   	remove_action('wp_head', 'rsd_link');
   	remove_action('wp_head', 'wlwmanifest_link');
   	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
   	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
   }
add_action('init', 'removeHeadLinks');

// Posted On
function posted_on() {
	printf( __( 'Posted <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_author() )
	);
}

// Add custom load and save points for Advanced Custom Fields

add_filter('acf/settings/save_json', 'properbear_acf_save_point');
 
function properbear_acf_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/_/acf-json';
    
    // return
    return $path;
    
}

add_filter('acf/settings/load_json', 'properbear_json_load_point');

function properbear_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/_/acf-json';
    
    // return
    return $paths;
    
}