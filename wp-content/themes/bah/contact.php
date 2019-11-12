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


         <?php  if( get_row_layout() == 'generic_content'): ?>
            <section class="generic">
                <div class="inner">           
                    <?php if (get_sub_field('heading')): ?>
                         <h2><?=the_sub_field('heading');?></h2>
                    <?php endif;?>

          
                    <?=the_sub_field('content');?>

                    <?php if (get_sub_field('button_url')): ?>
                             <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?></a>
                    <?php endif;?>
                </div>
         </section>
        <?php endif;?>

        
        <?php  if( get_row_layout() == 'form'): ?>

            <div class="signup alt">
                 <h2><?=get_sub_field('heading');?></h2>
                 <?=get_sub_field('content');?>

                <?php
                $ninja_form = get_sub_field('form_name');
                Ninja_Forms()->display($ninja_form['id']);
                ?> 
            </div>
    <?php endif;?>
      

        <?php  if( get_row_layout() == 'map'): ?>
            <section class="generic white">
                <div class="inner">           
                    <?php if (get_sub_field('heading')): ?>
                         <h2 class="nounderline"><?=the_sub_field('heading');?></h2>
                    <?php endif;?>

                    <div class="map">
                         <?=the_sub_field('google_map');?>
                    </div>

                    <?=the_sub_field('content');?>
                </div>
         </section>
        <?php endif;?>


        <?php  if( get_row_layout() == 'content_block'): ?>
            <section class="generic">
                <div class="inner">
                    
                    <h2><?=the_sub_field('heading');?></h2>
                    <?=the_sub_field('content');?>
                    <?php if (get_sub_field('button_url')): ?>
                     <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?></a>
                    <?php endif; ?>
                    </div>
         </section>
        <?php endif;?>
        
    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

