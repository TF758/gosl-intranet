<?php

if (! defined('ABSPATH')) {
    exit;
}

function dpsm_register_department_query_vars(
    array $vars
): array {

    $vars[] =
        'department_section';

    return $vars;
}

add_filter(
    'query_vars',
    'dpsm_register_department_query_vars'
);

function dpsm_department_rewrite_rules(): void
{
    add_rewrite_rule(
        '^departments/([^/]+)/([^/]+)/?$',
        'index.php?post_type=department&name=$matches[1]&department_section=$matches[2]',
        'top'
    );
}

add_action(
    'init',
    'dpsm_department_rewrite_rules'
);
