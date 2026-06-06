<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_map_resource(
    WP_Post $post
): array {

    $department_id =
        get_field(
            'department',
            $post->ID
        );

    $department_name = '';

    if (
        !empty($department_id)
    ) {

        $department_name =
            get_the_title(
                $department_id
            );
    }

    $resource_file =
        get_field(
            'resource_file',
            $post->ID
        );

    $resource_url =
        get_field(
            'resource_url',
            $post->ID
        );

    return [

        'id' =>
        $post->ID,

        'title' =>
        get_the_title(
            $post
        ),

        'description' =>
        get_field(
            'description',
            $post->ID
        ),

        'department_id' =>
        $department_id,

        'department_name' =>
        $department_name,

        'resource_type' =>
        get_field(
            'resource_type',
            $post->ID
        ),

        'resource_categories' =>
        get_field(
            'resource_category',
            $post->ID
        ) ?: [],

        'resource_url' =>
        $resource_url,

        'resource_file' =>
        $resource_file,

        'resource_file_url' =>
        $resource_file['url']
            ?? '',

        'download_url' =>
        !empty($resource_file['url'])
            ? $resource_file['url']
            : $resource_url,

        'revision_date' =>
        get_field(
            'document_revision_date',
            $post->ID
        ),

        'featured' =>
        (bool)
        get_field(
            'featured_resource',
            $post->ID
        ),

        'url' =>
        get_permalink(
            $post
        ),
    ];
}
