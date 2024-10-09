/*============Open Filter=============*/
const mobileIcon = document.querySelector('.projectHeader-container .mobileIcon');
const proHeadContainer = document.querySelector('.projectHeader-container');

mobileIcon.addEventListener('click', function (event) {
    // Toggle the opFilter class and control lenis
    if (proHeadContainer.classList.toggle('opFilter')) {
        // lenis.stop();
    } else {
        // lenis.start();
    }
});

// Add a click event listener to the document
document.addEventListener('click', function (event) {
    // Check if the clicked target is outside the projectHeader-container
    if (!proHeadContainer.contains(event.target) && proHeadContainer.classList.contains('opFilter')) {
        proHeadContainer.classList.remove('opFilter'); // Remove the class
        lenis.start(); // Restart lenis
    }
});
/*============Open Filter=============*/
/*============Hover Effect=============*/
document.addEventListener('DOMContentLoaded', function () {
    const blogItems = document.querySelectorAll('.blogItem');

    blogItems.forEach(item => {
        const link = item.querySelector('.link');

        link.addEventListener('mouseenter', function () {
            item.classList.add('blur'); // Add the blur class on hover
        });

        link.addEventListener('mouseleave', function () {
            item.classList.remove('blur'); // Remove the blur class when not hovering
        });
    });
});
/*============Hover Effect=============*/
/*============ScrollUp=============*/
document.querySelectorAll('.projectHeader-container_row-items > *').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        setTimeout(function () {
            e.preventDefault();
            lenis.scrollTo('#scrollDestination')
        },500)
    });
})
/*============ScrollUp=============*/