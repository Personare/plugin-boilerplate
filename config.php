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
		MyApp\WordPress\Services\Assets\AdminServiceProvider::class,
		MyApp\WordPress\Services\Assets\EditorServiceProvider::class,
		MyApp\WordPress\Services\Assets\LoginServiceProvider::class,
		MyApp\WordPress\Services\Assets\ThemeServiceProvider::class,
		MyApp\WordPress\Services\ExampleCategoryServiceProvider::class,
		MyApp\WordPress\Services\ExampleServiceProvider::class,
		MyApp\WordPress\Services\I18nServiceProvider::class,
	],
];
