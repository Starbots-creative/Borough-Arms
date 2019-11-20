
var $ = window.jQuery = require('jquery');
require('jquery-ui-dist/jquery-ui.min.js');
require('owl.carousel');
require('@fancyapps/fancybox/dist/jquery.fancybox.min.js');


$(document).ready(function() {



    $('.menutoggle').click(function(e) {
       
    
        e.preventDefault(); 
        if ($('.main-menu ul').hasClass('show')) {
            $('.main-menu ul').removeClass('show');
            
        } else {
            $('.main-menu ul').addClass('show');
        }
    });



    $('[data-fancybox="preview-1"]').fancybox({
        thumbs : { 
          autoStart : true
        }
    });

    $('[data-fancybox="preview-2"]').fancybox({
        thumbs : { 
          autoStart : true
        }
    });

    
    $('[data-fancybox="gallery"]').fancybox({
        thumbs : { 
          autoStart : true
        }
    });

    $(".gallery").owlCarousel({
 
        autoPlay: 3000, //Set AutoPlay to 3 seconds 
        nav: false,
        responsiveClass: true,
        margin: 30,
        responsive: {
            0: {
                items: 1,
           
            },
            768: {
                items: 2, 
            
                margin: 10
            }, 
            1024: {
                items: 3,
        
                loop: false,
                margin: 10
            }
        }
   
    });

    $('.main-slider').owlCarousel({
        loop:true,
        items:1,
        transitionStyle : "backSlide",
        dots:true,
        nav:true,
        navText: ["<img src='/wp-content/themes/bah/images/White Arrow.svg'>","<img src='/wp-content/themes/bah/images/White Right Arrow.svg'>"],
        
    }) 
  

    $('.slider').owlCarousel({
        loop:true,
        items:1,
        transitionStyle : "backSlide", 
        dots:true, 
        nav:true,
        navText: ["<img src='/wp-content/themes/bah/images/White Arrow.svg'>","<img src='/wp-content/themes/bah/images/White Right Arrow.svg'>"],
        onInitialized  : counter,
        onTranslated : counter 

    }) 
  

    $(window).on('scroll', function(){'use strict';
    if ( $(window).scrollTop() > 100 ) {
        $('.header-wrapper').addClass('fixed');
    

    } else {
        //jQuery('.wpmm-sticky').removeClass('wpmm-sticky-wrap');
        $('.header-wrapper').removeClass('fixed');
    }

  
     $( "#accordion" ).accordion();
     
});


function counter(event) {
    var element   = event.target;         
     var items     = event.item.count;     
     var item      = event.item.index + 1;    
   
   // it loop is true then reset counter from 1
   if(item > items) {
     item = item - items
   }
  
   var imgReplace = $('.swap').find('.'+item).data('src');

  $('.carousel').css('background-image','url('+imgReplace+')');
  $('.sideimage').css('background-image','url('+imgReplace+')');
 }



});
 
