<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content"><?php esc_html_e( 'Saltar al contenido', 'balkanblood' ); ?></a>

<header class="navbar">
	<div class="nav-container">

		<div class="brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>

		<button
			type="button"
			class="nav-toggle"
			id="navToggle"
			aria-expanded="false"
			aria-controls="primaryMenu"
			aria-label="<?php esc_attr_e( 'Abrir menú', 'balkanblood' ); ?>"
		>
			<span class="nav-toggle-bar"></span>
			<span class="nav-toggle-bar"></span>
			<span class="nav-toggle-bar"></span>
		</button>

		<nav class="nav-menu" id="primaryMenu" aria-label="<?php esc_attr_e( 'Menú principal', 'balkanblood' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-principal',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

	</div>
</header>
