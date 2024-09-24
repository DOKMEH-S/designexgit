<?php //Template Name: Contact tpl
get_header(); ?>
<?php if (have_rows('opportunities')): ?>
    <div id="modal" data-lenis-prevent>
        <img src="<?php ThemeAssets('img/modal-close.svg'); ?>" alt="close" class="close hover-target">
        <p class="title"><?php _e('Apply','dokmeh');?></p>
        <?php $wpml_current_lang = ICL_LANGUAGE_CODE;
        $form = ($wpml_current_lang == 'en')?  '[contact-form-7 id="e19baeb" title="opportunity form"]' : '[contact-form-7 id="927099a" title="opportunity form Ru"]';
        if($form) :?>
            <div class="form">
                <?php echo apply_shortcodes($form); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
    <main class="wrapper contactWrapper">
        <section class="pageIntro paddingX">
            <img class="background" src="<?php ThemeAssets('img/intro-logo.png');?>" alt="">
            <div class="info">
                <h1 class="title">/ <?php the_title();?></h1>
                <?php
                // Get the original text from the textarea field
                $original_text = get_field('main_description');

                // Get the repeater field
                $repeater_field = get_field('color_text_c');

                // If the original text and the repeater field exist
                if ($original_text && $repeater_field) {
                    // Loop through each item in the repeater field
                    foreach ($repeater_field as $item) {
                        // Get the word from the repeater field
                        $word = $item['color_word_c'];

                        // Replace the word in the original text with the colorful version
                        $original_text = str_replace($word, '<span class="colorful">' . $word . '</span>', $original_text);
                    }

                    // Output the modified text
                    echo '<p class="description">' . $original_text . '</p>';
                }
                ?>
            </div>
        </section>
        <?php if( have_rows('data_repeater') ): ?>
            <section class="aerospaceData paddingX">
                <?php while( have_rows('data_repeater') ): the_row(); ?>
                    <div class="item">
                        <div class="ring">
                            <i></i>
                            <i></i>
                        </div>
                        <span class="title"><?php the_sub_field('title'); ?></span>
                        <span class="amount"><?php the_sub_field('amount'); ?></span>
                        <span class="unit"><?php the_sub_field('unit'); ?></span>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php endif;
        if(have_rows('branches')):
            $locationsArray = array();?>
            <section class="maps paddingX">
                <?php $i=0;
                while(have_rows('branches')):the_row();?>
                    <div class="item">
                        <div class="map" id="branch-<?php echo $i;?>">
                            <!--                <img src="--><?php //ThemeAssets('img/sample/map-01.png');?><!--" alt="">-->
                        </div>
                        <div class="contactInfo">
                            <?php $phone = get_sub_field('phone_number');
                            $i++;
                            if($phone):?>
                                <div class="phones">
                                    <div>
                                        <img src="<?php ThemeAssets('img/icon-phone.svg');?>" alt="">
                                        <a href="tel:<?php echo str_replace(' ','',$phone);?>"><?php echo $phone;?></a>
                                    </div>
                                </div>
                            <?php endif;
                            $location = get_sub_field('location');
                            if ($location):
                                $locationsArray [] = ($location);
                            endif;
                            $address = get_sub_field('address');
                            if($address):?>
                            <div class="addresses">
                                <div>
                                    <img src="<?php ThemeAssets('img/icon-location.svg');?>" alt="">
                                    <<?php echo $location ? 'a href="https://www.google.com/maps/dir/?api=1&destination='.$location['lat'].','.$location['lng'].'" target="_blank"' : 'div';?>><?php echo $address;?></<?php echo $location ? 'a' : 'div';?>>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    </div>
                <?php endwhile;?>
            </section>
        <?php endif;?>
        <section class="contactItems-wrapper paddingX">
            <div class="contactItems-container email">
                <h2 class="title">/ <?php _e('Email address','dokmeh');?></h2>
                <div class="contact-email-social-wrapper">
                    <a href="mailto:<?php echo antispambot(get_field('email')); ?>"><?php echo antispambot(get_field('email')); ?></a>
                    <?php if(have_rows('social_media','option')):?>
                        <div class="social-media-wrapper">
                            <?php while (have_rows('social_media','option')):the_row();
                                $link = get_sub_field('link');?>
                                <a href="<?php echo $link?>" target="_blank" aria-label="<?php echo get_bloginfo('name').get_sub_field('icon');?>"><span class="<?php echo get_sub_field('icon');?>" aria-hidden="true"></span></a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <?php $wpml_current_lang = ICL_LANGUAGE_CODE;
            $form = ($wpml_current_lang == 'en')?  ('[contact-form-7 id="066a049" title="Contact form"]') : '[contact-form-7 id="8e90fbc" title="Contact form Ru"]';
            if($form) :?>
                <div class="contactItems-container form">
                    <h2 class="title">/ <?php _e('Contact from','dokmeh');?></h2>
                    <div class="form">
                        <?php echo apply_shortcodes($form);?>
                    </div>
                </div>
            <?php endif;?>
            <?php if(have_rows('opportunities')):?>
            <div class="contactItems-container opportunities">
                <h2 class="title">/ <?php echo get_field('opportunities_title'); ?></h2>
                <div class="items">
                    <?php while (have_rows('opportunities')):the_row();?>
                        <div class="item">
                            <div class="header">
                                <h3 class="title"><?php the_sub_field('title');?></h3>
                                <span class="applyBtn hover-target" job_name="<?php the_sub_field('title');?>"><?php _e('Apply','dokmeh');?></span>
                            </div>
                            <div class="body">
                                <?php $items = get_sub_field('items');
                                if($items):?>
                                    <div class="data">
                                        <ul>
                                            <?php foreach ($items as $item):?>
                                                <li><span><?php echo $item['item'];?></span>:<span><?php echo $item['value'];?></span></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                <?php endif;?>
                                <?php $short_des = get_sub_field('short_description');?>
                                <div class="text">
                                    <p><?php echo $short_des;?></p>
                                </div>
                                <?php $description = get_sub_field('more_description');?>
                                <?php if($description OR $short_des ):?>
                                    <div class="more">
                                        <div class="content">
                                            <p><?php echo $description;?></p>
                                        </div>
                                        <div class="button hover-target"><span><?php _e('Read More','dokmeh' );?></span><span><?php _e('Read Less','dokmeh' );?></span></div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
            </div>
            <div class="contactItems-container form">
                <h2 class="title">/ <?php _e('Business Cooperation Form','dokmeh');?></h2>
                <?php
                $form = ($wpml_current_lang == 'en')? '[contact-form-7 id="56e665f" title="BUSINESS COOPERATION FORM"]' : '[contact-form-7 id="5aef023" title="BUSINESS COOPERATION FORM Ru"]';
                if($form):?>
                    <div class="form">
                        <?php echo apply_shortcodes($form);?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php include get_template_directory() . '/footer.php';
