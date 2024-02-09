window.onload = function () {
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    if (prevBtn) {
        prevBtn.addEventListener("click", function () {
            prevSlide();
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener("click", function () {
            nextSlide();
        });
    }

    let slideNumber = 0;
    prevSlide = () => {
        const slides = document.getElementsByClassName('slides');
        const slider = document.getElementById("slider");
        const currentSlide = slider.getElementsByClassName('current');
        currentSlide[0].classList.remove("current");
        if (slideNumber == 0) {
            slideNumber = slides.length - 1;
        }
        else {
            slideNumber = slideNumber - 1;
        }
        slides[slideNumber].classList.add("current");
    }
    nextSlide = () => {
        const slides = document.getElementsByClassName('slides');
        const slider = document.getElementById("slider");
        const currentSlide = slider.getElementsByClassName('current');
        currentSlide[0].classList.remove("current");
        if (slideNumber == (slides.length - 1)) {
            slideNumber = 0;
        }
        else {
            slideNumber = slideNumber + 1;
        }
        slides[slideNumber].classList.add("current");
    }
}


$(document).ready(function () {
    let top_courses_offset_top = 120;
    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll >= top_courses_offset_top) {
            $(".container-slide").addClass("container-slide-swipper");
        } else {
            $(".container-slide").removeClass("container-slide-swipper");
        }
    });
    $(".slide").hiSlide();
});


$(document).ready(function () {
    let teachers_offset_top = 1000;
    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll >= teachers_offset_top) {
            $(".team-container .title").css("padding-bottom", "0px");
        } else {
            $(".team-container .title").css("padding-bottom", "100px");
        }
    });
});



$(document).ready(function () {
    let nav_offset_top = 25;
    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll >= nav_offset_top) {
            $(".navbar-fixed").css("background", "rgb(255, 255, 255)");
            $(".navbar-fixed").css("box-shadow", "2px 2px 30px rgba(255,0,0,0.08)");
        } else {
            $(".navbar-fixed").css("background", "none");
            $(".navbar-fixed").css("box-shadow", "");

        }
    });
});

(function ($) {
    var slide = function (ele, options) {
        var $ele = $(ele);
        var speed = 1000;
        var $lis = $ele.find("li");
        $.extend(true, speed, options);
        var states = [
            { top: 0, left: 50 },
            { top: 150, left: 450 },
            { top: 50, left: 850 },
            { top: 0, left: 1250 },
            { top: 0, left: 1650 },
            { top: 0, left: 2050 },
            { top: 0, left: 2450 }
        ];

        move();
        $(document).find(".hi-next").on("click", function () {
            states.unshift(states.pop());
            move();
        });

        $(document).find(".hi-prev").on("click", function () {
            states.push(states.shift());
            move();
        });

        function move() {
            $lis.each(function (index, element) {
                var state = states[index];
                if (state.left != 50) {
                    element.classList.add("card-rotate360");
                    element.classList.remove("card-rotate0");
                }
                else {
                    element.classList.remove("card-rotate360");
                    element.classList.add("card-rotate0");
                }
                $(element)
                    .finish()
                    .animate(state, speed);
            });
        }

    };

    $.fn.hiSlide = function (options) {
        $(this).each(function (index, ele) {
            slide(ele, options);
        });
        return this;
    };
})(jQuery);