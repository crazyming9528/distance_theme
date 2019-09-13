(function ($) {
    var mainWrapper = $('.distance-main-wrapper');
    var distanceWrapper = $('.distance-head');
    var navbar = $('.navbar');
    var toggleNavBtn = $('#toggle_nav');
    var navbarSupportedContent = $('#navbarSupportedContent');

    function setNav() {

        if (($(document).scrollTop() - mainWrapper.offset().top) > -150) {
            distanceWrapper.addClass('distance-head-bg');
            navbar.addClass('navbar-light').removeClass('navbar-dark');
        } else {
            distanceWrapper.removeClass('distance-head-bg');
            navbar.addClass('navbar-dark').removeClass('navbar-light');
        }


    }

    function showAnimation() {
        var show = localStorage.getItem('show_animation') === '1' ? true : 0;
        var element = $('.distance-first-screen');
        if (show && element.length) {
            element.circleMagic({
                elem: '.distance-first-screen',
                radius: 15,
                densety: .15,
                color: 'rgba(255,255,255, .25)',
                // color: 'random',
                clearOffset: .15
            });
        }
    }

    $(window).on('load', function () {
        $('#load-container').fadeOut();
        $("#page").fadeIn();
        setNav();
        showAnimation();

    });//$(window).load(function(){})在高版本中已经废弃， 请用：$(window).on('load',function(){});替代

    $(document).ready(function () {


        $('pre').addClass("line-numbers").css("white-space", "pre-wrap");//使得 prism.js 支持显示行号 自动换行

        toggleNavBtn.bind('click', function () {

            if (!navbarSupportedContent.hasClass('show')) {
                distanceWrapper.addClass('distance-head-bg');
                navbar.addClass('navbar-light').removeClass('navbar-dark');
            } else {

                if (($(document).scrollTop() - mainWrapper.offset().top) < -150) {
                    navbar.addClass('navbar-dark').removeClass('navbar-light');
                    distanceWrapper.removeClass('distance-head-bg');
                }

            }

        })


        setNav();

        $(document).scroll(function () {

            setNav();

            //当 导航是展开状态是 模拟点击 按钮收起导航
            if (navbarSupportedContent.hasClass('show')) {
                toggleNavBtn.click();
            }

        });

    });
})(jQuery);