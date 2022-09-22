<?php
$title = 'A Clever Title';
$media_type = 'image'; // image | video | iframe
$url = null;
$object_fit = 'cover'; // cover | contain
$tag = !empty($url) ? 'a' : 'div';
$autoplay = false;
?>
<section class="full-width-media page-padding">
	<div class="title-area">
		<h2 class="heading step-2"><?= $title ?></h2>
	</div>
	<<?=$tag?> class="media-container" href="#">
	<?php if ($media_type === 'image') : ?>
		<img src="https://placekitten.com/800/600" alt="Hero Image" style="object-fit: <?=$object_fit?>">
	<?php elseif ($media_type === 'video') : ?>
		<video <?=$autoplay ? 'autoplay' : ''?> muted loop playsinline>
			<source src="<?=sprintf("%s/img/jump1.mp4", get_stylesheet_directory_uri()) ?>" type="video/mp4">
		</video>
    <?php elseif ($media_type === 'iframe') : ?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/AgljUimWrAw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php endif; ?>
</<?=$tag?>>
<div class="notes-area">
	<p class="sidenote step--1 bold">Some notes 2022</p>
</div>
</section>