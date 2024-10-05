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

        // Set initial state for expandMedia
        expandMedia.style.width = '0px';
        expandMedia.style.height = '0px';

        const setDimens = () => {
            const scrollPosition = window.scrollY;
            const windowHeight = window.innerHeight;
            const expandPosition = expandMedia.getBoundingClientRect().top + scrollPosition;

            // Calculate distance from top
            const distanceFromTop = expandPosition - scrollPosition;
            const halfwayPoint = windowHeight / 3*2; // 3/2 of viewport height
            const threshold = halfwayPoint - headerHeight; // Adjust for header

            // Adjust progress based on threshold
            const progress = Math.min(1, Math.max(0, (threshold - distanceFromTop + windowHeight) / windowHeight));

            // Set width and height based on progress
            const maxWidth = 160; // Max width in pixels
            const maxHeight = 57.6; // Max height in pixels
            expandMedia.style.width = `${progress * maxWidth}px`;
            expandMedia.style.height = `${progress * maxHeight}px`;
        };

        // Initial dimensions and skew check
        setDimens();

        const onScroll = () => {
            setDimens();
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
    document.addEventListener('DOMContentLoaded', function() {
        let ceoVideo = document.getElementById('modalVideo');
        let ceoVideoSrc = document.getElementById('modalVideoSrc');
        let modalVideo = document.getElementById('videoModal');
        let closeModal = document.getElementById('closeModalVideo');

        // Function to handle video click
        function handleVideoClick(video) {
            let videoURL = video.getAttribute('data-url');
            let videoPoster = video.getAttribute('poster');

            ceoVideo.setAttribute('poster', videoPoster);
            ceoVideoSrc.setAttribute('src', videoURL);
            ceoVideo.load();

            modalVideo.classList.add('show');
            if (ceoVideo.paused) {
                ceoVideo.play();
            }
        }

        // Attach event listeners to videos with the class .needModal
        let needModalVideos = document.querySelectorAll('.needModal');
        needModalVideos.forEach(video => {
            video.addEventListener('click', function() {
                handleVideoClick(video);
            });
        });

        // Attach event listener to the play button in the singleProjectVideoContainer
        let videoCTA = document.getElementById('playVideo');
        let servicesVideo = document.getElementById('servicesVideo');

        videoCTA.addEventListener('click', function() {
            handleVideoClick(servicesVideo);
        });

        // Close modal functionality
        closeModal.addEventListener('click', function() {
            modalVideo.classList.remove('show');
            ceoVideo.pause();
        });
    });
}
