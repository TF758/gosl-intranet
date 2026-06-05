<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_get_navigation(): array
{
    return require get_template_directory()
        . '/inc/config/navigation.php';
}

function dpsm_is_active_path(
    string $path
): bool {

    $current_url =
        untrailingslashit(
            home_url(
                add_query_arg(
                    [],
                    $_SERVER['REQUEST_URI']
                )
            )
        );

    $target_url =
        untrailingslashit(
            home_url($path)
        );

    return $current_url === $target_url;
}

function dpsm_is_current_url(
    string $url
): bool {

    $current_url =
        untrailingslashit(
            home_url(
                add_query_arg(
                    [],
                    $_SERVER['REQUEST_URI']
                )
            )
        );

    return $current_url ===
        untrailingslashit(
            $url
        );
}
