<?php

if (!defined('ABSPATH')) {
    exit;
}

$files = [

    'setup/theme.php',


    'helpers/navigation.php',
    'helpers/department.php',

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
