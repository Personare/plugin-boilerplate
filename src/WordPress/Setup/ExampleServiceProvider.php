<?php declare(strict_types = 1);

namespace MyApp\WordPress\Setup;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use MyApp\WordPress\Labels\PostType;

class ExampleServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

	use PostType;

	/**
	 * {@inheritDoc}
	 */
	protected $provides = [];

	/**
	 * {@inheritDoc}
	 */
	public function boot(): void {
		add_action( 'init', [$this, 'register_post_type'] );
	}

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		// Register your dependencies here.
	}

	public function register_post_type(): void {
		register_post_type(
			'example',
			[
				'labels' => $this->get_labels( __( 'Examplo', 'my-app' ), __( 'Exemplos', 'my-app' ) ),
				'public' => true,
				'menu_icon' => 'dashicons-smiley',
				'supports' => [ 'title', 'editor', 'thumbnail' ],
			],
		);
	}

}
