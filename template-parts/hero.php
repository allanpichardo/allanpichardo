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
        <<?=$tag?> class="media-container" href="<?=$url['url']?>" target="<?=$url['target']?>" aria-label="<?=$url['title']?>">
            <?php if ($media_type === 'image') : ?>
                <?php if(!empty($image)) {
                    echo Theme::getImageSrcset($image['ID'], null, 'large');
                } ?>
            <?php elseif ($media_type === 'video') : ?>
                <?php if(!empty($video)) {
                    echo Theme::getVideoTag($video['ID'], '', true);
                } ?>
            <?php endif; ?>
        </<?=$tag?>>
    <?php endif; ?>
    <div class="notes-area">
        <?php if(!empty($notes)): ?>
            <p class="sidenote step--1 bold"><?=$notes?></p>
        <?php endif; ?>
<!--        --><?php //if(is_single()): ?>
<!--            <time datetime="--><?php //=get_the_date('Y-m-d')?><!--">--><?php //=get_the_date('F j, Y')?><!--</time>-->
<!--        --><?php //endif; ?>
    </div>

</section>