<?php

function dpsm_register_hero_slide_post_type(): void
{
    register_post_type(
        'hero_slide',
        [
            'labels' => [
                'name'          => 'Hero Slides',
                'singular_name' => 'Hero Slide',
                'add_new_item'  => 'Add New Hero Slide',
                'edit_item'     => 'Edit Hero Slide',
                'new_item'      => 'New Hero Slide',
                'view_item'     => 'View Hero Slide',
                'search_items'  => 'Search Hero Slides',
                'not_found'     => 'No hero slides found',
                'menu_name'     => 'Hero Slides',
            ],

            'public' => false,

            'show_ui' => true,

            'show_in_menu' => true,

            'menu_icon' => 'dashicons-images-alt2',

            'supports' => [
                'title',
                'thumbnail',
            ],

            'has_archive' => false,

            'rewrite' => false,

            'show_in_rest' => true,
        ]
    );
}

add_action(
    'init',
    'dpsm_register_hero_slide_post_type'
);
