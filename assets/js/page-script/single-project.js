//========HERO VIDEO
let projectVideo = document.getElementById('projectVideo');
if(projectVideo){
    projectVideo.addEventListener('timeupdate', function() {
        if (projectVideo.currentTime >= 5) {
            projectVideo.currentTime = 0; // Reset to the start
        }
    });
    //========MODAL VIDEO
    let videoCTA = document.getElementById('playVideo');
    let videoURL = projectVideo.getAttribute('data-url');
    let videoPoster = projectVideo.getAttribute('poster');
    let ceoVideo = document.getElementById('modalVideo');
    let ceoVideoSrc = document.getElementById('modalVideoSrc');
    let modalVideo = document.getElementById('videoModal');
    let closeModal = document.getElementById('closeModalVideo');
    document.addEventListener('DOMContentLoaded', function() {
        if(videoPoster){
            ceoVideo.setAttribute('poster',videoPoster);
        }
        ceoVideoSrc.setAttribute('src',videoURL);
        ceoVideo.load();
        videoCTA.addEventListener('click',function () {
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
//============= GALLERY SLIDER
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    effect: "fade",
    loop:true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
});
/*============deactive-link=============*/
let deactiveLinks = document.querySelectorAll('.deactive-link');
if(deactiveLinks){
    deactiveLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.add('deactive-link-motion');

            setTimeout(function() {
                document.querySelectorAll('.deactive-link').forEach(function(link) {
                    link.classList.remove('deactive-link-motion');
                });
            }, 1200);
        });
    });
}
/*============deactive-link=============*/