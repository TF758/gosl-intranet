<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Map a Staff Member post
 * into a component-friendly array.
 */
function dpsm_map_staff_member(
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
             * such as DPSM, HRM, FMU etc.
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
/**

 * Supported Arguments:
 *
 * [
 *     'search'     => '',
 *     'unit'       => '',
 *     'department' => 0,
 * ]
 */
function dpsm_get_staff_members(
    array $args = []
): array {

    $query_args = [

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
    ];

    /**
     * Department Filter
     */

    $meta_query = [];

    if (
        !empty($args['department'])
    ) {

        $meta_query[] = [

            'key' =>
            'department',

            'value' =>
            absint(
                $args['department']
            ),

            'compare' =>
            '=',
        ];
    }

    if (
        !empty($meta_query)
    ) {

        $query_args['meta_query'] =
            $meta_query;
    }

    /**
     * Search
     */

    if (
        !empty($args['search'])
    ) {

        $query_args['s'] =
            sanitize_text_field(
                $args['search']
            );
    }

    /**
     * Unit Filter
     */

    $tax_query = [];

    if (
        !empty($args['unit'])
    ) {

        $tax_query[] = [

            'taxonomy' =>
            'staff_unit',

            'field' =>
            'slug',

            'terms' =>
            sanitize_text_field(
                $args['unit']
            ),
        ];
    }

    if (
        !empty($tax_query)
    ) {

        $query_args['tax_query'] =
            $tax_query;
    }

    $query =
        new WP_Query(
            $query_args
        );

    /**
     * Relevanssi Support
     */

    if (
        !empty($args['search'])
        && function_exists(
            'relevanssi_do_query'
        )
    ) {

        relevanssi_do_query(
            $query
        );
    }

    $staff_members = [];

    while (
        $query->have_posts()
    ) {

        $query->the_post();

        $staff_members[] =
            dpsm_map_staff_member(
                get_the_ID()
            );
    }

    wp_reset_postdata();

    return $staff_members;
}
