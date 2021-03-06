<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php use Portfolio\AriaNavWalker;

		wp_title('–', true, 'right'); bloginfo('name'); ?>
	</title>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<nav class="navigation" aria-label="main-navigation" <? body_class() ?>>
            <div class="navbar page-padding">
                <a class="home-link heading step--1" href="<?php echo get_home_url(); ?>"><?php bloginfo('name') ?></a>
                <button class="nav-toggle" aria-label="Toggle navigation" aria-haspopup="true" aria-expanded="false" aria-controls="nav-drawer">
                    <span class="nav-toggle-text" aria-hidden="true">Menu</span>
                    <span class="nav-toggle-icon">
                        <span class="nav-toggle-bar"></span>
                        <span class="nav-toggle-bar"></span>
                        <span class="nav-toggle-bar"></span>
                    </span>
                </button>
            </div>
            <div id="nav-drawer" class="nav-drawer page-padding" aria-hidden="true">
                <?php wp_nav_menu([
                        'theme_location' => 'navigation-menu',
                        'container' => false,
                        'menu_class' => 'nav-list heading step-5',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>',
                        'walker' => new AriaNavWalker()
                ]); ?>
                <?php wp_nav_menu([
                        'theme_location' => 'social-menu',
                        'container' => false,
                        'menu_class' => 'social-list heading step--2',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>',
                        'walker' => new AriaNavWalker()
                ]); ?>
            </div>
        </nav>
	</header>
	<main>
