(function ($) {
    new WOW().init();
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({});
        $('.without-flex').parent().removeClass('row-flex');
        // $('.image-or-video-background').parent().addClass("container-fluid");
        // $(".container-fluid").prev().css("border", "3px solid red");
        function resize_line() {
            if ($('.container').width() > 600) {
                // console.log($('#video-header-page-title').width()+80)
                $('.video-header').width($('#video-header-page-title').width() + 80);
            } else {
                $('.video-header').width('100%');
            }
        }

        $(window).on('resize', resize_line);

        resize_line();
        /* --== Class Disable Link  ==--*/
        $(".link-disable > a").click(function (e) {
            e.preventDefault();
        });
    });


})(jQuery);

