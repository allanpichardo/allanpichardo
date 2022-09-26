<?php

namespace Portfolio;

use WPackio\Enqueue;

class Theme
{
	const THEME_NAME = 'portfolio';

	private Hooks $hooks;

    public function __construct(string $version = '1.0.0')
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

	public static function getImageSrcset(string $image, string $alt = '', string $size = 'medium')
	{
		$image_alt = !empty($alt) ? $alt : get_post_meta($image, '_wp_attachment_image_alt', TRUE);
		$img_src = wp_get_attachment_image_url( $image, $size );
		$img_srcset = wp_get_attachment_image_srcset( $image, $size );

		return sprintf('<img src="%s" srcset="%s" sizes="(max-width: 50em) 87vw, 680px" alt="%s">',
				esc_attr($img_src), esc_attr($img_srcset), esc_attr($image_alt)
		);
	}

	public static function getVideoTag(string $video, string $class = '', $autoplay = false)
	{
		$video_url = wp_get_attachment_url($video);
		$video_mime = wp_check_filetype($video_url, wp_get_mime_types());

		return sprintf('<video class="%s" %s muted loop playsinline>
				<source src="%s" type="%s">
			</video>',
			$class,
			$autoplay ? 'autoplay' : '',
			$video_url,
			$video_mime['type']
		);
	}
}