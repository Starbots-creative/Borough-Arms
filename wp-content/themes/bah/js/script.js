require('./js/partials/modernizr.js');
var $ = window.jQuery = require('jquery');
require('owl.carousel');




$(document).ready(function() {

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


});
 