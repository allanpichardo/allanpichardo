<?php

use Portfolio\Theme;

$title      = get_sub_field('title');
$media_type = get_sub_field('media_type'); // image | video | iframe
$url        = get_sub_field('link');
$object_fit = get_sub_field('object_fit'); // cover | contain
$alignment = get_sub_field('alignment') ?: 'center'; // left | center | right
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
	<<?=$tag?> class="media-container <?=$alignment?>" <?=!empty($url) ? sprintf('href="%s" target="%s"', $url['url'], $url['target']) : ''?> >
        <?php if ($media_type === 'image') : ?>
            <?=Theme::getImageSrcset($image['ID'])?>
        <?php elseif ($media_type === 'video') : ?>
            <?=Theme::getVideoTag($video['ID'], '', $autoplay)?>
        <?php elseif ($media_type === 'iframe') : ?>
            <?php remove_filter( 'the_content', 'shortcode_unautop' ); ?>
            <?=$embed_code?>
            <?php add_filter( 'the_content', 'shortcode_unautop' ); ?>
        <?php endif; ?>
    </<?=$tag?>>
    <?php if(!empty($sidenote)): ?>
        <div class="notes-area sidenote step--1 bold <?=$alignment?>">
            <p><?=$sidenote?></p>
        </div>
    <?php endif; ?>
</section>