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