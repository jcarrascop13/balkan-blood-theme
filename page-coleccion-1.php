<?php
/**
 * Página: Colección — Embroidery.
 */
get_header();

$catalog    = balkanblood_get_catalog();
$collection = $catalog['embroidery'];

balkanblood_hero( 'EMBROIDERY COLLECTION', 'Dark minimalism.', 'coleccion-1' );
?>

<main id="main-content" class="section patron">

	<?php
	balkanblood_collection_header( $collection['title'], $collection['subtitle'] );
	balkanblood_product_grid( $collection['ids'], 3 );
	?>

</main>

<?php get_footer(); ?>
