jQuery(document).ready(function ($) {
    var $grid;
    // autoload -------------------------------------
    var targetOffset= 9999999999999999;
    var targetOffNews = 9999999999999999;
    if($("#last-load-more").length != 0) {
         targetOffset = ($("#last-load-more").offset().top )-300; //Rethink

    }
    if($("#last-more-news").length != 0) {
        targetOffNews = ($("#last-more-news").offset().top )-300; //news
    }

    var $w = $(window).scroll(function(){   //Rethink
        if (  $w.scrollTop() > targetOffset ) {
            console.log(targetOffset);
            targetOffset= 9999999999999999;
           var count = $('#last-load-more').attr('count');
            $('#last-load-more').removeAttr('id');
            $grid =  $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                    gutter: '.gutter-sizer'
                }
            });
            $.ajax({
                url: autoLoad_object.ajaxurl,
                type: 'post',
                dataType: 'json', //Type of Response
                data: {
                    action: 'load_more_rethink',
                    page: count
                },
                beforeSend: function() {
                    // نمایش loader یا پیام انتظار
                    $('.grid').prepend('<div class="loading-news" ><img src="'+document.location.origin + '/wp-content/themes/DORR/assets/img/infinity-logo.gif" alt="" /></div>');
                },
                success: function (response) {
                    if (parseInt(response.count) >= 0) {
                        $('.loading-news').remove();
                        // $('.grid').append(response.content);
                        // $grid.isotope('destroy');
                        var $items = $(response.content);
                        // append items to grid
                        setTimeout(function () {
                            $grid.append( $items )
                                // add and lay out newly appended items
                                .isotope( 'appended', $items );
                            $('.grid').isotope({
                                itemSelector: '.grid-item',
                                percentPosition: true,
                                masonry: {
                                    columnWidth: '.grid-sizer',
                                    gutter: '.gutter-sizer'
                                }
                            });
                        },1000);
                        if (response.show) {
                            targetOffset = ($("#last-load-more").offset().top )-300;
                        }
                    }
                },//this function handle json response data
                error: function (response) {
                }
            });
        }
        if (  $w.scrollTop() > targetOffNews ) { //news
            targetOffNews= 9999999999999999;
           var count = $('#last-more-news').attr('count');
            $('#last-more-news').removeAttr('id');
            var order = $('.order-blog.selected').attr('data-id');
            var searchText = $('#searchNews').val();

            $.ajax({
                url: autoLoad_object.ajaxurl,
                type: 'post',
                dataType: 'json', //Type of Response
                data: {
                    action: 'post_filter',
                    page: count,
                    order: order,
                    str: searchText
                },
                beforeSend: function() {
                    // نمایش loader یا پیام انتظار
                    $('.newItemsWrapper').append('<div class="loading-news" ><img src="'+document.location.origin + '/wp-content/themes/DORR/assets/img/infinity-logo.gif" alt="" /></div>');
                },
                success: function (response) {
                    $('.loading-news').remove();
                    if (parseInt(response.count) >= 0) {
                        $('.newItemsWrapper').append(response.content);
                       if (response.show) {
                           targetOffNews = ($("#last-more-news").offset().top )-300;
                        }
                    }
                },//this function handle json response data
                error: function (response) {
                }
            });
        }

    });
//news filter -----------------------------
    function Ajax(){
        console.log('jj')
            var order = $('.order-blog.selected').attr('data-id');
            // $(".load-wrap").show();
            var searchText = $('#searchNews').val();
            // var paged = 6;
            $.ajax({
                url: autoLoad_object.ajaxurl,
                type: 'post',
                dataType: 'json', //Type of Response
                data: {
                    action: 'post_filter',
                    // paged: paged,
                    order: order,
                    str: searchText
                },
                beforeSend: function() {
                    // نمایش loader یا پیام انتظار
                    $('.newItemsWrapper').prepend('<div class="loading-news" ><img src="'+document.location.origin + '/wp-content/themes/DORR/assets/img/infinity-logo.gif" alt="" /></div>');
                },
                success: function (response) {
                    if (parseInt(response.count) >= 0) {
                        $('.newItemsWrapper').html(response.content);
                        $(".loading-news").remove();
                    }
                },//this function handle json response data
                error: function (response) {
                    $(".loading-news").remove();
                    $('.newItemsWrapper').html('<div class="error">خطا در دریافت نتایج</div>');
                }
            });
    }
    jQuery('.order-blog').click(function (e){
        Ajax ();
    });
    $('#searchBlogImage').on('click', function(e) {
        e.preventDefault();
        Ajax ();
    });

});