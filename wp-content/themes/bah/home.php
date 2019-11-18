<?php 
/* Template Name: Homepage */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder')):
  
    // loop through the rows of data
    while (have_rows('module_builder')) : the_row();  

          if( get_row_layout() == 'slider'):
                showSlider();   
          endif; ?>


         <?php  if( get_row_layout() == 'generic_content'): 
            showGeneric();
         endif;?>


        <?php  if( get_row_layout() == 'sub_sections'):
            showSubSections();
        endif;?>

        
        <?php if( get_row_layout() == 'block_grid'): ?>
            <?php showtextImageGrid(); ?>   
         <?php endif; ?>



        <?php  if( get_row_layout() == 'wedding_events'):
           showWeddingEvents();
 
        endif;?>

        <?php  if( get_row_layout() == 'content_block'):
            showContentBlock();
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


<?php 

get_footer(); ?>

