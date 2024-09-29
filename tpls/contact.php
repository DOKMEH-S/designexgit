<?php //Template Name: Contact tpl
get_header(); ?>
    <main class="wrapper contactWrapper">
        <?php while (have_posts()):the_post();
            $contactID = get_the_ID(); ?>
            <div id="newsletterLink-container">
                <span>Monthly Newsletter</span>
                <a href="">
                    <img src="<?php ThemeAssets('img/link.svg'); ?>" alt="link">
                    Subscribe here
                </a>
            </div>
            <section class="contactInfoMapFormContainer">
                <?php $main_title = get_field('main_title');?>
                <h1 class="contact_title"><?php echo $main_title ? $main_title : get_the_title();?></h1>
                <div class="contactInfoMapContainer">
                    <div class="contactInfoWrapper">
                        <?php $whatsapp = get_field('whatsapp');
                        if($whatsapp):?>
                        <a aria-label="Designex Whatsapp" href="<?php echo $whatsapp;?>" class="contactCTAWrap whatsapp"><span
                                    class="icon-Whats-app" aria-hidden="true"></span><span><?php echo get_field('whatsapp_text');?></span></a>
                        <?php endif;
                        if (have_rows('phones')):
                            while (have_rows('phones')):the_row();
                                $phone = get_sub_field('phone') ?>
                                <div class="contactInfoWrap">
                                    <span class="title"><?php echo get_sub_field('title'); ?></span>
                                    <a href="tel:<?php echo str_replace(' ', '', $phone) ?>"><?php echo $phone; ?></a>
                                </div>
                            <?php endwhile;
                        endif;
                        $email = get_field('email');
                        if ($email):?>
                            <div class="contactInfoWrap">
                                <span class="title"><?php echo get_field('email_title'); ?></span>
                                <a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a>
                            </div>
                        <?php endif;
                        $address = get_field('address');
                        if ($address):
                            $location = get_field('location'); ?>
                            <div class="contactInfoWrap address">
                                <a href="mailto:https://www.google.com/maps/dir/?api=1&destination=<?php echo $location['lat'] . ',' . $location['lng']; ?>"><?php echo $address; ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('social_media', 'option')): ?>
                            <div class="contactSocialMedia">
                                <?php while (have_rows('social_media', 'option')):
                                    the_row();
                                    $link = get_sub_field('link'); ?>
                                    <a href="<?php echo $link ?>"
                                       aria-label="<?php echo get_bloginfo('name') . ' ' . get_sub_field('icon'); ?>"><span
                                                class="<?php echo get_sub_field('icon'); ?>"
                                                aria-hidden="true"></span></a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <div class="ContactMapContainer" id="singleProjectMap">
                            <img src="<?php ThemeAssets('img/map.jpg'); ?>" alt="">
                        </div>
                    </div>
                    <?php $video = get_field('video');
                    if ($video):
                    $poster = get_field('poster'); ?>
                    <div class="contactVideoWrapper">
                        <?php $video_title = get_field('video_title');
                        if ($video_title): ?>
                        <div class="titleWrap">
                            <h2 class="title-roboto"><?php echo $video_title; ?></h2>
                            <?php endif; ?>
                            <div class="videoWrapper">
                                <video autoplay muted loop playsinline
                                       preload="auto" <?php if ($poster) { ?> poster="<?php echo $poster['sizes']['medium']; ?>" <?php } ?>
                                       id="projectVideo"
                                       data-url="<?php echo $video; ?>">
                                    <source src="<?php echo $video; ?>" type="video/mp4">
                                </video>
                                <div id="playVideo">
                                    <img src="<?php ThemeAssets('img/outer-circle.svg'); ?>" alt="circle text">
                                    <img src="<?php ThemeAssets('img/inner-icon-play.svg'); ?>" alt="play icon">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="contactFormSliderContainer">
                        <?php $form = '[contact-form-7 id="066a049" title="Contact form"]'; ?>
                        <div class="contactFormContainer">
                            <?php echo do_shortcode($form); ?>
                        </div>
                        <?php $gallery = get_field('gallery');
                        if ($gallery):?>
                            <div class="contactSlider">
                                <div class="slideshow-container">
                                    <?php foreach ($gallery as $image): ?>
                                        <div class="mySlides fade">
                                            <img src="<?php echo $image['sizes']['large']; ?>"
                                                 alt="<?php echo $image['alt']; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
            </section>
            <?php if (have_rows('steps_text')) : ?>
                <section class="contactStepsContainer">
                    <div class="progressBar">
                        <div class="number-percentage">
                            <span id="percent-number">0</span>
                            <span>%</span>
                        </div>
                        <div class="progressWrap">
                            <progress id="numbers" max="100" value>0</progress>
                        </div>
                    </div>
                    <div class="stepsWrapper">
                        <?php while (have_rows('steps_text')) :the_row(); ?>
                            <div class="stepWrap">
                                <h2><?php echo get_sub_field('title'); ?></h2>
                                <P class="subtitle"><?php echo get_sub_field('sub_title'); ?></P>
                                <div class="content">
                                    <?php echo get_sub_field('text'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>
<?php if ($video) : ?>
    <div id="videoModal">
        <div class="videoContainer">
            <video id="modalVideo" loop playsinline preload="auto" poster="" controls>
                <source id="modalVideoSrc" src="" type="video/mp4">
            </video>
        </div>
        <div id="closeModalVideo">
            <span>close</span>
        </div>
    </div>
<?php endif; ?>
<?php include get_template_directory() . '/footer.php';
