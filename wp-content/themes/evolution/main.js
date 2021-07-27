jQuery(document).ready(function ($) {

    $('#checkbox').change(function () {
        setInterval(function () {
            moveRight();
        }, 3000);
    });

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });

    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});

/////////BUTTON LOADMORE///////////////////////////////

jQuery(document).ready(function () {
    jQuery(document).on('click', '.dcsLoadMorePostsbtn', function () {
        var ajaxurl = dcs_frontend_ajax_object.ajaxurl;
        var dcsPostType = jQuery('input[name="dcsPostType"]').val();
        var offset = parseInt(jQuery('input[name="offset"]').val());
        var dcsloadMorePosts = parseInt(jQuery('input[name="dcsloadMorePosts"]').val());
        var newOffset = offset + dcsloadMorePosts;
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

/////SEARCH 

// function expand() {
//     $(".search").toggleClass("close");
//     $(".input_search").toggleClass("square");
//     if ($('.search').hasClass('close')) {
//       $('input').focus();
//     } else {
//       $('input').blur();
//     }
//   }
//   $('button').on('click', expand);