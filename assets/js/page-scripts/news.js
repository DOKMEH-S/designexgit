var bodyListItems = document.querySelectorAll('.sort-list-wrapper .body .body-list p');
var header = document.querySelector('.sort-list-wrapper .header');
var body = document.querySelector('.sort-list-wrapper .body');

// Add 'selected' class to the first body list item
bodyListItems[0].classList.add('selected');
// Hide the body
body.style.maxHeight = '0';
body.style.overflow = 'hidden';

// Click event listener for the header
header.addEventListener('click', function() {
    if (body.style.maxHeight === '0px') {
        body.style.maxHeight = body.scrollHeight + 'px';
    } else {
        body.style.maxHeight = '0';
    }
    header.classList.toggle('open');
    body.classList.toggle('show');
});

// Click event listeners for the body list items
bodyListItems.forEach(function(item) {
    item.addEventListener('click', function() {
        // Remove 'selected' class from all body list items
        bodyListItems.forEach(function(item) {
            item.classList.remove('selected');
        });

        // Add 'selected' class to the clicked body list item
        this.classList.add('selected');

        var currentSortName = this.textContent;
        var headerSpan = document.querySelector('.sort-list-wrapper .header span');

        // Update the header text with the current sort name
        headerSpan.textContent = currentSortName;

        // Hide the body
        body.style.maxHeight = '0';
        header.classList.remove('open');
        body.classList.remove('show');
    });
});