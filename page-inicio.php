<?php get_header(); ?>

<main class="site-main">

  <!-- HERO -->
  <section class="hero hero-home">
    <div class="hero-overlay">
      <h1>BALKAN BLOOD</h1>
      <p>Dark streetwear. Limited drops.</p>
    </div>
  </section>

  <!-- PRODUCTOS DESTACADOS -->
  <section class="section featured patron">

    <div class="section-heading">
      <h2>Bestsellers</h2>
    </div>

    <div class="product-grid">

      <article class="product-card">
        <div class="shopify-product" data-product-id="15138442477900"></div>
      </article>

      <article class="product-card">
        <div class="shopify-product" data-product-id="15484105556300"></div>
      </article>

      <article class="product-card">
        <div class="shopify-product" data-product-id="15458529640780"></div>
      </article>

      <article class="product-card">
        <div class="shopify-product" data-product-id="15481910853964"></div>
      </article>

    </div>

    <div class="center-btn">
      <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn-outline">
        Explore All Products
      </a>
    </div>

  </section>

  <!-- COLECCION 1 -->
  <section class="collection-section coleccion-1">
    <div class="collection-content">
      <span class="section-label">Collection</span>
      <h2>Embroidery</h2>
      
      <a href="<?php echo esc_url(home_url('/coleccion-1/')); ?>" class="btn-outline">
        View full collection
      </a>
    </div>
  </section>

  <!-- COLECCION 2 -->
  <section class="collection-section coleccion-2">
    <div class="collection-content">
      <span class="section-label">Collection</span>
      <h2>Neon Collective</h2>
      <a href="<?php echo esc_url(home_url('/coleccion-2/')); ?>" class="btn-outline">
        View full collection
      </a>
    </div>
  </section>

  <!-- NOVEDADES -->
  <section class="collection-section novedades">
    <div class="collection-content">
      <span class="section-label">Latest</span>
      <h2>New Drops</h2>
      
      <a href="<?php echo esc_url(home_url('/novedades/')); ?>" class="btn-outline">
        See more
      </a>
    </div>
  </section>

</main>

<script>
  (function() {
    const productNodes = document.querySelectorAll('.shopify-product');

    if (!productNodes.length) return;

    const shopifyConfig = {
      domain: '00v4cj-q4.myshopify.com',
      storefrontAccessToken: 'c5acca99a0dcb58092a6085116d2085b'
    };

    const scriptURL =
      'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

    function loadScript() {
      const script = document.createElement('script');

      script.async = true;
      script.src = scriptURL;
      script.onload = ShopifyBuyInit;

      (document.head || document.body).appendChild(script);
    }

    function ShopifyBuyInit() {
      const client = ShopifyBuy.buildClient({
        domain: shopifyConfig.domain,
        storefrontAccessToken: shopifyConfig.storefrontAccessToken
      });

      ShopifyBuy.UI.onReady(client).then(function(ui) {
        productNodes.forEach(function(productNode) {
          const productId = productNode.dataset.productId;

          if (!productId) return;

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
                    'background-color': 'transparent',
                    'padding': '0',
                    'border': 'none',
                    'box-shadow': 'none'
                  },

                  title: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'font-size': '12px',
                    'letter-spacing': '2.5px',
                    'line-height': '1.6',
                    'text-transform': 'uppercase',
                    'font-weight': '500',
                    'color': '#ffffff'
                  },

                  price: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'font-size': '12px',
                    'letter-spacing': '1px',
                    'color': 'rgba(255,255,255,0.42)'
                  },

                  button: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'background-color': 'rgba(255,255,255,0.02)',
                    'color': '#ffffff',
                    'border': '1px solid rgba(255,255,255,0.12)',
                    'padding': '0 24px',
                    'height': '54px',
                    'font-size': '10px',
                    'letter-spacing': '3px',
                    'text-transform': 'uppercase',
                    'font-weight': '600',
                    'border-radius': '0px',

                    ':hover': {
                      'background-color': '#ffffff',
                      'color': '#000000',
                      'border': '1px solid #ffffff'
                    },

                    ':focus': {
                      'background-color': '#ffffff',
                      'color': '#000000',
                      'border': '1px solid #ffffff'
                    }
                  }
                }
              },

              option: {
                styles: {
                  label: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'font-size': '10px',
                    'font-weight': '600',
                    'letter-spacing': '3px',
                    'text-transform': 'uppercase',
                    'color': 'rgba(255,255,255,0.38)'
                  },

                  select: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'font-size': '12px',
                    'letter-spacing': '1px',
                    'background-color': 'rgba(255,255,255,0.03)',
                    'color': '#ffffff',
                    'border': '1px solid rgba(255,255,255,0.1)',
                    'padding': '0 18px',
                    'height': '54px',
                    'border-radius': '0px'
                  }
                }
              },

              cart: {
                popup: false,

                text: {
                  title: 'Cart',
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
                    'background-color': 'rgba(0,0,0,0.78)',
                    'border-left': '1px solid rgba(255,255,255,0.08)'
                  },

                  count: {
                    'font-family': 'Inter, Helvetica Neue, sans-serif',
                    'color': '#ffffff'
                  },

                  iconPath: {
                    'fill': '#ffffff'
                  }
                }
              }
            }
          });
        });
      });
    }

    if (window.ShopifyBuy) {
      if (window.ShopifyBuy.UI) {
        ShopifyBuyInit();
      } else {
        loadScript();
      }
    } else {
      loadScript();
    }
  })();
</script>

<?php get_footer(); ?>