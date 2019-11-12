
        <?php wp_footer(); ?>

  
       
           <?php  while (have_rows('module_builder',2)) : the_row();   ?>
            <?php  if( get_row_layout() == 'content_carousel'): ?>
                    <section class="voucher">
                            <div class="carousel" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg">       
                                <div class="slider owl-carousel owl-theme">
                                    <?php while(have_rows('carousel',2)):   the_row(); ?>
                                
                                        <div class="slide">
                                                <i class="fas fa-gift"></i>
                                                <h3><?=the_sub_field('heading');?></h3>
                                                <?=the_sub_field('content');?>
                                        </div>
                                        
                                    <?php endwhile;?>
                            </div>
                            </div>
                        <div class="sideimage" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg"></div>
                    </section>
            <?php endif; ?>

            <?php  if( get_row_layout() == 'form'): ?>

                        <div class="signup">
                        <h2><?=get_sub_field('heading',2);?></h2>

                            <?php
                            $ninja_form = get_sub_field('form_name',2);
                            Ninja_Forms()->display($ninja_form['id']);
                            ?> 
                    </div>
            <?php endif;?>
            <?php endwhile;?>   
     

  
  



        <footer>
        <div class="inner">

            <div class="contact">
                <h3>Contact Us</h3>
                <p>BOROUGH ARMS HOTEL<br>
                26 KING STREET <br>
                NEWCASTLE-UNDER-LYME  |  ST5 1HX</p>
            </div>

            <div class="logo-wrapper">
            <a href="" class="logo"><img src="<?=get_template_directory_uri();?>/images/Borough-Arms-Logo.png" /></a>
            </div>

            <ul class="sublinks">
                <li><a href="">Careers</a></li>
                <li><a href="">FAQS</a></li>
                <li><a href="">PRIVACY POLICY</a></li>
                <li><a href="">TERMS &amp; CONDITIONS</a></li>
            </ul>

            <p class="copyright">
            Website by Starbots Creative<br>
            © Borough Arms Hotel. All rights reserved
            </p>
         </div>
</footer>
	</body>
</html>
