<?php
///////////////////////////////////////////////
//----- Register Taxonomy for Projects ------//
///////////////////////////////////////////////

function dokmeh_create_taxonomies_projects()
{
    // Add new taxonomy, make it hierarchical (like categories)

    $labels = array(
        'name'              => 'Project',
        'singular_name'     => 'Project',
        'search_items'      => 'search Project type',
        'all_items'         => 'all Project types',
        'parent_item'       => 'Project type parent',
        'parent_item_colon' => 'Project type parent',
        'edit_item'         => 'edit Project type',
        'update_item'       => 'update Project type',
        'add_new_item'      => 'add Project type',
        'new_item_name'     => 'new Project type',
        'menu_name'         => 'Project type',
    );

    $args = array(
        'hierarchical'      => true,
        'label'             => 'Project types',
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project_type','with_front'=>true,'hierarchical' => true ),
    );

    register_taxonomy('project_type', 'projects', $args);

}
// hook into the init action and call create_taxonomies when it fires

add_action( 'init', 'dokmeh_create_taxonomies_projects', 0 );
