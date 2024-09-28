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
<footer class="paddingX">
    <div class="footerSides">
        <div class="footerSide">
            <?php $logo = get_field('logo','option');?>
            <div class="footer-logo"><img src="<?php echo $logo ? $logo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>" alt="footer logo"></div>
            <div class="footer-text">
                <p>WHERE QUALITY MEETS LUXURY AND INNOVATION DRIVES SUSTAINABILITY</p>
            </div>
            <div class="footer-mailSocial">
                <a href="/#" class="footer-mailSocial_mail" aria-label="mail">info@designex.ae</a>
                <?php if(have_rows('social_media','option')):?>
                <div class="footer-mailSocial_social">
                    <?php while (have_rows('social_media','option')):the_row();
                    $link = get_sub_field('link');?>
                    <a href="<?php echo $link?>" aria-label="<?php echo get_bloginfo('name').' '.get_sub_field('icon');?>"><span class="<?php echo get_sub_field('icon');?>" aria-hidden="true"></span></a>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="footerSide">
            <div class="footer-subscribe">
                <a href="/#" class="title" aria-label="Subscribe to the newsletter">Subscribe to the newsletter</a>
                <div class="footer-subscribe-form">
                    <form action="">
                        <div class="textTypeInput">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="checkboxTypeInput">
                            <input type="checkbox" name="email" id="confirmEmail">
                            <label for="confirmEmail"> I have read and accept the Privacy Policy </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-contact-items">
                <div class="item">
                    <span class="title">Phone Number</span>
                    <a href="/#" aria-label="Phone Number">+971 54 480 6995</a>
                </div>
                <div class="item">
                    <span class="title">Phone Number</span>
                    <a href="/#" aria-label="Phone Number">+971 (4) 374 1159</a>
                </div>
                <div class="item">
                    <span class="title">Email</span>
                    <a href="/#" aria-label="Email">info@designex.ae</a>
                </div>
                <div class="item">
                    <span class="title">P.O.Box</span>
                    <a href="/#" aria-label="P.O.Box">118319 Office 605
                        Zone B Aspect Tower, Business Bay,
                        DUBAI - UAE</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footerPolicyDokmeh">
        <div class="footer-policy-items">
            <a href="/#" class="item" aria-label="2024. All Right Reserved"> 2024. All Right Reserved</a>
            <a href="/#" class="item" aria-label="Cookie Policy"> Cookie Policy</a>
            <a href="/#" class="item" aria-label="Privecy Policy"> Privecy Policy</a>
        </div>
        <div class="dokmeh">
            <span>Made with Love by </span>
            <img src="<?php ThemeAssets('img/logo-dokmeh.webp');?>" alt="Dokmeh creative agency">
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
<?php if(is_archive('projects')):?>
<script defer src="<?php ThemeAssets('js/jQuery.min.js'); ?>"></script>
<?php endif;?>
<script defer src='<?php ThemeAssets('js/gsap.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/ScrollTrigger.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/lenis.min.js'); ?>'></script>
<script defer src="<?php ThemeAssets('js/lenis-script.js'); ?>"></script>
<script defer src="<?php ThemeAssets('js/script.js'); ?>"></script>
<?php if (is_singular('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/single-project.js'); ?>"></script>
<?php elseif(is_archive('projects')):?>
    <script defer src="<?php ThemeAssets('js/page-script/archive-project.js'); ?>"></script>
<?php endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelector('header').style.opacity = '1';
        document.querySelector('main.wrapper').style.opacity = '1';
        <?php if(is_singular('projects')):?>
        if (document.getElementById('videoModal')) {
            document.getElementById('videoModal').style.display = 'block';
        }
        <?php endif;?>
        document.querySelector('html').classList.add('loadingDone');
    });
</script>
</body>
</html>