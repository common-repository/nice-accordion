<?php 
// Order Column Value
function accor_custom_column($columns)

{
	unset( $columns['date'] );
   $columns['id'] = __('Accordion Shortcode','nice_accor');
   	$columns['date'] = __('Date','nice_accor');;


   return $columns;
}

add_filter('manage_nice_accordion_posts_columns', 'accor_custom_column');



// Add Shortcode in posts Column
function accor_custom_column_data($column, $post_id)

{

global $post;

$post_id = $post -> ID;	

?>
<input type="text" name="shortc_value" style="width:180px;" value='[nice_accor id="<?php echo $post_id ?>"]'>

<?php

}

add_action('manage_nice_accordion_posts_custom_column', 'accor_custom_column_data', 10, 2);


// Function Register
function register_nice_accor_post_type() {

	$labels = array(
		'name'               => 'Nice Accordion',
		'singular_name'      => 'Nice Accordion',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Accordion',
		'edit_item'          => 'Edit Accordion',
		'new_item'           => 'New Accordion',
		'all_items'          => 'All Accordion',
		'view_item'          => 'View Accordion',
		'search_items'       => 'Search Accordion',
		'not_found'          =>  'No Accordion found',
		'not_found_in_trash' => 'No Accordion found in Trash',
		'menu_name'          => 'Nice Accordion',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nice_accordion' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-list-view',
		'supports'           => array( 'title')
	);

	register_post_type( 'nice_accordion', $args );

}
add_action( 'init', 'register_nice_accor_post_type' );


// Remove Row
function nice_accor_remove_row_actions( $actions )
{
    if( get_post_type() === 'nice_accordion' )
        unset( $actions['view'] );
    return $actions;
}
add_filter( 'post_row_actions', 'nice_accor_remove_row_actions', 10, 1 );