
$(function () {
    "use strict";

        
    /*====================================================
                            navbar
    ====================================================*/
    $(window).scroll(function () {

        if ($(this).scrollTop() > 0) {
            $("nav").removeClass("transparent-bg");
            $("nav").addClass("black-bg");
        } else {
            $("nav").removeClass("black-bg");
            $("nav").addClass("transparent-bg");
        }
    });
    if( $(window).scrollTop() > 0 ){
        $("nav").removeClass("transparent-bg");
        $("nav").addClass("black-bg");
    }
    $(".navbar .fa-bars").click(function (e) { 
        e.preventDefault();
        $("nav").addClass("black-bars-bg");
    });

    /*====================================================
                            sections link
    ====================================================*/

    $(".navbar .nav-item .nav-link").click(function (e) { 
        var link = "#" + $(this).attr("href"); 
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $(link).offset().top - 50
        }, 1000);

    });

    /*====================================================
                            home button
    ====================================================*/
    $("#home .go-down i").click(function (e) { 
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#works').offset().top - 50
        }, 1000);
    });


    /*====================================================
                            Works
    ====================================================*/
    // var rot = 360;
    // $("#works button.load-more").click(function (){
    //     $("#works button.load-more i").css({
    //         'transform': 'rotate(' + rot + 'deg)'
    //     });
    //     rot += 360;
    // })
    /*====================================================
                            scroll-top
    ====================================================*/
    $(".footer-inner .scroll-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });


    /* ====================================================================================
    |   |   |   |   |   |   |   Are You Sure 
    =====================================================================================*/
    $(".checked-btn").click(function (){
        return confirm("Are you Sure ?");
    });

    


});

