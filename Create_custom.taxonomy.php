<?php

/*=====================
Location: function.php - Create custom taxonomy | term
=======================*/

//Create a custom taxonomies
function mytheme_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Fields',
		'singular_name' => 'Field',
		'search_items' => 'Search Fields',
		'all_items' => 'All Fields',
		'parent_item' => 'Parent Field',
		'parent_item_colon' => 'Parent Field',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Field',
		'add_new_item' => 'Add New Field',
		'new_item_name' => 'New Field Name',
		'menu_name' => 'Fields'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'field')
	);
	register_taxonomy('field', array('portfolio'), $args);

	//add new taxonomy NOT hierarchical
	register_taxonomy('software', 'portfolio', array(
		'label' => 'Software',
		'rewrite' => array('slug' => 'software'),
		'hierarchical' => false,
	));

}
add_action('init', 'mytheme_custom_taxonomies');
?>