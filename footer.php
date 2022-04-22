<?php
use Portfolio\AriaNavWalker;

?>
    </main>
	<footer class="footer">
		<nav class="footer-nav page-padding" aria-label="Footer Navigation">
            <a class="home-link heading step--1" href="<?php echo get_home_url() ?>">Allan Pichardo</a>
			<?php wp_nav_menu([
				'theme_location' => 'footer-menu',
				'container' => false,
				'menu_class' => 'link-list heading step--2',
				'items_wrap' => '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>',
				'walker' => new AriaNavWalker()
			]); ?>
        </nav>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>