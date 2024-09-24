<?php get_header(); ?>
<main class="wrapper newsWrapper">
    <?php while (have_posts()) : the_post();
    $postID = get_the_ID();
    set_post_view($postID);?>
    <section class="featureMediaWrap">
        <div class="featureMedia">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <div id="scroll">
            <div class="line"></div>
            <span><?php _e('Discover','dokmeh');?></span>
        </div>
    </section>
    <section class="breadcrumb-title-date-wrapper paddingX">
        <div class="breadcrumb-title-date-wrap">
            <div class="breadcrumb">
                <a href="<?php echo get_post_type_archive_link('post'); ?>"><?php _e('News','dokmeh');?></a>
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
    <section class="newsContainer relatedNews paddingX">
        <div class="title-see-all-wrap">
            <p class="title"><?php _e('Related news','dokmeh');?></p>
            <a class="see-all" href="<?php echo get_post_type_archive_link('post'); ?>"><?php _e('see all','dokmeh');?></a>
        </div>
        <div class="newItemsWrapper">
            <?php
            $related_projects_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                )
            );
            if ($related_projects_query->have_posts()):
                while ($related_projects_query->have_posts()):
                    $related_projects_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="newsWrap">
                        <div class="news-media">
                            <img data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="" class="lazyload blur-up">
                        </div>
                        <div class="news-info">
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <p class="news-name"><?php the_title(); ?></p>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

    </section>
<?php endwhile;?>
</main>
<?php get_footer();
