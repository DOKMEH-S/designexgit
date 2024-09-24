<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /*================INTRO==================*/
        html.load *{
            cursor:none;
        }
        main, header<?php if(is_front_page() OR is_page_template('tpls/contact.php')){?>, #modal<?php }?> {
            opacity: 0;
        }
        #menu-container {
            display: none;
        }
        <?php if (is_front_page()): ?>
        #intro,#intro .bg{top:0;left:0;width:100%}#intro .logo img,.arrow-container{opacity:0;transition:opacity .6s cubic-bezier(.215,.61,.355,1),transform .6s cubic-bezier(.215,.61,.355,1)}#intro{position:fixed;height:100vh;z-index:100;background-color:var(--white);display:flex;align-items:center;justify-content:space-between;transition:.35s ease-in-out;flex-direction:column;padding:var(--spaceX)}html.removeIntro #intro{opacity:0;pointer-events:none}#intro .bg{height:100%;position:absolute;pointer-events:none}#intro .bg>*{width:100%;height:100%;object-fit:cover;filter:blur(5px);transition:filter .3s linear}#intro .logo img{width:6.8rem;height:auto;object-fit:contain;transform:translateY(-60px)}#intro .text{display:block;font-size:1rem;font-weight:400;letter-spacing:1.3rem;transition:.3s linear;opacity:0;filter:blur(3px)}.arrow-container{display:flex;align-items:center;column-gap:40px;background-color:var(--darkGray);z-index:1;width:fit-content;text-align:center;justify-content:center;font-size:.875rem;color:var(--white);padding:.625rem 2rem;border-radius:2rem;text-transform:uppercase;border:2px solid var(--green);letter-spacing:1px;transform:translateY(60px);cursor:none}.arrow-container:hover{background-color:var(--green);border:2px solid var(--darkGray)}#intro .arrow-container>span{font-size:.75rem;font-weight:400;color:var(--lightGray);letter-spacing:2px;text-transform:capitalize}#intro.loadIntro .logo img{opacity:1;transform:translateX(0)}#intro.loadIntro .arrow-container{opacity:1;transform:translateY(0)}#intro.loadIntro .text{opacity:1;filter:blur(1px);transition:opacity .3s linear .4s}@media only screen and (max-width:768px){#intro .text{text-align:center;line-height:4.25rem;letter-spacing:.2rem;width:90%}#intro{padding:8rem var(--spaceX)}#intro .logo img{width:10.8rem}}@media only screen and (min-width:640px) and (max-width:768px){#intro .text{width:50%}}
        /*=================INTRO====================*/
        <?php endif; ?>
    </style>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php ThemeAssets('css/icomoon.min.css'); ?>" crossorigin>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php ThemeAssets('css/fonts.min.css'); ?>" crossorigin>
    <?php if (is_singular('projects') OR is_page_template('tpls/about.php')): ?>
        <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php ThemeAssets('css/simple-lightbox.min.css'); ?>" crossorigin>
    <?php endif; ?>
    <?php if (is_page_template('tpls/about.php')): ?>
        <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php ThemeAssets('css/swiper-bundle.min.css'); ?>">
    <?php endif; ?>
    <script>
        function loadIntro(){
            document.querySelector('html').classList.add('load');
        }
    </script>
    <script>document.documentElement.className = "js";</script>
    <?php if (is_page_template('tpls/contact.php')): ?>
        <script>document.documentElement.className = "js";</script>
    <?php endif; ?>
    <?php if (is_front_page() or is_404()): ?>
        <script>
            var e, t;
            (document.documentElement.className = "js"),
                ((t = document.createElement("style")).innerHTML = "root: { --tmp-var: bold; }"),
                document.head.appendChild(t),
                (e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)"))),
                t.parentNode.removeChild(t),
            e || alert("Please view this demo in a modern browser that supports CSS Variables.");
        </script>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body data-pageType="<?php if (is_front_page()): echo 'home" onload="loadIntro()';
elseif (is_post_type_archive('projects')): echo 'project';
elseif (is_singular('projects')): echo 'projectSingle';
elseif (is_page_template('tpls/about.php')): echo 'about';
elseif (is_page_template('tpls/contact.php')): echo 'contact';
elseif (is_404()): echo 'notFound';
elseif (is_home()): echo 'news';
elseif (is_singular('post') ): echo 'singleNews';
elseif (is_post_type_archive('rethink')): echo 'rethink';
elseif (is_singular('rethink')):echo 'singleNews';
endif; ?>"
      class="<?php if (is_front_page() or is_page_template('tpls/contact.php')):echo 'hasModal';endif; ?>"
    <?php if (is_post_type_archive('rethink')): echo 'onload="loadIsotopeR();"'; endif; ?>>
<header>
    <a href="<?php echo home_url('/'); ?>" class="identity" aria-label="dorr architecture logo">
        <?php $ImageLogo = get_field('logo', 'option'); ?>
        <img src="<?php echo $ImageLogo ? $ImageLogo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo.png'; ?>"
             alt="site-logo">
    </a>
    <div class="menuLanguageWrapper">
        <?php $translate = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
        $tUrl = '';
        $language = '';
        foreach ($translate as $lang) {
//            var_dump($lang);
            if ($lang['active'] == 0) {
                $tUrl = $lang['url'];
                $language = $lang['native_name'];
            }
        }
        if ($tUrl):?>
            <div class="languageWrap">
                <span><?php echo ICL_LANGUAGE_CODE; ?></span>
                <a href="<?php echo $tUrl; ?>"><?php echo $language; ?></a>
            </div>
        <?php endif; ?>
        <div id="menu" class="hover-target">
            <div class="menu-text">
                <span>menu</span>
                <span>close</span>
            </div>
            <div class="menu-box">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>
</header>
<div id="menu-container" data-lenis-prevent>
    <?php $pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpls/contact.php'
        )
    );
    $contactID = $pages[0]->ID;
    if ($contactID): ?>
    <div class="contactInfo">
        <p class="title">/ <?php _e('Contact info','dokmeh');?></p>
        <?php if (have_rows('branches', $contactID)): ?>
        <div class="branches">
            <?php while (have_rows('branches', $contactID)):
            the_row();
            $address = get_sub_field('address'); ?>
            <div class="branch">
                <?php $phone = get_sub_field('phone_number');
                $i++;
                if ($phone): ?>
                    <a href="tel:<?php echo str_replace(' ', '', $phone); ?>" class="number"><?php echo $phone; ?></a>
                <?php endif;
                if ($address):
                $location = get_sub_field('location'); ?>
                <<?php echo $location ? 'a href="https://www.google.com/maps/dir/?api=1&destination=' . $location['lat'] . ',' . $location['lng'] . '" target="_blank"' : 'div'; ?>
                class="address"><?php echo $address; ?></<?php echo $location ? 'a' : 'div'; ?>>
        <?php endif; ?>
        </div>
    <?php endwhile;
    if(have_rows('social_media','option')):?>
        <div class="social-media-wrapper">
            <?php while (have_rows('social_media','option')):the_row();
            $link = get_sub_field('link');?>
            <a href="<?php echo $link?>" target="_blank" aria-label="<?php echo get_bloginfo('name').get_sub_field('icon');?>"><span class="<?php echo get_sub_field('icon');?>" aria-hidden="true"></span></a>
            <?php endwhile; ?>
        </div>
        <?php endif;?>
    </div>
<?php endif;
$Email = antispambot(get_field('email', $contactID));
if ($Email): ?>
    <div class="email">
        <a href="mailto:<?php echo $Email; ?>" aria-label="dorr architecture Email"><?php echo $Email; ?></a>
    </div>
<?php endif; ?>
</div>
<?php endif;
wp_reset_postdata();
if (have_rows('menus', 'option')): ?>
    <div class="menuWrapper">
        <div class="blur blur--left">
            <div class="" style="--index: 0"></div>
            <div class="" style="--index: 1"></div>
            <div class="" style="--index: 2"></div>
            <div class="" style="--index: 3"></div>
            <div class="" style="--index: 4"></div>
        </div>
        <div class="blur blur--right">
            <div class="" style="--index: 0"></div>
            <div class="" style="--index: 1"></div>
            <div class="" style="--index: 2"></div>
            <div class="" style="--index: 3"></div>
            <div class="" style="--index: 4"></div>
        </div>
        <nav class="menu">
            <?php while (have_rows('menus', 'option')):
                the_row(); ?>
                <div class="menu__item box">
                    <a href="<?php the_sub_field('link'); ?>"
                       class="menu__item-inner" aria-label="dorr architecture menu"><?php the_sub_field('title'); ?></a>
                </div>
            <?php endwhile; ?>
            <?php while (have_rows('menus', 'option')):
                the_row(); ?>
                <div class="menu__item box">
                    <a href="<?php the_sub_field('link'); ?>"
                       class="menu__item-inner" aria-label="dorr architecture menu"><?php the_sub_field('title'); ?></a>
                </div>
            <?php endwhile; ?>
            <?php while (have_rows('menus', 'option')):
                the_row(); ?>
                <div class="menu__item box">
                    <a href="<?php the_sub_field('link'); ?>"
                       class="menu__item-inner" aria-label="dorr architecture menu"><?php the_sub_field('title'); ?></a>
                </div>
            <?php endwhile; ?>
        </nav>
    </div>
<?php endif; ?>
</div>