// -----------------------------makeSquare
let maps = document.querySelectorAll('.map');
maps.forEach(function(map) {
    let mapMeasure = window.getComputedStyle(map).getPropertyValue('width');
    console.log(mapMeasure);
    map.style.height = mapMeasure;
});
// -----------------------------makeSquare
/*---------------------------------inputFile*/
// -----------------------------add hover-target class
var uploadElements = document.querySelectorAll('.upload');
// -----------------------------add hover-target class
uploadElements.forEach(function(upload) {
    var fileInput = upload.querySelector('input[type="file"]');
    var label = upload.querySelector('label');
    var labelText = label.querySelector('span');
    var labelRemove = upload.querySelector('i.remove');
    var labelDefault = labelText.textContent;

    // on file change
    fileInput.addEventListener('change', function(event) {
        var fileName = fileInput.value.split('\\').pop();
        if (fileName) {
            labelText.textContent = fileName;
            labelRemove.style.display = 'block';
        } else {
            labelText.textContent = labelDefault;
            labelRemove.style.display = 'none';
        }
    });

    // Remove file
    labelRemove.addEventListener('click', function(event) {
        fileInput.value = '';
        labelText.textContent = labelDefault;
        labelRemove.style.display = 'none';
    });
});
/*---------------------------------inputFile*/
/*---------------------------------slideToggle*/
var contentContainers = document.querySelectorAll('section.contactItems-wrapper .contactItems-container.opportunities .item > .body .more .content');
var buttons = document.querySelectorAll('section.contactItems-wrapper .contactItems-container.opportunities .item > .body .more .button');
contentContainers.forEach(function(contentContainer) {
    contentContainer.style.maxHeight = '0';
    contentContainer.style.overflow = 'hidden';
});
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        var item = this.parentNode.parentNode.parentNode;
        var siblingItems = Array.from(item.parentNode.children).filter(function(child) {
            return child !== item;
        });
        siblingItems.forEach(function(siblingItem) {
            siblingItem.querySelector('.content').style.maxHeight = '0';
            siblingItem.classList.remove('active');
        });
        var contentContainer = item.querySelector('.content');
        contentContainer.style.maxHeight = (contentContainer.style.maxHeight === '0px') ? contentContainer.scrollHeight + 'px' : '0';
        item.classList.toggle('active');
    });
});
/*---------------------------------slideToggle*/
/*---------------------------------opModal*/
var closeButton = document.querySelector('#modal .close');
var htmlElement = document.querySelector('html');
var modalElement = document.querySelector('#modal');
closeButton.addEventListener('click', function() {
    htmlElement.classList.remove('opModal');
    htmlElement.classList.remove('opMenu');
});
window.addEventListener('click', function(e) {
    if (!e.target.closest('#modal')) {
        htmlElement.classList.remove('opModal');
    }
});
var applyBtns = document.querySelectorAll('section.contactItems-wrapper .contactItems-container.opportunities .items .item > .header .applyBtn');
var htmlElement = document.querySelector('html');
applyBtns.forEach(function(applyBtn) {
    applyBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        htmlElement.classList.add('opModal');
    });
});
/*---------------------------------opModal*/