<?php

namespace Portfolio;

use WPackio\Enqueue;

class Theme
{
	const THEME_NAME = 'portfolio';

	private Hooks $hooks;

    public function __construct(string $version)
    {
        $enqueue = new Enqueue(
            self::THEME_NAME,
            'dist',
            $version,
            'theme'
        );

		$this->hooks = new Hooks($enqueue);

	    add_theme_support( 'post-thumbnails' );
    }


}