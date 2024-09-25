document.addEventListener('DOMContentLoaded', function() {
    const loading = document.querySelector('#loading');
    if (loading) {
        loading.classList.add('animate');

        setTimeout(() => {
            const logoContainer = loading.querySelector('.loading-logoContainer');
            if (logoContainer) {
                const translateX = -logoContainer.getBoundingClientRect().left;
                const translateY = -logoContainer.getBoundingClientRect().top;

                // Step 2: Transform the loading logo container
                logoContainer.style.transform = `translate(${translateX}px, ${translateY}px)`;

                const header = document.querySelector('.identity');
                if (header) {
                    header.style.display = 'block';
                }

                // Scale the logo image and text
                const logoImg = logoContainer.querySelector('.logo-img');
                const logoText = logoContainer.querySelector('.logo-text');

                if (logoImg) {
                    logoImg.style.transform = 'scale(1)';
                    logoImg.style.transition = 'transform 0.5s ease';
                    logoImg.style.margin = '0'; // Set margin to 0
                }

                if (logoText) {
                    logoText.style.transform = 'scale(1)';
                    logoText.style.transition = 'all 0.5s ease';
                }

                // Delay for 1 second before adding the loadingDone class
                setTimeout(() => {
                    // Step 3: Add the loadingDone class to the body
                    document.body.classList.add('loadingDone');

                    // Fade out the logo text after 3 seconds
                    // setTimeout(() => {
                    //     if (logoText) {
                    //         logoText.style.opacity = '0';
                    //         logoText.style.transition = 'opacity 0.5s ease';
                    //     }
                    // }, 3000); // Fade out delay
                }, 500); // 1 second delay after scaling
            }
        }, 2000); // Initial delay for loading animation
    }
});

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

//     document.querySelectorAll('#menuContainer .infoSection .navItem .title').forEach(title => {
//     title.addEventListener('mouseenter', () => {
//         // Remove 'selected' class from all navItems
//         document.querySelectorAll('#menuContainer .infoSection .navItem').forEach(item => {
//             item.classList.remove('selected');
//         });
//
//         // Add 'selected' class to the current navItem
//         const navItem = title.parentElement;
//         navItem.classList.add('selected');
//
//         // Get the image source from the current navItem
//         const imgSrc = navItem.querySelector('.media img').src;
//
//         // Set the image source in the mediaSection
//         document.querySelector('#menuContainer .mediaSection img').src = imgSrc;
//     });
// });
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