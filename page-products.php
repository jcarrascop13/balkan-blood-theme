<?php
/**
 * Página: Todos los productos.
 *
 * El tema original repetía el mismo producto único en las 3 secciones
 * de esta página (un error de copiar/pegar). Ahora reutiliza el mismo
 * catálogo centralizado que las páginas de colección, así que siempre
 * está sincronizado.
 */
get_header();

$catalog = balkanblood_get_catalog();

balkanblood_hero( 'ALL DROPS', 'All available pieces.', 'products' );
?>

<main id="main-content" class="section patron">

	<?php
	balkanblood_collection_header( $catalog['embroidery']['title'] . ' Collection', $catalog['embroidery']['subtitle'] );
	balkanblood_product_grid( $catalog['embroidery']['ids'], 3 );
	?>

	<?php
	balkanblood_collection_header( $catalog['neon']['title'] . ' Collection', $catalog['neon']['subtitle'] );
	balkanblood_product_grid( $catalog['neon']['ids'], 3 );
	?>

	<?php
	balkanblood_collection_header( 'All Drops', 'All available pieces from Balkan Blood.' );
	balkanblood_product_grid(
		array_unique( array_merge( $catalog['embroidery']['ids'], $catalog['neon']['ids'] ) ),
		3
	);
	?>

</main>

<?php get_footer(); ?>
