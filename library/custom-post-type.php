<?php

// Flush rewrite rules for custom post types
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Register post types
// require_once('custom-post-types/projects.php');

?>
