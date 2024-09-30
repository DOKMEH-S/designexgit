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
                    $post_object = get_sub_field('title');
                    $left_side_title = get_sub_field('left_side_title');
                    $right_side_title = get_sub_field('right_side_title');
                    $left_side_text = get_sub_field('left_side_text');
                    $right_side_text = get_sub_field('right_side_text');
                    $left_media = get_sub_field('left_media');
                    $link = get_sub_field('right_link'); ?>

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
                            <div class="side">
                                <?php if ($left_side_title or $left_side_text): ?>
                                    <div class="des">
                                        <h3><?php echo $left_side_title; ?></h3>
                                        <?php echo $left_side_text; ?>
                                    </div>
                                <?php endif;
                                if ($left_media): ?>
                                    <div class="media">
                                        <?php foreach ($left_media as $image_url): ?>
                                            <div class="mediaItem"><img src="<?php echo $image_url['sizes']['medium']; ?>"
                                                    alt="<?php echo $image_url['alt']; ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="side">

                                <div class="des">
                                    <?php if ($left_side_title or $left_side_text): ?>
                                        <h3><?php echo $right_side_title; ?></h3>
                                        <?php echo $right_side_text; ?>
                                    <?php endif;
                                    if (have_rows('left_items')): ?>
                                        <ul>
                                            <?php while (have_rows('left_items')):
                                                the_row();
                                                $items = get_sub_field('item'); ?>
                                                <li><?php echo $items; ?></li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <?php if ($link): ?>
                                    <a href="<?php echo esc_url(get_permalink($link)); ?>" aria-label="Related Success Projects"
                                        class="link">
                                        Related Success Projects
                                    </a>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

    <?php endif;
    $a_des = get_field('text');
    $a_title = get_field('a_title');
    $a_video = get_field('a_video');
    $a_poster = get_field('a_poster');
    if ($a_des or $a_title or $a_video): ?>
        <section class="approachContainer">
            <div class="descriptionTitle">
                <div class="description">

                    <h3><?php echo $a_title; ?></h3>
                    <?php echo $a_des; ?>

                    <?php if (have_rows('a_items')): ?>
                        <ul>
                            <?php while (have_rows('a_items')):
                                the_row();
                                $items = get_sub_field('item'); ?>
                                <li><?php echo $items; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <h2>Our <br>
                    Approach</h2>
            </div>
            <div class="approachVideo">

                <div class="singleProjectVideoContainer">
                    <video id="servicesVideo" autoplay="" muted="" loop="" playsinline="" preload="auto"
                        poster="<?php echo $a_poster['url']; ?>" data-url="<?php echo $a_video['url']; ?>">
                        <source src="<?php echo $a_video['url']; ?>" type="video/mp4">
                    </video>
                    <div id="playVideo">
                        <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                        <img src="<?php ThemeAssets('img/inner-icon-play.svg') ?>" alt="play icon">
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