<?php
$useWordpressQuery = get_sub_field( 'use_wordpress_query' ) || false;
$cards = get_sub_field('cards') ?: [];
?>
<section class="work-grid page-padding">
    <?php if($useWordpressQuery) : ?>
        <?php
	    $args = [
		    'post_type' => 'post',
		    'posts_per_page' => -1,
		    'orderby' => 'menu_order',
		    'order' => 'ASC'
	    ];
	    $query = new WP_Query($args);
        $works = $query->get_posts();
        ?>
	    <?php foreach($works as $work): ?>
		    <?php get_template_part('template-parts/work-card', null, [
                'title' => $work->post_title,
                'media_type' => get_field('media_type', $work->ID),
                'image' => get_field('image', $work->ID),
                'video' => get_field('video', $work->ID),
                'link' => [
                    'url' => get_permalink($work->ID),
                    'target' => '_self'
                ]
            ]); ?>
	    <?php endforeach; ?>
    <?php else: ?>
        <?php foreach($cards as $card): ?>
            <?php get_template_part('template-parts/work-card', null, $card); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>