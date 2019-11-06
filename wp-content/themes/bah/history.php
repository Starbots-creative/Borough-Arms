<?php 
/* Template Name: History */
get_header(); ?>

<?php 
// check if the flexible content field has rows of data
if(have_rows('module_builder_history')):
  
    // loop through the rows of data
    while (have_rows('module_builder_history')) : the_row();  

          if( get_row_layout() == 'slider'): ?>
                <section class="slider-wrapper">  
                        <div class="main-slider owl-carousel owl-theme">
                        <?php while( have_rows('hero_slider') ): the_row(); 
                                $caption = get_sub_field('caption');
                                $image = get_sub_field('image');
                            
                                ?>
    
                                <div class="slide"  style="background-image: url('<?php echo $image['url']; ?>">
                                        <div class="content">
                                                <h1><?=get_sub_field('caption');?></h1> 
                                        </div>
                                </div>


                        <?php endwhile;?>
                        </div>
                <div class="cta"><p>Book a Room</p></div>
            </section>    
         <?php endif; ?>


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

        
        <?php  if( get_row_layout() == 'content_carousel'): ?>
            <section class="voucher">
                <div class="carousel" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg">       
                    <div class="slider owl-carousel owl-theme">
                        <?php while( have_rows('carousel') ): the_row(); ?>
                            <div class="slide">
                                    <h3><?=the_sub_field('heading');?></h3>
                                    <?=the_sub_field('content');?>
                            </div>
                        <?php endwhile;?>
                </div>
                </div>
            <div class="sideimage" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg"></div>
            </section>

        <?php endif;?>

        <?php  if( get_row_layout() == 'form'): ?>
         <div class="signup">
             <h2><?=the_sub_field('heading');?></h2>
                <?php
                $ninja_form = get_sub_field('form_name');
             
                Ninja_Forms()->display($ninja_form['id']);
                ?> 
        </div>
        <?php endif;?>


        

    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

