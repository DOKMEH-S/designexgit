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
            <div class="footer-logo"><img src="./assets/img/logo-footer.webp" alt="footer logo"></div>
            <div class="footer-text">
                <p>WHERE QUALITY MEETS LUXURY AND INNOVATION DRIVES SUSTAINABILITY</p>
            </div>
            <div class="footer-mailSocial">
                <a href="/#" class="footer-mailSocial_mail" aria-label="mail">info@designex.ae</a>
                <div class="footer-mailSocial_social">
                    <a href="/#" aria-label="icon-Instagram"><span class="icon-Instagram" aria-hidden="true"></span></a>
                    <a href="/#" aria-label="icon-Youtube"><span class="icon-Youtube" aria-hidden="true"></span></a>
                    <a href="/#" aria-label="icon-Linkedin"><span class="icon-Linkedin" aria-hidden="true"></span></a>
                </div>
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
</footer>
<script defer src='<?php ThemeAssets('js/gsap.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/ScrollTrigger.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/lenis.min.js'); ?>'></script>
<script defer src="<?php ThemeAssets('js/lenis-script.js'); ?>"></script>
<script defer src="<?php ThemeAssets('js/script.js'); ?>"></script>
<?php if (is_singular('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/single-project.js'); ?>"></script>
<?php endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelector('header').style.opacity = '1';
        document.querySelector('main.wrapper').style.opacity = '1';
        if (document.getElementById('videoModal')) {
            document.getElementById('videoModal').style.display = 'block';
        }
        document.querySelector('html').classList.add('loadingDone');
    });

</script>
</body>

</html>