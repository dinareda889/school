/**
 * Created by IT on 9/19/2016.
 */
/*global $, alert , console */

$(function() {

    "use strict";


    var about_Height = $('.about').outerHeight();
    /*$('.side-bar').css({
        top : about_Height
    });*/
    //console.log($('.about').outerHeight());


    /*----------------- Make categories and order section fixed -------*/
    $(window).scroll(function(){

        var wScroll = $(this).scrollTop(),
            headerHeight = $('header'),
            side         = headerHeight.outerHeight()+200;

        if(wScroll > headerHeight.outerHeight()+200)
        {
            /*$('.fixed-sec').css({'position':'fixed','top':'15px'}); */
            $('.side-bar').css('top','50px');
        }
        //,'right':'15px'
        else
        {
           /* $('.fixed-sec').css({'position':'relative'});*/
            $('.side-bar').css({
                'top':'150px'
            });
        }


    });

    //$('.side-bar').height('side');


    /*-------------------- Menu order ------------------*/
    $(".cat-content ul li").click(function(){
        $(this).next().slideToggle(1000);
        $(this).children('span').html("<i class='fa fa-angle-up fa-2x'></i>");
    });

    $(".categories ul li").click(function(){
       $(this).addClass('order-active').siblings().removeClass('order-active');
      var liId= $(this).attr('id'),
          liClass = $('.' + liId + "-content");

        $('html , body').animate({
            scrollTop: liClass.offset().top
        },2000,function(){

            liClass.next().slideDown(500,function(){
                $(liClass).children('span').html("<i class='fa fa-angle-up fa-2x'></i>");

            });

        });

    });

    /*---------- numbers of orders ---------------*/

    var plus = $('.plus').prev().text(),
        minus = $('.minus').next().text(),
        add = parseInt(plus),
        sub = parseInt(minus);



        $('.plus').click(function(){

            add++;
            $('.orders-num').text(add);
        });

    $('.minus').click(function(){
        sub = add-1;
        $('.plus').prev().text(sub);

        $('.minus').click(function(){
            sub --;
            $('.orders-num').text(sub);
        });
    });

    /*----------------- Adjust loading div ----------------*/
   /* $('#add-to-cart').click(function(){
       $('.your-cart').load(function(){
          $('.loading-overlay .sk-fading-circle').fadeOut(2000,function(){
              $(this).parent().fadeOut(2000,function(){
                  $(this).remove();
              });
          });
       });
    });**/





});

/*$(window).load(function(){
    $('.loading-overlay .sk-fading-circle').fadeOut(2000,function(){
        $(this).parent().fadeOut(2000,function(){
            $(this).remove();
        });
    });
});*/