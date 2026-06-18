<?php

function balkanblood_styles() {
    wp_enqueue_style(
        'balkanblood-style',
        get_stylesheet_uri()
    );
}
add_action('wp_enqueue_scripts', 'balkanblood_styles');

function balkanblood_menus() {
    register_nav_menus(array(
        'menu-principal' => 'Menú Principal'
    ));
}
add_action('after_setup_theme', 'balkanblood_menus');