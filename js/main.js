/* =Main INIT Function
-------------------------------------------------------------- */
function initializeSite() {
    "use strict";

    // Init effect 
    $('#scene').parallax();

    // Center and outline
    (function() {
        function centerInit(){
            var hero 			= $('#hero'),
                sphere 			= $('.sphere'),
                sphereMargin 	= ($(window).height() - sphere.height()) / 2,
                heroContent		= $('.hero-content'),
                contentMargin 	= ($(window).height() - heroContent.height()) / 2;

            hero.css ({
                height : $(window).height() + "px"
            });

            sphere.css({
                "margin-top" : sphereMargin + "px"
            });

            heroContent.css({
                "margin-top" : contentMargin + "px"
            });
        }

        $(document).ready(centerInit);
        $(window).resize(centerInit);
    })();

    // Local scroll
    $('#hero').localScroll({
        duration:1000
    });

    // Light box init
    $('.lightbox').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom mfp-fade',

        zoom: {
            enabled: true,

            duration: 300,
            easing: 'ease-in-out',

            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });
};
/* END ------------------------------------------------------- */

/*===============================================================
         Working Contact Form
         ================================================================*/

$("#login-form").submit(function (e) {

    e.preventDefault();
    var $ = jQuery;

    var postData = $(this).serializeArray(),
        formURL = $(this).attr("action"),
        $cfResponse = $('#lfResponse'),
        $cfsubmit = $("#login"),
        cfsubmitText = $cfsubmit.text();

    $cfsubmit.text("Sending...");


    $.ajax(
        {
            url: formURL,
            type: "POST",
            data: postData,
            success: function (data) {
                $cfResponse.html(data);
                $cfsubmit.text(cfsubmitText);
                $('#login-form input[username=username]').val('');
                $('#login-form input[password=password]').val('');
            },
            error: function (data) {
                alert("Error occurd! Please try again");
            }
        });

    return false;

});

$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

/* =Document Ready Trigger
-------------------------------------------------------------- */
$(window).load(function(){

    initializeSite();

    $('.corner').click(function(){
        $('#options').slideToggle()
    });

});
/* END ------------------------------------------------------- */


/* =Window Load Trigger
-------------------------------------------------------------- */
$(window).load(function(){

    //SKROLLR
    if (Modernizr.touch) {
        skrollr.init().destroy();
    } else {
        skrollr.init({
            forceHeight: false
        });
    }

});
/* END ------------------------------------------------------- */