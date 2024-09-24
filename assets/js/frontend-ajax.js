// jQuery(function($){
//     var offset = 5; // initial offset value
//     var no_posts = false;
//
//     $(window).scroll(function(){
//         if( no_posts === false && $(window).scrollTop() > $(document).height() - $(window).height() - 200 ){
//             $.ajax({
//                 url: ajax_url, // ajax_url is a global JavaScript variable in WordPress
//                 type: 'POST',
//                 data: {
//                     action: 'loadmore',
//                     offset: offset,
//                 },
//                 success: function(response){
//                     if(response){
//                         $('.newItemsWrapper').append(response);
//                         offset += 5; // increment offset for the next request
//                     } else {
//                         no_posts = true; // no more posts available
//                     }
//                 }
//             });
//         }
//     });
// });
//fatemeh ajax
jQuery(document).ready(function ($) {
    // project filter --------------------------------------
    var $grid;
    function projectAjax(data_id) {
        $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer',
                gutter: '.gutter-sizer'
            }
        });
        var orderType = $('#sortYear').attr('type');
        $.ajax({
            url: frontend_ajax_object.ajaxurl,
            type: 'post',
            dataType: 'json', //Type of Response
            data: {
                action: 'project_filter',
                cats: data_id,
                orderType: orderType
            },
            beforeSend: function() {
                // نمایش loader یا پیام انتظار
                $('.grid').prepend('<div class="loading-news" ><img src="'+document.location.origin + '/wp-content/themes/DORR/assets/img/infinity-logo.gif" alt="" /></div>');
            },
            success: function (response) {
                if (parseInt(response.count) >= 0) {
                    $('.grid').html(response.content);
                    $grid.isotope('destroy');
                    $('.grid').isotope({
                        itemSelector: '.grid-item',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.grid-sizer',
                            gutter: '.gutter-sizer'
                        }
                    });
                    $grid.isotope('layout');
                }
            },//this function handle json response data
            error: function (response) {
            }
        });
    }
    jQuery('.checkBox').click(function (e) {
        var orderType = $(this).attr('Type');
        var data_id = [];
        var i = 0;
        jQuery('.checkBox.selected').each(function () {
            data_id.push($(this).attr('data-id'));
            i += 1;
        });
        if (i > 0) {
            $('.numberLabel i').text(i);
            $('.projectButtons .filterType').addClass('filtered');
        } else {
            $('.projectButtons .filterType').removeClass('filtered');
        }
        projectAjax(data_id);
    });

    jQuery('.selectAll').click(function () { //reset filter
        $('.projectButtons .filterType').removeClass('filtered');
        projectAjax();
    });

    $(document).on("click", '#sortYear', function () { //reset filter
        var $this = $(this);
        var type = $this.attr('type');
        // $this.removeClass(type);
        var newType = (type == 'desc') ? 'asc' : 'desc';
        // $this.addClass(newType);
        $this.attr('type', newType);
        $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer',
                gutter: '.gutter-sizer'
            }
        });
        $grid.isotope('destroy');
        var gridDiv = document.querySelector('.grid');
        var gridItems = Array.from(gridDiv.querySelectorAll('.filter-item'));

        $('.filter-item').remove();
        for (var i = (gridItems.length) - 1; i >= 0; i--) {
            $('.grid').append(gridItems[i]);
        }
    });

});