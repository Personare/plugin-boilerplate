<?php declare(strict_types = 1);

/**
 * Personare Plugin Boilerplate
 *
 * @package MyApp
 *
 * Plugin Name: Personare Plugin Boilerplate
 * Description: Descreva seu plugin.
 * Version: 2.0.1
 * Author: Personare
 * Author URI: https://personare.com.br/
 * Text Domain: my-app
 * Domain Path: /languages
 * Requires PHP: 7.3
 */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require __DIR__ . '/vendor/autoload.php';
}

define( 'MY_APP_SLUG', 'my-app' );
define( 'MY_APP_FILE', __FILE__ );

$container = new League\Container\Container();

/* register the reflection container as a delegate to enable auto wiring. */
$container->delegate(
    ( new League\Container\ReflectionContainer() )->cacheResolutions(),
);

$config = ( require __DIR__ . '/config.php' );

foreach ( $config['service_providers'] as $service_provider ) {
    $container->addServiceProvider( $service_provider );
}

