<?php get_header(); ?>

<!-- HERO COLECCION -->
<section class="hero coleccion-1">
  <div class="hero-overlay">
    <h1>EMBROIDERY COLLECTION</h1>
    <p>Dark minimalism.</p>
  </div>
</section>

<!-- PRODUCTOS -->
<section class="section patron">

  <div class="collection-header">
    <h1>Embroidery</h1>
    <p>Selected pieces from the embroidery drop.</p>
  </div>

  <div class="product-grid">

    <!-- PRODUCTO -->
    <div class="product-card">
      <div class="shopify-product" data-product-id="15692409864524"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15692278530380"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15692276040012"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15645410296140"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15645398303052"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15645356163404"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15621858885964"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15458529640780"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15439659139404"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15144812970316"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15138447589708"></div>
    </div>

    <div class="product-card">
      <div class="shopify-product" data-product-id="15138442477900"></div>
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

          console.log('Cargando producto:', productId, productNode);

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