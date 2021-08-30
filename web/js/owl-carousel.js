$(function() {
    $('.kj-slide').owlCarousel({
        nav: true,
        //loop:true,
        margin: 40,
        slideBy: 'page',
        rewind: false,
        responsive: {
            0: { items: 1 },
            480: { items: 2 },
            600: { items: 3 },
            1000: { items: 3 }
        },
        smartSpeed: 70,
        navText: ['<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>', '<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>']
    });

    $('.kj-slide .owl-item').mouseover(
        function() {
            $(this).find(".slide-img").addClass("hover")
            $(this).find(".slide-text").addClass("hover")
        }
    )
    $('.kj-slide .owl-item').mouseout(
        function() {
            $(this).find(".slide-img").removeClass("hover")
            $(this).find(".slide-text").removeClass("hover")
        }
    )
});