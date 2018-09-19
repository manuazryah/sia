$(document).ready(function () {
    $(".testimonial-carousel").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: true,
        pauseOnHover: false,
        prevArrow: $(".testimonial-carousel-controls .prev"),
        nextArrow: $(".testimonial-carousel-controls .next"),
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }]
    });
});

$(document).ready(function () {
    $(".brands-carousel").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        pauseOnHover: false,
        prevArrow: $(".brands-carousel-controls .prev"),
        nextArrow: $(".brands-carousel-controls .next"),
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 5
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
    });

});
/**************************************************Header**********************************/

window.onscroll = function () {
    myFunction();
};
var header = document.getElementById("myHeader");
var sticky = 42;
function myFunction() {
    if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}



//$(window).scroll(function () {
//    var scroll = $(window).scrollTop();
//    if (scroll >= 100) {
//        $(".navbar").removeClass("navbar-expand-lg");
//        $("#header-full").addClass("hide");
//        $("#header-scroll").addClass("show");
//    } else {
//        $(".navbar").addClass("navbar-expand-lg");
//        $("#header-full").removeClass("hide");
//        $("#header-scroll").removeClass("show");
//    }
//});
/**************************************************Header_END**********************************/