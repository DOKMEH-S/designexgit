<?php
///////////////////////////////////////////////
//------- Custom Post type projects -----------//
///////////////////////////////////////////////
function dokmeh_custom_post_type_projects()
{
    $labels = array(
        'name'              => 'jobs',
        'singular_name'     => 'job',
        'menu_name'         => 'jobs',
        'name_admin_bar'    => 'job',
        'add_new'           => 'Add job',
        'add_new_item'      => 'Add job Item',
        'new_item'          => 'New job',
        'edit_item'         => 'Edit job',
        'view_item'         => 'View job',
        'all_items'         => 'All jobs',
        'search_items'      => 'Search jobs',
        'parent_item_colon' => 'job parent',
        'not_found'         => 'No job found',
        'not_found_in_trash'=> 'No jobs are in the trash'
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
        'taxonomies'        => false,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'jobs'),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-groups',
        'hierarchical'      => true,
        'menu_position'     => null,
        'supports'          => array('title','editor','thumbnail','excerpt',)

    );
    register_post_type('jobs', $args);


}
add_action('init','dokmeh_custom_post_type_projects');





