<?php declare(strict_types = 1);

/**
 * Config.
 *
 * Define configurations for this plugin,
 * use it for define your service providers,
 * the classes will be loaded in order as defined.
 *
 * @package MyApp
 */

return [
	'service_providers' => [
		MyApp\WordPress\Setup\Assets\AdminServiceProvider::class,
		MyApp\WordPress\Setup\Assets\EditorServiceProvider::class,
		MyApp\WordPress\Setup\Assets\LoginServiceProvider::class,
		MyApp\WordPress\Setup\Assets\ThemeServiceProvider::class,
		MyApp\WordPress\Setup\ExampleCategoryServiceProvider::class,
		MyApp\WordPress\Setup\ExampleServiceProvider::class,
		MyApp\WordPress\Setup\I18nServiceProvider::class,
	],
];
