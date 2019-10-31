<?php 
/* Template Name: Homepage */
get_header(); ?>
    <section class="slider-wrapper">  
			<div class="main-slider owl-carousel owl-theme">

                <div class="slide"  style="background-image: url('<?=get_template_directory_uri();?>/images/homepage-slider1.jpg">
                       <div class="content">
                            <h1>Step indoors to comfort, style & an always friendly welcome</h1> 
                        </div>
                </div>

                <div class="slide"  style="background-image: url('<?=get_template_directory_uri();?>/images/homepage-slider1.jpg">
                       <div class="content">
                            <h1>Step indoors to comfort, style & an always friendly welcome</h1> 
                        </div>
                </div>

                <div class="slide"  style="background-image: url('<?=get_template_directory_uri();?>/images/homepage-slider1.jpg">
                       <div class="content">
                            <h1>Step indoors to comfort, style & an always friendly welcome</h1> 
                        </div>
                </div>

  </div>
    <div class="cta"><p>Book a Room</p></div>
    </section> 
    
   
   <section class="generic">
     <div class="inner">
        
        <h2>A Heartwarming Hotel & Restaurant in Newcastle-Under-Lyme, Staffordshire</h2>
        <p>Welcome to the Borough Arms Hotel, a friendly, privately owned hotel in the market town of Newcastle-Under-Lyme. Well-known for our charm and attentive personal service, our hotel in Staffordshire offers a great blend of modern comforts and classic hospitality.</p>
        <p>It’s our pleasure to show you around our contemporary ensuite hotel rooms – they have all the modern amenities you’ll need for your stay in Staffordshire – including free WiFi and parking. They’re perfect for a great night’s sleep, at a great price. We have two restaurants, where breakfast, lunch and dinner are served daily, so you can arrive, get settled in, and relax. </p>

        <a href="" class="button full">BOOK HERE ON OUR WEBSITE FOR OUR BEST PRICES</a>
    </div>

   </section>

   <section class="articles">

            <div class="article">

                        <img src="<?=get_template_directory_uri();?>/images/bedroom-1.jpg" alt="Bedroom" />
                        <div class="content">
                            <h2>Stay at our Hotel in Staffordshire</h2>
                            <p>Wonderfully warm and inviting, we want you to feel at home when you stay with us. Each of our 40 bedrooms is ensuite, and all offer free WiFi. We have contemporary budget-friendly bedrooms, boutique-style suites, and family bedrooms.</p>
                            <p class="strong">All guests enjoy free parking and early check-in - from 1:00pm.</p>
                        
                            <a href="" class="button full">Rooms & Suites</a>
                        </div>
             </div>

             
            <div class="article pink">

                    <img src="<?=get_template_directory_uri();?>/images/special-offers.jpg" alt="Bedroom" />
                    <div class="content">
                        <h2>Hotel Special Offers</h2>
                        <p>For our best prices, it is always best to book your stay here on our website, where our prices are clear and transparent, offering you a great value stay without breaking the bank! Take a look at our latest restaurant and hotel offers to start planning your stay.</p>
                        <a href="" class="button">Offers</a>
                    </div>
            </div>


            <div class="article green">

                <img src="<?=get_template_directory_uri();?>/images/dining.jpg" alt="Bedroom" />
                <div class="content">
                    <h2>Dine with us</h2>
                    <p>Whether you’re staying with us and arrive with an appetite, or are just passing by, our bar and restaurant offer freshly prepared, filling, traditional British fare and continental flavours. Make yourself at home in the bar and enjoy your favourite local beer or choose a table in our recently-refurbished restaurant for excellent service in beautiful surroundings – perfect for celebrations, family dinners and get-togethers. For your convenience, room service is available during serving hours.</p>
                    <a href="" class="button">Dining</a>
                </div>
            </div>


                

                

</section>


<section class="hero pink" style="background-image: url('<?=get_template_directory_uri();?>/images/wedding-events.jpg">
    
    <div class="content">
                <h2>Weddings & Events</h2>
                <p>Considered to be one of the best events venues in Staffordshire, it’s our warm and friendly atmosphere and personal touch that really sets us apart. Catering for parties from 10 to 120 guests, flexibility is our forte. Whether we are planning a wedding, organising a conference, or designing a special celebration, you have our guarantee: we will personally endeavour to meet your every request</p>
                <div class="action">
                    <a href="" class="button">Wedding</a>
                    <a href="" class="button">Events</a>
                </div>
    </div>


</section>

   
<section class="generic green">
     <div class="inner">
        
        <h2>Explore Staffordshire</h2>
        <p>The Borough Arms Hotel and Restaurant is fantastically located at the heart of the market town of Newcastle-Under-Lyme in Staffordshire. Easy to find with free parking, there are so many attractions and thigs to do in Staffordshire! Discover stately homes, catch a show at the New Vic Theatre, and explore famous potteries, it’s all possible... Furthermore, if you’re looking for a hotel near Alton Towers, we are just 35 minutes away.</p>
        <a href="" class="button full">Location</a>
    </div>

</section>


<section class="voucher">

    <div class="carousel" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg">
        
   
	<div class="slider owl-carousel owl-theme">

        <div class="slide">
                <h3>Buy Gift Vouchers</h3>
                <p>Haritiossum explatem none cusda posti acesciatis asped quundae doluptaes comnimp ediorrorro et ea quam illacca boremquae es as nonsero repudandi.</p>
        </div>

        <div class="slide">
                <h3>Buy Gift Vouchers</h3>
                <p>Haritiossum explatem none cusda posti acesciatis asped quundae doluptaes comnimp ediorrorro et ea quam illacca boremquae es as nonsero repudandi.</p>
        </div>

        <div class="slide">
                <h3>Buy Gift Vouchers</h3>
                <p>Haritiossum explatem none cusda posti acesciatis asped quundae doluptaes comnimp ediorrorro et ea quam illacca boremquae es as nonsero repudandi.</p>
        </div>
    
    </div>


    

    </div>

    <div class="sideimage" style="background-image: url('<?=get_template_directory_uri();?>/images/voucher-hero.jpg">

    </div>
</section>


<div class="signup">
<h2>Sign up for Special Offers</h2>
<?php echo do_shortcode('[ninja_form id=2]'); ?> 
</div>
<?php get_footer(); ?>

