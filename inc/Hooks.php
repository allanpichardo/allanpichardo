<?php

namespace Portfolio;

use WPackio\Enqueue;

class Hooks {

	private Enqueue $enqueue;

	public function __construct(Enqueue $enqueue) {
		$this->enqueue = $enqueue;

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
	}

	public function enqueueScripts() {
		$this->enqueue->enqueue( 'app', 'main', [] );
	}
}