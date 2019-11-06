require('./js/partials/modernizr.js');
var $ = window.jQuery = require('jquery');
require('owl.carousel');
require('@fancyapps/fancybox/dist/jquery.fancybox.min.js');



$(document).ready(function() {

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


    $('.main-slider').owlCarousel({
        loop:true,
        items:1,
        transitionStyle : "backSlide",
        dots:true,
        nav:true,
        navText: ["<img src='/wp-content/themes/bah/images/White Arrow.svg'>","<img src='/wp-content/themes/bah/images/White Arrow.svg'>"],
        
    }) 
  

    $('.slider').owlCarousel({
        loop:true,
        items:1,
        transitionStyle : "backSlide", 
        dots:true, 
        nav:true,
        navText: ["<img src='/wp-content/themes/bah/images/White Arrow.svg'>","<img src='/wp-content/themes/bah/images/White Arrow.svg'>"],
        
    }) 
 

    $(window).on('scroll', function(){'use strict';
    if ( $(window).scrollTop() > 100 ) {
        $('.header-wrapper').addClass('fixed');
    

    } else {
        //jQuery('.wpmm-sticky').removeClass('wpmm-sticky-wrap');
        $('.header-wrapper').removeClass('fixed');
    }
});




});
 