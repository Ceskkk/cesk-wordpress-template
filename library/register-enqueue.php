<?php

// Register and enqueue styles and scripts
function bones_scripts_and_styles() {
  global $wp_styles; 
  if (!is_admin()) {
        wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/build/css/frontend.min.css', array(), '', 'all' );
        wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/build/js/app.min.js', array( 'jquery' ), '', true );
        wp_enqueue_style( 'stylesheet' );
        wp_enqueue_script( 'main-js' );
    }
}
add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);

?>
