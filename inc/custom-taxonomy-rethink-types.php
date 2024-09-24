<?php
///////////////////////////////////////////////
//----- Register Taxonomy for rethink ------//
///////////////////////////////////////////////

function dokmeh_create_taxonomies_rethink()
{
    // Add new taxonomy, make it hierarchical (like categories)

    $labels = array(
        'name'              => 'Rethink',
        'singular_name'     => 'Rethink',
        'search_items'      => 'search rethink type',
        'all_items'         => 'all Rethink types',
        'parent_item'       => 'Rethink type parent',
        'parent_item_colon' => 'Rethink type parent',
        'edit_item'         => 'edit Rethink type',
        'update_item'       => 'update Rethink type',
        'add_new_item'      => 'add Rethink type',
        'new_item_name'     => 'new Rethink type',
        'menu_name'         => 'Rethink type',
    );

    $args = array(
        'hierarchical'      => true,
        'label'             => 'Rethink types',
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'rethink-types','with_front'=>true,'hierarchical' => true ),
    );

    register_taxonomy('rethink-types', 'rethink', $args);

}
// hook into the init action and call create_taxonomies when it fires

add_action( 'init', 'dokmeh_create_taxonomies_rethink', 0 );
