// -----------------------------addGridDisplayClass
var htmlElement = document.querySelector('html');
htmlElement.classList.add('gridDisplay');
// -----------------------------addGridDisplayClass
// -----------------------------lightBox
var lightbox = new SimpleLightbox('.projectSingleGallery a', {
    overlayOpacity: 1,
});

var iconElement = document.querySelector('.icon');
var bannerElement = document.querySelector('section.projectSingle-banner');
// Open the lightbox when .icon is clicked
iconElement.addEventListener('click', function() {
    lightbox.open();
});

// Open the lightbox when .projectSingle-banner is clicked
bannerElement.addEventListener('click', function() {
    lightbox.open();
    console.log('ss')
});
// -----------------------------lightBox
// -----------------------------viewMore
$('section.projectSingle-info .spec-container .features .more').slideUp();
$('section.projectSingle-info .spec-container .features .view').click(function (){
    $(this).siblings('.more').slideToggle();
    $(this).toggleClass('active')
})
// -----------------------------viewMore