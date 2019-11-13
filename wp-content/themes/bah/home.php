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


        <?php  if( get_row_layout() == 'sub_sections'): ?>
            <section class="articles">

            <?php while( have_rows('article') ): the_row();
                    $image = get_sub_field('image');?>
                    <div class="article <?=strtolower(get_sub_field('color'));?>">
                        <div class="image">
                             <img src="<?php echo $image['url']; ?>" alt="Bedroom" />
                        </div>
                        <div class="content">
                           <div class="inner">
                                <h2><?=the_sub_field('heading');?></h2>
                                <?=the_sub_field('content');?>

                           
                            </div>
                        </div>
                        </div>
         
        <?php endwhile;?>
        </section>
        <?php endif;?>


        <?php  if( get_row_layout() == 'wedding_events'):
            $image = get_sub_field('background_image');?>
            <section class="hero pink" style="background-image: url('<?=$image['url'];?>">
                <div class="content">
                            <h2><?=the_sub_field('heading');?></h2>
                            <?=the_sub_field('content');?>

                            <div class="action">
                                 <?php while( have_rows('button') ): the_row();?>
                                        <a href="<?=the_sub_field('button_url');?>" class="button"><?=the_sub_field('button_text');?></a>
                                <?php endwhile;?>
                            </div>
                </div>
            </section>

        <?php endif;?>

        
        <?php  if( get_row_layout() == 'content_block'): ?>
            <section class="generic lime nobg">
                <div class="inner">
                    
                    <h2><?=the_sub_field('heading');?></h2>
                    <?=the_sub_field('content');?>
                    <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?></a>
                </div>
         </section>
        <?php endif;?>
        
 

        

    <?php

    endwhile;
    endif;
?>


<?php get_footer(); ?>

