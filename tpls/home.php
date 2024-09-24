<?php //Template Name: Home tpl
get_header(); ?>
<div id="intro" data-lenis-prevent>
        <?php $ImageLogo = get_field('logo', 'option'); ?>
        <div class="bg"><img data-src="<?php ThemeAssets('img/sample/intro-bg.webp'); ?>" alt="intro-background" class="lazyload blur-up"></div>
        <a href="<?php echo home_url('/'); ?>" class="logo">
            <img data-src="<?php echo $ImageLogo ? $ImageLogo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="site-logo" class="lazyload blur-up">
        </a>
        <span class="text"><?php echo get_field('intro_title'); ?></span>
        <div class="arrow-container hover-target">
            <span><?php echo get_field('intro_btn'); ?></span>
        </div>
    </div>
<?php if (have_rows('service')): ?>
    <div id="modal" data-lenis-prevent>
        <img data-src="<?php ThemeAssets('img/modal-close.svg'); ?>" alt="close-modal" class="close hover-target lazyload blur-up">
        <p class="title"><?php _e('Apply','dokmeh');?></p>
        <div class="form">
                <?php $wpml_current_lang = ICL_LANGUAGE_CODE;
                $form = ($wpml_current_lang == 'en') ? '[contact-form-7 id="1852991" title="Service Form"]' : '[contact-form-7 id="4670dc6" title="Service Form Ru"]';
                echo apply_shortcodes($form); ?>
        </div>
    </div>
<?php endif; ?>
<main class="wrapper homeWrapper" id="section1">
    <section class="heroSection">
        <canvas id="gol"></canvas>
        <div class="heroSectionInfo paddingX">
            <h1>
               <span> <?php echo get_field('before_btn'); ?></span><span><?php echo get_field('before_btn1'); ?>
                    <div class="toggleSwitch hover-target buttonSwitch" id="section1Btn">
                        <input id='checkbox' type='checkbox'>
                        <label for='checkbox'>
                            <div class='s'>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                                <div class='d'></div>
                            </div>
                        </label>
                    </div>
               <?php echo get_field('after_btn'); ?></span> <br><span><?php echo get_field('after_btn1'); ?></span>
            </h1>
            <?php $link = get_field('link');
            if($link):
                $title = $link['title'];?>
            <a href="<?php echo $link['url']; ?>" class="btn"><span><?php echo $title ? $title : __('view','dokmeh'); ?></span></a>
            <?php endif;?>
        </div>
        <div id="root">
            <img data-src="<?php ThemeAssets('img/root.svg');?>" alt="multi-dimensional" class="lazyload blur-up">
        </div>

        <script defer type="module" src="https://unpkg.com/@splinetool/viewer@1.1.9/build/spline-viewer.js"></script>
        <spline-viewer url="https://prod.spline.design/DuUGMFTSu7-ovT5l/scene.splinecode"></spline-viewer>
        <div id="scroll">
            <div class="line"></div>
            <span><?php _e('Discover','dokmeh');?></span>
        </div>
    </section>
    <?php
    if (have_rows('selective_projects')):
        ?>
        <section class="projectsWrapper selectedProjects">
            <div class="headLine paddingX">
                <h2 class="title">/ <?php echo get_field('project_title');?></h2>
            </div>
            <div class="selectedProjectsSwitch">
                <span><?php _e('imagination','dokmeh');?></span>
                <div class="toggleSwitch hover-target">
                    <input id='checkboxTwo' type='checkbox'>
                    <label for='checkboxTwo'>
                        <div class='s'>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                            <div class='d'></div>
                        </div>
                    </label>
                </div>
                <span><?php _e('reality','dokmeh');?></span>
            </div>
            <div class="projectsWrapper paddingX">
                <?php
                $project_counter = 1;
                $video_counter = 1;

                while (have_rows('selective_projects')) : the_row();
                    $projectID = get_sub_field('project');
                    $Image = get_sub_field('image');?>
                    <a href="<?php echo get_the_permalink($projectID); ?>" class="projectWrap">
                        <div class="projectMediaWrap">
                            <div class="media-overlay js-ink-trigger">
                               <!-- <?php
/*                                $video_id = 'video-BO' . sprintf($video_counter);
                                $video_counter++;
                                */?>
                                <video id="<?php /*echo $video_id; */?>" muted playsinline preload="auto">
                                    <source src="<?php /*ThemeAssets('video/Shutterstock-Video-32134438.mp4'); */?>" type="video/mp4">
                                    <source src="<?php /*ThemeAssets('video/Shutterstock-Video-32134438.webm'); */?>" type="video/webm">
                                </video>-->
                            </div>
                            <div class="imagination-media">
                                <?php if ($Image) { ?>
                                    <img data-src="<?php echo esc_url($Image['url']); ?>" alt="<?php echo esc_attr($Image['alt']); ?>" class="lazyload blur-up">
                                <?php } else { ?>
                                    <?php echo get_the_post_thumbnail($projectID, 'large'); ?>
                                <?php } ?>
                            </div>
                            <?php $gallery_images = get_field('gallery', $projectID);
                            if ($gallery_images): ?>
                                <div class="realityMedia">
                                    <div class="imagBoxes">
                                        <?php foreach ($gallery_images as $image): ?>
                                            <img data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>" class="lazyload blur-up">
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="project-info">
                            <span><?php echo sprintf('%02d', $project_counter); ?></span>
                            <h3><?php echo get_the_title($projectID); ?></h3>
                            <?php
                            $type = wp_get_object_terms($projectID, 'project_type', array('parent' => 2));
                            if ($type) : ?>
                                <span class="category"><?php echo $type[0]->name; ?></span>
                            <?php endif; ?>
                            <?php
                            $type = wp_get_object_terms($projectID, 'project_type', array('parent' => 3));
                            if ($type) : ?>
                                <span class="area"><?php echo $type[0]->name; ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <?php
                    $project_counter++;
                endwhile;
                ?>
            </div>
            <a href="<?php echo get_post_type_archive_link('projects'); ?>" class="view-all">
                <img data-src="<?php ThemeAssets('img/right-arrow-white.svg'); ?>" alt="see all projects" class="lazyload blur-up">
                <span><?php _e('see all projects','dokmeh');?></span>
            </a>
        </section>
    <?php endif; ?>
    <section class="aboutContainer">
        <h2><?php echo get_field('about_title');?></h2>
        <div class="aboutMediaWrapper">
            <?php
            $image1 = get_field('img_1');
            $image2 = get_field('img_2');
            $image3 = get_field('img_3');
            ?>
            <div class="img-box">
                <img data-src="<?php echo esc_url($image1['url']);?>" alt="" class="lazyload blur-up">

            </div>
            <div class="img-box">
                <img data-src="<?php echo esc_url($image2['url']);?>" alt="" class="lazyload blur-up">

            </div>
            <div class="img-box">
                <img data-src="<?php echo esc_url($image3['url']);?>" alt="" class="lazyload blur-up">

            </div>
        </div>
        <div class="aboutInfoWrapper paddingX">
            <div class="aboutWrap">
                <p><?php echo get_field('about_des');?></p>
            </div>
        </div>
    </section>
    <?php if(have_rows('service')):?>
        <section class="services-container">
            <div class="headLine paddingX">
                <h2 class="title">/ <?php echo get_field('service_name');?></h2>
                <p class="des"><?php echo get_field('service_des');?></p>
            </div>
            <div class="wrap">
                <?php $i = 1;
                while(have_rows('service')):the_row();?>
                    <?php $img = get_sub_field('ser_img'); ?>
                    <div class="content content--sticky content--half">
                        <img class="content__img lazyload blur-up" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo get_sub_field('ser_title');?>"/>
                        <h3 class="content__title" data-number="0<?php echo $i;?>"><?php echo get_sub_field('ser_title');?></h3>
                        <p class="content__text">
                            <?php echo get_sub_field('ser_des');?>
                        </p>
                        <a href="/#" class="content__link"><?php _e('Send request','dokmeh');?></a>
                    </div>
                <?php $i++;
                endwhile;?>
            </div>
        </section>
    <?php endif;?>

    <?php $slogan = get_field('slogan');
    if($slogan): ?>
      <section class="homeTextEffectsContainer">
          <section class="home-slogan-container">
              <div class="content">
                  <h2 class="content__title content__title--left" data-splitting data-effect25>
                <span class="font-13 font-height-medium font-medium">
                    <?php echo $slogan; ?>
                </span>
                  </h2>
              </div>
          </section>
      </section>
    <?php endif; ?>
</main>
<?php get_footer();