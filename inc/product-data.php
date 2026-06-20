<?php
/**
 * Catálogo de productos (Shopify Buy Button).
 *
 * Fuente única de verdad para los IDs de producto de cada colección.
 * Antes estos IDs estaban copiados y pegados en 4 plantillas distintas
 * (page-products.php, page-coleccion-1.php, page-coleccion-2.php,
 * page-novedades.php), lo que provocaba errores al actualizar uno y
 * olvidar los demás. Ahora se edita SOLO aquí.
 *
 * Para añadir o quitar un producto: copia su ID numérico desde el
 * panel de Shopify y agrégalo (o bórralo) del array 'ids' correspondiente.
 */

if ( ! function_exists( 'balkanblood_get_catalog' ) ) {

	function balkanblood_get_catalog() {
		static $catalog = null;

		if ( null !== $catalog ) {
			return $catalog;
		}

		$catalog = array(

			'bestsellers' => array(
				'ids' => array(
					15645356163404,
					15692409864524,
				),
			),

			'embroidery' => array(
				'title'    => 'Embroidery',
				'subtitle' => 'Selected pieces from the embroidery drop.',
				'ids'      => array(
					15692409864524,
					15692278530380,
					15692276040012,
					15645410296140,
					15645398303052,
					15645356163404,
					15621858885964,
					15458529640780,
					15439659139404,
					15144812970316,
					15138447589708,
					15138442477900,
				),
			),

			'neon' => array(
				'title'    => 'Neon Collective',
				'subtitle' => 'Selected pieces from the neon collective drop.',
				'ids'      => array(
					15516586639692,
					15516585656652,
					15516584935756,
					15516584051020,
					15516583985484,
					15516578611532,
					15484106572108,
					15484106146124,
				),
			),

			// Sin IDs todavía: la sección se oculta automáticamente y
			// se muestra un aviso de "próximamente" en su lugar.
			'novedades' => array(
				'title'    => 'New Drops',
				'subtitle' => 'Recently released pieces from Balkan Blood.',
				'ids'      => array(),
			),

		);

		return $catalog;
	}
}
