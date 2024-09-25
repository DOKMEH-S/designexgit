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


//// Adding a metabox field for selecting categories
//function dokmeh_projects_category_metabox() {
//    add_meta_box(
//        'dokmeh_projects_category',
//        'Project Categories',
//        'dokmeh_projects_category_callback',
//        'projects',
//        'side', // Location of the field on the post edit screen
//        'default'
//    );
//}
//add_action('add_meta_boxes', 'dokmeh_projects_category_metabox');

// ################################################################ //
// ###### - Callback function to display the metabox field - ###### //
// ################################################################ //
//function dokmeh_projects_category_callback($post) {
//    // Get all categories
//    $categories = get_terms(array(
//        'taxonomy' => 'project_type',
//        'hide_empty' => false,
//    ));
//
//    // Get selected categories for this post
//    $selected_categories = wp_get_post_terms($post->ID, 'project_type', array('fields' => 'ids'));
//
//    // Display category selection form
//    echo '<div class="categorydiv">';
//    echo '<div class="tabs-panel">';
//    echo '<ul id="categorychecklist" class="list:category categorychecklist form-no-clear">';
//    foreach ($categories as $category) {
//        $checked = in_array($category->term_id, $selected_categories) ? ' checked="checked"' : '';
//        echo '<li id="category-'.$category->term_id.'" class="popular-category"><label class="selectit"><input value="'.$category->term_id.'" type="checkbox" name="post_category[]" id="in-category-'.$category->term_id.'"'.$checked.'> '.$category->name.'</label></li>';
//    }
//    echo '</ul>';
//    echo '</div>';
//    echo '</div>';
//}
//
//// Save selected categories for each post
//function dokmeh_save_projects_category_meta($post_id) {
//    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
//    if (!current_user_can('edit_post', $post_id)) return;
//
//    if (isset($_POST['post_category'])) {
//        wp_set_post_terms($post_id, $_POST['post_category'], 'project_type');
//    }
//}
//add_action('save_post', 'dokmeh_save_projects_category_meta');




