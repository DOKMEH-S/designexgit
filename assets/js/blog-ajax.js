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
                tag: tagIDs,
                offset: offset
            },
            beforeSend: function () {
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
                        targetOffset = ($("#infinity-loading").offset().top) - 100;
                    }
                    $('.see-more').css('display', 'none');
                }
            },//this function handle json response data
            error: function (response) {
            }
        });
    }

//----- blog - category filter ----
    jQuery('.blog-cat').click(function (e) {
        jQuery('.blog-cat.selected').removeClass('selected');
        $(this).addClass('selected');
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
    var targetOffset = (jQuery("#infinity-loading").offset().top) - 100;
    var $w = $(window).scroll(function () {
        if ($w.scrollTop() > targetOffset) {
            targetOffset = 9999999999999999;
            var offset = $('.see-more').attr('offset');
            AjaxFunc(offset);
        }
    });
});