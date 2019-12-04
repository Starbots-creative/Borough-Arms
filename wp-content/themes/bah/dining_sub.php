<?php 
/* Template Name: Sub Pages*/
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder_dining_sub')):
  
    // loop through the rows of data
    while (have_rows('module_builder_dining_sub')) : the_row();  

          if( get_row_layout() == 'slider'): 
                showSlider();   
          endif; ?>

        <?php  if( get_row_layout() == 'generic_content'): 
            showGeneric();
         endif;?>

        <?php if( get_row_layout() == 'accordion'):
            showAccordion();
         endif; ?>

         <?php  if( get_row_layout() == 'sub_sections'):
            showSubSections();
         endif;?>

        <?php  if( get_row_layout() == 'form'):
           showFormAlt();
        endif;?>

     
        <?php  if( get_row_layout() == 'testimonials'):
        showTestimonials();
        endif;?>


        <?php  if( get_row_layout() == 'downloads'):
            showDownloads();
          endif;?>

      <?php  if( get_row_layout() == 'content_block'):
            showContentBlock();
        endif;?>


        <?php  if( get_row_layout() == 'content_carousel'):
            specialOffers();
        endif;?>
        
           
        <?php if( get_row_layout() == 'block_grid'): ?>
                <?php showtextImageGrid();
         endif; ?>

         
       <?php  if( get_row_layout() == 'gallery'):
           showGallery();
       endif;?>

       
<?php  if( get_row_layout() == 'wedding_events'):
           showWeddingEvents();
 
        endif;?>

    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

