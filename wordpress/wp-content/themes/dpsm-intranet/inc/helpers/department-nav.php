<?php

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Get department navigation configuration.
 */
function dpsm_get_department_navigation_config(): array
{
    return require get_template_directory()
        . '/inc/config/department-navigation.php';
}

/**
 * Get navigation items for a department.
 */
function dpsm_get_department_sidebar_items(
    string $department_code
): array {

    $config =
        dpsm_get_department_navigation_config();

    return $config[$department_code]
        ?? [];
}


/**
 * Get current department section.
 */
function dpsm_get_department_section(): string
{
    return sanitize_key(
        get_query_var(
            'department_section'
        )
    );
}

function dpsm_get_department_template(
    string $section
): string {

    return match ($section) {

        'staff' =>
        'template-parts/pages/department/department-staff',

        'projects' =>
        'template-parts/pages/department/department-project',

        'resources' =>
        'template-parts/pages/department/department-resources',

        'news' =>
        'template-parts/pages/department/department-news',

        'contact' =>
        'template-parts/pages/department/department-contact',

        'policies' =>
        'template-parts/pages/department/department-policies',

        'forms' =>
        'template-parts/pages/department/department-forms',

        'training' =>
        'template-parts/pages/department/department-training',

        'requests' =>
        'template-parts/pages/department/department-requests',

        'guidelines' =>
        'template-parts/pages/department/department-guidelines',

        default =>
        'template-parts/pages/department/department-content',
    };
}

/**
 * Generate a department navigation URL.
 *
 * Example:
 * /departments/dpsm/
 * /departments/dpsm/staff/
 */
function dpsm_get_department_nav_url(
    string $department_slug,
    string $section_slug = ''
): string {

    $base =
        home_url(
            '/departments/'
                . sanitize_title($department_slug)
                . '/'
        );

    if (empty($section_slug)) {
        return $base;
    }

    return trailingslashit(
        $base
            . sanitize_title($section_slug)
    );
}

/**
 * Get current request URL.
 */
function dpsm_get_current_url(): string
{
    return home_url(
        add_query_arg(
            [],
            $_SERVER['REQUEST_URI'] ?? ''
        )
    );
}

/**
 * Determine if navigation item is active.
 */
function dpsm_is_department_nav_active(
    string $url
): bool {

    return trailingslashit(
        dpsm_get_current_url()
    ) === trailingslashit(
        $url
    );
}

/**
 * Build department navigation array.
 *
 * Convenience wrapper.
 */
function dpsm_get_department_navigation(
    string $department_code,
    string $department_slug
): array {

    $items =
        dpsm_get_department_sidebar_items(
            $department_code
        );

    return array_map(

        function ($item) use (
            $department_slug
        ) {

            $url =
                dpsm_get_department_nav_url(
                    $department_slug,
                    $item['slug'] ?? ''
                );

            return [

                'label' =>
                $item['label']
                    ?? '',

                'slug' =>
                $item['slug']
                    ?? '',

                'icon' =>
                $item['icon']
                    ?? null,

                'url' =>
                $url,

                'active' =>
                dpsm_is_department_nav_active(
                    $url
                ),

            ];
        },

        $items
    );
}
function dpsm_get_department_code(
    WP_Post $department
): string {

    return strtoupper(
        trim(
            get_field(
                'department_code',
                $department->ID
            ) ?: ''
        )
    );
}
