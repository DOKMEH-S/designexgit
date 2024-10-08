/*============Open Filter=============*/
const mobileIcon = document.querySelector('.projectHeader-container .mobileIcon');
const proHeadContainer = document.querySelector('.projectHeader-container');

mobileIcon.addEventListener('click', function () {
    if (proHeadContainer.classList.toggle('opFilter')) {
        lenis.stop();
    } else {
        lenis.start();
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