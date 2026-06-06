<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_get_department(
    int $post_id
): array {

    return [

        'id' =>
        $post_id,

        'title' =>
        get_the_title(
            $post_id
        ),

        'department_code' =>
        get_field(
            'department_code',
            $post_id
        ),

        'short_name' =>
        get_field(
            'short_name',
            $post_id
        ),

        'department_head' =>
        get_field(
            'department_head',
            $post_id
        ),

        'contact_email' =>
        get_field(
            'contact_email',
            $post_id
        ),

        'contact_phone' =>
        get_field(
            'contact_phone',
            $post_id
        ),

    ];
}

function dpsm_map_department(
    WP_Post $department
): array {

    return [

        'id' =>
        $department->ID,

        'name' =>
        get_the_title(
            $department
        ),

        'email' =>
        get_field(
            'department_email',
            $department->ID
        ),

        'phone' =>
        get_field(
            'contact_phone',
            $department->ID
        ),

        'location' =>
        get_field(
            'office_location',
            $department->ID
        ),

    ];
}
