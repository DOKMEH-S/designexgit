<?php //Template Name: Home tpl
get_header(); ?>
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
            <div class="loading-container getScale getRotate getNumber loseNumber">
                <div class="loading_line">
                    <div class="loading-point_canvas one"></div>
                    <div class="loading-point"></div>
                    <div class="loading-point_canvas two"></div>
                </div>
            </div>
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
                <div class="homeItemsWrap">
                    <h3>do you have a project?</h3>
                    <a href="" class="">whatsapp</a>
                </div>
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
                    <section class="homeProjectContainer">
                        <?php
                        foreach ($projects as $post):
                            setup_postdata($post);
                            $project_logo = get_field('project_logo');
                            $sketch_image = get_field('sketch_image');
                            $year = wp_get_object_terms($post->ID, 'project_type', array('parent' => 5));
//                            var_dump($year);
                            ?>
                            <a href="<?php the_permalink(); ?>" class="homeProjectWrap"
                               data-url="<?php echo esc_url($sketch_image['sizes']['large']); ?>">
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
                                        <?php if($year):?>
                                        <span class="project_year"><?php  echo $year[0]->name; ?>/</span>
                        <?php endif;?>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </section>
                <?php endif; ?>
            </main>
        </div>
    </div>
<?php get_footer();