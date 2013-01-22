var slidedelay = 6000;
var fadedelay = 2000;

$(document).ready(function() {
    if ($('#imageContainer').children().length > 1 && !$('#imageContainer').hasClass("no-slide") ) {
        $('#imageContainer').children(':first-child').addClass("showbanner");
        setTimeout(nextSlide, slidedelay);
    }
});

function nextSlide() {
    var images = $('#imageContainer').children();
    $(images).each( function(i) {
            if ($(this).hasClass("showbanner")) {
                $(this).fadeOut(fadedelay).removeClass("showbanner");
                var nextIndex = (i == (images.length - 1)) ? 0 : i+1;
                $('#caption').hide().html($('img', images[nextIndex]).attr("title"));
                $(images[nextIndex]).fadeIn(fadedelay).addClass("showbanner");
                $('#caption').fadeIn(1000);
                setTimeout(nextSlide, slidedelay);
                return false
            }
    });
}
