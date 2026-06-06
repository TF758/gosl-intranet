<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Homepage featured news.
 */
function dpsm_get_homepage_featured_news(): array
{
    $query = new WP_Query(
        [
            'post_type' =>
            'news',

            'posts_per_page' =>
            1,

            'meta_key' =>
            'pin_to_homepage',

            'meta_value' =>
            1,
        ]
    );

    if (
        $query->have_posts()
    ) {

        return dpsm_map_news(
            $query->posts[0]
        );
    }

    $query = new WP_Query(
        [
            'post_type' =>
            'news',

            'posts_per_page' =>
            1,

            'meta_key' =>
            'featured_news',

            'meta_value' =>
            1,
        ]
    );

    if (
        $query->have_posts()
    ) {

        return dpsm_map_news(
            $query->posts[0]
        );
    }

    $query = new WP_Query(
        [
            'post_type' =>
            'news',

            'posts_per_page' =>
            1,
        ]
    );

    if (
        $query->have_posts()
    ) {

        return dpsm_map_news(
            $query->posts[0]
        );
    }

    return [];
}

/**
 * Homepage news feed.
 */
function dpsm_get_homepage_news(
    int $limit = 4
): array {

    $featured =
        dpsm_get_homepage_featured_news();

    $exclude_id =
        $featured['id']
        ?? 0;

    $query = new WP_Query(
        [
            'post_type' =>
            'news',

            'posts_per_page' =>
            $limit,

            'post__not_in' =>
            [$exclude_id],
        ]
    );

    return array_map(
        'dpsm_map_news',
        $query->posts
    );
}

/**
 * Department news feed.
 */
function dpsm_get_department_news(
    int $department_id,
    int $limit = 4
): array {

    $query = new WP_Query(
        [
            'post_type' =>
            'news',

            'posts_per_page' =>
            $limit,

            'meta_query' => [
                [
                    'key' =>
                    'department',

                    'value' =>
                    $department_id,
                ],
            ],
        ]
    );

    return array_map(
        'dpsm_map_news',
        $query->posts
    );
}
