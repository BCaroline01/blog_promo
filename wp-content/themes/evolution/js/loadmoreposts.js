/////////BUTTON LOADMORE///////////////////////////////

jQuery(document).ready(function () {
    let i = 0;

    jQuery(document).on('click', '.dcsLoadMorePostsbtn', function () {
        var ajaxurl = dcs_frontend_ajax_object.ajaxurl;
        var initialPost = new Number(jQuery('input[name="initial_posts"]').val());
        var dcsPostType = jQuery('input[name="dcsPostType"]').val();
        var offset = new Number(parseInt(jQuery('input[name="offset"]').val()));
        var dcsloadMorePosts = new Number(parseInt(jQuery('input[name="dcsloadMorePosts"]').val()));
        

        if (i == 0) {
            var newOffset = initialPost;
            i++
            } else if (i == 1) {
            newOffset = offset + dcsloadMorePosts;
            }

        jQuery('.btnLoadmoreWrapper').hide();
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: ({
                action: "dcsAjaxLoadMorePostsAjaxReq",
                offset: newOffset,
                dcsloadMorePosts: dcsloadMorePosts,
                postType: dcsPostType,
            }),
            success: function (response) {
                if (!jQuery.trim(response)) {
                    // blank output
                    jQuery('.noMorePostsFound').show();
                } else {
                    // append to last div
                    jQuery(response).insertAfter(jQuery('.loadMoreRepeat').last());
                    jQuery('input[name="offset"]').val(newOffset);
                    jQuery('.btnLoadmoreWrapper').show();
                }
            },
            beforeSend: function () {
                jQuery('.dcsLoaderImg').show();
            },
            complete: function () {
                jQuery('.dcsLoaderImg').hide();
            },
        });
    });
});