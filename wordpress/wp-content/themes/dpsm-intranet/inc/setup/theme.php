<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_theme_setup()
{
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('menus');

    add_theme_support('html5');

    register_nav_menus([
        'primary' => 'Primary Navigation',
        'footer' => 'Footer Navigation',
    ]);
}

add_action(
    'after_setup_theme',
    'dpsm_theme_setup'
);
