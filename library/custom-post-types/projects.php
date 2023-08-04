<?php

// Register new custom type and add order field
function register_projects() {
	register_post_type( 'projects',
		array( 'labels' => 
            array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'all_items' => 'All projects',
                'add_new' => 'New',
                'add_new_item' => 'New project',
                'edit' => 'Edit',
                'edit_item' => 'Edit project',
                'new_item' => 'New project',
                'view_item' => 'View project',
                'search_items' => 'Search projects',
                'parent_item_colon' => '',
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor' ,'revisions', 'page-attributes', 'thumbnail'),
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'projects')
		)
	);
}
add_action( 'init', 'register_projects');

?>