<?php
/**
 * Funciones de plantilla reutilizables.
 *
 * Antes cada page-*.php repetía el mismo HTML del hero, del encabezado
 * de colección y del grid de productos (con pequeñas variaciones).
 * Estas funciones centralizan ese marcado: si el día de mañana hay que
 * cambiar el diseño del hero, se cambia una sola vez aquí.
 */

if ( ! function_exists( 'balkanblood_hero' ) ) {

	/**
	 * Imprime la sección hero (pantalla completa) de una página.
	 *
	 * @param string $title    Título grande (se muestra en mayúsculas vía CSS).
	 * @param string $subtitle Texto bajo el título.
	 * @param string $modifier Clase modificadora opcional (coleccion-1, novedades...).
	 */
	function balkanblood_hero( $title, $subtitle = '', $modifier = '' ) {
		$classes = 'hero';

		if ( $modifier ) {
			$classes .= ' ' . sanitize_html_class( $modifier );
		}
		?>
		<section class="<?php echo esc_attr( $classes ); ?>">
			<div class="hero-overlay">
				<h1><?php echo esc_html( $title ); ?></h1>
				<?php if ( $subtitle ) : ?>
					<p><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}

if ( ! function_exists( 'balkanblood_collection_header' ) ) {

	/**
	 * Imprime el encabezado centrado de una sección de colección.
	 */
	function balkanblood_collection_header( $title, $subtitle = '' ) {
		?>
		<div class="collection-header">
			<h1><?php echo esc_html( $title ); ?></h1>
			<?php if ( $subtitle ) : ?>
				<p><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'balkanblood_product_grid' ) ) {

	/**
	 * Imprime un grid de productos de Shopify.
	 *
	 * @param array $product_ids IDs numéricos de producto en Shopify.
	 * @param int   $columns     Columnas en escritorio (2, 3 o 4). El grid
	 *                           se vuelve responsive automáticamente.
	 */
	function balkanblood_product_grid( $product_ids, $columns = 4 ) {
		$product_ids = array_filter(
			array_map( 'absint', (array) $product_ids )
		);

		if ( empty( $product_ids ) ) {
			?>
			<p class="empty-state">
				<?php esc_html_e( 'New products coming soon. Check back soon.', 'balkanblood' ); ?>
			</p>
			<?php
			return;
		}

		$grid_class = 'product-grid';

		if ( in_array( (int) $columns, array( 2, 3 ), true ) ) {
			$grid_class .= ' product-grid--cols-' . (int) $columns;
		}
		?>
		<div class="<?php echo esc_attr( $grid_class ); ?>">
			<?php foreach ( $product_ids as $product_id ) : ?>
				<article class="product-card">
					<div class="shopify-product" data-product-id="<?php echo esc_attr( $product_id ); ?>"></div>
				</article>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'balkanblood_collection_banner' ) ) {

	/**
	 * Imprime una sección tipo banner con call-to-action (usada en Inicio).
	 */
	function balkanblood_collection_banner( $label, $title, $url, $cta_text, $modifier ) {
		?>
		<section class="collection-section <?php echo esc_attr( sanitize_html_class( $modifier ) ); ?>">
			<div class="collection-content">
				<span class="section-label"><?php echo esc_html( $label ); ?></span>
				<h2><?php echo esc_html( $title ); ?></h2>
				<a href="<?php echo esc_url( $url ); ?>" class="btn-outline">
					<?php echo esc_html( $cta_text ); ?>
				</a>
			</div>
		</section>
		<?php
	}
}
