<?php

if (!defined('ABSPATH')) {
    exit;
}

$files = [

    'setup/theme.php',

    // 'helpers/config.php',

    'post-types/department.php',

    'acf/register.php',

    'post-types/staff.php',

    'setup/acf.php',


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
