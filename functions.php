<?php
function Dokmeh_theme_setup()
{
    if (!defined('_S_VERSION')) {
        define('_S_VERSION', '1.0.3');
    }
    $menus = array(
        'main-menu' => 'Main Menu',
//        'footer-menu' => 'Footer Menu',
    );
    register_nav_menus($menus);
    load_theme_textdomain('dokmeh', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    //--Remove Admin Bar--//
    show_admin_bar(false);
}

add_action('after_setup_theme', 'Dokmeh_theme_setup');

/////////////////////////////////////////////////
define('ThemeURI', get_template_directory() . '/');
define('ThemeURL', get_template_directory_uri() . '/');
define('ThemeAssets', ThemeURL . 'assets/');

function ThemeAssets($url)
{
    echo ThemeAssets . $url;
}

///////////////////////////////////////////////
//----------- ACF INIT GOOGLE MAP -----------//
///////////////////////////////////////////////
function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyCGSjuazfR5jJ4HLuqJ2DmyGkZR766ayRI');
}

add_action('acf/init', 'my_acf_init');
///////////////////////////////////////////////
//------------ Scripts & Styles -------------//
///////////////////////////////////////////////

function Dokmeh_scripts()
{
// Enqueue header and footer styles along with the default stylesheet
    wp_enqueue_style('designex-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css', array(), _S_VERSION);
    // Check if it's the front page

    if (is_front_page()) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/home.min.css', array(), _S_VERSION);
    } // Check if it's the about page
    elseif (is_page_template('tpls/about.php')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/about.css', array(), _S_VERSION);
    } // Check if it's the rethink archive page
    elseif (is_post_type_archive('rethink') or is_singular('rethink')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/news.min.css', array(), _S_VERSION);
    } // Check if it's the projects archive page or a single project page
    elseif (is_post_type_archive('projects')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/archive-project.css', array(), _S_VERSION);
        wp_enqueue_style('page2-style', get_template_directory_uri() . '/assets/css/projectHeader.css', array(), _S_VERSION);
    } // Check if it's a single project page
    elseif (is_singular('projects')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/single-project.css', array(), _S_VERSION);
    } // Check if it's the contact page
    elseif (is_page_template('tpls/contact.php')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/contact.min.css', array(), _S_VERSION);
    } // Check if it's the news page or a single post page
    elseif (is_home() or is_singular('post')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/news.min.css', array(), _S_VERSION);
    } elseif (is_404()) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/notFound.min.css?v=1.0.0', array(), _S_VERSION);
    }

     if (is_post_type_archive('projects')) :
         wp_enqueue_script('frontend-ajax', get_template_directory_uri() . '/assets/js/frontend-ajax.js', array(), '1.0.0', true);
         wp_localize_script('frontend-ajax', 'frontend_ajax_object',
             array(
                 'ajaxurl' => admin_url('admin-ajax.php'),
             )
         );
    // elseif (is_post_type_archive('rethink') OR is_home()):
    //     wp_enqueue_script('autoLoad-ajax', get_template_directory_uri() . '/assets/js/autoLoad-ajax.js', array(), '1.0.2', true);
    //     wp_localize_script('autoLoad-ajax', 'autoLoad_object',
    //         array(
    //             'ajaxurl' => admin_url('admin-ajax.php'),
    //         )
    //     );
     endif;
// // --- remove contact form 7 files from pages doesn't have form ----------
//     if( is_front_page() OR is_page_template('tpls/contact.php') ) {
//         wp_enqueue_script('contact-form-7');
//         wp_enqueue_style('contact-form-7');
//     }else{
//         wp_dequeue_script( 'contact-form-7' );
//         wp_dequeue_style( 'contact-form-7' );
//     }
//     //-------------------------------------------------------------------

}

add_action('wp_enqueue_scripts', 'Dokmeh_scripts');

// ###### -- INC - Custom post types -- ###### //
include get_template_directory() . '/inc/custom-post-type-projects.php';
include get_template_directory() . '/inc/custom-taxonomy-projects-types.php';
// Defer loading of stylesheets
function dokmeh_style_filter($html, $handle)
{
    if (strcmp($handle, 'designex-style') == 0 or strcmp($handle, 'base-style') == 0 or strcmp($handle, 'page-style') == 0 or strcmp($handle, 'page2-style') == 0) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\" ", $html);
    }
    return $html;
}

add_filter('style_loader_tag', 'dokmeh_style_filter', 10, 2);

add_filter('script_loader_tag', function ($tag, $handle) {
    if ('frontend-ajax' !== $handle) {
        return $tag;
    }
    return str_replace(' src', ' defer src', $tag); // defer the script
}, 10, 2);
//dd_filter('script_loader_tag', function ($tag, $handle) {
//    if ('autoLoad-ajax' !== $handle) {
//        return $tag;
//    }
//    return str_replace(' src', ' defer src', $tag); // defer the script
//}, 10, 2);


///////////////////////////////////////////////
//-------------- THEME SETTING --------------//
///////////////////////////////////////////////
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Dokmeh Setting',
        'menu_title' => 'Dokmeh Setting',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'dashicons-images-dokmeh',
        'position' => 3
    ));
}
///////////////////////////////////////////////
//-------------- SVG Support ----------------//
///////////////////////////////////////////////
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

//------ project filter -----------
function project_filter_handler()
{
    $catIDs = $_POST['ch_id'];
    $offset = intval($_POST['offset']);
    if ($catIDs) {
        $args = array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => 8,
            'tax_query' => array(
                array(
                    'taxonomy' => 'project_type',
                    'field' => 'term_id',
                    'terms' => ($catIDs),
                    'operator' => 'AND',
                ),
            ),
            'offset' => $offset
        );
    } else {
        $args = array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => 8,
            'offset' => $offset
        );
    }

    $Projectquery = new WP_Query($args);
    $outputHTML = '';
    $count = 0;
    if ($Projectquery->have_posts()) : $count = $Projectquery->found_posts;
        $i= ($count > $offset) ?  0 : 5;
        while ($Projectquery->have_posts()) :$Projectquery->the_post();
            $i++;
            $projectID = get_the_ID();
            $title = get_the_title();
            $outputHTML .= '<div class="projectItem hover-box"';
            if ($i==4) {
                $outputHTML .= ' id ="infinity-loading"';
            }
            $outputHTML .= '>';
            $outputHTML .= '<div class="image"><img src="'.get_the_post_thumbnail_url($projectID,'medium').'" alt="'.$title.'"></div>';
            $outputHTML .= '<a href="'.get_the_permalink().'" aria-label="project-01" class="info hover-info">';
            $outputHTML .= '<spna class="name">'.$title.'</spna>';
            $year = wp_get_object_terms($projectID, 'project_type', array('parent' => 5));
            $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 93));
                  if ($year OR $loc):
                      $outputHTML .= '<span class="dateLoc">'.($year ? $year[0]->name : '') . ($loc ? (' - ' . $loc[0]->name) : '').'</span>';
                                 endif;
            $outputHTML .= '</a></div>';
        endwhile;
        wp_reset_postdata();
    else:
        $outputHTML = '<div class="no-result"><p>' . __('Sorry, No resault found!', 'dokmeh') . '</p></div>';
    endif;
    $results = array();
    $results ['count'] = $count;
    $results ['cat'] = $catIDs;
    $results ['content'] = $outputHTML;
    wp_die(json_encode($results));
}

add_action('wp_ajax_project_filter', 'project_filter_handler');
add_action('wp_ajax_nopriv_project_filter', 'project_filter_handler');


