(function ($) {
    $(document).ready(function () {
        var mainWrapper = $('.distance-main-wrapper');
        var distanceWrapper = $('.distance-head');

        console.log(mainWrapper.offset().top, $(document).scrollTop());


        function setNav() {
            // if ($(document).scrollTop() > mainWrapper.offset().top) {
            //     distanceWrapper.addClass('distance-head-bg');
            // } else {
            //     distanceWrapper.removeClass('distance-head-bg');
            // }
            if (($(document).scrollTop() - mainWrapper.offset().top) > -100) {
                distanceWrapper.addClass('distance-head-bg');
            } else {
                distanceWrapper.removeClass('distance-head-bg');
            }
        }

        setNav();

        $(document).scroll(function () {

            setNav();

        });

    });
})(jQuery);