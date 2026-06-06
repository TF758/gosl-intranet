<?php

if (!defined('ABSPATH')) {
    exit;
}

$files = [
    'setup/constants.php',
    'setup/theme.php',


    'helpers/navigation.php',
    'helpers/department.php',
    'helpers/quick-links.php',
    'helpers/news.php',

    'post-types/department.php',

    'acf/register.php',

    'post-types/staff.php',

    'setup/acf.php',

    'post-types/project.php',
    'post-types/resource.php',
    'post-types/news.php',
    'post-types/hero-slide.php',

    'taxonomies/project-tag.php',

    'taxonomies/resource-tag.php',

    'mappers/hero-slides.php',
    'mappers/news.php',


];

foreach ($files as $file) {

    $path =
        get_template_directory()
        . '/inc/'
        . $file;

    if (file_exists($path)) {
        require_once $path;
    }
}
