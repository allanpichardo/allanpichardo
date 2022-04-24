<?php
/**
 * Template Name: Front Page
 */
get_header();
?>
<div class="front-page">
	<?php get_template_part('template-parts/hero'); ?>
	<?php get_template_part('template-parts/work-grid'); ?>
</div>
<?php
get_footer();
?>
