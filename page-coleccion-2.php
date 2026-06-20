<?php
/**
 * Página: Colección — Neon Collective.
 */
get_header();

$catalog    = balkanblood_get_catalog();
$collection = $catalog['neon'];

balkanblood_hero( 'NEON COLLECTIVE', 'Electric graphics.', 'coleccion-2' );
?>

<main id="main-content" class="section patron">

	<?php
	balkanblood_collection_header( $collection['title'], $collection['subtitle'] );
	balkanblood_product_grid( $collection['ids'], 3 );
	?>

</main>

<?php get_footer(); ?>
