
var $ = window.jQuery = require('jquery');

require('owl.carousel');
require('@fancyapps/fancybox/dist/jquery.fancybox.min.js');

 


var accItem = document.getElementsByClassName('accordionItem');
var accHD = document.getElementsByClassName('accordionItemHeading');
var i;
for (i = 0; i < accHD.length; i++) {
    accHD[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
    var itemClass = this.parentNode.className;

    for (i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem close';
    }
    if (itemClass == 'accordionItem close') { 
        this.parentNode.className = 'accordionItem open';
    }
}


$(document).ready(function() {


    
    function setup_collapsible_submenus() {
        var $menu = $('.main-menu'),
            top_level_link = '.main-menu .menu-item-has-children > a';
             
          $menu.find('a').each(function() {
            $(this).off('click');
               
            if ( $(this).is(top_level_link) ) {
               
            }
              
            if ( ! $(this).siblings('.sub-menu').length ) {
                $(this).on('click', function(event) {
                    $(this).parents('.mobile_nav').trigger('click');
                });
              
            } else {
                $(this).on('click', function(event) {
                    event.preventDefault();
                    if ($(this).next('.sub-menu').hasClass('toggle')) {
                        $(this).next('.sub-menu').removeClass('toggle');
                     
                    } else {
                        $(this).next('.sub-menu').addClass('toggle');
                    }
                   
                
                });
            }
        });

    }
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        setup_collapsible_submenus();
        
    }


       

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
                items: 5,
        
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
        //jQuery('.wpmm-sticky').removeClass('wpmm-sticky-wrap');c
        $('.header-wrapper').removeClass('fixed');
    }
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
 