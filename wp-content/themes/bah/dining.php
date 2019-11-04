<?php 
/* Template Name: Dining */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder')):
  
    // loop through the rows of data
    while (have_rows('module_builder')) : the_row();  

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
                    <h2><?=the_sub_field('heading');?></h2>
                    <?=the_sub_field('content');?>
                    <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?></a>
                </div>
         </section>
        <?php endif;?>


        <?php  if( get_row_layout() == 'sub_sections'): ?>
            <section class="articles">

            <?php while( have_rows('article') ): the_row();
                    $image = get_sub_field('image');?>
                    <div class="article <?=strtolower(get_sub_field('color'));?>">
                        <img src="<?php echo $image['url']; ?>" alt="Bedroom" />
                        <div class="content">
                            <h2><?=the_sub_field('heading');?></h2>
                            <?=the_sub_field('content');?>

                            <a href="" class="button full">Rooms & Suites</a>
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
            <section class="generic">
                <div class="inner">
                    
                    <h2><?=the_sub_field('heading');?></h2>
                    <?=the_sub_field('content');?>
                    <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?></a>
                </div>
         </section>
        <?php endif;?>
        
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

