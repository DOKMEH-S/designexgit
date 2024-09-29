<?php //Template Name: Services tpl
get_header(); ?>
<main class="wrapper">
    <div id="newsletterLink-container">
        <span>Monthly Newsletter</span>
        <a href="">
            <img src="./assets/img/link.svg" alt="link">
            Subscribe here
        </a>
    </div>
    <div class="pageTitle">
        <span>What We Offer</span>
        <h1>our services</h1>
    </div>
    <?php if (have_rows('features')): ?>
        <section class="servicesContainer">
            <div class="serviceItems">
                <?php while (have_rows('features')):
                    the_row(); 
                    $title = get_sub_field('title');
                    $poster = get_sub_field('title');
                    $video = get_sub_field('title');
                    $image = get_sub_field('title');
                    $des_title = get_sub_field('title');
                    $des1 = get_sub_field('title');
                    $gallery = get_sub_field('title');
                    $des_title2 = get_sub_field('title');
                    $des2 = get_sub_field('title');
                    $repeater = get_sub_field('title');
                    $post_object = get_sub_field('title');?>
                    <div class="serviceItem">
                        <div class="title">
                            <h2>
                                Architectural <br> Design
                                <div class="expandMedia" style="max-width: 27.375rem">
                                    <video autoplay muted loop playsinline preload="auto" poster="">
                                        <source src="./assets/video/coverr-city-skyscrapers-471-1080p.mp4" type="video/mp4">
                                    </video>
                                </div> .
                            </h2>
                        </div>
                        <div class="sides">
                            <div class="side">
                                <div class="des">
                                    <h3>About this service</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque
                                        sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu
                                        lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut
                                        porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae
                                        turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim
                                        lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan
                                        sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                                </div>
                                <div class="media">
                                    <div class="mediaItem"><img src="./assets/img/sample/service-01.webp" alt="service-01">
                                    </div>
                                    <div class="mediaItem"><img src="./assets/img/sample/service-02.webp" alt="service-02">
                                    </div>
                                    <div class="mediaItem"><img src="./assets/img/sample/service-03.webp" alt="service-03">
                                    </div>
                                </div>
                            </div>
                            <div class="side">
                                <div class="des">
                                    <h3>How we solve your problem and Level up your project?</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque
                                        sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu
                                        lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut
                                        porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae
                                        turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim
                                        lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan
                                        sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                                    <ul>
                                        <li>Research about your project</li>
                                        <li>good knowing about what you want</li>
                                        <li>Brain Storm</li>
                                        <li>Design</li>
                                        <li>Develop</li>
                                        <li>Maintenance</li>
                                    </ul>
                                </div>
                                <a href="./#" aria-label="Related Success Projects" class="link">Related Success Projects</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
    <section class="approachContainer">
        <div class="descriptionTitle">
            <div class="description">
                <h3>How we solve your problem and Level up your project?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget
                    dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis
                    natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed
                    elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi
                    etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu
                    dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                <ul>
                    <li>Research about your project</li>
                    <li>good knowing about what you want</li>
                    <li>Brain Storm</li>
                    <li>Design</li>
                    <li>Develop</li>
                    <li>Maintenance</li>
                </ul>
            </div>
            <h2>Our <br>
                Approach</h2>
        </div>
        <div class="approachVideo">

            <div class="singleProjectVideoContainer">
                <video id="servicesVideo" autoplay="" muted="" loop="" playsinline="" preload="auto" poster=""
                    data-url="./assets/video/coverr-city-skyscrapers-471-1080p.mp4">
                    <source src="./assets/video/coverr-city-skyscrapers-471-1080p.mp4" type="video/mp4">
                </video>
                <div id="playVideo">
                    <img src="./assets/img/outer-circle.svg" alt="circle text">
                    <img src="./assets/img/inner-icon-play.svg" alt="play icon">
                </div>
            </div>
        </div>

    </section>
    <section class="outLink">
        <a href="./archive-projects.html" aria-label="Projects">Projects</a>
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