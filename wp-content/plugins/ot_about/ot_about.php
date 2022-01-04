<?php
/*
	Plugin Name: OT About
	Plugin URI: http://oceanthemes.net/
	Description: Declares a plugin that will create a custom post type displaying about.
	Version: 1.0
	Author: OceanThemes
	Author URI: http://oceanthemes.net/
	Text Domain: ot_about
	Domain Path: /lang
	License: GPLv2 or later
*/

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_about_update() {
	load_plugin_textdomain('ot_about', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_about_update');

function ot_abouts_type() {
	$aboutuslabels = array (	

		'name' => __('Abouts','ot_about'),

		'singular_name' => __('About','ot_about'),

		'add_new' => __('Add About','ot_about'),

		'add_new_item' => __('Add new About','ot_about'),

		'edit_item' => __('Edit About','ot_about'),

		'new_item' => __('Add new about','ot_about'),

		'all_items' => __('All Abouts','ot_about'),

		'view_item' => __('View About','ot_about'),

		'search_item' => __('Search About','ot_about'),

		'not_found' => __('No abouts found..','ot_about'),

		'not_found_in_trash' => __('No about found in Trash.','ot_about'),

		'menu_name' => 'Abouts'
	);

	$args = array(
		'labels' => $aboutuslabels,
		'hierarchical' => false,
		'description' => 'Manages About',
		'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => null,
		'menu_icon' => 'dashicons-businessman',		
		'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => __( 'aboutus' , 'ot_about' ) ),
        'capability_type' => 'post',
		'supports' => array( 'title','editor','thumbnail','excerpt','comments','custom-fields'),
	);
	register_post_type ('aboutus',$args);
}
add_action ('init','ot_abouts_type');

function ot_about_taxonomy () {
	$taxonomylabels = array(
		'name' => __('Category About','ot_about'),
		'singular_name' => __('Category About','ot_about'),
		'search_items' => __('Search Category About','ot_about'),
		'all_items' => __('All Category About','ot_about'),
		'edit_item' => __('Edit Category About','ot_about'),
		'add_new_item' => __('Add new Category About','ot_about'),
		'menu_name' => __('Category About','ot_about'),
	);

	$args = array(
		'labels' => $taxonomylabels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'category_about', 'ot_about' ) ),
	);
	
	register_taxonomy('category_about','aboutus',$args);
}
add_action ('init','ot_about_taxonomy',0);

// Add to admin_init function
add_filter('manage_edit-about_columns', 'add_new_about_columns');
function add_new_about_columns($process_columns) { 
	$new_columns['cb'] = '<input type="checkbox" />'; 
    $new_columns['title'] = _x('Title', 'ot_about');
    $new_columns['author'] = _x('Author', 'ot_about');
    $new_columns['category_about'] = _x('Category', 'ot_about');
    $new_columns['date'] = _x('Date', 'ot_about');

    return $new_columns;
}

// Add to admin_init function
add_action('manage_about_posts_custom_column', 'manage_about_columns', 10, 2);
function manage_about_columns($column, $post_id) {
    global $post;
    switch ($column) {
        case 'category_about':
            $terms = get_the_terms($post_id, 'category_about');
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] = sprintf('<a href="%s&post_type=aboutus">%s</a>', esc_url(add_query_arg(array(
                        'post_type' => $post->post_type,
                        'category_about' => $term->slug
                    ), 'edit.php')), esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'category_about', 'display')));
                }
                echo join(', ', $out);
            } else {
                _e('No About Category', 'ot_about');
            }
            break;   
        default:
            break;
    } // end switch
}   
?>