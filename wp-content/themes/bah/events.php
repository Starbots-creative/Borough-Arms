<?php 
/* Template Name: Events */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder_events')):
  
    // loop through the rows of data
    while (have_rows('module_builder_events')) : the_row();  

          if( get_row_layout() == 'slider'): 
             showSlider();    
          endif; ?>


        <?php  if( get_row_layout() == 'generic_content'): 
            showGeneric();
         endif;?>


       <?php if( get_row_layout() == 'block_grid'): ?>
            <?php showtextImageGrid(); ?>   
         <?php endif; ?>

         <?php  if( get_row_layout() == 'content_carousel'):
            specialOffers();
        endif;?>
     
    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

