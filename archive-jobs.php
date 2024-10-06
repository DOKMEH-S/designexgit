<?php get_header(); ?>
<main class="wrapper jobsWrapper">
    <div id="newsletterLink-container">
        <span>Monthly Newsletter</span>
        <a href="">
            <img src="./assets/img/link.svg" alt="link">
            Subscribe here
        </a>
    </div>
    <?php
$args = array(
    'post_type' => 'jobs',
    'posts_per_page' => -1,
);

$jobs_query = new WP_Query($args);

if ($jobs_query->have_posts()): ?>
    <section class="jobsContainer">
        <h1>Job Positions</h1>
        <div class="jobItemsWrapper">
            <?php while ($jobs_query->have_posts()):
                $jobs_query->the_post(); 
                
                $end_time = get_field('time');
                $current_time = current_time('Y-m-d'); 

                if ($current_time <= $end_time): ?>
                    <a href="<?php the_permalink(); ?>" class="jobsItemWrap" aria-label="<?php the_title(); ?>">
                        <div class="jobsMedia">
                            <?php if (has_post_thumbnail()):
                                the_post_thumbnail();
                            endif; ?>
                        </div>
                        <div class="jobsInfo">
                            <h2><?php the_title(); ?></h2>
                            <?php if (have_rows('item_job')): ?>
                                <?php while (have_rows('item_job')):
                                    the_row(); ?>
                                    <span><?php the_sub_field('item'); ?></span>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </section>
    <?php wp_reset_postdata();
endif; ?>


</main>
<?php include get_template_directory() . '/footer.php';