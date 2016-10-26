 $(function() {
            $("img.lazy").show().lazyload({
            skip_invisible : false,
            effect: "fadeIn"
            });

            });

  $(function() {
        var elm = $('.sitebar_list');
        var startPos = $(elm).offset().top;
        $.event.add(window, "scroll", function() {
            var p = $(window).scrollTop();
            $(elm).css('position', ((p) > startPos) ? 'fixed' : 'static');
            $(elm).css('top', ((p) > startPos) ? '0px' : '');
        });
    });

//检测移动设备
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $('.wp-pagenavi').addClass('web-page');
    } else {
        $('.xianguan .pic').removeClass('web-of').addClass('pc-of');
    }