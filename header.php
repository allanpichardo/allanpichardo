<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php wp_title('–', true, 'right'); ?>
	</title>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<nav class="navigation" aria-label="main-navigation">
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
                <ul class="nav-list heading step-5" role="menu">
                    <li role="none"><a role="menuitem" href="<?php echo get_home_url(); ?>">Home</a></li>
                    <li role="none"><a role="menuitem" href="<?php echo get_home_url(); ?>/about">About</a></li>
                    <li role="none"><a role="menuitem" href="<?php echo get_home_url(); ?>/contact">Contact</a></li>
                </ul>
                <ul class="social-list heading step--2" role="menu">
                    <li role="none"><a role="menuitem" href="https://twitter.com/">Twitter</a></li>
                    <li role="none"><a role="menuitem" href="https://www.instagram.com/">Instagram</a></li>
                    <li role="none"><a role="menuitem" href="https://www.instagram.com/">Linkedin</a></li>
                </ul>
            </div>
        </nav>
	</header>
	<main>
