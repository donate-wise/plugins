<?php
/**
* Plugin Name: DonateWise
* Description: Increase your conversion rate and revenue by enabling recurring donations to the most reputable charities in your online shop.
* Version: 1.0
* Author: DonateWise
* Author URI: https://donate-wise.org/
**/

include(__DIR__.'/css/register_styles.php');
include(__DIR__.'/form_uuid.php');
include(__DIR__.'/api.php');
include(__DIR__.'/widgets.php');

add_action('admin_menu', 'donatewise_create_settings_page');
add_action('wp_ajax_save_switch', 'save_switch');
if(get_option('donatewise_widget_product_status') && !empty(get_option('donatewise_widget_product')['status']) && get_option('donatewise_widget_product')['status'] == 'active'){
    add_action('woocommerce_after_add_to_cart_form', 'donatewise_display_widget_product');
}


add_action('wp', function () {
    if(is_front_page() && get_option('donatewise_widget_floating_status') && !empty(get_option('donatewise_widget_product')['status']) && get_option('donatewise_widget_product')['status'] == 'active'){
        add_action('wp_footer', 'donatewise_display_widget_floating');
    }
});


add_action( 'donatewise_cron_hook', 'donatewise_cron_function' );
 
function donatewise_cron() {
    if ( ! wp_next_scheduled('donatewise_cron_hook') ) {
        wp_schedule_event( time(), 'daily', 'donatewise_cron_hook' );
    }
}
function donatewise_cron_deactive() {
    wp_clear_scheduled_hook('donatewise_cron_hook');
}
register_activation_hook( __FILE__, 'donatewise_cron' );
register_deactivation_hook ( __FILE__, 'donatewise_cron_deactive' );


function donatewise_cron_function() {
    donatewise_send_request();
}

function save_switch() {
    $name = sanitize_text_field($_POST['name']);
    $checkbox = sanitize_text_field($_POST['checked']);
    
    update_option($name, $checkbox);

    echo json_encode(array(
        "status" => "ok",
        "message" => "Saved",
    ));

    wp_die();
}

function donatewise_create_settings_page() {
    add_menu_page(
        'DonateWise - settings',
        'DonateWise',
        'manage_options',
        'donatewise',
        'donatewise_view_dispatcher',
        plugin_dir_url( __FILE__ ) . 'assets/logo.png',
        100
    );
    add_options_page('DonateWise', 'Plugin Menu', 'manage_options', 'donatewise', 'donatewise_view_dispatcher');  

    register_setting('donatewise_settings', 'donatewise_uuid');
    register_setting('donatewise_settings', 'donatewise_widget_product', array('default' => 1));
}

function donatewise_view_dispatcher()
{
    $uuid_set = (bool) get_option('donatewise_uuid');
    $action = null;

    if (isset($_GET['action'])) {
        $action = sanitize_text_field($_GET['action']);
    }

    ?><nav class="nav-tab-wrapper">
        <a href="?page=donatewise" class="nav-tab <?php if ($action === null): ?>nav-tab-active<?php endif ?>">
            <?php echo 'Settings'; ?>
        </a>
        <a href="?page=donatewise&action=widgets" class="nav-tab <?php if ($action === 'widgets'): ?>nav-tab-active<?php endif ?>">
            <?php echo 'Widgets'; ?>
        </a>
    </nav><?php

    if ($action === null) {
        donatewise_display_uuid_form();
        return;
    }

    if ($action === 'widgets') {
        wp_enqueue_style( 'uuid_form_style' );
        wp_enqueue_style( 'forms_style' );

        ?>
        <div class="dw-page">
                <h2 style="font-size: 22px">Thank you for choosing DonateWise - the all-in-one charity platform for e-commerce.</h2>
                <span style="display: block">We help online stores boost their revenue by enabling recurring donations to reputable charities via an easy-to-use automated platform.</span><span>In order to continue using the plugin first register at <a href="https://donate-wise.org">donate-wise.org</a> and get your unique ID. Once received - simply paste it in the form below.</span>
            <div class="dw-container">
                <div class="form-section dw-card" style="max-width: 45%; margin-top: 40px">  
                    <h3>Product widget displayed on the product page</h3> 
                    <?php donatewise_display_widget_product(); ?>
                    <div class="switch" style="margin-top: 40px;">
                        <label>Enable?</label>
                        <input class="switch" type="checkbox" id="donatewise_widget_product_status" name="donatewise_widget_product_status" value="1" <?php if(get_option('donatewise_widget_product_status')) echo 'checked'; else ''; ?>/>
                    </div>
                </div>
                <div class="form-section dw-card" style="max-width: 45%; margin-top: 40px">  
                    <h3>Floating widget displayed on every page</h3> 
                    <?php donatewise_display_widget_floating(); ?>
                    <div class="switch" style="margin-top: 40px;">
                        <label>Enable?</label>
                        <input class="switch" type="checkbox" id="donatewise_widget_floating_status" name="donatewise_widget_floating_status" value="1" <?php if(get_option('donatewise_widget_floating_status')) echo 'checked'; else ''; ?>/>
                    </div>
                </div>
            </div>
        </div>


        <?php
        return;
    }
}

