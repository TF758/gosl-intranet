<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_resource_post_type()
{
    register_post_type(
        'resource',
        [
            'labels' => [
                'name' => 'Resources',
                'singular_name' => 'Resource',
            ],

            'public' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-media-document',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
            ],

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'resources',
            ],
        ]
    );
}

add_action(
    'init',
    'dpsm_register_resource_post_type'
);
