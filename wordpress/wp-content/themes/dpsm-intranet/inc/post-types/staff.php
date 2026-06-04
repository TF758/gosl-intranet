<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_staff_post_type()
{
    register_post_type(
        'staff',
        [
            'labels' => [
                'name' => 'Staff',
                'singular_name' => 'Staff Member',
            ],

            'public' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-groups',

            'supports' => [
                'title',
                'thumbnail',
            ],

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'staff',
            ],
        ]
    );
}

add_action(
    'init',
    'dpsm_register_staff_post_type'
);
