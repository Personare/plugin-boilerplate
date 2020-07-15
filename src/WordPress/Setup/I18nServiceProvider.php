<?php declare(strict_types = 1);

namespace MyApp\WordPress\Setup;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class I18nServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

    /**
     * {@inheritDoc}
     */
    protected $provides = [];

    /**
     * {@inheritDoc}
     */
    public function boot(): void {
        add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );
    }

    /**
     * {@inheritDoc}
     */
    public function register(): void {
        // Register your dependencies here.
    }

    public function load_textdomain(): void {
        load_plugin_textdomain(
            MY_APP_SLUG,
            false,
            dirname( plugin_basename( MY_APP_FILE ) ) . '/languages/',
        );
    }

}
