<?php

if (!defined('ABSPATH')) {
    exit;
}

$files = [

    'setup/theme.php',

    'helpers/config.php',

];

foreach ($files as $file) {

    require_once get_template_directory()
        . '/inc/'
        . $file;
}
