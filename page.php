<?php get_header(); ?>


<main class="wrapper singleJobWrapper">
    <section class="singleJobHeroSectionContainer">
        <div class="job-date">
            
        </div>
        <div class="job-title-media-wrapper">
            <?php $post_title = get_the_title();
            $title_br = str_replace(' ', '<br>', $post_title);
            ?>
            <h1 class="jobTitle"><?php echo $title_br; ?></h1>
            <div class="job-media">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            </div>
        </div>
    </section>
    <section class="singleJobCultureContainer defaultPageWrapper">
        <div class="content skewText">
            <?php the_content(); ?>
        </div>
    </section>
</main>



<?php get_footer();