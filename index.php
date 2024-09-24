<?php get_header();
$page_id = get_queried_object_id();  // دریافت شناسه صفحه فعلی?>
<main class="wrapper newsWrapper">
    <section class="pageIntro projectIntro paddingX">
        <img class="background" src="<?php ThemeAssets('img/intro-logo.png'); ?>" alt="">
        <div class="info">
            <h1 class="title">/ <?php echo get_the_title($page_id);?></h1>
            <?php
                // Get the original text from the textarea field
                $original_text = get_field('news_title',$page_id);
                // Get the repeater field
                $repeater_field = get_field('color_text',$page_id);
                // If the original text and the repeater field exist
                if ($original_text && $repeater_field) {
                    // Loop through each item in the repeater field
                    foreach ($repeater_field as $item) {
                        // Get the word from the repeater field
                        $word = $item['color_word'];
                        // Replace the word in the original text with the colorful version
                        $original_text = str_replace($word, '<span class="colorful">' . $word . '</span>', $original_text);
                    }
                    // Output the modified text
                    echo '<p class="description">' . $original_text . '</p>';
                }?>
            <div id="root">
                <img src="<?php ThemeAssets('img/root.svg');?>" alt="">
            </div>
        </div>
    </section>
    <section class="newsContainer paddingX">
        <div class="search-filter-wrapper">
            <div class="search-wrap">
                <form action="">
                    <input type="image" id="searchBlogImage" name="searchBlogImage" src="<?php ThemeAssets('img/search.svg'); ?>" class="hover-target">
                    <label>
                        <input type="text" placeholder="<?php _e('Search','dokmeh');?>" id="searchNews" name="searchNews"/>
                    </label>
                </form>
            </div>
            <div class="sort-select-box">
                <span class="title-item"><?php _e('sort by','dokmeh');?></span>
                <div class="sort-list-wrapper">
                    <div class="header hover-target"><span><?php _e('newest','dokmeh');?></span></div>
                    <div class="body" style="display: block;">
                        <div class="body-list">
                            <p class="order-blog selected hover-target" data-id="0"><?php _e('newest','dokmeh');?></p>
                            <p class="order-blog hover-target" data-id="1"><?php _e('popular','dokmeh');?></p>
                            <p class="order-blog hover-target" data-id="2"><?php _e('oldest','dokmeh');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // Query to retrieve the latest 15 posts
        $per_page = 6;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $per_page,
        );
        $latest_posts_query = new WP_Query($args);
        // Check if there are any posts
        if ($latest_posts_query->have_posts()) :$count = $query->found_posts;
//                $i =1;
            ($count> $per_page) ? $i = 1 : $i= 1000;?>
            <div class="newItemsWrapper">
                <?php while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
                     $lastID = get_the_ID(); ?>
                    <a href="<?php the_permalink(); ?>" class="newsWrap" <?php if($i==$per_page)  echo ' id ="last-more-news" count="'.$per_page.'"'; ?>>
                        <div class="news-media">
                            <img data-src="<?php the_post_thumbnail_url($lastID, 'large'); ?>" alt="" class="lazyload blur-up">
                        </div>
                        <div class="news-info">
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <p class="news-name"><?php the_title(); ?></p>
                        </div>
                    </a>
                <?php $i++;
                endwhile; ?>
            </div>
            <?php            // Restore original post data
            wp_reset_postdata();
        else : ?>
            <p><?php esc_html_e('No posts found'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();