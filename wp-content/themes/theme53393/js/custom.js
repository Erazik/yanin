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
        minSlidesAndMax = 1;
        $('.SliderParent').css({height: width+117});
    }
    else if($(window).width()<500){
        width = $(window).width()/2;
        minSlidesAndMax = 1;
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
       // slideWidth:
    });
    $('.miniMenu').on('click', function(){
        $('.stuck_menu_wrap .nav__primary').stop(true, false).slideToggle();
    })
    
    function pageOnLoad() {

            var centerLatLng = new google.maps.LatLng(36.1199548,-115.19127);

            var mapOptions = {

                zoom: 15,
                scrollwheel: false,
                center: centerLatLng,
                
                mapTypeId: google.maps.MapTypeId.ROADMAP

            }
            
            var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            var marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(36.1199548,-115.19127),
                title: 'Shahumyan Media'
            });
            var label = '<div style="text-align: center;"><p>Address:<br> 3871 South Valley View BLVD Suite #12 Las Vegas,<br> Nevada, 89103U.S.A.</p></div>';
            var infoWindow = new google.maps.InfoWindow({
                content: label
            });
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.open(map,marker);
            });
            google.maps.event.addDomListener(window, "load", pageOnLoad);
    }
    
        pageOnLoad();
});