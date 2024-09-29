<?php //Template Name: Contact tpl
get_header(); ?>
    <main class="wrapper contactWrapper">
        <div id="newsletterLink-container">
            <span>Monthly Newsletter</span>
            <a href="">
                <img src="./assets/img/link.svg" alt="link">
                Subscribe here
            </a>
        </div>
        <section class="contactInfoMapFormContainer">
            <h1 class="contact_title">Do You have a<br> project?</h1>
            <div class="contactInfoMapContainer">
                <div class="contactInfoWrapper">
                    <a aria-label="Designex Whatsapp" href="" class="contactCTAWrap whatsapp"><span class="icon-Whats-app" aria-hidden="true"></span><span>Small chat on WhatApp</span></a>
                    <div class="contactInfoWrap">
                        <span class="title">phone number</span>
                        <a href="tel:00971544806995">+971 54 480 6995</a>
                    </div>
                    <div class="contactInfoWrap">
                        <span class="title">phone number</span>
                        <a href="tel:00971544806995">+971 (4) 374 1159</a>
                    </div>
                    <div class="contactInfoWrap">
                        <span class="title">email</span>
                        <a href="mailto:info@designex.ae">info@designex.ae</a>
                    </div>
                    <div class="contactInfoWrap address">
                        <a href="mailto:info@designex.ae">P.O.Box: 118319 Office 605 Zone B Aspect Tower, Business Bay,<br> DUBAI - UAE</a>
                    </div>
                    <div class="contactSocialMedia">
                        <a href="/#" aria-label="icon-Instagram"><span class="icon-Instagram" aria-hidden="true"></span></a>
                        <a href="/#" aria-label="icon-Youtube"><span class="icon-Youtube" aria-hidden="true"></span></a>
                        <a href="/#" aria-label="icon-Linkedin"><span class="icon-Linkedin" aria-hidden="true"></span></a>
                    </div>
                    <div class="ContactMapContainer" id="map">
                        <img src="./assets/img/sample/map.jpg" alt="">
                    </div>
                </div>
                <div class="contactVideoWrapper">
                    <div class="titleWrap">
                        <h2 class="title-roboto">How we work on your project</h2>
                    </div>
                    <div class="videoWrapper">
                        <video autoplay muted loop playsinline preload="auto" poster="" id="projectVideo" data-url="./assets/video/coverr-city-skyscrapers-471-1080p.mp4">
                            <source src="./assets/video/coverr-city-skyscrapers-471-1080p.mp4" type="video/mp4">
                        </video>
                        <div id="playVideo">
                            <img src="./assets/img/outer-circle.svg" alt="circle text">
                            <img src="./assets/img/inner-icon-play.svg" alt="play icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="contactFormSliderContainer">
                <div class="contactFormContainer">
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
                            <textarea rows="7" placeholder="What is your request?"></textarea>
                        </div>
                        <div class="submitForm">
                            <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.142578 0.142822H4.71401L4.71401 0.142897L5.83091 1.26386L4.18975 2.89908L5.76895 4.18678V5.85711H4.18653V2.90229L1.26845 5.80981L0.151542 4.68884L3.12591 1.72524H0.142578V0.142822Z" fill="white"/>
                            </svg>
                            <input type="submit" value="submit">
                        </div>
                    </form>
                </div>
                <div class="contactSlider">
                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <img src="./assets/img/sample/about-1.jpg" alt="">
                        </div>
                        <div class="mySlides fade">
                            <img src="./assets/img/sample/about-4.jpg" alt="">
                        </div>
                        <div class="mySlides fade">
                            <img src="./assets/img/sample/about-2.jpg" alt="">
                        </div>
                        <div class="mySlides fade">
                            <img src="./assets/img/sample/about-3.jpg" alt="">
                        </div>
                        <div class="mySlides fade">
                            <img src="./assets/img/sample/about-5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="faq-contactSlider-container" style="display:none;">
            <div class="faqContainer">
                <div class="titleWrap">
                    <h2 class="title-roboto">FAQ</h2>
                </div>
                <div class="accordion">
                    <div class="accordion-item active"> <!-- First item active -->
                        <div class="dropdownHeader js-toggle" data-container="toggle-1">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-1">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus.</p>
                                <p>In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="dropdownHeader js-toggle" data-container="toggle-2">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-2">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="dropdownHeader js-toggle" data-container="toggle-3">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-3">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a.</p>
                                <p>Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="dropdownHeader js-toggle" data-container="toggle-4">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-4">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="dropdownHeader js-toggle" data-container="toggle-5">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-5">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="dropdownHeader js-toggle" data-container="toggle-6">
                            <span>What if you denied all of our concepts?</span>
                        </div>
                        <div class="dropdownBody" id="toggle-6">
                            <div class="content">
                                <p>sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contactStepsContainer">
            <div class="progressBar">
                <div class="number-percentage">
                    <span id="percent-number">0</span>
                    <span>%</span>
                </div>
                <div class="progressWrap">
                    <progress id="numbers" max="100" value>0 </progress>
                </div>
            </div>
            <div class="stepsWrapper">
                <div class="stepWrap">
                    <h2>Research</h2>
                    <P class="subtitle">How we solve your problem and Level up your project?</P>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                        <p>1. Research about your project</p>
                        <p>2. good knowing about what you want</p>
                        <p>3. Brain Storm</p>
                        <p>4. Design</p>
                        <p>5. Develop</p>
                        <p>6. Maintenance</p>
                    </div>
                </div>
                <div class="stepWrap">
                    <h2>Design</h2>
                    <P class="subtitle">How we solve your problem and Level up your project?</P>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                        <p>1. Research about your project</p>
                        <p>2. good knowing about what you want</p>
                        <p>3. Brain Storm</p>
                        <p>4. Design</p>
                        <p>5. Develop</p>
                        <p>6. Maintenance</p>
                    </div>
                </div>
                <div class="stepWrap">
                    <h2>Phase-01</h2>
                    <P class="subtitle">How we solve your problem and Level up your project?</P>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                        <p>1. Research about your project</p>
                        <p>2. good knowing about what you want</p>
                        <p>3. Brain Storm</p>
                        <p>4. Design</p>
                        <p>5. Develop</p>
                        <p>6. Maintenance</p>
                    </div>
                </div>
                <div class="stepWrap">
                    <h2>Phase-02</h2>
                    <P class="subtitle">How we solve your problem and Level up your project?</P>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis magna etiam tempor orci eu lobortis. Gravida cum sociis natoque penatibus et magnis. Lorem mollis aliquam ut porttitor leo a. Vitae turpis massa sed elementum tempus egestas sed sed risus. In vitae turpis massa sed elementum tempus egestas. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit libero volutpat sed cras ornare arcu dui vivamus. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
                        <p>1. Research about your project</p>
                        <p>2. good knowing about what you want</p>
                        <p>3. Brain Storm</p>
                        <p>4. Design</p>
                        <p>5. Develop</p>
                        <p>6. Maintenance</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
<?php include get_template_directory() . '/footer.php';
