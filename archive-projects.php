<?php get_header(); ?>
    <main class="wrapper">
        <div id="newsletterLink-container">
            <span>Monthly Newsletter</span>
            <a href="">
                <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="link">
                Subscribe here
            </a>
        </div>
        <?php $args = array(
            'taxonomy' => 'project_type',
            'parent' => 0
        );
        $cats = get_categories($args);
        if ($cats):?>
            <div class="projectHeader-container">
                <div class="projectHeader-wrapper">
                    <?php $args_c = array(
                        'taxonomy' => 'project_type',
                        'hide_empty' => false,
                        'parent' => $cats[0]->term_id
                    );
                    $children = get_categories($args_c);
                    if ($children):?>
                        <div class="projectHeader-container_row-above">
                            <div class="projectHeader-container_row-container">
                                <div class="projectHeader-container_row">
                                    <span class="projectHeader-container_row-title"><?php echo $cats[0]->name; ?></span>
                                    <div class="projectHeader-container_row-items">
                                        <?php foreach ($children as $child): ?>
                                            <span><?php echo $child->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="projectHeader-container_row-under">
                        <?php $size = sizeof($cats);
                        if ($size > 1):?>
                            <div class="projectHeader-container_row-container">
                                <?php for ($i = 1; $i < $size; $i++):
                                    $args_c = array(
                                        'taxonomy' => 'project_type',
                                        'hide_empty' => false,
                                        'parent' => $cats[$i]->term_id
                                    );
                                    $children = get_categories($args_c);
                                    if ($children):?>
                                        <div class="projectHeader-container_row">
                                            <span class="projectHeader-container_row-title"><?php echo $cats[$i]->name; ?></span>
                                            <div class="projectHeader-container_row-items">
                                                <?php foreach ($children as $child): ?>
                                                    <span><?php echo $child->name; ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                endfor; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mapView_icon">
                            <span>Map View</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        $outputHTML = '';
        if ($query->have_posts()) :?>
            <div class="projectBody-container">
                <div class="projectItems">
                    <?php $locationArray = array();
                    while ($query->have_posts()): $query->the_post();
                        $projectID = get_the_ID();
                        $location = get_field('location');
                        $title = get_the_title();
                        if ($location) {
                            $project_link = get_the_permalink();
                            $locationsArray [] = array($title, $location, get_the_post_thumbnail_url($projectID, 'thumbnail'), $project_link);
                        } ?>
                        <div class="projectItem hover-box">
                            <div class="image"><img src="<?php the_post_thumbnail_url('large'); ?>"
                                                    alt="<?php echo $title; ?>"></div>
                            <a href="<?php the_permalink(); ?>" aria-label="project-01" class="info hover-info">
                                <spna class="name"><?php echo $title; ?></spna>
                                <?php $year = wp_get_object_terms($projectID, 'project_type', array('parent' => 5));
                                $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 93));
                                if ($year OR $loc):?>
                                    <span class="dateLoc"><?php echo ($year ? $year[0]->name : '') . ($loc ? (' - ' . $loc) : ''); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php include get_template_directory() . '/footer.php';
