<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Map a Staff Member post
 * into a component-friendly array.
 */
function dpsm_map_staff(
    int $post_id
): array {

    $first_name =
        get_field(
            'first_name',
            $post_id
        );

    $last_name =
        get_field(
            'last_name',
            $post_id
        );

    $name =
        trim(
            "{$first_name} {$last_name}"
        );

    /**
     * Department
     */

    $department_id =
        get_field(
            'department',
            $post_id
        );

    $department =
        $department_id
        ? get_the_title(
            $department_id
        )
        : '';

    /**
     * Units
     */

    $units =
        get_the_terms(
            $post_id,
            'staff_unit'
        );

    $unit = '';

    if (
        !empty($units)
        && !is_wp_error($units)
    ) {

        $unit =
            $units[0]->name;
    }

    /**
     * Expertise
     */

    $expertise_terms =
        get_the_terms(
            $post_id,
            'staff_expertise'
        );

    $tags = [];

    if (
        !empty($expertise_terms)
        && !is_wp_error(
            $expertise_terms
        )
    ) {

        foreach (
            $expertise_terms
            as $term
        ) {

            /**
             * Ignore parent terms
             * such as DPSM, HRM etc.
             */

            if (
                $term->parent
            ) {

                $tags[] =
                    $term->name;
            }
        }
    }

    /**
     * Profile Photo
     */

    $photo =
        get_field(
            'profile_photo',
            $post_id
        );

    $photo_url = '';

    if (
        is_array($photo)
    ) {

        $photo_url =
            $photo['sizes']['medium']
            ?? $photo['url']
            ?? '';
    }

    return [

        'id' =>
        $post_id,

        'name' =>
        $name,

        'job_title' =>
        get_field(
            'job_title',
            $post_id
        ),

        'department' =>
        $department,

        'unit' =>
        $unit,

        'tags' =>
        $tags,

        'email' =>
        get_field(
            'email',
            $post_id
        ),

        'phone' =>
        get_field(
            'phone',
            $post_id
        ),

        'extension' =>
        get_field(
            'extension',
            $post_id
        ),

        'staff_id' =>
        get_field(
            'staff_id',
            $post_id
        ),

        'photo' =>
        $photo_url,
    ];
}

/**
 * Get Staff Members
 */
function dpsm_get_staff(
    array $args = []
): array {

    $query_args = wp_parse_args(
        $args,
        [
            'post_type' =>
            'staff',

            'posts_per_page' =>
            -1,

            'post_status' =>
            'publish',

            'orderby' =>
            'title',

            'order' =>
            'ASC',
        ]
    );

    $query =
        new WP_Query(
            $query_args
        );

    $staff = [];

    while (
        $query->have_posts()
    ) {

        $query->the_post();

        $staff[] =
            dpsm_map_staff(
                get_the_ID()
            );
    }

    wp_reset_postdata();

    return $staff;
}
