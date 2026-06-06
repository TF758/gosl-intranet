<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_map_news(
    WP_Post $post
): array {

    $department_id =
        get_field(
            'department',
            $post->ID
        );

    $department_name = '';

    if (
        ! empty($department_id)
    ) {

        $department_name =
            get_the_title(
                $department_id
            );
    }

    return [

        'id' =>
        $post->ID,

        'title' =>
        get_the_title(
            $post
        ),

        'excerpt' =>
        get_the_excerpt(
            $post
        ),

        'content' =>
        apply_filters(
            'the_content',
            $post->post_content
        ),

        'url' =>
        get_permalink(
            $post
        ),

        'image' =>
        get_the_post_thumbnail_url(
            $post,
            'large'
        ),

        'department_id' =>
        $department_id,

        'department_name' =>
        $department_name,

        'news_type' =>
        get_field(
            'news_type',
            $post->ID
        ),

        'priority' =>
        get_field(
            'priority',
            $post->ID
        ),

        'featured' =>
        (bool)
        get_field(
            'featured_news',
            $post->ID
        ),

        'pinned' =>
        (bool)
        get_field(
            'pin_to_homepage',
            $post->ID
        ),

        'external_link' =>
        get_field(
            'external_link',
            $post->ID
        ),

        'expiry_date' =>
        get_field(
            'expiry_date',
            $post->ID
        ),

        'date' =>
        get_the_date(
            'j F Y',
            $post
        ),
    ];
}
