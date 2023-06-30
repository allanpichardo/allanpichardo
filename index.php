<?php get_header(); ?>
<main class="page">
    <div class="background"></div>
	<?php get_template_part('template-parts/hero'); ?>
	<?php if(have_rows('modules')): ?>
		<?php while(have_rows('modules')): the_row(); ?>
			<?php
				$module = get_row_layout();
				get_template_part("template-parts/{$module}");
			?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>