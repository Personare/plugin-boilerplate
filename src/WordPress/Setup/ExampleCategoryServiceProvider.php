<?php declare(strict_types = 1);

namespace MyApp\WordPress\Setup;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use MyApp\WordPress\Labels\Taxonomy;

class ExampleCategoryServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

    use Taxonomy;

    /**
     * {@inheritDoc}
     */
    protected $provides = [];

    /**
     * {@inheritDoc}
     */
    public function boot(): void {
        add_action( 'init', [ $this, 'register_taxonomy' ] );
    }

    /**
     * {@inheritDoc}
     */
    public function register(): void {
        // Register your dependencies here.
    }

    public function register_taxonomy(): void {
        register_taxonomy(
            'example-category',
            [ 'example' ],
            [
                'hierarchical'      => true,
                'labels'            => $this->get_labels(
                    __( 'Categoria', 'my-app' ),
                    __( 'Categorias', 'my-app' ),
                    true,
                ),
                'show_admin_column' => true,
                'show_ui'           => true,
            ],
        );
    }

}
