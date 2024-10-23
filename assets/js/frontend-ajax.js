jQuery(document).ready(function ($) {
    //check size of screen
    var row = 8; //more than 1199
    var screenWidth = window.innerWidth;
    var skeleton = '<div class="projectItem skeleton"><div class="image"><img src="" alt=""></div><a href="" class="info hover-info"></a></div>';
    skeleton += '<div class="projectItem skeleton"><div class="image"><img src="" alt=""></div><a href="" class="info hover-info"></a></div>';
    if(screenWidth < 768){
       row = 6;
   }else if(screenWidth > 769 &&  screenWidth < 1199){
       row = 6;
        skeleton += '<div class="projectItem skeleton"><div class="image"><img src="" alt=""></div><a href="" class="info hover-info"></a></div>';
    }else if(screenWidth >= 1199){
        row = 8;
        skeleton += '<div class="projectItem skeleton"><div class="image"><img src="" alt=""></div><a href="" class="info hover-info"></a></div>';
        skeleton += '<div class="projectItem skeleton"><div class="image"><img src="" alt=""></div><a href="" class="info hover-info"></a></div>';
    }


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
        $('.see-more').attr('offset',(parseInt(offset) + row) );
        targetOffset = 9999999999999999;
        $('#infinity-loading').removeAttr('id');
        $.ajax({
            url: frontend_ajax_object.ajaxurl,
            type: 'post',
            dataType: 'json', //Type of Response
            data: {
                action: 'project_filter',
                ch_id: selected,
                offset: offset,
                row: row
            },
            beforeSend: function(){
                if(offset!=0){
                    $('.see-more').addClass('infinite-load');
                    $('.projectItems').append(skeleton);
                }
                $('.see-more').css('display','flex');
            },
            success: function (response) {
                if (parseInt(response.count) >= 0) {
                    if(offset==0){
                        $('.projectItems').html(response.content);
                    }else{
                        $('.projectItems').append(response.content);
                        $('.skeleton').remove();
                    }
                    reformBox ();
                    if (response.show) {
                        targetOffset = ($("#infinity-loading").offset().top) - 300;
                    }
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
    var targetOffset = (jQuery("#infinity-loading").offset().top) - 300;
    var $w = $(window).scroll(function () {
        if ($w.scrollTop() > targetOffset) {
            targetOffset = 9999999999999999;
            var offset = $('.see-more').attr('offset');
            AjaxFunc(offset);
        }
    });

        // jQuery('.subscribe-form').on('submit', function(e) {
        //     e.preventDefault(); // جلوگیری از ارسال فرم به صورت عادی
        //     var formData = jQuery(this).serialize(); // سریالیزه کردن داده‌های فرم
        //     var thisForm = jQuery(this);
        //     jQuery.ajax({
        //         type: 'POST',
        //         url: jQuery(this).attr('action'), // آدرس ارسال فرم
        //         data: formData,
        //         beforeSend: function(){
        //             thisForm.find('.subscribe-message').html('wait please...');
        //         },
        //         success: function(response) {
        //             thisForm.find('.subscribe-message').html(response);
        //         },
        //         error: function() {
        //             thisForm.find('.subscribe-message').html('please try later!');
        //         }
        //     });
        // });

});