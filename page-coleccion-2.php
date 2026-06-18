<?php get_header(); ?>

<!-- HERO COLECCION 2 -->
<section class="hero coleccion-2">
  <div class="hero-overlay">
    <h1>NEON COLLECTIVE</h1>
    <p>Electric graphics.</p>
  </div>
</section>

<!-- PRODUCTOS -->
<section class="section patron">

  <div class="collection-header">
    <h1>Neon Collective</h1>
    <p>Selected pieces from the neon collective drop.</p>
  </div>

  <div class="product-grid">

    <!-- PRODUCTO -->
    <div class="product-card">
      <div class="shopify-product" data-product-id="15516586639692"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15516585656652"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15516584935756"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15516584051020"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15516583985484"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15516578611532"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15484106572108"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15484106146124"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15484105556300"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15481910853964"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15481908298060"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15481889227084"></div>
    </div>

  </div>

</section>

<script>
  const shopifyConfig = {
    domain: '00v4cj-q4.myshopify.com',
    storefrontAccessToken: 'c5acca99a0dcb58092a6085116d2085b'
  };

  (function() {
    const scriptURL =
      'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

    if (window.ShopifyBuy) {
      if (window.ShopifyBuy.UI) {
        ShopifyBuyInit();
      } else {
        loadScript();
      }
    } else {
      loadScript();
    }

    function loadScript() {
      const script = document.createElement('script');

      script.async = true;
      script.src = scriptURL;

      (document.head || document.body).appendChild(script);

      script.onload = ShopifyBuyInit;
    }

    function ShopifyBuyInit() {
      const client = ShopifyBuy.buildClient({
        domain: shopifyConfig.domain,
        storefrontAccessToken: shopifyConfig.storefrontAccessToken,
      });

      ShopifyBuy.UI.onReady(client).then(function(ui) {
        document.querySelectorAll('.shopify-product').forEach((productNode) => {
          const productId = productNode.dataset.productId;

          if (!productId || productId === 'AQUI_TU_ID_DE_SHOPIFY') {
            return;
          }

          ui.createComponent('product', {
            id: productId,
            node: productNode,
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
                  description: false
                },

                text: {
                  button: 'Add to Cart'
                },

                styles: {
                  product: {
                    "background-color": "transparent",
                    "padding": "0",
                    "border": "none",
                    "box-shadow": "none"
                  },

                  title: {
                    "font-family": "Inter, sans-serif",
                    "font-size": "12px",
                    "letter-spacing": "2.5px",
                    "text-transform": "uppercase",
                    "font-weight": "500",
                    "color": "#ffffff"
                  },

                  price: {
                    "font-family": "Inter, sans-serif",
                    "font-size": "12px",
                    "letter-spacing": "1px",
                    "color": "rgba(255,255,255,0.42)"
                  },

                  button: {
                    "font-family": "Inter, sans-serif",
                    "background-color": "transparent",
                    "color": "#ffffff",
                    "border": "1px solid rgba(255,255,255,0.12)",
                    "padding": "15px 24px",
                    "font-size": "10px",
                    "letter-spacing": "3px",
                    "text-transform": "uppercase",
                    "font-weight": "600",
                    "border-radius": "0px",
                    ":hover": {
                      "background-color": "#ffffff",
                      "color": "#000000"
                    }
                  }
                }
              },

              option: {
                styles: {
                  label: {
                    "font-family": "Inter, sans-serif",
                    "font-size": "10px",
                    "font-weight": "600",
                    "letter-spacing": "3px",
                    "text-transform": "uppercase",
                    "color": "rgba(255,255,255,0.38)"
                  },

                  select: {
                    "background-color": "rgba(255,255,255,0.03)",
                    "border": "1px solid rgba(255,255,255,0.10)",
                    "color": "#ffffff",
                    "padding": "16px",
                    "font-family": "Inter, sans-serif",
                    "font-size": "12px",
                    "border-radius": "0px"
                  }
                }
              },

              cart: {
                popup: false,

                text: {
                  total: 'Subtotal',
                  button: 'Checkout'
                },

                styles: {
                  cart: {
                    "background-color": "#050505",
                    "color": "#ffffff"
                  },

                  footer: {
                    "background-color": "#050505",
                    "border-top": "1px solid rgba(255,255,255,0.08)"
                  },

                  title: {
                    "font-family": "Inter, sans-serif",
                    "letter-spacing": "4px",
                    "text-transform": "uppercase",
                    "color": "#ffffff"
                  },

                  button: {
                    "background-color": "transparent",
                    "border": "1px solid rgba(255,255,255,0.18)",
                    "color": "#ffffff",
                    "font-family": "Inter, sans-serif",
                    "font-size": "10px",
                    "font-weight": "600",
                    "letter-spacing": "4px",
                    "text-transform": "uppercase",
                    "border-radius": "0px",
                    ":hover": {
                      "background-color": "#ffffff",
                      "color": "#000000"
                    }
                  },

                  notice: {
                    "color": "rgba(255,255,255,0.55)"
                  },

                  subtotalText: {
                    "color": "#ffffff"
                  },

                  subtotal: {
                    "color": "#ffffff"
                  }
                }
              },

              toggle: {
                styles: {
                  toggle: {
                    "background-color": "rgba(0,0,0,0.85)",
                    "backdrop-filter": "blur(10px)",
                    "border-left": "1px solid rgba(255,255,255,0.1)"
                  },

                  count: {
                    "color": "#ffffff"
                  },

                  iconPath: {
                    "fill": "#ffffff"
                  }
                }
              }
            }
          });
        });
      });
    }
  })();
</script>

<?php get_footer(); ?>