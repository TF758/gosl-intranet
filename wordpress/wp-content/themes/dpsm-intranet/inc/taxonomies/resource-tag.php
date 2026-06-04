<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_register_resource_tag_taxonomy()
{
    register_taxonomy(
        'resource_tag',

        ['resource'],

        [

            'labels' => [

                'name' => 'Resource Tags',

                'singular_name' => 'Resource Tag',

            ],

            'public' => true,

            'show_admin_column' => true,

            'show_in_rest' => true,

            'hierarchical' => false,

            'rewrite' => [

                'slug' => 'resource-tag',

            ],

        ]
    );
}

add_action(
    'init',
    'dpsm_register_resource_tag_taxonomy'
);
