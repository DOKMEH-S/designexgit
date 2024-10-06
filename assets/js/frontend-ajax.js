jQuery(document).ready(function ($) {
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
});