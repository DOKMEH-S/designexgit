jQuery(document).ready(function ($) {
    function reformBox (){
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
    }
    function AjaxFunc(offset) {
        var selected = [];
        jQuery('.project-filter.selected').each(function () {
            selected.push($(this).attr('data-id'));
        });
        $('.see-more').attr('offset',(parseInt(offset) + 8) );
        targetOffset = 9999999999999999;
        $.ajax({
            url: frontend_ajax_object.ajaxurl,
            type: 'post',
            dataType: 'json', //Type of Response
            data: {
                action: 'project_filter',
                ch_id: selected,
                offset: offset
            },
            beforeSend: function(){
                if(offset!=0){
                    $('.see-more').addClass('infinite-load');
                }
                $('.see-more').css('display','flex');
            },
            success: function (response) {
                if (parseInt(response.count) >= 0) {
                    if(offset==0){
                        $('.projectItems').html(response.content);
                    }else{
                        $('.projectItems').append(response.content);
                    }
                    reformBox ();
                    if (response.show) {
                        targetOffset = ($("#infinity-loading").offset().top) - 200;
                    }
                    $('.see-more').css('display','none');
                    $('.see-more').removeClass('infinite-load');
                }
            },//this function handle json response data
            error: function (response) {
            }
        });
    }

    //----- archive project - taxonomy filter ----
    jQuery('.project-filter').click(function (e) {
        var groupId = $(this).attr('group');
        jQuery('.group-' + groupId).not(this).each(function () {
            $(this).removeClass('selected');
        });
        $(this).toggleClass('selected');
        AjaxFunc(0);
    });

    // archive project - Infinity loading --------------------------------------
    var targetOffset = (jQuery("#infinity-loading").offset().top) - 200;
    var $w = $(window).scroll(function () {
        if ($w.scrollTop() > targetOffset) {
            targetOffset = 9999999999999999;
            var offset = $('.see-more').attr('offset');
            AjaxFunc(offset);
        }
    });



    jQuery(document).ready(function($) {
        $('#subscribe-form').on('submit', function(e) {
            e.preventDefault(); // جلوگیری از ارسال فرم به صورت عادی
            var formData = $(this).serialize(); // سریالیزه کردن داده‌های فرم
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // آدرس ارسال فرم
                data: formData,
                success: function(response) {
                    // نمایش پیام موفقیت یا خطا
                    $('.mes').html(response);
                },
                error: function() {
                    $('.mes').html('خطا در ارسال فرم.');
                }
            });
        });
    });

});