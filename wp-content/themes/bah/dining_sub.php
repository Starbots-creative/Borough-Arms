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

        <?php if( get_row_layout() == 'accordion'): ?>
           
                <section class="accordion">
                        <div class="inner" id="accordion">  
                        
                            <?php while( have_rows('items') ): the_row(); ?>

                            <h3><?=get_sub_field('heading');?></h3>
                     
                            <div>
                            <?=get_sub_field('content');?>  
                            </div>


                         <?php endwhile; ?>
                        </div>

                </section>

         <?php endif; ?>

         <?php  if( get_row_layout() == 'sub_sections'): ?>
            <section class="articles">

            <?php while( have_rows('article') ): the_row();
                    $image = get_sub_field('image');?>
                    <div class="article <?=strtolower(get_sub_field('color'));?>">
                    
                        <div class="image">
                             <img src="<?php echo $image['url']; ?>" alt="Bedroom" />
                        </div>


                        <div class="content">
                            <h2><?=the_sub_field('heading');?></h2>
                            <?=the_sub_field('content');?>

                     
                        </div>
                        </div>
         
        <?php endwhile;?>
        </section>
        <?php endif;?>

        <?php  if( get_row_layout() == 'form'): ?>
            <div class="seperator" />
            <div class="signup alt ">
                <h2><?=get_sub_field('heading');?></h2>
                <?=get_sub_field('content');?>

                <?php
                $ninja_form = get_sub_field('form_name'); 
                Ninja_Forms()->display($ninja_form['id']);
                ?> 
            </div>
     <?php endif;?>


     
     <?php  if( get_row_layout() == 'testimonials'): ?>
            <section class="reviews">
                    <div class="inner">
                                <h2>Testimonials</h2>
          
                                <div class="slider owl-carousel owl-theme">
                                    <?php while(have_rows('testimonials')):   the_row(); ?>
                                
                                        <div class="slide">
                                            
                                                <h3><?=the_sub_field('name');?></h2></h3>
                                                <?=the_sub_field('content');?>
                                        </div>
                                        
                                     <?php endwhile;?>
                            </div>
                    </div>
            </section>
          
        <?php endif;?>


        <?php  if( get_row_layout() == 'downloads'): ?>
            <section class="generic">
                    <div class="inner">
                                <h2><?=get_sub_field('heading');?></h2>
                                <ul class="list left">

                                    <?php while(have_rows('downloads')):   the_row(); 
                                      $file = get_sub_field('file');
                                    ?>  
                                                      
                                    <li><i class="fas fa-download"></i><a href=" <?php echo $file['url']; ?>" target="_blank"><?php echo $file['title']; ?></a></lI>                                         
   
                             <?php endwhile;?>
                             </ul>          
                    </div>
            </section>
          
        <?php endif;?>





    <?php

    endwhile;
    endif;

?>

<?php get_footer(); ?>

