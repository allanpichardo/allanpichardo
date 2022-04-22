<?php

namespace Portfolio;

use WPackio\Enqueue;

class Hooks {

	private Enqueue $enqueue;

	public function __construct(Enqueue $enqueue) {
		$this->enqueue = $enqueue;

		// scripts
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );

		// post labels
		add_action('init', [ $this, 'changePostObjectLabelsToWork']);
		add_action('admin_menu', [ $this, 'changePostLabelToWork']);

		// disable gutenberg
		add_filter('use_block_editor_for_post_type', [ $this, 'disableGutenberg' ], 10, 2);

		// menu locations
		add_action('init', [ $this, 'registerMenuLocations' ]);
	}

	public function enqueueScripts() {
		$this->enqueue->enqueue( 'app', 'main', [] );
	}

	public function changePostLabelToWork() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Work';
		$submenu['edit.php'][5][0] = 'Work';
		$submenu['edit.php'][10][0] = 'Add Work';
		$submenu['edit.php'][16][0] = 'Work Tags';
	}

	public function changePostObjectLabelsToWork() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Work';
		$labels->singular_name = 'Work';
		$labels->add_new = 'Add Work';
		$labels->add_new_item = 'Add Work';
		$labels->edit_item = 'Edit Work';
		$labels->new_item = 'Work';
		$labels->view_item = 'View Work';
		$labels->search_items = 'Search Work';
		$labels->not_found = 'No Work found';
		$labels->not_found_in_trash = 'No Work found in Trash';
		$labels->all_items = 'All Work';
		$labels->menu_name = 'Work';
		$labels->name_admin_bar = 'Work';
	}

	public function disableGutenberg($current_status, $post_type) {
		return false;
	}

	public function registerMenuLocations() {
		register_nav_menus([
			'navigation-menu' => __('Navigation Menu'),
			'social-menu' => __('Social Menu'),
			'footer-menu' => __('Footer Menu'),
		]);
	}
}