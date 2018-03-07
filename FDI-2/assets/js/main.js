(function ($) {
    $(function () {
        $('#main-menu').sidr({side: 'right'});
    });

    // animation
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($('.animation-element'), function () {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                $element.addClass('in-view');
            } else {
                $element.removeClass('in-view');
            }
        });
    }

    // $(".sub-menu").addClass("dropdown-content");
    // $(".menu-item-has-children").addClass("dropdown");


    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: 10000
        })
        $('.fdi-Carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    });
    $(function () {
        $('.header-menu a').each(function () {
            var location = window.location.href
            var link = this.href
            var result = location.match(link);
            if (result != null) {
                $(this).addClass('current');
            }
        });
    });
    // $('ul.nav li.menu-item-has-children').hover(function() {
    //   $(this).find('.sub-menu').stop(true, true).delay(200).fadeIn(500);
    // }, function() {
    //   $(this).find('.sub-menu').stop(true, true).delay(200).fadeOut(500);
    // });

})(jQuery);

