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

       <?php if( get_row_layout() == 'block_grid'): ?>
                 <div class="grid">
                        <?php while( have_rows('image_and_text_grid') ): the_row(); 
                                $caption = get_sub_field('caption');
                                $image = get_sub_field('image');
                            
                        ?>
                        <div class="item">
                            <?php if ($image):?>    
                              <img src="<?php echo $image['url']; ?>"  />
                            <?php endif;?>

                            <div class="content">
                                    <h3><?=get_sub_field('heading');?></h3>
                                    <?=get_sub_field('content');?>
                            </div>
                        
                    </div>

                               

                        <?php endwhile;?>
                </div>    
         <?php endif; ?>

     
    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

