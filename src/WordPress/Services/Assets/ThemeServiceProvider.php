<?php declare(strict_types = 1);

namespace MyApp\WordPress\Services\Assets;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ThemeServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

	/**
	 * {@inheritDoc}
	 */
	protected $provides = [];

	/**
	 * {@inheritDoc}
	 */
	public function boot(): void {
		add_action( 'wp_enqueue_scripts', [static::class, 'enqueue'] );
	}

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		// Register your dependencies here.
	}

	public static function enqueue(): void {
		$handle = MY_APP_SLUG . '-theme';

		wp_enqueue_script(
			$handle,
			plugin_dir_url( MY_APP_FILE ) . 'dist/theme.js',
			['jquery', 'wp-i18n'],
			filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/theme.js' ),
			true,
		);

		wp_enqueue_style(
			$handle,
			plugin_dir_url( MY_APP_FILE ) . 'dist/styles/theme.css',
			[],
			filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/styles/theme.css' ),
		);

		if ( ! function_exists( 'wp_set_script_translations' ) ) {
			return;
		}

		/**
		 * The `.json` file must be on following format: domain-locale-handler.json
		 * You can generate this file with `po2json`
		 */
		wp_set_script_translations(
			$handle,
			MY_APP_SLUG,
			plugin_dir_path( MY_APP_FILE ) . '/languages',
		);
	}

}
