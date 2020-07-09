<?php declare(strict_types = 1);

namespace MyApp\WordPress\Setup\Assets;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class LoginServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

	/**
	 * {@inheritDoc}
	 */
	protected $provides = [];

	/**
	 * {@inheritDoc}
	 */
	public function boot(): void {
		add_action( 'login_enqueue_scripts', [static::class, 'enqueue'] );
	}

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		// Register your dependencies here.
	}

	public static function enqueue(): void {
		$handle = MY_APP_SLUG . '-login';

		wp_enqueue_script(
			$handle,
			plugin_dir_url( MY_APP_FILE ) . 'dist/login.js',
			['jquery'],
			filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/login.js' ),
			true,
		);

		wp_enqueue_style(
			$handle,
			plugin_dir_url( MY_APP_FILE ) . 'dist/styles/login.css',
			[],
			filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/styles/login.css' ),
		);
	}

}
