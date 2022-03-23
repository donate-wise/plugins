<?php

function donatewise_display_uuid_form()
{
    wp_enqueue_style( 'uuid_form_style' );

    ?>
    <div class="dw-page">
        <h2 style="font-size: 22px">Thank you for choosing DonateWise - the all-in-one charity platform for e-commerce.</h2>
        <span style="display: block">We help online stores boost their revenue by enabling recurring donations to reputable charities via an easy-to-use automated platform.</span><span> In order to continue using the plugin first register at <a href="https://donate-wise.org">donate-wise.org</a> and get your unique ID. Once received - simply paste it in the form below.</span>

        <form method="post" action="options.php">
            <?php settings_fields('donatewise_settings') ?>
            <div class="form-section dw-card" style="margin-top: 40px;">
                <label for="donatewise_uuid"><?php echo 'Your UUID:' ?></label>
                <br>
                <div>
                    <input type="text" id="donatewise_uuid" name="donatewise_uuid" value="<?php echo get_option('donatewise_uuid') ?>" required/>
                <?php if(donatewise_send_request() == 'active' && !empty(get_option('donatewise_uuid'))) {?>
                <img src="<?php echo plugin_dir_url( __FILE__ )?>assets/check_ok.svg" width="30" style="margin-bottom: -5px" alt="ok" />
                <?php }else if(donatewise_send_request() != 'active' && !empty(get_option('donatewise_uuid'))) { ?>
                <img src="<?php echo plugin_dir_url( __FILE__ )?>assets/check_error.svg" width="22" style="margin-bottom: -5px" alt="error" />
                <?php } ?>
                </div>
                <?php submit_button('Zapisz zmiany') ?>
            </div>
        </form>
    </div>
    <?php
}
