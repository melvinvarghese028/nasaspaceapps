
$(window).on('load',function(){
	$('.page-loader').fadeOut();
	})

$(window).scroll(function () {

        var sticky = $('.header'),

            scroll = $(window).scrollTop();

        if (scroll >= 50) sticky.addClass('menu-fixed');

        else sticky.removeClass('menu-fixed');

    });

AOS.init({
  easing: 'ease-out-back',
  duration: 1000
});


$('#sponsor_owl').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
	autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false, 
	smartSpeed: 1500,
	nav: false,
	dots: false,
    responsive:{
        0:{
            items:2, 
        },
		480:{
            items:2, 
        },
        640:{
            items:3, 
        },
		992:{
            items:4, 
        },
        1200:{
            items:5,
        }
    }
});


 










