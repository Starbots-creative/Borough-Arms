<?php 
/* Template Name: Rooms */
get_header(); ?>

<?php
// check if the flexible content field has rows of data
if(have_rows('module_builder_rooms')):
  
    // loop through the rows of data
    while (have_rows('module_builder_rooms')) : the_row();  

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

     


         <?php if( get_row_layout() == 'bedrooms'): ?>

        <section class="rooms">

        <?php 
        $i=1;
        while( have_rows('room') ): the_row(); 
        $gallery = get_sub_field('gallery');
        $firstImage = $gallery[0]['sizes']['large'];?>
        
     
        
            <div class="item">
                      <div class="gallery">
                                <img src="<?=$firstImage;?>" alt="" />
                                 <a data-fancybox-trigger="preview-<?=$i;?>"  class="play fancy-circle"><i class="fas fa-camera"></i></a>
                                      
                        </div>

                        <div class="content">
                                <h2> <?=get_sub_field('heading');?></h3>
                                <?=get_sub_field('content');?>
                                <a href="" class="button full">Book Online</a>
                        </div>
                        
                        <ul class="gallery-children">
                        <?php foreach( $gallery as $image ): ?>
                           <a href="<?php echo $image['url']; ?>" " data-fancybox="preview-<?=$i;?>">
                                   <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                           </a>
                   <?php endforeach; ?>
                </div>
            <?php 
            $i++;
            endwhile;?>

            <div class="info">
            <?=get_sub_field('contents');?>
            </div>
        </section>

        <?php endif; ?>


        <?php  if( get_row_layout() == 'sub_sections'): ?>
            <section class="articles">

            <?php while( have_rows('article') ): the_row();
                    $image = get_sub_field('image');?>
                    <div class="article <?=strtolower(get_sub_field('color'));?>">
                        <img src="<?php echo $image['url']; ?>" alt="Bedroom" />
                        <div class="content">
                            <h2><?=the_sub_field('heading');?></h2>
                            <?=the_sub_field('content');?>

                     
                        </div>
                        </div>
         
        <?php endwhile;?>
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

