<?php get_header();
$page_id = get_queried_object_id(); ?>
    <main class="wrapper">
        <div id="newsletterLink-container">
            <span>Monthly Newsletter</span>
            <a href="">
                <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="link">
                Subscribe here
            </a>
        </div>
        <div class="projectHeader-container">
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
        if ($Blogs->have_posts()):$count = $Blogs->found_posts; ?>
            <div class="blogBody">
                <div class="blogItems">
                    <?php while ($Blogs->have_posts()):$Blogs->the_post();
                        $blogID = get_the_ID(); ?>
                        <div class="blogItem">
                            <div class="blogItem-info">
                                <a href="<?php the_permalink(); ?>" aria-label="blog-01">
                                    <h2 class="title"><?php the_title(); ?></h2>
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
                            <a href="<?php the_permalink(); ?>" aria-label="blog-01" class="blogItem-media">
                                <img src="<?php the_post_thumbnail_url($blogID, 'large'); ?>" alt="blog-01">
                                <span class="date"><?php echo get_the_date('Y.M.d'); ?></span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php get_footer();