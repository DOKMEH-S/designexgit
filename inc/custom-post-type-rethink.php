<?php
///////////////////////////////////////////////
//------- Custom Post type rethink -----------//
///////////////////////////////////////////////
function dokmeh_custom_post_type_rethink()
{
    $labels = array(
        'name'              => 'Rethink',
        'singular_name'     => 'Rethink',
        'menu_name'         => 'Rethink',
        'name_admin_bar'    => 'Rethink',
        'add_new'           => 'Add Rethink',
        'add_new_item'      => 'Add Rethink Item',
        'new_item'          => 'New Rethink',
        'edit_item'         => 'Edit Rethink',
        'view_item'         => 'View Rethink',
        'all_items'         => 'All Rethink',
        'search_items'      => 'Search Rethink',
        'parent_item_colon' => 'Rethink parent',
        'not_found'         => 'No Rethink found',
        'not_found_in_trash'=> 'No Rethink are in the trash'
    );
    $args = array(
        'labels'            => $labels,
        'description'       => 'Description.',
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'taxonomies'        => array('rethink-types'),
        'query_var'         => true,
        'rewrite'           => array('slug' => 'rethink'),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-schedule',
        'hierarchical'      => true,
        'menu_position'     => null,
        'supports'          => array('title','editor','thumbnail')

    );
    register_post_type('rethink', $args);

}
add_action('init','dokmeh_custom_post_type_rethink');






