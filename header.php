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

        <?php if (is_singular('projects') or is_page_template('tpls/contact.php') or is_page_template('tpls/services.php')): ?>
            #videoModal,
            #menuContainer {
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
    <link href="<?php ThemeAssets('css/loading.css');?>" rel="stylesheet" type="text/css">
    <?php if (is_singular('projects') or is_page_template('tpls/about.php')): ?>
        <link href="<?php ThemeAssets('css/swiper-bundle.min.css'); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<div id="loading" class="loading-wrapper">
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


<body data-pagetype="<?php if (is_front_page()): echo 'home'; elseif (is_archive('projects')): echo 'archiveProject'; elseif (is_singular('projects')): echo 'singleProject'; elseif (is_archive('jobs')): echo 'jobs'; elseif (is_singular('jobs')): echo 'jobs'; elseif (is_page_template('tpls/about.php')): echo 'about'; elseif (is_page_template('tpls/contact.php')): echo 'contact'; elseif (is_home()): echo 'archiveBlog'; elseif (is_singular('post')):
    echo 'singleBlog';
elseif (is_page_template('tpls/services.php')):
    echo 'services';
endif; ?>">
    <div class="startProject mobile"><a href="./contact.html" aria-label="Start a Project?">Start a Project?</a></div>
    <header>
        <?php $logo = get_field('logo', 'option'); ?>
        <a href="<?php echo site_url('/'); ?>" class="identity">
            <img src="<?php echo $logo ? $logo['sizes']['thumbnail'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                alt="site logo">
        </a>
        <?php $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'contact.php'
        ));
        $contactID = $pages[0]->ID; ?>
        <div class="startProject"><a href="<?php echo get_the_permalink($contactID); ?>"
                aria-label="Start a Project?">Start a Project?</a></div>
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
            <div class="icon">
                <span class="menu">MENU</span>
                <span class="close">CloSe</span>
            </div>
        </div>
    </header>
    <!-- <div id="menuContainer" data-lenis-prevent>
        <div class="infoSection paddingX">
            <div class="nav">
                <div class="navItems">
                    <div class="navItem selected">
                        <a href="./about.html" class="title">About us</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#">Vision</a></li>
                                <li><a href="/#">Why us</a></li>
                                <li><a href="/#">statement</a></li>
                                <li><a href="/#">mission/vision</a></li>
                                <li><a href="/#">founders</a></li>
                                <li><a href="/#">team</a></li>
                                <li><a href="/#">awards</a></li>
                                <li><a href="/#">the future</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-item-01.webp" alt=""></div>
                    </div>
                    <div class="navItem">
                        <a href="<?php ?>" class="title">Projects</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#">Architecture Design</a></li>
                                <li><a href="/#">Landscape Design</a></li>
                                <li><a href="/#">Interior Design</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-1.webp" alt=""></div>
                    </div>
                    <div class="navItem">
                        <a href="./services.html" class="title">Services</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#">Architectural design</a></li>
                                <li><a href="/#">Construction Management</a></li>
                                <li><a href="/#">Interior Design</a></li>
                                <li><a href="/#">Sustainability solution</a></li>
                                <li><a href="/#">Urban Planning & environmental Studies</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-2.webp" alt=""></div>
                    </div>
                    <div class="navItem">
                        <a href="./archive-blog.html" class="title">Blog/media</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#"> Architectural design</a></li>
                                <li><a href="/#">the Blog title 01</a></li>
                                <li><a href="/#">the Blog title 02</a></li>
                                <li><a href="/#">the Blog title 03</a></li>
                                <li><a href="/#">the Blog title 04</a></li>
                                <li><a href="/#">the Blog title 05</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-3.webp" alt=""></div>
                    </div>
                    <div class="navItem">
                        <a href="./archive-jobs.html" class="title">Careers</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#">Project Manager</a></li>
                                <li><a href="/#">Design Architect</a></li>
                                <li><a href="/#">technical Architect</a></li>
                                <li><a href="/#">Interior Designer</a></li>
                                <li><a href="/#">Sustainability Consultant</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-4.webp" alt=""></div>
                    </div>
                    <div class="navItem">
                        <a href="./contact.html" class="title">Contact us</a>
                        <div class="subMenu">
                            <ul>
                                <li><a href="/#">Do You have a project</a></li>
                            </ul>
                        </div>
                        <div class="media"><img src="./assets/img/sample/menu-5.webp" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="extraLinks">
                <div class="extraLinks-contact">
                    <div class="extraLink-item">
                        <span>Monthly Newsletter</span>
                        <a href="">
                            Subscribe here
                        </a>
                    </div>
                    <div class="extraLink-item">
                        <span>Do You Have a Project?</span>
                        <a href="">
                            WhatsApp
                        </a>
                    </div>
                </div>
                <div class="extraLink-item coordination">
                    <div><span id="timeZone"></span> [UAE]</div>
                    <span>N 25° 11' 31.726''</span>
                    <span>N 25° 11' 31.726''</span>
                </div>
            </div>
        </div>
        <div class="mediaSection"><img src="./assets/img/sample/menu-item-01.webp" alt="" class="selected"></div>
    </div> -->