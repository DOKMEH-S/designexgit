<?php
///////////////////////////////////////////////
//------- Custom Post type projects -----------//
///////////////////////////////////////////////
function dokmeh_custom_post_type_projects()
{
    $labels = array(
        'name'              => 'Projects',
        'singular_name'     => 'Project',
        'menu_name'         => 'Projects',
        'name_admin_bar'    => 'Project',
        'add_new'           => 'Add Project',
        'add_new_item'      => 'Add Project Item',
        'new_item'          => 'New Project',
        'edit_item'         => 'Edit Project',
        'view_item'         => 'View Project',
        'all_items'         => 'All Projects',
        'search_items'      => 'Search Projects',
        'parent_item_colon' => 'Project parent',
        'not_found'         => 'No project found',
        'not_found_in_trash'=> 'No projects are in the trash'
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
        'taxonomies'        => array('project_type'),
        'query_var'         => true,
        'rewrite'           => array('slug' => 'projects'),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-table-col-after',
        'hierarchical'      => true,
        'menu_position'     => null,
        'supports'          => array('title','editor','thumbnail','excerpt',)

    );
    register_post_type('projects', $args);


}
add_action('init','dokmeh_custom_post_type_projects');





