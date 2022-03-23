<?php

add_action('init', 'register_styles_DW');

function register_styles_DW() {
    wp_register_style( 'uuid_form_style', plugins_url('/css/uuid_form.css', __DIR__));
    wp_register_style( 'widgets_style', plugins_url('/css/widgets_style.css', __DIR__));
    wp_register_style( 'forms_style', plugins_url('/css/forms.css', __DIR__));
}

?>