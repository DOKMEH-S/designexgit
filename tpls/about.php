<?php //Template Name: About tpl
get_header(); ?>

<main class="wrapper aboutWrapper">
    <section class="pageIntro aboutIntro paddingX">
        <img class="background" src="<?php ThemeAssets('img/intro-logo.png'); ?>" alt="">
        <div class="info">
            <h1 class="title">/ <?php the_title();?></h1>

            <?php
            // Get the original text from the textarea field
            $original_text = get_field('about_description');

            // Get the repeater field
            $repeater_field = get_field('color_text');

            // If the original text and the repeater field exist
            if ($original_text && $repeater_field) {
                // Loop through each item in the repeater field
                foreach ($repeater_field as $item) {
                    // Get the word from the repeater field
                    $word = $item['color_word'];

                    // Replace the word in the original text with the colorful version
                    $original_text = str_replace($word, '<span class="colorful">' . $word . '</span>', $original_text);
                }

                // Output the modified text
                echo '<p class="description">' . $original_text . '</p>';
            }
            ?>
            <div id="root">
                <img src="<?php ThemeAssets('img/root.svg'); ?>" alt="">
            </div>
        </div>
    </section>
    <section class="abWrapper" id="aboutWrapper">
        <section class="aboutAnchorMenu paddingX">
            <a href="#section1" class="link"><span><?php the_field('section_1'); ?></span></a>
            <a href="#section2" class="link"><span><?php the_field('section_2'); ?></span></a>
            <a href="#section3" class="link"><span><?php the_field('section_3'); ?></span></a>
            <a href="#section4" class="link"><span><?php the_field('section_4'); ?></span></a>
            <a href="#section5" class="link"><span><?php the_field('section_5'); ?></span></a>
            <a href="#section6" class="link"><span><?php the_field('section_6'); ?></span></a>
            <a href="#section7" class="link"><span><?php the_field('section_7'); ?></span></a>
            <a href="#section8" class="link"><span><?php the_field('section_8'); ?></span></a>
            <a href="#section9" class="link"><span><?php the_field('section_9'); ?></span></a>
        </section>
        <section class="columnWrapper aboutUs paddingX" id="section1">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_1'); ?></h2>
            </div>
            <div class="columnWrap">
                <div class="content">
                    <p><?php the_field('who_des'); ?></p>
                </div>
                <?php if (have_rows('features')): ?>
                    <div class="featuresWrapper">
                        <?php while (have_rows('features')):
                            the_row(); ?>
                            <div class="featuresWrap">
                                <span class="number"><?php the_sub_field('number'); ?>+</span>
                                <span class="title"><?php the_sub_field('title'); ?></span>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="columnWrapper mission paddingX" id="section2">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_2'); ?></h2>
            </div>
            <div class="columnWrap">
                <div class="content">
                    <p><?php the_field('our_des'); ?></p>
                </div>
                <?php if (have_rows('scrolling_text_wrapper')): ?>
                    <div class="scrollingTextWrapper">
                        <div class="blur blur--left">
                            <div class="" style="--index: 0"></div>
                            <div class="" style="--index: 1"></div>
                            <div class="" style="--index: 2"></div>
                            <div class="" style="--index: 3"></div>
                            <div class="" style="--index: 4"></div>
                        </div>
                        <div class="blur blur--right">
                            <div class="" style="--index: 0"></div>
                            <div class="" style="--index: 1"></div>
                            <div class="" style="--index: 2"></div>
                            <div class="" style="--index: 3"></div>
                            <div class="" style="--index: 4"></div>
                        </div>
                        <div class="scrolling-wrap">
                            <div class="comm">
                                <?php while (have_rows('scrolling_text_wrapper')):
                                    the_row(); ?>
                                    <div><?php the_sub_field('scroll_text'); ?></div>
                                <?php endwhile; ?>
                            </div>
                            <div class="comm">
                                <?php while (have_rows('scrolling_text_wrapper')):
                                    the_row(); ?>
                                    <div><?php the_sub_field('scroll_text'); ?></div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="columnWrapper vision paddingX" id="section3">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_3'); ?></h2>
            </div>
            <div class="columnWrap">
                <div class="content">
                    <p><?php the_field('vis_des'); ?></p>
                </div>
            </div>
            <div class="full-image">
                <?php $image = get_field('vis_img') ?>
                <img data-src="<?php echo $image['url']; ?>" class="lazyload blur-up" />
            </div>
        </section>
        <section class="columnWrapper history paddingX" id="section4">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_4'); ?></h2>
            </div>
            <div class="columnWrap">
                <?php if (have_rows('history_slider')): ?>
                    <div class="historySliderWrapper">
                        <div class="mediaTextSlider">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('history_slider')):
                                        the_row(); ?>
                                        <div class="swiper-slide">
                                            <div class="media-wrap">
                                                <?php $history_image = get_sub_field('slide_img') ?>
                                                <img data-src="<?php echo $history_image['sizes']['medium']; ?>"
                                                    class="lazyload blur-up" />
                                            </div>
                                            <div class="text-wrap">
                                                <h3><?php the_sub_field('slide_title'); ?></h3>
                                                <p><?php the_sub_field('slide_des'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail-arrows-wrapper">
                            <div class="arrow-wrapper">
                                <div class="swiper-button-next hover-target"></div>
                                <div class="swiper-button-prev hover-target"></div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('history_slider')):
                                        the_row(); ?>
                                        <div class="swiper-slide hover-target">
                                            <span><?php the_sub_field('year'); ?></span>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </section>
        <section class="columnWrapper members paddingX" id="section5">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_5'); ?></h2>
            </div>
            <?php if (have_rows('member')): ?>
                <div class="columnWrap membersWrapper">
                    <?php while (have_rows('member')):
                        the_row(); ?>
                        <div class="memberWrap">
                            <div class="memberMedia">
                                <?php $members_image = get_sub_field('mem_img') ?>
                                <img data-src="<?php echo $members_image['sizes']['medium']; ?>" alt=""
                                    class="lazyload blur-up skewElem">
                            </div>
                            <div class="memberInfo">
                                <span class="position"><?php the_sub_field('position'); ?></span>
                                <p class="name"><?php the_sub_field('name'); ?></p>
                                <div class="social">
                                    <?php if (get_sub_field('linkdine')): ?>
                                        <a target="_blank" href="<?php the_sub_field('linkdine'); ?>" aria-label="">
                                            <span class="icon-Linkedin" aria-hidden="true"></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </section>
        <?php if (have_rows('service_repeater')): ?>
        <section class="columnWrapper services paddingX" id="section6">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_6'); ?></h2>
            </div>
                <div class="columnWrap">
                    <div class="accordion">
                        <?php while (have_rows('service_repeater')):
                            the_row(); ?>
                            <div class="accordion-item">
                                <div class="accordion-header hover-target">
                                    <span class="accordion-icon">
                                        <span class="plus"><img src="<?php ThemeAssets('img/plus.svg'); ?>" alt=""></span>
                                        <span class="minus"><img src="<?php ThemeAssets('img/minus.svg'); ?>" alt=""></span>
                                    </span>
                                    <span class="accordion-title"><?php the_sub_field('service_title'); ?></span>
                                </div>
                                <div class="accordion-content">
                                    <p><?php the_sub_field('service_des'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
        </section>
        <?php endif; ?>
        <?php if (have_rows('awards_repeater')): ?>
        <section class="columnWrapper awards paddingX" id="section7">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_7'); ?></h2>
            </div>
                <div class="columnWrap">
                    <div class="awardsContainer">
                        <div class="awardsHeader">
                            <p class="title">title</p>
                            <p class="year">year</p>
                        </div>
                        <div class="awardWrapper">
                            <ul class="flex flex-fd-c flex-jc-sb">
                                <li>
                                    <?php while (have_rows('awards_repeater')):
                                        the_row(); ?>
                                        <div class="linkTwo flex flex-jc-sb flex-ai-c">
                                            <div class="text-wrap">
                                                <span class="title"><?php the_sub_field('awards_title'); ?></span>
                                                <span class="date"><?php the_sub_field('year'); ?></span>
                                            </div>
                                            <div class="hover-revealTwo image01">
                                                <?php $awards_image = get_sub_field('awards_image') ?>
                                                <img class="hidden-imgTwo lazyload blur-up"
                                                    data-src="<?php echo $awards_image['sizes']['medium']; ?>" alt="">
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>
        <?php endif;
$certificate_images = get_field('certificate_gallery'); // Replace 'gallery_field_name' with the name of your gallery field
if ($certificate_images): ?>
        <section class="columnWrapper certificate paddingX" id="section8">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_8'); ?></h2>
            </div>
                <div class="columnWrap">
                    <div class="certificateGallery">
                        <?php foreach ($certificate_images as $image): ?>
                            <a href="<?php echo esc_url($image['sizes']['medium']); ?>">
                                <img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" class="lazyload blur-up">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
        </section>
<?php endif; ?>
        <?php if (have_rows('founder')): ?>
        <section class="columnWrapper founder paddingX" id="section9">
            <div class="headLine">
                <h2 class="title">/ <?php the_field('section_9'); ?></h2>
            </div>
                <div class="columnWrap">
                    <?php while (have_rows('founder')):
                        the_row(); ?>
                        <div class="founderWrap">
                            <div class="founder-media">
                                <?php $founder_image = get_sub_field('fou_img') ?>
                                <img data-src="<?php echo $founder_image['sizes']['medium']; ?>" alt=""
                                    class="lazyload blur-up skewElem">

                            </div>
                            <div class="founder-info">
                                <div class="founderIntro">
                                    <span class="position"><?php the_sub_field('position'); ?></span>
                                    <p class="name"><?php the_sub_field('name'); ?></p>
                                    <div class="social-media">
                                        <?php if (get_sub_field('linkdine')): ?>
                                            <a target="_blank" href="<?php the_sub_field('linkdine'); ?>" aria-label="">
                                                <span class="icon-Linkedin" aria-hidden="true"></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="founder-description"> <!-- Setting the character limit -->
                                    <p><?php the_sub_field('people_des'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
        </section>
        <?php endif; ?>
    </section>
</main>


<?php get_footer(); ?>