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
    wp_enqueue_style('base-style', get_template_directory_uri() . '/assets/css/base.min.css', array(), _S_VERSION);
    wp_enqueue_style('dorr-style', get_stylesheet_uri(), array(), _S_VERSION);

    // Check if it's the front page

    if (is_front_page()) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/home.min.css', array(), _S_VERSION);
    } // Check if it's the about page
    elseif (is_page_template('tpls/about.php')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/about.min.css', array(), _S_VERSION);
    } // Check if it's the rethink archive page
    elseif (is_post_type_archive('rethink') or is_singular('rethink')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/news.min.css', array(), _S_VERSION);
    } // Check if it's the projects archive page or a single project page
    elseif (is_post_type_archive('projects')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/project.min.css', array(), _S_VERSION);
    } // Check if it's a single project page
    elseif (is_singular('projects')) {
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/project.min.css', array(), _S_VERSION);
        wp_enqueue_style('page2-style', get_template_directory_uri() . '/assets/css/single-project.min.css?v=1.0.0', array(), _S_VERSION);
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
        wp_enqueue_script('frontend-ajax', get_template_directory_uri() . '/assets/js/frontend-ajax.js', array(), '1.1.3', true);
        wp_localize_script('frontend-ajax', 'frontend_ajax_object',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    elseif (is_post_type_archive('rethink') OR is_home()):
        wp_enqueue_script('autoLoad-ajax', get_template_directory_uri() . '/assets/js/autoLoad-ajax.js', array(), '1.0.2', true);
        wp_localize_script('autoLoad-ajax', 'autoLoad_object',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    endif;
// --- remove contact form 7 files from pages doesn't have form ----------
    if( is_front_page() OR is_page_template('tpls/contact.php') ) {
        wp_enqueue_script('contact-form-7');
        wp_enqueue_style('contact-form-7');
    }else{
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }
    //-------------------------------------------------------------------

}

add_action('wp_enqueue_scripts', 'Dokmeh_scripts');

// Defer loading of stylesheets
function dokmeh_style_filter($html, $handle)
{
    if (strcmp($handle, 'dorr-style') == 0 or strcmp($handle, 'base-style') == 0 or strcmp($handle, 'page-style') == 0 or strcmp($handle, 'page2-style') == 0) {
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

// Infinite loading of the rethink page -------------
function load_rethink_handler()
{
    $offset = $_POST['page'];
    $per_page = 6;
    $args = array(
        'post_type' => 'rethink',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'offset' => $offset,
    );

    $query = new WP_Query($args);
    $outputHTML = '';

    if ($query->have_posts()) {
        $count = $query->found_posts;
        $i = 1;
        while ($query->have_posts()) {
            $query->the_post();
            $ID = get_the_ID();
            $outputHTML .= '<div class="grid-item"';
            if ($i == $per_page) {
                $outputHTML .= 'id ="last-load-more" count="' . ($offset + $per_page) . '"';

            }
            $outputHTML .= '>';
            $outputHTML .= '<a href="' . get_the_permalink() . '" class="rethink-wrap">';
            $outputHTML .= '<div class="rethink-media">';
            $outputHTML .= '<img src="' . get_the_post_thumbnail_url($ID, 'medium') . '" alt="">';
            $outputHTML .= '</div>';
            $outputHTML .= '<div class="rethink-info">';
            $outputHTML .= ' <h2 class="name">' . get_the_title() . '</h2>';
            $terms = get_the_terms($ID, 'rethink-types');
            if ($terms):
                $outputHTML .= '<span class="type">' . $terms[0]->name . '</span>';
            endif;
            $outputHTML .= '</div></a></div>';
            $i++;
        }
    }

    $results = array();
    if ($count > $offset + $per_page) {
        $results ['show'] = true;
    }
    $results ['count'] = $count;
//    $results ['cat'] = $catIDs;
//    $results ['hide'] = $hide;
    $results ['content'] = $outputHTML;
    wp_die(json_encode($results));
}

add_action('wp_ajax_load_more_rethink', 'load_rethink_handler');
add_action('wp_ajax_nopriv_load_more_rethink', 'load_rethink_handler');

// Infinite loading of the news page -------------
function load_more_posts()
{
    $offset = $_POST['page'];
    $per_page = 3;
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'offset' => $offset,
    );

    $query = new WP_Query($args);
    $outputHTML = '';
    $count = 0;
    if ($query->have_posts()) {
        $count = $query->found_posts;
        $i = 1;
        while ($query->have_posts()) {
            $query->the_post();
            $outputHTML .= '<a href="' . get_the_permalink() . '" class="newsWrap" ';
            if ($i == $per_page) {
                $outputHTML .= 'id ="last-more-news" count="' . ($offset + $per_page) . '"';
            }
            $outputHTML .= '>';
            $outputHTML .= '<div class="news-media">';
            $outputHTML .= '<img data-src="' . get_the_post_thumbnail(get_the_ID(), 'large') . '" alt="" class="lazyload blur-up">';
            $outputHTML .= '</div>';
            $outputHTML .= '<div class="news-info">';
            $outputHTML .= '<span class="date">' . get_the_date() . '</span>';
            $outputHTML .= '<p class="news-name">' . get_the_title() . '</p>';
            $outputHTML .= ' </div></a>';
            $i++;
        }
    }

    $results = array();
    if ($count > $offset + $per_page) {
        $results ['show'] = true;
    }
    $results ['count'] = $count;
//    $results ['cat'] = $catIDs;
    $results ['content'] = $outputHTML;
    wp_die(json_encode($results));
}

//add_action('wp_ajax_load_more_post', 'load_more_posts');
//add_action('wp_ajax_nopriv_load_more_post', 'load_more_posts');


///////////// Post filter   /////////////////////
function post_filter_Handler()
{
    $str = $_POST['str'];
    $offset = intval($_POST['page']);
    $order = intval($_POST['order']);
    $orderType = $order != 2 ? 'DESC' : 'ASC';
    $per_page = 6;
    if ($str != ''):
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $per_page,
            'post_status' => 'publish',
            's' => $str,
            'offset' => $offset
        );
//        $type = 'str';
    else:
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $per_page,
            'post_status' => 'publish',
            'offset' => $offset
        );
//        $type = 'general';
    endif;
    if ($order == 1) {
        $args1 = array(
            'meta_key' => 'blog_view_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        );
    } else {
        $args1 = array(
            'order' => $orderType,
        );
    }
    $args2 = wp_parse_args($args1, $args);

    $BlogQuery = new WP_Query($args2);
    $count = 0;
    $outputHTML = '';
    $i = 1;
    if ($BlogQuery->have_posts()):$count = $BlogQuery->found_posts;
        while ($BlogQuery->have_posts()):
            $BlogQuery->the_post();
            $outputHTML .= '<a href="' . get_the_permalink() . '" class="newsWrap" ';
            if ($i == $per_page) {
                $outputHTML .= 'id ="last-more-news" count="' . ($offset + $per_page) . '"';
            }
            $outputHTML .= '>';
            $outputHTML .= '<div class="news-media">';
            $outputHTML .= '<img data-src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '" alt="" class="lazyload blur-up">';
            $outputHTML .= '</div>';
            $outputHTML .= '<div class="news-info">';
            $outputHTML .= '<span class="date">' . get_the_date() . '</span>';
            $outputHTML .= '<p class="news-name">' . get_the_title() . '</p>';
            $outputHTML .= ' </div></a>';
            $i++;
        endwhile;
        wp_reset_postdata();
    else:
        $outputHTML = '<p class ="no-result">' . __('Sorry, No resault found!', 'dokmeh') . '</p>';
    endif;

    $results = array();
    $results ['count'] = $count;
    $results ['$str'] = $str;
    $results ['content'] = $outputHTML;
    wp_die(json_encode($results));
}

add_action('wp_ajax_post_filter', 'post_filter_Handler');
add_action('wp_ajax_nopriv_post_filter', 'post_filter_Handler');

//-- project filter -----------
function project_filter_handler()
{
    $catIDs = $_POST['cats'];
    $orderType = $_POST['orderType'];
    if ($catIDs) {
        $args = array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => $orderType,
            'orderby' => 'date',
            'tax_query' => array(
                array(
                    'taxonomy' => 'project_type',
                    'field' => 'term_id',
                    'terms' => ($catIDs),
                ),
            ),
        );
    } else {
        $args = array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => $orderType,
            'orderby' => 'date',
        );
    }


    $Projectquery = new WP_Query($args);
    $outputHTML = '';
    $count = 0;
    if ($Projectquery->have_posts()) : $count = $Projectquery->found_posts;
        $outputHTML = '<div class="grid-sizer"></div>';
        $outputHTML .= ' <div class="gutter-sizer"></div>';
        $outputHTML .= ' <div class="grid-item viewListTitle">';
        $outputHTML .= '<span id="sortProjects" class="hover-target">' . __('Project', 'dokmeh') . '</span>';
        $outputHTML .= '<span id="sortServices" class="hover-target">' . __('services', 'dokmeh') . '</span>';
        $outputHTML .= '<span id="sortYear" class="hover-target" type="' . $orderType . '">' . __('year', 'dokmeh') . '</span>';
        $outputHTML .= '<span id="sortLocation" class="hover-target">' . __('location', 'dokmeh') . '</span>';
        $outputHTML .= '</div>';
        while ($Projectquery->have_posts()) :$Projectquery->the_post();

            $projectID = get_the_ID();
            $outputHTML .= '<div class="grid-item filter-item">';
            $outputHTML .= '<a href="' . get_the_permalink() . '" class="projectBox">';
            $outputHTML .= '<div class="hover-reveal">';
            $outputHTML .= '<img class="hidden-img" src="' . get_the_post_thumbnail_url('large') . '" alt="">';
            $outputHTML .= '</div><div class="projectBox-img">';
            $outputHTML .= get_the_post_thumbnail($projectID, 'large');
            $outputHTML .= '</div><div class="projectBox-info">';
            $year = wp_get_object_terms($projectID, 'project_type', array('parent' => 5));
            if ($year):
                $outputHTML .= '<span class="date">' . $year[0]->name . '</span>';
            endif;
            $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 3));
            if ($loc):
                $outputHTML .= '<span class="slash">/ </span>';
                $outputHTML .= '<span class="location">' . $loc[0]->name . '</span>';
            endif;
            $outputHTML .= '<p class="name">' . get_the_title() . '</p>';
            $type = wp_get_object_terms($projectID, 'project_type', array('parent' => 2));
            if ($type):
                $outputHTML .= '<p class="category">' . $type[0]->name . '</p>';
            endif;
            $outputHTML .= '</div></a></div>';

        endwhile;
        wp_reset_postdata();
    else:
        $outputHTML = '<p>' . __('Sorry, No resault found!', 'dokmeh') . '</p>';
    endif;
    $results = array();
    $results ['count'] = $count;
    $results ['cat'] = $catIDs;
    $results ['type'] = $orderType;
    $results ['content'] = $outputHTML;
    wp_die(json_encode($results));
}

add_action('wp_ajax_project_filter', 'project_filter_handler');
add_action('wp_ajax_nopriv_project_filter', 'project_filter_handler');

// ###### -- INC - Custom post types -- ###### //
include get_template_directory() . '/inc/custom-post-type-projects.php';
include get_template_directory() . '/inc/custom-post-type-rethink.php';
include get_template_directory() . '/inc/custom-taxonomy-rethink-types.php';
include get_template_directory() . '/inc/custom-taxonomy-projects-types.php';
// post view --------
function set_post_view()
{
    $key = 'blog_view_count';
    $post_id = get_the_ID();
    $count = (int)get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

//Contact form 7
// remove p tag container
add_filter('wpcf7_autop_or_not', '__return_false');

//// Remove unnecessary image size
function remove_default_image_sizes($sizes)
{
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    unset($sizes['medium_large']);
    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

//Disable emojis in WordPress
add_action('init', 'smartwp_disable_emojis');

function smartwp_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
//    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' ); //classic editor
}

if (!is_single() AND (is_page_template('page.php')))  : //remove except singles (post-projects-rethink) and sample page
//Remove Gutenberg Block Library CSS from loading on the frontend
    function smartwp_remove_wp_block_library_css()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
        wp_dequeue_style('classic-theme-styles'); /** Remove classic inline style */
        wp_dequeue_style('global-styles'); /** Remove global inline styles */
    }

    add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);
endif;

//// --- remove wordpress inline style----
//add_action('wp_enqueue_scripts', function () {
////    wp_dequeue_style('classic-theme-styles'); /** Remove classic inline style */
////    wp_dequeue_style('global-styles'); /** Remove global inline styles */
//
////    wp_dequeue_style( 'wp-block-library' );
////    wp_dequeue_style( 'wp-block-library-theme' );
//    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
//}, 100);
// Remove wpml style -------------------
function prefix_disable_wpml_block_styles()
{
    if (class_exists('WPML\BlockEditor\Loader')) {
        wp_deregister_style(WPML\BlockEditor\Loader::SCRIPT_NAME);
    }
}

add_action('wp_enqueue_scripts', 'prefix_disable_wpml_block_styles', 11);

//add_filter('json_enabled', '__return_false');
//add_filter('json_jsonp_enabled', '__return_false');

function stop_heartbeat() {
wp_deregister_script('heartbeat');
}
add_action( 'init', 'stop_heartbeat', 1 );

