$(document).ready(function () {
    $("#Glide").glide({
        type: "slideshow",
        centered: false
    });

    /*$.fn.photoResize = function (options) {
        var element = $(this),
            defaults = {
                bottomSpacing: 10
            };

        $(element).load(function () {
            updatePhotoHeight();

            $(window).bind('resize', function () {
                console.log('resized');
                updatePhotoHeight();
            });
        });

        options = $.extend(defaults, options);

        function updatePhotoHeight() {
            var o = options,
                photoHeight = $(window).height();

            $(element).attr('height', photoHeight - o.bottomSpacing);
        }
    };*/


    $('#userform').validator();



    $.fn.resizePhoto = function () {
        var element = $(this);

        $(element).load(function () {
            updatePhotoHeight();

            $(window).bind('resize', function () {
                updatePhotoHeight();
            });
        });

        function updatePhotoHeight() {

            var css;
            var ratio = $(element).width() / $(element).height();
            var pratio = $(element).parent().width() / $(element).parent().height();
            if (ratio > pratio) {
                css = {
                    width: 'auto',
                    height: '100%'
                }
            } else {
                css = {
                    width: '100%',
                    height: 'auto'
                };
            }

            $(element).css(css);
        }
    };

    var cardInnerImages = $('.card-inner img');

    cardInnerImages.each(function () {
        $(this).resizePhoto();
    });

    cardInnerImages.each(function () {
        if (this.complete) {
            $(this).load()
        }
    });
});
