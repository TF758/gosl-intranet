<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_get_hero_slides(
    string $placement = 'homepage',
    ?int $department_id = null
): array {

    $meta_query = [

        [
            'key' => 'active',
            'value' => 1,
            'compare' => '=',
        ],

        [
            'key' => 'placement',
            'value' => $placement,
            'compare' => '=',
        ],

    ];

    if (
        $placement === 'department'
        && $department_id
    ) {

        $meta_query[] = [

            'key' => 'department',
            'value' => '"' . $department_id . '"',
            'compare' => 'LIKE',

        ];
    }

    $query = new WP_Query(
        [
            'post_type' => 'hero_slide',

            'posts_per_page' => -1,

            'orderby' => 'meta_value_num',

            'meta_key' => 'sort_order',

            'order' => 'ASC',

            'meta_query' => $meta_query,
        ]
    );

    if (
        ! $query->have_posts()
    ) {
        return [];
    }

    $slides = [];

    foreach (
        $query->posts
        as $post
    ) {

        $slides[] =
            dpsm_map_hero_slide(
                $post
            );
    }

    return $slides;
}


function dpsm_map_hero_slide(
    WP_Post $post
): array {

    $title =
        get_field(
            'title_override',
            $post->ID
        );

    return [

        'id' =>
        $post->ID,

        'title' =>
        $title
            ?: get_the_title(
                $post
            ),

        'description' =>
        get_field(
            'description',
            $post->ID
        ),

        'badge' =>
        get_field(
            'badge',
            $post->ID
        ),

        'button_label' =>
        get_field(
            'button_label',
            $post->ID
        ),

        'button_url' =>
        get_field(
            'button_url',
            $post->ID
        ),

        'image' =>
        get_the_post_thumbnail_url(
            $post,
            'full'
        ),

        'image_alt' =>
        get_post_meta(
            get_post_thumbnail_id(
                $post
            ),
            '_wp_attachment_image_alt',
            true
        ),

    ];
}
