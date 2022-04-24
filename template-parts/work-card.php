<?php
$media_type = 'video';
?>
<article class="work-card lazy">
    <a href="#">
        <div class="overlay"></div>
        <?php if($media_type === 'image') : ?>
            <img class="thumbnail" data-src="https://placekitten.com/800/600" alt="Title goes here">
        <?php elseif($media_type === 'video') : ?>
            <video class="thumbnail" muted loop playsinline>
                <source data-src="<?=sprintf("%s/img/jump1.mp4", get_stylesheet_directory_uri()) ?>" type="video/mp4">
            </video>
        <?php endif; ?>
        <h3 class="title heading step-1">Follow the Drinking Gourd</h3>
    </a>
</article>