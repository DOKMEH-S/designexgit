<?php get_header(); ?>
    <main class="wrapper" id="scrollDestination">
        <?php $args = array(
            'taxonomy' => 'project_type',
            'parent' => 0
        );
        $cats = get_categories($args);
        if ($cats): ?>
            <div class="projectHeader-container">
                <div class="mobileIcon">
                    <span class="open">open filter</span>
                    <span class="close">close filter</span>
                </div>
                <div class="projectHeader-wrapper" data-lenis-prevent>
                    <?php $parentID = $cats[0]->term_id;
                    $args_c = array(
                        'taxonomy' => 'project_type',
                        'hide_empty' => false,
                        'parent' => $parentID
                    );
                    $children = get_categories($args_c);
                    if ($children): ?>
                        <div class="mapView_icon mobile">
                            <span>Map View</span>
                        </div>
                        <div class="projectHeader-container_row-above">
                            <div class="projectHeader-container_row-container">
                                <div class="projectHeader-container_row">
                                    <span class="projectHeader-container_row-title"><?php echo $cats[0]->name; ?></span>
                                    <div class="projectHeader-container_row-items">
                                        <?php foreach ($children as $child): ?>
                                            <span class="project-filter group-<?php echo $parentID; ?>"
                                                  data-id="<?php echo $child->term_id; ?>"
                                                  group="<?php echo $parentID; ?>"><?php echo $child->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="projectHeader-container_row-under">
                        <?php $size = sizeof($cats);
                        if ($size > 1): ?>
                            <div class="projectHeader-container_row-container">
                                <?php for ($i = 1; $i < $size; $i++):
                                    $parentID = $cats[$i]->term_id;
                                    $args_c = array(
                                        'taxonomy' => 'project_type',
                                        'hide_empty' => false,
                                        'parent' => $parentID
                                    );
                                    $children = get_categories($args_c);
                                    if ($children): ?>
                                        <div class="projectHeader-container_row">
                                            <span class="projectHeader-container_row-title"><?php echo $cats[$i]->name; ?></span>
                                            <div class="projectHeader-container_row-items">
                                                <?php foreach ($children as $child): ?>
                                                    <span class="project-filter group-<?php echo $parentID; ?>"
                                                          data-id="<?php echo $child->term_id; ?>"
                                                          group="<?php echo $parentID; ?>"><?php echo $child->name; ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                endfor; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mapView_icon desktop">
                            <span>Map View</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => 12,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()):
            $count = $query->found_posts;
            $i = ($count > 12) ? 0 : 5; ?>
            <div class="projectBody-container">
                <div class="projectItems">
                    <?php $locationArray = array();
                    while ($query->have_posts()):
                        $query->the_post();
                        $projectID = get_the_ID();
                        $location = get_field('location');
                        $title = get_the_title();
                        $i++;
                        if ($location) {
                            $project_link = get_the_permalink();
                            $locationsArray[] = array($title, $location, get_the_post_thumbnail_url($projectID, 'thumbnail'), $project_link);
                        }
                        $coming_soon = get_field('coming_soon'); ?>
                        <div class="projectItem hover-box <?php if ($coming_soon) echo 'deactive-link'; ?>" <?php if ($i == 4) { ?> id="infinity-loading" <?php } ?>>
                            <div class="image"><img src="<?php the_post_thumbnail_url('large'); ?>"  alt="<?php echo $title; ?>">
                            </div>
                            <?php if ($coming_soon): ?>
                                <div class="coming-soon">
                                    <span>coming soon</span>
                                </div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php echo $title; ?>"
                               class="info hover-info">
                                <spna class="name"><?php echo $title; ?></spna>
                                <?php $year = get_field('year');
                                $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 93));
                                if ($year or $loc): ?>
                                    <span class="dateLoc"><?php echo ($year ? ($year . ' - ') : '') . ($loc ? ($loc[0]->name) : ''); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <div class="see-more" id="see-more" offset=12 style="display: none;">
                    <span> <?php _e('loading', 'dokmeh'); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php if ($locationsArray) { ?>
    <div id="mapProjectsContainer">
        <div id="mapProjects"></div>
        <div id="closeMap">
            <img src="<?php ThemeAssets('img/link-primary.svg'); ?>" alt="link icon">
            <span>close</span>
        </div>
    </div>
<?php }
include get_template_directory() . '/footer.php';
