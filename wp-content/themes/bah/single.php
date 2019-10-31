<?php get_header(); ?>

<?php global $post; ?>

<section class="blog-summary">
	<div class="wrapper">

        <div class="article">
            <?php if(have_posts()) : ?>
                <h2><?php the_title(); ?></h2>

                <?php the_content(); ?>

                <div class="buttons">
                    <a href="<?php echo get_site_url() . '/blog' ?>" class="button button-primary">Back to blog <i class="fas fa-arrow-right"></i></a>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

	</div>
</section>

<?php get_footer(); ?>
