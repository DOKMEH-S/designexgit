function loadIsotopeR(){
    let elem = document.querySelector('.grid');
    let iso = new Isotope( elem, {
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer'
        }
    });
}
loadIsotopeR();