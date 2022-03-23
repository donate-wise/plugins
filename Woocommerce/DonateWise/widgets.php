<?php

add_action('wp_enqueue_scripts','widget_product_init');
add_action( 'admin_enqueue_scripts', 'widget_product_init' );

function widget_product_init() {
    wp_enqueue_script( 'widget-product-js', plugins_url( '/js/widget-product.js', __FILE__ ));
}

function donatewise_display_widget_product(){
    wp_enqueue_style( 'widgets_style' );
	global $product;
    global $woocommerce;

	?>
    <div class="donatewise_widget_product--wrapper">
        <div class="donatewise_widget_product--container">
            <div class="donatewise_widget_product--content">
                <span><strong><?php if(get_option('donatewise_widget_product') != 'error'){ if(isset($product) && !empty($product) && get_woocommerce_currency_symbol() == '&#122;&#322;') echo str_replace('.',',',bcdiv($product->get_price()*get_option('donatewise_widget_product')['donationPercentage'], 1, 2)); else if(isset($product) && !empty($product)) echo bcdiv($product->get_price()*get_option('donatewise_widget_product')['donationPercentage'], 1, 2); else echo 'xxx'; } else echo 'xxx'; ?> <?php if(get_woocommerce_currency_symbol()) echo get_woocommerce_currency_symbol(); ?></strong> z tego zakupu przekazujemy do <strong style="white-space: nowrap;"><?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateName']; else echo 'xxx'; ?></strong></span>
                <span class="donatewise_widget_product--more" id="donatewise_widget_product--more">Dowiedz się więcej</span>
            </div>
            <div class="donatewise_widget_product--image_wrapper">
                <img src="<?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateLogo']; else echo 'xxx'; ?>" class="donatewise_widget_product--logo_foundation" alt="logo-foundation" />
            </div>  
        </div>
        <div class="donatewise_widget_product--footer">
            <span>Powered by</span>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/logo_donateWise.png' ?>" class="donatewise_widget_product--footer_logo" alt="logo-donatewise" />
        </div>
    </div>

    <div class="widget_donateWise--popup" id="widget_donateWise--popup">
        <div class="widget_donateWise--popup-wrapper">
            <div class="widget_donateWise--popup-content" id="widget_donateWise--popup-content">
                <span class="widget_donateWise--title">
                    Każdy zakup ma znaczenie
                </span>
                <div class="widget_donateWise--popup-container">
                    <div class="widget_donateWise--popup-box">
                        <img class="widget_donateWise--popup-cart" src="https://assets.donate-wise.org/woocommerce/widget-product/images/shopping-cart.png" alt="cart" />
                        <span class="widget_donateWise--popup-text">
                            Kupujesz wybrany produkt od <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['merchantName']; else echo 'xxx'; ?>
                            <span id="widget_donateWise--popup-shop"> </span>
                        </span>
                    </div>
                    <div class="widget_donateWise--popup-box">
                        <img class="widget_donateWise--popup-logo-foundation" id="widget_donateWise--popup-logo-foundation" src="<?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateLogo']; else echo 'xxx'; ?>" alt="logo foundation" />
                        <span class="widget_donateWise--popup-text">
                            Przekazujemy
                            <?php if(isset($product) && !empty($product) && get_woocommerce_currency_symbol() == '&#122;&#322;') echo str_replace('.',',',bcdiv($product->get_price()*get_option('donatewise_widget_product')['donationPercentage'], 1, 2)); else if(isset($product) && !empty($product)) echo bcdiv($product->get_price()*get_option('donatewise_widget_product')['donationPercentage'], 1, 2); else echo 'xxx'; ?> <?php echo get_woocommerce_currency_symbol(); ?> od
                            <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['merchantName']; else echo 'xxx'; ?>
                            do
                            <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateName']; else echo 'xxx'; ?>
                        </span>
                    </div>
                </div>
                <span class="widget_donateWise--popup-subtitle">
                    100% środków trafia na konto fundacji
                </span>
            </div>
            <div class="widget_donateWise--popup-footer">
                <span>
                    <a id="anchor-popup" href="https://donate-wise.org/pl" target="_blank" style="text-decoration: none; color: #FFF">Powered by</a>
                </span>
                <a id="anchor-popup_1" href="https://donate-wise.org/pl" target="_blank">
                    <img src="https://assets.donate-wise.org/woocommerce/widget-product/images/logo_donateWise_white.png" alt="logo-DonateWise" class="widget_donateWise--popup-logo-white">
                </a>
            </div>
            <span class="widget_donateWise--popup-close" id="widget_donateWise--popup-close">
                x
            </span>
        </div>
    </div>
<?php
}

function donatewise_display_widget_floating(){
    wp_enqueue_style( 'widgets_style' );
    ?>

    <div class="donatewise_widget_floating--container" id="donatewise_widget_floating">
        <div class="donatewise_widget_floating--header">
            <span>Wspieramy</span>
        </div>
        <div class="donatewise_widget_floating--content">
            <div class="donatewise_widget_floating--image-wrapper">
                <img src="<?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateLogo']; else echo 'xxx'; ?>" class="donatewise_widget_floating--image" alt="logo"/>
            </div>
            <div class="donatewise_widget_floating--footer">
                <span>Powered by</span>
                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/logo_donateWise.png' ?>" alt="logo_DonateWise"/>
            </div>
        </div>
    </div>

    <div class="widget_donateWise_floating--popup" id="widget_donateWise_floating--popup">
        <div class="widget_donateWise--popup-wrapper">
            <div class="widget_donateWise--popup-content" id="widget_donateWise--popup-content">
                <span class="widget_donateWise--title">
                    Każdy zakup ma znaczenie
                </span>
                <div class="widget_donateWise--popup-container">
                    <div class="widget_donateWise--popup-box">
                        <img class="widget_donateWise--popup-cart" src="https://assets.donate-wise.org/woocommerce/widget-product/images/shopping-cart.png" alt="cart" />
                        <span class="widget_donateWise--popup-text">
                            Kupujesz wybrany produkt od <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['merchantName']; else echo 'xxx'; ?>
                            <span id="widget_donateWise--popup-shop"> </span>
                        </span>
                    </div>
                    <div class="widget_donateWise--popup-box">
                        <img class="widget_donateWise--popup-logo-foundation" id="widget_donateWise--popup-logo-foundation" src="<?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateLogo']; else echo 'xxx'; ?>" alt="logo foundation" />
                        <span class="widget_donateWise--popup-text">
                            Przekazujemy
                            <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donationPercentage']*100; else echo 'xxx'; ?> % od
                            <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['merchantName']; else echo 'xxx'; ?>
                            do
                            <?php if(get_option('donatewise_widget_product') != 'error') echo get_option('donatewise_widget_product')['donateName']; else echo 'xxx'; ?>
                        </span>
                    </div>
                </div>
                <span class="widget_donateWise--popup-subtitle">
                    100% środków trafia na konto fundacji
                </span>
            </div>
            <div class="widget_donateWise--popup-footer">
                <span>
                    <a id="anchor-popup" href="https://donate-wise.org/pl" target="_blank" style="text-decoration: none; color: #FFF">Powered by</a>
                </span>
                <a id="anchor-popup_1" href="https://donate-wise.org/pl" target="_blank">
                    <img src="https://assets.donate-wise.org/woocommerce/widget-product/images/logo_donateWise_white.png" alt="logo-DonateWise" class="widget_donateWise--popup-logo-white">
                </a>
            </div>
            <span class="widget_donateWise--popup-close" id="widget_donateWise_floating--popup-close">
                x
            </span>
        </div>
    </div>

<?php
}
?>