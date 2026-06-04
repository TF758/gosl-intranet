<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_departments()
{
    return require get_template_directory()
        . '/inc/config/departments.php';
}

function dpsm_navigation()
{
    return require get_template_directory()
        . '/inc/config/navigation.php';
}

function dpsm_site_map()
{
    return require get_template_directory()
        . '/inc/config/site-map.php';
}
