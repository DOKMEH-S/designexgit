/*============HOVER BOX=============*/
var dir_move, dir_timeout, tar, m_top = {
    left: 0,
    top: '-100%'
}, m_right = {
    left: '100%',
    top: 0
}, m_down = {
    left: 0,
    top: '100%'
}, m_left = {
    left: '-100%',
    top: 0
};
$('.hover-box').hover(function(event) {
    tar = $(this);
    var c_y = tar.offset().top + tar.height() / 2
        , c_x = tar.offset().left + tar.width() / 2
        , y = event.pageY - c_y
        , x = event.pageX - c_x
        , deg = (Math.atan2(y, x) * 180 / Math.PI) + 135;
    // 135 to offset the degrees to top left being 0
    deg < 0 ? deg += 360 : deg += 0,
        // add 360 to default out of negative degrees
        dir = Math.floor(deg / 90);
    // Up Right Down Left, 0 1 2 3

    switch (dir) {
        case 0:
            dir_move = m_top;
            break;
        case 1:
            dir_move = m_right;
            break;
        case 2:
            dir_move = m_down;
            break;
        case 3:
            dir_move = m_left;
            break;
    };
    $('.hover-info', this).hide().css(dir_move);

    clearTimeout(dir_timeout);
    dir_timeout = setTimeout(function() {
        $('.hover-info', tar).show(0, function() {
            $('.hover-info', tar).css({
                'top': 0,
                'left': 0
            });
        });
    }, 0);

}, function(event) {

    tar = $(this)
    var c_y = tar.offset().top + tar.height() / 2
        , c_x = tar.offset().left + tar.width() / 2
        , y = event.pageY - c_y
        , x = event.pageX - c_x
        , deg = (Math.atan2(y, x) * 180 / Math.PI) + 135;
    // 135 to offset the degrees to top left being 0
    deg < 0 ? deg += 360 : deg += 0,
        // add 360 to default out of negative degrees
        dir = Math.floor(deg / 90);
    // Up Right Down Left, 0 1 2 3

    switch (dir) {
        case 0:
            dir_move = m_top;
            break;
        case 1:
            dir_move = m_right;
            break;
        case 2:
            dir_move = m_down;
            break;
        case 3:
            dir_move = m_left;
            break;
    }
    $('.hover-info', this).css(dir_move);
});
/*============HOVER BOX=============*/
/*============MAP VIEW=============*/
const mapViewIcons = document.querySelectorAll('.mapView_icon');
const mapContainer = document.getElementById('mapProjectsContainer');
const closeMapIcon = document.getElementById('closeMap');

mapViewIcons.forEach(icon => {
    icon.addEventListener('click', function () {
        mapContainer.classList.add('show');
        lenis.stop();
    });
});

closeMapIcon.addEventListener('click', function () {
    mapContainer.classList.remove('show');
    lenis.start();
});
/*============MAP VIEW=============*/
/*============Open Filter=============*/
const mobileIcon = document.querySelector('.projectHeader-container .mobileIcon');
const proHeadContainer = document.querySelector('.projectHeader-container');

mobileIcon.addEventListener('click', function (event) {
    // Toggle the opFilter class and control lenis
    if (proHeadContainer.classList.toggle('opFilter')) {
        lenis.stop();
    } else {
        lenis.start();
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