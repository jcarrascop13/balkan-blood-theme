<?php
/**
 * Balkan Blood — funciones del tema.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Salir si se accede directamente.
}

define( 'BALKANBLOOD_VERSION', '2.0.0' );

/**
 * ---------------------------------------------------------------------
 * Credenciales de Shopify Buy Button
 * ---------------------------------------------------------------------
 * Antes estaban hardcodeadas en 4 archivos PHP distintos. Para
 * cambiarlas (o conectar otra tienda) ahora solo se edita aquí.
 * El token de Storefront API es público por diseño: Shopify lo expone
 * en el navegador a propósito para que funcione el Buy Button.
 */
define( 'BALKANBLOOD_SHOPIFY_DOMAIN', '00v4cj-q4.myshopify.com' );
define( 'BALKANBLOOD_SHOPIFY_TOKEN', 'c5acca99a0dcb58092a6085116d2085b' );

/**
 * ---------------------------------------------------------------------
 * Imágenes de fondo
 * ---------------------------------------------------------------------
 * Centralizadas aquí para no tener que buscar URLs sueltas dentro del
 * CSS. Se inyectan como variables CSS (--bg-*) y se usan en style.css.
 *
 * ⚠ AVISO: "BALKANBLOOD_BG_PATTERN" apuntaba a una URL "localhost" en
 * el tema original — eso solo funciona en un entorno de desarrollo
 * local y romperá la imagen en producción. Sube esa imagen a la
 * biblioteca de medios del sitio en vivo y reemplaza la URL de abajo.
 */
define( 'BALKANBLOOD_BG_PATTERN', 'http://localhost/balkan-blood/wp-content/uploads/2026/04/patron_fondo.png' );
define( 'BALKANBLOOD_BG_HERO_HOME', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/fondo-1.png' );
define( 'BALKANBLOOD_BG_HERO_COL1', 'https://balkanblood.com/wp-content/uploads/2026/06/dracula.webp' );
define( 'BALKANBLOOD_BG_HERO_COL2', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/lagos7.png' );
define( 'BALKANBLOOD_BG_HERO_NOVEDADES', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/rio.png' );
define( 'BALKANBLOOD_BG_HERO_PRODUCTS', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/hero-1-img.jpeg' );
define( 'BALKANBLOOD_BG_COL1_BANNER', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/emboridery-1.png' );
define( 'BALKANBLOOD_BG_COL2_BANNER', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/neon-2.png' );
define( 'BALKANBLOOD_BG_NOVEDADES_BANNER', 'https://lightyellow-bat-772467.hostingersite.com/wp-content/uploads/2026/06/novedades.png' );

/**
 * Includes.
 */
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/product-data.php';

/**
 * Configuración base del tema.
 */
function balkanblood_setup() {
	load_theme_textdomain( 'balkanblood', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'menu-principal' => __( 'Menú Principal', 'balkanblood' ),
		)
	);
}
add_action( 'after_setup_theme', 'balkanblood_setup' );

/**
 * Hojas de estilo y scripts.
 */
function balkanblood_assets() {
	// Preconectar con Google Fonts antes de pedir la hoja de estilos
	// (reduce la latencia de la primera carga de fuentes).
	wp_enqueue_style(
		'balkanblood-fonts',
		'https://fonts.googleapis.com/css2?family=Aladin&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'balkanblood-style',
		get_stylesheet_uri(),
		array( 'balkanblood-fonts' ),
		BALKANBLOOD_VERSION
	);

	wp_enqueue_style(
		'balkanblood-shopify',
		get_template_directory_uri() . '/assets/css/shopify-buy.css',
		array( 'balkanblood-style' ),
		BALKANBLOOD_VERSION
	);

	// Variables CSS con las URLs de fondo (ver bloque de constantes arriba).
	wp_add_inline_style( 'balkanblood-style', balkanblood_background_vars_css() );

	wp_enqueue_script(
		'balkanblood-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		BALKANBLOOD_VERSION,
		true
	);

	wp_enqueue_script(
		'balkanblood-shopify-buy',
		get_template_directory_uri() . '/assets/js/shopify-buy.js',
		array(),
		BALKANBLOOD_VERSION,
		true
	);

	wp_localize_script(
		'balkanblood-shopify-buy',
		'balkanbloodShopify',
		array(
			'domain'                 => BALKANBLOOD_SHOPIFY_DOMAIN,
			'storefrontAccessToken'  => BALKANBLOOD_SHOPIFY_TOKEN,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'balkanblood_assets' );

/**
 * Genera las variables CSS (--bg-*) a partir de las constantes de imagen.
 */
function balkanblood_background_vars_css() {
	$vars = array(
		'--bg-pattern'           => BALKANBLOOD_BG_PATTERN,
		'--bg-hero-home'         => BALKANBLOOD_BG_HERO_HOME,
		'--bg-hero-col1'         => BALKANBLOOD_BG_HERO_COL1,
		'--bg-hero-col2'         => BALKANBLOOD_BG_HERO_COL2,
		'--bg-hero-novedades'    => BALKANBLOOD_BG_HERO_NOVEDADES,
		'--bg-hero-products'     => BALKANBLOOD_BG_HERO_PRODUCTS,
		'--bg-col1-banner'       => BALKANBLOOD_BG_COL1_BANNER,
		'--bg-col2-banner'       => BALKANBLOOD_BG_COL2_BANNER,
		'--bg-novedades-banner'  => BALKANBLOOD_BG_NOVEDADES_BANNER,
	);

	$css = ':root{';

	foreach ( $vars as $name => $url ) {
		$css .= $name . ':url(' . esc_url( $url ) . ');';
	}

	$css .= '}';

	return $css;
}

/**
 * Preconexión a Google Fonts (acelera la carga de tipografías).
 */
function balkanblood_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'balkanblood_resource_hints', 10, 2 );

/**
 * ---------------------------------------------------------------------
 * Limpieza de rendimiento
 * ---------------------------------------------------------------------
 * Quita peticiones y metadatos que WordPress añade por defecto y que
 * esta web no necesita (emojis embebidos, número de versión expuesto).
 */
function balkanblood_performance_cleanup() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
}
add_action( 'init', 'balkanblood_performance_cleanup' );
