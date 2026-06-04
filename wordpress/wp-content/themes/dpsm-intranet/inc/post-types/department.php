<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_department_post_type()
{
    register_post_type(
        'department',
        [
            'labels' => [
                'name' => 'Departments',
                'singular_name' => 'Department',
            ],

            'public' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-building',

            'supports' => [
                'title',
                'thumbnail',
            ],

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'departments',
            ],
        ]
    );
}

add_action(
    'init',
    'dpsm_register_department_post_type'
);
