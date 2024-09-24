<?php get_header(); ?>
<main class="wrapper newsWrapper">
    <section class="pageIntro projectIntro paddingX">
        <img class="background" src="<?php ThemeAssets('img/intro-logo.png'); ?>" alt="">
        <div class="info">
            <h1 class="title">/ rethink</h1>
            <p class="description">
                <?php echo get_field('rethink_title', 'option'); ?>
            </p>
            <div id="root">
                <img src="<?php ThemeAssets('img/root.svg');?>" alt="">
            </div>
        </div>
    </section>
    <section class="rethinks-container paddingX">
        <div class="grid">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php
            // Query posts
            $per_page = 6;
            $args = array(
                'post_type' => 'rethink', // or your custom post type if any
                'posts_per_page' => $per_page // -1 to display all posts
            );
            $query = new WP_Query($args);
            // Check if there are any posts
            if ($query->have_posts()) :  $count = $query->found_posts;
//                $i =1;
                ($count> $per_page) ? $i = 1 : $i= 1000;
                // Loop through posts
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="grid-item" <?php if($i==$per_page)  echo ' id ="last-load-more" count="'.$per_page.'"'; ?> >
                        <a href="<?php the_permalink(); ?>" class="rethink-wrap">
                            <div class="rethink-media">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="">
                            </div>
                            <div class="rethink-info">
                                <h2 class="name"><?php the_title(); ?></h2>
                                <span class="type"><?php
                                    $categories = get_the_terms( get_the_ID(), 'rethink-types' );
                                    if ( $categories && ! is_wp_error( $categories ) ) {
                                        foreach ( $categories as $category ) {
                                            echo '<span class="type">' . esc_html( $category->name ) . '</span>';
                                        }
                                    }
                                    ?></span>
                            </div>
                        </a>
                    </div>
                <?php $i++;
                endwhile;
                wp_reset_postdata(); // Reset query data
            else :
                echo 'No posts found';
            endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
