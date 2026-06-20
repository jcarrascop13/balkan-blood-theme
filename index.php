<?php get_header(); ?>

<main id="main-content" class="site-main section patron">
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	<?php else : ?>
		<p><?php esc_html_e( 'No se encontró contenido.', 'balkanblood' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
