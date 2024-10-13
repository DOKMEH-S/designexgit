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
//========DROPDOWN
// Check if there is an accordion on the page
if (document.querySelector('.accordion')) {
    var linkToggle = document.querySelectorAll('.js-toggle');

    for (var i = 0; i < linkToggle.length; i++) {
        linkToggle[i].addEventListener('click', function(event) {
            event.preventDefault();

            // Close other open dropdowns
            linkToggle.forEach(function(link) {
                var container = document.getElementById(link.dataset.container);
                if (container !== document.getElementById(this.dataset.container)) {
                    container.style.maxHeight = '0px'; // Collapse
                    link.classList.remove('active');
                    container.classList.remove('active');
                }
            }, this);

            var container = document.getElementById(this.dataset.container);

            if (!container.classList.contains('active')) {
                this.classList.add('active');
                container.classList.add('active');
                container.style.maxHeight = 'none'; // Allow to calculate height

                var height = container.scrollHeight + 'px'; // Get the scroll height
                container.style.maxHeight = '0px'; // Collapse
                setTimeout(function () {
                    container.style.maxHeight = height; // Expand
                }, 0);
            } else {
                container.style.maxHeight = '0px'; // Collapse
                this.classList.remove('active');
                container.addEventListener('transitionend', function () {
                    container.classList.remove('active');
                }, {
                    once: true
                });
            }
        });
    }
    // Open the first dropdown by default
    var firstContainer = document.getElementById(linkToggle[0].dataset.container);
    firstContainer.classList.add('active');
    firstContainer.style.maxHeight = firstContainer.scrollHeight + 'px'; // Set initial height
}
//=======PLAY VIDEO
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
//PROGRESS BAR
/*var startCount = 0,
    num = {var:startCount};

let tl = gsap.timeline()
    .to(num, {var: 100, duration: 5, ease:"none", onUpdate:changeNumber});

ScrollTrigger.create({
    animation: tl,
    scrub: true
});*/
/// Ensure GSAP is loaded
gsap.registerPlugin(ScrollTrigger);

let num = { value: 0 };

// Function to update the progress bar and percentage text
function updateProgressBar() {
    // Update the text for the percentage display
    document.getElementById("percent-number").textContent = Math.round(num.value);

    // Get the progress bar and update its value
    const progressBar = document.getElementById("numbers");
    progressBar.value = Math.ceil(num.value + 1); // Set the value directly
}

// Function to handle scroll
function handleScroll() {
    const contactStepsContainer = document.querySelector('.contactStepsContainer');
    const sectionHeight = contactStepsContainer.offsetHeight;
    const scrollPosition = window.scrollY + window.innerHeight; // User's scroll position
    const sectionTop = contactStepsContainer.offsetTop; // Top position of the section

    // Check if the section is in view
    if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
        // Calculate the percentage based on scroll position
        const scrollPercent = ((scrollPosition - sectionTop) / sectionHeight) * 100;
        num.value = Math.min(scrollPercent, 100); // Ensure it doesn't exceed 100
        updateProgressBar();
    }
}

// Add scroll event listener
window.addEventListener('scroll', handleScroll);
