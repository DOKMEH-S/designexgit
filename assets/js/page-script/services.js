//========MODAL VIDEO
let ceoVideoCTA = document.getElementById('playVideo');
let ceoVideo = document.getElementById('modalVideo');
let modalVideo = document.getElementById('videoModal');
let closeModal = document.getElementById('closeModalVideo');
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

// ==============expandContainer
document.addEventListener("DOMContentLoaded", function() {
    const serviceItems = document.querySelectorAll('.serviceItem');
    const header = document.querySelector('header'); // Adjust selector if necessary
    const headerHeight = header.offsetHeight;

    serviceItems.forEach(item => {
        const expandMedia = item.querySelector('.expandMedia');
        const descriptions = item.querySelectorAll('.des');

        // Set initial state for expandMedia
        expandMedia.style.width = '0px';
        expandMedia.style.height = '0px';

        const setDimensionsAndSkew = () => {
            const scrollPosition = window.scrollY;
            const windowHeight = window.innerHeight;
            const expandPosition = expandMedia.getBoundingClientRect().top + scrollPosition;

            // Calculate distance from top
            const distanceFromTop = expandPosition - scrollPosition;
            const progress = Math.min(1, Math.max(0, (headerHeight - distanceFromTop + windowHeight) / windowHeight));

            // Set width and height based on progress
            const maxWidth = 160; // Max width in pixels
            const maxHeight = 57.6; // Max height in pixels
            expandMedia.style.width = `${progress * maxWidth}px`;
            expandMedia.style.height = `${progress * maxHeight}px`;

            // Skew and translate calculation for descriptions
            descriptions.forEach(des => {
                const desPosition = des.getBoundingClientRect().top + scrollPosition;
                const desDistanceFromTop = desPosition - scrollPosition;

                // Calculate skew from 0deg to -2deg
                const skew = Math.min(0, Math.max(-2, (headerHeight - desDistanceFromTop + windowHeight) / windowHeight * -2));

                // Set transform to skew
                gsap.set(des, {
                    transform: `skew(${skew}deg, 0deg)`
                });
            });
        };

        // Initial dimensions and skew check
        setDimensionsAndSkew();

        const onScroll = () => {
            setDimensionsAndSkew();
        };

        // Throttle scroll event
        let lastCall = 0;
        window.addEventListener('scroll', () => {
            const now = new Date().getTime();
            if (now - lastCall >= 100) { // 100ms throttle
                lastCall = now;
                onScroll();
            }
        });
    });
});
//=======PLAY VIDEO
let projectVideo = document.getElementById('servicesVideo');
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
    console.log(videoURL);
    document.addEventListener('DOMContentLoaded', function() {
        ceoVideo.setAttribute('poster',videoPoster);
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
