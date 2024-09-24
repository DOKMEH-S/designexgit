<?php get_header(); ?>
<main class="wrapper">
    <?php while (have_posts()):
        the_post();
        $postID = get_the_ID(); ?>
        <section class="pageIntro paddingX">
            <img class="background" src="<?php ThemeAssets('img/intro-logo.png'); ?>" alt="">
            <div class="info">
                <?php $project_title = get_field('project_title','option');?>
                <p class="title">/ <?php echo $project_title ? $project_title : __('Our projects','dokmeh');?></p>
                <h1 class="description">
                    <?php the_title(); ?>
                </h1>
                <div class="specs">
                    <?php
                    // Get the current post's ID
                    $post_id = get_the_ID();

                    // Define the terms you want to fetch
                    $terms_to_fetch = array('service', 'location', 'duration');

                    // Initialize a counter for tracking the last term
                    $term_counter = 0;

                    // Iterate through each term and display its child terms
                    foreach ($terms_to_fetch as $term_name) {
                        $parent_term = get_term_by('name', $term_name, 'project_type');
                        if ($parent_term) {
                            $parent_term_id = $parent_term->term_id;
                            $child_terms = wp_get_post_terms($post_id, 'project_type', array('parent' => $parent_term_id));
                            if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                $terms_list = '';
                                foreach ($child_terms as $child_term) {
                                    $terms_list .= '<span>' . $child_term->name . '</span>';
                                }
                                echo rtrim($terms_list, ' / ');

                                // Check if it's the last term
                                if (++$term_counter !== count($terms_to_fetch)) {
                                    echo ' / ';
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="projectSingle-banner">
            <?php the_post_thumbnail($postID, 'full'); ?>
        </section>
        <section class="projectSingle-info paddingX">
            <div class="visual-container">
                <?php $gallery_images = get_field('gallery');
                if ($gallery_images): ?>
                    <div class="lightGallery-wrapper">
                        <div class="icon hover-target">
                            <img src="<?php ThemeAssets('img/lightgallery-icon.svg'); ?>" alt="">
                            <span><?php _e('Gallery','dokmeh');?></span>
                        </div>
                            <div class="projectSingleGallery">
                                <?php foreach ($gallery_images as $image): ?>
                                    <a href="<?php echo esc_url($image['url']); ?>">
                                        <img data-src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($image['alt']); ?>">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                    </div>
                <?php endif; ?>
                <div class="chart-wrapper"></div>
            </div>
            <div class="spec-container">
                <div class="breadCrumbs"><a href="<?php echo get_post_type_archive_link('projects'); ?>"><?php _e('Projects','dokmeh');?></a> / <span><?php the_title(); ?></span></div>
                <p class="des">
                    <?php the_field('des'); ?>
                </p>
                <div class="vr-award">
                    <?php if (get_field('award',$postID)): ?>
                        <div class="item awards">
                            <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5" clip-path="url(#clip0_903_18)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.89114 1.29225C3.79805 1.29225 1.29084 3.79946 1.29084 6.89255C1.29084 9.22055 2.7116 11.2173 4.7333 12.0621H4.73761V12.0638C5.42011 12.348 6.15226 12.4939 6.89157 12.4929C7.63092 12.4937 8.36307 12.3477 9.04554 12.0634V12.0621H9.04898C11.0707 11.2173 12.4914 9.22055 12.4914 6.89255C12.4914 3.79946 9.98423 1.29225 6.89114 1.29225ZM9.90712 12.6092C11.9564 11.5249 13.3535 9.37176 13.3535 6.89255C13.3535 3.32387 10.4603 0.430664 6.89157 0.430664C3.32289 0.430664 0.429688 3.32387 0.429688 6.89255C0.429688 9.37219 1.82675 11.5262 3.87646 12.6092V17.2316C3.87645 17.3096 3.89761 17.3861 3.93768 17.453C3.97776 17.5199 4.03525 17.5747 4.10402 17.6115C4.17279 17.6483 4.25025 17.6657 4.32815 17.6619C4.40605 17.6581 4.48146 17.6333 4.54634 17.59L6.89157 16.0262L9.23724 17.59C9.30212 17.6333 9.37753 17.6581 9.45543 17.6619C9.53333 17.6657 9.6108 17.6483 9.67956 17.6115C9.74833 17.5747 9.80582 17.5199 9.84589 17.453C9.88597 17.3861 9.90713 17.3096 9.90712 17.2316V12.6092ZM9.04554 12.9865C8.35369 13.2308 7.62526 13.3552 6.89157 13.3544C6.13639 13.3544 5.4118 13.2252 4.73804 12.987V16.4269L6.65292 15.15C6.72371 15.1028 6.8069 15.0775 6.892 15.0775C6.97711 15.0775 7.0603 15.1028 7.13109 15.15L9.04554 16.4269V12.9865ZM6.89157 3.877C6.49557 3.877 6.10344 3.955 5.73757 4.10655C5.37171 4.25809 5.03928 4.48022 4.75926 4.76024C4.47924 5.04026 4.25712 5.37269 4.10557 5.73855C3.95403 6.10441 3.87603 6.49654 3.87603 6.89255C3.87603 7.28856 3.95403 7.68069 4.10557 8.04655C4.25712 8.41241 4.47924 8.74485 4.75926 9.02487C5.03928 9.30488 5.37171 9.52701 5.73757 9.67855C6.10344 9.8301 6.49557 9.9081 6.89157 9.9081C7.69135 9.9081 8.45836 9.59039 9.02389 9.02487C9.58941 8.45934 9.90712 7.69232 9.90712 6.89255C9.90712 6.09278 9.58941 5.32576 9.02389 4.76024C8.45836 4.19471 7.69135 3.877 6.89157 3.877ZM3.01444 6.89255C3.01444 5.86427 3.42292 4.87811 4.15003 4.151C4.87713 3.4239 5.8633 3.01542 6.89157 3.01542C7.91985 3.01542 8.90602 3.4239 9.63312 4.151C10.3602 4.87811 10.7687 5.86427 10.7687 6.89255C10.7687 7.92083 10.3602 8.90699 9.63312 9.6341C8.90602 10.3612 7.91985 10.7697 6.89157 10.7697C5.8633 10.7697 4.87713 10.3612 4.15003 9.6341C3.42292 8.90699 3.01444 7.92083 3.01444 6.89255Z"
                                        fill="#006039" stroke="#006039" stroke-width="0.492334" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_903_18">
                                        <rect width="13.7854" height="18.0933" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span><?php the_field('award',$postID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('ar',$postID)): ?>
                        <div class="item vr">
                            <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5" clip-path="url(#clip0_903_16)">
                                    <path
                                        d="M3.33794 4.18499C3.27661 4.3477 3.28149 4.52797 3.35152 4.68712C3.42156 4.84628 3.55118 4.97165 3.71258 5.03635C3.87398 5.10105 4.0543 5.09992 4.21488 5.03321C4.37546 4.9665 4.5035 4.83951 4.57154 4.67949L3.33794 4.18499ZM16.631 4.67949C16.6622 4.76226 16.7096 4.83796 16.7704 4.90217C16.8312 4.96638 16.9042 5.0178 16.9852 5.05342C17.0662 5.08905 17.1534 5.10815 17.2418 5.10963C17.3303 5.1111 17.4181 5.0949 17.5002 5.062C17.5823 5.02909 17.657 4.98012 17.7199 4.91798C17.7829 4.85583 17.8328 4.78174 17.8667 4.70007C17.9006 4.61839 17.9179 4.53076 17.9175 4.44232C17.9172 4.35387 17.8992 4.26639 17.8646 4.18499L16.631 4.67949ZM19.2417 5.58342V10.0286H20.571V5.58209L19.2417 5.58342ZM15.5343 13.7374H14.8138V15.0667H15.5343V13.7374ZM6.39135 13.7374H5.67087V15.0667H6.39135V13.7374ZM1.96211 10.0286V5.58209H0.632812V10.0286H1.96211ZM1.94616 5.60203C7.6039 3.98546 13.6013 3.98546 19.259 5.60203L19.6232 4.32457C13.7274 2.64017 7.47775 2.64017 1.58193 4.32457L1.94616 5.60203ZM5.67087 13.7374C4.68725 13.7374 3.74391 13.3466 3.04838 12.6511C2.35286 11.9556 1.96211 11.0122 1.96211 10.0286H0.632812C0.632813 11.3648 1.16361 12.6462 2.10843 13.5911C3.05324 14.5359 4.33469 15.0667 5.67087 15.0667V13.7374ZM6.13878 13.8876C6.16356 13.8422 6.20007 13.8043 6.2445 13.7779C6.28894 13.7515 6.33965 13.7375 6.39135 13.7374V15.0667C6.57833 15.067 6.76192 15.0168 6.92269 14.9213C7.08345 14.8258 7.21674 14.6887 7.30591 14.5243L6.13878 13.8876ZM7.30591 14.5243C8.72959 11.9149 12.4756 11.9149 13.9006 14.5243L15.0664 13.8876C13.1389 10.3543 8.06494 10.3543 6.13878 13.8876L7.30591 14.5243ZM14.8138 13.7374C14.9202 13.7374 15.0159 13.7945 15.0664 13.8876L13.9006 14.5243C13.9898 14.6887 14.1217 14.8258 14.2825 14.9213C14.4432 15.0168 14.6268 15.067 14.8138 15.0667V13.7374ZM19.243 10.0286C19.243 11.0122 18.8523 11.9556 18.1568 12.6511C17.4613 13.3466 16.5179 13.7374 15.5343 13.7374V15.0667C16.8705 15.0667 18.1519 14.5359 19.0967 13.5911C20.0416 12.6462 20.5723 11.3648 20.5723 10.0286H19.243ZM20.5723 5.58209C20.5723 5.29782 20.4796 5.0213 20.3084 4.7944C20.1371 4.5675 19.8966 4.40257 19.6232 4.32457L19.259 5.60203C19.2545 5.60088 19.2506 5.59832 19.2477 5.59472C19.2448 5.59112 19.2432 5.58669 19.243 5.58209H20.5723ZM1.96211 5.58209C1.96197 5.58669 1.96034 5.59112 1.95746 5.59472C1.95459 5.59832 1.95062 5.60088 1.94616 5.60203L1.58193 4.32457C1.30879 4.40251 1.06844 4.56857 0.897208 4.7952C0.725976 5.02183 0.633168 5.29804 0.632812 5.58209H1.96211ZM3.99861 2.534L3.33794 4.18499L4.57154 4.67949L5.23353 3.02717L3.99861 2.534ZM15.9716 3.02584L16.6323 4.67949L17.8646 4.18499L17.2052 2.534L15.9716 3.02584ZM7.08525 1.77364H14.1199V0.444336H7.08525V1.77364ZM17.2052 2.534C16.9587 1.91724 16.533 1.38852 15.983 1.01605C15.4331 0.643572 14.7841 0.444438 14.1199 0.444336V1.77364C14.5185 1.77357 14.908 1.89296 15.238 2.11641C15.5681 2.33985 15.8236 2.65708 15.9716 3.02717L17.2052 2.534ZM5.23353 3.02584C5.38175 2.656 5.63736 2.33905 5.96741 2.11586C6.29746 1.89266 6.68681 1.77347 7.08525 1.77364V0.444336C6.42104 0.444438 5.77209 0.643572 5.22215 1.01605C4.6722 1.38852 4.24516 1.91724 3.99861 2.534L5.23353 3.02584Z"
                                        fill="#006039" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_903_16">
                                        <rect width="19.9395" height="15.5085" fill="white" transform="translate(0.632812)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span><?php the_field('ar',$postID); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="features">
                    <div class="items">
                        <?php if (have_rows('features')): ?>
                            <?php $count = 0; ?>
                            <?php while (have_rows('features')):
                                the_row(); ?>
                                <?php $count++; ?>
                                <div class="item">
                                    <span class="header"><?php the_sub_field('header'); ?></span>
                                    <span class="body"><?php the_sub_field('body'); ?></span>
                                </div>
                                <?php if ($count == 4)
                                    break; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('features') && $count >= 4): ?>
                        <div class="more items" style="display: none;">
                            <?php while (have_rows('features')):
                                the_row(); ?>
                                <div class="item">
                                    <span class="header"><?php the_sub_field('header'); ?></span>
                                    <span class="body"><?php the_sub_field('body'); ?></span>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="view hover-target">
                            <div class="icon"><span>+</span><span>-</span></div>
                            <div class="text"><span><?php _e('View More','dokmeh');?></span><span><?php _e('View Less','dokmeh');?></span></div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </section>
        <section class="wp-content paddingX">
            <?php the_content(); ?>
        </section>
    <?php endwhile; ?>

    <aside class="related paddingX">
        <div class="title-link">
            <h2 class="title"><?php _e('Related Projects','dokmeh');?></h2>
            <a href="<?php echo get_post_type_archive_link('projects');  ?>" class="hover-target"><?php _e('See All','dokmeh');?></a>
        </div>
        <section class="projectItems">
            <div class="projectBoxes">
                <div class="grid">
                    <?php
                    $related_projects_query = new WP_Query(
                        array(
                            'post_type' => 'projects',
                            'posts_per_page' => 3,
                            'orderby' => 'rand',
                        )
                    );
                    if ($related_projects_query->have_posts()):
                        while ($related_projects_query->have_posts()):
                            $related_projects_query->the_post();
                            ?>
                            <div class="grid-item">
                                <a href="<?php the_permalink(); ?>" class="projectBox">
                                    <div class="hover-reveal"><img class="hidden-img"
                                            src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
                                    <div class="projectBox-img">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                    </div>
                                    <div class="projectBox-info">
                                        <span class="date">
                                            <?php
                                            // Get the current post's ID
                                            $post_id = get_the_ID();

                                            // Get the duration term
                                            $term_name = 'duration';
                                            $parent_term = get_term_by('name', $term_name, 'project_type');
                                            if ($parent_term) {
                                                $parent_term_id = $parent_term->term_id;
                                                $child_terms = wp_get_post_terms($post_id, 'project_type', array('parent' => $parent_term_id));
                                                if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                                    echo $child_terms[0]->name;
                                                }
                                            }
                                            ?>
                                        </span>
                                        <span class="slash">/ </span>
                                        <span class="location">
                                            <?php
                                            // Get the location term
                                            $term_name = 'location';
                                            $parent_term = get_term_by('name', $term_name, 'project_type');
                                            if ($parent_term) {
                                                $parent_term_id = $parent_term->term_id;
                                                $child_terms = wp_get_post_terms($post_id, 'project_type', array('parent' => $parent_term_id));
                                                if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                                    echo $child_terms[0]->name;
                                                }
                                            }
                                            ?>
                                        </span>
                                        <p class="name"><?php the_title(); ?></p>
                                        <p class="category">
                                            <?php
                                            // Get the service term
                                            $term_name = 'service';
                                            $parent_term = get_term_by('name', $term_name, 'project_type');
                                            if ($parent_term) {
                                                $parent_term_id = $parent_term->term_id;
                                                $child_terms = wp_get_post_terms($post_id, 'project_type', array('parent' => $parent_term_id));
                                                if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                                    echo $child_terms[0]->name;
                                                }
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </aside>
</main>
<?php get_footer();