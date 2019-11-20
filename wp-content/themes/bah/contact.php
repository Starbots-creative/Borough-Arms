<?php 
/* Template Name: Contact */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder_contact')):
  
    // loop through the rows of data
    while (have_rows('module_builder_contact')) : the_row();  

          if( get_row_layout() == 'slider'): 
                showSlider();   
          endif; ?>


        <?php  if( get_row_layout() == 'generic_content'): 
            showGeneric();
         endif;?>

        
        <?php  if( get_row_layout() == 'form'):
            showFormAlt();
        endif;?>
      

        <?php  if( get_row_layout() == 'map'):
          showMap();
        endif;?>


              
        <?php  if( get_row_layout() == 'content_block'):
            showContentBlock();
        endif;?>

      <?php  if( get_row_layout() == 'content_carousel'):
            specialOffers();
        endif;?>

         <?php if( get_row_layout() == 'block_grid'):
               showtextImageGrid();
         endif; ?>

        
    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

