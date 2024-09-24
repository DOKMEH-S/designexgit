// -----------------------------displayType
document.documentElement.classList.add('gridDisplay');
var buttons = document.querySelectorAll('.projectButtons .displayType > *');

buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        var siblings = Array.from(this.parentElement.children);
        siblings.forEach(function(sibling) {
            sibling.classList.remove('selected');
        });
        this.classList.add('selected');

        var displayType = this.id;
        var htmlElement = document.querySelector('html');

        var classesWithDisplay = Array.from(htmlElement.classList).filter(function(className) {
            return className.endsWith('Display');
        }).join(' ');

        console.log(classesWithDisplay);

        htmlElement.classList.remove(classesWithDisplay);
        htmlElement.classList.add(displayType);
    });
});
// function loadIsotope(){
//     $(".grid").isotope({
//         itemSelector: ".grid-item",
//         percentPosition: !0,
//         // isOriginLeft: !1,
//         masonry: { columnWidth: ".grid-sizer", gutter: ".gutter-sizer" }
//     });
// }
function loadGrid() {
    $(".grid").isotope({
        itemSelector: ".grid-item",
        percentPosition: !0,
        // isOriginLeft: !1,
        masonry: {columnWidth: ".grid-sizer", gutter: ".gutter-sizer"}
    });
}
loadGrid();
// function loadGrid(){
//     let elem = document.querySelector('.grid');
//     let iso = new Isotope( elem, {
//         // options
//         itemSelector: '.grid-item',
//         percentPosition: true,
//         masonry: {
//             columnWidth: '.grid-sizer',
//             gutter: '.gutter-sizer'
//         }
//     });
// }
loadGrid();
$(".isotope").click(function () {
    loadGrid()
});
hoverShowHandler();
// -----------------------------displayType
// -----------------------------filter-container
// Function to toggle opFilter class on filterType and html elements
var filterTypeElements = document.querySelectorAll('.projectButtons .filterType > *:not(.filter-container)');
filterTypeElements.forEach(function(element) {
    element.addEventListener('click', function() {
        var filterType = this.parentElement;
        filterType.classList.toggle('opFilter');
        document.querySelector('html').classList.toggle('opFilter');
    });
});
// Function to remove opFilter class and active class on selectAll element
var selectAllButtons = document.querySelectorAll('.projectButtons .filterType .filter-container > *.selectAll');
selectAllButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var filterType = this.closest('.filterType');
        filterType.classList.remove('opFilter');

        document.documentElement.classList.remove('opFilter');

        this.classList.remove('active');
    });
});

$('.projectButtons .filterType .filter-container .accordion .item .checkBoxes').slideUp();
$('.projectButtons .filterType .filter-container .accordion .item .label').each(function (){
    $(this).click(function (){
        $(this).siblings('.checkBoxes').slideToggle();
        $(this).toggleClass('active')
        $(this).parent('.item').siblings('.item').find('.checkBoxes').slideUp();
        $(this).parent('.item').siblings('.item').find('.label').removeClass('active')
    })
})

$('.projectButtons .filterType .filter-container .accordion .item .checkBoxes .checkBox').each(function (){
    $(this).click(function (){
        $(this).toggleClass('selected');
        if($('.accordion .item .checkBoxes .checkBox').hasClass('selected')){
            $('.projectButtons .filterType .filter-container > *.selectAll').addClass('active')
        }else{
            $('.projectButtons .filterType .filter-container > *.selectAll').removeClass('active')
        }
    })
})

$(".projectButtons .filterType .filter-container > *.selectAll").click(function() {
    $('.projectButtons .filterType .filter-container .accordion .item .label').removeClass('active')
    $(".projectButtons .filterType .filter-container .accordion .item .checkBoxes .checkBox").removeClass("selected");
    $('.projectButtons .filterType .filter-container .accordion .item .checkBoxes').slideUp();
});
$(window).click(function (e){
    if (!e.target.closest('.filterType')){
        $('.filterType').removeClass('opFilter')
        $('html').removeClass('opFilter');
    }
})
// -----------------------------filter-container
/*====================HoverShowHandler=====================*/
function hoverShowHandler(){
    const link = document.querySelectorAll('.projectBox');
    const linkHoverReveal = document.querySelectorAll('.hover-reveal');
    const linkImages = document.querySelectorAll('.hidden-img');

    for(let i = 0; i < link.length; i++) {
        link[i].addEventListener('mousemove', (e) => {
            linkHoverReveal[i].style.opacity = 1;
            linkHoverReveal[i].style.transform = `translate(-170%, -50% ) rotate(5deg)`;
            linkImages[i].style.transform = 'scale(1, 1)';
            linkHoverReveal[i].style.left = e.clientX + "px";
        })
        link[i].addEventListener('mouseleave', (e) => {
            linkHoverReveal[i].style.opacity = 0;
            linkHoverReveal[i].style.transform = `translate(-50%, -50%) rotate(-5deg)`;
            linkImages[i].style.transform = 'scale(0.8, 0.8)';
        })
    }
}
/*====================HoverShowHandler=====================*/