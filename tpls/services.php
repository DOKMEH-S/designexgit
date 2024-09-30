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
    <?php if (have_rows('services')): ?>
        <section class="servicesContainer">
            <div class="serviceItems">
                <?php while (have_rows('services')):
                    the_row();
                    $title1 = get_sub_field('title1');
                    $media = get_sub_field('title_media');
                    $title2 = get_sub_field('title2');

                    $des = get_sub_field('services_data');

                    $post_object = get_sub_field('title'); ?>
                    <div class="serviceItem">
                        <div class="title">
                            <h2>
                                <?php echo $title1; ?> <br>
                                <?php
                                if ($media):
                                    $file_type = wp_check_filetype($media['url']);
                                    $file_extension = $file_type['ext'];

                                    if (in_array($file_extension, ['mp4', 'webm'])): ?>
                                        <div class="expandMedia" style="max-width: 27.375rem">
                                            <video autoplay muted loop playsinline preload="auto" poster="">
                                                <source src="<?php echo esc_url($media['url']); ?>" type="video/mp4">
                                            </video>
                                        </div>
                                        <?php
                                    elseif (in_array($file_extension, ['jpg', 'jpeg', 'png', 'webp'])): ?>
                                        <div class="expandMedia" style="max-width: 11.375rem">
                                            <img src="<?php echo esc_url($media['url']); ?>" alt="services-item">
                                        </div>
                                    <?php endif;
                                endif;
                                ?>
                                <?php echo $title2; ?>
                            </h2>
                        </div>
                        <div class="sides">
                            <?php echo $des; ?>
                        </div>
                        <a href="./#" aria-label="Related Success Projects" class="link">Related Success Projects</a>
                    </div>

                </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php endif;
    $a_des = get_field('a_des');
    $a_video = get_field('a_video');
    $a_poster = get_field('a_poster');
    if ($a_des or $a_video): ?>
        <section class="approachContainer">
            <div class="descriptionTitle">
                <div class="description">
                    <?php echo $a_des;?>
                </div>
                <h2>Our <br>
                    Approach</h2>
            </div>
            <div class="approachVideo">

                <div class="singleProjectVideoContainer">
                    <video id="servicesVideo" autoplay="" muted="" loop="" playsinline="" preload="auto" poster="<?php echo $a_poster['url'];?>"
                        data-url="<?php echo $a_video['url'];?>">
                        <source src="<?php echo $a_video['url'];?>" type="video/mp4">
                    </video>
                    <div id="playVideo">
                        <img src="<?php ThemeAssets('img/outer-circle.svg');?>" alt="circle text">
                        <img src="<?php ThemeAssets('img/inner-icon-play.svg')?>" alt="play icon">
                    </div>
                </div>
            </div>

        </section>
    <?php endif; ?>
    <section class="outLink">
        <a href="<?php echo home_url('/projects'); ?>" aria-label="Projects">Projects</a>
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