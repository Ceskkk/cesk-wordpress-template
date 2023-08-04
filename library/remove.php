<?php

/* Remove margin top */
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

/* Remove acf upgrade message */
add_filter('site_transient_update_plugins', 'my_remove_update_nag');
function my_remove_update_nag($value) {
 unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
 return $value;
}

/* Remove Guttenberg */
add_filter('use_block_editor_for_post', '__return_false');

/* Remove Comments */
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/* Clean Wordpress header */
function header_cleanup() {
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from scripts
  function remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;
  }
	// remove WP version from css
	add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
}
add_action('init', 'head_cleanup');

/* Other usefull cleans and removes */
// remove WP version from RSS
function rss_version() { return ''; }
add_filter('the_generator', 'rss_version');
// remove injected CSS for recent comments widget
function remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
add_filter('wp_head', 'remove_wp_widget_recent_comments_style', 1);
// remove injected CSS from recent comments widget
function remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
add_action('wp_head', 'remove_recent_comments_style', 1);
// remove injected CSS from gallery
function gallery_style($css) {
return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
add_filter('gallery_style', 'gallery_style');

?>