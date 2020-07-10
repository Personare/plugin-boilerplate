<?php declare(strict_types = 1);

namespace MyApp\WordPress\Labels;

trait PostType {

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
			'add_new' => _n( 'Adicionar nova', 'Adicionar novo', $number, 'my-app' ),
			/* translators: %s label singular female lower; %s label singular male lower; */
			'new_item' => sprintf( _n( 'Nova %s', 'Novo %s', $number, 'my-app' ), $singular_lower ),
			/* translators: %s label plural lower. */
			'view_items' => sprintf( __( 'Ver %s', 'my-app' ), $plural_lower ),
			'not_found_in_trash' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Nenhuma %s encontrada na Lixeira.', 'Nenhum %s encontrado na Lixeira.', $number, 'my-app' ),
				$singular_lower,
			),
			/* translators: %s label plural lower. */
			'archives' => sprintf( __( 'Arquivos de %s', 'my-app' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'attributes' => sprintf( __( 'Atributos de %s', 'my-app' ), $plural_lower ),
			'insert_into_item' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Inserir na %s', 'Inserir no %s', $number, 'my-app' ),
				$singular_lower,
			),
			'uploaded_to_this_item' => sprintf(
				/* translators: %s label singular lower. */
				_n( 'Carregado para esta %s', 'Carregado para este %s', $number, 'my-app' ),
				$singular_lower,
			),
			'featured_image' => __( 'Imagem destacada', 'my-app' ),
			'set_featured_image' => __( 'Definir imagem destacada', 'my-app' ),
			'remove_featured_image' => __( 'Remover imagem destacada', 'my-app' ),
			'use_featured_image' => __( 'Usar como imagem destacada', 'my-app' ),
			/* translators: %s label plural lower. */
			'filter_items_list' => sprintf( __( 'Filtrar lista de %s', 'my-app' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'items_list_navigation' => sprintf( __( 'Navegação da lista de %s', 'my-app' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'items_list' => sprintf( __( 'Lista de %s', 'my-app' ), $plural_lower ),
			'name_admin_bar' => $singular,
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
