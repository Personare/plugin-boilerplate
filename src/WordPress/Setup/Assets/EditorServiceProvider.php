<?php declare(strict_types = 1);

namespace MyApp\WordPress\Setup\Assets;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class EditorServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

    /**
     * {@inheritDoc}
     */
    protected $provides = [];

    /**
     * {@inheritDoc}
     */
    public function boot(): void {
        add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue' ] );
    }

    /**
     * {@inheritDoc}
     */
    public function register(): void {
        // Register your dependencies here.
    }

    public function enqueue(): void {
        $handle = MY_APP_SLUG . '-editor';

        wp_enqueue_script(
            $handle,
            plugin_dir_url( MY_APP_FILE ) . 'dist/editor.js',
            [ 'jquery', 'wp-i18n' ],
            filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/editor.js' ),
            true,
        );

        wp_enqueue_style(
            $handle,
            plugin_dir_url( MY_APP_FILE ) . 'dist/styles/editor.css',
            [],
            filemtime( plugin_dir_path( MY_APP_FILE ) . 'dist/styles/editor.css' ),
        );
    }

}
