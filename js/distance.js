(function ($) {
    var mainWrapper = $('.distance-main-wrapper');
    var distanceWrapper = $('.distance-head');
    var navbar = $('.navbar');
    var toggleNavBtn = $('#toggle_nav');
    var navbarSupportedContent = $('#navbarSupportedContent');
    var mark = '';//标记

    function setNav() {

        if (($(document).scrollTop() - mainWrapper.offset().top) > -150) {
            distanceWrapper.addClass('distance-head-bg');
            navbar.addClass('navbar-light').removeClass('navbar-dark');
        } else {
            distanceWrapper.removeClass('distance-head-bg');
            navbar.addClass('navbar-dark').removeClass('navbar-light');
        }


    }


    // function checkBg() {
    //
    //     var img = new Image();
    //     var src = $('.distance-top').css("backgroundImage").replace('url(', '').replace(')', '').replace(/"/g, '');
    //     img.src = src;
    //     img.onload = function () {
    //         console.log('bg is ok')
    //     };
    //
    // }

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
        showBgMusic();
    }

    function showBgMusic() {

        var ap = new APlayer({
            container: document.getElementById('aplayer'),
            fixed: true,
            autoplay:true,
            audio: [{
                name: '如果当时',
                artist: '龚宏(cover许嵩)',
                url: 'https://www.crazyming.com/ruguodangshi.mp3',
                cover: 'cover.jpg',

            }]
        });

    }

    function showPage() {
        console.log(mark);
        $('#load-container').fadeOut();
        $("#page").fadeIn();
        setNav();
        showAnimation();

    }

    $(window).on('load', function () {
        setTimeout(function () {
            console.log('page is ok');
            if (!mark) {
                mark = 'load complete';
                showPage();
            }
        }, 500)//定时器延迟一下 避免某些浏览器出现图片加载  白块现象
    });//$(window).load(function(){})在高版本中已经废弃， 请用：$(window).on('load',function(){});替代


    $(document).ready(function () {


        setNav();
        // checkBg();
        setTimeout(function () {
            if (!mark) {
                mark = 'force display';
                showPage();
            }
        }, 8000);//8秒强制显示网页  防止onload完成事件过长

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


        $(document).scroll(function () {

            setNav();

            //当 导航是展开状态是 模拟点击 按钮收起导航
            if (navbarSupportedContent.hasClass('show')) {
                toggleNavBtn.click();
            }

        });


        $('#headerDown').bind('click', function () {

            var c = 0, song = setInterval(function () {
                c++;
                scrollBy(0, 10);
                if (c > 80) {
                    clearInterval(song)
                }
            }, 10)

        })


    });
})(jQuery);