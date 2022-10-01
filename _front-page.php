<?php
/**
 * Template Name: Front Page
 */
get_header();
?>
<div class="front-page">
	<?php get_template_part('template-parts/hero'); ?>
	<?php get_template_part('template-parts/work-grid'); ?>
	<?php get_template_part('template-parts/multi-column-text'); ?>
	<?php get_template_part('template-parts/simple-text'); ?>
	<?php get_template_part('template-parts/full-width-media'); ?>
    <?php get_template_part('template-parts/media-and-text'); ?>
</div>
<?php
get_footer();
?>
