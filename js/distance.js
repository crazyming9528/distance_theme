(function ($) {
    $(document).ready(function () {
        var mainWrapper = $('.distance-main-wrapper');
        var distanceWrapper = $('.distance-head');
        var navbar = $('.navbar');
        var toggleNavBtn = $('#toggle_nav');
        var navbarSupportedContent = $('#navbarSupportedContent');



        toggleNavBtn.bind('click',function () {

            if(!navbarSupportedContent.hasClass('show')){
                distanceWrapper.addClass('distance-head-bg');
                navbar.addClass('navbar-light').removeClass('navbar-dark');
            }else {

                if(($(document).scrollTop() - mainWrapper.offset().top) < -150){
                    navbar.addClass('navbar-dark').removeClass('navbar-light');
                    distanceWrapper.removeClass('distance-head-bg');
                }

            }

        })


        function setNav() {

            if (($(document).scrollTop() - mainWrapper.offset().top) > -150) {
                distanceWrapper.addClass('distance-head-bg');
                navbar.addClass('navbar-light').removeClass('navbar-dark');
            } else {
                distanceWrapper.removeClass('distance-head-bg');
                navbar.addClass('navbar-dark').removeClass('navbar-light');
            }
        }

        setNav();

        $(document).scroll(function () {

            setNav();

            //当 导航是展开状态是 模拟点击 按钮收起导航
            if(navbarSupportedContent.hasClass('show')){
                toggleNavBtn.click();
            }

        });

    });
})(jQuery);