<?php
/**
 * Página de inicio.
 */
get_header();

$catalog = balkanblood_get_catalog();
?>

<main id="main-content" class="site-main">

	<?php balkanblood_hero( 'BALKAN BLOOD', 'Dark streetwear. Limited drops.', 'hero-home' ); ?>

	<!-- PRODUCTOS DESTACADOS -->
	<section class="section featured patron">

		<div class="section-heading">
			<h2>Bestsellers</h2>
		</div>

		<?php balkanblood_product_grid( $catalog['bestsellers']['ids'], 4 ); ?>

		<div class="center-btn">
			<a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="btn-outline">
				Explore All Products
			</a>
		</div>

	</section>

	<?php
	balkanblood_collection_banner(
		'Collection',
		'Embroidery',
		home_url( '/coleccion-1/' ),
		'View full collection',
		'coleccion-1'
	);

	balkanblood_collection_banner(
		'Collection',
		'Neon Collective',
		home_url( '/coleccion-2/' ),
		'View full collection',
		'coleccion-2'
	);

	balkanblood_collection_banner(
		'Latest',
		'New Drops',
		home_url( '/novedades/' ),
		'See more',
		'novedades'
	);
	?>

</main>

<?php get_footer(); ?>
