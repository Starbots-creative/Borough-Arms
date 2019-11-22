<?php

/**
 * Dump the given content and then (optionally) die.
 *
 * @var mixed $content
 */
function dd($content, $die = false) {
    // Print content.
    echo '<pre style="position: relative; z-index: 999999; width: 100%; max-width: 100%; background-color: #fafafa; color: #4a4a4a; font-size: 16px; line-height: 1.75; letter-spacing: -0.5px; white-space: pre-wrap; padding: 20px; margin: 30px auto; border: 2px solid #eaeaea; border-radius: 5px; box-sizing: border-box;">';
    print_r($content);
    echo '</pre>';

    // Die only if told to.
    if($die) {
        die;
    }
}


/**
 * Get the correct filename from the manifest file for the given value.
 *
 * @param string $filename
 *
 * @return string
 */
function asset_path($filename) {
	$manifest_path = __DIR__ . '/manifest.json';

	if (file_exists($manifest_path)) {
		$manifest = json_decode(file_get_contents($manifest_path), TRUE);
	} else {
		$manifest = [];
	}

	if (array_key_exists($filename, $manifest)) {
		return $manifest[$filename];
	}

	return $filename;
}




/**
 * Add custom styling overrides to the WordPress administration dashboard.
 *
 * @return void
 */
function admin_styling_overrides() {
    echo '<style></style>';
}
add_action('admin_head', 'admin_styling_overrides');




/**
 * Add a "Website Options" ACF Pro tab to the admin dashboard.
 */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Website Options',
		'menu_title' => 'Website Options',
		'menu_slug'  => 'website-options'
	]);
}


/**
 * Register website menus for use with WordPress.
 */
function register_menu() {
	register_nav_menus([
		'main-menu'   => 'Main Menu',
		'footer-menu' => 'Footer Menu'
	]);
}
add_action('after_setup_theme', 'register_menu');


/**
 * Add featured images to blog posts.
 */
add_theme_support('post-thumbnails');


/*
 * Tell WordPress (Yoast) to handle <title> tags; we haven't added any to the site.
 */
add_theme_support( 'title-tag' );




/**
 * Enqueue all style/script assets.
 *
 * @return void
 */
function enqueue_assets() {
    // Handle, source, dependencies, URL parameters.
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/' . asset_path('style.css'), [], null);
    // Handle, source, dependencies, URL parameters, enqueue to footer.
    wp_enqueue_script('script-js', get_stylesheet_directory_uri() . '/' . asset_path('script.js'), [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_assets', 0);


/**
 * Add the data tag required for FA to search pseudo elements.
 *
 * @param string $tag
 * @param string $handle
 * @param string $source
 *
 * @return string
 */
function add_fa_data_attribute($tag, $handle, $source) {
    if ($handle == 'script-js') {
        $tag = '<script data-search-pseudo-elements src="' . $source . '"></script>';
    }

    return $tag;
}
add_filter('script_loader_tag', 'add_fa_data_attribute', 10, 3);


/**
 * Remove the default WordPress assets.
 *
 * @return void
 */
function remove_default_assets() {
    // Script used to embed other WordPress blog posts on this website.
    wp_deregister_script('wp-embed');
    // Gutenberg block styling.
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_default_assets', 9999);
add_action('wp_head', 'remove_default_assets', 9999);

// Emoji libraries.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');




/**
 * Redirect from /?s=value to /search/value.
 */
function pretty_search() {
    if (is_search() && !empty($_GET['s'])) {
        wp_redirect(home_url('/search/') . urlencode(get_query_var('s')));
        exit();
    }
}
add_action('template_redirect', 'pretty_search');


/**
 * Return the post excerpt cut down to the given length.
 *
 * @param integer $length
 *
 * @return string
 */
function custom_excerpt($length = 20) {
	return implode(' ', array_slice(explode(' ', get_the_excerpt()), 0, $length)) . '...';
}


// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBzGuAcdehwQj6XGAskIiOfOYJnqH3rAPo';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function showSlider() { 
    ?>
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
        <div class="cta"><a href="<?=the_field('booking_link',2);?>" target="_blank">Book a Room</a>
    </div>
    </section> 

    <?php } 


function showtextImageGrid($class='') { ?>

                <div class="grid <?=$class;?>">
                        <?php while( have_rows('image_and_text_grid') ): the_row(); 
                                $caption = get_sub_field('caption');
                                $image = get_sub_field('image');
                            
                        ?>
                        <div class="item">
                            <?php if ($image):?>    
                            <a href="<?=get_sub_field('link');?>">
                                    <img src="<?php echo $image['url']; ?>"  />
                                    <div class="text">Click to view more</div>
                            </a>
                            <?php endif;?>

                            <div class="content">
                                    <h3><?=get_sub_field('heading');?></h3>
                                    <?=get_sub_field('content');?>
                            </div>
                        
                    </div>
                        <?php endwhile;?>
                </div> 

<?php }

function showGeneric() { ?>
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



<?php }


function showSubSections($class='') { ?>

<section class="articles <?=$class;?>">

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

<?php }


function showWeddingEvents() { 
$image = get_sub_field('background_image');?>
<section class="hero pink" style="background-image: url('<?=$image['url'];?>">
    <div class="content">
                <h2><?=the_sub_field('heading');?></h2>
                <?=the_sub_field('content');?>

                <div class="action">
                     <?php while( have_rows('button') ): the_row();?>
                            <a href="<?=the_sub_field('button_link');?>" class="button"><?=the_sub_field('button_text');?></a>
                    <?php endwhile;?>
                </div>
    </div>
</section>
<?php }


function showContentBlock() { ?>
<section class="generic lime nobg">
<div class="inner">
    
    <h2><?=the_sub_field('heading');?></h2>
    <?=the_sub_field('content');?>
    <?php if (get_sub_field('button_url') !== ""):?>
            <a href="<?=the_sub_field('button_url');?>" class="button full"><?=the_sub_field('button_text');?>
         
        </a>
    <?php endif;?>
</div>
</section>
<?php }


function showRooms() { ?>

<section class="rooms">
<?php 
$i=1;
while( have_rows('room') ): the_row(); 
$gallery = get_sub_field('gallery');
$firstImage = $gallery[0]['sizes']['large'];?>



    <div class="item">
              <div class="room">
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
<?php }


function showMap() { ?>
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
<?php }


function specialOffers() {
    
    $i=1;
    $images = array();?>

    <div class="swap">
    <?php
    while(have_rows('carousel')):   the_row(); 
        $gallery = get_sub_field('offer_image');
        $images[] = $gallery['sizes']['large'];
        echo "<img data-src='".$gallery['sizes']['large']."' class='$i' />";
        
     $i++;
   endwhile;
    ?>
    </div>

                    <section class="voucher">
                            <div class="carousel" style="background-image: url('<?=$images[0];?>')">       
                                <div class="slider owl-carousel owl-theme">
                                    <?php while(have_rows('carousel')):   the_row(); ?>
                                
                                        <div class="slide">
                                                <i class="fas fa-gift"></i>
                                                <h3><?=the_sub_field('heading');?></h3>
                                                <?=the_sub_field('content');?>
                                        </div>
                                        
                                    <?php endwhile;?>
                            </div>
                            </div>
                        <div class="sideimage" style="background-image: url('<?=$images[0];?>')"></div>
                        <div id="counter"></div> 
  </div>
                    </section>
          
 <?php }


function showAccordion() { ?>

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

<?php }

function showDownloads() { ?>
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
<?php }


function showTestimonials() {?>

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
<?php }


function showFormAlt() { ?>

<div class="seperator"></div>
            <div class="signup alt ">
                <h2><?=get_sub_field('heading');?></h2>
                <?=get_sub_field('content');?>

                <?php
                $ninja_form = get_sub_field('form_name'); 
                Ninja_Forms()->display($ninja_form['id']);
                ?> 
            </div>

<?php } ?>


<?php function showGallery() { ?>

    <div class="gallery-wrapper">
            <h3><?=get_sub_field('heading');?></h3>
                <div class="gallery owl-carousel owl-theme">
                    
                    <?php
                        $images = get_sub_field('gallery');
                        if( $images ):
                            foreach( $images as $image ): ?>
                                <div class="item">
                                <a href="<?php echo esc_url($image['url']);?>"  data-fancybox="gallery">
                                            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                            </div>
                        <?php  endforeach;
                        endif; ?>


            </div>
         </div>
         <?php } ?>