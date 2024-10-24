/*============HOVER BOX=============*/
document.querySelectorAll('.hover-box').forEach(function(tar) {
    tar.addEventListener('mouseenter', function(event) {
        var c_y = tar.getBoundingClientRect().top + tar.offsetHeight / 2;
        var c_x = tar.getBoundingClientRect().left + tar.offsetWidth / 2;
        var y = event.pageY - c_y;
        var x = event.pageX - c_x;
        var deg = (Math.atan2(y, x) * 180 / Math.PI) + 135;

        if (deg < 0) deg += 360;
        var dir = Math.floor(deg / 90);

        var dir_move;
        switch (dir) {
            case 0:
                dir_move = { left: '0', top: '-100%' };
                break;
            case 1:
                dir_move = { left: '100%', top: '0' };
                break;
            case 2:
                dir_move = { left: '0', top: '100%' };
                break;
            case 3:
                dir_move = { left: '-100%', top: '0' };
                break;
        }

        var hoverInfo = tar.querySelector('.hover-info');
        hoverInfo.style.display = 'none';
        Object.assign(hoverInfo.style, dir_move);

        clearTimeout(tar.dir_timeout);
        tar.dir_timeout = setTimeout(function() {
            hoverInfo.style.display = 'block';
            hoverInfo.style.top = '0';
            hoverInfo.style.left = '0';
        }, 0);
    });

    tar.addEventListener('mouseleave', function(event) {
        var c_y = tar.getBoundingClientRect().top + tar.offsetHeight / 2;
        var c_x = tar.getBoundingClientRect().left + tar.offsetWidth / 2;
        var y = event.pageY - c_y;
        var x = event.pageX - c_x;
        var deg = (Math.atan2(y, x) * 180 / Math.PI) + 135;

        if (deg < 0) deg += 360;
        var dir = Math.floor(deg / 90);

        var dir_move;
        switch (dir) {
            case 0:
                dir_move = { left: '0', top: '-100%' };
                break;
            case 1:
                dir_move = { left: '100%', top: '0' };
                break;
            case 2:
                dir_move = { left: '0', top: '100%' };
                break;
            case 3:
                dir_move = { left: '-100%', top: '0' };
                break;
        }

        var hoverInfo = tar.querySelector('.hover-info');
        Object.assign(hoverInfo.style, dir_move);
    });
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
/*============deactive-link=============*/
document.querySelectorAll('.deactive-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        this.classList.add('deactive-link-motion');

        setTimeout(function() {
            document.querySelectorAll('.deactive-link').forEach(function(link) {
                link.classList.remove('deactive-link-motion');
            });
        }, 1200);
    });
});
/*============deactive-link=============*/