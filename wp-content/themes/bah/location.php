<?php 
/* Template Name: Location */
get_header(); ?>

<?php 
// check if the flexible content field has rows of data
if(have_rows('module_builder_location')):
  
    // loop through the rows of data
    while (have_rows('module_builder_location')) : the_row();  

          if( get_row_layout() == 'slider'):
              showSlider();
         endif; ?>


         <?php  if( get_row_layout() == 'map'):
           showMap();
        endif;?>

  
        <?php  if( get_row_layout() == 'sub_sections'):
            showSubSections();
        endif;?>

       <?php if( get_row_layout() == 'block_grid'): ?>
                 <div class="seperator pink"></div>
                <?php showtextImageGrid('etM2'); ?>   
        <?php endif; ?>

        <?php  if( get_row_layout() == 'content_carousel'):
            specialOffers();
        endif;?>
        

    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

