//===========GET UAE TIME ZONE
const timeZone = document.getElementById('timeZone');
function updateUAETime() {
    // Get the current date and time
    const now = new Date();

    // تنظیمات برای فرمت ساعت در منطقه زمانی امارات
    const options = {
        timeZone: 'Asia/Dubai',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false // استفاده از فرمت 24 ساعته
    };
    const uaeTime = new Intl.DateTimeFormat('en-US', options).format(now);

    // console.log(`Current time in UAE: ${uaeTime}`);
    timeZone.innerHTML = uaeTime;

    // Call the function again after 1000 ms (1 second)
    setTimeout(updateUAETime, 1000);
}

// Start the time update
updateUAETime();

// =============================Menu
const menuIcon = document.querySelector('.menu-icon .icon');
// Assuming lenis is already defined and initialized somewhere in your code
menuIcon.addEventListener('click', function() {
    document.body.classList.toggle('opMenu');
    if(document.querySelector('html').classList.contains('lenis')){
        if (document.body.classList.contains('opMenu')) {
            console.log('hey')
            lenis.stop(); // Stop lenis when opMenu is added
        } else {
            lenis.start(); // Start lenis when opMenu is removed
        }
    }
});
// Append all images to mediaSection
// const mediaSection = document.querySelector('#menuContainer .mediaSection');
// const navItems = document.querySelectorAll('#menuContainer .infoSection .navItem');
// navItems.forEach(item => {
//     const img = item.querySelector('.media img').cloneNode();
//     img.classList.add('notSelected'); // Set notSelected class initially
//     mediaSection.appendChild(img);
// });

// Event listeners for hover effect
// document.querySelectorAll('#menuContainer .infoSection .navItem .title').forEach(title => {
//     title.addEventListener('mouseenter', () => {
//
//         // Remove 'selected' class from all navItems
//         document.querySelectorAll('#menuContainer .infoSection .navItem').forEach(item => {
//             item.classList.remove('selected');
//         });
//
//         // Add 'selected' class to the current navItem
//         const navItem = title.parentElement;
//         navItem.classList.add('selected');
//
//
//         const selectedImgSrc = title.parentElement.querySelector('.media img').src;
//         // Remove 'selected' class from all images and add 'notSelected'
//         document.querySelectorAll('#menuContainer .mediaSection img').forEach(img => {
//             img.classList.remove('selected');
//             img.classList.add('notSelected');
//         });
//
//         // Add 'selected' class to the current image
//         const currentImg = Array.from(mediaSection.children).find(img => img.src === selectedImgSrc);
//         if (currentImg) {
//             currentImg.classList.add('selected');
//             currentImg.classList.remove('notSelected');
//         }
//     });
// });

let menuLink = document.querySelectorAll('.menu-link');
let subMenu = document.querySelectorAll('.subMenu');

menuLink.forEach((menu,index) => {
    menu.addEventListener('mouseenter', (e) => {
        console.log(index);
        subMenu.forEach((sub) => {
            sub.classList.remove('show');
        });
        subMenu[index].classList.add('show');
        const image = menu.querySelector('.image_rev');
        const imageW = image.offsetWidth / 2;
        const imageH = image.offsetHeight / 2;
        menu.classList.add('show');
        gsap.to(image, {
            duration: 0.5,
            x: e.offsetX - imageW,
            y: e.offsetY - imageH,
            autoAlpha: 1
        });
    });
    menu.addEventListener('mouseleave', () => {
        const image = menu.querySelector('.image_rev');
        menu.classList.remove('show');
        gsap.to(image, {
            autoAlpha: 0,
            rotation: 0 // Reset rotation
        });
    });
    let timer,
        oldX = 0;
    menu.addEventListener('mousemove', (e) => {
        const image = menu.querySelector('.image_rev');
        const imageW = image.offsetWidth / 2;
        const imageH = image.offsetHeight / 2;
        let rotation;
        if (e.pageX < oldX) {
            //direction = "left";
            rotation = (-1) * 7;
        } else if (e.pageX > oldX) {
            //direction = "right";
            rotation =  7;
        }
        oldX = e.pageX;
        // Calculate rotation

        gsap.to(image, {
            duration: 0.5,
            x: e.offsetX - imageW,
            y: e.offsetY - imageH,
            rotation: rotation // Apply rotation
        });
        clearTimeout(timer);
        timer = setTimeout(function () {
            gsap.to(image, {
                rotation: 0 // Reset rotation
            });
        },110);
    });
});
/*=============Scroll Direction*/
let lastScrollTop = 0;

window.addEventListener("scroll", function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let body = document.body;

    if (scrollTop > lastScrollTop) {
        // Scrolling down
        body.classList.add("scrollingDown");
        body.classList.remove("scrollingUp");
        body.classList.remove("scrollingNo");
    } else if (scrollTop < lastScrollTop) {
        // Scrolling up
        if (scrollTop === 0) {
            // At the top of the page
            body.classList.add("scrollingNo");
            body.classList.remove("scrollingUp");
            body.classList.remove("scrollingDown");
        } else {
            body.classList.add("scrollingUp");
            body.classList.remove("scrollingDown");
            body.classList.remove("scrollingNo");
        }
    } else {
        // No scroll
        body.classList.remove("scrollingUp");
        body.classList.remove("scrollingDown");
        body.classList.remove("scrollingNo");
    }

    lastScrollTop = scrollTop;
}, false);

window.addEventListener('scroll', function() {
    var scroll = window.pageYOffset || document.documentElement.scrollTop;
    if (scroll > 0) {
        document.querySelector('body').classList.remove('noMove');
    } else {
        document.querySelector('body').classList.add('noMove');
    }
});
window.addEventListener('scroll', () => {
    // Calculate the scroll position
    const scrollTop = window.scrollY; // Current scroll position from the top
    const windowHeight = window.innerHeight; // Height of the viewport
    const documentHeight = document.body.offsetHeight; // Total height of the document
    // Check if the user has scrolled to the bottom
    if (scrollTop + windowHeight >= documentHeight) {
        document.querySelector('body').classList.remove('scrollEnd');
    }
});
// ==========================vh
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);


//==================SKEW FOR TEXT
const skewTexts = document.querySelectorAll(".skewText");
let skewTBlock = document.querySelector('.skewText');
if(skewTBlock){
    skewTexts.forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                z:0,
                x: -20,
                y:30,
            },
            {
                opacity: 1,
                z: 0,
                x: 0,
                y: 0,
                duration: .8,
                scrollTrigger: {
                    trigger: text,
                    ease: "power4.out",
                    start: "top 80%", // Trigger when the top of the element hits 80% of the viewport height
                    toggleActions: "play none none reverse", // Play on enter, reverse on leave
                    once: true // Animation only happens once
                }
            }
        );
    });
}
//==================mouseStopped
let timeout;
let mouseStopFunction = function(){
    clearTimeout(timeout);
    timeout = setTimeout(function(){
        document.querySelector('html').classList.add('mouseStopped')
    }, 15000);
    document.querySelector('html').classList.remove('mouseStopped')
}
document.onmousemove = mouseStopFunction;
window.onscroll = mouseStopFunction;
window.onkeydown = mouseStopFunction;
window.onkeypress = mouseStopFunction;
window.onchange = mouseStopFunction;
// works only on touch devices
//
// based on https://stackoverflow.com/questions/2264072/detect-a-finger-swipe-through-javascript-on-the-iphone-and-android
document.addEventListener("touchstart", handleTouchStart, { passive: false });
document.addEventListener("touchmove", handleTouchMove, { passive: false });
var xDown = null;
var yDown = null;
function getTouches(evt) {
    return (
        evt.touches || evt.originalEvent.touches // browser API
    ); // jQuery
}
function handleTouchStart(evt) {
    // evt.preventDefault();
    const firstTouch = getTouches(evt)[0];
    xDown = firstTouch.clientX;
    yDown = firstTouch.clientY;
}
function handleTouchMove(evt) {
    // evt.preventDefault();
    if (!xDown || !yDown) {
        return;
    }
    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
    document.querySelector("html").classList.remove("initial");
    active = document.querySelector(".active");
    if (active) {
        active.classList.remove("active");
    }
    if (Math.abs(xDiff) > Math.abs(yDiff)) {
        /*most significant*/
        if (xDiff > 0) {
            // document.querySelector("#swipeleft").classList.add("active");
            document.querySelector('html').classList.add('swipeLeft');
             document.querySelector('html').classList.remove('mouseStopped')
        } else {
            // document.querySelector("#swiperight").classList.add("active");
            document.querySelector('html').classList.add('swipeRight');
             document.querySelector('html').classList.remove('mouseStopped')
        }
    } else {
        if (yDiff > 0) {
            // document.querySelector("#swipeup").classList.add("active");
            document.querySelector('html').classList.add('swipeUp');
             document.querySelector('html').classList.remove('mouseStopped')
        } else {
            // document.querySelector("#swipedown").classList.add("active");
            document.querySelector('html').classList.add('swipeDown');
             document.querySelector('html').classList.remove('mouseStopped')
        }
    }
    /* reset values */
    xDown = null;
    yDown = null;
}