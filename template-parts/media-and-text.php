<?php
$image_placement = get_sub_field('image_placement'); // left | right
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$media_type = get_sub_field('media_type');
$image = get_sub_field('image');
$video = get_sub_field('video');
$sidenote = get_sub_field('sidenote');
$body = get_sub_field('body');
?>
<section class="media-and-text page-padding <?=$image_placement === 'right' ? 'image-right' : ''?>">
    <?php if(!empty($title)): ?>
	    <h2 class="title heading step-2"><?=$title?></h2>
    <?php endif; ?>
    <?php if(!empty($subtitle)): ?>
        <h3 class="subtitle"><?=$subtitle?></h3>
    <?php endif; ?>
    <div class="media-container">
        <?php if($media_type === 'image'): ?>
            <?= \Portfolio\Theme::getImageSrcset($image['ID'], null, 'large') ?>
        <?php endif; ?>
        <?php if($media_type === 'video'): ?>
            <?= \Portfolio\Theme::getVideoTag($video['ID'], '', true) ?>
        <?php endif; ?>
        <?php if(!empty($sidenote)): ?>
            <div class="notes-area">
                <p class="sidenote step--1 bold"><?=$sidenote?></p>
            </div>
        <?php endif; ?>
    </div>
    <article class="text-container body">
        <?=$body?>
    </article>
</section>