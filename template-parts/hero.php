<?php

use Portfolio\Theme;

$title      = get_field('title');
$version    = get_field('version'); // primary | secondary
$media_type = get_field('media_type'); // image | video | none
$url        = get_field('link');
$tag        = !empty($url) ? 'a' : 'div';
$image      = get_field('image');
$video      = get_field('video');
$notes      = get_field('notes');
?>
<section class="hero page-padding">
    <div class="title-area <?=$version?>">
        <h1 class="heading step-5"><?= $title ?></h1>
    </div>
    <?php if($media_type !== 'none'): ?>
        <<?=$tag?> class="media-container" href="#">
            <?php if ($media_type === 'image') : ?>
                <?php if(!empty($image)) {
                    echo Theme::getImageSrcset($image['ID']);
                } ?>
            <?php elseif ($media_type === 'video') : ?>
                <?php if(!empty($video)) {
                    echo Theme::getVideoTag($video['ID']);
                } ?>
            <?php endif; ?>
        </<?=$tag?>>
    <?php endif; ?>
    <?php if(!empty($notes)): ?>
        <div class="notes-area">
            <p class="sidenote step--1 bold"><?=$notes?></p>
        </div>
    <?php endif; ?>
</section>