<?php //Template Name: About tpl
get_header(); ?>
<main class="wrapper aboutWrapper">
    <div id="newsletterLink-container">
        <span>Monthly Newsletter</span>
        <a href="">
            <img src="./assets/img/link.svg" alt="link">
            Subscribe here
        </a>
    </div>
    <section id="aboutWrapper">
        <section class="logo-anchor-links">
            <!--            <div class="logo-items">-->
            <!--                <h1>Designex</h1>-->
            <!--            </div>-->
            <div class="aboutAnchorLinksWrap">
                <img src="<?php ThemeAssets('img/elm.svg'); ?>" alt="">
                <div id="aboutAnchorLinks">
                    <a href="#whyUs">why us?</a>
                    <a href="#missionVision">mission & vision</a>
                    <a href="#statement">Statement</a>
                    <a href="#founder">Founder</a>
                    <a href="#team">team</a>
                    <a href="#awards">awards</a>
                    <a href="#theFuture">The Future</a>
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
                    <video autoplay muted loop playsinline preload="auto" poster="<?php echo $poster['sizes']['medium']; ?>">
                        <source src="<?php echo $video; ?>" type="video/mp4">
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
                <?php $whyus = get_field('section_1');
                if ($whyus): ?>
                    <div class="whyUsTitle aboutTitle">
                        <h2><?php echo $whyus; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="whyUsDescription">
                    <?php while (have_rows('reason')):
                        the_row();
                        $title = get_sub_field('title');
                        $des = get_sub_field('des'); ?>
                        <div class="descriptionSteps">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $des; ?></p>
                        </div>
                    <?php endwhile; ?>

                </div>

            </section>
        <?php endif;
        $mtitle = get_field('title1');
        $mdes = get_field('m_des');
        $vtitle = get_field('title2');
        $vdes = get_field('v_des');
        if (($mtitle and $mdes) or ($vtitle and $vdes)): ?>

            <section class="missionVisionContainer paddingAboutL" id="missionVision">
                <div class="aboutTitle">
                    <h2>Mission & Vision</h2>
                </div>
                <div class="missionVisionWrapper">
                    <div class="missionVisionInfoWrapper">
                        <div class="missionVisionContent">
                            <h3><?php echo $mtitle; ?></h3>
                            <p><?php echo $mdes; ?></p>
                        </div>
                        <div class="missionVisionContent">
                            <h3><?php echo $vtitle; ?></h3>
                            <p><?php echo $vdes; ?></p>
                        </div>
                    </div>
                    <?php $vm_gallery = get_field('m_gallery');
                    if ($vm_gallery): ?>
                        <div class="missionVisionSliderWrapper">
                            <div class="slideshow-container">
                                <?php foreach ($vm_gallery as $image_url): ?>
                                    <div class="mySlides fade">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif;
        $st_des = get_field('s_des');
        if ($st_des): ?>
            <section class="statementContainer paddingAboutL" id="statement">
                <div class="aboutTitle">
                    <h2>Our Statement</h2>
                </div>
                <div class="statementWrapper">
                    <div class="statementInfoWrapper">
                        <?php echo $st_des; ?>
                    </div>
                    <?php $st_gallery = get_field('s_gallery');
                    if ($st_gallery): ?>
                        <div class="statementSliderWrapper" data-lenis-prevent>
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($st_gallery as $image_url): ?>
                                        <div class="swiper-slide"><img src="<?php echo esc_url($image_url); ?>" alt=""></div>
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
        if ($f_name or $f_text or $position): ?>

            <section class="founderContainer paddingAboutL" id="founder">
                <div class="founderInfoWrapper">
                    <div class="aboutTitle">
                        <h2><?php echo $f_name; ?></h2>
                        <span><?php echo $position; ?></span>
                    </div>
                    <div class="founderContent">
                        <?php echo $f_text; ?>
                    </div>
                </div>
                <?php
                $f_video = get_field('f_video');
                $poster = get_field('video_poster');
                if ($f_video): ?>
                    <div class="founderVideoWrapper">
                        <video id="founderVideo" autoplay muted loop playsinline preload="auto" poster="<?php echo $poster; ?>"
                            data-url="<?php echo $f_video; ?>">
                            <source src="<?php echo $f_video; ?>" type="video/mp4">
                        </video>
                        <div id="playFounder">
                            <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                            <img src="<?php ThemeAssets('img/inner-icon-play.svg'); ?>" alt="play icon">
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (have_rows('team')): ?>
            <section class="teamContainer" id="team">
                <section class="teamContainerName paddingAboutX">
                    <div class="aboutTitle">
                        <h2>team</h2>
                    </div>
                    <div class="teamWrapper">
                        <?php while (have_rows('team')):
                            the_row();
                            $image = get_sub_field('mem_img');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position'); ?>
                            <div class="teamWrap">
                                <div class="teamMedia">
                                    <img src="<?php echo $image; ?>" alt="">
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
                            <img src="<?php echo $team_banner['url']; ?>" alt=""> <!-- Original Size -->
                        </picture>
                    </section>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <section class="awardsContainer paddingAboutX" id="awards">
            <div class="aboutTitle">
                <h2>Awards / Publications</h2>
            </div>
            <div class="awardsWrapper">
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
                <div class="awardsWrap">
                    <span></span>
                    <span></span>
                    <a href="#" target="_blank" class="awardTitleLink">
                        <p>Good Design Awards</p>
                        <img src="./assets/img/link.svg" alt="link">
                    </a>
                    <p class="award-desc">
                        best in class 2018<br>
                        13 / flush<br>
                        Product Design Furniture & Lighting
                    </p>
                    <div class="award-image">
                        <img src="./assets/img/sample/awards.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="theFutureContainer" id="theFuture">
            <div class="theFutureWrapper paddingAboutX">
                <div class="aboutTitle">
                    <h2>The Future</h2>
                </div>
                <div class="theFeatureContent">
                    <h3>Mr. <br>Someone</h3>
                    <p>Designex envisions being a trusted partner in creating spaces that inspire and positively impact
                        people’s lives. Our goal is to be recognised as a leading design and construction firm, not just
                        in Dubai, but internationally, as we expand into urban planning, master planning, and
                        environmental studies. We aim to be at the forefront of designing vibrant, sustainable
                        communities that reflect the highest standards of quality.</p>
                </div>
            </div>
            <div class="scrolling-wrap">
                <div class="comm">
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-1.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-2.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-3.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-4.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-5.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-6.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-7.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                </div>
                <div class="comm">
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-1.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-2.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-3.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-4.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-5.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-6.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-7.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="scrolling-wrap">
                <div class="comm">
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-8.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-7.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-6.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-5.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-4.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-3.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-2.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-1.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                </div>
                <div class="comm">
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-8.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-7.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-6.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-5.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-4.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-3.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-2.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                    <figure class="theFeatureGalleryWrap">
                        <div class="galleryMedia">
                            <img src="./assets/img/sample/h-scroll-1.jpg" alt="">
                        </div>
                        <figcaption>
                            <p class="title">Project Name</p>
                            <span>2022 - Dubai</span>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>
    </section>
    <section class="projectsLink paddingAboutX">
        <a href=""><span>Projcts</span><img src="./assets/img/link.svg" alt="link"></a>
    </section>
</main>
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
<?php get_footer();