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
    $form = '';
    if ($expert or $form): ?>
        <section class="singleJobContentFormContainer">
            <div class="singleJobDescription">
                <?php echo $expert; ?>
            </div>
            <div class="singleJobFormContainer">
                <form>
                    <div class="textTypeInput">
                        <input type="text" placeholder="Your Name">
                    </div>
                    <div class="textTypeInput">
                        <input type="text" placeholder="Your Phone Number">
                    </div>
                    <div class="textTypeInput">
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="textTypeInput">
                        <textarea rows="11" placeholder="Why you are fit to this job? (Cover Letter)"></textarea>
                    </div>
                    <div class="textTypeInput upload">
                        <input type="file">
                        <label><span>Upload Your Cv File</span></label>
                        <i class="fa fa-times-circle remove"></i>
                        <div class="warning">
                            <span>Max 6mb. PDF format Only</span>
                        </div>
                    </div>
                    <div class="submitForm">
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.142578 0.142822H4.71401L4.71401 0.142897L5.83091 1.26386L4.18975 2.89908L5.76895 4.18678V5.85711H4.18653V2.90229L1.26845 5.80981L0.151542 4.68884L3.12591 1.72524H0.142578V0.142822Z"
                                fill="white" />
                        </svg>
                        <input type="submit" value="submit">
                    </div>
                </form>
            </div>
        </section>
    <?php endif; ?>
    <section class="singleJobCultureContainer">
        <div class="content">
            <?php the_content(); ?>
        </div>
    </section>
</main>


<?php get_footer();