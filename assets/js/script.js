//===========GET UAE TIME ZONE
const timeZone = document.getElementById('timeZone');
let isMenuOpen = false;
function updateUAETime() {
    const now = new Date();

    const options = {
        timeZone: 'Asia/Dubai',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false // Use 24-hour format
    };
    const uaeTime = new Intl.DateTimeFormat('en-US', options).format(now);
    timeZone.innerHTML = uaeTime;

    // Only call again if the menu is still open
    if (isMenuOpen) {
        setTimeout(updateUAETime, 1000); // Update every second
    }
}


// =============================Menu
// Check if #menuContainer exists on the page
if (document.querySelector('#menuContainer')) {
    const menuIcon = document.querySelector('.menu-icon .icon');
    // Assuming lenis is already defined and initialized somewhere in your code
    menuIcon.addEventListener('click', function() {
        document.body.classList.toggle('opMenu');
        if (document.querySelector('html').classList.contains('lenis')) {
            if (document.body.classList.contains('opMenu')) {
                console.log(isMenuOpen);
                isMenuOpen = true;
                updateUAETime(); // Start updating time immediately
                lenis.stop(); // Stop lenis when opMenu is added
            } else {
                console.log(isMenuOpen);
                isMenuOpen = false;
                lenis.start(); // Start lenis when opMenu is removed
            }
        }
    });

    let menuLink = document.querySelectorAll('.menu-link');
    let subMenu = document.querySelectorAll('.subMenu');
    menuLink.forEach((menu, index) => {
        let lastMouseX = 0; // Track the last mouse X position
        menu.addEventListener('mouseenter', function (e) {
            const image = menu.querySelector('.image_rev');
            const imageW = image.offsetWidth / 2;
            const imageH = image.offsetHeight / 2;

            // Get the bounding rectangle of the .menu-link
            const rect = menu.getBoundingClientRect();

            // GSAP animation for image
            gsap.to(image, {
                duration: 0.5,
                x: e.clientX - rect.left - imageW, // Adjust x based on the bounding rect
                y: e.clientY - rect.top - imageH,   // Adjust y based on the bounding rect
                autoAlpha: 1
            });
        });

        menu.addEventListener('mousemove', function (e) {
            const image = menu.querySelector('.image_rev');
            const imageW = image.offsetWidth / 2;
            const imageH = image.offsetHeight / 2;
            // Get the bounding rectangle of the .menu-link
            const rect = menu.getBoundingClientRect();
            let timer;
            // Determine rotation based on mouse position
            // Determine mouse movement direction
            const mouseX = e.clientX;
            const deltaX = mouseX - lastMouseX; // Calculate the change in mouse position

            // Update lastMouseX
            lastMouseX = mouseX;

            // Calculate rotation based on the direction of mouse movement
            let rotation = 0;
            if (deltaX > 0) {
                rotation = 10; // Rotate right
            } else if (deltaX < 0) {
                rotation = -10; // Rotate left
            }
            // GSAP animation for image
            gsap.to(image, {
                duration: 0.5,
                x: e.clientX - rect.left - imageW, // Adjust x based on the bounding rect
                y: e.clientY - rect.top - imageH,   // Adjust y based on the bounding rect
                rotation: rotation // Apply rotation
            });
            clearTimeout(timer);
            timer = setTimeout(() => {
                gsap.to(image, {
                    rotation: 0 // Reset rotation
                });
            }, 100);
        });

        menu.addEventListener('mouseleave', () => {
            const image = menu.querySelector('.image_rev');
            // Hide image and reset rotation
            gsap.to(image, {
                autoAlpha: 0,
                rotation: 0 // Reset rotation
            });
        });
    });
    let menuItems = document.querySelectorAll('.item-title');

    menuItems.forEach((item, index) => {
        item.addEventListener('mouseenter', function () {
            // Remove 'show' class from all items
            menuItems.forEach((otherItem) => {
                otherItem.classList.remove('show');
            });

            // Add 'show' class to the hovered item
            item.classList.add('show');

            // Show corresponding submenu
            subMenu.forEach((sub) => sub.classList.remove('show'));
            if (subMenu[index]) {
                subMenu[index].classList.add('show');
            }
        });
    });
   /* document.querySelector('.menu-list').addEventListener('mouseleave',function () {
        menuItems.forEach((otherItem) => {
            otherItem.classList.remove('show');
        });
        subMenu.forEach((sub) => sub.classList.remove('show'));
    })*/
}
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
// --------------------------------------------------------shuffleText
document.addEventListener('DOMContentLoaded', function() {
    // Set effect velocity in ms
    var velocity = 20;
    var shuffleElements = document.querySelectorAll('.shuffle');

    shuffleElements.forEach(function(item) {
        item.setAttribute('data-text', item.textContent);
    });

    function shuffle(o) {
        for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
        return o;
    }

    function shuffleText(element, originalText) {
        var elementTextArray = [];
        var randomText = [];
        for (var i = 0; i < originalText.length; i++) {
            elementTextArray.push(originalText.charAt(i));
        }

        function repeatShuffle(times, index) {
            if (index === times) {
                element.textContent = originalText;
                return;
            }
            setTimeout(function() {
                randomText = shuffle([...elementTextArray]); // Create a copy for shuffling
                for (var i = 0; i < index; i++) {
                    randomText[i] = originalText[i];
                }
                element.textContent = randomText.join('');
                index++;
                repeatShuffle(times, index);
            }, velocity);
        }
        repeatShuffle(element.textContent.length, 0);
    }

    shuffleElements.forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            shuffleText(item, item.getAttribute('data-text'));
        });
    });
});
// --------------------------------------------------------shuffleText
// --------------------------------------------------------subscribeModal
// Select the required elements
const subscribeLink = document.querySelector('#menuContainer .extraLink-item.subscribe');
const subscribeButton = document.querySelector('#newsletterLink-container > .subscribeBtn');
const body = document.body;

// Function to add class
const addClassToBody = (event) => {
    event.stopPropagation(); // Prevent the click from bubbling up
    body.classList.add('opSubscribe');
    console.log('Class opSubscribe added to body.');
};

// Function to remove class
const removeClassFromBody = (event) => {
    const footerSubscribeForm = document.querySelector('.footer-subscribe-form');
    // Check if the click target is outside the footerSubscribeForm
    if (footerSubscribeForm && !footerSubscribeForm.contains(event.target) && body.classList.contains('opSubscribe')) {
        body.classList.remove('opSubscribe');
        console.log('Class opSubscribe removed from body.');
    }
};

// Event listeners
if (subscribeLink) {
    subscribeLink.addEventListener('click', addClassToBody);
}

if (subscribeButton) {
    subscribeButton.addEventListener('click', addClassToBody);
}

// Click outside detection
document.addEventListener('click', removeClassFromBody);
// --------------------------------------------------------subscribeModal