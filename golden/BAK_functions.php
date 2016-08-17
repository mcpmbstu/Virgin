<?php

/* Golden functions and definitions */

/*-----------------------------------------------------------------------------------*/
/* Declaring the content width based on the theme's design and stylesheet
/*-----------------------------------------------------------------------------------*/

if ( !isset( $content_width ) )
  $content_width = 960; /* pixels */

/*-----------------------------------------------------------------------------------*/
/* Declaring the theme language domain (for language translations)
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('golden', get_template_directory().'/lang');

/*-----------------------------------------------------------------------------------*/
/* Register & Enqueue JS and CSS
/*-----------------------------------------------------------------------------------*/

function gt_queue_assets() {
	$data = get_option("golden_options");
	
	$body_font = ucwords($data['body_font']['face']);
	$headings_font = ucwords($data['headings_font']['face']);
	$logo_font = ucwords($data['logo_font']['face']);
  	
  	if ( !is_admin() ) {
  	
  	wp_enqueue_script('jquery');
  	
  // Register Scripts (Places all jQuery dependant scripts into Footer)
  	wp_register_script('modernizr', get_template_directory_uri() .'/assets/js/modernizr-2.6.2.min.js');
  	wp_register_script('google-maps', 'http://maps.google.com/maps/api/js?sensor=true');
  	wp_register_script('gmaps', get_template_directory_uri() .'/assets/js/gmaps.min.js', 'jquery', '0.2', true);
  	wp_register_script('jquery-easing', get_template_directory_uri() .'/assets/js/jquery.easing.min.js', 'jquery', '1.3', true);
  	wp_register_script('fancybox', get_template_directory_uri() .'/assets/js/jquery.fancybox.min.js', 'jquery', '2.0', true);
  	wp_register_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.js', 'jquery', '1.0', true);
  	wp_register_script('flexslider', get_template_directory_uri() .'/assets/js/jquery.flexslider.min.js', 'jquery', '2.1', true);
  	wp_register_script('jquery-form', get_template_directory_uri() .'/assets/js/jquery.form.min.js', 'jquery', '3.1', true);
  	wp_register_script('jquery-validate', get_template_directory_uri() .'/assets/js/jquery.validate.min.js', 'jquery', '1.9', true);
  	wp_register_script('isotope', get_template_directory_uri() .'/assets/js/jquery.isotope.min.js', 'jquery', '1.5', true);
  	wp_register_script('quote-rotator', get_template_directory_uri() .'/assets/js/jquery.quote.rotator.min.js', 'jquery', '1.0', true);
  	wp_register_script('respond', get_template_directory_uri() .'/assets/js/respond.min.js');
  	wp_register_script('selectnav', get_template_directory_uri() .'/assets/js/selectnav.min.js');
  	wp_register_script('custom-js-settings', get_template_directory_uri() .'/assets/js/custom.js', 'jquery', '1.0', true);
  	
  // Register Styles
  	wp_register_style('flexslider', get_template_directory_uri().'/assets/css/flexslider.css');
  	wp_register_style('fancybox', get_template_directory_uri().'/assets/css/fancybox.css');
  	wp_register_style("body-font", "http://fonts.googleapis.com/css?family={$body_font}");
  	wp_register_style("headings-font", "http://fonts.googleapis.com/css?family={$headings_font}");
  	wp_register_style("logo-font", "http://fonts.googleapis.com/css?family={$logo_font}");
	
  // Enqueue Scripts (Global)
  	wp_enqueue_script('modernizr');
  	wp_enqueue_script('google-maps');
  	wp_enqueue_script('gmaps');
  	wp_enqueue_script('jquery-easing');
  	wp_enqueue_script('fancybox');
  	wp_enqueue_script('fitvids');
  	wp_enqueue_script('flexslider');
  	wp_enqueue_script('jquery-form');
  	wp_enqueue_script('jquery-validate');
  	wp_enqueue_script('isotope');
  	wp_enqueue_script('quote-rotator');
  	wp_enqueue_script('respond');
  	wp_enqueue_script('selectnav');
	wp_enqueue_script('custom-js-settings');
	
  // Enqueue Styles (Global)
  	wp_enqueue_style("flexslider");
  	wp_enqueue_style("fancybox");
	wp_enqueue_style("body-font");
	wp_enqueue_style("headings-font");
	wp_enqueue_style("logo-font");	

	} 
}
add_action("wp_enqueue_scripts", "gt_queue_assets");

// Load Admin assets 
function gt_admin_scripts() {
	wp_register_script('gt-admin-js', get_template_directory_uri() . '/assets/js/jquery.custom.admin.js');
    wp_enqueue_script('gt-admin-js');
    wp_register_style('gt-admin-css', get_template_directory_uri() . '/assets/css/custom-admin.css');
    wp_enqueue_style('gt-admin-css');
}
add_action('admin_enqueue_scripts', 'gt_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/* Register Custom Menu
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_nav_menus') ) :
	register_nav_menus( array(
		  'Header' => __('Header Navigation Menu', 'golden')
		) );
endif;

/*-----------------------------------------------------------------------------------*/
/* Add support, and configure Thumbnails (for WordPress 2.9+)
/*-----------------------------------------------------------------------------------*/

if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
set_post_thumbnail_size(200, 200, true); // Normal post thumbnails
add_image_size('large', 632, 290, true); // Large thumbnails
add_image_size('small', 125, '', true); // Small thumbnails
add_image_size('latest-thumb', 420, 320, true); // Latest Work Thumbnail (appears on Homepage, and Portfolio Index)
add_image_size('recent-news-thumb', 254, 254, true); // Recent News Thumbnail (appears on the Homepage)
add_image_size('team-member-thumb', 254, 254, true); // Team Member Thumbnail (appears on Homepage, and Team pages)
add_image_size('portfolio-thumb', 454, 454, true); // Portfolio Thumbnail (appears on Portfolio Index)
add_image_size('index-post', 940, 523, true); // News Thumbnail (appears on Blog Index, Archives etc...)
add_image_size('single-post', 940, 523, true); // Large Post Thumbnail (appears on Single Post page)
add_image_size('feature-image', 940, 523, true); // Large Portfolio Thumbnail (appears on Single Portfolio page)
add_image_size('large-slider-thumb', 2000, 728, true); // Large Slider Thumbnail (appears on the homepage)
add_image_size('page-feature-image', 2000, 464, true); // Page Feature Image (appears at the top of all inner pages)
}

/*-----------------------------------------------------------------------------------*/
/* Register Sidebars/Widget Areas
/*-----------------------------------------------------------------------------------*/

function gt_widgets_init() {
  
  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<header><h4 class="widget-title">',
    'after_title' => '</h4></header>',
  ));
  
  register_sidebar( array(
    'name' => 'Blog Sidebar',
    'id' => 'sidebar-blog',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<header><h4 class="widget-title">',
    'after_title' => '</h4></header>',
  ));

  register_sidebar( array(
    'name' => 'Footer Sidebar #1',
    'id'   => 'footer-sidebar-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ));
  
  register_sidebar( array(
    'name' => 'Footer Sidebar #2',
    'id'   => 'footer-sidebar-2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ));
  
  register_sidebar( array(
    'name' => 'Footer Sidebar #3',
    'id'   => 'footer-sidebar-3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ));

}

add_action( 'init', 'gt_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/* Add support for Post Formats
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-formats', array( 'aside', 'gallery', 'link', 'quote', 'video', 'audio'));

/*-----------------------------------------------------------------------------------*/
/* Register Automatic Feed Links
/*-----------------------------------------------------------------------------------*/

add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/* Register Custom Widgets
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/functions/widgets/widget-twitter.php');
require_once(get_template_directory() . '/functions/widgets/widget-flickr.php');

/*-----------------------------------------------------------------------------------*/
/* Call Custom Post Types
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/functions/custom-post-types/portfolio-type.php');
require_once(get_template_directory() . '/functions/custom-post-types/services-type.php');
require_once(get_template_directory() . '/functions/custom-post-types/slider-type.php');
require_once(get_template_directory() . '/functions/custom-post-types/team-type.php');
require_once(get_template_directory() . '/functions/custom-post-types/quotes-type.php');

/*-----------------------------------------------------------------------------------*/
/* Setup custom Metaboxes
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/functions/theme-portfoliometa.php');
require_once(get_template_directory() . '/functions/theme-servicesmeta.php');
require_once(get_template_directory() . '/functions/theme-slidermeta.php');
require_once(get_template_directory() . '/functions/theme-teammeta.php');
require_once(get_template_directory() . '/functions/theme-quotesmeta.php');

/*-----------------------------------------------------------------------------------*/
/* Shortcodes
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/functions/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Custom Theme Functions
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/functions/theme-functions.php');

/*-----------------------------------------------------------------------------------*/
/* Slightly Modified Options Framework (SMOF)
/*-----------------------------------------------------------------------------------*/

require_once(get_template_directory() . '/admin/index.php');