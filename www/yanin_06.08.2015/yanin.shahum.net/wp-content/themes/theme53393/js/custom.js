$(document).ready(function(){
    $('.log').on('click', function(){
        $('.Login, .bGrey').css({display: 'block'});
        setTimeout(function(){
            $('.Login, .bGrey').css({opacity: 1});
        },400)
    });
    $('.sig').on('click', function(){
        $('.signUp, .bGrey').css({display: 'block'});
        setTimeout(function(){
            $('.signUp, .bGrey').css({opacity: 1});
        },400)
    });
    $('.bGrey').on('click', function(){
        $('.Login, .bGrey, .signUp').css({opacity: 0});
        setTimeout(function(){
            $('.Login, .bGrey, .signUp').css({display: 'none'});
        },400)
    });
    var width = '';
    var minSlidesAndMax = '';
    if($(window).width()>1100){
        width = $(window).width()/5;
        minSlidesAndMax = 5;
    }
    else if($(window).width()<900 && $(window).width() >= 500){
        width = $(window).width()/3;
        minSlidesAndMax = 3;
        $('.SliderParent').css({height: width+117});
    }
    else if($(window).width()<500){
        width = $(window).width()/2;
        minSlidesAndMax = 2;
        $('.SliderParent').css({height: width+117});
    }
    else{
        width = $(window).width()/4;
        minSlidesAndMax = 4;
        $('.SliderParent').css({height: width+117});
    }
    $('.SliderB').bxSlider({
        minSlides: minSlidesAndMax,
        maxSlides: minSlidesAndMax,
        moveSlides: 1,
        hideControlOnEnd: true,
        pager: false,
        auto: true,
        autoDelay: 1000,
        controls: true,
        nextText: "",
        prevText: '',
        slideMargin: 0,
        oneToOneTouch: true,
        slideWidth: width
    });
    $('.SliderB img').resizecrop({
        width:width,
        height:width,
        vertical:   "center",
        horizontal: "center",
        wrapper:    "div",
        wrapperCSS: {"display":"block", "margin":"auto"}
    });
    $('.SSlider').bxSlider({
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
        hideControlOnEnd: true,
        pager: false,
        auto: false,
        controls: true,
        nextText: "",
        prevText: '',
        slideMargin: 0,
        oneToOneTouch: true,
        mode: 'fade'
    });
    $('.miniMenu').on('click', function(){
        $('.stuck_menu_wrap .nav__primary').stop(true, false).slideToggle();
    })
});