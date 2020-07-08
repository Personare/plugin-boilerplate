<?php declare(strict_types = 1);

namespace MyApp\WordPress\Labels;

trait Common {

	/** @return array<string> */
	protected static function get_defaults(
		string $singular,
		string $singular_lower,
		string $plural,
		string $plural_lower,
		int $is_female = 0
	): array {
		return [
			'name' => $plural,
			'singular_name' => $singular,
			'menu_name' => $plural,
			/* translators: %s label plural lower. */
			'all_items' => sprintf( _n( 'Todas %s', 'Todos %s', $is_female, 'my-app' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'edit_item' => sprintf( __( 'Editar %s', 'my-app' ), $singular_lower ),
			/* translators: %s label singular lower. */
			'view_item' => sprintf( __( 'Ver %s', 'my-app' ), $singular_lower ),
			'add_new_item' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Adicionar nova %s', 'Adicionar novo %s', $is_female, 'my-app' ),
				$singular_lower,
			),
			/* translators: %s label singular. */
			'parent_item_colon' => sprintf( __( '%s pai:', 'my-app' ), $singular ),
			/* translators: %s label plural lower. */
			'search_items' => sprintf( __( 'Buscar %s', 'my-app' ), $plural_lower ),
			'not_found' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Nenhuma %s encontrada.', 'Nenhum %s encontrado.', $is_female, 'my-app' ),
				$singular_lower,
			),
		];
	}

}
