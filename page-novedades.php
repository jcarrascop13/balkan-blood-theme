<?php
/**
 * Página: Novedades.
 */
get_header();

$catalog    = balkanblood_get_catalog();
$collection = $catalog['novedades'];

balkanblood_hero( 'NEW DROPS', 'The latest available pieces.', 'novedades' );
?>

<main id="main-content" class="section patron">

	<?php
	balkanblood_collection_header( $collection['title'], $collection['subtitle'] );
	balkanblood_product_grid( $collection['ids'], 3 );
	?>

</main>

<?php get_footer(); ?>
