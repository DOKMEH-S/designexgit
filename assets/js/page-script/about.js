(function () {var f={};var g=/iPhone/i,i=/iPod/i,j=/iPad/i,k=/\biOS-universal(?:.+)Mac\b/i,h=/\bAndroid(?:.+)Mobile\b/i,m=/Android/i,c=/(?:SD4930UR|\bSilk(?:.+)Mobile\b)/i,d=/Silk/i,b=/Windows Phone/i,n=/\bWindows(?:.+)ARM\b/i,p=/BlackBerry/i,q=/BB10/i,s=/Opera Mini/i,t=/\b(CriOS|Chrome)(?:.+)Mobile/i,u=/Mobile(?:.+)Firefox\b/i,v=function(l){return void 0!==l&&"MacIntel"===l.platform&&"number"==typeof l.maxTouchPoints&&l.maxTouchPoints>1&&"undefined"==typeof MSStream};function w(l){return function($){return $.test(l)}}function x(l){var $={userAgent:"",platform:"",maxTouchPoints:0};l||"undefined"==typeof navigator?"string"==typeof l?$.userAgent=l:l&&l.userAgent&&($={userAgent:l.userAgent,platform:l.platform,maxTouchPoints:l.maxTouchPoints||0}):$={userAgent:navigator.userAgent,platform:navigator.platform,maxTouchPoints:navigator.maxTouchPoints||0};var a=$.userAgent,e=a.split("[FBAN");void 0!==e[1]&&(a=e[0]),void 0!==(e=a.split("Twitter"))[1]&&(a=e[0]);var r=w(a),o={apple:{phone:r(g)&&!r(b),ipod:r(i),tablet:!r(g)&&(r(j)||v($))&&!r(b),universal:r(k),device:(r(g)||r(i)||r(j)||r(k)||v($))&&!r(b)},amazon:{phone:r(c),tablet:!r(c)&&r(d),device:r(c)||r(d)},android:{phone:!r(b)&&r(c)||!r(b)&&r(h),tablet:!r(b)&&!r(c)&&!r(h)&&(r(d)||r(m)),device:!r(b)&&(r(c)||r(d)||r(h)||r(m))||r(/\bokhttp\b/i)},windows:{phone:r(b),tablet:r(n),device:r(b)||r(n)},other:{blackberry:r(p),blackberry10:r(q),opera:r(s),firefox:r(u),chrome:r(t),device:r(p)||r(q)||r(s)||r(u)||r(t)},any:!1,phone:!1,tablet:!1};return o.any=o.apple.device||o.android.device||o.windows.device||o.other.device,o.phone=o.apple.phone||o.android.phone||o.windows.phone,o.tablet=o.apple.tablet||o.android.tablet||o.windows.tablet,o}f=x();if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f}else if(typeof define==="function"&&define.amd){define(function(){return f})}else{this["isMobile"]=f}})();
document.querySelectorAll('#aboutAnchorLinks a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        lenis.scrollTo(this.getAttribute('href'))
    });
})
//======FixAnchorLinks
if(!isMobile.any || isMobile.tablet){
    let tlAnchorLinks = gsap.timeline({
        scrollTrigger: {
            trigger: "#aboutWrapper",
            anticipatePin: 1,
            start: "top top",
            end: "bottom bottom",
            scrub: 1,
            pin: '.logo-anchor-links',
            pinSpacing: false,
        }
    })
}
//======SLIDESHOW
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.opacity = "0";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.opacity = "1";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}
//=======VERTICAL SLIDER
var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    slidesPerView: 3,
    spaceBetween: 18,
    mousewheel: true,
    loop:true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 4500,
        disableOnInteraction: false
    },
});
//========FOUNDER VIDEO
let founderVideo = document.getElementById('founderVideo');
if (founderVideo){
    // Set an event listener to pause the video at 5 seconds
    founderVideo.addEventListener('timeupdate', function() {
        if (founderVideo.currentTime >= 5) {
            founderVideo.currentTime = 0; // Reset to the start
        }
    });
//========MODAL VIDEO
    let ceoVideoCTA = document.getElementById('playFounder');
    let videoURL = founderVideo.getAttribute('data-url');
    let videoPoster = founderVideo.getAttribute('poster');
    let ceoVideo = document.getElementById('modalVideo');
    let ceoVideoSrc = document.getElementById('modalVideoSrc');
    let modalVideo = document.getElementById('videoModal');
    let closeModal = document.getElementById('closeModalVideo');
    document.addEventListener('DOMContentLoaded', function() {
        ceoVideo.setAttribute('poster',videoPoster);
        ceoVideoSrc.setAttribute('src',videoURL);
        ceoVideo.load();
        ceoVideoCTA.addEventListener('click',function () {
            modalVideo.classList.add('show');
            if(ceoVideo.paused){
                ceoVideo.play()
            }
        })
        closeModal.addEventListener('click',function () {
            modalVideo.classList.remove('show');
            ceoVideo.pause()
        })
    });
}
//==========ANCHOR LINKS ACTIVE
const sections = [
    "#whyUs",
    "#missionVision",
    "#statement",
    "#founder",
    "#team",
    "#awards",
    "#theFuture"
];
sections.forEach((section, index) => {
    gsap.utils.toArray(section).forEach((tSection) => {
        ScrollTrigger.create({
            trigger: tSection,
            marker:true,
            start: "-100px top",
            end: "80% top",
            onEnter: () => {
                document.querySelectorAll('#aboutAnchorLinks a')[index].classList.add("active");
            },
            onLeave: () => {
                document.querySelectorAll('#aboutAnchorLinks a')[index].classList.remove("active");
            },
            onEnterBack: () => {
                document.querySelectorAll('#aboutAnchorLinks a')[index].classList.add("active");
            },
            onLeaveBack: () => {
                document.querySelectorAll('#aboutAnchorLinks a')[index].classList.remove("active");
            },
        });
    });
});