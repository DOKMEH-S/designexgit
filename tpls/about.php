<?php //Template Name: About tpl
get_header(); ?>
<main class="wrapper aboutWrapper">
    <section id="aboutWrapper">
        <section class="logo-anchor-links">
            <!--            <div class="logo-items">-->
            <!--                <h1>Designex</h1>-->
            <!--            </div>-->
            <div class="aboutAnchorLinksWrap">
                <img src="<?php ThemeAssets('img/elm-primary.webp'); ?>" alt="">
                <div id="aboutAnchorLinks">
                    <?php
                    if (have_rows('reason')): ?>
                        <a href="#whyUs" class="shuffle" data-text="Why Us?"> Why Us? </a>
                    <?php endif; ?>

                    <?php if (get_field('title1') || get_field('title2')): ?>
                        <a
                            href="#missionVision" class="shuffle" data-text="Mission & Vision"><?php echo get_field('section_2') ? get_field('section_2') : 'Mission & Vision'; ?></a>
                    <?php endif; ?>

                    <?php if (get_field('s_des')): ?>
                        <a
                            href="#statement" class="shuffle" data-text="Statement"><?php echo get_field('section_3') ? get_field('section_3') : 'Statement'; ?></a>
                    <?php endif; ?>

                    <?php if (get_field('f_name') || get_field('f_text')): ?>
                        <a href="#founder" class="shuffle" data-text="Founder"><?php echo get_field('f_name') ? get_field('f_name') : 'Founder'; ?></a>
                    <?php endif; ?>

                    <?php if (have_rows('team')): ?>
                        <a href="#team" class="shuffle" data-text="Team"><?php echo get_field('section_4') ? get_field('section_4') : 'Team'; ?></a>
                    <?php endif; ?>

                    <?php
                    $awards_query = new WP_Query(array('post_type' => 'projects'));
                    if ($awards_query->have_posts()): ?>
                        <a href="#awards" class="shuffle" data-text="Awards"><?php echo get_field('section_5') ? get_field('section_5') : 'Awards'; ?></a>
                    <?php endif; ?>

                    <?php if (get_field('u_title') || get_field('u_des')): ?>
                        <a href="#theFuture" class="shuffle" data-text="The Future"><?php echo get_field('section_6') ? get_field('section_6') : 'The Future'; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section class="aboutSloganContainer paddingAboutX">
            <?php
            $video = get_field('main_video');
            $poster = get_field('poster');

            if ($video): ?>
                <div class="logo-items">
                    <img src="<?php ThemeAssets('img/about-logo.svg'); ?>" alt="">
                    <h1>Designex</h1>
                </div>

                <div class="aboutVideoWrap">
                    <video autoplay muted loop playsinline preload="auto" poster="<?php echo $poster['sizes']['large']; ?>">
                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                    </video>
                </div>
            <?php endif; ?>
            <div class="aboutSloganInfo">
                <h2><?php echo get_field('about_title'); ?></h2>
                <div class="content">
                    <?php echo get_field('about_description'); ?>
                </div>
            </div>
        </section>
        <?php if (have_rows('reason')): ?>
            <section class="whyUsContainer paddingAboutX" id="whyUs">
                <?php $sec1 = get_field('section_1');
                if ($sec1): ?>
                    <div class="whyUsTitle aboutTitle skewText">
                        <h2><?php echo $sec1 ?: 'whyUs?'; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="whyUsDescription">
                    <?php while (have_rows('reason')):
                        the_row();
                        $title = get_sub_field('title');
                        $des = get_sub_field('des'); ?>
                        <div class="descriptionSteps ">
                            <h3 class="skewText"><?php echo $title; ?></h3>
                            <p class="skewText "><?php echo $des; ?></p>
                        </div>
                    <?php endwhile; ?>

                </div>

            </section>
        <?php endif;
        $mtitle = get_field('title1');
        $mdes = get_field('m_des');
        $vtitle = get_field('title2');
        $vdes = get_field('v_des');
        $sec2 = get_field('section_2');
        if (($mtitle and $mdes) or ($vtitle and $vdes)): ?>

            <section class="missionVisionContainer paddingAboutL" id="missionVision">
                <div class="aboutTitle skewText">
                    <h2><?php echo $sec2 ?: 'Mission & Vision'; ?></h2>
                </div>
                <div class="missionVisionWrapper">
                    <div class="missionVisionInfoWrapper">
                        <div class="missionVisionContent skewText">
                            <h3><?php echo $mtitle; ?></h3>
                            <p><?php echo $mdes; ?></p>
                        </div>
                        <div class="missionVisionContent skewText ">
                            <h3><?php echo $vtitle; ?></h3>
                            <p><?php echo $vdes; ?></p>
                        </div>
                    </div>
                    <?php
                    $vm_gallery = get_field('m_gallery');
                    if ($vm_gallery): ?>
                        <div class="missionVisionSliderWrapper">
                            <div class="slideshow-container">
                                <?php foreach ($vm_gallery as $image_url): ?>
                                    <div class="mySlides fade">
                                        <img src="<?php echo $image_url['sizes']['large']; ?>"
                                            alt="<?php echo $image_url['alt']; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php endif;
        $st_des = get_field('s_des');
        $sec3 = get_field('section_3');
        if ($st_des): ?>
            <section class="statementContainer paddingAboutL" id="statement">
                <div class="aboutTitle skewText">
                    <h2><?php echo $sec3 ?: 'Statement'; ?></h2>
                </div>
                <div class="statementWrapper">
                    <div class="statementInfoWrapper skewText">
                        <?php echo $st_des; ?>
                    </div>
                    <?php $st_gallery = get_field('s_gallery');
                    if ($st_gallery): ?>
                        <div class="statementSliderWrapper" data-lenis-prevent>
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($st_gallery as $image_url): ?>
                                        <div class="swiper-slide"><img src="<?php echo $image_url['sizes']['medium']; ?>"
                                                alt="<?php echo $image_url['alt']; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif;
        $f_name = get_field('f_name');
        $position = get_field('position');
        $f_text = get_field('f_text');
        $videoModal = get_field('f_video');
        $poster = get_field('video_poster');
        if (($f_name and $videoModal) or ($f_text and $videoModal) or ($f_name and $f_text)): ?>

            <section class="founderContainer paddingAboutL" id="founder">
                <div class="founderInfoWrapper">
                    <div class="aboutTitle skewText">
                        <h2><?php echo $f_name; ?></h2>
                        <span><?php echo $position; ?></span>
                    </div>
                    <div class="founderContent skewText">
                        <?php echo $f_text; ?>
                    </div>
                </div>
                <?php
                if ($videoModal): ?>
                    <div class="founderVideoWrapper">
                        <video id="founderVideo" autoplay muted loop playsinline preload="auto"
                            poster="<?php echo $poster['sizes']['large']; ?>" data-url="<?php echo $videoModal['url']; ?>">
                            <source src="<?php echo $videoModal['url']; ?>" type="video/mp4">
                        </video>
                        <div id="playFounder">
                            <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                            <img src="<?php ThemeAssets('img/inner-icon-play.svg'); ?>" alt="play icon">
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (have_rows('team')):
            $sec4 = get_field('section_4'); ?>
            <section class="teamContainer" id="team">
                <section class="teamContainerName paddingAboutX">
                    <div class="aboutTitle skewText">
                        <h2><?php echo $sec4 ?: 'Team'; ?></h2>
                    </div>
                    <div class="teamWrapper">
                        <?php while (have_rows('team')):
                            the_row();
                            $image = get_sub_field('mem_img');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position'); ?>
                            <div class="teamWrap">
                                <div class="teamMedia">
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                </div>
                                <div class="teamInfo">
                                    <h3><?php echo $name; ?></h3>
                                    <span><?php echo $position; ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
                <?php $team_banner = get_field('banner');
                if ($team_banner): ?>
                    <section class="aboutOfficeContainer">
                        <picture>
                            <source srcset="<?php echo $team_banner['sizes']['medium']; ?>" media="(max-width: 600px)">
                            <!-- medium size -->
                            <img src="<?php echo $team_banner['url']; ?>" alt="<?php echo $team_banner['alt']; ?>">
                            <!-- Original Size -->
                        </picture>
                    </section>
                <?php endif; ?>
            </section>
        <?php endif;

        $awards_query = new WP_Query(array('post_type' => 'projects'));
        if ($awards_query->have_posts()): ?>
            <section class="awardsContainer paddingAboutX" id="awards">
                <?php $sec5 = get_field('section_5'); ?>
                <div class="aboutTitle skewText ">
                    <h2><?php echo $sec5 ?: 'Awards / Publications'; ?></h2>
                </div>
                <div class="awardsWrapper skewText ">

                    <?php while ($awards_query->have_posts()):
                        $awards_query->the_post();
                        $p_link = get_field('p_link');
                        $p_name = get_field('p_title');
                        $p_image = get_field('p_image');
                        $p_des = get_field('p_des');

                        if ($p_link && $p_name && $p_image && $p_des): ?>
                            <div class="awardsWrap">
                                <span></span>
                                <span></span>
                                <a href="<?php echo $p_link; ?>" target="_blank" class="awardTitleLink">
                                    <p><?php echo $p_name; ?></p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/link.svg" alt="link">
                                </a>
                                <p class="award-desc"><?php echo $p_des; ?></p>
                                <div class="award-image">
                                    <img src="<?php echo $p_image['sizes']['thumbnail']; ?>" alt="<?php echo $p_image['alt']; ?>">
                                </div>
                            </div>
                        <?php endif;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
        <?php endif; ?>
        <section class="theFutureContainer" id="theFuture">
            <div class="theFutureWrapper paddingAboutX">
                <div class="aboutTitle skewText ">
                    <?php $sec6 = get_field('section_6'); ?>
                    <h2><?php echo $sec6 ?: 'The Future'; ?></h2>
                </div>
                <?php $u_title = get_field('u_title');
                $u_des = get_field('u_des'); ?>
                <div class="theFeatureContent skewText">
                    <h3><?php echo $u_title; ?></h3>
                    <p><?php echo $u_des; ?></p>
                </div>
            </div>
            <?php $u_gallery = get_field('u_gallery');
            $b_text = get_field('gallery_text');
            if ($u_gallery): ?>
                <section class="content content--padded content--full">
                    <div class="grid grid--spaced grid--wide" data-grid-fifth>
                        <?php foreach ($u_gallery as $image_url): ?>
                            <div class="grid__img" style="background-image:url(<?php echo $image_url['sizes']['medium']; ?>)">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="content__title">
                        <h2 class="content__title-main"><?php echo $b_text; ?></h2>
                    </div>
                </section>
            <?php endif; ?>
        </section>
    </section>
    <section class="projectsLink paddingAboutX">
        <a href="<?php echo home_url('/projects'); ?>"><span>Projcts</span><img
                src="<?php ThemeAssets('img/link.svg'); ?>" alt="link"></a>
    </section>
</main>
<?php if ($videoModal): ?>
    <div id="videoModal">
        <div class="videoContainer">
            <video id="modalVideo" loop playsinline preload="auto" poster="" controls>
                <source id="modalVideoSrc" src="" type="video/mp4">
            </video>
        </div>
        <div id="closeModalVideo">
            <span>close</span>
        </div>
    </div>
<?php endif;
include get_template_directory() . '/footer.php';