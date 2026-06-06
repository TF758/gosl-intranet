<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get featured resources.
 */
function dpsm_get_featured_resources(
    int $limit = 4
): array {

    $query = new WP_Query(
        [
            'post_type' =>
            'resource',

            'posts_per_page' =>
            $limit,

            'meta_key' =>
            'featured_resource',

            'meta_value' =>
            1,

            'orderby' =>
            'date',

            'order' =>
            'DESC',
        ]
    );

    return array_map(
        'dpsm_map_resource',
        $query->posts
    );
}

/**
 * Get department resources.
 */
function dpsm_get_department_resources(
    int $department_id,
    int $limit = 6
): array {

    $query = new WP_Query(
        [
            'post_type' =>
            'resource',

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

            'orderby' =>
            'date',

            'order' =>
            'DESC',
        ]
    );

    return array_map(
        'dpsm_map_resource',
        $query->posts
    );
}

/**
 * General resource query.
 */
function dpsm_get_resources(
    int $limit = -1
): array {

    $query = new WP_Query(
        [
            'post_type' =>
            'resource',

            'posts_per_page' =>
            $limit,

            'orderby' =>
            'title',

            'order' =>
            'ASC',
        ]
    );

    return array_map(
        'dpsm_map_resource',
        $query->posts
    );
}
