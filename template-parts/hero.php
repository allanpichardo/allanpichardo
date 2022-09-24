<?php
$version = 'primary'; // primary | secondary
$title = 'A Clever Title';
$media_type = 'video';
$url = null;
$tag = !empty($url) ? 'a' : 'div';

?>
<section class="hero page-padding">
    <div class="title-area <?=$version?>">
        <h1 class="heading step-5"><?= $title ?></h1>
    </div>
    <<?=$tag?> class="media-container" href="#">
        <?php if ($media_type === 'image') : ?>
            <img src="https://placekitten.com/800/600" alt="Hero Image">
        <?php elseif ($media_type === 'video') : ?>
            <video autoplay muted loop playsinline>
                <source src="<?=sprintf("%s/img/jump1.mp4", get_stylesheet_directory_uri()) ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    </<?=$tag?>>
    <div class="notes-area">
        <p class="sidenote step--1 bold">Some notes 2022</p>
    </div>
</section>