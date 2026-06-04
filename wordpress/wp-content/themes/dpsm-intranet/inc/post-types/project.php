<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_project_post_type()
{
    register_post_type(
        'project',
        [
            'labels' => [
                'name' => 'Projects',
                'singular_name' => 'Project',
            ],

            'public' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-portfolio',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
            ],

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'projects',
            ],
        ]
    );
}

add_action(
    'init',
    'dpsm_register_project_post_type'
);
