<?php declare(strict_types = 1);

namespace MyApp\Loggers;

use Psr\Log\AbstractLogger;

class WordPress extends AbstractLogger {

    /**
     * {@inheritDoc}
     */
    public function log( $level, $message, array $context = array() ) {
        /* @phan-suppress-next-line PhanUndeclaredConstant */
        if ( ! ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ) {
            return;
        }

        /* phpcs:ignore WordPress.PHP.DevelopmentFunctions */
        error_log( strtoupper( $level ) . ': ' . $message . ' ' . ( ! $context ? print_r( $context, true ) : '' ) );
    }

}

