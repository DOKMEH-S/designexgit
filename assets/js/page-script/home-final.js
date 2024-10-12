(function () {var f={};var g=/iPhone/i,i=/iPod/i,j=/iPad/i,k=/\biOS-universal(?:.+)Mac\b/i,h=/\bAndroid(?:.+)Mobile\b/i,m=/Android/i,c=/(?:SD4930UR|\bSilk(?:.+)Mobile\b)/i,d=/Silk/i,b=/Windows Phone/i,n=/\bWindows(?:.+)ARM\b/i,p=/BlackBerry/i,q=/BB10/i,s=/Opera Mini/i,t=/\b(CriOS|Chrome)(?:.+)Mobile/i,u=/Mobile(?:.+)Firefox\b/i,v=function(l){return void 0!==l&&"MacIntel"===l.platform&&"number"==typeof l.maxTouchPoints&&l.maxTouchPoints>1&&"undefined"==typeof MSStream};function w(l){return function($){return $.test(l)}}function x(l){var $={userAgent:"",platform:"",maxTouchPoints:0};l||"undefined"==typeof navigator?"string"==typeof l?$.userAgent=l:l&&l.userAgent&&($={userAgent:l.userAgent,platform:l.platform,maxTouchPoints:l.maxTouchPoints||0}):$={userAgent:navigator.userAgent,platform:navigator.platform,maxTouchPoints:navigator.maxTouchPoints||0};var a=$.userAgent,e=a.split("[FBAN");void 0!==e[1]&&(a=e[0]),void 0!==(e=a.split("Twitter"))[1]&&(a=e[0]);var r=w(a),o={apple:{phone:r(g)&&!r(b),ipod:r(i),tablet:!r(g)&&(r(j)||v($))&&!r(b),universal:r(k),device:(r(g)||r(i)||r(j)||r(k)||v($))&&!r(b)},amazon:{phone:r(c),tablet:!r(c)&&r(d),device:r(c)||r(d)},android:{phone:!r(b)&&r(c)||!r(b)&&r(h),tablet:!r(b)&&!r(c)&&!r(h)&&(r(d)||r(m)),device:!r(b)&&(r(c)||r(d)||r(h)||r(m))||r(/\bokhttp\b/i)},windows:{phone:r(b),tablet:r(n),device:r(b)||r(n)},other:{blackberry:r(p),blackberry10:r(q),opera:r(s),firefox:r(u),chrome:r(t),device:r(p)||r(q)||r(s)||r(u)||r(t)},any:!1,phone:!1,tablet:!1};return o.any=o.apple.device||o.android.device||o.windows.device||o.other.device,o.phone=o.apple.phone||o.android.phone||o.windows.phone,o.tablet=o.apple.tablet||o.android.tablet||o.windows.tablet,o}f=x();if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f}else if(typeof define==="function"&&define.amd){define(function(){return f})}else{this["isMobile"]=f}})();
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
document.addEventListener('DOMContentLoaded', function() {
    const projects = document.querySelectorAll('.homeProjectWrap');
    const totalProjectsValue = document.getElementById('totalProject');
    const totalProjects = projects.length;
    totalProjectsValue.innerHTML = String(totalProjects).padStart(2, '0');
    const counterValue = document.getElementById('counterValue');
    let last_scroll_top = 0;
    let scaleXSetter = gsap.quickTo(".homeProjectWrap", "scaleX",{duration: 1, ease: "power4.out"}),
        scaleYSetter = gsap.quickTo(".homeProjectWrap", "scaleY",{duration: 1, ease: "power4.out"});
    setTimeout(() => {
        scaleXSetter(1);
        scaleYSetter(1);
        gsap.to('canvas#defaultCanvas0',{
            ease: "none",
            duration:.5,
            webkitFilter:"blur(0)",
            scale:1,
            filter:"blur(0)",
            overwrite:true,
        });
    },300)
    let smoother = ScrollSmoother.create({
        wrapper: '#smooth-wrapper',
        content:'#smooth-content',
        smooth: .5,               // how long (in seconds) it takes to "catch up" to the native scroll position
        effects: true,           // looks for data-speed and data-lag attributes on elements
        smoothTouch: 0.5,        // much shorter smoothing time on touch devices (default is NO smoothing on touch devices)
        onUpdate: self => {
            if(!isMobile.any){
                if(self.getVelocity() > 0){
                    gsap.to('.homeProjectWrap', {
                        ease: "power4.out",
                        duration: 1,
                        scale: 1.14,
                    });
                    gsap.to('canvas#defaultCanvas0', {
                        ease: "power4.out",
                        duration: 1,
                        webkitFilter: "blur(3px)",
                        filter: "blur(3px)",
                        scale: 0.9,
                    });
                } else {
                    gsap.to('.homeProjectWrap', {
                        ease: "power4.out",
                        duration: 1,
                        scale: 0.9,
                    });
                    gsap.to('canvas#defaultCanvas0', {
                        ease: "power4.out",
                        duration: 1,
                        webkitFilter: "blur(3px)",
                        filter: "blur(3px)",
                        scale: 1.3,
                    });
                }
            }
        },
        onStop: () => {
            if(!isMobile.any){
                gsap.to('.homeProjectWrap', {
                    ease: "none",
                    duration: .5,
                    scale: 1,
                    overwrite:true,
                });
                gsap.to('canvas#defaultCanvas0',{
                    ease: "none",
                    duration:.5,
                    webkitFilter:"blur(0)",
                    scale:1,
                    filter:"blur(0)",
                    overwrite:true,
                });
            }
        }
    });
    let projectName ;
    let projectUrl ;
    let currentProjectName = document.getElementById('currentProjectName');
    let spacing = 0.1, // spacing of the cards (stagger)
        snapTime = gsap.utils.snap(spacing), // we'll use this to snapTime the playhead on the seamlessLoop
        cards = gsap.utils.toArray('.homeProjectWrap');
    let audioSlider1 = document.getElementById('sliderAudio');
    //=======================AUDIO
    function appendAudio(index) {
        const audioId = `sliderAudio${index}`;
        const audioSources = [
            "<?php ThemeAssets('audio/Tick-03.ogg'); ?>",
            "<?php ThemeAssets('audio/Tick-03.mp3'); ?>"
        ];

        const audioElement = document.createElement('audio');
        audioElement.id = audioId;

        audioSources.forEach(src => {
            const sourceElement = document.createElement('source');
            sourceElement.src = src;
            sourceElement.type = src.endsWith('.ogg') ? 'audio/ogg' : 'audio/mpeg';
            audioElement.appendChild(sourceElement);
        });

        audioElement.innerHTML = 'Your browser does not support the audio element.';
        document.getElementById('audioWrapper').appendChild(audioElement);
    }
    //=======================AUDIO
    //=======================COOKIE BOX
    let cookieBtn = document.getElementById('acceptCookie');
    cookieBtn.addEventListener('click',function () {
        document.querySelector('body').classList.add('hideC');
        //audioSlider1.muted = true;
        //audioSlider1.play();
    })
    //=======================COOKIE BOX
    projects.forEach((project, index) => {
        ScrollTrigger.create({
            trigger: project,
            start: "10% center",
            end:"90% center",
            onEnter: () => {
                console.log(index);
                appendAudio(`sliderAudio${index}`);
                if(index !== 0){
                    // audioSlider.muted = false;
                    // audioSlider.pause();
                    // audioSlider.currentTime = 0;
                    // audioSlider.play();
                }
                if(!isMobile.any){
                    counterValue.textContent = String(index + 1).padStart(2, '0');
                    projectUrl = project.getAttribute('href');
                    currentProjectName.setAttribute('href',projectUrl);
                    projectName = project.children[1].children[1].children[0].textContent.substring(1);
                    currentProjectName.children[0].textContent = projectName;
                }
            },
            onEnterBack: () => {
                // audioSlider.muted = false;
                // audioSlider.pause();
                // audioSlider.currentTime = 0;
                // audioSlider.play();
                if(!isMobile.any){
                    counterValue.textContent = String(counterValue.textContent - 1).padStart(2, '0');
                    projectUrl = project.getAttribute('href');
                    currentProjectName.setAttribute('href',projectUrl);
                    projectName = project.children[1].children[1].children[0].textContent.substring(1);
                    currentProjectName.children[0].textContent = projectName;
                }
            },
        });
    });
    let scrollTimeout;
    let previousScrollPosition = 0;
    function handleScroll() {
        //updateCounter();
        var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        if (st > last_scroll_top) {
            // downscroll code
            gsap.to('canvas#defaultCanvas0',{
                ease: "power4.out",
                duration:1,
                webkitFilter:"blur(3px)",
                filter:"blur(3px)",
                scale:0.9,
            });
        } else if (st < last_scroll_top) {
            // upscroll code
            gsap.to('canvas#defaultCanvas0',{
                ease: "power4.out",
                duration:1,
                webkitFilter:"blur(3px)",
                scale:1.3,
                filter:"blur(3px)"
            });
        } // else was horizontal scroll
        last_scroll_top = st <= 0 ? 0 : st; // For Mobile or negative scrolling
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {

        }, 200); // Adjust the timeout duration as needed

        const currentScrollPosition = window.scrollY;

        if (currentScrollPosition === previousScrollPosition) {
            // Scrolling has stopped
            console.log('Scrolling stopped: Scroll position comparison');
        }
        previousScrollPosition = currentScrollPosition;
    }
    window.addEventListener('scroll', handleScroll);
    // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
    //===========================HOVER PROJECTS
    const firstProjectBox = document.querySelectorAll('.homeProjectWrap')[0].getAttribute('data-url');
    const projectBoxes = document.querySelectorAll('.homeProjectWrap'); // Select all elements
    const mediaBox = document.getElementById('mediaHomeProject');
    mediaBox.setAttribute('src',firstProjectBox)
    projectBoxes.forEach(projectBox => {
        projectBox.addEventListener('mouseenter', function () {
            let currentLink = this.getAttribute('data-url'); // Get the data-url attribute

            // Fade out the image
            gsap.to(mediaBox, { opacity: 0, duration: 0.25, onComplete: () => {
                    mediaBox.setAttribute('src', currentLink); // Change the src after fade out
                    // Fade in the image
                    gsap.to(mediaBox, { opacity: 1, duration: 0.25 });
                }});
        });
    });
    let homeSideBarContainer =  document.querySelector('.homeSideBarContainer');
    const projectWraps = gsap.utils.toArray('.homeProjectWrapp');
    //===================MOBILE
    if(isMobile.any){
        document.querySelector('body').classList.add('mobile');
        var swiper = new Swiper(".mySwiper", {
            direction: "vertical",
            slidesPerView: 2,
            spaceBetween: 18,
            mousewheel: true,
            loop:true,
            breakpoints: {
                769: {
                    slidesPerView: 3,
                    spaceBetween: 18,
                    centeredSlides: true,
                },
            },
            on: {
                init: function () {
                    let heightSwiper = document.querySelector('.swiper-slide').clientHeight,
                        heightInfo = document.querySelector('.projectInfo').clientHeight,
                        projectMediaHeight = heightSwiper - heightInfo;
                    document.querySelectorAll('.projectMedia').forEach((projectMedia) => {
                        projectMedia.style.height = projectMediaHeight+'px';
                    })
                },
            },
        });
        swiper.on('beforeSlideChangeStart',function () {
            homeSideBarContainer.classList.add('hide');
        })
        swiper.on('slideChange', function (e) {
            const currentIndex = this.activeIndex;
            const previousIndex = this.previousIndex;
            if (currentIndex > previousIndex) {
                homeSideBarContainer.classList.add('hide');
            } else if (currentIndex < previousIndex) {
                homeSideBarContainer.classList.add('hide');
            }
            if(swiper.realIndex !== 0){
                audioSlider.muted = false;
                audioSlider.play();
            }
            let currentEl = e.el.children[0].children[swiper.activeIndex];
            let currentSkisImage = currentEl.children[0].getAttribute('data-url');
            let swipeProjectName = currentEl.children[0].children[1].children[1].children[0].textContent.substring(1);
            let projectNumber = Number(currentEl.getAttribute('data-swiper-slide-index')) + 1;
            let currentSwiperLink = currentEl.children[0].getAttribute('href');
            currentProjectName.setAttribute('href',currentSwiperLink);
            currentProjectName.children[0].textContent = swipeProjectName;
            counterValue.textContent = String(projectNumber).padStart(2, '0');
            gsap.to(mediaBox, { opacity: 0, duration: 0.25, onComplete: () => {
                    mediaBox.setAttribute('src', currentSkisImage);
                    gsap.to(mediaBox, { opacity: 1, duration: 0.25 });
                }});
            setTimeout(() => {
                homeSideBarContainer.classList.remove('hide');
            },2500)
        });
        //swipe right
        function handleSwipeRight(event) {
            homeSideBarContainer.classList.add('hide');
        }
// Add event listener to all <p> elements for touch events
        homeSideBarContainer.addEventListener("touchstart", handleTouchStart, false);
        homeSideBarContainer.addEventListener("touchend", handleTouchEnd, false);
        let xStart = null;
        function handleTouchStart(event) {
            xStart = event.touches[0].clientX; // Store the starting point
        }

        function handleTouchEnd(event) {
            if (xStart !== null) {
                const xEnd = event.changedTouches[0].clientX; // Get the end point
                const xDiff = xEnd - xStart;

                // Check if the swipe is right
                if (xDiff > 50) { // You can adjust the threshold
                    handleSwipeRight();
                }
                xStart = null; // Reset start point
            }
        }
    } else {
        document.querySelector('body').classList.add('desktop')
    }
});