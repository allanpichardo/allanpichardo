<?php
$title = 'A Clever Title';
$media_type = 'video';
$youtube_url = 'https://www.youtube-nocookie.com/embed/AgljUimWrAw';
$youtube_url .= '?rel=0&amp;autoplay=1&amp;controls=1&amp;showinfo=0&amp;playsinline=1';
?>
<section class="hero page-padding">
    <div class="title-area">
        <h1 class="heading step-4"><?= $title ?></h1>
    </div>
    <div class="media-container">
        <?php if ($media_type === 'image') : ?>
            <img src="https://placekitten.com/800/600" alt="Hero Image">
        <?php elseif ($media_type === 'video') : ?>
            <iframe width="560" height="315" src="<?= $youtube_url ?>" title="<?= $title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endif; ?>
    </div>
    <div class="notes-area">
        <p class="sidenote step--1 bold">Some notes 2022</p>
    </div>
</section>