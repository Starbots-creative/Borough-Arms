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

<?php } ?>

 