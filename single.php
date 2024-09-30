<?php get_header(); ?>
    <main class="wrapper">
        <?php while (have_posts()) : the_post();
            $postID = get_the_ID();
            global $post; ?>
            <div id="newsletterLink-container">
                <span>Monthly Newsletter</span>
                <a href="">
                    <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="link">
                    Subscribe here
                </a>
            </div>
            <section class="dateTime-title">
                <div class="dateTime">
                    <span class="date"><?php echo get_the_date('Y.M.d'); ?></span>
                    <?php $content = get_the_content();
                    $wordcount = str_word_count(strip_tags($content));
                    $time = ceil($wordcount / 200); ?>
                    <span><img src="<?php ThemeAssets('img/clock.webp'); ?>"
                               alt="clock icon"><?php echo $time . ($time == 1 ? ' minute' : ' minutes') . ' to Read'; ?></span>
                </div>
                <h1><?php the_title(); ?></h1>
            </section>
            <section class="blog-Information">
                <div class="blog-Information_text">
                    <?php $author_id = $post->post_author; ?>
                    <div class="author">
                        <?php $author_img = get_avatar_url($author_id);
                        if ($author_img):?>
                            <img src="<?php echo $author_img; ?>" alt="author image">
                        <?php endif; ?>
                        <div class="div">
                            <span>Author:</span>
                            <span><?php the_author_meta('display_name', $author_id); ?> </span>
                        </div>
                    </div>
                    <?php if (has_excerpt()) : ?>
                        <div class="description">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    <?php endif;
                    $tags = get_the_tags();
                    if ($tags) :?>
                        <div class="tags">
                            <?php foreach ($tags as $tag) { ?>
                                <div aria-label="<?php echo $tag->name ?>"><?php echo $tag->name ?></div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="blog-Information_media">
                    <img src="<?php the_post_thumbnail_url($postID, 'large'); ?>" alt="<?php the_title(); ?>">
                </div>
            </section>
            <section class="blog-wpContent">
                <?php echo $content; ?>
            </section>
            <?php $categories = wp_get_object_terms($postID, 'category', array('fields' => 'ids'));
            $query_args = array(
                'post_type' => 'post',
                'category__in' => ($categories),
                'post__not_in' => array($postID),
                'posts_per_page' => '3',
            );
            $related_cats_post = new WP_Query($query_args);
            if ($related_cats_post->have_posts()): ?>
                <aside class="related">
                    <h2 class="">Related Articles</h2>
                    <div class="relatedBlogWrapper">
                        <?php while ($related_cats_post->have_posts()):
                            $related_cats_post->the_post();
                            $relID = get_the_ID(); ?>
                            <div class="relatedBlogWrap">
                                <div class="blogMedia">
                                    <img src="<?php the_post_thumbnail($relID, 'medium'); ?>"
                                         alt="<?php echo get_the_title($relID); ?>">
                                </div>
                                <a href="<?php the_permalink(); ?>" class="blog-info">
                                    <p class="blog-name"><?php echo get_the_title($relID); ?></p>
                                    <div class="year-location">
                                        <span><?php echo get_the_date('Y.M.d'); ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </aside>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>
<?php get_footer();
