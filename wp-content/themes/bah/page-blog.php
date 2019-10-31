<?php
/* Template Name: Blog */
?>

<?php get_header(); ?>

<?php global $post; ?>

<section class="blog-summary">
	<div class="wrapper">

		<?php
		$wp_query = new WP_Query();
		$wp_query->query('posts_per_page=10' . '&paged='.$paged);
		?>
		<?php if($wp_query->have_posts()): ?>
			<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

				<div class="article">
                    <a href="<?php the_permalink(); ?>">
                        <div>
							<p class="headline"><?php the_title(); ?></p>
							<p class="excerpt"><?php echo custom_excerpt(); ?></p>
                        </div>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

			<?php endwhile; ?>
		<?php endif; ?>

		<?php the_posts_pagination([
			'mid_size'  => 2,
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'screen_reader_text' => 'Blog Navigation'
		]); ?>

		<?php wp_reset_postdata(); ?>

	</div>
</section>

<?php get_footer(); ?>
