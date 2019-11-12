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


         <?php  if( get_row_layout() == 'map'): ?>
            <section class="generic">
                <div class="inner">           
                    <?php if (get_sub_field('heading')): ?>
                         <h3><?=the_sub_field('heading');?></h3>
                    <?php endif;?>

                    <div class="map">
                         <?=the_sub_field('google_map');?>
                    </div>

                    <?=the_sub_field('content');?>
                </div>
         </section>
        <?php endif;?>

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
        <div class="seperator pink"></div>
        <?php endif;?>

       <?php if( get_row_layout() == 'block_grid'): ?>
                 <div class="grid etM2">
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

