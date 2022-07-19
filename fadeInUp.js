$(window).on('load scroll', function () {
    var box = $('.fadeup');
    var isPlay = 'isPlay';
    box.each(function () {
        var boxOffset = $(this).offset().top;
        var scrollPos = $(window).scrollTop();
        var wh = $(window).height();
        if (scrollPos > boxOffset - wh + (wh / 9)) {
            $(this).addClass(isPlay);
        } else {
            $(this).removeClass(isPlay);
        }
    });
});