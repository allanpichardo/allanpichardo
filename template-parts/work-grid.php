<?php
$cards = get_sub_field('cards') ?: [];
?>
<section class="work-grid page-padding">
	<?php foreach($cards as $card): ?>
		<?php get_template_part('template-parts/work-card', null, $card); ?>
	<?php endforeach; ?>
</section>