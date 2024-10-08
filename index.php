<?php get_header();
$page_id = get_queried_object_id(); ?>
    <main class="wrapper" id="scrollDestination">
        <div class="projectHeader-container">
        <div class="mobileIcon">
                <span class="open">open filter</span>
                <span class="close">close filter</span>
            </div>
            <div class="projectHeader-wrapper">
                <?php $terms = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ]);
                if ($terms):?>
                    <div class="projectHeader-container_row-above">
                        <div class="projectHeader-container_row-container">
                            <div class="projectHeader-container_row">
                                <span class="projectHeader-container_row-title">Main Tag</span>
                                <div class="projectHeader-container_row-items">
                                    <?php foreach ($terms as $term): ?>
                                        <span class="blog-cat"
                                              data-id="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $tags = get_tags(array(
                    'hide_empty' => true
                ));
                if ($tags):?>
                    <div class="projectHeader-container_row-under">
                        <div class="projectHeader-container_row-container">
                            <div class="projectHeader-container_row">
                                <span class="projectHeader-container_row-title">Filter</span>
                                <div class="projectHeader-container_row-items">
                                    <?php foreach ($tags as $tag) : ?>
                                        <span class="blog-tag"
                                              data-id="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $Args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'paged' => 1,
        );
        $Blogs = new WP_Query($Args);
        if ($Blogs->have_posts()):$count = $Blogs->found_posts;
            $i= ($count > 4) ?  0 : 5;?>
            <div class="blogBody">
                <div class="blogItems">
                    <?php while ($Blogs->have_posts()):$Blogs->the_post();
                        $blogID = get_the_ID();
                        $i++;
                        $title = get_the_title();?>
                        <div class="blogItem" <?php if ($i==2){?> id ="infinity-loading" <?php }?>>
                            <div class="blogItem-info">
                                <a href="<?php the_permalink(); ?>" aria-label="<?php echo $title;?>">
                                    <h2 class="title"><?php echo $title;?></h2>
                                </a>
                                <div class="blogItem-info_more">
                                        <p class="des"><?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30 , ' ...'); ?></p>
                                    <?php $tags = get_the_tags();
                                    if ($tags) :?>
                                        <div class="tags">
                                            <?php foreach ($tags as $tag) { ?>
                                                <a aria-label="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
                                            <?php } ?>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" aria-label="Read More" class="link">Read
                                        More</a>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php echo $title;?>" class="blogItem-media">
                                <img src="<?php the_post_thumbnail_url($blogID, 'large'); ?>" alt="<?php echo $title;?>">
                                
                            </a>
                            <span class="date"><?php echo get_the_date('Y.M.d'); ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="see-more" id="see-more" offset =4 style="display: none;">
                    <span> <?php _e('loading','dokmeh');?></span>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php get_footer();