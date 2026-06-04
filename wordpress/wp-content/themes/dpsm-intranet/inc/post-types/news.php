<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_news_post_type()
{
    register_post_type(
        'news',
        [
            'labels' => [
                'name' => 'News',
                'singular_name' => 'News Item',
            ],

            'public' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-megaphone',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'author',
            ],

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'news',
            ],
        ]
    );
}

add_action(
    'init',
    'dpsm_register_news_post_type'
);
