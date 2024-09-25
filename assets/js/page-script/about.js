document.querySelectorAll('#aboutAnchorLinks a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        lenis.scrollTo(this.getAttribute('href'))
    });
})
//======FixAnchorLinks
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
//======SLIDESHOW
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}
//=======VERTICAL SLIDER
var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    slidesPerView: 3,
    spaceBetween: 18,
    mousewheel: true,
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