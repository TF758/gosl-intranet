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

function dpsm_enqueue_assets(): void
{
    wp_enqueue_style(
        'dpsm-theme',
        get_template_directory_uri() . '/assets/css/output.css',
        [],
        filemtime(
            get_template_directory() . '/assets/css/output.css'
        )
    );

    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        null
    );

    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'dpsm-hero-carousel',
        get_template_directory_uri() . '/assets/js/hero-carousel.js',
        [
            'swiper',
        ],
        filemtime(
            get_template_directory() . '/assets/js/hero-carousel.js'
        ),
        true
    );
}

add_action(
    'wp_enqueue_scripts',
    'dpsm_enqueue_assets'
);
