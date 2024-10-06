<?php get_header(); ?>
    <main class="wrapper">
        <div id="newsletterLink-container">
            <span>Monthly Newsletter</span>
            <a href="">
                <img src="./assets/img/link.svg" alt="link">
                Subscribe here
            </a>
        </div>
        <section class="singleProjectHeroSectionContainer">
            <div class="singleProjectNameInfoAwardsWrapper">
                <div class="singleProjectNameInfoWrapper">
                    <div class="projectNameDescriptionWrapper">
                        <div class="projectLogo"><img src="<?php ThemeAssets('img/sample/project-logo-1.png'); ?>"
                                                      alt="">
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?>
                            <div class="description">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('features')): ?>
                        <div class="projectsFeatureWrapper">
                            <?php while (have_rows('features')):
                                the_row(); ?>
                                <div class="featureWrap"><span><?php echo get_sub_field('title'); ?>
                                    :</span><span><?php echo get_sub_field('name'); ?></span></div>
                            <?php endwhile; ?>

                        </div>
                    <?php endif; ?>
                </div>
                <?php $p_link = get_field('p_link');
                $p_name = get_field('p_title');
                $p_image = get_field('p_image');
                $p_des = get_field('p_des'); ?>
                <div class="singleProjectAwardsWrapper">
                    <a href="<?php echo $p_link; ?>" target="_blank" class="awardsTitleLogoWrapper">
                        <div class="awardsTitle">
                            <h2><?php echo $p_name; ?></h2>
                            <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="">
                        </div>
                        <div class="awardsLogo">
                            <img src="<?php echo $p_image['sizes']['thumbnail']; ?>"
                                 alt="<?php echo $p_image['alt']; ?>">
                        </div>
                    </a>
                    <div class="awardsDescription">
                        <p><?php echo $p_des; ?></p>
                    </div>
                </div>
            </div>
            <div class="singleProjectVideoMapContainer">
                <?php
                $video = get_field('video');
                $poster = get_field('poster');
                $image = get_field('image');
                $vr = get_field('vr_url');

                if ($video): ?>
                    <div class="singleProjectVideoContainer">
                        <video autoplay muted loop playsinline preload="auto" poster="<?php echo $poster; ?>"
                               id="projectVideo"
                               data-url="<?php echo $video; ?>">
                            <source src="<?php echo $video; ?>" type="video/mp4">
                        </video>
                        <div id="playVideo">
                            <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                            <img src="<?php ThemeAssets('img/inner-icon-play.svg'); ?>" alt="play icon">
                        </div>
                    </div>
                <?php
                elseif ($image): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php
                elseif ($vr): ?>
                    <iframe src="<?php echo $vr; ?>" title="<?php get_the_title(); ?>"></iframe>
                <?php endif; ?>
                <?php
                $location = get_field('location');
                if ($location): ?>
                    <div id="singleProjectMap">
                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>"
                             data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                        <!-- <img src="./assets/img/sample/map.jpg" alt=""> -->
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
        $gallery = get_field('gallery');
        if ($gallery): ?>
            <section class="singleProjectGalleryContainer">

                <div class="swiper mySwiper">

                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $image_url): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($image_url['sizes']['large']); ?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="slider-arrows-pagination">

                    <div class="swiper-button-next"></div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>

                </div>

            </section>
        <?php endif; ?>

        <section class="singleProjectContent">

            <?php the_content(); ?>

        </section>
        <?php
        $project_types = wp_get_post_terms(get_the_ID(), 'project_type');
        if ($project_types) {
            $project_type_ids = array_map(function ($term) {
                return $term->term_id;
            }, $project_types);

            $related_args = array(
                'post_type' => 'projects',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_type',
                        'field' => 'term_id',
                        'terms' => $project_type_ids,
                    ),
                ),
                'post__not_in' => array(get_the_ID()),
                'posts_per_page' => 3
            );
            //
            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()) { ?>
                <section class="relatedProjectsContainer">
                    <div class="titleWrap">
                        <h2 class="title-roboto">related projects</h2>
                    </div>
                    <div class="relatedProjectsWrapper">
                        <?php while ($related_query->have_posts()) {
                            $related_query->the_post();

                            $date = wp_get_post_terms(get_the_ID(), 'project_type', array('child_of' => 5, 'fields' => 'names'));
                            $location = wp_get_post_terms(get_the_ID(), 'project_type', array('child_of' => 93, 'fields' => 'names')); ?>

                            <div class="relatedProjectsWrap">
                                <div class="projectMedia">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                             alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="project-info">
                                    <p class="project-name"><?php the_title(); ?></p>
                                    <div class="year-location">
                                        <span><?php echo $date[0] ?? ''; ?> - </span>
                                        <span><?php echo $location[0] ?? ''; ?></span>
                                    </div>
                                </a>
                            </div>

                        <?php } ?>
                    </div>
                </section>
            <?php }
            wp_reset_postdata();
        }
        ?>

    </main>
<?php if ($video): ?>
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
<?php endif; ?>
<?php get_footer();