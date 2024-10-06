gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
document.addEventListener('DOMContentLoaded', function() {
    const projects = document.querySelectorAll('.homeProjectWrap');
    const totalProjectsValue = document.getElementById('totalProject');
    const totalProjects = projects.length;
    totalProjectsValue.innerHTML = String(totalProjects).padStart(2, '0');
    const counterValue = document.getElementById('counterValue');
    let last_scroll_top = 0;
    let currentIndex = 0;
    let scaleXSetter = gsap.quickTo(".homeProjectWrap", "scaleX",{duration: 1, ease: "power4.out"}),
        scaleYSetter = gsap.quickTo(".homeProjectWrap", "scaleY",{duration: 1, ease: "power4.out"}),
        clamp = gsap.utils.clamp(1.14, .9); // don't let the scale go beyond 1.14 and 0.9.
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
    },400)
    let smoother = ScrollSmoother.create({
        wrapper: '#smooth-wrapper',
        content:'#smooth-content',
        smooth: .5,               // how long (in seconds) it takes to "catch up" to the native scroll position
        effects: true,           // looks for data-speed and data-lag attributes on elements
        smoothTouch: 0.1,        // much shorter smoothing time on touch devices (default is NO smoothing on touch devices)
        onUpdate: self => {
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
        },
        onStop: () => {
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
    });
    let projectName ;
    let projectUrl ;
    let currentProjectName = document.getElementById('currentProjectName');

    projects.forEach((project, index) => {
        ScrollTrigger.create({
            trigger: project,
            start: "10% center",
            end:"90% center",
            onEnter: () => {
                console.log(index);
                counterValue.textContent = String(index + 1).padStart(2, '0');
                projectUrl = project.getAttribute('href')
                currentProjectName.setAttribute('href',projectUrl)
                projectName = project.children[1].children[1].textContent.substring(1);
                currentProjectName.children[0].textContent = projectName
            },
            onEnterBack: () => {
                counterValue.textContent = String(counterValue.textContent - 1).padStart(2, '0');
                projectUrl = project.getAttribute('href')
                currentProjectName.setAttribute('href',projectUrl)
                projectName = project.children[1].children[1].textContent.substring(1);
                currentProjectName.children[0].textContent = projectName
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
});