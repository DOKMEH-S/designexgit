<?php get_header(); ?>
    <main class="wrapper newsWrapper">
        <section class="featureMediaWrap">
            <div class="featureMedia">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <div id="scroll">
                <div class="line"></div>
                <span>Discover</span>
            </div>
        </section>
        <section class="breadcrumb-title-date-wrapper paddingX">
            <div class="breadcrumb-title-date-wrap">
                <div class="breadcrumb">
                    <a href="<?php echo get_post_type_archive_link('rethink'); ?>">rethink</a>
                    <span class="spacer">/</span>
                    <span><?php the_title(); ?></span>
                </div>
                <h1><?php the_title(); ?></h1>
                <span class="date"><?php echo get_the_date(); ?></span>
            </div>
        </section>
        <section class="singleNewsContent paddingX">
            <?php the_content();?>
        </section>
        <section class="newsContainer relatedNews rethink paddingX">
            <div class="title-see-all-wrap">
                <p class="title">Related rethink</p>
                <a class="see-all" href="<?php echo get_post_type_archive_link('rethink'); ?>">see all</a>
            </div>
            <div class="newItemsWrapper">
                <?php
                $related_rethink_query = new WP_Query(
                    array(
                        'post_type' => 'rethink',
                        'posts_per_page' => 3,
                        'orderby' => 'rand',
                    )
                );
                if ($related_rethink_query->have_posts()):
                    while ($related_rethink_query->have_posts()):
                        $related_rethink_query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>" class="newsWrap">
                            <div class="news-media">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="news-info">
                                <p class="name"><?php the_title(); ?></p>
                                <?php
                                $categories = get_the_terms( get_the_ID(), 'rethink-types' );

                                if ( $categories && ! is_wp_error( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        echo '<span class="type">' . esc_html( $category->name ) . '</span>';
                                    }
                                }
                                ?>

                                

                            </div>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </section>
    </main>
<?php get_footer(); ?>