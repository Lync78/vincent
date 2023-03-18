$(document).ready(function (){
    $('.carousel-photo').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: '<div class="fleche fleche-gauche"><button class="btn-triangle triangle-gauche"></button></div>',
        nextArrow: '<div class="fleche fleche-droit"><button class="btn-triangle triangle-droit"></button></div>',
    });
});

