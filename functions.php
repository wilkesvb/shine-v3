<?php

add_theme_support( 'post-thumbnails' );


function shine_theme_styles() {  /*wpt is for name spacing, unique so it doesn't conflict with other functions or theme calls*/

	// wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/stylesheets/normalize.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/stylesheets/main.css' );
	// wp_enqueue_style( 'print_css', get_template_directory_uri() . '/stylesheets/print.css' );
	// wp_enqueue_style( 'ie_css', get_template_directory_uri() . '/stylesheets/ie.css' );
}
add_action( 'wp_enqueue_scripts', 'shine_theme_styles' );

function home_page_styles() {  /*wpt is for name spacing, unique so it doesn't conflict with other functions or theme calls*/
	
	$homepage = 'home';

	if ( is_page( $homepage ) ) {
		wp_enqueue_style( 'home_css', get_template_directory_uri() . '/stylesheets/home.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'home_page_styles' );


function shine_theme_js() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mondernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', true );  
	wp_enqueue_script( 'main-ck_js', get_template_directory_uri() . '/js/main-ck.js', '', '', true );  
	wp_enqueue_script( 'plugins-ck_js', get_template_directory_uri() . '/js/plugins-ck.js',  '', '', true );  

}
add_action( 'wp_enqueue_scripts', 'shine_theme_js' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


function add_menu_support() {
    add_theme_support( 'menus' );
}
add_action( 'after_setup_theme', 'add_menu_support' );



function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'footer-menu-1' => __( 'Footer Menu 1' ),
      'footer-menu-2' => __( 'Footer Menu 2' ),
      'footer-menu-3' => __( 'Footer Menu 3' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function shine_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="module-heading">',
		'after_title' => '</h2>'
	));

}

shine_create_widget( 'About Sidebar', 'about', 'Displays on the side of About pages with a sidebar' );
shine_create_widget( 'Capabilities Sidebar', 'capes', 'Displays on the side of Capes pages with a sidebar' );
shine_create_widget( 'Careers Sidebar', 'careers', 'Displays on the side of Careers pages with a sidebar' );
shine_create_widget( 'SeaPort-e Sidebar', 'seaport', 'Displays on the side of SeaPort-e pages with a sidebar' );
shine_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );
shine_create_widget( 'Footer 1', 'footer 1', 'Displays in the footer in order 1,2,3,etc' );
shine_create_widget( 'Footer 2', 'footer 2', 'Displays in the footer in order 1,2,3,etc' );
shine_create_widget( 'Footer 3', 'footer 3', 'Displays in the footer in order 1,2,3,etc' );
shine_create_widget( 'Footer 4', 'footer 4', 'Displays in the footer in order 1,2,3,etc' );
shine_create_widget( 'Feature Summary', 'feature-summary', 'Home Page Feature Boxes in order 1,2,3,etc' );
shine_create_widget( 'Feature Video', 'feature video', 'Home Page Feature video' );
shine_create_widget( 'Contact Sidebar', 'contact', 'Contact Us widget' );




// shine_create_widget( 'Footer 1', 'footer', 'Displays in the footer in order 1,2,3' );
// shine_create_widget( 'Footer 2', 'footer', 'Displays in the footer in order 1,2,3' );
// shine_create_widget( 'Footer 3', 'footer', 'Displays in the footer in order 1,2,3' );
// shine_create_widget( 'Footer 4', 'footer', 'Displays in the footer in order 1,2,3' );
// shine_create_widget( 'Footer 5', 'footer', 'Displays in the footer in order 1,2,3' );



function button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'link' => 'link'
	), $atts );
	return ' <div class="capes-button" ><a href=" ' . esc_attr($a['link']) . ' "> ' . $content . ' </a></div> ';

}
add_shortcode( 'button', 'button_shortcode' );


function emp_portal_styles() {  /*wpt is for name spacing, unique so it doesn't conflict with other functions or theme calls*/
	
	$emppages = array( 'employees', 'membership-login', 'password-reset', 'membership-registration');

	if ( is_page( $emppages ) ) {
		wp_enqueue_style( 'emp-portal_css', get_stylesheet_directory_uri() . '/stylesheets/emp-portal.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'emp_portal_styles' );

// function redirect_unlogged_in_user() {
// 	if ( is_user_logged_in( 'false' ) && is_page( 'employees' ) ) {
// 	wp_redirect('/membership-login/');
// 	exit;
// 	}
// }
// add_action( 'template_redirect', 'redirect_unlogged_in_user' );

function redirect_logged_in_user() {

	$page_redirect = array( 'portal', 'membership-login' );

	if ( is_user_logged_in() && is_page( $page_redirect ) ) {
	wp_redirect('/employees/');

	exit;
	} else if ( is_page( 'portal' ) ) {
		wp_redirect('/membership-login/');
		exit;
	}
}
add_action( 'template_redirect' , 'redirect_logged_in_user' );


function employee_bar() {
	if ( is_user_logged_in() ) {
		get_template_part( 'emp-bar' ); }
	}	
add_action( 'emp_partial' , 'employee_bar' );

?>
