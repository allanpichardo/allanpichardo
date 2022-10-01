<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$body = get_sub_field('body');
?>
<section class="simple-text page-padding">
    <?php if(!empty($title)): ?>
	    <h2 class="title heading step-2"><?=$title?></h2>
    <?php endif; ?>
    <?php if(!empty($subtitle)): ?>
	    <h3 class="subtitle"><?=$subtitle?></h3>
    <?php endif; ?>
	<div class="content-section body">
		<?=$body?>
	</div>
</section>
