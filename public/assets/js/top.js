$(window).on('DOMContentLoaded', function () {
    new Splide('#companians-slide', {
        type: 'loop',
        perPage: 3,
        perMove: 3,
        interval: 3000,
        focus: 'center',
        autoplay: true,
        flickMaxPages: 3,
        updateOnMove: true,
        pagination: false,
        speed: 2000,
        breakpoints: {
            640: {
                perPage: 1,
                padding: '10%'
            }
        },
    }).mount();

    new Splide('#main-slider', {
        type   : 'fade',
        autoplay: true,
        pagination: false,
        speed: 2000,
    }).mount();

    new Splide('#image-carousel', {
        type   : 'loop',
        autoplay: true,
    }).mount();
});
