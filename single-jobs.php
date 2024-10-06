<?php get_header(); ?>

<main class="wrapper singleJobWrapper">
    <div id="newsletterLink-container">
        <span>Monthly Newsletter</span>
        <a href="">
            <img src="./assets/img/link.svg" alt="link">
            Subscribe here
        </a>
    </div>
    <section class="singleJobHeroSectionContainer">
        <div class="job-date">
            <span><?php echo get_the_date('Y.M.d'); ?></span>
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
    <?php $expert = get_field('des');
    $form = '[contact-form-7 id="e19baeb" title="Job form"]';
    if ($expert or $form): ?>
        <section class="singleJobContentFormContainer">
            <div class="singleJobDescription skewText ">
                <?php echo $expert; ?>
            </div>
            <div class="singleJobFormContainer">
                <?php echo do_shortcode($form); ?>
            </div>
        </section>
    <?php endif; ?>
    <section class="singleJobCultureContainer">
        <div class="content skewText ">
            <?php the_content(); ?>
        </div>
    </section>
</main>


<?php get_footer();