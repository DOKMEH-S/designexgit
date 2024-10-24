<?php get_header();
$project_ID = get_the_ID(); ?>
    <main class="wrapper">
        <section class="singleProjectHeroSectionContainer">
            <div class="singleProjectNameInfoAwardsWrapper">
                <div class="singleProjectNameInfoWrapper">
                    <div class="projectNameDescriptionWrapper">
                        <?php $logo = get_field('project_logo');
                        if ($logo): ?>
                            <div class="projectLogo"><img src="<?php echo $logo['sizes']['thumbnail']; ?>"
                                                          alt="<?php echo $logo['alt']; ?>">
                            </div>
                        <?php endif; ?>
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_excerpt()): ?>
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

                if ($p_link and $p_name):
                    $p_image = get_field('p_image');
                    $p_des = get_field('p_des'); ?>
                    <div class="singleProjectAwardsWrapper">
                        <a href="<?php echo $p_link; ?>" target="_blank" class="awardsTitleLogoWrapper">
                            <div class="awardsTitle">
                                <h2><?php echo $p_name; ?></h2>
                                <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="award link">
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
                <?php endif; ?>
            </div>
            <div class="singleProjectVideoMapContainer">
                <?php
                $videoModal = get_field('video');
                $image = get_field('image');
                $vr = get_field('vr_url');

                if ($videoModal):
                    $poster = get_field('poster'); ?>
                    <div class="singleProjectVideoContainer">
                        <video autoplay muted loop playsinline preload="auto"
                               poster="<?php echo $poster['sizes']['medium']; ?>"
                               id="projectVideo" data-url="<?php echo $videoModal['url']; ?>">
                            <source src="<?php echo $videoModal['url']; ?>" type="video/mp4">
                        </video>
                        <div id="playVideo">
                            <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                            <img src="<?php ThemeAssets('img/inner-icon-play.svg'); ?>" alt="play icon">
                        </div>
                    </div>
                <?php elseif ($vr): ?>
                    <div class="singleProjectVideoContainer">
                        <iframe src="<?php echo $vr; ?>" title="<?php get_the_title(); ?>"></iframe>
                    </div>
                <?php else: ?>
                    <div class="singleProjectVideoContainer">
                        <img src="<?php echo get_the_post_thumbnail_url($project_ID, 'large'); ?>"
                             alt="<?php echo the_title(); ?>">
                    </div>
                <?php endif; ?>
                <?php
                $location = get_field('location');
                if ($location && is_array($location)): ?>
                    <div id="singleProjectMap">
                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>"
                             data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
        $gallery = get_field('gallery');
        if ($gallery && is_array($gallery)): ?>
            <section class="singleProjectGalleryContainer">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $image_url): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($image_url['url']); ?>"
                                     alt="<?php echo isset($image_url['alt']) ? esc_attr($image_url['alt']) : ''; ?>">
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
                    <div class="titleWrap skewText">
                        <h2 class="title-roboto">related projects</h2>
                    </div>
                    <div class="relatedProjectsWrapper">
                        <?php while ($related_query->have_posts()) {
                            $related_query->the_post();
                            $date = wp_get_post_terms(get_the_ID(), 'project_type', array('child_of' => 5, 'fields' => 'names'));
                            $location = wp_get_post_terms(get_the_ID(), 'project_type', array('child_of' => 93, 'fields' => 'names'));
                            $coming_soon = get_field('coming_soon');?>
                            <div class="relatedProjectsWrap skewText <?php if ($coming_soon) echo 'deactive-link'; ?>">
                                <div class="projectMedia">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                             alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo $coming_soon ? '#' : get_the_permalink(); ?>" class="project-info">
                                    <p class="project-name"><?php the_title(); ?></p>
                                    <div class="year-location">
                                        <?php if ($date[0]): ?>
                                            <span><?php echo $date[0]; ?> - </span>
                                        <?php endif; ?>
                                        <span><?php echo $location[0]; ?></span>
                                    </div>
                                </a>
                                <?php if ($coming_soon): ?>
                                    <div class="coming-soon">
                                        <span>coming soon</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            <?php }
            wp_reset_postdata();
        }
        ?>

    </main>
<?php if ($videoModal): ?>
    <div id="videoModal">
        <div class="videoContainer">
            <video id="modalVideo" loop playsinline preload="auto" poster="<?php echo $poster['sizes']['medium']; ?>"
                   controls>
                <source id="modalVideoSrc" src="" type="video/mp4">
            </video>
        </div>
        <div id="closeModalVideo">
            <span>close</span>
        </div>
    </div>
<?php endif;
include get_template_directory() . '/footer.php';