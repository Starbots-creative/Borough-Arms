<?php 
/* Template Name: General Page */
get_header(); ?>


<section class="slider-wrapper">  
      <div class="main-slider owl-carousel owl-theme">
           
                    <div class="slide"  style="background-image: url('/wp-content/uploads/2019/11/homepage-slider1.jpg')">
                            <div class="content">
                                    <h1><?=the_title();?></h1> 
                            </div>
                    </div>


            </div>
        <div class="cta"><a href="<?=the_field('booking_link',2);?>" target="_blank">Book a Room</a>
    </div>
    </section> 


    <section class="generic">
                <div class="inner">           
                    <?=the_content();?>
                </div>
</section>
  

<?php
get_footer(); ?>

