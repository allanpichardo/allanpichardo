<?php
$title = get_sub_field('title');
$columns = get_sub_field('columns');
?>
<section class="multi-column-text page-padding">
	<h2 class="title heading step-2"><?=$title?></h2>
	<div class="content-section">
        <?php if(!empty($columns)): ?>
            <?php foreach($columns as $column): ?>
                <?php
                $subtitle = $column['subtitle'] ?: null;
                $body = $column['body'];
                ?>
                <div class="column">
                    <?php if(!empty($subtitle)): ?>
                        <h3 class="subtitle"><?=$subtitle?></h3>
                    <?php endif; ?>
                    <?=$body?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
