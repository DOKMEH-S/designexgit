<?php //Template Name: Home tpl
get_header(); ?>
<div id="cookieOverlay"></div>
<div id="cookieContainer">
  <div class="cookieWrapper">
    <p class="title">Privacy Preference</p>
    <div class="cookieContent">
      <p>We need your consent before you can continue on our website.</p>
      <p>If you are under 16 and wish to give consent to optional services, you must ask your legal guardians for permission.</p>
      <p>We use cookies and other technologies on our website. Some of them are essential, while others help us to improve this website and your experience. Personal data may be processed (e.g. IP addresses), for example for personalized ads and content or ad and content measurement. You can find more information about the use of your data in our privacy policy.</p>
    </div>
    <p class="content"></p>
  </div>
  <button id="acceptCookie">I accept</button>
</div>
<section class="homeSideBarContainer">
    <?php $intro_title = get_field('intro_title');
    if ($intro_title):
        $repeater_field = get_field('highlight_words');
        if ($repeater_field) {
            foreach ($repeater_field as $item) {
                $word = $item['word'];
                $intro_title = str_replace($word, '<strong>' . $word . '</strong>', $intro_title);
            }
        }
    endif; ?>
    <h1 class="home-title"><?php echo $intro_title ? $intro_title : get_the_title(); ?></h1>
    <div class="homeElementCounterWrapper">
        <div id="counterBox" class="counter">
            <span id="counterValue">01</span>
            <span id="totalProject"></span>
        </div>
        <a href="" id="currentProjectName">
            <p></p>
        </a>
    </div>
    <div class="homeVideoItemsWrapper">
        <div class="homeVideoContainer">
            <div id="mediaHomeWrap">
                <img id="mediaHomeProject" src="" alt="">
            </div>
            <?php $highlight_text = get_field('highlight_text');
            if ($highlight_text):
                $repeater_field = get_field('highlight_items');
                if ($repeater_field) {
                    foreach ($repeater_field as $item) {
                        $word = $item['word'];
                        $highlight_text = str_replace($word, '<strong>' . $word . '</strong>', $highlight_text);
                    }
                } ?>
                <h2><?php echo $highlight_text; ?></h2>
            <?php endif; ?>
        </div>
        <div class="homeItemsWrapper">
            <div class="homeItemsWrap">
                <h3>Monthly Newsletter</h3>
                <a href="" class="">Subscribe here</a>
            </div>
            <?php $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'tpls/contact.php'
            ));
            $contactID = $pages[0]->ID; ?>
            <?php
            $whatsapp = get_field('whatsapp', $contactID);
            if ($whatsapp): ?>
                <div class="homeItemsWrap">
                    <h3>do you have a project?</h3>
                    <a href="<?php echo $whatsapp; ?>"><?php echo get_field('whatsapp_text', $contactID); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<div id="smooth-wrapper">
    <div id="smooth-content">
        <main class="wrapper homeWrapper">
            <div id="newsletterLink-container">
                <span>Monthly Newsletter</span>
                <a href="">
                    <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="link">
                    Subscribe here
                </a>
            </div>
            <?php
            $projects = get_field('project');
            if ($projects): ?>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper homeProjectContainer">
                        <?php
                        foreach ($projects as $post):
                            setup_postdata($post);
                            $project_logo = get_field('project_logo');
                            $sketch_image = get_field('sketch_image');
                            $year = wp_get_object_terms($post->ID, 'project_type', array('parent' => 5)); ?>
                            <div class="swiper-slide">
                                <a href="<?php the_permalink(); ?>" class="homeProjectWrap"
                                    data-url="<?php echo esc_url($sketch_image['sizes']['medium']); ?>">
                                    <div class="projectMedia">
                                        <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                                    </div>
                                    <div class="projectInfo">
                                        <?php if ($project_logo): ?>
                                            <img src="<?php echo esc_url($project_logo['sizes']['thumbnail']); ?>"
                                                alt="<?php echo $project_logo['alt']; ?>" class="logo">
                                        <?php endif; ?>
                                        <div class="title-year">
                                            <h2 class="project_name">/<?php the_title(); ?></h2>
                                            <?php if ($year): ?>
                                                <span class="project_year"><?php echo $year[0]->name; ?>/</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>
<?php get_footer();