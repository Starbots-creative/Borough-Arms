<?php
/* Template Name: Page Builder */

get_header();

// If the page has data in the flexible content.
if(have_rows('pb')) {
    // Loop through each row of data.
    while (have_rows('pb')) {
        the_row();

        if(get_row_layout() == 'whatever') {
            // // Required data.
            // $data = [
            //     'whatever' => get_sub_field('whatever')
            // ];
            //
            // // Include markup.
            // include get_stylesheet_directory() . '/partials/sections/whatever.php';
        }
    }
}

get_footer();

?>
