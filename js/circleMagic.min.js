;(function ($) {
    $.fn.circleMagic = function (options) {
        var width, height, largeContainer, canvas, ctx, target, animateHeader = true;
        var circles = [];
        var settings = $.extend({
            elem: '.header',
            color: 'rgba(255,255,255,.4)',
            radius: 20,
            densety: 0.3,
            clearOffset: 0.2
        }, options);
        initContainer();
        addListeners();

        function initContainer() {
            width = window.innerWidth;
            // height = window.innerHeight;
            height = document.querySelector(settings.elem).clientHeight;
            target = {x: 0, y: height};
            largeContainer = document.querySelector(settings.elem);
            largeContainer.style.height = height + 'px';
            initCanvas();
            canvas = document.getElementById('canvas');
            canvas.width = width;
            canvas.height = height;
            ctx = canvas.getContext('2d');
            for (var x = 0; x < width * settings.densety; x++) {
                var c = new Circle();
                circles.push(c);
            }
            animate();
        }

        function initCanvas() {
            var canvasElement = document.createElement('canvas');
            canvasElement.id = 'canvas';
            largeContainer.append(canvasElement);
        }

        function addListeners() {
            window.addEventListener('scroll', scrollCheck);
            window.addEventListener('resize', resize);
        }

        function scrollCheck() {
            if (document.body.scrollTop > height) animateHeader = false; else animateHeader = true;
        }

        function resize() {
            width = window.innerWidth;
            // // height = window.innerHeight;
            height = document.querySelector(settings.elem).clientHeight;
            console.log(height)
            largeContainer.style.height = height + 'px';
            canvas.width = width;
            canvas.height = height;

        }

        function animate() {
            if (animateHeader) {
                ctx.clearRect(0, 0, width, height);
                for (var i in circles) {
                    circles[i].draw();
                }
            }
            requestAnimationFrame(animate);
        }

        function randomColor() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            var alpha = Math.random().toPrecision(2);
            var rgba = `rgba(${r}, ${g}, ${b}, ${alpha})`;
            return rgba;
        }
        ;

        function Circle() {
            var self = this;
            (function () {
                self.pos = {};
                init();
            })();

            function init() {
                self.pos.x = Math.random() * width;
                self.pos.y = height + Math.random() * 100;
                self.alpha = 0.1 + Math.random() * settings.clearOffset;
                self.scale = 0.1 + Math.random() * 0.3;
                self.speed = Math.random();
                if (settings.color == 'random') {
                    self.color = randomColor();
                } else {
                    self.color = settings.color;
                }
            }

            this.draw = function () {
                if (self.alpha <= 0) {
                    init();
                }
                self.pos.y -= self.speed;
                self.alpha -= 0.0005;
                ctx.beginPath();
                ctx.arc(self.pos.x, self.pos.y, self.scale * settings.radius, 0, 2 * Math.PI, false);
                ctx.fillStyle = self.color;
                ctx.fill();
                ctx.closePath();
            };
        }
    }
})(jQuery);