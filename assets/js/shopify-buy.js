/**
 * Integración de Shopify Buy Button.
 *
 * Antes este bloque (con todos sus estilos en línea) estaba copiado y
 * pegado en 4 plantillas PHP distintas (~230 líneas cada una). Ahora
 * vive en un único archivo cacheable por el navegador, y la
 * configuración (dominio / token) llega desde PHP vía
 * wp_localize_script en lugar de estar hardcodeada en cada copia.
 */
( function () {
	'use strict';

	var productNodes = document.querySelectorAll( '.shopify-product' );

	if ( ! productNodes.length ) {
		return;
	}

	var config = window.balkanbloodShopify || {};

	if ( ! config.domain || ! config.storefrontAccessToken ) {
		return;
	}

	var SCRIPT_URL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

	var SHARED_FONT = 'Inter, Helvetica Neue, sans-serif';

	function loadSdk( callback ) {
		if ( window.ShopifyBuy && window.ShopifyBuy.UI ) {
			callback();
			return;
		}

		var script = document.createElement( 'script' );
		script.async = true;
		script.src = SCRIPT_URL;
		script.onload = callback;

		( document.head || document.body ).appendChild( script );
	}

	function initBuyButtons() {
		var client = window.ShopifyBuy.buildClient( {
			domain: config.domain,
			storefrontAccessToken: config.storefrontAccessToken,
		} );

		window.ShopifyBuy.UI.onReady( client ).then( function ( ui ) {
			productNodes.forEach( function ( node ) {
				var productId = node.dataset.productId;

				if ( ! productId ) {
					return;
				}

				ui.createComponent( 'product', {
					id: productId,
					node: node,
					moneyFormat: '%E2%82%AC%7B%7Bamount_with_comma_separator%7D%7D',
					options: {
						product: {
							iframe: false,
							buttonDestination: 'cart',
							contents: {
								img: true,
								title: true,
								price: true,
								options: true,
								quantity: false,
								button: true,
								description: false,
							},
							text: {
								button: 'Add to Cart',
							},
							styles: {
								product: {
									'background-color': 'transparent',
									padding: '0',
									border: 'none',
									'box-shadow': 'none',
								},
								title: {
									'font-family': SHARED_FONT,
									'font-size': '12px',
									'letter-spacing': '2.5px',
									'line-height': '1.6',
									'text-transform': 'uppercase',
									'font-weight': '500',
									color: '#ffffff',
								},
								price: {
									'font-family': SHARED_FONT,
									'font-size': '12px',
									'letter-spacing': '1px',
									color: 'rgba(255,255,255,0.42)',
								},
								button: {
									'font-family': SHARED_FONT,
									'background-color': 'rgba(255,255,255,0.02)',
									color: '#ffffff',
									border: '1px solid rgba(255,255,255,0.12)',
									padding: '0 24px',
									height: '54px',
									'font-size': '10px',
									'letter-spacing': '3px',
									'text-transform': 'uppercase',
									'font-weight': '600',
									'border-radius': '0px',
									':hover': {
										'background-color': '#ffffff',
										color: '#000000',
										border: '1px solid #ffffff',
									},
									':focus': {
										'background-color': '#ffffff',
										color: '#000000',
										border: '1px solid #ffffff',
									},
								},
							},
						},
						option: {
							styles: {
								label: {
									'font-family': SHARED_FONT,
									'font-size': '10px',
									'font-weight': '600',
									'letter-spacing': '3px',
									'text-transform': 'uppercase',
									color: 'rgba(255,255,255,0.38)',
								},
								select: {
									'font-family': SHARED_FONT,
									'font-size': '12px',
									'letter-spacing': '1px',
									'background-color': 'rgba(255,255,255,0.03)',
									color: '#ffffff',
									border: '1px solid rgba(255,255,255,0.1)',
									padding: '0 18px',
									height: '54px',
									'border-radius': '0px',
								},
							},
						},
						cart: {
							popup: false,
							text: {
								title: 'Cart',
								total: 'Subtotal',
								button: 'Checkout',
							},
							styles: {
								cart: {
									'background-color': '#050505',
									color: '#ffffff',
								},
								footer: {
									'background-color': '#050505',
									'border-top': '1px solid rgba(255,255,255,0.08)',
								},
								title: {
									'font-family': SHARED_FONT,
									'letter-spacing': '4px',
									'text-transform': 'uppercase',
									color: '#ffffff',
								},
								button: {
									'background-color': 'transparent',
									border: '1px solid rgba(255,255,255,0.18)',
									color: '#ffffff',
									'font-family': SHARED_FONT,
									'font-size': '10px',
									'font-weight': '600',
									'letter-spacing': '4px',
									'text-transform': 'uppercase',
									'border-radius': '0px',
									':hover': {
										'background-color': '#ffffff',
										color: '#000000',
									},
								},
								notice: {
									color: 'rgba(255,255,255,0.55)',
								},
								subtotalText: {
									color: '#ffffff',
								},
								subtotal: {
									color: '#ffffff',
								},
							},
						},
						toggle: {
							styles: {
								toggle: {
									'background-color': 'rgba(0,0,0,0.78)',
									'backdrop-filter': 'blur(10px)',
									'border-left': '1px solid rgba(255,255,255,0.08)',
								},
								count: {
									'font-family': SHARED_FONT,
									color: '#ffffff',
								},
								iconPath: {
									fill: '#ffffff',
								},
							},
						},
					},
				} );
			} );
		} );
	}

	loadSdk( initBuyButtons );
} )();
