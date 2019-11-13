
       
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
            <?php endwhile;?>  


            <div class="signup">
            <h2>Sign up for Special Offers</h2>

                <?php
  
                Ninja_Forms()->display(2);
          
                
                ?> 
        </div>
      
  
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
            Website by <a href="https://starbots-creative.co.uk/" target="_blank">Starbots Creative</a><br>
            © Borough Arms Hotel. All rights reserved
            </p>
         </div>
</footer>
	</body>
</html>
<?php wp_footer(); ?>

