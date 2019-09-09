(function ($) {
    $(document).ready(function () {
        var mainWrapper = $('.distance-main-wrapper');
        var distanceWrapper = $('.distance-head');

        console.log(mainWrapper.offset().top,$(document).scrollTop());


        $(document).scroll(function () {
            console.log($(document).scrollTop(),mainWrapper.offset().top);
            if ($(document).scrollTop()>mainWrapper.offset().top){
                distanceWrapper.addClass('distance-head-bg');
            }else {
                distanceWrapper.removeClass('distance-head-bg');
            }

        });

    });
})(jQuery);