<!DOCTYPE html>
<html lang="en-IR">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        main,
        header,
        footer {
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
    <?php if (is_singular('projects') or is_page_template('tpls/about.php') or is_front_page()): ?>
        <link href="<?php ThemeAssets('css/swiper-bundle.min.css'); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<?php $logo = get_field('logo', 'option'); ?>
<?php if (is_front_page()): ?>
    <div id="loading">
        <div id="lottie"></div>
        <div class="loadingCovers">
            <div class="loadingCover"></div>
            <div class="loadingCover"></div>
        </div>
    </div>
<?php else: ?>
    <div id="loading" class="second-loading">
        <div class="second-loading-container ss-container">
            <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                alt="site logo" class="logo-img">
            <img src="<?php ThemeAssets('img/logo-text.webp'); ?>" alt="logo" class="logo-text">
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
elseif (is_404()):
    echo 'notFound';
endif; ?>">
    <?php if (!is_404()): ?>
        <?php $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpls/contact.php'
        ));
        $contactID = $pages[0]->ID;
        if($contactID):?>
        <div class="startProject mobile"><a href="<?php the_permalink($contactID);?>" aria-label="Start a Project?">Start a Project?</a></div>
        <?php endif;?>
        <header>
            <a href="<?php echo site_url('/'); ?>" class="identity">
                <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                    alt="site logo" class="logo-img">
                <img src="<?php ThemeAssets('img/logo-text.webp'); ?>" alt="logo" class="logo-text">
            </a>
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
                <?php if (have_rows('menu_items', 'option')): ?>
                    <div class="icon">
                        <span class="menu">MENU</span>
                        <span class="close">CloSe</span>
                    </div>
                <?php endif; ?>
            </div>
        </header>
        <?php if (have_rows('menu_items', 'option')): ?>
            <div id="menuContainer" data-lenis-prevent>
                <div class="menu-list">
                    <?php $counter = 1;
                    while (have_rows('menu_items', 'option')):
                        the_row();
                        $menu_link = get_sub_field('link');
                        $menu_image = get_sub_field('image');
                        ?>
                        <a href="<?php echo esc_url($menu_link['url']); ?>" class="menu-link">
                            <small class="text-h5"><?php echo $counter++; ?></small>
                            <span class="item-title"><?php echo esc_html($menu_link['title']); ?></span>
                            <img class="image_rev" src="<?php echo esc_url($menu_image['sizes']['medium']); ?>"
                                alt="<?php echo esc_attr($menu_image['alt']); ?>">
                        </a>
                    <?php endwhile; ?>
                </div>
                <div class="subMenuContainer">
                    <?php while (have_rows('menu_items', 'option')):
                        the_row(); ?>
                        <?php if (have_rows('sub_menu')): ?>
                            <div class="subMenu">
                                <ul>
                                    <?php while (have_rows('sub_menu')):
                                        the_row();
                                        $section_link = get_sub_field('sub_link');
                                        ?>
                                        <li><a
                                                href="<?php echo $section_link['url']; ?>"><?php echo esc_html($section_link['title']); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>

                <div class="extraLinks">
                    <div class="extraLinks-contact">
                        <div class="extraLink-item">
                            <span>Monthly Newsletter</span>
                            <a href="">Subscribe here</a>
                        </div>
                        <?php $pages = get_pages(array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'tpls/contact.php'
                        ));
                        $contactID = $pages[0]->ID; ?>
                        <?php
                        $whatsapp = get_field('whatsapp', $contactID);
                        if ($whatsapp): ?>
                            <div class="extraLink-item">
                                <span>Do You Have a Project?</span>
                                <a aria-label="Designex Whatsapp"
                                    href="<?php echo $whatsapp; ?>"><?php echo get_field('whatsapp_text', $contactID); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="extraLink-item coordination">
                        <div><span id="timeZone"></span> [UAE]</div>
                        <span>N 25° 11' 31.726''</span>
                        <span>N 25° 11' 31.726''</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div id="screenSaver" style="display:none;">
        <div class="ss-container">
            <img src="<?php ThemeAssets('img/dx-white-logo.svg'); ?>" alt="logo" class="Designex Logo">
        </div>
        <?php $screen_saver_text = get_field('screen_saver_text','option');
        if($screen_saver_text):?>
        <p class="slogan-text"><?php echo $screen_saver_text;?></p>
        <?php endif;?>
    </div>