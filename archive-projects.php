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
                    <?php $parentID = $cats[0]->term_id;
                    $args_c = array(
                        'taxonomy' => 'project_type',
                        'hide_empty' => false,
                        'parent' => $parentID
                    );
                    $children = get_categories($args_c);
                    if ($children):?>
                        <div class="projectHeader-container_row-above">
                            <div class="projectHeader-container_row-container">
                                <div class="projectHeader-container_row">
                                    <span class="projectHeader-container_row-title"><?php echo $cats[0]->name; ?></span>
                                    <div class="projectHeader-container_row-items">
                                        <?php foreach ($children as $child): ?>
                                            <span class="project-filter group-<?php echo $parentID;?>" data-id="<?php echo $child->term_id;?>" group ="<?php echo $parentID;?>"><?php echo $child->name; ?></span>
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
                                    $parentID = $cats[$i]->term_id;
                                    $args_c = array(
                                        'taxonomy' => 'project_type',
                                        'hide_empty' => false,
                                        'parent' => $parentID
                                    );
                                    $children = get_categories($args_c);
                                    if ($children):?>
                                        <div class="projectHeader-container_row">
                                            <span class="projectHeader-container_row-title"><?php echo $cats[$i]->name; ?></span>
                                            <div class="projectHeader-container_row-items">
                                                <?php foreach ($children as $child): ?>
                                                    <span class="project-filter group-<?php echo $parentID;?>" data-id="<?php echo $child->term_id;?>" group ="<?php echo $parentID;?>"><?php echo $child->name; ?></span>
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
            'posts_per_page' => 8,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : $count = $query->found_posts;
            $i= ($count > 8) ?  0 : 5; ?>
            <div class="projectBody-container">
                <div class="projectItems">
                    <?php $locationArray = array();
                    while ($query->have_posts()): $query->the_post();
                        $projectID = get_the_ID();
                        $location = get_field('location');
                        $title = get_the_title();
                        $i++;
                        if ($location) {
                            $project_link = get_the_permalink();
                            $locationsArray [] = array($title, $location, get_the_post_thumbnail_url($projectID, 'thumbnail'), $project_link);
                        } ?>
                        <div class="projectItem hover-box" <?php if ($i==4){?> id ="infinity-loading" <?php }?>>
                            <div class="image"><img src="<?php the_post_thumbnail_url('large'); ?>"
                                                    alt="<?php echo $title; ?>"></div>
                            <a href="<?php the_permalink(); ?>" aria-label="project-01" class="info hover-info">
                                <spna class="name"><?php echo $title; ?></spna>
                                <?php $year = wp_get_object_terms($projectID, 'project_type', array('parent' => 5));
                                $loc = wp_get_object_terms($projectID, 'project_type', array('parent' => 93));
                                if ($year OR $loc):?>
                                    <span class="dateLoc"><?php echo ($year ? $year[0]->name : '') . ($loc ? (' - ' . $loc[0]->name) : ''); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();?>
                </div>
                <div class="see-more" id="see-more" offset = 8 style="display: none;">
                    <span> <?php _e('loading','dokmeh');?></span>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php if($locationsArray){?>
    <div id="mapProjectsContainer">
        <div id="mapProjects"></div>
        <div id="closeMap">
            <img src="<?php ThemeAssets('img/link.svg');?>" alt="link icon">
            <span>close</span>
        </div>
    </div>
<?php }
    include get_template_directory() . '/footer.php';
