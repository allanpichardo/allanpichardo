<?php

use Portfolio\Theme;

$title      = get_sub_field('title');
$media_type = get_sub_field('media_type'); // image | video | iframe
$url        = get_sub_field('link');
$object_fit = get_sub_field('object_fit'); // cover | contain
$autoplay   = get_sub_field('autoplay');
$tag        = !empty($url) ? 'a' : 'div';
$image      = get_sub_field('image');
$video      = get_sub_field('video');
$embed_code = get_sub_field('embed_code');
$sidenote   = get_sub_field('sidenote');
?>
<section class="full-width-media page-padding">
    <?php if(!empty($title)): ?>
        <div class="title-area">
            <h2 class="heading step-2"><?= $title ?></h2>
        </div>
    <?php endif; ?>
	<<?=$tag?> class="media-container" <?=!empty($url) ? sprintf('href="%s" target="%s"', $url['url'], $url['target']) : ''?> >
        <?php if ($media_type === 'image') : ?>
            <?=Theme::getImageSrcset($image)?>
        <?php elseif ($media_type === 'video') : ?>
            <?=Theme::getVideoTag($video, '', $autoplay)?>
        <?php elseif ($media_type === 'iframe') : ?>
            <?=$embed_code?>
        <?php endif; ?>
    </<?=$tag?>>
    <?php if(!empty($sidenote)): ?>
        <div class="sidenote">
            <p><?=$sidenote?></p>
        </div>
    <?php endif; ?>
</section>