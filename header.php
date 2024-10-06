<!DOCTYPE html>
<html lang="en-IR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        main.wrapper,
        header {
            opacity: 0;
        }

        #menuContainer,
        #screenSaver {
            display: none;
        }

        <?php if (is_singular('projects') or is_page_template('tpls/contact.php') or is_page_template('tpls/services.php')): ?>
        #videoModal {
            display: none;
        }

        <?php endif;
        if (is_archive('projects')): ?>
        #mapProjectsContainer {
            display: none;
        }

        <?php endif; ?>
    </style>
    <link href="<?php ThemeAssets('css/fonts.css'); ?>" rel="stylesheet" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <link href="<?php ThemeAssets('css/loading.css'); ?>" rel="stylesheet" type="text/css">
    <?php if (is_singular('projects') or is_page_template('tpls/about.php')): ?>
        <link href="<?php ThemeAssets('css/swiper-bundle.min.css'); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<?php $logo = get_field('logo', 'option'); ?>
<?php if (is_home()) : ?>
    <div id="loading">
        <div class="loadingCovers">
            <div class="loadingCover"></div>
            <div class="loadingCover"></div>
        </div>
        <div class="loading-container ">
            <div class="loading_line">
                <div class="loading-point_canvas one"></div>
                <div class="loading-point"></div>
                <div class="loading-point_canvas two"></div>
            </div>
            <div class="loading_text">
                <div class="loading_text_canvas one right">
                </div>
                <div class="loading_text_canvas two left">
                    <div class="loading-percentage justLoading">
                        <div class="percentCounter" data-speed="1000">100</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div id="loading" class="second-loading">
        <div class="second-loading-container ss-container">
            <div class="media-overlay"></div>
            <div class="loadingImage">
                <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                     alt="site logo" class="logo-img">
                <img src="<?php ThemeAssets('img/logo-text.webp'); ?>" alt="logo" class="logo-text">
            </div>
        </div>
    </div>
<?php endif; ?>


<body data-pagetype="<?php if (is_front_page()): echo 'home';
elseif (is_archive('projects')): echo 'archiveProject';
elseif (is_singular('projects')): echo 'singleProject';
elseif (is_archive('jobs')): echo 'jobs';
elseif (is_singular('jobs')): echo 'jobs';
elseif (is_page_template('tpls/about.php')): echo 'about';
elseif (is_page_template('tpls/contact.php')): echo 'contact';
elseif (is_home()): echo 'archiveBlog';
elseif (is_singular('post')):
    echo 'singleBlog';
elseif (is_page_template('tpls/services.php')):
    echo 'services';
endif; ?>">
<!-- <div class="startProject mobile"><a href="./contact.html" aria-label="Start a Project?">Start a Project?</a></div> -->
<header>
    <a href="<?php echo site_url('/'); ?>" class="identity">
        <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
             alt="site logo" class="logo-img">
        <img src="<?php ThemeAssets('img/logo-text.webp'); ?>" alt="logo" class="logo-text">
    </a>
    <?php $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'contact.php'
    ));
    $contactID = $pages[0]->ID; ?>
    <!-- <div class="startProject"><a href="<?php echo get_the_permalink($contactID); ?>"
                aria-label="Start a Project?">Start a Project?</a></div> -->
    <div class="menu-icon">
        <div class="quickMenu">
            <nav>
                <ul>
                    <li><a href="<?php echo get_post_type_archive_link('projects'); ?>"
                           aria-label="Projects">Projects</a></li>
                    <?php $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'tpls/services.php'
                    ));
                    $serviceID = $pages[0]->ID;
                    if ($serviceID) { ?>
                        <li><a href="<?php echo get_the_permalink($serviceID); ?>"
                               aria-label="Services"><?php echo get_the_title($serviceID); ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <!--            --><?php //if (have_rows('menu_items')): ?>
        <div class="icon">
            <span class="menu">MENU</span>
            <span class="close">CloSe</span>
        </div>
        <!--            --><?php //endif; ?>
    </div>
</header>
<!--    --><?php //if (have_rows('menu_items')): ?>
<div id="menuContainer" data-lenis-prevent>
    <div id="timeZone"></div>
    <div class="infoSection paddingX">
        <div class="nav">
            <div class="navItems">
                <!--                --><?php //while (have_rows('menu_items')):
                //                    the_row();
                //                    $menu_link = get_sub_field('link');
                //                    $menu_image = get_sub_field('image');
                //                    ?>
                <!--                    <div class="navItem">-->
                <!--                        <a href="--><?php //echo esc_url($menu_link); ?><!--"-->
                <!--                           class="title">--><?php //echo get_the_title($menu_link); ?><!--</a>-->
                <!--                        --><?php //if (have_rows('sub_menu')): ?>
                <!--                            <div class="subMenu">-->
                <!--                                <ul>-->
                <!--                                    --><?php //while (have_rows('sub_menu')):
                //                                        the_row();
                //                                        // $section_title = get_sub_field('title');
                //                                        $section_link = get_sub_field('sub_link');
                //                                        ?>
                <!--                                        <li><a-->
                <!--                                                    href="-->
                <?php //echo esc_url($section_link['link']); ?><!--">-->
                <?php //echo esc_html($section_link['title']); ?><!--</a>-->
                <!--                                        </li>-->
                <!--                                    --><?php //endwhile; ?>
                <!--                                </ul>-->
                <!--                            </div>-->
                <!--                        --><?php //endif; ?>
                <!--                        <div class="media">-->
                <!--                            <img src="--><?php //echo esc_url($menu_image['url']); ?><!--"-->
                <!--                                 alt="--><?php //echo esc_attr($menu_image['alt']); ?><!--">-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                --><?php //endwhile; ?>
            </div>
        </div>
    </div>
    <div class="mediaSection">
        <img src="<?php echo esc_url($menu_image['url']); ?>" alt="<?php echo esc_attr($menu_image['alt']); ?>"
             class="selected">
    </div>
</div>
<!--    --><?php //endif; ?>
<div id="screenSaver">
    <div class="ss-container">
        <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
             alt="site logo" class="logo-img">
        <img src="<?php ThemeAssets('img/logo-text.webp'); ?>" alt="logo" class="logo-text">
    </div>
</div>