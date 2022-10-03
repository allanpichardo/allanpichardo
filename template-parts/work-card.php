<?php

use Portfolio\Theme;

$title      = $args['title'];
$media_type = $args['media_type'];
$image      = $args['image'] ?: null;
$video      = $args['video'] ?: null;
$link       = $args['link'];
?>
<article class="work-card lazy">
    <a href="<?=$link['url']?>" target="<?=$link['target']?>">
        <div class="overlay"></div>
        <?php if($media_type === 'image') : ?>
            <?= Theme::getImageSrcset($image['ID'], '', 'medium', 'thumbnail lazy', true) ?>
        <?php elseif($media_type === 'video') : ?>
            <?php $html = Theme::getVideoTag($video['ID'], 'thumbnail lazy', false, true);
            echo $html; ?>
        <?php endif; ?>
        <h3 class="title heading step-1"><?=$title?></h3>
    </a>
</article>