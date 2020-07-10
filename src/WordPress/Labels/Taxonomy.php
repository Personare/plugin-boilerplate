<?php declare(strict_types = 1);

namespace MyApp\WordPress\Labels;

trait Taxonomy {

	use Common;

	/**
	 * @param array<string> $defaults Defaults label.
	 * @return array<string>
	 */
	public function get_labels(
		string $singular,
		string $plural,
		bool $is_female = false,
		array $defaults = []
	): array {
		$singular_lower = strtolower( $singular );
		$plural_lower = strtolower( $plural );
		$number = (int) $is_female;

		$labels = [
			/* translators: %s label singular lower. */
			'update_item' => sprintf( __( 'Atualizar %s', 'my-app' ), $singular_lower ),
			'new_item_name' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Nome da nova %s', 'Nome do novo %s', $number, 'my-app' ),
				$singular_lower,
			),
			/* translators: %s label singular. */
			'parent_item' => sprintf( __( '%s pai', 'my-app' ), $singular ),
			/* translators: %s label singular. */
			'popular_items' => sprintf( __( '%s populares', 'my-app' ), $singular ),
			'separate_items_with_commas' => sprintf(
				/* translators: %s label plural lower. */
				_n( 'Separe as %s com virgulas', 'Separe os %s com virgulas', $number, 'my-app' ),
				$plural_lower,
			),
			/* translators: %s label singular lower. */
			'add_or_remove_items' => sprintf( __( 'Adicionar ou remover %s', 'my-app' ), $singular_lower ),
			'choose_from_most_used' => sprintf(
				/* translators: %s label plural lower. */
				_n( 'Escolher entre as %s mais usadas', 'Escolher entre os %s mais usados', $number, 'my-app' ),
				$plural_lower,
			),
			'back_to_items' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Voltar para as %s', 'Voltar para os %s', $number, 'my-app' ),
				$plural_lower,
			),
		];

		$labels = array_merge(
			$labels,
			$this->get_defaults(
				$singular,
				$singular_lower,
				$plural,
				$plural_lower,
				$is_female,
			),
		);

		return array_merge( $labels, $defaults );
	}

}
