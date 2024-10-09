jQuery(document).ready(function ($) {
    function AjaxFunc(offset) {
        var catID = jQuery('.blog-cat.selected').attr('data-id');
        var tagIDs = [];
        jQuery('.blog-tag.selected').each(function () {
            tagIDs.push($(this).attr('data-id'));
        });
        $('.see-more').attr('offset', (parseInt(offset) + 4));
        targetOffset = 9999999999999999;
        $.ajax({
            url: frontend_ajax_object.ajaxurl,
            type: 'post',
            dataType: 'json', //Type of Response
            data: {
                action: 'blog_filter',
                cat: catID,
                tags: tagIDs,
                offset: parseInt(offset)
            },
            beforeSend: function () {
                $('.see-more').addClass('infinite-load');
                $('.see-more').css('display', 'flex');
            },
            success: function (response) {
                if (parseInt(response.count) >= 0) {
                    if (offset == 0) {
                        $('.blogItems').html(response.content);
                    } else {
                        $('.blogItems').append(response.content);
                    }
                    if (response.show) {
                        targetOffset = ($("#infinity-loading").offset().top) - 200;
                    }
                    $('.see-more').css('display', 'none');
                    $('.see-more').removeClass('infinite-load');
                    // add blur to boxes
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
                }
            },//this function handle json response data
            error: function (response) {
            }
        });
    }

//----- blog - category filter ----
    jQuery('.blog-cat').click(function (e) {
        jQuery('.blog-cat.selected').not(this).removeClass('selected');
        $(this).toggleClass('selected');
        // var catID = $(this).attr('data-id');
        AjaxFunc(0);
        // $('.see-more').attr('offset',(parseInt(offset) + 4) );

    });
//----- blog - tag filter ----
    jQuery('.blog-tag').click(function (e) {
        $(this).toggleClass('selected');
        AjaxFunc(0);
        // $('.see-more').attr('offset',(parseInt(offset) + 4) );
    });
    // blog - Infinity loading --------------------------------------
    var targetOffset = (jQuery("#infinity-loading").offset().top) - 200;
    var $w = $(window).scroll(function () {
        if ($w.scrollTop() > targetOffset) {
            targetOffset = 9999999999999999;
            var offset = $('.see-more').attr('offset');
            AjaxFunc(offset);
        }
    });
});