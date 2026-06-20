/**
 * Menú móvil.
 *
 * El tema original ocultaba el menú por completo en pantallas pequeñas
 * (display: none) sin ninguna alternativa para navegar. Este script
 * controla el botón de hamburguesa que lo reemplaza.
 */
( function () {
	'use strict';

	var toggle = document.getElementById( 'navToggle' );
	var menu = document.getElementById( 'primaryMenu' );

	if ( ! toggle || ! menu ) {
		return;
	}

	function closeMenu() {
		menu.classList.remove( 'is-open' );
		toggle.classList.remove( 'is-active' );
		toggle.setAttribute( 'aria-expanded', 'false' );
	}

	function openMenu() {
		menu.classList.add( 'is-open' );
		toggle.classList.add( 'is-active' );
		toggle.setAttribute( 'aria-expanded', 'true' );
	}

	toggle.addEventListener( 'click', function () {
		var isOpen = menu.classList.contains( 'is-open' );
		isOpen ? closeMenu() : openMenu();
	} );

	// Cierra el menú al elegir una opción.
	menu.addEventListener( 'click', function ( event ) {
		if ( event.target.tagName === 'A' ) {
			closeMenu();
		}
	} );

	// Cierra el menú al tocar fuera de él.
	document.addEventListener( 'click', function ( event ) {
		var isClickInside = menu.contains( event.target ) || toggle.contains( event.target );

		if ( ! isClickInside ) {
			closeMenu();
		}
	} );

	// Cierra el menú con la tecla Escape.
	document.addEventListener( 'keydown', function ( event ) {
		if ( event.key === 'Escape' ) {
			closeMenu();
		}
	} );

	// Si la ventana vuelve a tamaño de escritorio, se asegura de
	// que el menú no quede "abierto" colgando en el DOM.
	window.addEventListener( 'resize', function () {
		if ( window.innerWidth > 860 ) {
			closeMenu();
		}
	} );
} )();
