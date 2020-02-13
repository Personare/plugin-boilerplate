<?php declare(strict_types = 1);

namespace App\Providers\Example;

use App\Entities\Example as Entity;
use WPSteak\Providers\AbstractPostType;
use WPSteak\Services\Labels;

class PostType extends AbstractPostType {

	use Labels\PostType;

	/**
	 * {@inheritDoc}
	 */
	public function get_args(): array {
		return [
			'labels'       => $this->get_labels(
				__( 'Exemplo', 'app' ),
				__( 'Exemplos', 'app' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-smiley',
			'supports'     => [ 'title', 'custom-fields' ],
		];
	}

	public function get_post_type(): string {
		return Entity::POST_TYPE;
	}

}
