jQuery(document).ready(function ($) {
    //----- archive project - taxonomy filter ----
    jQuery('.project-filter').click(function (e) {
        var groupId = $(this).attr('group');
        jQuery('.group-' + groupId).not(this).each(function () {
            $(this).removeClass('selected');
        });
        $(this).toggleClass('selected');
        var selected = [];
        jQuery('.project-filter.selected').each(function () {
                selected.push($(this).attr('data-id'));
        });
       // var offset = $('#see-more').attr('offset');
        $.ajax({
            url: frontend_ajax_object.ajaxurl,
            type: 'post',
            dataType: 'json', //Type of Response
            data: {
                action: 'project_filter',
                ch_id: selected,
                offset: 0
            },
            success: function (response) {
                if (parseInt(response.count) >= 0) {
                    $('.projectItems').html(response.content);

                }
            },//this function handle json response data
            error: function (response) {
            }
        });
    });
});