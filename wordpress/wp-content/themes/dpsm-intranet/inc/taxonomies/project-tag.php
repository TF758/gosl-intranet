<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_project_tag_taxonomy()
{
    register_taxonomy(
        'project_tag',

        ['project'],

        [

            'labels' => [

                'name' => 'Project Tags',

                'singular_name' => 'Project Tag',

            ],

            'public' => true,

            'show_admin_column' => true,

            'show_in_rest' => true,

            'hierarchical' => false,

            'rewrite' => [

                'slug' => 'project-tag',

            ],

        ]
    );
}

add_action(
    'init',
    'dpsm_register_project_tag_taxonomy'
);
