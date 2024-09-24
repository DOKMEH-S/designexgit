<?php get_header(); ?>
    <main class="wrapper projectWrapper">
        <section class="pageIntro projectIntro paddingX">
            <img class="background" src="<?php ThemeAssets('img/intro-logo.png');?>" alt="intro-logo">
            <div class="info">
                <?php $project_title = get_field('project_title','option');?>
                <h1 class="title">/ <?php echo $project_title ? $project_title : __('Our projects','dokmeh');?></h1>
                <?php
                // Get the original text from the textarea field
                $original_text = get_field('project_description','option');

                // Get the repeater field
                $repeater_field = get_field('color_text_c','option');

                // If the original text and the repeater field exist
                if ($original_text && $repeater_field) {
                    // Loop through each item in the repeater field
                    foreach ($repeater_field as $item) {
                        // Get the word from the repeater field
                        $word = $item['color_word_c'];

                        // Replace the word in the original text with the colorful version
                        $original_text = str_replace($word, '<span class="colorful">' . $word . '</span>', $original_text);
                    }

                    // Output the modified text
                    echo '<p class="description">' . $original_text . '</p>';
                }
                ?>
                <div id="root">
                    <img src="<?php ThemeAssets('img/root.svg');?>" alt="">
                </div>
            </div>
        </section>
        <?php $args = array(
            'post_type' => 'projects',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        $outputHTML = '';
        if ($query->have_posts()) :?>
            <section class="projectItems">
                <div class="projectButtons paddingX">
                    <div class="displayType">
                        <div id="listDisplay" class="isotope hover-target">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H4V3H0V0ZM0 4H4V7H0V4ZM0 12H4V15H0V12ZM0 8H4V11H0V8ZM5 0H16V3H5V0ZM5 4H16V7H5V4ZM5 12H16V15H5V12ZM5 8H16V11H5V8Z"
                                      fill="#2D2D2D"/>
                            </svg>
                            <span><?php _e('List','dokmeh');?></span>
                        </div>
                        <div id="gridDisplay" class="isotope hover-target selected">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 16H4.675V11.344H0V16ZM5.675 16H10.325V11.344H5.675V16ZM11.325 16H16V11.344H11.325V16ZM0 10.344H4.675V5.656H0V10.344ZM5.675 10.344H10.325V5.656H5.675V10.344ZM11.325 10.344H16V5.656H11.325V10.344ZM0 4.656H4.675V0H0V4.656ZM5.675 4.656H10.325V0H5.675V4.656ZM11.325 4.656H16V0H11.325V4.656Z"
                                      fill="#2D2D2D"/>
                            </svg>
                            <span><?php _e('Grid','dokmeh');?></span>
                        </div>
                        <div id="mapDisplay" class="hover-target">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.1 11.2C3.14657 11.1379 3.20697 11.0875 3.27639 11.0528C3.34582 11.0181 3.42238 11 3.5 11H6C6.13261 11 6.25979 11.0527 6.35355 11.1464C6.44732 11.2402 6.5 11.3674 6.5 11.5C6.5 11.6326 6.44732 11.7598 6.35355 11.8536C6.25979 11.9473 6.13261 12 6 12H3.75L1.5 15H14.5L12.25 12H10C9.86739 12 9.74021 11.9473 9.64645 11.8536C9.55268 11.7598 9.5 11.6326 9.5 11.5C9.5 11.3674 9.55268 11.2402 9.64645 11.1464C9.74021 11.0527 9.86739 11 10 11H12.5C12.5776 11 12.6542 11.0181 12.7236 11.0528C12.793 11.0875 12.8534 11.1379 12.9 11.2L15.9 15.2C15.9557 15.2743 15.9896 15.3626 15.998 15.4551C16.0063 15.5476 15.9887 15.6406 15.9472 15.7236C15.9057 15.8067 15.8419 15.8765 15.7629 15.9253C15.6839 15.9741 15.5929 16 15.5 16H0.5C0.407144 16 0.316123 15.9741 0.237135 15.9253C0.158147 15.8765 0.0943131 15.8067 0.0527866 15.7236C0.0112602 15.6406 -0.00631841 15.5476 0.00202058 15.4551C0.0103596 15.3626 0.0442867 15.2743 0.1 15.2L3.1 11.2Z"
                                      fill="#2D2D2D"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4 3.99963C4.00007 3.22986 4.22226 2.47645 4.63989 1.82982C5.05753 1.18319 5.65288 0.670801 6.3545 0.354136C7.05613 0.0374708 7.83422 -0.0700184 8.59542 0.044566C9.35662 0.15915 10.0686 0.490941 10.6459 1.00013C11.2232 1.50931 11.6413 2.17426 11.8501 2.91518C12.0589 3.65611 12.0494 4.44153 11.8228 5.17722C11.5963 5.9129 11.1623 6.56759 10.5729 7.06272C9.98349 7.55786 9.26374 7.87241 8.5 7.96863V13.4996C8.5 13.6322 8.44732 13.7594 8.35355 13.8532C8.25979 13.947 8.13261 13.9996 8 13.9996C7.86739 13.9996 7.74022 13.947 7.64645 13.8532C7.55268 13.7594 7.5 13.6322 7.5 13.4996V7.96963C6.53297 7.84779 5.64369 7.37707 4.99922 6.64586C4.35474 5.91466 3.99942 4.97431 4 3.99963Z"
                                      fill="#2D2D2D"/>
                            </svg>
                            <span><?php _e('Map','dokmeh');?></span>
                        </div>
                    </div>
                    <?php $args = array(
                        'taxonomy' => 'project_type',
                        'parent' => 0
                    );
                    $cats = get_categories($args);
                    if ($cats):?>
                        <div class="filterType">
                            <div class="filter-container" data-lenis-prevent>
                                <span class="selectAll hover-target"><?php _e('Clear All','dokmeh');?></span>
                                <div class="accordion">
                                    <?php foreach ($cats as $cat):
                                        $args_c = array(
                                            'taxonomy' => 'project_type',
                                            'hide_empty' => false,
                                            'parent' => $cat->term_id
                                        );
                                        $children = get_categories($args_c);
                                        if ($children):?>
                                            <div class="item hover-target">
                                                <div class="label">
                <span class="sign">
                  <i>+ </i>
                  <i>- </i>
                </span>
                                                    <span><?php echo $cat->name; ?></span>
                                                </div>
                                                <div class="checkBoxes">
                                                    <?php foreach ($children as $child): ?>
                                                        <div class="checkBox hover-target"
                                                             data-id="<?php echo $child->term_id; ?>">
                                                            <div class="square"></div>
                                                            <span class="label"><?php echo $child->name; ?></span>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                            <span class="hover-target"><?php _e('Filter','dokmeh');?></span>
                            <div class="all hover-target selected">
                                <span class="allLabel"><?php _e('All','dokmeh');?></span>
                                <span class="numberLabel">(<i>3</i> <?php _e('item selected','dokmeh');?>)</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="projectBoxes paddingX">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>
                        <div class="grid-item viewListTitle">
                            <span id="sortProjects" class="hover-target"><?php _e('Project','dokmeh');?></span>
                            <span id="sortServices" class="hover-target"><?php _e('services','dokmeh');?></span>
                            <span id="sortYear" class="hover-target" type="desc"><?php _e('year','dokmeh');?></span>
                            <span id="sortLocation" class="hover-target"><?php _e('location','dokmeh');?></span>
                        </div>
                        <?php $locationArray = array();
                        while ($query->have_posts()): $query->the_post();
                            $projectID = get_the_ID();
                            $location = get_field('location');
                            if ($location) {
                                $project_link = get_the_permalink();
                                $locationsArray [] = array(get_the_title(), $location, get_the_post_thumbnail_url($projectID, 'thumbnail'), $project_link);
                            } ?>
                            <div class="grid-item filter-item">
                                <a href="<?php the_permalink(); ?>" class="projectBox">
                                    <div class="hover-reveal">
                                        <img class="hidden-img" src="<?php the_post_thumbnail_url('large'); ?>" alt="">
                                    </div>
                                    <div class="projectBox-img">
                                        <?php the_post_thumbnail($projectID, 'large'); ?>
                                    </div>
                                    <div class="projectBox-info">
                                        <div class="vr-award">
                                            <?php if (get_field('award',$projectID)): ?>
                                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.5" clip-path="url(#clip0_903_18)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89114 1.29225C3.79805 1.29225 1.29084 3.79946 1.29084 6.89255C1.29084 9.22055 2.7116 11.2173 4.7333 12.0621H4.73761V12.0638C5.42011 12.348 6.15226 12.4939 6.89157 12.4929C7.63092 12.4937 8.36307 12.3477 9.04554 12.0634V12.0621H9.04898C11.0707 11.2173 12.4914 9.22055 12.4914 6.89255C12.4914 3.79946 9.98423 1.29225 6.89114 1.29225ZM9.90712 12.6092C11.9564 11.5249 13.3535 9.37176 13.3535 6.89255C13.3535 3.32387 10.4603 0.430664 6.89157 0.430664C3.32289 0.430664 0.429688 3.32387 0.429688 6.89255C0.429688 9.37219 1.82675 11.5262 3.87646 12.6092V17.2316C3.87645 17.3096 3.89761 17.3861 3.93768 17.453C3.97776 17.5199 4.03525 17.5747 4.10402 17.6115C4.17279 17.6483 4.25025 17.6657 4.32815 17.6619C4.40605 17.6581 4.48146 17.6333 4.54634 17.59L6.89157 16.0262L9.23724 17.59C9.30212 17.6333 9.37753 17.6581 9.45543 17.6619C9.53333 17.6657 9.6108 17.6483 9.67956 17.6115C9.74833 17.5747 9.80582 17.5199 9.84589 17.453C9.88597 17.3861 9.90713 17.3096 9.90712 17.2316V12.6092ZM9.04554 12.9865C8.35369 13.2308 7.62526 13.3552 6.89157 13.3544C6.13639 13.3544 5.4118 13.2252 4.73804 12.987V16.4269L6.65292 15.15C6.72371 15.1028 6.8069 15.0775 6.892 15.0775C6.97711 15.0775 7.0603 15.1028 7.13109 15.15L9.04554 16.4269V12.9865ZM6.89157 3.877C6.49557 3.877 6.10344 3.955 5.73757 4.10655C5.37171 4.25809 5.03928 4.48022 4.75926 4.76024C4.47924 5.04026 4.25712 5.37269 4.10557 5.73855C3.95403 6.10441 3.87603 6.49654 3.87603 6.89255C3.87603 7.28856 3.95403 7.68069 4.10557 8.04655C4.25712 8.41241 4.47924 8.74485 4.75926 9.02487C5.03928 9.30488 5.37171 9.52701 5.73757 9.67855C6.10344 9.8301 6.49557 9.9081 6.89157 9.9081C7.69135 9.9081 8.45836 9.59039 9.02389 9.02487C9.58941 8.45934 9.90712 7.69232 9.90712 6.89255C9.90712 6.09278 9.58941 5.32576 9.02389 4.76024C8.45836 4.19471 7.69135 3.877 6.89157 3.877ZM3.01444 6.89255C3.01444 5.86427 3.42292 4.87811 4.15003 4.151C4.87713 3.4239 5.8633 3.01542 6.89157 3.01542C7.91985 3.01542 8.90602 3.4239 9.63312 4.151C10.3602 4.87811 10.7687 5.86427 10.7687 6.89255C10.7687 7.92083 10.3602 8.90699 9.63312 9.6341C8.90602 10.3612 7.91985 10.7697 6.89157 10.7697C5.8633 10.7697 4.87713 10.3612 4.15003 9.6341C3.42292 8.90699 3.01444 7.92083 3.01444 6.89255Z" fill="#2D2D2D" stroke="#2D2D2D" stroke-width="0.492334"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_903_18">
                                                            <rect width="13.7854" height="18.0933" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            <?php endif; ?>
                                            <?php if (get_field('ar',$projectID)): ?>
                                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.5" clip-path="url(#clip0_903_16)">
                                                        <path d="M3.33794 4.18499C3.27661 4.3477 3.28149 4.52797 3.35152 4.68712C3.42156 4.84628 3.55118 4.97165 3.71258 5.03635C3.87398 5.10105 4.0543 5.09992 4.21488 5.03321C4.37546 4.9665 4.5035 4.83951 4.57154 4.67949L3.33794 4.18499ZM16.631 4.67949C16.6622 4.76226 16.7096 4.83796 16.7704 4.90217C16.8312 4.96638 16.9042 5.0178 16.9852 5.05342C17.0662 5.08905 17.1534 5.10815 17.2418 5.10963C17.3303 5.1111 17.4181 5.0949 17.5002 5.062C17.5823 5.02909 17.657 4.98012 17.7199 4.91798C17.7829 4.85583 17.8328 4.78174 17.8667 4.70007C17.9006 4.61839 17.9179 4.53076 17.9175 4.44232C17.9172 4.35387 17.8992 4.26639 17.8646 4.18499L16.631 4.67949ZM19.2417 5.58342V10.0286H20.571V5.58209L19.2417 5.58342ZM15.5343 13.7374H14.8138V15.0667H15.5343V13.7374ZM6.39135 13.7374H5.67087V15.0667H6.39135V13.7374ZM1.96211 10.0286V5.58209H0.632812V10.0286H1.96211ZM1.94616 5.60203C7.6039 3.98546 13.6013 3.98546 19.259 5.60203L19.6232 4.32457C13.7274 2.64017 7.47775 2.64017 1.58193 4.32457L1.94616 5.60203ZM5.67087 13.7374C4.68725 13.7374 3.74391 13.3466 3.04838 12.6511C2.35286 11.9556 1.96211 11.0122 1.96211 10.0286H0.632812C0.632813 11.3648 1.16361 12.6462 2.10843 13.5911C3.05324 14.5359 4.33469 15.0667 5.67087 15.0667V13.7374ZM6.13878 13.8876C6.16356 13.8422 6.20007 13.8043 6.2445 13.7779C6.28894 13.7515 6.33965 13.7375 6.39135 13.7374V15.0667C6.57833 15.067 6.76192 15.0168 6.92269 14.9213C7.08345 14.8258 7.21674 14.6887 7.30591 14.5243L6.13878 13.8876ZM7.30591 14.5243C8.72959 11.9149 12.4756 11.9149 13.9006 14.5243L15.0664 13.8876C13.1389 10.3543 8.06494 10.3543 6.13878 13.8876L7.30591 14.5243ZM14.8138 13.7374C14.9202 13.7374 15.0159 13.7945 15.0664 13.8876L13.9006 14.5243C13.9898 14.6887 14.1217 14.8258 14.2825 14.9213C14.4432 15.0168 14.6268 15.067 14.8138 15.0667V13.7374ZM19.243 10.0286C19.243 11.0122 18.8523 11.9556 18.1568 12.6511C17.4613 13.3466 16.5179 13.7374 15.5343 13.7374V15.0667C16.8705 15.0667 18.1519 14.5359 19.0967 13.5911C20.0416 12.6462 20.5723 11.3648 20.5723 10.0286H19.243ZM20.5723 5.58209C20.5723 5.29782 20.4796 5.0213 20.3084 4.7944C20.1371 4.5675 19.8966 4.40257 19.6232 4.32457L19.259 5.60203C19.2545 5.60088 19.2506 5.59832 19.2477 5.59472C19.2448 5.59112 19.2432 5.58669 19.243 5.58209H20.5723ZM1.96211 5.58209C1.96197 5.58669 1.96034 5.59112 1.95746 5.59472C1.95459 5.59832 1.95062 5.60088 1.94616 5.60203L1.58193 4.32457C1.30879 4.40251 1.06844 4.56857 0.897208 4.7952C0.725976 5.02183 0.633168 5.29804 0.632812 5.58209H1.96211ZM3.99861 2.534L3.33794 4.18499L4.57154 4.67949L5.23353 3.02717L3.99861 2.534ZM15.9716 3.02584L16.6323 4.67949L17.8646 4.18499L17.2052 2.534L15.9716 3.02584ZM7.08525 1.77364H14.1199V0.444336H7.08525V1.77364ZM17.2052 2.534C16.9587 1.91724 16.533 1.38852 15.983 1.01605C15.4331 0.643572 14.7841 0.444438 14.1199 0.444336V1.77364C14.5185 1.77357 14.908 1.89296 15.238 2.11641C15.5681 2.33985 15.8236 2.65708 15.9716 3.02717L17.2052 2.534ZM5.23353 3.02584C5.38175 2.656 5.63736 2.33905 5.96741 2.11586C6.29746 1.89266 6.68681 1.77347 7.08525 1.77364V0.444336C6.42104 0.444438 5.77209 0.643572 5.22215 1.01605C4.6722 1.38852 4.24516 1.91724 3.99861 2.534L5.23353 3.02584Z" fill="#2D2D2D"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_903_16">
                                                            <rect width="19.9395" height="15.5085" fill="white" transform="translate(0.632812)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                        <?php $year = wp_get_object_terms($projectID, 'project_type', array('parent' => 5));
                                        if ($year):?>
                                            <span class="date"><?php echo $year[0]->name; ?></span>
                                        <?php endif;
                                        $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 3));
                                        if ($loc):?>
                                            <span class="slash">/ </span>
                                            <span class="location"><?php echo $loc[0]->name; ?></span>
                                        <?php endif; ?>
                                        <p class="name"><?php the_title(); ?></p>
                                        <?php $type = wp_get_object_terms($projectID, 'project_type', array('parent' => 2));
                                        if ($type):?>
                                            <p class="category"><?php echo $type[0]->name; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="projectMap" id="map"><img src="<?php ThemeAssets('img/sample/map.png'); ?>" alt=""></div>
            </section>
        <?php endif; ?>
    </main>
<?php include get_template_directory() . '/footer.php';
