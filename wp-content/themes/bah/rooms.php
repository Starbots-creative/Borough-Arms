<?php 
/* Template Name: Rooms */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder_rooms')):
  
    // loop through the rows of data
    while (have_rows('module_builder_rooms')) : the_row();  

          if( get_row_layout() == 'slider'):
                showSlider();
         endif; ?>


        <?php  if( get_row_layout() == 'generic_content'): 
            showGeneric();
         endif;?>
     


         <?php if( get_row_layout() == 'bedrooms'):
            showRooms();
        endif; ?>


   
        <?php  if( get_row_layout() == 'sub_sections'):
            showSubSections('lbm');
        endif;?>

<?php  if( get_row_layout() == 'content_carousel'):
            specialOffers();
        endif;?>


        

    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

